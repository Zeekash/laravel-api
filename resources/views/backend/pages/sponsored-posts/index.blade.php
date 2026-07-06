@extends('backend.layouts.master')

@section('admin-content')
    <div class="container-fluid py-4" style="background:#f1f5f9;min-height:100vh;">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h2 class="fw-bold mb-1" style="color:#0f172a;font-size:26px;">
                    <i class="fa fa-newspaper me-2" style="color:#ea580c;"></i>Sponsored Posts
                </h2>
                <p class="text-muted mb-0">Admin reviews, approves & rejects sponsored blog post requests</p>
            </div>
            <div class="text-muted small">
                <i class="fa fa-clock me-1"></i> {{ now()->format('M d, Y — h:i A') }}
            </div>
        </div>

        <div class="row g-3 mb-4">

            <div class="col-xl-3 col-md-4 col-sm-6 mb-2">
                <div class="admin-stat-card" style="border-left:4px solid #6366f1;">
                    <div>
                        <div class="stat-label">Total Posts</div>
                        <div class="stat-val">{{ $totalPosts }}</div>
                    </div>
                    <div class="stat-icon" style="background:#ede9fe;color:#6366f1;">
                        <i class="fa fa-file"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #f59e0b;">
                    <div>
                        <div class="stat-label">Pending Review</div>
                        <div class="stat-val">{{ $pendingCount }}</div>
                    </div>
                    <div class="stat-icon" style="background:#fef3c7;color:#d97706;">
                        <i class="fa fa-hourglass-half"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #0ea5e9;">
                    <div>
                        <div class="stat-label">Awaiting Payment</div>
                        <div class="stat-val">{{ $awaitingCount }}</div>
                    </div>
                    <div class="stat-icon" style="background:#e0f2fe;color:#0284c7;">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #16a34a;">
                    <div>
                        <div class="stat-label">Published Live</div>
                        <div class="stat-val">{{ $publishedCount }}</div>
                    </div>
                    <div class="stat-icon" style="background:#dcfce7;color:#16a34a;">
                        <i class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #ef4444;">
                    <div>
                        <div class="stat-label">Rejected</div>
                        <div class="stat-val">{{ $rejectedCount }}</div>
                    </div>
                    <div class="stat-icon" style="background:#fee2e2;color:#dc2626;">
                        <i class="fa fa-times-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #10b981;">
                    <div>
                        <div class="stat-label">Payments Received</div>
                        <div class="stat-val">{{ $paidCount }}</div>
                    </div>
                    <div class="stat-icon" style="background:#d1fae5;color:#059669;">
                        <i class="fa fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #8b5cf6;">
                    <div>
                        <div class="stat-label">Companies Submitted</div>
                        <div class="stat-val">{{ $totalCompanies }}</div>
                    </div>
                    <div class="stat-icon" style="background:#ede9fe;color:#7c3aed;">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="admin-stat-card" style="border-left:4px solid #ea580c;">
                    <div>
                        <div class="stat-label">Total Revenue</div>
                        <div class="stat-val">${{ number_format($totalRevenue, 0) }}</div>
                    </div>
                    <div class="stat-icon" style="background:#ffedd5;color:#ea580c;">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
            </div>

        </div>
