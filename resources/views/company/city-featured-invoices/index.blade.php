@extends('company.layouts.master')

@section('content')
<style>
    :root{
        --ci-primary:#2563eb;
        --ci-primary-dark:#1d4ed8;
        --ci-green:#16a34a;
        --ci-bg:#f3f6fb;
        --ci-card:#ffffff;
        --ci-border:#dbe5f1;
        --ci-dark:#020617;
        --ci-muted:#526783;
        --ci-soft:#f8fbff;
        --ci-pill:#e0f2fe;
    }

    .ci-page{
        background:var(--ci-bg);
        padding:4px;
        border-radius:22px;
    }

    .ci-hero{
        background:#fff;
        border:1px solid var(--ci-border);
        border-radius:22px;
        padding:22px;
        margin-bottom:16px;
        box-shadow:0 12px 35px rgba(15,23,42,.06);
    }

    .ci-hero-top{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:16px;
        flex-wrap:wrap;
    }

    .ci-kicker{
        color:#2563eb;
        font-size:13px;
        font-weight:900;
        margin-bottom:6px;
    }

    .ci-title{
        margin:0;
        font-size:30px;
        font-weight:950;
        color:var(--ci-dark);
        letter-spacing:-.04em;
    }

    .ci-subtitle{
        margin:8px 0 0;
        color:var(--ci-muted);
        font-size:14px;
    }

    .ci-back{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        min-height:42px;
        padding:10px 18px;
        border-radius:12px;
        border:1px solid #cbd5e1;
        background:#f8fafc;
        color:#020617;
        font-weight:900;
        text-decoration:none;
        transition:.18s ease;
    }

    .ci-back:hover{
        background:#eef2f7;
        color:#020617;
        text-decoration:none;
    }

    .ci-stats{
        display:grid;
        grid-template-columns:repeat(5,minmax(0,1fr));
        gap:12px;
        margin-top:22px;
    }

    .ci-stat{
        background:linear-gradient(180deg,#ffffff,#f8fbff);
        border:1px solid var(--ci-border);
        border-radius:16px;
        padding:17px 15px;
    }

    .ci-stat span{
        display:block;
        font-size:12px;
        color:#526783;
        font-weight:900;
        text-transform:uppercase;
        margin-bottom:12px;
    }

    .ci-stat strong{
        display:block;
        font-size:23px;
        color:#020617;
        font-weight:950;
        letter-spacing:-.03em;
    }

    .ci-card{
        background:#fff;
        border:1px solid var(--ci-border);
        border-radius:22px;
        padding:20px;
        margin-bottom:16px;
        box-shadow:0 12px 35px rgba(15,23,42,.05);
    }

    .ci-filter{
        display:flex;
        align-items:end;
        gap:10px;
        flex-wrap:wrap;
    }

    .ci-field{
        min-width:180px;
    }

    .ci-field label{
        display:block;
        font-size:12px;
        color:#0f172a;
        font-weight:900;
        margin-bottom:8px;
    }

    .ci-select{
        width:100%;
        height:43px;
        border:1px solid #cbd5e1;
        border-radius:11px;
        padding:8px 12px;
        outline:none;
        background:#fff;
        color:#020617;
    }

    .ci-select:focus{
        border-color:var(--ci-primary);
        box-shadow:0 0 0 4px rgba(37,99,235,.12);
    }

    .ci-btn{
        min-height:43px;
        border:0;
        border-radius:11px;
        padding:10px 18px;
        background:var(--ci-primary);
        color:#fff;
        font-weight:900;
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        transition:.18s ease;
    }

    .ci-btn:hover{
        background:var(--ci-primary-dark);
        color:#fff;
        text-decoration:none;
        transform:translateY(-1px);
    }

    .ci-btn-light{
        background:#fff;
        color:#020617;
        border:1px solid #cbd5e1;
    }

    .ci-btn-light:hover{
        background:#f8fafc;
        color:#020617;
    }

    .ci-table-wrap{
        overflow-x:auto;
    }

    .ci-table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 10px;
        min-width:1050px;
    }

    .ci-table th{
        text-align:left;
        color:#526783;
        font-size:12px;
        font-weight:900;
        text-transform:uppercase;
        padding:0 12px;
        border-bottom:1px solid #e5e7eb;
        padding-bottom:11px;
    }

    .ci-table td{
        background:#f8fbff;
        border-top:1px solid var(--ci-border);
        border-bottom:1px solid var(--ci-border);
        padding:14px 12px;
        vertical-align:middle;
    }

    .ci-table td:first-child{
        border-left:1px solid var(--ci-border);
        border-radius:14px 0 0 14px;
    }

    .ci-table td:last-child{
        border-right:1px solid var(--ci-border);
        border-radius:0 14px 14px 0;
    }

    .ci-invoice-no{
        font-size:16px;
        font-weight:950;
        color:#020617;
        margin-bottom:5px;
    }

    .ci-small{
        font-size:12px;
        color:#526783;
        line-height:1.45;
    }

    .ci-main-text{
        font-size:15px;
        color:#020617;
        font-weight:900;
        margin-bottom:5px;
    }

    .ci-billing{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:8px 12px;
        border-radius:999px;
        background:#e0f2fe;
        color:#0369a1;
        font-size:12px;
        font-weight:900;
    }

    .ci-status{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        padding:8px 12px;
        border-radius:999px;
        font-size:12px;
        font-weight:900;
    }

    .ci-status.paid{
        background:#dcfce7;
        color:#166534;
    }

    .ci-status.open{
        background:#fef3c7;
        color:#92400e;
    }

    .ci-status.failed,
    .ci-status.void,
    .ci-status.unpaid{
        background:#fee2e2;
        color:#991b1b;
    }

    .ci-actions{
        display:flex;
        gap:8px;
        align-items:center;
        flex-wrap:wrap;
    }

    .ci-action-view{
        background:#f8fafc;
        color:#020617;
        border:1px solid #cbd5e1;
        border-radius:11px;
        padding:10px 17px;
        text-decoration:none;
        font-weight:950;
        display:inline-flex;
        align-items:center;
        justify-content:center;
    }

    .ci-action-view:hover{
        color:#020617;
        background:#eef2f7;
        text-decoration:none;
    }

    .ci-action-stripe{
        background:#16a34a;
        color:#fff;
        border-radius:11px;
        padding:11px 18px;
        text-decoration:none;
        font-weight:950;
        display:inline-flex;
        align-items:center;
        justify-content:center;
    }

    .ci-action-stripe:hover{
        color:#fff;
        background:#15803d;
        text-decoration:none;
    }

    .ci-empty{
        text-align:center;
        padding:35px 20px;
        color:#64748b;
        font-weight:800;
    }

    .ci-pagination{
        margin-top:16px;
    }

    @media(max-width:1200px){
        .ci-stats{
            grid-template-columns:repeat(2,minmax(0,1fr));
        }
    }

    @media(max-width:768px){
        .ci-title{
            font-size:24px;
        }

        .ci-stats{
            grid-template-columns:1fr;
        }

        .ci-field,
        .ci-btn,
        .ci-back{
            width:100%;
        }
    }
