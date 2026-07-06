<!DOCTYPE html>
<html>
<head>
    <title>New Live Call Dispute Submitted</title>
</head>
<body>
    <h2>Dispute To Details</h2>
    <p><strong>User Name:</strong> {{ $liveCallDispute->liveCall->user_name }},</p>
    <p><strong>User Email:</strong> {{ $liveCallDispute->liveCall->user_email }},</p>
    <h2>Dispute By Details</h2>
    <p><strong>Company Name:</strong> {{ $liveCallDispute->company->company_name ?? 'N/A' }}</p>
    <p><strong>Company Email:</strong> {{ $liveCallDispute->company->company_email ?? 'N/A' }}</p>
    <p><strong>Subject:</strong> Live Call Dispute</p>
    <p><strong>Message:</strong></p>
    <p>{{ $liveCallDispute->message ?? 'No message provided.' }}</p>
</html>
