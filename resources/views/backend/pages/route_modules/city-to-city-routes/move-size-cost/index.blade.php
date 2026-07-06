@extends('backend.layouts.master')

@section('title')
City To City Route Move Size Cost - List
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
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

                    <h4 class="page-title pull-left">City To City Route Move Size Cost</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>City To City Route Move Size Cost</span></li>
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
                        <h4 class="header-title float-left">City To City Routes Move Size Cost</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.city-to-city-routes.move-size-cost.create') }}">Create
                            </a>
                        </p>
                        <div class="clearfix"></div>
                        {{-- <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ route('admin.contact-us.deleteall') }}">Delete Selected</button> --}}
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>City To City Route Page Title</th>
                                        <th>Moving Company Studio/1 Bedroom</th>
                                        <th>Moving Container Studio/1 Bedroom</th>
                                        <th>Rent Truck Studio/1 Bedroom</th>
                                        <th>Moving Company 2-3 bedrooms</th>
                                        <th>Moving Container 2-3 bedrooms</th>
                                        <th>Rent Truck 2-3 bedrooms</th>
                                        <th>Moving Company 4+ bedrooms</th>
                                        <th>Moving Container 4+ bedrooms</th>
                                        <th>Rent Truck 4+ bedrooms</th>
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
            <!-- data table end -->
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
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
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
                    datatable active (server-side)
                    ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.city-to-city-routes.move-size-cost.index") }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'route_title', name: 'route_title'},
                    {data: 'moving_company_studio_bedroom', name: 'moving_company_studio_bedroom'},
                    {data: 'moving_container_studio_bedroom', name: 'moving_container_studio_bedroom'},
                    {data: 'rental_truck_studio_bedroom', name: 'rental_truck_studio_bedroom'},
                    {data: 'moving_company_2_3_bedroom', name: 'moving_company_2_3_bedroom'},
                    {data: 'moving_container_2_3_bedroom', name: 'moving_container_2_3_bedroom'},
                    {data: 'rental_truck_2_3_bedroom', name: 'rental_truck_2_3_bedroom'},
                    {data: 'moving_company_4_bedroom', name: 'moving_company_4_bedroom'},
                    {data: 'moving_container_4_bedroom', name: 'moving_container_4_bedroom'},
                    {data: 'rental_truck_4_bedroom', name: 'rental_truck_4_bedroom'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                responsive: true
            });
        }
    </script>
@endsection
