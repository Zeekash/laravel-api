@extends('layouts.app')
@section('title')
    Best Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} ({{ date('Y') }})
@endsection
@section('meta_description')
    @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving
        companies, get easy quotes, and make your move smooth and stress-free.
    @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
        Planning a move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Compare reliable movers and get easy
        estimates to make your move hassle-free.
    @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get
        easy quotes, and make your move smooth and stress-free.
    @elseif(in_array($cityPage->state->name, [
            'Florida',
            'Tennessee',
            'West Virginia',
            'Vermont',
            'Rhode Island',
            'New Jersey',
        ]))
        Moving in or out of {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find trusted movers, get quick quotes, and
        make your relocation smooth and worry-free.
    @elseif(in_array($cityPage->state->name, [
            'Massachusetts',
            'Connecticut',
            'Delaware',
            'Maine',
            'Maryland',
            'New Hampshire',
        ]))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies,
        get easy quotes, and make your move smooth and stress-free
    @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies,
        get easy quotes, and make your move smooth and stress-free.
    @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies,
        get easy quotes, and make your move smooth and stress-free.
    @elseif(in_array($cityPage->state->name, [
            'Washington',
            'Oregon',
            'North Carolina',
            'Virginia',
            'Oklahoma',
            'North Dakota',
        ]))
        Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies,
        get easy quotes, and make your move smooth and stress-free.
    @endif
@endsection
@section('meta_keywords')
{{ $cityPage->name }}, {{ $cityPage->state->abv }} Movers
@endsection
@section('head')
    <meta name="robots" content="index, follow">
@endsection
@section('og:title')
    Best Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} ({{ date('Y') }})
