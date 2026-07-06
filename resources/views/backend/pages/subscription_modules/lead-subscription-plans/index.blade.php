@extends('backend.layouts.master')

@section('title')
Lead Plans - Admin Panel
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --lp-primary: #2563eb;
            --lp-primary-dark: #1d4ed8;
            --lp-bg: #f5f7fb;
            --lp-card: #ffffff;
            --lp-text: #0f172a;
            --lp-muted: #64748b;
            --lp-border: #e2e8f0;
            --lp-soft: #eff6ff;
            --lp-shadow: 0 18px 45px rgba(15, 23, 42, .08);
            --lp-shadow-sm: 0 10px 28px rgba(15, 23, 42, .06);
        }

        body {
            background: var(--lp-bg) !important;
        }

        .lead-plan-page {
            padding: 26px;
            color: var(--lp-text);
        }

        .lp-hero {
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            padding: 28px;
            background:
                radial-gradient(circle at 8% 10%, rgba(96, 165, 250, .34), transparent 28%),
                radial-gradient(circle at 92% 20%, rgba(124, 58, 237, .20), transparent 30%),
                linear-gradient(135deg, #0f172a 0%, #1e3a8a 48%, #2563eb 100%);
            box-shadow: var(--lp-shadow);
            color: #fff;
            margin-bottom: 24px;
        }

        .lp-hero:after {
            content: "";
            position: absolute;
            width: 340px;
            height: 340px;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 50%;
            right: -95px;
            bottom: -155px;
        }

        .lp-hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            flex-wrap: wrap;
        }

        .lp-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.18);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .lp-title {
            font-size: 30px;
            font-weight: 900;
            margin: 0;
            letter-spacing: -.04em;
        }

        .lp-subtitle {
            margin: 8px 0 0;
            color: rgba(255,255,255,.78);
            font-size: 14px;
            max-width: 620px;
        }

        .lp-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .lp-btn {
            border: 0;
            min-height: 44px;
            padding: 10px 16px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 800;
            font-size: 14px;
            text-decoration: none;
            transition: .2s ease;
            white-space: nowrap;
        }

        .lp-btn svg {
            width: 17px;
            height: 17px;
        }

        .lp-btn-primary {
            background: #ffffff;
            color: #1d4ed8;
            box-shadow: 0 12px 28px rgba(15, 23, 42, .14);
        }

        .lp-btn-primary:hover {
            transform: translateY(-1px);
            color: #1d4ed8;
        }

        .lp-btn-ghost {
            background: rgba(255,255,255,.12);
            color: #ffffff;
            border: 1px solid rgba(255,255,255,.22);
        }

        .lp-btn-ghost:hover {
            background: rgba(255,255,255,.18);
            color: #ffffff;
        }

        .lp-alert {
            border: 0;
            border-radius: 18px;
            box-shadow: var(--lp-shadow-sm);
            padding: 14px 16px;
            font-weight: 700;
        }

        .lp-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }

        .lp-stat-card {
            background: var(--lp-card);
            border: 1px solid var(--lp-border);
            border-radius: 22px;
            padding: 18px;
            box-shadow: var(--lp-shadow-sm);
            display: flex;
            gap: 13px;
            align-items: center;
            min-height: 96px;
        }

        .lp-stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: var(--lp-soft);
            color: var(--lp-primary);
            flex: 0 0 auto;
        }

        .lp-stat-icon svg {
            width: 20px;
            height: 20px;
        }

        .lp-stat-label {
            color: var(--lp-muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 4px;
        }

        .lp-stat-value {
            font-size: 24px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: -.03em;
        }

        .lp-card-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .lp-plan-card {
            position: relative;
            background: rgba(255,255,255,.92);
            border: 1px solid var(--lp-border);
            border-radius: 26px;
            overflow: hidden;
            box-shadow: var(--lp-shadow-sm);
            transition: .22s ease;
            min-height: 380px;
        }

        .lp-plan-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 24px 55px rgba(15, 23, 42, .12);
            border-color: rgba(37, 99, 235, .28);
        }

        .lp-plan-card:before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: 7px;
            background: linear-gradient(90deg, #64748b, #94a3b8);
        }

        .lp-plan-card.blue:before { background: linear-gradient(90deg, #2563eb, #60a5fa); }
        .lp-plan-card.green:before { background: linear-gradient(90deg, #16a34a, #86efac); }
        .lp-plan-card.purple:before { background: linear-gradient(90deg, #7c3aed, #c084fc); }
        .lp-plan-card.amber:before { background: linear-gradient(90deg, #d97706, #fbbf24); }
        .lp-plan-card.orange:before { background: linear-gradient(90deg, #ea580c, #fb923c); }

        .lp-plan-body {
            padding: 22px;
        }

        .lp-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .lp-plan-head {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .lp-plan-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: #eef2ff;
            color: var(--lp-primary);
            flex: 0 0 auto;
        }

        .lp-plan-icon svg {
            width: 22px;
            height: 22px;
        }

        .lp-plan-name {
            font-size: 18px;
            font-weight: 900;
            margin: 0;
            letter-spacing: -.02em;
        }

        .lp-plan-desc {
            color: var(--lp-muted);
            font-size: 13px;
            margin: 4px 0 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 210px;
        }

        .lp-status {
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .lp-status:before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }

        .lp-status.active {
            color: #15803d;
            background: #dcfce7;
        }

        .lp-status.inactive {
            color: #475569;
            background: #e2e8f0;
        }

        .lp-price-wrap {
            padding: 18px;
            border-radius: 22px;
            background: linear-gradient(180deg, #f8fafc, #ffffff);
            border: 1px solid var(--lp-border);
            margin-bottom: 18px;
        }

        .lp-price {
            font-size: 34px;
            font-weight: 950;
            letter-spacing: -.05em;
            line-height: 1;
            margin: 0;
        }

        .lp-price small {
            font-size: 13px;
            font-weight: 800;
            color: var(--lp-muted);
            letter-spacing: 0;
        }

        .lp-yearly {
            color: var(--lp-muted);
            font-weight: 700;
            margin-top: 8px;
            font-size: 13px;
        }

        .lp-detail-list {
            display: grid;
            gap: 10px;
            margin-bottom: 18px;
        }

        .lp-detail-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 13px;
        }

        .lp-detail-row span:first-child {
            color: var(--lp-muted);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
        }

        .lp-detail-row span:first-child svg {
            width: 15px;
            height: 15px;
        }

        .lp-detail-row span:last-child {
            color: var(--lp-text);
            font-weight: 900;
            text-align: right;
        }

        .lp-feature-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            min-height: 31px;
            margin-bottom: 18px;
        }

        .lp-feature-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border: 1px solid var(--lp-border);
            background: #f8fafc;
            color: #334155;
            border-radius: 999px;
            padding: 6px 9px;
            font-size: 11px;
            font-weight: 800;
        }

        .lp-feature-tag svg {
            width: 12px;
            height: 12px;
            color: #16a34a;
        }

        .lp-card-actions {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 8px;
            align-items: center;
        }

        .lp-action-btn {
            min-height: 42px;
            border-radius: 14px;
            border: 1px solid var(--lp-border);
            background: #fff;
            color: var(--lp-text);
            padding: 9px 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 900;
            font-size: 13px;
            transition: .18s ease;
            text-decoration: none;
        }

        .lp-action-btn:hover {
            border-color: rgba(37, 99, 235, .45);
            color: var(--lp-primary);
        }

        .lp-action-btn svg {
            width: 16px;
            height: 16px;
        }

        .lp-action-toggle.active {
            color: #92400e;
            background: #fffbeb;
            border-color: #fde68a;
        }

        .lp-action-toggle.inactive {
            color: #166534;
            background: #f0fdf4;
            border-color: #bbf7d0;
        }

        .lp-action-delete {
            color: #dc2626;
            background: #fff5f5;
            border-color: #fecaca;
            min-width: 42px;
        }

        .lp-create-card {
            border: 1.5px dashed #bfdbfe;
            background:
                radial-gradient(circle at 50% 0%, rgba(37,99,235,.12), transparent 35%),
                rgba(255,255,255,.78);
            border-radius: 26px;
            min-height: 380px;
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: .22s ease;
            box-shadow: var(--lp-shadow-sm);
        }

        .lp-create-card:hover {
            transform: translateY(-4px);
            border-color: var(--lp-primary);
            background: #ffffff;
            box-shadow: 0 24px 55px rgba(15, 23, 42, .12);
        }

        .lp-create-inner {
            text-align: center;
            padding: 24px;
        }

        .lp-create-icon {
            width: 64px;
            height: 64px;
            border-radius: 22px;
            margin: 0 auto 14px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            color: var(--lp-primary);
        }

        .lp-create-icon svg {
            width: 28px;
            height: 28px;
        }

        .lp-create-title {
            margin: 0;
            font-size: 17px;
            font-weight: 900;
        }

        .lp-create-text {
            color: var(--lp-muted);
            margin: 6px 0 0;
            font-size: 13px;
        }

        .lp-panel {
            background: #fff;
            border: 1px solid var(--lp-border);
            border-radius: 26px;
            box-shadow: var(--lp-shadow-sm);
            margin-top: 24px;
            overflow: hidden;
        }

        .lp-panel-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--lp-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: linear-gradient(180deg, #ffffff, #f8fafc);
        }

        .lp-panel-title {
            font-size: 18px;
            font-weight: 900;
            margin: 0;
            letter-spacing: -.02em;
        }

        .lp-panel-subtitle {
            color: var(--lp-muted);
            margin: 5px 0 0;
            font-size: 13px;
        }

        .lp-table {
            margin: 0;
        }

        .lp-table th {
            background: #f8fafc !important;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .04em;
            border-bottom: 1px solid var(--lp-border) !important;
            padding: 15px 18px !important;
        }

        .lp-table td {
            border-bottom: 1px solid #f1f5f9 !important;
            padding: 16px 18px !important;
            font-size: 13px;
            vertical-align: middle;
        }

        .lp-table tr:last-child td {
            border-bottom: 0 !important;
        }

        .lp-feature-cell {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #334155;
            font-weight: 900;
        }

        .lp-feature-cell svg {
            width: 16px;
            height: 16px;
            color: var(--lp-primary);
        }

        .modal-backdropx {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .62);
            backdrop-filter: blur(10px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 18px;
        }

        .modalx {
            width: 760px;
            max-width: 100%;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(15, 23, 42, .28);
            border: 1px solid rgba(255,255,255,.5);
        }

        .modalx-header {
            padding: 22px 24px;
            background:
                radial-gradient(circle at 8% 0%, rgba(37, 99, 235, .18), transparent 36%),
                linear-gradient(180deg, #ffffff, #f8fafc);
            border-bottom: 1px solid var(--lp-border);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .modalx-title {
            font-size: 20px;
            font-weight: 950;
            margin: 0;
            letter-spacing: -.03em;
        }

        .modalx-sub {
            color: var(--lp-muted);
            margin: 6px 0 0;
            font-size: 13px;
            font-weight: 600;
        }

        .modalx-close {
            width: 38px;
            height: 38px;
            border-radius: 13px;
            border: 1px solid var(--lp-border);
            background: #fff;
            color: #334155;
            font-weight: 900;
        }

        .modalx-body {
            padding: 22px 24px;
            max-height: 64vh;
            overflow-y: auto;
        }

        .modalx-footer {
            padding: 18px 24px;
            border-top: 1px solid var(--lp-border);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            background: #f8fafc;
        }

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            font-weight: 950;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: #1e3a8a;
            margin: 18px 0 10px;
        }

        .form-section-title:first-child {
            margin-top: 0;
        }

        .form-section-title svg {
            width: 16px;
            height: 16px;
        }

        .grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .field label {
            color: #334155 !important;
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .field label small {
            font-weight: 700;
            color: var(--lp-muted) !important;
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;
            border: 1px solid var(--lp-border);
            border-radius: 15px;
            padding: 12px 13px;
            outline: none;
            font-size: 14px;
            color: var(--lp-text);
            background: #fff;
            transition: .18s ease;
        }

        .field textarea {
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: rgba(37, 99, 235, .65);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .mt14 { margin-top: 14px; }

        .lp-modal-btn {
            border: 1px solid var(--lp-border);
            background: #fff;
            color: var(--lp-text);
            border-radius: 14px;
            padding: 11px 16px;
            font-weight: 900;
        }

        .lp-modal-btn.primary {
            border-color: var(--lp-primary);
            background: linear-gradient(135deg, var(--lp-primary), var(--lp-primary-dark));
            color: #fff;
            box-shadow: 0 12px 25px rgba(37, 99, 235, .22);
        }

        @media (max-width: 1200px) {
            .lp-card-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lp-stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 768px) {
            .lead-plan-page { padding: 16px; }
            .lp-hero { padding: 22px; border-radius: 22px; }
            .lp-title { font-size: 24px; }
            .lp-card-grid,
            .lp-stats-grid,
            .grid2 { grid-template-columns: 1fr; }
            .lp-card-actions { grid-template-columns: 1fr; }
            .lp-action-delete { width: 100%; }
            .modalx-body { max-height: 66vh; }
            .modalx-footer { flex-direction: column-reverse; }
            .lp-modal-btn { width: 100%; }
        }
    </style>
@endsection

@section('admin-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $totalPlans = $plans->count();
        $activePlans = $plans->where('is_active', 1)->count();
        $disabledPlans = $totalPlans - $activePlans;
        $totalMonthlyRevenue = $plans->sum('monthly_price_cents') / 100;

        $svgIcon = function ($icon = 'package') {
            $icons = [
                'package' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7"></path><path d="m7.5 4.27 9 5.15"></path></svg>',
                'zap' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
                'crown' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"></path><path d="M5 21h14"></path></svg>',
                'rocket' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>',
            ];

            return $icons[$icon] ?? $icons['package'];
        };
    @endphp

    <div class="lead-plan-page">
        <div class="lp-hero">
            <div class="lp-hero-content">
                <div>
                    <div class="lp-kicker">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"></path><path d="m19 9-5 5-4-4-3 3"></path></svg>
                        Lead Subscription Manager
                    </div>
                    <h1 class="lp-title">Lead Plans</h1>
                    <p class="lp-subtitle">Configure partner pricing, included monthly leads, annual billing, overage fees, and plan visibility from one clean dashboard.</p>
                </div>

                <div class="lp-actions">
                    <button type="button" class="lp-btn lp-btn-ghost" onclick="document.getElementById('resetDefaultsForm')?.submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
                        Reset Defaults
                    </button>
                    <button type="button" class="lp-btn lp-btn-primary" onclick="openPlanModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        Create Plan
                    </button>
                </div>
            </div>
        </div>

        <form id="resetDefaultsForm" method="POST" action="{{ route('admin.lead_plans.store') }}" style="display:none;">
            @csrf
        </form>

        @if (session('success'))
            <div class="alert alert-success lp-alert mb-4">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger lp-alert mb-4">
                <strong>Please fix these errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="lp-stats-grid">
            <div class="lp-stat-card">
                <div class="lp-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><path d="M3.27 6.96 12 12.01l8.73-5.05"></path><path d="M12 22.08V12"></path></svg>
                </div>
                <div>
                    <div class="lp-stat-label">Total Plans</div>
                    <div class="lp-stat-value">{{ $totalPlans }}</div>
                </div>
            </div>
            <div class="lp-stat-card">
                <div class="lp-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
                </div>
                <div>
                    <div class="lp-stat-label">Active</div>
                    <div class="lp-stat-value">{{ $activePlans }}</div>
                </div>
            </div>
            <div class="lp-stat-card">
                <div class="lp-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                <div>
                    <div class="lp-stat-label">Monthly Value</div>
                    <div class="lp-stat-value">${{ number_format($totalMonthlyRevenue, 0) }}</div>
                </div>
            </div>
            <div class="lp-stat-card">
                <div class="lp-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </div>
                <div>
                    <div class="lp-stat-label">Disabled</div>
                    <div class="lp-stat-value">{{ $disabledPlans }}</div>
                </div>
            </div>
        </div>

        <div class="lp-card-grid">
            @foreach ($plans as $plan)
                @php
                    $features = collect(preg_split('/\r\n|\r|\n/', (string) $plan->included_features))->filter()->take(3);
                @endphp

                <div class="lp-plan-card {{ $plan->color ?: 'gray' }}">
                    <div class="lp-plan-body">
                        <div class="lp-card-top">
                            <div class="lp-plan-head">
                                <div class="lp-plan-icon">
                                    {!! $svgIcon($plan->icon) !!}
                                </div>
                                <div class="min-w-0">
                                    <h3 class="lp-plan-name">{{ $plan->name }}</h3>
                                    <p class="lp-plan-desc">{{ $plan->description ?: 'No description added' }}</p>
                                </div>
                            </div>
                            <span class="lp-status {{ $plan->is_active ? 'active' : 'inactive' }}">
                                {{ $plan->is_active ? 'Active' : 'Disabled' }}
                            </span>
                        </div>

                        <div class="lp-price-wrap">
                            <p class="lp-price">
                                ${{ number_format(($plan->monthly_price_cents ?? 0) / 100, 2) }}
                                <small>/mo</small>
                            </p>
                            <div class="lp-yearly">${{ number_format(($plan->annual_price_cents ?? 0) / 100, 2) }}/yr</div>
                        </div>

                        <div class="lp-detail-list">
                            <div class="lp-detail-row">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    Leads / Month
                                </span>
                                <span>{{ number_format($plan->leads_per_month) }}</span>
                            </div>
                            <div class="lp-detail-row">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                                    Extra Lead Fee
                                </span>
                                <span>${{ number_format(($plan->extra_lead_fee_cents ?? 0) / 100, 2) }}</span>
                            </div>
                            <div class="lp-detail-row">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    Best For
                                </span>
                                <span>{{ $plan->target_audience ?: '—' }}</span>
                            </div>
                        </div>

                        <div class="lp-feature-tags">
                            @forelse ($features as $feature)
                                <span class="lp-feature-tag">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
                                    {{ $feature }}
                                </span>
                            @empty
                                <span class="lp-feature-tag">No features listed</span>
                            @endforelse
                        </div>

                        <div class="lp-card-actions">
                            <button type="button" class="lp-action-btn" onclick='openPlanModal(@json($plan))'>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"></path></svg>
                                Edit Plan
                            </button>

                            <form method="POST" action="{{ route('admin.lead_plans.toggle', $plan) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="lp-action-btn lp-action-toggle {{ $plan->is_active ? 'active' : 'inactive' }}">
                                    {{ $plan->is_active ? 'Disable' : 'Enable' }}
                                </button>
                            </form>

                            @if($plan->name != 'Starter')
                                <form method="POST" action="{{ route('admin.lead_plans.destroy', $plan) }}" class="d-inline" onsubmit="return confirm('Delete this plan?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="lp-action-btn lp-action-delete" title="Delete plan">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                    </button>
                                </form>
                            @else
                                <button type="button" class="lp-action-btn" disabled title="Starter plan cannot be deleted">Lock</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($plans->count() < 1) 
                <div class="lp-create-card" onclick="openPlanModal()">
                    <div class="lp-create-inner">
                        <div class="lp-create-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        </div>
                        <p class="lp-create-title">Create New Plan</p>
                        <p class="lp-create-text">Add a custom lead plan with pricing, features, colors, and Stripe sync.</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="lp-panel">
            <div class="lp-panel-header">
                <div>
                    <h3 class="lp-panel-title">Plan Comparison</h3>
                    <p class="lp-panel-subtitle">Quick overview of all configured lead plans</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table lp-table align-middle">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            @foreach ($plans as $plan)
                                <th class="text-center">{{ $plan->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="lp-feature-cell"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>Monthly Price</span></td>
                            @foreach ($plans as $plan)
                                <td class="text-center fw-bold">${{ number_format(($plan->monthly_price_cents ?? 0) / 100, 2) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><span class="lp-feature-cell"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>Annual Price</span></td>
                            @foreach ($plans as $plan)
                                <td class="text-center fw-bold">${{ number_format(($plan->annual_price_cents ?? 0) / 100, 2) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><span class="lp-feature-cell"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>Leads per Month</span></td>
                            @foreach ($plans as $plan)
                                <td class="text-center">{{ number_format($plan->leads_per_month) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><span class="lp-feature-cell"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>Extra Lead Fee</span></td>
                            @foreach ($plans as $plan)
                                <td class="text-center">${{ number_format(($plan->extra_lead_fee_cents ?? 0) / 100, 2) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><span class="lp-feature-cell"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Best For</span></td>
                            @foreach ($plans as $plan)
                                <td class="text-center small">{{ $plan->target_audience ?: '—' }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal-backdropx" id="planModal">
            <div class="modalx">
                <div class="modalx-header">
                    <div>
                        <p class="modalx-title" id="modalTitle">Create New Lead Plan</p>
                        <p class="modalx-sub">Configure lead limits, pricing, Stripe product sync, features, and card design.</p>
                    </div>
                    <button type="button" class="modalx-close" onclick="closePlanModal()">✕</button>
                </div>

                <form method="POST" id="planForm" action="{{ route('admin.lead_plans.store') }}">
                    @csrf

                    <div class="modalx-body">
                        <div class="form-section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                            Plan Details
                        </div>

                        <div class="grid2">
                            <div class="field">
                                <label>Plan Name</label>
                                <input name="name" id="name" placeholder="e.g., Starter" required>
                            </div>
                            <div class="field">
                                <label>Target Audience</label>
                                <input name="target_audience" id="target_audience" placeholder="Small/local movers">
                            </div>
                        </div>

                        <div class="field mt14">
                            <label>Description</label>
                            <textarea name="description" id="description" rows="2" placeholder="Short description shown under the plan name"></textarea>
                        </div>

                        <div class="form-section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"></path><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Pricing
                        </div>

                        <div class="grid2">
                            <div class="field">
                                <label>Monthly Price ($)</label>
                                <input type="number" step="0.01" min="0" name="monthly_price_cents" id="monthly_price_cents" required>
                            </div>
                            <div class="field">
                                <label>Annual Price ($)</label>
                                <input type="number" step="0.01" min="0" name="annual_price_cents" id="annual_price_cents" required>
                            </div>
                        </div>

                        <div class="grid2 mt14">
                            <div class="field">
                                <label>Leads per Month</label>
                                <input type="number" min="0" name="leads_per_month" id="leads_per_month" required>
                            </div>
                            <div class="field">
                                <label>Extra Lead Fee ($)</label>
                                <input type="number" step="0.01" min="0" name="extra_lead_fee_cents" id="extra_lead_fee_cents" required>
                            </div>
                        </div>

                        <div class="form-section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path></svg>
                            Design & Features
                        </div>

                        <div class="field">
                            <label>
                                Included Features
                                <small>One feature per line</small>
                            </label>
                            <textarea name="included_features" id="included_features" rows="4" placeholder="Verified leads&#10;Email notifications&#10;Priority routing"></textarea>
                        </div>

                        <div class="grid2 mt14">
                            <div class="field">
                                <label>Icon</label>
                                <select name="icon" id="icon">
                                    <option value="package">Package</option>
                                    <option value="zap">Zap</option>
                                    <option value="crown">Crown</option>
                                    <option value="rocket">Rocket</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Color</label>
                                <select name="color" id="color">
                                    <option value="gray">Gray</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                    <option value="purple">Purple</option>
                                    <option value="amber">Amber</option>
                                    <option value="orange">Orange</option>
                                </select>
                            </div>
                        </div>

                        <div class="field mt14">
                            <label>Display Order</label>
                            <input type="number" name="display_order" id="display_order" value="0" min="0">
                        </div>
                    </div>

                    <div class="modalx-footer">
                        <button type="button" class="lp-modal-btn" onclick="closePlanModal()">Cancel</button>
                        <button type="submit" class="lp-modal-btn primary" id="submitBtn">Create Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('planModal');
        const form = document.getElementById('planForm');
        const submitBtn = document.getElementById('submitBtn');
        const modalTitle = document.getElementById('modalTitle');

        function openPlanModal(plan = null) {
            modal.style.display = 'flex';
            form.action = "{{ route('admin.lead_plans.store') }}";
            submitBtn.innerText = 'Create Plan';
            modalTitle.innerText = 'Create New Lead Plan';
            form.querySelector('input[name=_method]')?.remove();
            form.reset();

            document.getElementById('included_features').value = "Verified leads\nEmail notifications";
            document.getElementById('display_order').value = 0;

            if (plan) {
                form.action = `/admin/lead-plans/${plan.id}`;
                submitBtn.innerText = 'Update Plan';
                modalTitle.innerText = 'Edit Lead Plan';
                form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');

                document.getElementById('name').value = plan.name || '';
                document.getElementById('description').value = plan.description || '';
                document.getElementById('leads_per_month').value = plan.leads_per_month || 0;
                document.getElementById('extra_lead_fee_cents').value = ((plan.extra_lead_fee_cents || 0) / 100).toFixed(2);
                document.getElementById('monthly_price_cents').value = ((plan.monthly_price_cents || 0) / 100).toFixed(2);
                document.getElementById('annual_price_cents').value = ((plan.annual_price_cents || 0) / 100).toFixed(2);
                document.getElementById('target_audience').value = plan.target_audience || '';
                document.getElementById('included_features').value = plan.included_features || '';
                document.getElementById('icon').value = plan.icon || 'package';
                document.getElementById('color').value = plan.color || 'gray';
                document.getElementById('display_order').value = plan.display_order || 0;
            }
        }

        function closePlanModal() {
            modal.style.display = 'none';
        }

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closePlanModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closePlanModal();
            }
        });
    </script>
@endsection
