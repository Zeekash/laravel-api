@extends('layouts.app')
@section('title')
    Review | {{ $company->company_name }}
@endsection
@section('meta_description')
    Submit your full review for {{ $company->company_name }} in one step.
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <style>
        .write_review_sec {
            max-width: 1000px;
            margin: 0 auto;
        }

        .company_img_wrapper {
            max-width: 210px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .is-invalid {
            border-color: #dc3545 !important;
            box-shadow: none !important;
        }

        .step_one_review {
            padding: 40px 20px;
            background-color: #11608712;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        h3.comapny_name_review {
            font-size: 32px;
            margin-bottom: 8px;
            font-weight: 800;
            font-family: var(--para-family);
        }

        .locations {
            color: #000000d1;
            font-size: 16px;
            background-color: #f0f3f6;
            padding: 10px 30px;
            border-radius: 450px;
            width: max-content;
            font-weight: 600;
        }

        .form-control.js,
        .input-group.js {
            padding: 1rem 1.25rem;
            border: 1px solid #116087;
            border-radius: 10px;
            background-color: #fff;
        }

        .form-control {

            background: white !important;
        }

        .review_company_logo {
            background-color: white;
            padding: 15px;
            border-radius: 20px;
            text-align: center;
        }

        .other_fields {
            padding: 30px;

            border-radius: 20px;

            margin-bottom: 40px;
        }

        .labels_form_review {
            background-color: #f8f8f8;
            border-left: 4px solid #116087;
            padding: 15px;
            margin: 5px 0 20px;
            border-radius: 0 6px 6px 0;
        }

        .review_card {
            padding: 30px !important;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
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

        .service_cost_input {
            background-color: #fff !important;
            border: 1px solid #116087 !important;
            padding: 13px 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px;
            padding: 8px;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            cursor: pointer;
            float: right;
            font-weight: bold;
            height: 42px !important;
            margin-right: 20px;
            padding-right: 0px;
        }

        .banner-btn button,
        .banner-btn .rating-btn-next {
            text-align: center;
            transition: 0.3s;
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

        .custom-file-upload {
            border: 1px solid #116087;
            display: inline-block;
            padding: 14px 18px;
            cursor: pointer;
            margin-right: 10px;
            border-radius: 10px;
            background: #ffffff;
        }

        .form-section-title {
            font-family: var(--para-family);
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .rating input {
            margin-right: 6px;
        }

        @media (max-width: 400px) {
            .step_one_review {
                padding: 20px;
            }

            .other_fields {
                padding: 20px !important;
            }

            .review_card {
                padding: 20px !important;
            }
        }

        .is-invalid {
            border-color: #dc3545 !important;
            box-shadow: none !important;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
        }

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
            background-color: #ffffff !important;
            */
        }

        select#select2 {
            border: 1px solid #116087 !important;
            padding: 10px;
            /* background-color: #11608712 !important; */
        }

        select#move_size {
            border: 1px solid #116087 !important;
            padding: 10px;
            background-color: #ffffff !important;
        }

        select#move_type {
            border: 1px solid #116087 !important;
            padding: 10px;
            background-color: #ffffff !important;
            */
        }

        /* textarea.form-control {
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
            background-color: #fff !important;
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
            height: 45px !important;
            border: 1px solid #116087 !important;
            border-radius: 5px;
            /* background-color: #11608714 !important; */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
            padding-left: 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px !important;
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

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #010101 !important;
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

    @php
        $stepWithErrors = 1;
        $step2Fields = [
            'service_cost',
            'currency',
            'move_type',
            'move_size',
            'quote',
            'pick_up_country_id',
            'pick_up_state_id',
            'pick_up_city_id',
            'delivery_country_id',
            'delivery_state_id',
            'delivery_city_id',
            'image1',
            'image2',
            'image3',
        ];
        $step3Fields = ['name', 'email'];
        if ($errors->any()) {
            foreach ($errors->keys() as $key) {
                if (in_array($key, $step2Fields, true)) {
                    $stepWithErrors = 2;
                    break;
                }
                if (in_array($key, $step3Fields, true)) {
                    $stepWithErrors = 3;
                }
            }
        }
    @endphp

    <section class="bg-image write_review_sec py-5">
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
                    <div class="col-lg-9 d-flex">
                        <div class="d-flex justify-content-center flex-column">
                            <h1 class="comapny_name_review">{{ $company->company_name }}</h1>
                            <h3 class="locations">Based in:
                                {{ $company->state->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row mx-2 mx-lg-0" style=" background: #f1f6f8; padding: 20px;">
                <div>
                    <form action="{{ route('user.review.store', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @include('backend.layouts.partials.messages') --}}
                        <div class="form-outline mb-0">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0 d-flex flex-column align-items-start">
                                    <h3 class="form-section-title">Give
                                        Your Rating</h3>
                                    <fieldset class="rating @error('overall_rating') is-invalid @enderror">
                                        <input type="radio" id="star5" name="overall_rating" value="5" />
                                        <label class="me-2" for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="overall_rating" value="4" />
                                        <label class="me-2" for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="overall_rating" value="3" />
                                        <label class="me-2" for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="overall_rating" value="2" />
                                        <label class="me-2" for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="overall_rating" value="1" />
                                        <label class="me-2" for="star1">1 star</label>
                                    </fieldset>
                                    @error('overall_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Rating is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mt-3">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0">
                                    <div class="input-group my-3">
                                        <input type="text" placeholder="Enter Subject" name="review_subject"
                                            value="{{ old('review_subject') }}" autocomplete="off"
                                            class="form-control js @error('overall_rating') is-invalid @enderror">
                                        @error('review_subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Review subject is required</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0">
                                    <div class="">
                                        <textarea rows="3" placeholder="Review" onkeyup="CharacterCount1(this);" id="about_your_country"
                                            name="your_review" value="{{ old('your_review') }}"
                                            class="input-group js mb-3 form-control @error('your_review') is-invalid @enderror">{{ old('your_review') }}</textarea>
                                        @error('your_review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="charCountVal1" align="right">0 characters (min:100)</div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="mt-2">
                            <div id="forms-heading-div" class="row w-100 pt-2 px-0 m-auto">
                                <h3 class="form-section-title">Service Information</h3>
                            </div>
                            <div class="form-outline mb-2 ">
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
                                                class="form-control form-select mt-2  bg-transparent">
                                                <option value="USD"
                                                    {{ old('currency', 'USD') == 'USD' ? 'selected' : '' }}>USD
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="forms-heading-div" class="row w-100 py-2 px-0 m-auto">
                                <h3 class="form-section-title">What did you move?</h3>
                            </div>
                            <div class="form-outline mb-2">
                                <div class="row m-auto w-100 d-flex justify-content-between align-items-center">
                                    <div class="col-lg-12 p-0 d-flex justify-content-center flex-column">
                                        <div class="form-outline my-2">
                                            <div class="row m-auto w-100">
                                                <div class="col-lg-12 px-0">
                                                    <div class="input-group">
                                                        <select name="move_type"
                                                            class="form-control form-select mt-2 bg-transparent mb-2 @error('move_type') is-invalid @enderror"
                                                            id="move_type" aria-label="Default select example">
                                                            <option value="">Select Move Type</option>
                                                            <option value="Household Items"
                                                                {{ old('move_type') == 'Household Items' ? 'selected' : '' }}>
                                                                Household Item</option>
                                                            <option value="Vehicle"
                                                                {{ old('move_type') == 'Vehicle' ? 'selected' : '' }}>
                                                                Vehicle
                                                            </option>
                                                            <option value="Household Item and Vehicle"
                                                                {{ old('move_type') == 'Household Item and Vehicle' ? 'selected' : '' }}>
                                                                Household Item and Vehicle
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
                                                            name="move_size" id="move_size"
                                                            aria-label="Default select example">
                                                            <option value="">Select Move Size</option>
                                                            <option value="4 Bedroom Home"
                                                                {{ old('move_size') == '4 Bedroom Home' ? 'selected' : '' }}>
                                                                4
                                                                Bedroom Home</option>
                                                            <option value="3 Bedroom Home"
                                                                {{ old('move_size') == '3 Bedroom Home' ? 'selected' : '' }}>
                                                                3
                                                                Bedroom Home</option>
                                                            <option value="2 Bedroom Home"
                                                                {{ old('move_size') == '2 Bedroom Home' ? 'selected' : '' }}>
                                                                2
                                                                Bedroom Home</option>
                                                            <option value="1 Bedroom Home"
                                                                {{ old('move_size') == '1 Bedroom Home' ? 'selected' : '' }}>
                                                                1
                                                                Bedroom Home</option>
                                                            <option value="Studio"
                                                                {{ old('move_size') == 'Studio' ? 'selected' : '' }}>Studio
                                                            </option>
                                                            <option value="Office Move"
                                                                {{ old('move_size') == 'Office Move' ? 'selected' : '' }}>
                                                                Office
                                                                Move</option>
                                                            <option value="Commercial Move"
                                                                {{ old('move_size') == 'Commercial Move' ? 'selected' : '' }}>
                                                                Commercial Move</option>
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
                                                    <textarea rows="3" name="quote" placeholder="Quote or order ID (optional)" class="form-control mt-3">{{ old('quote') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="forms-heading-div" class="row w-100 py-2 px-0 m-auto">
                                <h3 class="form-section-title">Moving Route</h3>
                            </div>

                            <div class="form-outline mb-2">
                                <div class="row m-auto w-100">
                                    <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2 ">
                                        <div class="input-group">
                                            <select id="pick_up_country_id" name="pick_up_country_id"
                                                class="pickcountry form-select bg-transparent form-control rounded-0 my-2 @error('pick_up_country_id') is-invalid @enderror"
                                                aria-label="Default select example">
                                                <option value="">Pickup Country</option>
                                                @foreach ($pick_country as $pickcountry)
                                                    <option value="{{ $pickcountry->id }}"
                                                        {{ old('pick_up_country_id') == $pickcountry->id ? 'selected' : '' }}>
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
                                                @if (!empty($oldSelections['pickState']))
                                                    <option value="{{ $oldSelections['pickState']->id }}" selected>
                                                        {{ $oldSelections['pickState']->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 ps-0  mt-2">
                                        <div class="input-group">
                                            <select id="pick_up_city_id" name="pick_up_city_id"
                                                class=" pickcity form-select bg-transparent form-control rounded-0 my-2"
                                                aria-label="Default select example">
                                                @if (!empty($oldSelections['pickCity']))
                                                    <option value="{{ $oldSelections['pickCity']->id }}" selected>
                                                        {{ $oldSelections['pickCity']->name }} ,
                                                        {{ $oldSelections['pickCity']->zip_code }}
                                                    </option>
                                                @endif
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
                                                <option value="">Delivery Country</option>
                                                @foreach ($delivery_country as $deliverycountry)
                                                    <option value="{{ $deliverycountry->id }}"
                                                        {{ old('delivery_country_id') == $deliverycountry->id ? 'selected' : '' }}>
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
                                                @if (!empty($oldSelections['deliveryState']))
                                                    <option value="{{ $oldSelections['deliveryState']->id }}" selected>
                                                        {{ $oldSelections['deliveryState']->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 ps-0 mt-2">
                                        <div class="input-group">
                                            <select name="delivery_city_id"
                                                class=" deliverycity form-select bg-transparent form-control rounded-0 my-2"
                                                id="delivery_city_id" aria-label="Default select example">
                                                @if (!empty($oldSelections['deliveryCity']))
                                                    <option value="{{ $oldSelections['deliveryCity']->id }}" selected>
                                                        {{ $oldSelections['deliveryCity']->name }} ,
                                                        {{ $oldSelections['deliveryCity']->zip_code }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="forms-heading-div" class="row w-100 py-2 px-0 m-auto">
                                <h3 class="form-section-title">Add Images</h3>
                            </div>
                            <div class="form-outline mb-2 d-flex flex-column flex-lg-row">
                                @foreach (['image1', 'image2', 'image3'] as $idx => $imageField)
                                    <label for="{{ $imageField }}" class="custom-file-upload mb-2 col-lg-4">
                                        <i class="fa fa-camera fa-lg me-2"></i> Add Image
                                    </label>
                                    <input id="{{ $imageField }}" name="{{ $imageField }}" type="file"
                                        style="display:none;">
                                @endforeach
                                @if ($errors->has('image1') || $errors->has('image2') || $errors->has('image3'))
                                    <div class="invalid-feedback d-block">Images must be valid image files.</div>
                                @endif
                            </div>

                        </div>

                        <div class="mt-2">
                            <div id="forms-heading-div" class="row w-100 py-2 px-0 m-auto">
                                <h3 class="form-section-title">Your Information</h3>
                            </div>
                            <div class="input-group my-3">
                                <input type="text"
                                    class="form-control bg-transparent @error('name') is-invalid @enderror" name="name"
                                    aria-label="Sizing example input" placeholder="Name" value="{{ old('name') }}"
                                    aria-describedby="inputGroup-sizing-default">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Name is required</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group my-3">
                                <input type="email"
                                    class="form-control bg-transparent @error('email') is-invalid @enderror"
                                    name="email" aria-label="Sizing example input" placeholder="Email"
                                    value="{{ old('email') }}" aria-describedby="inputGroup-sizing-default">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email is required</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end banner-btn mt-3">
                                <button type="submit" class="sdg rating-btn-next">Submit Review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
          <div class="mt-5">
            <h3 class="p-0 fs-3">Recent Reviews</h3>
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
                        </div>
                    </div>
                </div>
            @endforeach
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
