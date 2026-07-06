<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $history->invoice_no }}</title>
    <style>
        /* PDF specific resets */
        @page { margin: 0px; }
        body { 
            font-family: 'Inter', 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: #1a1f36; 
            line-height: 1.5; 
            margin: 0;
            padding: 0;
            font-size: 13px;
            background-color: #ffffff;
        }

        /* Side accent bar */
        .page-accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background-color: #635bff;
        }

        .container { padding: 60px 50px; }

        /* Header */
        .header-table { width: 100%; margin-bottom: 60px; }
        .logo-text { font-size: 24px; font-weight: 800; color: #1a1f36; letter-spacing: -0.5px; }
        .invoice-label { font-size: 32px; font-weight: 300; color: #a3acb9; text-transform: uppercase; letter-spacing: 2px; }

        /* Info Blocks */
        .info-table { width: 100%; margin-bottom: 40px; }
        .info-table td { vertical-align: top; width: 33.33%; }
        h4 { 
            font-size: 10px; 
            text-transform: uppercase; 
            font-weight: 700; 
            color: #8792a2; 
            margin: 0 0 10px 0; 
            letter-spacing: 1px; 
        }
        .address-text { color: #4f566b; line-height: 1.4; font-size: 12px; }

        /* Items Table */
        .items-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .items-table th { 
            text-align: left; 
            padding: 15px 10px; 
            background-color: #f7fafc; 
            color: #4f566b; 
            font-size: 11px; 
            text-transform: uppercase; 
            letter-spacing: 1px;
            border-top: 1px solid #e3e8ee;
            border-bottom: 1px solid #e3e8ee;
        }
        .items-table td { padding: 25px 10px; border-bottom: 1px solid #e3e8ee; }
        .item-desc { font-weight: 600; font-size: 14px; color: #1a1f36; }
        .item-sub { color: #697386; font-size: 12px; margin-top: 4px; }

        /* Totals */
        .totals-table { width: 40%; float: right; margin-top: 30px; }
        .totals-table td { padding: 8px 0; font-size: 14px; }
        .total-row { font-size: 18px; font-weight: 700; color: #635bff; }

        /* Status Badge */
        .status-badge {
            background-color: #d7f5eb;
            color: #007d5c;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
        }

        .footer { 
            position: absolute; 
            bottom: 40px; 
            width: 100%; 
            padding: 0 50px; 
            color: #a3acb9; 
            font-size: 11px; 
        }
    </style>
</head>
<body>
    <div class="page-accent"></div>
    
    <div class="container">
        <table class="header-table">
            <tr>
                <td class="logo-text">My Moving Journey<span style="color:#635bff;">.</span></td>
                <td align="right" class="invoice-label">Invoice</td>
            </tr>
        </table>

        <table class="info-table">
            <tr>
                <td>
                    <h4>Billed To</h4>
                    <div class="address-text">
                        <strong>{{ $company->company_name }}</strong><br>
                        {{ $company->company_email }}
                    </div>
                </td>
                <td>
                    <h4>Invoice Details</h4>
                    <div class="address-text">
                        Number: {{ $history->invoice_no }}<br>
                        Date: {{ $history->paid_at->format('M d, Y') }}
                    </div>
                </td>
                <td align="right">
                    <h4>Payment Status</h4>
                    <span class="status-badge">{{ $history->status }}</span>
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th width="70%">Description</th>
                    <th align="right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="item-desc">{{ $plan->name }} Subscription</div>
                        <div class="item-sub">
                            Billing interval: {{ ucfirst($history->subscription->interval) }}<br>
                            Includes {{ number_format($plan->leads_per_month) }} leads per month.
                        </div>
                    </td>
                    <td align="right" valign="top" style="font-size: 16px; font-weight: 600;">
                        ${{ number_format($history->amount_cents / 100, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="totals-table">
            <tr>
                <td style="color:#697386;">Subtotal</td>
                <td align="right">${{ number_format($history->amount_cents / 100, 2) }}</td>
            </tr>
            <tr>
                <td style="color:#697386;">Tax (0%)</td>
                <td align="right">$0.00</td>
            </tr>
            <tr class="total-row">
                <td style="padding-top: 15px;">Amount Paid</td>
                <td align="right" style="padding-top: 15px;">${{ number_format($history->amount_cents / 100, 2) }}</td>
            </tr>
        </table>

        <div style="clear: both;"></div>
    </div>

    <div class="footer">
        <table width="100%">
            <tr>
                <td>My Moving Journey | contact@mymovingjourney.com</td>
                <td align="right">&copy; {{ date('Y') }} MyMovingJourney. All rights reserved.</td>
            </tr>
        </table>
    </div>
</body>
</html>