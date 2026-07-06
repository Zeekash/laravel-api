@extends('layouts.app')
@section('content')
    <style>
        .single-footer-widget .quick-links li {
            position: relative;
            padding: 10px 0px !important;
        }
    </style>
    <!-- Start Company Dashboard Area -->
    <section class="bg-image py-5 company-dash-area bg-of-aqua-shade -sec">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto dash-height-row">
                            @include('frontend.company_auth.compDashSidebar')
                            <div class="col-12 col-lg-9 col-xl-9 py-3 dash-col2">
                                <h3 class="ps-2 py-4 dark-color">Orders List</h3>
                                <div class="row row-of-table-review m-auto w-100">
                                    <table id="table-of-review" class="table table-responsive  w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th style="width:30%;">Product Name</th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Payer Name</th>
                                                <th>Payer Email</th>
                                                <th>Purchase Date</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>

                                                    <td>{{ $order->product->name }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>$ {{ $order->total_amount }}</td>
                                                    <td>{{ $order->payer_name }} </td>
                                                    <td>{{ $order->payer_email }} </td>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('M d,Y') }}</td>
                                                    <td><span class="badge bg-success text-white">Paid</span></td>
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
        </div>
    </section>
@endsection
