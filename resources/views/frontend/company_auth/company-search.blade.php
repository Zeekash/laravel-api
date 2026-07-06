@extends('layouts.app')
@section('title', request('search') ?? 'Search Movers – Find Trusted Movers for Your Next Move')
@section('meta_description',
    'Easily find reliable and trusted movers for your next relocation. Search through top-rated
    moving companies and make your move stress-free.')
@section('head')
    @if (request()->has('page') || request()->has('search'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')

    <link rel="stylesheet" href="{{ asset('assets/css/company_search.css') }}">
    <section class="container_main pb-5" id="page">
        {{-- <div class="hero_banner"> --}}
        <div class="container">
            <div class="upper_banner_search">
                <h1>Movers in USA</h1>
                <p>Find reliable and professional movers for your next relocation</p>
            </div>
            <div class="col-lg-12 mt-lg-5 mt-3 mx-auto">
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
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from"
                                            class="zipfromsearch pac-target-input" placeholder="Enter City Name"
                                            autocomplete="off">
                                        <span id="external_zipfrom_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            class="ziptosearch pac-target-input" placeholder="Enter City Name"
                                            autocomplete="off">
                                        <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
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
        {{-- </div> --}}
        {{-- <div class="container">
            <div class="row w-100  mx-auto px-0">
                <div class="col-lg-12 mt-4">
                    <div id="cards-col-1" class="col-12 px-0 py-3">
                        <div
                            class="d-flex flex-wrap align-items-center my-2 justify-content-lg-between justify-content-center">
                            <h2 class="h2_heading my-3">

                                Find Interstate Movers
                            </h2>
                            <form action="{{ route('company.company-search') }}" method="GET"
                                class="search-container d-flex">
                                <input type="search" class="search-input fs-5" value="{{ request('search') }}"
                                    placeholder="Search Mover by Name" name="search" autocomplete="off">
                            </form>
                            <div class="row">
                                @forelse($companies as $company)
                                    <div class="col-lg-6 col-12 mb-3 article-loop">
                                        <div class="company_search_card mx-0 " id="card-of-services">
                                            <a class=" row px-3 py-3" href="{{ route('company.show', $company->slug) }}">
                                                <h3 id="title-of-company-name">

                                                    {!! preg_replace("/($search)/i", "<span class='highlight'>$1</span>", $company->company_name) !!}
                                                    @if ($company->is_claimed == 1)
                                                        <span>
                                                            <img src={{ asset('assets/img/MMJ_Verified_new.svg') }}
                                                                style="width: 24px;" alt="verified">
                                                        </span>
                                                    @endif
                                                </h3>
                                                <div
                                                    class="col-12 col-md-12 col-lg-3 d-flex align-items-center justify-content-center mb-2">
                                                    <span hidden class="image">{{ $company->image }}</span>
                                                    @if ($company->image)
                                                        @php
                                                            $imageUrl = str_starts_with(
                                                                $company->image,
                                                                'companies/image/',
                                                            )
                                                                ? URL::to('/' . $company->image)
                                                                : URL::to('/companies/image/' . $company->image);
                                                        @endphp
                                                        <img class="img-fluid" src="{{ $imageUrl }}"
                                                            alt="{{ $company->image }}" style="width: 200px;">
                                                    @else
                                                        <img src="{{ URL::to('/img/samplelogo.webp') }}"
                                                            alt="{{ $company->image }}" style="width: 200px;">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-9">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 my-0 d-flex flex-column justify-content-center align-items-lg-start align-items-center ">

                                                            @php
                                                                $total_rating = $company->users->sum(function ($user) {
                                                                    return (float) $user->overall_rating;
                                                                });

                                                                $total_reviews = $company->users->count();

                                                                if ($total_reviews > 0) {
                                                                    $avg_rating = $total_rating / $total_reviews;
                                                                } else {
                                                                    $avg_rating = 0;
                                                                }

                                                                $rounded = round($avg_rating, 1);
                                                            @endphp
                                                            <span id="rating-span2" class="rating_tot">Based on
                                                                {{ $total_reviews }}
                                                                Reviews</span>
                                                            <p class="m-0">
                                                                @if ($rounded == 0)
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif ($rounded > 0 && $rounded < 1)
                                                                    <i class="fa fa-star-half-stroke"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded == 1)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded > 1 && $rounded < 2)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star-half-stroke"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded == 2)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded > 2 && $rounded < 3)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star-half-stroke"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded == 3)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded > 3 && $rounded < 4)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star-half-stroke"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded == 4)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="far fa-star"
                                                                        style="font-size:1.8rem; color:#a7a7a7"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded > 4 && $rounded < 5)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fa fa-star-half-stroke"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                @elseif($rounded == 5)
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                    <i class="fas fa-star"
                                                                        style="font-size:1.8rem; color:#ff9800"
                                                                        aria-hidden="true"></i>
                                                                @endif
                                                                <span
                                                                    class="avg_rating ms-3">{{ round($avg_rating, 1) }}/5</span>
                                                            </p>
                                                            <p class="mt-3">
                                                                <span class="fw-normal me-1">Company Based In:
                                                                    <span class="fw-bold">
                                                                        {{ $company->state->name }}</span></span>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                @empty
                                    <div class="card text-center comp-not-fount-txt py-4 my-3">
                                        <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want
                                            to create
                                            account ?</a>
                                    </div>
                                @endforelse


                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                                        data-wow-duration="0.5s">
                                        {!! $pagePaginate !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <p class="mt-5">If you’re looking to get from one place to another, you'll probably notice some routes are more
            popular than
            others. Whether you're heading to a big city or moving across states, finding the best route can make all the
            difference.</p>
        <p>
            That’s exactly why we created this page: to help you discover the best moving routes in the USA and connect you
            with the perfect moving companies that know these routes inside and out.
        </p>
        <p>So, if you’re ready to hit the road, we’ve got your back. Let’s make your move smoother, easier, and less
            stressful.</p>
        <p>Check out the top moving routes in the USA and find the right company for your move!</p>
        <section class="popular-cities-section">
            <div class="container">
                <h2 class="mb-4">Or Choose a Popular State</h2>
                <div class="row city-list">
                    <div class="col-md-6">
                        <ul class="city-links list-unstyled">
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Alabama movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Alaska movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Arizona movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Arkansas movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">California movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Colorado movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Connecticut movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Delaware movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Florida movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Georgia movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Hawaii movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Idaho movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Illinois movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Indiana movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Iowa movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Kansas movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Kentucky movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Louisiana movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Maine movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Maryland movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Massachusetts movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Michigan movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Minnesota movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Mississippi movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Missouri movers</a></li>


                        </ul>

                    </div>
                    <div class="col-md-6">
                        <ul class="city-links list-unstyled">
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Montana movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Nebraska movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Nevada movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">New Hampshire movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">New Jersey movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">New Mexico movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">New York movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">North Carolina movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">North Dakota movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Ohio movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Oklahoma movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Oregon movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Pennsylvania movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Rhode Island movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">South Carolina movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">South Dakota movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Tennessee movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Texas movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Utah movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Vermont movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Virginia movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Washington movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">West Virginia movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Wisconsin movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Wyoming movers</a></li>
                        </ul>
                    </div>
                </div>
                <h2 class="mb-4">Or Choose a Popular City</h2>
                <div class="row city-list">
                    <div class="col-md-6">
                        <ul class="city-links list-unstyled">
                            <li><i class="bi bi-circle-fill"></i> <a href="#">New York City movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Los Angeles movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Chicago movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Houston movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Phoenix movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Philadelphia movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">San Antonio movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">San Diego movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Dallas movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">San Jose movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Austin movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Jacksonville movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">San Francisco movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Columbus movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Indianapolis movers</a></li>

                        </ul>

                    </div>
                    <div class="col-md-6">
                        <ul class="city-links list-unstyled">

                            <li><i class="bi bi-circle-fill"></i> <a href="#">Charlotte movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Fort Worth movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Seattle movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Denver movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Washington DC movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Boston movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">El Paso movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Nashville movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Detroit movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Oklahoma City movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Portland movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Las Vegas movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Memphis movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Louisville movers</a></li>
                            <li><i class="bi bi-circle-fill"></i> <a href="#">Baltimore movers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Other Categories Section -->
        <section class="other-category-section py-5">
            <div class="container text-center">
                <h2 class="mb-2">Not what you were looking for?</h2>
                <p class="category-subtitle mb-4">
                    Check out other categories that can help you find the information you need!
                </p>

                <div class="row g-4 justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-calculator category-icon"></i>
                            <p class="category-name mt-2">Cost Calculator</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-geo-alt category-icon"></i>
                            <p class="category-name mt-2">Long distance</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-car-front category-icon"></i>
                            <p class="category-name mt-2">Car Shipper</p>
                        </div>
                    </div>
                    <!-- Repeat as needed -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-calculator category-icon"></i>
                            <p class="category-name mt-2">Cost Calculator</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-geo-alt category-icon"></i>
                            <p class="category-name mt-2">Long distance</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-car-front category-icon"></i>
                            <p class="category-name mt-2">Car Shipper</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-calculator category-icon"></i>
                            <p class="category-name mt-2">Cost Calculator</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-geo-alt category-icon"></i>
                            <p class="category-name mt-2">Long distance</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="category-card p-4">
                            <i class="bi bi-car-front category-icon"></i>
                            <p class="category-name mt-2">Car Shipper</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    {{-- <!-- ZIP_TO SEARCH  -->
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $("#zipfromsearch").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#zipfromsearch').val(ui.item.label);
                console.log(ui.item);
                return false;
            }
        });
    </script>

    <!-- ZIP_TO SEARCH -->
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $("#ziptosearch").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#ziptosearch').val(ui.item.label);
                console.log(ui.item);
                return false;
            }
        });
    </script> --}}

    <script>
        var date = new Date();
        var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        $('.date_span').text(current_date)
    </script>

    {{-- <script>
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
            if (n % 2 != 0) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("steps-div").style.display = "none";
                setTimeout(() => {
                    document.querySelector("#nextBtn").click();
                    //   document.querySelector("#prevBtn").click();
                }, 1000);
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
        ZipNum.addEventListener("keyup", function() {
            var MaxNum = ZipNum.value.split('');
            if (MaxNum.length > 5) {
                ZipNum.value = ZipNum.value.substring(0, 5);
            }
        });
        ZipNum2.addEventListener("keyup", function() {
            var MaxNum = ZipNum2.value.split('');
            if (MaxNum.length > 5) {
                ZipNum2.value = ZipNum2.value.substring(0, 5);
            }
        });
    </script> --}}

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
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
    {{-- <script>
        $("#phone_no").mask("+1-999-999-9999");
        $("#phone_no").on("focus click", function(e) {
            setTimeout(function() {
                e.target.setSelectionRange(3, 3);
            }, 1)
        });
        $("#phone_no").on("blur", function() {
            var last = $(this).val().substr($(this).val().indexOf("-") + 1);
            if (last.length == 3) {
                var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
                var lastfour = move + last;
                var first = $(this).val().substr(0, 9);
                $(this).val(first + '-' + lastfour);
            }
        });
        $("#date").flatpickr({
            dateFormat: "d-m-Y"
        });
    </script> --}}
@endsection
