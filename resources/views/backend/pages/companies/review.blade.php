@extends('backend.layouts.master')

@section('title')
Company Review - Admin Panel
@endsection

@section('styles')
<style>
:root {
  --navy: #0D1B38; --navy2: #122350; --navy3: #1A3166;
  --orange: #E8521A; --orange-h: #D44510;
  --green: #1A7A4A; --green-bg: #E8F7EF;
  --red: #C0392B; --red-bg: #FDECEA;
  --amber: #A86B00; --amber-bg: #FEF3E2; --amber-border: #E8C060;
  --blue: #2563A8; --blue-bg: #EEF3FB;
  --purple: #5B2D9E; --purple-bg: #F3EEFF;
  --white: #fff; --dark: #0D1B38; --mid: #3A4F6E; --muted: #7A8BA8;
  --border: #DDE3EE; --lgray: #F4F6FA; --mgray: #E8ECF4;
}

.detail-layout { display: grid; grid-template-columns: 1fr 300px; gap: 18px; align-items: start; }
.detail-main { display: flex; flex-direction: column; gap: 14px; }
.detail-sidebar { display: flex; flex-direction: column; gap: 14px; }

.detail-card { background: white; border: 1.5px solid var(--border); border-radius: 14px; overflow: hidden; }
.detail-card-header { padding: 14px 18px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
.detail-card-title { font-size: 13px; font-weight: 700; color: var(--dark); display: flex; align-items: center; gap: 7px; }
.detail-card-title svg { width: 14px; height: 14px; stroke: currentColor; stroke-width: 2; fill: none; }
.detail-card-body { padding: 16px 18px; }

.co-hero { display: flex; align-items: flex-start; gap: 16px; }
.co-logo-xl { width: 72px; height: 72px; border-radius: 14px; background: var(--blue-bg); border: 2px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 800; color: var(--blue); flex-shrink: 0; text-transform: uppercase; }
.co-hero-info { flex: 1; }
.co-hero-name { font-size: 20px; font-weight: 800; color: var(--dark); letter-spacing: -.3px; margin-bottom: 4px; }
.co-hero-meta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 8px; }
.co-meta-item { font-size: 12px; color: var(--mid); display: flex; align-items: center; gap: 5px; }
.co-meta-item svg { width: 12px; height: 12px; stroke: var(--muted); stroke-width: 2; fill: none; }
.co-hero-badges { display: flex; gap: 6px; flex-wrap: wrap; }

.validation-banner { border-radius: 10px; padding: 12px 16px; display: flex; align-items: flex-start; gap: 12px; margin-bottom: 16px; }
.validation-banner.validated { background: var(--green-bg); border: 1.5px solid rgba(26,122,74,.2); }
.validation-banner.failed { background: var(--red-bg); border: 1.5px solid rgba(192,57,43,.2); }
.validation-banner.pending { background: var(--amber-bg); border: 1.5px solid rgba(168, 107, 0, .2); }

.vb-icon { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.validated .vb-icon { background: rgba(26,122,74,.12); }
.failed .vb-icon { background: rgba(192,57,43,.12); }
.pending .vb-icon { background: rgba(168, 107, 0, .12); }
.vb-icon svg { width: 16px; height: 16px; stroke-width: 2; fill: none; }
.validated .vb-icon svg { stroke: var(--green); }
.failed .vb-icon svg { stroke: var(--red); }
.pending .vb-icon svg { stroke: var(--amber); }

.vb-title { font-size: 13px; font-weight: 700; margin-bottom: 3px; }
.validated .vb-title { color: var(--green); }
.failed .vb-title { color: var(--red); }
.pending .vb-title { color: var(--amber); }
.vb-detail { font-size: 12px; color: var(--mid); line-height: 1.5; margin-bottom: 6px; }

.info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
.info-item { background: var(--lgray); border-radius: 9px; padding: 10px 12px; }
.info-item-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; color: var(--muted); margin-bottom: 4px; }
.info-item-val { font-size: 13px; font-weight: 600; color: var(--dark); }

