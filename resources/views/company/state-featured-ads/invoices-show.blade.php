@extends('company.layouts.master')

@section('content')
<style>
    .cfi-page{background:#f5f7fb;min-height:calc(100vh - 120px);padding:24px;border-radius:22px;color:#0f172a}
    .cfi-shell{max-width:980px;margin:0 auto}
    .cfi-top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:16px}
    .cfi-btn{height:42px;border:0;border-radius:12px;padding:0 16px;background:#2563eb;color:#fff;font-weight:900;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;cursor:pointer}
    .cfi-btn.light{background:#fff;color:#0f172a;border:1px solid #cbd5e1}
    .cfi-card{background:#fff;border:1px solid #e2e8f0;border-radius:22px;box-shadow:0 18px 50px rgba(15,23,42,.08);overflow:hidden}
    .cfi-head{padding:28px;background:linear-gradient(135deg,#0f172a,#2563eb);color:#fff;display:flex;justify-content:space-between;gap:18px;flex-wrap:wrap;align-items:flex-start}
    .cfi-brand-wrap{display:flex;align-items:center;gap:14px}
    .cfi-logo-box{width:58px;height:58px;border-radius:16px;background:#fff;display:flex;align-items:center;justify-content:center;padding:8px;box-shadow:0 12px 30px rgba(15,23,42,.20);flex:0 0 auto}
    .cfi-logo{max-width:100%;max-height:100%;object-fit:contain;display:block}
    .cfi-brand{font-size:25px;font-weight:950;margin:0;line-height:1.15;color:#fff}
    .cfi-brand-sub{font-size:13px;font-weight:800;color:#bfdbfe;margin-top:3px;letter-spacing:.01em}
    .cfi-muted-light{color:#dbeafe;margin-top:8px}
    .cfi-invoice-no{text-align:right}.cfi-invoice-no strong{font-size:22px}
    .cfi-body{padding:28px}
    .cfi-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
    .cfi-box{border:1px solid #e2e8f0;background:#f8fafc;border-radius:16px;padding:16px}
    .cfi-label{font-size:12px;text-transform:uppercase;font-weight:900;color:#64748b;margin-bottom:8px}
    .cfi-main{font-weight:950;color:#0f172a}.cfi-small{color:#64748b;font-size:13px;margin-top:5px}
    .cfi-table{width:100%;border-collapse:collapse;margin-top:22px}.cfi-table th{background:#f1f5f9;color:#334155;font-size:12px;text-transform:uppercase;text-align:left;padding:13px;border-bottom:1px solid #e2e8f0}.cfi-table td{padding:14px 13px;border-bottom:1px solid #e2e8f0}
    .cfi-total{display:flex;justify-content:flex-end;margin-top:20px}.cfi-total-box{min-width:320px;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden}.cfi-total-row{display:flex;justify-content:space-between;padding:14px 16px;background:#f8fafc}.cfi-total-row.final{background:#0f172a;color:#fff;font-weight:950;font-size:18px}
    .cfi-badge{display:inline-flex;border-radius:999px;padding:6px 10px;font-size:12px;font-weight:900;text-transform:capitalize}.cfi-badge.paid{background:#dcfce7;color:#166534}.cfi-badge.open,.cfi-badge.draft{background:#fef3c7;color:#92400e}.cfi-badge.void,.cfi-badge.failed,.cfi-badge.uncollectible{background:#fee2e2;color:#991b1b}
    @media(max-width:768px){.cfi-grid{grid-template-columns:1fr}.cfi-invoice-no{text-align:left}.cfi-page{padding:14px}.cfi-body{padding:18px}.cfi-brand{font-size:22px}.cfi-logo-box{width:52px;height:52px}}
    @media print{
        body *{visibility:hidden!important}
        .cfi-card,.cfi-card *{visibility:visible!important}
        .cfi-card{position:absolute;left:0;top:0;width:100%;box-shadow:none;border-radius:0;border:0}
        .cfi-top{display:none!important}
        .cfi-page{background:#fff!important;padding:0!important;min-height:auto!important}
        .cfi-head{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        .cfi-total-row.final{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        .cfi-logo-box{background:#fff!important;-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        @page{margin:14mm}
    }
</style>

@php
    $subscription = $invoice->subscription;
    $company = $invoice->company;
    $companyName = optional($company)->company_name ?? optional($company)->name ?? 'Your Company';
    $companyEmail = optional($company)->company_email ?? optional($company)->email ?? optional($company)->contact_email ?? optional($company)->billing_email;
    $stateName = optional(optional($subscription)->state)->name;
    $stateAbv = optional(optional($subscription)->state)->abv;
    $slotNumber = optional(optional($subscription)->slot)->slot_number;
    $slotAmountCents = (int) ($invoice->slot_price_cents ?: optional($subscription)->price_cents ?: $invoice->amount_paid_cents);
    $leadAddonAmountCents = (int) ($invoice->lead_addon_price_cents ?: optional($subscription)->lead_addon_price_cents ?: 0);
    $leadAddonCount = (int) ($invoice->lead_addon_leads_count ?: optional($subscription)->lead_addon_leads_count ?: 0);
    $formatInvoiceMoney = function ($cents) use ($invoice) {
        return strtoupper($invoice->currency ?? 'USD') . ' ' . number_format(($cents ?? 0) / 100, 2);
    };
@endphp

<div class="cfi-page">
    <div class="cfi-shell">
        <div class="cfi-top">
            <a class="cfi-btn light" href="{{ route('company.state-featured-invoices.index') }}">Back to Invoices</a>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                @if($invoice->invoice_pdf)
                    <a class="cfi-btn light" target="_blank" href="{{ $invoice->invoice_pdf }}">Download Stripe PDF</a>
                @endif
                <button class="cfi-btn" type="button" onclick="window.print()">Print / Download PDF</button>
            </div>
        </div>

        <div class="cfi-card">
            <div class="cfi-head">
                <div>
                    <div class="cfi-brand-wrap">
                        <div class="cfi-logo-box">
                            <img class="cfi-logo" src="{{ asset('assets/img/logo.png') }}" alt="My Moving Journey Logo">
                        </div>
                        <div>
                            <h1 class="cfi-brand">My Moving Journey</h1>
                            <div class="cfi-brand-sub">State Featured Ads</div>
                        </div>
                    </div>
                    <div class="cfi-muted-light">Sponsored state slot subscription invoice</div>
                </div>
                <div class="cfi-invoice-no">
                    <div>Invoice</div>
                    <strong>INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</strong>
                    <div style="margin-top:8px"><span class="cfi-badge {{ $invoice->status ?: 'open' }}">{{ $invoice->status ?: 'unknown' }}</span></div>
                </div>
            </div>

            <div class="cfi-body">
                <div class="cfi-grid">
                    <div class="cfi-box">
                        <div class="cfi-label">Billed To</div>
                        <div class="cfi-main">{{ $companyName }}</div>
                        @if($companyEmail)<div class="cfi-small">{{ $companyEmail }}</div>@endif
                    </div>
                    <div class="cfi-box">
                        <div class="cfi-label">Invoice Details</div>
                        <div class="cfi-main">Paid: {{ $invoice->paid_at?->format('M d, Y h:i A') ?? '-' }}</div>
                        <div class="cfi-small">Invoice ID: INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</div>
                        <div class="cfi-small">Currency: {{ strtoupper($invoice->currency ?? 'USD') }}</div>
                    </div>
                </div>

                <table class="cfi-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Billing</th>
                            <th>Period</th>
                            <th style="text-align:right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="cfi-main">Sponsored State Featured Slot</div>
                                <div class="cfi-small">{{ $stateName ? $stateName . ', ' . $stateAbv : 'State removed' }} · Slot {{ $slotNumber ?: '-' }}</div>
                            </td>
                            <td>{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</td>
                            <td>{{ $invoice->period_start?->format('M d, Y') ?? '-' }} - {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</td>
                            <td style="text-align:right;font-weight:950">{{ $formatInvoiceMoney($leadAddonAmountCents > 0 ? $slotAmountCents : $invoice->amount_paid_cents) }}</td>
                        </tr>
                        @if($leadAddonAmountCents > 0)
                            <tr>
                                <td>
                                    <div class="cfi-main">Leads Add-on</div>
                                    <div class="cfi-small">{{ $leadAddonCount ?: 5 }} additional leads pack</div>
                                </td>
                                <td>{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</td>
                                <td>{{ $invoice->period_start?->format('M d, Y') ?? '-' }} - {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</td>
                                <td style="text-align:right;font-weight:950">{{ $formatInvoiceMoney($leadAddonAmountCents) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="cfi-total">
                    <div class="cfi-total-box">
                        <div class="cfi-total-row"><span>Slot Price</span><strong>{{ $formatInvoiceMoney($slotAmountCents) }}</strong></div>
                        @if($leadAddonAmountCents > 0)
                            <div class="cfi-total-row"><span>Leads Add-on</span><strong>{{ $formatInvoiceMoney($leadAddonAmountCents) }}</strong></div>
                        @endif
                        <div class="cfi-total-row"><span>Subtotal</span><strong>{{ $invoice->amount_formatted }}</strong></div>
                        <div class="cfi-total-row"><span>Tax</span><strong>$0.00</strong></div>
                        <div class="cfi-total-row final"><span>Total Paid</span><strong>{{ $invoice->amount_formatted }}</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
