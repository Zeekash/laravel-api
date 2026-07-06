@extends('company.layouts.master')
@section('title', 'Company Reviews')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #E8521A;
            --orange-hover: #D44510;
            --navy: #0D1B38;
            --navy-light: #1A2949;
            --gray-bg: #F8F9FD;
            --border-color: #E5E7EB;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
            --font-main: 'DM Sans', sans-serif;
            --font-head: 'Sora', sans-serif;
            --star-color: #F59E0B;
        }

        .main-content-inner {
            background-color: var(--gray-bg);
            padding: 0;
            font-family: var(--font-main);
            color: var(--text-dark);
            min-height: 100vh;
        }

        .page-title-area {
            display: none; 
        }

        /* Top Header */
        .reviews-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 10px 32px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .reviews-title {
            font-family: var(--font-head);
            font-size: 18px;
            font-weight: 800;
            color: var(--navy);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .company-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 7px 4px 6px;
            border-radius: 10px;
            border: 1.5px solid var(--border);
            cursor: pointer;
        }

        .company-initials {
            width: 32px;
            height: 32px;
            background: var(--navy);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            font-family: var(--font-head);
            font-weight: 700;
            font-size: 13px;
        }

        .company-name {
            font-weight: 700;
            font-size: 14px;
            color: var(--navy);
            font-family: var(--font-head);
        }

        /* Container */
        .reviews-container {
            margin: 0 auto;
            padding: 32px;
        }

        /* Stats Card */
        .stats-card {
            background: var(--navy);
            border-radius: 16px;
            padding: 32px;
            display: flex;
            align-items: center;
            color: white;
            margin-bottom: 24px;
            gap: 40px;
            position: relative;
            overflow: hidden;
        }

        .stats-overall {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 120px;
        }

        .stats-rating {
            font-family: var(--font-head);
            font-size: 56px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stats-stars {
            color: var(--star-color);
            font-size: 16px;
            margin-bottom: 8px;
        }
        .fas.fa-star {
    font-style: normal !important;
}

        .stats-label {
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }

        .stats-bars {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .stat-bar-row {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
            color: rgba(255,255,255,0.7);
        }

        .stat-bar-track {
            flex: 1;
            height: 6px;
            background: rgba(255,255,255,0.1);
            border-radius: 3px;
            overflow: hidden;
        }

        .stat-bar-fill {
            height: 100%;
            background: var(--orange);
            border-radius: 3px;
        }

        .stat-bar-count {
            min-width: 30px;
            text-align: right;
        }

        .stats-total {
            min-width: 120px;
            text-align: center;
            border-left: 1px solid rgba(255,255,255,0.1);
            padding-left: 40px;
        }

        .stats-total-num {
            font-family: var(--font-head);
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .stats-total-label {
            font-size: 12px;
            color: rgba(255,255,255,0.6);
            margin-bottom: 8px;
        }

        .stats-total-trend {
            font-size: 12px;
            color: #10B981;
        }

        /* Filter Bar */
        .filter-bar {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }

        .filter-select {
            padding: 10px 36px 10px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: white;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-dark);
            font-family: var(--font-main);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%236B7280' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            cursor: pointer;
            outline: none;
        }

        .filter-select:focus {
            border-color: var(--orange);
        }

        /* Review Card */
        .review-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 16px;
            transition: 0.2s;
        }

        .review-card.flagged {
            background: #FFFBEB;
            border-color: #FEF08A;
        }

        .flagged-banner {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #B45309;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            background: var(--navy);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-family: var(--font-head);
            font-size: 14px;
        }

        .review-card.flagged .reviewer-avatar {
            background: #B45309;
        }

        .reviewer-name {
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
            margin-bottom: 2px;
        }

        .review-date {
            font-size: 12px;
            color: var(--text-muted);
        }

        .review-meta {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .review-stars .fa-star {
            color: var(--star-color);
            font-size: 14px !important;

        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .status-badge.live {
            background: #ECFDF5;
            color: #059669;
        }

        .status-badge.pending {
            background: #FFFBEB;
            color: #D97706;
        }

        .status-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .review-subject {
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
            margin-bottom: 8px;
            font-family: var(--font-main);
        }

        .review-body {
            font-size: 14px;
            color: var(--text-dark);
            line-height: 1.6;
            margin-bottom: 16px;
        }

        /* Owner Reply Block */
        .owner-reply-block {
            background: #F9FAFB;
            border-left: 3px solid var(--orange);
            padding: 16px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 16px;
        }

        .owner-reply-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .owner-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .owner-avatar {
            width: 24px;
            height: 24px;
            background: var(--orange);
            color: white;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 10px;
            font-family: var(--font-head);
        }

        .owner-name {
            font-weight: 700;
            font-size: 13px;
            color: var(--navy);
        }

        .owner-reply-date {
            font-size: 11px;
            color: var(--text-muted);
        }

        .owner-reply-text {
            font-size: 13px;
            color: var(--text-dark);
            line-height: 1.5;
        }

        /* Action Buttons */
        .review-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-action {
            padding: 6px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            border: none;
            transition: 0.2s;
        }

        .btn-reply {
            background: var(--orange);
            color: white;
        }

        .btn-reply:hover {
            background: var(--orange-hover);
        }

        .btn-flag {
            background: #FFF7ED;
            color: #C2410C;
            border: 1px solid #FFEDD5;
        }

        .btn-flag:hover {
            background: #FFEDD5;
        }

        .btn-edit {
            background: #F1F5F9;
            color: #475569;
            border: 1px solid #E2E8F0;
        }

        .btn-edit:hover {
            background: #E2E8F0;
        }

        .action-note {
            font-size: 11px;
            color: var(--text-muted);
        }

        /* Inline Reply Form */
        .inline-reply-form {
            display: none;
            margin-top: 16px;
            background: #F9FAFB;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .inline-reply-form.active {
            display: block;
        }

        .reply-textarea {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px;
            font-family: var(--font-main);
            font-size: 14px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 12px;
            outline: none;
        }

        .reply-textarea:focus {
            border-color: var(--orange);
        }

        .reply-form-actions {
            display: flex;
            gap: 12px;
        }

        .btn-cancel {
            background: white;
            border: 1px solid var(--border-color);
            color: var(--text-dark);
        }
        
        .btn-cancel:hover {
            background: #F3F4F6;
        }

        /* Modal Styles */
        .modal-header-custom {
            border-bottom: none;
            padding-bottom: 0;
        }

        .modal-title-custom {
            font-family: var(--font-head);
            font-weight: 800;
            color: var(--navy);
            font-size: 18px;
        }

        .modal-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .modal-body-custom {
            padding-top: 16px;
        }

        .flag-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            font-family: var(--font-main);
            color: var(--text-dark);
            margin-bottom: 16px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%236B7280' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            outline: none;
        }

        .flag-select:focus {
            border-color: var(--orange);
        }

        .flag-warning {
            background: #FFFBEB;
            border: 1px solid #FEF08A;
            color: #B45309;
            padding: 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .modal-footer-custom {
            border-top: none;
            padding-top: 0;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

    </style>
@endsection

@section('content')
    @php
        $totalReviews = count($data);
        $totalRating = 0;
        $starCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

        foreach($data as $r) {
            $rating = (int) $r->overall_rating;
            if($rating > 5) $rating = 5;
            if($rating < 1) $rating = 1;
            $totalRating += $rating;
            $starCounts[$rating]++;
        }

        $averageRating = $totalReviews > 0 ? number_format($totalRating / $totalReviews, 1) : '0.0';
    @endphp

    <!-- Top Header -->
    <div class="reviews-header">
        <h1 class="reviews-title">Reviews Management</h1>
        <div class="company-badge">
            <div class="company-initials">{{ strtoupper(substr($company->company_name ?? 'C', 0, 2)) }}</div>
            <div class="company-name">{{ $company->company_name ?? 'Company Name' }}</div>
        </div>
    </div>

    <div class="reviews-container">
        @include('company.layouts.partials.messages')

        <!-- Stats Card -->
        <div class="stats-card">
            <div class="stats-overall">
                <div class="stats-rating">{{ $averageRating }}</div>
                <div class="stats-stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($averageRating))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="fas fa-star" style="color: rgba(255,255,255,0.2)"></i>
                        @endif
                    @endfor
                </div>
                <div class="stats-label">Overall Rating</div>
            </div>

            <div class="stats-bars">
                @for($i = 5; $i >= 1; $i--)
                    @php 
                        $count = $starCounts[$i];
                        $percent = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                    @endphp
                    <div class="stat-bar-row">
                        <div>{{ $i }}<i class="fas fa-star" style="font-size: 8px; margin-left:2px;"></i></div>
                        <div class="stat-bar-track">
                            <div class="stat-bar-fill" style="width: {{ $percent }}%"></div>
                        </div>
                        <div class="stat-bar-count">{{ $count }}</div>
                    </div>
                @endfor
            </div>

            <div class="stats-total">
                <div class="stats-total-num">{{ $totalReviews }}</div>
                <div class="stats-total-label">Total Reviews</div>
                @php
                    $thisMonthCount = $data->where('created_at', '>=', now()->startOfMonth())->count();
                @endphp
                <div class="stats-total-trend">
                    @if($thisMonthCount > 0)
                        &uarr; {{ $thisMonthCount }} this month
                    @else
                        0 this month
                    @endif
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <select class="filter-select" id="filter-rating">
                <option value="all">All Ratings</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
            <select class="filter-select" id="filter-status">
                <option value="all">All Statuses</option>
                <option value="live">Live</option>
                <option value="pending">Pending</option>
            </select>
            <select class="filter-select" id="filter-replied">
                <option value="all">All</option>
                <option value="replied">Replied</option>
                <option value="not-replied">Not Replied</option>
            </select>
            <select class="filter-select" id="filter-time">
                <option value="all">All Time</option>
                <option value="30">Last 30 Days</option>
                <option value="90">Last 90 Days</option>
            </select>
        </div>

        <!-- Reviews List -->
        <div id="reviews-list">
            @forelse ($data as $review)
                @php
                    $isFlagged = !empty($review->flag_reason);
                    $statusClass = $isFlagged ? 'pending' : 'live';
                    $statusText = $isFlagged ? 'Pending' : 'Live';
                @endphp
                <div class="review-card {{ $isFlagged ? 'flagged' : '' }}" data-rating="{{ $review->overall_rating }}" data-status="{{ $statusClass }}" data-replied="{{ $review->respond ? 'replied' : 'not-replied' }}" data-date="{{ \Carbon\Carbon::parse($review->created_at)->format('Y-m-d') }}">
                    
                    @if($isFlagged)
                        <div class="flagged-banner">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            Flagged for removal - Your flag is under admin review. Review remains live until admin acts.
                        </div>
                    @endif

                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                {{ strtoupper(substr($review->name ?? 'U', 0, 2)) }}
                            </div>
                            <div>
                                <div class="reviewer-name">{{ $review->name ?? 'Anonymous User' }}</div>
                                <div class="review-date">{{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</div>
                            </div>
                        </div>
                        <div class="review-meta">
                            <div class="review-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->overall_rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="fas fa-star" style="color: #E5E7EB;"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="status-badge {{ $statusClass }}">
                                {{ $statusText }}
                            </div>
                        </div>
                    </div>

                    <div class="review-subject">{{ $review->review_subject }}</div>
                    <div class="review-body">{{ $review->your_review ?? 'No detailed description provided.' }}</div>

                    @if ($review->respond)
                        <!-- Existing Reply -->
                        <div class="owner-reply-block">
                            <div class="owner-reply-header">
                                <div class="owner-info">
                                    <div class="owner-avatar">{{ strtoupper(substr($company->company_name ?? 'C', 0, 2)) }}</div>
                                    <div class="owner-name">{{ $company->company_name ?? 'Company' }} (Owner reply)</div>
                                </div>
                                <div class="owner-reply-date">{{ \Carbon\Carbon::parse($review->updated_at)->format('M d, Y') }}</div>
                            </div>
                            <div class="owner-reply-text">
                                {{ $review->respond }}
                            </div>
                        </div>

                        <div class="review-actions">
                            <button type="button" class="btn-action btn-edit" onclick="toggleReplyForm({{ $review->id }})">Edit Reply</button>
                            <button type="button" class="btn-action btn-flag" onclick="openFlagModal({{ $review->id }}, '{{ addslashes($review->name) }}')">Flag for Removal</button>
                        </div>
                    @else
                        <!-- No Reply Yet -->
                        <div class="review-actions">
                            @if(!$isFlagged)
                                <button type="button" class="btn-action btn-reply" onclick="toggleReplyForm({{ $review->id }})">Reply</button>
                                <button type="button" class="btn-action btn-flag" onclick="openFlagModal({{ $review->id }}, '{{ addslashes($review->name) }}')">Flag for Removal</button>
                                <span class="action-note">- You can reply once per review</span>
                            @else
                                <button type="button" class="btn-action" style="background:#E5E7EB;color:#9CA3AF;cursor:not-allowed;" disabled>Flag Submitted</button>
                                <span class="action-note">Admin reviewing — cannot be removed by company</span>
                            @endif
                        </div>
                    @endif

                    <!-- Inline Reply Form -->
                    <div class="inline-reply-form" id="reply-form-{{ $review->id }}">
                        <form action="{{ route('company.review-respond.post', $review->id) }}" method="POST">
                            @csrf
                            <textarea name="respond" class="reply-textarea" placeholder="Write your public reply here...">{{ $review->respond ?? '' }}</textarea>
                            <div class="reply-form-actions">
                                <button type="submit" class="btn-action btn-reply">Submit reply</button>
                                <button type="button" class="btn-action btn-cancel" onclick="toggleReplyForm({{ $review->id }})">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            @empty
                <div class="text-center py-5" style="color: var(--text-muted)">
                    No reviews found.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Flag Modal -->
    <div class="modal fade" id="flagModal" tabindex="-1" aria-labelledby="flagModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                <form action="" method="POST" id="flag-form">
                    @csrf
                    
                    <div class="modal-header modal-header-custom">
                        <div>
                            <h5 class="modal-title-custom" id="flagModalLabel">Flag Review for Removal — <span id="flag-reviewer-name"></span></h5>
                            <div class="modal-subtitle">Select a reason for flagging this review. It will remain live until admin reviews your flag.</div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="align-self: flex-start;"></button>
                    </div>
                    
                    <div class="modal-body modal-body-custom">
                        <select name="flag_reason" class="flag-select" required>
                            <option value="">Select a reason...</option>
                            <option value="Fake review — we have no record of this customer">Fake review — we have no record of this customer</option>
                            <option value="Competitor sabotage">Competitor sabotage</option>
                            <option value="Incorrect company — meant for another company">Incorrect company — meant for another company</option>
                            <option value="Harassment or abusive language">Harassment or abusive language</option>
                            <option value="Inaccurate or misleading information">Inaccurate or misleading information</option>
                            <option value="Other">Other</option>
                        </select>

                        <div class="flag-warning">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            Review stays live until admin acts. You cannot remove it directly.
                        </div>
                    </div>
                    
                    <div class="modal-footer modal-footer-custom">
                        <button type="button" class="btn-action btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-action" style="background: #D97706; color: white;">Submit Flag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function toggleReplyForm(reviewId) {
        const formBlock = document.getElementById('reply-form-' + reviewId);
        if(formBlock) formBlock.classList.toggle('active');
    }

    var flagBaseUrl = '{{ url("/company/review") }}';

    function openFlagModal(reviewId, reviewerName) {
        document.getElementById('flag-reviewer-name').textContent = reviewerName || 'Anonymous';
        document.getElementById('flag-form').action = flagBaseUrl + '/' + reviewId + '/flag';
        var myModal = new bootstrap.Modal(document.getElementById('flagModal'), { keyboard: false });
        myModal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const ratingFilter  = document.getElementById('filter-rating');
        const statusFilter  = document.getElementById('filter-status');
        const repliedFilter = document.getElementById('filter-replied');
        const timeFilter    = document.getElementById('filter-time');
        const cards         = document.querySelectorAll('.review-card');

        // --- Stats elements ---
        const statRatingEl  = document.querySelector('.stats-rating');
        const statTotalEl   = document.querySelector('.stats-total-num');
        const statBarFills  = document.querySelectorAll('.stat-bar-fill');   // 5→1
        const statBarCounts = document.querySelectorAll('.stat-bar-count');  // 5→1
        const statStars     = document.querySelectorAll('.stats-stars .fa-star');

        function recalcStats(visibleCards) {
            let total = 0, sum = 0;
            const counts = {5:0,4:0,3:0,2:0,1:0};
            visibleCards.forEach(card => {
                const r = Math.min(5, Math.max(1, Math.floor(parseFloat(card.getAttribute('data-rating')))));
                counts[r]++;
                sum += r;
                total++;
            });
            const avg = total > 0 ? (sum / total) : 0;

            if(statRatingEl) statRatingEl.textContent = avg.toFixed(1);
            if(statTotalEl)  statTotalEl.textContent  = total;

            // Update bars (order: 5,4,3,2,1)
            [5,4,3,2,1].forEach((star, idx) => {
                const pct = total > 0 ? (counts[star] / total * 100) : 0;
                if(statBarFills[idx])  statBarFills[idx].style.width  = pct + '%';
                if(statBarCounts[idx]) statBarCounts[idx].textContent = counts[star];
            });

            // Update header stars
            if(statStars) {
                const rounded = Math.round(avg);
                statStars.forEach((star, i) => {
                    star.style.color = (i < rounded) ? '' : 'rgba(255,255,255,0.2)';
                });
            }
        }

        function filterReviews() {
            const selRating  = ratingFilter  ? ratingFilter.value  : 'all';
            const selStatus  = statusFilter  ? statusFilter.value  : 'all';
            const selReplied = repliedFilter ? repliedFilter.value : 'all';
            const selTimeStr = timeFilter    ? timeFilter.value : 'all';
            const now        = new Date();

            const visible = [];
            cards.forEach(card => {
                const rating  = card.getAttribute('data-rating');
                const status  = card.getAttribute('data-status');
                const replied = card.getAttribute('data-replied');
                const dateStr = card.getAttribute('data-date');

                let ok = true;
                if(selRating !== 'all' && Math.floor(rating) != selRating) ok = false;
                if(selStatus !== 'all' && status !== selStatus)             ok = false;
                if(selReplied !== 'all' && replied !== selReplied)          ok = false;
                
                if(selTimeStr !== 'all') {
                    const selTime = parseInt(selTimeStr);
                    if(!isNaN(selTime)) {
                        const reviewDate = new Date(dateStr);
                        if(isNaN(reviewDate.getTime())) {
                            ok = false; // hide invalid dates when filtering by time
                        } else {
                            const diffDays = (now - reviewDate) / (1000 * 60 * 60 * 24);
                            if(diffDays > selTime) {
                                ok = false;
                            }
                        }
                    }
                }

                card.style.display = ok ? 'block' : 'none';
                if(ok) visible.push(card);
            });

            recalcStats(visible);
        }

        // Init: compute stats from all cards
        recalcStats(Array.from(cards));

        [ratingFilter, statusFilter, repliedFilter, timeFilter].forEach(el => {
            if(el) el.addEventListener('change', filterReviews);
        });
    });
</script>
@endsection
