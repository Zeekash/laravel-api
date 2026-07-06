@extends('layouts.app')
@section('title')
    Local Movers in the USA - Get Professional Moving Services
@endsection
@section('meta_description')
    Looking for reliable and affordable local movers in the USA? Get professional moving services tailored to your needs.
    Enjoy a smooth move.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/local_mover.css') }}">
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
    <section class="home_hero">
        <div class="home_page_banner mb-5">
            {{-- <img src={{ asset('assets/img/upper_banner.png') }} alt="banner_image" class="upper_banner" width="100%"> --}}

            <div class="container">
                {{-- <div class="row">
                    <div class="col-lg-8"> --}}
                {{-- <button class="btn btn_home_hero">Seafood</button> --}}

                {{-- </div>
                </div> --}}
                <div class="col-xl-9 col-12 mt-3">
                    <div class="form_wrapper">
                        <div class="col-lg-8 mb-3">
                            <h1 class="heading_cont">Find & Compare Local Movers in USA</h1>

                        </div>
                        {{-- <hr style="width: 57%;color: #0000007a;"> --}}
                        <form action="" class="mt-2 main_banner_form" style="">
                            <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
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
    {{-- <div class="local-movers-main-banner">
        <div class="local-movers-main-banner-item item-four">
            <div class="container">
                <div class="banner_layout">
                    <div class="banner_child">
                        <div class="row align-items-center ">
                            <div class="col-lg-12 col-12 justify-content-center align-items-center mb-1">
                                <div class="banner_header text-center ">
                                    <h1>
                                        Local Movers
                                        <br>
                                    </h1>
                                    <div class="bread_crumb_section d-flex justify-content-center">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">
                                                    <i class="fa fa-home " aria-hidden="true"></i>
                                                    <a class="text-dark" href="#">Home</a>
                                                </li>
                                                <li class="breadcrumb-item active text-dark" aria-current="page">Local
                                                    Movers
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <p>Moving made easy with our local movers! Our team provides efficient,<br> reliable
                                        service
                                        to ensure a
                                        stress-free relocation experience.
                                    </p>

                                  
                                </div>
                            </div>
                          
                            <div class="col-lg-9 m-auto">
                                <div class="banner_form">
                                    <h2 class="moving_quote mb-1">Free Moving Quote</h2>
                                    <small>Fields marked with an * are mandatory.</small>
                                    <form action="#">
                                        <div class="form-group">
                                            <input
                                                class="me-3 mb-lg-0 mb-2 zipfromsearch form-control  @error('zip_from') is-invalid @enderror"
                                                value="{{ old('zip_from') }}" name="zip_from" maxlength="5"
                                                placeholder="City you are Moving From *" aria-label="Moving from"
                                                autocomplete="off">
                                            <input
                                                class="me-3 mb-lg-0 mb-3 ziptosearch form-control  @error('zip_to') is-invalid @enderror"
                                                value="{{ old('zip_to') }}" name="zip_to" maxlength="5"
                                                placeholder="City you are Moving To *" aria-label="Moving to"
                                                autocomplete="off">
                                            <button type="button" id="Modal_Btn" data-bs-toggle="modal"
                                                data-bs-target="#ModalForm">Get Free Quote</button>
                                        </div>
                                        <div class="secure d-flex align-items-center justify-content-center mt-3">
                                            <img class="me-2" src="{{ asset('assets/img/unlock.svg') }}" width="20px"
                                                alt="secure">
                                            <small>Your personal information is 100% secure and save with our <a
                                                    href="https://mymovingjourney.com/privacy-policy">
                                                    <strong>Privacy Policy</strong></a> </small>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- <section id="local_mover">
                                                                                                                                                                                                                                                                                                                                                                                                                                    <img class="local_mover_page_img" src="https://mymovingjourney.com/assets/img/local-movers.webp" loading="eager"
                                                                                                                                                                                                                                                                                                                                                                                                                                        alt="local mover">
                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-lg-12 text-center justify-content-center ">
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="headings">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <h1>Local Movers</h1>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="bread_crumb_section d-flex justify-content-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <ol class="breadcrumb">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li class="breadcrumb-item">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fa fa-home text-white" aria-hidden="true"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#">Home</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li class="breadcrumb-item active" aria-current="page">Local Movers</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                            </ol>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        </nav>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p>Moving made easy with our local movers! Our team provides efficient, reliable service to ensure a
                                                                                                                                                                                                                                                                                                                                                                                                                                                        stress-free relocation experience.</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-12 state_form">
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="w-100 mt-3  d-none " id="row_modal">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row rounded-3 py-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-12  col-md-3 col-lg-3 my-2 d-flex flex-column justify-content-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h2 class="fs-4 mb-0 multi-step-heading text-start fw-bold">Free Moving Quote</h2>
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('name') }}" name="name"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    placeholder="First Name">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('name') }}" name="name"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    placeholder="Last Name">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @error('name')
        <span class="invalid-feedback" role="alert">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <strong>Name is required</strong>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </span>
    @enderror
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-12 col-md-6 col-lg-6 my-2 d-flex flex-column">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-0 fs-14">City You Are Moving From <span
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class="text-danger">*</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="input-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="input-group-text py-0">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{-- <i class='bx bx-buildings'></i> --}}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="{{ asset('assets/img/icons/move_out.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width="90%" alt="zip_from">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <p class="mb-0 fs-14">City You Are Moving To <span
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class="text-danger">*</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="input-group">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="input-group-text py-0">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    {{-- <i class='bx bx-buildings'></i> --}}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="{{ asset('assets/img/icons/move_out.png') }}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        width="90%" alt="zip_to">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('date') }}" name="date"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    placeholder="Moving Date">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    name="move_size" id="move_size"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    aria-label="Default select example">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('phone_no') }}" name="phone_no"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    placeholder="Phone No" id="phone_no"
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
                <div id="cards-col-2" class="col-12 col-sm-12 col-md-3  pe-lg-5 order-lg-0 order-1">
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
                    <div class="card px-0 rounded-2 call-now"
                        style="background: #ffffff !important; border-bottom: 1px solid #e7eff1; padding-bottom: 20px;">
                        <a href="tel:(786) 980-3050">
                            <h4>Call now for a cost estimate</h4>
                        </a><a href="tel:(786) 980-3050"><i class="fa-solid fa-phone"></i> (786) 980-3050</a>
                        <p>Available 24/7</p>

                    </div>
                    {{-- <div class="side_searchbar">
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

                            <h4 class="mt-4">Recent Blogs</h4>
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
                                                        <small class=" moving_blogs_card_small">Published
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
                <div class="col-12 col-sm-12 col-md-9  for_card_responsive ">
                    <div class="mb-2">
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

                                                <span id="review">Based on {{ $data->total_reviews }} Reviews</span>


                                                {{-- <p class="mb-2 headi">
                                                    {{ $data->subject }}</p>
                                                <p class="para2 m-0">
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
                                                </span> --}}
                                                <p class="state_base mt-2">
                                                    <span class="fw-bold me-2">Company Based In :
                                                        {{ $data->state }}</span>
                                                </p>

                                            </div>


                                        </div>
                                        <div class="col-12 col-lg-3 order-lg-1 order-0 d-flex justify-content-between flex-wrap align-items-center p-2"
                                            style="
                                            padding: 15px !important;
                                            max-width: 190px;
                                            height: 150px;
                                            margin-bottom: 5px;
                                            margin-top: 0%;
                                            ">
                                            {{-- <span>US DOT:400</span> --}}

                                            <span hidden class="image">{{ $data->image }}</span>
                                            @if ($data->image)
                                                @php
                                                    $imageUrl = str_starts_with($data->image, 'companies/image/')
                                                        ? URL::to('/' . $data->image)
                                                        : URL::to('/companies/image/' . $data->image);
                                                @endphp
                                                {{-- {{ URL::to('/companies/image/' . $data->image) }} --}}
                                                <img loading="lazy" src="{{ $imageUrl }}" alt="{{ $data->image }}"
                                                    class=" white-logo " style="border-radius: 6px; ">
                                            @else
                                                <img loading="lazy" src="{{ URL::to('/img/samplelogo.webp') }}"
                                                    alt="{{ $data->image }}" class="company-img">
                                            @endif
                                            <p class="dot_number mb-4 ">
                                                <span class="fw-bold">US DOT:</span>
                                                {{ $data->dot_no ?? 'Not Provided' }}
                                            </p>
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
                    </div>
                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                        data-wow-duration="0.5s">
                        {!! $pagePaginate !!}
                    </div>

                </div>
            </div>
    </section>
    <section id="local_movers_data">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>What Makes a Local Move Different?</h2>
                    <p class="mb-0">If you've ever considered moving locally, you'll quickly realize that it is totally
                        different from moving long distances.
                    </p>
                    <p class="mb-1">The idea of moving to a new place can seem overwhelming at first, but when it’s a
                        local move, things are a bit more manageable and less stressful!</p>
                    <p>
                        A <strong>local move</strong> is all about keeping things simple.
                    </p>
                    <p>
                        So, what exactly makes it different?
                    </p>
                    <ul>
                        <li>
                            <strong>It’s all about staying close to home.</strong> A local move typically means relocating
                            within the same city, town, or metropolitan area. It’s a move that’s right around the corner.
                        </li>
                        <li>
                            <strong>It can be done in a day.</strong> One of the biggest perks of a local move is that it
                            can usually be wrapped up in a single day. No overnight stays or worrying about where your
                            things will go overnight.
                        </li>
                        <li>
                            <strong>The rules are a bit easier to follow.</strong> With local movers, the process tends to
                            be much more straightforward. Unlike long-distance moves, you don’t need to deal with complex
                            interstate regulations or permits.
                        </li>
                    </ul>
                    <h2>What is the Average Cost of a Local Move?</h2>
                    <p>
                        So, you're thinking about hiring local movers and wondering, " How much is this going to cost?”
                    </p>
                    <p>
                        Local moves tend to be much more affordable than <a
                            href="https://mymovingjourney.com/resource/best-long-distance-moving-companies"
                            target="_blank"><strong>long-distance moves</strong></a> However, there are a few costs
                        associated with the service, and you'll want to know about them upfront.
                    </p>
                    <p>
                        Let’s break down the costs you can expect when booking a local moving service in the USA.
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <h3 class="fw-bold list_head">Hourly Rate for Local Movers</h3>
                            <p>
                                Most local movers charge by the hour, which is the bread and butter of <a
                                    href="https://mymovingjourney.com/quotation" target="_blank"><strong>moving
                                        costs</strong></a>. The
                                hourly rate usually ranges between $80 and $120.
                            </p>
                            <p>
                                Generally, the moving team will include 2-4 movers, so if it’s a 4-hour job and you're
                                paying $100 an hour, you're looking at about $400 for labor.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Travel Fees</h3>
                            <p>
                                <a href="https://mymovingjourney.com/" target="_blank"><strong>Professional moving
                                        companies</strong></a> often charge a "travel fee" in addition to the hourly rate.
                                This covers the time and gas it takes to get to your location and usually ranges from $50 to
                                $100.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Packing Supplies</h3>
                            <p>
                                If you don’t have enough boxes or <a
                                    href="https://mymovingjourney.com/blogs/how-much-do-professional-packers-cost"
                                    target="_blank"><strong></strong>packing</a> materials lying around, you’ll need to buy
                                or rent
                                some from the moving company. Expect to pay anywhere from $1 to $3 for small boxes, and up
                                to $10 for larger ones.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Additional Fees for Heavy or Large Items</h3>
                            <p>
                                Some local movers charge extra for bulky or heavy items, like pianos, safes, or <a
                                    href="https://mymovingjourney.com/blogs/best-ways-to-protect-your-furniture-before-moving"
                                    target="_blank"><strong>large
                                        furniture</strong></a>. The fees can range from $100 to $500.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Insurance</h3>
                            <p>
                                Most moving companies offer basic coverage (usually around $0.60 per pound per item), but if
                                you have valuable stuff, this could cost anywhere from $10 to $50 per hour.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head">Tips for the Movers</h3>
                            <p>
                                It's not technically a cost, but you'll want to factor it in. A tip is always appreciated,
                                and while it's not required, it's a nice way to show your gratitude for the hard work.
                                Typically, people give anywhere from $20 to $50 per mover.
                            </p>
                        </li>
                        <li>
                            <h3 class="fw-bold list_head"><a
                                    href="https://mymovingjourney.com/blogs/how-much-do-moving-companies-charge"
                                    target="_blank">Parking Fees</a> </h3>
                            <p>
                                If you’re moving to or from a busy area, you might have to pay for parking or even a permit
                                to park the moving truck. These fees can range from $20 to $100 or more.
                            </p>
                        </li>
                    </ul>
                    <p class="fw-bold">Here’s a Breakdown of the Costs</p>
                    <div class="table-responsive mt-2 w-100" style="font-family: var(--para-family);">
                        <table class="table fw-semibold">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #116087; color: white; width: 25%;" scope="col">
                                        Cost Component</th>
                                    <th style="background-color: #116087; color: white;" scope="col">Estimated Cost
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hourly Rate for Movers</td>
                                    <td>$80 - $120 per hour</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Travel Fee</td>
                                    <td style="background-color: #11608714;">$50 - $100 (round trip)</td>
                                </tr>
                                <tr>
                                    <td>Packing Supplies</td>
                                    <td>$1 - $10 per box</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Heavy or Large Items</td>
                                    <td style="background-color: #11608714;">$100 - $500 (depending on item)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Insurance</td>
                                    <td>$10 - $50 per hour (for coverage)</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #11608714;">Tips for Movers</td>
                                    <td style="background-color: #11608714;">$20 - $50 per mover</td>
                                </tr>
                                <tr>
                                    <td>Parking Fees/Permits</td>
                                    <td>$20 - $100+</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2>Reasons to Choose Local Movers for Your Next Move</h2>
                    <p>Here are compelling reasons why choosing local movers is an intelligent decision for a smooth and
                        hassle-free moving experience.
                    </p>
                    <p>
                        It is important to note that these average costs are compiled from customer feedback on My Moving
                        Journey and may differ from direct company quotes. You should gather quotes from various local
                        moving companies to ensure an accurate estimate tailored to your specific requirements.
                    </p>
                    <ul class="factors">
                        <li>
                            <span class="fw-bold">They Know the Area Like the Back of Their Hand:</span> Local movers are
                            experts in the area. They know the quickest routes and the best shortcuts, saving you time and
                            hassle.
                        </li>
                        <li>
                            <span class="fw-bold">Personalized Service:</span> Local movers offer a personal touch because
                            they're part of your community. They tailor their services to meet your specific needs.
                        </li>
                        <li>
                            <span class="fw-bold">Cost-Effective Solutions:</span> Local movers are more affordable because
                            they don’t have the overhead costs of national chains. If you're moving short distances, you’ll
                            get top-quality service without the hefty price tag.

                        </li>
                        <li>
                            <span class="fw-bold">Reputation in the Community: </span>These movers rely on local referrals
                            and work hard to maintain a great reputation. You can trust them to get the job done right!
                        </li>
                        <li>
                            <span class="fw-bold">Quick Response and Flexibility: </span>Local movers are usually more
                            flexible and quick to respond, making planning your move around your timeline easier.

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
