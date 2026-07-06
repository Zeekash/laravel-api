@extends('layouts.app')
@section('title', 'Advertisement')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/advertiseFormPage.css') }}">
    <section id="advertise_form">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-12  mt-lg-0 mt-4">
                    <div class="terms">
                        <h2>Terms & Conditions</h2>
                        <ul>
                            <li>
                                MGM Advertising plans are available for moving companies in USA (United States of America)
                                only.
                            </li>
                            <li>
                                All moving companies need to be licensed and have valid permits. Additional checks are
                                executed with the respective authority – FMCSA, State Department of Transportation, Public
                                Utilities Commission .
                            </li>
                            <li>
                                Advertised companies must maintain a positive reputation, one that we will check throughout
                                the duration of the advertising campaign.
                            </li>
                            <li>
                                Unclaimed companies listed on our website are restricted from engaging in any form of
                                advertisement on our platform.
                            </li>
                            <li>
                                Companies involved in legal conflicts with our platform or other companies are strictly
                                prohibited from advertising on our platform.
                            </li>
                        </ul>
                        <p
                            class="m-0 text-sm-start text-center d-flex align-items-center justify-content-xl-start justify-content-center flex-wrap ">
                            <span>For more info contact us at:</span> <a href="mailto:contact@mymovingjourney.com.com"
                                class="text-white ms-1">contact@mymovingjourney.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mx-auto">
                    <form action="{{ route('advertisement.store') }}" method="POST">
                        @csrf
                        @include('flash-message')
                        <div class="card border-0">
                            <div class="card-header text-center bg-transparent">
                                <h1 class="fs-3 m-0 text-capitalize">advertise your company</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3 ">
                                        <label for="name">owner Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required placeholder="Enter Your Name">
                                    </div>
                                    <div class="col-lg-6 col-12 mb-3">
                                        <label for="email">owner Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required placeholder="Enter Your Email">
                                    </div>
                                    <div class="col-lg-6 col-12 mb-3">
                                        <label for="phone">owner Phone No</label>
                                        <input type="text" name="phone" class="form-control" id="phone" required placeholder="Enter Your Phone no.">
                                    </div>
                                    <div class="col-lg-6 col-12 mb-3">
                                        <label for="company_name" class="d-block">owner Company</label>

                                        <input type="text" name="company_name" class="form-control" id="company_name" required placeholder="Enter Your Company Name" >
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="4" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="call_action mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 call_info text-center">
                        <a href="#">
                            <h5>
                                Do you need help with your upcoming move? CALL US NOW
                            </h5>
                            <span>
                                Get a free quote and moving consultation. We are available 24/7.
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
