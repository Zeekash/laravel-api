<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sponsored Post Approved - Payment Required</title>
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
            color: #f39c12;
            font-size: 24px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        .details {
            background-color: #fffaf0;
            padding: 15px;
            border-left: 4px solid #f39c12;
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
        <h1>Great News! Your Post is Approved</h1>
        <p>Hello {{ $post->company->company_name ?? 'Company' }},</p>
        <p>We are pleased to inform you that your sponsored post <strong>"{{ $post->title }}"</strong> has been
            approved by our team.</p>

        <div class="details">
            <p>Good news! Your blog post request has been approved. Please log in to your account and make the required
                payment. After successful payment, your sponsored blog will be live on Your website.</p>
        </div>

        <p class="text-center">
            <a href="{{ $payUrl }}" class="btn">Proceed to Dashboard for Payment</a>
        </p>

        <p>Thanks,<br>My Moving Journey Team</p>
    </div>
</body>

</html>
