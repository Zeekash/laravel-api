@extends('backend.layouts.master')

@section('title')
    City Cost Of Living
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

                    <h4 class="page-title pull-left">City Cost Of Livings</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>List</span></li>
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
                        <h4 class="header-title float-left">City Cost Of Livings</h4>
                        @if ($user->can('city-cost-of-living.create'))
                        <div class="button-group float-right mb-2">
                            <a href="{{ route('admin.cityCostOfLiving.create') }}" class="btn btn-primary create_button">Create</a>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                        @include('backend.layouts.partials.messages')
                        <div class="data-tables">
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>City Name</th>
                                        <th>Avg 1 BR rent</th>
                                        <th>Avg 3 BR rent</th>
                                        <th>Average rent cost</th>
                                        <th>Average home value</th>
                                        <th>Average income (per capita)</th>
                                        <th>Cost of living (single person)</th>
                                        <th>Cost of living (family of 4)</th>
                                        <th>Cost of living index</th>
                                        <th>Unemployment rate</th>
                                        <th>Avg Sales tax</th>
                                        <th>State income tax</th>
                                        @if ($user->can('city-cost-of-living.edit') || $user->can('city-cost-of-living.delete'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($city_cost_of_livings as $cityCostOfLiving)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $cityCostOfLiving->cityPage->name ?? 'Null' }}</td>
                                            <td>{{ $cityCostOfLiving->avg_1_br_rent }}</td>
                                            <td>{{ $cityCostOfLiving->avg_3_br_rent }}</td>
                                            <td>{{ $cityCostOfLiving->avg_rent_cost }}</td>
                                            <td>{{ $cityCostOfLiving->avg_home_cost }}</td>
                                            <td>{{ $cityCostOfLiving->avg_income }}</td>
                                            <td>{{ $cityCostOfLiving->cost_of_living_single }}</td>
                                            <td>{{ $cityCostOfLiving->cost_of_living_family }}</td>
                                            <td>{{ $cityCostOfLiving->cost_of_living_index }}</td>
                                            <td>{{ $cityCostOfLiving->unemployment_rate }}</td>
                                            <td>{{ $cityCostOfLiving->avg_sales_tax }}</td>
                                            <td>{{ $cityCostOfLiving->state_income_tax }}</td>
                                            @if ($user->can('city-cost-of-living.edit') || $user->can('city-cost-of-living.delete'))
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    @if ($user->can('city-cost-of-living.edit'))
                                                    <a class="btn btn-primary mr-1" href="{{ route('admin.cityCostOfLiving.edit', $cityCostOfLiving->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @endif
                                                    @if ($user->can('city-cost-of-living.delete'))
                                                    <form method="POST" action="{{ route('admin.cityCostOfLiving.destroy', $cityCostOfLiving->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'>
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </form>
                                                    @endif
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
        </div>
    </div>
@endsection
@section('scripts')
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
