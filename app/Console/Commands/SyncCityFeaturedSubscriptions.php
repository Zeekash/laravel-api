<?php

namespace App\Console\Commands;

use App\Mail\CityFeaturedSlotCancelledMail;
use App\Mail\CityFeaturedSlotRenewedMail;
use App\Models\CityFeaturedSlot;
use App\Models\CityFeaturedSubscription;
use App\Models\CityFeaturedSubscriptionInvoice;
use App\Models\CityPage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\StripeClient;

class SyncCityFeaturedSubscriptions extends Command
{
    protected $signature = 'cities:sync-featured-subscriptions';
    protected $description = 'Sync city featured ad subscriptions with Stripe, store paid invoices, send renewal/cancellation emails, and release expired canceled slots.';

    public function handle(): int
    {
        $this->ensureSlotsForAllCities();

        $stripe = new StripeClient(config('services.stripe.secret'));

        CityFeaturedSubscription::with(['company', 'cityPage.state', 'slot'])
            ->whereIn('status', ['active', 'past_due'])
            ->whereNotNull('stripe_subscription_id')
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

                        $this->storePaidInvoices($stripe, $subscription->fresh(['company', 'cityPage.state', 'slot']));
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Sync failed for city featured subscription #{$subscription->id}: {$e->getMessage()}");
                    }
                }
            });

        CityFeaturedSubscription::with(['company', 'cityPage.state', 'slot'])
            ->whereIn('status', ['active', 'past_due'])
            ->where('cancel_at_period_end', true)
            ->whereNotNull('ends_at')
            ->where('ends_at', '<=', now())
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $subscription) {
                    try {
                        if ($subscription->stripe_subscription_id) {
                            $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id, []);

                            if (($stripeSub->status ?? null) !== 'canceled') {
                                try {
                                    $stripe->subscriptions->cancel($subscription->stripe_subscription_id, []);
                                } catch (\Throwable $e) {
                                    // Stripe may have already cancelled at period end.
                                }
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
                            $this->sendCancellationEmails($subscription->fresh(['company', 'cityPage.state', 'slot']));
                        }

                        $this->info("Released city featured slot for subscription #{$subscription->id}");
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Cancellation release failed for #{$subscription->id}: {$e->getMessage()}");
                    }
                }
            });

        return self::SUCCESS;
    }

    private function storePaidInvoices(StripeClient $stripe, CityFeaturedSubscription $subscription): void
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
            $periodStart = null;
            $periodEnd = null;

            $line = $invoice->lines->data[0] ?? null;
            if ($line && ! empty($line->period)) {
                $periodStart = ! empty($line->period->start) ? Carbon::createFromTimestamp($line->period->start) : null;
                $periodEnd = ! empty($line->period->end) ? Carbon::createFromTimestamp($line->period->end) : null;
            }

            $periodStart = $periodStart ?: $subscription->starts_at ?: now();
            $periodEnd = $periodEnd ?: $subscription->ends_at ?: ($subscription->billing_cycle === 'yearly' ? now()->addYear() : now()->addMonth());

            $invoiceRow = CityFeaturedSubscriptionInvoice::updateOrCreate(
                ['stripe_invoice_id' => $invoice->id],
                [
                    'city_featured_subscription_id' => $subscription->id,
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

            if ($invoiceRow->wasRecentlyCreated) {
                $this->sendRenewalEmails($subscription->fresh(['company', 'cityPage.state', 'slot']), $invoiceRow);
            }
        }
    }

    private function sendRenewalEmails(?CityFeaturedSubscription $subscription, CityFeaturedSubscriptionInvoice $invoice): void
    {
        if (! $subscription) {
            return;
        }

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new CityFeaturedSlotRenewedMail($subscription, $invoice, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('City featured renewal email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
            }
        }
    }

    private function sendCancellationEmails(?CityFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new CityFeaturedSlotCancelledMail($subscription, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('City featured cancellation email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
            }
        }
    }

    private function mailRecipients(CityFeaturedSubscription $subscription): array
    {
        $recipients = [];
        $companyEmail = $this->companyEmail($subscription->company);

        if ($companyEmail) {
            $recipients[] = ['email' => $companyEmail, 'is_admin' => false];
        }

        foreach ($this->adminEmails() as $adminEmail) {
            $recipients[] = ['email' => $adminEmail, 'is_admin' => true];
        }

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

    private function adminEmails(): array
    {
        return ['contact@mymovingjourney.com'];
    }

    private function ensureSlotsForAllCities(): void
    {
        CityPage::query()->select('id')->chunkById(100, function ($cities) {
            foreach ($cities as $city) {
                for ($i = 1; $i <= 3; $i++) {
                    CityFeaturedSlot::firstOrCreate(
                        ['city_page_id' => $city->id, 'slot_number' => $i],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 59900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 599000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 17,
                            'perks' => [
                                'Sponsored label on city page',
                                'Higher visibility for verified movers',
                                'Monthly performance exposure',
                            ],
                            'is_active' => true,
                            'sort_order' => $i,
                        ]
                    );
                }
            }
        });
    }
}
