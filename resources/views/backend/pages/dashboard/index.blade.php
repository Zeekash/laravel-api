@extends('backend.layouts.master')

@section('title')
    Dashboard Page - Admin Panel
@endsection


@section('admin-content')
    @php
        $user = Auth::guard('admin')->user();
    @endphp

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

        :root {
            --navy: #0D1B38;
            --navy2: #122350;
            --navy3: #1A3166;
            --orange: #E8521A;
            --orange-h: #D44510;
            --green: #1A7A4A;
            --green-bg: #E8F7EF;
            --red: #C0392B;
            --red-bg: #FDECEA;
            --amber: #A86B00;
            --amber-bg: #FEF3E2;
            --blue: #2563A8;
            --blue-bg: #EEF3FB;
            --purple: #5B2D9E;
            --purple-bg: #F3EEFF;
            --white: #fff;
            --dark: #0D1B38;
            --mid: #3A4F6E;
            --muted: #7A8BA8;
            --border: #DDE3EE;
            --lgray: #F4F6FA;
            --mgray: #E8ECF4;
            --sidebar: 220px;
        }

        /* CONTENT AREA */
        .content {
            font-family: "Outfit", sans-serif;
            padding: 24px 28px;
            flex: 1
        }

        .screen {
            display: none
        }

        .screen.active {
            display: block
        }

        /* DASHBOARD SCREEN */
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
            color: var(--dark);
            letter-spacing: -.4px
        }

        .page-sub {
            font-size: 13px;
            color: var(--muted);
            margin-top: 3px
        }

        .page-header-actions {
            display: flex;
            gap: 8px
        }

        .btn-sm {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Sora', sans-serif;
            transition: .15s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
        }

        .btn-sm svg {
            width: 13px;
            height: 13px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none
        }

        .btn-primary {
            background: var(--orange);
            color: white
        }

        .btn-primary:hover {
            background: var(--orange-h)
        }

        .btn-outline {
            background: white;
            color: var(--navy2);
            border: 1.5px solid var(--border)
        }

        .btn-outline:hover {
            border-color: var(--navy2)
        }

        /* METRIC CARDS */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 20px
        }

        .metric-card {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 18px 20px;
            cursor: pointer;
            transition: all .18s;
            position: relative;
            overflow: hidden;
        }

        .metric-card:hover {
            border-color: var(--navy2);
            transform: translateY(-2px)
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 14px 14px 0 0
        }

        .metric-card.orange::before {
            background: var(--orange)
        }

        .metric-card.green::before {
            background: var(--green)
        }

        .metric-card.blue::before {
            background: var(--blue)
        }

        .metric-card.red::before {
            background: var(--red)
        }

        .metric-card.amber::before {
            background: var(--amber)
        }

        .metric-card.purple::before {
            background: var(--purple)
        }

        .metric-card.navy::before {
            background: var(--navy)
        }

        .mc-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: var(--muted);
            font-family: 'Sora', sans-serif;
            margin-bottom: 8px
        }

        .mc-val {
            font-family: 'Sora', sans-serif;
            font-size: 28px;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: -1px;
            line-height: 1
        }

        .mc-sub {
            font-size: 11px;
            color: var(--muted);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px
        }

        .mc-sub svg {
            width: 11px;
            height: 11px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none
        }

        .mc-sub.up {
            color: var(--green)
        }

        .mc-sub.down {
            color: var(--red)
        }

        .mc-icon {
            position: absolute;
            bottom: 14px;
            right: 14px;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: .12
        }

        .mc-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--dark);
            stroke-width: 1.5;
            fill: none
        }

        /* CHARTS ROW */
        .charts-row {
            display: grid;
            /* grid-template-columns: 2fr 1fr; */
            gap: 14px;
            margin-bottom: 20px
        }

        .chart-card {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 20px
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px
        }

        .chart-title {
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: var(--dark)
        }

        .chart-select {
            padding: 5px 24px 5px 10px;
            border: 1.5px solid var(--border);
            border-radius: 7px;
            font-size: 12px;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            background: white;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='%237A8BA8' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 7px center
        }

        .chart-area {
            height: 160px;
            position: relative
        }

        canvas {
            width: 100% !important;
            height: 100% !important
        }

        /* WIDGETS ROW */
        .widgets-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px
        }

        .widget-card {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            overflow: hidden
        }

        .widget-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px 12px;
            border-bottom: 1px solid var(--border)
        }

        .widget-title {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 7px
        }

        .widget-title svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none
        }

        .widget-link {
            font-size: 11px;
            color: var(--orange);
            font-weight: 700;
            cursor: pointer;
            font-family: 'Sora', sans-serif
        }

        .widget-table {
            width: 100%
        }

        .wt-row {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: .12s;
            gap: 10px
        }

        .wt-row:last-child {
            border-bottom: none
        }

        .wt-row:hover {
            background: var(--lgray)
        }

        .wt-avatar {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: var(--blue-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Sora', sans-serif;
            font-size: 11px;
            font-weight: 700;
            color: var(--blue);
            flex-shrink: 0
        }

        .wt-info {
            flex: 1;
            min-width: 0
        }

        .wt-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .wt-meta {
            font-size: 11px;
            color: var(--muted)
        }

        .wt-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
            font-family: 'Sora', sans-serif;
            white-space: nowrap;
            flex-shrink: 0
        }

        .wt-badge.green {
            background: var(--green-bg);
            color: var(--green)
        }

        .wt-badge.orange {
            background: #FFF0EB;
            color: var(--orange)
        }

        .wt-badge.amber {
            background: var(--amber-bg);
            color: var(--amber)
        }

        .wt-badge.red {
            background: var(--red-bg);
            color: var(--red)
        }

        .wt-badge.blue {
            background: var(--blue-bg);
            color: var(--blue)
        }

        /* AI validation badges */
        .ai-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            font-family: 'Sora', sans-serif
        }

        .ai-badge.validated {
            background: var(--green-bg);
            color: var(--green)
        }

        .ai-badge.failed {
            background: var(--red-bg);
            color: var(--red)
        }

        .ai-badge.pending {
            background: var(--amber-bg);
            color: var(--amber)
        }

        /* Expiring widget special */
        .expiring-row {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid var(--border);
            gap: 10px
        }

        .expiring-row:last-child {
            border-bottom: none
        }

        .er-info {
            flex: 1
        }

        .er-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--dark)
        }

        .er-type {
            font-size: 11px;
            color: var(--muted)
        }

        .er-days {
            font-family: 'Sora', sans-serif;
            font-size: 12px;
            font-weight: 700;
            margin-right: 8px;
            flex-shrink: 0
        }

        .er-days.red {
            color: var(--red)
        }

        .er-days.amber {
            color: var(--amber)
        }

        .btn-notify {
            padding: 5px 12px;
            background: var(--navy);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Sora', sans-serif;
            transition: .15s;
            flex-shrink: 0
        }

        .btn-notify:hover {
            background: var(--navy2)
        }

        .btn-notify.notified {
            background: var(--lgray);
            color: var(--muted);
            cursor: default
        }

        /* Toast */
        #toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--navy);
            color: white;
            border-radius: 10px;
            padding: 12px 18px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'Sora', sans-serif;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 9999;
            border: 1px solid rgba(255, 255, 255, .1);
            max-width: 320px;
            transform: translateY(80px);
            opacity: 0;
            transition: all .25s
        }

        #toast.show {
            transform: translateY(0);
            opacity: 1
        }

        #toast svg {
            width: 15px;
            height: 15px;
            stroke: var(--orange);
            stroke-width: 2.5;
            fill: none;
            flex-shrink: 0
        }
        .footer-area {
            background: none !important;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .metrics-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .charts-row {
                grid-template-columns: 1fr
            }

            .widgets-row {
                grid-template-columns: 1fr
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start
            }
        }
    </style>

    @if ($user->can('dashboard.view'))
        <div class="content">
            <!-- DASHBOARD SCREEN -->
            <div class="screen active" id="screen-dashboard">
                <div class="page-header">
                    <div>
                        <div class="page-title">Admin Dashboard</div>
                        <div class="page-sub">Live platform overview — {{ now()->format('F j, Y') }}</div>
                    </div>
                    <div class="page-header-actions">
                        <button class="btn-sm btn-outline" onclick="window.location.reload()">
                            <svg viewBox="0 0 24 24">
                                <polyline points="23 4 23 10 17 10" />
                                <polyline points="1 20 1 14 7 14" />
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>

                <!-- METRIC CARDS -->
                <div class="metrics-grid">
                    <div class="metric-card orange" onclick="window.location.href='{{ route('admin.users.index') }}'">
                        <div class="mc-label">Total Reviews</div>
                        <div class="mc-val">{{ $total_reviews }}</div>
                        <div class="mc-sub up">
                            <svg viewBox="0 0 24 24">
                                <polyline points="18 15 12 9 6 15" />
                            </svg>
                            All reviews
                        </div>
                        <div class="mc-icon">
                            <svg viewBox="0 0 24 24">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="metric-card blue" onclick="window.location.href='{{ route('admin.companies.index') }}'">
                        <div class="mc-label">Total Companies</div>
                        <div class="mc-val">{{ $total_companies }}</div>
                        <div class="mc-sub up">
                            <svg viewBox="0 0 24 24">
                                <polyline points="18 15 12 9 6 15" />
                            </svg>
                            All companies
                        </div>
                        <div class="mc-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>
                        </div>
                    </div>
                    @if ($user->can('cost-estimate.view'))
                        <div class="metric-card green"
                            onclick="window.location.href='{{ route('admin.cost-estimator.index') }}'">
                            <div class="mc-label">Total Leads</div>
                            <div class="mc-val">{{ $totalLeads }}</div>
                            <div class="mc-sub up">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="18 15 12 9 6 15" />
                                </svg>
                                Cost estimation leads
                            </div>
                            <div class="mc-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="metric-card navy">
                        <div class="mc-label">Admin Users</div>
                        <div class="mc-val">{{ $total_admin }}</div>
                        <div class="mc-sub up">
                            <svg viewBox="0 0 24 24">
                                <polyline points="18 15 12 9 6 15" />
                            </svg>
                            Total admins
                        </div>
                        <div class="mc-icon">
                            <svg viewBox="0 0 24 24">
                                <line x1="12" y1="1" x2="12" y2="23" />
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- CHARTS ROW -->
                <div class="charts-row">
                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">Platform Activity</div>
                            <form id="year-form" action="{{ route('admin.dashboard') }}" method="GET"
                                class="d-flex align-items-center" style="gap:8px;">
                                <input type="hidden" name="companies_year" value="{{ $companiesYear }}">
                                <input type="hidden" name="lead_year" value="{{ $leadYear }}">
                                <select id="year-select" name="year" class="chart-select"
                                    onchange="document.getElementById('year-form').submit()">
                                    @foreach ($years as $yr)
                                        <option value="{{ $yr }}" {{ $yr == $year ? 'selected' : '' }}>
                                            {{ $yr }}</option>
                                    @endforeach
                                    @if ($years->isEmpty())
                                        <option value="{{ $year }}" selected>{{ $year }}</option>
                                    @endif
                                </select>
                            </form>
                        </div>
                        <div class="chart-area">
                            <canvas id="activityChart"></canvas>
                        </div>
                    </div>
                    <!-- <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">Add-On Revenue</div>
                            <select class="chart-select">
                                <option>2026</option>
                                <option>2025</option>
                            </select>
                        </div>
                        <div class="chart-area">
                            <canvas id="revenueChart" width="493" height="160"
                                style="display: block; box-sizing: border-box; height: 160px; width: 493px;"></canvas>
                        </div>
                    </div> -->
                </div>

                <!-- WIDGETS ROW -->
                <div class="widgets-row">
                    <div class="widget-card">
                        <div class="widget-header">
                            <div class="widget-title" style="color:var(--red)">
                                <svg viewBox="0 0 24 24" style="stroke:var(--red)">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                Pending Approvals
                            </div>
                            <span class="widget-link" onclick="t('→ B3 Pending Registrations')">View All →</span>
                        </div>
                        <div class="widget-table">
                            @forelse ($pendingApprovals as $company)
                                @php
                                    $initials = strtoupper(substr($company->company_name ?? 'C', 0, 2));
                                    $daysAgo = optional($company->created_at)->diffForHumans();
                                    $stateName = $company->state ? $company->state->name : 'Unknown State';
                                    
                                    if ($company->is_email_verified == 1) {
                                        $badgeClass = 'validated';
                                        $badgeText = '✓ Validated';
                                    } else {
                                        $badgeClass = 'pending';
                                        $badgeText = '⏳ Pending';
                                    }
                                @endphp
                                <div class="wt-row" onclick="window.location.href='{{ route('admin.companies.index') }}'">
                                    <div class="wt-avatar" style="background:#FFF0EB;color:var(--orange)">{{ $initials }}</div>
                                    <div class="wt-info">
                                        <div class="wt-name">{{ $company->company_name }}</div>
                                        <div class="wt-meta">{{ $stateName }} · Submitted {{ $daysAgo }}</div>
                                    </div>
                                    <div class="ai-badge {{ $badgeClass }}">{{ $badgeText }}</div>
                                </div>
                            @empty
                                <div class="wt-row">
                                    <div class="wt-info" style="text-align: center; color: var(--muted);">No pending approvals.</div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- <div class="widget-card">
                        <div class="widget-header">
                            <div class="widget-title" style="color:var(--amber)">
                                <svg viewBox="0 0 24 24" style="stroke:var(--amber)">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                Add-Ons Expiring Soon
                            </div>
                            <span class="widget-link" onclick="t('→ B16 Add-Ons Dashboard')">View All →</span>
                        </div>
                        <div>
                            <div class="expiring-row">
                                <div class="er-info">
                                    <div class="er-name">NXT Level Moving LLC</div>
                                    <div class="er-type">Featured Listing — Homepage</div>
                                </div>
                                <div class="er-days red">2 days</div>
                                <button class="btn-notify"
                                    onclick="notifyAddon(this,'NXT Level Moving LLC')">Notify</button>
                            </div>
                            <div class="expiring-row">
                                <div class="er-info">
                                    <div class="er-name">Value Added Moving</div>
                                    <div class="er-type">Competitor Ad — Profile Page</div>
                                </div>
                                <div class="er-days red">3 days</div>
                                <button class="btn-notify"
                                    onclick="notifyAddon(this,'Value Added Moving')">Notify</button>
                            </div>
                            <div class="expiring-row">
                                <div class="er-info">
                                    <div class="er-name">Black Tie Moving Services</div>
                                    <div class="er-type">Sponsored Blog Post</div>
                                </div>
                                <div class="er-days amber">5 days</div>
                                <button class="btn-notify"
                                    onclick="notifyAddon(this,'Black Tie Moving Services')">Notify</button>
                            </div>
                            <div class="expiring-row">
                                <div class="er-info">
                                    <div class="er-name">Budget Relo</div>
                                    <div class="er-type">Featured Listing — Resource Page</div>
                                </div>
                                <div class="er-days amber">7 days</div>
                                <button class="btn-notify" onclick="notifyAddon(this,'Budget Relo')">Notify</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- Latest Reviews -->
                    <!-- <div class="widget-card">
                        <div class="widget-header">
                            <div class="widget-title">
                                <svg viewBox="0 0 24 24">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                Latest Reviews
                            </div>
                            <span class="widget-link"
                                onclick="window.location.href='{{ route('admin.users.index') }}'">View All →</span>
                        </div>
                        <div class="widget-table">
                            @forelse ($latestReviews as $review)
                                <div class="wt-row" onclick="window.location.href='#'">
                                    <div class="wt-avatar">{{ strtoupper(substr($review->name ?? 'A', 0, 2)) }}</div>
                                    <div class="wt-info">
                                        <div class="wt-name">{{ $review->name }}</div>
                                        <div class="wt-meta">{{ optional($review->created_at)->format('F j, Y') }}</div>
                                    </div>
                                    <div class="wt-badge green">Active</div>
                                </div>
                            @empty
                                <div class="wt-row">
                                    <div class="wt-info" style="text-align: center; color: var(--muted);">No reviews yet.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div> -->

                    <!-- Latest Companies -->
                    <div class="widget-card">
                        <div class="widget-header">
                            <div class="widget-title">
                                <svg viewBox="0 0 24 24">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                </svg>
                                Latest Companies
                            </div>
                            <span class="widget-link"
                                onclick="window.location.href='{{ route('admin.companies.index') }}'">View All →</span>
                        </div>
                        <div class="widget-table">
                            @forelse ($latestCompanies as $company)
                                @php
                                    if ($company->is_email_verified == 1) {
                                        $badgeClass = 'validated';
                                        $badgeText = '✓ Validated';
                                    } else {
                                        $badgeClass = 'pending';
                                        $badgeText = '⏳ Pending';
                                    }
                                @endphp
                                <div class="wt-row" onclick="window.location.href='#'">
                                    <div class="wt-avatar">{{ strtoupper(substr($company->company_name ?? 'A', 0, 2)) }}
                                    </div>
                                    <div class="wt-info">
                                        <div class="wt-name">{{ $company->company_name }}</div>
                                        <div class="wt-meta">{{ optional($company->created_at)->format('F j, Y') }}</div>
                                    </div>
                                    <div class="ai-badge {{ $badgeClass }}">{{ $badgeText }}</div>
                                </div>
                            @empty
                                <div class="wt-row">
                                    <div class="wt-info" style="text-align: center; color: var(--muted);">No companies
                                        yet.</div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="widget-card">
                        <div class="widget-header">
                            <div class="widget-title" style="color:var(--green)">
                                <svg viewBox="0 0 24 24" style="stroke:var(--green)">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                                Latest Cost Estimation Leads
                            </div>

                            <span class="widget-link"
                                onclick="window.location.href='{{ route('admin.cost-estimator.index') }}'">
                                View All →
                            </span>
                        </div>

                        <div class="widget-table">
                            @forelse ($latestLeads as $lead)
                                @php
                                    $initials = strtoupper(substr($lead->name ?? 'L', 0, 2));

                                    $daysAgo = optional($lead->created_at)->diffForHumans();

                                    $badgeClass = match (rand(1, 3)) {
                                        1 => 'validated',
                                        2 => 'pending',
                                        default => 'failed',
                                    };

                                    $badgeText = match ($badgeClass) {
                                        'validated' => '✓ Verified',
                                        'pending' => '⏳ Pending',
                                        default => '✗ Review',
                                    };
                                @endphp

                                <div class="wt-row"
                                    onclick="window.location.href='{{ route('admin.cost-estimator.index') }}'">

                                    <div class="wt-avatar" style="background:var(--green-bg);color:var(--green)">
                                        {{ $initials }}
                                    </div>

                                    <div class="wt-info">
                                        <div class="wt-name">
                                            {{ $lead->name }}
                                        </div>

                                        <div class="wt-meta">
                                            {{ $lead->email }} · {{ $daysAgo }}
                                        </div>
                                    </div>

                                    <div class="ai-badge {{ $badgeClass }}">
                                        {{ $badgeText }}
                                    </div>
                                </div>

                            @empty

                                <div class="wt-row">
                                    <div class="wt-info text-center">
                                        <div class="wt-meta">
                                            No leads yet.
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast -->
        <div id="toast">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <span id="tmsg"></span>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script type="text/javascript">
            function t(msg) {
                const el = document.getElementById('toast');
                document.getElementById('tmsg').textContent = msg;
                el.classList.add('show');
                clearTimeout(el._to);
                el._to = setTimeout(() => el.classList.remove('show'), 2600);
            }

            /*
            |--------------------------------------------------------------------------
            | Same data source as old dashboard
            |--------------------------------------------------------------------------
            */
            var reviewsData = @json(array_values($reviewsData ?? array_fill(0, 12, 0)));
            var companiesData = @json(array_values($companiesData ?? array_fill(0, 12, 0)));
            var leadData = @json(array_values($leadChartData ?? array_fill(0, 12, 0)));

            reviewsData = reviewsData.length ? reviewsData : Array(12).fill(0);
            companiesData = companiesData.length ? companiesData : Array(12).fill(0);
            leadData = leadData.length ? leadData : Array(12).fill(0);

            console.log('Reviews chart data:', reviewsData);
            console.log('Leads chart data:', leadData);
            console.log('Companies chart data:', companiesData);

            var companiesYearSelect = document.getElementById('companies-year-select');
            var companiesYearForm = document.getElementById('companies-year-form');

            function initCharts() {
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                const activityCanvas = document.getElementById('activityChart');

                if (activityCanvas) {
                    const ctx1 = activityCanvas.getContext('2d');

                    new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                    label: 'Reviews',
                                    data: reviewsData,
                                    borderColor: '#123269',
                                    backgroundColor: 'rgba(18, 50, 105, .08)',
                                    tension: .4,
                                    pointRadius: 3,
                                    pointBackgroundColor: '#123269',
                                    fill: true
                                },
                                {
                                    label: 'Leads',
                                    data: leadData,
                                    borderColor: '#E8521A',
                                    backgroundColor: 'rgba(232, 82, 26, .08)',
                                    tension: .4,
                                    pointRadius: 3,
                                    pointBackgroundColor: '#E8521A',
                                    fill: true
                                },
                                {
                                    label: 'Companies',
                                    data: companiesData,
                                    borderColor: '#1A7A4A',
                                    backgroundColor: 'rgba(26, 122, 74, .06)',
                                    tension: .4,
                                    pointRadius: 3,
                                    pointBackgroundColor: '#1A7A4A',
                                    fill: true
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                mode: 'nearest',

                                intersect: false
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {
                                        font: {
                                            family: 'Sora',
                                            size: 11
                                        },
                                        usePointStyle: true,
                                        boxWidth: 8
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.dataset.label + ': ' + context.parsed.y;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        precision: 0,
                                        font: {
                                            family: 'Sora',
                                            size: 10
                                        },
                                        color: '#7A8BA8'
                                    },
                                    grid: {
                                        color: 'rgba(0,0,0,.04)'
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            family: 'Sora',
                                            size: 10
                                        },
                                        color: '#7A8BA8'
                                    },
                                    grid: {
                                        display: false
                                    }
                                }
                            }
                        }
                    });
                }


                const revenueCanvas = document.getElementById('revenueChart');

                if (revenueCanvas) {
                    const ctx2 = revenueCanvas.getContext('2d');

                    new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Revenue ($)',
                                data: [1200, 1800, 2100, 1650, 2400, 2800, 2550, 3100, 2900, 3400, 3800, 3600],
                                backgroundColor: 'rgba(18,50,105,.75)',
                                borderRadius: 5
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: '#0D1B38',
                                    titleColor: '#ffffff',
                                    bodyColor: '#ffffff',
                                    padding: 12,
                                    cornerRadius: 8,
                                    callbacks: {
                                        label: function(context) {
                                            return 'Revenue: $' + context.parsed.y.toLocaleString();
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(0,0,0,.04)'
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Sora',
                                            size: 10
                                        },
                                        color: '#7A8BA8',
                                        callback: function(value) {
                                            return '$' + value.toLocaleString();
                                        }
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Sora',
                                            size: 10
                                        },
                                        color: '#7A8BA8'
                                    }
                                }
                            }
                        }
                    });
                }

            } // <-- initCharts function END

            initCharts();

            if (companiesYearSelect && companiesYearForm) {
                companiesYearSelect.addEventListener('change', function() {
                    companiesYearForm.submit();
                });
            }

            if (window.history.replaceState) {
                const url = new URL(window.location);
                url.search = '';
                window.history.replaceState({}, document.title, url.toString());
            }
        </script>
    @endif
@endsection
