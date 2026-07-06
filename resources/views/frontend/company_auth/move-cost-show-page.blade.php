@extends('layouts.app')
@section('title', $stateCostPage->meta_title)

@section('meta_description', $stateCostPage->meta_description)
@section('meta_keywords')
    {{ $stateCostPage->state->name }} Move Costs
@endsection
@section('head')
    <meta name="robots" content="index, follow">
@endsection

@section('og:title')
    {{ $stateCostPage->meta_title }}
@endsection 

@section('og:description')
    {{ $stateCostPage->meta_description }}
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/state-specific-show.css') }}">
    <style>
        .anchor-link {
            position: relative;
            top: -100px;
            display: block;
            visibility: hidden;
        }

        .nav-link-tab {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .nav-link-tab:hover {
            text-decoration: underline;
        }

        /* Ensure active state styles work properly */
        .mover-item.active .mover-icon path {
            fill: #116087 !important;
        }

        .mover-item.active .mover-icon img {
            filter: brightness(0) invert(1) !important;
        }

        .mover-content.active {
            display: block !important;
        }

        /* Additional styling for better visual feedback */
        .mover-item.active p {
            color: #116087 !important;
            font-weight: 600 !important;
        }

        /* Moving Calculator Styles */
        .moving-calculator-section {
            padding: 40px 20px;
            background: #f8f9fa;
        }

        .calculator-container {
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(135deg, #e8eef3 0%, #f0f4f8 100%);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .calculator-heading {
            text-align: center;
            font-size: 32px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 30px;
        }

        .calculator-form {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 20px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #2563eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .form-label svg {
            color: #2563eb;
        }

        .form-input {
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            color: #6b7280;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .find-movers-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .find-movers-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* Loading State */
        .calculator-loading {
            text-align: center;
            padding: 60px 20px;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            border: 4px solid #e5e7eb;
            border-top-color: #2563eb;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            font-size: 18px;
            color: #6b7280;
            font-weight: 500;
        }

        /* Results State */
        .calculator-results {
            padding: 20px 0;
        }

        .results-heading {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 20px;
        }

        .results-locations {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .location-badge {
            background: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            color: #6b7280;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .location-badge strong {
            color: #1a1a1a;
        }

        .edit-btn {
            background: none;
            border: none;
            color: #2563eb;
            cursor: pointer;
            margin-left: 8px;
            font-size: 16px;
            padding: 0 4px;
        }

        .edit-btn:hover {
            color: #1d4ed8;
        }

        .movers-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .mover-card {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .mover-card:hover {
            border-color: #004b87;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
        }

        .mover-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mover-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .mover-details h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 8px 0;
        }

        .mover-rating {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stars {
            color: #fbbf24;
            font-size: 16px;
        }

        .featured-badge {
            background: #004b87;
            color: white;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            margin-left: 8px;
        }

        .calculator-footer {
            text-align: center;
            margin-top: 30px;
        }

        .footer-text {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        .footer-text strong {
            color: var(--bg);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .calculator-container {
                padding: 24px;
            }

            .calculator-heading {
                font-size: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .find-movers-btn {
                width: 100%;
            }

            .results-locations {
                flex-direction: column;
                align-items: center;
            }

            .mover-card {
                flex-direction: column;
                text-align: center;
                gap: 16px;
            }

            .mover-info {
                flex-direction: column;
            }
        }
    </style>



    <div class="hero">
        <div class="container for_padding">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 justif-content-center">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                                class="fas fa-home me-1 home_icon"></i>
                                            Home</a></li>
                                    <li class="breadcrumb-item"><a href="/move-cost" class="py-2">Move Cost</a>

                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $stateCostPage->state->name }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <h1>{{ $stateCostPage->title }}</h1>
                    <p class="subtitle">
                        {!! $stateCostPage->description !!}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="form_wrapper">

                        <form action="" class=" main_banner_form">
                            <h2 class="mt-0 mb-2 text-center">Get Your Moving Cost in Seconds</h2>
                            {{-- <p class="text-center">Easily compare personalized moving quotes for your
                                {{ $stateCostPage->state->name }} move. For that, use our free and instant moving cost
                                calculator.
                            </p> --}}
                            <div class="form_back">
                                <div class="row">
                                    <div class="col-lg-12 mt-4">
                                        <label class="b_label" for="external_zipfrom">Moving from*</label>
                                        <div class="input-outer">
                                            <input type="text" id="external_zipfrom" name="moving-from"
                                                class="zipfromsearch pac-target-input" placeholder="Enter Zip Code"
                                                autocomplete="off">
                                            <span id="external_zipfrom_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <label class="b_label" for="external_ziptosearch">Moving to*</label>
                                        <div class="input-outer">
                                            <input type="text" id="external_ziptosearch" name="moving-to"
                                                class="ziptosearch pac-target-input" placeholder="Enter Zip Code"
                                                autocomplete="off">
                                            <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-4 text-center">
                                        <a href="#ModalForm" data-bs-toggle="modal" class="quote_btn" type="button">
                                            Calculate Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <p class="mt-2 mb-0 text-center secure_info">We keep your personal information safe and
                                    secure.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper">
        <div class="info-box">
            <h3>Are you ready to move? </h3>
            <p>
                After years of helping people move, we’ve learned that every move has its own story. That’s why we are here
                to help you find the mover that fits your move.
            </p>
            <ul class="info-list">
                <li><span class="highlight"><a href="#professional" class="nav-link-tab" data-target="professional">Local
                            {{ $stateCostPage->state->name }} movers
                        </a></span>
                </li>
                <li><span class="highlight"><a href="#container" class="nav-link-tab" data-target="container">Long distance
                            movers </a></span></li>
                <li><span class="highlight"><a href="#rental" class="nav-link-tab" data-target="rental">Moving Containers
                        </a></span></li>
                <li><span class="highlight"><a href="#labor" class="nav-link-tab" data-target="labor">Moving Rental Truck
                        </a></span></li>
            </ul>
            <div class="quote-box">
                <div class="bg_col">
                    <p class="mb-0">
                        Need more help? Build your move plan.
                    </p>
                </div>
                <a href="https://mymovingjourney.com/moving-cost-calculator">
                    Get Quote</a>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <h2 class=" mb-4">Average Movers Costs by Type</h4>
                <!-- Movers Type Icons -->
                <div class="mover-types">
                    <div class="mover-item active" data-target="professional">
                        <div class="mover-icon">
                            <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                            </svg>
                            <img src="{{ asset('assets/img/local.png') }}" width="60" alt="Professional" />
                        </div>
                        <p>Local</p>
                    </div>

                    <div class="mover-item" data-target="container">
                        <div class="mover-icon">
                            <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                            </svg>
                            <img src="{{ asset('assets/img/interstate.png') }}" width="60" alt="Container" />
                        </div>
                        <p>Interstate</p>
                    </div>

                    <div class="mover-item" data-target="rental">
                        <div class="mover-icon">
                            <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                            </svg>
                            <img src="{{ asset('assets/img/container.png') }}" width="60" alt="Rental Truck" />
                        </div>
                        <p>Container</p>
                    </div>

                    <div class="mover-item" data-target="labor">
                        <div class="mover-icon">
                            <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                            </svg>
                            <img src="{{ asset('assets/img/truck-rental.png') }}" width="60" alt="Labor Only" />
                        </div>
                        <p>Rental Truck</p>
                    </div>
                </div>


                <!-- Movers Content -->
                <div id="professional" class="mover-content active">
                    <a id="local-movers" class="anchor-link"></a>
                    <h2 class="mt-2 services_h2">How Much Does a Local Moving Company Cost in
                        {{ $stateCostPage->state->name }}? </h2>
                    {!! $stateCostPage->local_moving_company_cost !!}
                    <div class="Featured_Partners">
                        <div class="row g-4 justify-content-center">
                            @foreach ($local_movers as $localMover)
                                @php
                                    $total_rating = $localMover->company->users->sum(function ($user) {
                                        return (float) $user->overall_rating;
                                    });

                                    $total_reviews = $localMover->company->users->count();

                                    if ($total_reviews > 0) {
                                        $avg_rating = $total_rating / $total_reviews;
                                    } else {
                                        $avg_rating = 0;
                                    }

                                    $rounded = round($avg_rating, 1);
                                    $min_price = $localMover->company->users
                                        ->where('user_email_verified', 1)
                                        ->min(function ($user) {
                                            return (float) $user->service_cost;
                                        });

                                    $max_price = $localMover->company->users
                                        ->where('user_email_verified', 1)
                                        ->max(function ($user) {
                                            return (float) $user->service_cost;
                                        });

                                    $imageUrl = str_starts_with($localMover->company->image, 'companies/image/')
                                        ? URL::to('/' . $localMover->company->image)
                                        : URL::to('/companies/image/' . $localMover->company->image);

                                @endphp
                                <div class="col-lg-4 col-md-6">
                                    <div class="partner-card  active ">
                                        <div class="company_logo">
                                            <img src="{{ $imageUrl }}" alt="{{ $localMover->company->slug }}-logo"
                                                class="img-fluid" loading="lazy">
                                        </div>
                                        <div class="partner-header d-flex align-items-center justify-content-center">
                                            <h5 class="company_name">{{ $localMover->company->company_name }}</h5>
                                        </div>
                                        <div
                                            class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                            <span class="rating"
                                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
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
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $localMover->point_one }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $localMover->point_two }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $localMover->point_three }}
                                            </p>
                                        </div>
                                        <a href="{{ route('company.show', $localMover->company->slug) }}">
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

                <div id="container" class="mover-content">
                    <a id="long-distance-movers" class="anchor-link"></a>
                    <h2 class="mt-2 services_h2">How Much Does an Interstate Moving Company Cost in
                        {{ $stateCostPage->state->name }}? </h2>

                    {!! $stateCostPage->interstate_moving_company_cost !!}
                    <div class="Featured_Partners">
                        <div class="row g-4 justify-content-center">
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
                                    $min_price = $longDistanceMover->company->users
                                        ->where('user_email_verified', 1)
                                        ->min(function ($user) {
                                            return (float) $user->service_cost;
                                        });

                                    $max_price = $longDistanceMover->company->users
                                        ->where('user_email_verified', 1)
                                        ->max(function ($user) {
                                            return (float) $user->service_cost;
                                        });

                                    $imageUrl = str_starts_with($longDistanceMover->company->image, 'companies/image/')
                                        ? URL::to('/' . $longDistanceMover->company->image)
                                        : URL::to('/companies/image/' . $longDistanceMover->company->image);

                                @endphp
                                <div class="col-lg-4 col-md-6">
                                    <div class="partner-card  active ">
                                        <div class="company_logo">
                                            <img src="{{ $imageUrl }}"
                                                alt="{{ $longDistanceMover->company->slug }}-logo" class="img-fluid"
                                                loading="lazy">
                                        </div>
                                        <div class="partner-header d-flex align-items-center justify-content-center">
                                            <h5 class="company_name">{{ $longDistanceMover->company->company_name }}</h5>
                                        </div>
                                        <div
                                            class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                            <span class="rating"
                                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
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
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $longDistanceMover->point_one }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $longDistanceMover->point_two }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $longDistanceMover->point_three }}
                                            </p>
                                        </div>

                                        <a href="{{ route('company.show', $longDistanceMover->company->slug) }}">
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

                <div id="rental" class="mover-content">
                    <a id="container-movers" class="anchor-link"></a>
                    <h2 class="mt-2 services_h2">How Much Do Moving Containers Cost in {{ $stateCostPage->state->name }}?
                    </h2>

                    {!! $stateCostPage->moving_containers_cost !!}

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
                                            <img src="{{ $imageUrl }}"
                                                alt="{{ $containerMover->company->slug }}-logo" class="img-fluid"
                                                loading="lazy">
                                        </div>
                                        <div class="partner-header d-flex align-items-center justify-content-center">
                                            <h5 class="company_name">{{ $containerMover->company->company_name }}</h5>
                                        </div>
                                        <div
                                            class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                            <span class="rating"
                                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
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
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $containerMover->point_one }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $containerMover->point_two }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $containerMover->point_three }}
                                            </p>
                                        </div>
                                        <a href="{{ route('company.show', $containerMover->company->slug) }}">
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

                <div id="labor" class="mover-content">
                    <a id="rental-truck-movers" class="anchor-link"></a>
                    <h2 class="mt-2 services_h2">How Much Does It Cost to Rent a Moving Truck in
                        {{ $stateCostPage->state->name }}? </h2>

                    {!! $stateCostPage->cost_to_rent_moving_truck !!}
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
                                            <img src="{{ $imageUrl }}"
                                                alt="{{ $truckRentalMover->company->slug }}-logo" class="img-fluid"
                                                loading="lazy">
                                        </div>
                                        <div class="partner-header d-flex align-items-center justify-content-center">
                                            <h5 class="company_name">{{ $truckRentalMover->company->company_name }}</h5>
                                        </div>
                                        <div
                                            class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                            <span class="rating"
                                                style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
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
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $truckRentalMover->point_one }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $truckRentalMover->point_two }}
                                            </p>
                                            <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2"
                                                    alt="check-mark" width="13" height="13"
                                                    loading="lazy">{{ $truckRentalMover->point_three }}
                                            </p>
                                        </div>
                                        <a href="{{ route('company.show', $truckRentalMover->company->slug) }}">
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
        </div>


        {{-- <h2 id="local-movers">How Much Does a Local Moving Company Cost in {{ $stateCostPage->state->name }}? </h2> --}}
        {{-- {!! $stateCostPage->local_moving_company_cost !!}
        <div class="Featured_Partners">
            <div class="row g-4 justify-content-center">
                @foreach ($local_movers as $localMover)
                    @php
                        $total_rating = $localMover->company->users->sum(function ($user) {
                            return (float) $user->overall_rating;
                        });

                        $total_reviews = $localMover->company->users->count();

                        if ($total_reviews > 0) {
                            $avg_rating = $total_rating / $total_reviews;
                        } else {
                            $avg_rating = 0;
                        }

                        $rounded = round($avg_rating, 1);
                        $min_price = $localMover->company->users
                            ->where('user_email_verified', 1)
                            ->min(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $max_price = $localMover->company->users
                            ->where('user_email_verified', 1)
                            ->max(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $imageUrl = str_starts_with($localMover->company->image, 'companies/image/')
                            ? URL::to('/' . $localMover->company->image)
                            : URL::to('/companies/image/' . $localMover->company->image);

                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="partner-card  active ">
                            <div class="company_logo">
                                <img src="{{ $imageUrl }}" alt="{{ $localMover->company->slug }}-logo"
                                    class="img-fluid" loading="lazy">
                            </div>
                            <div class="partner-header d-flex align-items-center justify-content-center">
                                <h5 class="company_name">{{ $localMover->company->company_name }}</h5>
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
                                        width="13" height="13" loading="lazy">{{ $localMover->point_one }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $localMover->point_two }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $localMover->point_three }}
                                </p>
                            </div>
                            <a href="{{ route('company.show', $localMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    <div class="content-wrapper">
        {{-- <h2 id="long-distance-movers">How Much Does an Interstate Moving Company Cost in
            {{ $stateCostPage->state->name }}? </h2> --}}
        {{-- {!! $stateCostPage->interstate_moving_company_cost !!}
        <div class="Featured_Partners">
            <div class="row g-4 justify-content-center">
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
                        $min_price = $longDistanceMover->company->users
                            ->where('user_email_verified', 1)
                            ->min(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $max_price = $longDistanceMover->company->users
                            ->where('user_email_verified', 1)
                            ->max(function ($user) {
                                return (float) $user->service_cost;
                            });

                        $imageUrl = str_starts_with($longDistanceMover->company->image, 'companies/image/')
                            ? URL::to('/' . $longDistanceMover->company->image)
                            : URL::to('/companies/image/' . $longDistanceMover->company->image);

                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="partner-card  active ">
                            <div class="company_logo">
                                <img src="{{ $imageUrl }}" alt="{{ $longDistanceMover->company->slug }}-logo"
                                    class="img-fluid" loading="lazy">
                            </div>
                            <div class="partner-header d-flex align-items-center justify-content-center">
                                <h5 class="company_name">{{ $longDistanceMover->company->company_name }}</h5>
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
                                        width="13" height="13" loading="lazy">{{ $longDistanceMover->point_one }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13" loading="lazy">{{ $longDistanceMover->point_two }}
                                </p>
                                <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                        width="13" height="13"
                                        loading="lazy">{{ $longDistanceMover->point_three }}
                                </p>
                            </div>

                            <a href="{{ route('company.show', $longDistanceMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    <div class="content-wrapper">
        <div class="col-12 col-lg-8 mx-auto my-5">
            <div class="form_wrapper">

                <form action="" class=" main_banner_form">
                    <h2 class="mt-0 mb-2 text-center">Find movers in your area</h2>
                    <p class="text-center">Compare verified movers and get accurate, personalized quotes in seconds with
                        our free moving cost calculator.
                    </p>
                    <div class="form_bg" id="calculatorForm">
                        <div class="row">
                            <div class="col-lg-6 mt-2">
                                <div class="input_outer">
                                    <label for="bottom_zipfrom">Moving from*</label>
                                    <input type="text" id="bottom_zipfrom" name="moving-from"
                                        class="zipfromsearch pac-target-input" placeholder="Enter City Name"
                                        autocomplete="off">
                                    <span id="bottom_zipfrom_error" class="error-message hidden"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="input_outer">
                                    <label for="bottom_ziptosearch">Moving to*</label>
                                    <input type="text" id="bottom_ziptosearch" name="moving-to"
                                        class="ziptosearch pac-target-input" placeholder="Enter City Name"
                                        autocomplete="off">
                                    <span id="bottom_ziptosearch_error" class="error-message hidden"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3 text-center">
                                <button class="quote-btn" id="findMoversBtn" type="button">
                                    Find Movers
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-loading" id="loadingState" style="display: none;">
                        <div class="loading-spinner"></div>
                        <p class="loading-text">Searching top movers...</p>
                    </div>
                    <div class="calculator-results" id="resultsState" style="display: none;">
                        <h2 class="results-heading">Your Top Movers</h2>
                        <div class="results-locations">
                            <span class="location-badge">
                                From: <strong id="fromLocation"></strong>
                                <button class="edit-btn" onclick="editLocation('from')">✎</button>
                            </span>
                            <span class="location-badge">
                                To: <strong id="toLocation">Virginia Beach, VA 23452</strong>
                                <button class="edit-btn" onclick="editLocation('to')">✎</button>
                            </span>
                        </div>
                        <div class="text-center my-3">
                            <a id="movingCostCalculatorLink" href="https://mymovingjourney.com/moving-cost-calculator"
                                class="quote-btn">Open Moving Cost
                                Calculator</a>
                        </div>

                        <div class="movers-list" id="moversList">
                            <!-- Movers will be dynamically loaded here -->
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1">
                        <p class="footer-text">Expert moving guidance brought to you by <strong>MyMovingjourney</strong>
                        </p>
                    </div>

                </form>
            </div>
        </div>
        {{-- <h2 id="container-movers">How Much Do Moving Containers Cost in {{ $stateCostPage->state->name }}? </h2> --}}


        {{-- {!! $stateCostPage->moving_containers_cost !!}

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
                            <a href="{{ route('company.show', $containerMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    <div class="content-wrapper">
        {{-- <h2 id="rental-truck-movers">How Much Does It Cost to Rent a Moving Truck in {{ $stateCostPage->state->name }}?
        </h2> --}}

        {{-- {!! $stateCostPage->cost_to_rent_moving_truck !!}

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
                            <a href="{{ route('company.show', $truckRentalMover->company->slug) }}">
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
    <div class="content-wrapper">
        <section class="mb-5">
            <h2>Factors That Affect The Cost Of Your {{ $stateCostPage->state->name }} Move</h2>

            {!! $stateCostPage->factors_that_affect_the_cost !!}
        </section>
        <section>
            <h2>Simple Ways to Save Money on Your {{ $stateCostPage->state->name }} Move</h2>

            {!! $stateCostPage->simple_ways_to_save_money !!}
        </section>
    </div>
    <section class="content-section">
        <h2>What’s the Cheapest Way to Move in {{ $stateCostPage->state->name }}?</h2>

        {!! $stateCostPage->cheapest_way_to_move !!}

        <h2 class="mt-5">How to Get the Most Accurate {{ $stateCostPage->state->name }} Moving Quote</h2>

        {!! $stateCostPage->most_accurate_moving_quote !!}
    </section>
    <section class="faq-section mt-5">
        <h2>Frequently Asked Questions</h2>

        <div class="accordion my-5" id="accordionExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $faq->id }}">
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



    <script>
        // Moving Calculator Functionality
        const calculatorForm = document.getElementById('calculatorForm');
        const loadingState = document.getElementById('loadingState');
        const resultsState = document.getElementById('resultsState');
        const findMoversBtn = document.getElementById('findMoversBtn');
        const movingFromInput = document.getElementById('bottom_zipfrom');
        const movingToInput = document.getElementById('bottom_ziptosearch');

        // Sample movers data
        const sampleMovers = [{
                name: 'Mayzlin Relocation',
                logo: '{{ asset('assets/img/mover-logo-1.png') }}',
                rating: 4.5,
                featured: true,
                link: 'https://mymovingjourney.com/moving-cost-calculator'
            },
            {
                name: 'Safeway Moving',
                logo: '{{ asset('assets/img/mover-logo-2.png') }}',
                rating: 4.0,
                featured: false,
                link: 'https://mymovingjourney.com/moving-cost-calculator'

            },
            {
                name: 'BLVD Moving',
                logo: '{{ asset('assets/img/mover-logo-3.png') }}',
                rating: 4.0,
                featured: false,
                link: 'https://mymovingjourney.com/moving-cost-calculator'
            },
            {
                name: 'Allied Van Lines',
                logo: '{{ asset('assets/img/mover-logo-4.png') }}',
                rating: 4.0,
                featured: false,
                link: 'https://mymovingjourney.com/moving-cost-calculator'

            }
        ];

        findMoversBtn.addEventListener('click', function() {
            const fromValue = movingFromInput.value.trim();
            const toValue = movingToInput.value.trim();

            if (!fromValue || !toValue) {
                alert('Please enter both locations');
                return;
            }

            // Hide form, show loading
            calculatorForm.style.display = 'none';
            loadingState.style.display = 'block';

            // Simulate API call
            setTimeout(() => {
                // Hide loading, show results
                loadingState.style.display = 'none';
                resultsState.style.display = 'block';

                // Update locations
                document.getElementById('fromLocation').textContent = fromValue;
                document.getElementById('toLocation').textContent = toValue;

                // Render movers
                renderMovers();
            }, 2000);
        });

        function renderMovers() {
            const moversList = document.getElementById('moversList');
            moversList.innerHTML = '';

            sampleMovers.forEach(mover => {
                const stars = '★'.repeat(Math.floor(mover.rating)) + '☆'.repeat(5 - Math.floor(mover.rating));

                const moverCard = document.createElement('div');
                moverCard.className = 'mover-card';
                moverCard.innerHTML = `
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mover-info">
                        <img src="${mover.logo}" alt="${mover.name}" class="mover-logo" onerror="this.style.display='none'">
                        <div class="mover-details">
                            <h3>
                                ${mover.name}
                                ${mover.featured ? '<span class="featured-badge">Featured</span>' : ''}
                            </h3>
                            <div class="mover-rating">
                                <span class="stars">${stars}</span>
                            </div>
                        </div>
                    </div></div>
                    <div class="col-lg-4 d-flex align-items-center">
                        <a href="${mover.link}" class="quote-btn specific_c">Get a Quote</a>
                        </div>
                        </div>

                `;
                moversList.appendChild(moverCard);
            });
        }

        function editLocation(type) {
            resultsState.style.display = 'none';
            calculatorForm.style.display = 'block';

            if (type === 'from') {
                movingFromInput.focus();
            } else {
                movingToInput.focus();
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const moverItems = document.querySelectorAll('.mover-item');
            const contents = document.querySelectorAll('.mover-content');

            // Function to activate tab
            function activateTab(targetId) {
                // Remove active class from all mover items and contents
                moverItems.forEach(i => i.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                // Add active class to the target mover item and content
                const targetMoverItem = document.querySelector(`.mover-item[data-target="${targetId}"]`);
                const targetContent = document.getElementById(targetId);

                if (targetMoverItem) {
                    targetMoverItem.classList.add('active');
                    console.log('Activated tab:', targetId); // Debug log
                } else {
                    console.log('Mover item not found for:', targetId); // Debug log
                }

                if (targetContent) {
                    targetContent.classList.add('active');
                }
            }

            // Handle mover item clicks
            moverItems.forEach(item => {
                item.addEventListener('click', () => {
                    const target = item.getAttribute('data-target');
                    activateTab(target);
                });
            });

            // Handle navigation link clicks
            const navLinks = document.querySelectorAll('.nav-link-tab');
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = link.getAttribute('data-target');

                    // Activate the corresponding tab
                    activateTab(target);

                    // Smooth scroll to the mover-types section
                    const moverTypesSection = document.querySelector('.mover-types');
                    if (moverTypesSection) {
                        moverTypesSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }); // Close DOMContentLoaded
    </script>


    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "{{ $stateCostPage->meta_title}}",
        "url": "{{url()->current()}}",
        "description": "{{ $stateCostPage->meta_description }}"
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
            "item": "https://mymovingjourney.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Moving Costs by State",
            "item": "https://mymovingjourney.com/move-cost"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $stateCostPage->meta_title }}",
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
@endsection
