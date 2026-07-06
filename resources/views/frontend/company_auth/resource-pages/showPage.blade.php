@extends('layouts.app')
@section('title')
    {{ $resourcePage->meta_title }}
@endsection
@section('meta_description')
    {{ $resourcePage->meta_description }}
@endsection
@section('meta_keywords')
    {{ $resourcePage->title }}
@endsection
@section('head')
    <meta name="robots" content="index, follow">
@endsection
@section('og:title')
    {{ $resourcePage->meta_title }}
@endsection
@section('og:description')
    {{ $resourcePage->meta_description }}
@endsection
{{-- @section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection --}}
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/resource_page.css') }}" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/resource_page.css') }}">
    </noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        html {
            scroll-behavior: smooth;
        }
.heading_name{
        font-family: var(--family);
    font-weight: 700;
    color: #1e1a1a;
    font-size: 28px;
}
        .anchor-offset {
            position: relative;
            top: -100px;
            /* Adjust this value to the desired space */
            visibility: hidden;
        }

        .header_logo {
            max-width: 130px;
            position: relative;
            background-color: #fff;
            border-radius: 10px;
            /* box-shadow: 1px 1px 4px #0000002b; */
            padding: 10px;
            height: 94px;
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .header_logo img {
            width: 100%;
            object-fit: contain;
            height: 100%;
        }

        .accordion-flush .accordion-item .accordion-button {
            border-radius: 12px !important;
            background: #f9fbfc;
            color: #1e1a1a;
            font-family: var(--para-family);
            letter-spacing: 0.4px;
            font-size: 18px;
            border: 1px solid #8db3c6;
            font-weight: 600 !important;
        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #116087;
            outline: 0;
            box-shadow: 0 0 0 0.15rem #116087;
            /* border-radius: 10px !important; */
        }

        .content_div a {
            color: #116087;
            text-underline-offset: 6px;
            font-weight: 700;
            text-decoration: underline;
            text-decoration-color: #116087;
        }

        .resource_top_content h1 {

            font-weight: 800 !important;
        }

        .company-details {
            border-radius: 8px;
            margin: 0;
        }

        .company-details li {
            border-bottom: 1px solid #1160876e;
        }

        .company-details .row {
            padding: 10px 0;
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
            font-size: 18px;
            color: #000;
        }

        .company-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .company-logo {
            /* width: 80px;
                                                                                                                                                                                                                                                height: 80px; */
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
            font-size: 22px !important;
        }

        .rating-value {
            font-weight: 700;
            color: #010101;
            font-size: 26px;
        }

        .review-count {
            color: #000;
            font-size: 18px;
        }

        .price-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .price-value {
            font-size: 1.5rem;
            font-weight: 500;
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
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 400;
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
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 400;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 20px;
        }

        .btn-learn-more:hover {
            background: #116087;
            color: white;
        }

        /* Selection styles */
        .img_wrapp img {
            border-radius: 0%;
            object-fit: cover;
            border: 0px solid #e0e0e0;
            width: 85%;
        }

        /* 4-Company Comparison Styles */
        .comparison-card {
            background: #EBFAFF;
            position: relative;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .comparison-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .remove-company-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--bg);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .remove-company-btn:hover {
            background: #c82333;
        }

        .add-more-btn {
            background: #116087;
            color: white;
            border: 2px solid #116087;
            padding: 10px 30px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            margin: 10px auto;
            display: block;
            width: fit-content;
        }

        .add-more-btn:hover {
            background: white;
            color: #116087;
        }

        .companies-dropdown {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 95vw;
            max-width: 1000px;
            max-height: 400px;
            overflow-y: auto;
            display: none;
            padding: 20px;
        }

        .companies-dropdown.show {
            display: block;
        }

        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .dropdown-company-item {
            display: flex;
            align-items: center;
            padding: 12px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .dropdown-company-item:hover {
            background-color: #e3f2fd;
            border-color: #116087;
            transform: translateY(-2px);
        }

        .dropdown-company-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 12px;
            border: 2px solid #e0e0e0;
        }

        .dropdown-company-name {
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .dropdown-header {
            text-align: center;
            margin-bottom: 20px;
            color: #116087;
            font-weight: 600;
        }

        .buttons-container {
            position: relative;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .companies-dropdown {
                width: 98vw;
                max-height: 300px;
            }

            .companies-grid {
                grid-template-columns: 1fr;
            }

            .dropdown-company-item {
                padding: 10px;
            }
        }
    </style>
    <div class="max_container">
        <section class="hero hero-section my-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-column justify-content-center align-items-start">
                        <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $resourcePage->title }}</li>
                            </ol>
                        </nav>
                        <!-- Main Content -->
                        <h1 class="main-heading">{{ $resourcePage->title }}
                            of
                            {{ date('M, Y') }}
                        </h1>
                        <div class="author-box">
                            <div class="author-info">
                                <img src="{{ asset('assets/img/author_img.png') }}" loading="lazy" alt="Author">
                                <span class="author-label">Author <br>
                                    <span class="author_name"><a href="https://www.linkedin.com/in/honey-jay/"
                                            target="_blank">Honey Jay <i class="fa-brands fa-linkedin"
                                                style="color: var(--bg);"></i></a></span></span>
                            </div>
                            <div class="update-info">
                                <span style="color:#116087;"><i class="fa-regular fa-clock"></i>
                                    Updated :</span> {{ $resourcePage->updated_at->format('d M, Y') }} (7 mins read)
                            </div>
                        </div>
                        <div class="upper_cont mt-sm-5 mt-0">
                            {!! $resourcePage->upper_content !!}
                            {{-- <p>
                                Finding the best long distance moving companies isn’t as easy as typing a few words into
                                Google. Everyone claims to be the best, but who actually delivers? So, after evaluating
                                hundreds of long-distance moving companies, we have narrowed down the top long distance
                                movers you can truly trust.
                            </p>
                            <p>
                                People keep choosing these companies because they turn complicated, cross-state moves into
                                smooth experiences.
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="featured-partners pb-5">
        <div class="container">
            <h2 class="featured-partners-title">Featured Moving Companies</h3>
                <div class="Featured_Partners mt-4">
                    @php
                        $top_movers = $top_movers->sortBy(function ($mover) {
                            return $mover->position == 1 ? 0 : 1;
                        });
                    @endphp
                    <div class="row g-4 justify-content-center">
                        @foreach ($top_movers as $topMover)
                            @php
                                $imageUrl = str_starts_with($topMover->company->image, 'companies/image/')
                                    ? URL::to('/' . $topMover->company->image)
                                    : URL::to('/companies/image/' . $topMover->company->image);
                            @endphp
                            <div class="col-lg-3 col-md-6">
                                <div
                                    class="partner-card 
                                   @if ($topMover->position == 1) active @endif ">

                                    <div class="company_logo">
                                        <img src="{{ $imageUrl }}" alt="{{ $topMover->company->slug }}-logo"
                                            class="img-fluid" loading="lazy">
                                    </div>
                                    <div class="partner-header d-flex align-items-center justify-content-center">
                                        {{-- <div class="partner-rank">{{ $topMover->position }}</div> --}}
                                        <div class="company_name">{{ $topMover->heading }}</div>
                                    </div>
                                    @php
                                        $total_rating = $topMover->company->users->sum(function ($user) {
                                            return (float) $user->overall_rating;
                                        });

                                        $total_reviews = $topMover->company->users->count();

                                        if ($total_reviews > 0) {
                                            $avg_rating = $total_rating / $total_reviews;
                                        } else {
                                            $avg_rating = 0;
                                        }

                                        $rounded = round($avg_rating, 1);
                                    @endphp

                                    <!--<hr class="mt-2">-->
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                        <span class="rating"
                                            style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ round($avg_rating, 1) }}
                                            out of 5</span>
                                    </div>
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                        <ul class="d-flex list-unstyled mb-0 ms-1">
                                            @if ($rounded == 0)
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif ($rounded > 0 && $rounded < 1)
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 1)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 1 && $rounded < 2)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 2)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 2 && $rounded < 3)
                                                <i class="fas fa-star" aria-hidden="true">
                                                </i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 3)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 3 && $rounded < 4)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 4)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 4 && $rounded < 5)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            @elseif($rounded == 5)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                            @endif
                                        </ul>
                                    </div>

                                    <!--<hr>-->
                                    <div class="partner-info">
                                        <p class="d-flex align-items-center"><img
                                                src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                alt="check-mark" loading="lazy" width="13"
                                                height="13"><span>{{ $topMover->point_one ?? 'Free estimates' }}</span>
                                        </p>
                                        <p class="d-flex align-items-center"><img
                                                src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                alt="check-mark" loading="lazy" width="13"
                                                height="13"><span>{{ $topMover->point_two ?? 'Competitive Rates ' }}</span>
                                        </p>
                                        <p class="d-flex align-items-center"><img
                                                src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                alt="check-mark" loading="lazy" width="13"
                                                height="13"><span>{{ $topMover->point_three ?? 'Professional Staff &amp; Honest Pricing' }}</span>
                                        </p>
                                    </div>
                                    <a href="{{ route('company.show', $topMover->company->slug) }}">
                                        <div class="phone-box mb-1 mt-3">
                                            Get Free Estimates
                                        </div>
                                    </a>
                                    {{-- <a href="#" class="estimate"> <i class="fas fa-phone me-2"></i>855-972-4089</a> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </section>
    <div class="max_container">
        <div class="container">
            <div class="info-box">
                <h3 class="text-center">We’re here to make it easy.</h3>
                <p class="text-center">
                    @if (url()->current() == url('resource/best-long-distance-moving-companies'))
                        Every long distance move is personal. Let’s find the mover that makes your move stress-free.
                    @else
                        Every move is personal. Let’s find the mover that makes your move stress-free.
                    @endif
                </p>
                <div class="row">
                    @if (url()->current() == url('resource/best-long-distance-moving-companies'))
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#full-service-movers">Best Full-Service
                                            Long Distance Movers</a></span></li>
                                <li><span class="highlight"><a href="#moving-container-movers">Best Moving Container
                                            Companies</a></span></li>
                                <li><span class="highlight"><a href="#truck-rental-movers">Best Moving Truck Rental
                                            Companies</a></span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#small-load-movers">Best Small Load Movers</a></span>
                                </li>
                                <li><span class="highlight"><a href="#labor-only-movers">Best Labor-Only Moving
                                            Companies</a></span></li>
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-local-moving-companies'))
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#full-service-movers">Best Full-Service Local
                                            Movers</a></span></li>
                                <li><span class="highlight"><a href="#budget-friendly-local-movers">Best Budget-Friendly
                                            Local Movers </a></span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#small-local-movers">Best Small Local
                                            Movers</a></span></li>
                                <li><span class="highlight"><a href="#labor-only-local-movers">Best Labor-Only Local
                                            Movers</a></span></li>
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-packing-and-moving-companies-in-usa'))
                        @php
                            $half = ceil(count($bottom_movers) / 2);
                            $firstHalf = $bottom_movers->slice(0, $half);
                            $secondHalf = $bottom_movers->slice($half);
                        @endphp
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($firstHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->company->company_name }}:
                                                {{ $bottomMover->heading }}</a></span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($secondHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->company->company_name }}:
                                                {{ $bottomMover->heading }}</a></span></li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-commercial-moving-companies'))
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#full-service-movers">Best Commercial
                                            Movers</a></span>
                                </li>
                                <li><span class="highlight"><a href="#corporate-movers">Best Corporate Movers</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#small-business-movers">Best Small Business
                                            Movers</a></span></li>
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-moving-container-companies'))
                        @php
                            $half = ceil(count($bottom_movers) / 2);
                            $firstHalf = $bottom_movers->slice(0, $half);
                            $secondHalf = $bottom_movers->slice($half);
                        @endphp
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($firstHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->heading }} :
                                                {{ $bottomMover->company->company_name }}
                                            </a></span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($secondHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->heading }} :
                                                {{ $bottomMover->company->company_name }}
                                            </a></span></li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-international-moving-companies'))
                        @php
                            $half = ceil(count($bottom_movers) / 2);
                            $firstHalf = $bottom_movers->slice(0, $half);
                            $secondHalf = $bottom_movers->slice($half);
                        @endphp
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($firstHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->company->company_name }}:
                                                {{ $bottomMover->heading }}</a></span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($secondHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->company->company_name }}:
                                                {{ $bottomMover->heading }}</a></span></li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-moving-truck-rental-companies'))
                        @php
                            $half = ceil(count($bottom_movers) / 2);
                            $firstHalf = $bottom_movers->slice(0, $half);
                            $secondHalf = $bottom_movers->slice($half);
                        @endphp
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($firstHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->heading }} :
                                                {{ $bottomMover->company->company_name }}
                                            </a></span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                @foreach ($secondHalf as $bottomMover)
                                    <li><span class="highlight"><a
                                                href="#{{ $bottomMover->company->slug }}">{{ $bottomMover->heading }} :
                                                {{ $bottomMover->company->company_name }}
                                            </a></span></li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-specialty-movers-in-usa'))
                        <div class="col-lg-5">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#full-service-movers">Best Specialty Movers
                                        </a></span>
                                </li>
                                <li><span class="highlight"><a href="#piano-movers">Best Piano Movers </a></span></li>
                            </ul>
                        </div>
                        <div class="col-lg-7">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#vehicle-and-auto-transport-movers">Best Vehicle and
                                            Auto Transport Companies</a></span></li>
                                <li><span class="highlight"><a href="#antique-movers">Best Antique Movers</a></span></li>
                            </ul>
                        </div>
                    @elseif (url()->current() == url('resource/best-self-storage-companies-in-usa'))
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#full-service-movers">Best Overall Self-Storage
                                            Companies</a></span></li>
                                <li><span class="highlight"><a href="#portable-storage-movers">Best Portable Storage
                                            Companies</a></span></li>
                                <li><span class="highlight"><a href="#climate-controlled-storage-movers">Best
                                            Climate-Controlled Storage Companies</a></span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="info-list">
                                <li><span class="highlight"><a href="#budget-self-storage-movers">Best Budget Self-Storage
                                            Options</a></span></li>
                                <li><span class="highlight"><a href="#vehicle-storage-movers">Best Vehicle Storage
                                            Companies</a></span></li>
                                <li><span class="highlight"><a href="#short-term-storage-movers">Best Short-Term Storage
                                            Options</a></span></li>
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="quote-box">
                    <div class="bg_col">
                        <p class="mb-0">
                            Want to know what your move will cost?
                        </p>
                    </div>
                    <a href="https://mymovingjourney.com/moving-cost-calculator">Get Quote</a>

                </div>
            </div>

            <div class="my-5">
                <div class="section-header mt-5">
                    <h2>Our Track Record</h2>
                </div>

                <div class="steps-container">
                    <div class="step_section">
                        <div class="step-number"><img src="{{ asset('assets/img/verified-movers.svg') }}" alt="verified"
                                loading="lazy" style="width: 80px; height:80px"></div>
                        <div class="step-title">500+ Verified Movers</div>
                        <div class="connector">
                            <span class="connector-dot start"></span>
                            <span class="connector-dot end"></span>
                        </div>
                    </div>

                    <div class="step_section">
                        <div class="step-number"><img src="{{ asset('assets/img/cities-covered.svg') }}"
                                alt="cities covered" loading="lazy" style="width: 80px; height:80px">
                        </div>
                        <div class="step-title">3,500+ Cities Covered</div>
                        <div class="connector">
                            <span class="connector-dot start"></span>
                            <span class="connector-dot end"></span>
                        </div>
                    </div>

                    <div class="step_section">
                        <div class="step-number"><img src="{{ asset('assets/img/users-helped.svg') }}"
                                alt="users helped" loading="lazy" style="width: 80px; height:80px">
                        </div>
                        <div class="step-title">1000+ Users Helped</div>
                    </div>
                </div>
            </div>
            <section id="full-service-movers" class="comparesion_section my-4">
                @if ($resourcePage->full_service_content != null)
                    <h2>Best Full-Service
                        @if (url()->current() == url('/resource/best-local-moving-companies'))
                            Local
                        @else
                            Long Distance
                        @endif

                        Movers
                    </h2>
                    {!! $resourcePage->full_service_content !!}
                @endif
                @foreach ($bottom_movers as $bottomMover)
                    @php
                        $total_rating = $bottomMover->company->users->sum(function ($user) {
                            return (float) $user->overall_rating;
                        });

                        $total_reviews = $bottomMover->company->users->count();

                        if ($total_reviews > 0) {
                            $avg_rating = $total_rating / $total_reviews;
                        } else {
                            $avg_rating = 0;
                        }

                        $rounded = round($avg_rating, 1);

                        $imageUrl = str_starts_with($bottomMover->company->image, 'companies/image/')
                            ? URL::to('/' . $bottomMover->company->image)
                            : URL::to('/companies/image/' . $bottomMover->company->image);

                    @endphp
                    <h2 id="{{ $bottomMover->company->slug }}" class="mt-5">{{ $bottomMover->company->company_name }}
                    </h2>
                    <div class="company-card">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="b_logo">
                                    <img src="{{ $imageUrl }}" alt="{{ $bottomMover->company->slug }}-logo"
                                        class= "mb-3" loading="lazy">
                                </div>
                                <div class="rating_wrapper">
                                    <div class="rating">
                                        @if ($rounded == 0)
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif ($rounded > 0 && $rounded < 1)
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded == 1)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded > 1 && $rounded < 2)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded == 2)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded > 2 && $rounded < 3)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded == 3)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded > 3 && $rounded < 4)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded == 4)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($rounded > 4 && $rounded < 5)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                        @elseif($rounded == 5)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <div class="heading_name">{{ $rounded }}</div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="bg_wrap_b">
                                    <div class="mb-1 heading_name">{{ $bottomMover->company->company_name }}</div>
                                    <p class="mb-1 bottom_heading">{{ $bottomMover->heading }}</p>
                                    <ul class="criteria-list list_fill">
                                        <li class="criteria-item">
                                            <div class="check-icon">
                                                <svg viewBox="0 0 24 24">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            </div>
                                            <span>
                                                {{ $bottomMover->point_one }}
                                            </span>
                                        </li>
                                        <li class="criteria-item">
                                            <div class="check-icon">
                                                <svg viewBox="0 0 24 24">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            </div>
                                            <span>
                                                {{ $bottomMover->point_two }}
                                            </span>
                                        </li>
                                        <li class="criteria-item">
                                            <div class="check-icon">
                                                <svg viewBox="0 0 24 24">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            </div>
                                            <span>
                                                {{ $bottomMover->point_three }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center px-0">
                                <a href="{{ route('company.show', $bottomMover->company->slug) }}"
                                    class="profile-btn">Overview</a>
                                <a href="{{ route('contactMover', $bottomMover->company->slug) }}"
                                    class="btn-comp mt-3 d-block text-center px-2">Contact Mover</a>
                            </div>

                        </div>

                    </div>
                    {!! $bottomMover->content !!}
                @endforeach

                @if ($resourcePage->other_service_content != null)
                    <h2 id="other-full-service">Other Full-service Interstate Movers We Considered Best</h2>
                    {!! $resourcePage->other_service_content !!}
                @endif
                @foreach ($other_movers as $otherMover)
                    @if ($otherMover->count() > 0)
                        @php
                            $total_rating = $otherMover->company->users->sum(function ($user) {
                                return (float) $user->overall_rating;
                            });

                            $total_reviews = $otherMover->company->users->count();

                            if ($total_reviews > 0) {
                                $avg_rating = $total_rating / $total_reviews;
                            } else {
                                $avg_rating = 0;
                            }

                            $rounded = round($avg_rating, 1);

                            $imageUrl = str_starts_with($otherMover->company->image, 'companies/image/')
                                ? URL::to('/' . $otherMover->company->image)
                                : URL::to('/companies/image/' . $otherMover->company->image);

                        @endphp
                        <h2 class="mt-5">
                            {{ $otherMover->company->company_name }}
                        </h2>
                        <div class="company-card">
                            <div class="row">
                                <div class="col-md-2 text-center d-flex flex-column align-items-center">
                                    <div class="b_logo">
                                        <img src="{{ $imageUrl }}" alt="{{ $otherMover->company->slug }}-logo"
                                            class="img-fluid mb-3" loading="lazy">
                                    </div>
                                    <div class="rating_wrapper">
                                        <div class="rating">
                                            @if ($rounded == 0)
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif ($rounded > 0 && $rounded < 1)
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 1)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 1 && $rounded < 2)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 2)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 2 && $rounded < 3)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 3)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 3 && $rounded < 4)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded == 4)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="far fa-star" aria-hidden="true"></i>
                                            @elseif($rounded > 4 && $rounded < 5)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            @elseif($rounded == 5)
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                                <i class="fas fa-star" aria-hidden="true"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="heading_name">{{ $rounded }}</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="bg_wrap_b">
                                        <div class="mb-1 heading_name">{{ $otherMover->company->company_name }}</div>
                                        <p class="mb-1 bottom_heading">{{ $otherMover->heading }}</p>
                                        <ul class="criteria-list list_fill">
                                            <li class="criteria-item">
                                                <div class="check-icon">
                                                    <svg viewBox="0 0 24 24">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                                <span>
                                                    {{ $otherMover->point_one }}
                                                </span>
                                            </li>
                                            <li class="criteria-item">
                                                <div class="check-icon">
                                                    <svg viewBox="0 0 24 24">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                                <span>
                                                    {{ $otherMover->point_two }}

                                                </span>
                                            </li>
                                            <li class="criteria-item">
                                                <div class="check-icon">
                                                    <svg viewBox="0 0 24 24">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </div>
                                                <span>
                                                    {{ $otherMover->point_three }}

                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center px-0">
                                    <a href="{{ route('company.show', $otherMover->company->slug) }}"
                                        class="profile-btn">Overview</a>
                                    <a href="{{ route('contactMover', $otherMover->company->slug) }}"
                                        class="btn-comp mt-3 d-block text-center px-2">Contact Mover</a>
                                </div>
                            </div>
                        </div>
                        {!! $otherMover->content !!}
                    @endif
                @endforeach

                {!! $resourcePage->middle_content !!}
                <div class="accordion other_accordion my-5 according_shad" id="accordionExample">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse238" aria-expanded="false" aria-controls="collapse238">
                                Best interstate movers by state
                            </button>
                        </h2>
                        <div id="collapse238" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                            style="">
                            <div class="accordion-body">
                                <p>
                                    Trying to find trusted movers in your area? Here’s a state-by-state list of the best
                                    interstate moving companies that can handle your long-distance move with experience.
                                </p>

                                {{-- <div class="row"> --}}
                                {{-- <div class="col-md-4"> --}}
                                {{-- @foreach ($best_state_pages as $bestStatePage) 
                                            <li><a href="{{route('best_state_show',$bestStatePage->state->slug)}}">{{$bestStatePage->state->name}}</a></li>
                                            @endforeach --}}
                                <ul class="mcc_bullet-list">
                                    @foreach ($best_state_pages as $bestStatePage)
                                        <li><a
                                                href="{{ route('best_state_show', $bestStatePage->state->slug) }}">{{ $bestStatePage->state->name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a href="#">Alaska</a></li>
                                        <li><a href="#">Arizona</a></li>
                                        <li><a href="#">Arkansas</a></li>
                                        <li><a href="#">California</a></li>
                                        <li><a href="#">Colorado</a></li>
                                        <li><a href="#">Connecticut</a></li>
                                        <li><a href="#">Delaware</a></li>
                                        <li><a href="#">Florida</a></li>
                                        <li><a href="#">Georgia</a></li>
                                        <li><a href="#">Hawaii</a></li>
                                        <li><a href="#">Idaho</a></li>
                                        <li><a href="#">Illinois</a></li>
                                        <li><a href="#">Indiana</a></li>
                                        <li><a href="#">Iowa</a></li>
                                        <li><a href="#">Kansas</a></li>
                                        <li><a href="#">Kentucky</a></li> --}}
                                </ul>
                                {{-- </div> --}}

                                {{-- <div class="col-md-4">
                                            <ul class="mcc-bullet-list">

                                                <li><a href="#">Louisiana</a></li>
                                                <li><a href="#">Maine</a></li>
                                                <li><a href="#">Maryland</a></li>
                                                <li><a href="#">Massachusetts</a></li>
                                                <li><a href="#">Michigan</a></li>
                                                <li><a href="#">Minnesota</a></li>
                                                <li><a href="#">Mississippi</a></li>
                                                <li><a href="#">Missouri</a></li>
                                                <li><a href="#">Montana</a></li>
                                                <li><a href="#">Nebraska</a></li>
                                                <li><a href="#">Nevada</a></li>
                                                <li><a href="#">New Hampshire</a></li>
                                                <li><a href="#">New Jersey</a></li>
                                                <li><a href="#">New Mexico</a></li>
                                                <li><a href="#">New York</a></li>
                                                <li><a href="#">North Carolina</a></li>
                                                <li><a href="#">North Dakota</a></li>

                                            </ul>
                                        </div>

                                        <div class="col-md-4">
                                            <ul class="mcc-bullet-list">
                                                <li><a href="#">Ohio</a></li>
                                                <li><a href="#">Oklahoma</a></li>
                                                <li><a href="#">Oregon</a></li>
                                                <li><a href="#">Pennsylvania</a></li>
                                                <li><a href="#">Rhode Island</a></li>
                                                <li><a href="#">South Carolina</a></li>
                                                <li><a href="#">South Dakota</a></li>
                                                <li><a href="#">Tennessee</a></li>
                                                <li><a href="#">Texas</a></li>
                                                <li><a href="#">Utah</a></li>
                                                <li><a href="#">Vermont</a></li>
                                                <li><a href="#">Virginia</a></li>
                                                <li><a href="#">Washington</a></li>
                                                <li><a href="#">West Virginia</a></li>
                                                <li><a href="#">Wisconsin</a></li>
                                                <li><a href="#">Wyoming</a></li>
                                            </ul>
                                        </div> --}}
                                {{-- </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto col-12 ">
                    <h2>
                        Compare the {{ $resourcePage->title }}
                    </h2>
                    <div class="table-responsive">
                        <table class="comparison-table">
                            <thead>
                                <tr>
                                    <th class="sticky-column logo_side">
                                        Company</th>
                                    <th style="background-color:#f0f3f6; color: #09171a;">Price</th>
                                    <th style="background-color:#f0f3f6; color: #09171a;">Rating</th>
                                    <th style="background-color:#f0f3f6; color: #09171a;">Service Availability</th>
                                    <th style="background-color:#f0f3f6; color: #09171a;">Quote</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bottom_movers as $table)
                                    @php
                                        $total_rating = $table->company->users->sum(function ($user) {
                                            return (float) $user->overall_rating;
                                        });

                                        $total_reviews = $table->company->users->count();

                                        if ($total_reviews > 0) {
                                            $avg_rating = $total_rating / $total_reviews;
                                        } else {
                                            $avg_rating = 0;
                                        }

                                        $rounded = round($avg_rating, 1);
                                        $min_price = $table->company->users
                                            ->where('user_email_verified', 1)
                                            ->min(function ($user) {
                                                return (float) $user->service_cost;
                                            });

                                        $max_price = $table->company->users
                                            ->where('user_email_verified', 1)
                                            ->max(function ($user) {
                                                return (float) $user->service_cost;
                                            });

                                        $imageUrl = str_starts_with($table->company->image, 'companies/image/')
                                            ? URL::to('/' . $table->company->image)
                                            : URL::to('/companies/image/' . $table->company->image);

                                    @endphp

                                    <tr>
                                        <td class="sticky-column">
                                            <div class="company-info">
                                                <div class="company-logo">
                                                    <img src="{{ $imageUrl }}"
                                                        alt="{{ $table->company->slug }}-logo" loading="lazy">
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            ${{ $min_price }}
                                        </td>
                                        <td class="data-cell">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <span class="rating">{{ $rounded }}/5</span>
                                                <ul class="d-flex list-unstyled mb-0 ms-2">
                                                    @if ($rounded == 0)
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif ($rounded > 0 && $rounded < 1)
                                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded == 1)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded > 1 && $rounded < 2)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded == 2)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded > 2 && $rounded < 3)
                                                        <i class="fas fa-star" aria-hidden="true">
                                                        </i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded == 3)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded > 3 && $rounded < 4)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded == 4)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="far fa-star" aria-hidden="true"></i>
                                                    @elseif($rounded > 4 && $rounded < 5)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                                    @elseif($rounded == 5)
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                        <i class="fas fa-star" aria-hidden="true"></i>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>

                                        <td>Excellent</td>

                                        <td><a target="_blank" href="{{ route('contactMover', $table->company->slug) }}"
                                                class="action-btn">Get
                                                Estimate</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- <div class="container">
        <div class="col-lg-12 mx-auto mt-lg-0 mt-3">
            <div class="col-lg-8 mx-auto">
                <div id="compare_card">
                    <h2 class="mb-4 form_heading text-center" style="font-size: 28px; font-weight: 700;">
                        Compare Movers
                    </h2>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <div class="text-center p-3"
                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                <div class="img_wrapp">
                                    <img id="mover1_img" src="{{ asset('assets/img/mmj-favicon.png') }}" alt="Mover 1"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="mt-3">
                                    <select id="mover1" class="form-select select2-dropdown" style="width: 100%;">
                                        <option selected disabled>Choose Mover</option>
                                        @foreach ($data as $mover)
                                            @if ($mover->average_rating && $mover->average_rating > 0)
                                                @php
                                                    $imageUrl = $mover->image
                                                        ? (str_starts_with($mover->image, 'companies/image/')
                                                            ? URL::to('/' . $mover->image)
                                                            : URL::to('/companies/image/' . $mover->image))
                                                        : asset('img/samplelogo.webp');
                                                @endphp
                                                <option value="{{ $mover->id }}" data-img="{{ $imageUrl }}"
                                                    data-name="{{ $mover->company_name }}"
                                                    data-rating="{{ is_numeric($mover->average_rating) ? number_format($mover->average_rating, 1) : 0 }}"
                                                    data-average-price="{{ $mover->average_price ? '$' . number_format($mover->average_price, 2) : 'Contact for Quote' }}"
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
                        <div class="col-5">
                            <div class="text-center p-3"
                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                <div class="img_wrapp">
                                    <img id="mover2_img" src="{{ asset('assets/img/mmj-favicon.png') }}" alt="Mover 2"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="mt-3">
                                    <select id="mover2" class="form-select select2-dropdown" style="width: 100%;">
                                        <option selected disabled>Choose Mover</option>
                                        @foreach ($data as $mover)
                                            @if ($mover->average_rating && $mover->average_rating > 0)
                                                @php
                                                    $imageUrl = $mover->image
                                                        ? (str_starts_with($mover->image, 'companies/image/')
                                                            ? URL::to('/' . $mover->image)
                                                            : URL::to('/companies/image/' . $mover->image))
                                                        : asset('img/samplelogo.webp');
                                                @endphp
                                                <option value="{{ $mover->id }}" data-img="{{ $imageUrl }}"
                                                    data-name="{{ $mover->company_name }}"
                                                    data-rating="{{ is_numeric($mover->average_rating) ? number_format($mover->average_rating, 1) : 0 }}"
                                                    data-average-price="{{ $mover->average_price ? '$' . number_format($mover->average_price, 2) : 'Contact for Quote' }}"
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
            </div>
            <div class="text-center mt-3">
                <div class="buttons-container">
                    <button id="compare-now-btn" class="btn btn-primary"
                        style="background: #116087; border: 2px solid #116087; padding: 10px 30px; border-radius: 8px; font-weight: 500; display: none; margin-right: 10px;"
                        onclick="startComparison()">
                        Compare Now
                    </button>

                    
                    <button id="add-more-companies" class="add-more-btn" style="display: none;"
                        onclick="toggleCompaniesDropdown()">
                        + More Companies
                    </button>

                    
                    <div id="companies-dropdown" class="companies-dropdown">
                        <div class="dropdown-header">
                            <h4>Select Additional Companies</h4>
                            <div class="search-container" style="margin-top: 15px;">
                                <input type="text" id="company-search" placeholder="Search companies..."
                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
                                    oninput="filterCompanies()">
                            </div>
                        </div>
                        <div id="available-companies-grid" class="companies-grid">
                            
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
                        <p class="text-muted mb-0" style="font-size: 1rem; color: #666;">Please wait
                            while
                            we prepare
                            your comparison</p>
                        </div>
                    </div>

                    <div class="col-lg-12 mx-auto" id="comparisonContent" style="display:none;">
                        <div id="comparison-cards-container"
                            class="row justify-content-lg-center comparison-cards-container">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="max_container">
        <div class="container">
            <section class="comparesion_section my-4">
                {!! $resourcePage->bottom_content !!}
                {{-- <section class="methodology-section">
                        <h2 class="methodology-title">Our Methodology</h2>
                        <p class="methodology-text">
                            At MyMovingJourney, we analyze moving companies in Alabama based on what real customers are
                            saying.
                            If you’re searching for the best in the business, every review counts – and so do these other
                            key metrics:
                        </p>

                        <div class="bar-wrapper">
                            <div class="bar">
                                <div class="bar-segment yellow"></div>
                                <div class="bar-segment green"></div>
                                <div class="bar-segment blue"></div>
                                <div class="bar-segment orange"></div>
                                <div class="bar-segment pink"></div>
                                <div class="bar-segment teal"></div>
                                <div class="bar-segment lightgreen"></div>
                                <div class="bar-segment red"></div>
                            </div>

                            <!-- Alternating top/bottom labels -->
                            <div class="label top l1">Customer satisfaction (20%)</div>
                            <div class="label bottom l2">Upfront Pricing (20%)</div>
                            <div class="label top l3">Cancellation policy (10%)</div>
                            <div class="label bottom l4">Type of moves offered (10%)</div>
                            <div class="label top l5">Locations serviced (10%)</div>
                            <div class="label bottom l6">Shipment tracking (10%)</div>
                            <div class="label top l7">Protection/insurance options (10%)</div>
                            <div class="label bottom l8">Additional services (10%)</div>
                        </div>
                    </section> --}}
                <h2>FAQs</h2>
                <div class="accordion other_accordion  mt-4 faq_accordion" id="accordionExample">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false">
                                    {!! $faq->question !!}
                                </button>
                            </h3>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <p>
                                        {!! $faq->answer !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Old conflicting code removed - handled by new 4-company comparison system

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

        // 4-Company Comparison JavaScript
        let selectedMovers = {};
        let comparisonDone = false;
        let availableCompaniesGlobal = @json($data);

        function handleMoverSelection() {
            const mover1 = $('#mover1').val();
            const mover2 = $('#mover2').val();

            // Update images
            if (mover1) {
                const img1 = $('#mover1 option:selected').data('img');
                $('#mover1_img').attr('src', img1);
            } else {
                $('#mover1_img').attr('src', '{{ asset('assets/img/mmj-favicon.png') }}');
            }

            if (mover2) {
                const img2 = $('#mover2 option:selected').data('img');
                $('#mover2_img').attr('src', img2);
            } else {
                $('#mover2_img').attr('src', '{{ asset('assets/img/mmj-favicon.png') }}');
            }

            // Check if both movers are selected and different
            if (mover1 && mover2 && mover1 !== mover2) {
                selectedMovers = {
                    1: mover1,
                    2: mover2
                };
                $('#compare-now-btn').show();
                if (comparisonDone) {
                    $('#add-more-companies').show();
                } else {
                    $('#add-more-companies').hide();
                }
            } else {
                $('#compare-now-btn').hide();
                $('#add-more-companies').hide();
                if (mover1 === mover2 && mover1) {
                    alert('Please select different movers for comparison.');
                }
            }

            if (comparisonDone) {
                $('#comparisonResults').hide();
                $('#add-more-companies').hide();
                document.getElementById('companies-dropdown').classList.remove('show');
                comparisonDone = false;
                if (mover1 && mover2 && mover1 !== mover2) {
                    $('#compare-now-btn').show();
                }
            }
        }

        function startComparison() {
            const moverIds = Object.values(selectedMovers);
            if (moverIds.length >= 2) {
                showComparison(moverIds);
            }
        }

        async function showComparison(moverIds) {
            document.getElementById("comparisonResults").style.display = "block";
            document.getElementById("comparisonLoader").style.display = "flex";
            document.getElementById("comparisonContent").style.display = "none";

            try {
                const moverDataArray = moverIds.map(id => {
                    let option = document.querySelector(`#mover1 option[value="${id}"]`) ||
                        document.querySelector(`#mover2 option[value="${id}"]`);

                    if (option) {
                        return {
                            id: id,
                            company_name: option.getAttribute('data-name') || 'Unknown Company',
                            image: option.getAttribute('data-img') || '{{ asset('img/samplelogo.webp') }}',
                            average_rating: parseFloat(option.getAttribute('data-rating')) || 0,
                            total_reviews: option.getAttribute('data-total-reviews') || '0',
                            average_price: option.getAttribute('data-average-price') || 'Contact for Quote',
                            us_dot: option.getAttribute('data-usdot') || 'N/A',
                            icc_mc_number: option.getAttribute('data-icc-number') || 'N/A',
                            slug: option.getAttribute('data-slug') || ''
                        };  
                    } else {
                        const mover = availableCompaniesGlobal.find(company => company.id == id);
                        if (mover) {
                            return {
                                id: id,
                                company_name: mover.company_name || 'Unknown Company',
                                image: mover.image ? (mover.image.startsWith('companies/image/') ?
                                        `{{ URL::to('/') }}/${mover.image}` :
                                        `{{ URL::to('/companies/image/') }}/${mover.image}`) :
                                    '{{ asset('img/samplelogo.webp') }}',
                                average_rating: parseFloat(mover.average_rating) || 0,
                                total_reviews: mover.total_reviews || '0',
                                average_price: mover.average_price ?
                                    `$${parseFloat(mover.average_price).toFixed(2)}` : 'Contact for Quote',
                                us_dot: mover.us_dot || 'N/A',
                                icc_mc_number: mover.icc_mc_number || 'N/A',
                                slug: mover.slug || ''
                            };
                        }
                    }
                    return null;
                }).filter(Boolean);

                const container = document.getElementById('comparison-cards-container');
                container.innerHTML = '';

                moverDataArray.forEach((moverData, index) => {
                    if (moverData) {
                        const cardHtml = createComparisonCard(moverData, moverIds.length);
                        container.innerHTML += cardHtml;
                    }
                });

                await new Promise(resolve => setTimeout(resolve, 500));

                document.getElementById("comparisonLoader").style.display = "none";
                document.getElementById("comparisonContent").style.display = "block";

                $('#compare-now-btn').hide();
                $('#add-more-companies').show();
                comparisonDone = true;

            } catch (error) {
                console.error("Error in comparison:", error);
                alert("An error occurred while loading comparison. Please try again.");
                document.getElementById("comparisonLoader").style.display = "none";
                document.getElementById("comparisonContent").style.display = "none";
            }
        }

        function createComparisonCard(moverData, totalCards) {
            const rawRating = parseFloat(moverData.average_rating);
            const rating = Math.round(rawRating * 10) / 10;
            const colClass = totalCards === 4 ? 'col-lg-3 col-md-6' : 'col-lg-4 col-md-6';

            return `
                <div class="${colClass} mb-4">
                    <div class="comparison-card">
                        <button class="remove-company-btn" onclick="removeCompanyFromComparison('${moverData.id}')" title="Remove Company">
                            ×
                        </button>
                        <div class="company-header">
                            <ul class="list-unstyled company-details">
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">Company Name:</div>
                                        </div>
                                        <div class="col-7">
                                            <span>${moverData.company_name}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">Rating:</div>
                                        </div>
                                        <div class="col-7 d-flex justify-content-center align-items-center">
                                            <div class="rating-stars">${generateStarRating(rating)}</div>
                                            <span class="rating-value ms-2">${rating}/5</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">Total Reviews:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="review-count">${moverData.total_reviews} Reviews</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">Average Price:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="price-value">${moverData.average_price}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">US DOT:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="detail-value">${moverData.us_dot}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">ICC MC NUMBER:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="detail-value">${moverData.icc_mc_number}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <button class="btn-get-quote" onclick="window.open('/contact-mover/${moverData.slug}', '_blank')">
                            Get Quote →
                        </button>
                        <button class="btn-learn-more" onclick="window.open('/mover/${moverData.slug}', '_blank')">
                            Learn More ▲
                        </button>
                    </div>
                </div>
            `;
        }

        function toggleCompaniesDropdown() {
            const dropdown = document.getElementById('companies-dropdown');
            dropdown.classList.toggle('show');

            if (dropdown.classList.contains('show')) {
                populateCompaniesDropdown();
            }
        }

        function populateCompaniesDropdown() {
            const selectedIds = Object.values(selectedMovers).map(id => id.toString());
            const availableCompanies = availableCompaniesGlobal.filter(company =>
                !selectedIds.includes(company.id.toString()) &&
                company.average_rating &&
                company.average_rating > 0
            );

            displayCompanies(availableCompanies);
        }

        function displayCompanies(companies) {
            const grid = document.getElementById('available-companies-grid');
            grid.innerHTML = '';

            companies.forEach(company => {
                const imageUrl = company.image ?
                    (company.image.startsWith('companies/image/') ?
                        `{{ URL::to('/') }}/${company.image}` :
                        `{{ URL::to('/companies/image/') }}/${company.image}`) :
                    '{{ asset('img/samplelogo.webp') }}';

                const companyItem = document.createElement('div');
                companyItem.className = 'dropdown-company-item';
                companyItem.onclick = () => addCompanyToComparison(company.id);
                companyItem.innerHTML = `
                    <img src="${imageUrl}" alt="${company.company_name}" class="dropdown-company-img">
                    <span class="dropdown-company-name">${company.company_name}</span>
                `;
                grid.appendChild(companyItem);
            });
        }

        function filterCompanies() {
            const searchTerm = document.getElementById('company-search').value.toLowerCase();
            const selectedIds = Object.values(selectedMovers).map(id => id.toString());
            const filteredCompanies = availableCompaniesGlobal.filter(company =>
                !selectedIds.includes(company.id.toString()) &&
                company.average_rating &&
                company.average_rating > 0 &&
                company.company_name.toLowerCase().includes(searchTerm)
            );

            displayCompanies(filteredCompanies);
        }

        function addCompanyToComparison(companyId) {
            const currentMovers = Object.values(selectedMovers);

            if (currentMovers.length >= 4) {
                const sortedSlots = Object.keys(selectedMovers).map(Number).sort((a, b) => a - b);
                delete selectedMovers[sortedSlots[0]];

                const remainingMovers = [];
                for (let i = 1; i < sortedSlots.length; i++) {
                    remainingMovers.push(selectedMovers[sortedSlots[i]]);
                    delete selectedMovers[sortedSlots[i]];
                }

                selectedMovers = {
                    1: remainingMovers[0],
                    2: remainingMovers[1],
                    3: remainingMovers[2],
                    4: companyId
                };
            } else {
                const nextSlot = Math.max(...Object.keys(selectedMovers).map(Number)) + 1;
                selectedMovers[nextSlot] = companyId;
            }

            document.getElementById('companies-dropdown').classList.remove('show');

            const moverIds = Object.values(selectedMovers);
            updateComparisonSmoothly(moverIds);
        }

        function removeCompanyFromComparison(companyId) {
            let removedSlot = null;
            for (const [slot, id] of Object.entries(selectedMovers)) {
                if (id == companyId) {
                    delete selectedMovers[slot];
                    removedSlot = parseInt(slot);
                    break;
                }
            }

            const remainingMovers = Object.values(selectedMovers);
            selectedMovers = {};

            remainingMovers.forEach((moverId, index) => {
                selectedMovers[index + 1] = moverId;
            });

            if (remainingMovers.length < 2) {
                $('#comparisonResults').hide();
                $('#add-more-companies').hide();
                comparisonDone = false;
                const mover1 = $('#mover1').val();
                const mover2 = $('#mover2').val();
                if (mover1 && mover2 && mover1 !== mover2) {
                    $('#compare-now-btn').show();
                }
            } else {
                updateComparisonSmoothly(remainingMovers);
            }
        }

        async function updateComparisonSmoothly(moverIds) {
            try {
                const moverDataArray = moverIds.map(id => {
                    let option = document.querySelector(`#mover1 option[value="${id}"]`) ||
                        document.querySelector(`#mover2 option[value="${id}"]`);

                    if (option) {
                        return {
                            id: id,
                            company_name: option.getAttribute('data-name') || 'Unknown Company',
                            image: option.getAttribute('data-img') || '{{ asset('img/samplelogo.webp') }}',
                            average_rating: parseFloat(option.getAttribute('data-rating')) || 0,
                            total_reviews: option.getAttribute('data-total-reviews') || '0',
                            average_price: option.getAttribute('data-average-price') || 'Contact for Quote',
                            us_dot: option.getAttribute('data-usdot') || 'N/A',
                            icc_mc_number: option.getAttribute('data-icc-number') || 'N/A',
                            slug: option.getAttribute('data-slug') || ''
                        };
                    } else {
                        const mover = availableCompaniesGlobal.find(company => company.id == id);
                        if (mover) {
                            return {
                                id: id,
                                company_name: mover.company_name || 'Unknown Company',
                                image: mover.image ? (mover.image.startsWith('companies/image/') ?
                                        `{{ URL::to('/') }}/${mover.image}` :
                                        `{{ URL::to('/companies/image/') }}/${mover.image}`) :
                                    '{{ asset('img/samplelogo.webp') }}',
                                average_rating: parseFloat(mover.average_rating) || 0,
                                total_reviews: mover.total_reviews || '0',
                                average_price: mover.average_price ?
                                    `$${parseFloat(mover.average_price).toFixed(2)}` : 'Contact for Quote',
                                us_dot: mover.us_dot || 'N/A',
                                icc_mc_number: mover.icc_mc_number || 'N/A',
                                slug: mover.slug || ''
                            };
                        }
                    }
                    return null;
                }).filter(Boolean);

                const container = document.getElementById('comparison-cards-container');
                container.innerHTML = '';

                moverDataArray.forEach((moverData, index) => {
                    if (moverData) {
                        const cardHtml = createComparisonCard(moverData, moverIds.length);
                        container.innerHTML += cardHtml;
                    }
                });

                document.getElementById("comparisonContent").style.display = "block";

            } catch (error) {
                console.error("Error in comparison:", error);
                alert("An error occurred while updating comparison. Please try again.");
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('companies-dropdown');
            const button = document.getElementById('add-more-companies');

            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        document.getElementById('companies-dropdown').addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Initialize Select2 and bind events
        $(document).ready(function() {
            $('#mover1, #mover2').select2({
                placeholder: "Choose Mover",
                allowClear: true
            });

            $('#mover1, #mover2').on('change', handleMoverSelection);
        });
    </script>
    <script src="{{ asset('assets/js/test2.js') }}"></script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                // Get the target element
                const targetElement = document.querySelector(this.getAttribute('href'));

                // Scroll to the target element and adjust with an offset (e.g., 50px)
                window.scrollTo({
                    top: targetElement.offsetTop - 160, // 50px is the offset
                    behavior: 'smooth'
                });
            });
        });



        // Function to handle smooth scrolling with offset
        function smoothScrollTo(targetId, offset) {
            const target = document.querySelector(targetId);
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }

        // Add event listener for the first anchor
        document.querySelector('a[href="#toc-faqs-about-moving-companies"]').addEventListener('click', function(event) {
            event.preventDefault();
            smoothScrollTo('#toc-faqs-about-moving-companies', 150); // Adjust offset value as needed
        });

        // Add event listener for the second anchor
        document.querySelector('a[href="#toc-calculate-moving-costs"]').addEventListener('click', function(event) {
            event.preventDefault();
            smoothScrollTo('#toc-calculate-moving-costs', 150); // Adjust offset value as needed
        });

        // Add event listener for the second anchor
        // document.querySelector('a[href="#toc-best-moving-companies"]').addEventListener('click', function(event) {
        //     event.preventDefault();
        //     smoothScrollTo('#toc-best-moving-companies', 150);
        // });

        // Add event listener for the second anchor
        document.querySelector('a[href="toc-how-to-choose-a-moving-company"]').addEventListener('click', function(event) {
            event.preventDefault();
            smoothScrollTo('toc-how-to-choose-a-moving-company', 150); // Adjust offset value as needed
        });
    </script>
    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; // Fieldsets
            var opacity;
            var current = 0; // Start from 0
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                // Add Class Active
                $("#progressbar li")
                    .eq($("fieldset").index(next_fs))
                    .addClass("active");

                // Show the next fieldset
                next_fs.show();

                // Hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // For making fieldset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        next_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500,
                });

                setProgressBar(++current);
            });

            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                // Remove class active
                $("#progressbar li")
                    .eq($("fieldset").index(current_fs))
                    .removeClass("active");

                // Show the previous fieldset
                previous_fs.show();

                // Hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // For making fieldset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        previous_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500,
                });

                setProgressBar(--current);
            });

            $("form").on("submit", function(event) {
                setProgressBar(steps); // Set progress bar to 100% on submit
            });

            function setProgressBar(curStep) {
                var percent = (100 / steps) * curStep; // Calculate the percentage based on current step
                percent = percent.toFixed();
                $(".progress-bar").css("width", percent + "%");
                $(".progress-percentage").text(percent + "%"); // Update the percentage text
                $(".progress-percentage").css("left", percent + "%"); // Move the percentage text outside
            }
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            // autoplay: {
            //     delay: 2500,
            //     disableOnInteraction: false,
            // },
            loop: true,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "{{ $resourcePage->meta_title }}",
        "url": "{{ url()->current() }}",
        "description": " {{ $resourcePage->meta_description }} ",
        "potentialAction":{
                 "@type":"ReadAction"  ,
                 "target": "{{ url()->current() }}"  
                }
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "MyMovingJourney",
        "url": "https://mymovingjourney.com/",
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
                "name": "{{ $resourcePage->meta_title }}",
                "item": "{{ url()->current() }}"
            }
            ]
            }
        </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach ($faqs as $faq)
      {
        "@type": "Question",
        "name": {!! json_encode($faq->question) !!},
        "acceptedAnswer": {
          "@type": "Answer",
          "text": {!! json_encode($faq->answer) !!}
        }
      }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Choose {{ $resourcePage->meta_title }}",
  "description": "{{ $resourcePage->meta_description }}",
  "inLanguage": "en-US",

  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },

  "supply": [
    {
      "@type": "HowToSupply",
      "name": "List of verified companies"
    },
    {
      "@type": "HowToSupply",
      "name": "Customer reviews and ratings"
    }
  ],

  "tool": [
    {
      "@type": "HowToTool",
      "name": "Moving Cost Calculator"
    }
  ],

  "step": [
    {
      "@type": "HowToStep",
      "position": 1,
      "name": "Understand Your Requirements",
      "text": "Identify your moving needs, including distance, home size, timeline, and additional services required."
    },
    {
      "@type": "HowToStep",
      "position": 2,
      "name": "Compare Pricing and Services",
      "text": "Evaluate pricing structures, included services, and transparency before requesting quotes."
    },
    {
      "@type": "HowToStep",
      "position": 3,
      "name": "Check Reviews and Ratings",
      "text": "Read verified customer reviews to understand reliability, communication, and service quality."
    },
    {
      "@type": "HowToStep",
      "position": 4,
      "name": "Verify Licensing and Insurance",
      "text": "Ensure the company is properly licensed and insured for local or interstate moves."
    },
    {
      "@type": "HowToStep",
      "position": 5,
      "name": "Select the Best Option",
      "text": "Choose the most reliable and well-reviewed company that fits your budget and moving requirements."
    }
  ]
}
</script>
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FindAction",
    "target": {
        "@type": "EntryPoint",
        "urlTemplate": "{{ url()->current() }}?search={search_term}",
        "actionPlatform": [
            "https://schema.org/DesktopWebPlatform",
            "https://schema.org/MobileWebPlatform"
        ]
    },
    "object": {
        "@type": "ItemList",
        "name": "Best Moving Companies in USA",
        "itemListElement": [
        
           @foreach ($bottom_movers as $company)
           @php
                        // Calculate ratings for this company
                        $verified_users = $company->company->users->filter(
                            fn($u) => (int) $u->user_email_verified === 1 && !is_null($u->overall_rating),
                        );

                        $total_reviews = $verified_users->count();
                        $avg_rating = $total_reviews
                            ? $verified_users->map(fn($u) => (float) $u->overall_rating)->avg()
                            : 0;

                        $rounded = round((float) $avg_rating, 1);
                        
                        // Calculate min and max ratings
                        if ($total_reviews > 0) {
                            $max_rating = $verified_users->max('overall_rating') ?? 5;
                            $min_rating = $verified_users->min('overall_rating') ?? 1;
                        } else {
                            $max_rating = 5;
                            $min_rating = 1;
                        }
                    @endphp
       
            {
                "@type": "ListItem",
                "position": {{ $company->position }},
                "item": {
                    "@type": "MovingCompany",
                    "name": "{{ $company->company->company_name }}",
                    "url": "{{ route('company.show', $company->company->slug) }}",
                    "logo": "{{ URL::to($company->company->logo) }}",
                    "telephone": "{{ $company->company->phone_no ?? '' }}",
                    "description": "See what people say about {{ $company->company->company_name }}. Get honest reviews and ratings from real clients. Compare movers and claim your free moving quote.",
                    "email": "{{ $company->company->company_email ?? '' }}",
                    "priceRange" : "${{$min_price}} - ${{$max_price}}",
                    "contactPoint": {
                        "@type": "ContactPoint",
                        "telephone": "{{ $company->company->phone_no ?? '' }}",
                        "contactType": "Customer service",
                        "email": "{{ $company->company->company_email ?? '' }}",
                        "url": "{{ route('company.show', $company->company->slug) }}"
                    },
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "US",
                        "addressLocality": "{{ $company->company->city->name ?? $company->company->city ?? '' }}",
                        "addressRegion": "{{ $company->company->state->abv ?? $company->company->state ?? '' }}",
                        "postalCode": "{{ $company->company->city->zip_code ?? $company->company->zip_code ?? '' }}",
                        "streetAddress": "{{ $company->company->street ?? '' }}"
                    },
                 
              
                         "areaServed": "USA"@if ($total_reviews > 0),
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "bestRating": "{{$max_rating}}",
                        "worstRating": "{{$min_rating}}",
                        "reviewCount": "{{ $total_reviews }}",
                        "ratingValue": "{{ $rounded }}"
                    }@endif
                 
                }
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
}
</script>
@endsection
