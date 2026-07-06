@extends('backend.layouts.master')

@section('title')
    State Life Style Pages - List
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
                <h4 class="page-title pull-left">State Life Style Pages</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>State Life Style Pages</span></li>
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
                    <h4 class="header-title float-left">State Life Style</h4>
                    @if ($user->can('state-life-style.create'))
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white"
                            href="{{ route('admin.state-life-style.create') }}">Create
                        </a>
                    </p>
                    @endif
                    <div class="clearfix"></div>

                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')

                        <table id="dataTable" class="text-center table-responsive-lg">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>State</th>
                                    <th>Population</th>
                                    <th>Political Leaning</th>
                                    <th>Summer High</th>
                                    <th>Winter Low</th>
                                    <th>Annual Rain</th>
                                    <th>Annual Snow</th>
                                    <th>Crime Index</th>
                                    <th>Transportation Score</th>
                                    <th>Walkability Score</th>
                                    <th>Bike Friendliness Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stateLifeStyles as $stateLifeStyle)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $stateLifeStyle->state->name }}</td>
                                    <td>{{ $stateLifeStyle->population }}</td>
                                    <td>{{ $stateLifeStyle->political_leaning }}</td>
                                    <td>{{ $stateLifeStyle->summer_high }}</td>
                                    <td>{{ $stateLifeStyle->winter_low }}</td>
                                    <td>{{ $stateLifeStyle->annual_rain }}</td>
                                    <td>{{ $stateLifeStyle->annual_snow }}</td>
                                    <td>{{ $stateLifeStyle->crime_index }}</td>
                                    <td>{{ $stateLifeStyle->transportation_score }}</td>
                                    <td>{{ $stateLifeStyle->walkability_score }}</td>
                                    <td>{{ $stateLifeStyle->bike_friendliness_score }}</td>
                                    <td style="display:flex;justify-content: center">
                                        @if ($user->can('state-life-style.edit'))
                                        <a class="btn btn-primary text-white mr-1" href="{{ route('admin.state-life-style.edit', $stateLifeStyle->id) }}"><i class="fa fa-pencil"></i></a>
                                        @endif
                                        @if ($user->can('state-life-style.delete'))
                                        <a class="btn btn-danger text-white show_confirm"
                                           href="{{ route('admin.state-life-style.destroy', $stateLifeStyle->id) }}">
                                           <i class="fa fa-trash"></i>
                                        </a>
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
    <script>
        $('.show_confirm').click(function (event) {
            event.preventDefault();
            var link = $(this).attr("href");

            swal({
                title: "Are you sure?",
                text: "This record will be permanently deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = link;
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
