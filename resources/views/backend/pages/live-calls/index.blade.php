@extends('backend.layouts.master')

@section('title')
    Live Calls - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                    <h4 class="page-title pull-left">Live Call</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Live Calls</span></li>
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
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Live Calls List</h4>
                        @if ($user->can('company-live-calls.create'))
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{route('admin.live-calls.create')}}">Create</a>
                        </p>
                        @endif
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Agent Name</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Call Tranferred Date & Time</th>
                                        <th>Call Duration</th>
                                        <th>Call Status</th>
                                        @if ($user->can('company-live-calls.delete'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($live_calls as $liveCall)
                                        @php
                                            $hours = floor($liveCall->call_duration / 60);
                                            $minutes = $liveCall->call_duration % 60;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $liveCall->company->company_name }} </td>
                                            <td>{{ $liveCall->agent_name }} </td>
                                            <td>{{ $liveCall->user_name }} </td>
                                            <td>{{ $liveCall->user_email }} </td>
                                            <td>{{ $liveCall->user_phone }} </td>
                                            <td>{{ \Carbon\Carbon::parse($liveCall->call_date_time)->format('Y-m-d | h:i A') }}
                                            </td>
                                            <td>{{ $hours > 0 ? $hours . 'h ' : '' }}{{ $minutes }}m </td>
                                            <td>
                                                @if ($liveCall->status == 'confirmed')
                                                    <span class="badge badge-success">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            @if ($user->can('company-live-calls.delete'))
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <form method="POST" action="{{ route('admin.live-calls.destroy', $liveCall->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-white show_confirm">
                                                    <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        $('.show_confirm').click(function (event) {
            event.preventDefault();
            var form = $(this).closest("form");
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