@extends('backend.layouts.master')

@section('title')
    City Average Cost - List
@endsection

@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .dataTables_length {
            float: left !important;
        }

        .dataTables_filter {
            float: right !important;
            text-align: right;
        }
    </style>
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
                    <h4 class="page-title pull-left">City Average Cost</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>City Average Cost List</span></li>
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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-title">City Average Cost List</h4>
                            @if ($user->can('city-avg-cost.create'))
                                <a href="{{ route('admin.city-avg-cost.create') }}" class="btn btn-primary">
                                    Create
                                </a>
                            @endif
                        </div>

                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive-lg">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>ID</th>
                                    <th>City Page</th>
                                    <th>Avg Cost</th>
                                    <th>Cost per Hour</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cityAvgCosts as $cost)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cost->cityPage->name ?? 'N/A' }}</td>
                                        <td>{{ $cost->avg_cost }}</td>
                                        <td>{{ $cost->cost_hour }}</td>
                                        <td>{{ $cost->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.city-avg-cost.edit', $cost->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ route('admin.city-avg-cost.destroy', $cost->id) }}" method="POST"
                                                style="display:inline-block;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm">
                                                    Delete
                                                </button>
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
    </div>
    </div>

    <!-- SweetAlert Delete -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable with search and entries left/right
            $('#dataTable').DataTable({
                responsive: true
            });
            // SweetAlert delete confirmation
            $(document).on('click', '.show_confirm', function (event) {
                event.preventDefault();
                var form = $(this).closest("form");
                swal({
                    title: "Are you sure you want to delete this record?",
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