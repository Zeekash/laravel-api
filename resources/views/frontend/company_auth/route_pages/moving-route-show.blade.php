@extends('layouts.app')

@section('title')
    {{ $movingRoute->meta_title }}
@endsection

@section('meta_description')
    {{ $movingRoute->meta_description }}
@endsection
@section('meta_keywords', "$movingRoute->title")
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/routes/sub_routes_pages.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/listing.css') }}"> --}}

    <style>
        div#card-of-services {

            min-height: 210px;

        }

        .miles_upp {
            font-size: 18px;
            color: #000;
            font-weight: 400;
            margin-top: 10px;
        }

        .secure_info {
            font-size: 17px !important;
            font-weight: 500 !important;
            margin-top: 5px !important;
        }

        p.m-0.text-break {

            font-size: 16px;

            font-family: var(--para-family);

            line-height: 1.4rem;

        }
    </style>

    <div class="main-banner">

        <div class="home_page_banner mb-3">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10  mt-3">

                        <div class="mb-4">

                            <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="#">Home</a></li>

                                    <li class="breadcrumb-item"><a href="/moving-routes">Moving Routes</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">{{ $movingRoute->title }}</li>

                                </ol>

                            </nav>

                            {!! $movingRoute->upper_content !!}

                            {{-- <h1 class="main-title">($778) Arlington to<br> Washington Moving Cost</h1>

                            <span style="font-family: var(--para-family); font-weight: 900; color:#116087;">Editorial

                                Team</span>

                            <p class="meta-info">Updated: Jul 7th, 2025 (6 min read)</p>

                            <p class="quick-answer"><strong>Quick answer:</strong> The average cost of Moving From

                                Arlington to

                                Washington ranges between <strong>$700 and $2100</strong>The cost will vary according to

                                the amount of stuff you are moving, your moving date, and the services you get from the

                                movers.</p> --}}

                        </div>

                        <div class="form_wrapper">

                            <hr style="width: 57%;color: #0000007a;">

                            <div class="container">
                                <div class="form_wrap">
                                    <div class=" col-12 mx-auto mt-3">
                                        <div class="form_wrapper">
                                            <form action="" class=" main_banner_form">
                                                <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                                                    <span class="mb-2 form_heading">

                                                        Let’s Calculate Your Moving Cost!
                                                    </span>
                                                    <p class="miles_upp">Moving Distance: 0 miles</p>
                                                </div>
                                                <div class="form_bg">
                                                    <div class="row">
                                                        <div class="col-lg-4 mt-lg-0 mt-2">
                                                            <div class="input_outer">
                                                                <label for="external_zipfrom">Moving from*</label>
                                                                <input type="text" id="external_zipfrom"
                                                                    name="moving-from"
                                                                    class="zipfromsearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_zipfrom_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-lg-0 mt-2">
                                                            <div class="input_outer">
                                                                <label for="external_ziptosearch">Moving to*</label>
                                                                <input type="text" id="external_ziptosearch"
                                                                    name="moving-to" class="ziptosearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_ziptosearch_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-1"></div> --}}
                                                        <div
                                                            class="col-lg-4 d-flex align-items-center justify-content-end text-center">
                                                            <a href="#ModalForm" data-bs-toggle="modal">
                                                                <button class="quote-btn" type="button">
                                                                    Cost Calculator
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mt-1">
                                                    <p class="mt-2 mb-0 text-center secure_info">Your personal information
                                                        is always safe and
                                                        encrypted.
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- Movers Info Section (below the booking form) -->

                        <div class="row movers-info  my-4">

                            <div class="col-md-4">

                                <div class="info-box d-flex align-items-center">

                                    <div class="img_bg me-3">

                                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info-icon">

                                    </div>

                                    <p class="mb-0"><strong>2,000</strong> Movers Helped Every Month</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="info-box d-flex align-items-center">

                                    <div class="img_bg me-3">

                                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info-icon">

                                    </div>

                                    <p class="mb-0"><strong>96%</strong> customer satisfaction</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="info-box d-flex align-items-center">

                                    <div class="img_bg me-3">

                                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info-icon">

                                    </div>

                                    <p class="mb-0"><strong>100%</strong> Free & No-Obligation Quotes</p>

                                </div>

                            </div>

                        </div>

                        <hr>



                        {{-- <p class="quick-answer">Looking for reliable long-distance movers? Our platform connects you

                            with trusted moving

                            companies offering affordable rates, fast service, and complete peace of mind. Whether

                            you're relocating across states or moving coast to coast, we make your journey stress-free.

                            Compare quotes, read reviews, and book your move with confidence today.</p> --}}

                        <!-- Cities -->

                        <p id="route" style="display: none;">{{ $movingRoute->title }}</p>



                        <div id="from-city" style="display:none;"></div>

                        <div id="to-city" style="display:none;"></div>

                        <div id="map"
                            style="height: 300px; width: 100%; margin-bottom: 20px; border-radius: 20px; overflow: hidden; position: relative;">

                        </div>

                        <div class="row ">

                            <div class="col-12">

                                <h2 class="my-4 text-center">

                                    Here’s the Best Moving Companies

                                </h2>

                                <div class="row mb-3">

                                    @forelse($companies as $company)
                                        <div class="col-md-6 mb-lg-0 mb-3">

                                            <a href="{{ route('company.show', $company->slug) }}"
                                                class="text-decoration-none">

                                                <div class="new_card">
                                                    <h3 class="company-name" id="title-of-company-name">

                                                        {{ $company->company_name }}

                                                        @if ($company->is_claimed == 1)
                                                            <span>

                                                                <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}"
                                                                    style="width: 20px;" alt="verified">

                                                            </span>
                                                        @endif

                                                    </h3>
                                                    <div class="row align-items-center">



                                                        <div class="col-lg-9 order-lg-0 order-1">

                                                            <div class="content ps-lg-3 ps-0">



                                                                @php

                                                                    $total_rating = $company->users->sum(function (
                                                                        $user,
                                                                    ) {
                                                                        return (float) $user->overall_rating; // Ensure overall_rating is treated as a float
                                                                    });

                                                                    $total_reviews = $company->users->count();

                                                                    if ($total_reviews > 0) {
                                                                        $avg_rating = $total_rating / $total_reviews;
                                                                    } else {
                                                                        $avg_rating = 0;
                                                                    }

                                                                    $rounded = round($avg_rating, 1);

                                                                @endphp

                                                                <div class="rating-section mb-1">

                                                                    <ul
                                                                        class="list-unstyled stars_list m-0  d-flex align-items-center ">

                                                                        <li>

                                                                            @if ($rounded == 0)
                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif ($rounded > 0 && $rounded < 1)
                                                                                <i class="fa fa-star-half-stroke"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded == 1)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded > 1 && $rounded < 2)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fa fa-star-half-stroke"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded == 2)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded > 2 && $rounded < 3)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fa fa-star-half-stroke"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded == 3)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded > 3 && $rounded < 4)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fa fa-star-half-stroke"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded == 4)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="far fa-star"
                                                                                    style="font-size:1.2rem; color:#a7a7a7"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded > 4 && $rounded < 5)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fa fa-star-half-stroke"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>
                                                                            @elseif($rounded == 5)
                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>

                                                                                <i class="fas fa-star"
                                                                                    style="font-size:1.2rem; color:#ff9800"
                                                                                    aria-hidden="true"></i>
                                                                            @endif

                                                                        </li>

                                                                        <span
                                                                            class="rating-point">({{ round($avg_rating, 1) }})</span>

                                                                    </ul>



                                                                </div>



                                                                <p class="review-text mb-0">Based on 24 Reviews</p>



                                                                <div class="double_btn">

                                                                    <button class="get ">Get Estimate</button>

                                                                    <button class="more">Learn More</button>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-3 order-lg-1 order-0">

                                                            <div class="">

                                                                <span hidden class="image">{{ $company->image }}</span>

                                                                @if ($company->image)
                                                                    @php

                                                                        $imageUrl = str_starts_with(
                                                                            $company->image,

                                                                            'companies/image/',
                                                                        )
                                                                            ? URL::to('/' . $company->image)
                                                                            : URL::to(
                                                                                '/companies/image/' . $company->image,
                                                                            );

                                                                    @endphp

                                                                    <img class="img-fluid" src="{{ $imageUrl }}"
                                                                        alt="{{ $company->image }}">
                                                                @else
                                                                    <img class="img-fluid"
                                                                        src="{{ URL::to('/img/samplelogo.webp') }}"
                                                                        alt="{{ $company->image }}">
                                                                @endif

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                    @empty

                                        <div class="card text-center comp-not-fount-txt py-4 my-3">

                                            <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want
                                                to

                                                create

                                                account ?</a>

                                        </div>
                                    @endforelse

                                </div>

                                {{ $companies->links() }}

                                {{-- <div class="row">

                        <div class="col-12">

                            <div class="pagination-container d-flex justify-content-center my-2" data-wow-duration="0.5s">

                                <ul class="pagination m-0">

                                </ul>

                            </div>

                        </div>

                    </div> --}}

                            </div>

                        </div>

                    </div>



                    <!-- <hr class="d-md-none d-block" style="width: 70%;

        color: #0000007a;

        margin: auto;"> -->

                </div>



            </div>

            {{-- <div class="container my-4">

        <div class="row">

            <div class="col-md-9 mx-auto">

                <div class="top_card my-4">

                    <h2>Featured Moving Companies</h2>

                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-12 mt-4">

                            <div class="card companytop_c">

                                <div class="active_badge">Best for Quality Service</div>



                                <a href="https://mymovingjourney.com/mover/united-american-moving-and-storage"

                                    class="company-name text-center">

                                    <img src="https://mymovingjourney.com/companies/image/united-american-moving-and-storage.jpg"

                                        alt="company_logo">

                                </a>



                                <div class="rating-section ">

                                    <ul

                                        class="list-unstyled stars_list m-0 my-3  d-flex align-items-center justify-content-center">

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"></i>

                                        </li>



                                    </ul>

                                    <div class="rating-text">Rating 4.6/5</div>

                                </div>



                                <div class="features mb-3 mx-auto">

                                    <ul class="list-unstyled card-li text-start">

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">

                                            Nationwide Network

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">Flexibility

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">GPS tracking

                                        </li>

                                    </ul>

                                </div>



                                <div class="group">

                                    <a href="https://mymovingjourney.com/contact-mover/united-american-moving-and-storage"

                                        target="_blank" class="estimate_btn">Get Free Estimates</a>



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mt-4">

                            <div class="card companytop_c">

                                <div class="badge">Best for Affordable Rates

                                </div>



                                <a href="https://mymovingjourney.com/mover/united-van-lines"

                                    class="company-name text-center">

                                    <img src="https://mymovingjourney.com/companies/image/united-van-lines.webp"

                                        alt="company_logo">

                                </a>



                                <div class="rating-section ">

                                    <ul

                                        class="list-unstyled stars_list m-0 my-3 d-flex align-items-center justify-content-center">

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"></i>

                                        </li>



                                    </ul>

                                    <div class="rating-text">Rating 4/5</div>

                                </div>



                                <div class="features mb-3 mx-auto">

                                    <ul class="list-unstyled card-li text-start">

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">

                                            Punctual Crew

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">Customer Satisfaction

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">Efficient Service

                                        </li>

                                    </ul>

                                </div>







                                <div class="group">

                                    <a href="https://mymovingjourney.com/contact-mover/united-van-lines" target="_blank"

                                        class="estimate_btn">Get Free Estimates</a>



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mt-4 mx-auto">

                            <div class="card companytop_c">

                                <div class="badge">

                                    Best for Customer Support

                                </div>



                                <a href="https://mymovingjourney.com/mover/two-men-and-a-truck"

                                    class="company-name text-center">

                                    <img src="https://mymovingjourney.com/companies/image/two-men-and-a-truck.webp"

                                        alt="company_logo">

                                </a>



                                <div class="rating-section ">

                                    <ul

                                        class="list-unstyled stars_list m-0 my-3 d-flex align-items-center justify-content-center">

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fas fa-star" aria-hidden="true"></i></li>

                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"></i>

                                        </li>

                                        <!--<li>-->

                                        <!--    <span class="best_company_rating">4.9/5</span>-->

                                        <!--</li>-->

                                    </ul>

                                    <div class="rating-text">Rating 5/5</div>

                                </div>



                                <div class="features mb-3 mx-auto">

                                    <ul class="list-unstyled card-li text-start">

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">

                                            Licensed & Insured

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">

                                            Professional Staff

                                        </li>

                                        <li class="d-flex align-items-baseline"><img

                                                src="https://mymovingjourney.com/assets/img/check-mark.png"

                                                alt="check-mark" width="13" height="13">

                                            Affordable Rates

                                        </li>

                                    </ul>

                                </div>



                                <div class="group">

                                    <a href="https://mymovingjourney.com/contact-mover/two-men-and-a-truck"

                                        target="_blank" class="estimate_btn">Get Free Estimates</a>



                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> --}}



            <section class="my-4">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-9 mx-auto">

                            <div class="company-card">

                                {{-- <h2 class="mb-3">Explore More Verified Moving Companies from Georgia to Connecticut</h2>

                        <p>If you're looking to explore additional moving companies from Georgia to Connecticut, check

                            out

                            our extended list below. These options will help you find the perfect mover for your needs.



                        </p>

                        <p>Here are the moving companies serving Georgia to Connecticut.

                        </p> --}}





                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <section class="my-4">

                <div class="container">

                    <div class="row">

                        <div class="col-lg-9 mx-auto">

                            <div class="cost_section">

                                {!! $movingRoute->lower_content !!}

                                {{-- <h2 class="mb-3">How Much Does It Cost To Move From Georgia to Connecticut?</h2>

                        <p>We have calculated the <b>average cost</b> of moving from Georgia to Connecticut by reviewing

                            this

                            route's moving reviews . The moving cost from Georgia to Connecticut ranges from <b>$1,328

                                to

                                $6,980. </b>This is a rough estimate for an average distance of 1,017 miles between both

                            cities.

                        </p>

                        <div class="row">

                            <div class="col-lg-8 mx-auto my-4">

                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">

                                    <table class="table fw-semibold">

                                        <thead>

                                            <tr class="align-middle">

                                                <th style="background-color: #116087; color: white; width: 50%;"

                                                    scope="col">Move Size </th>

                                                <th style="background-color: #116087; color: white;" scope="col">

                                                    Average

                                                    Cost</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td style="background-color: #11608714;">Studio / 1 Bedroom

                                                </td>

                                                <td style="background-color: #11608714;">$1,328 - $5,750

                                                </td>



                                            </tr>

                                            <tr>

                                                <td>2-3 Bedroom</td>

                                                <td>$2,994 - $6,980</td>

                                            </tr>

                                            <tr>

                                                <td style="background-color: #11608714;">4+ Bedroom</td>

                                                <td style="background-color: #11608714;">$4,574 - $9,330

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <p><strong>Note:</strong> These price ranges are general estimates based on a distance of 1,017

                            miles and past

                            averages. Your final cost may vary depending on the size of your move, any extra services

                            needed, parking access for the truck, market conditions, and overall availability.

                        </p>

                        <h2 class="mb-3">Factors Affecting the Cost of Moving From Georgia to Connecticut</h2>

                        <p>There are many factors that influence the final moving costs. The cost to move from Georgia

                            to Connecticut will depend on these factors:</p>

                        <ol class="factors_list">

                            <li><strong>Distance:</strong> The moving cost is directly proportional to the distance

                                movers are required to cover, considering the fuel and labor costs .</li>

                            <li><strong>Timeline: </strong> The date and time of your move affect the moving cost.

                                Movers charge more for moving on weekends and summers.</li>

                            <li><strong>Move size and weight:</strong> The weight and number of items you plan to

                                relocate influence the final cost. Moving a four-bedroom house and heavy items like a

                                pool table will cost more.</li>

                            <li><strong>Extra Services: </strong> Extra services like vehicle transport, packing ,

                                unpacking, furniture assembly and disassembly increase the moving cost .</li>

                            <li><strong> Transport Method:</strong> Your mode of transport will affect the final cost.

                                You can transport your belongings by road or by air. Air freight will cost more than

                                road transport.</li>

                        </ol>

                        <h2 class="mb-3">What to Know Before Moving from Georgia to Connecticut</h2>

                        <p>Going on a move from Georgia to Connecticut? Here's a detailed comparison to help you

                            understand the differences and make an informed decision.



                        </p>

                        <div class="row">

                            <div class="col-lg-8 mx-auto my-4">

                                <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">

                                    <table class="table fw-semibold">

                                        <thead>

                                            <tr class="align-middle">

                                                <th style="background-color: #116087; color: white; width: 50%;"

                                                    scope="col">Move Size </th>

                                                <th style="background-color: #116087; color: white;" scope="col">

                                                    Average

                                                    Cost</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td style="background-color: #11608714;">Studio / 1 Bedroom

                                                </td>

                                                <td style="background-color: #11608714;">$1,328 - $5,750

                                                </td>



                                            </tr>

                                            <tr>

                                                <td>2-3 Bedroom</td>

                                                <td>$2,994 - $6,980</td>

                                            </tr>

                                            <tr>

                                                <td style="background-color: #11608714;">4+ Bedroom</td>

                                                <td style="background-color: #11608714;">$4,574 - $9,330

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div> --}}

                                <!--<div id="toc-faqs-about-moving-companies" class="my-5">-->

                                <!--    <h2 class="my-3">FAQs</h2>-->

                                <!--    <div id="accordionFlushExample" class="accordion accordion-flush">-->

                                <!--        <div class="accordion-item">-->

                                <!--            <h2 class="accordion-header"><button class="accordion-button collapsed"-->

                                <!--                    type="button" data-bs-toggle="collapse"-->

                                <!--                    data-bs-target="#flush-collapseOne" aria-expanded="false"-->

                                <!--                    aria-controls="flush-collapseOne"> What are the top long-->

                                <!--                    distance moving companies in the USA? </button></h2>-->

                                <!--            <div id="flush-collapseOne" class="accordion-collapse collapse"-->

                                <!--                data-bs-parent="#accordionFlushExample" style="">-->

                                <!--                <div class="accordion-body">When looking for the <strong>best long distance-->

                                <!--                        moving-->

                                <!--                        companies,</strong> it’s important to consider reputation, customer-->

                                <!--                    reviews, and pricing. Some of the top movers in the USA include United-->

                                <!--                    American-->

                                <!--                    Moving And Storage, Two Men and a Truck and Summit Van Lines.</div>-->

                                <!--            </div>-->

                                <!--        </div>-->

                                <!--        <div class="accordion-item">-->

                                <!--            <h2 class="accordion-header"><button class="accordion-button collapsed"-->

                                <!--                    type="button" data-bs-toggle="collapse"-->

                                <!--                    data-bs-target="#flush-collapseTwo2" aria-expanded="false"-->

                                <!--                    aria-controls="flush-collapseTwo"> Are there any hidden-->

                                <!--                    fees with long distance moving companies? </button></h2>-->

                                <!--            <div id="flush-collapseTwo2" class="accordion-collapse collapse"-->

                                <!--                data-bs-parent="#accordionFlushExample">-->

                                <!--                <div class="accordion-body">Yes, many <strong>long distance moving-->

                                <!--                        companies</strong> charge hidden fees, such as fuel surcharges,-->

                                <!--                    additional-->

                                <!--                    packing services, or fees for handling fragile items. To avoid surprises,-->

                                <!--                    ask-->

                                <!--                    for a clear breakdown of all charges before committing to a company.</div>-->

                                <!--            </div>-->

                                <!--        </div>-->

                                <!--    </div>-->

                                <!--</div>-->

                            </div>

                        </div>

                    </div>

                </div>

            </section>





            {{-- <section class="sub_route_content pt-4 pb-5">

        <div class="container">

            <div class="row">

                <div class="col-xl-10 mx-auto col-12">

                    {!! $movingRoute->upper_content !!}

                </div>

                <div class="col-xl-11 mx-auto col-12 mt-4">

                    <div class="row">

                        @forelse($companies as $company)

                            <div class="col-lg-6 col-12 mb-3 article-loop">

                                <div class="company_search_card mx-0 " id="card-of-services">

                                    <a class=" row px-3 py-3" href="{{ route('company.show', $company->slug) }}">

                                        <div

                                            class="col-12 col-md-12 col-lg-3 d-flex align-items-center justify-content-center mb-2">

                                            <span hidden class="image">{{ $company->image }}</span>

                                            @if ($company->image)

                                                @php

                                                    $imageUrl = str_starts_with($company->image, 'companies/image/')

                                                        ? URL::to('/' . $company->image)

                                                        : URL::to('/companies/image/' . $company->image);

                                                @endphp

                                                <img class="img-fluid" src="{{ $imageUrl }}" alt="{{ $company->image }}"

                                                    style="width: 200px;">

                                            @else

                                                <img class="img-fluid" src="{{ URL::to('/img/samplelogo.webp') }}"

                                                    alt="{{ $company->image }}" style="width: 200px;">

                                            @endif

                                        </div>

                                        <div class="col-12 col-md-12 col-lg-9">

                                            <div class="row">

                                                <div class="col-12 my-0">

                                                    <h3 id="title-of-company-name">

                                                        {{ $company->company_name }}

                                                        @if ($company->is_claimed == 1)

                                                            <span>

                                                                <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}"

                                                                    style="width: 20px;" alt="verified">

                                                            </span>

                                                        @endif

                                                    </h3>



                                                    @php

                                                        $total_rating = $company->users->sum(function ($user) {

                                                            return (float) $user->overall_rating; // Ensure overall_rating is treated as a float

                                                        });



                                                        $total_reviews = $company->users->count();



                                                        if ($total_reviews > 0) {

                                                            $avg_rating = $total_rating / $total_reviews;

                                                        } else {

                                                            $avg_rating = 0;

                                                        }



                                                        $rounded = round($avg_rating, 1);

                                                    @endphp

                                                    <p class="m-0">

                                                        @if ($rounded == 0)

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif ($rounded > 0 && $rounded < 1)

                                                            <i class="fa fa-star-half-stroke"

                                                                style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded == 1)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded > 1 && $rounded < 2)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-stroke"

                                                                style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded == 2)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded > 2 && $rounded < 3)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-stroke"

                                                                style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded == 3)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded > 3 && $rounded < 4)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-stroke"

                                                                style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded == 4)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded > 4 && $rounded < 5)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fa fa-star-half-stroke"

                                                                style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                        @elseif($rounded == 5)

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                            <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"

                                                                aria-hidden="true"></i>

                                                        @endif

                                                        <span class="text-danger">({{ round($avg_rating, 1) }})</span>

                                                    </p>

                                                    <span id="rating-span2" class="fs-16 "><strong>{{ $total_reviews }}

                                                            Reviews</strong></span>

                                                    <ul class="list-unstyled search_company_details m-0 p-0 mt-0">

                                                        <li>

                                                            <div class="d-flex mb-2 ">

                                                                <i class="fs-14 fa-solid fa-location-dot   me-2"></i>

                                                                <p class="m-0 text-break">

                                                                    <span class="fw-bold me-1 ">Address: </span>

                                                                    {{ $company->street ?? 'Not Found' }},

                                                                    {{ $company->city->name }} {{ $company->state->abv }},

                                                                    {{ $company->city->zip_code }}

                                                                </p>

                                                            </div>

                                                        </li>

                                                        <li>

                                                            <div class="d-flex  mb-0">

                                                                <i class="fa-solid fa-phone-volume  me-2"></i>

                                                                <p class="m-0 ">

                                                                    <span class="fw-bold me-1">Phone: </span>

                                                                    {{ $company->phone_no }},

                                                                    {{ $company->additional_phone_no }}

                                                                </p>

                                                            </div>

                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                            </div>



                        @empty

                            <div class="card text-center comp-not-fount-txt py-4 my-3">

                                <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to create

                                    account ?</a>

                            </div>

                        @endforelse





                    </div>

                     {{ $companies->links() }}

                    <div class="row">

                        <div class="col-12">

                            <div class="pagination-container d-flex justify-content-center my-2" data-wow-duration="0.5s">

                                <ul class="pagination m-0">

                                </ul>

                            </div>

                        </div>

                    </div> >

                </div>

                <!--<div class="col-xl-9 mx-auto col-12">-->

                <!--    {!! $movingRoute->lower_content !!}-->

                <!--</div>-->

            </div>

        </div>

    </section> --}}

            <script type="application/ld+json">

        {

            "@context": "http://schema.org",

            "@type": "WebPage",

            "name": "{{ $movingRoute->meta_title }}",

            "description": "{{ $movingRoute->meta_description }}",

            "url": "{{url()->current()}}"

        }

    </script>

            <script type="application/ld+json">

        {

            "@context": "https://schema.org/",

            "@type": "WebSite",

            "name": "MyMovingJourney",

            "url": "https://www.mymovinjourney.com",

           "description": "You can trust My Moving Journey to help you find a reputable and reliable moving company, so you can experience a stress-free move. We have made it easy for you"

        }

    </script>

            <script type="application/ld+json">

            {

            "@context": "https://schema.org/",

            "@type": "BreadcrumbList",

            "itemListElement": [{

                "@type": "ListItem",

                "position": 1,

                "name": "My Moving Journey",

                "item": "https://mymovingjourney.com/"

            },

            {

                "@type": "ListItem",

                "position": 2,

                "name": "Explore Top-rated Movers Across Various Routes in the USA",

                "item": "/moving-routes"

            },

            {

                "@type": "ListItem",

                "position": 3,

                "name": "{{ $movingRoute->meta_title }}",

                "item": "{{url()->current()}}"

            }

            ]

            }

        </script>

            <script>
                document.addEventListener("DOMContentLoaded", () => {

                    const routeText = document.getElementById("route").textContent.trim();



                    // " to " se split karo

                    const parts = routeText.split(" to ");



                    if (parts.length >= 2) {

                        const fromCity = parts[0].trim();

                        let toCity = parts[1].replace(/movers/i, "").trim(); // movers hatao



                        document.getElementById("from-city").textContent = fromCity;

                        document.getElementById("to-city").textContent = toCity;

                    }

                });
            </script>

            <script>
                // Fallback guesser when Geocoding API is denied/not enabled

                function guessCityState(name) {

                    const n = (name || '').toLowerCase().trim();

                    const map = {

                        'new york city': 'New York, NY',

                        'new york': 'New York, NY',

                        'wallington': 'Wallington, NJ',

                        'orlando': 'Orlando, FL',

                        'arlington': 'Arlington, VA',

                        'washington': 'Washington, DC',

                    };

                    return map[n] || `${name}, USA`;

                }



                // Minimal coordinate fallback for drawing straight line when both Directions and Geocoding fail/denied

                function coordsFor(cityWithState) {

                    const key = (cityWithState || '').toLowerCase().trim();

                    const dict = {

                        'new york, ny': {

                            lat: 40.7128,

                            lng: -74.0060

                        },

                        'wallington, nj': {

                            lat: 40.8534,

                            lng: -74.1132

                        },

                        'orlando, fl': {

                            lat: 28.5383,

                            lng: -81.3792

                        },

                        'arlington, va': {

                            lat: 38.8816,

                            lng: -77.0910

                        },

                        'washington, dc': {

                            lat: 38.9072,

                            lng: -77.0369

                        },

                    };

                    return dict[key] || null;

                }



                function updateCityWithState(elementId, callback) {

                    const el = document.getElementById(elementId);

                    if (!el) return;

                    const raw = el.textContent || "";

                    const cityName = raw.replace(/\s+/g, ' ').trim();

                    if (!cityName) return;



                    const geocoder = new google.maps.Geocoder();



                    function extractCityState(geoResult) {

                        let city = "";

                        let state = "";

                        geoResult.address_components.forEach(comp => {

                            if (comp.types.includes("locality") || comp.types.includes("postal_town")) {

                                city = comp.long_name;

                            }

                            if (comp.types.includes("administrative_area_level_1")) {

                                state = comp.short_name;

                            }

                            if (!city && comp.types.includes("administrative_area_level_2")) {

                                city = comp.long_name;

                            }

                        });

                        return {

                            city,

                            state

                        };

                    }



                    function handleGeocodeResults(results, status, attemptedAppend) {

                        if (status === "OK" && results && results.length) {

                            const best = results[0];

                            const {

                                city,

                                state

                            } = extractCityState(best);

                            const finalAddress = (city && state) ? `${city}, ${state}` : best.formatted_address;

                            el.textContent = finalAddress;

                            if (typeof callback === 'function') callback(finalAddress);

                        } else if (!attemptedAppend && status !== 'REQUEST_DENIED') {

                            geocoder.geocode({

                                address: `${cityName}, USA`,

                                region: 'US'

                            }, (res2, st2) => handleGeocodeResults(res2, st2, true));

                        } else {

                            console.warn("Geocoding unavailable/denied. Falling back to guess for:", cityName, status);

                            const guessed = guessCityState(cityName);

                            el.textContent = guessed;

                            if (typeof callback === 'function') callback(guessed);

                        }

                    }



                    geocoder.geocode({

                        address: cityName,

                        region: 'US'

                    }, (results, status) => handleGeocodeResults(results, status, false));

                }



                function initMap() {

                    // Ensure from/to are populated from the route title if blank (avoid race with DOMContentLoaded)

                    const fromEl = document.getElementById("from-city");

                    const toEl = document.getElementById("to-city");

                    if (fromEl && toEl) {

                        const currentFrom = fromEl.textContent.trim();

                        const currentTo = toEl.textContent.trim();

                        if (!currentFrom || !currentTo) {

                            const routeText = (document.getElementById("route")?.textContent || "").trim();

                            if (routeText.includes(" to ")) {

                                const parts = routeText.split(" to ");

                                const fromCity = parts[0].trim();

                                let toCity = parts[1].replace(/movers?/i, "").replace(/moving.*/i, "").trim();

                                fromEl.textContent = fromCity;

                                toEl.textContent = toCity;

                            }

                        }

                    }



                    // Pehle dono cities ko state ke sath update karna

                    updateCityWithState("from-city", function(cityA) {

                        updateCityWithState("to-city", function(cityB) {



                            // Route title me state abbreviations ke sath update karo

                            const routeEl = document.getElementById("route");

                            if (routeEl) {

                                routeEl.textContent = `${cityA} to ${cityB}`;

                            }



                            // Jab dono mil gaye tab hi map banao

                            const map = new google.maps.Map(document.getElementById("map"), {

                                zoom: 6,

                                center: {

                                    lat: 40.7,

                                    lng: -74.0

                                },

                                mapTypeId: google.maps.MapTypeId.ROADMAP,

                                disableDefaultUI: true,

                                gestureHandling: "none",

                                draggable: false,

                                scrollwheel: false,

                                keyboardShortcuts: false,

                                clickableIcons: false,

                                disableDoubleClickZoom: true

                            });



                            const directionsService = new google.maps.DirectionsService();

                            const directionsRenderer = new google.maps.DirectionsRenderer({

                                suppressMarkers: true,

                                map: map,

                                polylineOptions: {

                                    strokeColor: '#2A4FD7',

                                    strokeOpacity: 1.0,

                                    strokeWeight: 5

                                }

                            });



                            function drawFallbackLine(a, b, mapInstance) {

                                // Do not rely on Geocoder here; use static coords to avoid REQUEST_DENIED

                                const aGuess = guessCityState(a);

                                const bGuess = guessCityState(b);

                                const pA = coordsFor(aGuess);

                                const pB = coordsFor(bGuess);

                                if (!pA || !pB) {

                                    console.warn('No fallback coordinates for', aGuess, bGuess);

                                    return;

                                }

                                const A = new google.maps.LatLng(pA.lat, pA.lng);

                                const B = new google.maps.LatLng(pB.lat, pB.lng);

                                new google.maps.Marker({

                                    position: A,

                                    map: mapInstance,

                                    label: 'A'

                                });

                                new google.maps.Marker({

                                    position: B,

                                    map: mapInstance,

                                    label: 'B'

                                });

                                const line = new google.maps.Polyline({

                                    path: [A, B],

                                    geodesic: true,

                                    strokeColor: '#2A4FD7',

                                    strokeOpacity: 1.0,

                                    strokeWeight: 5

                                });

                                line.setMap(mapInstance);

                                const bounds = new google.maps.LatLngBounds();

                                bounds.extend(A);

                                bounds.extend(B);

                                mapInstance.fitBounds(bounds);

                            }



                            function requestRoute(origin, destination, attempt) {

                                directionsService.route({

                                    origin,

                                    destination,

                                    travelMode: google.maps.TravelMode.DRIVING,

                                    provideRouteAlternatives: false

                                }, function(response, status) {

                                    if (status === "OK") {

                                        directionsRenderer.setDirections(response);

                                        const leg = response.routes[0].legs[0];

                                        const markerIcon =

                                            'http://maps.google.com/mapfiles/ms/icons/red-dot.png';

                                        new google.maps.Marker({

                                            position: leg.start_location,

                                            map,

                                            icon: markerIcon,

                                            label: 'A'

                                        });

                                        new google.maps.Marker({

                                            position: leg.end_location,

                                            map,

                                            icon: markerIcon,

                                            label: 'B'

                                        });

                                        if (response.routes && response.routes[0] && response.routes[0]

                                            .bounds) {

                                            map.fitBounds(response.routes[0].bounds);

                                        }

                                    } else if ((status === 'ZERO_RESULTS' || status === 'NOT_FOUND' ||

                                            status === 'INVALID_REQUEST') && attempt < 2) {

                                        // Retry with guessed City, ST if first try failed

                                        const o2 = guessCityState(origin);

                                        const d2 = guessCityState(destination);

                                        console.warn('Retrying directions with guessed City, ST:', o2, '→',

                                            d2);

                                        requestRoute(o2, d2, attempt + 1);

                                    } else {

                                        console.error("Directions request failed:", status, response &&

                                            response.error_message ? response.error_message : '');

                                        drawFallbackLine(origin, destination, map);

                                    }

                                });

                            }



                            requestRoute(cityA, cityB, 0);



                        });

                    });

                }
            </script>





            <!-- Load Google Maps API -->

            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBefFHoLcWO1IV00axnWC0s34SPuCm9gKo&libraries=places&callback=googleMapsLoaded"
                async defer></script>
        @endsection
