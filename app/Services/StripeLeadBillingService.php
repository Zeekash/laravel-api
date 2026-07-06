<?php

namespace App\Services;

use App\Models\LeadSubscriptionPlan;
use App\Models\CompanyLeadPlanSubscription;
use App\Models\LeadBillingHistory;
use App\Models\CompanyLeadUsage;
use App\Models\Company;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\StripeClient;

class StripeLeadBillingService
{
    public function client(): StripeClient
    {
        return new StripeClient(config('services.stripe.secret'));
    }

    public function ensureProductAndPrices(LeadSubscriptionPlan $plan): LeadSubscriptionPlan
    {
        $stripe = $this->client();
        $currency = config('services.stripe.currency', 'usd');

        if (! $plan->stripe_product_id) {
            $this->createProduct($plan, $stripe);
        } else {
            try {
                $stripe->products->update($plan->stripe_product_id, [
                    'name' => 'Lead Plan - ' . $plan->name,
                    'description' => $plan->description ?: null,
                    'active' => (bool) $plan->is_active,
                    'metadata' => [
                        'app' => config('app.name'),
                        'lead_plan_id' => (string) $plan->id,
                    ],
                ]);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                if ($e->getHttpStatus() === 404 || str_contains($e->getMessage(), 'No such product')) {
                    $this->createProduct($plan, $stripe);
                } else {
                    throw $e;
                }
            }
        }

        if (
            ! $plan->stripe_monthly_price_id ||
            (int) ($plan->stripe_monthly_price_cents ?? 0) !== (int) $plan->monthly_price_cents
        ) {
            $this->createMonthlyPrice($plan, $stripe, $currency);
        } else {
            try {
                $stripe->prices->retrieve($plan->stripe_monthly_price_id);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                if ($e->getHttpStatus() === 404 || str_contains($e->getMessage(), 'No such price')) {
                    $this->createMonthlyPrice($plan, $stripe, $currency);
                } else {
                    throw $e;
                }
            }
        }

        if (
            ! $plan->stripe_annual_price_id ||
            (int) ($plan->stripe_annual_price_cents ?? 0) !== (int) $plan->annual_price_cents
        ) {
            $this->createAnnualPrice($plan, $stripe, $currency);
        } else {
            try {
                $stripe->prices->retrieve($plan->stripe_annual_price_id);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                if ($e->getHttpStatus() === 404 || str_contains($e->getMessage(), 'No such price')) {
                    $this->createAnnualPrice($plan, $stripe, $currency);
                } else {
                    throw $e;
                }
            }
        }

        $plan->save();

        return $plan;
    }

    private function createProduct(LeadSubscriptionPlan $plan, StripeClient $stripe): void
    {
        $product = $stripe->products->create([
            'name' => 'Lead Plan - ' . $plan->name,
            'description' => $plan->description ?: null,
            'active' => (bool) $plan->is_active,
            'metadata' => [
                'app' => config('app.name'),
                'lead_plan_id' => (string) $plan->id,
            ],
        ]);

        $plan->stripe_product_id = $product->id;
    }

    private function createMonthlyPrice(LeadSubscriptionPlan $plan, StripeClient $stripe, string $currency): void
    {
        $price = $stripe->prices->create([
            'product' => $plan->stripe_product_id,
            'currency' => $currency,
            'unit_amount' => (int) $plan->monthly_price_cents,
            'recurring' => ['interval' => 'month'],
            'metadata' => [
                'lead_plan_id' => (string) $plan->id,
                'interval' => 'monthly',
                'amount_cents' => (string) $plan->monthly_price_cents,
            ],
        ]);

        if ($plan->stripe_monthly_price_id) {
            try {
                $stripe->prices->update($plan->stripe_monthly_price_id, ['active' => false]);
            } catch (\Throwable $e) {
                report($e);
            }
        }

        $plan->stripe_monthly_price_id = $price->id;
        $plan->stripe_monthly_price_cents = (int) $plan->monthly_price_cents;
    }

    private function createAnnualPrice(LeadSubscriptionPlan $plan, StripeClient $stripe, string $currency): void
    {
        $price = $stripe->prices->create([
            'product' => $plan->stripe_product_id,
            'currency' => $currency,
            'unit_amount' => (int) $plan->annual_price_cents,
            'recurring' => ['interval' => 'year'],
            'metadata' => [
                'lead_plan_id' => (string) $plan->id,
                'interval' => 'annual',
                'amount_cents' => (string) $plan->annual_price_cents,
            ],
        ]);

        if ($plan->stripe_annual_price_id) {
            try {
                $stripe->prices->update($plan->stripe_annual_price_id, ['active' => false]);
            } catch (\Throwable $e) {
                report($e);
            }
        }

        $plan->stripe_annual_price_id = $price->id;
        $plan->stripe_annual_price_cents = (int) $plan->annual_price_cents;
    }

    public function createCheckoutSession(array $data): \Stripe\Checkout\Session
    {
        $stripe = $this->client();

        return $stripe->checkout->sessions->create([
            'mode' => 'subscription',
            'customer' => $data['stripe_customer_id'],
            'line_items' => [
                [
                    'price' => $data['price_id'],
                    'quantity' => 1,
                ],
            ],
            'success_url' => $data['success_url'],
            'cancel_url' => $data['cancel_url'],
            'metadata' => [
                'company_id' => (string) $data['company_id'],
                'lead_plan_id' => (string) $data['lead_plan_id'],
                'interval' => (string) $data['interval'],
            ],
        ]);
    }

