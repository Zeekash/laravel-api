@extends('backend.layouts.master')

@section('title')
    City Living Expense - List
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

                    <h4 class="page-title pull-left">City Living Expense</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>City Living Expenses</span></li>
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
                        <h4 class="header-title float-left">City Living Expense</h4>
                        @if ($user->can('city-living-expense.create'))
                            <div class="button-group float-right mb-2">
                                <a href="{{ route('admin.city-living-expense.create') }}"
                                    class="btn btn-primary create_button">Create</a>
                            </div>
                        @endif
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>

                                        <th>Sr No.</th>
                                        <th>City Page</th>
                                        <th>Basic Utilities</th>
                                        <th>Cell Phone Plan</th>
                                        <th>Dozen Eggs</th>
                                        <th>Loaf Of Bread</th>
                                        <th>Fast Food/Casual Eatory (One Meal)</th>
                                        <th>Dinner For 2(Mid-Range Restaurant)</th>
                                        <th>Gym Membership</th>
                                        @if ($user->can('city-living-expense.edit') || $user->can('city-living-expense.delete'))
                                            <th>Action</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($city_living_expenses as $city_living_expense)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $city_living_expense->cityPage->name ?? 'N/A' }}</td>
                                            <td>{{ $city_living_expense->basic_utilities }}</td>
                                            <td>{{ $city_living_expense->cell_phone_plan }}</td>
                                            <td>{{ $city_living_expense->dozen_eggs }}</td>
                                            <td>{{ $city_living_expense->loaf_of_bread }}</td>
                                            <td>{{ $city_living_expense->fast_food }}</td>
                                            <td>{{ $city_living_expense->dinner }}</td>
                                            <td>{{ $city_living_expense->gym_membership }}</td>
                                            @if ($user->can('city-living-expense.edit') || $user->can('city-living-expense.delete'))
                                                <td style="display:flex;justify-content: center">
                                                    @if ($user->can('city-living-expense.edit'))
                                                        <a class="btn btn-secondary text-white"
                                                            href="{{ route('admin.city-living-expense.edit', $city_living_expense->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    @endif
                                                    @if ($user->can('city-living-expense.delete'))
                                                        <a class="btn btn-danger text-white show_confirm"
                                                            href="{{ route('admin.city-living-expense.delete', $city_living_expense->id) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
            event.preventDefault();
            let url = $(this).attr("href");

            swal({
                title: "Are you sure you want to delete this?",
                text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
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
