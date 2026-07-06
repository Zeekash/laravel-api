@extends('backend.layouts.master')

@section('title')
Companies - Admin Panel
@endsection

@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    :root {
        --primary-blue: #0A1931;
        --soft-bg: #F4F6F9;
        --border-color: #E4E6EF;
        --text-muted: #B5B5C3;
        --text-dark: #3F4254;
        --text-dark-light: #7E8299;
    }
    
    .modern-stats-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 20px 0 rgba(76,87,125,0.02);
        padding: 25px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid var(--border-color);
        transition: transform 0.2s;
        margin-bottom: 30px;
    }
    
    .modern-stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 25px 0 rgba(76,87,125,0.06);
    }
    
    .modern-stats-card .seofct-icon {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .modern-stats-card h2 {
        font-size: 30px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }
    
    /* New Metrics Cards */
    .metrics-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 16px;
    }
    .metrics-title {
        font-family: 'Sora', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: #0D1B38;
        margin: 0 0 4px 0;
        line-height: 1.2;
    }
    .metrics-subtitle {
        font-size: 13px;
        color: #7A8BA8;
        margin: 0;
        font-weight: 500;
    }
    .metrics-card {
        background: #fff;
        border: 1px solid #DDE3EE;
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .metrics-card.card-blue { border-top: 3px solid #2563A8; }
    .metrics-card.card-green { border-top: 3px solid #1A7A4A; }
    .metrics-card.card-red { border-top: 3px solid #C0392B; }

    .mc-title {
        font-size: 10px;
        font-weight: 800;
        color: #7A8BA8;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
    }
    .mc-value {
        font-size: 24px;
        font-weight: 800;
        color: #0D1B38;
        font-family: 'Sora', sans-serif;
        margin-bottom: 6px;
        line-height: 1;
    }
    .mc-subtext {
        font-size: 11px;
        font-weight: 500;
    }
    
    .modern-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 20px 0 rgba(76,87,125,0.02);
        border: 1px solid var(--border-color);
        padding: 0;
        overflow: hidden;
    }
    
    .modern-header {
        padding: 30px 30px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }
    
    .modern-header .title-block h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: var(--primary-blue);
    }
    
    .modern-header .title-block p {
        margin: 8px 0 0 0;
        color: var(--text-dark-light);
        font-size: 14px;
        font-weight: 500;
    }
    
    .modern-filters {
        padding: 10px 30px 20px;
        background: #fff;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    .modern-search-wrapper {
        flex-grow: 1;
        position: relative;
    }

    .modern-search-wrapper input {
        width: 100%;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 15px 10px 40px;
        font-size: 14px;
        color: var(--text-dark);
        outline: none;
        transition: border-color 0.2s;
    }

    .modern-search-wrapper input:focus {
        border-color: #3699FF;
    }

    .modern-search-wrapper i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
    }
    
    .modern-filters input[type="date"] {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 9px 15px;
        color: var(--text-dark);
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    
    .modern-filters input[type="date"]:focus {
        border-color: #3699FF;
    }
    
    table.dataTable.modern-table {
        width: 100% !important;
        margin: 0 !important;
        border-collapse: collapse !important;
    }
    
    table.dataTable.modern-table thead th,
    table.dataTable.modern-table thead td {
        background-color: #F3F6F9;
        color: var(--text-muted);
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 25px;
        border-bottom: 1px dashed var(--border-color) !important;
        border-top: none;
    }
    
    table.dataTable.modern-table tbody td {
        padding: 15px 25px;
        vertical-align: middle;
        color: var(--text-dark);
        border-bottom: 1px dashed var(--border-color);
        font-size: 14px;
        font-weight: 500;
    }
    
    table.dataTable.modern-table tbody tr:hover {
        background: #F8F9FA;
    }

    /* table.dataTable.no-footer {
        border-bottom: 1px solid var(--border-color);
    } */
    
    .company-info-cell {
        display: flex;
        align-items: center;
    }

    .company-avatar {
        width: 45px;
        height: 45px;
        border-radius: 8px;
        background: #EEF6FF;
        color: #3699FF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 16px;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .company-name-text {
        font-weight: 600;
        color: var(--text-dark);
    }

    .company-email-text {
        font-size: 13px;
        color: var(--text-dark-light);
        margin-top: 2px;
    }
    
    .modern-badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .modern-badge.success { background: var(--green-bg); color: #1a9055; }
    .modern-badge.danger { background: #FFE2E5; color: #F64E60; }
    .modern-badge.warning { background: #FFF4DE; color: #FFA800; }
    .modern-badge.secondary { background: #F3F6F9; color: var(--text-dark-light); }
    
    .dropdown-toggle.no-caret::after { display: none; }
    
    .btn-action-dots {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #F3F6F9;
        color: var(--text-dark-light);
        border: none;
        transition: all 0.2s;
    }
    
    .btn-action-dots:hover {
        background: #E4E6EF;
        color: #3699FF;
    }
    
    .dropdown-menu-modern {
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border-radius: 8px;
        padding: 10px 0;
        min-width: 180px;
    }
    
    .dropdown-menu-modern .dropdown-item {
        padding: 10px 20px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .dropdown-menu-modern .dropdown-item:hover {
        background: #F3F6F9;
        color: #3699FF;
    }
    
    .dropdown-menu-modern .dropdown-item i {
        font-size: 15px;
        color: var(--text-muted);
        width: 20px;
        text-align: center;
        transition: color 0.2s;
    }

    .dropdown-menu-modern .dropdown-item:hover i {
        color: #3699FF;
    }

    .dropdown-menu-modern .dropdown-item.text-danger:hover {
        color: #F64E60;
        background: #FFE2E5;
    }
    .dropdown-menu-modern .dropdown-item.text-danger:hover i {
        color: #F64E60;
    }
    
    /* Hide Default DataTable elements to replace with modern */
    .dataTables_wrapper .dataTables_filter {
        display: none !important;
    }
    .dataTables_wrapper .dataTables_length {
        display: none !important;
    }
    .dataTables_wrapper .dataTables_info {
        padding: 25px 30px;
        color: var(--text-dark-light);
        font-size: 13px;
        font-weight: 500;
    }
    .dataTables_wrapper .dataTables_paginate {
        padding: 15px 30px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 0px;
        margin: 0 3px;
        border-radius: 6px;
        border: 1px solid transparent;
        color: var(--text-dark-light) !important;
        font-size: 13px;
        font-weight: 600;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #F3F6F9 !important;
        border: 1px solid transparent !important;
        color: #3699FF !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #0A1931 !important;
        color: #fff !important;
        border: 1px solid #0A1931 !important;
    }
</style>
@endsection


@section('admin-content')
@php
$user = Auth::guard('admin')->user();
@endphp
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Companies</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Companies</span></li>
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
    <!-- Top Stats Cards -->
    <div class="metrics-header mt-4">
        <div>
            <h4 class="metrics-title">All Companies</h4>
            <p class="metrics-subtitle">{{ $verified_companies + $unverified_companies }} total companies across all statuses</p>
        </div>
        <div>
            <a class="btn btn-sm" href="{{ route('admin.companies.export.excel',['from_date' => request('from_date'),'to_date' => request('to_date')]) }}" style="background:#fff; border:1px solid #DDE3EE; font-weight:700; font-size:12px; color:#0D1B38; border-radius:6px; padding:6px 12px; display:inline-flex; align-items:center; gap:6px;">
                <svg viewBox="0 0 24 24" style="width:14px;height:14px;stroke:currentColor;stroke-width:2;fill:none;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Export CSV
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="metrics-card card-blue">
                <div class="mc-title">TOTAL COMPANIES</div>
                <div class="mc-value">{{ $verified_companies + $unverified_companies }}</div>
                <div class="mc-subtext" style="color:#1A7A4A; font-weight:600;">↑ {{ count($companyData) }} active on platform</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="metrics-card card-green">
                <div class="mc-title">VERIFIED</div>
                <div class="mc-value">{{ $verified_companies }}</div>
                <div class="mc-subtext" style="color:#7A8BA8;">FMCSA validated</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="metrics-card card-red">
                <div class="mc-title">UNVERIFIED</div>
                <div class="mc-value">{{ $unverified_companies }}</div>
                <div class="mc-subtext" style="color:#7A8BA8;">Pending manual review</div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="modern-container mb-5 mt-2">
        <!-- Header -->
        <div class="modern-header">
            <div class="title-block">
                <h4 style="font-family:'Sora',sans-serif;font-weight:700;color:#0D1B38;margin:0;font-size:20px;">Company Directory</h4>
                <p style="margin:4px 0 0;font-size:13px;color:#7A8BA8;">Manage and review all registered moving companies</p>
            </div>
            <div>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.companies.create') }}" style="background:#0D1B38;border:none;border-radius:6px;font-weight:700;font-size:12px;padding:8px 14px;">
                    <i class="fa fa-plus"></i> Add Company
                </a>
            </div>
        </div>

        <!-- Filters -->
        <form method="GET" action="{{ url()->current() }}" class="modern-filters">
            <div class="modern-search-wrapper">
                <i class="fa fa-search"></i>
                <input type="text" id="customSearchInput" placeholder="Search company name or email...">
            </div>

            <select name="status" id="statusFilter" style="padding:9px 12px; border:1px solid var(--border-color); border-radius:6px; font-size:14px; outline:none; background:#fff; color:var(--text-dark); min-width:140px; font-weight:500;">
                <option value="">All Statuses</option>
                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
            
            <span style="color:var(--text-muted);font-weight:500;font-size:14px;">From:</span>
            <input type="date" name="from_date" id="fromDate" value="{{ request('from_date') }}">
            
            <span style="color:var(--text-muted);font-weight:500;font-size:14px;">To:</span>
            <input type="date" name="to_date" id="toDate" value="{{ request('to_date') }}">
            
            <a class="btn btn-sm btn-light" href="{{ url()->current() }}" style="background:#F3F6F9; border:none; font-weight:600; padding:9px 15px;">Clear Filters</a>

            @if ($user->can('company.delete'))
            <button type="button" class="btn btn-sm btn-danger delete_all" data-url="{{ route('admin.companies.deleteall') }}" style="padding:9px 15px; font-weight:600;">
                Delete Selected
            </button>
            @endif
        </form>
        <!-- Table -->
        <div class="data-tables">
            @include('backend.layouts.partials.messages')
            <table id="dataTable" class="modern-table">
                <thead>
                    <tr>
                        @if ($user->can('company.delete'))
                        <th width="3%" class="text-center"><input type="checkbox" id="master"></th>
                        @endif
                        <th width="5%">#</th>
                        <th width="20%">Company</th>
                        <th width="15%">User Email</th>
                        <th width="10%">State</th>
                        <th width="10%">Submitted</th>
                        @if ($user->can('company.edit'))
                        <th width="10%" class="text-center">Is Lead</th>
                        @endif
                        <th width="12%" class="text-center">Status</th>
                        <th width="15%" class="text-center">Verification</th>
                        <th width="10%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companyData as $data)
                    <tr id="tr_{{ $data['company']->id }}">
                        @if ($user->can('company.delete'))
                        <td class="text-center"><input type="checkbox" class="sub_chk" data-id="{{ $data['company']->id }}"></td>
                        @endif
                        <td>{{ $loop->index + 1 }}</td>
                        
                        <!-- Company Avatar & Name -->
                        <td>
                            @php
                                $initials = strtoupper(substr($data['company']->company_name ?? 'C', 0, 2));
                                
                                if ($data['company']->is_email_verified === 1) {
                                    $avatarBg = '#1BC5BD';
                                    $avatarColor = '#FFFFFF';
                                } elseif ($data['company']->is_email_verified === 0) {
                                    $avatarBg = '#FFF4DE';
                                    $avatarColor = '#FFA800';
                                } else {
                                    $avatarBg = '#EEF6FF';
                                    $avatarColor = '#3699FF';
                                }
                            @endphp
                            <div class="company-info-cell">
                                <div class="company-avatar" style="background-color: {{ $avatarBg }}; color: {{ $avatarColor }};">{{ $initials }}</div>
                                <div>
                                    <div class="company-name-text">{{ $data['company']->company_name }}</div>
                                    <div class="company-email-text">{{ $data['company']->company_email }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- User Email -->
                        <td>{{ $data['company']->email }}</td>

                        <!-- State -->
                        <td>{{ $data['company']->state->name ?? 'N/A' }}</td>

                        <!-- Submitted -->
                        <td>
                            @if($data['company']->created_at)
                                {{ $data['company']->created_at->format('M d, Y') }}
                            @else
                                N/A
                            @endif
                        </td>

                        <!-- Is Lead -->
                        @if ($user->can('company.edit'))
                        <td class="text-center">
                            @if ($data['company']->status == false)
                            <a class="modern-badge secondary" href="{{ route('admin.companies.isLeadActive', $data['company']->id) }}" style="text-decoration:none;">
                                Click to Active
                            </a>
                            @else
                            <a class="modern-badge success" href="{{ route('admin.companies.isLeadUnActive', $data['company']->id) }}" style="text-decoration:none;">
                                Active Lead
                            </a>
                            @endif
                        </td>
                        @endif

                        <!-- Status (Claimed) -->
                        <td class="text-center">
                            @if ($data['company']->is_claimed === 1)
                            <div class="modern-badge success">✓ Claimed</div>
                            @else
                            <div class="modern-badge danger">Not Claimed</div>
                            @endif
                        </td>

                        <!-- Email Verification -->
                        <td class="text-center">
                            @if ($data['company']->is_email_verified === 1)
                            <div class="modern-badge success">✓ Verified</div>
                            @else
                            <div class="modern-badge warning">⏳ Pending</div>
                            @endif
                        </td>

                        <!-- Action Kebab Menu -->
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-action-dots" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-modern">
                                    <a class="dropdown-item" target="_blank" href="/mover/{{$data['company']->slug}}">
                                        <i class="fa fa-eye"></i> View Profile
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('admin.companies.review', $data['company']->id) }}">
                                        <i class="fa fa-star"></i> Review
                                    </a>
                                    @if ($user->can('company.edit'))
                                    <a class="dropdown-item" href="{{ route('admin.comp.pass', $data['company']->id) }}">
                                        <i class="fa fa-key"></i> Reset Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.companies.edit', $data['company']->id) }}">
                                        <i class="fa fa-edit"></i> Edit Company
                                    </a>
                                    @endif
                                    
                                    @if ($user->can('company.delete'))
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('admin.companies.destroy', $data['company']->id) }}" style="margin:0;">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="dropdown-item text-danger show_confirm" style="border:none;background:transparent;width:100%;">
                                            <i class="fa fa-trash text-danger"></i> Delete Company
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
</div>

<script type="text/javascript">
    $(document).ready(function() {


        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {


                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });


                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });


         // data-toggle=confirmation  
        // $('[delete-btn]').confirmation({
        //     rootSelector: '[delete-btn]',
        //     onConfirm: function(event, element) {
        //         element.trigger('confirm');
        //     }
        // });


        $(document).on('confirm', function(e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
@endsection


@section('scripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> -->

<script>
    if ($('#dataTable').length) {
        var table = $('#dataTable').DataTable({
            responsive: true,
            lengthMenu: [
                [10, 25, 50, 100, 250, 500, 1000],
                [10, 25, 50, 100, 250, 500, 1000]
            ],
            // Custom search logic below
            dom: "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            language: {
                paginate: {
                    previous: '<i class="fa fa-angle-left"></i>',
                    next: '<i class="fa fa-angle-right"></i>'
                }
            }
        });

        // Link our custom search input to the DataTable
        $('#customSearchInput').on('keyup', function () {
            table.search(this.value).draw();
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        function submitIfReady() {
            let from = $('#fromDate').val();
            let to = $('#toDate').val();

            if (from !== "" && to !== "") {
                $(this).closest('form').submit();
            }
        }
        $('#fromDate, #toDate').on('change', submitIfReady);
        
        $('#statusFilter').on('change', function() {
            $(this).closest('form').submit();
        });
    });
</script>
<script>
    const fromDate = document.getElementById('fromDate');
    const toDate = document.getElementById('toDate');
    // From date change
    fromDate.addEventListener('change', () => {
        if (fromDate.value) {
            toDate.min = fromDate.value;
        } else {
            toDate.min = '';
        }
    });
    // To date change
    toDate.addEventListener('change', () => {
        if (toDate.value) {
            fromDate.max = toDate.value;
        } else {
            fromDate.max = '';
        }
    });
    // Page load pe bhi agar values hai
    if (fromDate.value) toDate.min = fromDate.value;
    if (toDate.value) fromDate.max = toDate.value;
</script>
@endsection