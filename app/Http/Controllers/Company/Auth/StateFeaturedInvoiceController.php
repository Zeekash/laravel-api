<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\StateFeaturedSubscriptionInvoice;
use Illuminate\Http\Request;

class StateFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $company = $this->company();
        abort_if(! $company, 403, 'Company profile not found.');

        $status = trim((string) $request->get('status'));
        $billingCycle = trim((string) $request->get('billing_cycle'));

        $query = StateFeaturedSubscriptionInvoice::query()
            ->with(['subscription.state', 'subscription.slot'])
            ->where('company_id', $company->id)
            ->latest('paid_at')
            ->latest('id');

        if ($status !== '') {
            $query->where('status', $status);
        }

        if (in_array($billingCycle, ['monthly', 'yearly'], true)) {
            $query->whereHas('subscription', function ($sq) use ($billingCycle) {
                $sq->where('billing_cycle', $billingCycle);
            });
        }

        $invoices = $query->paginate(20)->withQueryString();

        $paidBase = StateFeaturedSubscriptionInvoice::query()
            ->where('company_id', $company->id)
            ->where('status', 'paid');

        $stats = [
            'total_spent_cents' => (clone $paidBase)->sum('amount_paid_cents'),
            'month_spent_cents' => (clone $paidBase)->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('amount_paid_cents'),
            'monthly_spent_cents' => (clone $paidBase)->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'monthly');
            })->sum('amount_paid_cents'),
            'yearly_spent_cents' => (clone $paidBase)->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'yearly');
            })->sum('amount_paid_cents'),
            'paid_invoices' => (clone $paidBase)->count(),
        ];

        return view('company.state-featured-ads.invoices-index', compact(
            'company',
            'invoices',
            'stats',
            'status',
            'billingCycle'
        ));
    }

    public function show(StateFeaturedSubscriptionInvoice $invoice)
    {
        $company = $this->company();
        abort_if(! $company || $invoice->company_id !== $company->id, 403);

        $invoice->load(['company', 'subscription.state', 'subscription.slot']);

        return view('company.state-featured-ads.invoices-show', compact('invoice', 'company'));
    }

    private function company(): ?Company
    {
        if (auth()->guard('company')->check()) {
            $company = auth()->guard('company')->user();

            if ($company instanceof Company) {
                return $company;
            }

            if (! empty($company->id)) {
                return Company::find($company->id);
            }
        }

        if (session()->has('company_id')) {
            return Company::find(session('company_id'));
        }

        $user = auth()->user();

        if ($user instanceof Company) {
            return $user;
        }

        if ($user && ! empty($user->company_id)) {
            return Company::find($user->company_id);
        }

        return null;
    }
}
