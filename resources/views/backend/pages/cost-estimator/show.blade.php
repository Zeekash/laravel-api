@extends('backend.layouts.master')

@section('title')
Lead Details - Admin Panel
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    body { background: #f3f6fb; }
    .lead-show-wrap { padding: 18px 0 28px; color: #071739; }
    .lead-shell { display: grid; grid-template-columns: minmax(0, 1fr) 320px; gap: 18px; }
    .lead-card { background: #fff; border: 1px solid #d7e0ef; border-radius: 14px; box-shadow: 0 1px 2px rgba(15, 23, 42, .04); overflow: hidden; }
    .lead-card-header { padding: 14px 18px; border-bottom: 1px solid #d7e0ef; display:flex; align-items:center; justify-content:space-between; gap:10px; }
    .lead-card-title { font-size: 15px; font-weight: 800; color: #071739; margin: 0; display:flex; align-items:center; gap:8px; }
    .lead-card-sub { font-size: 12px; color: #6b7890; }
    .lead-reference { display:flex; align-items:center; gap:8px; font-weight:800; font-size:14px; }
    .lead-reference small { color:#3d5c89; font-weight:700; }
    .status-pill { display:inline-flex; align-items:center; gap:6px; padding:4px 10px; border-radius:999px; font-size:12px; font-weight:800; }
    .status-pill::before { content:''; width:6px; height:6px; border-radius:50%; background:currentColor; }
    .status-routed { background:#e9fbf1; color:#078044; }
    .status-spam { background:#fff0f0; color:#d32f2f; }
    .status-unmatched { background:#fff7e6; color:#a66100; }

    .route-panel { background:#0b1d3d; border-radius:10px; color:#fff; padding:16px 18px; display:grid; grid-template-columns:1fr minmax(140px, .7fr) 1fr; gap:12px; align-items:center; }
    .route-city { font-size:18px; font-weight:900; line-height:1.1; }
    .route-label { font-size:11px; color:#91acd5; margin-top:4px; }
    .route-mid { text-align:center; color:#9db6db; font-weight:800; font-size:12px; position:relative; }
    .route-line { height:1px; background:#49678f; margin:7px 0; position:relative; }
    .route-line:after { content:'›'; position:absolute; right:-2px; top:-10px; color:#9db6db; font-size:20px; }
    .route-end { text-align:right; }

    .detail-grid { padding: 16px; display:grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap:12px; }
    .detail-box { background:#f4f7fc; border-radius:8px; padding:12px 13px; min-height:58px; }
    .detail-box label { display:block; font-size:10px; text-transform:uppercase; letter-spacing:.7px; color:#7d8ba5; font-weight:900; margin-bottom:6px; }
    .detail-box span { display:block; color:#071739; font-size:13px; font-weight:800; word-break:break-word; }
    .detail-box .muted { color:#6b7890; font-weight:700; }
    .full-span { grid-column: 1 / -1; }

    .routing-table { width:100%; margin:0; border-collapse:collapse; }
    .routing-table th { background:#f5f7fb; color:#72809b; text-transform:uppercase; font-size:10px; letter-spacing:.8px; padding:11px 14px; border-bottom:1px solid #d7e0ef; }
    .routing-table td { padding:12px 14px; border-bottom:1px solid #e5ebf4; font-size:13px; color:#071739; font-weight:700; }
    .routing-table tr:last-child td { border-bottom:0; }
    .plan-badge { display:inline-flex; align-items:center; gap:5px; padding:4px 9px; border-radius:999px; background:#eef5ff; color:#095ebd; font-size:11px; font-weight:800; }
    .plan-badge:before { content:''; width:5px; height:5px; background:#095ebd; border-radius:50%; }
    .mini-status { padding:4px 9px; border-radius:999px; font-size:11px; font-weight:800; background:#fff2e8; color:#db4b12; }

    .note-box { padding:16px; }
    .note-box textarea { width:100%; min-height:76px; border:1px solid #ccd7e8; border-radius:8px; padding:12px; font-size:13px; resize:vertical; outline:none; }
    .note-box textarea:focus { border-color:#0b1d3d; box-shadow:0 0 0 3px rgba(11, 29, 61, .08); }

    .side-card { background:#fff; border:1px solid #d7e0ef; border-radius:14px; box-shadow: 0 1px 2px rgba(15, 23, 42, .04); overflow:hidden; margin-bottom:14px; }
    .side-card .side-head { background:#0b1d3d; color:#fff; padding:14px 16px; font-size:14px; font-weight:900; }
    .side-body { padding:16px; }
    .form-label-mini { font-size:12px; color:#071739; font-weight:900; margin-bottom:7px; display:block; }
    .form-control-soft { border:1px solid #cbd7ea; border-radius:8px; height:42px; font-size:13px; color:#071739; }
    .btn-navy { background:#0b1d3d; color:#fff; border:0; border-radius:8px; font-size:13px; font-weight:900; height:40px; display:inline-flex; align-items:center; justify-content:center; gap:8px; width:100%; }
    .btn-navy:hover { color:#fff; background:#102a58; }
    .btn-outline-red { background:#fff3f1; color:#ce2e26; border:1px solid #ffc8c1; border-radius:8px; font-size:13px; font-weight:900; height:40px; display:inline-flex; align-items:center; justify-content:center; gap:8px; width:100%; }
    .btn-save { background:#0b1d3d; color:#fff; border:0; border-radius:8px; padding:10px 18px; font-size:13px; font-weight:900; }
    .btn-save:hover { color:#fff; background:#102a58; }
    .btn-back { border:1px solid #cbd7ea; background:#fff; color:#0b1d3d; border-radius:8px; padding:9px 14px; font-weight:800; font-size:13px; display:inline-flex; align-items:center; gap:7px; }
    .ip-box { background:#f2eaff; border:1px solid #ddc9ff; border-radius:9px; padding:13px; color:#6b2bcc; font-weight:900; font-size:13px; }
    .small-row { display:flex; justify-content:space-between; gap:12px; margin-top:10px; font-size:12px; color:#66758f; }
    .small-row strong { color:#071739; }
    .activity { list-style:none; padding:0; margin:0; max-height:180px; overflow:auto; }
    .activity li { position:relative; padding-left:18px; margin-bottom:14px; font-size:12px; color:#66758f; }
    .activity li:before { content:''; width:7px; height:7px; border-radius:50%; background:#0d8a4c; position:absolute; left:0; top:5px; }
    .activity li.warning:before { background:#ba7500; }
    .activity strong { display:block; color:#071739; font-size:13px; margin-bottom:2px; }
    .select2-container--default .select2-selection--multiple { border:1px solid #cbd7ea; border-radius:8px; min-height:42px; padding:4px 6px; }
    .select2-container { width:100% !important; }
    .select2-container--default.select2-container--focus .select2-selection--multiple { border-color:#0b1d3d; }
    .empty-state { padding:16px; color:#7a879c; font-style:italic; font-size:13px; }

    @media (max-width: 1199px) {
        .lead-shell { grid-template-columns:1fr; }
    }
    @media (max-width: 767px) {
        .route-panel { grid-template-columns:1fr; text-align:left; }
        .route-mid { text-align:left; }
        .route-end { text-align:left; }
        .detail-grid { grid-template-columns:1fr; }
    }
</style>
@endsection

@section('admin-content')
@php
    $isSpam = str_contains(strtolower($cost_estimator->email ?? ''), 'fake') || str_contains(strtolower($cost_estimator->name ?? ''), 'suspicious');
    $isRouted = !$isSpam && !empty($cost_estimator->min_price) && !empty($cost_estimator->max_price);
    $statusClass = $isSpam ? 'status-spam' : ($isRouted ? 'status-routed' : 'status-unmatched');
    $statusLabel = $isSpam ? 'Spam' : ($isRouted ? 'Routed' : 'Unmatched');
    $fromCity = $cost_estimator->ocity ?: $cost_estimator->zip_from;
    $toCity = $cost_estimator->dcity ?: $cost_estimator->zip_to;
    $fromLocation = trim(($fromCity ?: 'Origin') . ($cost_estimator->ostate ? ', ' . $cost_estimator->ostate : ''));
    $toLocation = trim(($toCity ?: 'Destination') . ($cost_estimator->dstate ? ', ' . $cost_estimator->dstate : ''));
    $distance = $cost_estimator->distance ? number_format((float) $cost_estimator->distance) . ' miles' : 'Distance not available';
@endphp

<div class="main-content-inner lead-show-wrap">
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')

        <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <a href="{{ route('admin.cost-estimator.index') }}" class="btn-back text-decoration-none">
                <i class="bi bi-arrow-left"></i> Back to Leads
            </a>
            <span class="status-pill {{ $statusClass }}">{{ $statusLabel }}</span>
        </div>

        <div class="lead-shell">
            <div class="lead-main">
                <div class="lead-card mb-3">
                    <div class="lead-card-header">
                        <div class="lead-reference">
                            <i class="bi bi-map"></i> Lead <small>L-{{ 10000 + $cost_estimator->id }}</small>
                        </div>
                        <span class="status-pill {{ $statusClass }}">{{ $statusLabel }}</span>
                    </div>
                    <div class="p-3">
                        <div class="route-panel">
                            <div>
                                <div class="route-city">{{ $fromLocation }}</div>
                                <div class="route-label">Moving From</div>
                            </div>
                            <div class="route-mid">
                                <div class="route-line"></div>
                                {{ $distance }}
                            </div>
                            <div class="route-end">
                                <div class="route-city">{{ $toLocation }}</div>
                                <div class="route-label">Moving To</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lead-card mb-3">
                    <div class="lead-card-header">
                        <h5 class="lead-card-title"><i class="bi bi-person"></i> Consumer Information</h5>
                        <span class="lead-card-sub">IP visible to admin only</span>
                    </div>
                    <div class="detail-grid">
                        <div class="detail-box">
                            <label>Full Name</label>
                            <span>{{ $cost_estimator->name ?: 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>Email Address</label>
                            <span>{{ $cost_estimator->email ?: 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>Phone Number</label>
                            <span>{{ $cost_estimator->phone_no ?: 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>Move Date</label>
                            <span>{{ $cost_estimator->date ? \Carbon\Carbon::parse($cost_estimator->date)->format('M d, Y') : 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>Home Size</label>
                            <span>{{ $cost_estimator->move_size ?: 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>Estimated Cost</label>
                            <span>
                                @if($cost_estimator->min_price || $cost_estimator->max_price)
                                    ${{ number_format((float) $cost_estimator->min_price) }} - ${{ number_format((float) $cost_estimator->max_price) }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                        <div class="detail-box">
                            <label>Submitted At</label>
                            <span>{{ optional($cost_estimator->created_at)->format('M d, Y — g:i A') ?: 'N/A' }}</span>
                        </div>
                        <div class="detail-box">
                            <label>IP Address</label>
                            <span>{{ $cost_estimator->user_ip ?? $cost_estimator->client_ip ?? 'N/A' }}</span>
                        </div>
                        @if(!empty($cost_estimator->message))
                            <div class="detail-box full-span">
                                <label>Message / Extra Details</label>
                                <span class="muted">{{ $cost_estimator->message }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lead-card mb-3">
                    <div class="lead-card-header">
                        <h5 class="lead-card-title"><i class="bi bi-activity"></i> Routing Information</h5>
                        <span class="lead-card-sub">{{ $assignedCompanies->count() }} companies received this lead</span>
                    </div>

                    @if($assignedCompanies->count())
                        <div class="table-responsive">
                            <table class="routing-table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Received At</th>
                                        <th>Lead Status</th>
                                        <th>Source</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assignedCompanies as $row)
                                        <tr>
                                            <td>{{ $row->assigned_company_name ?: 'Company #'.$row->company_id }}</td>
                                            <td>{{ !empty($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('M d, Y g:i A') : 'N/A' }}</td>
                                            <td><span class="mini-status">{{ !empty($row->is_bad_lead) ? 'Bad Lead' : 'Sent' }}</span></td>
                                            <td><span class="plan-badge">{{ $row->source ?? 'Manual' }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">No company has received this lead yet. Use the admin panel on the right to assign it.</div>
                    @endif
                </div>

                <div class="lead-card mb-3">
                    <div class="lead-card-header">
                        <h5 class="lead-card-title"><i class="bi bi-pencil-square"></i> Admin Notes</h5>
                        <span class="lead-card-sub">Private — never shown to companies or consumers</span>
                    </div>
                    <form method="POST" action="{{ route('admin.cost-estimator.assign-companies', $cost_estimator->id) }}">
                        @csrf
                        <div class="note-box">
                            <label class="form-label-mini">Assign lead to companies</label>
                            <select name="company_ids[]" class="company-select" multiple required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ in_array($company->id, $assignedCompanyIds) ? 'selected' : '' }}>
                                        {{ $company->display_name }}
                                    </option>
                                @endforeach
                            </select>

                            <label class="form-label-mini mt-3">Route note</label>
                            <textarea name="route_note" placeholder="Add a private admin note about this lead before assigning..."></textarea>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn-save"><i class="bi bi-send"></i> Send Lead</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lead-sidebar">
                <div class="side-card">
                    <div class="side-head">Admin Actions</div>
                    <div class="side-body">
                        <form method="POST" action="{{ route('admin.cost-estimator.assign-companies', $cost_estimator->id) }}" id="quickAssignForm">
                            @csrf
                            <label class="form-label-mini">Re-route to Company</label>
                            <p class="lead-card-sub mb-2">Manually assign this lead to one or more specific companies.</p>

                            <select name="company_ids[]" class="company-select" multiple required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->display_name }}</option>
                                @endforeach
                            </select>

                            <select name="route_note" class="form-control form-control-soft mt-2">
                                <option value="Route coverage exception">Route coverage exception</option>
                                <option value="Manual admin assignment">Manual admin assignment</option>
                                <option value="Premium routing override">Premium routing override</option>
                                <option value="Customer requested specific company">Customer requested specific company</option>
                            </select>

                            <button type="submit" class="btn-navy mt-3">
                                <i class="bi bi-lightning-charge"></i> Assign to Company
                            </button>
                        </form>

                        <hr>

                        <label class="form-label-mini">Other Actions</label>
                        <form method="POST" action="{{ route('admin.cost-estimator.mark-spam', $cost_estimator->id) }}" class="spam-form">
                            @csrf
                            <button type="submit" class="btn-outline-red">
                                <i class="bi bi-exclamation-triangle"></i> Mark as Spam
                            </button>
                        </form>
                    </div>
                </div>

                <div class="side-card">
                    <div class="lead-card-header">
                        <h5 class="lead-card-title"><i class="bi bi-display"></i> Submission Details</h5>
                    </div>
                    <div class="side-body">
                        <div class="ip-box">
                            <div style="font-size:11px; text-transform:uppercase; letter-spacing:.6px;">IP Address</div>
                            <div>{{ $cost_estimator->user_ip ?? $cost_estimator->client_ip ?? 'N/A' }}</div>
                            {{-- <div style="font-size:11px; color:#7f61b4; margin-top:4px;">Location: {{ $fromLocation }}</div> --}}
                        </div>
                        <div class="small-row"><span>Browser</span><strong>N/A</strong></div>
                        <div class="small-row"><span>Submissions from IP</span><strong>N/A</strong></div>
                        <div class="small-row"><span>Blacklisted</span><strong>{{ $isSpam ? 'Yes' : 'No' }}</strong></div>
                    </div>
                </div>

                <div class="side-card">
                    <div class="lead-card-header">
                        <h5 class="lead-card-title"><i class="bi bi-clock-history"></i> Activity Log</h5>
                    </div>
                    <div class="side-body">
                        <ul class="activity">
                            <li>
                                <strong>Lead submitted</strong>
                                Consumer filled quote form<br>
                                {{ optional($cost_estimator->created_at)->format('M d, Y — g:i A') }}
                            </li>
                            <li class="warning">
                                <strong>Validation checked</strong>
                                Status detected as {{ $statusLabel }}
                            </li>
                            @if($assignedCompanies->count())
                                <li>
                                    <strong>Routed to {{ $assignedCompanies->count() }} companies</strong>
                                    Manual/company routing completed
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(function () {
        $('.company-select').select2({
            placeholder: 'Search and select companies...',
            width: '100%',
            allowClear: true
        });

        $('.spam-form').on('submit', function (e) {
            e.preventDefault();
            let form = this;

            swal({
                title: 'Mark as spam?',
                text: 'This lead will be marked as spam/bad lead in contact_movers records.',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function (confirm) {
                if (confirm) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
