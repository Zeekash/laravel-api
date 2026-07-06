@extends('layouts.app')
@section('title', 'Advertising Page')
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/advertising.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

            <section class="advertise_content_section py-5">
                
                      <!-- Header -->
            <div class="header-section">
                <div class="container">
                    <div class="Advertising-Title">
                        <h1>My Moving Journey Advertising Solutions</h1>
                        <p>Connect with customers actively searching for moving services like yours.
                            Our targeted advertising options help you grow your business efficiently.</p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="Advertising_info py-5">
                            <p>
                                Join thousands of moving companies who rely on My Moving Journey to connect with potential
                                customers every day! Our specialized advertising platform puts your business in front of
                                people actively searching for moving services in your area.
                            </p>
    
                            <p>
                                With our targeted approach, you'll reach customers at the exact moment they're making
                                decisions about their move. Our comprehensive advertising solutions are designed to maximize
                                your exposure and deliver quality leads.
                            </p>
                        </div>                      
                        <!-- Ad Cards Section -->
                        <div class="row mt-3">
                            <!-- Profile Ad Card -->
                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                <div class="profile-ad-card p-xl-4 p-3">
                                    <div class="profile-ad-header">
                                        <h3>Profile Ad Example</h3>
                                    </div>
                                    <div class="profile-ad-body">
                                        <p>
                                            Secure premium placement on competitor business pages and capture potential
                                            clients
                                            who are comparing services.
                                        </p>
                                        <p>
                                            Get detailed monthly reports showing <strong>impressions, clicks</strong>,
                                            and
                                            overall performance metrics to track your <strong>ROI</strong> effectively.
                                        </p>
                                        <p>
                                            Secure premium placement on competitor business pages and capture potential
                                            clients
                                            who are comparing services.
                                        </p>
                                    </div>
                                    <div class="profile-ad-actions">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal"
                                            class="See_Example">See Example</a>
                                        <a href="#" class="Get_Estimate">Get Estimate</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Listing Ad Card -->
                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                <div class="profile-ad-card p-xl-4 p-3">
                                    <div class="profile-ad-header">
                                        <h3>Listing Ads</h3>
                                    </div>
                                    <div class="profile-ad-body2">
                                        <!-- <div class="placeholder-img mb-4">
                                    <span class="highlight">Listing Ad Example</span>
                                  </div> -->
                                        <p>
                                            Capture high-intent traffic from our popular listing pages. These visitors
                                            are actively searching
                                            for moving services and ready to make contact.
                                        </p>
                                        <ul class="feature-list ps-0">
                                            <li>Homepage Listings <a href="#" class="example-link"
                                                    data-bs-toggle="modal" data-bs-target="#homeModal">See Example</a>
                                            </li>
                                            <li>State Page Listings <a href="#" class="example-link"
                                                    data-bs-toggle="modal" data-bs-target="#stateModal">See Example</a>
                                            </li>
                                            <li>Route Page Listings <a href="#" class="example-link"
                                                    data-bs-toggle="modal" data-bs-target="#routeModal">See Example</a>
                                            </li>
                                            <li>City Page Listings <a href="#" class="example-link"
                                                    data-bs-toggle="modal" data-bs-target="#cityModal">See Example</a>
                                            </li>
                                        </ul>
                                        <div class="profile-ad-actions">
                                            <a href="#" class="Get_Estimate">Get Estimate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <!-- Moving Inquiries Card -->
                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                <div class="profile-ad-card">
                                    <div class="profile-ad-header">
                                       <h3>Moving Inquiries</h3> 
                                    </div>
                                    <div class="profile-ad-body">
                                       
                                        <p>
                                            Receive moving inquiries directly to your email from customers actively
                                            seeking full-service movers. Customize your leads based on locations, move
                                            size, distance, and moving date for maximum relevance.
                                        </p>
                                        <p>
                                            Perfect for companies looking to fill their schedule with qualified jobs
                                            that match their service capabilities.
                                        </p>
                                        <div class="mt-5">
                                            <a href="#" class="Get_Estimate">Get Estimate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Call Transfers Card -->
                            <div class="col-lg-6 col-md-6 col-12 mb-4">
                                <div class="profile-ad-card">
                                    <div class="profile-ad-header">
                                       <h3>Instant Call Transfers</h3> 
                                    </div>
                                    <div class="profile-ad-body">
                                        <p>
                                            Get direct calls transferred to your phone lines from customers searching
                                            for quality moving services. Minimize competition by connecting directly
                                            with potential customers over the phone.
                                        </p>
                                        <p>
                                            You control the volume and geographic targeting with our advanced filtering
                                            system. It's like having your own dedicated moving service hotline!
                                        </p>
                                        <div class="mt-4">
                                            <a href="#" class="Get_Estimate">Get Estimate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Section -->
                        {{-- <div class="contact-section text-center">
                            <h3>Ready to Grow Your Moving Business?</h3>
                            <p>Contact our advertising team today to discuss which solutions best fit your business
                                goals.</p>
                            <a href="mailto:contact@mygoodmovers.com" class="btn btn-primary mt-3">Contact Us Today</a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Modals -->
            <!-- Profile Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Profile Ad Example</h5>
                           
                            <button class="close_btn" type="button" data-bs-dismiss="modal" aria-label="Close"> <i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h5 class="modal-view-title">Desktop View</h5>
                                    <div class="placeholder-img">
                                        <img src="/image/home_desktop.webp" alt="Desktop Profile Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="modal-view-title">Mobile View</h5>
                                    <div class="mobile-preview">
                                        <img src="/image/home-page-mobile.webp5.webp"
                                            alt="Mobile Profile Ad Example" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Home Modal -->
            <div class="modal fade" id="homeModal" tabindex="-1" aria-labelledby="homeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="homeModalLabel">Homepage Listing Ad Example</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h5 class="modal-view-title">Desktop View</h5>
                                    <div class="placeholder-img">
                                        <img src="/api/placeholder/800/600" alt="Desktop Homepage Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="modal-view-title">Mobile View</h5>
                                    <div class="mobile-preview">
                                        <img src="/api/placeholder/400/800" alt="Mobile Homepage Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- State Modal -->
            <div class="modal fade" id="stateModal" tabindex="-1" aria-labelledby="stateModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stateModalLabel">State Page Listing Ad Example</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h5 class="modal-view-title">Desktop View</h5>
                                    <div class="placeholder-img">
                                        <img src="/api/placeholder/800/600" alt="Desktop State Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="modal-view-title">Mobile View</h5>
                                    <div class="mobile-preview">
                                        <img src="/api/placeholder/400/800" alt="Mobile State Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Route Modal -->
            <div class="modal fade" id="routeModal" tabindex="-1" aria-labelledby="routeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="routeModalLabel">Route Page Listing Ad Example</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h5 class="modal-view-title">Desktop View</h5>
                                    <div class="placeholder-img">
                                        <img src="/api/placeholder/800/600" alt="Desktop Route Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="modal-view-title">Mobile View</h5>
                                    <div class="mobile-preview">
                                        <img src="/api/placeholder/400/800" alt="Mobile Route Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- City Modal -->
            <div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cityModalLabel">City Page Listing Ad Example</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h5 class="modal-view-title">Desktop View</h5>
                                    <div class="placeholder-img">
                                        <img src="/api/placeholder/800/600" alt="Desktop City Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="modal-view-title">Mobile View</h5>
                                    <div class="mobile-preview">
                                        <img src="/api/placeholder/400/800" alt="Mobile City Page Ad Example"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                
            </section>

<script src="{{ asset('assets/js/advertising.js') }}"></script>
@endsection
        