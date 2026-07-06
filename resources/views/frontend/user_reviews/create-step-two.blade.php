@extends('layouts.app')
@section('title')
    Review : Step-two | {{ $company->company_name }}
@endsection
@section('meta_description')
    Step two to review the {{ $company->company_name }} company profile and provide valuable feedback.
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <style>
        p {
            margin-bottom: 15px;
            line-height: 1.8;
            color: #6b6b84;
            font-weight: 400;
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #1e1a1a;
            font-weight: 700;
            text-transform: capitalize;
        }

        .default-btn,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        .section-title h3,
        .section-title span,
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            font-family: "Montserrat", sans-serif;
        }


        .default-btn,
        body,
        p {
            font-size: 16px;
            font-family: "Montserrat", sans-serif;
        }



        .custom-file-upload1 {
            border: 1px solid #116087;
            display: inline-block;
            padding: 50px 15px;
            cursor: pointer;
            margin-right: 10px;
        }

        .custom-file-upload2 {
            border: 1px solid #116087;
            display: inline-block;
            padding: 50px 15px;
            cursor: pointer;
            margin-right: 10px;
        }

        .custom-file-upload3 {
            border: 1px solid #116087;
            display: inline-block;
            padding: 50px 15px;
            cursor: pointer;
            margin-right: 10px;
        }

        #drop.dropdown:hover .dropdown-menu {
            display: flex;
            flex-wrap: wrap;
        }

        #drop.dropdown-toggle::after {
            display: none;
        }

        #drop .dropdown-menu.show {
            width: fit-content;
        }

        #drop>.dropdown-menu {
            width: 100px !important;
        }

        #drop .dropdown-item {
            width: fit-content !important;
        }

        .upper-links {
            color: rgb(255, 255, 255) !important
        }

        .upper-links:hover {
            color: rgb(201, 201, 201) !important
        }

        .top-header-area {
            background-color: #090119;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .top-header-text span {
            font-size: 16px;
            color: #fff;
        }

        .top-header-text span i {
            font-size: 22px;
            color: #13543c;
            margin-right: 5px;
            position: relative;
            top: 2px;
        }

        .top-header-social {
            padding-left: 0;
            margin-bottom: 0;
            text-align: right;
        }

        .top-header-social li {
            display: inline-block;
            list-style-type: none;
            margin-right: 10px;
        }

        .blog-details-desc .article-content .entry-meta ul li:last-child,
        .copyright-area .copyright-area-content ul li:last-child,
        .main-navbar .navbar .navbar-nav .nav-item:last-child,
        .main-navbar .navbar .others-options .option-item:last-child,
        .others-option-for-responsive .option-inner .others-options .option-item:last-child,
        .post-navigation .navigation-links .nav-previous a:hover i,
        .single-footer-widget .social li:last-child,
        .top-header-social li:last-child {
            margin-right: 0;
        }

        .top-header-social li a i {
            display: inline-block;
            height: 35px;
            width: 35px;
            line-height: 35px;
            background-color: transparent;
            border: 1px solid #13543c;
            text-align: center;
            font-size: 20px;
            border-radius: 50px;
            color: #fff;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .top-header-social li a i:hover {
            background-color: #13543c;
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
        }

        #regForm .tab,
        #regForm .thanks-message,
        .about-fun-fact .col-lg-4:last-child .fun-fact::before,
        .blog-details-desc .article-content .entry-meta ul li:last-child::before,
        .comments-area .comment-respond label,
        .copyright-area .copyright-area-content ul li:last-child::before,
        .dropdownMenuButton1.dropdown-toggle::after,
        .hidden,
        .main-responsive-nav,
        .others-option-for-responsive,
        .page-banner-content ul li:first-child::before,
        .para-hide,
        .search-overlay,
        .widget-area .widget_search form .screen-reader-text {
            display: none;
        }

        .main-navbar {
            background: #fff;
            padding-top: 0;
        }

        .main-navbar .navbar {
            -webkit-transition: 0.5s;
            transition: 0.5s;
            padding: 0;
        }

        .main-navbar .navbar ul,
        .services-details-information .download-file ul {
            padding-left: 0;
            list-style-type: none;
            margin-bottom: 0;
        }

        .navbar-area.is-sticky {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            -webkit-box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.09);
            box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.09);
            -webkit-animation: 0.5s ease-in-out fadeInDown;
            animation: 0.5s ease-in-out fadeInDown;
        }

        .navbar-area {
            background-color: #fff;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .row-of-result-items,
        .upper-navbar {
            background: #123269;
        }

        .select2-container {
            border: 0px solid #00000047 !important;
            border-radius: 0;
            background: 0 0 !important;
            height: 100% !important;
            font-size: 16px;
            color: #000;
            font-family: "Montserrat", sans-serif;
        }

        .banner-btn button {
            text-align: center;
            transition: 0.5s;
            border-radius: 25px;
            border: 0px solid white;
            padding: 10px 30px;
            position: relative;
            z-index: 0;
            font-size: 14px;
            letter-spacing: 1px;
            background-color: #116087;
            color: white;
            font-family: var(--para-family);
        }

        select#currency {
            border: 1px solid #116087 !important;
            padding: 10px;
            /* background-color: #11608712 !important; */
        }

        select#select2 {
            border: 1px solid #116087 !important;
            padding: 10px;
            /* background-color: #11608712 !important; */
        }

        select#move_size {
            border: 1px solid #116087 !important;
            padding: 10px;
            /* background-color: #11608712 !important; */
        }

        /* textarea.form-control {
                                                                                                                                                                                                      background-color: #11608712 !important;
                                                                                                                                                                                                  } */

        .write_review_sec {
            max-width: 1000px;
            margin: 0 auto;

        }

        .company_img_wrapper {
            max-width: 160px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .step_one_review {
            padding: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
            margin-bottom: 50px
        }

        h3.comapny_name_review {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .locations {
            color: #313742d1;
            font-size: 15px;
            background-color: #f0f3f6;
            padding: 10px;
            border-radius: 7px;
            max-width: max-content;
            font-weight: 500;
        }

        .review_company_logo {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .other_fields {
            padding: 40px !important;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
            margin-bottom: 50px;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #116087;
            border-radius: 4px;
        }

        .labels_form_review {
            background-color: #f8f8f8;
            border-left: 4px solid #116087;
            padding: 15px;
            margin: 5px 0;
            border-radius: 0 6px 6px 0;
        }

        .review-date {
            color: #777;
            font-size: 14px;
        }

        .move-info {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 6px;
            gap: 15px;
            margin-top: 20px;
        }

        .move_detail {
            flex: 1;
            min-width: 180px;
        }

        .move_label {
            font-size: 13px;
            color: #777;
            margin-bottom: 3px;
        }

        .move_value {
            font-weight: 600;
            color: #212529;
        }

        .review_card {
            padding: 40px !important;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
        }

        .service_cost_input {
            background-color: #fff !important;
            border: 1px solid #116087 !important;
            padding: 13px 10px;
        }

        /* Add Select2 specific styles */
        .select2-container--default .select2-selection--single {
            height: 45px;
            border: 1px solid #116087 !important;
            border-radius: 5px;
            /* background-color: #11608714 !important; */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
            padding-left: 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
        }

        .select2-results__option.select2-results__option--selectable {
            background-color: transparent;
            color: #212529;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-dropdown {
            border: 1px solid #aaa !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #116087;
        }

        @media only screen and (max-width: 1199px) {

            .main-responsive-nav,
            .others-option-for-responsive {
                display: block !important;
            }
        }

        @media (max-width:500px) {
            .other_fields {
                padding: 20px !important;
            }
        }
    </style>

    {{-- @include('layouts.partials.header') --}}
    <section class="bg-image write_review_sec  py-5">
        <div class="container">
            <div class="step_one_review">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="review_company_logo">
                            <div class="company_img_wrapper">
                                @if ($company->image)
                                    @php
                                        $imageUrl = str_starts_with($company->image, 'companies/image/')
                                            ? URL::to('/' . $company->image)
                                            : URL::to('/companies/image/' . $company->image);
                                    @endphp
                                    <img src="{{ $imageUrl }}" alt="{{ $company->image }}" class="img-fluid">
                                @else
                                    <img src="{{ URL::to('/img/samplelogo.webp') }}" alt="{{ $company->image }}"
                                        class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 d-flex mt-lg-0 mt-3">
                        <div class="d-flex justify-content-center flex-column">
                            <h3 class="comapny_name_review">{{ $company->company_name }}</h3>
                            <h3 class="locations">Based in:
                                {{ $company->state->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="about-item-content container">
          <h3>Now reviewing: {{ $company->company_name }}</h3>
      </div>
      <hr> --}}
        <div class="container">
            <div class="row">
                {{-- <div class="comp-info-div d-flex my-3 flex-wrap">
                      <span hidden class="image">{{ $company->image }}</span>
                      @if ($company->image)
                          <img src="{{ URL::to('/companies/image/' . $company->image) }}" alt="{{ $company->image }}"
                              class="img-comp-logo me-3" width="50%">
                      @else
                          <img src="{{ URL::to('/img/samplelogo.webp') }}" alt="{{ $company->image }}"
                              class="img-comp-logo me-3">
                      @endif
                      <div class="d-flex justify-content-center flex-column">
                          <h3 class="p-0 fs-5">{{ $company->company_name }}</h3>
                          <h3 class="p-0 fs-6 text-dark">Located:
                              {{ $company->state->name }},{{ $company->country->name }}</h3>
                      </div>
                  </div> --}}
                <form action="/review/step-two/{{ $company->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('backend.layouts.partials.messages')
                    <div id="forms-heading-div" class="row w-100 pt-3 px-0 m-auto">
                        <h3 class="p-0 fs-4">Service Information</h3>
                    </div>
                    <div class="other_fields">
                        <div class="form-outline mb-2">
                            <div class="row m-auto w-100">
                                <div class="col-lg-9 p-1 pe-sm-2 mt-2">
                                    <div class="input-group my-3 ">
                                        <input type="number" placeholder="Service Cost" name="service_cost"
                                            value="{{ old('service_cost') }}" autocomplete="off"
                                            class="form-control service_cost_input @error('service_cost') is-invalid @enderror">
                                        @error('service_cost')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Service Cost is required</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 p-1 ps-sm-2 mt-3">
                                    <div class="input-group">
                                        <select id="currency" name="currency"
                                            class="form-control form-select my-2 bg-transparent" id="select2"
                                            aria-label="Default select example">
                                            <option selected value="USD">USD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="forms-heading-div" class="row w-100 py-3 px-0 m-auto">
                            <h3 class="p-0 fs-4">What did you move?</h3>
                        </div>
                        <div class="form-outline mb-2">
                            <div class="row m-auto w-100 d-flex justify-content-between align-items-center">
                                <div class="col-lg-12 p-0 d-flex justify-content-center flex-column">
                                    <div class="form-outline my-2">
                                        <div class="row m-auto w-100">
                                            <div class="col-lg-12 px-0">
                                                <div class="input-group">
                                                    <select name="move_type"
                                                        class="form-control form-select bg-transparent mb-2 @error('move_size') is-invalid @enderror"
                                                        id="select2" aria-label="Default select example">
                                                        <option selected value="{{ old('move_type') }}">
                                                            {{ old('move_type') != '' ? old('move_type') : ' Select Move Type ' }}
                                                        </option>
                                                        <option value="Household Items">Household Item</option>
                                                        <option value="Vehicle">Vehicle</option>
                                                        <option value="Household Item and Vehicle">Household Item and
                                                            Vehicle
                                                        </option>
                                                    </select>
                                                    @error('move_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>Move type is required</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-0">
                                    <div class="form-outline my-2">
                                        <div class="row m-auto w-100">
                                            <div class="col-12 px-0">
                                                <div class="input-group">
                                                    <select
                                                        class="form-control form-select bg-transparent @error('move_size') is-invalid @enderror"
                                                        name="move_size" id="move_size" aria-label="Default select example">
                                                        <option selected value="{{ old('move_size') }}">
                                                            {{ old('move_size') != '' ? old('move_size') : ' Select Move Size ' }}
                                                        </option>
                                                        <option value="4 Bedroom Home">4 Bedroom Home</option>
                                                        <option value="3 Bedroom Home">3 Bedroom Home</option>
                                                        <option value="2 Bedroom Home">2 Bedroom Home</option>
                                                        <option value="1 Bedroom Home">1 Bedroom Home</option>
                                                        <option value="Studio">Studio</option>
                                                        <option value="Office Move">Office Move</option>
                                                        <option value="Commercial Move">Commercial Move</option>
                                                    </select>
                                                    @error('move_size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>Move size is required</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-0 col-lg-12">
                                    <div class="row m-auto w-100">
                                        <div class="col-12 px-0 ">
                                            <div class="input-group mb-3">
                                                <textarea rows="3" name="quote" value="{{ old('quote') }}" placeholder="Quote or order ID (optional)"
                                                    class="form-control mt-3">{{ old('quote') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="forms-heading-div" class="row w-100 py-3 px-0 m-auto">
                            <h3 class="p-0 fs-4">Moving Route</h3>
                        </div>

                        <div class="form-outline mb-2">
                            <div class="row m-auto w-100">
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2 ">
                                    <div class="input-group">
                                        <select id="pick_up_country_id" name="pick_up_country_id"
                                            class="pickcountry form-select bg-transparent form-control rounded-0 my-2 @error('pick_up_country_id') is-invalid @enderror"
                                            aria-label="Default select example">
                                            <option selected value="{{ old('pick_up_country_id') }}">
                                                {{ old('pick_up_country_id') != '' ? old('pick_up_country_id') : 'Pickup Country' }}
                                            </option>
                                            @foreach ($pick_country as $pickcountry)
                                                <option value="{{ $pickcountry->id }}">
                                                    {{ $pickcountry->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pick_up_country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Pickup Country is required</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0  mt-2">
                                    <div class="input-group">
                                        <select id="pick_up_state_id" name="pick_up_state_id"
                                            class="pickstate  form-control bg-transparent form-select rounded-0 my-2 ">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0  mt-2">
                                    <div class="input-group">
                                        <select id="pick_up_city_id" name="pick_up_city_id"
                                            class=" pickcity form-select bg-transparent form-control rounded-0 my-2"
                                            aria-label="Default select example">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mb-2">
                            <div class="row m-auto w-100">
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2 ">
                                    <div class="input-group">
                                        <select id="delivery_country_id" name="delivery_country_id"
                                            class="deliverycountry form-select bg-transparent form-control rounded-0 my-2 @error('delivery_country_id') is-invalid @enderror"
                                            aria-label="Default select example">
                                            <option selected value="{{ old('delivery_country_id') }}">
                                                {{ old('delivery_country_id') != '' ? old('delivery_country_id') : 'Delivery Country' }}
                                            </option>
                                            @foreach ($delivery_country as $deliverycountry)
                                                <option value="{{ $deliverycountry->id }}">
                                                    {{ $deliverycountry->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('delivery_country_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Delivery Country is required</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2">
                                    <div class="input-group">
                                        <select name="delivery_state_id"
                                            class="deliverystate form-select bg-transparent form-control rounded-0 my-2"
                                            id="delivery_state_id" aria-label="Default select example">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2">
                                    <div class="input-group">
                                        <select name="delivery_city_id"
                                            class=" deliverycity form-select bg-transparent form-control rounded-0 my-2"
                                            id="delivery_city_id" aria-label="Default select example">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="forms-heading-div" class="row w-100 py-3 px-0 m-auto">
                            <h3 class="p-0 fs-4">Add Images</h3>
                        </div>
                        <div class="form-outline mb-2">
                            <label for="file-upload1" class="custom-file-upload1">
                                <i class="fa fa-camera fa-2xl" style="content-size:20px"></i> Add Image
                            </label>
                            <input id="file-upload1" name="image1" type="file" style="display:none;">

                            <label for="file-upload2" class="custom-file-upload2">
                                <i class="fa fa-camera fa-2xl"></i> Add Image
                            </label>
                            <input id="file-upload2" name="image2" type="file" style="display:none;">

                            <label for="file-upload3" class="custom-file-upload3">
                                <i class="fa fa-camera fa-2xl"></i> Add Image
                            </label>
                            <input id="file-upload3" name="image3" type="file" style="display:none;">

                            {{-- <label for="file-upload4" class="custom-file-upload4">
                                <i class="fa fa-camera fa-2xl"></i> Add Image
                            </label>
                            <input id="file-upload4" name="image4" type="file" style="display:none;">

                            <label for="file-upload5" class="custom-file-upload5">
                                <i class="fa fa-camera fa-2xl"></i> Add Image
                            </label>
                            <input id="file-upload5" name="image5" type="file" style="display:none;"> --}}
                        </div>
                        <div class="d-flex justify-content-start banner-btn mt-4">
                            <button type="button" onclick="history.back()" class="btn btn-primary">BACK
                            </button>
                            <button type="submit" class="mx-2 btn btn-primary">NEXT</button>
                        </div>
                    </div>
                </form>
                <h3 class="p-0 fs-3">Recent Reviews</h3>
                {{-- <hr> --}}
                @foreach ($table as $data)
                    <div class="px-0 my-3">
                        <div class="review_card">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <h3 class="p-0 fs-4">{{ $data->name }}</h3>
                                <div style="font-size:1.2rem; color:#ff9800">
                                    @if ($data->overall_rating <= 0)
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 1)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 2)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 3)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 4)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating >= 5)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                    @endif
                                </div>

                            </div>
                            <p class="fs-14 review-date">
                                {{ \Carbon\Carbon::parse($data->created_at)->format('M d,Y') }}</p>
                            <h3 class="p-0 fs-5 mb-1 text-black">{{ $data->review_subject }}</h3>
                            <p class="fs-14 mb-0 text-black">{{ $data->your_review }}</p>
                            <div class="move-info d-flex flex-wrap justify-content-between align-items-center">
                                <div class="move_detail">
                                    <p class="move_label">Move from :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->pickCity->name }},{{ $data->pickCity->state->abv }} </p>
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">To :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->deliveryCity->name }},{{ $data->deliveryCity->state->abv }}
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">Move Size : </p>
                                    <p class="move_value mb-0">
                                        {{ $data->move_size }}
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">Service Cost :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->service_cost }}
                                        {{ $data->currency }}
                                </div>
                                {{-- <p class="fs-14 text-black mb-0">Move from :
                                        <strong>{{ $data->pickCity->name }},{{ $data->pickCity->state->abv }} </strong> To
                                        :
                                        <strong>{{ $data->deliveryCity->name }},{{ $data->deliveryCity->state->abv }}
                                    </p> --}}

                                {{-- <p class="fs-6 my-0 text-black"><strong>Move Size : </strong>{{ $data->move_size }}
                                    </p> --}}
                                {{-- <p class="fs-6 my-0 text-black"> <strong>Service Cost :
                                        </strong>{{ $data->service_cost }}
                                        {{ $data->currency }}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#pick_up_country_id').on('change', function () {
                var idCountry = this.value;
                $("#pick_up_state_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#pick_up_state_id').html('<option value="">Select Pick-Up State</option>');
                        $.each(result.states, function (key, value) {
                            $("#pick_up_state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

  
        });
    </script>
    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#pick_up_state_id').on('change', function () {
                var idState = this.value;
                $("#pick_up_city_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#pick_up_city_id').html('<option value="">Select Pick-Up City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#pick_up_city_id").append('<option value="' + value
                                .id + '">' + value.name + " , " + value.zip_code + '</option>');
                        });
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            City Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

  
        });
    </script>

    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#delivery_country_id').on('change', function () {
                var idCountry = this.value;
                $("#delivery_state_id").html('');
                $.ajax({	
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#delivery_state_id').html('<option value="">Select Delivery State</option>');
                        $.each(result.states, function (key, value) {
                            $("#delivery_state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

  
        });
    </script>
    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#delivery_state_id').on('change', function () {
                var idState = this.value;
                $("#delivery_city_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#delivery_city_id').html('<option value="">Select Delivery City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#delivery_city_id").append('<option value="' + value
                                .id + '">' + value.name + " , " + value.zip_code +'</option>');
                        });
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            City Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/

  
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize all Select2 dropdowns with search functionality
            $('.pickcountry, .pickstate, .pickcity, .deliverycountry, .deliverystate, .deliverycity').select2({
                theme: 'default',
                width: '100%',
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                allowClear: true,
                minimumResultsForSearch: -1 // This ensures search is always shown
            });

            // Initialize move type and move size dropdowns with search
            $('#move_type, #move_size').select2({
                theme: 'default',
                width: '100%',
                placeholder: 'Select an option',
                allowClear: true,
                minimumResultsForSearch: -1 // This ensures search is always shown
            });

            // Remove Select2 from currency dropdown
            $('#currency').removeClass('select2-hidden-accessible');
            $('#currency').next('.select2-container').remove();

            // Handle file upload labels
            $('#file-upload1, #file-upload2, #file-upload3').change(function() {
                var file = this.files[0];
                if (file) {
                    $(this).prev('label').text(file.name);
                } else {
                    $(this).prev('label').html('<i class="fa fa-camera fa-2xl"></i> Add Image');
                }
            });

            // Add custom styles for Select2
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .select2-container--default .select2-search--dropdown {
                        display: block !important;
                        padding: 8px;
                        background: #fff;
                    }
                    .select2-container--default .select2-search--dropdown .select2-search__field {
                        padding: 8px;
                        width: 100%;
                        border: 1px solid #116087;
                        border-radius: 4px;
                        background-color: #11608714;
                    }
                    .select2-dropdown {
                        border: 1px solid #116087 !important;
                        border-radius: 4px !important;
                    }
                    .select2-container--default .select2-results__option--highlighted[aria-selected] {
                        background-color: #116087;
                    }
                    .select2-container--default .select2-results__option {
                        padding: 8px;
                    }
                    .select2-search {
                        display: block !important;
                    }
                    .select2-container {
                        z-index: 9999;
                    }
                `)
                .appendTo('head');

            // Force search to be visible
            $(document).on('select2:open', function() {
                setTimeout(function() {
                    $('.select2-search__field').focus();
                }, 0);
            });
        });
    </script>
@endsection
