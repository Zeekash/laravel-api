<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', Helvetica, Arial, sans-serif; color: #1e293b; line-height: 1.5; margin: 0; padding: 0; }
        .wrapper { background-color: #f1f5f9; padding: 40px 10px; }
        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .header { background-color: #1e293b; color: #ffffff; padding: 30px; text-align: left; }
        .content { padding: 40px; }
        .item-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .item-table th { text-align: left; font-size: 12px; text-transform: uppercase; color: #64748b; padding: 10px 0; border-bottom: 1px solid #e2e8f0; }
        .item-table td { padding: 15px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
        .total-section { margin-top: 20px; float: right; width: 200px; }
        .total-row { display: flex; justify-content: space-between; padding: 5px 0; }
        .total-row.grand-total { border-top: 2px solid #e2e8f0; margin-top: 10px; padding-top: 10px; font-weight: 800; font-size: 18px; color: #2563eb; }
        .footer { text-align: center; font-size: 12px; color: #94a3b8; padding: 30px; }
        .button { display: inline-block; background-color: #2563eb; color: #ffffff; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="email-container">
            <div class="header">
                <h2 style="margin:0;">{{ $isAdmin ? 'New Order Received' : 'Payment Confirmation' }}</h2>
                <p style="margin: 5px 0 0; opacity: 0.8; font-size: 14px;">Transaction Date: {{ now()->format('M d, Y') }}</p>
            </div>
            
            <div class="content">
                <p>Hello {{ $isAdmin ? 'Admin' : ($company->name ?? 'Valued Customer') }},</p>
                <p>
                    {{ $isAdmin 
                        ? "A new subscription payment has been processed for " . ($company->company_name ?? 'a company') . "." 
                        : "This email serves as a formal confirmation and receipt for your recent subscription. Your plan is now active." 
                    }}
                </p>

                <table class="item-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Billing Cycle</th>
                            <th style="text-align: right;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>{{ $plan->name ?? 'Subscription' }} Plan</strong><br>
                                <span style="font-size: 12px; color: #64748b;">{{ $plan->leads_per_month ?? 0 }} Leads Included</span>
                            </td>
                            {{-- SAFE CHECK: Uses 'Monthly' if subscription or interval is missing --}}
                            <td>{{ ucfirst($subscription?->interval ?? 'Monthly') }}</td>
                            <td style="text-align: right; font-weight: 600;">
                                ${{ number_format(($subscription?->interval === 'annual' ? ($plan->annual_price_cents ?? 0) : ($plan->monthly_price_cents ?? 0)), 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="overflow: hidden;">
                    <div class="total-section">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span>${{ number_format(($subscription?->interval === 'annual' ? ($plan->annual_price_cents ?? 0) : ($plan->monthly_price_cents ?? 0)), 2) }}</span>
                        </div>
                        <div class="total-row grand-total">
                            <span>Total:</span>
                            <span>${{ number_format(($subscription?->interval === 'annual' ? ($plan->annual_price_cents ?? 0) : ($plan->monthly_price_cents ?? 0)), 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Only show billing details to the customer if the subscription object exists --}}
                @if(!$isAdmin && isset($subscription))
                <div style="text-align: center; margin-top: 40px; border-top: 1px solid #f1f5f9; padding-top: 20px; clear: both;">
                    <p style="font-size: 14px; color: #64748b;">
                        Your next billing date is <strong>{{ $subscription->current_period_end ? \Carbon\Carbon::parse($subscription->current_period_end)->format('M d, Y') : 'N/A' }}</strong>
                    </p>
                    <a href="{{ url('/company/billing') }}" class="button">Manage Billing & Invoices</a>
                </div>
                @endif
            </div>

            <div class="footer">
                <strong>My Moving Journey</strong>
            </div>
        </div>
    </div>
</body>
</html>