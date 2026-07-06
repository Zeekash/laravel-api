<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CityFeaturedSlotCancelledMail;
use App\Mail\CityFeaturedSlotPurchasedMail;
use App\Models\CityFeaturedSlot;
use App\Models\CityFeaturedSubscription;
use App\Models\CityFeaturedSubscriptionInvoice;
use App\Models\CityPage;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Stripe\StripeClient;

class CityFeaturedAdController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureSlotsForAllCities();

        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        $search = trim((string) $request->get('search'));

        $query = CityPage::query()
            ->with([
                'state',
                'featuredSlots' => function ($q) {
                    $q->orderBy('slot_number');
                },
                'featuredSlots.activeSubscription.company',
                'featuredSlots.pendingReservation',
            ])
            ->orderBy('name');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $cities = $query->paginate(24)->appends($request->query());

        $subscriptions = CityFeaturedSubscription::query()
            ->with(['cityPage.state', 'slot'])
            ->where('company_id', $company->id)
            ->whereIn('status', ['active', 'past_due'])
            ->latest()
            ->get();

        return view('company.city-featured-ads.index', compact('cities', 'subscriptions', 'search', 'company'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'slot_id' => ['required', 'integer', 'exists:city_featured_slots,id'],
            'billing_cycle' => ['required', 'in:monthly,yearly'],
        ]);

        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        if (empty($company->stripe_payment_method_id)) {
            return $this->redirectToPaymentMethods('Please add a card first before reserving a city sponsored slot.');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        $billingCycle = $request->billing_cycle;
        $slotId = (int) $request->slot_id;

        $slot = CityFeaturedSlot::query()
            ->with(['cityPage.state'])
            ->findOrFail($slotId);

        $priceCents = $slot->priceForCycle($billingCycle);

        if ($priceCents <= 0) {
            return back()->with('error', 'This slot price is not configured. Please contact admin.');
        }

        $stripeCustomerId = $this->ensureStripeCustomerAndPaymentMethod($stripe, $company);

        $pending = null;

        DB::transaction(function () use ($slotId, $company, $billingCycle, $priceCents, $stripeCustomerId, &$pending) {
            $lockedSlot = CityFeaturedSlot::query()->lockForUpdate()->findOrFail($slotId);

            $isTaken = CityFeaturedSubscription::query()
                ->where('city_featured_slot_id', $lockedSlot->id)
                ->whereIn('status', ['active', 'past_due'])
                ->where(function ($q) {
                    $q->whereNull('ends_at')->orWhere('ends_at', '>', now());
                })
                ->exists();

            $isReserved = CityFeaturedSubscription::query()
                ->where('city_featured_slot_id', $lockedSlot->id)
                ->where('status', 'pending')
                ->where('reserved_until', '>', now())
                ->exists();

            if ($isTaken || $isReserved || ! $lockedSlot->is_active) {
                abort(409, 'This slot is unavailable now. Please choose another slot.');
            }

            $pending = CityFeaturedSubscription::create([
                'city_featured_slot_id' => $lockedSlot->id,
                'city_page_id' => $lockedSlot->city_page_id,
                'company_id' => $company->id,
                'billing_cycle' => $billingCycle,
                'price_cents' => $priceCents,
                'discount_percent' => $billingCycle === 'yearly' ? (int) $lockedSlot->yearly_discount_percent : 0,
                'status' => 'pending',
                'reserved_until' => now()->addMinutes(10),
                'stripe_customer_id' => $stripeCustomerId,
            ]);
        });

        try {
            $pending->loadMissing(['slot.cityPage.state', 'company']);

            [$productId, $priceId] = $this->createStripeProductAndPrice($stripe, $pending);

            $stripeSubscription = $stripe->subscriptions->create([
                'customer' => $stripeCustomerId,
                'default_payment_method' => $company->stripe_payment_method_id,
                'items' => [
                    ['price' => $priceId],
                ],
                'collection_method' => 'charge_automatically',
                'payment_behavior' => 'error_if_incomplete',
                'expand' => ['latest_invoice.payment_intent'],
                'metadata' => [
                    'module' => 'city_featured_ads',
                    'city_featured_subscription_id' => (string) $pending->id,
                    'city_page_id' => (string) $pending->city_page_id,
                    'company_id' => (string) $company->id,
                ],
            ]);

            $startsAt = ! empty($stripeSubscription->current_period_start)
                ? Carbon::createFromTimestamp($stripeSubscription->current_period_start)
                : now();

            $endsAt = ! empty($stripeSubscription->current_period_end)
                ? Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                : ($billingCycle === 'yearly' ? now()->addYear() : now()->addMonth());

            $latestInvoiceId = is_string($stripeSubscription->latest_invoice ?? null)
                ? $stripeSubscription->latest_invoice
                : ($stripeSubscription->latest_invoice->id ?? null);

            $pending->update([
                'status' => in_array($stripeSubscription->status, ['active', 'trialing'], true) ? 'active' : ($stripeSubscription->status ?: 'active'),
                'reserved_until' => null,
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
                'stripe_subscription_id' => $stripeSubscription->id,
                'stripe_product_id' => $productId,
                'stripe_price_id' => $priceId,
                'stripe_latest_invoice_id' => $latestInvoiceId,
            ]);

            if ($latestInvoiceId) {
                $invoice = $stripe->invoices->retrieve($latestInvoiceId, ['expand' => ['lines']]);
                $this->storeStripeInvoice($pending->fresh(), $invoice, false);
            }

            $this->sendPurchasedEmails($pending->fresh(['company', 'cityPage.state', 'slot']));

            return redirect()->route('company.city-featured-ads.index')
                ->with('success', 'City sponsored slot purchased successfully.');
        } catch (\Throwable $e) {
            report($e);

            if ($pending) {
                $pending->update([
                    'status' => 'failed',
                    'reserved_until' => null,
                ]);
            }

            return back()->with('error', 'Payment failed: '.$e->getMessage());
        }
    }

    public function cancelSubscription(CityFeaturedSubscription $subscription)
    {
        $company = $this->company();

        abort_if(! $company || (int) $subscription->company_id !== (int) $company->id, 403);

        $subscription->loadMissing(['company', 'cityPage.state', 'slot']);

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

                $this->sendCancellationEmails($subscription->fresh(['company', 'cityPage.state', 'slot']));

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

            $this->sendCancellationEmails($subscription->fresh(['company', 'cityPage.state', 'slot']));

            return back()->with('success', 'Subscription cancellation scheduled. You will keep the slot until paid period ends.');
        } catch (\Throwable $e) {
            Log::error('City featured slot cancellation failed', [
                'subscription_id' => $subscription->id ?? null,
                'company_id' => $company->id ?? null,
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to cancel subscription right now. '.$e->getMessage());
        }
    }

    private function ensureStripeCustomerAndPaymentMethod(StripeClient $stripe, Company $company): string
    {
        $customerId = $company->stripe_customer_id;

        if (! $customerId) {
            $customer = $stripe->customers->create([
                'name' => $company->company_name ?? $company->name ?? $company->full_name ?? 'Company',
                'email' => $this->companyEmail($company),
                'metadata' => [
                    'company_id' => (string) $company->id,
                ],
            ]);

            $customerId = $customer->id;
            $company->stripe_customer_id = $customerId;
            $company->save();
        }

        try {
            $stripe->paymentMethods->attach($company->stripe_payment_method_id, [
                'customer' => $customerId,
            ]);
        } catch (\Throwable $e) {
            // Payment method may already be attached. Continue.
        }

        $stripe->customers->update($customerId, [
            'invoice_settings' => [
                'default_payment_method' => $company->stripe_payment_method_id,
            ],
        ]);

        return $customerId;
    }

    private function createStripeProductAndPrice(StripeClient $stripe, CityFeaturedSubscription $subscription): array
    {
        $subscription->loadMissing(['slot.cityPage.state', 'company']);

        $cityName = $subscription->cityPage->name ?? 'City';
        $stateAbv = optional($subscription->cityPage->state)->abv ?: optional($subscription->cityPage->state)->abbr;
        $slotNumber = $subscription->slot->slot_number ?? '-';
        $interval = $subscription->billing_cycle === 'yearly' ? 'year' : 'month';

        $product = $stripe->products->create([
            'name' => trim("Featured City Ad - {$cityName}".($stateAbv ? ", {$stateAbv}" : '')." - Slot {$slotNumber}"),
            'metadata' => [
                'module' => 'city_featured_ads',
                'city_featured_subscription_id' => (string) $subscription->id,
                'city_page_id' => (string) $subscription->city_page_id,
                'company_id' => (string) $subscription->company_id,
            ],
        ]);

        $price = $stripe->prices->create([
            'product' => $product->id,
            'unit_amount' => (int) $subscription->price_cents,
            'currency' => 'usd',
            'recurring' => [
                'interval' => $interval,
            ],
            'metadata' => [
                'module' => 'city_featured_ads',
                'city_featured_subscription_id' => (string) $subscription->id,
                'billing_cycle' => $subscription->billing_cycle,
            ],
        ]);

        return [$product->id, $price->id];
    }

    private function storeStripeInvoice(CityFeaturedSubscription $subscription, $invoice, bool $sendRenewalEmail = true): ?CityFeaturedSubscriptionInvoice
    {
        if (! $invoice || empty($invoice->id)) {
            return null;
        }

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

        if ($sendRenewalEmail && $invoiceRow->wasRecentlyCreated && ($invoice->status ?? null) === 'paid') {
            $this->sendRenewalEmails($subscription->fresh(['company', 'cityPage.state', 'slot']), $invoiceRow);
        }

        return $invoiceRow;
    }

    private function sendPurchasedEmails(?CityFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'cityPage.state', 'slot']);

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new CityFeaturedSlotPurchasedMail($subscription, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('City featured purchase email failed', [
                    'to' => $recipient['email'],
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    private function sendCancellationEmails(?CityFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'cityPage.state', 'slot']);

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new CityFeaturedSlotCancelledMail($subscription, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('City featured cancellation email failed', [
                    'to' => $recipient['email'],
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }

    private function sendRenewalEmails(?CityFeaturedSubscription $subscription, CityFeaturedSubscriptionInvoice $invoice): void
    {
        if (! $subscription) {
            return;
        }

        $subscription->loadMissing(['company', 'cityPage.state', 'slot']);

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new \App\Mail\CityFeaturedSlotRenewedMail($subscription, $invoice, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('City featured renewal email failed', [
                    'to' => $recipient['email'],
                    'error' => $e->getMessage(),
                ]);
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

    private function adminEmails(): array
    {
        return ['contact@mymovingjourney.com'];
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

    private function company(): ?Company
    {
        if (auth()->guard('company')->check()) {
            return auth()->guard('company')->user();
        }

        if (session()->has('company_id')) {
            return Company::find(session('company_id'));
        }

        $authUser = auth()->user();
        if ($authUser && ! empty($authUser->company_id)) {
            return Company::find($authUser->company_id);
        }

        return null;
    }

    private function redirectToPaymentMethods(string $message)
    {
        foreach ([
            'company.payment-methods.index',
            'company.payment_methods.index',
            'company.payment-methods',
            'company.payment_methods',
        ] as $route) {
            if (Route::has($route)) {
                return redirect()->route($route)->with('error', $message);
            }
        }

        return redirect('/company/payment-methods')->with('error', $message);
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
