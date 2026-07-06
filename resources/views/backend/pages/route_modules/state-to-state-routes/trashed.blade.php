@extends('backend.layouts.master')

@section('title')
Soft Deleted State To State Routes
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

                    <h4 class="page-title pull-left">Soft Deleted State To State Routes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.state-to-state-routes.index') }}">State To State Routes</a></li>
                        <li><span>Soft Deleted</span></li>
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
                        <h4 class="header-title float-left">Soft Deleted State To State Routes</h4>
                        <div class="clearfix"></div>
                        {{-- <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ route('admin.contact-us.deleteall') }}">Delete Selected</button> --}}
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>

                                        <th >Sr No.</th>
                                        <th >Page</th>
                                        <th >State From</th>
                                        <th >State To</th>
                                        {{-- <th >Miles</th> --}}
                                        {{-- <th >Min Cost</th> --}}
                                        {{-- <th >Max Cost</th> --}}
                                        <th>Deleted At</th>
                                        <th>Deleted By</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($state_to_state_routes as $stateToStateRoute)
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}</td>
                                            <td>{{ $stateToStateRoute->stateFrom->name }}</td>
                                            <td>{{ $stateToStateRoute->stateTo->name }}</td>
                                            {{-- <td>{{ $stateToStateRoute->miles }}</td> --}}
                                            {{-- <td>{{ $stateToStateRoute->min_cost }}</td> --}}
                                            {{-- <td>{{ $stateToStateRoute->max_cost }}</td> --}}
                                            <td>{{ $stateToStateRoute->deleted_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $stateToStateRoute->deletedBy?->name }}</td>
                                            <td style="display:flex;justify-content: center">
                                                <form action="{{ route('admin.state-to-state-routes.restore', $stateToStateRoute->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <a href="#" class="btn btn-primary text-white show_confirm mr-1"
                                                        data-toggle="tooltip" title='Restore'
                                                        data-title="Are you sure you want to restore this route?"
                                                        data-text="This action will recover the route and make it visible again."
                                                        data-icon="info" data-danger-mode="false">
                                                        <i class="fa fa-undo"></i>
                                                    </a>
                                                </form>
                                                <form action="{{ route('admin.state-to-state-routes.forceDelete', $stateToStateRoute->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-danger text-white show_confirm"
                                                        data-toggle="tooltip" title='Force Delete'
                                                        data-title="Are you sure you want to permanently delete this route?"
                                                        data-text="This action cannot be undone and the route will be gone forever."
                                                        data-icon="warning" data-danger-mode="true">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                            </td>
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

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var title = $(this).data('title');
                var text = $(this).data('text');
                var icon = $(this).data('icon') || 'warning';
                var dangerMode = $(this).data('danger-mode') === true;

                event.preventDefault();
                swal({
                        title: title,
                        text: text,
                        icon: icon,
                        buttons: true,
                        dangerMode: dangerMode,
                    })
                    .then((willPerformAction) => {
                        if (willPerformAction) {
                            form.submit();
                        }
                    });
            });
        </script>
@endsection


@section('scripts')
    <!-- Start datatable js -->
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> --}}
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
