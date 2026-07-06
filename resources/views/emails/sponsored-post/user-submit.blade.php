<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsored Post Request Received</title>
    <style>
        body { font-family: 'Nunito', Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #123269; font-size: 24px; text-align: center; }
        p { font-size: 16px; line-height: 1.6; }
        .details { background-color: #f9f9f9; padding: 15px; border-left: 4px solid #123269; margin: 20px 0; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #ea580c; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Post Request Received</h1>
        <p>Hello {{ $post->company->company_name ?? 'Company' }},</p>
        <p>Your sponsored post request has been successfully submitted to our administration team for review.</p>
        
        <div class="details">
            <p><strong>Post Title:</strong> {{ $post->title }}</p>
            <p><strong>Status:</strong> Under Review</p>
        </div>

        <p>We will notify you once the post is reviewed and approved. If it requires any further changes, we will reach out to you.</p>

        <p class="text-center">
            <a href="{{ route('company.sponsored-posts.index') }}" class="btn">View My Posts</a>
        </p>

        <p>Thanks,<br>My Moving Journey</p>
    </div>
</body>
</html>
