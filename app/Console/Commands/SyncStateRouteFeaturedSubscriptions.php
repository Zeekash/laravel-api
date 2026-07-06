<?php

namespace App\Console\Commands;

use App\Mail\StateRouteFeaturedSlotCancelledMail;
use App\Mail\StateRouteFeaturedSlotRenewedMail;
use App\Models\StateRouteFeaturedSubscription;
use App\Models\StateRouteFeaturedSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\StripeClient;

class SyncStateRouteFeaturedSubscriptions extends Command
{
    protected $signature = 'routes:sync-featured-subscriptions';
    protected $description = 'Sync route featured subscriptions from Stripe without webhooks, store renewal invoices, release canceled slots.';

    public function handle(): int
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        StateRouteFeaturedSubscription::query()
            ->with(['company', 'fromState', 'toState', 'slot'])
            ->whereNotNull('stripe_subscription_id')
            ->whereIn('status', ['active', 'past_due', 'trialing'])
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $subscription) {
                    try {
                        $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id, []);

                        $startsAt = ! empty($stripeSub->current_period_start)
                            ? Carbon::createFromTimestamp($stripeSub->current_period_start)
                            : $subscription->starts_at;

                        $endsAt = ! empty($stripeSub->current_period_end)
                            ? Carbon::createFromTimestamp($stripeSub->current_period_end)
                            : $subscription->ends_at;

                        $localStatus = in_array($stripeSub->status, ['active', 'past_due'], true)
                            ? $stripeSub->status
                            : ($stripeSub->status === 'canceled' ? 'canceled' : $subscription->status);

                        $subscription->update([
                            'status' => $localStatus,
                            'starts_at' => $startsAt,
                            'ends_at' => $endsAt,
                            'cancel_at_period_end' => (bool) ($stripeSub->cancel_at_period_end ?? false),
                        ]);

                        $this->storePaidInvoices($stripe, $subscription->fresh(['company', 'fromState', 'toState', 'slot']));
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Sync failed for route featured subscription #{$subscription->id}: {$e->getMessage()}");
                    }
                }
            });

        StateRouteFeaturedSubscription::query()
            ->with(['company', 'fromState', 'toState', 'slot'])
            ->whereIn('status', ['active', 'past_due'])
            ->where('cancel_at_period_end', true)
            ->whereNotNull('ends_at')
            ->where('ends_at', '<=', now())
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $subscription) {
                    try {
                        if ($subscription->stripe_subscription_id) {
                            try {
                                $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id, []);
                                if (($stripeSub->status ?? null) !== 'canceled') {
                                    $stripe->subscriptions->cancel($subscription->stripe_subscription_id, []);
                                }
                            } catch (\Throwable $e) {
                                // Stripe may already be canceled. Local release should still happen.
                            }
                        }

                        $sendEmail = empty($subscription->canceled_at);

                        $subscription->update([
                            'status' => 'canceled',
                            'cancel_at_period_end' => false,
                            'reserved_until' => null,
                            'canceled_at' => $subscription->canceled_at ?: now(),
                            'ends_at' => $subscription->ends_at ?: now(),
                        ]);

                        if ($sendEmail) {
                            $this->sendCancellationEmails($subscription->fresh(['company', 'fromState', 'toState', 'slot']));
                        }

                        $this->info("Released route featured slot for subscription #{$subscription->id}");
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Cancellation release failed for route subscription #{$subscription->id}: {$e->getMessage()}");
                    }
                }
            });

        return self::SUCCESS;
    }

    private function storePaidInvoices(StripeClient $stripe, StateRouteFeaturedSubscription $subscription): void
    {
        if (! $subscription->stripe_subscription_id) {
            return;
        }

        $invoices = $stripe->invoices->all([
            'subscription' => $subscription->stripe_subscription_id,
            'status' => 'paid',
            'limit' => 10,
            'expand' => ['data.lines'],
        ]);

        foreach ($invoices->data as $invoice) {
            $line = $invoice->lines->data[0] ?? null;

            $periodStart = ($line && ! empty($line->period->start))
                ? Carbon::createFromTimestamp($line->period->start)
                : ($subscription->starts_at ?: now());

            $periodEnd = ($line && ! empty($line->period->end))
                ? Carbon::createFromTimestamp($line->period->end)
                : ($subscription->ends_at ?: ($subscription->billing_cycle === 'yearly' ? now()->addYear() : now()->addMonth()));

            $invoiceRow = StateRouteFeaturedSubscriptionInvoice::updateOrCreate(
                ['stripe_invoice_id' => $invoice->id],
                [
                    'state_route_featured_subscription_id' => $subscription->id,
                    'company_id' => $subscription->company_id,
                    'amount_paid_cents' => (int) ($invoice->amount_paid ?? $subscription->price_cents),
                    'currency' => $invoice->currency ?? 'usd',
                    'status' => $invoice->status ?? null,
                    'period_start' => $periodStart,
                    'period_end' => $periodEnd,
                    'paid_at' => ! empty($invoice->status_transitions->paid_at)
                        ? Carbon::createFromTimestamp($invoice->status_transitions->paid_at)
                        : now(),
                    'hosted_invoice_url' => $invoice->hosted_invoice_url ?? null,
                    'invoice_pdf' => $invoice->invoice_pdf ?? null,
                ]
            );

            if ($invoiceRow->wasRecentlyCreated && ($invoice->status ?? null) === 'paid') {
                $this->sendRenewalEmails($subscription->fresh(['company', 'fromState', 'toState', 'slot']), $invoiceRow);
            }
        }
    }

    private function sendRenewalEmails(?StateRouteFeaturedSubscription $subscription, StateRouteFeaturedSubscriptionInvoice $invoice): void
    {
        if (! $subscription) {
            return;
        }

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new StateRouteFeaturedSlotRenewedMail($subscription, $invoice, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('State route featured renewal email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
            }
        }
    }

    private function sendCancellationEmails(?StateRouteFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new StateRouteFeaturedSlotCancelledMail($subscription, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('State route featured cancellation email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
            }
        }
    }

    private function mailRecipients(StateRouteFeaturedSubscription $subscription): array
    {
        $recipients = [];
        $companyEmail = $this->companyEmail($subscription->company);

        if ($companyEmail) {
            $recipients[] = ['email' => $companyEmail, 'is_admin' => false];
        }

        $recipients[] = ['email' => 'contact@mymovingjourney.com', 'is_admin' => true];

        return $recipients;
    }

    private function companyEmail($company): ?string
    {
        if (! $company) {
            return null;
        }

        foreach (['company_email', 'email', 'contact_email', 'billing_email'] as $field) {
            $email = trim((string) ($company->{$field} ?? ''));
            if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $email;
            }
        }

        return null;
    }
}