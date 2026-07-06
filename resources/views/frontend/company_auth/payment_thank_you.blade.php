@extends('layouts.app')
@section('content')
    <style>
        .single-footer-widget .quick-links li {
            position: relative;
            padding: 10px 0px !important;
        }
    </style>
    <!-- Start Company Dashboard Area -->
    <section class="bg-of-aqua-shade  py-5">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto dash-height-row ">
                            @include('frontend.company_auth.compDashSidebar')
                            <div class="col-12 col-lg-9 col-xl-9 py-3 dash-col2">
                                <section class="section about-section p-0" id="about-dash">
                                    <div class="container px-0 ">
                                        <div class="row flex-row-reverse row-of-inner-dash">
                                           
                                            <div class="container mt-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                            
                                                        <div class="card shadow rounded text-center p-4">
                                                            <div class="card-body">
                                            
                                                                <i class="fas fa-check-circle text-success" style="font-size: 100px; margin-bottom:10px"></i>
                                            
                                                                <h1 class="card-title mb-3">Thank You!</h1>
                                                                <p class="card-text text-muted">Your payment was successful and your order has been received.</p>
                                            
                                                                <a href="/company/dashboard" class="btn btn-outline-secondary mt-2">Go to Dashboard</a>
                                            
                                                            </div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
