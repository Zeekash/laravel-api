<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ResourceFeaturedSubscriptionInvoice;
use Illuminate\Http\Request;

class ResourceFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $company = $this->company();
        abort_if(! $company, 403);

        $query = ResourceFeaturedSubscriptionInvoice::query()
            ->with(['subscription.resourcePage', 'subscription.slot'])
            ->where('company_id', $company->id)
            ->latest('paid_at');

        $totalPaidCents = (clone $query)->where('status', 'paid')->sum('amount_paid_cents');
        $invoices = $query->paginate(20)->appends($request->query());

        return view('company.resource-featured-invoices.index', compact('company', 'invoices', 'totalPaidCents'));
    }

    public function show(ResourceFeaturedSubscriptionInvoice $invoice)
    {
        $company = $this->company();
        abort_if(! $company || (int) $invoice->company_id !== (int) $company->id, 403);

        $invoice->load(['subscription.resourcePage', 'subscription.slot', 'company']);

        return view('company.resource-featured-invoices.show', compact('invoice', 'company'));
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
