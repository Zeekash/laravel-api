@php
    $company = $subscription->company;
    $state = $subscription->state;
    $slot = $subscription->slot;
    $companyName = optional($company)->company_name ?? optional($company)->name ?? optional($company)->full_name ?? 'Company';
    $stateName = optional($state)->name ? optional($state)->name . ', ' . optional($state)->abv : 'Selected state';
    $slotLabel = optional($slot)->label ?: ('Slot ' . (optional($slot)->slot_number ?? $subscription->state_featured_slot_id));
    $amount = number_format(($invoice->amount_paid_cents ?? $subscription->total_price_cents ?? $subscription->price_cents ?? 0) / 100, 2);
    $cycle = $subscription->billing_cycle === 'yearly' ? 'year' : 'month';
@endphp

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sponsored State Slot Renewed</title>
</head>
<body style="margin:0;background:#f3f6fb;font-family:Arial,Helvetica,sans-serif;color:#1f2937;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f6fb;padding:28px 0;">
    <tr>
        <td align="center">
            <table width="620" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:16px;overflow:hidden;border:1px solid #e5e7eb;">
                <tr>
                    <td style="background:#065f46;padding:24px 28px;color:#ffffff;">
                        <h1 style="margin:0;font-size:22px;line-height:1.35;">
                            {{ $admin ? 'Sponsored state slot renewed' : 'Your sponsored state slot has renewed' }}
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding:28px;">
                        <p style="font-size:15px;line-height:1.7;margin:0 0 18px;">
                            @if($admin)
                                {{ $companyName }} sponsored slot renewal payment has been recorded.
                            @else
                                Your sponsored state slot renewed successfully and remains active.
                            @endif
                        </p>

                        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background:#f9fafb;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;">
                            <tr><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;font-weight:bold;width:190px;">Company</td><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;">{{ $companyName }}</td></tr>
                            <tr><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;font-weight:bold;">State</td><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;">{{ $stateName }}</td></tr>
                            <tr><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;font-weight:bold;">Slot</td><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;">{{ $slotLabel }}</td></tr>
                            <tr><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;font-weight:bold;">Amount paid</td><td style="padding:12px 16px;border-bottom:1px solid #e5e7eb;">${{ $amount }}/{{ $cycle }}@if($subscription->lead_addon_selected) · includes {{ $subscription->lead_addon_leads_count ?: 5 }} leads add-on@endif</td></tr>
                            <tr><td style="padding:12px 16px;font-weight:bold;">Next renewal</td><td style="padding:12px 16px;">{{ optional($subscription->ends_at)->format('M d, Y') ?? 'N/A' }}</td></tr>
                        </table>

                        @if($invoice && $invoice->hosted_invoice_url)
                            <p style="margin:22px 0 0;">
                                <a href="{{ $invoice->hosted_invoice_url }}" style="display:inline-block;background:#065f46;color:#ffffff;text-decoration:none;padding:12px 18px;border-radius:10px;font-weight:bold;">View invoice</a>
                            </p>
                        @endif

                        <p style="font-size:13px;color:#6b7280;margin:24px 0 0;line-height:1.6;">
                            This email was generated automatically by the sponsored state featured ads system.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
