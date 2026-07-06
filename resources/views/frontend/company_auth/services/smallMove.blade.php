@extends('layouts.app')
@section('title')
    Efficient Small Moves – Easy Solutions for Your Compact Moving Needs
@endsection
@section('meta_description')
    Discover reliable solutions for small moves with our expert listing. Whether it's a studio apartment or a few items,
    find the perfect movers to cater to your small moving needs.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/small_movers.css') }}">
    <div class="main-banner">
        <div class="container">
            <div class="banner_layout">
                <div class="banner_child">
                    <div class="row align-items-center ">
                        <div class="col-lg-8 col-12 justify-content-center align-items-center">
                            <div class="banner_header text-start ">
                                <h1>
                                    Find The Small Movers At<br>My Moving Journey
                                </h1>
                                <p>When moving to a dorm, studio, or small apartment, you do not need to hire full-service
                                    movers. You can save time and money by hiring companies specializing in small moves. The
                                    companies consider shipment weight under 2,000 lbs. a small move</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mt-0 d-lg-block d-none col-12 ">
                            <div class="w-100 mt-3  d-none " id="row_modal">
                                <div class="container blue-shadow   ">
                                    <div class=" d-flex flex-column justify-content-center rounded-3 py-2">
                                        <div class=" my-2 d-flex flex-column justify-content-center">
                                            <h2 class="fs-5 mb-0 multi-step-heading text-center fw-bold">Free Moving
                                                Quote</h2>
                                            <span class="field_mark text-center">Fields marked with an * are required</span>
                                        </div>
                                        <div class=" d-flex flex-column my-3">
                                            <p class="mb-0 fs-14"
                                                style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                City You
                                                Are Moving From*</p>
                                            <div class="input-group">
                                                <span class="input-group-text py-0">
                                                    <i class='bx bx-buildings'></i>
                                                </span>
                                                <input type="text"
                                                    class="zipfromsearch form-control  @error('zip_from') is-invalid @enderror"
                                                    value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                    placeholder="Zip From">
                                                @error('zip_from')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Zip From is required</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" d-flex flex-column">
                                            <p class="mb-0 fs-14"
                                                style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                City You
                                                Are Moving To*</p>
                                            <div class="input-group">
                                                <span class="input-group-text py-0">
                                                    <i class='bx bx-buildings'></i>
                                                </span>
                                                <input type="text"
                                                    class="ziptosearch form-control  @error('zip_to') is-invalid @enderror"
                                                    value="{{ old('zip_to') }}" name="zip_to" maxlength="5"
                                                    placeholder="Zip To">
                                                @error('zip_to')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Zip To is required</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div
                                            class=" d-flex flex-column align-items-center my-3
                                            my-3    ">
                                            <button type="button" id="Modal_Btn" data-bs-toggle="modal"
                                                data-bs-target="#ModalForm"
                                                class="sdg py-1 px-4 w-75 mt-0 justify-content-center">Next</button>
                                            <label class="discount_cost my-2 ">Save up to 25% on moving costs</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <!-- @include('backend.layouts.partials.messages')  --> --}}
                        {{-- <div class="col-12 d-flex justify-content-center p-4">
                                <img src="{{ asset('assets/img/brand_company.png') }}" alt="" srcset="">
                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="movers_card" class="mt-sm-5 mt-4 p-2">
        <div class="container">
            <div class="row gx-0">
                <div id="cards-col-2" class="col-12 col-sm-12 col-md-4 px-3 px-lg-5 order-lg-0 order-1">
                    <div class="side_searchbar">
                        <h2>Search For Movers</h2>
                        <form action="{{ route('company.company-search') }}" method="get" style="width: 100%  ">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" value="{{ request('search') }}"
                                    placeholder="search for company">
                                <span class="input-group-text ">
                                    <button type="submit" aria-label="search button"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <div class="country_movers mt-4">
                            <h3 class="side_searchbar">Top Moving States</h3>

                            <ul class="list-unstyled mt-1">
                                @foreach ($topStates as $state)
                                    <li>
                                        <a href="{{ route('state.show', ['stateSlug' => $state->slug]) }}"> Movers in
                                            {{ $state->state }}
                                            ({{ $state->company_count }})
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 p-0 pe-2">
                    <div class="mb-2">
                        <h2 class="head-top_1">Our Latest Movers</h2>
                    </div>
                    @forelse($data as $data)
                        <div class="row w-100 justify-content-center d-flex my-3 mx-0 home_company_card article-loop"
                            id="card-of-services">
                            <a href="{{ route('company.show', $data->slug) }}">
                                <div class="row">
                                    <div class="col-12 p-2 order-lg-0 order-1  col-lg-9 main-card">
                                        <div class="row my-0">
                                            <div class="col-12">
                                                <h3 class="m-0 company-name">
                                                    {{ $data->company_name }}
                                                    @if ($data->claimed == 1)
                                                        <span>
                                                            <img src="{{ asset('assets/img/verified (4).png') }}"
                                                                style="width: 16px;!important">
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
                                                        style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
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
                                                        style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
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
                                                        style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
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
                                                        style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
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
                                                        aria-hidden="true">
                                                    </i>
                                                    <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fa fa-star-half-stroke"
                                                        style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
                                                @elseif($rounded == 5)
                                                    <i class="fas fa-star" style="font-size:18px; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:18px; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:18px; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:18px; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                    <i class="fas fa-star" style="font-size:18px; color:#ff9800"
                                                        aria-hidden="true"></i>
                                                @endif
                                                <span class="text-danger">({{ round($avg_rating, 1) }})</span>
                                            </p>
                                            <span id="review"> {{ $data->total_reviews }} Reviews</span>

                                            <p class="mb-2 headi">
                                                {{ $data->subject }}</p>
                                            <p class="para2 m-0">
                                                @if ($data->your_review != '')
                                                    <span class="fs-5">
                                                    </span>{{ substr(strip_tags($data->your_review), 0, 100) }}
                                                    <span
                                                        class="read_more">{{ strlen(strip_tags($data->your_review)) > 100 ? '... Read More' : '' }}</span>
                                                    <span class="fs-5 "> </span>
                                                @endif
                                            </p>
                                            <span class="review_person_name mt-2">
                                                @if ($data->name != '')
                                                    Last Review by {{ $data->name }}
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
                                            </span>
                                        </div>


                                    </div>
                                    <div
                                        class="col-12 col-lg-3 order-lg-1 order-0 d-flex ustify-content-lg-center justify-content-between flex-wrap align-items-center p-2">
                                        {{-- <span>US DOT:400</span> --}}
                                        <p class="dot_number text-decoration-underline order-lg-0 order-1">
                                            <span class="fw-bold">US DOT:</span>
                                            {{ $data->dot_no ?? 'Not Provided' }}
                                        </p>
                                        <span hidden class="image">{{ $data->image }}</span>
                                        @if ($data->image)
                                            @php
                                                $imageUrl = str_starts_with($data->image, 'companies/image/')
                                                    ? URL::to('/' . $data->image)
                                                    : URL::to('/companies/image/' . $data->image);
                                            @endphp
                                            <img loading="lazy" src="{{ $imageUrl }}" alt="{{ $data->image }}"
                                                class=" black-logo " style="border-radius: 6px; ">
                                        @else
                                            <img loading="lazy" src="{{ URL::to('/img/samplelogo.webp') }}"
                                                alt="{{ $data->image }}" class="company-img">
                                        @endif

                                    </div>
                                    <!-- <div
                                                        class="col-lg-12 d-flex flex-wrap justify-content-between mb-2  order-lg-1 order-2">
                                                        <span
                                                            style="  font-size: 16px; color: #cb202a; font-family: "Outfit",
            sans-serif,
            serif; font-weight: 800; text-decoratation:underline;">
                                                            @if ($data->cost != '')
    Move Cost: ${{ $data->cost }}
    @endif
                                                        </span>
                                                        <p class="based_company m-0 ">Based in
                                                            {{ $data->city }}, {{ $data->state }} </p>

                                                    </div> -->
                                </div>



                            </a>
                        </div>


                    @empty
                        <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to
                            create
                            account ?</a>
                    @endforelse
                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                        data-wow-duration="0.5s">
                        {!! $pagePaginate !!}
                    </div>


                </div>
                <!-- <div class="col-lg-4">
                                    <div class="side_searchbar">
                                        <h2>Search For Movers</h2>
                                        <form action="{{ route('company.company-search') }}" method="get" style="width: 85%">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="search"
                                                    value="{{ request('search') }}" placeholder="search for company">
                                                <span class="input-group-text rounded-end">
                                                    <button type="submit" aria-label="search button"><i
                                                            class="fa-solid fa-magnifying-glass"></i></button>
                                                </span>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="mt-4">
                                        <div class="country_movers mt-4">
                                            <h3 class="side_searchbar">Top Moving States</h3>

                                            <ul class="list-unstyled mt-1">
                                                @foreach ($topStates as $state)
    <li>
                                                        <a href="{{ route('state.show', ['stateSlug' => $state->slug]) }}"> Movers in
                                                            {{ $state->state }}
                                                            ({{ $state->company_count }})
    </a>
                                                    </li>
    @endforeach

                                            </ul>
                                        </div>

                                    </div>
                                </div> -->

            </div>
    </section>




    <!--<section id="local_mover">-->
    <!--    <img src="{{ asset('assets/img/small-movers.webp') }}" loading="eager" alt="local mover">-->

    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12">-->
    <!--                <div class="mover_heading text-center">-->
    <!--                    <h1><span>Small</span> <br> movers </h1>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-12 state_form">-->
    <!--                <div class="w-100 mt-3  d-none "-->
    <!--                    style="background: #ffffff8f;box-shadow: 0px 1px 14px #0072ff3b;border-radius:6px;" id="row_modal">-->
    <!--                    <div class="container">-->
    <!--                        <div class="row rounded-3 py-3">-->
    <!--                            <div class="col-12  col-md-3 col-lg-3 my-2 d-flex flex-column justify-content-center">-->
    <!--                                <h2 class="fs-4 mb-0 multi-step-heading text-start">GET-->
    <!--                                    MOVING QUOTE-->
    <!--                                </h2>-->
    <!--                            </div>-->
    <!--                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">-->
    <!--                                <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving From </p>-->
    <!--                                <div class="input-group">-->
    <!--                                    <span class="input-group-text py-0">-->
    <!--                                        <i class='bx bx-buildings'></i>-->
    <!--                                    </span>-->
    <!--                                    <input type="text" id=""-->
    <!--                                        class="zipfromsearch form-control form-control-md @error('zip_from')
is-invalid
@enderror"-->
    <!--                                        value="{{ old('zip_from') }}" name="zip_from" maxlength="5"-->
    <!--                                        placeholder="Zip From">-->
    <!--                                    @error('zip_from')
        -->
        <!--                                        <span class="invalid-feedback" role="alert">-->
        <!--                                            <strong>Zip From is required</strong>-->
        <!--                                        </span>-->
        <!--
    @enderror-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">-->
    <!--                                <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving To-->
    <!--                                </p>-->
    <!--                                <div class="input-group">-->
    <!--                                    <span class="input-group-text py-0">-->
    <!--                                        <i class='bx bx-buildings'></i>-->
    <!--                                    </span>-->
    <!--                                    <input type="text" id=""-->
    <!--                                        class="ziptosearch form-control form-control-md @error('zip_to')
is-invalid
@enderror"-->
    <!--                                        value="{{ old('zip_to') }}" name="zip_to" maxlength="5" placeholder="Zip To">-->
    <!--                                    @error('zip_to')
        -->
        <!--                                        <span class="invalid-feedback" role="alert">-->
        <!--                                            <strong>Zip To is required</strong>-->
        <!--                                        </span>-->
        <!--
    @enderror-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-end">-->
    <!--                                <button type="button" id="Modal_Btn" data-bs-toggle="modal" href="#ModalForm"-->
    <!--                                    class="sdg py-1 px-4 w-100 mt-0">Next</button>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <button type="button" id="btn-canvas-Form" data-bs-toggle="modal" href="#ModalForm"-->
    <!--                    class="btn default-btn d-none py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center"><i-->
    <!--                        class='bx bx-calculator me-2'></i>Get Quote</button>-->
    <!--                <div class="modal fade p-0" id="ModalForm" data-bs-backdrop="static" data-bs-keyboard="false"-->
    <!--                    tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">-->
    <!--                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">-->
    <!--                        <div class="modal-content border-0 rounded-0">-->
    <!--                            <div class="modal-header">-->
    <!--                                <h2 class="fs-4 mb-0 multi-step-heading text-center">GET YOUR-->
    <!--                                    FREE-->
    <!--                                    MOVING QUOTE-->
    <!--                                </h2>-->
    <!--                                <button type="button" class="btn-close" data-bs-dismiss="modal"-->
    <!--                                    aria-label="Close"></button>-->
    <!--                            </div>-->
    <!--                            <div class="modal-body">-->
    <!--                                <form action="#"-->
    <!--                                    class="company-show-form shadow-none py-2 px-0 px-md-3 border-0 bg-white rounded-0"-->
    <!--                                    method="POST">-->
    <!--                                    @csrf-->
    <!--                                    <div class="row">-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">City You Are Moving From <span-->
    <!--                                                    class="text-danger">*</span></p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-buildings'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text" id=""-->
    <!--                                                    class="zipfromsearch form-control form-control-md @error('zip_from')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('zip_from') }}" name="zip_from" maxlength="5"-->
    <!--                                                    placeholder="Zip From">-->
    <!--                                                @error('zip_from')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Zip From is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">City You Are Moving To <span-->
    <!--                                                    class="text-danger">*</span></p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-buildings'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text" id=""-->
    <!--                                                    class="ziptosearch form-control form-control-md @error('zip_to')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('zip_to') }}" name="zip_to" maxlength="5"-->
    <!--                                                    placeholder="Zip To">-->
    <!--                                                @error('zip_to')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Zip To is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">When do you expect to move <span-->
    <!--                                                    class="text-danger">*</span>-->
    <!--                                            </p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-calendar-week'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text" id="moveDate"-->
    <!--                                                    class="form-control @error('date')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('date') }}" name="date"-->
    <!--                                                    placeholder="Moving Date">-->
    <!--                                                @error('date')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Date is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">Move Type <span class="text-danger">*</span></p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-package'></i>-->
    <!--                                                </span>-->
    <!--                                                <select class="form-select @error('move_size') is-invalid @enderror"-->
    <!--                                                    name="move_size" id="move_size"-->
    <!--                                                    aria-label="Default select example">-->
    <!--                                                    <option selected value="{{ old('move_size') }}">-->
    <!--                                                        {{ old('move_size') != '' ? old('move_size') : ' Select Move Size ' }}-->
    <!--                                                    </option>-->
    <!--                                                    <option value="4 Bedroom Home">4 Bedroom Home-->
    <!--                                                    </option>-->
    <!--                                                    <option value="3 Bedroom Home">3 Bedroom Home-->
    <!--                                                    </option>-->
    <!--                                                    <option value="2 Bedroom Home">2 Bedroom Home-->
    <!--                                                    </option>-->
    <!--                                                    <option value="1 Bedroom Home">1 Bedroom Home-->
    <!--                                                    </option>-->
    <!--                                                    <option value="Studio">Studio</option>-->
    <!--                                                    <option value="Office Move">Office Move</option>-->
    <!--                                                    <option value="Commercial Move">Commercial Move-->
    <!--                                                    </option>-->
    <!--                                                </select>-->
    <!--                                                @error('move_size')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Move size is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">Name <span class="text-danger">*</span>-->
    <!--                                            </p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-user-circle'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text"-->
    <!--                                                    class="form-control @error('name')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('name') }}" name="name" placeholder="Name">-->
    <!--                                                @error('name')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Name is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">Email <span class="text-danger">*</span>-->
    <!--                                            </p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-envelope'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text"-->
    <!--                                                    class="form-control @error('email')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('email') }}" name="email" placeholder="Email">-->
    <!--                                                @error('email')
        -->
        <!--                                                    <span class="invalid-feedback" role="alert">-->
        <!--                                                        <strong>Email is required</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">-->
    <!--                                            <p class="mb-0 fs-14">Phone Number <span class="text-danger">*</span>-->
    <!--                                            </p>-->
    <!--                                            <div class="input-group">-->
    <!--                                                <span class="input-group-text py-0">-->
    <!--                                                    <i class='bx bx-phone'></i>-->
    <!--                                                </span>-->
    <!--                                                <input type="text"-->
    <!--                                                    class="form-control @error('phone_no')
is-invalid
@enderror"-->
    <!--                                                    value="{{ old('phone_no') }}" name="phone_no" id="phone_no"-->
    <!--                                                    oninput="formatPhoneNumber(this)" maxlength="16">-->
    <!--                                                @error('phone_no')
        -->
        <!--                                                    <span class="invalid-feedback d-block" role="alert">-->
        <!--                                                        <strong>Phone No. format must be-->
        <!--                                                            (xxx) xxx - xxxx</strong>-->
        <!--                                                    </span>-->
        <!--
    @enderror-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                        <div-->
    <!--                                            class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column justify-content-end">-->
    <!--                                            <button type="submit"-->
    <!--                                                class="btn sdg py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center"><i-->
    <!--                                                    class='bx bx-log-in-circle me-2'></i>Submit</button>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </form>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <section id="movers_card" class="mt-sm-5 mt-4">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12 text-center text-capitalize">
                    <h2 class="local_subheading">Small Movers in USA :12</h2>
                </div> --}}
                <div class="col-12 mt-3">
                    <p>
                        When moving to a dorm, studio, or small apartment, you do not need to hire full-service movers. You
                        can save time and money by hiring companies specializing in small moves. The companies consider
                        shipment weight under 2,000 lbs. a small move
                    </p>
                    <p>
                        Fortunately, the best movers are right before you; no need to search further. My Moving Journey
                        connects you with movers experienced in handling smaller-scale relocations. They have better
                        services, price range, facilities, and workforce.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="small_movers_data">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Criteria of Small Moves
                    </h2>
                    <p class="mb-0">Less than 2,000 lbs. of belongings are typically considered a small move. Small moves
                        only require a few helping hands, packing supplies, or equipment for loading or packing. Items like
                        clothes, bedding, and small appliances are considered small moves.
                    </p>
                    <p class="mb-1">A relocation is considered a small move if:
                    </p>
                    <ul>
                        <li>
                            The home type is a one-bedroom house storage unit or studio apartment.
                        </li>
                        <li>
                            Small office or shop relocation.
                        </li>
                        <li>
                            Moving only a piece of furniture
                        </li>
                        <li>
                            Moving to college dormitories with only a few boxes.
                        </li>
                    </ul>
                    <h2>Characteristics of Top Small Moves Company
                    </h2>
                    <p>Choose the best small moving company for a stress-free and relaxing move. Understand their services
                        to ensure a smooth and memorable journey.
                    </p>
                    <ul>
                        <li>
                            <span class="fw-bold">Customized Services:
                            </span>Top small movers customize your move according to your requirements. Small moving
                            companies are extremely adaptable to all your needs or services you want to add.
                        </li>
                        <li>
                            <span class="fw-bold">Customer Reviews:
                            </span>Best small movers have a good reputation and testimonials from their satisfied
                            customers. You can check online reviews from My Moving Journey.
                        </li>
                        <li>
                            <span class="fw-bold">Reliable:
                            </span>Trusted small movers staffed with professionals to ensure the secure and timely delivery
                            of your small, valuable items to your doorstep.

                        </li>
                        <li>
                            <span class="fw-bold">License:
                            </span>Small moving companies keep their licenses up to date from EMSCA to provide you peace of
                            mind and relaxation.

                        </li>
                        <li>
                            <span class="fw-bold">Insurance:
                            </span>Professional small movers have insurance policies to protect and recover your belongings.
                            You can relax and let the experts manage all the responsibility for the damage.
                        </li>
                    </ul>
                    <h2>Small Moves - Average Cost Analysis
                    </h2>
                    <p>The expense of hiring small moving companies can depend on the distance, weight, additional services,
                        and insurance cost. The average cost of small moves based on weight ranges from $300 to $2,400 for a
                        distance of 1000 to 2000 miles.
                    </p>
                    <p>
                        It is important to note that these average costs are compiled from customer feedback on My Moving
                        Journey and may differ from direct company quotes. It would help if you gathered quotes from various
                        small moves companies to ensure an accurate estimate tailored to your requirements.
                    </p>
                    <h2>Factors Impacting Small Moves Costs
                    </h2>
                    <p>
                        Understanding the factors that impact small movers' costs is crucial for planning a budget-friendly
                        and efficient relocation. Here are key elements influencing the expenses associated with small
                        moving services.
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">Distance:
                            </span>Distance significantly impacts moving costs; long-distance moves are pricier than shorter
                            ones due to increased fuel, tolls, taxes, and truck rental expenses.

                        </li>
                        <li>
                            <span class="fw-bold">Weight of cargo:
                            </span>Your moving costs rise with the weight of your belongings. Additional charges apply for
                            items exceeding 2000 lbs.
                        </li>
                        <li>
                            <span class="fw-bold">Time of the move:
                            </span>Save money by scheduling your move during off-peak seasons and avoiding busy times like
                            summer, holidays, weekends, and the start of the month.
                        </li>
                        <li>
                            <span class="fw-bold">Additional Services:
                            </span>Extra services will directly affect your costs. In small moves, you can add services like
                            loading, unloading, and special item handling services that increase your total costs.

                        </li>
                        <li>
                            <span class="fw-bold">Insurance:
                            </span>You can pay an insurance amount to protect your belongings. The level of protection you
                            choose will consequently increase your moving cost in small moves.
                        </li>
                    </ul>
                    <h2>Reason To Choose Small Moves
                    </h2>
                    <p>Selecting the right movers is integral for a successful relocation, and opting for small movers
                        brings several advantages. Here are engaging reasons why choosing small movers is an intelligent
                        decision for a smooth and hassle-free moving experience.
                    </p>
                    <ul class="Reasons">
                        <li>
                            <span class="fw-bold">Cost Effective:
                            </span>A small move company is cost-effective. They have the best cost-saving packages as
                            compared to full-service movers. Fewer truck space and fewer labor requirements allow movers to
                            charge less.
                        </li>
                        <li>
                            <span class="fw-bold">Efficient Handling:
                            </span>Small move companies efficiently handle small and light items. They consolidate partial
                            loads into a single truck to optimize space and reduce costs.
                        </li>
                        <li>
                            <span class="fw-bold">Student-friendly:
                            </span>Students moving into dorms can opt for budget-friendly services from small moving
                            companies. They offer discounted and comprehensive packages.


                        </li>
                        <li>
                            <span class="fw-bold">Flexibility:
                            </span> Small moves offer flexible services. It allows you to customize your move according to
                            your furniture, boxes, or individual items as needed.
                        </li>
                        <li>
                            <span class="fw-bold">Sustainability:
                            </span> Hiring small moving companies allows you to load belongings into small trucks. It
                            optimizes resources and minimizes waste, fuel consumption, emissions, and carbon footprint.

                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </section>
@endsection
