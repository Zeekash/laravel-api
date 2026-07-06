<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LeadSubscriptionPlan;
use App\Services\StripeLeadBillingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LeadPlanController extends Controller
{
    public function index()
    {
        $plans = LeadSubscriptionPlan::orderBy('display_order')->orderBy('id')->get();

        return view('backend.pages.subscription_modules.lead-subscription-plans.index', compact('plans'));
    }

    public function store(Request $request, StripeLeadBillingService $stripeSvc)
    {
        $data = $this->validated($request);

        $data['slug'] = Str::slug($data['name']);

        $plan = LeadSubscriptionPlan::create($data);

        // Create Stripe product + prices using CENTS stored in DB.
        $stripeSvc->ensureProductAndPrices($plan);

        return back()->with('success', 'Plan created successfully.');
    }

    public function update(Request $request, LeadSubscriptionPlan $plan, StripeLeadBillingService $stripeSvc)
    {
        $data = $this->validated($request, $plan->id);

        // Keep slug synced with plan name.
        $data['slug'] = Str::slug($data['name']);

        $plan->update($data);

        // Stripe prices are immutable, so this creates new prices when cents changed and disables old prices.
        $stripeSvc->ensureProductAndPrices($plan->fresh());

        return back()->with('success', 'Plan updated successfully.');
    }

    public function toggle(LeadSubscriptionPlan $plan)
    {
        $plan->is_active = ! $plan->is_active;
        $plan->save();

        try {
            app(StripeLeadBillingService::class)->ensureProductAndPrices($plan->fresh());
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with('success', 'Plan status updated.');
    }

    public function destroy(LeadSubscriptionPlan $plan)
    {
        $plan->delete();

        return back()->with('success', 'Plan deleted.');
    }

    public function resetDefaults()
    {
        return back()->with('success', 'Defaults reset (implement your defaults logic).');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:120',
                Rule::unique('lead_subscription_plans', 'name')->ignore($ignoreId),
            ],
            'description' => 'nullable|string|max:255',

            'leads_per_month' => 'required|integer|min:0',

            // These inputs are entered by admin in DOLLARS, for example 250.00.
            // We convert them to CENTS before saving because Stripe unit_amount expects cents.
            'extra_lead_fee_cents' => 'required|numeric|min:0',
            'monthly_price_cents' => 'required|numeric|min:0',
            'annual_price_cents' => 'required|numeric|min:0',

            'target_audience' => 'nullable|string|max:160',
            'included_features' => 'nullable|string',

            'icon' => 'required|in:package,zap,crown,rocket',
            'color' => 'required|in:gray,blue,green,purple,amber,orange',

            'display_order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['extra_lead_fee_cents'] = $this->dollarsToCents($validated['extra_lead_fee_cents']);
        $validated['monthly_price_cents'] = $this->dollarsToCents($validated['monthly_price_cents']);
        $validated['annual_price_cents'] = $this->dollarsToCents($validated['annual_price_cents']);

        // If your form does not send is_active, keep plans active by default on create.
        if (! $request->has('is_active') && $ignoreId === null) {
            $validated['is_active'] = true;
        }

        return $validated;
    }

    private function dollarsToCents($amount): int
    {
        return (int) round(((float) $amount) * 100);
    }
}
