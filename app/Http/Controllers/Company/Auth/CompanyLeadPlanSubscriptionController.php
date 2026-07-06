<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LeadPlanCancelled;
use App\Mail\LeadPlanChanged;
use App\Mail\LeadPlanSubscribed;
use App\Models\Company;
use App\Models\CompanyLeadPlanSubscription;
use App\Models\CompanyLeadUsage;
use App\Models\ContactMover;
use App\Models\LeadBillingHistory;
use App\Models\LeadSubscriptionPlan;
use App\Services\StripeLeadBillingService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription as StripeSubscription;

class CompanyLeadPlanSubscriptionController extends Controller
{
    public function __construct(
        protected StripeLeadBillingService $stripe
    ) {}

    /**
     * ===============================
     * DASHBOARD INDEX
     * ===============================
     */
    public function index(Request $request)
    {
        // $company = Auth::guard('company')->user();
        $company = Auth::guard('company')->user();

        /**
         * 1️⃣ Get all active lead plans
         */
        $plans = LeadSubscriptionPlan::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        /**
         * 2️⃣ Get current subscription
         * - Active
         * - OR cancelled but still within period
         */
        $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
            ->where(function ($query) {
                $query->where('status', 'active')
                    ->orWhere(function ($q) {
                        $q->where('cancel_at_period_end', true)
                            ->where('current_period_end', '>', now());
                    });
            })
            ->orderByDesc('id')
            ->first();

        // Used for renewal if the current one is expired/cancelled
        $lastSubscription = CompanyLeadPlanSubscription::with('plan')
            ->where('company_id', $company->id)
            ->orderByDesc('id')
            ->first();

        /**
         * 3️⃣ Resolve active plan from subscription
         */
        $activePlan = $subscription
            ? $plans->firstWhere('id', $subscription->lead_subscription_plan_id)
            : null;

        /**
         * 4️⃣ Calculate lead usage from contact_movers (REAL DATA)
         */
        $usageStats = null;

        if ($activePlan) {
            $periodStart = $subscription->created_at;
            $periodEnd = $subscription->current_period_end;

            if ($periodEnd && $periodEnd->isSameDay($periodStart)) {
                $periodEnd = $periodStart->copy()->addMonth();
            }

            // Count real leads
            $usedLeads = ContactMover::where('company_id', $company->id)
                ->whereBetween('created_at', [$periodStart, $periodEnd])
                ->count();

            $extraPaidLeads = ContactMover::where('company_id', $company->id)
                ->whereBetween('created_at', [$periodStart, $periodEnd])
                ->where('is_extra_paid', true)
                ->count();

            $allowed = $activePlan->leads_per_month;

            $usageStats = [
                'allowed'   => $usedLeads === 0 ? 0 : $allowed,
                'used'      => $usedLeads,
                'remaining' => $usedLeads === 0 ? 0 : max(0, $allowed - $usedLeads),
                'percent'   => $allowed > 0
                    ? min(100, round(($usedLeads / $allowed) * 100))
                    : 0,
            ];
        }

        $billingHistory = \App\Models\LeadBillingHistory::where('company_id', $company->id)
            ->orderByDesc('paid_at')
            ->get();

        /**
         * 5️⃣ Render dashboard
         */
        return view('company.lead-plans.index', [
            'company'      => $company,
            'plans'        => $plans,
            'subscription' => $subscription,
            'lastSubscription' => $lastSubscription,
            'activePlan'   => $activePlan,
            'usageStats'   => $usageStats,
            'billingHistory' => $billingHistory,
        ]);
    }

