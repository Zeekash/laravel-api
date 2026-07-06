<?php

namespace App\Console\Commands;

use App\Mail\LeadPlanRenewed;
use App\Models\Company;
use App\Models\CompanyLeadPlanSubscription;
use App\Models\CompanyLeadUsage;
use App\Models\LeadBillingHistory;
use App\Models\LeadSubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class AutoRenewCompanyLeadPlans extends Command
{
    /**
     * Run with:
     * php artisan lead-plans:auto-renew
     *
     * Dry run:
     * php artisan lead-plans:auto-renew --dry-run
     */
    protected $signature = 'lead-plans:auto-renew {--dry-run : Show what would renew without updating database or sending email}';

    protected $description = 'Sync auto-renewed company lead plan subscriptions, create renewal invoice records, reset lead usage, and notify company/admin.';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $now = now();

        $stripeSecret = config('services.stripe.secret');

        if (! $stripeSecret) {
            $this->error('Stripe secret key is missing in config/services.php or .env.');
            return self::FAILURE;
        }

        $stripe = new StripeClient($stripeSecret);

        $subscriptions = CompanyLeadPlanSubscription::query()
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereNull('cancel_at_period_end')
                    ->orWhere('cancel_at_period_end', false);
            })
            ->whereNotNull('stripe_subscription_id')
            ->whereNotNull('current_period_end')
            ->where('current_period_end', '<=', $now)
            ->orderBy('current_period_end')
            ->get();

        if ($subscriptions->isEmpty()) {
            $this->info('No lead plan subscriptions are due for renewal.');
            return self::SUCCESS;
        }

        $this->info('Found ' . $subscriptions->count() . ' subscription(s) due for renewal check.');

        $renewed = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($subscriptions as $subscription) {
            $company = Company::find($subscription->company_id);
            $plan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);

            if (! $company || ! $plan) {
                $skipped++;
                $this->warn("Skipped subscription #{$subscription->id}: company or plan missing.");
                continue;
            }

            try {
                $this->line("Checking subscription #{$subscription->id} for {$company->company_name}...");

                $stripeSubscription = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id, [
                    'expand' => ['latest_invoice.payment_intent'],
                ]);

                if (! in_array($stripeSubscription->status, ['active', 'trialing'], true)) {
                    if (! $dryRun) {
                        $subscription->update([
                            'status' => $stripeSubscription->status ?: 'inactive',
                        ]);
                    }

                    $skipped++;
                    $this->warn("Skipped subscription #{$subscription->id}: Stripe status is {$stripeSubscription->status}.");
                    continue;
                }

                $oldPeriodEnd = Carbon::parse($subscription->current_period_end);
                $newPeriodEnd = $stripeSubscription->current_period_end
                    ? Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                    : $this->fallbackPeriodEnd($oldPeriodEnd, $subscription->interval);

                $newPeriodStart = $stripeSubscription->current_period_start
                    ? Carbon::createFromTimestamp($stripeSubscription->current_period_start)
                    : $oldPeriodEnd->copy();

                /**
                 * Stripe creates/charges the recurring invoice automatically.
                 * We only renew locally after Stripe period has actually moved forward,
                 * so duplicate local invoices/usage resets are avoided.
                 */
                if ($newPeriodEnd->lessThanOrEqualTo($oldPeriodEnd)) {
                    $skipped++;
                    $this->warn("Skipped subscription #{$subscription->id}: Stripe has not advanced the billing period yet.");
                    continue;
                }

                $invoice = $this->getLatestPaidInvoice($stripe, $stripeSubscription);

                if ($dryRun) {
                    $renewed++;
                    $this->info("[Dry Run] Would renew subscription #{$subscription->id}: {$newPeriodStart->toDateString()} to {$newPeriodEnd->toDateString()}.");
                    continue;
                }

                $subscription->update([
                    'status' => 'active',
                    'cancel_at_period_end' => false,
                    'cancelled_at' => null,
                    'is_scheduled_renewal' => false,
                    'current_period_end' => $newPeriodEnd,
                    'stripe_customer_id' => $stripeSubscription->customer ?: $subscription->stripe_customer_id,
                ]);

                $this->resetLeadUsage($subscription, $plan, $newPeriodStart, $newPeriodEnd);

                $billingHistory = $this->recordRenewalInvoice($subscription, $company, $invoice, $plan, $newPeriodStart);

                $this->sendRenewalEmails($company, $plan, $subscription, $billingHistory);

                $renewed++;
                $this->info("Renewed subscription #{$subscription->id} successfully.");
            } catch (ApiErrorException $e) {
                $failed++;
                Log::error('Lead plan auto-renew Stripe error: ' . $e->getMessage(), [
                    'subscription_id' => $subscription->id,
                    'stripe_subscription_id' => $subscription->stripe_subscription_id,
                ]);
                $this->error("Stripe error for subscription #{$subscription->id}: {$e->getMessage()}");
            } catch (\Throwable $e) {
                $failed++;
                Log::error('Lead plan auto-renew error: ' . $e->getMessage(), [
                    'subscription_id' => $subscription->id,
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);
                $this->error("Failed subscription #{$subscription->id}: {$e->getMessage()}");
            }
        }

        $this->newLine();
        $this->info("Done. Renewed: {$renewed}, Skipped: {$skipped}, Failed: {$failed}");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    protected function fallbackPeriodEnd(Carbon $from, ?string $interval): Carbon
    {
        return $interval === 'annual'
            ? $from->copy()->addYear()
            : $from->copy()->addMonth();
    }

    protected function getLatestPaidInvoice(StripeClient $stripe, object $stripeSubscription): ?object
    {
        $invoice = $stripeSubscription->latest_invoice ?? null;

        if (is_string($invoice) && $invoice !== '') {
            $invoice = $stripe->invoices->retrieve($invoice);
        }

        if (is_object($invoice) && isset($invoice->id)) {
            return $invoice;
        }

        return null;
    }

    protected function resetLeadUsage(
        CompanyLeadPlanSubscription $subscription,
        LeadSubscriptionPlan $plan,
        Carbon $periodStart,
        Carbon $periodEnd
    ): void {
        CompanyLeadUsage::updateOrCreate(
            [
                'company_id' => $subscription->company_id,
                'period_start' => $periodStart->toDateString(),
                'period_end' => $periodEnd->toDateString(),
            ],
            [
                'lead_subscription_plan_id' => $plan->id,
                'leads_allowed' => $plan->leads_per_month,
                'leads_used' => 0,
            ]
        );
    }

    protected function recordRenewalInvoice(
        CompanyLeadPlanSubscription $subscription,
        object $company,
        ?object $invoice,
        LeadSubscriptionPlan $plan,
        Carbon $periodStart
    ): LeadBillingHistory {
        $amountCents = $invoice->amount_paid
            ?? ($subscription->interval === 'annual' ? $plan->annual_price_cents : $plan->monthly_price_cents)
            ?? 0;

        $stripeInvoiceId = $invoice->id ?? ('manual-renewal-' . $subscription->id . '-' . $periodStart->format('YmdHis'));

        return LeadBillingHistory::updateOrCreate(
            ['stripe_invoice_id' => $stripeInvoiceId],
            [
                'company_id' => $company->id,
                'subscription_id' => $subscription->id,
                'invoice_no' => ($invoice->number ?? null) ?: $this->makeInvoiceNumber(),
                'amount_cents' => $amountCents,
                'status' => (($invoice->status ?? null) === 'paid' || (($invoice->paid ?? false) === true)) ? 'paid' : 'paid',
                'paid_at' => isset($invoice->status_transitions->paid_at) && $invoice->status_transitions->paid_at
                    ? Carbon::createFromTimestamp($invoice->status_transitions->paid_at)
                    : now(),
                'payment_method' => 'stripe',
            ]
        );
    }

    protected function makeInvoiceNumber(): string
    {
        return 'INV-' . strtoupper(now()->format('Ymd')) . '-' . random_int(1000, 9999);
    }

    protected function sendRenewalEmails(object $company, LeadSubscriptionPlan $plan, CompanyLeadPlanSubscription $subscription, LeadBillingHistory $billingHistory): void
    {
        $companyEmail = $company->company_email ?: ($company->email ?? null);
        $adminEmail = config('mail.admin_address') ?: env('ADMIN_EMAIL', 'contact@mymovingjourney.com');

        if ($companyEmail) {
            Mail::to($companyEmail)->queue(new LeadPlanRenewed($company, $plan, $subscription, $billingHistory, false));
        }

        if ($adminEmail) {
            Mail::to($adminEmail)->queue(new LeadPlanRenewed($company, $plan, $subscription, $billingHistory, true));
        }
    }
}
