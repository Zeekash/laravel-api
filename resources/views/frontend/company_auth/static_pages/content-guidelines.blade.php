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
                                                        <h2 class="pt-4 fs-4">Support Center</h3>
                                                    </div>
                                                    <ul class=" quick-links">
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('help-support')}}">Support center home</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors active" href="{{route('content-guidelines')}}">Content guidelines</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('support-faqs')}}">Frequently Asked Questions</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('terms-of-service')}}">Terms of service</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('privacy-policy')}}">Privacy policy</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('about-us')}}">About us</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors" href="{{route('contact-us')}}">Contact us</a>
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
                                            <h2 class="my-2 fw-bold">Content Guidelines</h2>
                                            <p class="fs-5">Just like any other moving business out there, you want to
                                                get more for
                                                your dime when you buy moving leads. That is why the best investment you
                                                can make is to invest in higher quality leads.</p>
                                            <p class="fs-5">We specialize in delivering top quality leads for
                                                professional moving
                                                companies with exceptional customer support over email and phone. Is all
                                                about giving you the opportunity to focus completely on your business
                                                processes, while we do the rest for you.</p>
                                            <h2 class="mt-4">Best converting moving leads provider</h2>
                                            <p class="fs-5">Just a few reasons why you should give us a try:</p>
                                            <ul class="ps-4">
                                                <li>
                                                    <p class="fs-5">Browse leads into the MoveAdvisor portal to manage
                                                        everything
                                                        conveniently even from your phone.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Have your leads imported to your own moving software
                                                        or e-mail.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Get additional delivery methods like real-time text
                                                        message
                                                        notifications (SMS) for new leads.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Instant delivery of most moving leads to increase
                                                        the conversion
                                                        rate of your sales people.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Leads distribution between you and a maximum of 3
                                                        more service providers for a higher conversion rate.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Competitive pricing model.
                                                    </p>
                                                </li>
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