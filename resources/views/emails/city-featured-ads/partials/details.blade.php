<table style="width:100%;border-collapse:collapse;margin-top:18px;">
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Company</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">{{ $companyName }}</td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">City</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
            {{ $cityName }}@if(optional($subscription->cityPage->state)->abv), {{ optional($subscription->cityPage->state)->abv }}@endif
        </td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Slot</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">Slot {{ $subscription->slot->slot_number ?? '-' }}</td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Billing</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">{{ ucfirst($subscription->billing_cycle ?? '-') }}</td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Price</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">${{ number_format(($subscription->price_cents ?? 0) / 100, 2) }}</td>
    </tr>
    <tr>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">End Date</td>
        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">{{ optional($subscription->ends_at)->format('M d, Y') ?? '-' }}</td>
    </tr>
</table>
