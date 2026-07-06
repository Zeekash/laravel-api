<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f4f7f9;
            padding-bottom: 40px;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2563eb;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 30px;
            color: #334155;
            line-height: 1.6;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #f8fafc;
            border-radius: 6px;
        }
        .invoice-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        .invoice-table tr:last-child td {
            border-bottom: none;
        }
        .label {
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: 600;
            width: 40%;
        }
        .value {
            color: #1e293b;
            font-weight: 700;
            text-align: right;
        }
        .btn-container {
            text-align: center;
            margin-top: 30px;
        }
        .button {
            background-color: #2563eb;
            color: #ffffff !important;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            display: inline-block;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>Payment Receipt</h1>
            </div>
            <div class="content">
                <p>Hello <strong>{{ $company->name }}</strong>,</p>
                <p>Thank you for your purchase. Your payment was successful, and the lead has been unlocked in your dashboard.</p>
                
                <table class="invoice-table">
                    <tr>
                        <td class="label">Invoice Number</td>
                        <td class="value">INV-{{ 20000 + $lead->id }}</td>
                    </tr>
                    <tr>
                        <td class="label">Lead Description</td>
                        <td class="value">#{{ 20000 + $lead->id }} ({{ $lead->name }})</td>
                    </tr>
                    <tr>
                        <td class="label">Amount Paid</td>
                        <td class="value" style="color: #16a34a; font-size: 18px;">${{ number_format($amount / 100, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Date</td>
                        <td class="value">{{ now()->format('M d, Y H:i') }}</td>
                    </tr>
                </table>

                <div class="btn-container">
                    <a href="{{ route('login') }}" class="button">View Lead Details</a>
                </div>
            </div>
            <div class="footer">
                &copy; {{ date('Y') }} My Moving Journey. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>