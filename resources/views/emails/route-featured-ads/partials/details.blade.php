<table style="width:100%;border-collapse:collapse;margin-top:18px">
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Company</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">{{ $companyName }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Route</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">{{ $routeName }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Slot</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">Slot {{ $subscription->slot->slot_number ?? '-' }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Billing</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">{{ ucfirst($subscription->billing_cycle ?? '-') }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Amount</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">${{ number_format(($subscription->price_cents ?? 0) / 100, 2) }}</td></tr>
    <tr><td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b">Period End</td><td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold">{{ optional($subscription->ends_at)->format('M d, Y') ?? '-' }}</td></tr>
</table>
