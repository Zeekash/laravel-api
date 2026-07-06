@extends('backend.layouts.master')

@section('title')
    Soft Deleted State to City Routes - Admin Panel
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

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
                    <h4 class="page-title pull-left">Soft Deleted State to City Routes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.state-to-city-routes.index') }}">State to City Routes</a></li>
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
                        <h4 class="header-title float-left">Soft Deleted State to City Routes</h4>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Deleted At</th>
                                        <th>Deleted By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stateToCityRoutes as $route)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $route->stateFrom->name ?? '' }}</td>
                                            <td>{{ $route->cityTo->name ?? '' }}</td>
                                            <td>{{ $route->deleted_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $route->deletedBy?->name ?? 'N/A' }}</td>
                                            <td style="display: flex; justify-content: center">
                                                @if ($user->can('state-to-city-route.restore'))                                              
                                                <form action="{{ route('admin.state-to-city.restore', $route->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <a href="#" class="btn btn-primary text-white show_confirm mr-1"
                                                        data-toggle="tooltip" title='Restore'
                                                        data-title="Are you sure you want to restore this route?"
                                                        data-text="This action will recover the route and make it visible again."
                                                        data-icon="info" data-danger-mode="false">
                                                        <i class="fa fa-undo"></i>
                                                    </a>
                                                </form>
                                                @endif
                                                @if ($user->can('state-to-city-route.force-delete'))
                                                <form action="{{ route('admin.state-to-city.forceDelete', $route->id) }}" method="POST" style="display: inline;">
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
                                                @endif
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

        <!-- SweetAlert -->
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
    </div>
@endsection

@section('scripts')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
