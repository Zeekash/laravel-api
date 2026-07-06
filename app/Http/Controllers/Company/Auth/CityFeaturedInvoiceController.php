<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\CityFeaturedSubscriptionInvoice;
use App\Models\Company;
use Illuminate\Http\Request;

class CityFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $company = $this->company();

        abort_if(! $company, 403, 'Company profile not found.');

        $selectedStatus = $request->get('status');
        $selectedBilling = $request->get('billing');

        $baseQuery = \App\Models\CityFeaturedSubscriptionInvoice::query()
            ->with([
                'subscription.cityPage.state',
                'subscription.slot',
            ])
            ->where('company_id', $company->id);

        $filteredQuery = clone $baseQuery;

        if (!empty($selectedStatus)) {
            $filteredQuery->where('status', $selectedStatus);
        }

        if (!empty($selectedBilling)) {
            $filteredQuery->whereHas('subscription', function ($q) use ($selectedBilling) {
                $q->where('billing_cycle', $selectedBilling);
            });
        }

        $invoices = $filteredQuery
            ->latest('paid_at')
            ->latest('id')
            ->paginate(15)
            ->appends($request->query());

        $totalPaidCents = (clone $baseQuery)
            ->where('status', 'paid')
            ->sum('amount_paid_cents');

        $thisMonthPaidCents = (clone $baseQuery)
            ->where('status', 'paid')
            ->whereBetween('paid_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->sum('amount_paid_cents');

        $monthlyPaidCents = (clone $baseQuery)
            ->where('status', 'paid')
            ->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'monthly');
            })
            ->sum('amount_paid_cents');

        $yearlyPaidCents = (clone $baseQuery)
            ->where('status', 'paid')
            ->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'yearly');
            })
            ->sum('amount_paid_cents');

        $paidInvoicesCount = (clone $baseQuery)
            ->where('status', 'paid')
            ->count();

        return view('company.city-featured-invoices.index', compact(
            'invoices',
            'totalPaidCents',
            'thisMonthPaidCents',
            'monthlyPaidCents',
            'yearlyPaidCents',
            'paidInvoicesCount',
            'selectedStatus',
            'selectedBilling'
        ));
    }

    public function show(CityFeaturedSubscriptionInvoice $invoice)
    {
        $company = $this->company();
        abort_if(! $company || (int) $invoice->company_id !== (int) $company->id, 403);

        $invoice->load(['subscription.cityPage.state', 'subscription.slot', 'company']);

        return view('company.city-featured-invoices.show', compact('invoice', 'company'));
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
}