    public function createOrGetCustomer(?string $existingCustomerId, array $payload): string
    {
        $stripe = $this->client();

        if ($existingCustomerId) {
            return $existingCustomerId;
        }

        $customer = $stripe->customers->create([
            'email' => $payload['email'] ?? null,
            'name' => $payload['name'] ?? null,
            'metadata' => [
                'company_id' => (string) ($payload['company_id'] ?? ''),
            ],
        ]);

        return $customer->id;
    }

    public function fetchSubscription(string $subscriptionId): \Stripe\Subscription
    {
        return $this->client()->subscriptions->retrieve($subscriptionId, []);
    }

    public function changeSubscriptionPrice(string $subscriptionId, string $newPriceId): \Stripe\Subscription
    {
        $stripe = $this->client();
        $sub = $stripe->subscriptions->retrieve($subscriptionId, []);

        $itemId = $sub->items->data[0]->id ?? null;
        if (! $itemId) {
            throw new \RuntimeException('Stripe subscription has no items.');
        }

        return $stripe->subscriptions->update($subscriptionId, [
            'cancel_at_period_end' => false,
            'proration_behavior' => 'create_prorations',
            'items' => [
                [
                    'id' => $itemId,
                    'price' => $newPriceId,
                ],
            ],
        ]);
    }

    public function cancelSubscription(string $subscriptionId, bool $atPeriodEnd = true): \Stripe\Subscription
    {
        $stripe = $this->client();

        if ($atPeriodEnd) {
            return $stripe->subscriptions->update($subscriptionId, [
                'cancel_at_period_end' => true,
            ]);
        }

        return $stripe->subscriptions->cancel($subscriptionId, []);
    }

    public function renewSubscription($company, $plan, $interval): \Stripe\Subscription
    {
        $stripe = $this->client();

        $priceId = $interval === 'monthly'
            ? $plan->stripe_monthly_price_id
            : $plan->stripe_annual_price_id;

        if (! $priceId) {
            throw new \RuntimeException('Stripe price not configured for this plan.');
        }

        $stripe->customers->update($company->stripe_customer_id, [
            'invoice_settings' => [
                'default_payment_method' => $company->stripe_payment_method_id,
            ],
        ]);

        return $stripe->subscriptions->create([
            'customer' => $company->stripe_customer_id,
            'items' => [['price' => $priceId]],
            'default_payment_method' => $company->stripe_payment_method_id,
        ]);
    }

    public function completeRenewalProcess(CompanyLeadPlanSubscription $subscription, \Stripe\Subscription $stripeSubscription, $company, $plan): void
    {
        $currentPeriodEnd = ($stripeSubscription->current_period_end ?? null)
            ? now()->createFromTimestamp($stripeSubscription->current_period_end)
            : ($subscription->interval === 'annual' ? now()->addYear() : now()->addMonth());

        \Illuminate\Support\Facades\DB::table('company_lead_plan_subscriptions')
            ->where('id', $subscription->id)
            ->update([
                'stripe_subscription_id' => $stripeSubscription->id,
                'status' => 'active',
                'cancel_at_period_end' => false,
                'current_period_end' => $currentPeriodEnd,
                'cancelled_at' => null,
                'created_at' => now(),
                'extra_leads_charged' => 0,
            ]);

        $invoice = $stripeSubscription->latest_invoice ?? null;
        if (is_string($invoice)) {
            $invoice = $this->client()->invoices->retrieve($invoice);
        }

        if ($invoice && isset($invoice->id)) {
            LeadBillingHistory::updateOrCreate(
                ['stripe_invoice_id' => $invoice->id],
                [
                    'company_id' => $company->id,
                    'subscription_id' => $subscription->id,
                    'invoice_no' => 'INV-' . strtoupper(now()->format('Ymd')) . '-' . rand(1000, 9999),
                    'amount_cents' => $invoice->amount_paid ?? 0,
                    'status' => 'paid',
                    'paid_at' => now(),
                    'payment_method' => 'stripe',
                ]
            );
        }

        CompanyLeadUsage::updateOrCreate(
            [
                'company_id' => $company->id,
                'period_start' => now()->toDateString(),
                'period_end' => $currentPeriodEnd->toDateString(),
            ],
            [
                'lead_subscription_plan_id' => $plan->id,
                'leads_allowed' => $plan->leads_per_month,
                'leads_used' => 0,
            ]
        );

        Company::where('id', $company->id)->update([
            'listing_fee_status' => 'paid',
            'listing_fee_paid_at' => now(),
            'trial_ends_at' => null,
            'is_certified' => 1,
        ]);

        try {
            $email = $company->company_email ?? $company->email;

            Mail::send('emails.lead-subscriptions.renewed-mail', [
                'company' => $company,
                'plan' => $plan,
                'isAdmin' => false,
                'subscription' => $subscription,
            ], function ($message) use ($email, $plan) {
                $message->to($email)->subject("Your {$plan->name} Subscription Plan has been renewed!");
            });

            Mail::send('emails.lead-subscriptions.renewed-mail', [
                'company' => $company,
                'plan' => $plan,
                'isAdmin' => true,
                'subscription' => $subscription,
            ], function ($message) use ($company) {
                $message->to('contact@mygoodmovers.com')->subject("Subscription Renewed: {$company->company_name}");
            });
        } catch (\Throwable $e) {
            Log::error('Lead Renewal Email failed: ' . $e->getMessage());
        }
    }
}
