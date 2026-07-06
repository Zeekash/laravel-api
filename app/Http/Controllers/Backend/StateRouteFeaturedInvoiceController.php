<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StateRouteFeaturedSubscriptionInvoice;
use Illuminate\Http\Request;

class StateRouteFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $selectedStatus = $request->get('status');
        $selectedBilling = $request->get('billing');

        $baseQuery = StateRouteFeaturedSubscriptionInvoice::query()
            ->with(['subscription.fromState', 'subscription.toState', 'subscription.slot', 'company']);

        $filteredQuery = clone $baseQuery;

        if ($selectedStatus) {
            $filteredQuery->where('status', $selectedStatus);
        }

        if ($selectedBilling) {
            $filteredQuery->whereHas('subscription', fn ($q) => $q->where('billing_cycle', $selectedBilling));
        }

        $invoices = $filteredQuery->latest('paid_at')->latest('id')->paginate(15)->appends($request->query());

        $totalRevenueCents = (clone $baseQuery)->where('status', 'paid')->sum('amount_paid_cents');
        $filteredRevenueCents = (clone $filteredQuery)->where('status', 'paid')->sum('amount_paid_cents');
        $thisMonthRevenueCents = (clone $baseQuery)->where('status', 'paid')->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('amount_paid_cents');
        $paidInvoicesCount = (clone $baseQuery)->where('status', 'paid')->count();

        return view('backend.pages.route-featured-invoices.index', compact(
            'invoices',
            'totalRevenueCents',
            'filteredRevenueCents',
            'thisMonthRevenueCents',
            'paidInvoicesCount',
            'selectedStatus',
            'selectedBilling'
        ));
    }

    public function show(StateRouteFeaturedSubscriptionInvoice $invoice)
    {
        $invoice->loadMissing(['subscription.fromState', 'subscription.toState', 'subscription.slot', 'company']);

        return view('backend.pages.route-featured-invoices.show', compact('invoice'));
    }
}
