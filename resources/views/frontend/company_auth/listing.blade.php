@extends('layouts.app')

@section('title', 'My Moving Journey | Find and Compare Trusted Movers in USA')

@section('meta_description', "Tired of fake listings and endless searches? Find trusted movers in USA, compare prices, and get instant quotes. Plan your next move easily.")



@section('meta_keywords',
    'Best Moving Companies, Top Rated Movers, Moving Services USA, Professional Moving Reviews,
    Trusted Moving Companies, Compare Moving Companies, Local Moving Reviews, Interstate Movers USA, Affordable Moving
    Companies, Residential Moving Reviews, Commercial Movers USA, Nationwide Moving Reviews, Moving Company Ratings, Long
    Distance Movers, Moving Company Testimonials, Expert Moving Reviews, Movers Near Me, Cross Country Movers, Reliable
    Moving Companies, Customer Reviews Movers, Moving Company Rankings, Best Moving Quotes, Moving Company Experiences,
    International Movers USA, Moving Company Feedback, Cheap Moving Companies, Home Moving Reviews, Corporate Relocation
    Reviews, Verified Moving Companies, Moving Company Reviews USA, Best Moving Company Reviews 2023, Compare Movers')
@section('head')
    <meta name="robots" content="index, follow">
@endsection

@section('og:title')
  My Moving Journey | Find and Compare Trusted Movers in USA
@endsection

@section('og:description')

  Tired of fake listings and endless searches? Find trusted movers in USA, compare prices, and get instant quotes. Plan your next move easily. 

@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/listing.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- HERO AREA -->
    <section class="hero d-flex align-items-center justify-content-center">
        <div class="container container-main ">
            <div class="hero-content">
                <div class="col-lg-11 mx-auto upper_content">
                    <h1 class="hero-title text-center">Moving Soon? Let’s Make It Surprisingly Simple
                    </h1>
                    <p class="hero-subtitle text-center">
                        Skip the endless searching. Compare verified movers, get quotes fast, and move with total
                        confidence.
                    </p>
                </div>
                <div class="col-lg-9 mt-3 mt-sm-5 mx-auto">
                    <div class="form_wrapper">
                        <form class=" main_banner_form">
                            <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                                <h2 class="mb-2 form_heading">
                                    {{-- Let the Experts Handle the Rest! --}}
                                    Let’s Calculate Your Moving Cost!
                                </h2>
                                <p class="miles_upp">Moving Distance: 0 miles</p>
                            </div>
                            <div class="form_bg">
                                <div class="row">
                                    <div class="col-xl-4 mt-lg-0 mt-2">
                                        <div class="input_outer">
                                            <label for="external_zipfrom">Moving from*</label>
                                            <input type="text" id="external_zipfrom" name="moving-from"
                                                class="zipfromsearch pac-target-input mmj-zip-from"
                                                placeholder="City or Zip Code" autocomplete="off">
                                            <span id="external_zipfrom_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mt-lg-0 mt-2">
                                        <div class="input_outer">
                                            <label for="external_ziptosearch">Moving to*</label>
                                            <input type="text" id="external_ziptosearch" name="moving-to"
                                                class="ziptosearch pac-target-input mmj-zip-to"
                                                placeholder="City or Zip Code" autocomplete="off">
                                            <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                        <a href="#ModalForm" class="quote-btn" data-bs-toggle="modal">

                                            Calculate Cost Now

                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-1">
                                <p class="mt-2 mb-0 text-center secure_info">Your personal information is always safe and
                                    encrypted.
                                </p>
                            </div>
                            <input type="hidden" class="mmj-distance-hidden" name="distance_miles" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <h2 class="mb-2 text-center">Find Trusted Moving Companies Near You</h2>

        <!-- movers CARD -->
        <div class="row">
            @forelse ($data as $companyd)
                @if ($companyd->average_rating)
                    <div class="col-lg-10 mx-auto">
                        <a class=" row px-3 py-3" href="{{ route('company.show', $companyd->slug) }}">
                            <div class="movers-card">
                                <div class="row movers-left">

                                    <div class="col-lg-9 order-lg-0 order-1 mt-lg-0 mt-3">
                                        <div class="inner_card">
                                            <div class="badge-accent">{{ $companyd->company_name }}
                                                @if ($companyd->claimed == 1)
                                                    <span>
                                                        <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}"
                                                            class="verified-badge" alt="verified-badge">
                                                @endif
                                            </div>
                                            {{-- <small class="text-center">
                                                <div class="d-flex align-items-center mt-1">
                                                    <div id="float-rating-div" class="comp-show-stars">
                                                        <input id="input-1" name="input-1" class="rating rating-loading"
                                                            data-min="0" data-max="5" data-step="0.1" readonly
                                                            value="{{ $companyd->average_rating }}">
                                                    </div>
                                                    <span class="star_rat">{{ number_format($companyd->average_rating, 1) }}
                                                        ({{ $companyd->total_reviews }})
                                                    </span>
                                                </div>
                                            </small> --}}

                                            <div
                                                class="movers-right mt-2 d-lg-flex align-items-center justify-content-lg-between justify-content-center">
                                                <p class="review_person_name">
                                                    {{ $companyd->name }}

                                                    <span
                                                        style="font-size: 12px;color: #555;">({{ \Carbon\Carbon::parse($companyd->created_at)->diffForHumans() }})</span>
                                                </p>
                                            </div>
                                            <div class="movers-center">
                                                <div class="d-flex flex-column  mb-2">

                                                    <div class="text-col ">
                                                        </span>{{ substr(strip_tags($companyd->your_review), 0, 160) }}
                                                        <span
                                                            class="read_more fw-bold">{{ strlen(strip_tags($companyd->your_review)) > 160 ? '... Read More' : '' }}</span><span
                                                            class="fs-5 "> </span>
                                                    </div>
                                                    <div
                                                        class="d-md-flex align-items-center justify-content-between location_add mt-2">
                                                        <div>
                                                            <i
                                                                class="fa-solid fa-location-dot me-2"></i><span>{{ $companyd->state }}</span>
                                                        </div>
                                                        <p class="review_person_name text-md-end mt-md-0 mt-2">USDOT No:
                                                            {{ $companyd->us_dot }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 d-flex flex-lg-column align-items-center justify-content-lg-center justify-content-between  order-lg-1 order-0">
                                        <div class="logo">
                                            <span hidden class="image">{{ $companyd->image }}</span>
                                            @if ($companyd->image)
                                                @php
                                                    $imageUrl = str_starts_with($companyd->image, 'companies/image/')
                                                        ? URL::to('/' . $companyd->image)
                                                        : URL::to('/companies/image/' . $companyd->image);
                                                @endphp
                                                <img loading="lazy" src="{{ $imageUrl }}" alt="{{ $companyd->image }}"
                                                    class="img-fluid">
                                            @else
                                                <img loading="lazy" src="{{ URL::to('/img/samplelogo.webp') }}"
                                                    alt="{{ $companyd->image }}" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center flex-column">
                                            <small class="text-center">
                                                <div class="d-flex align-items-center mt-1">
                                                    <div id="float-rating-div" class="comp-show-stars">
                                                        <input id="input-1" name="input-1" class="rating rating-loading"
                                                            data-min="0" data-max="5" data-step="0.1" readonly
                                                            value="{{ $companyd->average_rating }}">
                                                    </div>
                                                </div>
                                            </small>
                                            <div class="d-md-flex  align-items-baseline">
                                                <p class="avg_rat">{{ number_format($companyd->average_rating, 1) }}
                                                </p>
                                                <div class="based-on ms-2">({{ $companyd->total_reviews }} reviews)</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <hr class="hr_line">
                    </div>
                @endif
            @empty
                <div class="row w-100 py-5 px-md-3 px-lg-5 px-2 my-3 mx-0">
                    <h3 class="fs-3 fw-light text-center text-dark">Be the First To Register A Company & Get A
                        Good
                        Review From Users On My Moving Journey</h3>
                </div>
            @endforelse

        </div>
        <div class="d-flex justify-content-center mt-3 mt-md-1">
            <a href="{{ route('company.mover-list') }}" class="btn btn-comp">See All Movers</a>
        </div>
    </div>
    {{-- <div class="container">
        <div class="compare_sec">
            <div class="mt-5">
                <div id="compare_card">
                    <div class="row justify-content-center">
                        <h3 class="mb-4 form_heading text-center" style="font-size: 34px; font-weight: 700;">
                            Compare a Movers
                        </h3>

                        <!-- Mover 1 -->
                        <div class="col-5">
                            <div class="text-center p-sm-5 p-3"
                                style="border: none;border-radius: 10px;background-color: #fff;">
                                <div class="img_wrapp">
                                    <img id="mover1_img" src="{{ asset('assets/img/mmj-favicon.png') }}" alt="Mover 1"
                                        class="img-fluid">
                                </div>
                                <div class="mt-3">
                                    <select id="mover1" class="form-select select2-dropdown">
                                        <option selected disabled>Choose Mover</option>
                                        @foreach ($data as $mover)
                                            @if ($mover->average_rating > 0)
                                                @php
                                                    $imageUrl = $mover->image
                                                        ? (str_starts_with($mover->image, 'companies/image/')
                                                            ? URL::to('/' . $mover->image)
                                                            : URL::to('/companies/image/' . $mover->image))
                                                        : asset('img/samplelogo.webp');
                                                @endphp
                                                <option value="{{ $mover->id }}" data-img="{{ $imageUrl }}"
                                                    data-name="{{ $mover->company_name }}"
                                                    data-rating="{{ $mover->average_rating ?? 'N/A' }}"
                                                    data-price="Contact for Quote"
                                                    data-exp="{{ $mover->years_in_business ?? 'N/A' }} Years"
                                                    data-slug="{{ $mover->slug }}">
                                                    {{ $mover->company_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 ">
                            <div class="text-center p-sm-5 p-3"
                                style="border: none;border-radius: 10px;background-color: #fff;">
                                <div class="img_wrapp">
                                    <img id="mover2_img" src="{{ asset('assets/img/mmj-favicon.png') }}" alt="Mover 2"
                                        class="img-fluid">
                                </div>
                                <div class="mt-3">
                                    <select id="mover2" class="form-select select2-dropdown">
                                        <option selected disabled>Choose Mover</option>
                                        @foreach ($data as $mover)
                                            @if ($mover->average_rating > 0)
                                                @php
                                                    $imageUrl = $mover->image
                                                        ? (str_starts_with($mover->image, 'companies/image/')
                                                            ? URL::to('/' . $mover->image)
                                                            : URL::to('/companies/image/' . $mover->image))
                                                        : asset('img/samplelogo.webp');
                                                @endphp
                                                <option value="{{ $mover->id }}" data-img="{{ $imageUrl }}"
                                                    data-name="{{ $mover->company_name }}"
                                                    data-rating="{{ $mover->average_rating ?? 'N/A' }}"
                                                    data-price="Contact for Quote"
                                                    data-exp="{{ $mover->years_in_business ?? 'N/A' }} Years"
                                                    data-slug="{{ $mover->slug }}">
                                                    {{ $mover->company_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button id="compareBtn" class="btn btn-bonus px-4">Compare Now</button>
                        </div>
                    </div>
                </div>
                <!-- Comparison Modal -->
                <div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="compareModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg compare_modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="compareModalLabel">Movers Comparison</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="compareModalBody">
                                <!-- Loader (hidden by default) -->
                                <div id="compareLoader"
                                    style="display:none; text-align:center; padding:60px 20px; justify-content:center; align-items:center; min-height:300px; background-color: #f8f9fa; border-radius:10px;">
                                    <div class="text-center">
                                        <div class="spinner-border" style="color: var(--bg); width:4rem; height:4rem;"
                                            role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <p class="mt-4" style="font-size: 1.1rem; color: #666; font-weight: 500;">
                                            Fetching
                                            comparison...</p>
                                        <p class="text-muted" style="font-size: 0.9rem;">Please wait while we
                                            prepare your comparison</p>
                                    </div>
                                </div>

                                <div class="row" id="comparisonContent" style="display:none;">
                                    <div class="col-lg-6 mb-3">
                                        <div class="card shadow-sm">
                                            <img id="card_mover1_img" class="card-img-top" src=""
                                                alt="Mover 1">
                                            <div class="card-body px-0">
                                                <h5 id="card_mover1_name" class="card-title text-center"></h5>
                                                <span id="card_mover1_rating"
                                                    class="text-center d-flex justify-content-center"></span>
                                                <div class="mt-3 text-center">
                                                    <button class="btn btn-primary btn-sm cta-get" onclick="getQuote(1)">
                                                        Get Quote <i class="fa fa-chevron-right ms-1"></i>
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm cta-learn mt-3"
                                                        onclick="learnMore(1)">
                                                        Learn More <i class="fa fa-info-circle ms-1"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="card shadow-sm">
                                            <img id="card_mover2_img" class="card-img-top" src=""
                                                alt="Mover 2">
                                            <div class="card-body px-0">
                                                <h5 id="card_mover2_name" class="card-title text-center"></h5>
                                                <span id="card_mover2_rating"
                                                    class="text-center d-flex justify-content-center"></span>
                                                <div class="mt-3 text-center">
                                                    <button class="btn btn-primary btn-sm cta-get" onclick="getQuote(2)">
                                                        Get Quote <i class="fa fa-chevron-right ms-1"></i>
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-sm cta-learn mt-3"
                                                        onclick="learnMore(2)">
                                                        Learn More <i class="fa fa-info-circle ms-1"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Why Our Moving Data Section -->
    <section class="reliable-section">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center">How Do You Know These Movers Are Real?</h2>
                <p class="subtitle">Every mover you see here has been <b>checked, verified, and confirmed</b> before being
                    added. We make sure you only see <b>trusted movers in USA</b>, so when you compare, you’re comparing
                    what’s
                    real.</p>

                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card card_1">
                            <h3>Verified Listings Only</h3>
                            <p>Every mover goes through a verification process; licenses, reviews, and service details are
                                all
                                double-checked before showing up here. </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card card_2">
                            <h3>Updated Information</h3>
                            <p>Moving data changes fast. We regularly review and update every detail, keeping you connected
                                to
                                reliable moving companies in USA.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card card_3">
                            <h3>Real Feedback from Real People</h3>
                            <p>We listen to users who’ve already moved. Their experiences help us refine and keep only
                                trusted
                                movers that actually deliver what they promise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top 12 Moving States Section -->
    {{-- <section class="states-section">
        <div class="container">
            <h2>Top 12 Moving States In USA</h2>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=800&h=600&fit=crop"
                            class="card-img-top" alt="Florida">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">142
                                <span>Movers</span>
                            </h5>
                            <p class="state-name">Florida</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1449034446853-66c86144b0ad?w=800&h=600&fit=crop"
                            class="card-img-top" alt="California">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">39 <span>Movers</span>

                            </h5>
                            <p class="state-name">California</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=800&h=600&fit=crop""
                            class="card-img-top" alt="New-Jersey">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">29 <span>Movers</span>

                            </h5>
                            <p class="state-name">New Jersey</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1531218150217-54595bc2b934?w=800&h=600&fit=crop"
                            class="card-img-top" alt="Texas">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">22 <span>Movers</span>

                            </h5>
                            <p class="state-name">Texas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=800&h=600&fit=crop"
                            class="card-img-top" alt="Florida">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">142 <span>Movers</span>

                            </h5>
                            <p class="state-name">Florida</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1449034446853-66c86144b0ad?w=800&h=600&fit=crop"
                            class="card-img-top" alt="California">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">39 <span>Movers</span>

                            </h5>
                            <p class="state-name">California</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?w=800&h=600&fit=crop""
                            class="card-img-top" alt="New-Jersey">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">29 <span>Movers</span>

                            </h5>
                            <p class="state-name">New Jersey</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="state-card  ">
                        <img src="https://images.unsplash.com/photo-1531218150217-54595bc2b934?w=800&h=600&fit=crop"
                            class="card-img-top" alt="Texas">
                        <div class="card-body state-body">
                            <h5 class="card-title state-movers mb-0">22 <span>Movers</span>

                            </h5>
                            <p class="state-name">Texas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-center">
                <button class="btn-bonus">See More States</button>
            </div>
        </div>
    </section> --}}
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <section id="top_states_cards">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-4 mb-md-5 text-center d-flex flex-column justify-content-center">
                            <h2>Top Moving States In USA</h2>
                        </div>

                        @foreach ($states as $state)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
                                <div class="moving_states_card">
                                    <img src="{{ asset('state-movers/' . $state->slug . '.webp') }}" class="card-img"
                                        alt="{{ $state->state }}">
                                    <div class="moving_card_img_overlay">
                                        <span class="companies_total">{{ $state->company_count }}</span>
                                        <span class="state_name">
                                            {{ ucfirst($state->slug) }}
                                        </span>
                                        <div class="state-links">
                                            <a href="{{ route('state.show', $state->slug) }}">List</a> |
                                            <a href="{{ route('best_state_show', $state->slug) }}">Movers</a> |
                                            <a href="{{ route('moveCostShowPage', $state->slug) }}">Cost</a> |
                                            <a
                                                href="https://mymovingjourney.com/moving-routes/{{ strtolower($state->abv) }}">Routes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center service_heading">
                                    <div class="text-center"><a href="https://mymovingjourney.com/movers"><button
                                                class="btn-bonus">Explore more states</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container section-wrapper">
        <div class="container my-5">
            <div class="section-header">
                <h2>How You Can Share Your Review</h2>
                <p>Real stories from real moves help others find <b>trusted movers in USA</b> faster and with confidence. It
                    only takes a minute, here’s how you can do it.</p>
            </div>

            <div class="steps-container">
                <div class="step_section">
                    <div class="step-number">1</div>
                    <div class="step-title">Go to the movers list <br>page</div>
                    <div class="connector">
                        <span class="connector-dot start"></span>
                        <span class="connector-dot end"></span>
                    </div>
                </div>

                <div class="step_section">
                    <div class="step-number">2</div>
                    <div class="step-title">Search the moving company <br>you used</div>
                    <div class="connector">
                        <span class="connector-dot start"></span>
                        <span class="connector-dot end"></span>
                    </div>
                </div>

                <div class="step_section">
                    <div class="step-number">3</div>
                    <div class="step-title">Share your honest <br>experience</div>
                </div>
            </div>

            <div class="mt-3 mt-md-5 text-center">
                <a href="{{ route('company.write-review') }}">
                    <button class="btn-bonus">Write Your Review</button>
                </a>
            </div>
        </div>
    </div>
    <div class="feature_sec mb-0 my-md-5">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <div class="feture_sec_inner">
                    <h3>As Featured On</h3>
                    <div class="brond_wrap">
                        <img src="{{ asset('assets/img/brand_logos.webp') }}" alt="Forbes" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- What We Focus On Section -->
    <section class="focus-section">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <h2>What We Focus On</h2>

                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="focus-card">
                            <div class="focus-icon">
                                <img src="{{ asset('assets/img/cost-calculator.svg') }}" alt="cost-calculator"
                                    class="img-fluid">
                            </div>
                            <h3>Cost <br> Calculator</h3>
                            <p>We focus on making costs clear. You can use our moving cost calculator to estimate moving or
                                packing costs before you decide.</p>
                            <a href="{{ route('company.cost-estimator') }}"
                                class="btn-comp mt-4 d-block text-center px-2">Get your Quote</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="focus-card">
                            <div class="focus-icon">
                                <img src="{{ asset('assets/img/movers-directory.svg') }}" alt="movers-directory"
                                    class="img-fluid">
                            </div>
                            <h3>Movers Directory</h3>
                            <p>Explore <b>movers in USA</b> by state, city, or route. We organize everything so you can find
                                the
                                right company faster and with confidence.</p>
                            <a href="{{ route('company.mover-list') }}"
                                class="btn-comp mt-4 d-block text-center px-2">Find
                                Your Mover</a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="focus-card">
                            <div class="focus-icon">
                                <img src="{{ asset('assets/img/moving-resources.svg') }}" alt="moving-resources"
                                    class="img-fluid">

                            </div>
                            <h3>Moving Resources</h3>
                            <p>From <b>long distance movers in USA</b> to <b>local movers near me</b>, our best
                                recommendations
                                help you get the best movers and avoid common mistakes.</p>
                            <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                                class="btn-comp mt-4 d-block text-center px-2">Get the Best Movers</a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="focus-card">
                            <div class="focus-icon">
                                <img src="{{ asset('assets/img/compare-movers.svg') }}" alt="compare-movers"
                                    class="img-fluid">

                            </div>
                            <h3>Compare Movers</h3>
                            <p>Easily <b>compare moving companies</b> side by side, prices, services, and reviews, so you
                                can
                                pick the one that fits your move perfectly.</p>
                            <a href="{{ route('companies.comparePage') }}"
                                class="btn-comp mt-4 d-block text-center px-2">Compare Movers Now</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- How We Rank Section -->
    <section class="container">
        <div class="ranking-section my-5">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h2 class="text-center">How We Rank Movers</h2>
                    {{-- <hr class="hr_line_2 mx-auto mb-3"> --}}

                    <p class="subtitle text-center">These are our criteria — focus on them, as your ranking will depend on
                        these
                        points.</p>
                    <div class="row d">
                        <div class="col-lg-4 col-md-6">
                            <ul class="criteria-list">
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Verified Licenses</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>User Reviews</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Pricing Transparency</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Range of Services Offered</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <ul class="criteria-list">
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Local Move Availability</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Long Distance Coverage</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>24/7 Support</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Service Areas and Routes</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <ul class="criteria-list">
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Customer Support</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>Moving Resources</span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>On-Time Performance </span>
                                </li>
                                <li class="criteria-item">
                                    <div class="check-icon">
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <span>User Satisfaction</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="img_side">
                        <img src="{{ asset('assets/img/rank_movers.webp') }}" class="img-fluid">
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
    <div class="container my-5">
        <div class="col-lg-10 mx-auto py-5">
            <h2 class="main-title text-center">Why Choose My Moving Journey?</h2>
            <div class="col-lg-11 mx-auto">
                <p class="intro-text text-center">
                    You don’t want another list of random names; you want something real, something that actually helps. My
                    Moving Journey was built for that moment, when you just want things to feel clear, honest, and under
                    control
                    again.
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="step-section">
                            <h3 class="step-subtitle">Real Movers and Not Random Listings</h3>
                            <p class="step-content">Every mover here is verified, licensed, and reviewed. You only see
                                trusted
                                movers
                                in USA who’ve earned their spot.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="step-section">
                            <h3 class="step-subtitle">Built Around Your Needs</h3>
                            <p class="step-content">Whether you’re checking local movers near me or long distance movers in
                                USA,
                                everything’s organized for how real people search.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="step-section">
                            <h3 class="step-subtitle">Clear Choices</h3>
                            <p class="step-content">Compare moving companies side by side, understand costs, and pick what
                                fits
                                your
                                needs. There are no hidden fees or wasted time.</p>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="step-section">
                            <h3 class="step-subtitle">Information You Can Actually Use</h3>
                            <p class="step-content">From quotes to reviews, every piece of data is there to make your
                                decision
                                easier,
                                not harder.</p>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="step-section">
                            <h3 class="step-subtitle">A Platform That Listens</h3>
                            <p class="step-content">We keep improving from real user experiences. Your feedback shapes what
                                stays,
                                what
                                goes, and what gets better.</p>
                        </div>
                    </div>
                </div>
                <div class="faq-section mt-5">
                    <h2>Frequently Asked Questions</h2>

                    <div class="accordion mt-4" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    How can I find trusted movers in USA?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can explore verified listings of trusted movers in USA on My Moving Journey. Every
                                    company is
                                    checked for licenses, reviews, and service quality, so you only deal with reliable
                                    movers.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Can I compare movers before hiring one?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. You can easily compare moving companies side by side, see their services, prices,
                                    and
                                    reviews
                                    before making a choice that fits your move and budget.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    Do you list both local and long-distance movers?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely. Whether you need local movers near me for a short move or long distance
                                    movers
                                    USA for
                                    cross-country relocation, you’ll find both types organized and easy to explore.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    How do you verify the movers listed here?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We only add verified moving companies after checking their licenses, insurance, and
                                    customer
                                    feedback. Our goal is to keep your moving choices safe and trustworthy.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive">
                                    Is it free to use My Moving Journey?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, our platform is completely free to use. You can search, compare, and connect with
                                    affordable
                                    movers without paying any listing or search fees.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto mt-md-5">
                        <h2 class="latest_blog_h2 mb-3 text-center">Here are the latest blogs</h2>
                    </div>
                    <div class="col-lg-10 mx-auto">
                        <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="blogSwiper">
                            <div class="swiper-wrapper" id="swiper-wrapper-d3e6c28fc4f88b16" aria-live="off"
                                style="transition-duration: 0ms; transform: translate3d(-425.333px, 0px, 0px); transition-delay: 0ms;">
                                @foreach ($posts as $post) 
                                    <div class="swiper-slide swiper-slide-prev" role="group" aria-label="{{ $loop->index+1 }} / 5"
                                        style="width: 395.333px; margin-right: 30px;">
                                        <a href="{{ route('posts.show', $post->slug) }}"
                                            class="text-decoration-none color_in">
                                            <div class="img_wrapper mb-3">
                                                <img src="{{ asset('public/posts/image/' . $post->image) }}"
                                                    class="img-fluid latest_blog_img" alt="{{ $post->slug }}-image">
                                            </div>
                                            <div class="card-body pt-2 ps-0">
                                                <h3 class=" blog_head">{{ $post->title }}
                                                </h3>
                                                <span class="publish_dat">Published
                                                    Date:{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</span>
                                                <p class="card-text blog_desc mt-3">
    {{ \Illuminate\Support\Str::words($post->description, 20, '...') }}
</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                               
                            </div>
                            <!-- Swiper Pagination -->
                            <!-- <div class="swiper-pagination mt-4"></div> -->
                        </div>

                    </div>
                    <div class="text-center mt-5"><a href="https://mymovingjourney.com/blogs" class="btn-bonus py-3 ">See
                            More
                            Blogs</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/home-quote.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com/",
            "description": " Pick the best moving company that will fulfill your complete needs under 1 roof - Let's connect with My Moving Journey
            Today For Fulfill Your Needs."
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://mymovinjourney.com/?search={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "My Moving Journey",
            "legalname": "My Moving Journey",
            "parentOrganization": "My Moving Journey",
            "url": "https://mymovingjourney.com/",
            "logo": "https://mymovingjourney.com/assets/img/logo.png",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "3680 Wilshire Blvd Ste P04 - 1032",
                "addressLocality": "Los Angeles",
                "addressRegion": "CA",
                "postalCode": "90010"
            },
            "telephone": "(786) 980-3050",
            "email": "contact@mymovinjourney.com",
            "brand": [
                {
                    "@type": "Brand",
                    "name": "My Moving Journey"
                }
            ],
            "contactPoint": [
                {
                    "@type": "ContactPoint",
                    "contactType": "customer support",
                    "email": "contact@mymovinjourney.com",
                    "telephone": "(786) 980-3050",
                    "areaServed": "US"
                }
            ],
            "sameAs": [
                "https://www.facebook.com/mymovingjourney/",
                "https://x.com/mymovingjourney",
                "https://www.pinterest.com/mymovingjourneyus/",
                "https://www.linkedin.com/company/mymovingjourney/"
            ]
        }
        
     </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How can I find trusted movers in USA?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You can explore verified listings of trusted movers in USA on My Moving Journey. Every company is checked for licenses, reviews, and service quality, so you only deal with reliable movers."
      }
    },
    {
      "@type": "Question",
      "name": "Can I compare movers before hiring one?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. You can easily compare moving companies side by side, see their services, prices, and reviews before making a choice that fits your move and budget."
      }
    },
    {
      "@type": "Question",
      "name": "Do you list both local and long-distance movers?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely. Whether you need local movers near me for a short move or long distance movers USA for cross-country relocation, you’ll find both types organized and easy to explore."
      }
    },
    {
      "@type": "Question",
      "name": "How do you verify the movers listed here?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We only add verified moving companies after checking their licenses, insurance, and customer feedback. Our goal is to keep your moving choices safe and trustworthy."
      }
    },
    {
      "@type": "Question",
      "name": "Is it free to use My Moving Journey?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, our platform is completely free to use. You can search, compare, and connect with affordable movers without paying any listing or search fees."
      }
    }
  ]
}
</script>

    {{-- <script>
        var path = "{{ route('autocomplete') }}";
        $('.zipfromsearch').autocomplete({
            source: function(request, response) {
                if (request.term.length >= 3) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {

                            search: request.term

                        },

                        success: function(data) {

                            response($.map(data, function(item) {

                                return {

                                    label: item.value + ' - ' + item

                                        .name, // Add name to the label

                                    value: item

                                        .value, // This is the value that will be selected

                                    id: item.id, // You can access the ID if needed

                                    latitude: item

                                        .latitude, // You can access latitude if needed

                                    longitude: item

                                        .longitude // You can access longitude if needed

                                };

                            }));

                        }

                    });

                }

            },

            select: function(event, ui) {

                $('.zipfromsearch').val(ui.item.label);

                return false;

            }

        });

        $('.ziptosearch').autocomplete({

            source: function(request, response) {

                if (request.term.length >= 3) {

                    $.ajax({

                        url: path,

                        type: 'GET',

                        dataType: "json",

                        data: {

                            search: request.term

                        },

                        success: function(data) {

                            response($.map(data, function(item) {

                                return {

                                    label: item.value + ' - ' + item

                                        .name, // Add name to the label

                                    value: item

                                        .value, // This is the value that will be selected

                                    id: item.id, // You can access the ID if needed

                                    latitude: item

                                        .latitude, // You can access latitude if needed

                                    longitude: item

                                        .longitude // You can access longitude if needed

                                };

                            }));

                        }

                    });

                }

            },

            select: function(event, ui) {

                $('.ziptosearch').val(ui.item.label);

                return false;

            }

        });

    </script>

    <script>

        var maxLength = 5;

        $('.ziptosearch').keyup(function() {

            var textlen = maxLength - $(this).val().length;

        });

        $('.zipfromsearch').keyup(function() {

            var textlen = maxLength - $(this).val().length;

        });

    </script> --}}

    <script>
        var div1 = $("#row_modal")

        var btn1 = $("#btn-canvas-Form")

        if (window.screen.width > 992) {

            div1.removeClass("d-none");

            btn1.addClass("d-none");

        } else {

            div1.addClass("d-none");

            div1.removeClass("sticky-form");

            btn1.removeClass("d-none");

        }

        $(window).resize(function() {

            if (window.screen.width > 992) {

                div1.removeClass("d-none");

                btn1.addClass("d-none");

            } else {

                div1.addClass(" d-none");

                div1.removeClass("sticky-form");

                btn1.removeClass("d-none");

            }

        });

        $("#moveDate, #moveDate2").flatpickr({

            dateFormat: "d-m-Y",

            disableMobile: "true"

        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>

    <script>
        function formatPhoneNumber(input) {

            var phoneNumber = input.value.replace(/\D/g, '');



            var formattedPhoneNumber = '';

            if (phoneNumber.length > 0) {

                formattedPhoneNumber = '(' + phoneNumber.substring(0, 3);

            }

            if (phoneNumber.length > 3) {

                formattedPhoneNumber += ') ' + phoneNumber.substring(3, 6);

            }

            if (phoneNumber.length > 6) {

                formattedPhoneNumber += ' - ' + phoneNumber.substring(6);

            }



            input.value = formattedPhoneNumber;

        }
    </script>

    <script>
        const slides = document.querySelectorAll('.carousel-item');

        const fills = document.querySelectorAll('.progress-fill');

        const totalSlides = slides.length;

        let currentIndex = 0;

        const duration = 4000;



        fills[0].style.transition = `transform ${duration/1000}s linear`;

        fills[0].style.transform = 'scaleY(1)';



        function showSlide(index) {

            if (index === 0) {

                fills.forEach(fill => {

                    fill.style.transition = 'none';

                    fill.style.transform = 'scaleY(0)';

                });

            }



            slides.forEach(slide => {

                slide.style.transition = 'opacity 1s ease-in-out';

                slide.style.opacity = '0';

                slide.classList.remove('active');

            });



            slides[index].classList.add('active');

            slides[index].style.opacity = '1';



            setTimeout(() => {

                fills[index].style.transition = `transform ${duration/1000}s linear`;

                fills[index].style.transform = 'scaleY(1)';

            }, 50);

        }



        setInterval(() => {

            currentIndex++;

            if (currentIndex === totalSlides) {

                currentIndex = 0;

            }

            showSlide(currentIndex);

        }, duration);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Swiper JS -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('#blogSwiper', {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
        });
    </script>
    <script>
        // Compare button click
        document.getElementById("compareBtn").addEventListener("click", function() {
            const mover1 = document.getElementById("mover1").value;
            const mover2 = document.getElementById("mover2").value;

            if (!mover1 || !mover2) {
                alert("Please select two movers to compare!");
                return;
            }

            // Show modal immediately with loader
            const modal = new bootstrap.Modal(document.getElementById('compareModal'));
            modal.show();

            // Show loader and hide content
            document.getElementById("compareLoader").style.display = "flex";
            document.getElementById("comparisonContent").style.display = "none";

            // Simulate loading delay
            setTimeout(() => {
                try {
                    // Get data from selected options
                    const mover1Option = document.querySelector(`#mover1 option[value="${mover1}"]`);
                    const mover2Option = document.querySelector(`#mover2 option[value="${mover2}"]`);

                    if (!mover1Option || !mover2Option) {
                        alert("Error: Could not find selected mover data. Please try again.");
                        document.getElementById("compareLoader").style.display = "none";
                        return;
                    }

                    // Fill mover 1 card
                    document.getElementById("card_mover1_name").innerText = mover1Option.getAttribute(
                        'data-name');
                    document.getElementById("card_mover1_rating").innerHTML = generateStarRating(parseFloat(
                        mover1Option.getAttribute('data-rating')));
                    document.getElementById("card_mover1_img").src = mover1Option.getAttribute('data-img');

                    // Fill mover 2 card
                    document.getElementById("card_mover2_name").innerText = mover2Option.getAttribute(
                        'data-name');
                    document.getElementById("card_mover2_rating").innerHTML = generateStarRating(parseFloat(
                        mover2Option.getAttribute('data-rating')));
                    document.getElementById("card_mover2_img").src = mover2Option.getAttribute('data-img');

                    // Hide loader and show content
                    document.getElementById("compareLoader").style.display = "none";
                    document.getElementById("comparisonContent").style.display = "flex";

                } catch (error) {
                    console.error("Error in comparison:", error);
                    alert("An error occurred while loading comparison. Please try again.");
                    document.getElementById("compareLoader").style.display = "none";
                    document.getElementById("comparisonContent").style.display = "none";
                }

            }, 1500); // 1.5 sec loader
        });

        // Update mover images when dropdown selection changes
        document.getElementById("mover1").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                document.getElementById("mover1_img").src = selectedOption.getAttribute('data-img');
            }
        });

        document.getElementById("mover2").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                document.getElementById("mover2_img").src = selectedOption.getAttribute('data-img');
            }
        });

        // Function to generate star rating HTML
        function generateStarRating(rating) {
            const maxStars = 5;
            const filledStars = Math.floor(rating);
            const hasHalfStar = rating % 1 !== 0;
            let starsHTML = '';

            // Add filled stars
            for (let i = 0; i < filledStars; i++) {
                starsHTML += '<i class="fas fa-star" style="color: #ffc107;"></i>';
            }

            // Add half star if needed
            if (hasHalfStar) {
                starsHTML += '<i class="fas fa-star-half-alt" style="color: #ffc107;"></i>';
            }

            // Add empty stars
            const emptyStars = maxStars - filledStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                starsHTML += '<i class="far fa-star" style="color: #ddd;"></i>';
            }

            return starsHTML + ` <span style="margin-left: 8px; font-weight: 600;">${rating}/5</span>`;
        }
        // Get quote function
        function getQuote(moverNumber) {
            const moverSelect = document.getElementById(`mover${moverNumber}`);
            const moverName = moverSelect.options[moverSelect.selectedIndex].getAttribute('data-name');
            const moverSlug = moverSelect.options[moverSelect.selectedIndex].getAttribute('data-slug');

            if (moverSlug) {
                window.open(`/contact-mover/${moverSlug}`, '_blank');
            } else {
                alert(`Please select a mover first to get a quote for ${moverName}`);
            }
        }

        // Learn more function
        function learnMore(moverNumber) {
            const moverSelect = document.getElementById(`mover${moverNumber}`);
            const moverName = moverSelect.options[moverSelect.selectedIndex].getAttribute('data-name');
            const moverSlug = moverSelect.options[moverSelect.selectedIndex].getAttribute('data-slug');

            if (moverSlug) {
                window.open(`/mover/${moverSlug}`, '_blank');
            } else {
                alert(`Please select a mover first to learn more about ${moverName}`);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            // Initialize select2 for both dropdowns
            $('#mover1, #mover2').select2({
                placeholder: "Choose Mover",
                allowClear: true,
                width: '100%',
                minimumResultsForSearch: 0
            });

            // Image preview on change
            $("#mover1").on("change", function() {
                let img = $(this).find(':selected').data('img');
                $("#mover1_img").attr("src", img ? img : "./question-mark.png");
            });

            $("#mover2").on("change", function() {
                let img = $(this).find(':selected').data('img');
                $("#mover2_img").attr("src", img ? img : "./question-mark.png");
            });
        });
    </script>


@endsection
