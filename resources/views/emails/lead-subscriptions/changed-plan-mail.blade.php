<!DOCTYPE html>
<html>
<head>
    <style>
        .container { font-family: sans-serif; color: #333; max-width: 600px; margin: 0 auto; }
        .card { border: 1px solid #eee; padding: 20px; border-radius: 8px; background: #fafafa; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #ddd; }
        .upgrade { color: #28a745; font-weight: bold; }
        .downgrade { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Plan Update Confirmed</h2>
        <p>Hello {{ $company->name }},</p>
        <p>Your subscription has been successfully updated. Here are the details of your change:</p>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Old Plan ({{ $oldPlan->name }})</th>
                        <th>New Plan ({{ $newPlan->name }})</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monthly Leads</td>
                        <td>{{ $oldPlan->leads_per_month }}</td>
                        <td><strong>{{ $newPlan->leads_per_month }}</strong></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>Changed</td>
                        <td class="{{ $newPlan->leads_per_month > $oldPlan->leads_per_month ? 'upgrade' : 'downgrade' }}">
                            {{ $newPlan->leads_per_month > $oldPlan->leads_per_month ? 'Upgraded' : 'Downgraded' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p>Your new lead limits are effective immediately. Any price adjustments will be reflected in your next Stripe billing statement.</p>
        <p>Best regards,<br>{{ config('app.name') }} Team</p>
    </div>
</body>
</html>