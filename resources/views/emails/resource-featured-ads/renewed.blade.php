@include('emails.resource-featured-ads.partials.header', ['title' => 'Resource Featured Slot Renewed'])

@if($isAdmin)
    <h3 style="margin-top:0;">A resource featured slot subscription renewed.</h3>
@else
    <h3 style="margin-top:0;">Your resource featured slot has renewed successfully.</h3>
@endif

@include('emails.resource-featured-ads.partials.details')

<table style="width:100%;border-collapse:collapse;margin-top:18px;">
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Invoice Amount</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
            ${{ number_format(($invoice->amount_paid_cents ?? 0) / 100, 2) }} {{ strtoupper($invoice->currency ?? 'USD') }}
        </td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Period</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
            {{ optional($invoice->period_start)->format('M d, Y') }} - {{ optional($invoice->period_end)->format('M d, Y') }}
        </td>
    </tr>
</table>

@include('emails.resource-featured-ads.partials.footer')
