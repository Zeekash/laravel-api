@extends('layouts.app')
@section('content')
 <section class="bg-of-aqua-shade  py-5">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto">
                            <div class="col-12 col-lg-3 col-xl-3 p-0 " style="border-right:2px dashed silver;">
                                <nav
                                    class="navbar navbar-expand-lg static-page-nav dash-nav bg-of-aqua-shade border-0 navbar-light px-3 h-100 d-flex justify-content-start align-items-baseline">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div class="col">
                                            <div class="row p-0 m-auto">
                                                <div class="single-footer-widget mh-100 mt-md-0 mt-3 bg-of-aqua-shade">
                                                    <div class="logo">
                                                        <h2 class="pt-4 fs-4">Getting Started</h3>
                                                    </div>
                                                    <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors active" href="{{route('businesses-home')}}">Businesses Home</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('faqs')}}">Frequently Asked Questions</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('company.search')}}">Login/register Company</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('registered-movers')}}">Registered Movers</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('brand-center')}}">Brand center</a>
                                                        </li>
                                                    </ul>
                                                    <div class="logo">
                                                        <h2 class="pt-4 fs-4">Buy Verified Leads</h3>
                                                    </div>
                                                    <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('biz-lead')}}">Moving Leads</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('live-call-transfer')}}">Live Call Transfers</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('leads-help-document')}}">Leads help documentation</a>
                                                        </li>
                                                    </ul>
                                                     <div class="logo">
                                                        <h2 class="pt-4 fs-4">Advertise with Us</h3>
                                                    </div>
                                                    <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('advertising')}}">Advertising options</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('advertising-faqs')}}">Advertising FAQs</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('advertising-plans')}}">Plans and pricing</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('listing-ads')}}">Listing Ads</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('profile-ads')}}">Profile Ads</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('contact-sales')}}">Contact Sales</a>
                                                        </li>
                                                    </ul>
                                                    <div class="logo">
                                                        <h2 class="pt-4 fs-4">Partner with Us</h3>
                                                    </div>
                                                    <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('affiliate')}}">Affiliate program</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('wp-lead-form')}}">Moving Lead Form</a>
                                                        </li>
                                                    </ul>
                                                     <div class="logo">
                                                        <h2 class="pt-4 fs-4">Tips & Guides</h3>
                                                    </div>
                                                     <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('marketing-tips')}}">Marketing Tips For Movers</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('reputation-guide')}}">Reputation Management</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('review-filter')}}">Review Filters</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('moving-leads-tips')}}">Lead conversion tips</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-12 col-lg-9 col-xl-9 py-3 dash-col2  bg-of-aqua-shade border-0">
                                <section class="section about-section gray-bg" id="about-dash">
                                    <div class="container">
                                        <div class="row">
  <h2 class="my-2 fw-bold"> - For Business Owners</h2>
                                            <div>
                                                <img src="https://www.mymovingreviews.com/img/biz-images/in-profile-mobile.gif" class="mw-50 float-end">
                                                <p class="fs-5">Are you a part of one of those companies that always strive to service more clients, do more business and grow it’s revenue? You’ve come to the right place!</p>
                                                <p class="fs-5">We offer various types of ads, which will help your business grow by bringing you more targeted customers.</p>
                                                <p class="fs-5">Another great way to get more business is by buying high-quality, validated moving leads. We screen every single lead for authenticity and you can void leads that are bad free of charge.</p>
                                                <p class="fs-5">Being proud of your reputation is a great way to boost confidence in your potential customers, converting them better into current customers. That’s why placing a *Registered Mover* badge should be on the top of your priority list.</p>
                                                <p class="fs-5">Do you have any questions? <a class="fw-bold" href="#">Contact sales here!</a></p>
                                            </div>
                                            <h2 class="mt-4">Our Products & Services</h2>
                                            <h2 class="mt-4 fs-4">Moving Leads</h2>
                                            <ul>
                                                <li class="list-unstyled py-2">
                                                    <a class="fs-5" href="#">Buy verified moving leads</a>
                                                </li>
                                                <li class="list-unstyled py-2"><a class="fs-5" href="#">Live call transfers</a></li>
                                                <li class="list-unstyled"><div class="banner-btn">
                                                    <button type="button" class="sdg w-50">See All Lead Type</button>
                                                </div></li>
                                            </ul>
                                            <h2 class="mt-4 fs-4">Advertising</h2>
                                            <ul>
                                                <li class="list-unstyled py-2">
                                                    <a class="fs-5" href="#">Profile ads</a>
                                                </li>
                                                <li class="list-unstyled py-2"><a class="fs-5" href="#">Listing ads</a></li>
                                                <li class="list-unstyled"><div class="banner-btn">
                                                    <button type="button" class="sdg w-50">See All Ads Type</button>
                                                </div></li>
                                            </ul>
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
    <!-- End Company Dashboard Area -->
@endsection