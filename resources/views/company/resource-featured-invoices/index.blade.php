@extends('company.layouts.master')

@section('content')
<style>.ci-wrap{background:#f8fafc;border-radius:22px;padding:22px}.ci-card{background:#fff;border:1px solid #e5e7eb;border-radius:18px;padding:18px;margin-bottom:16px}.ci-title{font-size:25px;font-weight:900;margin:0}.ci-table{width:100%;border-collapse:separate;border-spacing:0 10px}.ci-table th{text-align:left;font-size:12px;color:#64748b;text-transform:uppercase}.ci-table td{background:#fff;border-top:1px solid #e5e7eb;border-bottom:1px solid #e5e7eb;padding:13px}.ci-table td:first-child{border-left:1px solid #e5e7eb;border-radius:14px 0 0 14px}.ci-table td:last-child{border-right:1px solid #e5e7eb;border-radius:0 14px 14px 0}.ci-btn{background:#2563eb;color:#fff;border-radius:10px;padding:8px 12px;text-decoration:none;font-weight:800}</style>
<div class="ci-wrap">
    <div class="ci-card">
        <h1 class="ci-title">Resource Featured Ad Invoices</h1>
        <p>Total Paid: <strong>${{ number_format($totalPaidCents / 100, 2) }}</strong></p>
    </div>
    <table class="ci-table">
        <thead><tr><th>Invoice</th><th>Resource</th><th>Amount</th><th>Status</th><th>Period</th><th>Action</th></tr></thead>
        <tbody>
            @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->stripe_invoice_id }}</td>
                    <td>{{ optional(optional($invoice->subscription)->resourcePage)->title ?? '-' }}</td>
                    <td><strong>${{ number_format($invoice->amount_paid_cents / 100, 2) }}</strong></td>
                    <td>{{ ucfirst($invoice->status ?? '-') }}</td>
                    <td>{{ optional($invoice->period_start)->format('M d, Y') }} - {{ optional($invoice->period_end)->format('M d, Y') }}</td>
                    <td><a class="ci-btn" href="{{ route('company.resource-featured-invoices.show', $invoice->id) }}">View</a></td>
                </tr>
            @empty
                <tr><td colspan="6">No invoices found.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $invoices->links() }}
</div>
@endsection
