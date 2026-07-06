<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CityFeaturedSubscriptionInvoice;

class CityFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $search = trim((string) $request->get('search'));

        $baseQuery = CityFeaturedSubscriptionInvoice::query();

        $totalRevenueCents = (clone $baseQuery)->where('status', 'paid')->sum('amount_paid_cents');
        $thisMonthRevenueCents = (clone $baseQuery)->where('status', 'paid')->whereMonth('paid_at', now()->month)->whereYear('paid_at', now()->year)->sum('amount_paid_cents');

        $query = CityFeaturedSubscriptionInvoice::query()
            ->with(['subscription.cityPage.state', 'subscription.slot', 'company'])
            ->latest('paid_at');

        if ($status) {
            $query->where('status', $status);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('stripe_invoice_id', 'like', "%{$search}%")
                    ->orWhereHas('company', function ($cq) use ($search) {
                        $cq->where('company_name', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('company_email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('subscription.cityPage', function ($cityQuery) use ($search) {
                        $cityQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $filteredRevenueCents = (clone $query)->where('status', 'paid')->sum('amount_paid_cents');
        $invoices = $query->paginate(20)->appends($request->query());

        return view('backend.pages.city-featured-invoices.index', compact(
            'invoices',
            'totalRevenueCents',
            'thisMonthRevenueCents',
            'filteredRevenueCents',
            'status',
            'search'
        ));
    }

    public function show(CityFeaturedSubscriptionInvoice $invoice)
    {
        $invoice->load(['subscription.cityPage.state', 'subscription.slot', 'company']);

        return view('backend.pages.city-featured-invoices.show', compact('invoice'));
    }
}
