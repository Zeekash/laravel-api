<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ResourceFeaturedSubscriptionInvoice;
use Illuminate\Http\Request;

class ResourceFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $search = trim((string) $request->get('search'));

        $baseQuery = ResourceFeaturedSubscriptionInvoice::query();

        $totalRevenueCents = (clone $baseQuery)->where('status', 'paid')->sum('amount_paid_cents');
        $thisMonthRevenueCents = (clone $baseQuery)->where('status', 'paid')->whereMonth('paid_at', now()->month)->whereYear('paid_at', now()->year)->sum('amount_paid_cents');

        $query = ResourceFeaturedSubscriptionInvoice::query()
            ->with(['subscription.resourcePage', 'subscription.slot', 'company'])
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
                    ->orWhereHas('subscription.resourcePage', function ($resourceQuery) use ($search) {
                        $resourceQuery->where('title', 'like', "%{$search}%");
                    });
            });
        }

        $filteredRevenueCents = (clone $query)->where('status', 'paid')->sum('amount_paid_cents');
        $invoices = $query->paginate(20)->appends($request->query());

        return view('backend.pages.resource-featured-invoices.index', compact(
            'invoices',
            'totalRevenueCents',
            'thisMonthRevenueCents',
            'filteredRevenueCents',
            'status',
            'search'
        ));
    }

    public function show(ResourceFeaturedSubscriptionInvoice $invoice)
    {
        $invoice->load(['subscription.resourcePage', 'subscription.slot', 'company']);

        return view('backend.pages.resource-featured-invoices.show', compact('invoice'));
    }
}
