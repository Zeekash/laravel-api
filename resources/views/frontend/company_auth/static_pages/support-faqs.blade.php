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
                                                            <a class="fw-normal static-page-anchors" href="{{route('content-guidelines')}}">Content guidelines</a>
                                                        </li>
                                                        <li class="list-unstyled py-2 li-dash-comp px-xl-0 pe-5 ">
                                                            <a class="fw-normal static-page-anchors active" href="{{route('support-faqs')}}">Frequently Asked Questions</a>
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
                                            <h2 class="my-2 fw-bold">Frequently Asked Questions</h2>
                                            <ul class="ps-4 my-3">
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">Can a moving company listing be removed from the site?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How can I change the address of my business location?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">Can I add a second business location?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How do areas (states/regions) of operation work? Can I change them?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How to enhance my company’s reputation online?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How to do successful marketing for my moving company?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">I need more information about advertising.</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How to respond to customer reviews?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">Why do some reviews disappear from the site?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">Why does MyMovingJourney have a review filter and how does it work?</a>
                                                </li>
                                                <li class="my-2">
                                                    <a href="#" class="fs-5">How do I dispute a moving review and in which cases?</a>
                                                </li>
                                            </ul>
                                            <h2 class="my-2 fs-4">How can I advertise with MyMovingJourney? What advertising options do you offer?</h2>
                                            <p class="fs-5">Thousands of consumers use MyMovingJourney daily in order to research and compare different moving companies, as well as to find the professional relocation partner that will best fit their preliminary budget and respond to their requirements and expectations.</p>
                                            <p class="fs-5">Follow the link below to learn how the clever advertising options on MyMovingJourney can help your business grow by placing your company right in front of potential customers who are looking for reliable and experienced household goods carriers.</p>
                                            <h2 class="my-2 fs-4">How can I advertise with MyMovingJourney? What advertising options do you offer?</h2>
                                            <p class="fs-5">Thousands of consumers use MyMovingJourney daily in order to research and compare different moving companies, as well as to find the professional relocation partner that will best fit their preliminary budget and respond to their requirements and expectations.</p>
                                            <p class="fs-5">Follow the link below to learn how the clever advertising options on MyMovingJourney can help your business grow by placing your company right in front of potential customers who are looking for reliable and experienced household goods carriers.</p>
                                            <h2 class="my-2 fs-4">How can I advertise with MyMovingJourney? What advertising options do you offer?</h2>
                                            <p class="fs-5">Thousands of consumers use MyMovingJourney daily in order to research and compare different moving companies, as well as to find the professional relocation partner that will best fit their preliminary budget and respond to their requirements and expectations.</p>
                                            <p class="fs-5">Follow the link below to learn how the clever advertising options on MyMovingJourney can help your business grow by placing your company right in front of potential customers who are looking for reliable and experienced household goods carriers.</p>
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