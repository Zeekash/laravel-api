@extends('company.layouts.master')

@section('content')
<div class="container-fluid" style="padding: 30px;">
    <div style="max-width: 600px; margin: 40px auto;">

        {{-- Success Icon --}}
        <div style="text-align:center; margin-bottom: 32px;">
            <div style="width:72px; height:72px; background:#f0fdf4; border:2px solid #bbf7d0;
                        border-radius:50%; display:inline-flex; align-items:center;
                        justify-content:center; margin-bottom:16px;">
                <i class="fa fa-check" style="font-size:30px; color:#16a34a;"></i>
            </div>
            <h2 style="font-size:24px; font-weight:700; color:#0f172a; margin-bottom:8px;">
                Request Submitted!
            </h2>
            <p style="color:#64748b; font-size:15px; margin:0;">
                Your sponsored blog post has been sent to admin for review.
            </p>
        </div>

        {{-- Info Card --}}
        <div style="background:#fff; border:1px solid #e2e8f0; border-radius:10px; overflow:hidden; margin-bottom:20px;">

            {{-- Dark Header --}}
            <div style="background:#1e293b; padding:16px 22px; display:flex; justify-content:space-between; align-items:center;">
                <span style="color:rgba(255,255,255,.7); font-size:13px;">Post Title</span>
                <span style="color:#fff; font-weight:600; font-size:14px;">{{ $post->title }}</span>
            </div>

            {{-- Details --}}
            <div style="padding:20px 22px;">
                <div style="display:flex; justify-content:space-between; padding:10px 0; border-bottom:1px solid #f1f5f9; font-size:14px;">
                    <span style="color:#64748b;">Status</span>
                    <span style="background:#fef9c3; color:#854d0e; padding:3px 10px; border-radius:20px;
                                 font-size:11px; font-weight:700; text-transform:uppercase;">
                        Under Admin Review
                    </span>
                </div>
                <div style="display:flex; justify-content:space-between; padding:10px 0; border-bottom:1px solid #f1f5f9; font-size:14px;">
                    <span style="color:#64748b;">Price if Approved</span>
                    <span style="font-weight:700; color:#0f172a;">{{ $post->price_formatted }}</span>
                </div>
                <div style="display:flex; justify-content:space-between; padding:10px 0; font-size:14px;">
                    <span style="color:#64748b;">Payment</span>
                    <span style="color:#16a34a; font-weight:600;">No payment yet</span>
                </div>
            </div>
        </div>

        {{-- Notice --}}
        <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px;
                    padding:14px 18px; margin-bottom:24px; display:flex; gap:12px; align-items:flex-start;">
            <i class="fa fa-info-circle" style="color:#16a34a; font-size:18px; margin-top:2px; flex-shrink:0;"></i>
            <div style="font-size:13px; color:#166534; line-height:1.6;">
                <strong>What happens next?</strong><br>
                Admin will review all SEO fields and content. If approved, you'll receive a payment link
                and the post will go live after payment is completed.
            </div>
        </div>

        {{-- Actions --}}
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a href="{{ route('company.sponsored-posts.index') }}"
               style="flex:1; background:#1e293b; color:#fff; text-align:center; padding:12px 20px;
                      border-radius:7px; font-size:14px; font-weight:600; text-decoration:none;
                      min-width:140px; display:flex; align-items:center; justify-content:center; gap:8px;">
                <i class="fa fa-list"></i> View My Posts
            </a>
            <a href="{{ route('company.sponsored-posts.create') }}"
               style="flex:1; background:#f8fafc; color:#475569; text-align:center; padding:12px 20px;
                      border-radius:7px; font-size:14px; font-weight:600; text-decoration:none;
                      border:1px solid #e2e8f0; min-width:140px; display:flex; align-items:center;
                      justify-content:center; gap:8px;">
                <i class="fa fa-plus"></i> Submit Another
            </a>
        </div>

    </div>
</div>
@endsection