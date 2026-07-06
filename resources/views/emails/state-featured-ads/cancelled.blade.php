<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>State Featured Slot Cancelled</title>
</head>

<body style="margin:0;background:#f6f8fb;font-family:Arial,Helvetica,sans-serif;color:#0f172a;">
    <div style="max-width:680px;margin:0 auto;padding:30px 16px;">
        <div style="background:#ffffff;border-radius:18px;border:1px solid #e5e7eb;overflow:hidden;">
            <div style="padding:22px 26px;background:#0f172a;color:#ffffff;">
                <h2 style="margin:0;font-size:22px;">My Moving Journey</h2>
                <p style="margin:6px 0 0;color:#cbd5e1;">State Featured Slot Cancellation</p>
            </div>

            <div style="padding:26px;">
                @if ($isAdmin)
                    <h3 style="margin-top:0;">A company cancelled a state featured slot.</h3>
                @else
                    <h3 style="margin-top:0;">Your cancellation request has been received.</h3>
                @endif

                <p style="line-height:1.6;color:#475569;">
                    @if ($subscription->cancel_at_period_end)
                        The slot will remain active until the current paid period ends.
                    @else
                        The slot has been cancelled and released.
                    @endif
                </p>

                <table style="width:100%;border-collapse:collapse;margin-top:18px;">
                    <tr>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Company</td>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
                            {{ $companyName }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">State</td>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
                            {{ $stateName }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Slot</td>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
                            Slot {{ $subscription->slot->slot_number ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">Billing</td>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
                            {{ ucfirst($subscription->billing_cycle ?? '-') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;color:#64748b;">End Date</td>
                        <td style="padding:10px;border-bottom:1px solid #e5e7eb;font-weight:bold;">
                            {{ optional($subscription->ends_at)->format('M d, Y') ?? 'Immediately' }}
                        </td>
                    </tr>
                </table>

                <p style="margin-top:22px;color:#64748b;font-size:13px;">
                    This is an automated notification from My Moving Journey.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
