@php
    $subscription = $invoice->subscription;
    $company = $invoice->company;
    $routeName = optional($subscription)->routeName() ?? '-';
    $invoiceNo = 'INV-' . str_pad($invoice->id, 5, '0', STR_PAD_LEFT);
@endphp
<style>
    .print-wrap{max-width:850px;margin:0 auto;background:#fff;color:#0f172a;font-family:Arial,Helvetica,sans-serif}.print-head{display:flex;justify-content:space-between;gap:20px;border-bottom:2px solid #e5e7eb;padding-bottom:18px;margin-bottom:22px}.brand{display:flex;align-items:center;gap:12px}.brand img{width:52px;height:52px;object-fit:contain}.brand-title{font-size:24px;font-weight:900}.muted{color:#64748b}.box{border:1px solid #e5e7eb;border-radius:16px;padding:16px;margin-bottom:16px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.table{width:100%;border-collapse:collapse}.table th,.table td{padding:12px;border-bottom:1px solid #e5e7eb;text-align:left}.total{font-size:24px;font-weight:900;text-align:right}.print-btn{background:#2563eb;color:#fff;border:0;border-radius:10px;padding:10px 16px;font-weight:900}@media print{.no-print{display:none}.print-wrap{max-width:none}}
</style>
<div class="print-wrap">
    <div class="no-print" style="text-align:right;margin-bottom:14px"><button class="print-btn" onclick="window.print()">Print / Download PDF</button></div>
    <div class="print-head">
        <div class="brand"><img src="{{ asset('assets/img/logo.png') }}" alt="My Moving Journey"><div><div class="brand-title">My Moving Journey</div><div class="muted">Route Featured Ads Invoice</div></div></div>
        <div style="text-align:right"><h2 style="margin:0">{{ $invoiceNo }}</h2><div class="muted">{{ optional($invoice->paid_at)->format('M d, Y') ?? optional($invoice->created_at)->format('M d, Y') }}</div></div>
    </div>
    <div class="grid">
        <div class="box"><strong>Billed To</strong><p>{{ $company->company_name ?? $company->name ?? 'Company' }}</p><p class="muted">{{ $company->company_email ?? $company->email ?? '' }}</p></div>
        <div class="box"><strong>Subscription</strong><p>{{ $routeName }}</p><p class="muted">Slot {{ optional(optional($subscription)->slot)->slot_number ?? '-' }} · {{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</p></div>
    </div>
    <div class="box"><table class="table"><thead><tr><th>Description</th><th>Period</th><th style="text-align:right">Amount</th></tr></thead><tbody><tr><td>Sponsored route featured slot</td><td>{{ optional($invoice->period_start)->format('M d, Y') }} - {{ optional($invoice->period_end)->format('M d, Y') }}</td><td style="text-align:right">{{ strtoupper($invoice->currency ?? 'USD') }} {{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }}</td></tr></tbody></table><div class="total">Total: {{ strtoupper($invoice->currency ?? 'USD') }} {{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }}</div></div>
    @if(!empty($invoice->hosted_invoice_url))<p class="no-print"><a href="{{ $invoice->hosted_invoice_url }}" target="_blank">Open Stripe invoice</a></p>@endif
</div>
