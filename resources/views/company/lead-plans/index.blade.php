@extends('company.layouts.master')
@section('title', 'Payment Plans')

@section('content')
    @php
        $billingInterval = $subscription?->interval ?? 'monthly';
        $isCancelled = $subscription && $subscription->cancel_at_period_end;
        $isActive = $subscription && $subscription->status === 'active' && !$isCancelled;
        $isScheduled = $subscription && $subscription->is_scheduled_renewal;
        $hasSubscription = (bool) $subscription;
        $isExpired = !$subscription && $lastSubscription;
    @endphp

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --lp-primary: #2563eb;
            --lp-primary-dark: #1d4ed8;
            --lp-primary-soft: #eff6ff;
            --lp-purple: #7c3aed;
            --lp-cyan: #06b6d4;
            --lp-dark: #0f172a;
            --lp-slate: #475569;
            --lp-muted: #64748b;
            --lp-border: #e2e8f0;
            --lp-border-soft: #edf2f7;
            --lp-bg: #f8fafc;
            --lp-card: #ffffff;
            --lp-success: #10b981;
            --lp-warning: #f59e0b;
            --lp-danger: #ef4444;
            --lp-radius-xl: 28px;
            --lp-radius-lg: 22px;
            --lp-radius-md: 16px;
            --lp-shadow-sm: 0 10px 30px rgba(15, 23, 42, 0.06);
            --lp-shadow-md: 0 22px 60px rgba(15, 23, 42, 0.12);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.10), transparent 32%),
                radial-gradient(circle at 90% 10%, rgba(124, 58, 237, 0.10), transparent 28%),
                var(--lp-bg) !important;
        }

        .subscription-wrapper {
            max-width: 1220px;
            margin: 0 auto;
            padding: 28px 18px 60px;
            color: var(--lp-dark);
        }

        .lp-hero {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.72);
            border-radius: var(--lp-radius-xl);
            padding: 34px;
            margin-bottom: 26px;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.96), rgba(30, 64, 175, 0.92)),
                linear-gradient(120deg, var(--lp-primary), var(--lp-purple));
            box-shadow: var(--lp-shadow-md);
            color: #fff;
        }

        .lp-hero::before,
        .lp-hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .lp-hero::before {
            width: 260px;
            height: 260px;
            top: -105px;
            right: -70px;
            background: rgba(255, 255, 255, 0.14);
        }

        .lp-hero::after {
            width: 170px;
            height: 170px;
            left: 42%;
            bottom: -100px;
            background: rgba(6, 182, 212, 0.22);
        }

        .lp-hero-content {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(280px, 0.8fr);
            gap: 26px;
            align-items: center;
        }

        .lp-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.10);
            color: rgba(255, 255, 255, 0.9);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            backdrop-filter: blur(8px);
        }

        .lp-title {
            margin: 16px 0 10px;
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.04;
            font-weight: 900;
            letter-spacing: -0.045em;
            color: #fff;
        }

        .lp-subtitle {
            max-width: 680px;
            margin: 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 15px;
            line-height: 1.75;
        }

        .lp-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .lp-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 44px;
            padding: 11px 18px;
            border-radius: 14px;
            border: 1px solid transparent;
            font-size: 14px;
            font-weight: 800;
            line-height: 1;
            text-decoration: none !important;
            transition: all 0.22s ease;
            cursor: pointer;
        }

        .lp-btn-primary {
            background: linear-gradient(135deg, var(--lp-primary), var(--lp-purple));
            color: #fff !important;
            box-shadow: 0 16px 35px rgba(37, 99, 235, 0.25);
        }

        .lp-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 42px rgba(37, 99, 235, 0.32);
        }

        .lp-btn-light {
            background: rgba(255, 255, 255, 0.14);
            color: #fff !important;
            border-color: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(8px);
        }

        .lp-btn-light:hover {
            background: rgba(255, 255, 255, 0.22);
            color: #fff !important;
        }

        .lp-hero-mini-card {
            position: relative;
            z-index: 1;
            padding: 22px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
        }

        .lp-mini-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        }

        .lp-mini-row:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .lp-mini-label {
            color: rgba(255, 255, 255, 0.68);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .lp-mini-value {
            color: #fff;
            font-size: 18px;
            font-weight: 900;
        }

        .lp-alert {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 18px 20px;
            margin-bottom: 24px;
            border-radius: 20px;
            border: 1px solid rgba(239, 68, 68, 0.18);
            background: linear-gradient(135deg, #fff1f2, #fff7ed);
            color: #991b1b;
            box-shadow: var(--lp-shadow-sm);
        }

        .usage-container {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.85);
            border-radius: var(--lp-radius-xl);
            padding: 26px;
            background: rgba(255, 255, 255, 0.88);
            margin-bottom: 30px;
            box-shadow: var(--lp-shadow-sm);
            backdrop-filter: blur(10px);
        }

        .usage-container::before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: 5px;
            background: linear-gradient(90deg, var(--lp-primary), var(--lp-purple), var(--lp-cyan));
        }

        .usage-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 22px;
        }

        .plan-meta {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .icon-circle {
            flex: 0 0 auto;
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #fff;
            background: linear-gradient(135deg, var(--lp-primary), var(--lp-purple));
            box-shadow: 0 14px 34px rgba(37, 99, 235, 0.24);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-block {
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, #ffffff, #f8fafc);
            border: 1px solid var(--lp-border-soft);
            border-radius: 20px;
            padding: 18px;
        }

        .stat-block::after {
            content: "";
            position: absolute;
            right: -25px;
            top: -25px;
            width: 76px;
            height: 76px;
            border-radius: 999px;
            background: rgba(37, 99, 235, 0.07);
        }

        .stat-block h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 900;
            letter-spacing: -0.04em;
            color: var(--lp-dark);
        }

        .stat-block p {
            margin: 6px 0 0;
            font-size: 11px;
            color: var(--lp-muted);
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 0.06em;
        }

        .usage-progress {
            margin-top: 12px;
        }

        .progress-text {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 10px;
            color: var(--lp-slate);
        }

        .bar-bg {
            height: 13px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(15, 23, 42, 0.1);
        }

        .bar-fill {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--lp-primary), var(--lp-purple));
            transition: width 0.6s ease;
        }

        .section-head {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin: 30px 0 18px;
        }

        .section-kicker {
            margin-bottom: 6px;
            color: var(--lp-primary);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .section-title {
            margin: 0;
            color: var(--lp-dark);
            font-size: 24px;
            font-weight: 900;
            letter-spacing: -0.03em;
        }

        .billing-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border: 1px solid var(--lp-border);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.8);
            color: var(--lp-slate);
            font-size: 13px;
            font-weight: 800;
        }

        .plan-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            align-items: stretch;
        }

        .plan-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 100%;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: var(--lp-radius-xl);
            padding: 24px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: var(--lp-shadow-sm);
            transition: transform 0.24s ease, box-shadow 0.24s ease, border-color 0.24s ease;
            backdrop-filter: blur(10px);
        }

        .plan-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: 6px;
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.0), rgba(37, 99, 235, 0.9), rgba(124, 58, 237, 0.9));
            opacity: 0;
            transition: opacity 0.24s ease;
        }

        .plan-card:hover {
            transform: translateY(-6px);
            border-color: rgba(37, 99, 235, 0.28);
            box-shadow: var(--lp-shadow-md);
        }

        .plan-card:hover::before,
        .plan-card.active-plan::before,
        .plan-card.cancelled-plan::before {
            opacity: 1;
        }

        .plan-card.active-plan {
            border: 2px solid rgba(37, 99, 235, 0.62);
            background: linear-gradient(180deg, #ffffff, #f8fbff);
        }

        .plan-card.cancelled-plan {
            border: 2px dashed rgba(245, 158, 11, 0.78);
            background: linear-gradient(180deg, #ffffff, #fff7ed);
        }

        .plan-topline {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 16px;
        }

        .plan-icon {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--lp-primary);
            background: var(--lp-primary-soft);
            font-size: 18px;
        }

        .active-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 999px;
            background: var(--lp-primary);
            color: #fff;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .active-tag.warning {
            background: #fef3c7;
            color: #92400e;
        }

        .plan-name {
            margin: 0 0 6px;
            font-size: 20px;
            font-weight: 900;
            letter-spacing: -0.025em;
            color: var(--lp-dark);
        }

        .plan-price {
            display: flex;
            align-items: flex-end;
            gap: 7px;
            margin-bottom: 6px;
        }

        .plan-price strong {
            font-size: 42px;
            line-height: 1;
            font-weight: 950;
            letter-spacing: -0.06em;
            color: var(--lp-dark);
        }

        .plan-price span {
            padding-bottom: 5px;
            color: var(--lp-muted);
            font-size: 14px;
            font-weight: 800;
        }

        .plan-leads-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 11px;
            border: 1px solid var(--lp-border-soft);
            border-radius: 12px;
            background: #f8fafc;
            color: var(--lp-slate);
            font-size: 12px;
            font-weight: 800;
        }

        .plan-divider {
            height: 1px;
            margin: 20px 0;
            background: linear-gradient(90deg, transparent, var(--lp-border), transparent);
        }

        .features-container {
            flex: 1;
            min-height: 150px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
            color: #334155;
            font-size: 13px;
            line-height: 1.5;
        }

        .feature-icon {
            flex: 0 0 auto;
            width: 21px;
            height: 21px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 1px;
            background: #dcfce7;
            color: #059669;
            font-size: 10px;
        }


        /* Icon fallbacks: these do not depend on Font Awesome, so check icons always show */
        .plan-leads-pill .lp-pill-icon {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dbeafe, #e0f2fe);
            color: var(--lp-primary);
            font-size: 11px;
            font-weight: 900;
            box-shadow: inset 0 0 0 1px rgba(37, 99, 235, 0.10);
        }

        .feature-icon i {
            display: none !important;
        }

        .feature-icon::before {
            content: "✓";
            font-size: 12px;
            font-weight: 950;
            line-height: 1;
        }

        .btn-action {
            width: 100%;
            min-height: 48px;
            padding: 13px 16px;
            border-radius: 16px;
            font-weight: 900;
            border: none;
            cursor: pointer;
            margin-top: 18px;
            transition: all 0.22s ease;
        }

        .btn-select {
            background: linear-gradient(135deg, var(--lp-primary), var(--lp-purple));
            color: #fff;
            box-shadow: 0 14px 34px rgba(37, 99, 235, 0.22);
        }

        .btn-select:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 42px rgba(37, 99, 235, 0.28);
        }

        .btn-current {
            background: #f1f5f9;
            color: #94a3b8;
        }

        .btn-cancel-sub {
            background: #fee2e2;
            color: #dc2626;
            font-size: 13px;
            margin-top: 10px;
        }

        .btn-renew-scheduled {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #10b981;
        }

        .btn-cancel-date {
            background: #fff7ed;
            color: #92400e;
        }

        .warning-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 16px;
            margin-bottom: 24px;
            border: 1px solid #fde68a;
            border-radius: 18px;
            background: #fffbeb;
            color: #92400e;
            font-size: 13px;
            line-height: 1.55;
        }

        .modal-backdropx {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.72);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
            backdrop-filter: blur(9px);
        }

        .modalx {
            width: 100%;
            max-width: 560px;
            max-height: calc(100vh - 40px);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 28px;
            background: #fff;
            box-shadow: 0 30px 90px rgba(2, 6, 23, 0.34);
            animation: modalPop 0.22s ease;
        }

        @keyframes modalPop {
            from { opacity: 0; transform: translateY(18px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modalx-header {
            position: relative;
            overflow: hidden;
            padding: 26px 28px;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #fff;
        }

        .modalx-header::after {
            content: "";
            position: absolute;
            right: -50px;
            top: -70px;
            width: 180px;
            height: 180px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
        }

        .modalx-body {
            padding: 26px 28px 28px;
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }

        .modal-close-btn {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            z-index: 2;
        }

        .modal-feature-box {
            background: #f8fafc;
            border: 1px solid var(--lp-border-soft);
            padding: 16px;
            border-radius: 18px;
            margin-bottom: 22px;
        }

        .billing-opt {
            border: 2px solid #e2e8f0;
            border-radius: 18px;
            padding: 16px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.22s ease;
            background: #fff;
        }

        .billing-opt:hover {
            border-color: rgba(37, 99, 235, 0.38);
            background: #f8fbff;
        }

        .billing-opt.selected {
            border-color: var(--lp-primary);
            background: var(--lp-primary-soft);
            box-shadow: 0 14px 34px rgba(37, 99, 235, 0.12);
        }

        .total-box {
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, var(--lp-primary), var(--lp-purple));
            color: #fff;
            padding: 20px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin: 22px 0;
        }

        .total-box::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -54px;
            top: -56px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
        }

        .total-box h3,
        .total-box span {
            position: relative;
            z-index: 1;
        }

        .info-note {
            display: none;
            padding: 14px 15px;
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            background: #eff6ff;
            color: #1e40af;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .billing-history-card {
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.95);
            border-radius: var(--lp-radius-xl);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: var(--lp-shadow-sm);
            backdrop-filter: blur(10px);
        }

        .table-modern {
            margin: 0;
        }

        .table-modern thead th {
            padding: 16px 18px;
            border: 0;
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .table-modern tbody td {
            padding: 18px;
            border-color: #f1f5f9;
            vertical-align: middle;
        }

        .invoice-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 11px;
            border-radius: 12px;
            background: #f8fafc;
            color: var(--lp-dark);
            font-weight: 900;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 900;
        }

        .status-paid {
            background: #ecfdf5;
            color: #059669;
        }

        .status-pending {
            background: #fffbeb;
            color: #d97706;
        }

        .empty-state {
            padding: 54px 20px;
            text-align: center;
            color: var(--lp-muted);
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 12px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 24px;
        }

        .bg-slate-100 { background-color: #f1f5f9 !important; }
        .text-slate-500 { color: #64748b !important; }
        .text-slate-600 { color: #475569 !important; }
        .text-success { color: #059669 !important; }
        .bg-success-subtle { background-color: #ecfdf5 !important; }

        @media (max-width: 1050px) {
            .lp-hero-content,
            .plan-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .subscription-wrapper {
                padding: 18px 12px 40px;
            }

            .lp-hero,
            .usage-container,
            .plan-card {
                border-radius: 22px;
                padding: 22px;
            }

            .usage-header,
            .section-head,
            .lp-alert {
                align-items: stretch;
                flex-direction: column;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .modalx-body {
                padding: 22px;
            }

            .modalx-header {
                padding: 22px;
            }

            .table-responsive-mobile {
                overflow-x: auto;
            }

            .table-modern {
                min-width: 720px;
            }
        }

        .spinner-dot {
            width: 14px;
            height: 14px;
            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #fff;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            vertical-align: -2px;
            animation: leadSpin 0.8s linear infinite;
        }

        @keyframes leadSpin {
            to { transform: rotate(360deg); }
        }
    </style>

    <div class="subscription-wrapper">
        <div class="lp-hero">
            <div class="lp-hero-content">
                <div>
                    <span class="lp-eyebrow"><i class="fa fa-bolt"></i> Lead Growth Center</span>
                    <h1 class="lp-title">Choose a smarter lead plan</h1>
                    <p class="lp-subtitle">
                        Manage your lead subscription, monitor monthly usage, switch plans, renew cancelled plans,
                        and download billing receipts from one clean dashboard.
                    </p>
                    <div class="lp-hero-actions">
                        <a href="#plansArea" class="lp-btn lp-btn-light">
                            <i class="fa fa-layer-group"></i> View Plans
                        </a>
                        <a href="#billingHistory" class="lp-btn lp-btn-light">
                            <i class="fa fa-receipt"></i> Billing History
                        </a>
                    </div>
                </div>

                <div class="lp-hero-mini-card">
                    <div class="lp-mini-row">
                        <div>
                            <div class="lp-mini-label">Subscription</div>
                            <div class="lp-mini-value">
                                @if ($isActive)
                                    Active
                                @elseif ($isCancelled)
                                    Cancelled
                                @elseif ($isExpired)
                                    Expired
                                @else
                                    Not Active
                                @endif
                            </div>
                        </div>
                        <i class="fa fa-signal fa-lg opacity-75"></i>
                    </div>
                    <div class="lp-mini-row">
                        <div>
                            <div class="lp-mini-label">Billing</div>
                            <div class="lp-mini-value">{{ ucfirst($billingInterval) }}</div>
                        </div>
                        <i class="fa fa-calendar-days fa-lg opacity-75"></i>
                    </div>
                    <div class="lp-mini-row">
                        <div>
                            <div class="lp-mini-label">Invoices</div>
                            <div class="lp-mini-value">{{ $billingHistory->count() }}</div>
                        </div>
                        <i class="fa fa-file-invoice-dollar fa-lg opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        @if ($activePlan && $usageStats)
            <div class="usage-container">
                <div class="usage-header">
                    <div class="plan-meta">
                        <div class="icon-circle"><i class="fa fa-chart-pie"></i></div>
                        <div>
                            <h4 class="mb-1 fw-bold">{{ $activePlan->name }} Plan</h4>
                            <span class="text-muted small">
                                @if ($subscription->cancel_at_period_end)
                                    Subscription Cancelled At: {{ $subscription->cancelled_at->format('M d, Y') }} <br>
                                    Subscription Will End At:
                                    @if ($subscription->current_period_end && $subscription->current_period_end->isSameDay($subscription->created_at))
                                        {{ $subscription->created_at->copy()->addMonth()->format('M d, Y') }}
                                    @else
                                        {{ $subscription->current_period_end ? $subscription->current_period_end->format('M d, Y') : '-' }}
                                    @endif
                                @else
                                    {{ ucfirst($subscription->interval) }} Billing · Next payment:
                                    @if ($subscription->current_period_end && $subscription->current_period_end->isSameDay($subscription->created_at))
                                        {{ $subscription->created_at->copy()->addMonth()->format('M d, Y') }}
                                    @else
                                        {{ $subscription->current_period_end ? \Carbon\Carbon::parse($subscription->current_period_end)->format('M d, Y') : '-' }}
                                    @endif
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="#" class="lp-btn lp-btn-primary"><i class="fa fa-users-viewfinder"></i> View Leads</a>
                    </div>
                </div>

                <div class="stats-row">
                    <div class="stat-block">
                        <h2>{{ $usageStats['allowed'] }}</h2>
                        <p>Leads / Mo</p>
                    </div>
                    <div class="stat-block">
                        <h2>{{ $usageStats['used'] }}</h2>
                        <p>Used</p>
                    </div>
                    <div class="stat-block">
                        <h2>{{ $usageStats['remaining'] }}</h2>
                        <p>Remaining</p>
                    </div>
                </div>

                <div class="usage-progress">
                    <div class="progress-text">
                        <span>Current Usage</span>
                        <span>{{ $usageStats['percent'] }}%</span>
                    </div>
                    <div class="bar-bg">
                        <div class="bar-fill" style="width: {{ $usageStats['percent'] }}%"></div>
                    </div>
                </div>
            </div>

            @if ($subscription->cancel_at_period_end)
                <div class="warning-note">
                    <i class="fa fa-clock-rotate-left mt-1"></i>
                    <div>
                        This plan was cancelled on {{ $subscription->cancelled_at->format('M d, Y') }}.
                        You will lose access on
                        <strong>{{ $subscription->current_period_end->format('M d, Y') }}</strong>.
                    </div>
                </div>
            @endif
        @endif

        @if ($isExpired)
            <div class="lp-alert">
                <div>
                    <i class="fa fa-triangle-exclamation me-2"></i>
                    Your previous <strong>{{ optional($lastSubscription->plan)->name ?? 'Lead Plan' }}</strong>
                    subscription has expired.
                </div>
                <button id="renewBtn" onclick="renewSubscription()" class="lp-btn lp-btn-primary">
                    <i class="fa fa-rotate"></i> Renew Now
                </button>
            </div>
        @endif

        <div class="section-head" id="plansArea">
            <div>
                <div class="section-kicker">Flexible packages</div>
                <h2 class="section-title">Lead Plans</h2>
            </div>
            <div class="billing-chip">
                <i class="fa fa-credit-card"></i>
                Current billing view: {{ ucfirst($billingInterval) }}
            </div>
        </div>

        <div class="plan-grid">
            @foreach ($plans as $plan)
                @php
                    $isCurrent = $activePlan && $activePlan->id === $plan->id;
                    $priceCents = $billingInterval === 'annual' ? $plan->annual_price_cents : $plan->monthly_price_cents;
                    $price = $priceCents / 100;
                    $suffix = $billingInterval === 'annual' ? '/yr' : '/mo';
                    $features = preg_split('/[,;\n\r]+/', $plan->included_features);
                    $features = array_filter(array_map('trim', $features));
                @endphp

                <div class="plan-card {{ $isCurrent && $isCancelled ? 'cancelled-plan' : '' }} {{ $isCurrent && $isActive ? 'active-plan' : '' }}">
                    <div class="plan-topline">
                        <div class="plan-icon"><i class="fa fa-rocket"></i></div>

                        @if ($isCurrent && $isCancelled)
                            <div class="active-tag warning"><i class="fa fa-circle-pause"></i> Cancelled</div>
                        @elseif ($isCurrent)
                            <div class="active-tag"><i class="fa fa-circle-check"></i> Active</div>
                        @endif
                    </div>

                    <h5 class="plan-name">{{ $plan->name }}</h5>
                    <div class="plan-price">
                        <strong>${{ number_format($price, 2) }}</strong>
                        <span>{{ $suffix }}</span>
                    </div>

                    <div class="plan-leads-pill">
                        <span class="lp-pill-icon">↗</span>
                        {{ $plan->leads_per_month }} leads included monthly
                    </div>

                    <div class="plan-divider"></div>

                    <div class="features-container">
                        <ul class="list-unstyled mb-0">
                            @forelse($features as $feature)
                                <li class="feature-item">
                                    <span class="feature-icon"></span>
                                    <span>{{ $feature }}</span>
                                </li>
                            @empty
                                <li class="text-muted small">No specific features listed.</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="mt-auto">
                        @if ($isCurrent && $isActive)
                            <button class="btn-action btn-current" disabled>
                                <i class="fa fa-circle-check me-1"></i> Current Plan
                            </button>

                            <form action="{{ route('company.lead_plans.cancel') }}" method="POST"
                                  onsubmit="return confirm('Cancel at period end?')" class="mt-2">
                                @csrf
                                <button type="submit" class="btn-action btn-cancel-sub">
                                    <i class="fa fa-ban me-1"></i> Cancel Subscription
                                </button>
                            </form>
                        @elseif ($isCurrent && $isCancelled)
                            @if ($isScheduled)
                                <button class="btn-action btn-renew-scheduled" disabled>
                                    <i class="fa fa-calendar-check me-1"></i> Renewal Scheduled
                                </button>
                                <p class="text-center small text-muted mt-2 mb-0">
                                    Will renew on {{ \Carbon\Carbon::parse($subscription->current_period_end)->format('M d, Y') }}
                                </p>
                            @else
                                <button class="btn-action btn-cancel-date" disabled>
                                    Cancels on {{ \Carbon\Carbon::parse($subscription->current_period_end)->format('M d, Y') }}
                                </button>
                                <button class="btn-action btn-select" id="scheduleBtn" onclick="scheduleRenewal()">
                                    <i class="fa fa-calendar-plus me-1"></i> Schedule Renewal
                                </button>
                            @endif
                        @else
                            <button class="btn-action btn-select" onclick='openSubscribeModal(@json($plan))'>
                                <i class="fa fa-arrow-right me-1"></i>
                                {{ $hasSubscription ? 'Switch to this Plan' : 'Select Plan' }}
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal-backdropx" id="subscribeModal">
            <div class="modalx">
                <div class="modalx-header">
                    <div class="d-flex justify-content-between align-items-start gap-3 position-relative" style="z-index: 2;">
                        <div>
                            <span class="lp-eyebrow"><i class="fa fa-shield-check"></i> Secure Checkout</span>
                            <h3 class="fw-bold mb-1 mt-3 text-white" id="m-title"></h3>
                            <p class="mb-0 small opacity-75" id="m-desc"></p>
                        </div>
                        <button onclick="closeSubscribeModal()" type="button" class="modal-close-btn" aria-label="Close">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <div class="modalx-body">
                    <div class="modal-feature-box">
                        <ul id="m-features" class="list-unstyled mb-0 small" style="line-height: 1.9;"></ul>
                    </div>

                    <label class="fw-bold small mb-2 d-block text-uppercase text-muted" style="letter-spacing: .06em;">Choose Billing</label>

                    <div class="billing-opt selected" id="opt-monthly" onclick="setBilling('monthly')">
                        <div class="d-flex align-items-center gap-2">
                            <input type="radio" name="b-cycle" id="r-monthly" checked>
                            <span class="fw-bold">Monthly</span>
                        </div>
                        <span class="fw-bold" id="p-monthly"></span>
                    </div>

                    <div class="billing-opt" id="opt-annual" onclick="setBilling('annual')">
                        <div class="d-flex align-items-center gap-2">
                            <input type="radio" name="b-cycle" id="r-annual">
                            <span class="fw-bold">
                                Annual
                                <span class="badge bg-success ms-2" style="font-size: 10px;">Save 20%</span>
                            </span>
                        </div>
                        <span class="fw-bold text-muted" id="p-annual"></span>
                    </div>

                    <div class="total-box">
                        <span class="fw-bold" id="total-label">Total due now</span>
                        <h3 class="mb-0 fw-black" id="total-due"></h3>
                    </div>

                    <div class="info-note" id="change-note">
                        <i class="fa fa-circle-info me-1"></i>
                        Changing plans will apply proration. Your next invoice will reflect the adjustment.
                    </div>

                    <button class="btn btn-primary w-100 fw-bold py-3 rounded-4" id="payBtn" onclick="processPayment()">
                        Continue
                    </button>
                </div>
            </div>
        </div>

        <div class="section-head" id="billingHistory">
            <div>
                <div class="section-kicker">Payment records</div>
                <h2 class="section-title">Billing History</h2>
            </div>
            <span class="billing-chip">
                <i class="fa fa-file-invoice"></i>
                {{ $billingHistory->count() }} Invoices
            </span>
        </div>

        <div class="billing-history-card">
            <div class="table-responsive-mobile">
                <table class="table table-hover table-modern">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-end">Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($billingHistory as $history)
                            <tr>
                                <td>
                                    <span class="invoice-badge">
                                        <i class="fa fa-file-lines text-primary"></i>
                                        {{ $history->invoice_no }}
                                    </span>
                                    <div class="text-muted mt-1" style="font-size: 11px;">
                                        ID: {{ $history->stripe_invoice_id }}
                                    </div>
                                </td>
                                <td class="text-slate-600">
                                    {{ $history->paid_at->format('M d, Y') }}
                                </td>
                                <td class="fw-bold">
                                    ${{ number_format($history->amount_cents / 100, 2) }}
                                </td>
                                <td>
                                    <span class="status-badge {{ $history->status === 'paid' ? 'status-paid' : 'status-pending' }}">
                                        <i class="fa {{ $history->status === 'paid' ? 'fa-circle-check' : 'fa-clock' }}"></i>
                                        {{ ucfirst($history->status) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('company.lead_plans.invoice.download', $history->id) }}"
                                       class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                        <i class="fa fa-file-pdf me-1"></i> PDF
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-icon"><i class="fa fa-receipt"></i></div>
                                        <div class="fw-bold text-dark">No billing records found yet.</div>
                                        <div class="small mt-1">Your paid invoices will appear here after payment.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let planData = null;
        let selectedInterval = '{{ $billingInterval }}';
        const hasSubscription = @json($hasSubscription);

        function formatPlanPrice(amountInCents) {
            const dollars = Number(amountInCents || 0) / 100;
            return '$' + dollars.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function openSubscribeModal(plan) {
            planData = plan;

            document.getElementById('subscribeModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.getElementById('m-title').innerText =
                (hasSubscription ? 'Change to ' : 'Subscribe to ') + plan.name;

            document.getElementById('m-desc').innerText =
                plan.leads_per_month + ' leads included per month';

            document.getElementById('p-monthly').innerText = formatPlanPrice(plan.monthly_price_cents);
            document.getElementById('p-annual').innerText = formatPlanPrice(plan.annual_price_cents);

            const featuresString = plan.included_features || "";
            const featuresArray = featuresString.split(/[,;\n\r]+/).filter(item => item.trim() !== "");
            const featuresHtml = featuresArray.length ? featuresArray.map(feature => `
                <li class="mb-2 d-flex align-items-start">
                    <span class="feature-icon me-2"></span>
                    <span>${feature.trim()}</span>
                </li>
            `).join('') : '<li class="text-muted">No specific features listed.</li>';

            document.getElementById('m-features').innerHTML = featuresHtml;

            if (hasSubscription) {
                document.getElementById('payBtn').innerText = 'Confirm Plan Change';
                document.getElementById('total-label').innerText = 'New Plan Rate';
                document.getElementById('change-note').style.display = 'block';
            } else {
                document.getElementById('payBtn').innerText = 'Continue to Payment';
                document.getElementById('total-label').innerText = 'Total due now';
                document.getElementById('change-note').style.display = 'none';
            }

            setBilling(selectedInterval);
        }

        function setBilling(interval) {
            if (!planData) return;

            selectedInterval = interval;
            const isMonthly = interval === 'monthly';

            document.getElementById('r-monthly').checked = isMonthly;
            document.getElementById('r-annual').checked = !isMonthly;

            document.getElementById('opt-monthly').classList.toggle('selected', isMonthly);
            document.getElementById('opt-annual').classList.toggle('selected', !isMonthly);

            const total = isMonthly ? planData.monthly_price_cents : planData.annual_price_cents;
            document.getElementById('total-due').innerText = formatPlanPrice(total);
        }

        function closeSubscribeModal() {
            document.getElementById('subscribeModal').style.display = 'none';
            document.body.style.overflow = '';
        }

        function getLeadPlanEndpoint(action) {
            if (!planData || !planData.id) return null;

            const baseUrl = @json(url('/company/lead-plans'));
            return `${baseUrl}/${planData.id}/${action}`;
        }

        function submitLeadPlanForm(endpoint) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = endpoint;
            form.style.display = 'none';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = document.querySelector('meta[name="csrf-token"]').content;
            form.appendChild(tokenInput);

            const intervalInput = document.createElement('input');
            intervalInput.type = 'hidden';
            intervalInput.name = 'interval';
            intervalInput.value = selectedInterval;
            form.appendChild(intervalInput);

            const billingInput = document.createElement('input');
            billingInput.type = 'hidden';
            billingInput.name = 'billing_interval';
            billingInput.value = selectedInterval;
            form.appendChild(billingInput);

            document.body.appendChild(form);
            form.submit();
        }

        function showPaymentError(message) {
            const cleanMessage = message || 'Subscription failed. Please try again.';
            alert(cleanMessage);
        }

        async function processPayment() {
            if (!planData) return;

            const btn = document.getElementById('payBtn');
            const originalText = hasSubscription ? 'Confirm Plan Change' : 'Continue to Payment';
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-dot"></span> Processing...';

            const action = hasSubscription ? 'change' : 'subscribe';
            const endpoint = getLeadPlanEndpoint(action);

            if (!endpoint) {
                showPaymentError('Plan information is missing. Please refresh the page and try again.');
                btn.disabled = false;
                btn.innerText = originalText;
                return;
            }

            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    credentials: 'same-origin',
                    redirect: 'manual',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        interval: selectedInterval,
                        billing_interval: selectedInterval,
                        plan_id: planData.id
                    })
                });

                if (response.type === 'opaqueredirect' || response.status === 0 || [301, 302, 303, 307, 308].includes(response.status)) {
                    submitLeadPlanForm(endpoint);
                    return;
                }

                const contentType = response.headers.get('content-type') || '';
                const rawText = await response.text();
                let data = {};

                if (contentType.includes('application/json') && rawText) {
                    try {
                        data = JSON.parse(rawText);
                    } catch (parseError) {
                        console.error('Invalid JSON response:', rawText);
                        throw new Error('Invalid server response. Please check Laravel logs.');
                    }
                }

                if (data.redirect || data.checkout_url || data.url) {
                    window.location.href = data.redirect || data.checkout_url || data.url;
                    return;
                }

                if (!response.ok) {
                    const validationMessage = data?.message || data?.error || data?.errors
                        ? (data.message || data.error || Object.values(data.errors).flat().join('\n'))
                        : null;

                    if (!validationMessage && rawText && rawText.trim().startsWith('<')) {
                        console.error('Server returned HTML:', rawText);
                        throw new Error('Server returned an HTML error page. Please check Laravel logs.');
                    }

                    throw new Error(validationMessage || 'Subscription failed. Please try again.');
                }

                if (data.success) {
                    window.location.reload();
                    return;
                }

                if (rawText && rawText.trim().startsWith('<')) {
                    submitLeadPlanForm(endpoint);
                    return;
                }

                throw new Error(data.error || data.message || 'Subscription failed. Please try again.');
            } catch (error) {
                console.error('Lead plan subscription error:', error);
                showPaymentError(error.message);
                btn.disabled = false;
                btn.innerText = originalText;
            }
        }

        async function renewSubscription() {
            if (!confirm('Renew your subscription using your saved payment method?')) return;

            const btn = document.getElementById('renewBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i> Renewing...';

            try {
                const response = await fetch('{{ route('company.lead_plans.renew') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const data = await response.json();
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.error || 'Renewal failed.');
                    btn.disabled = false;
                    btn.innerText = 'Renew Now';
                }
            } catch (error) {
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerText = 'Renew Now';
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('subscribeModal');
            if (event.target === modal) closeSubscribeModal();
        };

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeSubscribeModal();
            }
        });

        async function scheduleRenewal() {
            if (!confirm('Would you like to schedule an automatic renewal for when your current period ends?')) return;

            const btn = document.getElementById('scheduleBtn');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i> Scheduling...';

            try {
                const response = await fetch('{{ route('company.lead_plans.schedule_renewal') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const data = await response.json();
                if (data.success) {
                    alert(data.message);
                    window.location.reload();
                } else {
                    alert(data.error || 'Failed to schedule renewal.');
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            } catch (error) {
                alert('An error occurred. Please try again.');
                btn.disabled = false;
                btn.innerHTML = originalText;
            }
        }
    </script>
@endsection
