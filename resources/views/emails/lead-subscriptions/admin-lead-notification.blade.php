<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            background-color: #f8f9fa;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #1a1a1a;
            padding: 20px;
            text-align: center;
        }

        .header h2 {
            color: #ffffff;
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .content {
            padding: 40px;
        }

        .stats-grid {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
            border-radius: 6px;
        }

        .stat-item {
            flex: 1;
            padding: 20px;
            border-right: 1px solid #f0f0f0;
            min-width: 150px;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .label {
            display: block;
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .value {
            display: block;
            font-size: 18px;
            color: #212529;
            font-weight: 600;
        }

        .revenue {
            color: #28a745 !important;
        }

        .footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #adb5bd;
            background: #fdfdfd;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h2>New Revenue Notification</h2>
            </div>
            <div class="content">
                <p style="margin-top: 0;">An extra lead has been successfully unlocked. Below are the transaction
                    details:</p>

                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="label">Company</span>
                        <span class="value">{{ $company->company_name }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="label">Revenue</span>
                        <span class="value revenue">+ ${{ number_format($amount / 100, 2) }}</span>
                    </div>
                </div>

                <div style="background: #f8f9fa; padding: 20px; border-radius: 6px;">
                    <span class="label">Lead ID</span>
                    <span class="value">#{{ 20000 + $lead->id }}</span>
                    <hr style="border: 0; border-top: 1px solid #dee2e6; margin: 15px 0;">
                    <span class="label">Triggered At</span>
                    <span class="value" style="font-size: 14px;">{{ now()->format('M d, Y - H:i') }}</span>
                </div>

                {{-- <div style="text-align: center;">
                    <a href="{{ config('app.url') }}/admin/leads/{{ $lead->id }}" class="btn">View Lead Details</a>
                </div> --}}
            </div>
            <div class="footer">
                Automated System Notification &bull; {{ config('app.name') }} Internal
            </div>
        </div>
    </div>
</body>

</html>
