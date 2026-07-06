@extends('company.layouts.master')

@section('title', 'Mover Leads')

@section('content')
    @php
        $extraLeadFee = isset($plan) && $plan ? (($plan->extra_lead_fee_cents ?? 0) / 100) : 0;
        $leadUsagePercent = min(100, max(0, (float) ($usagePercent ?? 0)));
        $exportFrom = request('date_from', request('from_date'));
        $exportTo = request('date_to', request('to_date'));
    @endphp

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --ml-primary: #2563eb;
            --ml-primary-2: #7c3aed;
            --ml-cyan: #06b6d4;
            --ml-dark: #0f172a;
            --ml-text: #1e293b;
            --ml-muted: #64748b;
            --ml-soft: #f8fafc;
            --ml-border: #e2e8f0;
            --ml-success: #10b981;
            --ml-warning: #f59e0b;
            --ml-danger: #ef4444;
            --ml-shadow-sm: 0 10px 28px rgba(15, 23, 42, .06);
            --ml-shadow-md: 0 24px 70px rgba(15, 23, 42, .13);
            --ml-radius-xl: 28px;
            --ml-radius-lg: 20px;
            --ml-radius-md: 14px;
        }

        body {
            background:
                radial-gradient(circle at 0% 0%, rgba(37, 99, 235, .10), transparent 34%),
                radial-gradient(circle at 90% 10%, rgba(124, 58, 237, .10), transparent 28%),
                #f6f8fb !important;
        }

        .mover-leads-page {
            max-width: 1480px;
            margin: 0 auto;
            padding: 26px 18px 60px;
            color: var(--ml-text);
        }

        .ml-hero {
            position: relative;
            overflow: hidden;
            border-radius: var(--ml-radius-xl);
            padding: 30px;
            margin-bottom: 24px;
            color: #fff;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, .96), rgba(30, 64, 175, .92)),
                linear-gradient(120deg, var(--ml-primary), var(--ml-primary-2));
            box-shadow: var(--ml-shadow-md);
        }

        .ml-hero::before,
        .ml-hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .ml-hero::before {
            width: 270px;
            height: 270px;
            right: -85px;
            top: -105px;
            background: rgba(255, 255, 255, .13);
        }

        .ml-hero::after {
            width: 170px;
            height: 170px;
            left: 48%;
            bottom: -100px;
            background: rgba(6, 182, 212, .22);
        }

        .ml-hero-inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(320px, .9fr);
            gap: 24px;
            align-items: center;
        }

        .ml-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 999px;
            background: rgba(255, 255, 255, .11);
            color: rgba(255, 255, 255, .9);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .07em;
            backdrop-filter: blur(10px);
        }

        .ml-title {
            margin: 16px 0 8px;
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.02;
            font-weight: 950;
            letter-spacing: -.05em;
            color: #fff;
        }

        .ml-subtitle {
            max-width: 720px;
            margin: 0;
            color: rgba(255, 255, 255, .74);
            font-size: 15px;
            line-height: 1.75;
        }

        .ml-hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .ml-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 43px;
            padding: 11px 18px;
            border: 1px solid transparent;
            border-radius: 15px;
            font-size: 13px;
            font-weight: 900;
            text-decoration: none !important;
            line-height: 1;
            cursor: pointer;
            transition: all .22s ease;
        }

        .ml-btn-primary {
            background: linear-gradient(135deg, var(--ml-primary), var(--ml-primary-2));
            color: #fff !important;
            box-shadow: 0 15px 35px rgba(37, 99, 235, .28);
        }

        .ml-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, .34);
        }

        .ml-btn-glass {
            color: #fff !important;
            border-color: rgba(255, 255, 255, .18);
            background: rgba(255, 255, 255, .13);
            backdrop-filter: blur(10px);
        }

        .ml-btn-glass:hover {
            background: rgba(255, 255, 255, .20);
        }

        .ml-hero-card {
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 24px;
            background: rgba(255, 255, 255, .12);
            backdrop-filter: blur(14px);
        }

        .ml-hero-stat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
        }

        .ml-hero-stat:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .ml-hero-stat small {
            display: block;
            color: rgba(255, 255, 255, .65);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .ml-hero-stat strong {
            display: block;
            margin-top: 4px;
            color: #fff;
            font-size: 20px;
            font-weight: 950;
            letter-spacing: -.03em;
        }

        .ml-round-icon {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .14);
            color: #fff;
            flex: 0 0 auto;
        }

        .ml-alert-upgrade {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            margin-bottom: 22px;
            border: 1px solid rgba(245, 158, 11, .24);
            border-left: 6px solid var(--ml-warning);
            border-radius: 20px;
            background: linear-gradient(135deg, #fffbeb, #fff7ed);
            box-shadow: var(--ml-shadow-sm);
        }

        .lead-summary {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            padding: 20px;
            margin-bottom: 22px;
            border: 1px solid rgba(226, 232, 240, .88);
            border-radius: var(--ml-radius-xl);
            background: rgba(255, 255, 255, .88);
            box-shadow: var(--ml-shadow-sm);
            backdrop-filter: blur(10px);
        }

        .lead-summary::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, var(--ml-primary), var(--ml-primary-2), var(--ml-cyan));
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            min-height: 112px;
            padding: 18px;
            border: 1px solid #edf2f7;
            border-radius: 20px;
            background: linear-gradient(180deg, #fff, #f8fafc);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            right: -28px;
            top: -28px;
            width: 92px;
            height: 92px;
            border-radius: 50%;
            background: rgba(37, 99, 235, .07);
        }

        .summary-card small {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: var(--ml-muted);
            font-size: 11px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .summary-card h4 {
            margin: 0;
            color: var(--ml-dark);
            font-size: 28px;
            font-weight: 950;
            letter-spacing: -.045em;
        }

        .summary-card .helper {
            margin-top: 6px;
            color: var(--ml-muted);
            font-size: 12px;
            font-weight: 700;
        }

        .progress-card {
            padding: 18px;
            border: 1px solid #edf2f7;
            border-radius: 20px;
            background: linear-gradient(180deg, #fff, #f8fafc);
        }

        .progress-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
            color: var(--ml-muted);
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .progress {
            height: 12px;
            border-radius: 999px;
            background: #e2e8f0;
            overflow: hidden;
            box-shadow: inset 0 1px 3px rgba(15, 23, 42, .12);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--ml-primary), var(--ml-primary-2));
        }

        .filter-card {
            padding: 20px;
            margin-bottom: 18px;
            border: 1px solid rgba(226, 232, 240, .88);
            border-radius: var(--ml-radius-xl);
            background: rgba(255, 255, 255, .9);
            box-shadow: var(--ml-shadow-sm);
            backdrop-filter: blur(10px);
        }

        .filter-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .filter-head h5 {
            margin: 0;
            color: var(--ml-dark);
            font-size: 17px;
            font-weight: 950;
            letter-spacing: -.02em;
        }

        .filter-head span {
            color: var(--ml-muted);
            font-size: 12px;
            font-weight: 800;
        }

        .ml-filter-form {
            margin: 0;
        }

        .ml-filter-grid {
            display: grid;
            grid-template-columns: minmax(280px, 1.35fr) minmax(160px, .65fr) minmax(160px, .65fr) minmax(280px, 1.05fr) minmax(180px, .55fr);
            gap: 14px;
            align-items: end;
        }

        .filter-field {
            min-width: 0;
        }

        .filter-label {
            display: block;
            margin-bottom: 7px;
            color: var(--ml-muted);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .filter-input-wrap,
        .date-range-wrap {
            position: relative;
            display: flex;
            align-items: center;
            min-height: 50px;
            border: 1px solid #dbe4ef;
            border-radius: 17px;
            background: #fff;
            overflow: hidden;
            transition: all .2s ease;
        }

        .filter-input-wrap:focus-within,
        .date-range-wrap:focus-within {
            border-color: var(--ml-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .filter-input-icon {
            flex: 0 0 44px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--ml-muted);
            border-right: 1px solid #edf2f7;
        }

        .filter-input-wrap .form-control,
        .date-range-wrap .form-control {
            min-height: 48px;
            border: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: transparent;
        }

        .date-range-wrap .form-control:first-of-type {
            border-right: 1px solid #edf2f7 !important;
        }

        .filter-actions {
            display: grid;
            grid-template-columns: 1fr 50px;
            gap: 10px;
        }

        .filter-submit-btn,
        .filter-reset-btn {
            min-height: 50px;
            border-radius: 17px !important;
            font-size: 13px;
            font-weight: 900;
        }

        .filter-submit-btn {
            background: linear-gradient(135deg, var(--ml-primary), #0ea5e9) !important;
            border: 0 !important;
            box-shadow: 0 12px 28px rgba(37, 99, 235, .22);
        }

        .filter-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc !important;
            border: 1px solid #dbe4ef !important;
            color: var(--ml-muted) !important;
        }

        .filter-card .form-select {
            min-height: 50px;
            padding: 0 40px 0 15px;
            border-radius: 17px;
            border: 1px solid #dbe4ef;
            background-color: #fff;
            color: var(--ml-text);
            font-size: 14px;
            font-weight: 700;
            box-shadow: none;
        }

        .form-control-custom,
        .filter-card .form-select {
            min-height: 46px;
            border-radius: 15px;
            border: 1px solid #dbe4ef;
            background-color: #fff;
            color: var(--ml-text);
            font-size: 14px;
            transition: all .2s ease;
        }

        .form-control-custom:focus,
        .filter-card .form-select:focus {
            border-color: var(--ml-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .input-group-text {
            border-radius: 15px 0 0 15px !important;
            border-color: #dbe4ef !important;
            color: var(--ml-muted);
        }

        .input-group .form-control-custom {
            border-radius: 0 15px 15px 0 !important;
        }

        .export-bar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            margin: 0 0 16px;
        }

        .export-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 40px;
            padding: 9px 14px;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 900;
            text-decoration: none !important;
        }

        .table-container {
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, .92);
            border-radius: var(--ml-radius-xl);
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--ml-shadow-sm);
            backdrop-filter: blur(10px);
        }

        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 18px 20px;
            border-bottom: 1px solid #edf2f7;
            background: linear-gradient(180deg, #fff, #fbfdff);
        }

        .table-toolbar h5 {
            margin: 0;
            color: var(--ml-dark);
            font-size: 17px;
            font-weight: 950;
            letter-spacing: -.02em;
        }

        .table-toolbar .count-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 900;
        }

        .table-modern {
            margin: 0;
        }

        .table-modern thead th {
            padding: 15px 18px;
            border: 0;
            background: #f8fafc;
            color: var(--ml-muted);
            font-size: 11px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: .08em;
            white-space: nowrap;
        }

        .table-modern tbody td {
            padding: 18px;
            vertical-align: middle;
            border-color: #f1f5f9;
            color: var(--ml-text);
            font-size: 14px;
        }

        .table-modern tbody tr {
            transition: background .18s ease, transform .18s ease;
        }

        .table-modern tbody tr:hover {
            background: #fbfdff;
        }

        .lead-id-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 11px;
            border-radius: 12px;
            background: #f8fafc;
            color: var(--ml-dark);
            font-weight: 950;
        }

        .booking-badge,
        .stage-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 900;
            white-space: nowrap;
        }

        .customer-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
        }

        .avatar-bubble {
            width: 42px;
            height: 42px;
            flex: 0 0 auto;
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 950;
            background: linear-gradient(135deg, var(--ml-primary), var(--ml-primary-2));
            box-shadow: 0 12px 28px rgba(37, 99, 235, .22);
        }

        .customer-name {
            color: var(--ml-dark);
            font-weight: 950;
            line-height: 1.25;
        }

        .customer-email {
            margin-top: 3px;
            color: var(--ml-muted);
            font-size: 12px;
            font-weight: 700;
        }

        .move-detail-card {
            min-width: 150px;
        }

        .move-detail-card strong {
            display: block;
            color: var(--ml-dark);
            font-size: 13px;
            font-weight: 950;
        }

        .move-detail-card span {
            display: block;
            margin-top: 4px;
            color: var(--ml-muted);
            font-size: 12px;
            font-weight: 700;
        }

        .route-box {
            min-width: 230px;
        }

        .route-chip {
            display: inline-flex;
            align-items: center;
            max-width: 100%;
            padding: 7px 10px;
            border: 1px solid #e2e8f0;
            border-radius: 999px;
            background: #fff;
            color: var(--ml-text);
            font-size: 12px;
            font-weight: 800;
        }

        .route-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            margin: 5px auto;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--ml-primary);
            font-size: 11px;
        }

        .stage-select {
            min-width: 182px;
            height: 38px;
            border-radius: 999px;
            padding: 6px 14px;
            border: 1px solid #dbe4ef;
            background-color: #fff;
            color: var(--ml-text);
            font-size: 13px;
            font-weight: 800;
        }

        .stage-select:focus {
            border-color: var(--ml-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .action-group {
            display: inline-flex;
            align-items: center;
            justify-content: flex-end;
            gap: 7px;
            flex-wrap: nowrap;
        }

        .btn-action {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: var(--ml-muted);
            transition: all .18s ease;
        }

        .btn-action:hover {
            transform: translateY(-1px);
            color: var(--ml-primary);
            border-color: rgba(37, 99, 235, .35);
            background: #eff6ff;
        }

        .mark-read-btn {
            white-space: nowrap;
            border-radius: 999px;
            font-weight: 900;
            font-size: 12px;
            padding: 9px 12px;
        }

        .unlock-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 38px;
            padding: 9px 14px;
            border: 1px solid #bfdbfe;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 950;
            font-size: 12px;
            white-space: nowrap;
        }

        .unlock-pill:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .locked-row {
            background: linear-gradient(90deg, #f8fafc, #fff) !important;
        }

        .locked-row td:not(:last-child) {
            color: #94a3b8 !important;
        }

        .locked-card {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
            font-weight: 900;
        }

        .lock-icon {
            width: 36px;
            height: 36px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #94a3b8;
        }

        .empty-state {
            padding: 58px 20px;
            text-align: center;
            color: var(--ml-muted);
        }

        .empty-state .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 14px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #94a3b8;
            font-size: 26px;
        }

        .modal-content {
            border: 0 !important;
            border-radius: 26px !important;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(2, 6, 23, .30);
        }

        .modal-content .modal-header {
            position: relative;
            overflow: hidden;
            padding: 24px 26px;
            background: linear-gradient(135deg, #0f172a, #1d4ed8) !important;
            color: #fff !important;
        }

        .modal-content .modal-header::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            right: -58px;
            top: -70px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .13);
        }

        .modal-content .modal-header h5 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-weight: 950;
        }

        .modal-content .btn-close,
        .modal-content .close {
            position: relative;
            z-index: 2;
            color: #fff;
            opacity: .9;
        }

        .modal-body {
            padding: 24px 26px;
        }

        .lead-detail-feature {
            padding: 17px;
            border: 1px solid #edf2f7;
            border-radius: 18px;
            background: #f8fafc;
        }

        .detail-box {
            padding: 14px;
            height: 100%;
            border: 1px solid #edf2f7;
            border-radius: 16px;
            background: #fff;
        }

        .detail-box label,
        .lead-detail-feature label {
            display: block;
            margin-bottom: 5px;
            color: var(--ml-muted);
            font-size: 11px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .detail-box span,
        .lead-detail-feature span {
            color: var(--ml-dark);
            font-weight: 900;
            word-break: break-word;
        }

        @media (max-width: 1200px) {
            .ml-hero-inner,
            .lead-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .ml-filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .filter-search,
            .filter-dates,
            .filter-actions-field {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .mover-leads-page {
                padding: 18px 12px 44px;
            }

            .ml-hero,
            .filter-card,
            .table-container,
            .lead-summary {
                border-radius: 22px;
            }

            .ml-hero-inner,
            .lead-summary {
                grid-template-columns: 1fr;
            }

            .filter-head,
            .table-toolbar,
            .ml-alert-upgrade {
                align-items: stretch;
                flex-direction: column;
            }

            .export-bar {
                justify-content: stretch;
            }

            .export-btn {
                flex: 1 1 auto;
            }

            .table-modern {
                min-width: 1050px;
            }

            .ml-filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-search,
            .filter-dates,
            .filter-actions-field {
                grid-column: auto;
            }

            .date-range-wrap {
                display: grid;
                grid-template-columns: 44px 1fr;
                align-items: stretch;
            }

            .date-range-wrap .filter-input-icon {
                grid-row: span 2;
                height: 100%;
            }

            .date-range-wrap .form-control:first-of-type {
                border-right: 0 !important;
                border-bottom: 1px solid #edf2f7 !important;
            }
        }
    </style>

    <div class="mover-leads-page">
        <div class="ml-hero">
            <div class="ml-hero-inner">
                <div>
                    <span class="ml-eyebrow"><i class="fa fa-bolt"></i> Lead Command Center</span>
                    <h1 class="ml-title">Mover Leads Pipeline</h1>
                    <p class="ml-subtitle">
                        Track every moving lead, unlock extra opportunities, update lead stages, and export your records from a cleaner modern dashboard.
                    </p>
                    <div class="ml-hero-actions">
                        <a href="#leadTable" class="ml-btn ml-btn-glass"><i class="fa fa-table"></i> View Leads</a>
                        <a href="{{ route('company.lead_plans.index') }}" class="ml-btn ml-btn-glass"><i class="fa fa-credit-card"></i> Manage Plan</a>
                    </div>
                </div>

                <div class="ml-hero-card">
                    <div class="ml-hero-stat">
                        <div>
                            <small>Subscription</small>
                            <strong>{{ $isSubscriptionValid ? 'Active' : 'Limited Mode' }}</strong>
                        </div>
                        <span class="ml-round-icon"><i class="fa fa-shield"></i></span>
                    </div>
                    <div class="ml-hero-stat">
                        <div>
                            <small>Allowed Leads</small>
                            <strong>{{ $allowedLeads ?? 0 }}</strong>
                        </div>
                        <span class="ml-round-icon"><i class="fa fa-users"></i></span>
                    </div>
                    <div class="ml-hero-stat">
                        <div>
                            <small>Extra Cost</small>
                            <strong>${{ number_format(($extraCost ?? 0)/ 100) }}</strong>
                        </div>
                        <span class="ml-round-icon"><i class="fa fa-dollar"></i></span>
                    </div>
                </div>
            </div>
        </div>

        @if ($isSubscriptionValid && $plan)
            <div class="lead-summary">
                <div class="summary-card">
                    <small><i class="fa fa-tag"></i> Lead Rate</small>
                    <h4>${{ number_format($extraLeadFee, 2) }}</h4>
                    <div class="helper">Per extra lead</div>
                </div>
                <div class="summary-card">
                    <small><i class="fa fa-box-open"></i> Monthly Allowance</small>
                    <h4>{{ $remainingLeads ?? 0 }}</h4>
                    <div class="helper">Leads remaining</div>
                </div>
                <div class="summary-card">
                    <small><i class="fa fa-credit-card"></i> Extra Charges</small>
                    <h4>${{ number_format(($extraCost ?? 0)/ 100) }}</h4>
                    <div class="helper">Current billing period</div>
                </div>
                <div class="progress-card">
                    <div class="progress-top">
                        <span>Usage</span>
                        <span>{{ $usedLeads ?? 0 }}/{{ $allowedLeads ?? 0 }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $leadUsagePercent }}%"></div>
                    </div>
                    <div class="helper mt-2">{{ number_format($leadUsagePercent, 0) }}% used this month</div>
                </div>
            </div>
        @else
            <div class="ml-alert-upgrade">
                <span class="lock-icon"><i class="fa fa-lock"></i></span>
                <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Subscription Required</h6>
                    <small class="text-muted">You are currently viewing leads in limited mode. Please subscribe to unlock contact details.</small>
                </div>
                <a href="{{ route('company.lead_plans.index') }}" class="ml-btn ml-btn-primary">Upgrade Now</a>
            </div>
        @endif

        <div class="filter-card">
            <div class="filter-head">
                <div>
                    <h5>Search & Filters</h5>
                    <span>Filter by customer name, stage, move size, and moving date.</span>
                </div>
                <span class="booking-badge"><i class="fa fa-filter"></i> Smart Filter</span>
            </div>

            <form method="GET" action="{{ route('company.mover_leads') }}" class="ml-filter-form">
                <div class="ml-filter-grid">
                    <div class="filter-field filter-search">
                        <label class="filter-label">Search lead</label>
                        <div class="filter-input-wrap">
                            <span class="filter-input-icon"><i class="fa fa-search"></i></span>
                            <input type="text" name="search" class="form-control form-control-custom"
                                placeholder="Search by name or email..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class="filter-field">
                        <label class="filter-label">Lead status</label>
                        <select name="status" class="form-select form-control-custom">
                            <option value="">All Statuses</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>New</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Read</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Follow Up</option>
                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Quoted</option>
                            <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Booked</option>
                        </select>
                    </div>

                    <div class="filter-field">
                        <label class="filter-label">Move size</label>
                        <select name="move_size" class="form-select form-control-custom">
                            <option value="">Any Size</option>
                            <option value="Studio" {{ request('move_size') == 'Studio' ? 'selected' : '' }}>Studio</option>
                            <option value="1 Bedroom Home" {{ request('move_size') == '1 Bedroom Home' ? 'selected' : '' }}>1 Bedroom Home</option>
                            <option value="2 Bedroom Home" {{ request('move_size') == '2 Bedroom Home' ? 'selected' : '' }}>2 Bedroom Home</option>
                            <option value="3 Bedroom Home" {{ request('move_size') == '3 Bedroom Home' ? 'selected' : '' }}>3 Bedroom Home</option>
                            <option value="4 Bedroom Home" {{ request('move_size') == '4 Bedroom Home' ? 'selected' : '' }}>4 Bedroom Home</option>
                        </select>
                    </div>

                    <div class="filter-field filter-dates">
                        <label class="filter-label">Moving date range</label>
                        <div class="date-range-wrap">
                            <span class="filter-input-icon"><i class="fa fa-calendar"></i></span>
                            <input type="date" name="date_from" class="form-control form-control-custom" value="{{ request('date_from') }}">
                            <input type="date" name="date_to" class="form-control form-control-custom" value="{{ request('date_to') }}">
                        </div>
                    </div>

                    <div class="filter-field filter-actions-field">
                        <label class="filter-label">Actions</label>
                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary filter-submit-btn">
                                <i class="fa fa-filter me-1"></i> Apply
                            </button>
                            <a href="{{ route('company.mover_leads') }}" class="filter-reset-btn" title="Reset filters">
                                <i class="fa fa-undo"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="export-bar">
            <a class="btn btn-success export-btn" href="{{ route('company.mover.quote.export-excel', ['from_date' => $exportFrom, 'to_date' => $exportTo]) }}">
                <i class="fa fa-file-excel-o"></i> Export Excel
            </a>

            <a class="btn btn-danger export-btn" href="{{ route('company.mover.quote.export-pdf', ['from_date' => $exportFrom, 'to_date' => $exportTo]) }}" target="_blank">
                <i class="fa fa-file-pdf"></i> Download PDF
            </a>
        </div>

        <div class="table-container" id="leadTable">
            <div class="table-toolbar">
                <div>
                    <h5>Lead Records</h5>
                    <small class="text-muted">Review lead details and update your sales stage.</small>
                </div>
                <span class="count-pill"><i class="fa fa-list"></i> {{ method_exists($mover_leads, 'total') ? $mover_leads->total() : $mover_leads->count() }} Leads</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-modern">
                    <thead>
                        <tr>
                            <th>Lead ID</th>
                            {{-- <th>Status</th> --}}
                            <th>Customer</th>
                            <th>Move Details</th>
                            <th>Route</th>
                            <th>Update Stage</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mover_leads as $index => $lead)
                            @php
                                $isWithinAllowance = $index < ($allowedLeads ?? 0);
                                $canShow = $isWithinAllowance || $lead->is_show == 1 || $lead->is_extra_paid;
                                $leadName = trim(($lead->name ?? '') . ' ' . ($lead->lastname ?? ''));
                                $initials = strtoupper(substr($lead->name ?? 'L', 0, 1) . substr($lead->lastname ?? '', 0, 1));
                                $stage = $canShow ? $lead->currentStage() : null;
                                $fromRoute = collect([$lead->ozip, $lead->ocity, $lead->ostate])->filter()->implode(', ');
                                $toRoute = collect([$lead->dzip, $lead->dcity, $lead->dstate])->filter()->implode(', ');
                            @endphp
                            <tr class="{{ !$canShow ? 'locked-row' : '' }}">
                                <td>
                                    <span class="lead-id-pill"><i class="fa fa-hashtag text-primary"></i>{{ 20000 + $lead->id }}</span>
                                </td>
                                {{-- <td>
                                    <span class="booking-badge"><i class="fa fa-circle"></i>{{ $lead->booking ?? 'New' }}</span>
                                </td> --}}
                                <td>
                                    @if ($canShow)
                                        <div class="customer-cell">
                                            <span class="avatar-bubble">{{ $initials ?: 'L' }}</span>
                                            <div>
                                                <div class="customer-name">{{ $leadName ?: 'Customer' }}</div>
                                                <div class="customer-email">{{ $lead->email }}</div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="locked-card">
                                            <span class="lock-icon"><i class="fa fa-lock"></i></span>
                                            Locked Record
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="move-detail-card">
                                        <strong>{{ $lead->move_size ?? 'Move size N/A' }}</strong>
                                        <span><i class="fa fa-calendar me-1"></i>{{ $lead->date ?? 'Date N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="route-box text-center">
                                        <div><span class="route-chip">{{ $fromRoute ?: 'Origin N/A' }}</span></div>
                                        <div class="route-arrow"><i class="fa fa-arrow-down"></i></div>
                                        <div><span class="route-chip">{{ $toRoute ?: 'Destination N/A' }}</span></div>
                                    </div>
                                </td>
                                <td>
                                    @if ($canShow)
                                        @if (!in_array($stage, ['booked', 'not_booked', 'bad_lead']))
                                            <form method="POST" action="{{ route('company.leads.updateFlow', $lead->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <select name="stage" class="form-select form-select-sm stage-select" onchange="this.form.submit()">
                                                    <option selected disabled>{{ ucfirst(str_replace('_', ' ', $stage)) }}</option>

                                                    @if ($stage === 'new')
                                                        <option value="follow_up">Move to Follow Up</option>
                                                    @endif

                                                    @if ($stage === 'follow_up')
                                                        <option value="quoted">Move to Quoted</option>
                                                        <option value="bad_lead">Mark as Bad Lead</option>
                                                    @endif

                                                    @if ($stage === 'quoted')
                                                        <option value="booked">Mark as Booked</option>
                                                        <option value="not_booked">Mark as Not Booked</option>
                                                    @endif
                                                </select>
                                            </form>
                                        @else
                                            <span class="stage-badge"><i class="fa fa-check-circle"></i>{{ ucfirst(str_replace('_', ' ', $stage)) }}</span>
                                        @endif
                                    @else
                                        <span class="text-muted fw-bold">—</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="action-group">
                                        @if ($lead->status == 0)
                                            <a href="{{ route('mover.contact.read', $lead->id) }}" class="btn btn-primary mark-read-btn">Mark Read</a>
                                        @endif

                                        @if ($canShow)
                                            <button type="button" class="btn-action" data-toggle="modal" data-target="#viewLeadModal" data-lead='@json($lead)' title="View Lead">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            @if ($lead->phone1)
                                                <a href="tel:{{ $lead->phone1 }}" class="btn-action" title="Call Lead">
                                                    <i class="fa fa-phone text-success"></i>
                                                </a>
                                            @endif
                                        @else
                                            @if ($isSubscriptionValid && $plan)
                                                <button type="button" class="btn unlock-pill unlock-btn" data-url="{{ route('company.leads.unlock-extra', $lead->id) }}">
                                                    <i class="fa fa-bolt"></i> Unlock ${{ number_format($extraLeadFee, 2) }}
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-outline-secondary disabled rounded-pill">
                                                    <i class="fa fa-lock"></i> Locked
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-icon"><i class="fa fa-search"></i></div>
                                        <h6 class="fw-bold text-dark mb-1">No leads found</h6>
                                        <p class="mb-0">No leads matched your current search or filter criteria.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewLeadModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5>Lead Details</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="lead-detail-feature mb-3">
                        <label>Full Name</label>
                        <span id="m-name" class="h5 mb-0 d-block"></span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="detail-box">
                                <label>Email Address</label>
                                <span id="m-email"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <label>Phone Number</label>
                                <span id="m-phone" class="text-success"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <label>Move From</label>
                                <span id="from"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <label>Move To</label>
                                <span id="to"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-box">
                                <label>Move Details</label>
                                <span id="details"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-light border rounded-4 w-100 fw-bold" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('[data-lead]').on('click', function() {
                const lead = JSON.parse($(this).attr('data-lead'));
                const fullName = [lead.name, lead.lastname].filter(Boolean).join(' ');

                $('#m-name').text(fullName || '-');
                $('#m-email').text(lead.email || '-');
                $('#m-phone').text(lead.phone1 || lead.phone_no || '-');
                $('#from').text(
                    [lead.ozip, lead.ocity, lead.ostate]
                        .filter(v => v && String(v).trim() !== '')
                        .join(', ') || '-'
                );
                $('#to').text(
                    [lead.dzip, lead.dcity, lead.dstate]
                        .filter(v => v && String(v).trim() !== '')
                        .join(', ') || '-'
                );
                $('#details').text(
                    (lead.move_size ?? '-') + ' | ' +
                    (lead.date ?? 'Date N/A')
                );
            });

            $('.unlock-btn').on('click', function() {
                const btn = $(this);
                const url = btn.data('url');
                const originalHtml = btn.html();

                btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Charging...');

                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message || 'Lead unlocked successfully.');
                            location.reload();
                            return;
                        }

                        alert(response.error || 'Something went wrong.');
                        btn.prop('disabled', false).html(originalHtml);
                    },
                    error: function(xhr) {
                        const err = xhr.responseJSON?.error || 'Something went wrong.';
                        alert('Error: ' + err);
                        btn.prop('disabled', false).html(originalHtml);
                    }
                });
            });
        });
    </script>
@endsection
