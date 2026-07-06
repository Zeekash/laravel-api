<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Mail\StateFeaturedSlotCancelledMail;
use App\Mail\StateFeaturedSlotPurchasedMail;
use App\Models\Company;
use App\Models\State;
use App\Models\StateFeaturedSlot;
use App\Models\StateFeaturedSubscription;
use App\Models\StateFeaturedSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Stripe\StripeClient;

class StateFeaturedAdController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search'));
        $company = $this->company();

        $states = State::with(['featuredSlots' => function ($q) {
            $q->with(['activeSubscription.company', 'pendingReservation.company'])
                ->where('is_active', true)
                ->orderBy('slot_number');
        }])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($qq) use ($search) {
                    $qq->where('name', 'like', "%{$search}%")
                        ->orWhere('abv', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->get();

        $mySubscriptions = StateFeaturedSubscription::with(['state', 'slot'])
            ->where('company_id', optional($company)->id)
            ->whereIn('status', ['active', 'past_due', 'pending'])
            ->latest()
            ->get();

        return view('company.state-featured-ads.index', compact('states', 'mySubscriptions', 'search'));
    }

    /**
     * This method keeps the old route name "checkout" so your current form does not need to change.
     * It does NOT open Stripe Checkout. It charges the company's saved default card directly.
     */
    public function checkout(Request $request)
    {
        $data = $request->validate([
            'slot_id' => ['required', 'exists:state_featured_slots,id'],
            'billing_cycle' => ['required', 'in:monthly,yearly'],
            'lead_addon' => ['nullable', 'boolean'],
        ]);

        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found for this account.');

        $stripe = new StripeClient(config('services.stripe.secret'));
        $stripeCustomerId = $this->getOrCreateStripeCustomer($stripe, $company);
        $paymentMethodId = $this->resolveCompanyDefaultPaymentMethod($stripe, $company, $stripeCustomerId);

        if (! $paymentMethodId) {
            return $this->redirectToPaymentMethods(
                'Please add a card first before reserving a sponsored state slot.'
            );
        }

        $slot = StateFeaturedSlot::with('state')->findOrFail($data['slot_id']);
        $billingCycle = $data['billing_cycle'];
        $priceCents = $slot->priceCentsFor($billingCycle);
        $leadAddonSelected = $request->boolean('lead_addon');
        $leadAddonLeadsCount = 0;
        $leadAddonPriceCents = 0;

        if ($priceCents <= 0) {
            return back()->with('error', 'This slot price is not configured yet.');
        }

        if ($leadAddonSelected) {
            if (! $slot->lead_addon_enabled || (int) $slot->lead_addon_price_cents <= 0) {
                return back()->with('error', 'The leads add-on is not available for this slot.');
            }

            $leadAddonLeadsCount = (int) ($slot->lead_addon_leads_count ?: 5);
            $leadAddonPriceCents = $slot->leadAddonPriceCentsFor($billingCycle);
        }

        $totalPriceCents = $priceCents + $leadAddonPriceCents;
        $pending = null;

        DB::transaction(function () use ($slot, $company, $billingCycle, $priceCents, $leadAddonSelected, $leadAddonLeadsCount, $leadAddonPriceCents, $totalPriceCents, $stripeCustomerId, &$pending) {
            /** @var StateFeaturedSlot $lockedSlot */
            $lockedSlot = StateFeaturedSlot::whereKey($slot->id)->lockForUpdate()->firstOrFail();

            $isTaken = StateFeaturedSubscription::where('state_featured_slot_id', $lockedSlot->id)
                ->where(function (Builder $q) {
                    $q->whereIn('status', ['active', 'past_due'])
                        ->where(function ($qq) {
                            $qq->whereNull('ends_at')->orWhere('ends_at', '>', now());
                        })
                        ->orWhere(function ($qq) {
                            $qq->where('status', 'pending')->where('reserved_until', '>', now());
                        });
                })
                ->exists();

            if ($isTaken || ! $lockedSlot->is_active) {
                abort(409, 'This slot is unavailable now. Please choose another slot.');
            }

            $pending = StateFeaturedSubscription::create([
                'state_featured_slot_id' => $lockedSlot->id,
                'state_id' => $lockedSlot->state_id,
                'company_id' => $company->id,
                'billing_cycle' => $billingCycle,
                'price_cents' => $priceCents,
                'lead_addon_selected' => $leadAddonSelected,
                'lead_addon_leads_count' => $leadAddonSelected ? $leadAddonLeadsCount : 0,
                'lead_addon_price_cents' => $leadAddonSelected ? $leadAddonPriceCents : 0,
                'total_price_cents' => $totalPriceCents,
                'discount_percent' => $billingCycle === 'yearly' ? $lockedSlot->yearly_discount_percent : 0,
                'status' => 'pending',
                'reserved_until' => now()->addMinutes(10),
                'stripe_customer_id' => $stripeCustomerId,
            ]);
        });

        try {
            $invoiceRecord = null;
            $interval = $billingCycle === 'yearly' ? 'year' : 'month';
            $stateName = $slot->state->name . ', ' . $slot->state->abv;
            $slotName = "Featured State Ad - {$stateName} - Slot {$slot->slot_number}";

            $product = $stripe->products->create([
                'name' => $slotName,
                'metadata' => [
                    'state_featured_subscription_id' => (string) $pending->id,
                    'company_id' => (string) $company->id,
                    'state_id' => (string) $slot->state_id,
                    'slot_id' => (string) $slot->id,
                ],
            ]);

            $price = $stripe->prices->create([
                'unit_amount' => $priceCents,
                'currency' => 'usd',
                'recurring' => ['interval' => $interval],
                'product' => $product->id,
                'metadata' => [
                    'state_featured_subscription_id' => (string) $pending->id,
                    'company_id' => (string) $company->id,
                    'item_type' => 'state_slot',
                ],
            ]);

            $subscriptionItems = [[
                'price' => $price->id,
                'quantity' => 1,
            ]];

            $leadAddonProduct = null;
            $leadAddonPrice = null;

            if ($leadAddonSelected && $leadAddonPriceCents > 0) {
                $leadAddonProduct = $stripe->products->create([
                    'name' => "Leads Add-on - {$leadAddonLeadsCount} leads - {$stateName}",
                    'metadata' => [
                        'state_featured_subscription_id' => (string) $pending->id,
                        'company_id' => (string) $company->id,
                        'state_id' => (string) $slot->state_id,
                        'slot_id' => (string) $slot->id,
                        'item_type' => 'lead_addon',
                    ],
                ]);

                $leadAddonPrice = $stripe->prices->create([
                    'unit_amount' => $leadAddonPriceCents,
                    'currency' => 'usd',
                    'recurring' => ['interval' => $interval],
                    'product' => $leadAddonProduct->id,
                    'metadata' => [
                        'state_featured_subscription_id' => (string) $pending->id,
                        'company_id' => (string) $company->id,
                        'item_type' => 'lead_addon',
                        'lead_addon_leads_count' => (string) $leadAddonLeadsCount,
                    ],
                ]);

                $subscriptionItems[] = [
                    'price' => $leadAddonPrice->id,
                    'quantity' => 1,
                ];
            }

            $stripeSubscription = $stripe->subscriptions->create([
                'customer' => $stripeCustomerId,
                'items' => $subscriptionItems,
                'default_payment_method' => $paymentMethodId,
                'payment_settings' => [
                    'payment_method_types' => ['card'],
                    'save_default_payment_method' => 'on_subscription',
                ],
                'metadata' => [
                    'state_featured_subscription_id' => (string) $pending->id,
                    'company_id' => (string) $company->id,
                    'state_id' => (string) $slot->state_id,
                    'slot_id' => (string) $slot->id,
                    'billing_cycle' => $billingCycle,
                    'lead_addon_selected' => $leadAddonSelected ? '1' : '0',
                    'lead_addon_leads_count' => (string) $leadAddonLeadsCount,
                    'lead_addon_price_cents' => (string) $leadAddonPriceCents,
                    'total_price_cents' => (string) $totalPriceCents,
                ],
                'expand' => ['latest_invoice.payment_intent', 'latest_invoice.lines.data.price'],
            ]);

            $invoice = $stripeSubscription->latest_invoice ?? null;
            $paymentIntent = is_object($invoice) ? ($invoice->payment_intent ?? null) : null;

            if ($invoice && is_string($invoice)) {
                $invoice = $stripe->invoices->retrieve($invoice, [
                    'expand' => ['payment_intent', 'lines.data.price'],
                ]);
                $paymentIntent = $invoice->payment_intent ?? null;
            }

            $paymentStatus = $paymentIntent->status ?? null;
            $invoiceStatus = $invoice->status ?? null;

            if ($invoice) {
                $invoiceRecord = $this->storeInvoice($pending, $invoice);
            }

            if (in_array($stripeSubscription->status, ['active', 'trialing'], true) || $invoiceStatus === 'paid' || $paymentStatus === 'succeeded') {
                $startsAt = isset($stripeSubscription->current_period_start)
                    ? Carbon::createFromTimestamp($stripeSubscription->current_period_start)
                    : now();

                $endsAt = isset($stripeSubscription->current_period_end)
                    ? Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                    : ($billingCycle === 'yearly' ? now()->addYear() : now()->addMonth());

                $pending->update([
                    'status' => in_array($stripeSubscription->status, ['active', 'trialing'], true) ? 'active' : $stripeSubscription->status,
                    'reserved_until' => null,
                    'starts_at' => $startsAt,
                    'ends_at' => $endsAt,
                    'stripe_customer_id' => $stripeCustomerId,
                    'stripe_subscription_id' => $stripeSubscription->id,
                    'stripe_product_id' => $product->id,
                    'stripe_price_id' => $price->id,
                    'stripe_lead_addon_product_id' => $leadAddonProduct->id ?? null,
                    'stripe_lead_addon_price_id' => $leadAddonPrice->id ?? null,
                    'total_price_cents' => $totalPriceCents,
                    'cancel_at_period_end' => (bool) ($stripeSubscription->cancel_at_period_end ?? false),
                ]);

                $this->saveCompanyStripeFields($company, $stripeCustomerId, $paymentMethodId);

                $this->sendPurchaseEmails(
                    $pending->fresh(['company', 'state', 'slot']),
                    $invoiceRecord
                );

                return redirect()->route('company.state-featured-ads.index')
                    ->with('success', 'Your sponsored state slot is active. Payment was charged from your default card.');
            }

            // If the saved card needs 3D Secure/authentication, direct off-session charging cannot complete.
            if (in_array($paymentStatus, ['requires_action', 'requires_source_action', 'requires_payment_method'], true)) {
                $stripe->subscriptions->cancel($stripeSubscription->id, []);
                $pending->update(['status' => 'failed', 'reserved_until' => null]);

                return $this->redirectToPaymentMethods(
                    'Your saved card could not be charged. Please update or re-add your card, then try again.'
                );
            }

            $pending->update([
                'status' => $stripeSubscription->status ?: 'failed',
                'reserved_until' => null,
                'stripe_customer_id' => $stripeCustomerId,
                'stripe_subscription_id' => $stripeSubscription->id,
                'stripe_product_id' => $product->id,
                'stripe_price_id' => $price->id,
                'stripe_lead_addon_product_id' => $leadAddonProduct->id ?? null,
                'stripe_lead_addon_price_id' => $leadAddonPrice->id ?? null,
                'total_price_cents' => $totalPriceCents,
            ]);

            return redirect()->route('company.state-featured-ads.index')
                ->with('error', 'Payment could not be completed. Please update your payment method and try again.');
        } catch (\Throwable $e) {
            optional($pending)->update(['status' => 'failed', 'reserved_until' => null]);
            report($e);

            return back()->with('error', 'Payment could not be completed. Please check your default card and try again.');
        }
    }

    /**
     * Old Checkout success route is no longer used. Kept only to avoid route errors.
     */
    public function success(Request $request)
    {
        return redirect()->route('company.state-featured-ads.index');
    }

    public function cancelSubscription(StateFeaturedSubscription $subscription)
    {
        $company = $this->company();

        abort_if(! $company || (int) $subscription->company_id !== (int) $company->id, 403);

        $subscription->loadMissing(['company', 'state', 'slot']);

        if ($subscription->status === 'canceled') {
            return back()->with('success', 'Subscription is already cancelled.');
        }

        try {
            if (! $subscription->stripe_subscription_id) {
                $subscription->update([
                    'status' => 'canceled',
                    'cancel_at_period_end' => false,
                    'canceled_at' => now(),
                    'reserved_until' => null,
                    'ends_at' => now(),
                ]);

                $this->sendCancellationEmails($subscription->fresh(['company', 'state', 'slot']));

                return back()->with('success', 'Subscription cancelled successfully. Slot is now available.');
            }

            $stripe = new StripeClient(config('services.stripe.secret'));

            $stripeSubscription = $stripe->subscriptions->update($subscription->stripe_subscription_id, [
                'cancel_at_period_end' => true,
            ]);

            $subscription->update([
                'cancel_at_period_end' => true,
                'canceled_at' => now(),
                'reserved_until' => null,
                'ends_at' => ! empty($stripeSubscription->current_period_end)
                    ? Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                    : $subscription->ends_at,
            ]);

            $this->sendCancellationEmails($subscription->fresh(['company', 'state', 'slot']));

            return back()->with('success', 'Subscription cancellation scheduled. Company will keep the slot until the paid period ends.');
        } catch (\Throwable $e) {
            Log::error('State featured slot cancellation failed', [
                'subscription_id' => $subscription->id ?? null,
                'company_id' => $company->id ?? null,
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to cancel subscription right now. ' . $e->getMessage());
        }
    }

    private function getOrCreateStripeCustomer(StripeClient $stripe, Company $company): string
    {
        $customerId = $company->stripe_customer_id ?? null;

        if ($customerId) {
            try {
                $stripe->customers->retrieve($customerId, []);
                return $customerId;
            } catch (\Throwable $e) {
                // Saved customer ID is invalid/deleted in Stripe; create a fresh one.
            }
        }

        $customer = $stripe->customers->create([
            'email' => $company->company_email ?? $company->email ?? null,
            'name' => $company->company_name ?? $company->name ?? $company->full_name ?? 'Company',
            'metadata' => [
                'company_id' => (string) $company->id,
            ],
        ]);

        $this->saveCompanyStripeFields($company, $customer->id, null);

        return $customer->id;
    }

    private function resolveCompanyDefaultPaymentMethod(StripeClient $stripe, Company $company, string $stripeCustomerId): ?string
    {
        $candidate = $company->stripe_payment_method_id ?? null;

        if ($candidate) {
            try {
                $paymentMethod = $stripe->paymentMethods->retrieve($candidate, []);
                $attachedCustomer = is_string($paymentMethod->customer ?? null)
                    ? $paymentMethod->customer
                    : (($paymentMethod->customer->id ?? null));

                if (! $attachedCustomer) {
                    $stripe->paymentMethods->attach($candidate, ['customer' => $stripeCustomerId]);
                } elseif ($attachedCustomer !== $stripeCustomerId) {
                    return null;
                }

                $stripe->customers->update($stripeCustomerId, [
                    'invoice_settings' => ['default_payment_method' => $candidate],
                ]);

                return $candidate;
            } catch (\Throwable $e) {
                // Stored payment method is invalid. Try customer default below.
            }
        }

        try {
            $customer = $stripe->customers->retrieve($stripeCustomerId, []);
            $default = $customer->invoice_settings->default_payment_method ?? null;
            $defaultPaymentMethodId = is_string($default) ? $default : ($default->id ?? null);

            if ($defaultPaymentMethodId) {
                $this->saveCompanyStripeFields($company, $stripeCustomerId, $defaultPaymentMethodId);
                return $defaultPaymentMethodId;
            }
        } catch (\Throwable $e) {
            // No valid customer default payment method found.
        }

        return null;
    }

    private function redirectToPaymentMethods(string $message)
    {
        foreach (
            [
                'company.payment-methods.index',
                'company.payment_methods.index',
                'company.payment-methods',
                'company.payment_methods',
            ] as $routeName
        ) {
            if (Route::has($routeName)) {
                return redirect()->route($routeName)->with('error', $message);
            }
        }

        return redirect('/company/payment-methods')->with('error', $message);
    }

    private function saveCompanyStripeFields($company, ?string $customerId, ?string $paymentMethodId): void
    {
        if (! $company) {
            return;
        }

        $updates = [];
        $table = $company->getTable();

        if ($customerId && Schema::hasColumn($table, 'stripe_customer_id')) {
            $updates['stripe_customer_id'] = $customerId;
        }

        if ($paymentMethodId && Schema::hasColumn($table, 'stripe_payment_method_id')) {
            $updates['stripe_payment_method_id'] = $paymentMethodId;
        }

        if ($updates) {
            $company->forceFill($updates)->save();
        }
    }

    private function storeInvoice(StateFeaturedSubscription $subscription, $invoice): ?StateFeaturedSubscriptionInvoice
    {
        if (! $invoice || empty($invoice->id)) {
            return null;
        }

        [$periodStart, $periodEnd] = $this->resolveStripeInvoicePeriod($invoice, $subscription);

        return StateFeaturedSubscriptionInvoice::updateOrCreate(
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
                'paid_at' => ! empty($invoice->status_transitions->paid_at) ? Carbon::createFromTimestamp($invoice->status_transitions->paid_at) : null,
                'hosted_invoice_url' => $invoice->hosted_invoice_url ?? null,
                'invoice_pdf' => $invoice->invoice_pdf ?? null,
            ]
        );
    }

    /**
     * Stripe invoice.period_start and invoice.period_end can be equal on some first invoices.
     * For subscription billing, the correct service period is stored on invoice line items:
     * invoice.lines.data[*].period.start/end.
     */
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

    private function sendPurchaseEmails(?StateFeaturedSubscription $subscription, ?StateFeaturedSubscriptionInvoice $invoice = null): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'state', 'slot']);

        try {
            $companyEmail = $this->companyEmail($subscription->company);

            if ($companyEmail) {
                Mail::to($companyEmail)->send(new StateFeaturedSlotPurchasedMail($subscription, $invoice, false));
            }

            foreach ($this->adminEmails() as $adminEmail) {
                Mail::to($adminEmail)->send(new StateFeaturedSlotPurchasedMail($subscription, $invoice, true));
            }
        } catch (\Throwable $e) {
            report($e);
        }
    }

    private function sendCancellationEmails(?StateFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            Log::warning('Cancellation email skipped: subscription is null.');
            return;
        }

        $subscription->loadMissing(['company', 'state', 'slot']);

        $recipients = [];

        $companyEmail = $this->companyEmail($subscription->company);

        if ($companyEmail) {
            $recipients[] = [
                'email' => $companyEmail,
                'is_admin' => false,
                'type' => 'company',
            ];
        } else {
            Log::warning('Cancellation company email missing or invalid.', [
                'subscription_id' => $subscription->id,
                'company_id' => $subscription->company_id,
            ]);
        }

        foreach ($this->adminEmails() as $adminEmail) {
            $recipients[] = [
                'email' => $adminEmail,
                'is_admin' => true,
                'type' => 'admin',
            ];
        }

        foreach ($recipients as $recipient) {
            try {
                Mail::to($recipient['email'])->send(
                    new StateFeaturedSlotCancelledMail($subscription, $recipient['is_admin'])
                );

                Log::info('State featured cancellation email sent.', [
                    'subscription_id' => $subscription->id,
                    'to' => $recipient['email'],
                    'type' => $recipient['type'],
                ]);
            } catch (\Throwable $e) {
                Log::error('State featured cancellation email failed.', [
                    'subscription_id' => $subscription->id,
                    'to' => $recipient['email'],
                    'type' => $recipient['type'],
                    'error' => $e->getMessage(),
                ]);
            }
        }
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

    private function company(): ?Company
    {
        /*
         * Company dashboard is based on the companies table only.
         * This method supports:
         * 1) auth()->guard('company')->user() returning the Company model
         * 2) session('company_id')
         * 3) auth()->user()->company_id fallback
         */

        if (auth()->guard('company')->check()) {
            $company = auth()->guard('company')->user();

            if ($company instanceof Company) {
                return $company;
            }

            if (! empty($company->id)) {
                return Company::find($company->id);
            }
        }

        if (session()->has('company_id')) {
            return Company::find(session('company_id'));
        }

        $user = auth()->user();

        if ($user instanceof Company) {
            return $user;
        }

        if ($user && ! empty($user->company_id)) {
            return Company::find($user->company_id);
        }

        return null;
    }
}
