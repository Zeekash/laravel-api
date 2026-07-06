@extends('company.layouts.master')

@section('content')
<style>
    .cfi-wrap{background:#f5f7fb;min-height:calc(100vh - 120px);border-radius:22px;padding:24px;color:#0f172a}
    .cfi-card{background:#fff;border:1px solid #e2e8f0;border-radius:20px;box-shadow:0 18px 50px rgba(15,23,42,.08);padding:20px;margin-bottom:16px}.cfi-head{display:flex;justify-content:space-between;align-items:flex-start;gap:14px;flex-wrap:wrap}.cfi-kicker{font-size:13px;color:#2563eb;font-weight:900;margin-bottom:6px}.cfi-title{margin:0;font-size:26px;font-weight:950}.cfi-sub{margin:7px 0 0;color:#64748b;font-size:14px}.cfi-stats{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:12px;margin-top:16px}.cfi-stat{background:linear-gradient(135deg,#ffffff,#f8fafc);border:1px solid #e2e8f0;border-radius:16px;padding:14px}.cfi-stat span{display:block;font-size:12px;color:#64748b;text-transform:uppercase;font-weight:900}.cfi-stat strong{display:block;margin-top:7px;font-size:20px;font-weight:950;color:#0f172a}
    .cfi-filter{display:flex;gap:10px;align-items:end;flex-wrap:wrap}.cfi-field label{display:block;font-size:12px;font-weight:900;color:#334155;margin-bottom:6px}.cfi-select{height:42px;border:1px solid #cbd5e1;border-radius:12px;background:#fff;padding:0 12px;min-width:170px}.cfi-btn{height:42px;border:0;border-radius:12px;padding:0 16px;background:#2563eb;color:#fff;font-weight:900;text-decoration:none;display:inline-flex;align-items:center;justify-content:center}.cfi-btn.light{background:#f1f5f9;color:#0f172a;border:1px solid #cbd5e1}.cfi-btn.green{background:#16a34a}.cfi-table-wrap{overflow-x:auto}.cfi-table{width:100%;border-collapse:separate;border-spacing:0 10px}.cfi-table th{font-size:12px;text-transform:uppercase;color:#64748b;text-align:left;padding:0 12px}.cfi-table td{background:#f8fafc;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;padding:13px 12px;vertical-align:middle}.cfi-table td:first-child{border-left:1px solid #e2e8f0;border-radius:14px 0 0 14px}.cfi-table td:last-child{border-right:1px solid #e2e8f0;border-radius:0 14px 14px 0}.cfi-main{font-weight:900;color:#0f172a}.cfi-small{font-size:12px;color:#64748b;margin-top:3px}.cfi-money{font-weight:950;color:#0f172a}.cfi-badge{display:inline-flex;border-radius:999px;padding:6px 10px;font-size:12px;font-weight:900;text-transform:capitalize}.cfi-badge.paid{background:#dcfce7;color:#166534}.cfi-badge.open,.cfi-badge.draft{background:#fef3c7;color:#92400e}.cfi-badge.void,.cfi-badge.failed,.cfi-badge.uncollectible{background:#fee2e2;color:#991b1b}.cfi-empty{text-align:center;padding:42px 10px;color:#64748b;font-weight:800}.cfi-actions{display:flex;gap:8px;flex-wrap:wrap}
    @media(max-width:1100px){.cfi-stats{grid-template-columns:repeat(2,1fr)}}@media(max-width:640px){.cfi-wrap{padding:14px}.cfi-stats{grid-template-columns:1fr}.cfi-filter{display:grid;grid-template-columns:1fr}.cfi-select,.cfi-btn{width:100%}}
</style>

@php
    $money = function ($cents) {
        return '$' . number_format(($cents ?? 0) / 100, 2);
    };
@endphp

<div class="cfi-wrap">
    <div class="cfi-card">
        <div class="cfi-head">
            <div>
                <div class="cfi-kicker">Sponsored State Slots</div>
                <h1 class="cfi-title">My Invoices</h1>
                <p class="cfi-sub">View your state featured ads subscription payments and billing history.</p>
            </div>
            <a class="cfi-btn light" href="{{ route('company.state-featured-ads.index') }}">Back to State Slots</a>
        </div>

        <div class="cfi-stats">
            <div class="cfi-stat"><span>Total Paid</span><strong>{{ $money($stats['total_spent_cents']) }}</strong></div>
            <div class="cfi-stat"><span>This Month</span><strong>{{ $money($stats['month_spent_cents']) }}</strong></div>
            <div class="cfi-stat"><span>Monthly Plans</span><strong>{{ $money($stats['monthly_spent_cents']) }}</strong></div>
            <div class="cfi-stat"><span>Yearly Plans</span><strong>{{ $money($stats['yearly_spent_cents']) }}</strong></div>
            <div class="cfi-stat"><span>Paid Invoices</span><strong>{{ number_format($stats['paid_invoices']) }}</strong></div>
        </div>
    </div>

    <div class="cfi-card">
        <form method="GET" class="cfi-filter">
            <div class="cfi-field">
                <label>Status</label>
                <select class="cfi-select" name="status">
                    <option value="">All</option>
                    @foreach(['paid','open','draft','void','uncollectible','failed'] as $item)
                        <option value="{{ $item }}" @selected($status === $item)>{{ ucfirst($item) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="cfi-field">
                <label>Billing</label>
                <select class="cfi-select" name="billing_cycle">
                    <option value="">All</option>
                    <option value="monthly" @selected($billingCycle === 'monthly')>Monthly</option>
                    <option value="yearly" @selected($billingCycle === 'yearly')>Yearly</option>
                </select>
            </div>
            <button class="cfi-btn" type="submit">Apply Filter</button>
        </form>
    </div>

    <div class="cfi-card">
        <div class="cfi-table-wrap">
            <table class="cfi-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
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
                        $stateName = optional(optional($subscription)->state)->name;
                        $stateAbv = optional(optional($subscription)->state)->abv;
                        $slotNumber = optional(optional($subscription)->slot)->slot_number;
                    @endphp
                    <tr>
                        <td>
                            <div class="cfi-main">INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</div>
                            <div class="cfi-small">{{ $invoice->paid_at?->format('M d, Y h:i A') ?? 'Not paid yet' }}</div>
                        </td>
                        <td>
                            <div class="cfi-main">{{ $stateName ? $stateName . ', ' . $stateAbv : 'State removed' }}</div>
                            <div class="cfi-small">Slot {{ $slotNumber ?: '-' }}</div>
                        </td>
                        <td><span class="cfi-badge paid" style="background:#e0f2fe;color:#075985">{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</span></td>
                        <td>
                            <div class="cfi-main">{{ $invoice->period_start?->format('M d, Y') ?? '-' }}</div>
                            <div class="cfi-small">to {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</div>
                        </td>
                        <td><div class="cfi-money">{{ $invoice->amount_formatted }}</div>@if(($invoice->lead_addon_price_cents ?? 0) > 0)<div class="cfi-small">Includes {{ $invoice->lead_addon_leads_count ?: 5 }} leads add-on</div>@endif</td>
                        <td><span class="cfi-badge {{ $invoice->status ?: 'open' }}">{{ $invoice->status ?: 'unknown' }}</span></td>
                        <td>
                            <div class="cfi-actions">
                                <a class="cfi-btn light" href="{{ route('company.state-featured-invoices.show', $invoice->id) }}">View</a>
                                @if($invoice->hosted_invoice_url)
                                    <a class="cfi-btn green" target="_blank" href="{{ $invoice->hosted_invoice_url }}">Stripe</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7"><div class="cfi-empty">No invoices found yet.</div></td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px">{{ $invoices->links() }}</div>
    </div>
</div>
@endsection
