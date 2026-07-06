@extends('backend.layouts.master')

@section('title')
Products - Admin Panel
@endsection
@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection
@section('admin-content')
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Orders</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Orders</span></li>
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
                    <h4 class="header-title float-left">Orders List</h4>

                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <form method="POST" action="{{ route('admin.orders.deleteSelected') }}">
                            @csrf
                            @method('DELETE')
                            @if (Auth::guard('admin')->user()->can('order.delete'))
                            <button type="submit" class="btn btn-danger mb-3  show_confirm">Delete
                                Selected</button>
                            @endif
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        @if (Auth::guard('admin')->user()->can('order.delete'))
                                        <th><input type="checkbox" id="select-all"></th>
                                        @endif
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                        <th>Payer Name</th>
                                        <th>Payer Email</th>
                                        <th>Purchase Date</th>
                                        <th>Status</th>
                                        @if (Auth::guard('admin')->user()->can('order.delete'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        @if (Auth::guard('admin')->user()->can('order.delete'))
                                        <td><input type="checkbox" name="ids[]" value="{{ $order->id }}"></td>
                                        @endif
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->company->company_name }} </td>
                                        <td>{{ $order->product->name }} </td>
                                        <td>{{ $order->quantity }} </td>
                                        <td>$ {{ $order->total_amount }} </td>
                                        <td>{{ $order->payer_name }} </td>
                                        <td>{{ $order->payer_email }} </td>
                                        <td>{{ $order->created_at->format('d-M-Y') }} </td>
                                        <td><span class="badge bg-success text-white ">Paid</span></td>
                                        @if (Auth::guard('admin')->user()->can('order.delete'))
                                        <td>
                                            {{-- <a class="btn btn-danger text-white" onclick="return confirm('Are you sure you want to delete this?')"
                                                    href="{{ route('admin.orders.destroy', $order->id) }}">
                                            <i class="fa fa-trash"></i></a> --}}
                                            <form method="POST"
                                                action="{{ route('admin.orders.destroy', $order->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </form>
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

<script>
    // Select all checkboxes
    document.getElementById('select-all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection