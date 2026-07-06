<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\StateRouteFeaturedSubscriptionInvoice;
use Illuminate\Http\Request;

class StateRouteFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        $selectedStatus = $request->get('status');
        $selectedBilling = $request->get('billing');

        $baseQuery = StateRouteFeaturedSubscriptionInvoice::query()
            ->with(['subscription.fromState', 'subscription.toState', 'subscription.slot'])
            ->where('company_id', $company->id);

        $filteredQuery = clone $baseQuery;

        if ($selectedStatus) {
            $filteredQuery->where('status', $selectedStatus);
        }

        if ($selectedBilling) {
            $filteredQuery->whereHas('subscription', fn ($q) => $q->where('billing_cycle', $selectedBilling));
        }

        $invoices = $filteredQuery->latest('paid_at')->latest('id')->paginate(15)->appends($request->query());

        $totalPaidCents = (clone $baseQuery)->where('status', 'paid')->sum('amount_paid_cents');
        $thisMonthPaidCents = (clone $baseQuery)->where('status', 'paid')->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('amount_paid_cents');
        $monthlyPaidCents = (clone $baseQuery)->where('status', 'paid')->whereHas('subscription', fn ($q) => $q->where('billing_cycle', 'monthly'))->sum('amount_paid_cents');
        $yearlyPaidCents = (clone $baseQuery)->where('status', 'paid')->whereHas('subscription', fn ($q) => $q->where('billing_cycle', 'yearly'))->sum('amount_paid_cents');
        $paidInvoicesCount = (clone $baseQuery)->where('status', 'paid')->count();

        return view('company.route-featured-invoices.index', compact(
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

    public function show(StateRouteFeaturedSubscriptionInvoice $invoice)
    {
        $company = $this->company();
        abort_if(! $company || (int) $invoice->company_id !== (int) $company->id, 403);

        $invoice->loadMissing(['subscription.fromState', 'subscription.toState', 'subscription.slot', 'company']);

        return view('company.route-featured-invoices.show', compact('invoice'));
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
