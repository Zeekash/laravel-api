@extends('company.layouts.master')
@section('title', 'Profile Editor')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #E8521A;
            --orange-hover: #D44510;
            --orange-light: #FDECEA;
            --navy: #0D1B38;
            --gray-bg: #F8F9FD;
            --border-color: #E5E7EB;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
            --font-main: 'DM Sans', sans-serif;
            --font-head: 'Sora', sans-serif;
        }

        .main-content-inner {
            background-color: var(--gray-bg);
            padding: 0;
            font-family: var(--font-main);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* Top Header Area (Overrides default page-title-area) */
        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 16px 32px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .profile-title {
            font-family: var(--font-head);
            font-size: 20px;
            font-weight: 800;
            color: var(--navy);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-outline {
            background: white;
            border: 1.5px solid var(--border-color);
            color: var(--text-dark);
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background: #F9FAFB;
        }

        .company-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #F3F4F6;
            padding: 6px 12px 6px 6px;
            border-radius: 8px;
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
        .profile-container {
            /* max-width: 1200px; */
            /* margin: 0 auto; */
            padding: 32px;
            padding-bottom: 100px;
        }

        /* Alerts */
        .alert-banner {
            background: #FEF3C7;
            border: 1px solid #FDE68A;
            border-radius: 8px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            color: #92400E;
            font-weight: 500;
            font-size: 14px;
        }

        .alert-banner.notice {
            background: #FFFBEB;
            border-color: #FEF08A;
            color: #B45309;
            justify-content: flex-start;
            gap: 10px;
        }

        .alert-actions {
            display: flex;
            gap: 12px;
        }

        .btn-orange {
            background: var(--orange);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-orange:hover {
            background: var(--orange-hover);
        }

        .btn-yellow-outline {
            background: transparent;
            color: #B45309;
            border: 1px solid #FCD34D;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-yellow-outline:hover {
            background: #FEF3C7;
        }

        /* Cards */
        .profile-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            margin-bottom: 24px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .card-header {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
            background: #F9FAFB;
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-head);
            font-weight: 700;
            font-size: 15px;
            color: var(--navy);
        }

        .card-body {
            padding: 24px;
        }

        /* Logo Upload Area */
        .logo-upload-area {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .logo-preview-box {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-img-box {
            width: 80px;
            height: 80px;
            background: var(--navy);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-head);
            font-size: 24px;
            font-weight: 700;
            overflow: hidden;
        }

        .logo-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logo-details {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .logo-name {
            font-weight: 700;
            color: var(--navy);
            font-size: 15px;
        }

        .logo-meta {
            font-size: 12px;
            color: var(--text-muted);
        }

        .logo-actions {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .logo-actions .btn-outline {
            padding: 6px 12px;
            font-size: 13px;
        }

        .logo-requirements {
            font-size: 12px;
            color: var(--text-muted);
            text-align: right;
            max-width: 250px;
            line-height: 1.5;
        }

        /* Form Inputs */
        .form-row {
            display: flex;
            gap: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
            position: relative;
            margin-bottom: 0 !important;
        }

        .form-label {
            font-weight: 800;
            font-size: 11px;
            color: var(--navy);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .label-badge {
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 600;
        }

        .badge-locked {
            background: #FEF3C7;
            color: #92400E;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .badge-optional {
            background: #F3F4F6;
            color: var(--text-muted);
        }

        .form-input {
            padding: 9px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            font-family: var(--font-main);
            color: var(--text-dark);
            outline: none;
            transition: 0.2s;
            width: 100%;
        }

        .form-input:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(232,82,26,0.1);
        }

        .form-input[readonly] {
            background: #F9FAFB;
            color: var(--text-muted);
        }

        textarea.form-input {
            resize: vertical;
            /* min-height: 100px; */
        }

        .char-counter {
            font-size: 11px;
            color: var(--text-muted);
            position: absolute;
            right: 0;
            top: 0;
        }

        /* Checkbox Grid */
        .services-section {
            margin-bottom: 24px;
        }

        .services-title {
            font-weight: 700;
            font-size: 13px;
            color: var(--navy);
            margin-bottom: 12px;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .checkbox-label:hover {
            background: #F9FAFB;
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--orange);
            cursor: pointer;
        }

        .checkbox-label.checked {
            border-color: var(--orange);
            color: var(--orange);
            background: #FFF5F2;
        }

        /* Sticky Footer */
        .sticky-footer {
            position: fixed;
            bottom: 0;
            left: 280px; /* Adjust if sidebar is different */
            right: 0;
            background: white;
            border-top: 1px solid var(--border-color);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 40;
            box-shadow: 0 -4px 6px -1px rgba(0,0,0,0.05);
        }

        .footer-text {
            font-size: 13px;
            color: var(--text-muted);
        }

        .footer-text span {
            color: var(--orange);
            font-weight: 600;
        }

        .footer-actions {
            display: flex;
            gap: 16px;
        }
        
        .page-title-area {
            display: none; /* Hide default title area from layout */
        }
    </style>
@endsection

@section('content')
<form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data" id="profile-form">
    @method('post')
    @csrf
    
    <!-- Hidden fields for required data not shown in UI -->
    <input type="hidden" name="email" value="{{ old('email', $company->email) }}">
    <input type="hidden" name="company_reg_no" value="{{ old('company_reg_no', $company->company_reg_no) }}">
    <input type="hidden" name="local_license_no" value="{{ old('local_license_no', $company->local_license_no) }}">
    <input type="hidden" name="country_id" value="{{ optional($company->country)->name ?? '' }}">
    
    <!-- Top Header -->
    <div class="profile-header">
        <h1 class="profile-title">Profile Editor</h1>
        <div class="header-actions">
            <button type="button" class="btn-outline">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                Preview Profile
            </button>
            <div class="company-badge">
                <div class="company-initials">{{ strtoupper(substr($company->company_name ?? 'C', 0, 2)) }}</div>
                <div class="company-name">{{ $company->company_name ?? 'Company Name' }}</div>
            </div>
        </div>
    </div>

    <div class="profile-container">
        @include('company.layouts.partials.messages')

        <!-- Alerts -->
        <!-- <div class="alert-banner">
            <div style="display:flex; align-items:center; gap:8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                You have unsaved changes
            </div>
            <div class="alert-actions">
                <button type="submit" class="btn-orange">Save Now</button>
                <button type="button" class="btn-yellow-outline">Discard</button>
            </div>
        </div> -->

        <div class="alert-banner notice">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <strong>USDOT and ICC MC are locked after approval.</strong> To update these, please contact MMJ support.
        </div>

        <!-- Card: Company Logo -->
        <div class="profile-card">
            <div class="card-header">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                Company Logo
            </div>
            <div class="card-body">
                <div class="logo-upload-area">
                    <div class="logo-preview-box">
                        <div class="logo-img-box">
                            {{ strtoupper(substr($company->company_name ?? 'C', 0, 2)) }}
                        </div>
                        <div class="logo-details">
                            <div class="logo-name">{{ $company->image ? $company->image : 'No logo uploaded' }}</div>
                            <div class="logo-meta">PNG or JPG · Uploaded previously</div>
                            <div class="logo-actions">
                                <label class="btn-orange" style="cursor: pointer; margin: 0; padding: 6px 12px;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                    Change Logo
                                    <input type="file" name="image" accept=".png,.jpg,.jpeg,.webp" style="display: none;">
                                </label>
                                <button type="button" class="btn-outline">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Preview
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="logo-requirements">
                        PNG or JPG · Min 200x200px · Max 2MB. Logo appears on your profile, listing card, and all ad templates.
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Business Information -->
        <div class="profile-card">
            <div class="card-header">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Business Information
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" class="form-input" value="{{ old('company_name', $company->company_name) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            USDOT Number
                            <span class="label-badge badge-locked"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Locked</span>
                        </label>
                        <input type="text" name="us_dot_no" class="form-input" value="{{ old('us_dot_no', $company->us_dot_no) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            ICC MC Licence
                            <span class="label-badge badge-locked"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Locked</span>
                        </label>
                        <input type="text" name="icc_mc_license_no" class="form-input" value="{{ old('icc_mc_license_no', $company->icc_mc_license_no) }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">State
                            <span class="label-badge badge-locked"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Locked</span>
                        </label>
                        <input type="text" name="state_id" class="form-input" value="{{ optional($company->state)->name ?? 'Not Available' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">City
                            <span class="label-badge badge-locked"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Locked</span>
                        </label>
                        <input type="text" name="city_id" class="form-input" value="{{ optional($company->city)->name ?? 'Not Available' }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" name="company_address" class="form-input" value="{{ old('company_address', $company->company_address) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="phone_no" class="form-input" value="{{ old('phone_no', $company->phone_no) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Additional Contact
                            <span class="label-badge badge-optional">optional</span>
                        </label>
                        <input type="text" name="additional_phone_no" class="form-input" value="{{ old('additional_phone_no', $company->additional_phone_no) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Info Email</label>
                        <input type="email" name="company_email" class="form-input" value="{{ old('company_email', $company->company_email) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Website URL</label>
                        <input type="url" name="company_website" class="form-input" value="{{ old('company_website', $company->company_website) }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: About & Description -->
        <div class="profile-card">
            <div class="card-header">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                About & Description
            </div>
            <div class="card-body">
                <div class="form-row" style="margin-bottom: 30px;">
                    <div class="form-group">
                        <label class="form-label">
                            About Your Company
                            <span class="char-counter" id="about_counter">0/1000</span>
                        </label>
                        <textarea name="about_company" id="about_company" class="form-input" maxlength="1000" rows="4">{{ old('about_company', $company->about_company) }}</textarea>
                    </div>
                </div>
                <div class="form-row mb-0">
                    <div class="form-group">
                        <label class="form-label">
                            Company Info
                            <span class="label-badge badge-optional">optional</span>
                            <span class="char-counter" id="info_counter">0/500</span>
                        </label>
                        <textarea name="company_info" id="company_info" class="form-input" maxlength="500" rows="3" placeholder="Additional USPs, history, or specialties...">{{ old('company_info', $company->company_info) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Services Offered -->
        <div class="profile-card">
            <div class="card-header">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Services Offered
            </div>
            <div class="card-body">
                <div class="services-section">
                    <div class="services-title">Move Types</div>
                    <div class="checkbox-grid">
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Local Moving" {{ in_array('Local Moving', $selectedServices ?? []) ? 'checked' : '' }}> Local Moving</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Long Distance" {{ in_array('Long Distance', $selectedServices ?? []) ? 'checked' : '' }}> Long Distance</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Interstate" {{ in_array('Interstate', $selectedServices ?? []) ? 'checked' : '' }}> Interstate</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="International" {{ in_array('International', $selectedServices ?? []) ? 'checked' : '' }}> International</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Commercial" {{ in_array('Commercial', $selectedServices ?? []) ? 'checked' : '' }}> Commercial</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Packing Only" {{ in_array('Packing Only', $selectedServices ?? []) ? 'checked' : '' }}> Packing Only</label>
                        <label class="checkbox-label"><input type="checkbox" name="services[]" value="Storage" {{ in_array('Storage', $selectedServices ?? []) ? 'checked' : '' }}> Storage</label>
                    </div>
                </div>

                <div class="services-section" style="margin-bottom: 0;">
                    <div class="services-title">Specialty Services</div>
                    <div class="checkbox-grid">
                        <label class="checkbox-label"><input type="checkbox" name="specialty[]" value="Piano Moving" {{ in_array('Piano Moving', $selectedServices ?? []) ? 'checked' : '' }}> Piano Moving</label>
                        <label class="checkbox-label"><input type="checkbox" name="specialty[]" value="Antiques & Fine Art" {{ in_array('Antiques & Fine Art', $selectedServices ?? []) ? 'checked' : '' }}> Antiques & Fine Art</label>
                        <label class="checkbox-label"><input type="checkbox" name="specialty[]" value="Vehicle Transport" {{ in_array('Vehicle Transport', $selectedServices ?? []) ? 'checked' : '' }}> Vehicle Transport</label>
                        <label class="checkbox-label"><input type="checkbox" name="specialty[]" value="Senior Moving" {{ in_array('Senior Moving', $selectedServices ?? []) ? 'checked' : '' }}> Senior Moving</label>
                        <label class="checkbox-label"><input type="checkbox" name="specialty[]" value="Military Moves" {{ in_array('Military Moves', $selectedServices ?? []) ? 'checked' : '' }}> Military Moves</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Change Password -->
        <div class="profile-card" id="password-section">
            <div class="card-header">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Change Password
            </div>
            <div class="card-body">
                <p style="font-size:13px;color:var(--text-muted,#6B7280);margin-bottom:20px;">
                    Leave these fields empty if you do not want to change your password.
                </p>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <div style="position:relative;">
                            <input type="password" name="current_password" id="current_password" class="form-input" placeholder="Enter current password" style="padding-right:44px;">
                            <button type="button" onclick="togglePwd('current_password',this)" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9CA3AF;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div style="position:relative;">
                            <input type="password" name="new_password" id="new_password" class="form-input" placeholder="Min 8 characters" style="padding-right:44px;" oninput="checkPwdStrength(this.value)">
                            <button type="button" onclick="togglePwd('new_password',this)" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9CA3AF;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                        <!-- Strength bar -->
                        <div id="pwd-strength-bar" style="margin-top:6px;height:4px;border-radius:4px;background:#E5E7EB;overflow:hidden;display:none;">
                            <div id="pwd-strength-fill" style="height:100%;width:0%;border-radius:4px;transition:width 0.3s,background 0.3s;"></div>
                        </div>
                        <div id="pwd-strength-label" style="font-size:11px;margin-top:4px;"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <div style="position:relative;">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-input" placeholder="Re-enter new password" style="padding-right:44px;" oninput="checkPwdMatch()">
                            <button type="button" onclick="togglePwd('new_password_confirmation',this)" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#9CA3AF;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                        <div id="pwd-match-label" style="font-size:11px;margin-top:4px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Sticky Footer -->
    <div class="sticky-footer">
        <div class="footer-text">
            Changes go live on the consumer website <span>immediately</span> after saving
        </div>
        <div class="footer-actions">
            <button type="button" class="btn-outline">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                Preview Profile
            </button>
            <button type="submit" class="btn-orange">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
                Save Changes
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counters
    const aboutInput = document.getElementById('about_company');
    const aboutCounter = document.getElementById('about_counter');
    const infoInput = document.getElementById('company_info');
    const infoCounter = document.getElementById('info_counter');

    function updateCounter(input, counterElement, max) {
        if(input && counterElement) {
            counterElement.textContent = input.value.length + '/' + max;
        }
    }

    if(aboutInput) {
        updateCounter(aboutInput, aboutCounter, 1000);
        aboutInput.addEventListener('input', () => updateCounter(aboutInput, aboutCounter, 1000));
    }
    
    if(infoInput) {
        updateCounter(infoInput, infoCounter, 500);
        infoInput.addEventListener('input', () => updateCounter(infoInput, infoCounter, 500));
    }

    // Checkbox active states
    const checkboxes = document.querySelectorAll('.checkbox-label input[type="checkbox"]');
    checkboxes.forEach(cb => {
        // Initial state
        if(cb.checked) {
            cb.closest('.checkbox-label').classList.add('checked');
        }

        // Change event
        cb.addEventListener('change', function() {
            if(this.checked) {
                this.closest('.checkbox-label').classList.add('checked');
            } else {
                this.closest('.checkbox-label').classList.remove('checked');
            }
        });
    });

    // Handle sticky footer width based on sidebar
    const sidebar = document.querySelector('.sidebar');
    const stickyFooter = document.querySelector('.sticky-footer');
    
    function updateFooterPosition() {
        if(stickyFooter) {
            if(window.innerWidth <= 768) {
                stickyFooter.style.left = '0';
            } else {
                // Sidebar width is usually 280px in this theme
                stickyFooter.style.left = sidebar && sidebar.classList.contains('open') ? '0' : '280px';
            }
        }
    }

    updateFooterPosition();
    window.addEventListener('resize', updateFooterPosition);
    
    // If there's a sidebar toggle button
    const menuBtn = document.getElementById('menu-btn');
    if(menuBtn) {
        menuBtn.addEventListener('click', () => {
            setTimeout(updateFooterPosition, 350); // wait for transition
        });
    }
});

// ---- Password helpers ----
function togglePwd(fieldId, btn) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    const isText = field.type === 'text';
    field.type = isText ? 'password' : 'text';
    btn.style.color = isText ? '#9CA3AF' : '#E8521A';
}

function checkPwdStrength(val) {
    const bar   = document.getElementById('pwd-strength-bar');
    const fill  = document.getElementById('pwd-strength-fill');
    const label = document.getElementById('pwd-strength-label');
    if (!bar) return;
    if (!val) { bar.style.display = 'none'; label.textContent = ''; return; }
    bar.style.display = 'block';
    let score = 0;
    if (val.length >= 8)              score++;
    if (/[A-Z]/.test(val))            score++;
    if (/[0-9]/.test(val))            score++;
    if (/[^A-Za-z0-9]/.test(val))    score++;
    const levels = [
        { pct:'25%', color:'#EF4444', text:'Weak' },
        { pct:'50%', color:'#F59E0B', text:'Fair' },
        { pct:'75%', color:'#3B82F6', text:'Good' },
        { pct:'100%',color:'#10B981', text:'Strong' },
    ];
    const lvl = levels[score - 1] || levels[0];
    fill.style.width      = lvl.pct;
    fill.style.background = lvl.color;
    label.style.color     = lvl.color;
    label.textContent     = lvl.text;
    checkPwdMatch();
}

function checkPwdMatch() {
    const np  = document.getElementById('new_password');
    const nc  = document.getElementById('new_password_confirmation');
    const lbl = document.getElementById('pwd-match-label');
    if (!np || !nc || !lbl || !nc.value) { if(lbl) lbl.textContent = ''; return; }
    if (np.value === nc.value) {
        lbl.style.color = '#10B981';
        lbl.textContent = '✓ Passwords match';
    } else {
        lbl.style.color = '#EF4444';
        lbl.textContent = '✗ Passwords do not match';
    }
}
</script>
@endsection
