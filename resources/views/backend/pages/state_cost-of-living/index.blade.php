@extends('backend.layouts.master')

@section('title')
    Cost Of Living - List
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

                    <h4 class="page-title pull-left">State Cost Of Living</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>State Cost Of Livings</span></li>
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
                        <h4 class="header-title float-left">State Cost Of Living</h4>
                        @if ($user->can('state-cost-of-living.create'))
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white"
                                href="{{ route('admin.stateCostOfLiving.create') }}">Create
                            </a>
                        </p>
                        @endif
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        {{-- <th><input type="checkbox" id="master"></th> --}}
                                        <th>Sr No.</th>
                                        <th>State</th>
                                        <th>Average Rent Cost</th>
                                        <th>Average Home Cost</th>
                                        <th>Average Income (Per Capita)</th>
                                        <th>Cost Of Living Index</th>
                                        <th>Cost Of Living (Single)</th>
                                        <th>Cost Of Living (Family Of Four)</th>
                                        <th>Un-employment Rate</th>
                                        <th>Sales Tax</th>
                                        <th>State Income Tax</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($state_cost_of_livings as $scol)
                                        <tr>
                                            {{-- <td><input type="checkbox" class="sub_chk" data-id="{{$companyInfo->id}}"></td> --}}
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $scol->state->name }}</td>
                                            <td>{{ $scol->average_rent_cost }}</td>
                                            <td>{{ $scol->average_home_cost }}</td>
                                            <td>{{ $scol->average_income_per_capita }}</td>
                                            <td>{{ $scol->cost_of_living_index }}</td>
                                            <td>{{ $scol->cost_of_living_single }}</td>
                                            <td>{{ $scol->cost_of_living_family_of_four }}</td>
                                            <td>{{ $scol->unemployment_rate }}</td>
                                            <td>{{ $scol->sales_tax }}</td>
                                            <td>{{ $scol->state_income_tax }}</td>

                                            <td style="display:flex;justify-content: center">
                                                @if ($user->can('state-cost-of-living.edit'))
                                                <a class="btn btn-primary text-white mr-1"
                                                    href="{{ route('admin.stateCostOfLiving.edit', $scol->id) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                @endif
                                                @if ($user->can('state-cost-of-living.delete'))
                                                <form method="POST"
                                                    action="{{ route('admin.stateCostOfLiving.destroy', $scol->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a type="submit" class="btn btn-danger text-white show_confirm"
                                                        data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></a>
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
