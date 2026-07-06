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
                                                            <a class="fw-normal static-page-anchors active" href="{{route('biz-lead')}}">Moving Leads</a>
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
                                            <h2>Get quality moving leads</h2>
                                            <p class="fs-5">Just like any other moving business out there, you want to
                                                get more for
                                                your dime when you buy moving leads. That is why the best investment you
                                                can make is to invest in higher quality leads.</p>
                                            <p class="fs-5">We specialize in delivering top quality leads for
                                                professional moving
                                                companies with exceptional customer support over email and phone. Is all
                                                about giving you the opportunity to focus completely on your business
                                                processes, while we do the rest for you.</p>
                                            <h2 class="mt-4">Give it a try:</h2>
                                            <ul>
                                                <li class="list-unstyled">
                                                    <a href="#">Call now +1 (617) 294-5708.</a>
                                                </li>
                                                <li class="list-unstyled"><a href="#">Sign up via this form (click
                                                        here).</a></li>
                                            </ul>
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
                                                <li>
                                                    <p class="fs-5">Set up lead filters based on locations, regions, move dates, distance between locations, and more to fit your requirements.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Easily adjust daily lead caps or monthly budget limits.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Easily return bad leads through an simple void process.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Free phone support 6 day per week with extended working hours for your timezone.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Real-time phone number verification (via RealValidation), so you get only accurate contact information.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Extensive weekly or monthly lead reports in Excel.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Get the full household items list and a digital inventory for some leads.</p>
                                                </li>
                                            </ul>
                                            <p class="fs-5">To keep our position as a leading moving leads provider, we have diversified to a steady flow of various types of leads:</p>
                                            <ul class="ps-4">
                                                <li>
                                                    <p class="fs-5">US local and interstate moving leads</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Canadian moving leads
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Leads within and from The United Kingdom.</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">European and Australian local and interstate moving leads</p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">Leads distribution between you and a maximum of 3
                                                        more service providers for a higher conversion rate.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="fs-5">International moving leads.</p>
                                                </li>
                                            </ul>
                                            <h2 class="mt-4">Give it a try:</h2>
                                            <ul>
                                                <li class="list-unstyled">
                                                    <a href="#">Call now +1 (617) 294-5708.</a>
                                                </li>
                                                <li class="list-unstyled"><a href="#">Sign up via this form (click here).</a></li>
                                            </ul>
                                            <h2 class="mt-4">More verified leads for your business</h2>
                                            <p class="fs-5">We understand. There is nothing more frustrating than investing in leads, which hardly convert to paying customers. You get not only phone number verification protection, but also moving leads, which are shared with no more than 3 other moving companies– and it’s very likely that some leads would be exclusively for you.</p>
                                            <p class="fs-5">Get real-time leads delivery for both phone calls and web leads - no delays.</p>
                                            <h2 class="mt-4">Greater return for your business efforts</h2>
                                            <img src="https://www.mymovingreviews.com/img/biz-images/portal-moveadvisor-leads-list.jpg" class="w-100">
                                            <p class="fs-5">We have designed everything around saving your time and expenses for better results. Register your free leads management account to generate reports for a custom time period in PDF or Excel to save your employees’ time and frustration in their everyday activities. Filter leads based on locations, distance between locations, types (local, international or long distance leads), move date, move size, household or vehicle move and other factors and pay only for what you need.</p>
                                            <h2 class="mt-4">Be protected and in control of your moving leads</h2>
                                            <p class="fs-5">Part of the reason why MyMovingReviews is the top provider of moving leads since 2008 is because we get from MyMovingReviews both web leads through quote forms and phone leads from our call center. Even with all our cutting-edge leads verification process, it might happen that a bad lead goes through the system, though it’s highly unlikely. In that case we’ve made it easy for you to return bad leads through an easy void process. Now you can have total control over your business strategy by putting daily leads caps or daily budget limits.</p>
                                            <h2 class="mt-4">Know exactly what needs to be moved without wasting time</h2>
                                            <p class="fs-5">After you buy moving leads, your sales team needs to call each potential customer and try to find out what he/she is moving. This is an inefficient, old school process and you might end up paying more for salaries than your return. Fortunately we have found a solution to your problem.</p>
                                            <img src="https://www.mymovingreviews.com/img/biz-images/inventory-animation-mymovingreviews.gif" class="w-100">
                                            <p class="fs-5">Our premium leads come from user-filled home inventory list application for all modern devices. It allows you to get an accurate estimation of the move-sizes of your potential customers straight to your system or e-mail – allowing your salespeople to focus on more important matters.</p>
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