@extends('layouts.app')
@section('title')
    Long Distance Movers in the USA - Find Reliable Moving Companies
@endsection
@section('meta_description')
    Find reliable long distance movers in the USA. Get expert moving services from trusted companies for a smooth interstate
    relocation.
@endsection
@section('content')
    <style>
        .white-logo {
            max-width: 90px;
            object-fit: contain;
            position: relative;
            border-radius: 0px;
            height: 120px;
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
    <link rel="stylesheet" href="{{ asset('assets/css/long_distance_mover.css') }}">
    <section class="home_hero">
        <div class="home_page_banner mb-5">
            {{-- <img src={{ asset('assets/img/upper_banner.png') }} alt="banner_image" class="upper_banner" width="100%"> --}}

            <div class="container">
                <div class="col-xl-9 col-12 mt-3">
                    <div class="form_wrapper">
                        <div class="col-lg-8 mb-3">
                            <h1 class="heading_cont">Find & Compare Long Distance Movers in USA</h1>


                        </div>
                        {{-- <hr style="width: 57%;color: #0000007a;"> --}}
                        <form action="" class="mt-2 main_banner_form" style="">
                            <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                                <span class="mb-2 form_heading">

                                    Let’s Calculate Your Moving Cost!
                                </span>
                                <p class="miles_upp">Moving Distance: 0 miles</p>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from" class="zipfromsearch"
                                            placeholder="City Name or Zip Code">
                                        <span id="external_zipfrom_error" class="error-message hidden"
                                            style="color:red; font-size:12px; hidden"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-md-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to" class="ziptosearch"
                                            placeholder="City Name or Zip Code">
                                        <span id="external_ziptosearch_error" class="error-message hidden"
                                            style="color:red; font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-2 px-lg-1 px-md-0 mt-md-0 mt-2">
                                    <a href="#ModalForm" data-bs-toggle="modal">
                                        <button class="get_quote" type="button">
                                            Get Free Quote
                                        </button>
                                    </a>
                                </div>
                                <!--<span-->
                                <!--    style="font-family: var(--para-family); font-size: 14px; font-weight: 700; margin-top: 10px; text-align:right;">Save-->
                                <!--    up to 30% on moving costs</span>-->
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
            {{-- <img src={{ asset('assets/img/Final.png') }} alt="banner_image" class="banner_svg" width="100%"> --}}

        </div>
        {{-- <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image:  linear-gradient(rgb(33 38 41 / 40%),
                rgb(33 38 41 / 40%)),
                url('../assets/img/young-family-moving-into-their-new-house.jpg');
                
                ">
                    <div class="container">
                        <div class="hero-content">
                            <h2>Find, Compare & Hire Trusted Movers Across the USA</h2> --}}
        {{-- <button class="btn btn_home_hero">Seafood</button> --}}
        {{-- </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image:  linear-gradient(rgb(33 38 41 / 40%),
                rgb(33 38 41 / 40%)),
                url('../assets/img/young-family-moving-into-new-home.jpg');
                background-position:top;">
                    <div class="container">
                        <div class="hero-content">
                            <h2>Discover & Compare the Best Movers in the USA</h2> --}}
        {{-- <button class="btn btn_home_hero">Find Restaurants</button> --}}
        {{-- </div>
                    </div>
                </div> --}}

        <!-- Slide 3 -->
        {{-- <div class="carousel-item"
                    style="background-image: linear-gradient(rgb(33 38 41 / 40%),
                rgb(33 38 41 / 40%)),
                url('../assets/img/full-shot-man-carrying-packs.jpg');">
                    <div class="container">
                        <div class="hero-content">
                            <h2>Fresh Ingredients</h2>
                            <button class="btn btn_home_hero">Explore Markets</button>
                        </div>
                    </div>
                </div> --}}

        <!-- Slide 4 -->
        {{-- <div class="carousel-item"
                    style="background-image: linear-gradient(rgb(33 38 41 / 40%),
            rgb(33 38 41 / 40%)),
        url('../assets/img/young-couple-moving-new-home-together-african-american-couple-with-cardboard-boxes.jpg');">
                    <div class="container">
                        <div class="hero-content">
                            <h2>Taste the Best</h2>
                            <button class="btn btn_home_hero">View Deals</button>
                        </div>
                    </div>
                </div>
            </div> --}}

        <!-- Custom vertical pagination (4 slides => 4 bars) -->
        {{-- <div class="container">
                    <div class="custom-pagination">
                        <div class="progress-bar-vertical">
                            <div class="progress-fill"></div>
                        </div>
                        <div class="progress-bar-vertical">
                            <div class="progress-fill"></div>
                        </div> --}}
        {{-- <div class="progress-bar-vertical">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="progress-bar-vertical">
                        <div class="progress-fill"></div>
                    </div> --}}
        {{-- </div>
                </div>
            </div> --}}
    </section>

    <section id="movers_card" class="mt-sm-5 mt-4">
        <div class="container">
            <div class="row">
                <div id="cards-col-2" class="col-12 col-sm-12 col-md-3 order-lg-0 order-1">
                    <div class="card px-0 rounded-2 call-now"
                        style="background: #ffffff !important; border-bottom: 1px solid #e7eff1; padding-bottom: 20px;">
                        <a href="tel:(786) 980-3050">
                            <h4>Call now for a cost estimate</h4>
                        </a><a href="tel:(786) 980-3050"><i class="fa-solid fa-phone"></i> (786) 980-3050</a>
                        <p>Available 24/7</p>

                    </div>
                    {{-- <div class="side_searchbar">
                        <h2 class="text-center">Search For Movers</h2>
                        <form action="https://mymovingjourney.com/mover-search" method="get" style="width: 100%  ">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" value=""
                                    placeholder="search for company" spellcheck="false" data-ms-editor="true">
                                <span class="input-group-text ">
                                    <button type="submit" aria-label="search button"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </span>
                            </div>
                        </form>
                        <div class="card p-3 rounded-2 call-now text-center mt-3"
                            style="    background-color: #e7eff1 !important;">
                            <a href="tel:(786) 980-3050">
                                <h4>Call now for a cost estimate</h4>
                            </a><a href="tel:(786) 980-3050"><i class="fa-solid fa-phone"></i> (786) 980-3050</a>
                            <p>Available 24/7</p>

                        </div>
                    </div> --}}
                    {{-- <div class="side_searchbar">
                        <h2>Search For Movers</h2>
                        <form action="{{ route('company.company-search') }}" method="get" style="width: 100% ">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search"
                                    value="{{ request('search') }}" placeholder="search for company">
                                <span class="input-group-text ">
                                    <button type="submit" aria-label="search button"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </span>
                            </div>
                        </form>
                    </div> --}}
                    <div class="mt-4">
                        <div class="country_movers mt-4">
                            {{-- <h3>Top Moving States</h3>
                            <ul class="list-unstyled mt-1">
                                @foreach ($topStates as $state)
                                    <li>
                                        <a href="{{ route('state.show', ['stateSlug' => $state->slug]) }}"> Movers in
                                            {{ $state->state }}
                                            ({{ $state->company_count }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul> --}}
                            <h2 class="recent_blog">Recent Blogs</h2>
                            @foreach ($post as $post)
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <div class="card mb-3 border-0 mt-2  border-2 pb-2 rounded-0"
                                        style="border-bottom: 1px solid #dee1e8 !important;">
                                        <div class="row g-0 ">
                                            {{-- <div class="col-12">
                                                <img src="{{ asset('posts/image/' . $post->image) }}"
                                                    class="img-fluid   moving_blogs_card_img " alt="{{ $post->image }}">
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="card-body py-1 px-0">
                                                    <span
                                                        class="card-title m-0 moving_blogs_card_title  ">{{ $post->title }}
                                                    </span>
                                                    <p class="card-text">
                                                        <small class=" moving_blogs_card_small"
                                                            style="color: #94a0a1;font-size: 14px;font-weight: 300 !important;font-family: var(--para-family);">Published
                                                            Date:{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-9  for_card_responsive">
                    <div class="mb-2 px-2">
                        <h2 class="head-top_1"> Total Movers : {{ $total_company }} </h2>
                    </div>
                    <div class="row">
                        @forelse($data as $data)
                            <div class="col-12 col-sm-12 col-xl-6">
                                <a href="{{ route('company.show', $data->slug) }}">
                                    <div class="row w-100 justify-content-center d-flex my-3 mx-0 home_company_card p-0">
                                        <div class="col-12 p-2 order-lg-0 order-1  col-lg-9 main-card">
                                            <div class="row my-0">
                                                <div class="col-12">
                                                    <h3 class="m-0 company-name">
                                                        {{ $data->company_name }}
                                                        @if ($data->claimed == 1)
                                                            <span>
                                                                <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}"
                                                                    style="width: 24px;!important" alt="verified">
                                                                </img>
                                                        @endif
                                                    </h3>

                                                </div>
                                            </div>

                                            <div class="row">
                                                @php
                                                    $total_rating = $data->users->sum(function ($user) {
                                                        return (float) $user->overall_rating; // Ensure overall_rating is treated as a float
                                                    });

                                                    $total_reviews = $data->users->count();

                                                    if ($total_reviews > 0) {
                                                        $avg_rating = $total_rating / $total_reviews;
                                                    } else {
                                                        $avg_rating = 0;
                                                    }

                                                    $rounded = round($avg_rating, 1);
                                                @endphp
                                                <p class="m-0 mt-2">
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
                                                            style="font-size:1.2rem; color:#3e70cf"
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
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
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
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 2)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 2 && $rounded < 3)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 3)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 3 && $rounded < 4)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 4)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 4 && $rounded < 5)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true">
                                                        </i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 5)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#3e70cf"
                                                            aria-hidden="true"></i>
                                                    @endif
                                                    <span class="text-danger">({{ round($avg_rating, 1) }})</span>
                                                </p>
                                                <span id="review mt-3"> Based on {{ $data->total_reviews }} Reviews</span>


                                                {{-- <p style="font-size: 20px; font-weight: 600; " class="mb-2"> --}}
                                                {{-- {{ $data->subject }}</p> --}}
                                                {{-- <p class="para2 m-0">
                                                @if ($data->your_review != '')
                                                    <span class="fs-5">
                                                    </span>{{ substr(strip_tags($data->your_review), 0, 100) }}
                                                    <span
                                                        class="read_more">{{ strlen(strip_tags($data->your_review)) > 100 ? '... Read More' : '' }}</span>
                                                    <span class="fs-5 "> </span>
                                                @endif
                                            </p> --}}

                                                {{-- <span class="review_person_name mt-2">
                                                    @if ($data->name != '')
                                                        Review by {{ $data->name }}
                                                    @else
                                                        <p class="fs-14 my-0 d-flex align-items-start mb-2 mt-2"><i
                                                                class="fs-14 fa-solid fa-location-dot icons-company-show me-2"></i>
                                                            <span class="fw-bold me-2">Address: </span>
                                                            {{ $data->street ?? 'Not Found' }},
                                                            {{ $data->city }} {{ $data->stateAbv }},
                                                            {{ $data->zip_code }}
                                                        </p>
                                                        <p class="my-0 d-flex align-items-start fs-14 col-sm-12 mb-2"><i
                                                                class="fa-solid fa-globe icons-company-show fs-14 me-2"></i>
                                                            <span class="fw-bold me-2">Site: </span>
                                                            {{ $data->website }}
                                                        </p>
                                                        <p class="m-0 mt-3 d-flex align-items-center fs-14"><i
                                                                class="fa-solid fa-phone-volume icons-company-show mt-0 fs-14 me-2"></i>
                                                            <span class="fw-bold me-2">Phone: </span>
                                                            {{ $data->phone_no }}
                                                        </p>
                                                    @endif
                                                </span> --}}
                                                <p class="state_base mt-3">
                                                    <span class="fw-bold me-2">Company Based In :
                                                        {{ $data->state }}</span>
                                                </p>


                                            </div>


                                        </div>
                                        <div
                                            class="col-12 col-lg-3 order-lg-1 order-0 d-flex flex-column justify-content-lg-between justify-content-center flex-wrap align-items-center p-2">
                                            {{-- <span>US DOT:400</span> --}}
                                            {{-- <p class="dot_number text-decoration-underline order-lg-0 order-1">
                                            <span class="fw-bold">US DOT:</span>
                                            {{ $data->dot_no ?? 'Not Provided' }}
                                        </p> --}}
                                            <span hidden class="image">{{ $data->image }}</span>
                                            @if ($data->image)
                                                @php
                                                    $imageUrl = str_starts_with($data->image, 'companies/image/')
                                                        ? URL::to('/' . $data->image)
                                                        : URL::to('/companies/image/' . $data->image);
                                                @endphp
                                                {{-- {{ URL::to('/companies/image/' . $data->image) }} --}}
                                                <img loading="lazy" src="{{ $imageUrl }}" alt="{{ $data->image }}"
                                                    class=" white-logo" style="border-radius: 6px;">
                                            @else
                                                <img loading="lazy" src="{{ URL::to('/img/samplelogo.webp') }}"
                                                    alt="{{ $data->image }}" class="company-img">
                                            @endif
                                            <p class="dot_number mt-1">
                                                <span class="fw-bold">US DOT:</span>
                                                {{ $data->dot_no ?? 'Not Provided' }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to
                                create
                                account ?</a>
                        @endforelse
                    </div>
                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                        data-wow-duration="0.5s">
                        {!! $pagePaginate !!}
                    </div>


                </div>
            </div>
    </section>
    <section id="local_movers_data">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Criteria of a Long-Distance Move</h2>
                    <p class="mb-0">So, you’re planning a move that’s more than just a hop, skip, and jump? A
                        long-distance move is not just about packing your stuff and calling it a day—there's more to it, and
                        it can get pretty tricky.
                    </p>
                    <p class="mb-1">A long-distance move generally means you're moving over 200-400 miles (sometimes even
                        more).</p>
                    <p>
                        Here’s how you know you’re dealing with a long-distance move:
                    </p>
                    <ul>
                        <li>
                            It takes more than just a day or two—usually, it’ll take several days or even weeks to get
                            everything sorted out.
                        </li>
                        <li>
                            If you’re <strong><a
                                    href="https://mymovingjourney.com/blogs/how-to-move-across-the-country">crossing
                                    state</a></strong> lines, you’re definitely looking at a long-distance move. Interstate
                            moves require some special planning and paperwork.
                        </li>
                        <li>
                            There are strict regulations and requirements involved, especially regarding how your things are
                            transported and the rules you need to follow.
                        </li>
                        <p>
                            Moving long distances can feel overwhelming, but don't worry; this is where <strong><a
                                    href="https://mymovingjourney.com/mover-search">relocation services</a></strong>
                            come in handy. The pros are here to make it as smooth as possible!
                        </p>
                    </ul>
                    <h2>What is the Average Cost of a Long Distance Move?</h2>
                    <p>
                        The cost of a long-distance move isn't a flat rate—it's more like several things adding up.
                    </p>
                    <p>
                        A long-distance move can range from $2,000 to $10,000, depending on a few important factors.
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <h3 class="fw-bold list_head">Distance & Mileage</h3>
                            <p>
                                The further you go, the more you pay. It's simple math! The cost per mile is a major factor
                                here.
                            </p>
                            <p>
                                If you're <strong><a
                                        href="https://mymovingjourney.com/blogs/what-is-the-average-cost-of-hiring-a-moving-company">moving
                                        coast</a></strong> to coast, expect that cost to increase.
                            </p>
                            <div class="col-12 my-3">
                                <div class="new_card p-sm-4 p-2">
                                    <div class="card-body d-sm-flex align-items-center">
                                        <div class="content_div">
                                            <p><strong>Pro Tip:</strong> If you’re moving across state lines, you might also
                                                run into additional fees for crossing state borders (yup, states like to
                                                charge for that). But hey, that’s the price of a good road trip, right?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Size of Your Home</h3>
                            <p>
                                Basically, the more stuff you have, the more you'll spend. Movers usually charge based on
                                the weight of your belongings or the <strong><a
                                        href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size">size of
                                        your home</a></strong>.
                            </p>
                            <p>
                                A 1-bedroom apartment will obviously cost a lot less to move than a 5-bedroom house.
                            </p>
                            <p>
                                Here’s a rough idea:
                            </p>
                            <ul>
                                <li>
                                    <strong>Studio/1-bedroom:</strong> $2,000 - $3,000
                                </li>
                                <li>
                                    <strong>2-3 Bedrooms: </strong>Around $3,000-$5,000
                                </li>
                                <li>
                                    <strong>4+ Bedrooms:</strong> Around $5,000-$10,000
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Packing Services</h3>
                            <p>
                                Some movers offer <strong><a
                                        href="https://mymovingjourney.com/resource/best-packing-and-moving-companies-in-usa">packing
                                        services</a></strong>, which can save you a lot of time and stress. But, of
                                course, this comes with an added cost.
                            </p>
                            <P>
                                Most movers charge <strong>$300 to $2,000</strong> for packing, depending on the amount of
                                stuff you have and whether you want them to pack everything or just the <strong><a
                                        href="https://mymovingjourney.com/blogs/how-to-pack-fragile-items-prep-tools-tips-and-more">fragile
                                        items</a></strong> .
                            </P>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Additional Costs</h3>
                            <p>
                                There are extra fees that could pop up unexpectedly, depending on your situation.
                            </p>
                            <p>
                                Here are a few to watch out for:
                            </p>
                            <ul>
                                <li>
                                    <strong>Insurance:</strong> Movers usually offer basic coverage, but you can buy
                                    additional <strong><a
                                            href="https://mymovingjourney.com/blogs/how-does-moving-insurance-work">insurance</a></strong>
                                    for better protection. This will usually cost $200 to $1,000.
                                </li>
                                <li>
                                    <strong>Storage Fees:</strong>If your move is delayed or you need to store your stuff
                                    <strong><a
                                            href="https://mymovingjourney.com/blogs/temporary-storage-options-you-need-for-your-next-move">temporarily
                                            storage</a></strong>, fees can range from $100 to $500 a month.
                                </li>
                                <li>
                                    <strong>Elevator or Stairs Fees:</strong>If you’re moving into a high-rise or a building
                                    with <strong><a
                                            href="https://mymovingjourney.com/blogs/essential-tips-for-successfully-moving-to-a-building-with-no-elevator">no
                                            elevator</a></strong>, you might pay an extra $100-$500 fee.
                                </li>
                                <li>
                                    <strong>Fuel Charges:</strong>This can be around $100-$500, depending on the distance.
                                </li>
                                <li>
                                    <strong>Heavy/Oversized Item Fee:</strong>For those oversized items, you might be
                                    looking at an extra $100-$1,000.
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <p class="fw-bold">Here's a table to sum it up for you:</p>
                    <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                        <table class="table fw-semibold">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #116087; color: white; width: 25%;" scope="col">Cost
                                        Factor</th>
                                    <th style="background-color: #116087; color: white;" scope="col">Estimated Cost
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Distance (per mile)</td>
                                    <td>Varies ($1-$2/mile)</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Size of Home (Studio/1 Bedroom)
                                    </td>
                                    <td style="background-color: #11608714;">$2,000 - $3,000</td>
                                </tr>
                                <tr>
                                    <td>Size of Home (2-3 Bedrooms)</td>
                                    <td>$3,000 - $5,000</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Size of Home (4+ Bedrooms)</td>
                                    <td style="background-color: #11608714;">$5,000 - $10,000
                                    </td>
                                </tr>
                                <tr>
                                    <td>Packing Services</td>
                                    <td>$300 - $2,000</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Insurance</td>
                                    <td style="background-color: #11608714;">$200 - $1,000</td>
                                </tr>
                                <tr>
                                    <td>Storage Fees</td>
                                    <td>$100 - $500/month</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Elevator/Stair Fees</td>
                                    <td style="background-color: #11608714;">$100 - $500
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuel Charges</td>
                                    <td>$100 - $500</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Heavy/Over-Sized Item Fee</td>
                                    <td style="background-color: #11608714;">$100 - $1,000</td>
                                </tr>
                                <tr>
                                    <td>Best Time to Move</td>
                                    <td>Fall/Winter (cheaper)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="mt-4">Reasons to Choose Long-Distance Movers</h2>
                    <p>Here are effective reasons why <strong><a
                                href="https://mymovingjourney.com/resource/best-moving-companies">hiring
                                professional</a></strong> long-distance movers is a wise decision:
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">Expertise: </span>Long-distance movers know the ins and outs of
                            interstate moves. They handle the details and paperwork, so you don't have to.
                        </li>
                        <li>
                            <span class="fw-bold">Efficient and Timely Delivery:</span> They prioritize getting your stuff
                            to your new home on time. There is no waiting around or wondering when your things will show up.
                        </li>
                        <li>
                            <span class="fw-bold">Proper Handling of Belongings:</span> Professional movers know how to
                            treat your stuff with care; whether it’s fragile or heavy, they’ll make sure it arrives safely.

                        </li>
                        <li>
                            <span class="fw-bold">Customized Moving Plans:</span> Every move is different, and they’ll
                            customize the plan to fit your needs. It doesn’t matter if you need special packing or storage
                            facility, they’ve got you covered.
                        </li>
                        <li>
                            <span class="fw-bold">Peace of Mind: </span>With experts handling everything, you can relax
                            knowing your move is in good hands. There will be no stress or surprises—just a smooth
                            transition to your new home.

                        </li>
                    </ul>

                </div>
            </div>

        </div>

    </section>

    <script>
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
    </script>
@endsection
