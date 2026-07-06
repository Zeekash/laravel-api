
Hello {{ $claim->name }},
<br>
<br>
Thank you for getting in touch with us regarding the claim request for “{{ $claim->company->company_name }}”. We appreciate your prompt response, and we are pleased to inform you that your claim request has been successfully verified.
<br>
<br>
Our team has thoroughly verified the details you provided, including your company name and domain name with email.
<br>
<br>
To Claim your company, click the link below at your earliest convenience. After claiming you'll receive company credentials within 24 hours.
<br>
<br>
<a href="{{ route('company.claim.verify', $token) }}">{{ url('company/claim/' . $token) }}</a>
<br>
<br>
Thank you for choosing <a href="https://mymovingjourney.com/">My Moving Journey</a>. We look forward to providing you with an exceptional experience and are committed to serving your business needs. If you have any queries, contact us at <a href="mailto:inquiry@mygoodmovers.com">inquiry@mygoodmovers.com</a>.
<br>
<br>
Best Regards, 
<br>
<br>
My Moving Journey
<br>
<a href="https://mymovingjourney.com/">https://mymovingjourney.com/</a>
<br>
<br>
<img src="https://mymovingjourney.com/assets/img/logo.png" alt="logo" width="15%">