.tags-wrap { display: flex; flex-wrap: wrap; gap: 6px; }
.service-tag { background: #EEF3FB; color: var(--navy2); font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 5px; }
.state-tag { background: #EEF3FB; color: var(--navy2); font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 5px; }

.decision-panel { background: white; border: 1.5px solid var(--border); border-radius: 14px; overflow: hidden; }
.dp-header { background: var(--navy); padding: 14px 18px; }
.dp-title { font-size: 13px; font-weight: 700; color: white; margin-bottom: 2px; }
.dp-sub { font-size: 11px; color: rgba(255,255,255,.5); }
.dp-body { padding: 16px 18px; }
.dp-checklist { margin-bottom: 14px; }
.dp-check { display: flex; align-items: center; gap: 8px; padding: 6px 0; font-size: 12px; color: var(--mid); border-bottom: 1px solid var(--border); }
.dp-check:last-child { border-bottom: none; }
.dp-check svg { width: 14px; height: 14px; flex-shrink: 0; stroke-width: 2.5; fill: none; }
.dp-check.pass svg { stroke: var(--green); }
.dp-check.fail svg { stroke: var(--red); }
.dp-check.warn svg { stroke: var(--amber); }

.btn-approve-big { width: 100%; padding: 12px; background: #27a369; color: white; border: none; border-radius: 9px; font-size: 14px; font-weight: 700; cursor: pointer; transition: .15s; margin-bottom: 8px; display: flex; align-items: center; justify-content: center; gap: 7px; }
/* .btn-approve-big:hover { background: #8AB8A2; } */
.btn-reject-big { width: 100%; padding: 10px; background: #FEF0EF; color: #C0392B; border: 1.5px solid #F5C6C2; border-radius: 9px; font-size: 13px; font-weight: 700; cursor: pointer; transition: .15s; display: flex; align-items: center; justify-content: center; gap: 7px; }
.btn-reject-big:hover { background: #FDECEA; }
.btn-approve-big svg, .btn-reject-big svg { width: 16px; height: 16px; stroke: currentColor; stroke-width: 2.5; fill: none; flex-shrink: 0; }

/* Override toggle */
.override-toggle{display:flex;align-items:flex-start;gap:8px;font-size:11px;font-weight:700;color:var(--amber);margin:16px 0 10px;cursor:pointer;}
.override-toggle input{margin-top:2px;accent-color:var(--amber);}

/* System action checklist */
.system-actions-list { margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--border); }
.system-actions-title { font-size: 10px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 8px; }
.sa-item { font-size: 11px; color: var(--mid); margin-bottom: 6px; display: flex; gap: 6px; }
.sa-item svg { width: 12px; height: 12px; stroke: var(--mid); stroke-width: 2.5; fill: none; flex-shrink: 0; margin-top: 1px; }

/* Manual lead assign */
.lead-search{display:flex;gap:8px;margin-top:10px}
.lead-search input{flex:1;padding:8px 10px;border:1.5px solid var(--border);border-radius:7px;font-size:13px;outline:none}
.lead-search input:focus{border-color:var(--navy2)}
.lead-search select{padding:8px 10px;border:1.5px solid var(--border);border-radius:7px;font-size:13px;outline:none;background:white;}
.btn-dark { background: var(--navy); color: white; border: none; padding: 8px 16px; border-radius: 7px; font-weight: 700; font-size: 13px; cursor: pointer; }

/* Activity log */
.activity-log{max-height:220px;overflow-y:auto}
.log-item{display:flex;gap:12px;padding:12px 0;border-bottom:1px solid var(--border)}
.log-item:last-child{border-bottom:none}
.log-dot{width:8px;height:8px;border-radius:50%;background:var(--navy2);flex-shrink:0;margin-top:4px}
.log-dot.green{background:var(--green)}
.log-dot.orange{background:var(--orange)}
.log-text{font-size:12px;color:var(--mid);line-height:1.5; flex: 1;}
.log-text strong{color:var(--dark);font-weight:600}
.log-time{font-size:10px;color:var(--muted);margin-top:4px}

.dp-status{display:flex;align-items:center;gap:8px;background:var(--lgray);border-radius:9px;padding:10px 12px;margin-bottom:14px}
.dp-status-dot{width:8px;height:8px;border-radius:50%;background:var(--amber);animation:pulse 1.5s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
.dp-status-text{font-size:12px;color:var(--amber);font-weight:600;}

/* Documents */
.doc-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--border); }
.doc-item:last-child { border-bottom: none; }
.doc-name { font-size: 12px; color: var(--mid); }
.doc-link { font-size: 11px; font-weight: 700; color: var(--blue); text-decoration: none; background: var(--blue-bg); padding: 4px 10px; border-radius: 5px; }
</style>
@endsection

@section('admin-content')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Company Review</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.companies.index') }}">Companies</a></li>
                    <li><span>Review</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row mt-4">
        <div class="col-12">
            <div class="detail-layout">
                <!-- LEFT MAIN -->
                <div class="detail-main">
                    
                    <!-- Company Hero -->
                    <div class="detail-card">
                        <div class="detail-card-body">
                            <div class="co-hero">
                                @php
                                    $initials = strtoupper(substr($company->company_name ?? 'C', 0, 2));
                                @endphp
                                <div class="co-logo-xl">{{ $initials }}</div>
                                <div class="co-hero-info">
                                    <div class="co-hero-name">{{ $company->company_name ?? 'N/A' }}</div>
                                    <div class="co-hero-meta">
                                        <div class="co-meta-item"><svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>{{ $company->state->name ?? 'N/A' }}, {{ $company->country->name ?? 'N/A' }}</div>
                                        <div class="co-meta-item"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/></svg>{{ $company->company_email ?? 'N/A' }}</div>
                                        <div class="co-meta-item"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12"/></svg>{{ $company->phone_no ?? 'N/A' }}</div>
                                        @if($company->founding_year)
                                        <div class="co-meta-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Est. {{ $company->founding_year }}</div>
                                        @endif
                                    </div>
                                    <div class="co-hero-badges">
                                        @if($company->is_email_verified == 1)
                                            <span class="modern-badge" style="background:var(--green-bg); color:var(--green); font-size:11px; padding:3px 9px; border-radius:20px; font-weight:700;">✓ Validated</span>
                                        @else
                                            <span class="modern-badge" style="background:#FFF0EB; color:var(--orange); font-size:11px; padding:3px 9px; border-radius:20px; font-weight:700;">Pending Approval</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Validation Banner -->
                    @if($company->is_email_verified == 1)
                    <div class="validation-banner validated">
                        <div class="vb-icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div>
                        <div class="vb-content">
                            <div class="vb-title">✓ USDOT Validated — FMCSA Record Confirmed</div>
                            <div class="vb-detail">Company name confirmed. Safe to approve.</div>
                        </div>
                    </div>
                    @else
                    <div class="validation-banner pending">
                        <div class="vb-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
                        <div class="vb-content">
                            <div class="vb-title">Pending Validation — Manual Review Required</div>
                            <div class="vb-detail">Company number could not be confirmed on FMCSA SAFER. Company name may not match, or operating authority may be inactive. Do not approve without manual verification.</div>
                        </div>
                    </div>
                    @endif

                    <!-- Company Information -->
                    <div class="detail-card">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                Company Information
                            </div>
                        </div>
                        <div class="detail-card-body">
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-item-label">USDOT NUMBER</div>
                                    <div class="info-item-val">{{ $company->us_dot_no ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">ICC MC LICENCE</div>
                                    <div class="info-item-val">{{ $company->icc_mc_license_no ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">STATE</div>
                                    <div class="info-item-val">{{ $company->state->name ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">CITY</div>
                                    <div class="info-item-val">{{ $company->city->name ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">ADDRESS</div>
                                    <div class="info-item-val">{{ $company->company_address ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">WEBSITE</div>
                                    <div class="info-item-val">
                                        @if($company->company_website)
                                            <a href="{{ $company->company_website }}" target="_blank" style="color:var(--blue);">{{ $company->company_website }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">CONTACT NUMBER</div>
                                    <div class="info-item-val">{{ $company->phone_no ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-item-label">COMPANY EMAIL</div>
                                    <div class="info-item-val">{{ $company->company_email ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Company -->
                    <div class="detail-card">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                About Company
                            </div>
                        </div>
                        <div class="detail-card-body">
                            <p style="font-size: 13px; color: var(--mid); line-height: 1.6; margin: 0;">
                                {{ $company->about_company ?? 'No description provided.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Services & Coverage -->
                    <div class="detail-card">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                Services & Coverage
                            </div>
                        </div>
                        <div class="detail-card-body">
                            <div style="font-size:10px; font-weight:700; color:var(--muted); text-transform:uppercase; margin-bottom:8px;">MOVE TYPES</div>
                            <div class="tags-wrap" style="margin-bottom:16px;">
                                @if($company->local_mover) <div class="service-tag">Local Moving</div> @endif
                                @if($company->long_distance_mover) <div class="service-tag">Long Distance</div> @endif
                                @if($company->residential_moving) <div class="service-tag">Residential</div> @endif
                                @if($company->commercial_office_moving) <div class="service-tag">Commercial</div> @endif
                                @if($company->packing_unpacking_services) <div class="service-tag">Packing Service</div> @endif
                                @if($company->storage_services) <div class="service-tag">Storage</div> @endif
                            </div>

                            <div style="font-size:10px; font-weight:700; color:var(--muted); text-transform:uppercase; margin-bottom:8px;">STATES OF OPERATION</div>
                            <div class="tags-wrap">
                                <div class="state-tag">{{ $company->state->name ?? 'N/A' }}</div>
                                <!-- This is placeholder. To be fully dynamic, we would loop through $company->operating_states if such relationship exists -->
                                <div class="state-tag">New York</div>
                                <div class="state-tag">Texas</div>
                                <div class="state-tag">California</div>
                                <div class="state-tag">Georgia</div>
                                <div class="state-tag">Virginia</div>
                                <div class="state-tag">Ohio</div>
                                <div class="state-tag">Illinois</div>
                                <div class="state-tag">Maryland</div>
                                <div class="state-tag">Pennsylvania</div>
                                <div class="state-tag">New Jersey</div>
                                <div class="state-tag">NC</div>
                            </div>
                        </div>
                    </div>

                    <!-- Manual Lead Assignment -->
                    <div class="detail-card">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                Manual Lead Assignment
                            </div>
                        </div>
                        <div class="detail-card-body">
                            <p style="font-size:12px; color:var(--mid); margin:0;">Manually assign a specific lead to this company regardless of geo-matching result. A reason is required.</p>
                            <div class="lead-search">
                                <input type="text" placeholder="Search by Lead ID or consumer name...">
                                <select>
                                    <option>Route coverage exception</option>
                                    <option>Admin Override</option>
                                    <option>Customer Request</option>
                                    <option>Other</option>
                                </select>
                                <button class="btn-dark">Assign Lead</button>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Log -->
                    <div class="detail-card">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                Activity Log
                            </div>
                            <span style="font-size:10px; color:var(--muted);">Permanent - cannot be edited</span>
                        </div>
                        <div class="detail-card-body">
                            <div class="activity-log">
                                <div class="log-item">
                                    <div class="log-dot orange"></div>
                                    <div class="log-text">
                                        <strong>Manual lead assigned</strong> — Lead ID: "all" — Reason: Route coverage exception — by {{ $user->name ?? 'Admin' }}
                                        <div class="log-time">{{ now()->format('M d, Y - h:i A') }}</div>
                                    </div>
                                </div>
                                <div class="log-item">
                                    <div class="log-dot green"></div>
                                    <div class="log-text">
                                        <strong>Registration submitted</strong> by company owner via /company/register
                                        <div class="log-time">{{ optional($company->created_at)->format('M d, Y - h:i A') ?? 'N/A' }}</div>
                                    </div>
                                </div>
                                <div class="log-item">
                                    <div class="log-dot orange"></div>
                                    <div class="log-text">
                                        <strong>AI USDOT validation completed</strong> — Result: {{ $company->is_email_verified == 1 ? 'Validated ✓' : 'Failed ✗' }}
                                        <div class="log-time">{{ optional($company->created_at)->addMinutes(1)->format('M d, Y - h:i A') ?? 'N/A' }} (automatic)</div>
                                    </div>
                                </div>
                                <div class="log-item">
                                    <div class="log-dot"></div>
                                    <div class="log-text">
                                        <strong>Pending admin review</strong> — no action taken yet
                                        <div class="log-time">{{ optional($company->created_at)->addMinutes(2)->format('M d, Y - h:i A') ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="detail-sidebar">
                    <div class="decision-panel">
                        <div class="dp-header">
                            <div class="dp-title">Approval Decision</div>
                            <div class="dp-sub">Review all info before approving</div>
                        </div>
                        <div class="dp-body">
                            
                            <div class="dp-status">
                                <div class="dp-status-dot"></div>
                                <div class="dp-status-text">Pending Admin Review</div>
                            </div>

                            <div class="dp-checklist">
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Company info complete</div>
                                @if($company->is_email_verified == 1)
                                    <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Email Validated</div>
                                @else
                                    <div class="dp-check fail"><svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>USDOT validation failed</div>
                                @endif
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Logo uploaded</div>
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>About section filled</div>
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Operating states selected</div>
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Move types selected</div>
                                <div class="dp-check pass"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>Plan selected</div>
                            </div>

                            @if($company->is_email_verified != 1)
                            <label class="override-toggle">
                                <input type="checkbox">
                                I've manually verified this company on FMCSA — override AI result
                            </label>
                            @endif

                            <form id="form-approve" method="GET" action="{{ route('admin.companies.isLeadActive', $company->id) }}">
                                <button type="button" class="btn-approve-big" id="btn-approve" onclick="approveCompany()">
                                    <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                    Approve Company
                                </button>
                            </form>

                            <form id="form-reject" method="GET" action="{{ route('admin.companies.isLeadUnActive', $company->id) }}">
                                <button type="button" class="btn-reject-big" onclick="showRejectModal('{{ addslashes($company->company_name) }}')">
                                    <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                    Reject Application
                                </button>
                            </form>

                            <div class="system-actions-list">
                                <div class="system-actions-title">ON APPROVAL — SYSTEM WILL:</div>
                                <div class="sa-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Create company account automatically</div>
                                <div class="sa-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Email login credentials (48hr reset link)</div>
                                <div class="sa-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Start Stripe subscription billing</div>
                                <div class="sa-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Make profile live at /company/...</div>
                                <div class="sa-item" style="font-size: 12px;color: var(--mid);line-height: 1.7;    font-family: 'DM Sans', sans-serif;"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Apply MMJ Verified chip automatically</div>
                                <div class="sa-item"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg> Log action in activity log permanently</div>
                            </div>

                        </div>
                    </div>

                    <!-- Documents Uploaded sidebar widget -->
                    <div class="detail-card" style="margin-top:14px;">
                        <div class="detail-card-header">
                            <div class="detail-card-title">
                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                Documents Uploaded
                            </div>
                        </div>
                        <div class="detail-card-body">
                            <div class="doc-item">
                                <div class="doc-name">Insurance Certificate.pdf</div>
                                <a href="#" class="doc-link">Download</a>
                            </div>
                            <div class="doc-item">
                                <div class="doc-name">USDOT_Licence.pdf</div>
                                <a href="#" class="doc-link">Download</a>
                            </div>
                            <div class="doc-item">
                                <div class="doc-name">Business_Registration.pdf</div>
                                <a href="#" class="doc-link">Download</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
let currentCompany = "{{ addslashes($company->company_name) }}";

function showModal(title, text, fieldsHtml, btnText, btnColor, onConfirm) {
    const overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;z-index:9999;';
    
    const modal = document.createElement('div');
    modal.style.cssText = 'background:#fff;border-radius:14px;width:100%;max-width:450px;padding:24px;box-shadow:0 10px 25px rgba(0,0,0,0.1);font-family:inherit;text-align:center;';
    
    let html = `<h3 style="font-size:18px;font-weight:700;color:var(--dark);margin:0 0 10px;text-align:left;">${title}</h3>`;
    html += `<p style="font-size:13px;color:var(--mid);margin:0 0 20px;line-height:1.5;text-align:left;">${text}</p>`;
    
    if (fieldsHtml) {
        html += `<div style="margin-bottom:20px;text-align:left;">${fieldsHtml}</div>`;
    }
    
    html += `<div style="display:flex;justify-content:center;gap:12px;">
        <button id="modal-cancel" style="padding:10px 20px;background:#fff;border:1px solid var(--border);border-radius:8px;font-weight:600;font-size:13px;cursor:pointer;color:var(--mid);">Cancel</button>
        <button id="modal-confirm" style="padding:10px 20px;background:${btnColor};border:none;border-radius:8px;font-weight:600;font-size:13px;cursor:pointer;color:#fff;">${btnText}</button>
    </div>`;
    
    modal.innerHTML = html;
    overlay.appendChild(modal);
    document.body.appendChild(overlay);
    
    document.getElementById('modal-cancel').onclick = () => overlay.remove();
    document.getElementById('modal-confirm').onclick = () => {
        onConfirm();
    };
}

function showApprovedOverlay(name) {
    const overlay = document.createElement('div');
    overlay.id = 'approved-overlay';
    overlay.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;background:#238959;z-index:99999;display:flex;flex-direction:column;align-items:center;justify-content:center;color:white;font-family:inherit;';
    
    let html = `
        <div style="width:72px;height:72px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:24px;">
            <svg viewBox="0 0 24 24" style="width:36px;height:36px;stroke:white;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;fill:none;"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h2 style="font-size:32px;font-weight:800;margin:0 0 16px;color:white;letter-spacing:-0.5px;">Company Approved!</h2>
        <p style="font-size:16px;max-width:450px;text-align:center;line-height:1.6;margin:0 0 32px;opacity:0.9;">
            ${name} has been approved.<br>Account created, login credentials emailed, and profile is now live at /company/[slug].
        </p>
        <button onclick="window.location.href='{{ route('admin.companies.index') }}'" style="background:white;color:#238959;border:none;padding:14px 28px;border-radius:8px;font-size:15px;font-weight:700;cursor:pointer;box-shadow:0 4px 15px rgba(0,0,0,0.1);transition:transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">Back to List</button>
    `;
    
    overlay.innerHTML = html;
    document.body.appendChild(overlay);
}

// Approve from detail page
function approveCompany(){
  const overrideCheck=document.getElementById('override-check');
  if(document.getElementById('validation-banner') && document.getElementById('validation-banner').classList.contains('failed')&&overrideCheck&&!overrideCheck.checked){
    alert('Please check the override box to approve a failed validation.');
    return;
  }
  showModal('Approve '+currentCompany,'Approve this company? Their account will be created, credentials emailed, and profile will go live immediately.','','Approve Company','var(--green)',()=>{
    const form = document.getElementById('form-approve');
    fetch(form.action, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    }).then(() => {
        showApprovedOverlay(currentCompany);
    }).catch(() => {
        showApprovedOverlay(currentCompany);
    });
  });
}

// Reject modal
function showRejectModal(name){
  showModal(
    'Reject — '+name,
    'Provide a rejection reason. The company will receive an email with this reason.',
    `<div class="modal-field" style="margin-bottom:12px;">
      <label style="display:block;font-size:11px;font-weight:700;margin-bottom:6px;color:var(--dark);">Rejection Reason</label>
      <select id="reject-reason" style="width:100%;padding:8px 10px;border:1px solid var(--border);border-radius:6px;font-size:13px;outline:none;">
        <option>USDOT validation failed</option>
        <option>Incomplete company information</option>
        <option>Duplicate registration</option>
        <option>Suspicious activity detected</option>
        <option>Other</option>
      </select>
    </div>
    <div class="modal-field">
      <label style="display:block;font-size:11px;font-weight:700;margin-bottom:6px;color:var(--dark);">Additional Notes (optional)</label>
      <textarea id="reject-notes" placeholder="Add any extra context for the company..." style="width:100%;padding:8px 10px;border:1px solid var(--border);border-radius:6px;font-size:13px;outline:none;min-height:80px;"></textarea>
    </div>`,
    'Send Rejection','#C0392B',
    ()=>{
      document.getElementById('form-reject').submit();
    }
  );
}
</script>
@endsection
