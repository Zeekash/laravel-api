@extends('backend.layouts.master')

@section('title')
    Leads Management Dashboard - Admin Panel
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8fafc;
        }

        .leads-dashboard {
            padding: 24px 0;
        }

        .dashboard-title h2 {
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .dashboard-title p {
            color: #64748b;
            font-size: 14px;
        }

        .metric-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            height: 100%;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .metric-card .title {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            color: #64748b;
            letter-spacing: 0.75px;
        }

        .metric-card .value {
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 6px;
        }

        .metric-card .subtext {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .card-total {
            border-top: 4px solid #3b82f6;
        }

        .card-routed {
            border-top: 4px solid #10b981;
        }

        .card-spam {
            border-top: 4px solid #ef4444;
        }

        .card-unmatched {
            border-top: 4px solid #f59e0b;
        }

        .filter-ribbon {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-top: 28px;
            margin-bottom: 20px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .filter-ribbon .form-control,
        .filter-ribbon .form-select {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            height: 42px;
            color: #334155;
            font-size: 14px;
        }

        .filter-ribbon .search-input {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2364748b' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 14px center;
            padding-left: 42px;
        }

        .btn-clear {
            height: 42px;
            border: 1px solid #cbd5e1;
            background: #fff;
            color: #334155;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-clear:hover {
            background: #f8fafc;
        }

        .btn-filter {
            height: 42px;
            background: #2563eb;
            border: 1px solid #2563eb;
            color: #fff;
            font-weight: 700;
            border-radius: 8px;
        }

        .btn-filter:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #fff;
        }

        .btn-export {
            height: 42px;
            background: #fff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-weight: 600;
            color: #334155;
            padding: 0 16px;
        }

        .btn-export:hover {
            background: #f8fafc;
        }

        .table-container {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        #leadsTable {
            margin: 0 !important;
            width: 100% !important;
        }

        #leadsTable th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        #leadsTable td {
            padding: 18px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 14px;
            text-align: left;
        }

        .consumer-cell .name {
            font-weight: 600;
            color: #0f172a;
        }

        .consumer-cell .email {
            font-size: 13px;
            color: #64748b;
            margin-top: 1px;
        }

        .route-txt {
            font-weight: 600;
            color: #0f172a;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 500;
        }

        .badge-status::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-routed {
            background: #ecfdf5;
            color: #059669;
        }

        .status-routed::before {
            background: #10b981;
        }

        .status-spam {
            background: #fef2f2;
            color: #dc2626;
        }

        .status-spam::before {
            background: #ef4444;
        }

        .status-unmatched {
            background: #fffbeb;
            color: #d97706;
        }

        .status-unmatched::before {
            background: #f59e0b;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_length {
            display: none;
        }

        .table-footer-pagination {
            background: #fff;
            padding: 16px 20px;
            border-top: 1px solid #e2e8f0;
        }

        .modal-xl-custom {
            max-width: 680px;
        }

        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal-header {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 24px;
        }

        .modal-body {
            padding: 24px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-top: 12px;
        }

        .detail-block {
            background: #f8fafc;
            padding: 14px 16px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .detail-block label {
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 4px;
            display: block;
            letter-spacing: 0.5px;
        }

        .detail-block span {
            font-size: 14px;
            color: #0f172a;
            font-weight: 500;
        }
    </style>
@endsection

@section('admin-content')
    <div class="main-content-inner leads-dashboard">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="dashboard-title">
                    <h2>All Leads</h2>
                    <p>{{ number_format($totalLeads) }} total leads across all validation parameters</p>
                </div>
                <div>
                    <a href="{{ route('admin.cost-estimator.export.excel', request()->all()) }}"
                        class="btn btn-export d-flex align-items-center gap-2">
                        <i class="bi bi-download"></i> Export CSV
                    </a>
                </div>
            </div>

            <div class="row g-3 mt-2">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card-total">
                        <div class="title">Total Leads</div>
                        <div class="value">{{ number_format($totalLeads) }}</div>
                        <div class="subtext text-success"><i class="bi bi-graph-up-arrow"></i> {{ $leadsLast30 }} during
                            recent 30 days</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card-routed">
                        <div class="title">Routed</div>
                        <div class="value">{{ number_format($routedLeads) }}</div>
                        <div class="subtext">{{ $totalLeads ? round(($routedLeads / $totalLeads) * 100, 1) : 0 }}% total
                            delivery metric</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card-spam">
                        <div class="title">Spam Blocked</div>
                        <div class="value">{{ number_format($spamLeads) }}</div>
                        <div class="subtext">{{ $totalLeads ? round(($spamLeads / $totalLeads) * 100, 1) : 0 }}% total
                            filtration load</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card-unmatched">
                        <div class="title">Unmatched</div>
                        <div class="value">{{ number_format($unmatchedLeads) }}</div>
                        <div class="subtext">Awaiting matching logistics routes</div>
                    </div>
                </div>
            </div>

            <div class="filter-ribbon">
                <form id="filterForm" method="GET" action="{{ url()->current() }}">
                    <div class="row g-2 align-items-center">
                        <div class="col-12 col-lg-3">
                            <input type="text" name="search" id="customSearch" class="form-control search-input"
                                placeholder="Search by customer name or email..." value="{{ request('search') }}">
                        </div>
                        <div class="col-6 col-lg-2">
                            <select name="status" id="statusFilter" class="form-control form-select">
                                <option value="">All Statuses</option>
                                <option value="Routed" {{ request('status') == 'Routed' ? 'selected' : '' }}>Routed
                                </option>
                                <option value="Spam" {{ request('status') == 'Spam' ? 'selected' : '' }}>Spam</option>
                                <option value="Unmatched" {{ request('status') == 'Unmatched' ? 'selected' : '' }}>
                                    Unmatched</option>
                            </select>
                        </div>
                        <div class="col-6 col-lg-2">
                            <select name="from_state" id="fromStateFilter" class="form-control form-select">
                                <option value="">All From States</option>
                                @foreach ($allFromStates as $st)
                                    <option value="{{ $st }}"
                                        {{ request('from_state') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-lg-2">
                            <select name="to_state" id="toStateFilter" class="form-control form-select">
                                <option value="">All To States</option>
                                @foreach ($allToStates as $st)
                                    <option value="{{ $st }}"
                                        {{ request('to_state') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-lg-1">
                            <select name="timeframe" id="timeFilter" class="form-control form-select">
                                <option value="">All Time</option>
                                <option value="today" {{ request('timeframe') == 'today' ? 'selected' : '' }}>Today
                                </option>
                                <option value="yesterday" {{ request('timeframe') == 'yesterday' ? 'selected' : '' }}>
                                    Yesterday</option>
                                <option value="this_month" {{ request('timeframe') == 'this_month' ? 'selected' : '' }}>
                                    This Month</option>
                            </select>
                        </div>
                        <div class="col-6 col-lg-1">
                            <button type="submit"
                                class="btn btn-filter w-100 d-inline-flex align-items-center justify-content-center">
                                <i class="bi bi-funnel me-1"></i> Apply
                            </button>
                        </div>
                        <div class="col-6 col-lg-1">
                            <a href="{{ route('admin.cost-estimator.index') }}"
                                class="btn btn-clear w-100 d-inline-flex align-items-center justify-content-center">Clear</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-container mb-5">
                <form method="POST" action="{{ route('admin.cost-estimator.bulkDestroy') }}" id="bulkDeleteForm">
                    @csrf
                    @method('DELETE')

                    <div class="p-3 bg-white d-flex align-items-center justify-content-between border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <input type="checkbox" id="select-all" class="form-check-input ms-2"
                                style="width:18px; height:18px; cursor:pointer;">
                            <label for="select-all" class="text-muted small mb-0 select-all-label"
                                style="cursor:pointer; font-weight: 500;">Select All Rows</label>
                        </div>
                        <button type="submit" class="btn btn-sm btn-danger show_confirm" id="bulkDeleteBtn"
                            style="display:none; font-weight: 600; border-radius: 6px;">
                            <i class="bi bi-trash"></i> Delete Selected
                        </button>
                    </div>

                    @include('backend.layouts.partials.messages')

                    <table id="leadsTable" class="table">
                        <thead>
                            <tr>
                                <th width="4%"></th>
                                <th width="8%">#</th>
                                <th width="20%">Consumer</th>
                                <th width="24%">Route</th>
                                <th width="12%">Move Date</th>
                                <th width="12%">Home Size</th>
                                <th width="12%">Submitted</th>
                                <th width="10%">Status</th>
                                <th width="8%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost_estimator as $lead)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="ids[]" value="{{ $lead->id }}"
                                            class="form-check-input lead-checkbox" style="cursor:pointer;">
                                    </td>
                                    <td class="text-muted fw-semibold">L-{{ 10000 + $lead->id }}</td>
                                    <td>
                                        <div class="consumer-cell">
                                            <div class="name">{{ $lead->name }}</div>
                                            <div class="email">{{ $lead->email }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="route-txt">
                                            {{ $lead->ocity ?? $lead->zip_from }}
                                            {{ $lead->ostate ? ', ' . $lead->ostate : '' }}
                                            <span class="text-muted mx-1">→</span>
                                            {{ $lead->dcity ?? $lead->zip_to }}
                                            {{ $lead->dstate ? ', ' . $lead->dstate : '' }}
                                        </div>
                                    </td>
                                    <td>{{ $lead->date ? \Carbon\Carbon::parse($lead->date)->format('M d, Y') : '—' }}</td>
                                    <td>{{ $lead->move_size ?? '—' }}</td>
                                    <td>
                                        @if (\Carbon\Carbon::parse($lead->created_at)->isToday())
                                            Today, {{ \Carbon\Carbon::parse($lead->created_at)->format('g:i A') }}
                                        @elseif(\Carbon\Carbon::parse($lead->created_at)->isYesterday())
                                            Yesterday, {{ \Carbon\Carbon::parse($lead->created_at)->format('g:i A') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($lead->created_at)->format('M d, Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = 'status-unmatched';
                                            $statusLabel = 'Unmatched';
                                            if (
                                                $lead->min_price &&
                                                $lead->max_price &&
                                                (!str_contains(strtolower($lead->email), 'fake') &&
                                                    !str_contains(strtolower($lead->name), 'suspicious'))
                                            ) {
                                                $statusClass = 'status-routed';
                                                $statusLabel = 'Routed';
                                            } elseif (
                                                str_contains(strtolower($lead->email), 'fake') ||
                                                str_contains(strtolower($lead->name), 'suspicious')
                                            ) {
                                                $statusClass = 'status-spam';
                                                $statusLabel = 'Spam';
                                            }
                                        @endphp
                                        <span class="badge-status {{ $statusClass }}">{{ $statusLabel }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- <button type="button" class="btn btn-sm btn-light border fw-medium" data-toggle="modal" data-target="#leadModal{{ $lead->id }}" style="border-radius: 6px;">
                                        View
                                    </button> --}}
                                            <a href="{{ route('admin.cost-estimator.show', $lead->id) }}"
                                                class="btn btn-sm btn-light border fw-medium">
                                                View
                                            </a>
                                            @if (Auth::guard('admin')->user()->can('cost-estimate.delete'))
                                                <button type="button"
                                                    class="btn btn-sm btn-light border text-danger delete-single-btn"
                                                    data-id="{{ $lead->id }}" style="border-radius: 6px;">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="leadModal{{ $lead->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl-custom" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex justify-content-between align-items-center">
                                                <h5 class="modal-title fw-bold text-dark"
                                                    style="color: #0f172a !important;">Lead Details
                                                    (L-{{ 10000 + $lead->id }})</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"
                                                    style="background:none; border:none; font-size:20px; color:#64748b;"><i
                                                        class="bi bi-x-lg"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="fw-bold border-bottom pb-2 text-primary"
                                                    style="text-align:left;"><i
                                                        class="bi bi-person-circle me-2"></i>Consumer Information</h6>
                                                <div class="detail-grid mb-4">
                                                    <div class="detail-block"><label>Full
                                                            Name</label><span>{{ $lead->name }}</span></div>
                                                    <div class="detail-block"><label>Email
                                                            Address</label><span>{{ $lead->email }}</span></div>
                                                    <div class="detail-block"><label>Phone
                                                            Number</label><span>{{ $lead->phone_no ?? 'N/A' }}</span></div>
                                                    <div class="detail-block"><label>IP
                                                            Address</label><span>{{ $lead->user_ip ?? 'N/A' }}</span></div>
                                                </div>

                                                <h6 class="fw-bold border-bottom pb-2 text-primary"
                                                    style="text-align:left;"><i class="bi bi-truck me-2"></i>Logistics &
                                                    Moving Details</h6>
                                                <div class="detail-grid mb-4">
                                                    <div class="detail-block">
                                                        <label>Origin</label><span>{{ $lead->zip_from }}
                                                            {{ $lead->ocity ? '(' . $lead->ocity . ', ' . $lead->ostate . ')' : '' }}</span>
                                                    </div>
                                                    <div class="detail-block">
                                                        <label>Destination</label><span>{{ $lead->zip_to }}
                                                            {{ $lead->dcity ? '(' . $lead->dcity . ', ' . $lead->dstate . ')' : '' }}</span>
                                                    </div>
                                                    <div class="detail-block"><label>Move
                                                            Distance</label><span>{{ $lead->distance ? $lead->distance . ' miles' : 'N/A' }}</span>
                                                    </div>
                                                    <div class="detail-block"><label>Home Inventory
                                                            Size</label><span>{{ $lead->move_size ?? 'N/A' }}</span></div>
                                                    <div class="detail-block"><label>Target Move
                                                            Date</label><span>{{ $lead->date ?? 'N/A' }}</span></div>
                                                    <div class="detail-block"><label>Price Calculation
                                                            Range</label><span>${{ number_format((float) $lead->min_price) }}
                                                            - ${{ number_format((float) $lead->max_price) }}</span></div>
                                                </div>

                                                <h6 class="fw-bold border-bottom pb-2 text-primary"
                                                    style="text-align:left;"><i class="bi bi-gear-fill me-2"></i>System
                                                    Validation Metadata</h6>
                                                <div class="detail-grid">
                                                    <div class="detail-block"><label>System Entry
                                                            Date</label><span>{{ $lead->created_at->format('Y-m-d H:i:s') }}</span>
                                                    </div>
                                                    <div class="detail-block"><label>HTTP Referrer
                                                            Link</label><span>{{ $lead->referrer ?? 'Direct Entry / Unknown' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="table-footer-pagination d-flex align-items-center justify-content-between">
                        <div class="text-muted small fw-medium">
                            Showing {{ $cost_estimator->firstItem() ?? 0 }} to {{ $cost_estimator->lastItem() ?? 0 }} of
                            {{ $cost_estimator->total() }} recorded leads
                        </div>
                        <div>
                            {{ $cost_estimator->appends(request()->all())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </form>

                @foreach ($cost_estimator as $lead)
                    <form id="delete-single-form-{{ $lead->id }}" method="POST"
                        action="{{ route('admin.cost-estimator.destroy', $lead->id) }}" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Filters now work with the Apply button.
            // Pressing Enter inside the search box also submits the filter form.
            $('#customSearch').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    $('#filterForm').submit();
                }
            });

            // Bulk select checkbox logic
            $(document).on('change', '#select-all', function() {
                $('.lead-checkbox').prop('checked', $(this).is(':checked'));
                toggleBulkDeleteButton();
            });

            $(document).on('change', '.lead-checkbox', function() {
                var totalCheckboxes = $('.lead-checkbox').length;
                var checkedCheckboxes = $('.lead-checkbox:checked').length;

                $('#select-all').prop('checked', totalCheckboxes > 0 && totalCheckboxes ===
                    checkedCheckboxes);
                toggleBulkDeleteButton();
            });

            function toggleBulkDeleteButton() {
                var checkedCount = $('.lead-checkbox:checked').length;

                if (checkedCount > 0) {
                    $('#bulkDeleteBtn').show();
                    $('.select-all-label').text(checkedCount + ' item(s) selected');
                } else {
                    $('#bulkDeleteBtn').hide();
                    $('.select-all-label').text('Select All Rows');
                }
            }

            // Bulk delete confirmation
            $(document).on('click', '.show_confirm', function(event) {
                event.preventDefault();

                if ($('.lead-checkbox:checked').length === 0) {
                    swal("No records selected", "Please select at least one lead first.", "warning");
                    return false;
                }

                swal({
                    title: "Are you sure?",
                    text: "Selected records will be deleted permanently.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#bulkDeleteForm').submit();
                    }
                });
            });

            // Single delete confirmation
            $(document).on('click', '.delete-single-btn', function(event) {
                event.preventDefault();

                var id = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "This record will be deleted permanently.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#delete-single-form-' + id).submit();
                    }
                });
            });
        });
    </script>
@endsection
