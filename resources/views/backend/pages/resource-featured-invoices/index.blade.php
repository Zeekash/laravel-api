@extends('backend.layouts.master')

@section('admin-content')
<style>
    .inv-wrap{background:#f8fafc;border-radius:22px;padding:22px}.inv-hero{background:#fff;border:1px solid #e5e7eb;border-radius:22px;padding:22px;box-shadow:0 12px 35px rgba(15,23,42,.06);margin-bottom:18px}.inv-title{font-size:26px;font-weight:900;margin:0;color:#0f172a}.inv-sub{color:#64748b;margin:6px 0 0}.inv-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:18px}.inv-stat{border:1px solid #e5e7eb;border-radius:16px;padding:14px;background:#f8fafc}.inv-stat span{display:block;font-size:12px;color:#64748b;font-weight:800}.inv-stat strong{font-size:24px;color:#0f172a}.inv-panel{background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:16px;margin-bottom:18px}.inv-filter{display:flex;gap:10px;align-items:end;flex-wrap:wrap}.inv-input,.inv-select{border:1px solid #cbd5e1;border-radius:12px;padding:10px 12px}.inv-btn{border:0;border-radius:12px;padding:10px 14px;background:#2563eb;color:#fff;font-weight:800;text-decoration:none}.inv-table{width:100%;border-collapse:separate;border-spacing:0 10px}.inv-table th{font-size:12px;text-transform:uppercase;color:#64748b;text-align:left}.inv-table td{background:#fff;border-top:1px solid #e5e7eb;border-bottom:1px solid #e5e7eb;padding:13px}.inv-table td:first-child{border-left:1px solid #e5e7eb;border-radius:14px 0 0 14px}.inv-table td:last-child{border-right:1px solid #e5e7eb;border-radius:0 14px 14px 0}.badge-paid{background:#dcfce7;color:#166534;border-radius:999px;padding:5px 9px;font-size:12px;font-weight:800}@media(max-width:768px){.inv-stats{grid-template-columns:1fr}.inv-table{display:block;overflow:auto}}
</style>
<div class="inv-wrap">
    <div class="inv-hero">
        <h1 class="inv-title">Resource Featured Ad Invoices</h1>
        <p class="inv-sub">Admin revenue and invoice history.</p>
        <div class="inv-stats">
            <div class="inv-stat"><span>Total Revenue</span><strong>${{ number_format($totalRevenueCents / 100, 2) }}</strong></div>
            <div class="inv-stat"><span>This Month</span><strong>${{ number_format($thisMonthRevenueCents / 100, 2) }}</strong></div>
            <div class="inv-stat"><span>Filtered Revenue</span><strong>${{ number_format($filteredRevenueCents / 100, 2) }}</strong></div>
        </div>
    </div>

    <div class="inv-panel">
        <form class="inv-filter" method="GET">
            <input class="inv-input" name="search" value="{{ $search }}" placeholder="Search invoice, company, resource...">
            <select class="inv-select" name="status">
                <option value="">All status</option>
                <option value="paid" @selected($status === 'paid')>Paid</option>
                <option value="open" @selected($status === 'open')>Open</option>
                <option value="void" @selected($status === 'void')>Void</option>
            </select>
            <button class="inv-btn" type="submit">Filter</button>
            <a class="inv-btn" style="background:#fff;color:#0f172a;border:1px solid #e5e7eb" href="{{ url()->current() }}">Clear</a>
        </form>
    </div>

    <table class="inv-table">
        <thead><tr><th>Invoice</th><th>Company</th><th>Resource</th><th>Amount</th><th>Status</th><th>Period</th><th>Action</th></tr></thead>
        <tbody>
            @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->stripe_invoice_id }}</td>
                    <td>{{ optional($invoice->company)->company_name ?? optional($invoice->company)->name ?? 'Company' }}</td>
                    <td>{{ optional(optional($invoice->subscription)->resourcePage)->title ?? '-' }}</td>
                    <td><strong>${{ number_format($invoice->amount_paid_cents / 100, 2) }}</strong></td>
                    <td><span class="badge-paid">{{ ucfirst($invoice->status ?? '-') }}</span></td>
                    <td>{{ optional($invoice->period_start)->format('M d, Y') }} - {{ optional($invoice->period_end)->format('M d, Y') }}</td>
                    <td><a class="inv-btn" href="{{ route('admin.resource-featured-invoices.show', $invoice->id) }}">View</a></td>
                </tr>
            @empty
                <tr><td colspan="7">No invoices found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $invoices->links() }}
</div>
@endsection
