@extends('backend.layouts.master')

@section('title')
    Review Disputes - Admin Panel
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
                    <h4 class="page-title pull-left">Review Disputes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All Review Disputes</span></li>
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
        <div class="row">

            <div class="col-md-6 mt-5 ">
                <div class="card">
                    <div class="seo-fact sbg1">

                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-star"></i>Resolved Disputes</div>
                            <h2>{{ $resolved_disputes }}</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 ">
                <div class="card">
                    <div class="seo-fact sbg1">

                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-exclamation-circle"></i>Un-Resolved Disputes</div>
                            <h2>{{ $unresolved_disputes }}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">All Review Disputes</h4>
                    <div class="clearfix"></div>
                    <form method="POST" action="{{ route('admin.disputes.bulkDestroy') }}" id="bulk-delete-form">
                        @csrf
                        @method('DELETE')
                        @if ($user->can('review-dispute.delete'))
                            <button type="submit" class="btn btn-danger mb-3"
                                onclick="return confirm('Are you sure you want to delete selected review(s)?')">Delete
                                Selected</button>
                        @endif
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th>
                                        <th width="5%">Sr No.</th>
                                        <th width="10%">User Name</th>
                                        <th width="10%">Company Name</th>
                                        <th width="20%">Dispute Subject</th>
                                        <th width="35%">Dispute Description</th>
                                        <th width="10%">Dispute Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disputes as $dispute)
                                        <tr>
                                            <td><input type="checkbox" name="disputeids[]" value="{{ $dispute->id }}">
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $dispute->user->name ?? 'Not Available' }}</td>
                                            <td>{{ $dispute->company->company_name ?? 'Not Available' }}</td>
                                            <td>{{ $dispute->subject ?? '' }}</td>
                                            <td>{{ $dispute->description ?? '' }}</td>
                                            @if ($dispute->is_resolved ?? '0')
                                                <td>
                                                    <div class="py-2 mx-3"
                                                        style="color:white;background-color:#11b311;border-radius:12px;">
                                                        Resolved</div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="py-2 mx-3"
                                                        style="color:white;background-color:#ff1515;border-radius:12px;">
                                                        Not Resolved</div>
                                                </td>
                                            @endif

                                            <td style="display:flex; justify-content: center">
                                                @if ($user->can('review-dispute.edit'))
                                                    <a class="btn btn-success text-white"
                                                        href="{{ route('admin.dispute.edit', $dispute->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                @endif
                                                @if ($user->can('review-dispute.delete'))
                                                    <a href="{{ route('admin.dispute.destroy', $dispute->id) }}"
                                                        class="btn btn-danger text-white"
                                                        onclick="return confirm('Are you sure you want to delete this?')"><i
                                                            class="fa fa-trash"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        // Select all checkboxes
        document.getElementById('select-all').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="disputeids[]"]');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
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
        /*================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        datatable active
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
