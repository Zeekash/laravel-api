<style>
    .print-wrap{background:#f8fafc;padding:24px;border-radius:20px}.invoice{max-width:900px;margin:auto;background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:30px;color:#0f172a}.inv-head{display:flex;justify-content:space-between;gap:20px;align-items:flex-start;border-bottom:1px solid #e5e7eb;padding-bottom:20px}.brand{display:flex;align-items:center;gap:12px}.brand img{height:42px}.brand strong{font-size:22px}.print-btn{border:0;background:#2563eb;color:#fff;border-radius:12px;padding:10px 14px;font-weight:800}.details{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:22px}.box{border:1px solid #e5e7eb;border-radius:14px;padding:16px;background:#f8fafc}.line{display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid #e5e7eb}.line:last-child{border-bottom:0}.total{font-size:24px;font-weight:900}@media print{.no-print{display:none}.print-wrap{padding:0;background:#fff}.invoice{border:0}}
</style>
<div class="print-wrap">
    <div style="max-width:900px;margin:0 auto 14px" class="no-print">
        <button class="print-btn" onclick="window.print()">Print / Download PDF</button>
    </div>
    <div class="invoice">
        <div class="inv-head">
            <div class="brand">
                <img src="{{ asset('assets/img/logo.png') }}" alt="My Moving Journey">
                <strong>My Moving Journey</strong>
            </div>
            <div style="text-align:right">
                <h2 style="margin:0">Resource Featured Ads Invoice</h2>
                <div style="color:#64748b">{{ $invoice->stripe_invoice_id }}</div>
            </div>
        </div>

        <div class="details">
            <div class="box">
                <strong>Company</strong><br>
                {{ optional($invoice->company)->company_name ?? optional($invoice->company)->name ?? 'Company' }}<br>
                <span style="color:#64748b">{{ optional($invoice->company)->company_email ?? optional($invoice->company)->email }}</span>
            </div>
            <div class="box">
                <strong>Resource Slot</strong><br>
                {{ optional(optional($invoice->subscription)->resourcePage)->title ?? 'Resource' }}<br>
                <span style="color:#64748b">Slot {{ optional(optional($invoice->subscription)->slot)->slot_number ?? '-' }} · {{ ucfirst(optional($invoice->subscription)->billing_cycle ?? '-') }}</span>
            </div>
        </div>

        <div style="margin-top:24px">
            <div class="line"><span>Slot Price</span><strong>${{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }}</strong></div>
            <div class="line"><span>Period</span><strong>{{ optional($invoice->period_start)->format('M d, Y') }} - {{ optional($invoice->period_end)->format('M d, Y') }}</strong></div>
            <div class="line"><span>Status</span><strong>{{ ucfirst($invoice->status ?? '-') }}</strong></div>
            <div class="line total"><span>Total Paid</span><strong>${{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }}</strong></div>
        </div>

        @if($invoice->hosted_invoice_url)
            <p class="no-print" style="margin-top:20px"><a href="{{ $invoice->hosted_invoice_url }}" target="_blank">Open Stripe hosted invoice</a></p>
        @endif
    </div>
</div>
