<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsored Post Resubmitted</title>
    <style>
        body { font-family: 'Nunito', Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #123269; font-size: 24px; text-align: center; }
        p { font-size: 16px; line-height: 1.6; }
        .details { background-color: #f9f9f9; padding: 15px; border-left: 4px solid #123269; margin: 20px 0; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #123269; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sponsored Post Resubmitted</h1>
        <p>Hello Admin,</p>
        <p>A company has resubmitted a sponsored post request that was previously rejected. It requires your review.</p>
        
        <div class="details">
            <p><strong>Post Title:</strong> {{ $post->title }}</p>
            <p><strong>Company:</strong> {{ $post->company->company_name ?? 'N/A' }}</p>
            <p><strong>Company Email:</strong> <a href="mailto:{{ $post->company->email ?? '' }}">{{ $post->company->email ?? 'N/A' }}</a></p>
            <p><strong>Company Phone:</strong> {{ $post->company->phone_no ?? 'N/A' }}</p>
            <p><strong>Resubmitted On:</strong> {{ $post->updated_at->format('M d, Y') }}</p>
        </div>

        <p class="text-center">
            <a href="{{ $adminUrl }}" class="btn">Review Post</a>
        </p>

        <p>Thanks,<br>My Moving Journey</p>
    </div>
</body>
</html>
