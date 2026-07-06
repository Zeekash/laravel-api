@extends('layouts.app')
@section('title')
    {{ $bestStatePage->meta_title }}, {{ date('Y') }}
@endsection
@section('meta_description', $bestStatePage->meta_description)
@section('head')
    <meta name="robots" content="index, follow">
@endsection
@section('og:title')
    {{ $bestStatePage->meta_title }}
@endsection
@section('og:description')
    {{ $bestStatePage->meta_description }}
@endsection 
@section('meta_keywords')
   Best {{$bestStatePage->state->name}} Movers
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/best_state_show.css') }}" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/best_state_show.css') }}">
    </noscript>
    <style>
        /* 4-Company Comparison Styles */
        .comparison-card {
            background: #EBFAFF;
            position: relative;
            border-radius: 12px;
            /* display: flex; */
            align-items: center;
            padding: 15px;
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

        .best_for {
            border-bottom: 1px solid #0000002b !important;
            margin-bottom: 10px !important;
            padding-bottom: 5px;
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
    <div class="section-wrapper">
        <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                    class="fas fa-home me-1 home_icon"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('company.movers') }}" class="py-2">Movers</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $bestStatePage->state->name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <h1>{{ $bestStatePage->title }} ({{ date('Y') }})</h1>
        {!! $bestStatePage->description !!}

        <div class="info-box">
            <h3>Are you ready to move? </h3>
            <p>
                After years of helping people move, we’ve learned that every move has its own story. That’s why we are here
                to help you find the mover that fits your move.
            </p>
            <ul class="info-list">
                <li><span class="highlight"><a href="#local_movers">Best Local Movers in
                            {{ $bestStatePage->state->name }}</a></span></li>
                <li><span class="highlight"><a href="#long_distance_mover">Best Interstate Movers in
                            {{ $bestStatePage->state->name }}</a></span></li>
                <li><span class="highlight"><a href="#container_mover">Best Moving Containers in
                            {{ $bestStatePage->state->name }}</a></span></li>
                <li><span class="highlight"><a href="#truck_rental">Best Truck Rentals in
                            {{ $bestStatePage->state->name }}</a></span></li>
            </ul>

            <div class="quote-box">
                <div class="bg_col">
                    <p class="mb-0">
                        Ready to get started? Build your custom moving plan today.
                    </p>
                </div>
                <a href="https://mymovingjourney.com/moving-cost-calculator">
                    Get a Free Quote</a>
            </div>
        </div>
    </div>
    <div class="container_featured">
        <h2 class="text-center">Featured Moving Companies</h2>
        <div class="Featured_Partners">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card  active ">
                        <div class="company_logo">
                            <img src="https://mymovingjourney.com/companies/image/safeway-moving-inc.webp"
                                alt="company-logo" class="img-fluid" loading="lazy">
                        </div>
                        <div class="partner-header d-flex align-items-center justify-content-center">
                            <h5 class="company_name">Best Affordable Mover</h5>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                            <span class="rating"
                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.7
                                out of 5</span>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                            <ul class="d-flex list-unstyled mb-0 ms-1">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star-half" aria-hidden="true"></i>
                            </ul>
                        </div>
                        <div class="partner-info">
                            <div class="d-flex align-items-center best_for">
                                <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Punctual Crew</p>
                            </div>
                            <div class="d-flex align-items-center best_for">
                                <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Competitive Rates
                                </p>
                            </div>
                            <div class="d-flex align-items-center best_for">
                                <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Customer-Centric Approach
                                </p>
                            </div>

                        </div>
                        <a target="_blank" href="https://mymovingjourney.com/contact-mover/safeway-moving-inc">
                            <div class="phone-box mb-1 mt-4">
                                Get Free Estimates
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card">
                        <div class="company_logo">
                            <img src="https://mymovingjourney.com/companies/image/american-van-lines.webp"
                                alt="company-logo" loading="lazy" class="img-fluid">
                        </div>
                        <div class="partner-header d-flex align-items-center justify-content-center">
                            <h5 class="company_name">Best Reliable Mover</h5>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                            <span class="rating"
                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.2
                                out of 5</span>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                            <ul class="d-flex list-unstyled mb-0 ms-1">
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star-half" aria-hidden="true"></i>
                            </ul>
                        </div>
                        <div class="partner-info">
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Fully Customizable Services</p>
                            </div>
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Professional Movers
                                </p>
                            </div>
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Warehouse Storage
                                </p>
                            </div>

                        </div>
                        <a target="_blank" href="https://mymovingjourney.com/contact-mover/american-van-lines">
                            <div class="phone-box mb-1 mt-4">
                                Get Free Estimates
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="partner-card">
                        <div class="company_logo">
                            <img src="https://mymovingjourney.com/companies/image/blvd-moving-best-moving-company.webp"
                                alt="company-logo" class="img-fluid" loading="lazy">
                        </div>
                        <div class="partner-header d-flex align-items-center justify-content-center">
                            <h5 class="company_name">Best Profeesional Mover</h5>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                            <span class="rating"
                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">3.8
                                out of 5</span>
                        </div>
                        <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                            <ul class="d-flex list-unstyled mb-0 ms-1">
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                <i class="fa-solid fa-star-half" aria-hidden="true"></i>
                                <i class="fas fa-star empty-star"></i>
                            </ul>
                        </div>

                        <!--<hr>-->
                        <div class="partner-info">
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Comprehensive Packing</p>
                            </div>
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Franchised Network</p>
                            </div>
                            <div class="d-flex align-items-center best_for"><img
                                    src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                    width="13" height="13" loading="lazy">
                                <p>Customer Referrals</p>
                            </div>
                        </div>
                        <a target="_blank" href="https://mymovingjourney.com/contact-mover/blvd-moving">
                            <div class="phone-box mb-1 mt-4">
                                Get Free Estimates
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center">Our Track Record</h2>
        <div class="steps-container my-5">
            <div class="step_section">

                <div class="step-number"><img src="{{ asset('assets/img/verified-movers.svg') }}" alt="verified"
                        loading="lazy"></div>
                <div class="step-title">500+ Verified Movers
                    <p>Every company you see here has been checked for licensing, reviews, and credibility before being
                        added.
                    </p>
                </div>

                <div class="connector">
                    <span class="connector-dot start"></span>
                    <span class="connector-dot end"></span>
                </div>
            </div>

            <div class="step_section">
                <div class="step-number"><img src="{{ asset('assets/img/cities-covered.svg') }}" loading="lazy"
                        alt="verified"></div>
                <div class="step-title">3,500+ Cities Covered
                    <p>From small towns to major metros, we help people find movers in USA wherever they are.</p>

                </div>

                <div class="connector">
                    <span class="connector-dot start"></span>
                    <span class="connector-dot end"></span>
                </div>
            </div>

            <div class="step_section">
                <div class="step-number"><img src="{{ asset('assets/img/users-helped.svg') }}" alt="verified"
                        loading="lazy"></div>
                <div class="step-title">1000+ Users Helped
                    <p>People across the USA rely on our platform to compare movers and make informed decisions.</p>

                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper mt-0">

        <h2 id="local_movers">Best Local Movers in {{ $bestStatePage->state->name }} </h2>
        {!! $bestStatePage->local_mover_content !!}

        <div class="info-card my-4">
            @foreach ($local_movers as $moverlist)
                @php
                    // If your query used withAvg/withCount aliases:
                    $preAvg = $moverlist->avg_rating ?? null; // may be null if not selected
                    $preCount = $moverlist->reviews_count ?? null; // may be null if not selected

                    if (!is_null($preAvg) && !is_null($preCount)) {
                        // Use DB-side aggregates (preferred, no N+1)
                        $avg_rating = (float) $preAvg;
                        $total_reviews = (int) $preCount;
                    } else {
                        // Fall back: compute from relation but only verified + rated users
                        $verified = $moverlist->users->filter(
                            fn($u) => (int) $u->user_email_verified === 1 && !is_null($u->overall_rating),
                        );

                        $total_reviews = $verified->count();
                        $avg_rating = $total_reviews
                            ? $verified
                                ->filter(fn($u) => is_numeric($u->overall_rating))
                                ->map(fn($u) => (float) $u->overall_rating)
                                ->avg()
                            : 0;
                    }

                    $rounded = round((float) $avg_rating, 1);
                @endphp

                <div class="info-item">
                    <div class="info-icon">➜</div>
                    <p>
                        <strong><a href="#{{ $moverlist->slug }}">{{ $moverlist->company_name }}</a>:</strong>
                        {{ $rounded }} out of 5 stars
                        {{-- ({{ $total_reviews }}
                        {{ \Illuminate\Support\Str::plural('review', $total_reviews) }}
                        ) --}}
                    </p>
                </div>
            @endforeach
        </div>
        @foreach ($local_movers as $localMover)
            @php
                $imageUrl = str_starts_with($localMover->image, 'companies/image/')
                    ? URL::to('/' . $localMover->image)
                    : URL::to('/companies/image/' . $localMover->image);

                $verifiedUsers = $localMover
                    ->users()
                    ->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating')
                    ->get();

                $total_rating = $localMover->users->sum(function ($user) {
                    return (float) $user->overall_rating;
                });
                $total_reviews = $verifiedUsers->count();
                if ($total_reviews > 0) {
                    $avg_rating = $total_rating / $total_reviews;
                } else {
                    $avg_rating = 0;
                }

                $rounded = round($avg_rating, 1);

                // ✅ Count based on rating ranges
                $positive_reviews = $verifiedUsers->whereBetween('overall_rating', [3.1, 5])->count();
                $negative_reviews = $verifiedUsers->whereBetween('overall_rating', [0.1, 3])->count();

                // ✅ Calculate percentages safely
                $positive_percentage = $total_reviews > 0 ? round(($positive_reviews / $total_reviews) * 100, 2) : 0;
                $negative_percentage = $total_reviews > 0 ? round(($negative_reviews / $total_reviews) * 100, 2) : 0;

                $state_op = $localMover->users()->where('user_email_verified', 1)->get();
                $usersUnique = $state_op->unique('pick_up_state_id');
                $unique_state_count = $usersUnique->count();

                $min_price = $localMover->users->where('user_email_verified', 1)->min('service_cost');
                $max_price = $localMover->users->where('user_email_verified', 1)->max('service_cost');

            @endphp
            <div class="bg_comp" id="{{ $localMover->slug }}">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
                    <a href="{{ route('company.show', $localMover->slug) }}" class="order-sm-0 order-1">
                        <h2 class="my-0">{{ $localMover->company_name }}</h2>
                        <ul class="d-flex align-items-center rating_stars list-unstyled mb-0 me-2">
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
                            <span class="c_rating">
                                ({{ $rounded }}/5)
                            </span>
                        </ul>
                    </a>
                    <div class="side_logo order-sm-1 order-0 mb-sm-0 mb-2">
                        <img src="{{ $imageUrl }}" class="img-fluid" alt="{{ $localMover->slug }}-logo"
                            loading="lazy">
                    </div>
                </div>
                <p>
                    {{-- {{ $localMover->street }}, {{ $localMover->city->name }}, {{ $localMover->state->name }},
                    {{ $localMover->city->zip_code }} --}}
                    {{ $localMover->company_name }} is a licensed moving company based in
                    <strong>{{ $localMover->city->name }}, {{ $localMover->state->name }}</strong> operating under
                    <strong>DOT #{{ $localMover->us_dot_no ?? '' }}</strong>
                    @if (!empty($localMover->us_dot_no))
                        and
                        <strong>MC #{{ $localMover->icc_mc_license_no }}</strong>
                    @endif
                    . The business is fully registered with the Federal Motor Carrier Safety Administration (FMCSA), giving
                    customers added confidence in its legitimacy. The company has
                    <strong>{{ $positive_percentage }}%</strong> positive reviews and only
                    <strong>{{ $negative_percentage }}%</strong> negative feedback, reflecting strong overall customer
                    satisfaction.
                </p>
                {{-- <p>Safeway Moving (USDOT#3756000) is a veteran-owned company that excels at affordable interstate relocations,
                making them our top pick for overall value. We are impressed with the company’s comprehensive service
                offerings, including 30 days of free storage on all interstate moves. This benefit is crucial when your new
                home isn’t ready or you need time to settle in. </p>
                 <p>It’s one of the (best moving companies) available in all 50 states, including Alaska and Hawaii. Based on
                customer reviews, Safeway is praised for providing professional service with fair pricing and friendly
                customer support, giving you peace of mind that you won’t sacrifice quality to save money during an already
                stressful life transition.</p> --}}
                <p>{{ $localMover->company_about ?? 'Not Provided' }}</p>
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    <!-- Positive Review Box -->
                    <div class="review-box positive">
                        <div class="review-icon">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </div>
                        <p class="review-text">
                            <strong>{{ $positive_percentage }}%</strong> of reviews
                            are<br>positive
                        </p>
                    </div>

                    <!-- Negative Review Box -->
                    <div class="review-box negative">
                        <div class="review-icon">
                            <i class="bi bi-hand-thumbs-down"></i>
                        </div>
                        <p class="review-text">
                            <strong>{{ $negative_percentage }}%</strong> of reviews
                            are<br>negative
                        </p>
                    </div>
                </div>
                <div id="accordionExample" class="accordion other_accordion mt-4">
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $localMover->id }}1"
                                aria-expanded="false" aria-controls="collapse242"> Company Info</button></h2>
                        <div id="collapse{{ $localMover->id }}1" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="info-card">
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Founding Year
                                                        :</strong>{{ $localMover->founding_year ?? 'Not Provided' }}</p>
                                            </div>
                                            @if (!empty($localMover->us_dot_no))
                                                <div class="info-item">
                                                    <div class="info-icon">➜</div>
                                                    <p><strong>DOT # :</strong> {{ $localMover->us_dot_no }}</p>
                                                </div>
                                            @endif
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>FMCSA Rating :</strong>None</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-card">
                                            @if (!empty($localMover->trucks))
                                                <div class="info-item">
                                                    <div class="info-icon">➜</div>
                                                    <p><strong>Number of truck</strong>
                                                        {{ $localMover->trucks }} </p>
                                                </div>
                                            @endif
                                            @if (!empty($localMover->icc_mc_license_no))
                                                <div class="info-item">
                                                    <div class="info-icon">➜</div>
                                                    <p><strong>MC # :</strong>
                                                        {{ $localMover->icc_mc_license_no }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-card">

                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong> No deposit required</strong></p>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong> Pay by credit Card</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
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
                            if ($localMover->$field == 1) {
                                $hasService = true;
                                break;
                            }
                        }
                    @endphp
                    @if ($hasService)
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $localMover->id }}2"
                                    aria-expanded="false" aria-controls="collapse241">Services Offered</button></h2>
                            <div id="collapse{{ $localMover->id }}2" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    <div class="info-card">
                                        @if ($localMover->commercial_office_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Commercial / Office Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->local_mover == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Local Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->long_distance_mover == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Long Distance & Interstate Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->storage_services == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Storage Services</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->packing_unpacking_services == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Packing and Unpacking Services</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->residential_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Residential Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->international_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>International Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->specialty_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Specialty Moving (e.g., piano, antiques, etc.)</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->labor_only_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Labor-Only Moving</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->truck_rental == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Truck Rental</strong></p>
                                            </div>
                                        @endif
                                        @if ($localMover->containers_moving == 1)
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Moving Containers</strong></p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $localMover->id }}3"
                                aria-expanded="false" aria-controls="collapse240"> Average Cost</button></h2>
                        <div id="collapse{{ $localMover->id }}3" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <p>We found out that {{ $localMover->company_name }} determines its prices on various
                                    parameters, including the total weight of all your items and how far you are moving. The
                                    average cost of moving with {{ $localMover->company_name }} is usually
                                    between <b>${{ $min_price }}</b> and
                                    <b>${{ $max_price }}</b>. But remember — depending on which services you choose,
                                    like your specific moving
                                    package, this number can change. They accept several forms of payment like checks,
                                    credit
                                    card/debit cards and cash.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $localMover->id }}4"
                                aria-expanded="false" aria-controls="collapse239"> States Of Opertation </button></h2>
                        <div id="collapse{{ $localMover->id }}4" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <div class="info-card">
                                    @foreach ($usersUnique as $user)
                                        <div class="info-item">
                                            <div class="info-icon">➜</div>
                                            <p><strong>{{ $user->pickState->name }}</strong></p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <h2>Compare the Best Moving Companies in {{ $bestStatePage->state->name }}</h2>
        {!! $bestStatePage->compare_mover_content !!}
        <div class="table-responsive mt-5">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th style="background-color:#f0f3f6; color: #09171a; width: 20%;" class="sticky-column">
                            Companies</th>
                        <th style="background-color:#f0f3f6; color: #09171a;">Ratings</th>
                        <th style="background-color:#f0f3f6; color: #09171a;">Average Cost</th>
                        <th style="background-color:#f0f3f6; color: #09171a;">Quote</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movers as $table)
                        @php
                            $total_rating = $table->users->sum(function ($user) {
                                return (float) $user->overall_rating;
                            });

                            $total_reviews = $table->users->count();

                            if ($total_reviews > 0) {
                                $avg_rating = $total_rating / $total_reviews;
                            } else {
                                $avg_rating = 0;
                            }

                            $rounded = round($avg_rating, 1);
                            $min_price = $table->users->where('user_email_verified', 1)->min(function ($user) {
                                return (float) $user->service_cost;
                            });

                            $max_price = $table->users->where('user_email_verified', 1)->max(function ($user) {
                                return (float) $user->service_cost;
                            });

                            $imageUrl = str_starts_with($table->image, 'companies/image/')
                                ? URL::to('/' . $table->image)
                                : URL::to('/companies/image/' . $table->image);

                        @endphp
                        <tr>
                            <td class="sticky-column">
                                <div class="company-info">
                                    <div class="company-logo">
                                        <img src="{{ $imageUrl }}" alt="{{ $table->slug }}-logo" loading="lazy">
                                    </div>

                                </div>
                            </td>
                            <td class="data-cell">
                                <div class="d-flex justify-content-center align-items-center">
                                    <ul class="d-flex align-items-center list-unstyled mb-0 ms-2">
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
                                        {{ $rounded }}/5
                                    </ul>
                                </div>
                            </td>
                            <td>${{ $min_price }} to ${{ $max_price }}</td>

                            <td><a target="_blank" href="{{ route('contactMover', $table->slug) }}"
                                    class="action-btn">Get
                                    Estimate</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="container">
        <div class="col-lg-12 mx-auto mt-lg-0 mt-3">
            <div class="col-lg-9 mx-auto">
                <div id="compare_card">
                    <div class="row justify-content-center">
                        <h2 class="mb-4 form_heading text-center" style="font-size: 28px; font-weight: 700;">
                            Compare Movers
                        </h2>
                        <div class="col-5">
                            <div class="text-center p-3"
                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                <div class="img_wrapp">
                                    <img id="mover1_img" src="{{ asset('assets/img/mmj-favicon.png') }}" loading="lazy"
                                        alt="Mover 1" class="img-fluid">
                                </div>
                                <div class="mt-3">
                                    <select id="mover1" class="form-select select2-dropdown">
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
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/vector.png') }}" loading="lazy">
                        </div>
                        <div class="col-5">
                            <div class="text-center p-3"
                                style="border: 1px solid #116087;border-radius: 10px;background-color: #EBFAFF;">
                                <div class="img_wrapp">
                                    <img id="mover2_img" src="{{ asset('assets/img/mmj-favicon.png') }}" alt="Mover 2"
                                        class="img-fluid" loading="lazy">
                                </div>




                                <div class="mt-3">
                                    <select id="mover2" class="form-select select2-dropdown">
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
                        </div>
                    </div>

                    <div class="col-12 mx-auto" id="comparisonContent" style="display:none;">
                        <div class="row mx-auto justify-content-lg-center comparison-cards-container"
                            id="comparison-cards-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="content-wrapper mt-0">
        <div class="accordion other_accordion dropdow_accord my-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse238" aria-expanded="false" aria-controls="collapse238">
                        Other local movers in {{ $bestStatePage->state->name }}
                    </button>
                </h2>
                <div id="collapse238" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                    style="">
                    <div class="accordion-body">
                        <p>
                            Even though these {{ $bestStatePage->state->name }} movers didn’t make our top picks, they’re
                            still reliable
                            options worth checking out.
                        </p>

                        <div class="row" id="otherMoversContainer">
                            @foreach ($other_state_movers as $index => $mover)
                                <div class="col-md-6 mover-item {{ $index >= 10 ? 'hidden-mover' : '' }}">
                                    <ul class="mcc-bullet-list list-unstyled">
                                        <li><a
                                                href="{{ route('company.show', $mover->slug) }}">{{ $mover->company_name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        @if (count($other_state_movers) > 10)
                            <div class="text-center mt-3">
                                <a href="javascript:void(0)" id="toggleOtherMovers" class="see-toggle-link"
                                    style="color: #116087; font-weight: 600; text-decoration: none; cursor: pointer; font-size: 16px;">
                                    Show More
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h2 id="long_distance_mover">Best Long-Distance Movers Serving in {{ $bestStatePage->state->name }}</h2>
        {!! $bestStatePage->long_distance_mover_content !!}
        <div class="info-card">
            @foreach ($long_distance_movers as $longDistanceMoverList)
                @php
                    $total_rating = $longDistanceMoverList->company->users->sum(function ($user) {
                        return (float) $user->overall_rating;
                    });

                    $total_reviews = $longDistanceMoverList->company->users->count();

                    if ($total_reviews > 0) {
                        $avg_rating = $total_rating / $total_reviews;
                    } else {
                        $avg_rating = 0;
                    }

                    $rounded = round($avg_rating, 1);
                @endphp
                <div class="info-item">
                    <div class="info-icon">➜</div>
                    <p><strong>{{ $longDistanceMoverList->company->company_name }} :</strong> {{ $rounded }} out of 5
                        stars</p>
                </div>
            @endforeach
        </div>


        @foreach ($long_distance_movers as $longDistanceMover)
            @php
                $total_rating = $longDistanceMover->company->users->sum(function ($user) {
                    return (float) $user->overall_rating;
                });

                $total_reviews = $longDistanceMover->company->users->count();

                if ($total_reviews > 0) {
                    $avg_rating = $total_rating / $total_reviews;
                } else {
                    $avg_rating = 0;
                }

                $rounded = round($avg_rating, 1);
                $min_price = $longDistanceMover->company->users->where('user_email_verified', 1)->min(function ($user) {
                    return (float) $user->service_cost;
                });

                $max_price = $longDistanceMover->company->users->where('user_email_verified', 1)->max(function ($user) {
                    return (float) $user->service_cost;
                });

                $imageUrl = str_starts_with($longDistanceMover->company->image, 'companies/image/')
                    ? URL::to('/' . $longDistanceMover->company->image)
                    : URL::to('/companies/image/' . $longDistanceMover->company->image);

            @endphp

            {{-- <a class="row px-3 py-3" href="{{ route('company.show', $longDistanceMover->company->slug) }}"> --}}
            <div class="movers-card my-3">
                <div class="row movers-left">
                    <div class="col-lg-2 d-flex align-items-center justify-content-center flex-column">
                        <div class="logo">

                            <img loading="lazy" src="{{ $imageUrl }}"
                                alt="{{ $longDistanceMover->company->slug }}-logo" class="img-fluid" loading="lazy">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="inner_card">
                            <div class="badge-accent">{{ $longDistanceMover->company->company_name }}
                                @if ($longDistanceMover->company->is_claimed == 1)
                                    <span>
                                        <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}" class="verified-badge"
                                            alt="verified-badge" loading="lazy">

                                    </span>
                                @endif
                            </div>
                            <div class="based-on">Based on {{ $total_reviews }} reviews</div>
                            <ul class="rating_stars list-unstyled mb-0">
                                <li>
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
                                    <span class="avg_rat">{{ $rounded }}/5</span>
                                </li>
                            </ul>
                            <div class="">Address:
                                <span>{{ $longDistanceMover->company->company_address }}</span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-2 text-center d-flex flex-lg-column align-items-center justify-content-center gap-3 px-lg-0">
                        <a rel="nofollow" href="{{ route('company.show', $longDistanceMover->company->slug) }}"
                            class="profile-btn">Overview</a>
                        <a href="https://mymovingjourney.com/contact-mover/american-van-lines"
                            class="btn-comp mt-lg-0 mt-3  d-block text-center px-2">Contact Mover</a>
                    </div>
                </div>
            </div>
            {{-- </a> --}}
        @endforeach

        <h2 id="container_mover">Best Moving Container Companies in {{ $bestStatePage->state->name }}</h2>
        {!! $bestStatePage->container_mover_content !!}
    </div>
    <div class="container_featured">
        <div class="Featured_Partners">
            <div class="row g-4 justify-content-center">
                @foreach ($container_movers as $containerMover)
                    @php
                        $total_rating = $containerMover->company->users->sum(function ($user) {
                            return (float) $user->overall_rating;
                        });

                        $total_reviews = $containerMover->company->users->count();

                        if ($total_reviews > 0) {
                            $avg_rating = $total_rating / $total_reviews;
                        } else {
                            $avg_rating = 0;
                        }

                        $rounded = round($avg_rating, 1);
                        $min_price = $containerMover->company->users
                            ->where('user_email_verified', 1)
                            ->min(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $max_price = $containerMover->company->users
                            ->where('user_email_verified', 1)
                            ->max(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $imageUrl = str_starts_with($containerMover->company->image, 'companies/image/')
                            ? URL::to('/' . $containerMover->company->image)
                            : URL::to('/companies/image/' . $containerMover->company->image);

                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="partner-card  active ">
                            <div class="company_logo">
                                <img src="{{ $imageUrl }}" alt="{{ $containerMover->company->slug }}-logo"
                                    class="img-fluid" loading="lazy">
                            </div>
                            <div class="partner-header d-flex align-items-center justify-content-center">
                                <h5 class="company_name">{{ $containerMover->company->company_name }}</h5>
                            </div>
                            <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                <span class="rating"
                                    style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
                                    out of 5</span>
                            </div>
                            <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

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
                            <div class="partner-info" style="height: 190px !important">
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $containerMover->point_one }}</p>
                                </div>
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $containerMover->point_two }}</p>
                                </div>
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $containerMover->point_three }}</p>
                                </div>

                            </div>
                            <!--<hr>-->
                            {{-- <div class="partner-info">
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                </p>
                            </div> --}}
                            <a target="_blank" href="{{ route('contactMover', $containerMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <h2 id="truck_rental">Best Truck Rental Companies in {{ $bestStatePage->state->name }}</h2>
        {!! $bestStatePage->truck_rental_mover_content !!}
    </div>
    <div class="container_featured">
        <div class="Featured_Partners">
            <div class="row g-4 justify-content-center">
                @foreach ($truck_rental_movers as $truckRentalMover)
                    @php
                        $total_rating = $truckRentalMover->company->users->sum(function ($user) {
                            return (float) $user->overall_rating;
                        });

                        $total_reviews = $truckRentalMover->company->users->count();

                        if ($total_reviews > 0) {
                            $avg_rating = $total_rating / $total_reviews;
                        } else {
                            $avg_rating = 0;
                        }

                        $rounded = round($avg_rating, 1);
                        $min_price = $truckRentalMover->company->users
                            ->where('user_email_verified', 1)
                            ->min(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $max_price = $truckRentalMover->company->users
                            ->where('user_email_verified', 1)
                            ->max(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $imageUrl = str_starts_with($truckRentalMover->company->image, 'companies/image/')
                            ? URL::to('/' . $truckRentalMover->company->image)
                            : URL::to('/companies/image/' . $truckRentalMover->company->image);

                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <div class="partner-card  active ">
                            <div class="company_logo">
                                <img src="{{ $imageUrl }}" alt="{{ $truckRentalMover->company->slug }}-logo"
                                    class="img-fluid" loading="lazy">
                            </div>
                            <div class="partner-header d-flex align-items-center justify-content-center">
                                <h5 class="company_name">{{ $truckRentalMover->company->company_name }}</h5>
                            </div>
                            <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                <span class="rating"
                                    style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
                                    out of 5</span>
                            </div>
                            <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

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
                            <div class="partner-info" style="height: 190px !important">
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $truckRentalMover->point_one }}</p>
                                </div>
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $truckRentalMover->point_two }}</p>
                                </div>
                                <div class="d-flex align-items-center best_for">
                                    <img src={{ asset('assets/img/check-mark.png') }} class=" me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                    <p>{{ $truckRentalMover->point_three }}</p>
                                </div>

                            </div>
                            <!--<hr>-->
                            {{-- <div class="partner-info">
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13"
                                        loading="lazy">
                                </p>
                            </div> --}}
                            <a target="_blank" href="{{ route('contactMover', $truckRentalMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="content-wrapper">
        <div class="table-responsive cost-table">
            <table class="table table-bordered my-0">
                <thead>
                    <tr>
                        <th>Home Size</th>
                        <th>Avg. Total Cost</th>
                        <th>Cost Per Hour</th>
                        <th>No. of Movers</th>
                        <th>No. of Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Studio </td>
                        <td>$584</td>
                        <td>$182</td>
                        <td>2 movers</td>
                        <td>3 hours</td>
                    </tr>
                    <tr>
                        <td>1 BR</td>
                        <td>$769</td>
                        <td>$182</td>
                        <td>2 movers</td>
                        <td>4 hours</td>
                    </tr>
                    <tr>
                        <td>2 BR</td>
                        <td>$1,118</td>
                        <td>$246</td>
                        <td>3 movers</td>
                        <td>5 hours</td>
                    </tr>
                    <tr>
                        <td>3 BR</td>
                        <td>$2,463</td>
                        <td>$341</td>
                        <td>4 movers</td>
                        <td>8 hrs</td>
                    </tr>
                    <tr>
                        <td>4 BR</td>
                        <td>$2,876</td>
                        <td>$341</td>
                        <td>4 movers</td>
                        <td>9 hrs</td>
                    </tr>
                    <tr>
                        <td>5+ BR</td>
                        <td>$4,237</td>
                        <td>$482</td>
                        <td>5 movers</td>
                        <td>10 hrs</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
    <div class="content-wrapper">
        {!! $bestStatePage->bottom_content !!}
    </div>
    <section class="methodology-section">
        <h2 class="methodology-title">Our Methodology</h2>
        <p class="methodology-text">
            At MyMovingJourney, we analyze moving companies in {{ $bestStatePage->state->name }} based on what real
            customers are saying.
            If you’re searching for the best in the business, every review counts – and so do these other key metrics:
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
    </section>


    <section class="faq-section my-5">
        <h2>Frequently Asked Questions</h2>

        <div class="accordion mt-4" id="accordionExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                            aria-controls="collapse{{ $faq->id }}">
                            {!! $faq->question !!}
                        </button>
                    </h2>
                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // 4-Company Comparison JavaScript
        let selectedMovers = {};
        let allCompanies = @json($data);
        let comparisonDone = false;
        let availableCompaniesGlobal = [];

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
                // Always show Compare Now button when 2 different companies are selected
                $('#compare-now-btn').show();
                // Show More Companies button only if comparison has been done
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

            // Hide comparison results if selections change after comparison
            if (comparisonDone) {
                $('#comparisonResults').hide();
                $('#add-more-companies').hide();
                document.getElementById('companies-dropdown').classList.remove('show');
                comparisonDone = false;
                // Show Compare Now button again since comparison is reset
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
            // Show comparison results section
            document.getElementById("comparisonResults").style.display = "block";

            // Show loader and hide content initially
            document.getElementById("comparisonLoader").style.display = "flex";
            document.getElementById("comparisonContent").style.display = "none";

            try {
                // Get data from dropdown options instead of API
                const moverDataArray = moverIds.map(id => {
                    // Find the option in either dropdown
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
                        // Try to find in allCompanies as fallback
                        const mover = allCompanies.find(company => company.id == id);
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

                // Clear existing comparison cards
                const container = document.getElementById('comparison-cards-container');
                container.innerHTML = '';

                // Create comparison cards for each selected mover
                moverDataArray.forEach((moverData, index) => {
                    if (moverData) {
                        const cardHtml = createComparisonCard(moverData, moverIds.length);
                        container.innerHTML += cardHtml;
                    }
                });

                // Loading delay
                await new Promise(resolve => setTimeout(resolve, 500));

                // Hide loader and show content after data is populated
                document.getElementById("comparisonLoader").style.display = "none";
                document.getElementById("comparisonContent").style.display = "block";

                // Hide Compare Now button and show More Companies button
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
            // Dynamic column layout: 4 companies = 4 columns (col-lg-3), 1-3 companies = 3 columns (col-lg-4)
            const colClass = totalCards === 4 ? 'col-lg-3 col-md-6' : 'col-lg-4 col-md-6';

            return `
                <div class="${colClass} mb-4">
                    <div class="comparison-card">
                        <button class="remove-company-btn" onclick="removeCompanyFromComparison('${moverData.id}')" title="Remove Company">
                            ×
                        </button>
                        <div class="company-header">
                            <img class="company-logo" src="${moverData.image}" alt="${moverData.company_name}" style="width: 70%; border-radius: 0%; object-fit: cover;">
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
                                            <div class="rating-stars">
                                                ${generateStarRating(rating)}
                                            </div>
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
                                            <div class="review-count" style="color: #000; font-size: 18px; font-weight: 600;">${moverData.total_reviews || '0'} Reviews</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">Average Price:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="price-value">${moverData.average_price || 'Contact for Quote'}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">US DOT:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="detail-value">${moverData.us_dot || 'N/A'}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="c_titles">ICC MC NUMBER:</div>
                                        </div>
                                        <div class="col-7">
                                            <div class="detail-value">${moverData.icc_mc_number || 'N/A'}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a class="btn btn-get-quote" href="/contact-mover/${moverData.slug}" target="_blank">
                            Get Quote →
                        </a>
                        <a class="btn btn-learn-more" href="/mover/${moverData.slug}" target="_blank">
                            Learn More ▲
                        </a>
                    </div>
                </div>
            `;
        }

        function toggleCompaniesDropdown() {
            const dropdown = document.getElementById('companies-dropdown');

            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            } else {
                populateCompaniesDropdown();
                dropdown.classList.add('show');
            }
        }

        function populateCompaniesDropdown() {
            // Get currently selected company IDs
            const currentlySelected = Object.values(selectedMovers);

            // Filter out already selected companies
            availableCompaniesGlobal = allCompanies.filter(company =>
                !currentlySelected.includes(company.id.toString())
            );

            // Clear search input
            document.getElementById('company-search').value = '';

            // Display all available companies
            displayCompanies(availableCompaniesGlobal);
        }

        function displayCompanies(companies) {
            const dropdownGrid = document.getElementById('available-companies-grid');
            dropdownGrid.innerHTML = '';

            if (companies.length === 0) {
                dropdownGrid.innerHTML =
                    '<p style="text-align: center; color: #666; grid-column: 1 / -1;">No companies found.</p>';
            } else {
                companies.forEach(company => {
                    const imageUrl = company.image ?
                        (company.image.startsWith('companies/image/') ?
                            `{{ URL::to('/') }}/${company.image}` :
                            `{{ URL::to('/companies/image/') }}/${company.image}`) :
                        '{{ asset('img/samplelogo.webp') }}';

                    const companyItem = `
                        <div class="dropdown-company-item" onclick="addCompanyToComparison('${company.id}')">
                            <img src="${imageUrl}" alt="${company.company_name}" class="dropdown-company-img">
                            <div class="dropdown-company-name">${company.company_name}</div>
                        </div>
                    `;
                    dropdownGrid.innerHTML += companyItem;
                });
            }
        }

        function filterCompanies() {
            const searchTerm = document.getElementById('company-search').value.toLowerCase();

            if (searchTerm === '') {
                displayCompanies(availableCompaniesGlobal);
            } else {
                const filteredCompanies = availableCompaniesGlobal.filter(company =>
                    company.company_name.toLowerCase().includes(searchTerm)
                );
                displayCompanies(filteredCompanies);
            }
        }

        function addCompanyToComparison(companyId) {
            const currentMovers = Object.values(selectedMovers);

            // If we already have 4 companies, shift them
            if (currentMovers.length >= 4) {
                // Shift: 4th→3rd, 3rd→2nd, 2nd→1st, remove 1st
                const sortedSlots = Object.keys(selectedMovers).map(Number).sort((a, b) => a - b);

                // Remove the first (oldest) company
                delete selectedMovers[sortedSlots[0]];

                // Shift remaining companies
                const remainingMovers = [];
                for (let i = 1; i < sortedSlots.length; i++) {
                    remainingMovers.push(selectedMovers[sortedSlots[i]]);
                    delete selectedMovers[sortedSlots[i]];
                }

                // Reassign with new positions
                selectedMovers = {
                    1: remainingMovers[0],
                    2: remainingMovers[1],
                    3: remainingMovers[2],
                    4: companyId
                };
            } else {
                // Add to next available slot
                const nextSlot = Math.max(...Object.keys(selectedMovers).map(Number)) + 1;
                selectedMovers[nextSlot] = companyId;
            }

            // Close dropdown
            document.getElementById('companies-dropdown').classList.remove('show');

            // Refresh comparison with new company (no loading)
            const moverIds = Object.values(selectedMovers);
            updateComparisonSmoothly(moverIds);
        }

        function removeCompanyFromComparison(companyId) {
            // Find and remove the company from selectedMovers
            let removedSlot = null;
            for (const [slot, id] of Object.entries(selectedMovers)) {
                if (id == companyId) {
                    delete selectedMovers[slot];
                    removedSlot = parseInt(slot);
                    break;
                }
            }

            // Reorganize remaining companies to fill gaps
            const remainingMovers = Object.values(selectedMovers);
            selectedMovers = {};

            // Reassign with consecutive slots starting from 1
            remainingMovers.forEach((moverId, index) => {
                selectedMovers[index + 1] = moverId;
            });

            // If less than 2 companies remain, hide comparison
            if (remainingMovers.length < 2) {
                $('#comparisonResults').hide();
                $('#add-more-companies').hide();
                comparisonDone = false;
                // Show Compare Now button if 2 different companies are still selected in dropdowns
                const mover1 = $('#mover1').val();
                const mover2 = $('#mover2').val();
                if (mover1 && mover2 && mover1 !== mover2) {
                    $('#compare-now-btn').show();
                }
            } else {
                // Refresh comparison with remaining companies (no loading)
                updateComparisonSmoothly(remainingMovers);
            }
        }

        async function updateComparisonSmoothly(moverIds) {
            try {
                // Get data from dropdown options instead of API
                const moverDataArray = moverIds.map(id => {
                    // Find the option in either dropdown
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
                        // Try to find in allCompanies as fallback
                        const mover = allCompanies.find(company => company.id == id);
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

                // Clear existing comparison cards
                const container = document.getElementById('comparison-cards-container');
                container.innerHTML = '';

                // Create comparison cards for each selected mover
                moverDataArray.forEach((moverData, index) => {
                    if (moverData) {
                        const cardHtml = createComparisonCard(moverData, moverIds.length);
                        container.innerHTML += cardHtml;
                    }
                });

                // Show content immediately (no loading)
                document.getElementById("comparisonContent").style.display = "block";

            } catch (error) {
                console.error("Error in comparison:", error);
                alert("An error occurred while updating comparison. Please try again.");
            }
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

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('companies-dropdown');
            const button = document.getElementById('add-more-companies');

            if (dropdown && button && !dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Prevent dropdown from closing when clicking inside it
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('companies-dropdown');
            if (dropdown) {
                dropdown.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            }
        });

        // Update existing Select2 initialization to include new functionality
        $(document).ready(function() {
            $('#mover1, #mover2').select2({
                placeholder: 'Select a mover',
                allowClear: true,
                width: '100%'
            });

            // Bind the new handleMoverSelection function
            $('#mover1, #mover2').on('change', handleMoverSelection);
        });
    </script>



    <style>
        .hidden-mover {
            display: none !important;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
        }

        .mover-item {
            opacity: 1;
            max-height: 500px;
            transition: all 0.4s ease-in-out;
        }

        .see-toggle-link {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .see-toggle-link:hover {
            background-color: #116087;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(17, 96, 135, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleOtherMovers');
            if (!toggleBtn) return;

            const container = document.getElementById('otherMoversContainer');
            const hiddenMovers = container.querySelectorAll('.hidden-mover');
            let isExpanded = false;

            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const savedY = window.scrollY;

                isExpanded = !isExpanded;

                if (isExpanded) {
                    // Show all movers
                    hiddenMovers.forEach(mover => {
                        mover.classList.remove('hidden-mover');
                    });
                    toggleBtn.textContent = 'Show Less';

                    // Keep scroll position
                    window.scrollTo({
                        top: savedY
                    });
                } else {
                    // Hide extra movers
                    hiddenMovers.forEach(mover => {
                        mover.classList.add('hidden-mover');
                    });
                    toggleBtn.textContent = 'Show More';

                    // Keep scroll position
                    window.scrollTo({
                        top: savedY
                    });
                }
            });
        });
    </script>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "{{ $bestStatePage->meta_title }}",
        "url": "{{url()->current()}}",
        "description": "{{ $bestStatePage->meta_description }}",
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
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "My Moving Journey",
            "item": "https://mymovingjourney.com/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Find The Moving Companies By States",
            "item": "https://mymovingjourney.com/movers"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $bestStatePage->meta_title }}",
            "item": "{{url()->current()}}"
        }
        ]
    }