</style>

<div class="ci-page">

    <div class="ci-hero">
        <div class="ci-hero-top">
            <div>
                <div class="ci-kicker">Sponsored City Slots</div>
                <h1 class="ci-title">My Invoices</h1>
                <p class="ci-subtitle">
                    View your city featured ads subscription payments and billing history.
                </p>
            </div>

            <a href="{{ route('company.city-featured-ads.index') }}" class="ci-back">
                Back to City Slots
            </a>
        </div>

        <div class="ci-stats">
            <div class="ci-stat">
                <span>Total Paid</span>
                <strong>${{ number_format(($totalPaidCents ?? 0) / 100, 2) }}</strong>
            </div>

            <div class="ci-stat">
                <span>This Month</span>
                <strong>${{ number_format(($thisMonthPaidCents ?? 0) / 100, 2) }}</strong>
            </div>

            <div class="ci-stat">
                <span>Monthly Plans</span>
                <strong>${{ number_format(($monthlyPaidCents ?? 0) / 100, 2) }}</strong>
            </div>

            <div class="ci-stat">
                <span>Yearly Plans</span>
                <strong>${{ number_format(($yearlyPaidCents ?? 0) / 100, 2) }}</strong>
            </div>

            <div class="ci-stat">
                <span>Paid Invoices</span>
                <strong>{{ $paidInvoicesCount ?? 0 }}</strong>
            </div>
        </div>
    </div>

    <div class="ci-card">
        <form method="GET" class="ci-filter">
            <div class="ci-field">
                <label>Status</label>
                <select name="status" class="ci-select">
                    <option value="">All</option>
                    <option value="paid" @selected(($selectedStatus ?? '') === 'paid')>Paid</option>
                    <option value="open" @selected(($selectedStatus ?? '') === 'open')>Open</option>
                    <option value="unpaid" @selected(($selectedStatus ?? '') === 'unpaid')>Unpaid</option>
                    <option value="void" @selected(($selectedStatus ?? '') === 'void')>Void</option>
                </select>
            </div>

            <div class="ci-field">
                <label>Billing</label>
                <select name="billing" class="ci-select">
                    <option value="">All</option>
                    <option value="monthly" @selected(($selectedBilling ?? '') === 'monthly')>Monthly</option>
                    <option value="yearly" @selected(($selectedBilling ?? '') === 'yearly')>Yearly</option>
                </select>
            </div>

            <button class="ci-btn" type="submit">Apply Filter</button>

            @if(!empty($selectedStatus) || !empty($selectedBilling))
                <a href="{{ url()->current() }}" class="ci-btn ci-btn-light">Clear</a>
            @endif
        </form>
    </div>

    <div class="ci-card">
        <div class="ci-table-wrap">
            <table class="ci-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>City / Slot</th>
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
                            $city = optional($subscription)->cityPage;
                            $state = optional($city)->state;
                            $slot = optional($subscription)->slot;

                            $invoiceNo = 'INV-' . str_pad($invoice->id, 5, '0', STR_PAD_LEFT);
                            $billingCycle = optional($subscription)->billing_cycle ?: '-';

                            $status = strtolower($invoice->status ?? '-');

                            $amount = number_format(($invoice->amount_paid_cents ?? 0) / 100, 2);
                            $currency = strtoupper($invoice->currency ?? 'USD');

                            $leadText = '';
                            if (!empty($invoice->lead_addon_selected)) {
                                $leadText = 'Includes ' . (int) ($invoice->lead_addon_leads_count ?? 0) . ' leads add-on';
                            } elseif (!empty(optional($subscription)->lead_addon_selected)) {
                                $leadText = 'Includes ' . (int) (optional($subscription)->lead_addon_leads_count ?? 0) . ' leads add-on';
                            }
                        @endphp

                        <tr>
                            <td>
                                <div class="ci-invoice-no">{{ $invoiceNo }}</div>
                                <div class="ci-small">
                                    {{ optional($invoice->paid_at)->format('M d, Y h:i A') ?? optional($invoice->created_at)->format('M d, Y h:i A') }}
                                </div>
                            </td>

                            <td>
                                <div class="ci-main-text">
                                    {{ optional($city)->name ?? '-' }}@if(optional($state)->abv), {{ $state->abv }}@endif
                                </div>
                                <div class="ci-small">
                                    Slot {{ optional($slot)->slot_number ?? '-' }}
                                </div>
                            </td>

                            <td>
                                <span class="ci-billing">
                                    {{ ucfirst($billingCycle) }}
                                </span>
                            </td>

                            <td>
                                <div class="ci-main-text">
                                    {{ optional($invoice->period_start)->format('M d, Y') ?? '-' }}
                                </div>
                                <div class="ci-small">
                                    to {{ optional($invoice->period_end)->format('M d, Y') ?? '-' }}
                                </div>
                            </td>

                            <td>
                                <div class="ci-main-text">
                                    {{ $currency }} {{ $amount }}
                                </div>

                                @if($leadText)
                                    <div class="ci-small">{{ $leadText }}</div>
                                @endif
                            </td>

                            <td>
                                <span class="ci-status {{ $status }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                <div class="ci-actions">
                                    <a class="ci-action-view" href="{{ route('company.city-featured-invoices.show', $invoice->id) }}">
                                        View
                                    </a>

                                    @if(!empty($invoice->hosted_invoice_url))
                                        <a class="ci-action-stripe" href="{{ $invoice->hosted_invoice_url }}" target="_blank">
                                            Stripe
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="ci-empty">
                                    No invoices found.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="ci-pagination">
            {{ $invoices->links() }}
        </div>
    </div>
</div>
@endsection