    /**
     * ===============================
     * SUBSCRIBE (AJAX)
     * ===============================
     */
    public function subscribe(Request $request, LeadSubscriptionPlan $plan)
    {
        try {

            $request->validate([
                'interval' => 'required|in:monthly,annual',
            ]);

            $company = Auth::guard('company')->user();

            if (! $company) {
                return response()->json(['error' => 'Company login session expired. Please login again.'], 401);
            }

            $existingSubscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
                ->where('status', 'active')
                ->where(function ($query) {
                    $query->where('cancel_at_period_end', false)
                        ->orWhere('current_period_end', '>', now());
                })
                ->first();

            if ($existingSubscription) {
                return response()->json(['error' => 'Already subscribed. Please use change plan instead.'], 422);
            }

            $interval = $request->interval;

            // Ensure Stripe prices exist
            $this->stripe->ensureProductAndPrices($plan);
            $plan->refresh();

            $priceId = $interval === 'monthly'
                ? $plan->stripe_monthly_price_id
                : $plan->stripe_annual_price_id;

            if (!$priceId) {
                return response()->json(['error' => 'Stripe price not configured'], 500);
            }

            // ❗ No saved card → redirect
            if (!$company->stripe_customer_id || !$company->stripe_payment_method_id) {
                return response()->json([
                    'redirect' => route('company.billing.index'),
                    'error' => 'Please add a payment method first.'
                ], 422);
            }

            Stripe::setApiKey(config('services.stripe.secret'));

            // Ensure Stripe default payment method
            Customer::update($company->stripe_customer_id, [
                'invoice_settings' => [
                    'default_payment_method' => $company->stripe_payment_method_id,
                ],
            ]);

            // 🔥 Create subscription directly
            $stripeSubscription = StripeSubscription::create([
                'customer' => $company->stripe_customer_id,
                'items' => [
                    ['price' => $priceId]
                ],
                'default_payment_method' => $company->stripe_payment_method_id,
                'expand' => ['latest_invoice.payment_intent'],
            ]);

            if ($stripeSubscription->status !== 'active') {
                return response()->json(['error' => 'Subscription not activated'], 422);
            }

            // Safe period end
            $currentPeriodEnd = $stripeSubscription->current_period_end
                ?Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                : ($interval === 'annual' ? now()->addYear() : now()->addMonth());

            // 🔥 Save Local Subscription
            $localSubscription = CompanyLeadPlanSubscription::updateOrCreate(
                ['company_id' => $company->id],
                [
                    'lead_subscription_plan_id' => $plan->id,
                    'stripe_customer_id'        => $company->stripe_customer_id,
                    'stripe_subscription_id'    => $stripeSubscription->id,
                    'interval'                  => $interval,
                    'status'                    => 'active',
                    'cancel_at_period_end'      => false,
                    'current_period_end'        => $currentPeriodEnd,
                ]
            );

            // 🔥 Initialize Usage
            CompanyLeadUsage::updateOrCreate(
                [
                    'company_id'   => $company->id,
                    'period_start' => now()->startOfMonth()->toDateString(),
                    'period_end'   => now()->endOfMonth()->toDateString(),
                ],
                [
                    'lead_subscription_plan_id' => $plan->id,
                    'leads_allowed' => $plan->leads_per_month,
                    'leads_used'    => 0,
                ]
            );

            // 🔥 BILLING HISTORY
            try {

                $invoice = $stripeSubscription->latest_invoice ?? null;
                if (is_string($invoice)) {
                    $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                    $invoice = $stripe->invoices->retrieve($invoice);
                }

                if ($invoice && isset($invoice->id)) {

                    LeadBillingHistory::updateOrCreate(
                        ['stripe_invoice_id' => $invoice->id],
                        [
                            'company_id'      => $company->id,
                            'subscription_id' => $localSubscription->id,
                            'invoice_no'      => 'INV-' . strtoupper(now()->format('Ymd')) . '-' . rand(1000, 9999),
                            'amount_cents'    => $invoice->amount_paid ?? 0,
                            'status'          => 'paid',
                            'paid_at'         => now(),
                            'payment_method' => 'stripe',
                        ]
                    );
                }
            } catch (\Exception $e) {
                Log::error("Billing history failed: " . $e->getMessage());
            }

            // Company::where('id', $company->id)->update([
            //     'listing_fee_status'   => 'paid',
            //     'listing_fee_paid_at'  => now(),
            //     'trial_ends_at'        => null,
            //     'is_certified'        => 1,
            // ]);

            try {
                Mail::to($company->company_email ?? $company->email)
                    ->send(new LeadPlanSubscribed($company, $plan, false, $localSubscription));

                Mail::to('contact@mymovingjourney.com')
                    ->send(new LeadPlanSubscribed($company, $plan, true, $localSubscription));
            }
            catch (\Exception $e) {
                Log::error("Lead Subscription Email failed: " . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Subscription activated and payment recorded.'
            ]);
        } catch (\Stripe\Exception\CardException $e) {

            return response()->json([
                'error' => $e->getError()->message
            ], 422);
        } catch (\Throwable $e) {

            Log::error('Lead Subscribe Error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'error' => config('app.debug') ? $e->getMessage() : 'Subscription failed. Please try again.'
            ], 500);
        }
    }

    // public function success(Request $request)
    // {
    //     $company = Auth::guard('company')->user();
    //     $planId   = $request->query('plan');
    //     $interval = $request->query('interval');

    //     if (!$planId) {
    //         return redirect()
    //             ->route('company.lead_plans.index')
    //             ->withErrors('Invalid subscription data.');
    //     }

    //     $stripe = $this->stripe->client();

    //     // 1. Fetch ACTIVE Stripe subscription
    //     $subscriptions = $stripe->subscriptions->all([
    //         'customer' => $company->stripe_customer_id,
    //         'status'   => 'active',
    //         'limit'    => 1,
    //     ]);

    //     if (empty($subscriptions->data)) {
    //         return redirect()
    //             ->route('company.lead_plans.index')
    //             ->withErrors('Stripe subscription not found.');
    //     }

    //     $subscription = $subscriptions->data[0];

    //     // Calculate period end
    //     $currentPeriodEnd = $subscription->current_period_end && $subscription->current_period_end > 0
    //         ? \Carbon\Carbon::createFromTimestamp($subscription->current_period_end)
    //         : ($interval === 'annual' ? now()->addYear() : now()->addMonth());

    //     // 2. Update/Create Local Subscription
    //     $localSubscription = CompanyLeadPlanSubscription::updateOrCreate(
    //         ['company_id' => $company->id],
    //         [
    //             'lead_subscription_plan_id' => $planId,
    //             'stripe_customer_id'        => $company->stripe_customer_id,
    //             'stripe_subscription_id'    => $subscription->id,
    //             'interval'                  => $interval,
    //             'status'                    => 'active',
    //             'cancel_at_period_end'      => false,
    //             'current_period_end'        => $currentPeriodEnd,
    //         ]
    //     );

    //     // 3. Initialize lead usage
    //     $plan = LeadSubscriptionPlan::findOrFail($planId);
    //     CompanyLeadUsage::updateOrCreate(
    //         [
    //             'company_id'   => $company->id,
    //             'period_start' => now()->startOfMonth()->toDateString(),
    //             'period_end'   => now()->endOfMonth()->toDateString(),
    //         ],
    //         [
    //             'lead_subscription_plan_id' => $plan->id,
    //             'leads_allowed' => $plan->leads_per_month,
    //             'leads_used'    => 0,
    //         ]
    //     );

    //     /**
    //      * 4️⃣ NEW: Store Data in Billing History
    //      * Fetch the latest invoice for this subscription to get the actual amount paid
    //      */
    //     try {
    //         $latestInvoice = $stripe->invoices->retrieve($subscription->latest_invoice);

    //         LeadBillingHistory::updateOrCreate(
    //             ['stripe_invoice_id' => $latestInvoice->id],
    //             [
    //                 'company_id'      => $company->id,
    //                 'subscription_id' => $localSubscription->id,
    //                 'invoice_no'      => 'INV-' . strtoupper(now()->format('Ymd')) . '-' . rand(1000, 9999),
    //                 'amount_cents'    => $latestInvoice->amount_paid,
    //                 'status'          => 'paid',
    //                 'paid_at'         => now(),
    //             ]
    //         );
    //     } catch (\Exception $e) {
    //         // Log error but don't break the success flow
    //         Log::error("Failed to record billing history: " . $e->getMessage());
    //     }

    //     // 5. Notifications
    //     Mail::to($company->company_email)->send(new LeadPlanSubscribed($company, $plan, false, $localSubscription));
    //     Mail::to('contact@mymovingjourney.com')->send(new LeadPlanSubscribed($company, $plan, true, $localSubscription));

    //     return redirect()
    //         ->route('company.lead_plans.index')
    //         ->with('success', 'Subscription activated and payment recorded.');
    // }

    /**
     * ===============================
     * CANCEL
     * ===============================
     */
    public function cancel(Request $request)
    {
        $company = Auth::guard('company')->user();
        if (! $company) {
            return back()->withErrors('Company login session expired. Please login again.');
        }

        $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) return back()->withErrors('No active subscription.');

        try {
            $this->stripe->cancelSubscription($subscription->stripe_subscription_id, true);

            $subscription->update([
                // Keep status active so they can still use it
                'cancel_at_period_end' => true,
                'cancelled_at' => now(),
            ]);

            // Company::where('id', $company->id)->update([
            //     'listing_fee_status'   => 'pending',
            //     'listing_fee_paid_at'  => null,
            //     'trial_ends_at'        => now()->addDays(12),
            // ]);

            Mail::to($company->email)->queue(new LeadPlanCancelled($company, $subscription));

            Mail::to('contact@mymovingjourney.com')->queue(new LeadPlanCancelled($company, $subscription, true));

            return back()->with('success', 'Subscription cancelled. Access remains until ' . $subscription->current_period_end->format('M d, Y'));
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
    public function changePlan(Request $request, LeadSubscriptionPlan $plan)
    {
        $request->validate(['interval' => 'required|in:monthly,annual']);
        $company = Auth::guard('company')->user();
        if (! $company) {
            return response()->json(['error' => 'Company login session expired. Please login again.'], 401);
        }

        // 1. Get local subscription
        $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            return response()->json(['error' => 'No active subscription found to change.'], 422);
        }

        try {
            $this->stripe->ensureProductAndPrices($plan);
            $plan->refresh();

            $stripe = $this->stripe->client();
            $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id);

            $priceId = $request->interval === 'monthly'
                ? $plan->stripe_monthly_price_id
                : $plan->stripe_annual_price_id;

            if (! $priceId) {
                return response()->json(['error' => 'Stripe price not configured for this plan.'], 500);
            }

            // 2. Update Stripe Subscription (Swapping Price)
            $stripe->subscriptions->update($subscription->stripe_subscription_id, [
                'items' => [
                    [
                        'id' => $stripeSub->items->data[0]->id,
                        'price' => $priceId,
                    ],
                ],
                'cancel_at_period_end' => false,
                'proration_behavior' => 'always_invoice', // Charge/Credit immediately
            ]);

            // 3. Update Local DB
            $oldPlan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);
            $subscription->update([
                'lead_subscription_plan_id' => $plan->id,
                'interval' => $request->interval,
                'cancel_at_period_end' => false,
                'cancelled_at' => null,
                'is_scheduled_renewal' => false,
            ]);

            // 4. Update Usage Limits for current month
            CompanyLeadUsage::where('company_id', $company->id)
                ->where('period_end', '>=', now()->toDateString())
                ->update(['leads_allowed' => $plan->leads_per_month]);

            // 5. Record Billing History for the proration invoice
            try {
                $stripeSub = $stripe->subscriptions->retrieve($subscription->stripe_subscription_id);
                $invoiceId = $stripeSub->latest_invoice ?? null;
                if ($invoiceId) {
                    $invoice = $stripe->invoices->retrieve($invoiceId);
                    if ($invoice && $invoice->amount_paid > 0) {
                        LeadBillingHistory::updateOrCreate(
                            ['stripe_invoice_id' => $invoice->id],
                            [
                                'company_id' => $company->id,
                                'subscription_id' => $subscription->id,
                                'invoice_no' => 'INV-' . strtoupper(now()->format('Ymd')) . '-' . rand(1000, 9999),
                                'amount_cents' => $invoice->amount_paid,
                                'status' => 'paid',
                                'paid_at' => now(),
                                'payment_method' => 'stripe',
                            ]
                        );
                    }
                }
            } catch (\Exception $e) {
                Log::error("Plan Change Billing History Error: " . $e->getMessage());
            }

            // 6. Send Emails (Logic from previous step)
            Mail::to($company->company_email)->queue(new LeadPlanChanged($company, $oldPlan, $plan));

            return response()->json(['success' => true, 'message' => 'Plan updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function downloadInvoice($id)
    {
        // 1. Fetch record with relationships
        $history = LeadBillingHistory::with(['company', 'subscription.plan'])
            ->where('company_id', Auth::guard('company')->id()) // Security: ensure company owns this invoice
            ->findOrFail($id);

        // 2. Prepare data for the view
        $data = [
            'history' => $history,
            'company' => $history->company,
            'plan'    => $history->subscription->plan,
        ];

        // 3. Load the specific PDF blade view
        $pdf = Pdf::loadView('company.lead-plans.invoice-pdf', $data);

        // 4. Return the download
        return $pdf->download($history->invoice_no . '.pdf');
    }

    /**
     * ===============================
     * RENEW (AJAX)
     * ===============================
     */
    public function renew(Request $request)
    {
        try {
            $company = Auth::guard('company')->user();
            if (! $company) {
                return response()->json(['error' => 'Company login session expired. Please login again.'], 401);
            }

            // 1. Get the most recent lead plan subscription (even if expired/canceled)
            $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
                ->orderByDesc('id')
                ->first();

            if (!$subscription) {
                Log::warning("Renewal failed: No prior subscription found for company ID " . $company->id);
                return response()->json(['error' => 'No prior subscription found to renew. Please subscribe to a new plan.'], 422);
            }

            if (!$subscription->lead_subscription_plan_id) {
                Log::warning("Renewal failed: Subscription ID {$subscription->id} has no lead_subscription_plan_id for company ID " . $company->id);
                return response()->json(['error' => 'Your previous subscription plan is no longer available. Please select a new plan.'], 422);
            }

            $plan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);
            if (!$plan) {
                Log::warning("Renewal failed: LeadSubscriptionPlan ID {$subscription->lead_subscription_plan_id} not found for subscription ID {$subscription->id}");
                return response()->json(['error' => 'The plan associated with your previous subscription is not found. Please select a new plan.'], 422);
            }

            // 3. Create NEW Stripe subscription using Service
            $stripeSubscription = $this->stripe->renewSubscription($company, $plan, $subscription->interval);

            if ($stripeSubscription->status !== 'active') {
                return response()->json(['error' => 'Subscription failed to activate on Stripe.'], 422);
            }

            // 4. Update local record and send emails via Service
            $this->stripe->completeRenewalProcess($subscription, $stripeSubscription, $company, $plan);

            return response()->json(['success' => true, 'message' => 'Subscription renewed successfully!']);

        } catch (\Stripe\Exception\CardException $e) {
            return response()->json(['error' => $e->getError()->message], 422);
        } catch (\Throwable $e) {
            Log::error('Lead Renew Error: ' . $e->getMessage());
            return response()->json(['error' => 'Renewal failed. Please try again.'], 500);
        }
    }

    /**
     * ===============================
     * SCHEDULE RENEWAL (AJAX)
     * ===============================
     */
    public function scheduleRenewal(Request $request)
    {
        try {
            $company = Auth::guard('company')->user();
            if (! $company) {
                return response()->json(['error' => 'Company login session expired. Please login again.'], 401);
            }

            $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
                ->where('status', 'active')
                ->where('cancel_at_period_end', true)
                ->first();

            if (!$subscription) {
                return response()->json(['error' => 'No active subscription found waiting for cancellation.'], 422);
            }

            // Directly update Stripe to turn off cancellation
            $this->stripe->client()->subscriptions->update($subscription->stripe_subscription_id, [
                'cancel_at_period_end' => false,
            ]);

            $subscription->update([
                'cancel_at_period_end' => false,
                'cancelled_at' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Renewal scheduled! Your subscription will automatically renew on ' . $subscription->current_period_end->format('M d, Y')
            ]);
        } catch (\Exception $e) {
            Log::error('Lead Schedule Renewal Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to schedule renewal.'], 500);
        }
    }
}
