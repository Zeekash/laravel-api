@extends('layouts.app')
@section('title', 'Top Moving Cities in the USA – Connect with Reliable Movers')
@section('meta_description',
    'Explore the best moving companies in the top cities across the USA. Compare movers by
    location and simplify your relocation with ease.')
  @section('meta_keywords', 'Moving Cities')
    @section('og:title')
     Top Moving Cities in the USA – Connect with Reliable Movers
@endsection
@section('og:description')
    Explore the best moving companies in the top cities across the USA. Compare movers by
    location and simplify your relocation with ease.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/cityPage.css') }}">



    <div class="container">
        <section id="top_states_cards">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5 text-center d-flex flex-column justify-content-center">
                        <h1>Top-Rated Moving Cities in USA</h1>
                        {{-- <div class="break-line mx-auto"></div> --}}
                    </div>
                    {{-- @foreach ($top_states as $state)
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                            <a href="{{ url('state/' . $state->slug) }}">
                                <div class="moving_states_card">
                                    <img src="{{ asset('state-movers/' . $state->slug . '.webp') }}" class="card-img"
                                        alt="{{ $state->state }}">
                                    <div class="moving_card_img_overlay">
                                        <span class="companies_total">{{ $state->company_count }}</span>
                                        <h5 class="card-title">Movers in {{ ucfirst($state->slug) }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach --}}
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/california/los-angeles">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/los-angeles-CA-Picture.webp') }}" class="card-img"
                                    alt="los-angeles,-CA-Picture">
                                <div class="moving_card_img_overlay">
                                    <span class="companies_total">35</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Los Angeles, CA
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/california/san-francisco">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/san-francisco-ca.webp') }}" class="card-img "
                                    alt="san-francisco-ca">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">20</span>
                                    <h5 class="card-title">Movers in San Francisco, CA</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/california/san-diego">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/san-diego-ca.webp') }}" class="card-img "
                                    alt="San Diego, CA ">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">25</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        San Diego, CA
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/texas/houston">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/houston-tx.webp') }}" class="card-img "
                                    alt="Houston, TX">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">32</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Houston, TX
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/texas/dallas">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/dallas-tx.webp') }}" class="card-img "
                                    alt="Dallas, TX">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">17</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Dallas, TX
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/texas/austin">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/austin-tx.webp') }}" class="card-img "
                                    alt="Austin, TX">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">45</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Austin, TX
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/florida/miami">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/Miami-FL.webp') }}" class="card-img "
                                    alt="Miami, FL">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">29</span>
                                    <h5 class="card-title">Movers in <br>
                                        Miami, FL
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/florida/orlando">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/orlando-fl.webp') }}" class="card-img "
                                    alt="Movers in Orlando, FL">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">42</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Orlando, FL
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/georgia/atlanta">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/Atlanta-GA.webp') }}" class="card-img"
                                    alt="Atlanta, GA ">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">78</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Atlanta, GA
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/north-carolina/charlotte">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/charlotte-nc.webp') }}" class="card-img"
                                    alt="Charlotte, NC">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">78</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Charlotte, NC
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/colorado/denver">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/denver-co.webp') }}" class="card-img"
                                    alt="Denver, CO ">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">78</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Denver, CO
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                        <a href="/movers/tennessee/nashville">
                            <div class="moving_states_card">
                                <img src="{{ asset('public/city-movers/nashville-tn.webp') }}" class="card-img"
                                    alt="Nashville, TN">
                                <div class="moving_card_img_overlay ">
                                    <span class="companies_total">78</span>
                                    <h5 class="card-title">Movers in
                                        <br>
                                        Nashville, TN
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <div class="container">
            <div class="col-lg-6 col-12 mx-auto mt-3">
                <div class="form_wrapper">
                    <form action="" class="mt-2 main_banner_form">
                        <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                                                    <span class="mb-2 form_heading">

                                                        Let’s Calculate Your Moving Cost!
                                                    </span>
                                                    <p class="miles_upp">Moving Distance: 0 miles</p>
                                                </div>
                        <div class="row">
                            <div class="col-lg-6 mt-lg-0 mt-2">
                                <div class="input_outer">
                                    <label for="external_zipfrom">Moving from*</label>
                                    <input type="text" id="external_zipfrom" name="moving-from" class="zipfromsearch"
                                        placeholder="City Name or Zip Code">
                                    <span id="external_zipfrom_error" class="error-message hidden"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-lg-0 mt-2">
                                <div class="input_outer">
                                    <label for="external_ziptosearch">Moving to*</label>
                                    <input type="text" id="external_ziptosearch" name="moving-to" class="ziptosearch"
                                        placeholder="City Name or Zip Code">
                                    <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4 mx-auto">
                                <a href="#ModalForm" data-bs-toggle="modal">
                                    <button class="get_quote" type="button">
                                        Get Free Quote
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-12 mt-1">
                            <p class="mt-2 mb-0 text-center secure_info">Your personal information
                                is always safe and
                                encrypted.
                            </p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="for_width">
            <section>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <h2>Movers You Can Trust, Right in Your City</h2>
                            <p>It doesn’t matter if you’re just shifting across the street or preparing for a big change to
                                a new city; we know finding the right movers can be a real headache. </p>
                            <p>But this page is all about helping you find the best movers by city—so no matter where you
                                are, you’ll know exactly who to call when it’s time to move.</p>
                            <p>
                                We’ve done the hard work for you by curating a list of licensed and insured movers from
                                across the country. Here, you’ll find movers who are professional, trustworthy, and ready to
                                get you where you need to go.
                            </p>
                            <p>
                                What's even better? We've made it super easy for you to compare your options. You can
                                compare movers based on their customer reviews, services offered, and overall reputation.
                            </p>
                            <h2 class="mt-4">Easily Compare Movers Near You</h2>
                            <p>Imagine this: You’re sitting back, relaxing on your couch, and with just one click, you get a
                                list of local moving companies right in your city. </p>
                            <p>No more hours spent on the phone and chasing down moving estimates. We’ve streamlined the
                                whole process for you.</p>
                            <p>
                                Within seconds, you’ll have access to moving companies near me, their reviews, services, and
                                expertise—all in one place.
                            </p>
                            <div class="col-12 my-3">
                                <div class="new_card p-sm-4 p-2">
                                    <div class="card-body d-sm-flex align-items-center">
                                        <div class="content_div">
                                            <p><strong>Note:</strong> People move for all sorts of reasons, whether it's for
                                                a new job or just a change of scenery; our platform is constantly updated to
                                                reflect the most current information on movers in your city. So, when you're
                                                ready to hire movers, you'll always have the freshest options at your
                                                fingertips.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 d-flex justify-content-center flex-column">
                            <div id="map_container" class="w-100 mb-4 mt-2">
                                @include('frontend.company_auth.usa_map')
                            </div>
                        </div>
                        <div class="col-lg-10 mx-auto d-flex justify-content-center flex-column">
                            <div class="newsletter-area mb-5 ">
                                <form action="{{ route('company.mover-list') }}" method="GET"
                                    style="height:60px;border:2px solid #1232694a;border-radius:30px;font-family: var(--para-family);"
                                    class="px-2 d-flex justify-content-start align-items-center">
                                    <input type="search" value="{{ request('search') }}" class="w-100 fs-5"
                                        style="border:none;outline:none;box-shadow:none;padding: 0px 20px; background-color: transparent;"
                                        placeholder="Search Company" name="search" required autocomplete="off">
                                    <button aria-label="footer-icon-btn"
                                        class="footer-icon-btn d-flex justify-content-center align-items-center m-0 sdg p-0"
                                        type="submit"><i
                                            class="fas position-relative text-center fs-4 fa-search"></i></button>
                                </form>
                            </div>
                            {{-- <ul class="row ps-sm-2 p-md-0 m-0 d-flex flex-wrap my-2">
                                @foreach ($states as $state)
                                    <li class="list-unstyled col-6 col-sm-6 col-md-4 ps-0 pe-1">
                                        <div class="row p-0 mt-1 me-2 border-0"><a
                                                class="d-flex align-items-center justify-content-start fs-16 pe-0 fw-normal"
                                                href="{{ route('state.show', $state->slug) }}">
                                                <span class="d-flex align-items-center justify-content-center">
                                                </span>{{ $state->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-lg-10 mx-auto head">
                            <h2 class="mt-4">Find Movers with the Right Expertise for Your Move</h2>
                            <p>When it comes to moving, experience matters. You wouldn't trust just anyone with your most
                                precious belongings, right? The same goes for picking the perfect moving company. That's why
                                looking at a company's expertise before you sign on the dotted line is important.</p>
                            <p>When you browse through the list of movers by city, you'll not only see reviews from other
                                customers but also get a clear picture of each company's specialty. </p>
                            <p>
                                We want to make sure that the moving company you choose isn’t just any company—they should
                                be professional, experienced, and ready to handle your move with care and precision.
                            </p>
                            {{-- <h2>How This Can Help You In Your Move</h2>
                            <p>
                                Transitioning to a new home can be overwhelming, but finding a reliable moving company can
                                significantly ease the burden. Here's how this page can make your transition stress-free:
                            </p>
                            <ul class="factors">
                                <li><strong>Quickly Find Movers Based on Your State:</strong> Instead of wasting time
                                    searching everywhere, you can quickly find movers in your state, making the whole
                                    process way easier.</li>
                                <li><strong>Compare Movers in One Place:</strong> You don’t have to jump from site to site.
                                    Everything you need to compare prices, services, and reviews is right here. </li>
                                <li><strong>Read Honest Reviews:</strong> It’s always good to know what others think. You
                                    can read honest reviews to help you choose movers you can trust. </li>
                                <li><strong>Find Movers for Every Type of Move:</strong> Whether it’s a local move or a big
                                    long-distance one, you’ll find movers who specialize in what you need.</li>
                                <li><strong>Understand Moving Costs Upfront:</strong> Get an idea of moving costs and plan
                                    your budget without surprises.</li>
                            </ul> --}}

                        </div>
                    </div>
                </div>
            </section>
            {{-- <section>
                <div class="container mt-5 mb-5">

                    <div class="col-lg-10 mx-auto head head2">

                        <h3 class="mt-3">If you're looking for more options, you can also explore movers in:</h3>
                        <ul class="factors"
                            style="font-weight: 600; text-decoration: underline; text-underline-offset: 2px;">
                            <li>
                                Top Moving Cities Across the USA
                            </li>
                            <li>
                                Popular Moving Routes
                            </li>
                        </ul>
                    </div>
                </div>
            </section> --}}
        </div>
    </div>
@endsection
