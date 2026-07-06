<?php

namespace App\Console\Commands;

use App\Mail\StateFeaturedSlotCancelledMail;
use App\Mail\StateFeaturedSlotRenewedMail;
use App\Models\StateFeaturedSubscription;
use App\Models\StateFeaturedSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Stripe\StripeClient;

class SyncStateFeaturedSubscriptions extends Command
{
    protected $signature = 'states:sync-featured-subscriptions';
    protected $description = 'Sync state featured subscriptions from Stripe, renew due local subscriptions in Stripe, and send renewal emails without webhooks.';

    public function handle(): int
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        $this->expireOldPendingReservations();
        $this->finishDueCancellations($stripe);

        /**
         * 1) Normal recurring Stripe subscriptions.
         * Stripe renews these automatically. This command makes sure open renewal invoices
         * are paid from the saved default card, then stores the paid invoice locally and emails users.
         */
        StateFeaturedSubscription::with(['company', 'state', 'slot'])
            ->whereNotNull('stripe_subscription_id')
            ->whereIn('status', ['active', 'past_due', 'pending', 'incomplete'])
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $local) {
                    try {
                        $this->syncExistingStripeSubscription($stripe, $local);
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Stripe sync failed for local subscription #{$local->id}: {$e->getMessage()}");
                    }
                }
            });

        /**
         * 2) Legacy/local-only subscriptions.
         * If an old row has no stripe_subscription_id but the paid period has ended,
         * create a real Stripe recurring subscription now using the company's saved card.
         */
        StateFeaturedSubscription::with(['company', 'state', 'slot'])
            ->whereNull('stripe_subscription_id')
            ->whereIn('status', ['active', 'past_due'])
            ->where(function ($q) {
                $q->where('cancel_at_period_end', false)->orWhereNull('cancel_at_period_end');
            })
            ->whereNotNull('ends_at')
            ->where('ends_at', '<=', now())
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $local) {
                    try {
                        $this->renewLocalSubscriptionInStripe($stripe, $local);
                    } catch (\Throwable $e) {
                        report($e);
                        $local->update(['status' => 'past_due']);
                        $this->warn("Stripe renewal failed for local subscription #{$local->id}: {$e->getMessage()}");
                    }
                }
            });

        $this->info('State featured subscriptions synced. Due cancellations released, Stripe renewals processed, and emails sent.');

        return self::SUCCESS;
    }

    private function expireOldPendingReservations(): void
    {
        StateFeaturedSubscription::where('status', 'pending')
            ->whereNotNull('reserved_until')
            ->where('reserved_until', '<', now())
            ->update(['status' => 'expired', 'reserved_until' => null]);
    }

    /**
     * When a company cancels, we set cancel_at_period_end=true and keep the slot taken
     * until ends_at. Once ends_at passes, this method marks it canceled locally,
     * releases the slot, and sends cancellation emails.
     */
    private function finishDueCancellations(StripeClient $stripe): void
    {
        StateFeaturedSubscription::with(['company', 'state', 'slot'])
            ->whereIn('status', ['active', 'past_due', 'pending'])
            ->where('cancel_at_period_end', true)
            ->whereNotNull('ends_at')
            ->where('ends_at', '<=', now())
            ->chunkById(50, function ($subscriptions) use ($stripe) {
                foreach ($subscriptions as $subscription) {
                    try {
                        if ($subscription->stripe_subscription_id) {
                            $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id, []);

                            if (($stripeSub->status ?? null) !== 'canceled') {
                                $stripe->subscriptions->cancel($subscription->stripe_subscription_id, []);
                            }
                        }

                        $subscription->update([
                            'status' => 'canceled',
                            'cancel_at_period_end' => false,
                            'reserved_until' => null,
                            'ends_at' => $subscription->ends_at ?: now(),
                        ]);

                        $this->sendCancellationEmails($subscription->fresh(['company', 'state', 'slot']));

                        $this->info("Cancelled subscription #{$subscription->id}. Slot is now available.");
                    } catch (\Throwable $e) {
                        report($e);
                        $this->warn("Cancellation sync failed for subscription #{$subscription->id}: {$e->getMessage()}");
                    }
                }
            });
    }

    private function syncExistingStripeSubscription(StripeClient $stripe, StateFeaturedSubscription $local): void
    {
        $stripeSub = $stripe->subscriptions->retrieve($local->stripe_subscription_id, [
            'expand' => [
                'default_payment_method',
                'latest_invoice.payment_intent',
                'latest_invoice.lines.data.price',
            ],
        ]);

        $latestInvoice = $this->invoiceFromStripeSubscription($stripe, $stripeSub);

        if ($latestInvoice && in_array(($latestInvoice->status ?? null), ['draft', 'open'], true)) {
            $latestInvoice = $this->payStripeInvoiceIfPossible($stripe, $local, $latestInvoice);
        }

        $status = $this->normalizeStripeStatus($stripeSub->status ?? null);

        $local->update([
            'status' => $status,
            'reserved_until' => null,
            'starts_at' => ! empty($stripeSub->current_period_start)
                ? Carbon::createFromTimestamp($stripeSub->current_period_start)
                : $local->starts_at,
            'ends_at' => ! empty($stripeSub->current_period_end)
                ? Carbon::createFromTimestamp($stripeSub->current_period_end)
                : $local->ends_at,
            'cancel_at_period_end' => (bool) ($stripeSub->cancel_at_period_end ?? false),
        ]);

        if ($latestInvoice) {
            $this->storeStripeInvoice($local->fresh(['company', 'state', 'slot']), $latestInvoice, true);
        }
    }

    private function renewLocalSubscriptionInStripe(StripeClient $stripe, StateFeaturedSubscription $local): void
    {
        $local->loadMissing(['company', 'state', 'slot']);

        if (! $local->company) {
            throw new \RuntimeException('Company record not found.');
        }

        $customerId = $this->getStripeCustomerId($stripe, $local);
        $paymentMethodId = $this->getCompanyPaymentMethodId($local, $customerId);

        if (! $paymentMethodId) {
            $local->update(['status' => 'past_due']);
            throw new \RuntimeException('Company has no saved Stripe payment method.');
        }

        $stripe->customers->update($customerId, [
            'invoice_settings' => [
                'default_payment_method' => $paymentMethodId,
            ],
        ]);

        [$subscriptionItems, $priceUpdates] = $this->stripeSubscriptionItems($stripe, $local);

        $stripeSub = $stripe->subscriptions->create([
            'customer' => $customerId,
            'items' => $subscriptionItems,
            'default_payment_method' => $paymentMethodId,
            'collection_method' => 'charge_automatically',
            'payment_behavior' => 'error_if_incomplete',
            'metadata' => [
                'state_featured_subscription_id' => (string) $local->id,
                'company_id' => (string) $local->company_id,
                'state_id' => (string) $local->state_id,
                'slot_id' => (string) $local->state_featured_slot_id,
                'renewed_by' => 'states:sync-featured-subscriptions',
            ],
            'expand' => [
                'latest_invoice.payment_intent',
                'latest_invoice.lines.data.price',
            ],
        ]);

        $local->update($priceUpdates + [
            'stripe_customer_id' => $customerId,
            'stripe_subscription_id' => $stripeSub->id,
            'status' => $this->normalizeStripeStatus($stripeSub->status ?? null),
            'reserved_until' => null,
            'starts_at' => ! empty($stripeSub->current_period_start)
                ? Carbon::createFromTimestamp($stripeSub->current_period_start)
                : now(),
            'ends_at' => ! empty($stripeSub->current_period_end)
                ? Carbon::createFromTimestamp($stripeSub->current_period_end)
                : ($local->billing_cycle === 'yearly' ? now()->addYear() : now()->addMonth()),
            'cancel_at_period_end' => false,
        ]);

        $latestInvoice = $this->invoiceFromStripeSubscription($stripe, $stripeSub);

        if ($latestInvoice) {
            $this->storeStripeInvoice($local->fresh(['company', 'state', 'slot']), $latestInvoice, true);
        }
    }

    private function getStripeCustomerId(StripeClient $stripe, StateFeaturedSubscription $local): string
    {
        $customerId = $local->stripe_customer_id ?: ($local->company->stripe_customer_id ?? null);

        if ($customerId) {
            try {
                $stripe->customers->retrieve($customerId, []);
                return $customerId;
            } catch (\Throwable $e) {
                // Invalid/deleted Stripe customer ID. Create a new one below.
            }
        }

        $company = $local->company;

        $customer = $stripe->customers->create([
            'email' => $company->company_email ?? $company->email ?? $company->contact_email ?? $company->billing_email ?? null,
            'name' => $company->company_name ?? $company->name ?? $company->full_name ?? 'Company',
            'metadata' => [
                'company_id' => (string) $company->id,
            ],
        ]);

        $local->update(['stripe_customer_id' => $customer->id]);

        if ($this->modelHasColumn($company, 'stripe_customer_id')) {
            $company->forceFill(['stripe_customer_id' => $customer->id])->save();
        }

        return $customer->id;
    }

    private function getCompanyPaymentMethodId(StateFeaturedSubscription $local, string $customerId): ?string
    {
        $company = $local->company;
        $paymentMethodId = $company->stripe_payment_method_id ?? null;

        if ($paymentMethodId) {
            return $paymentMethodId;
        }

        return null;
    }

    private function stripeSubscriptionItems(StripeClient $stripe, StateFeaturedSubscription $local): array
    {
        $basePriceId = $this->ensureStripePrice($stripe, $local, 'state_slot');

        $items = [[
            'price' => $basePriceId,
            'quantity' => 1,
        ]];

        $updates = [
            'stripe_price_id' => $basePriceId,
        ];

        if ((bool) $local->lead_addon_selected && (int) $local->lead_addon_price_cents > 0) {
            $leadAddonPriceId = $this->ensureStripePrice($stripe, $local, 'lead_addon');

            $items[] = [
                'price' => $leadAddonPriceId,
                'quantity' => 1,
            ];

            $updates['stripe_lead_addon_price_id'] = $leadAddonPriceId;
        }

        return [$items, $updates];
    }

    private function ensureStripePrice(StripeClient $stripe, StateFeaturedSubscription $local, string $itemType = 'state_slot'): string
    {
        $interval = $local->billing_cycle === 'yearly' ? 'year' : 'month';
        $isLeadAddon = $itemType === 'lead_addon';
        $priceCents = $isLeadAddon ? (int) $local->lead_addon_price_cents : (int) $local->price_cents;
        $currentPriceId = $isLeadAddon ? $local->stripe_lead_addon_price_id : $local->stripe_price_id;

        if ($priceCents <= 0) {
            throw new \RuntimeException($isLeadAddon ? 'Lead add-on price is missing.' : 'Slot price is missing.');
        }

        if ($currentPriceId) {
            try {
                $existing = $stripe->prices->retrieve($currentPriceId, []);
                $existingInterval = $existing->recurring->interval ?? null;

                if ((int) ($existing->unit_amount ?? 0) === $priceCents && $existingInterval === $interval && ($existing->active ?? true)) {
                    return $existing->id;
                }
            } catch (\Throwable $e) {
                // Missing/deleted price. Create a new price below.
            }
        }

        $stateName = optional($local->state)->name ?: 'State';
        $stateAbv = optional($local->state)->abv ?: '';
        $slotNumber = optional($local->slot)->slot_number ?: $local->state_featured_slot_id;
        $leadCount = (int) ($local->lead_addon_leads_count ?: 5);

        $productName = $isLeadAddon
            ? trim("Leads Add-on - {$leadCount} leads - {$stateName} {$stateAbv}")
            : trim("Featured State Ad - {$stateName} {$stateAbv} - Slot {$slotNumber}");

        $productId = $isLeadAddon ? $local->stripe_lead_addon_product_id : $local->stripe_product_id;

        if ($productId) {
            try {
                $stripe->products->retrieve($productId, []);
            } catch (\Throwable $e) {
                $productId = null;
            }
        }

        if (! $productId) {
            $product = $stripe->products->create([
                'name' => $productName,
                'metadata' => [
                    'state_featured_subscription_id' => (string) $local->id,
                    'company_id' => (string) $local->company_id,
                    'state_id' => (string) $local->state_id,
                    'slot_id' => (string) $local->state_featured_slot_id,
                    'item_type' => $itemType,
                ],
            ]);
            $productId = $product->id;
        }

        $priceMetadata = [
            'state_featured_subscription_id' => (string) $local->id,
            'company_id' => (string) $local->company_id,
            'item_type' => $itemType,
        ];

        if ($isLeadAddon) {
            $priceMetadata['lead_addon_leads_count'] = (string) $leadCount;
        }

        $price = $stripe->prices->create([
            'unit_amount' => $priceCents,
            'currency' => 'usd',
            'recurring' => ['interval' => $interval],
            'product' => $productId,
            'metadata' => $priceMetadata,
        ]);

        if ($isLeadAddon) {
            $local->update([
                'stripe_lead_addon_product_id' => $productId,
                'stripe_lead_addon_price_id' => $price->id,
            ]);
        } else {
            $local->update([
                'stripe_product_id' => $productId,
                'stripe_price_id' => $price->id,
            ]);
        }

        return $price->id;
    }

    private function invoiceFromStripeSubscription(StripeClient $stripe, $stripeSub)
    {
        if (empty($stripeSub->latest_invoice)) {
            return null;
        }

        if (is_string($stripeSub->latest_invoice)) {
            return $stripe->invoices->retrieve($stripeSub->latest_invoice, [
                'expand' => ['payment_intent', 'lines.data.price'],
            ]);
        }

        return $stripeSub->latest_invoice;
    }

    private function payStripeInvoiceIfPossible(StripeClient $stripe, StateFeaturedSubscription $local, $invoice)
    {
        if (! $invoice || empty($invoice->id)) {
            return $invoice;
        }

        if (($invoice->status ?? null) === 'draft') {
            $invoice = $stripe->invoices->finalizeInvoice($invoice->id, [
                'expand' => ['payment_intent', 'lines.data.price'],
            ]);
        }

        if (($invoice->status ?? null) !== 'open') {
            return $invoice;
        }

        if ((int) ($invoice->amount_remaining ?? 0) <= 0) {
            return $invoice;
        }

        $paymentMethodId = $this->getCompanyPaymentMethodId($local->loadMissing('company'), $local->stripe_customer_id);

        $payParams = [];
        if ($paymentMethodId) {
            $payParams['payment_method'] = $paymentMethodId;
        }

        return $stripe->invoices->pay($invoice->id, $payParams + [
            'expand' => ['payment_intent', 'lines.data.price'],
        ]);
    }

    private function normalizeStripeStatus(?string $stripeStatus): string
    {
        return match ($stripeStatus) {
            'active', 'trialing' => 'active',
            'past_due' => 'past_due',
            'incomplete' => 'pending',
            'canceled' => 'canceled',
            'unpaid', 'incomplete_expired' => 'expired',
            default => $stripeStatus ?: 'pending',
        };
    }

    private function storeStripeInvoice(StateFeaturedSubscription $subscription, $invoice, bool $sendRenewalEmail): ?StateFeaturedSubscriptionInvoice
    {
        if (! $invoice || empty($invoice->id)) {
            return null;
        }

        $invoiceAlreadyExists = StateFeaturedSubscriptionInvoice::where('stripe_invoice_id', $invoice->id)->exists();
        $existingInvoiceCount = StateFeaturedSubscriptionInvoice::where('state_featured_subscription_id', $subscription->id)->count();

        [$periodStart, $periodEnd] = $this->resolveStripeInvoicePeriod($invoice, $subscription);

        $invoiceModel = StateFeaturedSubscriptionInvoice::updateOrCreate(
            ['stripe_invoice_id' => $invoice->id],
            [
                'state_featured_subscription_id' => $subscription->id,
                'company_id' => $subscription->company_id,
                'amount_paid_cents' => (int) ($invoice->amount_paid ?? 0),
                'slot_price_cents' => (int) ($subscription->price_cents ?? 0),
                'lead_addon_price_cents' => (int) ($subscription->lead_addon_price_cents ?? 0),
                'lead_addon_leads_count' => (int) ($subscription->lead_addon_leads_count ?? 0),
                'currency' => $invoice->currency ?? 'usd',
                'status' => $invoice->status ?? null,
                'period_start' => $periodStart,
                'period_end' => $periodEnd,
                'paid_at' => ! empty($invoice->status_transitions->paid_at)
                    ? Carbon::createFromTimestamp($invoice->status_transitions->paid_at)
                    : null,
                'hosted_invoice_url' => $invoice->hosted_invoice_url ?? null,
                'invoice_pdf' => $invoice->invoice_pdf ?? null,
            ]
        );

        $isNewPaidRenewalInvoice = ! $invoiceAlreadyExists
            && $existingInvoiceCount > 0
            && ($invoice->status ?? null) === 'paid'
            && (int) ($invoice->amount_paid ?? 0) > 0;

        if ($sendRenewalEmail && $isNewPaidRenewalInvoice) {
            $this->sendRenewalEmails($subscription->fresh(['company', 'state', 'slot']), $invoiceModel);
        }

        return $invoiceModel;
    }

    private function resolveStripeInvoicePeriod($invoice, ?StateFeaturedSubscription $subscription = null): array
    {
        foreach (($invoice->lines->data ?? []) as $line) {
            $lineSubscription = $line->subscription ?? null;
            $lineSubscriptionId = is_string($lineSubscription)
                ? $lineSubscription
                : ($lineSubscription->id ?? null);

            if (
                $subscription
                && $subscription->stripe_subscription_id
                && $lineSubscriptionId
                && $lineSubscriptionId !== $subscription->stripe_subscription_id
            ) {
                continue;
            }

            $lineStart = $line->period->start ?? null;
            $lineEnd = $line->period->end ?? null;

            if ($lineStart && $lineEnd && $lineEnd > $lineStart) {
                return [
                    Carbon::createFromTimestamp($lineStart),
                    Carbon::createFromTimestamp($lineEnd),
                ];
            }
        }

        if (! empty($invoice->period_start) && ! empty($invoice->period_end) && $invoice->period_end > $invoice->period_start) {
            return [
                Carbon::createFromTimestamp($invoice->period_start),
                Carbon::createFromTimestamp($invoice->period_end),
            ];
        }

        if ($subscription && $subscription->starts_at && $subscription->ends_at) {
            $start = Carbon::parse($subscription->starts_at);
            $end = Carbon::parse($subscription->ends_at);

            if ($end->greaterThan($start)) {
                return [$start, $end];
            }
        }

        $start = ! empty($invoice->period_start)
            ? Carbon::createFromTimestamp($invoice->period_start)
            : (! empty($invoice->status_transitions->paid_at)
                ? Carbon::createFromTimestamp($invoice->status_transitions->paid_at)
                : now());

        $end = ($subscription && $subscription->billing_cycle === 'yearly')
            ? $start->copy()->addYear()
            : $start->copy()->addMonth();

        return [$start, $end];
    }

    private function sendCancellationEmails(?StateFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'state', 'slot']);

        try {
            $companyEmail = $this->companyEmail($subscription->company);

            if ($companyEmail) {
                Mail::to($companyEmail)->send(new StateFeaturedSlotCancelledMail($subscription, false));
            }

            foreach ($this->adminEmails() as $adminEmail) {
                Mail::to($adminEmail)->send(new StateFeaturedSlotCancelledMail($subscription, true));
            }
        } catch (\Throwable $e) {
            report($e);
        }
    }

    private function sendRenewalEmails(?StateFeaturedSubscription $subscription, ?StateFeaturedSubscriptionInvoice $invoice = null): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'state', 'slot']);

        try {
            $companyEmail = $this->companyEmail($subscription->company);

            if ($companyEmail) {
                Mail::to($companyEmail)->send(new StateFeaturedSlotRenewedMail($subscription, $invoice, false));
            }

            foreach ($this->adminEmails() as $adminEmail) {
                Mail::to($adminEmail)->send(new StateFeaturedSlotRenewedMail($subscription, $invoice, true));
            }
        } catch (\Throwable $e) {
            report($e);
        }
    }

    private function companyEmail($company): ?string
    {
        if (! $company) {
            return null;
        }

        foreach (['company_email', 'email', 'contact_email', 'billing_email'] as $field) {
            if (! empty($company->{$field}) && filter_var($company->{$field}, FILTER_VALIDATE_EMAIL)) {
                return $company->{$field};
            }
        }

        return null;
    }

    private function adminEmails(): array
    {
        return ['contact@mymovingjourney.com'];
    }

    private function modelHasColumn($model, string $column): bool
    {
        try {
            return $model && Schema::hasColumn($model->getTable(), $column);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
