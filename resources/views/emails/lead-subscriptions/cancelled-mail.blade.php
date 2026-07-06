<!DOCTYPE html>
<html>
<head>
    <style>
        .container { font-family: sans-serif; line-height: 1.6; color: #333; max-width: 600px; }
        .header { background: #f8f9fa; padding: 20px; border-bottom: 3px solid #dee2e6; }
        .content { padding: 20px; }
        .footer { font-size: 12px; color: #777; padding: 20px; }
        .alert { color: #856404; background-color: #fff3cd; padding: 15px; border: 1px solid #ffeeba; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Subscription Cancellation</h2>
        </div>

        <div class="content">
            @if($isAdmin)
                <p><strong>Admin Notification:</strong></p>
                <p>The company <strong>{{ $company->company_name }}</strong> has cancelled their lead plan subscription.</p>
            @else
                <p>Hello {{ $company->name }},</p>
                <p>We're reaching out to confirm that your subscription has been cancelled per your request.</p>
            @endif

            <div class="alert">
                <strong>Access Period:</strong><br>
                Although the subscription is cancelled, your account remains active until the end of your current billing cycle. 
                You will have access to your leads until <strong>{{ $subscription->current_period_end->format('F j, Y') }}</strong>.
            </div>

            @if(!$isAdmin)
                <p>After this date, your plan will revert to the free tier, and lead delivery will stop. If this was a mistake, you can reactivate your plan anytime from your dashboard.</p>
                <p>Thank you for being with us.</p>
            @endif
        </div>

        <div class="footer">
            Sent via {{ config('app.name') }} Billing System
        </div>
    </div>
</body>
</html>