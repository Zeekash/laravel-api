<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StateFeaturedSubscriptionInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StateFeaturedInvoiceController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search'));
        $status = trim((string) $request->get('status'));
        $billingCycle = trim((string) $request->get('billing_cycle'));
        $dateFrom = $request->get('date_from');
        $dateTo = $request->get('date_to');

        $query = StateFeaturedSubscriptionInvoice::query()
            ->with(['company', 'subscription.state', 'subscription.slot'])
            ->latest('paid_at')
            ->latest('id');

        if ($search !== '') {
            $companyColumns = $this->companySearchColumns();

            $query->where(function ($q) use ($search, $companyColumns) {
                $q->where('stripe_invoice_id', 'like', "%{$search}%");

                if (! empty($companyColumns)) {
                    $q->orWhereHas('company', function ($cq) use ($search, $companyColumns) {
                        $cq->where(function ($ccq) use ($search, $companyColumns) {
                            foreach ($companyColumns as $index => $column) {
                                if ($index === 0) {
                                    $ccq->where($column, 'like', "%{$search}%");
                                } else {
                                    $ccq->orWhere($column, 'like', "%{$search}%");
                                }
                            }
                        });
                    });
                }

                $q->orWhereHas('subscription.state', function ($sq) use ($search) {
                    $sq->where('name', 'like', "%{$search}%")
                        ->orWhere('abv', 'like', "%{$search}%");
                });
            });
        }

        if ($status !== '') {
            $query->where('status', $status);
        }

        if (in_array($billingCycle, ['monthly', 'yearly'], true)) {
            $query->whereHas('subscription', function ($sq) use ($billingCycle) {
                $sq->where('billing_cycle', $billingCycle);
            });
        }

        if ($dateFrom) {
            $query->whereDate('paid_at', '>=', Carbon::parse($dateFrom)->toDateString());
        }

        if ($dateTo) {
            $query->whereDate('paid_at', '<=', Carbon::parse($dateTo)->toDateString());
        }

        $filteredRevenueCents = (clone $query)->where('status', 'paid')->sum('amount_paid_cents');

        $invoices = $query->paginate(20)->withQueryString();

        $paidBase = StateFeaturedSubscriptionInvoice::query()->where('status', 'paid');

        $stats = [
            'total_revenue_cents' => (clone $paidBase)->sum('amount_paid_cents'),
            'filtered_revenue_cents' => $filteredRevenueCents,
            'month_revenue_cents' => (clone $paidBase)->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('amount_paid_cents'),
            'monthly_revenue_cents' => (clone $paidBase)->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'monthly');
            })->sum('amount_paid_cents'),
            'yearly_revenue_cents' => (clone $paidBase)->whereHas('subscription', function ($q) {
                $q->where('billing_cycle', 'yearly');
            })->sum('amount_paid_cents'),
            'paid_invoices' => (clone $paidBase)->count(),
        ];

        return view('backend.pages.state-featured-slots.invoices-index', compact(
            'invoices',
            'stats',
            'search',
            'status',
            'billingCycle',
            'dateFrom',
            'dateTo'
        ));
    }

    public function show(StateFeaturedSubscriptionInvoice $invoice)
    {
        $invoice->load(['company', 'subscription.state', 'subscription.slot']);

        return view('backend.pages.state-featured-slots.invoices-show', compact('invoice'));
    }

    private function companySearchColumns(): array
    {
        return collect(['name', 'company_name', 'email', 'company_email', 'contact_email', 'billing_email'])
            ->filter(function ($column) {
                return Schema::hasColumn('companies', $column);
            })
            ->values()
            ->all();
    }
}
