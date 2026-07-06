@extends('layouts.app')
@section('title')
    Premier Commercial Movers - Streamline Your Business Move with Precision
@endsection
@section('meta_description')
    Elevate your business move with our premier listing of commercial movers.
    Experience smooth and efficient relocations tailored to meet your business needs.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/commercial_movers.css') }}">

    <div class="commercial-movers-main-banner">
        <div class="commercial-movers-main-banner-item item-four">
            <div class="container">
                <div class="banner_layout">
                    <div class="banner_child">
                        <div class="row align-items-center ">
                            <div class="col-lg-8 col-12 justify-content-center align-items-center">
                                <div class="banner_header text-start ">
                                    <h1>
                                        Commercial Movers
                                        <br>
                                    </h1>
                                    <div class="bread_crumb_section d-flex ">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <i class="fa fa-home " aria-hidden="true"></i>
                                                    <a class="text-dark" href="#">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active text-dark" aria-current="page">Commercial
                                                    Movers
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <p>Moving made easy with our Commercial movers! Our team provides efficient, reliable
                                        service to ensure a
                                        stress-free relocation experience.
                                    </p>

                                    <!-- <div class="banner-btn d-flex  align-items-center mt-4 new_banner_btn_cs">-->
                                    <!--    <a href="http://localhost:8000/company/top-movers" class="default-btn btn fs-4 d-block ">-->
                                    <!--        Top Movers-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 mt-0 d-lg-block d-none col-12 ">
                                <div class="w-100 mt-3" id="row_modal">
                                    <div class="container blue-shadow " style="background: #fff; ">
                                        <div class=" d-flex flex-column justify-content-center rounded-3 py-2">
                                            <div class=" my-2 d-flex flex-column justify-content-center">
                                                <h2 class="fs-5 mb-0 multi-step-heading text-center fw-bold">Free Moving
                                                    Quote</h2>
                                                <span class="field_mark text-center">Fields marked with an * are
                                                    required</span>
                                            </div>
                                            <div class=" d-flex flex-column my-3">
                                                <p class="mb-0 fs-14"
                                                    style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                    City
                                                    You Are Moving From*</p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class="bx bx-buildings"></i>
                                                    </span>
                                                    <input type="text"
                                                        class="zipfromsearch form-control ui-autocomplete-input"
                                                        value="" name="zip_from" maxlength="5" placeholder="Zip From"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class=" d-flex flex-column">
                                                <p class="mb-0 fs-14"
                                                    style="color: #000000e3; font-weight: 600; font-family: var(--para-family);">
                                                    City
                                                    You Are Moving To*</p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class="bx bx-buildings"></i>
                                                    </span>
                                                    <input type="text"
                                                        class="ziptosearch form-control ui-autocomplete-input"
                                                        value="" name="zip_to" maxlength="5" placeholder="Zip To"
                                                        autocomplete="off">
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


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <section id="local_mover">
                    <img src="{{ asset('assets/img/Commercial-Movers.1.webp') }}" loading="eager" alt="local mover">

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mover_heading text-center">
                                    <h1><span>Commercial Movers</span></h1>
                                </div>
                            </div>
                            <div class="col-12 state_form">
                                <div class="w-100 mt-3  d-none "
                                    style="background: #ffffff;box-shadow: 0px 1px 14px #0072ff3b;border-radius:50px;" id="row_modal">
                                    <div class="container">
                                        <div class="row rounded-3 py-3 d-flex align-items-center">
                                            <div class="col-12  col-md-3 col-lg-3 my-2 d-flex flex-column justify-content-center">
                                                <h2 class=" mb-0 multi-step-heading text-start fw-bold">GET MOVING QUOTE
                                                </h2>
                                                <span class="field_mark">Fields marked with an * are required</span>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                                                <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving From </p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class='bx bx-buildings'></i>
                                                    </span>
                                                    <input type="text" id=""
                                                        class="zipfromsearch form-control form-control-md @error('zip_from') is-invalid @enderror"
                                                        value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                        placeholder="Zip From">
                                                    @error('zip_from')
        <span class="invalid-feedback" role="alert">
                                                                        <strong>Zip From is required</strong>
                                                                    </span>
    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                                                <p class="mb-0 fs-14 fw-bold" style="color: #363F39">City You Are Moving To
                                                </p>
                                                <div class="input-group">
                                                    <span class="input-group-text py-0">
                                                        <i class='bx bx-buildings'></i>
                                                    </span>
                                                    <input type="text" id=""
                                                        class="ziptosearch form-control form-control-md @error('zip_to') is-invalid @enderror"
                                                        value="{{ old('zip_to') }}" name="zip_to" maxlength="5" placeholder="Zip To">
                                                    @error('zip_to')
        <span class="invalid-feedback" role="alert">
                                                                        <strong>Zip To is required</strong>
                                                                    </span>
    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column justify-content-end">
                                                <label class="discount_cost">Save up to 25% on moving costs</label>
                                                <button type="button" id="Modal_Btn" data-bs-toggle="modal" href="#ModalForm"
                                                    class="sdg py-1 px-4 w-100 mt-0">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btn-canvas-Form" data-bs-toggle="modal" href="#ModalForm"
                                    class="btn default-btn d-none py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center"><i
                                        class='bx bx-calculator me-2'></i>Get Quote</button>
                                <div class="modal fade p-0" id="ModalForm" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content border-0 rounded-0">
                                            <div class="modal-header">
                                                <h2 class="fs-4 mb-0 multi-step-heading text-center">GET YOUR
                                                    FREE
                                                    MOVING QUOTE
                                                </h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#"
                                                    class="company-show-form shadow-none py-2 px-0 px-md-3 border-0 bg-white rounded-0"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">First Name <span class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-user-circle'></i>
                                                                </span>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                                    value="{{ old('name') }}" name="name" placeholder="First Name">
                                                                @error('name')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Name is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">Last Name <span class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-user-circle'></i>
                                                                </span>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                                    value="{{ old('name') }}" name="name" placeholder="Last Name">
                                                                @error('name')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Name is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">City You Are Moving From <span class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    {{-- <i class='bx bx-buildings'></i> --}}
                                                                    <img src="{{ asset('assets/img/icons/move_out.png') }}" width="90%" alt="zip_from">
                                                                </span>
                                                                <input type="text" id="zipFrom"
                                                                    class="zipfromsearch form-control  @error('zip_from') is-invalid @enderror"
                                                                    value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                                    placeholder="Zip From" required>
                                                                @error('zip_from')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Zip From is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">City You Are Moving To <span class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    {{-- <i class='bx bx-buildings'></i> --}}
                                                                    <img src="{{ asset('assets/img/icons/move_out.png') }}" width="90%" alt="zip_to">
                                                                </span>
                                                                <input type="text" id="zipTo"
                                                                    class="ziptosearch form-control  @error('zip_to') is-invalid @enderror"
                                                                    value="{{ old('zip_to') }}" name="zip_to" maxlength="5"
                                                                    placeholder="Zip To" required>
                                                                @error('zip_to')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Zip To is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">When do you expect to move <span
                                                                    class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-calendar-week'></i>
                                                                </span>
                                                                <input type="text" id="moveDate"
                                                                    class="form-control @error('date') is-invalid @enderror"
                                                                    value="{{ old('date') }}" name="date" placeholder="Moving Date">
                                                                @error('date')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Date is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">Move Type <span class="text-danger">*</span></p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-package'></i>
                                                                </span>
                                                                <select class="form-select @error('move_size') is-invalid @enderror"
                                                                    name="move_size" id="move_size" aria-label="Default select example">
                                                                    <option class="" selected value="{{ old('move_size') }}">
                                                                        {{ old('move_size') != '' ? old('move_size') : ' Select Move Size ' }}
                                                                    </option>
                                                                    <option value="4 Bedroom Home">4 Bedroom Home
                                                                    </option>
                                                                    <option value="3 Bedroom Home">3 Bedroom Home
                                                                    </option>
                                                                    <option value="2 Bedroom Home">2 Bedroom Home
                                                                    </option>
                                                                    <option value="1 Bedroom Home">1 Bedroom Home
                                                                    </option>
                                                                    <option value="Studio">Studio</option>
                                                                    <option value="Office Move">Office Move</option>
                                                                    <option value="Commercial Move">Commercial Move
                                                                    </option>
                                                                </select>
                                                                @error('move_size')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Move size is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">Email <span class="text-danger">*</span>
                                                            </p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-envelope'></i>
                                                                </span>
                                                                <input type="text"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    value="{{ old('email') }}" name="email" placeholder="Email">
                                                                @error('email')
        <span class="invalid-feedback" role="alert">
                                                                                    <strong>Email is required</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                            <p class="mb-0 fs-14">Phone Number <span class="text-danger">*</span></p>
                                                            <div class="input-group">
                                                                <span class="input-group-text py-0">
                                                                    <i class='bx bx-phone'></i>
                                                                </span>
                                                                <input type="text"
                                                                    class="form-control @error('phone_no') is-invalid @enderror"
                                                                    value="{{ old('phone_no') }}" name="phone_no" placeholder="Phone No" id="phone_no"
                                                                    oninput="formatPhoneNumber(this)" maxlength="16">
                                                                @error('phone_no')
        <span class="invalid-feedback d-block" role="alert">
                                                                                    <strong>Phone No. format must be
                                                                                        (xxx) xxx - xxxx</strong>
                                                                                </span>
    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2 d-flex align-items-center text-center justify-content-center  ">
                                                        <button type="submit"
                                                            class="btn sdg py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center">
                                                            <i class='bx bx-log-in-circle me-2'></i>
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
    <section id="movers_card" class="mt-sm-5 mt-4">
        <div class="container">
            <div class="row gx-0">
                <div id="cards-col-2" class="col-12 col-sm-12 col-md-4 px-3 px-lg-5 order-lg-0 order-1">
                    <div class="side_searchbar">
                        <h2>Search For Movers</h2>
                        <form action="{{ route('company.company-search') }}" method="get" style="width: 100%  ">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search"
                                    value="{{ request('search') }}" placeholder="search for company">
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
                <div class="col-12 col-sm-12 col-md-8 p-0 pe-2 ">
                    <div class="mb-2">
                        <h2 class="head-top_1"> Total Movers : 82 </h2>
                    </div>
                    @forelse($data as $data)
                        <div class="row w-100 justify-content-center mb-2 d-flex mx-0 home_company_card article-loop"
                            id="card-of-services mt-3">
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
                                                    <p class="my-0 d-flex align-items-start fs-14 mb-2"><i
                                                            class="fa-solid fa-phone-volume icons-company-show fs-14 me-2"></i>
                                                        <span class="fw-bold me-2">Phone: </span>
                                                        {{ $data->phone_no }}
                                                    </p>
                                                @endif
                                            </span>
                                        </div>


                                    </div>
                                    <div class="col-12 col-lg-3 order-lg-1 order-0 d-flex justify-content-center flex-wrap align-items-center p-2"
                                        style="
                                            padding: 15px !important;
                                            max-width: 190px;
                                            height: 150px;
                                            margin-bottom: 5px;
                                            margin-top: 0%;
                                            ">
                                        {{-- <span>US DOT:400</span> --}}
                                        <p class="dot_number mb-4 text-decoration-underline">
                                            <span class="fw-bold">US DOT:</span>
                                            {{ $data->dot_no ?? 'Not Provided' }}
                                        </p>
                                        <span hidden class="image">{{ $data->image }}</span>
                                        @if ($data->image)
                                            {{-- {{ URL::to('/companies/image/' . $data->image) }} --}}
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
                                                    <span class="move_cost">
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
                                                <button type="submit" aria-label="search button" style="border:none;"><i
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


    <section id="movers_card" class="mt-sm-5 mt-4">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12 text-center text-capitalize">
                    <h2 class="local_subheading">Commercial Movers in USA :45</h2>
                </div> --}}
                <div class="col-12 mt-3">
                    <p>
                        Handling the complexities of a commercial move can be an ominous task, and choosing conventional
                        commercial movers is necessary for a smooth transition. But at My Moving Journey, we attempt to
                        simplify your relocation by providing valuable perceptions into top-notch commercial moving
                        services.
                    </p>
                    <p>
                        Even if your business is shifting within the city or dilating to any adjacent area, our organized
                        information will guide you in choosing the best commercial moving experts. Connect with trustworthy
                        professionals who ensure a smooth transition by avoiding chaos or hassles.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="commercial_movers_data">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Criteria of Commercial Move </h2>
                    <p class="mb-0">Any move that involves the transition of a business or professional entity is
                        considered a commercial move compared to a residential move that involves moving the households
                        only.

                    </p>
                    <p class="mb-1">Your move is commercial if it contains:</p>
                    <ul>
                        <li>
                            Transportation of commercial equipment and assets such as machinery, furniture, inventory and
                            other business essential items.

                        </li>
                        <li>
                            Less downtown to decrease disruptions of daily business activities.
                        </li>
                        <li>
                            The involvement of different stakeholders and the logistics of a moving business operation
                        </li>
                    </ul>
                    <h2>Characteristics of a Top Commercial Moving Company</h2>
                    <p>Opting for a reliable commercial moving company is important for a stress-free and smooth relocation.
                        Understanding the fundamental characteristics of a reliable commercial moving company is important.
                    </p>
                    <ul>
                        <li>
                            <span class="fw-bold">Provides insurance: </span>Commercial companies provide insurance
                            coverage and are liable for any damage to ensure that your assets are safe in case of any
                            mishap.

                        </li>
                        <li>
                            <span class="fw-bold">Pellucid Rates: </span> When considering a commercial relocation, always
                            trust professionals because they can provide crystal-clear plans with costs upfront.
                        </li>
                        <li>
                            <span class="fw-bold">Dependability: </span>Employees working with commercial movers are
                            well-trained; you can set your assurance with them regarding your belongings.
                        </li>
                        <li>
                            <span class="fw-bold">Flexibility: </span>Commercial movers are flexible as they accommodate
                            changes in your moving plans and schedules and cover any unexpected challenges.
                        </li>
                        <li>
                            <span class="fw-bold">Dismantling: </span>Commercial movers provide setup services for your
                            office furniture and equipment so that your business can resume as soon as possible without any
                            loss.
                        </li>
                    </ul>
                    <h2>Commercial Movers- Average Cost Analysis
                    </h2>
                    <p>The cost of hiring commercial movers is based on different factors, including the distance and size
                        of the relocation you choose and the needed services. But a typical average cost for a commercial
                        move ranges from $1 to $2 per square foot, which means that for a 10,000 sqft office, the move cost
                        would be between $10,000 and $20,000.

                    </p>
                    <p>
                        It is essential to consider that these average costs are derived from the customer's feedback on My
                        Moving Journey and may differ from the actual quotes from the companies. To ensure accurate
                        estimates, you are advised to select multiple quotes from different commercial moving companies.

                    </p>
                    <h2>Factors Impacting Commercial Mover's Cost
                    </h2>
                    <p>
                        Before considering your commercial move, remember that some factors can make a difference in your
                        average commercial moving cost.
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">Additional Services: </span>Opting for services like packing,
                            unpacking, and storage can add to the total moving costs.
                        </li>
                        <li>
                            <span class="fw-bold">Time of the Year: </span>Moving during peak seasons or weekends may
                            increase costs due to increased demand.

                        </li>
                        <li>
                            <span class="fw-bold">Insurance: </span>The type of insurance you obtain for your belongings
                            incurs additional moving costs.


                        </li>
                        <li>
                            <span class="fw-bold">Size: </span>If your move size is large, you pay more money, but if it
                            is according to the usual size, you might pay less.
                        </li>
                        <li>
                            <span class="fw-bold">Distance: </span>Your cost depends upon the distance between your current
                            location and the one you are shifting to. Lower the distance, lower the cost and vice versa.
                        </li>
                    </ul>
                    <h2>Reasons to Choose Commercial Movers

                    </h2>
                    <p>Choosing commercial movers can provide you certainty during your relocation, and their proficiency in
                        their work can lead you to resume your business as soon as possible. Some of the reasons mentioned
                        can help you opt for your desired commercial movers.
                    </p>
                    <ul class="Reasons">
                        <li>
                            <span class="fw-bold">Expertise and Proficiency: </span>Commercial movers are well-trained in
                            relocating businesses and have experience and expertise in handling all kinds of logistics.
                        </li>
                        <li>
                            <span class="fw-bold">Customized Services: </span>Most commercial movers offer customized
                            services according to the requirements of your business.
                        </li>
                        <li>
                            <span class="fw-bold">Efficiency: </span>Being well-trained, commercial experts can perform
                            their tasks efficiently, from packing to streamlining your business.

                        </li>
                        <li>
                            <span class="fw-bold">Less Risk: </span> Commercial movers are trained to handle every
                            challenge and risk during your business move to avoid damage.

                        </li>
                        <li>
                            <span class="fw-bold">Mental Peace: </span> Commercial moving is stressful, but if you have
                            reliable movers, you can lay down stress-free as they handle everything professionally.
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </section>
@endsection