<!-- #6366f1  -->
        <div class="filter-tabs mb-3">
            @php
                $tabs = [
                    'all' => ['All Posts', $totalPosts, '#0d1b38'],
                    'pending' => ['Pending', $pendingCount, '#d97706'],
                    'awaiting_payment' => ['Awaiting Payment', $awaitingCount, '#ea580c'],
                    'published' => ['Published', $publishedCount, '#1c9758'],
                    'rejected' => ['Rejected', $rejectedCount, '#dc2626f7'],
                ];
            @endphp

            @foreach ($tabs as $key => [$label, $count, $color])
                <a href="{{ route('admin.sponsored-posts.index', ['filter' => $key]) }}"
                    class="filter-tab {{ $filter === $key ? 'active' : '' }}"
                    style="{{ $filter === $key ? "background:{$color};color:#fff;border-color:{$color};" : '' }}">
                    {{ $label }}
                    <span class="tab-badge"
                        style="{{ $filter === $key ? 'background:rgba(255,255,255,0.25);color:#fff;' : '' }}">
                        {{ $count }}
                    </span>
                </a>
            @endforeach
        </div>

        <div class="admin-table-card mb-5">
            <div class="table-card-header">
                <strong>
                    @if ($filter === 'all')
                        All Sponsored Posts
                    @elseif($filter === 'pending')
                        Pending Review
                    @elseif($filter === 'awaiting_payment')
                        Awaiting Payment
                    @elseif($filter === 'published')
                        Published Posts
                    @elseif($filter === 'rejected')
                        Rejected Posts
                    @endif
                </strong>
                <span class="text-muted" style="font-size:13px;">{{ $posts->count() }} records</span>
            </div>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Post</th>
                            <th>Status & Dates</th>
                            <th>Payment Info</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="text-muted" style="font-size:13px;">{{ $post->id }}</td>

                                <td>
                                    <div style="font-weight:600;color:#1e293b;font-size:14px;">
                                        {{ $post->company->company_name ?? ($post->company->name ?? '—') }}
                                    </div>
                                    <div style="font-size:12px;color:#64748b;">
                                        {{ $post->company->email ?? '' }}
                                    </div>
                                </td>

                                <td>
                                    <div style="display:flex;align-items:center;gap:12px;">

                                        <div>
                                            <div
                                                style="font-weight:600;color:#0f172a;font-size:14px;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                                {{ $post->title }}
                                            </div>
                                            <div style="font-size:12px;color:#64748b;">
                                                {{ $post->postCategory->name ?? '—' }}</div>
                                            @if ($post->seo_complete)
                                                <span style="font-size:11px;color:#16a34a;font-weight:600;"><i
                                                        class="fa fa-check"></i> SEO Completed</span>
                                            @else
                                                <span style="font-size:11px;color:#dc2626;font-weight:600;"><i
                                                        class="fa fa-times"></i> SEO Incomplete</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @php
                                        $statusMap = [
                                            'awaiting_payment' => ['Pending', 'info'],
                                            'published' => ['Published', 'success'],
                                            'rejected' => ['Rejected', 'danger'],
                                            'expired' => ['Expired', 'secondary'],
                                            'revision_requested' => ['Revision Req.', 'primary'],
                                        ];
                                        [$slabel, $scolor] = $statusMap[$post->sponsored_status] ?? [
                                            'Unknown',
                                            'secondary',
                                        ];

                                        $isRenewing =
                                            $post->sponsored_status === 'published' &&
                                            $post->expires_at &&
                                            now()->greaterThanOrEqualTo($post->expires_at->copy()->subDays(5));
                                    @endphp
                                    <span class="badge bg-{{ $scolor }}">{{ $slabel }}</span>

                                    @if ($post->sponsored_status === 'rejected' && $post->admin_note)
                                        <div
                                            style="margin-top:5px;font-size:11px;color:#dc2626;background:#fee2e2;padding:4px 8px;border-radius:5px;max-width:180px;">
                                            {{ Str::limit($post->admin_note, 60) }}
                                        </div>
                                    @endif

                                    @if (in_array($post->sponsored_status, ['published', 'expired']) && $post->published_at)
                                        <div style="margin-top:8px;font-size:12px;color:#475569;">
                                            <div style="margin-bottom:2px;">
                                                <i class="fa fa-play-circle text-success" style="width:12px;"></i>
                                                <strong>Start:</strong> {{ $post->published_at->format('M d, Y') }}
                                            </div>
                                            @if ($post->expires_at)
                                                <div>
                                                    <i class="fa fa-stop-circle text-danger" style="width:12px;"></i>
                                                    <strong>Expiry:</strong> {{ $post->expires_at->format('M d, Y') }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <strong
                                        style="color:#0f172a;display:block;margin-bottom:4px;">{{ $post->price_formatted }}</strong>
                                    @if ($post->payment_status === 'paid')
                                        <span class="badge bg-success"><i class="fa fa-check me-1"></i>Paid</span>
                                        @if ($post->paid_at)
                                            <div style="font-size:11px;color:#64748b;margin-top:3px;">
                                                <i class="fa fa-calendar-check text-muted"></i>
                                                {{ $post->paid_at->format('M d, Y') }}
                                            </div>
                                        @endif
                                    @else
                                        <span class="badge bg-warning">Unpaid</span>
                                    @endif
                                </td>

                                <td style="font-size:13px;color:#64748b;">
                                    {{ $post->created_at->format('M d, Y') }}
                                    <div style="font-size:11px;">{{ $post->created_at->format('h:i A') }}</div>
                                </td>

                                <td>
                                    <div style="display:flex;flex-direction:column;gap:5px;">
                                        <a href="{{ route('admin.sponsored-posts.show', $post->id) }}"
                                            class="btn btn-sm btn-outline-secondary" style="font-size:12px;">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>

                                        @if ($post->sponsored_status === 'pending')
                                            <form method="POST"
                                                action="{{ route('admin.sponsored-posts.approve', $post->id) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-success w-100" style="font-size:12px;"
                                                    {{ !$post->seo_complete ? 'disabled' : '' }}>
                                                    <i class="fa fa-check"></i> Approve
                                                </button>
                                            </form>

                                            <button type="button" class="btn btn-sm btn-danger w-100" style="font-size:12px;"
                                                data-toggle="modal" data-target="#rejectModal{{ $post->id }}">
                                                <i class="fa fa-times"></i> Reject
                                            </button>
                                        @endif

                                       @if (
                                                in_array($post->sponsored_status, ['published', 'expired']) &&
                                                $post->expires_at &&
                                                now()->gte(\Carbon\Carbon::parse($post->expires_at))
                                            )
                                                <form method="POST"
                                                    action="{{ route('admin.sponsored-posts.renew', $post->id) }}">
                                                    @csrf
                                                    <button class="btn btn-sm btn-primary w-100" style="font-size:12px;"
                                                            onclick="return confirm('Are you sure you want to manually renew this post for 1 month?')">
                                                        <i class="fa fa-sync-alt"></i> Renew
                                                    </button>
                                                </form>
                                            @endif
                                    </div>
                                </td>
                            </tr>



                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fa fa-inbox fa-2x mb-3 d-block"></i>
                                    No sponsored posts found
                                    @if ($filter !== 'all')
                                        for filter "{{ $filter }}"
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-table-card">
            <div class="table-card-header">
                <strong><i class="fa fa-receipt me-2" style="color:#ea580c;"></i>Billing History — Sponsored
                    Posts</strong>
                <span class="text-muted" style="font-size:13px;">{{ $billing->count() }} transactions</span>
            </div>

            @if ($billing->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fa fa-file-invoice-dollar fa-2x mb-3 d-block"></i>
                    No payments received yet
                </div>
            @else
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Company</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Paid At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billing as $bill)
                                <tr>
                                    <td>
                                        <code style="font-size:12px;background:#f1f5f9;padding:3px 7px;border-radius:4px;">
                                            {{ $bill->invoice_no }}
                                        </code>
                                    </td>
                                    <td>
                                        <div style="font-weight:600;color:#0f172a;">
                                            {{ $bill->company->company_name ?? ($bill->company->name ?? '—') }}
                                        </div>
                                        <div style="font-size:12px;color:#64748b;">
                                            {{ $bill->company->email ?? '' }}
                                        </div>
                                    </td>
                                    <td>
                                        <strong style="color:#16a34a;font-size:15px;">
                                            {{ $bill->amount_formatted }}
                                        </strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $bill->status === 'paid' ? 'success' : 'warning' }}">
                                            {{ ucfirst($bill->status) }}
                                        </span>
                                    </td>
                                    <td style="font-size:13px;color:#64748b;">
                                        {{ $bill->paid_at ? $bill->paid_at->format('M d, Y h:i A') : '—' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    <!-- Modals (Outside the table and container) -->
    @foreach($posts as $post)
        @if (!in_array($post->sponsored_status, ['rejected']))
            <div class="modal fade" id="rejectModal{{ $post->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold text-danger">
                                <i class="fa fa-times-circle me-2"></i>Reject Post
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST"
                            action="{{ route('admin.sponsored-posts.reject', $post->id) }}">
                            @csrf
                            <div class="modal-body">
                                <p class="text-muted small mb-3" style="font-size:13px">
                                    Post Title: <strong> {{ $post->title }}</strong><br>
                                    Company Name: <strong>{{ $post->company->company_name ?? '—' }}</strong>
                                </p>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Rejection Reason <span
                                            class="text-danger">*</span></label>
                                    <textarea name="admin_note" class="form-control" rows="4" required
                                        placeholder="Explain why this post is rejected (visible to company)..."></textarea>
                                    <small class="text-muted">This message will be shown to the company
                                        on their dashboard.</small>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> Reject Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <style>
        .admin-stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .06);
            transition: transform .2s, box-shadow .2s;
        }

        .admin-stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .1);
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }

        .stat-val {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 30px;
            border: 1.5px solid #e2e8f0;
            background: #fff;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
        }

        .filter-tab:hover {
            border-color: #cbd5e1;
            color: #0f172a;
            text-decoration: none;
        }

        .tab-badge {
            background: #f1f5f9;
            color: #64748b;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .admin-table-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        }

        .table-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 22px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 15px;
            color: #0f172a;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead {
            background: #f8fafc;
        }

        .admin-table th {
            padding: 14px 18px;
            font-size: 12px;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: .4px;
            font-weight: 700;
            white-space: nowrap;
        }

        .admin-table td {
            padding: 16px 18px;
            border-top: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .admin-table tbody tr {
            transition: background .15s;
        }

        .admin-table tbody tr:hover {
            background: #fafbfc;
        }
    </style>
@endsection
