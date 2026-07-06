@extends('company.layouts.master')


@section('styles')
    <style>
        .sp-wrapper {
            padding: 30px;
            background: #f8fafc;
        }

        .sp-header {
            background: white;
            padding: 25px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .06);

        }

        .sp-title {
            font-size: 26px;
            font-weight: 800;
            color: #111827;
            margin: 0;
        }

        .sp-sub {
            color: #6b7280;
            margin-top: 5px;
        }

        .sp-btn {
            background: #ea580c;
            color: #fff;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .sp-btn:hover {
            color: #fff;
        }

        .sp-table-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .06);
        }

        .sp-table {
            width: 100%;
            border-collapse: collapse;
        }

        .sp-table thead {
            background: #f8fafc;
        }

        .sp-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 13px;
            color: #475569;
            text-transform: uppercase;
        }

        .sp-table td {
            padding: 18px 20px;
            border-top: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .sp-table tbody tr {
            transition: .2s;
        }



        .sp-table tbody tr:hover {
            background: #fafafa;
        }

        .post-img {
            width: 65px;
            height: 55px;
            border-radius: 10px;
            object-fit: cover;
        }

        .no-img {
            width: 65px;
            height: 55px;
            border-radius: 10px;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #94a3b8;
        }

        .post-title {
            font-weight: 700;
            color: #111827;
        }

        .post-date {
            font-size: 12px;
            color: #64748b;
        }

        .badge-custom {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }


        .approved {
            background: #dcfce7;
            color: #166534;
        }

        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .published {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .expired {
            background: #e5e7eb;
            color: #374151;
        }

        .pay-btn {
            background: #16a34a;
            color: #fff;
            border: 0;
            padding: 9px 6px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .pay-btn:hover {
            background: #15803d;
        }

        .paid {
            background: #dcfce7;
            color: #166534;
        }

        .unpaid {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            text-align: center;
            padding: 70px;
        }
    </style>
@endsection


@section('content')
    <div class="sp-wrapper">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="sp-header">

            <div>
                <h2 class="sp-title">My Sponsored Posts</h2>
                <p class="sp-sub">Manage your sponsored blog submissions and payments</p>
            </div>

            <a href="{{ route('company.sponsored-posts.create') }}" class="sp-btn">
                <i class="fa fa-plus"></i>
                New Sponsored Post
            </a>
        </div>

        <div class="sp-table-card">

            <div class="table-responsive">
                <table class="sp-table">

                    <thead>

                        <tr>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Expiry Date</th>
                            <th>Payment</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div style="display:flex;gap:15px;align-items:center;">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="post-img">
                                        @else
                                            <div class="no-img">
                                                <i class="fa fa-image"></i>
                                            </div>
                                        @endif

                                        <div>

                                            <div class="post-title">{{ $post->title }}</div>
                                            <div class="post-date">{{ $post->created_at->format('M d,Y') }}</div>

                                        </div>

                                    </div>
                                </td>

                                <td>
                                    @php
                                        $isExpired = $post->sponsored_status === 'published'
                                            && $post->expires_at
                                            && now()->greaterThan($post->expires_at);

                                        $status = [
                                            'pending'           => ['Under Review', 'pending'],
                                            'awaiting_payment'  => ['Approved — Pay Now', 'approved'],
                                            'rejected'          => ['Rejected', 'rejected'],
                                            'published'         => ['Published', 'published'],
                                            'expired'           => ['Expired', 'expired'],
                                        ];

                                        $s = $isExpired
                                            ? ['Expired', 'expired']
                                            : ($status[$post->sponsored_status] ?? ['Unknown', 'pending']);
                                    @endphp

                                    <span class="badge-custom {{ $s[1] }}">{{ $s[0] }}</span>

                                    {{-- Show rejection reason to company --}}
                                    @if($post->sponsored_status === 'rejected' && $post->admin_note)
                                        <div style="margin-top:8px;font-size:12px;color:#991b1b;background:#fee2e2;border:1px solid #fca5a5;padding:8px 10px;border-radius:8px;max-width:280px;line-height:1.5;">
                                            <strong style="display:block;margin-bottom:3px;"><i class="fa fa-times-circle"></i> Rejection Reason:</strong>
                                            {{ $post->admin_note }}
                                        </div>
                                    @endif

                                </td>

                                <td>
                                    @if ($post->sponsored_status === 'published' || $post->payment_status === 'paid')
                                        @if($post->published_at)
                                            <span style="font-size: 13px; color: #475569;">
                                                {{ $post->published_at->format('M d, Y') }}
                                            </span>
                                        @else
                                            <span style="color:#94a3b8;font-size:13px;">-</span>
                                        @endif
                                    @else
                                        <span style="color:#94a3b8;font-size:13px;">-</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($post->sponsored_status === 'published' || $post->payment_status === 'paid')
                                        @if($post->published_at)
                                            @if(!$post->expires_at || now()->lessThanOrEqualTo($post->expires_at))
                                                <span style="font-size: 13px; color: #475569;">
                                                    {{ $post->expires_at ? $post->expires_at->format('M d, Y') : '-' }}
                                                </span>
                                            @else
                                                <span style="color:#94a3b8;font-size:13px;">-</span>
                                            @endif
                                        @else
                                            <span style="color:#94a3b8;font-size:13px;">-</span>
                                        @endif
                                    @else
                                        <span style="color:#94a3b8;font-size:13px;">-</span>
                                    @endif
                                </td>

                                <td>
                                    @if($isExpired)
                                        <span class="badge-custom expired">Unpaid</span>
                                    @elseif ($post->payment_status == 'paid')
                                        <span class="badge-custom paid">
                                            <i class="fa fa-check"></i>
                                            Paid
                                        </span>
                                    @else
                                        <span class="badge-custom unpaid">Unpaid</span>
                                    @endif

                                </td>

                                <td>
                                    <strong>{{ $post->price_formatted }}</strong>
                                </td>

                                <td>

                                    @if($isExpired)
                                        {{-- Subscription expired: only show Renew button --}}
                                        <form method="POST" action="{{ route('company.sponsored-posts.checkout', $post->id) }}">
                                            @csrf
                                            <button class="pay-btn" style="background: #ea580c;">
                                                <i class="fa fa-refresh"></i> Renew
                                            </button>
                                        </form>
                                    @elseif ($post->sponsored_status == 'awaiting_payment' && $post->payment_status == 'unpaid')
                                        <form method="POST" action="{{ route('company.sponsored-posts.checkout', $post->id) }}">
                                            @csrf
                                            <button class="pay-btn">
                                                <i class="fa fa-credit-card"></i>
                                                Pay Now
                                            </button>
                                        </form>
                                    @elseif($post->sponsored_status == 'published')
                                        {{-- Active subscription: show View + Renew if within 5 days --}}
                                        <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="btn btn-sm btn-primary">View</a>
                                        @if($post->expires_at && now()->greaterThanOrEqualTo($post->expires_at->copy()->subDays(5)))
                                            <form method="POST" action="{{ route('company.sponsored-posts.checkout', $post->id) }}" style="display:inline-block; margin-top:5px;">
                                                @csrf
                                                <button class="pay-btn" style="background:#ea580c; padding:6px 10px; font-size:12px;">
                                                    <i class="fa fa-refresh"></i> Renew
                                                </button>
                                            </form>
                                        @endif
                                    @elseif($post->sponsored_status == 'rejected')
                                        <a href="{{ route('company.sponsored-posts.edit', $post->id) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-redo"></i> Resubmit
                                        </a>
                                    @else
                                        <span style="color:#94a3b8;font-size:13px;"> Waiting </span>
                                    @endif

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">
                                    <div class="empty">
                                        <h4>No sponsored posts found</h4>
                                        <p>Create your first sponsored post</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection