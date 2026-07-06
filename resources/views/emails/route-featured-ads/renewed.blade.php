<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body style="margin:0;background:#f6f8fb;font-family:Arial,Helvetica,sans-serif;color:#0f172a"><div style="max-width:680px;margin:0 auto;padding:30px 16px"><div style="background:#fff;border:1px solid #e5e7eb;border-radius:18px;overflow:hidden">@include('emails.route-featured-ads.partials.header')<div style="padding:26px">
@if($isAdmin)<h3 style="margin-top:0">A route featured slot subscription renewed.</h3>@else<h3 style="margin-top:0">Your route featured slot has renewed.</h3>@endif
<p style="line-height:1.6;color:#475569">A new Stripe invoice was paid and saved locally.</p>
@include('emails.route-featured-ads.partials.details')
<table style="width:100%;border-collapse:collapse;margin-top:18px">
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Invoice</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Paid</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">${{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }}</td></tr>
</table>
@include('emails.route-featured-ads.partials.footer')</div></div></div></body></html>