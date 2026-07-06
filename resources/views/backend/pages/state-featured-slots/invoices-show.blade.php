@extends('backend.layouts.master')

@section('admin-content')
<style>
    .sfi-page{background:#f6f8fc;min-height:calc(100vh - 110px);padding:24px;border-radius:22px;color:#0f172a}
    .sfi-shell{max-width:980px;margin:0 auto}
    .sfi-top{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:16px}
    .sfi-btn{height:42px;border:0;border-radius:12px;padding:0 16px;background:#2563eb;color:#fff;font-weight:900;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;cursor:pointer}
    .sfi-btn.light{background:#fff;color:#0f172a;border:1px solid #cbd5e1}
    .sfi-card{background:#fff;border:1px solid #e2e8f0;border-radius:22px;box-shadow:0 18px 50px rgba(15,23,42,.08);overflow:hidden}
    .sfi-invoice-head{padding:28px;background:linear-gradient(135deg,#0f172a,#2563eb);color:#fff;display:flex;justify-content:space-between;gap:18px;flex-wrap:wrap;align-items:flex-start}
    .sfi-brand-wrap{display:flex;align-items:center;gap:14px}
    .sfi-logo-box{width:58px;height:58px;border-radius:16px;background:#fff;display:flex;align-items:center;justify-content:center;padding:8px;box-shadow:0 12px 30px rgba(15,23,42,.20);flex:0 0 auto}
    .sfi-logo{max-width:100%;max-height:100%;object-fit:contain;display:block}
    .sfi-brand{font-size:25px;font-weight:950;margin:0;line-height:1.15;color:#fff}
    .sfi-brand-sub{font-size:13px;font-weight:800;color:#bfdbfe;margin-top:3px;letter-spacing:.01em}
    .sfi-muted-light{color:#dbeafe;margin-top:8px}
    .sfi-invoice-no{text-align:right}.sfi-invoice-no strong{font-size:22px}
    .sfi-body{padding:28px}
    .sfi-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
    .sfi-box{border:1px solid #e2e8f0;background:#f8fafc;border-radius:16px;padding:16px}
    .sfi-label{font-size:12px;text-transform:uppercase;font-weight:900;color:#64748b;margin-bottom:8px}
    .sfi-main{font-weight:950;color:#0f172a}.sfi-small{color:#64748b;font-size:13px;margin-top:5px}
    .sfi-table{width:100%;border-collapse:collapse;margin-top:22px}.sfi-table th{background:#f1f5f9;color:#334155;font-size:12px;text-transform:uppercase;text-align:left;padding:13px;border-bottom:1px solid #e2e8f0}.sfi-table td{padding:14px 13px;border-bottom:1px solid #e2e8f0}
    .sfi-total{display:flex;justify-content:flex-end;margin-top:20px}.sfi-total-box{min-width:320px;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden}.sfi-total-row{display:flex;justify-content:space-between;padding:14px 16px;background:#f8fafc}.sfi-total-row.final{background:#0f172a;color:#fff;font-weight:950;font-size:18px}
    .sfi-badge{display:inline-flex;border-radius:999px;padding:6px 10px;font-size:12px;font-weight:900;text-transform:capitalize}.sfi-badge.paid{background:#dcfce7;color:#166534}.sfi-badge.open,.sfi-badge.draft{background:#fef3c7;color:#92400e}.sfi-badge.void,.sfi-badge.failed,.sfi-badge.uncollectible{background:#fee2e2;color:#991b1b}
    @media(max-width:768px){.sfi-grid{grid-template-columns:1fr}.sfi-invoice-no{text-align:left}.sfi-page{padding:14px}.sfi-body{padding:18px}.sfi-brand{font-size:22px}.sfi-logo-box{width:52px;height:52px}}
    @media print{
        body *{visibility:hidden!important}
        .sfi-card,.sfi-card *{visibility:visible!important}
        .sfi-card{position:absolute;left:0;top:0;width:100%;box-shadow:none;border-radius:0;border:0}
        .sfi-top{display:none!important}
        .sfi-page{background:#fff!important;padding:0!important;min-height:auto!important}
        .sfi-invoice-head{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        .sfi-total-row.final{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        .sfi-logo-box{background:#fff!important;-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
        @page{margin:14mm}
    }
</style>

@php
    $subscription = $invoice->subscription;
    $company = $invoice->company;
    $companyName = optional($company)->company_name ?? optional($company)->name ?? 'Company #' . $invoice->company_id;
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

<div class="sfi-page">
    <div class="sfi-shell">
        <div class="sfi-top">
            <a class="sfi-btn light" href="{{ route('backend.state-featured-invoices.index') }}">Back to Invoices</a>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                @if($invoice->invoice_pdf)
                    <a class="sfi-btn light" target="_blank" href="{{ $invoice->invoice_pdf }}">Download Stripe PDF</a>
                @endif
                <button class="sfi-btn" type="button" onclick="window.print()">Print / Download PDF</button>
            </div>
        </div>

        <div class="sfi-card">
            <div class="sfi-invoice-head">
                <div>
                    <div class="sfi-brand-wrap">
                        <div class="sfi-logo-box">
                            <img class="sfi-logo" src="{{ asset('assets/img/logo.png') }}" alt="My Moving Journey Logo">
                        </div>
                        <div>
                            <h1 class="sfi-brand">My Moving Journey</h1>
                            <div class="sfi-brand-sub">State Featured Ads</div>
                        </div>
                    </div>
                    <div class="sfi-muted-light">Sponsored state slot subscription invoice</div>
                </div>
                <div class="sfi-invoice-no">
                    <div>Invoice</div>
                    <strong>INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</strong>
                    <div style="margin-top:8px"><span class="sfi-badge {{ $invoice->status ?: 'open' }}">{{ $invoice->status ?: 'unknown' }}</span></div>
                </div>
            </div>

            <div class="sfi-body">
                <div class="sfi-grid">
                    <div class="sfi-box">
                        <div class="sfi-label">Billed To</div>
                        <div class="sfi-main">{{ $companyName }}</div>
                        @if($companyEmail)<div class="sfi-small">{{ $companyEmail }}</div>@endif
                        <div class="sfi-small">Company ID: {{ $invoice->company_id }}</div>
                    </div>
                    <div class="sfi-box">
                        <div class="sfi-label">Invoice Details</div>
                        <div class="sfi-main">Paid: {{ $invoice->paid_at?->format('M d, Y h:i A') ?? '-' }}</div>
                        <div class="sfi-small">Stripe Invoice: {{ $invoice->stripe_invoice_id ?: '-' }}</div>
                        <div class="sfi-small">Currency: {{ strtoupper($invoice->currency ?? 'USD') }}</div>
                    </div>
                </div>

                <table class="sfi-table">
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
                                <div class="sfi-main">Sponsored State Featured Slot</div>
                                <div class="sfi-small">{{ $stateName ? $stateName . ', ' . $stateAbv : 'State removed' }} · Slot {{ $slotNumber ?: '-' }}</div>
                            </td>
                            <td>{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</td>
                            <td>{{ $invoice->period_start?->format('M d, Y') ?? '-' }} - {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</td>
                            <td style="text-align:right;font-weight:950">{{ $formatInvoiceMoney($leadAddonAmountCents > 0 ? $slotAmountCents : $invoice->amount_paid_cents) }}</td>
                        </tr>
                        @if($leadAddonAmountCents > 0)
                            <tr>
                                <td>
                                    <div class="sfi-main">Leads Add-on</div>
                                    <div class="sfi-small">{{ $leadAddonCount ?: 5 }} additional leads pack</div>
                                </td>
                                <td>{{ ucfirst(optional($subscription)->billing_cycle ?? '-') }}</td>
                                <td>{{ $invoice->period_start?->format('M d, Y') ?? '-' }} - {{ $invoice->period_end?->format('M d, Y') ?? '-' }}</td>
                                <td style="text-align:right;font-weight:950">{{ $formatInvoiceMoney($leadAddonAmountCents) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="sfi-total">
                    <div class="sfi-total-box">
                        <div class="sfi-total-row"><span>Slot Price</span><strong>{{ $formatInvoiceMoney($slotAmountCents) }}</strong></div>
                        @if($leadAddonAmountCents > 0)
                            <div class="sfi-total-row"><span>Leads Add-on</span><strong>{{ $formatInvoiceMoney($leadAddonAmountCents) }}</strong></div>
                        @endif
                        <div class="sfi-total-row"><span>Subtotal</span><strong>{{ $invoice->amount_formatted }}</strong></div>
                        <div class="sfi-total-row"><span>Tax</span><strong>$0.00</strong></div>
                        <div class="sfi-total-row final"><span>Total Paid</span><strong>{{ $invoice->amount_formatted }}</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
