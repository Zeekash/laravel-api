@extends('backend.layouts.master')

@section('admin-content')
<style>
    .sfi-wrap{background:#f6f8fc;min-height:calc(100vh - 110px);padding:22px;border-radius:22px;color:#0f172a}
    .sfi-card{background:#fff;border:1px solid #e2e8f0;border-radius:18px;box-shadow:0 16px 40px rgba(15,23,42,.07);padding:18px;margin-bottom:16px}
    .sfi-head{display:flex;justify-content:space-between;align-items:flex-start;gap:14px;flex-wrap:wrap}.sfi-title{font-size:24px;font-weight:900;margin:0}.sfi-sub{color:#64748b;margin:6px 0 0}
    .sfi-stats{display:grid;grid-template-columns:repeat(6,minmax(0,1fr));gap:12px;margin-top:16px}.sfi-stat{background:linear-gradient(135deg,#fff,#f8fafc);border:1px solid #e2e8f0;border-radius:16px;padding:14px}.sfi-stat span{display:block;color:#64748b;font-size:12px;font-weight:800;text-transform:uppercase}.sfi-stat strong{display:block;margin-top:6px;font-size:20px;font-weight:950;color:#0f172a}
    .sfi-filter{display:grid;grid-template-columns:2fr 1fr 1fr 1fr 1fr auto;gap:10px;align-items:end}.sfi-field label{display:block;font-size:12px;font-weight:900;color:#334155;margin-bottom:6px}.sfi-input,.sfi-select{width:100%;height:42px;border:1px solid #cbd5e1;border-radius:12px;padding:0 12px;background:#fff;color:#0f172a}.sfi-btn{height:42px;border:0;border-radius:12px;padding:0 16px;background:#2563eb;color:#fff;font-weight:900;text-decoration:none;display:inline-flex;align-items:center;justify-content:center}.sfi-btn.light{background:#f1f5f9;color:#0f172a;border:1px solid #cbd5e1}.sfi-btn.green{background:#16a34a}
    .sfi-table-wrap{overflow-x:auto}.sfi-table{width:100%;border-collapse:separate;border-spacing:0 10px}.sfi-table th{font-size:12px;text-transform:uppercase;color:#64748b;text-align:left;padding:0 12px}.sfi-table td{background:#f8fafc;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;padding:13px 12px;vertical-align:middle}.sfi-table td:first-child{border-left:1px solid #e2e8f0;border-radius:14px 0 0 14px}.sfi-table td:last-child{border-right:1px solid #e2e8f0;border-radius:0 14px 14px 0}.sfi-main{font-weight:900;color:#0f172a}.sfi-small{font-size:12px;color:#64748b;margin-top:3px}.sfi-badge{display:inline-flex;align-items:center;border-radius:999px;padding:6px 10px;font-size:12px;font-weight:900;text-transform:capitalize}.sfi-badge.paid{background:#dcfce7;color:#166534}.sfi-badge.open,.sfi-badge.draft{background:#fef3c7;color:#92400e}.sfi-badge.void,.sfi-badge.failed,.sfi-badge.uncollectible{background:#fee2e2;color:#991b1b}.sfi-money{font-weight:950;color:#0f172a}.sfi-actions{display:flex;gap:8px;flex-wrap:wrap}.sfi-empty{text-align:center;padding:40px 10px;color:#64748b;font-weight:800}
    @media(max-width:1200px){.sfi-stats{grid-template-columns:repeat(3,1fr)}.sfi-filter{grid-template-columns:1fr 1fr 1fr}}@media(max-width:768px){.sfi-stats{grid-template-columns:1fr}.sfi-filter{grid-template-columns:1fr}.sfi-wrap{padding:14px}}
</style>

@php
    $money = function ($cents) {
        return '$' . number_format(($cents ?? 0) / 100, 2);
    };
@endphp

<div class="sfi-wrap">
    <div class="sfi-card">
        <div class="sfi-head">
            <div>
                <h1 class="sfi-title">State Featured Ads Invoices</h1>
                <p class="sfi-sub">Track all admin revenue from sponsored state slot subscriptions.</p>
            </div>
        </div>

        <div class="sfi-stats">
            <div class="sfi-stat"><span>Total Revenue</span><strong>{{ $money($stats['total_revenue_cents']) }}</strong></div>
            <div class="sfi-stat"><span>Filtered Revenue</span><strong>{{ $money($stats['filtered_revenue_cents']) }}</strong></div>
            <div class="sfi-stat"><span>This Month</span><strong>{{ $money($stats['month_revenue_cents']) }}</strong></div>
            <div class="sfi-stat"><span>Monthly Plans</span><strong>{{ $money($stats['monthly_revenue_cents']) }}</strong></div>
            <div class="sfi-stat"><span>Yearly Plans</span><strong>{{ $money($stats['yearly_revenue_cents']) }}</strong></div>
            <div class="sfi-stat"><span>Paid Invoices</span><strong>{{ number_format($stats['paid_invoices']) }}</strong></div>
        </div>
    </div>

    <div class="sfi-card">
        <form method="GET" class="sfi-filter">
            <div class="sfi-field">
                <label>Search</label>
                <input class="sfi-input" name="search" value="{{ $search }}" placeholder="Company, state, or Stripe invoice ID">
            </div>
            <div class="sfi-field">
                <label>Status</label>
                <select class="sfi-select" name="status">
                    <option value="">All</option>
                    @foreach(['paid','open','draft','void','uncollectible','failed'] as $item)
                        <option value="{{ $item }}" @selected($status === $item)>{{ ucfirst($item) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sfi-field">
                <label>Billing</label>
                <select class="sfi-select" name="billing_cycle">
                    <option value="">All</option>
                    <option value="monthly" @selected($billingCycle === 'monthly')>Monthly</option>
                    <option value="yearly" @selected($billingCycle === 'yearly')>Yearly</option>
                </select>
            </div>
            <div class="sfi-field">
                <label>From</label>
                <input class="sfi-input" type="date" name="date_from" value="{{ $dateFrom }}">
            </div>
            <div class="sfi-field">
                <label>To</label>
                <input class="sfi-input" type="date" name="date_to" value="{{ $dateTo }}">
            </div>
            <button class="sfi-btn" type="submit">Filter</button>
        </form>
    </div>

    <div class="sfi-card">
        <div class="sfi-table-wrap">
            <table class="sfi-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Company</th>
                        <th>State / Slot</th>
                        <th>Billing</th>
                        <th>Period</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($invoices as $invoice)
                    @php
                        $subscription = $invoice->subscription;
                        $companyName = optional($invoice->company)->company_name ?? optional($invoice->company)->name ?? 'Company #' . $invoice->company_id;
                        $stateName = optional(optional($subscription)->state)->name;
                        $stateAbv = optional(optional($subscription)->state)->abv;
                        $slotNumber = optional(optional($subscription)->slot)->slot_number;
                    @endphp
                    <tr>
                        <td>
                            <div class="sfi-main">INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</div>
                            <div class="sfi-small">{{ $invoice->stripe_invoice_id ?: 'Local invoice' }}</div>
                        </td>
                        <td>
                            <div class="sfi-main">{{ $companyName }}</div>
                            <div class="sfi-small">Company ID: {{ $invoice->company_id }}</div>
                        </td>
                        <td>
                            <div class="sfi-main">{{ $stateName ? $stateName . ', ' . $stateAbv : 'State removed' }}</div>
                            <div class="sfi-small">Slot {{ $slotNumber ?: '-' }}</div>
                        </td>
                        <td><span class="sfi-badge paid" style="background:#e0f2fe;color:#075985">{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</span></td>
                        <td>
                            <div class="sfi-main">{{ $invoice->period_start?->format('M d, Y') ?? '-' }}</div>
                            <div class="sfi-small">to {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</div>
                        </td>
                        <td><div class="sfi-money">{{ $invoice->amount_formatted }}</div>@if(($invoice->lead_addon_price_cents ?? 0) > 0)<div class="sfi-small">Includes {{ $invoice->lead_addon_leads_count ?: 5 }} leads add-on</div>@endif</td>
                        <td><span class="sfi-badge {{ $invoice->status ?: 'open' }}">{{ $invoice->status ?: 'unknown' }}</span></td>
                        <td>
                            <div class="sfi-actions">
                                <a class="sfi-btn light" href="{{ route('backend.state-featured-invoices.show', $invoice->id) }}">View</a>
                                @if($invoice->hosted_invoice_url)
                                    <a class="sfi-btn green" target="_blank" href="{{ $invoice->hosted_invoice_url }}">Stripe</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8"><div class="sfi-empty">No invoices found.</div></td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px">{{ $invoices->links() }}</div>
    </div>
</div>
@endsection
