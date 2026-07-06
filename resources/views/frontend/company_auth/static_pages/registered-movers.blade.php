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
                                                            <a class="fw-normal static-page-anchors" href="{{route('businesses-home')}}">Businesses Home</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('faqs')}}">Frequently Asked Questions</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('company.search')}}">Login/register Company</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors active" href="{{route('registered-movers')}}">Registered Movers</a>
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
                                            <h2 class="my-2 fw-normal">Registered Movers</h2>
                                            <p class="fs-5">Maybe you’ve noticed that a large part of moving and auto transportation companies on the website have a line stating “Claimed” under their names. This means that the company has registered an account on our website and has claimed it’s business.</p>
                                            <h2 class="my-2 fw-normal">What is a Claimed profile?</h2>
                                            <p class="fs-5">When a company registers an account on the website, it takes control of its corporate image online. Registering an account makes a company be perceived as more trustworthy, reputable and professional – showing that it truly cares about its business and customers.</p>
                                            <div>
                                                <img src="https://w7.pngwing.com/pngs/178/282/png-transparent-mover-logo-relocation-company-service-moving-company-miscellaneous-company-text.png" class="img-comp-logo float-start me-3">
                                                <p class="fs-5">Additionally, companies can display the “Registered Company” badge on their website to further improve their authority and image.</p>
                                                <button class="default-btn" type="button">Register Company Account</button>
                                            </div>
                                            <h2 class="mt-5 fs-4">What are the advantages of registered companies?</h2>
                                            <ul class="ps-4 my-2">
                                                <li class="my-2">
                                                    <p class="fs-5">Reply to customer reviews in seconds and share your side of the story with other customers.</p>
                                                </li>
                                                <li class="my-2">
                                                    <p class="fs-5">Add promotional text to the company profile to target visitors better.</p>
                                                </li>
                                                <li class="my-2">
                                                    <p class="fs-5">Reply to customer reviews in seconds and share your side of the story with other customers.</p>
                                                </li>
                                                <li class="my-2">
                                                    <p class="fs-5">Add promotional text to the company profile to target visitors better.</p>
                                                </li>
                                            </ul>
                                            <h2 class="mt-5 fs-4">Are you a moving company?</h2>
                                            <p class="fs-5">Whether you are a moving or auto transportation company, attracting more targeted potential customers can be done not only by buying moving leads or advertising on MyMovingJourney, but also by <a href=""> registering your company account for free here</a>. Do you already have an account? Visit our <a href="">brand center</a> to get the badge for your website.</p>
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