@endsection
@section('og:description')
    Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving
    companies, get easy quotes, and make your move smooth and stress-free.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/city_show_page.css') }}" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/city_show_page.css') }}">
   ] </noscript>
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

        span.c_rating {
            font-size: 24px;
            color: #116087;
            font-family: "Merriweather";
            font-weight: 500;
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
                        <li class="breadcrumb-item"><a
                                href="https://mymovingjourney.com/movers/{{ $cityPage->state->slug }}"
                                class="py-2">{{ $cityPage->state->name }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $cityPage->name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <h1>Best Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }}</h1>


        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <p class="subtitle">
                The best moving companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }}, include some of the most
                trusted moving
                companies that are known for their reliable service, affordable pricing, and experienced crews.
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach
                are the top rated choices for local and long-distance relocations.
            </p>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <p class="subtitle">
                The best moving companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} are known for good
                service, fair prices, and skilled workers.
                Some of the top choices for local and long-distance moves are
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach
                .
            </p>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <p class="subtitle">
                Some of the best movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} are known for showing up on
                time, offering reasonable rates, and handling moves with care.
                Many people choose
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach
                for both local moves and long-distance trips.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <p class="subtitle">
                Some of the best moving companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} are known for
                being dependable, reasonably priced, and easy to work with. Popular options for both local and long-distance
                moves include
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach. These companies are often praised for their helpful teams and quality
                service.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <p class="subtitle">
                {{ $cityPage->name }} has a range of highly rated companies known for their dependable service, skilled
                teams, and competitive rates. Top options for both nearby and long-distance moves include
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach. These companies consistently earn praise for making relocations smoother
                and more manageable.
            </p>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <p class="subtitle">
                {{ $cityPage->name }}, {{ $cityPage->state->abv }} offers a variety of reputable movers known for
                professionalism, fair rates, and skilled teams. Many residents rely on companies such as
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach
                all of which earn high marks for both nearby moves and long-distance transitions.
            </p>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <p class="subtitle">
                The best moving companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} are known for being
                reliable, affordable, and easy to work with. Some of the most trusted options include
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach.
                These companies are highly rated for both local moves and long-distance relocations.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <p class="subtitle">
                Some of the top movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} are known for showing up on
                time, offering fair prices, and sending crews who know what they’re doing. Companies like
                @foreach ($local_movers as $moverName)
                   <strong>{{ $moverName->company_name . (!$loop->last ? ',' : '') }}</strong>
                @endforeach
                are often recommended for both short local moves and longer trips out of the area.
            </p>
        @endif



        <div class="info-box">
            <h3>Ready to move? </h3>
            <p>
                Every move is different, and finding the right team makes all the difference. Let’s find the mover that fits
                your needs and budget today.
            </p>
            <ul class="info-list">
                <li><span class="highlight"><a href="#local_movers">Featured Movers</a></span></li>
                <li><span class="highlight"><a href="#local_movers">Best Local Movers in {{ $cityPage->name }}</a></span>
                </li>
                <li><span class="highlight"><a href="#long_distance_mover">Best Long Distance Movers</a></span></li>
                <li><span class="highlight"><a href="#container_mover">Best Moving Containers </a></span></li>
                <li><span class="highlight"><a href="#truck_rental">Best Truck Rentals</a></span></li>
            </ul>

            <div class="quote-box">
                <div class="bg_col">
                    <p class="mb-0">
                        Want to know what your move will cost?
                    </p>
                </div>
                <a href="https://mymovingjourney.com/moving-cost-calculator">
                    Get Quote</a>
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

        <h2 id="local_movers">Best Local Movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}</h2>

        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <p>If you’re planning a move within {{ $cityPage->name }} or to a nearby town in {{ $cityPage->state->name }},
                these local movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}
                are known for dependable service, professional crews, and affordable rates that make local relocations
                simple
                and stress-free.</p>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <p>
                If you are moving in {{ $cityPage->name }} or to a nearby area, these {{ $cityPage->name }} movers can
                help. They are known for doing good work, showing up on time, and offering prices that fit most budgets.
                They make local moves easier and less stressful.
            </p>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <p>
                If you’re moving within {{ $cityPage->name }} or to a nearby community, these local movers offer steady
                service, skilled teams, and prices that fit most budgets. They help make short-distance moves easier and
                less stressful.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <p>
                If you’re moving within {{ $cityPage->name }} or to a nearby {{ $cityPage->state->name }} town, these
                local movers are known for their reliable service, skilled teams, and budget-friendly prices. They help make
                short-distance moves easy and hassle-free.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <p>
                If you’re relocating in {{ $cityPage->name }} or nearby, these movers make the process easier with helpful
                teams, reliable service, and prices that won’t break the bank.
            </p>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <p>
                If you’re relocating within {{ $cityPage->name }} or to a nearby {{ $cityPage->state->name }} town, you
                have plenty of dependable moving options. Local companies in the area are known for showing up on time and
                handling belongings with care. They also offer reasonable pricing, which helps keep short-distance moves
                simple and stress-free.
            </p>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <p>
                If you’re moving within {{ $cityPage->name }} or to a nearby {{ $cityPage->state->name }} town, these
                local movers are known for their reliable service, skilled teams, and fair prices. They help make
                short-distance moves easy and worry-free.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <p>
                If you’re moving somewhere else in {{ $cityPage->name }} or heading to a nearby town in
                {{ $cityPage->state->name }}, there are plenty of local movers who can make the process easier. These
                companies are known for showing up on time, treating your belongings with care, and offering prices that fit
                most budgets.
            </p>
        @endif

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
                        $avg_rating = $total_reviews ? $verified->map(fn($u) => (float) $u->overall_rating)->avg() : 0;
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
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Number of truck</strong>
                                                    {{ $localMover->trucks ?? 'Not Provided' }} </p>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>MC number</strong>
                                                    {{ $localMover->icc_mc_license_no ?? 'Not Provided' }}</p>
                                            </div>
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
    </div>

    <div class="content-wrapper mt-0">

        <h2 id="long_distance_mover">Best Long-Distance Movers for Those Moving Out of {{ $cityPage->state->name }}</h2>

        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <p>If you’re planning a move beyond 100 miles or relocating out of {{ $cityPage->state->name }}, consider
                hiring
                one of these <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>highly
                        rated long-distance moving companies</b></a>. These are the ones people trust for smooth interstate
                moves.</p>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <p>
                If you’re moving more than 100 miles or leaving {{ $cityPage->state->name }}, it helps to hire a trusted
                long-distance moving company. These movers have good reviews and are known for handling interstate moves
                smoothly.
            </p>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <p>
                If you’re moving more than 100 miles or heading out of {{ $cityPage->state->name }}, it’s best to hire a
                trusted long-distance mover. These companies are known for handling interstate moves safely and keeping the
                process running smoothly.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <p>
                If you’re moving more than 100 miles or leaving {{ $cityPage->state->name }}, it’s best to choose one of
                these <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><strong>top-rated
                        long-distance movers</strong></a>. They’re well-known for handling interstate moves smoothly and
                reliably.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <p>
                For moves over 100 miles or out of {{ $cityPage->state->name }}, these <a
                    href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>top-rated
                        long-distance movers</b></a> are
                trusted to handle your belongings safely and make the journey as smooth as possible.
            </p>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <p>
                If you’re planning a move beyond 100 miles or relocating out of {{ $cityPage->state->name }}, consider
                hiring one of these <a
                    href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>highly rated
                        long-distance moving companies</b></a>. These are the ones people trust for smooth
                interstate moves.
            </p>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <p>
                If you’re moving more than 100 miles or leaving {{ $cityPage->state->name }}, it’s best to choose a <a
                    href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>trusted
                        long-distance moving company</b></a>. These top-rated movers are known for handling interstate moves
                smoothly and safely.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <p>
                If you need to move more than 100 miles or you’re leaving {{ $cityPage->state->name }}, it’s best to use a
                <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>trusted long-distance
                        moving company</b></a>. These movers handle long trips often, so they know how to keep your
                interstate move smooth and easy.
            </p>
        @endif

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
                    <p><strong>{{ $longDistanceMoverList->company->company_name }} :</strong> {{ $rounded }} out of
                        5
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

        <h2 id="container_mover">Best Moving Container in {{ $cityPage->name }}, {{ $cityPage->state->abv }}</h2>

        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <p>Moving containers give you a flexible way to move without paying for a full-service crew. You handle the
                packing
                and unpacking, while professionals take care of the driving and delivery. It’s a convenient option between
                hiring movers and renting a truck yourself.</p>
            <p>In {{ $cityPage->name }}, container prices depend on how many units you need and the distance of your move.
                The
                best way to
                save is to compare quotes from different companies or use our <a
                    href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> for a free
                estimate.
            </p>
            <p>Here are some of the <a
                    href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top-rated moving
                        container companies</b></a> to get you started:</p>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <p>
                Moving containers are a flexible option if you don’t want to hire a full moving crew. You pack and unpack on
                your own, and the company handles the driving and delivery. It’s a good middle choice between <a
                    href="https://mymovingjourney.com/blogs/rental-trucks-vs-professional-movers-which-saves-more"><b>hiring
                        movers</b></a>
                and renting a truck.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of containers depends on how many you need and how far you’re moving.
                The best way to save money is to compare quotes from different companies or use our <a
                    href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> for a free
                estimate.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top moving
                        container companies</b></a> to help you get started:
            </p>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <p>
                Moving containers give you a flexible option if you don’t want a full moving crew. You pack and unpack on
                your own, and the company transports the container to your new place. It’s a good middle-ground choice
                between hiring movers and renting a truck.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of containers changes based on the number of units you need and how far
                you’re moving. To save money, compare prices from several companies or try our moving cost calculator for a
                quick estimate.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top moving
                        container providers</b></a> to help you begin your search:
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <p>
                Moving containers offer a flexible option for relocating without hiring a full-service moving team. You pack
                and unpack your things, and the company handles the transportation. It’s a convenient middle ground between
                using movers and renting a truck on your own.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of containers depends on how many you need and how far you’re moving.
                To get the best price, compare quotes from several providers or try our <a
                    href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> for a free
                estimate.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top-rated
                        moving container companies</b></a> to help you begin your search:
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <p>
                Moving containers offer a flexible way to relocate without hiring a full moving team. You pack and unpack at
                your own pace, while the company handles transportation. It’s a great middle ground between hiring movers
                and renting a truck.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of containers varies based on how many you need and how far you’re
                moving. To find the best deal, compare quotes from several companies or use our moving cost calculator for a
                free estimate.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>highly
                        rated moving container companies</b></a> to help you get started:
            </p>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <p>
                Moving containers offer a more flexible alternative to traditional movers. You load and unload your
                belongings on your own schedule, while the company transports the container to your new address. This option
                sits comfortably between doing everything yourself with a rental truck and paying for full-service movers.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of container services varies based on how many containers you need and
                how far you’re moving. Comparing quotes from several providers is the easiest way to keep costs down. You
                can also use our <a href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost
                        calculator</b></a> to get a quick, free estimate.
            </p>
            <p>
                Below are several <a
                    href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>well-reviewed container
                        companies</b></a> to help you begin your search:
            </p>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <p>
                Moving containers offer a flexible option if you don’t want to hire a full moving crew. You pack and unpack
                your things, and the company handles the transport. It’s a handy middle-ground between hiring movers and
                doing everything on your own with a rental truck.
            </p>
            <p>
                In {{ $cityPage->name }}, the cost of containers depends on how many you need and how far you’re moving.
                You can save money by comparing prices from different companies or by using our <a
                    href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> for a free
                estimate.
            </p>
            <p>
                Here are a few <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top moving
                        container companies</b></a> to help you start your search:
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <p>
                Moving containers are a good choice if you want more control over your move. You pack your things and unpack
                them later. The company handles the driving and delivery. It’s a nice middle option between full-service
                movers and renting a truck on your own.
            </p>
            <p>
                In {{ $cityPage->name }}, the price of a container changes based on how many you need and how far you are
                moving. You can save money by checking prices from a few companies or by using our <a
                    href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> for a free
                estimate.
            </p>
            <p>
                Here are a few <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>top moving
                        container companies</b></a> to help you start your search:
            </p>
        @endif

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

                            <!--<hr>-->
                            <div class="partner-info">
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $containerMover->point_one }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $containerMover->point_two }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $containerMover->point_three }}
                                </p>
                            </div>
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
        <h2 id="truck_rental">Best Moving Truck Rental Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }}
        </h2>

        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <p><a href="https://mymovingjourney.com/blogs/moving-truck-rental-everything-you-need-to-know"><b>Renting a
                        moving truck</b></a> is one of the simplest ways to save money on your move. In
                {{ $cityPage->name }},
                it’s a
                popular
                choice for people who want control over their schedule and budget. You’ll handle the packing, loading, and
                driving yourself, but the lower cost makes it worth it for many local and out-of-state moves.</p>
            <p>Here are some <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>trusted
                        truck rental companies</b></a> that can help you get started.</p>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <p>
                <a href="https://mymovingjourney.com/blogs/moving-truck-rental-everything-you-need-to-know"><b>Renting a
                        moving truck</b></a> is an easy way to save money when you move. In {{ $cityPage->name }}, many
                people
                choose this option because it gives them control over their time and their budget. You do the packing,
                loading, and driving, but the lower cost makes it a good choice for many local and long-distance moves.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable
                        truck rental companies</b></a> to help you get started.
            </p>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <p>
                Renting a moving truck is an easy way to cut moving costs. In {{ $cityPage->name }}, many people choose
                this option because it lets them move on their own schedule and stick to their budget. You’ll be responsible
                for packing, loading, and driving, but the lower price makes it a great choice for both nearby moves and
                longer trips.
            </p>
            <p>
                Here are a few <a
                    href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable
                        truck rental companies</b></a> to get you started.
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <p>
                Renting a moving truck is one of the most budget-friendly ways to move. In {{ $cityPage->name }}, many
                people choose this option because it gives them control over their timing and expenses. You’ll be
                responsible for packing, loading, and driving, but the cheaper price makes it a great choice for both local
                and long-distance moves.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable
                        truck rental companies</b></a> to help you get started:
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <p>
                Renting a moving truck is an affordable way to handle your move on your own terms. In
                {{ $cityPage->name }}, many people choose this option to stay in control of their timing and expenses.
                You’ll be responsible for packing, loading, and driving, but the savings make it a smart choice for both
                local and long-distance moves.
            </p>
            <p>
                Here are some <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable
                        truck rental companies</b></a> to help you get started:
            </p>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <p>
                Choosing a rental truck is an easy way to keep moving costs low. Many {{ $cityPage->name }} residents
                prefer this option because it gives them full control over timing and expenses. You’ll be responsible for
                packing, loading, and driving the vehicle, but the savings often make it a smart choice for both short and
                long moves.
            </p>
            <p>
                Below are a few <a
                    href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable truck rental
                        companies</b></a> to consider as you begin planning.
            </p>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <p>
                <a href="https://mymovingjourney.com/blogs/moving-truck-rental-everything-you-need-to-know"><b>Renting a
                        moving truck</b></a> is an easy way to keep your moving costs low. Many people in
                {{ $cityPage->name }}
                choose this option because it gives them full control over their time and budget. You’ll be responsible for
                packing, loading, and driving, but the lower price often makes it a great choice for both local and
                long-distance moves.
            </p>
            <p>
                Here are a few <a
                    href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable truck rental
                        companies</b></a> to help you begin your planning:
            </p>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <p>
                Renting a truck is an easy way to cut moving costs in {{ $cityPage->name }}. Many people choose this
                option because it lets them move on their own schedule. You pack your things, load the truck, and drive it
                yourself. The price is usually lower than hiring a full crew, so it works well for both short and long
                moves.
            </p>
            <p>
                Here are a few <a href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>rental
                        companies</b></a> you can check out when you’re ready to get started.
            </p>
        @endif
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

                            <!--<hr>-->
                            <div class="partner-info">
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $truckRentalMover->point_one }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $truckRentalMover->point_two }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13"
                                        loading="lazy">{{ $truckRentalMover->point_three }}
                                </p>
                            </div>
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
        <div class="my-5">
            <section class="methodology-section">
                <h2 class="methodology-title">How we picked the best movers in {{ $cityPage->name }},
                    {{ $cityPage->state->abv }} </h2>
                <p class="methodology-text">
                    We focus on finding moving companies that offer real value and reliable moving services. We look at real
                    customer experiences and a few key factors that help separate the best movers from the rest:
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
                    <div class="label top l1">Customer reviews (25%)</div>
                    <div class="label bottom l2">Transparent pricing(20%)</div>
                    <div class="label top l3">Service coverage (15%)</div>
                    <div class="label bottom l4">Professionalism (15%)</div>
                    <div class="label top l5">License and insurance (10%)</div>
                    <div class="label bottom l6">Flexibility (10%)</div>
                    <div class="label top l7">Extra services (5%)</div>
                    {{-- <div class="label bottom l8">Additional services (10%)</div> --}}
                </div>
            </section>

        </div>
    </div>
    <div class="content-wrapper">
        <section class="mb-5">
            <h2>How to Select the Best Movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?</h2>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>It is not as hard as it sounds to find the best movers in {{ $cityPage->name }},
                    {{ $cityPage->state->abv }}, but you have to know what to look
                    for them. </p>
                <p>Here’s how you can find the best movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}:</p>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Check for license and insurance</div>
                            <div class="factor-text">Always make sure the mover is licensed and insured. This protects your
                                belongings in case something gets lost or <a
                                    href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"><b>damaged
                                        during the move.</b></a></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Read reviews and ask for recommendations</div>
                            <div class="factor-text">Look for customer reviews online and ask friends or family if they’ve
                                worked with any trusted moving companies in {{ $cityPage->name }}. Real experiences can
                                tell
                                you a lot
                                about how a company treats its customers.</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare quotes</div>
                            <div class="factor-text">Get quotes from at least three movers in {{ $cityPage->name }},
                                {{ $cityPage->state->abv }}. Compare not just
                                the price, but also what’s included, like packing help, supplies, or storage options.</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about experience and services</div>
                            <div class="factor-text">Choose professional movers in {{ $cityPage->name }} who have handled
                                moves similar to
                                yours, whether local, long-distance, or commercial. Ask what services they offer so you know
                                exactly what you’re paying for.</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Avoid large deposits</div>
                            <div class="factor-text">A reliable {{ $cityPage->name }} moving company won’t ask for a big
                                deposit upfront.
                                Pay only after your belongings are delivered safely.</div>
                        </div>
                    </div>
                </div>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>
                    Finding good movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} isn’t as hard as it seems,
                    but you do need to know what to look for.
                </p>

                <p>Here are a few tips to help you <a
                        href="https://mymovingjourney.com/blogs/how-to-choose-the-best-movers"><b>choose the right moving
                            company</b></a>:</p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Check for license and insurance</div>
                            <div class="factor-text">
                                Make sure the <a
                                    href="https://mymovingjourney.com/blogs/how-to-verify-a-movers-license-and-insurance"><b>mover
                                        is licensed and insured</b></a>. This protects your things if something gets
                                lost or damaged.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Read reviews and ask people you trust</div>
                            <div class="factor-text">
                                Look at online reviews and ask friends or family for suggestions. Real experiences can tell
                                you a lot about how a company treats its customers.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare quotes</div>
                            <div class="factor-text">
                                Get quotes from at least three movers in {{ $cityPage->name }}. Compare the prices and
                                what each company includes, like packing help or storage.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about experience and services</div>
                            <div class="factor-text">
                                Choose movers who have handled moves like yours — local, long-distance, or commercial. Ask
                                what services they offer so you know exactly what you’re getting.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Avoid large deposits</div>
                            <div class="factor-text">
                                A trustworthy {{ $cityPage->name }} moving company won’t ask for a big deposit upfront.
                                You should pay after your items are delivered safely.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>
                    It is so confusing to choose the right movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }},
                    but there are a few simple things that make the search much easier. Here are some tips to help you find
                    a moving company you can trust:
                </p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Confirm their credentials</div>
                            <div class="factor-text">
                                Ask the mover for their license information and proof of insurance. This protects you if
                                anything is damaged or misplaced during the move.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Check what other customers say</div>
                            <div class="factor-text">
                                Spend time reading online reviews and ratings. You can also talk to neighbors, coworkers, or
                                friends who recently moved in {{ $cityPage->name }} to see who they recommend.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare several quotes</div>
                            <div class="factor-text">
                                Reach out to a few different companies and ask for written estimates. Look closely at what
                                each quote includes — don’t choose based on price alone.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Look for experience that matches your needs</div>
                            <div class="factor-text">
                                Whether you’re moving a small apartment, a larger home, or an office, choose a mover that
                                has handled that type of job before. Ask about the services they offer so you know exactly
                                what’s covered.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Be cautious with upfront payments</div>
                            <div class="factor-text">
                                Most honest moving companies do not require large deposits. A small reservation fee might be
                                normal, but the majority of the cost should be paid once the move is completed.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>
                    Finding good movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} is easier than it seems —
                    you just need to know what to look for.
                    Here are some tips to help you choose the right moving company:
                </p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Make sure they’re licensed and insured</div>
                            <div class="factor-text">
                                This protects your belongings if <a
                                    href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"><b>anything
                                        gets damaged</b></a> or goes missing during the move.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Check reviews and get recommendations</div>
                            <div class="factor-text">
                                Read online reviews and ask people you trust if they’ve used any movers in
                                {{ $cityPage->name }}. Honest feedback can tell you a lot about a company’s reliability
                                and customer service.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare multiple quotes</div>
                            <div class="factor-text">
                                Reach out to at least three movers for estimates. Look at what each quote includes, not just
                                the price. Some may offer packing help, supplies, or storage.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about their experience and services</div>
                            <div class="factor-text">
                                Choose a company that has handled moves like yours — whether it’s local, long-distance, or
                                business-related. Make sure they offer the services you need.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Be cautious of big deposits</div>
                            <div class="factor-text">
                                A trustworthy moving company will not ask for a large upfront payment. You should only pay
                                once your items are delivered safely.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>
                    Finding good movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} doesn’t have to be
                    difficult if you know what to check for.
                </p>
                <p>Here are some tips to help:</p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Verify credentials</div>
                            <div class="factor-text">
                                Make sure any moving company you consider is properly licensed and insured. This protects
                                your belongings <a
                                    href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"><b>in
                                        case of damage</b></a> or loss.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Check feedback and referrals</div>
                            <div class="factor-text">
                                Look at online reviews and ask friends or family for recommendations. Hearing about others’
                                experiences can give you a clear idea of a company’s reliability.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare multiple estimates</div>
                            <div class="factor-text">
                                Reach out to at least three moving companies and compare their quotes. Don’t just look at
                                the price — check what’s included, such as packing services, supplies, or storage options.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about experience and offerings</div>
                            <div class="factor-text">
                                Choose movers who have handled moves like yours — whether it’s local, long-distance, or
                                commercial. Clarify which services are included so there are no surprises.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Be cautious with deposits</div>
                            <div class="factor-text">
                                Avoid companies that demand large upfront payments. A trustworthy {{ $cityPage->name }}
                                mover will ask for payment only after your items arrive safely.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>
                    Finding quality movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} is easier than many
                    people expect—you just need to know which factors matter most.
                </p>
                <p>Here are a few tips to help you choose the right moving company:</p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Verify licensing and insurance</div>
                            <div class="factor-text">
                                Make sure any mover you consider is properly licensed and carries insurance. This ensures
                                your items are protected if <a
                                    href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"><b>something
                                        gets damaged</b></a> or goes missing.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Look at reviews and get personal referrals</div>
                            <div class="factor-text">
                                Check what past customers have said online, and talk to friends or relatives who have
                                recently moved. First-hand experiences can reveal a lot about reliability and customer
                                service.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare multiple estimates</div>
                            <div class="factor-text">
                                Request quotes from at least three different {{ $cityPage->name }} movers. Look beyond the
                                price and review what each company includes, such as packing services, materials, or
                                storage.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about experience and available services</div>
                            <div class="factor-text">
                                Choose movers who have handled jobs similar to yours, whether it’s a short local move, a
                                long-distance relocation, or a business move. Clarify the services they provide so you know
                                exactly what to expect.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Be cautious with deposits</div>
                            <div class="factor-text">
                                Reputable movers in {{ $cityPage->name }} generally won’t demand a large payment upfront.
                                You should only pay once your belongings are delivered safely.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>
                    Finding the best movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} isn’t as difficult as
                    it seems — you just need to know what to check for.

                </p>
                <p> Here are a few tips to help you choose the right moving company:</p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Confirm license and insurance</div>
                            <div class="factor-text">
                                Make sure the mover is properly <a
                                    href="https://mymovingjourney.com/blogs/how-to-verify-a-movers-license-and-insurance"><b>licensed
                                        and insured</b></a>. This helps protect your belongings if
                                something goes missing or gets damaged.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Read reviews and get referrals</div>
                            <div class="factor-text">
                                Check online reviews and ask friends or family for suggestions. Hearing about real
                                experiences can give you a clear idea of how a company treats its customers.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Compare multiple quotes</div>
                            <div class="factor-text">
                                Reach out to at least three movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}
                                for estimates. Look at the total value, not just the price, so you understand what services
                                are included.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about experience and services</div>
                            <div class="factor-text">
                                Choose a mover that has experience with your type of relocation, whether it’s local,
                                long-distance, or commercial. Ask what services are available so you know what you’re
                                getting.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Be cautious with deposits</div>
                            <div class="factor-text">
                                Reliable moving companies in {{ $cityPage->name }} shouldn’t require a large deposit
                                upfront. You should only pay once your items have arrived safely.
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>
                    Finding good movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} is easier when you know
                    what to watch for. Here are a few things that can help you pick the right moving team:
                </p>

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Make sure they’re legit</div>
                            <div class="factor-text">
                                Ask if the company has a <a
                                    href="https://mymovingjourney.com/blogs/how-to-verify-a-movers-license-and-insurance"><b>license
                                        and insurance.</b></a> This keeps your things protected if
                                something goes wrong.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Look at what people say</div>
                            <div class="factor-text">
                                Check reviews online. Ask people you trust if they have worked with movers in
                                {{ $cityPage->name }} before. Honest feedback tells you a lot.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Get a few prices</div>
                            <div class="factor-text">
                                Talk to at least three companies and ask for their rates. Don’t look only at the number. See
                                what each company includes in the price.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Ask about their background</div>
                            <div class="factor-text">
                                Choose movers who already know how to handle the kind of move you need. That could be a
                                small apartment move, a long trip, or even an office move. Ask what they can do for you.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="factor-box">
                            <div class="factor-title">Don’t pay big money upfront</div>
                            <div class="factor-text">
                                Good movers won’t ask for a large deposit. Pay when your things arrive safely.
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </section>
        <section>
            <h2>How Much Do Movers Cost in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?</h2>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>The table below gives rough estimates for local moves in the {{ $cityPage->name }} area and nearby
                    suburbs.
                    You can also
                    read our guide on <a
                        href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>moving costs in
                            {{ $cityPage->state->name }}</b></a> for more detailed pricing information.
                </p>
                <p>Remember, these numbers are only averages. Actual prices can change based on your <a
                        href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>home size</b></a>,
                    distance,
                    and
                    services needed. For a more precise estimate, use our <a
                        href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> to see
                    what your move might
                    really cost.</p>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>
                    The table below gives you a general idea of what local moves cost in {{ $cityPage->name }} and the
                    nearby suburbs.
                    If you want more details, you can check out our <a
                        href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>{{ $cityPage->state->name }}
                            moving
                            cost guide</b></a>.
                </p>

                <p>
                    These numbers are only rough estimates. Your final price will change based on the <a
                        href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>size of your
                            home</b></a>, how
                    far you’re going,
                    and any extra help you request. For a clearer idea of your actual cost, use our moving cost calculator.
                    It will give you a more accurate estimate for your move.
                </p>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>
                    The chart below shows general price ranges for local moves around {{ $cityPage->name }} and nearby
                    neighborhoods.
                    For a deeper look at moving prices across the state, you can check out our
                    <a href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>{{ $cityPage->state->name }}
                            moving cost
                            guide</b></a>.
                </p>

                <p>
                    Keep in mind that these are only sample figures. Your final cost will depend on how big your place is,
                    how far you’re moving,
                    and any extra services you choose. For a more accurate number, use our <a
                        href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> to get
                    a
                    personalized estimate.
                </p>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>
                    The table below shows general price estimates for local moves in {{ $cityPage->name }} and the
                    surrounding areas. For more detailed information, you can check out our guide on <a
                        href="https://mymovingjourney.com/move-cost/florida"><b>{{ $cityPage->state->name }} moving
                            costs</b></a>.

                </p>

                <p>
                    Keep in mind that these are only average figures. Your actual cost will depend on factors like the size
                    of your home, how far you’re moving, and any extra services you choose. For a more accurate number, use
                    our <a href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> to
                    get a
                    personalized estimate.
                </p>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>
                    The table below shows approximate costs for local moves in {{ $cityPage->name }} and surrounding
                    towns. For more detailed information, check out our guide on <a
                        href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>moving costs in
                            {{ $cityPage->state->name }}</b></a>.
                </p>

                <p>
                    Keep in mind these are general averages — your actual moving expenses may vary depending on the size of
                    your home, distance, and extra services. Use <a
                        href="https://mymovingjourney.com/moving-cost-calculator"><b>our moving cost calculator</b></a>
                    for
                    a more accurate estimate
                    tailored to your move.
                </p>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>
                    The table below shows general price ranges for short-distance moves in {{ $cityPage->name }} and the
                    surrounding communities. For a deeper breakdown of expenses, you can check out our
                    <a href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>{{ $cityPage->state->name }}
                            moving cost
                            guide</b></a>.
                </p>

                <p>
                    Keep in mind that these figures are only typical estimates. Your final price will depend on factors like
                    the size of your home, how far you’re moving, and any extra services you request. If you want a more
                    accurate number, use <a href="https://mymovingjourney.com/moving-cost-calculator"><b>our moving cost
                            calculator</b></a> to get a personalized estimate.
                </p>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>
                    Local moving prices around {{ $cityPage->name }} can vary, but the table below gives you a general
                    idea of what people typically pay in the area. If you want more detailed information, you can also look
                    at our
                    <a href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>{{ $cityPage->state->name }}
                            moving cost guide</b></a>.
                </p>

                <p>
                    These costs are only estimates, so your final price may be higher or lower depending on your home size,
                    moving distance, and any extra services you need. For a more exact number, use our
                    <a href="https://mymovingjourney.com/moving-cost-calculator"><b>moving cost calculator</b></a> to
                    get a personalized estimate.
                </p>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>
                    The prices shown below can help you get a general idea of what local moves around
                    {{ $cityPage->name }} might cost. These numbers are only rough estimates, but you can also read our
                    guide on moving costs in
                    <a href="https://mymovingjourney.com/move-cost/{{ $cityPage->state->slug }}"><b>{{ $cityPage->state->name }}
                            moving cost guide</b></a> for more detailed pricing information.
                </p>

                <p>
                    Keep in mind that every move is different. Your final price will change based on how much stuff you
                    have, how far you’re going, and whether you add any extra services. If you want a clearer estimate, you
                    can use
                    <a href="https://mymovingjourney.com/moving-cost-calculator"><b>our moving cost calculator</b></a> to
                    see a number that fits your move more accurately.
                </p>
            @endif

            <h3>Average Local Moving Cost in {{ $cityPage->name }}, {{ $cityPage->state->abv }}</h3>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>In {{ $cityPage->name }}, you can hire professional movers starting at around
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>In {{ $cityPage->name }}, professional movers usually start at about
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour for their services.
                </p>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>In {{ $cityPage->name }}, moving companies typically begin their rates at about
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour for their
                    services</p>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>In {{ $cityPage->name }}, the starting rate for professional movers is usually around
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>Hiring professional movers in {{ $cityPage->name }} usually starts at roughly
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>In {{ $cityPage->name }}, professional moving services typically begin at about
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>In {{ $cityPage->name }}, professional moving services typically start at about
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>Most moving companies in {{ $cityPage->name }} begin their rates at about
                    {{ $avg_costs->first()->cost_hour ?? 'N/A' }} per hour.</p>
            @endif

            <div class="table-responsive cost-table">
                @php
                    $homeData = [
                        ['name' => 'Studio', 'movers' => 2, 'hours' => 3],
                        ['name' => '1 Bedroom', 'movers' => 2, 'hours' => 4],
                        ['name' => '2 Bedroom', 'movers' => 3, 'hours' => 5],
                        ['name' => '3 Bedroom', 'movers' => 4, 'hours' => 8],
                        ['name' => '4 Bedroom', 'movers' => 4, 'hours' => 9],
                        ['name' => '5+ Bedroom', 'movers' => 5, 'hours' => 10],
                    ];
                @endphp

                <table class="table table-bordered my-0">
                    <thead>
                        <tr>
                            <th>Home Size</th>
                            <th>Avg. Total Cost</th>
                            <th>Cost/hour</th>
                            <th># of Movers</th>
                            <th># Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($homeData as $index => $home)
                            <tr>
                                <td>{{ $home['name'] }}</td>
                                <td>{{ $avg_costs[$index]->avg_cost ?? 'N/A' }}</td>
                                <td>{{ $avg_costs[$index]->cost_hour ?? 'N/A' }}</td>
                                <td>{{ $home['movers'] }} movers</td>
                                <td>{{ $home['hours'] }} hours</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h3>Average Cost of Long-Distance Moves from {{ $cityPage->name }}</h3>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>The cost of moving from {{ $cityPage->name }} to another state depends on how far you’re going and how
                    much
                    you’re
                    taking with you. To give you a general idea, here are a few sample price ranges:
                </p>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>The price of an out-of-state move from {{ $cityPage->name }} changes based on the distance and the
                    amount of stuff you have. To help you get a sense of the costs, here are a few example price ranges:</p>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>The cost of moving from {{ $cityPage->name }} to another state depends on how far you’re going and how
                    much you’re taking with you. To give you a general idea, here are a few sample price ranges:</p>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>
                    The price for moving from {{ $cityPage->name }} to another state depends on the distance and the
                    amount of belongings you have. Here’s a general look at average price ranges:
                </p>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>
                    The cost of moving from {{ $cityPage->name }} to another state depends on how far you’re going and how
                    much you’re taking with you. To give you a general idea, here are a few sample price ranges:
                </p>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>
                    The price of an out-of-state move from {{ $cityPage->name }} varies based on the distance of the
                    relocation and the amount of belongings you’re transporting. To help set expectations, here are some
                    approximate cost ranges:
                </p>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>
                    The price of an out-of-state move from {{ $cityPage->name }} can vary based on the distance and the
                    amount of belongings you’re bringing. To help you get a basic idea, here are a few sample cost ranges:
                </p>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>
                    The cost of moving from {{ $cityPage->name }} to another state changes a lot. It depends on the
                    distance and the amount of stuff you bring. To give you a rough idea, here are some general price
                    ranges:
                </p>
            @endif

            <div class="info-card">
                @foreach ($route_costs as $routeCost)
                    <div class="info-item">
                        <div class="info-icon">➜</div>
                        <p><a
                                href="{{ $routeCost->route_link ?? '#' }}"><strong>{{ $routeCost->route_name }}</a>:</strong>
                            {{ $routeCost->route_value }}</p>
                    </div>
                @endforeach

            </div>
            <p class="mt-3">If your destination isn’t listed here, take a look at more <a
                    href="https://mymovingjourney.com/moving-routes"><b>popular moving routes</b></a> for other
                states.</p>
            <h2>What Services Do Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} Offer?</h2>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>Here are the main moving services you can find from professional movers in {{ $cityPage->name }}:</p>
                <ul class="save-list">
                    <li><strong>Local Moving Services:</strong> Most movers help with short-distance moves across the city.
                        Check out the <a href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best
                                local moving companies</b></a> to find reliable teams for local relocations.</li>
                    <li><strong>Long-Distance Moves:</strong> For moves across {{ $cityPage->state->name }} or to another
                        state, the <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving companies</b></a> can handle transport and logistics smoothly.</li>
                    <li><strong>Packing and Unpacking: </strong> Many movers offer packing help to save you time. You can
                        compare the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> for this service.</li>
                    <li><strong>Commercial and Office Moves: </strong> Businesses relocating in or out of
                        {{ $cityPage->name }} can rely on
                        the <a href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial moving companies</b></a> to move office furniture and equipment safely.</li>
                    <li><strong>Storage Solutions: </strong> If you need extra space before or after moving, then these <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>are
                                the
                                best self-storage companies</b></a> that provide secure and convenient storage options.</li>
                    <li><strong>Moving Containers: </strong> For flexible, self-paced moves, you can use portable containers
                        from the <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best
                                moving containers</b></a> in {{ $cityPage->name }}.</li>
                    <li><strong>Truck Rentals: </strong> If you prefer to move yourself, then rent a vehicle from the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best
                                moving truck rental companies</b></a> and manage your move on your own schedule.</li>
                    <li><strong>Specialty Moving Services: </strong> For delicate or oversized items like pianos or
                        antiques,
                        the <a href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a> have the tools and training to move them safely.</li>
                </ul>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>Here are the main types of moving services offered by movers in {{ $cityPage->name }}:</p>
                <ul class="save-list">

                    <li>
                        <strong>Local Moves:</strong>
                        Most movers can help with short-distance moves within the city. You can check out the best <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> to find a reliable team for a nearby move.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        If you’re moving to another part of {{ $cityPage->state->name }} or another state, long-distance
                        movers can handle the planning and travel. Take a look at the <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving companies</b></a> to
                        compare your options.
                    </li>

                    <li>
                        <strong>Packing Services:</strong>
                        Many companies also offer packing and unpacking if you want extra help. You can compare the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> for this service.
                    </li>

                    <li>
                        <strong>Office and Business Moves:</strong>
                        Businesses moving in or out of {{ $cityPage->name }} can hire commercial movers to transport
                        office furniture and equipment safely. Here are the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial
                                moving companies</b></a> you can use.
                    </li>

                    <li>
                        <strong>Storage Options:</strong>
                        If you need a secure place to store your items before or after the move, you can rent a unit from
                        the <a href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a>.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        For a move you want to handle at your own pace, you can use portable containers from the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers</b></a> in {{ $cityPage->name }}.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        If you’d rather move on your own, you can rent a vehicle from the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental companies</b></a>
                        and handle the drive yourself.
                    </li>

                    <li>
                        <strong>Specialty Item Moving:</strong>
                        For delicate or heavy items like pianos, antiques, or large furniture, the <a
                            href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a>
                        have the right tools and experience to move them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>Here are some of the main services offered by moving companies in {{ $cityPage->name }}:</p>
                <ul class="save-list">

                    <li>
                        <strong>Local Moving Services:</strong>
                        Many movers handle short-distance moves within the city. You can explore the <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> to find dependable teams for nearby moves.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        If you’re planning a move across {{ $cityPage->state->name }} or to another part of the country,
                        the <a href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best
                                long
                                distance moving companies</b></a> can take care of the long-haul transportation and
                        planning.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        Some companies offer packing services if you want extra help getting everything boxed up. Compare
                        options from the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> to see who fits your needs.
                    </li>

                    <li>
                        <strong>Commercial and Office Moves:</strong>
                        Businesses shifting locations in {{ $cityPage->name }} can count on the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial
                                moving
                                companies</b></a> to handle office equipment and workstations with care.
                    </li>

                    <li>
                        <strong>Storage Solutions:</strong>
                        If you need secure storage before or after your move, the <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a> offer safe and
                        flexible space for your belongings.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        For a slower, DIY-style move, you can rent portable units from the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers</b></a> in
                        {{ $cityPage->name }} and load them at your own pace.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        If you prefer to drive and move yourself, the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental companies</b></a> provide trucks of
                        different sizes so you can handle the move on your own timeline.
                    </li>

                    <li>
                        <strong>Specialty Moving Services:</strong>
                        When you need to move fragile or heavy items like antiques, pianos, or large furniture, the <a
                            href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best
                                specialty movers</b></a> have the right equipment and experience to move them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>Professional movers in {{ $cityPage->name }} offer a variety of services to fit different types of
                    relocations:</p>

                <ul class="save-list">

                    <li>
                        <strong>Local Moving Services:</strong>
                        Movers can handle short moves within {{ $cityPage->name }} efficiently. Explore the <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> to hire reliable teams for in-city relocations.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        Planning a move to another city or state? The <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving companies</b></a> can manage your
                        move smoothly from start to finish.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        Save time and stress by letting movers handle packing. Compare the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> for
                        professional packing services.
                    </li>

                    <li>
                        <strong>Commercial and Office Moves:</strong>
                        Companies relocating offices or commercial spaces in {{ $cityPage->name }} can trust the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial
                                moving
                                companies</b></a> to safely transport furniture and equipment.
                    </li>

                    <li>
                        <strong>Storage Solutions:</strong>
                        Need temporary storage for your items? Check out the <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a> that provide
                        secure, convenient storage options.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        For a move at your own pace, portable containers from the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers</b></a> in
                        {{ $cityPage->name }} offer flexibility and ease.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        If you prefer a DIY move, rent a truck from the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental companies</b></a> and manage your
                        move on your own schedule.
                    </li>

                    <li>
                        <strong>Specialty Moving Services:</strong>
                        For large or delicate items like pianos or antiques, the <a
                            href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a> have the right
                        equipment and expertise to handle them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>Professional movers in {{ $cityPage->name }} offer a variety of services to meet different moving
                    needs:</p>

                <ul class="save-list">

                    <li>
                        <strong>Local Moving Services:</strong>
                        Ideal for short-distance relocations within {{ $cityPage->name }}. Explore the <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> to find dependable teams for moves nearby.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        For moves across {{ $cityPage->state->name }} or to other states, the <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving
                                companies</b></a> handle transportation and logistics efficiently.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        Save time by letting professionals pack and unpack your belongings. Compare the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and
                                movers</b></a> for these services.
                    </li>

                    <li>
                        <strong>Commercial and Office Moves:</strong>
                        Companies relocating offices or commercial spaces in {{ $cityPage->name }} can count on the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial moving companies</b></a> to move furniture and equipment safely.
                    </li>

                    <li>
                        <strong>Storage Solutions:</strong>
                        Need extra space before or after your move? Check out the <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a> for secure and
                        convenient storage options.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        For a move at your own pace, portable containers from the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers</b></a> in
                        {{ $cityPage->name }} offer flexibility and convenience.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        If you prefer to handle the move yourself, rent a vehicle from the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental
                                companies</b></a> and move on your own schedule.
                    </li>

                    <li>
                        <strong>Specialty Moving Services:</strong>
                        For fragile or oversized items like pianos or antiques, the <a
                            href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a> have the right
                        equipment and expertise to transport them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>
                    Professional moving companies in {{ $cityPage->name }} offer a wide range of services to fit different
                    types of relocations. Here’s an overview of what you can expect:
                </p>

                <ul class="save-list">

                    <li>
                        <strong>Local Moves:</strong>
                        Moving within {{ $cityPage->name }} or nearby neighborhoods is the most common service. You can
                        browse <a href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>top-rated
                                local movers</b></a> to find teams that specialize in short-distance relocations.
                    </li>

                    <li>
                        <strong>Long-Distance Relocations:</strong>
                        If you’re heading elsewhere in {{ $cityPage->state->name }} or moving to another state, <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>reputable
                                long-distance movers</b></a> can manage the transportation and coordination for you.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        Many companies provide packing assistance to help you save time and protect your belongings. Compare
                        the <a href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> if you want professional packing help.
                    </li>

                    <li>
                        <strong>Office and Commercial Moves:</strong>
                        Businesses can hire <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>experienced
                                commercial moving companies</b></a> that know how to handle office
                        furniture, electronics, and essential equipment safely.
                    </li>

                    <li>
                        <strong>Storage Options:</strong>
                        If you need temporary space before or after your move, local facilities offer secure units in
                        various sizes. You can explore <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>self-storage
                                companies</b></a> (they also include storage among services) for
                        short- or long-term storage.
                    </li>

                    <li>
                        <strong>Portable Moving Containers:</strong>
                        Container services give you a flexible, do-it-yourself approach. You load your items, and the
                        provider handles transport. Several reliable companies offer moving containers in
                        {{ $cityPage->name }} with both moving and storage options.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        For a full DIY move, you can rent a vehicle from <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>trusted
                                moving truck rental companies</b></a> and handle
                        the entire process on your own timeline.
                    </li>

                    <li>
                        <strong>Specialty Item Moving:</strong>
                        Items like pianos, artwork, antiques, or other fragile belongings often require trained experts. You
                        can find <a href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>specialty
                                movers</b></a> with the tools and experience to move them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>
                    Here are the main moving services offered by professional movers in {{ $cityPage->name }}:
                </p>

                <ul class="save-list">

                    <li>
                        <strong>Local Moving Services:</strong>
                        Most movers handle short-distance moves within the city. You can look at the <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> to find dependable teams for nearby relocations.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        If you’re moving across {{ $cityPage->state->name }} or to another state, the <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving companies</b></a> can help with planning, transport, and delivery.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        Many movers provide packing services to save you time and effort. You can compare the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> if you need help getting everything boxed up.
                    </li>

                    <li>
                        <strong>Commercial and Office Moves:</strong>
                        Businesses moving in or out of {{ $cityPage->name }} can turn to the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial moving companies</b></a> to safely move office furniture, equipment, and files.
                    </li>

                    <li>
                        <strong>Storage Solutions:</strong>
                        When you need extra room before or after your move, the <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a> offer secure and convenient storage options.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        If you want a flexible, do-it-yourself style move, the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers in {{ $cityPage->name }}</b></a> can give you an easy middle-ground between
                        hiring movers and renting a truck.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        For full control over your move, you can rent a vehicle from the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental companies</b></a> and handle everything yourself.
                    </li>

                    <li>
                        <strong>Specialty Moving Services:</strong>
                        For fragile or heavy items like <a
                            href="https://mymovingjourney.com/blogs/how-to-move-a-piano"><b>pianos</b></a>, antiques, or
                        <a href="https://mymovingjourney.com/blogs/how-to-pack-artwork-for-moving"><b>artwork</b></a>, the
                        <a href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a> have the right tools and experience to move them safely.
                    </li>

                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>
                    Professional movers in {{ $cityPage->name }} offer many different services, and each one can help with
                    a specific part of your move.
                    Here’s what you can get:
                </p>

                <ul class="save-list">

                    <li>
                        <strong>Local Moving Services:</strong>
                        These services are great for short moves within the city. The <a
                            href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local moving
                                companies</b></a> can help you handle small or medium moves without any hassle.
                    </li>

                    <li>
                        <strong>Long-Distance Moves:</strong>
                        If you’re moving across state lines, the <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"><b>best long
                                distance moving companies</b></a> can manage the long trip and keep your things safe.
                    </li>

                    <li>
                        <strong>Packing and Unpacking:</strong>
                        If you don’t want to pack everything on your own, the <a
                            href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                packers and movers</b></a> can come in, handle your boxes, and make the process easier.
                    </li>

                    <li>
                        <strong>Commercial and Office Moves:</strong>
                        When a company needs to relocate, the <a
                            href="https://mymovingjourney.com/resource/best-commercial-moving-companies"><b>best
                                commercial moving companies</b></a> can move desks, equipment, and other items without
                        disrupting business too much.
                    </li>

                    <li>
                        <strong>Storage Solutions:</strong>
                        If you need a place to keep your things before or after the move, the <a
                            href="https://mymovingjourney.com/resource/best-self-storage-companies-in-usa"><b>best
                                self-storage companies</b></a> offer secure and flexible options.
                    </li>

                    <li>
                        <strong>Moving Containers:</strong>
                        For people who want more control and time, the <a
                            href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>best moving
                                containers in {{ $cityPage->name }}</b></a> offer a simple way to load your items at your
                        own pace.
                    </li>

                    <li>
                        <strong>Truck Rentals:</strong>
                        If you prefer to do everything yourself, the <a
                            href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>best moving
                                truck rental companies</b></a> let you drive your own move and stay on your own schedule.
                    </li>

                    <li>
                        <strong>Specialty Moving Services:</strong>
                        When you need to move fragile or heavy items, the <a
                            href="https://mymovingjourney.com/resource/best-specialty-movers-in-usa"><b>best specialty
                                movers</b></a> can handle things like pianos, artwork, and antiques with the right tools and
                        care.
                    </li>

                </ul>
            @endif

            <h2>Common Mistakes to Avoid When Moving in {{ $cityPage->name }}, {{ $cityPage->state->abv }}</h2>

            @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
                <p>Moving can get stressful fast, especially if you miss a few small details. Here are some common mistakes
                    people make when moving in {{ $cityPage->name }}:</p>
                <ul class="save-list">
                    <li><strong>Not booking early:</strong> Movers in {{ $cityPage->name }} get busy fast, especially
                        during
                        summer. Book a
                        few weeks ahead so you don’t end up with limited options.</li>
                    <li><strong>Skipping the estimate:</strong> Always ask for a free moving estimate before choosing a
                        mover.
                        It helps you compare prices and avoid surprise costs later.</li>
                    <li><strong>Not labeling boxes:</strong> Write clearly on each box so unpacking doesn’t turn into a
                        guessing
                        game.</li>
                    <li><strong>Ignoring insurance:</strong> Accidents happen. Make sure your mover offers coverage for your
                        items.</li>
                    <li><strong>Packing too late:</strong> Don’t wait until moving day. Start packing early and get supplies
                        ahead of time.</li>
                    <li><strong>Choosing only by price:</strong> Cheap doesn’t always mean good. Look for trusted moving
                        companies in {{ $cityPage->name }} with fair rates and real reviews.</li>
                </ul>
            @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
                <p>
                    Moving gets stressful quickly when small things are overlooked. Here are some common mistakes people
                    make during moves in {{ $cityPage->name }}:
                </p>
                <ul class="save-list">
                    <li>
                        <strong>Waiting too long to book:</strong>
                        Movers in {{ $cityPage->name }} fill up fast, especially in the summer. Schedule your move early
                        so you still have good choices.
                    </li>

                    <li>
                        <strong>Skipping the estimate:</strong>
                        Always get a free quote before you pick a mover. It helps you compare prices and avoid extra charges
                        later.
                    </li>

                    <li>
                        <strong>Not labeling your boxes:</strong>
                        Write what’s inside on every box. It makes unpacking much easier.
                    </li>

                    <li>
                        <strong>Forgetting about insurance:</strong>
                        Things can break during a move. Make sure the company offers <a
                            href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work"><b>coverage for your
                                belongings</b></a>.
                    </li>

                    <li>
                        <strong>Packing at the last minute:</strong>
                        Don’t wait until moving day. Start packing early and get your supplies ahead of time.
                    </li>

                    <li>
                        <strong>Choosing only based on price:</strong>
                        The lowest price doesn’t always mean the best service. Look for trusted moving companies in
                        {{ $cityPage->name }} that offer fair pricing and have good reviews.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
                <p>
                    Moving becomes overwhelming when small tasks slip through the cracks. Here are a few mistakes people
                    often make during moves in {{ $cityPage->name }}:
                </p>
                <ul class="save-list">
                    <li>
                        <strong>Waiting until the last minute to schedule:</strong>
                        Movers in {{ $cityPage->name }} can fill up quickly, especially during busy seasons. Try to book
                        well ahead of time so you have more choices.
                    </li>

                    <li>
                        <strong>Not getting a written quote:</strong>
                        Ask every moving company for a detailed estimate. It helps you compare prices and prevents
                        unexpected charges later on.
                    </li>

                    <li>
                        <strong>Leaving boxes unlabeled:</strong>
                        Mark each box with what’s inside and which room it belongs to. It makes unpacking much easier and
                        faster.
                    </li>

                    <li>
                        <strong>Overlooking insurance options:</strong>
                        Even careful movers can have accidents. Make sure you understand what coverage the company offers
                        for your belongings.
                    </li>

                    <li>
                        <strong>Starting the packing process too late:</strong>
                        Give yourself plenty of time to pack. Gathering supplies and preparing early can reduce a lot of
                        stress.
                    </li>

                    <li>
                        <strong>Picking a mover based only on cost:</strong>
                        The cheapest option isn’t always the best. Look for trusted moving companies in
                        {{ $cityPage->name }} that offer reasonable prices and positive customer reviews.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Florida',
                    'Tennessee',
                    'West Virginia',
                    'Vermont',
                    'Rhode Island',
                    'New Jersey',
                ]))
                <p>
                    Moving can be stressful if you overlook a few key details. Here are some common pitfalls to avoid when
                    moving in {{ $cityPage->name }}:
                </p>

                <ul class="save-list">
                    <li>
                        <strong>Waiting too long to book:</strong>
                        Moving companies in {{ $cityPage->name }} fill up quickly, especially during peak season. Reserve
                        your movers a few weeks in advance to secure the date you need.
                    </li>

                    <li>
                        <strong>Skipping a written estimate:</strong>
                        Always get a free moving quote before hiring a company. This helps you compare costs and prevents
                        <a href="https://mymovingjourney.com/blogs/how-to-avoid-hidden-fees-from-moving-companies"><b>unexpected
                                fees</b></a> later.
                    </li>

                    <li>
                        <strong>Forgetting to label boxes:</strong>
                        Clearly mark each box with its contents. Proper labeling makes unpacking much faster and easier.
                    </li>

                    <li>
                        <strong>Overlooking insurance:</strong>
                        Mishaps can happen. Confirm that your moving company provides <a
                            href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work"><b>insurance or
                                coverage</b></a> for your
                        belongings.
                    </li>

                    <li>
                        <strong>Procrastinating packing:</strong>
                        Don’t leave packing until the last minute. Start early and gather supplies ahead of time to avoid
                        stress.
                    </li>

                    <li>
                        <strong>Choosing solely on price:</strong>
                        The cheapest option isn’t always the best. Look for reliable movers in {{ $cityPage->name }} with
                        fair rates and positive reviews.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Massachusetts',
                    'Connecticut',
                    'Delaware',
                    'Maine',
                    'Maryland',
                    'New Hampshire',
                ]))
                <p>
                    Moving in {{ $cityPage->name }} can be tricky if you overlook some key details. Here are common
                    mistakes to avoid:
                </p>

                <ul class="save-list">
                    <li>
                        <strong>Delaying your booking:</strong>
                        {{ $cityPage->name }} movers fill up quickly, especially in summer. Reserve your movers early to
                        get the date you want.
                    </li>

                    <li>
                        <strong>Skipping a proper estimate:</strong>
                        Always request a free moving quote. It helps you compare costs and prevents <a
                            href="https://mymovingjourney.com/blogs/how-to-avoid-hidden-fees-from-moving-companies"><b>unexpected
                                fees</b></a>.
                    </li>

                    <li>
                        <strong>Forgetting to label boxes:</strong>
                        Clearly mark each box so unpacking is simple and organized.
                    </li>

                    <li>
                        <strong>Overlooking insurance:</strong>
                        Accidents can happen. Confirm that your mover provides coverage for your belongings.
                    </li>

                    <li>
                        <strong>Leaving packing until the last minute:</strong>
                        Start packing in advance and gather supplies ahead of time to reduce stress.
                    </li>

                    <li>
                        <strong>Focusing only on price:</strong>
                        The cheapest option isn’t always the best. Look for reliable moving companies in
                        {{ $cityPage->name }} with fair rates and positive reviews.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
                <p>
                    Moving can become overwhelming quickly, especially if you overlook a few important steps. Here are some
                    frequent mistakes people make during moves in {{ $cityPage->name }}:
                </p>

                <ul class="save-list">
                    <li>
                        <strong>Waiting too long to schedule a mover:</strong>
                        Local moving companies fill up fast, especially in the summer months. Reserve your date early so you
                        have plenty of choices.
                    </li>

                    <li>
                        <strong>Skipping the quote process:</strong>
                        Always request a free estimate before deciding on a mover. Comparing several quotes can prevent
                        unexpected charges later.
                    </li>

                    <li>
                        <strong>Forgetting to label boxes:</strong>
                        Mark each box with its contents and destination room. This makes unpacking faster and far less
                        confusing.
                    </li>

                    <li>
                        <strong>Overlooking insurance options:</strong>
                        No move is completely risk-free. Make sure your moving company offers protection for your
                        belongings.
                    </li>

                    <li>
                        <strong>Packing at the last minute:</strong>
                        Start packing ahead of time and gather supplies early so you’re not rushing on moving day.
                    </li>

                    <li>
                        <strong>Choosing a mover only because they’re cheap:</strong>
                        Low prices don’t always mean good service. Look for reputable{{ $cityPage->name }} moving
                        companies with solid reviews and reasonable rates.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
                <p>
                    Moving can become stressful quickly, especially if you overlook small but important steps. Here are some
                    common mistakes people make when moving in {{ $cityPage->name }}:
                </p>

                <ul class="save-list">
                    <li>
                        <strong>Waiting too long to book:</strong>
                        Movers fill up fast, especially in the summer. Schedule your move a few weeks in advance so you get
                        the date and company you want.
                    </li>

                    <li>
                        <strong>Skipping the estimate:</strong>
                        Always ask for a free quote before choosing a mover. It helps you compare prices and avoid
                        unexpected charges.
                    </li>

                    <li>
                        <strong>Not labeling boxes:</strong>
                        Clearly <a href="https://mymovingjourney.com/blogs/how-to-label-boxes-for-moving"><b>label every
                                box</b></a> so unpacking is easier and more organized.
                    </li>

                    <li>
                        <strong>Overlooking insurance:</strong>
                        Make sure your moving company provides coverage for your belongings in case something gets damaged.
                    </li>

                    <li>
                        <strong>Packing at the last minute:</strong>
                        Start packing early and gather your supplies ahead of time so you’re not rushed on moving day.
                    </li>

                    <li>
                        <strong>Choosing based only on price:</strong>
                        The cheapest option isn’t always the best. Look for movers with fair prices, good reviews, and a
                        reliable reputation in {{ $cityPage->name }}.
                    </li>
                </ul>
            @elseif(in_array($cityPage->state->name, [
                    'Washington',
                    'Oregon',
                    'North Carolina',
                    'Virginia',
                    'Oklahoma',
                    'North Dakota',
                ]))
                <p>
                    Moving gets overwhelming when little things slip through the cracks. Here are a few problems people
                    often run into when planning a move in {{ $cityPage->name }}:
                </p>

                <ul class="save-list">
                    <li>
                        <strong>Not booking early:</strong>
                        {{ $cityPage->name }} movers fill up fast, especially when the weather warms up. If you wait too
                        long, you may not get the date you want.
                    </li>

                    <li>
                        <strong>Skipping a quote:</strong>
                        Always get a free moving estimate before you choose a company. It helps you understand the cost and
                        avoid any surprises later.
                    </li>

                    <li>
                        <strong>Poor labeling:</strong>
                        Write clearly on your boxes. It makes unpacking faster and keeps you from opening the wrong boxes
                        again and again.
                    </li>

                    <li>
                        <strong>No coverage:</strong>
                        Make sure your mover offers insurance for your things. It’s an easy step that protects you if
                        <a href="https://mymovingjourney.com/blogs/how-to-file-a-damage-claim-after-a-move"><b>something
                                gets damaged.</b></a>
                    </li>

                    <li>
                        <strong>Last-minute packing:</strong>
                        Give yourself time. Packing the night before almost always leads to stress and mistakes.
                    </li>

                    <li>
                        <strong>Picking a mover only because they’re cheap:</strong>
                        Price matters, but reputation matters more. Look for trusted moving companies in
                        {{ $cityPage->name }} with solid reviews and fair rates.
                    </li>
                </ul>
            @endif
        </section>
    </div>
    <section class="faq-section my-5">
        <h2>Frequently Asked Questions</h2>

        @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse123" aria-expanded="false" aria-controls="collapse123">
                            How do I find reliable and affordable movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse123" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Start by checking licenses, reading customer reviews, and comparing quotes from at least
                                three
                                moving companies. Reliable movers will offer clear pricing, insurance options, and a free
                                moving
                                estimate before you book.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse124" aria-expanded="false" aria-controls="collapse124">
                            What time of year is cheapest to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse124" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                The cheapest time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}
                                is
                                during the off-season, usually from late
                                fall to early spring. Weekdays and mid-month dates also tend to have lower moving costs than
                                weekends or summer months.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse125" aria-expanded="false" aria-controls="collapse125">
                            Do moving companies in {{ $cityPage->name }} offer same-day or last-minute moves?
                        </button>
                    </h2>
                    <div id="collapse125" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes, some professional movers in {{ $cityPage->name }} handle same-day or short-notice
                                moves,
                                depending on
                                availability. Booking early is still the best way to secure good rates and guaranteed
                                service.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse126" aria-expanded="false" aria-controls="collapse126">
                            Can movers in {{ $cityPage->name }} help with packing and furniture assembly?
                        </button>
                    </h2>
                    <div id="collapse126" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Most {{ $cityPage->name }} moving companies offer extra services like packing, unpacking,
                                and
                                furniture
                                assembly for an added fee. You can check the <a
                                    href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                        packers and movers</b></a> list to find companies
                                that
                                include these options.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse127" aria-expanded="false" aria-controls="collapse127">
                            How do I get an accurate moving cost estimate in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse127" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Use our moving cost calculator or request a free moving estimate from several companies. The
                                final cost will depend on distance, home size, and any extra services like packing or
                                storage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse123" aria-expanded="false" aria-controls="collapse123">
                            How can I find trustworthy and affordable movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse123" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                A good way to start is by making sure the company is licensed, reading what past customers
                                say, and getting
                                quotes from a few different movers. Reliable movers should give you clear prices, insurance
                                options, and a
                                free estimate before you hire them.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse124" aria-expanded="false" aria-controls="collapse124">
                            When is the cheapest time to move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse124" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Moves are usually cheaper in the off-season, which is late fall through early spring.
                                Booking on weekdays
                                or in the middle of the month can also help you save money.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse125" aria-expanded="false" aria-controls="collapse125">
                            Do movers in {{ $cityPage->name }} offer last-minute or same-day moving services?
                        </button>
                    </h2>
                    <div id="collapse125" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some movers in {{ $cityPage->name }} can handle quick bookings or same-day moves if they
                                have room in their
                                schedule. Still, booking early is the safest way to get good prices and guaranteed service.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse126" aria-expanded="false" aria-controls="collapse126">
                            Can movers in {{ $cityPage->name }} help with packing or putting furniture together?
                        </button>
                    </h2>
                    <div id="collapse126" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes. Many moving companies offer packing, unpacking, and furniture assembly for an extra
                                charge. You can
                                look at the best packers and movers list to find companies that include these services.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse127" aria-expanded="false" aria-controls="collapse127">
                            How can I get an accurate moving quote in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse127" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                You can use our moving cost calculator or ask several moving companies for a free estimate.
                                Your final price
                                will depend on how far you’re moving, the size of your home, and any add-ons like packing or
                                storage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            How can I find trustworthy and budget-friendly movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                A good way to start is by confirming that the company is licensed, looking through customer
                                feedback, and gathering quotes from a few different movers. Reliable companies will clearly
                                explain their pricing, offer insurance options, and provide a free estimate before you
                                schedule anything.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            When is the most affordable time to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                You’ll usually find lower prices outside of the busy moving season, which runs through
                                summer. Late fall to early spring tends to be the cheapest time to move. Mid-month dates and
                                weekdays are often less expensive than weekends.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do movers in {{ $cityPage->name }} offer last-minute or same-day moving services?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some companies in {{ $cityPage->name }} can handle short-notice or same-day moves if they
                                have room on their schedule. Still, booking ahead gives you better rates and more dependable
                                availability.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can movers in {{ $cityPage->name }} take care of packing or putting furniture together?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes. Many moving companies offer add-on options like packing, unpacking, and furniture
                                assembly. You can use the <a
                                    href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>
                                        best packers and movers</b></a> list to find companies that provide these
                                services.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            What’s the best way to get an accurate moving quote in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                You can use our moving cost calculator or ask a few different movers for free estimates.
                                Your total price will depend on how far you’re moving, the size of your home, and whether
                                you need extra services such as packing or storage.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(in_array($cityPage->state->name, [
                'Florida',
                'Tennessee',
                'West Virginia',
                'Vermont',
                'Rhode Island',
                'New Jersey',
            ]))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            How can I find dependable and affordable movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Look for licensed movers, read customer reviews, and get quotes from at least three
                                companies. A trustworthy mover will provide clear pricing, insurance coverage, and a free
                                estimate before you book.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            When is the cheapest time to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Moving during the <a
                                    href="https://mymovingjourney.com/blogs/moving-in-peak-season-vs-off-season"><b>off-season</b></a>,
                                usually late fall through early spring, is generally less
                                expensive. Weekdays and mid-month dates also tend to cost less than weekends or peak summer
                                months.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do movers in {{ $cityPage->name }} offer same-day or last-minute services?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some movers can handle same-day or short-notice moves if their schedule allows. However,
                                booking early is the best way to lock in availability and better rates.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can movers in {{ $cityPage->name }} assist with packing and furniture assembly?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes. Many moving companies offer additional services like packing, unpacking, and furniture
                                assembly for an extra fee. Check the <a
                                    href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                        packers and movers</b></a> list to find companies that
                                include these services.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            How can I get an accurate moving cost estimate in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Use a moving cost calculator or request free estimates from multiple movers. The final price
                                depends on factors like distance, the size of your home, and any add-on services such as
                                packing or storage.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(in_array($cityPage->state->name, [
                'Massachusetts',
                'Connecticut',
                'Delaware',
                'Maine',
                'Maryland',
                'New Hampshire',
            ]))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            What’s the best way to find trustworthy and affordable movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Look for licensed movers, read online reviews, and get quotes from at least three companies.
                                A reputable mover will provide clear pricing, insurance coverage, and a free estimate before
                                you commit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            When is the most budget-friendly time to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Moving during the off-season, typically late fall through early spring, usually costs less.
                                Mid-week and mid-month dates also tend to be cheaper than weekends or peak summer months.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do movers in {{ $cityPage->name }} offer last-minute or same-day services?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some moving companies can accommodate short-notice or same-day moves if their schedule
                                allows. Booking ahead is still the best way to guarantee availability and better rates.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can movers in {{ $cityPage->name }} assist with packing and assembling furniture?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes. Many {{ $cityPage->name }} movers provide optional services like packing, unpacking,
                                and furniture assembly. Check the <a
                                    href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa"><b>best
                                        packers and movers</b></a> list to find companies that offer
                                these extras.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            How can I get a precise moving cost estimate in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Use our moving cost calculator or request free quotes from multiple movers. Your final price
                                depends on the distance, size of your home, and any additional services such as packing or
                                storage.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            How can I find trustworthy and budget-friendly movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Start by confirming that each company is licensed and insured. Then look through customer
                                reviews and gather quotes from at least three movers. Reputable companies provide
                                transparent pricing, insurance options, and a free estimate before you commit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            When is the least expensive time to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Moving costs are usually lowest during the slower season, which runs from late fall through
                                early spring. Weekday and mid-month appointments also tend to be cheaper than weekend or
                                peak summer dates.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do movers in {{ $cityPage->name }} offer last-minute or same-day services?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some moving companies can accommodate short-notice or same-day requests if their schedule
                                allows. However, booking early is the best way to lock in a good price and secure your
                                preferred date.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can {{ $cityPage->name }} movers help with packing or assembling furniture?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes, many moving companies offer add-on services such as packing, unpacking, and furniture
                                assembly. You can check local packers and movers to find companies that provide these
                                options.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            What’s the best way to get an accurate moving quote in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                You can use a moving cost calculator or request free estimates from several companies. Final
                                pricing depends on factors like moving distance, the size of your home, and whether you need
                                additional services such as packing or storage.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            How can I find dependable and budget-friendly movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Start by making sure the mover is licensed and has good customer reviews. It also helps to
                                get quotes from a few different companies so you can compare prices and services. A
                                trustworthy mover will be clear about costs and offer a free estimate before you hire them.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            When is the cheapest time to hire movers in {{ $cityPage->name }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Moving is usually less expensive from late fall through early spring. You can also save
                                money by choosing a weekday or a mid-month moving date instead of weekends or the busy
                                summer season.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do movers in {{ $cityPage->name }} offer last-minute or same-day service?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some moving companies can help with short-notice moves if they have an opening. Still,
                                booking ahead is the best way to get the time and price you want.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can {{ $cityPage->name }} movers help with packing or putting furniture together?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes, many moving companies offer packing, unpacking, and basic furniture assembly for an
                                extra fee. Ask about these services when you request your quote.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            How can I get an accurate moving price in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                The best way is to ask several companies for a free estimate. You can also use a moving cost
                                calculator to get a general idea. Your final price will depend on your home size, how far
                                you’re moving, and any extra services you need.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @elseif(in_array($cityPage->state->name, [
                'Washington',
                'Oregon',
                'North Carolina',
                'Virginia',
                'Oklahoma',
                'North Dakota',
            ]))
            <div class="accordion mt-4" id="accordionExample">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            How do I find reliable and affordable movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                A good way to start is by checking the mover’s license and reading what past customers say.
                                Get a few quotes and compare them. A trustworthy company will explain its prices, offer
                                insurance options, and give you a free estimate before you decide.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            What time of year is cheapest to hire movers in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                You’ll usually find lower prices during the slower months, which are late fall through early
                                spring. Weekdays often cost less than weekends, and mid-month dates tend to have better
                                availability.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Do moving companies in {{ $cityPage->name }} offer same-day or last-minute moves?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Some movers in {{ $cityPage->name }} can help with a same-day or short-notice move if they
                                have room on their schedule. Still, booking early gives you better rates and more choices.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            Can movers in {{ $cityPage->name }} help with packing and furniture assembly?
                        </button>
                    </h2>
                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Yes. Many {{ $cityPage->name }} moving companies offer add-on services like packing,
                                unpacking, and putting furniture together. These services usually come with an extra fee.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            How do I get an accurate moving cost estimate in {{ $cityPage->name }},
                            {{ $cityPage->state->abv }}?
                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                Use our moving cost calculator or ask a few companies for a free quote. Your price will
                                depend on how far you’re going, the size of your home, and whether you add services like
                                packing or storage.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        @endif

    </section>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "Best Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }} ({{ date('Y') }})",
            "url": "{{ url()->current() }}",
            "description":
            @if (in_array($cityPage->state->name, ['Alabama','Arkansas','Kentucky','Louisiana','Mississippi','South Carolina']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @elseif(in_array($cityPage->state->name, ['California','New York','Illinois','Pennsylvania','Ohio','Georgia']))
                "Planning a move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Compare reliable movers and get easy estimates to make your move hassle-free."
            @elseif(in_array($cityPage->state->name, ['Colorado','Idaho','Montana','Nevada','New Mexico','Utah']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @elseif(in_array($cityPage->state->name, ['Florida','Tennessee','West Virginia','Vermont','Rhode Island','New Jersey']))
                "Moving in or out of {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find trusted movers, get quick quotes, and make your relocation smooth and worry-free."
            @elseif(in_array($cityPage->state->name, ['Massachusetts','Connecticut','Delaware','Maine','Maryland','New Hampshire']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @elseif(in_array($cityPage->state->name, ['Michigan','Indiana','Iowa','Kansas','Minnesota','Missouri']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @elseif(in_array($cityPage->state->name, ['Texas','Arizona','Nebraska','South Dakota','Wisconsin','Wyoming']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @elseif(in_array($cityPage->state->name, ['Washington','Oregon','North Carolina','Virginia','Oklahoma','North Dakota']))
                "Looking to move in or around {{ $cityPage->name }}, {{ $cityPage->state->abv }}? Find reliable moving companies, get easy quotes, and make your move smooth and stress-free."
            @else
                "Find reliable moving companies and get easy quotes for your move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}."
            @endif
        }
        </script>
    <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "WebSite",
                "name": "My Moving Journey",
                "url": "https://www.mymovinjourney.com"
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
                    "name": "Home",
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
                    "name": "Best Moving Companies in {{ $cityPage->state->name }}",
                    "item": "https://mymovingjourney.com/movers/{{ $cityPage->state->slug }}"
                },
                {
                    "@type": "ListItem",
                    "position": 4,
                    "name": "Find reliable moving companies and get easy quotes for your move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}.",
                    "item": "{{url()->current()}}"
                }
                ]
            }
        </script>
    @if (in_array($cityPage->state->name, ['Alabama', 'Arkansas', 'Kentucky', 'Louisiana', 'Mississippi', 'South Carolina']))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How do I find reliable and affordable movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by checking licenses, reading customer reviews, and comparing quotes from at least three moving companies. Reliable movers will offer clear pricing, insurance options, and a free moving estimate before you book."
                }
            },
            {
                "@type": "Question",
                "name": "What time of year is cheapest to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cheapest time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }} is during the off-season, usually from late fall to early spring. Weekdays and mid-month dates also tend to have lower moving costs than weekends or summer months."
                }
            },
            {
                "@type": "Question",
                "name": "Do moving companies in {{ $cityPage->name }} offer same-day or last-minute moves?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, some professional movers in {{ $cityPage->name }} handle same-day or short-notice moves, depending on availability. Booking early is still the best way to secure good rates and guaranteed service."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} help with packing and furniture assembly?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most {{ $cityPage->name }} moving companies offer extra services like packing, unpacking, and furniture assembly for an added fee. You can check the best packers and movers list at https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa to find companies that include these options."
                }
            },
            {
                "@type": "Question",
                "name": "How do I get an accurate moving cost estimate in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Use our moving cost calculator or request a free moving estimate from several companies. The final cost will depend on distance, home size, and any extra services like packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, ['California', 'New York', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia']))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How can I find trustworthy and affordable movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A good way to start is by making sure the company is licensed, reading what past customers say, and getting quotes from a few different movers. Reliable movers should give you clear prices, insurance options, and a free estimate before you hire them."
                }
            },
            {
                "@type": "Question",
                "name": "When is the cheapest time to move in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moves are usually cheaper in the off-season, which is late fall through early spring. Booking on weekdays or in the middle of the month can also help you save money."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer last-minute or same-day moving services?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some movers in {{ $cityPage->name }} can handle quick bookings or same-day moves if they have room in their schedule. Still, booking early is the safest way to get good prices and guaranteed service."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} help with packing or putting furniture together?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Many moving companies offer packing, unpacking, and furniture assembly for an extra charge. You can look at the best packers and movers list at https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa to find companies that include these services."
                }
            },
            {
                "@type": "Question",
                "name": "How can I get an accurate moving quote in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You can use our moving cost calculator or ask several moving companies for a free estimate. Your final price will depend on how far you’re moving, the size of your home, and any add-ons like packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, ['Colorado', 'Idaho', 'Montana', 'Nevada', 'New Mexico', 'Utah']))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How can I find trustworthy and budget-friendly movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A good way to start is by confirming that the company is licensed, looking through customer feedback, and gathering quotes from a few different movers. Reliable companies will clearly explain their pricing, offer insurance options, and provide a free estimate before you schedule anything."
                }
            },
            {
                "@type": "Question",
                "name": "When is the most affordable time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You’ll usually find lower prices outside of the busy moving season, which runs through summer. Late fall to early spring tends to be the cheapest time to move. Mid-month dates and weekdays are often less expensive than weekends."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer last-minute or same-day moving services?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some companies in {{ $cityPage->name }} can handle short-notice or same-day moves if they have room on their schedule. Still, booking ahead gives you better rates and more dependable availability."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} take care of packing or putting furniture together?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Many moving companies offer add-on options like packing, unpacking, and furniture assembly. You can use the best packers and movers list at https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa to find companies that provide these services."
                }
            },
            {
                "@type": "Question",
                "name": "What’s the best way to get an accurate moving quote in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You can use our moving cost calculator or ask a few different movers for free estimates. Your total price will depend on how far you’re moving, the size of your home, and whether you need extra services such as packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, [
            'Florida',
            'Tennessee',
            'West Virginia',
            'Vermont',
            'Rhode Island',
            'New Jersey',
        ]))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How can I find dependable and affordable movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Look for licensed movers, read customer reviews, and get quotes from at least three companies. A trustworthy mover will provide clear pricing, insurance coverage, and a free estimate before you book."
                }
            },
            {
                "@type": "Question",
                "name": "When is the cheapest time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving during the off-season, usually late fall through early spring, is generally less expensive. Weekdays and mid-month dates also tend to cost less than weekends or peak summer months."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer same-day or last-minute services?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some movers can handle same-day or short-notice moves if their schedule allows. However, booking early is the best way to lock in availability and better rates."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} assist with packing and furniture assembly?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Many moving companies offer additional services like packing, unpacking, and furniture assembly for an extra fee. Check the best packers and movers list at https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa to find companies that include these services."
                }
            },
            {
                "@type": "Question",
                "name": "How can I get an accurate moving cost estimate in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Use a moving cost calculator or request free estimates from multiple movers. The final price depends on factors like distance, the size of your home, and any add-on services such as packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, [
            'Massachusetts',
            'Connecticut',
            'Delaware',
            'Maine',
            'Maryland',
            'New Hampshire',
        ]))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What’s the best way to find trustworthy and affordable movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Look for licensed movers, read online reviews, and get quotes from at least three companies. A reputable mover will provide clear pricing, insurance coverage, and a free estimate before you commit."
                }
            },
            {
                "@type": "Question",
                "name": "When is the most budget-friendly time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving during the off-season, typically late fall through early spring, usually costs less. Mid-week and mid-month dates also tend to be cheaper than weekends or peak summer months."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer last-minute or same-day services?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some moving companies can accommodate short-notice or same-day moves if their schedule allows. Booking ahead is still the best way to guarantee availability and better rates."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} assist with packing and assembling furniture?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Many {{ $cityPage->name }} movers provide optional services like packing, unpacking, and furniture assembly. Check the best packers and movers list at https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa to find companies that offer these extras."
                }
            },
            {
                "@type": "Question",
                "name": "How can I get a precise moving cost estimate in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Use our moving cost calculator or request free quotes from multiple movers. Your final price depends on the distance, size of your home, and any additional services such as packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, ['Michigan', 'Indiana', 'Iowa', 'Kansas', 'Minnesota', 'Missouri']))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How can I find trustworthy and budget-friendly movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by confirming that each company is licensed and insured. Then look through customer reviews and gather quotes from at least three movers. Reputable companies provide transparent pricing, insurance options, and a free estimate before you commit."
                }
            },
            {
                "@type": "Question",
                "name": "When is the least expensive time to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving costs are usually lowest during the slower season, which runs from late fall through early spring. Weekday and mid-month appointments also tend to be cheaper than weekend or peak summer dates."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer last-minute or same-day services?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some moving companies can accommodate short-notice or same-day requests if their schedule allows. However, booking early is the best way to lock in a good price and secure your preferred date."
                }
            },
            {
                "@type": "Question",
                "name": "Can {{ $cityPage->name }} movers help with packing or assembling furniture?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, many moving companies offer add-on services such as packing, unpacking, and furniture assembly. You can check local packers and movers to find companies that provide these options."
                }
            },
            {
                "@type": "Question",
                "name": "What’s the best way to get an accurate moving quote in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You can use a moving cost calculator or request free estimates from several companies. Final pricing depends on factors like moving distance, the size of your home, and whether you need additional services such as packing or storage."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, ['Texas', 'Arizona', 'Nebraska', 'South Dakota', 'Wisconsin', 'Wyoming']))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How can I find dependable and budget-friendly movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by making sure the mover is licensed and has good customer reviews. It also helps to get quotes from a few different companies so you can compare prices and services. A trustworthy mover will be clear about costs and offer a free estimate before you hire them."
                }
            },
            {
                "@type": "Question",
                "name": "When is the cheapest time to hire movers in {{ $cityPage->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving is usually less expensive from late fall through early spring. You can also save money by choosing a weekday or a mid-month moving date instead of weekends or the busy summer season."
                }
            },
            {
                "@type": "Question",
                "name": "Do movers in {{ $cityPage->name }} offer last-minute or same-day service?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some moving companies can help with short-notice moves if they have an opening. Still, booking ahead is the best way to get the time and price you want."
                }
            },
            {
                "@type": "Question",
                "name": "Can {{ $cityPage->name }} movers help with packing or putting furniture together?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, many moving companies offer packing, unpacking, and basic furniture assembly for an extra fee. Ask about these services when you request your quote."
                }
            },
            {
                "@type": "Question",
                "name": "How can I get an accurate moving price in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The best way is to ask several companies for a free estimate. You can also use a moving cost calculator to get a general idea. Your final price will depend on your home size, how far you’re moving, and any extra services you need."
                }
            }
        ]
    }
    </script>
    @elseif(in_array($cityPage->state->name, [
            'Washington',
            'Oregon',
            'North Carolina',
            'Virginia',
            'Oklahoma',
            'North Dakota',
        ]))
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "How do I find reliable and affordable movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A good way to start is by checking the mover’s license and reading what past customers say. Get a few quotes and compare them. A trustworthy company will explain its prices, offer insurance options, and give you a free estimate before you decide."
                }
            },
            {
                "@type": "Question",
                "name": "What time of year is cheapest to hire movers in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You’ll usually find lower prices during the slower months, which are late fall through early spring. Weekdays often cost less than weekends, and mid-month dates tend to have better availability."
                }
            },
            {
                "@type": "Question",
                "name": "Do moving companies in {{ $cityPage->name }} offer same-day or last-minute moves?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Some movers in {{ $cityPage->name }} can help with a same-day or short-notice move if they have room on their schedule. Still, booking early gives you better rates and more choices."
                }
            },
            {
                "@type": "Question",
                "name": "Can movers in {{ $cityPage->name }} help with packing and furniture assembly?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Many {{ $cityPage->name }} moving companies offer add-on services like packing, unpacking, and putting furniture together. These services usually come with an extra fee."
                }
            },
            {
                "@type": "Question",
                "name": "How do I get an accurate moving cost estimate in {{ $cityPage->name }}, {{ $cityPage->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Use our moving cost calculator or ask a few companies for a free quote. Your price will depend on how far you’re going, the size of your home, and whether you add services like packing or storage."
                }
            }
        ]
    }
    </script>
    @endif
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
            "name": "Best Long Distance Moving Companies in {{ $cityPage->name }}, {{ $cityPage->state->abv }}",
            "serviceType": "Long-distance moving",
            "url": "{{ url()->current() }}",
              "provider": {
            "@type": "Organization",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com"
        },
            "areaServed": [
                { "@type": "State", "name": "{{ $cityPage->name }}, {{ $cityPage->state->abv }}" }
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
  "name": "How to Plan and Execute a Long-Distance Move from {{ $cityPage->name }}, {{ $cityPage->state->abv }}",
  "description": "A step-by-step guide to planning, choosing movers, avoiding scams, and completing a successful long-distance move from {{ $cityPage->name }}, {{ $cityPage->state->abv }}.",
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
      "text": "Request and compare written estimates from at least 2-3 licensed long-distance movers."
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
