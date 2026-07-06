@extends('backend.layouts.master')

@section('title')
    State To City Route - List
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">State To City Route</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>State To City Route</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-md-6 col-lg-3 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon">Total State To City Routes</div>
                            <h2>{{ $routesCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @if ($user->can('state-to-city-route.view-trash'))
                <div class="col-md-6 col-lg-3 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <a href="{{ route('admin.state-to-city-routes.trashed') }}">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Soft Deleted Routes</div>
                                    <h2>{{ $trashedCount }}</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <h4 class="header-title float-left">State To City Routes</h4>
                            </div>
                            <div class="col-lg-6 mt-0">

                                <form action="{{ route('admin.state-to-city-routes.import') }}" method="POST"
                                    enctype="multipart/form-data" class="p-3 ">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-3">
                                            <label for="file" class="col-form-label">Upload Excel File</label>
                                        </div>

                                        <div class="col-sm-5">
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>

                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Import File
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-3">
                                @if ($user->can('state-to-city-route.create'))
                                    <p class="float-right mb-2">
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('admin.state-to-city-routes.create') }}">Create</a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Page</th>
                                        <th>State From</th>
                                        <th>City To</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- DataTables will populate rows via AJAX --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.show_confirm', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Delete`,
                    text: "Are you sure you want to delete this record?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    {{-- for Import Info  --}}
    <script>
        setInterval(function() {
            $.get("/admin/import-info-summary", function(res) {
                // console.log("SUMMARY RESPONSE:", res);
                if (res) {
                    swal({
                        title: "Import Completed!",
                        text: "Total Inserted: " + res.inserted + " | Duplicates Skipped: " + res.skipped,
                        icon: "success"
                    }).then(() => {
                        location.reload();
                    });
                    $.get("/admin/clear-info-summary");
                }
            });
        }, 5000);
    </script>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.state-to-city-routes.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'page',
                        name: 'page'
                    }, {
                        data: 'state_from',
                        name: 'state_from'
                    },
                    {
                        data: 'city_to',
                        name: 'city_to'
                    }, {
                        data: 'created_by',
                        name: 'created_by'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                responsive: true,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, 1000, 2000],
                    [10, 25, 50, 100, 250, 500, 1000, 2000]
                ],
            });
        }
    </script>
@endsection