</script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @foreach ($faqs as $index => $faq)
          {
            "@type": "Question",
            "name": {!! json_encode(strip_tags($faq->question)) !!},
            "acceptedAnswer": {
              "@type": "Answer",
              "text": {!! json_encode(strip_tags($faq->answer)) !!}
            }
          }@if(!$loop->last),@endif
        @endforeach
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
        "inLanguage": "en-US",
        "actionPlatform": [
            "https://schema.org/DesktopWebPlatform",
            "https://schema.org/MobileWebPlatform"
        ]
    },
    "object": {
        "@type": "ItemList",
        "name": "Best Moving Companies in USA",
        "itemListElement": [
        
           @foreach ($long_distance_movers as $company)
           @php
                        // Calculate ratings for this company
                        $verified_users = $company->company->users->filter(
                            fn($u) => (int) $u->user_email_verified === 1 && !is_null($u->overall_rating),
                        );

                        $total_reviews = $verified_users->count();
                        $avg_rating = $total_reviews
                            ? $verified_users->filter(fn($u) => is_numeric($u->overall_rating))->map(fn($u) => (float) $u->overall_rating)->avg()
                            : 0;

                        $rounded = round((float) $avg_rating, 1);
                        
                        // Calculate min and max ratings
                        if ($total_reviews > 0) {
                            $max_rating = $verified_users->filter(fn($u) => is_numeric($u->overall_rating))->max('overall_rating') ?? 5;
                            $min_rating = $verified_users->filter(fn($u) => is_numeric($u->overall_rating))->min('overall_rating') ?? 1;
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

    <script type="application/ld+json" class="schema-cost">
        {
            "@context": "https://schema.org",
            "@type": "Service",
            "@id": "{{ url()->current() }}#service",
            "name": "Best Long Distance Moving Companies in {{ $bestStatePage->state->name }}",
            "serviceType": "Long-distance moving",
            "url": "{{ url()->current() }}",
              "provider": {
            "@type": "Organization",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com"
        },
            "areaServed": [
                { "@type": "State", "name": "{{ $bestStatePage->state->name }}" }
            ],
            "offers": {
                "@type": "AggregateOffer",
                "priceCurrency": "USD",
                "lowPrice": "$500",
                "highPrice": "$10,000",
                "url": "{{ url()->current() }}"
            }
        }
    </script>
    <script type="application/ld+json">
    {
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Plan and Execute a Long-Distance Move from {{ $bestStatePage->state->name }}",
  "description": "A step-by-step guide to planning, choosing movers, avoiding scams, and completing a successful long-distance move from {{ $bestStatePage->state->name }}.",
  "estimatedCost": {
    "@type": "MonetaryAmount",
    "currency": "USD",
    "value": "2000-5000"
  },
  "supply": [
    {
      "@type": "HowToSupply",
      "name": "Moving quotes from licensed interstate movers"
    }
   
  ],
 
  "step": [
    {
      "@type": "HowToStep",
      "name": "Research and plan your move",
      "text": "Decide where you're moving, set a budget, and research moving companies. Start 3 months before your move."
     
    },
    {
      "@type": "HowToStep",
      "name": "Get multiple quotes",
      "text": "Request and compare written estimates from at least 2-3 licensed long-distance movers in Alaska."
     
    },
    {
      "@type": "HowToStep",
      "name": "Verify licensing and insurance",
      "text": "Ensure your chosen mover is licensed by FMCSA and fully insured for interstate moves."
    
    },
    {
      "@type": "HowToStep",
      "name": "Book early and confirm details",
      "text": "Schedule your move well in advance, especially during peak season (May–September), and confirm all details in writing."
      
    },
    {
      "@type": "HowToStep",
      "name": "Prepare for moving day",
      "text": "Pack non-essentials, transfer records, change your address, and arrange for utilities to be disconnected."
      
    },
    {
      "@type": "HowToStep",
      "name": "Travel with essentials",
      "text": "Keep important documents, valuables, and travel bags with you, not on the moving truck."
     
    },
    {
      "@type": "HowToStep",
      "name": "Unpack and settle in",
      "text": "Unpack in stages, starting with essentials, and take your time settling into your new home."
    
    }
  ]
}
   
</script>
@endsection
