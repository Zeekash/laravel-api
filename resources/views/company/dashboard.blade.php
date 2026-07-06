@extends('company.layouts.master')
@section('title', 'Company Dashboard')
@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400..800&display=swap');

        .dashboard-content {
            font-family: "Outfit", sans-serif;
            padding: 24px 28px;
            flex: 1;
            background: #f4f6f9;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px
        }

        .page-title {
            font-family: 'Sora', sans-serif;
            font-size: 22px;
            font-weight: 800;
            color: #1f2937;
            letter-spacing: -.4px
        }

        .page-sub {
            font-size: 13px;
            color: #6b7280;
            margin-top: 3px
        }

        .stat-box-review {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            border: 1px solid #e5e7eb;
            border-top: 4px solid #d97706;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition: 0.2s;
            height: 100%;
        }

        .stat-box-rating {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            border: 1px solid #e5e7eb;
            border-top: 4px solid #10b981;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition: 0.2s;
            height: 100%;
        }

        .stat-box-lead {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            border: 1px solid #e5e7eb;
            border-top: 4px solid #1e3a8a;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition: 0.2s;
            height: 100%;
        }

        .stat-box:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #1e40af;
            background: #eff6ff;
            margin-bottom: 16px;
        }

        .stat-label {
            font-size: 11px;
            font-weight: 800;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 900;
            font-family: 'Sora', sans-serif;
            color: #0f172a;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-trend {
            font-size: 12px;
            font-weight: 700;
            color: #10b981;
        }

        /* Card panels */
        .panel {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .panel-header {
            padding: 16px 24px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-title {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .year-selector {
            display: flex;
            align-items: center;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 13px;
            font-weight: 700;
            color: #6b7280;
        }

        .year-selector a {
            color: #9ca3af;
            text-decoration: none;
            padding: 0 4px;
        }

        .year-selector a:hover {
            color: #1f2937;
        }

        .year-selector span {
            margin: 0 12px;
            color: #4b5563;
        }

        .panel-action {
            font-size: 13px;
            font-weight: 600;
            color: #f97316;
            text-decoration: none;
        }

        .panel-action:hover {
            color: #ea580c;
        }

        .leads-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lead-item {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
        }

        .lead-item:last-child {
            border-bottom: none;
        }

        .lead-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            margin-right: 16px;
        }

        .lead-info {
            flex: 1;
        }

        .lead-name {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 2px;
        }

        .lead-route {
            font-size: 12px;
            color: #6b7280;
        }

        .lead-meta {
            text-align: right;
        }

        .lead-time {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .lead-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-now {
            background: #eff6ff;
            color: #3b82f6;
        }

        .badge-contacted {
            background: #fffbeb;
            color: #d97706;
        }

        .badge-new {
            background: #ecfdf5;
            color: #10b981;
        }

        .badge-won {
            background: #ecfdf5;
            color: #059669;
        }

        .badge-lost {
            background: #fef2f2;
            color: #dc2626;
        }

        .addon-item {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
        }

        .addon-item:last-child {
            border-bottom: none;
        }

        .addon-icon-wrap {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-size: 18px;
        }

        .addon-icon-wrap.active {
            background: #fff5eb;
            color: #f97316;
        }

        .addon-icon-wrap.expired {
            background: #f3f4f6;
            color: #6b7280;
        }

        .addon-name {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 2px;
        }

        .addon-desc {
            font-size: 12px;
            color: #6b7280;
        }

        .addon-status {
            text-align: right;
        }

        .addon-days {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
        }

        .addon-days.text-green {
            color: #10b981;
        }

        .addon-action {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #f97316;
            text-decoration: none;
            margin-top: 2px;
        }

        /* Quick Actions */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            padding: 20px;
        }

        @media(max-width: 991px) {
            .quick-actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .action-card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px 16px;
            text-align: center;
            background: #fff;
            transition: 0.2s;
            text-decoration: none;
            display: block;
            color: inherit;
        }

        .action-card:hover {
            border-color: #d1d5db;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .ac-1 {
            background: #fff5eb;
            color: #f97316;
        }

        .ac-2 {
            background: #f5f3ff;
            color: #8b5cf6;
        }

        .ac-3 {
            background: #eff6ff;
            color: #3b82f6;
        }

        .ac-4 {
            background: #fffbeb;
            color: #d97706;
        }

        .action-title {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .action-sub {
            font-size: 11px;
            color: #6b7280;
        }

        .col-lg-7 {
            padding-right: 0px;
        }
    </style>

    @php
        $year = $year ?? now()->year;
        $years = $years ?? collect([]);
        if ($years->isEmpty()) {
            $years = collect([$year]);
        }
        $recentLeads = $recent_leads ?? collect([]);
    @endphp

    <div class="dashboard-content">
        <div class="page-header">
            <div>
                <div class="page-title">MMJ Dashboard</div>
                <div class="page-sub">Live platform overview — {{ now()->format('F j, Y') }}</div>
            </div>
        </div>

        <!-- Top Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <a href="{{ route('company.review', $company->slug) }}" class="text-decoration-none">
                    <div class="stat-box stat-box-review">
                        <div class="stat-icon"><i class="fa fa-comment"></i></div>
                        <div class="stat-label">TOTAL REVIEWS</div>
                        <div class="stat-value">{{ $total_reviews }}</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('company.review', $company->slug) }}" class="text-decoration-none">
                    <div class="stat-box stat-box-rating">
                        <div class="stat-icon"><i class="fa fa-star"></i></div>
                        <div class="stat-label">AVERAGE RATING</div>
                        <div class="stat-value">{{ round($avg_rating, 1) }}</div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('company.mover_leads') }}" class="text-decoration-none">
                    <div class="stat-box stat-box-lead">
                        <div class="stat-icon"><i class="fa fa-edit"></i></div>
                        <div class="stat-label">TODAY'S NEW LEADS</div>
                        <div class="stat-value">{{ $total_mover_leads }}</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Top Row -->
            <div class="col-lg-6">
                <!-- Monthly Reviews Chart -->
                <div class="panel">
                    <div class="panel-header border-0 pb-0">
                        <div class="panel-title"><i class="fa fa-bar-chart text-dark"></i> Monthly Reviews</div>
                        <div class="year-selector">
                            <a href="?year={{ $year - 1 }}">&lt;</a>
                            <span>{{ $year }}</span>
                            <a href="?year={{ $year + 1 }}">&gt;</a>
                        </div>
                    </div>
                    <div class="panel-body p-3 pt-0">
                        <div id="container" style="height: 300px"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title"><i class="fa fa-bolt text-danger"></i> Recent Leads</div>
                        <a href="{{ route('company.mover_leads') }}" class="panel-action">View all &rarr;</a>
                    </div>
                    <div class="panel-body p-0">
                        <div class="leads-list">
                            @forelse($recentLeads as $index => $lead)
                                @php
                                    $leadName = trim(($lead->name ?? '') . ' ' . ($lead->lastname ?? ''));
                                    $initials = strtoupper(
                                        substr($lead->name ?? 'A', 0, 1) . substr($lead->lastname ?? 'B', 0, 1),
                                    );
                                    $fromRoute = $lead->ocity ?? 'Unknown';
                                    $toRoute = $lead->dcity ?? 'Unknown';
                                    $moveSize = $lead->move_size ? explode(' ', $lead->move_size)[0] . '-bed' : 'N/A';

                                    // Determine fake status badge for demonstration based on index if no real logic
                                    $statusClasses = [
                                        'badge-now',
                                        'badge-contacted',
                                        'badge-new',
                                        'badge-won',
                                        'badge-lost',
                                    ];
                                    $statusTexts = ['Now', 'Contacted', 'New', 'Won', 'Lost'];
                                    $bIdx = $index % 5;
                                    $badgeClass = $statusClasses[$bIdx];
                                    $badgeText = $statusTexts[$bIdx];

                                    // Colors for avatars
                                    $colors = ['#1e3a8a', '#065f46', '#b45309', '#4c1d95', '#991b1b'];
                                    $avatarBg = $colors[$index % 5];

                                    $timeStr = $lead->created_at->diffForHumans(null, true, true) . ' ago';
                                @endphp
                                <div class="lead-item">
                                    <div class="lead-avatar" style="background-color: {{ $avatarBg }};">
                                        {{ $initials }}</div>
                                    <div class="lead-info">
                                        <div class="lead-name">{{ $leadName ?: 'Customer' }}</div>
                                        <div class="lead-route">{{ $fromRoute }} &rarr; {{ $toRoute }} &middot;
                                            {{ $moveSize }}</div>
                                    </div>
                                    <div class="lead-meta">
                                        <div class="lead-time"
                                            style="font-size: 13px; font-weight: 600; color: #6b7280; text-align: right;">
                                            {{ str_replace([' seconds', ' minutes', ' hours', ' days', ' months', ' years'], ['s', 'm', 'h', 'd', 'mo', 'y'], $timeStr) }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="p-4 text-center text-muted" style="font-size: 13px;">No recent leads found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title"><i class="fa fa-star-o text-muted"></i> Active Subscriptions</div>
                        <a href="{{ route('company.sponsored-posts.index') }}" class="panel-action">Manage &rarr;</a>
                    </div>
                    <div class="panel-body p-0">
                        @php
                            $hasActiveLeads = isset($active_leads_subs) && $active_leads_subs->count() > 0;
                            $hasPosts = $sponsored_posts->count() > 0;
                            $combinedSubs = collect();

                            if ($hasActiveLeads) {
                                foreach($active_leads_subs as $lead) {
                                    $lead->sub_type = 'lead';
                                    $combinedSubs->push($lead);
                                }
                            }
                            if ($hasPosts) {
                                foreach($sponsored_posts as $post) {
                                    $post->sub_type = 'post';
                                    $combinedSubs->push($post);
                                }
                            }

                            $combinedSubs = $combinedSubs->sortByDesc('created_at')->take(5);
                            $iconColors = [['bg' => '#eff6ff', 'color' => '#3b82f6', 'icon' => 'fa fa-file']];
                            $postIndex = 0;
                        @endphp
                        @if ($combinedSubs->count() > 0)
                            @foreach ($combinedSubs as $item)
                                @if ($item->sub_type === 'lead')
                                    @php
                                        $leadName = trim(($item->name ?? '') . ' ' . ($item->lastname ?? ''));
                                        $fromRoute = $item->ocity ?? 'Unknown';
                                        $toRoute = $item->dcity ?? 'Unknown';
                                    @endphp
                                    <a href="{{ route('company.mover_leads') }}" class="addon-item addon-item-link"
                                        style="text-decoration:none;display:flex;align-items:center;padding:16px 20px;border-bottom:1px solid #f3f4f6;transition:background 0.15s;cursor:pointer;"
                                        onmouseover="this.style.background='#f9fafb'"
                                        onmouseout="this.style.background='transparent'">
                                        <div
                                            style="background:#fff5eb;color:#f97316;border-radius:8px;width:40px;height:40px;min-width:40px;display:flex;align-items:center;justify-content:center;margin-right:16px;font-size:17px;flex-shrink:0;">
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div style="flex:1;min-width:0;overflow:hidden;">
                                            <div
                                                style="font-size:14px;font-weight:700;color:#111827;margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                                Lead: {{ $leadName ?: 'Customer' }}</div>
                                            <div
                                                style="font-size:12px;color:#6b7280;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                                {{ $fromRoute }} &rarr; {{ $toRoute }}</div>
                                        </div>
                                        <div style="flex-shrink:0;min-width:90px;text-align:right;padding-left:12px;">
                                            <div style="font-size:12px;font-weight:700;color:#10b981;">New Lead</div>
                                            <span
                                                style="display:block;font-size:11px;font-weight:600;color:#f97316;margin-top:2px;">View
                                                lead →</span>
                                        </div>
                                    </a>
                                @else
                                    @php
                                        $ic = $iconColors[$postIndex % count($iconColors)];
                                        $postIndex++;
                                        $daysLeft = $item->expires_at
                                            ? round(now()->floatDiffInDays($item->expires_at, false))
                                            : null;
                                        $isExpiringSoon = $daysLeft !== null && $daysLeft <= 5;
                                        $status = $item->sponsored_status ?? 'published';
                                    @endphp
                                    <a href="{{ route('company.sponsored-posts.index') }}" class="addon-item addon-item-link"
                                        style="text-decoration:none;display:flex;align-items:center;padding:16px 20px;border-bottom:1px solid #f3f4f6;transition:background 0.15s;cursor:pointer;"
                                        onmouseover="this.style.background='#f9fafb'"
                                        onmouseout="this.style.background='transparent'">
                                        <div
                                            style="background:{{ $ic['bg'] }};color:{{ $ic['color'] }};border-radius:8px;width:40px;height:40px;min-width:40px;display:flex;align-items:center;justify-content:center;margin-right:16px;font-size:17px;flex-shrink:0;">
                                            <i class="fa {{ $ic['icon'] }}"></i>
                                        </div>
                                        <div style="flex:1;min-width:0;overflow:hidden;">
                                            <div
                                                style="font-size:14px;font-weight:700;color:#111827;margin-bottom:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                                Sponsored Blog Subscription</div>
                                            <div
                                                style="font-size:12px;color:#6b7280;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                                {{ Str::limit($item->title, 38) }}</div>
                                        </div>
                                        <div style="flex-shrink:0;min-width:90px;text-align:right;padding-left:12px;">
                                            @if ($status === 'rejected')
                                                <div style="font-size:12px;font-weight:700;color:#ef4444;">Rejected</div>
                                                <span
                                                    style="display:block;font-size:11px;font-weight:600;color:#ef4444;margin-top:2px;">Renew
                                                    →</span>
                                            @elseif($status === 'pending')
                                                <div style="font-size:12px;font-weight:700;color:#d97706;">Pending</div>
                                                <span
                                                    style="display:block;font-size:11px;font-weight:600;color:#d97706;margin-top:2px;">Under
                                                    Review →</span>
                                            @elseif($status === 'awaiting_payment')
                                                <div style="font-size:12px;font-weight:700;color:#0284c7;">Awaiting Payment
                                                </div>
                                                <span
                                                    style="display:block;font-size:11px;font-weight:600;color:#0284c7;margin-top:2px;">Pay
                                                    Now →</span>
                                            @elseif($daysLeft !== null && $daysLeft > 0)
                                                <div
                                                    style="font-size:12px;font-weight:700;color:{{ $isExpiringSoon ? '#ef4444' : '#111827' }};">
                                                    {{ $daysLeft }} days left</div>
                                                <span
                                                    style="display:block;font-size:11px;font-weight:600;margin-top:2px;color:{{ $isExpiringSoon ? '#ef4444' : '#f97316' }};">{{ $isExpiringSoon ? 'Renew →' : 'Manage →' }}</span>
                                            @else
                                                <div style="font-size:12px;font-weight:700;color:#10b981;">Active</div>
                                                <span
                                                    style="display:block;font-size:11px;font-weight:600;color:#f97316;margin-top:2px;">View
                                                    live →</span>
                                            @endif
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <div class="p-4 text-center text-muted" style="font-size: 13px;">No active subscriptions or leads found.</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title"><i class="fa fa-flash text-muted"></i> Quick Actions</div>
                    </div>
                    <div class="panel-body p-0">
                        <div class="quick-actions-grid">
                            <a href="{{ route('company.mover_leads') }}" class="action-card">
                                <div class="action-icon ac-1"><i class="fa fa-line-chart"></i></div>
                                <div class="action-title">Get More Leads</div>
                                <div class="action-sub">Top up credits</div>
                            </a>
                            <a href="" class="action-card">
                                <div class="action-icon ac-2"><i class="fa fa-star-o"></i></div>
                                <div class="action-title">Boost Visibility</div>
                                <div class="action-sub">Add-Ons store</div>
                            </a>
                            <a href="{{ route('company.edit', $company->slug) }}" class="action-card">
                                <div class="action-icon ac-3"><i class="fa fa-user"></i></div>
                                <div class="action-title">Edit Profile</div>
                                <div class="action-sub">Update info</div>
                            </a>
                            <a href="{{ route('company.review', $company->slug) }}" class="action-card">
                                <div class="action-icon ac-4"><i class="fa fa-comment-o"></i></div>
                                <div class="action-title">View Reviews</div>
                                <div class="action-sub">{{ $total_reviews }} total</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        const reviewsData = @json($reviewsData);

        Highcharts.chart('container', {
            chart: {
                type: 'areaspline',
                backgroundColor: 'transparent',
                style: {
                    fontFamily: '"Outfit", sans-serif'
                }
            },
            credits: {
                enabled: false
            },
            title: {
                text: null
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                lineWidth: 0,
                tickWidth: 0,
                labels: {
                    style: {
                        color: '#6b7280',
                        fontSize: '11px',
                        fontWeight: '600'
                    }
                }
            },
            yAxis: {
                title: {
                    text: null
                },
                gridLineWidth: 0,
                labels: {
                    enabled: false
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, 'rgba(234, 88, 12, 0.2)'],
                            [1, 'rgba(234, 88, 12, 0)']
                        ]
                    },
                    lineWidth: 3,
                    lineColor: '#ea580c',
                    marker: {
                        radius: 5,
                        fillColor: '#ea580c',
                        lineWidth: 2,
                        lineColor: '#fff',
                        symbol: 'circle'
                    }
                }
            },
            series: [{
                name: 'Reviews',
                data: reviewsData,
                color: '#ea580c',
            }]
        });
    </script>
@endsection
