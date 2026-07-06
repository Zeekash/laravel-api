<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Mail\StateRouteFeaturedSlotCancelledMail;
use App\Mail\StateRouteFeaturedSlotPurchasedMail;
use App\Models\Company;
use App\Models\State;
use App\Models\StateRouteFeaturedSlot;
use App\Models\StateRouteFeaturedSubscription;
use App\Models\StateRouteFeaturedSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Stripe\StripeClient;

class StateRouteFeaturedAdController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureSlotsForAllRoutes();

        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        $search = trim((string) $request->get('search'));

        $routes = $this->paginatedRouteGroups($request, $search, 24);

        $subscriptions = StateRouteFeaturedSubscription::query()
            ->with(['fromState', 'toState', 'slot'])
            ->where('company_id', $company->id)
            ->whereIn('status', ['active', 'past_due'])
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>', now());
            })
            ->latest()
            ->get();

        return view('company.route-featured-ads.index', compact('routes', 'subscriptions', 'search', 'company'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'slot_id' => ['required', 'integer', 'exists:state_route_featured_slots,id'],
            'billing_cycle' => ['required', 'in:monthly,yearly'],
        ]);

        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        if (empty($company->stripe_payment_method_id)) {
            return $this->redirectToPaymentMethods('Please add a card first before reserving a route sponsored slot.');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        $billingCycle = $request->billing_cycle;
        $slotId = (int) $request->slot_id;

        $slot = StateRouteFeaturedSlot::query()
            ->with(['fromState', 'toState'])
            ->findOrFail($slotId);

        $priceCents = $slot->priceForCycle($billingCycle);

        if ($priceCents <= 0) {
            return back()->with('error', 'This slot price is not configured. Please contact admin.');
        }

        $stripeCustomerId = $this->ensureStripeCustomerAndPaymentMethod($stripe, $company);
        $pending = null;

        DB::transaction(function () use ($slotId, $company, $billingCycle, $priceCents, $stripeCustomerId, &$pending) {
            $lockedSlot = StateRouteFeaturedSlot::query()->lockForUpdate()->findOrFail($slotId);

            $isTaken = StateRouteFeaturedSubscription::query()
                ->where('state_route_featured_slot_id', $lockedSlot->id)
                ->whereIn('status', ['active', 'past_due'])
                ->where(function ($q) {
                    $q->whereNull('ends_at')->orWhere('ends_at', '>', now());
                })
                ->exists();

            $isReserved = StateRouteFeaturedSubscription::query()
                ->where('state_route_featured_slot_id', $lockedSlot->id)
                ->where('status', 'pending')
                ->where('reserved_until', '>', now())
                ->exists();

            if ($isTaken || $isReserved || ! $lockedSlot->is_active) {
                abort(409, 'This slot is unavailable now. Please choose another slot.');
            }

            $pending = StateRouteFeaturedSubscription::create([
                'state_route_featured_slot_id' => $lockedSlot->id,
                'from_state_id' => $lockedSlot->from_state_id,
                'to_state_id' => $lockedSlot->to_state_id,
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
            $pending->loadMissing(['slot.fromState', 'slot.toState', 'fromState', 'toState', 'company']);

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
                    'module' => 'state_route_featured_ads',
                    'state_route_featured_subscription_id' => (string) $pending->id,
                    'from_state_id' => (string) $pending->from_state_id,
                    'to_state_id' => (string) $pending->to_state_id,
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
                'status' => in_array($stripeSubscription->status, ['active', 'trialing'], true)
                    ? 'active'
                    : ($stripeSubscription->status ?: 'active'),
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

            $this->sendPurchasedEmails($pending->fresh(['company', 'fromState', 'toState', 'slot']));

            return redirect()->route('company.route-featured-ads.index')
                ->with('success', 'Route sponsored slot purchased successfully.');
        } catch (\Throwable $e) {
            report($e);

            if ($pending) {
                $pending->update(['status' => 'failed', 'reserved_until' => null]);
            }

            return back()->with('error', 'Payment failed: '.$e->getMessage());
        }
    }

    public function cancelSubscription(StateRouteFeaturedSubscription $subscription)
    {
        $company = $this->company();

        abort_if(! $company || (int) $subscription->company_id !== (int) $company->id, 403);

        $subscription->loadMissing(['company', 'fromState', 'toState', 'slot']);

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

                $this->sendCancellationEmails($subscription->fresh(['company', 'fromState', 'toState', 'slot']));

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

            $this->sendCancellationEmails($subscription->fresh(['company', 'fromState', 'toState', 'slot']));

            return back()->with('success', 'Subscription cancellation scheduled. You will keep the slot until paid period ends.');
        } catch (\Throwable $e) {
            Log::error('State route featured cancellation failed', [
                'subscription_id' => $subscription->id,
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to cancel subscription right now. '.$e->getMessage());
        }
    }

    private function paginatedRouteGroups(Request $request, string $search, int $perPage): LengthAwarePaginator
    {
        $query = StateRouteFeaturedSlot::query()
            ->with(['fromState', 'toState', 'activeSubscription.company', 'pendingReservation'])
            ->orderBy('from_state_id')
            ->orderBy('to_state_id')
            ->orderBy('slot_number');

        if ($search !== '') {
            $normalized = preg_replace('/\s+/', ' ', str_replace(['→', '->'], ' to ', strtolower($search)));
            $parts = preg_split('/\s+to\s+/', trim($normalized));

            if (count($parts) === 2 && trim($parts[0]) !== '' && trim($parts[1]) !== '') {
                $fromSearch = trim($parts[0]);
                $toSearch = trim($parts[1]);

                $query->whereHas('fromState', function ($sq) use ($fromSearch) {
                    $sq->where('name', 'like', "%{$fromSearch}%")
                        ->orWhere('abv', 'like', "%{$fromSearch}%");
                })->whereHas('toState', function ($sq) use ($toSearch) {
                    $sq->where('name', 'like', "%{$toSearch}%")
                        ->orWhere('abv', 'like', "%{$toSearch}%");
                });
            } else {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('fromState', function ($sq) use ($search) {
                        $sq->where('name', 'like', "%{$search}%")
                            ->orWhere('abv', 'like', "%{$search}%");
                    })->orWhereHas('toState', function ($sq) use ($search) {
                        $sq->where('name', 'like', "%{$search}%")
                            ->orWhere('abv', 'like', "%{$search}%");
                    });
                });
            }
        }

        $groups = $query->get()
            ->groupBy(fn ($slot) => $slot->from_state_id.'-'.$slot->to_state_id)
            ->map(function ($routeSlots) {
                $first = $routeSlots->first();

                return (object) [
                    'id' => $first->from_state_id.'-'.$first->to_state_id,
                    'name' => ($first->fromState->name ?? 'From State').' → '.($first->toState->name ?? 'To State'),
                    'abv' => ($first->fromState->abv ?? '').' → '.($first->toState->abv ?? ''),
                    'featuredSlots' => $routeSlots->sortBy('slot_number')->values(),
                ];
            })
            ->sortBy('name')
            ->values();

        $page = LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $groups->forPage($page, $perPage)->values(),
            $groups->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }

    private function ensureSlotsForAllRoutes(): void
    {
        $states = State::query()->select(['id', 'name', 'abv'])->orderBy('name')->get();

        foreach ($states as $fromState) {
            foreach ($states as $toState) {
                if ((int) $fromState->id === (int) $toState->id) {
                    continue;
                }

                for ($i = 1; $i <= 3; $i++) {
                    StateRouteFeaturedSlot::firstOrCreate(
                        ['from_state_id' => $fromState->id, 'to_state_id' => $toState->id, 'slot_number' => $i],
                        [
                            'label' => $i === 1 ? 'Slot 1 - Top' : 'Slot '.$i,
                            'monthly_price_cents' => $i === 1 ? 59900 : ($i === 2 ? 39900 : 29900),
                            'yearly_price_cents' => $i === 1 ? 599000 : ($i === 2 ? 399000 : 299000),
                            'yearly_discount_percent' => 17,
                            'perks' => [
                                'Sponsored label on route page',
                                'Higher visibility for verified movers',
                                'Monthly performance exposure',
                            ],
                            'is_active' => true,
                            'sort_order' => $i,
                        ]
                    );
                }
            }
        }
    }

    private function ensureStripeCustomerAndPaymentMethod(StripeClient $stripe, Company $company): string
    {
        $customerId = $company->stripe_customer_id;

        if (! $customerId) {
            $customer = $stripe->customers->create([
                'email' => $company->company_email ?? $company->email ?? null,
                'name' => $company->company_name ?? $company->name ?? $company->full_name ?? 'Company',
                'metadata' => ['company_id' => (string) $company->id],
            ]);

            $customerId = $customer->id;
            $company->forceFill(['stripe_customer_id' => $customerId])->save();
        }

        try {
            $stripe->paymentMethods->attach($company->stripe_payment_method_id, ['customer' => $customerId]);
        } catch (\Throwable $e) {
            // Already attached or Stripe may reject duplicate attachment.
        }

        $stripe->customers->update($customerId, [
            'invoice_settings' => [
                'default_payment_method' => $company->stripe_payment_method_id,
            ],
        ]);

        return $customerId;
    }

    private function createStripeProductAndPrice(StripeClient $stripe, StateRouteFeaturedSubscription $subscription): array
    {
        $subscription->loadMissing(['fromState', 'toState', 'slot']);

        $interval = $subscription->billing_cycle === 'yearly' ? 'year' : 'month';
        $routeName = $subscription->routeName();
        $slotNumber = $subscription->slot->slot_number ?? '-';
        $name = "Featured Route Ad - {$routeName} - Slot {$slotNumber}";

        $product = $stripe->products->create([
            'name' => $name,
            'metadata' => [
                'module' => 'state_route_featured_ads',
                'state_route_featured_subscription_id' => (string) $subscription->id,
                'from_state_id' => (string) $subscription->from_state_id,
                'to_state_id' => (string) $subscription->to_state_id,
            ],
        ]);

        $price = $stripe->prices->create([
            'product' => $product->id,
            'unit_amount' => $subscription->price_cents,
            'currency' => 'usd',
            'recurring' => ['interval' => $interval],
            'metadata' => [
                'module' => 'state_route_featured_ads',
                'state_route_featured_subscription_id' => (string) $subscription->id,
            ],
        ]);

        return [$product->id, $price->id];
    }

    private function storeStripeInvoice(StateRouteFeaturedSubscription $subscription, $invoice, bool $sendRenewalEmail): ?StateRouteFeaturedSubscriptionInvoice
    {
        $line = $invoice->lines->data[0] ?? null;

        $periodStart = ($line && ! empty($line->period->start))
            ? Carbon::createFromTimestamp($line->period->start)
            : ($subscription->starts_at ?: now());

        $periodEnd = ($line && ! empty($line->period->end))
            ? Carbon::createFromTimestamp($line->period->end)
            : ($subscription->ends_at ?: ($subscription->billing_cycle === 'yearly' ? now()->addYear() : now()->addMonth()));

        $row = StateRouteFeaturedSubscriptionInvoice::updateOrCreate(
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

        return $row;
    }

    private function sendPurchasedEmails(?StateRouteFeaturedSubscription $subscription): void
    {
        if (! $subscription) {
            return;
        }

        foreach ($this->mailRecipients($subscription) as $recipient) {
            try {
                Mail::to($recipient['email'])->send(new StateRouteFeaturedSlotPurchasedMail($subscription, $recipient['is_admin']));
            } catch (\Throwable $e) {
                Log::error('Route featured purchase email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
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
                Log::error('Route featured cancellation email failed', ['to' => $recipient['email'], 'error' => $e->getMessage()]);
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

    private function redirectToPaymentMethods(string $message)
    {
        foreach (['company.payment-methods.index', 'company.payment_methods.index', 'company.payment-methods', 'company.payment_methods'] as $routeName) {
            if (Route::has($routeName)) {
                return redirect()->route($routeName)->with('error', $message);
            }
        }

        return redirect('/company/payment-methods')->with('error', $message);
    }

    private function company(): ?Company
    {
        if (auth()->guard('company')->check()) {
            return auth()->guard('company')->user();
        }

        if (session('company_id')) {
            return Company::find(session('company_id'));
        }

        $user = auth()->user();

        if ($user && ! empty($user->company_id)) {
            return Company::find($user->company_id);
        }

        return null;
    }
}
