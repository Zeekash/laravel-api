@extends('layouts.app')

@if ($total_reviews)
    @if ($company->meta_title != '')
        @if ($total_reviews > 1)
            @section('title', "$total_reviews Reviews For $company->meta_title")
        @else
            @section('title', "$total_reviews Review For $company->meta_title")
        @endif
    @else
        @if ($total_reviews > 1)
            @section('title', "$total_reviews Reviews For $company->company_name")
        @else
            @section('title', "$total_reviews Review For $company->company_name")
        @endif
    @endif
@else
    @section('title', $company->company_name)
@endif


@section('meta_description',
    "See reviews upto till $currentDate from previous customers of
    $company->company_name.Compare moving companies and get a free estimate.")


@section('meta_keywords', "$company->company_name")

@section('og:image', URL::to('/companies/image/' . $company->image))

@section('twitter:image', URL::to('/companies/image/' . $company->image))

@if ($total_reviews)
    @if ($company->meta_title != '')
        @if ($total_reviews > 1)
            @section('og:title', "$total_reviews Reviews For $company->meta_title")
        @else
            @section('og:title', "$total_reviews Review For $company->meta_title")
        @endif
    @else
        @if ($total_reviews > 1)
            @section('og:title', "$total_reviews Reviews For $company->company_name")
        @else
            @section('og:title', "$total_reviews Review For $company->company_name")
        @endif
    @endif
@else
    @section('og:title', "$company->company_name")
@endif

@if ($company->meta_description != '')
    @section('og:description', "$company->meta_description")
@else
    @section('og:description',
        "See reviews upto till January 2024 from previous customers of
        $company->company_name.Compare moving companies and get a free estimate.")
    @endif
@section('head')
    @if (request()->has('page') || request()->has('sort'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')
    @php
        $addr = trim(
            ($company->street ?? 'Not Found') .
                ', ' .
                ($company->city->name ?? '') .
                ' ' .
                ($company->state->abv ?? '') .
                ', ' .
                ($company->city->zip_code ?? ''),
        );
        // Strip leading "Not Found, " if street missing
        $addr = preg_replace('/^Not Found,\s*/i', '', $addr);
    @endphp
    <style>
        #header_sticky {
            padding: 16px 0px;
            z-index: 9;
            border: 1px solid rgba(0, 0, 0, 0.253);
        }
.company-info-boxes-2 {
    color: #005a80;
    font-weight: 600;
    text-decoration: none;
    font-size: 24px;
    margin-bottom: 0 !important;
    font-family: 'Merriweather';
}
        .move_size {
            font-size: 14px;
            font-family: var(--para-family);
            letter-spacing: 0px !important;
            line-height: 1.5em;
            font-weight: 600;
            color: rgb(0 0 0 / 85%) !important;
            text-align: left;
        }

        .mt-3.p-3.official-response {
            display: none;
        }

        .company-details {
            border-radius: 8px;
            margin: 0;
        }

        .company-details li {
            border-bottom: 1px solid #1160876e;
        }

        .company-details .row {
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
            align-items: center;
        }

        .company-details .row:last-child {
            border-bottom: none;
        }

        .company-details strong {
            color: #495057;
            font-weight: 600;
        }

        .company-details a {
            color: var(--bg);
            text-decoration: none;
        }

        .company-details a:hover {
            text-decoration: underline;
        }

        .company-details .text-muted {
            color: #6c757d !important;
        }

        #result_mover1_reviews,
        #result_mover2_reviews {
            font-size: 0.9em;
            color: #6c757d;
        }

        .company-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 0px solid #e0e0e0;
        }

        .company-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .rating-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .rating-stars {
            color: #E3780D;
        }

        .rating-value {
            font-weight: 700;
            color: #010101;
            font-size: 26px;
        }

        .review-count {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .price-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .price-value {
            font-size: 18px;
            font-weight: 600;
            margin: 5px 0;
        }

        .detail-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-get-quote {
            background: #116087;
            color: white;
            border: 2px solid var(--bg);
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 10px;
            width: 100%;
            font-size: 20px;
        }

        .btn-get-quote:hover {
            color: var(--bg);
            border: 2px solid var(--bg);
            background-color: #fff
        }

        .btn-learn-more {
            flex: 1;
            background: white;
            color: var(--bg);
            border: 2px solid var(--bg);
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 20px;
        }
.company_detail_title{
            font-size: 1.5rem;
                font-family: var(--family);
    font-weight: 700;
    color: #1e1a1a;
}
        .btn-learn-more:hover {
            background: #116087;
            color: white;
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/show_blade.css') }}">
    <!-- Start Top Header Area -->
    <section class="final_show py-4">
        <div class="container">
            <div class="show_breadcrumbs mt-5 mt-md-0 mb-3 mb-md-0">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                        class="fas fa-home me-1 home_icon"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('company.mover-list') }}" class="py-2">Movers
                                    List</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $company->company_name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="upper_show">
                <div class="row">
                    <div class="col-lg-2 d-flex align-items-center justify-content-center">
                        @php
                            $imageUrl = str_starts_with($company->image, 'companies/image/')
                                ? URL::to('/' . $company->image)
                                : URL::to('/companies/image/' . $company->image);
                        @endphp
                        <div class="company_logo_wrap">
                            <img src="{{ $imageUrl }}" class="show_comp" alt={{ $company->company_name }}>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h1 class="show_comp_name mb-0">{{ $company->company_name }}</h1>
                        <div>
                            @if ($company->is_claimed == 0)
                                <a href="{{ route('claim.form', $company->slug) }}" class="claim_tag">Claim Your
                                    Business?</a>
                            @else
                                <strong style="font-family: var(--family); letter-spacing: 0.2px;font-weight:700 ">
                                    Claimed Mover</strong>
                                <img src={{ asset('assets/img/MMJ_Verified_new.svg') }} loading="lazy" alt="mmj_verified"
                                    style="width: 18px">
                            @endif
                        </div>
                        <div id="float-rating-div">
                            <input id="input-1" name="input-1" class="rating mb-4 rating-loading " data-min="0" sty
                                data-max="5" data-step="0.1" readonly value="{{ $avg_rating }}">

                        </div>
                        {{-- <span class="lisence mt-2">Read Reviews</span> --}}
                        <a href="{{ route('user.review.create', $company->slug) }}" class="share_review mt-2 mb-1">Share
                            Your Feedback</a>
                        <span class="total_reviews">Based on {{ $total_reviews }} Reviews</span>
                        <div class="d-sm-flex" style="margin-top: 15px;">
                            <a target="_blank" href="{{ route('contactMover', $company->slug) }}">
                                <button class="get_company_quote">
                                    Contact Mover
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="company_detail_sec">
                            <div class="company_detail_title">Mover Information</div>
                            <div class="row company_detai_list">
                                <div class="col-4">
                                    <span>
                                        <strong>Email:</strong>
                                    </span>
                                </div>
                                <div class="col-7">
                                    <span><a href="mailto:{{ $company->company_email }}"
                                            rel="nofollow">{{ $company->company_email }}</a></span>
                                </div>
                            </div>
                            <div class="row   company_detai_list">
                                <div class="col-4">
                                    <span>
                                        <strong>Phone Number:</strong>
                                    </span>
                                </div>
                                <div class="col-7">
                                    <span><a href="tel:{{ $company->phone_no }}"
                                            rel="nofollow">{{ $company->phone_no }}</a>
                                        @if ($company->additional_phone_no)
                                            ,
                                            <a href="tel:{{ $company->additional_phone_no }}"
                                                rel="nofollow">{{ $company->additional_phone_no }}</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="row align-items-center company_detai_list">
                                <div class="col-4">
                                    <span>
                                        <strong>Website:</strong>
                                    </span>
                                </div>
                                <div class="col-7">
                                    <span><a href="{{ $company->company_website }}" target="_blank"
                                            rel="nofollow">{{ $company->company_website }}</a></span>
                                </div>
                            </div>
                            <div class="row company_detai_list border-0">
                                <div class="col-4">
                                    <span>
                                        <strong>Address:</strong>
                                    </span>
                                </div>
                                <div class="col-7">
                                    <span>{{ $company->street ?? 'Not Found' }}, {{ $company->city->name }}
                                        {{ $company->state->abv }}, {{ $company->city->zip_code }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="#license-section" class="license_sec"><span class="lisence">See all
                                        License</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="container_main pb-5 mx-3 mx-md-auto">
        {{-- <div id="company_addres_map"
            style="width: 100%; height: 300px; border: 1px solid var(--bg); border-radius: 15px; overflow: hidden;">

        </div> --}}
        {{-- <div id="map" style="width:100%; height:360px;"></div> --}}


        <div style="width: 100%; height: 300px; border: 1px solid var(--bg); border-radius: 15px; overflow: hidden;">
            <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ urlencode($addr) }}&z=15&output=embed">
            </iframe>
        </div>



        <h2 class="about_company">About {{ $company->company_name }}</h2>
        <p>
            {{ $company->about_company ?? 'Not Provided' }}
        </p>
        <div class="mt-4">
            <div class="form_wrap">
                <div class="col-lg-12 col-12 mx-auto mt-3">
                    <div class="form_wrapper">
                        <form action="" class=" main_banner_form">
                            <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
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
                                            <input type="text" id="external_zipfrom" name="moving-from"
                                                class="zipfromsearch pac-target-input" placeholder="Enter City Name"
                                                autocomplete="off">
                                            <span id="external_zipfrom_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-lg-0 mt-2">
                                        <div class="input_outer">
                                            <label for="external_ziptosearch">Moving to*</label>
                                            <input type="text" id="external_ziptosearch" name="moving-to"
                                                class="ziptosearch pac-target-input" placeholder="Enter City Name"
                                                autocomplete="off">
                                            <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4 d-flex align-items-center justify-content-center justify-content-md-end text-center">
                                        <a href="#ModalForm" data-bs-toggle="modal">
                                            <button class="quote-btn mt-3 mt-md-0" type="button">
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
        <div class="container">
            <div class="lower_show">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <nav class="navigation_menu" id="main_navigate">
                            <a href="#review" class="second" id="review_link2">reviews</a>
                            <a href="#license-section" class="four">Licenses</a>
                            @if ($company->company_info != null)
                                <a href="#info" class="first" id="info_link2">info </a>
                            @endif
                            @if ($company_faq->count() > 0)
                                <a href="#faq" class="third" id="faq_link2">FAQs</a>
                            @endif
                        </nav>
                        @if ($company->company_info != '')
                            <h2>{{ $company->company_name }} Information</h2>

                            {!! $company->company_info !!}
                        @endif --}}
                        <div class="row">

                            <div class="col-md-12 col-12 pt-1 pe-lg-4 order-lg-1 mx-auto">
                                <div
                                    class="show_review_head mb-3 d-sm-flex justify-content-between align-items-center gap-2">
                                    <span></span>
                                    <h3 class="fs-2 mt-3 reviews-summary-text">Reviews Summary</h3>
                                    <a href="{{ route('user.review.create', $company->slug) }}" target="_blank"><button
                                            class="get_company_quote">Write a
                                            Review</button></a>
                                </div>
                                <section>
                                    <div class="row borderd_row">
                                        <div class="company_progress_sec col-lg-8 col-12">
                                            <div class="col-12 flex-column align-items-center" id="card-address-row">
                                                <div class="row py-2">
                                                    <div class="pull-left d-flex align-items-center">
                                                        <div class="pull-left" style="width: 20%;">
                                                            <div class="stars_head" style=" margin:3px 0;">5 Star<span
                                                                    class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left " style="width:80%;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="5"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ $per_5 }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ms-2 review_count">({{ $star_5 }})</span>

                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="pull-left d-flex align-items-center">
                                                        <div class="pull-left" style="width: 20%;">
                                                            <div class="stars_head" style=" margin:3px 0;">4 Star<span
                                                                    class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left " style="width:80%;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="5"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ $per_4 }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ms-2 review_count">({{ $star_4 }})</span>

                                                    </div>
                                                </div>

                                                <div class="row py-2">
                                                    <div class="pull-left d-flex align-items-center">
                                                        <div class="pull-left" style="width: 20%;">
                                                            <div class="stars_head" style="margin:5px 0;">3 Star<span
                                                                    class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left " style="width:80%;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="5"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ $per_3 }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ms-2 review_count">({{ $star_3 }})</span>

                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="pull-left d-flex align-items-center">
                                                        <div class="pull-left" style="width: 20%;">
                                                            <div class="stars_head" style=" margin:3px 0;">2 Star<span
                                                                    class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left " style="width:80%;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="5"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ $per_2 }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ms-2 review_count">({{ $star_2 }})</span>

                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="pull-left d-flex align-items-center"style="gap: 18px;">
                                                        <div class="pull-left" style="width: 20%;">
                                                            <div class="stars_head" style=" margin:3px 0;">1 Star<span
                                                                    class="glyphicon glyphicon-star"></span></div>
                                                        </div>
                                                        <div class="pull-left " style="width:80%;">
                                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="5"
                                                                    aria-valuemin="0" aria-valuemax="5"
                                                                    style="width: {{ $per_1 }}%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="ms-2 review_count">({{ $star_1 }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-4 col-12 d-sm-flex  align-items-center flex-lg-column justify-content-center my-md-3">
                                            <div
                                                class="flex-column d-flex justify-content-center align-items-center ratings_comp border-0">
                                                <div class="fs-2 fw-bold text-center mb-1 rating_company">
                                                    {{ round($avg_rating, 1) }}/5</div>
                                                <div class="mb-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($avg_rating))
                                                            {{-- Full star --}}
                                                            <i class="fas fa-star" aria-hidden="true"
                                                                style="color: #E3780D;"></i>
                                                        @elseif ($i - $avg_rating > 0 && $i - $avg_rating < 1)
                                                            {{-- Half star --}}
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"
                                                                style="color: #E3780D;"></i>
                                                        @else
                                                            {{-- Empty star --}}
                                                            <i class="far fa-star" aria-hidden="true"
                                                                style="color: #E3780D;"></i>
                                                        @endif
                                                    @endfor
                                                </div>

                                                <p class="fs-6 text-center fw-bold"
                                                    style="color:#17122d; font-size:20px !important;">
                                                    {{ $total_reviews }}
                                                    Reviews</p>
                                            </div>
                                            <div class="flex-column d-flex justify-content-center  ratings_comp">
                                                <div class="fs-2 text-center mt-4 mb-1 average_price">
                                                    ${{ round($avg_cost, 1) }}</div>
                                                <p class="fs-6 text-center  fw-bold" style="color:#17122d">Average
                                                    Price</p>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <div class="read_reviews">
                                    <div class="row">
                                        <div class="col-12 ">
                                            @if ($review)

                                                <div class="mt-2 ">
                                                    <h4>Review</h4>
                                                    <div class="row my-1 mb-3 px-2 py-3 comp-profile-div"
                                                        id="reviews_card">
                                                        <div class="col-12">
                                                            <div class="my-0 d-flex flex-wrap">
                                                                <div>
                                                                    <h4 id="sub_title-of-company-name" class="mt-1 mb-0 ">
                                                                        <i class="fas fa-user"></i>
                                                                        {{ $review->name }}
                                                                    </h4>
                                                                    <span class="m-0 w-auto m-md-auto review_card_star">
                                                                        @php
                                                                            $fullStars = floor($review->overall_rating); // number of full stars
                                                                            $emptyStars = 5 - $fullStars; // remaining empty stars
                                                                        @endphp

                                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                                        @endfor

                                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                                            <i class="fas fa-star empty-stars"
                                                                                aria-hidden="true"></i>
                                                                        @endfor
                                                                    </span>
                                                                </div>
                                                                <div class="d-flex flex-column ms-sm-auto time-parent-div">
                                                                    <!--<span class=" time-stamp"><strong>Move Date:</strong> -->
                                                                    <!--    {{-- 2 hours ago --}}-->
                                                                    <!--    {{ \Carbon\Carbon::parse($review->created_at)->format('M d,Y') }}-->
                                                                    <!--</span>-->
                                                                    <p class="move_size"><strong>Move Size:</strong>
                                                                        {{ $review->move_size }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mt-1">

                                                            <div class="d-flex flex-wrap align-items-center">
                                                                <p class="user_feedback">
                                                                    <?php
                                                                    $reviewText = $review->your_review;
                                                                    $showReadMore = strlen($reviewText) > 150;
                                                                    $displayText = substr(strip_tags($reviewText), 0, 170);
                                                                    ?>
                                                                    <span class="review-content">
                                                                        {{ $displayText }}
                                                                        @if ($showReadMore)
                                                                            <span class="read-more-toggle ">... <a
                                                                                    href="#"
                                                                                    class="read-more-link text-black"><strong>Read
                                                                                        More</strong></a></span>
                                                                        @endif
                                                                    </span>
                                                                    <span class="full-review"
                                                                        style="display: none;">{{ $reviewText }}</span>
                                                                </p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between flex-wrap w-100">
                                                                    <div class="move_from">
                                                                        <span> <span class=" time-stamp">
                                                                                <strong>Date:</strong>
                                                                                {{-- 2 hours ago --}}
                                                                                {{ \Carbon\Carbon::parse($review->created_at)->format('M d,Y') }}
                                                                            </span></span><br>
                                                                        <span class="me-2 mb-0 fs-14 ">
                                                                            <b>From</b>:
                                                                            <strong>{{ $review->pickCity->name }},
                                                                                {{ $review->pickState->abv }}
                                                                            </strong>
                                                                        </span>
                                                                        <span class="m-0 fs-14 ">
                                                                            <b>To</b>:
                                                                            <strong>{{ $review->deliveryCity->name }},
                                                                                {{ $review->DeliveryState->abv }}</strong>
                                                                        </span>

                                                                    </div>
                                                                    <span
                                                                        class="move_cost text-white px-2 py-1 rounded-1 mt-sm-0 mt-2">Move
                                                                        Cost: ${{ $review->service_cost }}</span>

                                                                </div>
                                                                @if ($review->respond)
                                                                    <div class="d-flex flex-column col-sm-12 align-items-center p-3"
                                                                        style="background-color:#c0c0c030;border-radius: 10px; margin-top:5px;">
                                                                        <h5 class="w-100 text-start fs-5">Official
                                                                            Company
                                                                            Response
                                                                        </h5>
                                                                        <div class="w-100">

                                                                            {!! $review->respond !!}

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            @endif

                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="heading_div">
                                        <h3 class="fs-2 mt-4 read-reviews-summary">Read All Reviews</h3>
                                    </div>
                                    <div class="read_reviews">
                                        <div class="row">
                                            <div class="col-12 ">

                                                <div class="d-flex justify-content-lg-start justify-content-end mx-0">
                                                    <div class="dropdown">
                                                        <a class="anchor-navbar fs-6 dropdown-toggle dropdownMenuButton1"
                                                            href="#"
                                                            style="background: #fff; border:2px solid #116087; color: #116087; padding: 4px 10px;border-radius: 22px;"
                                                            data-bs-toggle="dropdown" aria-expanded="false">Sort By
                                                            <i class="mx-1 fa-solid fa-angle-down"></i></a>
                                                        <ul class="dropdown-menu bg-white" style="z-index: 5;">
                                                            <li><a class="dropdown-item fs-6"
                                                                    href="{{ URL::current() }}">Default</a>
                                                            </li>
                                                            <li><a class="dropdown-item fs-6"
                                                                    href="{{ URL::current() . '?sort=rate_asc' }}">Rating
                                                                    -
                                                                    Low
                                                                    to
                                                                    High </a>
                                                            </li>
                                                            <li><a class="dropdown-item fs-6"
                                                                    href="{{ URL::current() . '?sort=rate_desc' }}">Rating
                                                                    -
                                                                    High
                                                                    to Low</a>
                                                            </li>
                                                            <li><a class="dropdown-item fs-6"
                                                                    href="{{ URL::current() . '?sort=newest' }}">Newest</a>
                                                            </li>
                                                            <li><a class="dropdown-item fs-6"
                                                                    href="{{ URL::current() . '?sort=oldest' }}">Oldest</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="timeline" id="reviews">
                            @foreach ($reviews as $index => $mover)
                                @php
                                    $initials = collect(explode(' ', $mover->name))
                                        ->map(function ($word) {
                                            return strtoupper(substr($word, 0, 1));
                                        })
                                        ->implode('');
                                @endphp
                                <div class="timeline-card ">
                                    <div class="row">
                                        <div class="col-lg-3 col-lg-3 d-flex align-items-center justify-content-center">
                                            <div class="mt-1 mb-0 user_name_ico">
                                                <div class="name_first_letter">
                                                    <span class="name_reviewer">{{ $initials }}</span>
                                                </div>
                                                {{ $mover->name }}
                                            </div>

                                        </div>
                                        <div class="col-lg-9 mt-lg-0 mt-3">
                                            <div class="card_bg">

                                                <div class="card-content">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div style="display: flex;flex-direction: column;">
                                                            <span style="color: #000000b5;">
                                                                Reviewed {{ $mover->created_at->format('M jS, Y') }}
                                                            </span>
                                                            <span class="review_card_star">
                                                                @php
                                                                    $fullStars = floor($mover->overall_rating); // number of full stars
                                                                    $emptyStars = 5 - $fullStars; // remaining empty stars
                                                                @endphp

                                                                @for ($i = 0; $i < $fullStars; $i++)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                @endfor

                                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                                    <i class="fas fa-star empty-stars"
                                                                        aria-hidden="true"></i>
                                                                @endfor
                                                            </span>
                                                        </div>

                                                        <div>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#shareModal{{ $mover->id }}"
                                                                class="btn btn-outline-primary share_btn">
                                                                <i class="fas fa-share-square"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                </div>

                                                @php
                                                    $reviewText = $mover->your_review;
                                                    $showReadMore = strlen($reviewText) > 150;
                                                    $displayText = substr(strip_tags($reviewText), 0, 170);
                                                @endphp
                                                <p class="mt-1" ><b>{{ $mover->review_subject }}</b></p>
                                                <p class="user_feedback mt-2">
                                                    <span class="review-content">
                                                        {{ $displayText }}
                                                        @if ($showReadMore)
                                                            <span class="read-more-toggle">
                                                                ... <a href="#"
                                                                    class="read-more-link text-black"><strong>Read
                                                                        More</strong></a>
                                                            </span>
                                                        @endif
                                                    </span>
                                                    <span class="full-review"
                                                        style="display: none;">{{ $reviewText }}</span>
                                                </p>
                                                <div
                                                    class="details d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="move_from">
                                                        <p class="move_size mb-0"><strong>Move Size:</strong>
                                                            {{ $mover->move_size }}</p>
                                                        {{-- <span class="me-2 mb-0 fs-14">
                                                        <b>From</b>:
                                                        <strong>{{ $data->pickCity->name }},
                                                            {{ $data->pickState->abv }}</strong>
                                                    </span>
                                                    <span class="m-0 fs-14">
                                                        <b>To</b>:
                                                        <strong>{{ $data->deliveryCity->name }},
                                                            {{ $data->DeliveryState->abv }}</strong>
                                                    </span> --}}
                                                        <span class="time-stamp">
                                                            <strong>Move Date:</strong>
                                                            {{ \Carbon\Carbon::parse($mover->created_at)->format('M d,Y') }}
                                                        </span>
                                                    </div>
                                                    <div class="share_btn_cost d-flex flex-column">
                                                        <span class="move_cost text-white px-sm-2 px-0 rounded-1">
                                                            Move Cost: ${{ $mover->service_cost }}
                                                        </span>

                                                    </div>
                                                    @if ($mover->respond)
                                                        <div class="d-flex flex-column col-sm-12 align-items-center p-3"
                                                            style="background-color:#c0c0c030;border-radius: 10px; margin-top:5px;">
                                                            <h5 class="w-100 text-start fs-5">Official Company Response
                                                            </h5>
                                                            <div class="w-100">

                                                                {!! $mover->respond !!}

                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="modal fade" id="shareModal{{ $mover->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-capitalize fs-5"
                                                                    id="exampleModalLabel">
                                                                    Share Review
                                                                </h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body p-2">
                                                                <div
                                                                    class="share_links d-flex justify-content-md-start justify-content-center">
                                                                    {!! Share::page(url('mover/' . $company->slug . '?id=' . $mover->id))->facebook()->twitter() !!}
                                                                </div>
                                                                <input class="copy-to-clipboard form-control"
                                                                    style="padding: 10px; border: 1px solid #116087; border-radius: 4px;"
                                                                    readonly onclick="copyText(this)" type="text"
                                                                    value="{{ url('mover/' . $company->slug . '?id=' . $mover->id) }}">
                                                                <span class="copy_message">Review link copied to
                                                                    clipboard</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($mover->respond)
                                                    <div class="mt-3 p-3 official-response">
                                                        <h5 class="fs-5">Official Company Response</h5>
                                                        <div>
                                                            {!! $mover->respond !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! $pagePaginate !!}
                        <section class="company-section pt-2 pt-md-4 pb-3">
                            <div class="d-flex flex-wrap justify-content-center gap-4">
                                <!-- Positive Review Box -->
                                <div class="review-box positive">
                                    <div class="review-icon">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                    </div>
                                    <p class="review-text">
                                        <strong>{{ round($positive_percentage) }}%</strong> of reviews
                                        are<br>positive
                                    </p>
                                </div>

                                <!-- Negative Review Box -->
                                <div class="review-box negative">
                                    <div class="review-icon">
                                        <i class="bi bi-hand-thumbs-down"></i>
                                    </div>
                                    <p class="review-text">
                                        <strong>{{ round($negative_percentage) }}%</strong> of reviews
                                        are<br>negative
                                    </p>
                                </div>
                            </div>
                            {{-- @php
                                    $showStatesCount = 7;
                                    $remainingStates = $usersUnique->count() - $showStatesCount;
                                @endphp
                                <p>
                                    @foreach ($usersUnique->take($showStatesCount) as $user)
                                        <a href="/movers/{{ strtolower($user->pickState->abv) }}" class="states_parent"
                                            rel="nofollow">
                                            <span>
                                                {{ $user->pickState->name }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            </span>
                                        </a>
                                    @endforeach --}}
                            <!-- State Of Operations -->
                            @if ($usersUnique->count() > 0)
                                <div class="mb-3 mb-md-5">
                                    <h2 class=" mb-4">State Of Operations</h2>
                                    @php
                                        $showStatesCount = 7;
                                        $remainingStates = $usersUnique->count() - $showStatesCount;
                                    @endphp
                                    <div class="row g-3 company-states ">
                                        @foreach ($usersUnique->take($showStatesCount) as $user)
                                            <div class="col-6 col-md-4 mt-0 mt-md-2">
                                                <a href="/movers-list/{{ $user->pickState->slug }}" class="states_parent"
                                                    rel="nofollow">
                                                    <span class="state-item"><i class="bi bi-check-circle-fill"></i>
                                                        {{ $user->pickState->name }}
                                                        @if (!$loop->last)
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-6 col-md-4"><span class="state-item"><i
                                                 class="bi bi-check-circle-fill"></i> Maryland</span></div>
                                     <div class="col-6 col-md-4"><span class="state-item"><i
                                                 class="bi bi-check-circle-fill"></i> Louisiana</span></div>
                                     <div class="col-6 col-md-4"><span class="state-item"><i
                                                 class="bi bi-check-circle-fill"></i> Lawa</span></div>
                                     <div class="col-6 col-md-4"><span class="state-item"><i
                                                 class="bi bi-check-circle-fill"></i> New Mexico</span></div>
                                     <div class="col-6 col-md-4"><span class="state-item"><i
                                                 class="bi bi-check-circle-fill"></i> Florida</span></div> --}}
                                    </div>
                                </div>
                            @endif

                            <!-- Company Info -->
                            <div class="mb-3 mb-md-5" id="license-section">
                                <h2 class="mb-2 mb-md-4 ">Company Info</h2>
                                <div class="row g-3 company-info-boxes">
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>Founding Year</p>
                                            <div class="company-info-boxes-2">{{ $company->founding_year ?? 'Not Provided' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>Dot #:</p>
                                            <div class="company-info-boxes-2"><a href="https://safer.fmcsa.dot.gov/query.asp?query_type=queryCarrierSnapshot&query_param=USDOT&query_string={{ $company->us_dot_no }}"
                                                    rel="nofollow"
                                                    target="__blank">{{ $company->us_dot_no ?? 'Not Provided' }}</a></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>FMCSA Rating</p>
                                            <div class="company-info-boxes-2">None</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>Number of truck</p>
                                            <div class="company-info-boxes-2">{{ $company->trucks ?? 'Not Provided' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>MC number</p>
                                            <div class="company-info-boxes-2"><a href="https://safer.fmcsa.dot.gov/query.asp?query_type=queryCarrierSnapshot&query_param=MC_MX&query_string={{ $company->icc_mc_license_no }}"
                                                    rel="nofollow" style="text-decoration:underline;" target="__blank">
                                                    {{ $company->icc_mc_license_no ?? 'Not Provided' }}</a></div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>No deposit required</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>Pay by credit Card</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="info-card">
                                            <p>Ask for special discounts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="company_verified_details mt-2">
                                <p class="mb-0 mt-2">
                                    <strong>Local State License:</strong>
                                    {{ $company->local_license_no ?? 'Not Provided' }}
                                </p>
                            </div> --}}
                            <!-- Services -->
                            @php
                                $services = [
                                    'local_mover' => 'Local Moving',
                                    'long_distance_mover' => 'Long Distance & Interstate Moving',
                                    'residential_moving' => 'Residential Moving',
                                    'commercial_office_moving' => 'Commercial & Office Relocation',
                                    'packing_unpacking_services' => 'Professional Packing Services',
                                    'storage_services' => 'Secure Storage Solutions',
                                    'international_moving' => 'International Moving',
                                    'specialty_moving' => 'Specialty Moving',
                                    'labor_only_moving' => 'Labor-Only Moving',
                                    'truck_rental' => 'Truck Rental',
                                    'containers_moving' => 'Containers Moving',
                                ];

                                // Check if all services are 0
                                $hasService = false;
                                foreach ($services as $field => $label) {
                                    if ($company->$field == 1) {
                                        $hasService = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if (!$hasService)
                            @else
                                <div>
                                    <h2 class="mb-4">Services Offered By {{ $company->company_name }}</h2>

                                    <ul class="list-unstyled company-services">
                                        @foreach ($services as $field => $label)
                                            @if ($company->$field == 1)
                                                <li><i class="bi bi-arrow-right-circle-fill"></i> {{ $label }}</li>
                                            @endif
                                        @endforeach
                                    </ul>


                                </div>
                            @endif
                        </section>

                        <div class="licenses_section pb-3">

                            <!-- BOOKING PROCESS SECTION -->
                            <section class="stm-process-section">
                                <h2 class="stm-process-title  mb-3">How Can You Book Your Move with
                                    {{ $company->company_name }}?</h2>
                                <p class="stm-process-subtext">
                                    If you are planning to book {{ $company->company_name }}, here’s how you can do that :
                                </p>

                                <div class="row g-3">
                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Explore the Profile</h3>
                                            <p>View {{ $company->company_name }}’s verified details, services, and customer
                                                reviews to understand their expertise.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Share Your Move Details</h3>
                                            <p>Use the <b>“Contact Movers”</b> form to enter your moving details and type of
                                                move.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Receive a Free Estimate</h3>
                                            <p>{{ $company->company_name }} reviews your request and provides a clear,
                                                upfront estimate according to your needs.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Discuss and Finalize</h3>
                                            <p>A moving coordinator connects with you to confirm services and finalize the
                                                moving plan.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Confirm Your Booking</h3>
                                            <p>Approve the quote and confirm your move schedule directly with
                                                {{ $company->company_name }}.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="stm-process-card">
                                            <h3>Enjoy a Smooth Move</h3>
                                            <p>On moving day, {{ $company->company_name }}’s crew handles everything
                                                professionally.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Section 1 -->
                            <section class="stm-section">
                                <h2 class="stm-heading">Average Moving Cost of {{ $company->company_name }}</h2>
                                <ul class="stm-list">
                                    <li>Based on {{ $total_reviews }} verified customer reviews who moved both locally
                                        and long-distance, we found that the average moving cost of
                                        {{ $company->company_name }} is
                                        around <b>${{ round($avg_cost, 1) }}</b>.</li>
                                    <li>This average gives you a realistic idea of what people usually pay when hiring
                                        {{ $company->company_name }} for their move. In many cases, their long-distance
                                        pricing tends
                                        to come in below the market average.</li>
                                    <li>The <span class="stm-highlight">Average interstate move</span> of a 3-bedroom
                                        household is around <span class="stm-highlight">$4,800</span>.</li>
                                </ul>
                                <p class="mt-2">
                                    <b>Important:</b> These cost estimates come directly from customer review data, not
                                    from {{ $company->company_name }} itself. Your actual quote may differ depending on
                                    your move’s
                                    size, distance, timing, and any additional services like packing or storage
                                </p>
                            </section>

                            <!-- Section 2 -->
                            <section class="stm-section">
                                <div class="stm-alert-box mt-3">
                                    For the most accurate pricing, it’s always best to request a personalized quote
                                    using our <a href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost
                                            calculator</b></a> and compare it.
                                </div>
                            </section>
                            {{-- <div class="col-lg-12 mx-auto mt-lg-0 mt-3">
                                <div id="compare_card">
                                    <div class="row justify-content-center">
                                        <h2 class="mb-4 form_heading text-center">
                                            Compare Movers
                                        </h2>
                                        <div class="col-6">
                                            <div class="text-center p-3"
                                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                                <div class="img_wrapp">
                                                    <img id="mover1_img" src="{{ asset('assets/img/mmj-favicon.png') }}"
                                                        alt="Mover 1" class="img-fluid">
                                                </div>
                                                <div class="mt-3">
                                                    <select id="mover1" class="form-select select2-dropdown">
                                                        <option selected disabled>Choose Mover</option>
                                                        @php
                                                            $imageUrl = $company->image
                                                                ? (str_starts_with($company->image, 'companies/image/')
                                                                    ? URL::to('/' . $company->image)
                                                                    : URL::to('/companies/image/' . $company->image))
                                                                : asset('img/samplelogo.webp');
                                                        @endphp
                                                        <option value="{{ $company->id }}" selected
                                                            data-img="{{ $imageUrl }}"
                                                            data-name="{{ $company->company_name }}"
                                                            data-rating="{{ round($avg_rating, 1) }}"
                                                            data-average-price="${{ round($avg_cost, 1) }}"
                                                            data-slug="{{ $company->slug }}"
                                                            data-usdot="{{ $company->us_dot_no ?? 'N/A' }}"
                                                            data-icc-number="{{ $company->icc_mc_license_no ?? 'N/A' }}"
                                                            data-total-reviews="{{ $total_reviews }}">
                                                            {{ $company->company_name }} (Current Company)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center p-3"
                                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                                <div class="img_wrapp">
                                                    <img id="mover2_img" src="{{ asset('assets/img/mmj-favicon.png') }}"
                                                        alt="Mover 2" class="img-fluid">
                                                </div>
                                                <div class="mt-3">
                                                    <select id="mover2" class="form-select select2-dropdown">
                                                        <option selected disabled>Choose Mover</option>
                                                        @foreach ($comparison_companies as $mover)
                                                            @if ($mover->average_rating && $mover->average_rating > 0)
                                                                @php
                                                                    $imageUrl = $mover->image
                                                                        ? (str_starts_with(
                                                                            $mover->image,
                                                                            'companies/image/',
                                                                        )
                                                                            ? URL::to('/' . $mover->image)
                                                                            : URL::to(
                                                                                '/companies/image/' . $mover->image,
                                                                            ))
                                                                        : asset('img/samplelogo.webp');
                                                                @endphp
                                                                <option value="{{ $mover->id }}"
                                                                    data-img="{{ $imageUrl }}"
                                                                    data-name="{{ $mover->company_name }}"
                                                                    data-rating="{{ round($mover->average_rating, 1) }}"
                                                                    data-average-price="${{ number_format($mover->average_price, 2) }}"
                                                                    data-slug="{{ $mover->slug }}"
                                                                    data-usdot="{{ $mover->us_dot_no ?? 'N/A' }}"
                                                                    data-icc-number="{{ $mover->icc_mc_license_no ?? 'N/A' }}"
                                                                    data-total-reviews="{{ $mover->total_reviews ?? '0' }}">
                                                                    {{ $mover->company_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="comparisonResults" class="row justify-content-center mt-4"
                                    style="display: none; position: relative;">
                                    <div class="col-lg-12 mx-auto" style="position: relative;">
                                        <div id="comparisonLoader"
                                            style="position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; bottom: 0 !important; width: 100vw !important; height: 100vh !important; background-color: #11608799 !important; z-index: 999999 !important; display: none !important; justify-content: center !important; align-items: center !important; margin: 0 !important; padding: 0 !important; overflow: hidden !important;">
                                            <div class="text-center"
                                                style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); padding: 50px 40px; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.4); border: 3px solid rgba(255,255,255,0.8); position: relative; transform: translate(0%, 0%); max-width: 90vw; max-height: 90vh;">
                                                <div class="spinner-border"
                                                    style="color: var(--bg); width:5rem; height:5rem; animation: spinner-border 0.75s linear infinite;"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <h4 class="mt-4 mb-3"
                                                    style="font-size: 1.3rem; color: #333; font-weight: 600; letter-spacing: 0.5px;">
                                                    Fetching
                                                    comparison...</h4>
                                                <p class="text-muted mb-0" style="font-size: 1rem; color: #666;">Please
                                                    wait while we prepare
                                                    your comparison</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mx-auto" id="comparisonContent" style="display:none;">
                                            <div class="row mx-auto justify-content-lg-center comparison-cards-container">
                                                <div class="col-md-5 col-lg-5 mb-4">
                                                    <div class="comparison-card">
                                                        <div class="company-header">
                                                            <img id="result_mover1_img" class="company-logo"
                                                                src="" alt="Mover 1">
                                                            <ul class="list-unstyled company-details">
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Company Name:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <span id="result_mover1_name"></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Rating:
                                                                        </div>
                                                                        <div
                                                                            class="col-8 d-flex justify-content-center align-items-center">
                                                                            <div id="result_mover1_rating"
                                                                                class="rating-stars"></div>
                                                                            <span id="result_mover1_rating_value"
                                                                                class="rating-value ms-2"></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Total Reviews:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover1_reviews"
                                                                                class="review-count"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Average Price:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover1_price"
                                                                                class="price-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            US DOT:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover1_dot"
                                                                                class="detail-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            ICC MC NUMBER:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover1_mc"
                                                                                class="detail-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <button class="btn-get-quote" onclick="getQuote(1)">
                                                            Get Quote →
                                                        </button>
                                                        <button class="btn-learn-more" onclick="learnMore(1)">
                                                            Learn More ▲
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-4">
                                                    <div class="comparison-card">
                                                        <div class="company-header">
                                                            <img id="result_mover2_img" class="company-logo"
                                                                src="" alt="Mover 2">

                                                            <ul class="list-unstyled company-details">
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Company Name:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <span id="result_mover2_name"></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Rating:
                                                                        </div>
                                                                        <div
                                                                            class="col-8 d-flex justify-content-center align-items-center">
                                                                            <div id="result_mover2_rating"
                                                                                class="rating-stars"></div>
                                                                            <span id="result_mover2_rating_value"
                                                                                class="rating-value ms-2"></span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Total Reviews:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover2_reviews"
                                                                                class="review-count"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            Average Price:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover2_price"
                                                                                class="price-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            US DOT:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover2_dot"
                                                                                class="detail-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            ICC MC NUMBER:
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <div id="result_mover2_mc"
                                                                                class="detail-value"></div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                            </ul>


                                                        </div>
                                                        <button class="btn-get-quote" onclick="getQuote(2)">
                                                            Get Quote →
                                                        </button>
                                                        <button class="btn-learn-more" onclick="learnMore(2)">
                                                            Learn More ▲
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="faq-section">
                                <h2>Frequently Asked Questions</h2>

                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                                How do I contact {{ $company->company_name }} through this profile page?
                                            </button>
                                        </h3>
                                        <div id="collapseOne" class="accordion-collapse collapse"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                You can reach {{ $company->company_name }} directly from this page by
                                                using
                                                the contact
                                                form or phone number listed in their profile. You can also request a free
                                                moving quote to start planning your relocation right away.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                                Where can I see the moving services offered by
                                                {{ $company->company_name }}?
                                            </button>
                                        </h3>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                Each moving company lists its specific services in the “Services Offered”
                                                section of their profile. You can explore that section to learn exactly what
                                                {{ $company->company_name }} provides.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                                Are the prices shown on this profile final?
                                            </button>
                                        </h3>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                No. The prices shown are average estimates gathered from customer reviews.
                                                Your final quote from {{ $company->company_name }} may differ based on
                                                factors like
                                                distance, move size, season, and extra services.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                                Can I read reviews from previous customers of
                                                {{ $company->company_name }}?
                                            </button>
                                        </h3>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                Yes. Scroll down on this profile page to see verified reviews and ratings
                                                from real customers who have used {{ $company->company_name }} for their
                                                moves. These
                                                reviews can help you understand their service quality and reliability.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h3 class="accordion-header m-0" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                                Does {{ $company->company_name }} operate in other locations or states?
                                            </button>
                                        </h3>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                {{ $company->company_name }} may have multiple service locations depending
                                                on their
                                                coverage area. Check the Service Areas section of this profile to see if
                                                they provide moving services to other locations.
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
    </section>
    {{-- @if ($company_faq->count() > 0)
        <section class="py-5" id="faq">
            <div class="container">
                <h2 class="fs-2 mb-3 text-center" id="page">FAQs</h2>
                <div class="accordion" id="accordionExample">
                    @foreach ($company_faq as $faq)
                        @php
                            $collapseId = 'collapse' . $loop->iteration;
                            $headingId = 'heading' . $loop->iteration;
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header m-0" id="{{ $headingId }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $collapseId }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="{{ $collapseId }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="{{ $collapseId }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                aria-labelledby="{{ $headingId }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}


    {{-- @if ($company_faq->count() > 0)

        <section class="py-5" id="faq">

            <h2 class="fs-2 mb-3 text-center" id="page">FAQs</h2>
            <div class="container" style="padding-inline: 0px !important;">
                <div class="row">
                    <div class="col-12 ">
                        @foreach ($company_faq as $faq)
                            <div class="py-2">
                                <button class="accordion ">{{ $faq->question }}</button>
                                <div class="panel">
                                    <p class="fs-6 py-2">{{ $faq->answer }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif --}}
    <section class="modal_box_section">
        <div class="modal_box">
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 ">
                            <div class="modal-title text-capitalize fs-4" id="exampleModalLabel">contact
                                {{ $company->company_name }}
</div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <a href="tel:{{ $company->phone_no }}">
                                <i class="fa-solid fa-phone-flip me-2"></i>Call Number
                            </a>
                            <a href="#ModalForm" data-bs-toggle="modal" class="mt-3">
                                <i class="fa-solid fa-envelope me-2"></i> Get A Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal_box">
            <div class="modal fade" id="websiteModal" tabindex="-1" aria-labelledby="websiteModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 ">
                            <div class="modal-title text-capitalize fs-4" id="exampleModalLabel">contact
                                {{ $company->company_name }}
</div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <a href="{{ $company->company_website }}" target="_blank" rel="nofollow">
                                <i class="fa-solid fa-globe me-2"></i>Go to Website
                            </a>
                            <a href="#ModalForm" data-bs-toggle="modal" class="mt-3">
                                <i class="fa-solid fa-envelope me-2"></i> Get A Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    </div>

    </div>

    </section>
    <!-- Start Footer Area -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 on both dropdowns
            $('#mover1, #mover2').select2({
                placeholder: 'Select a mover',
                allowClear: true,
                width: '100%'
            });

            // Set the current company logo in mover1_img on page load
            const mover1Select = document.getElementById('mover1');
            const selectedOption = mover1Select.options[mover1Select.selectedIndex];
            if (selectedOption && selectedOption.value) {
                const imgSrc = selectedOption.getAttribute('data-img');
                if (imgSrc) {
                    $('#mover1_img').attr('src', imgSrc);
                }
            }

            // Update logo when mover is selected - WITHOUT triggering comparison
            $('#mover1').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                if (selectedOption.length > 0 && selectedOption.val() !== 'Choose Mover') {
                    const imgSrc = selectedOption.data('img');
                    $('#mover1_img').attr('src', imgSrc);
                } else {
                    // Reset to default if no selection
                    $('#mover1_img').attr('src', '{{ asset('assets/img/mmj-favicon.png') }}');
                }
                // Don't trigger comparison for first mover
            });

            $('#mover2').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                if (selectedOption.length > 0 && selectedOption.val() !== 'Choose Mover') {
                    const imgSrc = selectedOption.data('img');
                    $('#mover2_img').attr('src', imgSrc);

                    // Only trigger comparison when second mover is selected AND first mover is already selected
                    const mover1 = document.getElementById("mover1").value;
                    if (mover1) {
                        showComparison(mover1, selectedOption.val());
                    }
                } else {
                    // Reset to default if no selection
                    $('#mover2_img').attr('src', '{{ asset('assets/img/mmj-favicon.png') }}');
                    // Hide comparison if second mover is deselected
                    document.getElementById("comparisonResults").style.display = "none";
                }
            });
        });

        function showComparison(mover1, mover2) {
            console.log('showComparison called with:', mover1, mover2);

            // Show comparison results section
            document.getElementById("comparisonResults").style.display = "block";

            // Show loader and hide content initially
            document.getElementById("comparisonLoader").style.display = "flex";
            document.getElementById("comparisonContent").style.display = "none";

            // Use setTimeout to simulate loading and ensure smooth UX
            setTimeout(() => {
                try {
                    // Get data from selected options
                    const mover1Option = document.querySelector(`#mover1 option[value="${mover1}"]`);
                    const mover2Option = document.querySelector(`#mover2 option[value="${mover2}"]`);

                    console.log('Found options:', mover1Option, mover2Option);

                    // Fill mover 1 card
                    if (mover1Option) {
                        // Basic Info
                        document.getElementById("result_mover1_name").innerText = mover1Option.getAttribute(
                            'data-name');
                        document.getElementById("result_mover1_img").src = mover1Option.getAttribute('data-img');

                        // Rating and Reviews
                        const rating = parseFloat(mover1Option.getAttribute('data-rating'));
                        document.getElementById("result_mover1_rating").innerHTML = generateStarRating(rating);
                        document.getElementById("result_mover1_rating_value").innerText = rating + '/5';

                        const mover1Reviews = mover1Option.getAttribute('data-total-reviews');
                        document.getElementById("result_mover1_reviews").innerText = mover1Reviews + ' Reviews';

                        // Additional Details
                        document.getElementById("result_mover1_price").innerText = mover1Option.getAttribute(
                            'data-average-price');
                        document.getElementById("result_mover1_dot").innerText = mover1Option.getAttribute(
                            'data-usdot');
                        document.getElementById("result_mover1_mc").innerText = mover1Option.getAttribute(
                            'data-icc-number');
                    }

                    // Fill mover 2 card
                    if (mover2Option) {
                        // Basic Info
                        document.getElementById("result_mover2_name").innerText = mover2Option.getAttribute(
                            'data-name');
                        document.getElementById("result_mover2_img").src = mover2Option.getAttribute('data-img');

                        // Rating and Reviews
                        const rating2 = parseFloat(mover2Option.getAttribute('data-rating'));
                        document.getElementById("result_mover2_rating").innerHTML = generateStarRating(rating2);
                        document.getElementById("result_mover2_rating_value").innerText = rating2 + '/5';

                        const mover2Reviews = mover2Option.getAttribute('data-total-reviews');
                        document.getElementById("result_mover2_reviews").innerText = mover2Reviews + ' Reviews';

                        // Additional Details
                        document.getElementById("result_mover2_price").innerText = mover2Option.getAttribute(
                            'data-average-price');
                        document.getElementById("result_mover2_dot").innerText = mover2Option.getAttribute(
                            'data-usdot');
                        document.getElementById("result_mover2_mc").innerText = mover2Option.getAttribute(
                            'data-icc-number');
                    }

                    // Hide loader and show content after data is populated
                    document.getElementById("comparisonLoader").style.display = "none";
                    document.getElementById("comparisonContent").style.display = "block";

                } catch (error) {
                    console.error("Error in comparison:", error);
                    alert("An error occurred while loading comparison. Please try again.");
                    document.getElementById("comparisonLoader").style.display = "none";
                    document.getElementById("comparisonContent").style.display = "none";
                }
            }, 800); // 800ms delay to show loading effect
        }

        // Function to generate star rating HTML
        function generateStarRating(rating) {
            const maxStars = 5;
            const filledStars = Math.floor(rating);
            let starsHTML = '';

            // Add filled stars
            for (let i = 0; i < filledStars; i++) {
                starsHTML += '<i class="fas fa-star" style="color: #E3780D;"></i>';
            }

            // Add half star if needed
            if (rating % 1 !== 0) {
                starsHTML += '<i class="fas fa-star-half-alt" style="color: #E3780D;"></i>';
            }

            // Add empty stars
            const emptyStars = maxStars - filledStars - (rating % 1 !== 0 ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                starsHTML += '<i class="far fa-star" style="color: #ddd;"></i>';
            }

            return starsHTML;
        }

        // Get quote function
        function getQuote(moverNumber) {
            const moverSelect = document.getElementById(`mover${moverNumber}`);
            const selectedOption = moverSelect.options[moverSelect.selectedIndex];

            if (selectedOption && selectedOption.value) {
                const moverName = selectedOption.getAttribute('data-name');
                const moverSlug = selectedOption.getAttribute('data-slug');

                if (moverSlug) {
                    // Redirect to slug-based quote page
                    window.open(`/contact-mover/${moverSlug}`, '_blank');
                } else {
                    alert(`Please select a mover first to get a quote for ${moverName}`);
                }
            } else {
                alert(`Please select a mover first to get a quote`);
            }
        }

        // Learn more function
        function learnMore(moverNumber) {
            const moverSelect = document.getElementById(`mover${moverNumber}`);
            const selectedOption = moverSelect.options[moverSelect.selectedIndex];

            if (selectedOption && selectedOption.value) {
                const moverName = selectedOption.getAttribute('data-name');
                const moverSlug = selectedOption.getAttribute('data-slug');

                if (moverSlug) {
                    // Redirect to slug-based detail page
                    window.open(`/mover/${moverSlug}`, '_blank');
                } else {
                    alert(`Please select a mover first to learn more about ${moverName}`);
                }
            } else {
                alert(`Please select a mover first to learn more`);
            }
        }
    </script>
    <script type="application/ld+json">
    {
          "@context": "http://schema.org",
          "@type": "WebPage",
          "name": "@if ($total_reviews)
                    @if ($company->meta_title != '')
                        @if ($total_reviews > 1)
                            {{ $total_reviews }} Reviews For {{ $company->meta_title }}
                        @else
                            {{ $total_reviews }} Review For {{ $company->meta_title }}
                        @endif
                    @else
                        @if ($total_reviews > 1)
                            {{ $total_reviews }} Reviews For {{ $company->company_name }}
                        @else
                            {{ $total_reviews }} Review For {{ $company->company_name }}
                        @endif
                    @endif
                  @else
                    {{ $company->company_name }}
                  @endif",
          "url": "{{ url()->current() }}",
          "dateModified": "{{ \Carbon\Carbon::parse($company->updated_at)->format('Y-m-d') }}",
          "description": "@if ($company->meta_description != '')
                            {{ $company->meta_description }}
                         @else
                            See reviews up to January 2023 from previous customers of {{ $company->company_name }}. Compare moving companies and get a free estimate.
                        @endif
                        "
        }
</script>

    <script type="application/ld+json">
    {
            "@context": "http://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement":
            [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item":
                    {
                        "@id": "/",
                        "name": "Home"
                    }
                },
                                    {
                    "@type": "ListItem",
                    "position": 2,
                    "item":
                    {
                        "@id": "/movers",
                        "name": "Movers in USA"
                    }
                },                                        {
                    "@type": "ListItem",
                    "position": 3,
                    "item":
                    {
                        "@id": "{{url()->current()}}",
                        "name": "{{$company->company_name}}"
                    }
                }                                   ]
        }
</script>
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

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "My Moving Journey",
        "url": "https://www.mymovinjourney.com",

          "publisher": {
            "@type": "Organization",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/img/logo.png') }}"
            }
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://mymovingjourney.com/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>

    <script type="application/ld+json">
    {
            "@context": "http://schema.org",
            "@type": "MovingCompany",
            "name": "{{$company->company_name}}",
                    "telephone": "{{$company->phone_no}}",
                    "url": "{{url()->current()}}",
            "logo": "{{ URL::to('/companies/image/' . $company->image) }}",
            "image": "{{ URL::to('/companies/image/' . $company->image) }}",
                    "priceRange" : "${{$min_price}} - ${{$max_price}}",
                    "description": "@if ($company->meta_description != '')
                    {{ $company->meta_description }}
                 @else
                    See reviews up to January 2023 from previous customers of {{ $company->company_name }}. Compare moving companies and get a free estimate.
                @endif",
                    "email": "{{$company->company_email}}",

            "contactPoint":[ {
                "@type": "ContactPoint",
                            "telephone": "{{$company->phone_no}}",
                            "contactType": "Customer service",
                            "email": "{{$company->company_email}}",
                            "url": "{{url()->current()}}"
            }],
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "{{$company->city->name}}",
                "addressRegion": "{{$company->state->abv}}",
                "postalCode": "{{$company->city->zip_code}}",
                "streetAddress": "{{$company->street}}"
            }
            @if($reviews->count() > 0)
            ,
            "aggregateRating": {
                "@type": "AggregateRating",
                "bestRating": "{{$max_rating}}",
                "worstRating": "{{$min_rating}}",
                "reviewCount": "{{ $total_reviews }}",
                "ratingValue": "{{$avg_rating}}"
            }

            ,
            "review": [
                @foreach($reviews as $review)
                {
                    "@type": "Review",
                    "author": {
                        "@type":"Person",
                        "name":"{{$review->name}}"
                    },
                    "datePublished": "{{ \Carbon\Carbon::parse($review->created_at)->format('Y-m-d') }}",
                    "name": "{{$review->review_subject}}",
                    "description": "{{$review->your_review}}",
                    "reviewRating": {
                        "@type": "Rating",
                        "bestRating": "{{$max_rating}}",
                        "worstRating": "{{$min_rating}}",
                        "ratingValue": "{{$review->overall_rating}}"
                    }
                }
                @if(!$loop->last)
                ,
                @endif
                @endforeach
            ]
                @endif

        }
</script>
    @if ($reviews->count() > 0)
        <script type="application/ld+json" id="product-schema">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "brand":
                {
                    "@type": "Brand",
                    "name": "{{ $company->company_name }}"
                },
                "image": "{{ URL::to($company->logo) }}",
                "name": "{{ $company->company_name }}",
                "description": "See what people say about {{ $company->company_name }}. Get honest reviews and ratings from real clients. Compare movers
                and claim your free moving quote.",
                "review":
                {
                    "@type": "Review",
                    "reviewRating":
                    {
                        "@type": "Rating",
                        "ratingValue": "{{round($avg_rating,1)}}",
                        "bestRating": {{$max_rating}},
                        "worstRating": "{{$min_rating}}"
                    },
                    "author":
                    {
                        "@type": "Person",
                        "name": "{{ $reviews->first()->name }}"
                    }
                }
            }
        </script>
    @endif

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How do I contact {{ $company->company_name }} through this profile page?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can reach {{ $company->company_name }} directly from this page by using the contact form or phone number listed in their profile. You can also request a free moving quote to start planning your relocation right away."
          }
        },
        {
          "@type": "Question",
          "name": "Where can I see the moving services offered by {{ $company->company_name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Each moving company lists its specific services in the “Services Offered” section of their profile. You can explore that section to learn exactly what {{ $company->company_name }} provides."
          }
        },
        {
          "@type": "Question",
          "name": "Are the prices shown on this profile final?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. The prices shown are average estimates gathered from customer reviews. Your final quote from {{ $company->company_name }} may differ based on factors like distance, move size, season, and extra services."
          }
        },
        {
          "@type": "Question",
          "name": "Can I read reviews from previous customers of {{ $company->company_name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Scroll down on this profile page to see verified reviews and ratings from real customers who have used {{ $company->company_name }} for their moves. These reviews can help you understand their service quality and reliability."
          }
        },
        {
          "@type": "Question",
          "name": "Does {{ $company->company_name }} operate in other locations or states?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "{{ $company->company_name }} may have multiple service locations depending on their coverage area. Check the Service Areas section of this profile to see if they provide moving services to other locations."
          }
        }
      ]
    }
    </script>
  
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    {{-- <script>
        var path = "{{ route('autocomplete') }}";
        $(".zipfromsearch").autocomplete({
            source: function(request, response) {
                if (request.term.length >= 2) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                let zipFormatted = item.value.toString().padStart(5,
                                    '0');
                                return {
                                    label: zipFormatted + ' - ' + item.name,
                                    value: zipFormatted,
                                    city: item.name,
                                    id: item.id,
                                    latitude: item.latitude,
                                    longitude: item.longitude
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
        $(".ziptosearch").autocomplete({
            source: function(request, response) {
                if (request.term.length >= 2) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                let zipFormatted = item.value.toString().padStart(5,
                                    '0');
                                return {
                                    label: zipFormatted + ' - ' + item.name,
                                    value: zipFormatted,
                                    city: item.name,
                                    id: item.id,
                                    latitude: item.latitude,
                                    longitude: item.longitude
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
    </script> --}}

    <script>
        $("#compnay_name").css("display", "none");
        $(window).scroll(function() {
            if ($(this).scrollTop() > 400) {
                $('#fixed-other-nav').addClass('fix-now');
                $("#compnay_name").css("display", "block");
            } else {
                $('#fixed-other-nav').removeClass('fix-now');
                $("#compnay_name").css("display", "none");
            }
        });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("nextBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

    <script>
        var ZipNum = document.getElementById("zipfromsearch");
        var ZipNum2 = document.getElementById("ziptosearch");
        if (ZipNum) {
            ZipNum.addEventListener("keyup", function() {
                var MaxNum = ZipNum.value.split('');
                if (MaxNum.length > 5) {
                    ZipNum.value = ZipNum.value.substring(0, 5);
                }
            });
        }
        if (ZipNum2) {
            ZipNum2.addEventListener("keyup", function() {
                var MaxNum = ZipNum2.value.split('');
                if (MaxNum.length > 5) {
                    ZipNum2.value = ZipNum2.value.substring(0, 5);
                }
            });
        }
    </script>

    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });

        // Changes contributed by @diego-rzg
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>

    <script>
        function copyClipFunc() {
            var copyText = document.getElementById("link-of-input");
            var msgdiv = document.getElementById("msg-div");

            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            navigator.clipboard.writeText(copyText.value).then(() => {
                    msgdiv.classList.remove("d-none")
                    msgdiv.classList.add("d-block")
                })
                .catch(err => {
                    msgdiv.classList.remove("d-block")
                    msgdiv.classList.add("d-none")
                });
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
    <script>
        $("#date").flatpickr({
            dateFormat: "d-m-Y"
        });
    </script>

    <script>
        var div1 = $("#offcanvasBottom")
        var div2 = $("#offcanvas-div2")
        var btn1 = $("#btn-canvas-Form")
        var div3 = $(".offcanvas-body")
        if (window.screen.width > 1200) {
            div1.removeClass("offcanvas offcanvas-bottom");
            div2.addClass("d-none");
            btn1.addClass("d-none");
        } else {
            div1.addClass("offcanvas offcanvas-bottom visible w-100");
            div2.removeClass("d-none");
            btn1.removeClass("d-none");
        }
        $(window).resize(function() {
            if (window.screen.width > 1200) {
                div1.removeClass("offcanvas offcanvas-bottom");
                div2.addClass("d-none");
                btn1.addClass("d-none");
            } else {
                div1.addClass("offcanvas offcanvas-bottom visible w-100");
                div2.removeClass("d-none");
                btn1.removeClass("d-none");
            }
        });
    </script>

    <script>
        function CharacterCount1(object) {
            document.getElementById("charCountVal1").innerHTML = object.value.length + ' characters (min:100)';
        }
    </script>
    <script>
        let itemsToShow = 2;
        let increment = 4;
        let parent = document.querySelector('.states_parent');
        let placeComments = document.querySelectorAll('.states_child');
        let loadMoreBtn = document.getElementById('show_read_more');

        function displayItems() {
            for (let i = 0; i < itemsToShow && i < placeComments.length; i++) {
                console.log(placeComments[i])
                placeComments[i].style.display = 'inline'; // Display the items
            }

            loadMoreBtn.style.display = itemsToShow < placeComments.length ? 'block' : 'none';
        }

        function loadMore() {
            itemsToShow += increment;

            // Display the additional items
            displayItems();
        }

        loadMoreBtn.addEventListener('click', loadMore);

        // Initially display the first set of items
        displayItems();
    </script>
    <script>
        class ScrollFuncTwo {

            scrollToDiv(anchor_id, div_id) {
                $(`#${anchor_id}`).click(function() {
                    // Define the padding value (in pixels) from the top
                    var paddingTop = 300; // Adjust this value according to your needs

                    // Scroll to the target div with animation, considering the padding from the top
                    $('html, body').animate({
                        scrollTop: $(`#${div_id}`).offset().top - paddingTop
                    }, 500); // You can adjust the animation duration (in milliseconds) as needed
                });
            }
        }

        let review_link2 = new ScrollFuncTwo();
        let info_link2 = new ScrollFuncTwo();
        let faq_link2 = new ScrollFuncTwo();
        let license_section = new ScrollFuncTwo();
        review_link2.scrollToDiv('review_link2', 'reviews')
        info_link2.scrollToDiv('info_link2', 'info')
        faq_link2.scrollToDiv('faq_link2', 'faq')
        license_section.scrollToDiv('license_anchor', 'license-section')


        class ScrollFunc {

            scrollToDiv(anchor_id, div_id) {
                $(`#${anchor_id}`).click(function() {
                    var paddingTop = 150;

                    $('html, body').animate({
                        scrollTop: $(`#${div_id}`).offset().top - paddingTop
                    }, 500);
                });
            }
        }



        let review_link = new ScrollFunc();
        let info_link = new ScrollFunc();
        let faq_link = new ScrollFunc();
        let license_link = new ScrollFunc();

        review_link.scrollToDiv('review_link', 'reviews');
        review_link.scrollToDiv('info_link', 'info');
        review_link.scrollToDiv('faq_link', 'faq');
        license_link.scrollToDiv('license_anchor2', 'license-section')
        window.addEventListener('scroll', (e) => {
            if (window.scrollY > 800) {
                document.getElementById('sticky_navigate').style.display = 'block';
                document.getElementById('main_navigate').style.display = 'none';
            } else {
                document.getElementById('sticky_navigate').style.display = 'none';
                document.getElementById('main_navigate').style.display = 'block';

            }

        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const readMoreLinks = document.querySelectorAll(".read-more-link");
            const fullReviews = document.querySelectorAll(".full-review");

            readMoreLinks.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const reviewContent = link.closest(".user_feedback").querySelector(
                        ".review-content");
                    const fullReview = link.closest(".user_feedback").querySelector(".full-review");

                    if (reviewContent.style.display === "none") {
                        reviewContent.style.display = "inline";
                        fullReview.style.display = "none";
                        link.innerText = "Read More";
                    } else {
                        reviewContent.style.display = "none";
                        fullReview.style.display = "inline";
                        link.innerText = "Read Less";
                    }
                });
            });
        });
    </script>
    <script>
        function copyText(element) {
            let text = element.value;
            navigator.clipboard.writeText(text);

            let copyMessage = element
                .nextElementSibling; // Get the next sibling element (the span with class "copy_message")
            copyMessage.style.display = 'block';

            // Trigger the smooth transition by adding a CSS class
            copyMessage.classList.add('show-message');

            setTimeout(() => {
                // Hide the message and remove the CSS class after the transition duration (e.g., 1 second)
                copyMessage.style.display = 'none';
                copyMessage.classList.remove('show-message');
            }, 1000);
        }
    </script>
    <script>
        // "Read More" لنک کلک ہونے پر مکمل ریویو دکھائیں
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.read-more-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var parent = e.target.closest('.user_feedback');
                    parent.querySelector('.full-review').style.display = 'inline';
                    parent.querySelector('.read-more-toggle').style.display = 'none';
                });
            });
        });

        function copyText(inputElement) {
            inputElement.select();
            inputElement.setSelectionRange(0, 99999);
            document.execCommand('copy');
            var messageEl = inputElement.parentNode.querySelector('.copy_message');
            if (messageEl) {
                messageEl.style.display = 'inline';
                setTimeout(function() {
                    messageEl.style.display = 'none';
                }, 1500);
            }
        }
    </script>

    <!-- Google Maps API is loaded globally in the layout with libraries=places (no duplicate load here) -->

    {{-- <script>
        function initMap() {
            // --- Build address from Blade variables ---
            const city = `{{ $company->city->name ?? '' }}`.trim();
            const state = `{{ $company->state->abv ?? '' }}`.trim();
            const zip = `{{ $company->city->zip_code ?? '' }}`.trim();
            const address = [city, state, zip].filter(Boolean).join(', ');

            if (!address) {
                console.warn('No address available to geocode.');
                return;
            }

            // --- Initialize the map with your custom styling ---
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: {
                    lat: 27.5,
                    lng: -81
                }, // temporary center before geocode result
                disableDefaultUI: true,
                gestureHandling: "none",
                draggable: false,
                scrollwheel: false,
                keyboardShortcuts: false,
                clickableIcons: false,
                styles: [{
                        elementType: 'geometry',
                        stylers: [{
                            color: '#d0e8d0'
                        }]
                    }, // light green land
                    {
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#333333'
                        }]
                    }, // dark text
                    {
                        featureType: 'water',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#a0c8f0'
                        }]
                    }, // light blue water
                    {
                        featureType: 'road',
                        elementType: 'geometry',
                        stylers: [{
                            color: '#3a6ccf'
                        }]
                    }, // blue roads
                    {
                        featureType: 'road',
                        elementType: 'labels.text.fill',
                        stylers: [{
                            color: '#2b3a5b'
                        }]
                    } // road labels
                ]
            });

            // --- Geocode the address ---
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                address
            }, (results, status) => {
                if (status === "OK" && results && results[0]) {
                    const loc = results[0].geometry.location;

                    // --- Custom pinpoint icon (SVG) ---
                    const pinColor = "#2a4fd7"; // matches your blue
                    const pinSvg = `
                    <svg width="46" height="46" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23 2C14.163 2 7 9.163 7 18c0 10.5 16 26 16 26s16-15.5 16-26C39 9.163 31.837 2 23 2z" fill="${pinColor}"/>
                      <circle cx="23" cy="18" r="6" fill="#ffffff"/>
                    </svg>
                  `;
                    const icon = {
                        url: "data:image/svg+xml;charset=UTF-8," + encodeURIComponent(pinSvg),
                        scaledSize: new google.maps.Size(40, 40),
                        anchor: new google.maps.Point(20, 40) // tip of the pin
                    };

                    // --- Drop the marker ---
                    new google.maps.Marker({
                        position: loc,
                        map,
                        title: address,
                        icon,
                        animation: google.maps.Animation.DROP
                    });

                    // --- Fit/center nicely ---
                    const viewport = results[0].geometry.viewport;
                    if (viewport) {
                        map.fitBounds(viewport);
                    } else {
                        map.setCenter(loc);
                        map.setZoom(14);
                    }
                } else {
                    console.warn("Geocode failed:", status, address);
                }
            });
        }
    </script> --}}

@endsection
