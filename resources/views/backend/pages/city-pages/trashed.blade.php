@extends('backend.layouts.master')

@section('title')
    Soft Deleted City Pages
@endsection

@section('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                    <h4 class="page-title pull-left">Soft Deleted City Pages</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.citypages.index') }}">City Pages</a></li>
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
                        <h4 class="header-title float-left">Soft Deleted City Pages</h4>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>State Name</th>
                                        <th>Deleted At</th>
                                        <th>Deleted By</th>
                                        @if ($user->can('city-page.restore') || $user->can('city-page.force-delete'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cityPages as $cityPage)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $cityPage->name }}</td>
                                            <td>{{ $cityPage->state->name }}</td>
                                            <td>{{ $cityPage->deleted_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $cityPage->deletedBy?->name ?? 'N/A' }}</td>
                                            @if ($user->can('city-page.restore') || $user->can('city-page.force-delete'))
                                            <td style="display: flex; justify-content: center">
                                                @if ($user->can('city-page.restore'))
                                                <form action="{{ route('admin.citypages.restore', $cityPage->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary text-white show_confirm mr-1"
                                                        data-toggle="tooltip" title='Restore'
                                                        data-title="Are you sure you want to restore this city page?"
                                                        data-text="This action will recover the city page and make it visible again."
                                                        data-icon="info" data-danger-mode="false">
                                                        <i class="fa fa-undo"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                @if ($user->can('city-page.force-delete'))
                                                <form action="{{ route('admin.citypages.forceDelete', $cityPage->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-white show_confirm"
                                                        data-toggle="tooltip" title='Force Delete'
                                                        data-title="Are you sure you want to permanently delete this city page?"
                                                        data-text="This action cannot be undone and the city page will be gone forever."
                                                        data-icon="warning" data-danger-mode="true">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                @endif
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

        <!-- SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function (event) {
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
