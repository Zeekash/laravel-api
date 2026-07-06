<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lead Plan Renewed</title>
</head>
<body style="margin:0;padding:0;background:#f6f8fb;font-family:Arial,Helvetica,sans-serif;color:#0f172a;">
    <div style="max-width:640px;margin:0 auto;padding:28px 16px;">
        <div style="background:#ffffff;border:1px solid #e5e7eb;border-radius:18px;overflow:hidden;box-shadow:0 12px 30px rgba(15,23,42,.08);">
            <div style="background:linear-gradient(135deg,#2563eb,#7c3aed);padding:28px;color:#ffffff;">
                <div style="font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;opacity:.85;">
                    {{ $adminCopy ? 'Admin Renewal Notification' : 'Package Renewal Confirmation' }}
                </div>
                <h1 style="margin:10px 0 0;font-size:26px;line-height:1.25;">Lead package renewed successfully</h1>
            </div>

            <div style="padding:28px;">
                <p style="margin:0 0 18px;font-size:15px;line-height:1.7;color:#334155;">
                    @if($adminCopy)
                        The lead package for <strong>{{ $company->company_name ?? $company->name ?? 'Company' }}</strong> has been renewed.
                    @else
                        Your lead package has been renewed successfully. Your monthly lead usage has been reset for the new billing period.
                    @endif
                </p>

                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin:20px 0;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;">
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Company</td>
                        <td style="padding:14px 16px;font-weight:700;">{{ $company->company_name ?? $company->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Plan</td>
                        <td style="padding:14px 16px;font-weight:700;">{{ $plan->name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Billing</td>
                        <td style="padding:14px 16px;font-weight:700;">{{ ucfirst($subscription->interval) }}</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Leads Reset To</td>
                        <td style="padding:14px 16px;font-weight:700;">{{ number_format($plan->leads_per_month) }} leads/month</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Amount Paid</td>
                        <td style="padding:14px 16px;font-weight:700;">${{ number_format(($billingHistory->amount_cents ?? 0) / 100, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Invoice</td>
                        <td style="padding:14px 16px;font-weight:700;">{{ $billingHistory->invoice_no }}</td>
                    </tr>
                    <tr>
                        <td style="padding:14px 16px;background:#f8fafc;color:#64748b;font-size:12px;font-weight:700;text-transform:uppercase;">Next Renewal</td>
                        <td style="padding:14px 16px;font-weight:700;">
                            {{ $subscription->current_period_end ? \Carbon\Carbon::parse($subscription->current_period_end)->format('M d, Y') : '-' }}
                        </td>
                    </tr>
                </table>

                <p style="margin:18px 0 0;font-size:13px;line-height:1.7;color:#64748b;">
                    This is an automated notification from the lead plan renewal system.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
