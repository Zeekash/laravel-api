<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Confirmed</title>
    <style>
        body { font-family: 'Nunito', Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #2ecc71; font-size: 24px; text-align: center; }
        p { font-size: 16px; line-height: 1.6; }
        .details { background-color: #f0fdf4; padding: 15px; border-left: 4px solid #2ecc71; margin: 20px 0; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #123269; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Successful!</h1>
        
        @if($isAdmin)
            <p>Hello Admin,</p>
            <p>A payment has been successfully processed for a sponsored post. The post is now live.</p>
        @else
            <p>Hello {{ $post->company->company_name ?? 'Company' }},</p>
            <p>Thank you! Your payment has been successfully processed, and your sponsored post is now LIVE.</p>
        @endif
        
        <div class="details">
            <p><strong>Post Title:</strong> {{ $post->title }}</p>
            <p><strong>Company:</strong> {{ $post->company->company_name ?? 'N/A' }}</p>
            <p><strong>Company Email:</strong> <a href="mailto:{{ $post->company->email ?? '' }}">{{ $post->company->email ?? 'N/A' }}</a></p>
            <p><strong>Company Phone:</strong> {{ $post->company->phone_no ?? 'N/A' }}</p>
            <p><strong>Amount Paid:</strong> ${{ number_format($post->price, 2) }}</p>
            <p><strong>Paid On:</strong> {{ $post->paid_at ? $post->paid_at->format('M d, Y h:i A') : now()->format('M d, Y h:i A') }}</p>
            <p><strong>Expires On:</strong> {{ $post->expires_at ? $post->expires_at->format('M d, Y') : 'N/A' }}</p>
            <p><strong>Status:</strong> Published</p>
        </div>

        @if($isAdmin)
            <p class="text-center">
                <a href="{{ route('admin.sponsored-posts.show', $post->id) }}" class="btn">View Post</a>
            </p>
        @endif

        <p>Thanks,<br>My Moving Journey Team</p>
    </div>
</body>
</html>
