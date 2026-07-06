<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sponsored Post Rejected</title>
    <style>
        body {
            font-family: 'Nunito', Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #e74c3c;
            font-size: 24px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        .details {
            background-color: #fff3f3;
            padding: 15px;
            border-left: 4px solid #e74c3c;
            margin: 20px 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #123269;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sponsored Post Rejected</h1>
        <p>Hello {{ $post->company->company_name ?? 'Company' }},</p>
        <p>Thank you for submitting your sponsored post <strong>"{{ $post->title }}"</strong>.</p>
        <p>After careful review, we regret to inform you that your post has been rejected at this time.</p>

        @if ($post->admin_note)
            <div class="details">
                <p><strong>Reason / Note from Admin:</strong></p>
                <p>{{ $post->admin_note }}</p>
            </div>
        @endif

        <p>You can view the status and make necessary changes from your dashboard.</p>

        <p class="text-center">
            <a href="{{ $dashboardUrl }}" class="btn">Go to Dashboard</a>
        </p>

        <p>Thanks,<br>My Moving Journey Team</p>
    </div>
</body>

</html>
