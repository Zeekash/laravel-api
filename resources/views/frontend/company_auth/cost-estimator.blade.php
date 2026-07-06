@extends('layouts.app')
@section('title', 'Free Moving Cost Calculator 2026 - Estimate Your Cost')
@section('meta_title', 'Free Moving Cost Calculator 2026 - Estimate Your Cost')

@section('meta_description', 'Use our free moving cost calculator to estimate your moving expenses quickly. Plan your
budget, compare costs, and avoid surprises before your move starts.')
@section('head')
<meta name="robots" content="index, follow">
@endsection

@section('og:title')
Free Moving Cost Calculator 2026 - Estimate Your Cost
@endsection
@section('meta_keywords', 'Moving Cost Calculator')
@section('og:description')
Use our free moving cost calculator to estimate your moving expenses quickly. Plan your budget, compare costs, and avoid
surprises before your move starts.
  
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/quotation.css') }}">
<style>
    #costEstimateForm .form-header {
        gap: 5px;
        /* text-align: center; */
        font-size: 0.9em;
    }

    .mmj-cal {
        border: 0px solid #e3e8ef;
        border-radius: 16px;
        padding: 0px !important;
        box-shadow: none !important;
        background: transparent !important;
        width: 100%;
    }
.quotation_main h3{
        margin-top: 0px;
}



    .mmj-cal__grid {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr));
        gap: 5px !important;
        column-gap: 15px !important;
    }

    .mmj-cal__cell {
        border: 0.5px solid #11608775 !important;
    }

    .mmj-date-summary__box {
        border: 0px dashed #12326940 !important;
        background: #fff;
        border-radius: 12px;
        padding: 8px 14px;
        font-family: var(--family);
        color: #123269;
        font-size: 14px;
    }

    #costEstimateForm .form-header .stepIndicator {
        position: relative;
        flex: 1;
        padding-bottom: 30px;
    }

    .mmj-movesize-card {
        padding: 10px !important;
        border: none !important;
    }

    #costEstimateForm .form-header .stepIndicator.active {

        font-weight: 600;

        color: #116087;

    }

    .inputs {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 12px;
        border: 1px solid #e0e5ea;
    }



    #costEstimateForm .form-header .stepIndicator.finish {

        font-weight: 600;

        color: #116087;

    }



    #costEstimateForm .form-header .stepIndicator::before {

        content: "";

        position: absolute;

        left: 10%;

        bottom: 0;

        transform: translateX(-50%);

        z-index: 9;

        width: 20px;

        height: 20px;

        background-color: #85a9e7;

        border-radius: 50%;

        border: 3px solid white;

    }



    #costEstimateForm .form-header .stepIndicator:nth-child(2)::before {

        content: "";

        position: absolute;

        left: 48%;

        bottom: 0;

        transform: translateX(-50%);

        z-index: 9;

        width: 20px;

        height: 20px;

        background-color: #85a9e7;

        border-radius: 50%;

        border: 3px solid white;

    }



    #costEstimateForm .form-header .stepIndicator:last-child::before {

        content: "";

        position: absolute;

        left: 78%;

        bottom: 0;

        transform: translateX(-50%);

        z-index: 9;

        width: 20px;

        height: 20px;

        background-color: #85a9e7;

        border-radius: 50%;

        border: 3px solid white;

    }



    #costEstimateForm .form-header .stepIndicator.active::before {

        background-color: #116087;

        /* border: 3px solid #d5f9f6; */

    }



    #costEstimateForm .form-header .stepIndicator.finish::before {

        background-color: #116087;

        /* border: 3px solid #b7e1dd; */

    }



    #costEstimateForm .form-header .stepIndicator::after {

        content: "";

        position: absolute;

        left: 10%;

        bottom: 8px;

        width: 136%;

        height: 3px;

        background-color: #f3f3f3;

    }



    #costEstimateForm .form-header .stepIndicator:nth-child(2):after {

        left: 48%;

    }



    #costEstimateForm .form-header .stepIndicator:last-child:after {

        left: 78%;

    }



    #costEstimateForm .form-header .stepIndicator.active::after {

        background-color: #f3f3f3;

    }



    #costEstimateForm .form-header .stepIndicator.finish::after {

        background-color: #257181;

    }



    #costEstimateForm .form-header .stepIndicator:last-child:after {

        display: none;

    }



    #costEstimateForm .label {

        font-size: 1em;

        font-weight: 600;

        color: #1e1a1a;

        margin: 5px 10px !important;

        display: block;

    }


    #costEstimateForm input {
        padding: 16px 20px !important;
        width: 100%;
        font-size: 16px;
        border: 2px solid #e0e5ea;
        border-radius: 12px !important;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    #costEstimateForm input:hover {
        border-color: #c5d0dd;
    }



    #costEstimateForm select {

        padding: 8px 15px !important;

        width: 100%;

        font-size: 1em;

        border: 2px solid #11608726 !important;

        border-radius: 10px;

        background-color: #ffffff !important;

        font-family: var(--para-family);

    }



    #costEstimateForm input.invalid {

        border: 1px solid #ffaba5;

    }



    #costEstimateForm .step {

        display: none;

    }





    #costEstimateForm .form-footer {

        overflow: auto;

        gap: 20px;

        margin-top: 20px;

    }



    #costEstimateForm .form-footer button {
        background-color: var(--bg);
        color: #ffffff;
        padding: 14px 40px !important;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        flex: 1;
        border-radius: 12px;
        margin-top: 5px;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(17, 96, 135, 0.2);
    }



    #costEstimateForm .form-footer button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(17, 96, 135, 0.3);
    }



    #costEstimateForm .form-footer #customprevBtnCe {
        background-color: #f8f9fa;
        color: #116087;
        border: 2px solid #e0e5ea;
        box-shadow: none;
    }

    #costEstimateForm .form-footer #customprevBtnCe:hover {
        background-color: #e9ecef;
        border-color: #116087;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(17, 96, 135, 0.15);
    }



    .h2-div-login-form h2 {

        color: #1e1a1a;

        font-size: 32px;

        font-weight: 900;

        font-family: var(--para-family);

    }



    .estimator_main {

        max-width: 1200px;

        margin: 60px auto 0;

        padding: 0 20px;


    }


    .section-quote {

        height: auto !important;

    }



    /* .estimator_main form {

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            background-color: #f0f3f6;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border-radius: 30px;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            padding: 30px 40px;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 2px solid #31374240;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } */







    .services-label {

        margin-bottom: 8px;

        font-weight: 500;

    }



    .btn-group {

        width: 100%;

    }



    .btn-group label {

        width: 33.33%;

        padding: 10px 0;

        text-align: center;

        background-color: #f8f9fa;

        border: 1px solid #dee2e6;

        color: #212529;

        cursor: pointer;

        margin: 0;

        transition: all 0.2s;

    }



    .btn-group input[type="radio"] {

        display: none;

    }



    .btn-group input[type="radio"]:checked+label {

        background-color: #116087;

        color: white;

        border-color: #116087;

    }



    .btn-group label:first-of-type {

        border-radius: 4px 0 0 4px;

    }



    .btn-group label:last-of-type {

        border-radius: 0 4px 4px 0;

    }



    .btn-group {

        width: 50%;

        display: flex;

    }



    .form-check {

        display: flex;
        border: 0px solid #116087;
        padding: 5px 10px;
        padding-left: 35px;
        width: 50%;
        border-radius: 10px;
        margin-bottom: 0 !important;

    }



    .form-check-input:checked {

        background-color: #116087 !important;

    }



    .form-check-input:checked[type=checkbox] {

        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e);



    }



    .form-check-input:focus {

        border-color: #31374240 !important;

        box-shadow: none !important;

    }



    .packing-services .form-check-input {

        padding: 10px !important;

        width: 100% !important;

        font-size: 1em !important;

        border: 2px solid #e3e3e3 !important;

        /* border-radius: 10px; */

        font-family: var(--para-family) !important;

        /* background: #dbe9f4 !important; */

    }



    .form-check-label {

        font-size: 16px;

        font-weight: 500;

        margin-left: 10px;

    }

    .quotation_main p a {
        color: #004b87;
    }

    .quotation_main li a {
        color: #004b87;
    }

    .quotation_main td a {
        color: #004b87;
    }

    .quotation_main td a:hover {
        text-decoration: underline;
        text-decoration-thickness: 2px !important;
        text-decoration-color: #004b87;
    }

    .quotation_main p a:hover {
        text-decoration: underline;
        text-decoration-color: #004b87;
    }

    .quotation_main li a:hover {
        text-decoration: underline !important;
        text-decoration-color: #004b87;
    }

    .estimator-wrapper {

        border-radius: 24px;

        overflow: hidden;

        /* min-height: 600px; */
        background-color: #C9ECF8;
        border: 2px solid #0000001A;


    }


    .form-section {
        padding: 30px 40px;
        display: flex;
        flex-direction: column;
        border-radius: 24px 0 0 24px;
    }

    /* Progress bar like design images */
    .mmj-progress {
        position: relative;
        width: 100%;
        height: 8px;
        background: #dfeff6;
        border-radius: 8px;
        margin: 6px 0 16px;
    }

    .mmj-progress__bar {
        height: 100%;
        width: 0%;
        background: #1f6a8c;
        border-radius: 8px;
        transition: width .3s ease;
    }

    .mmj-progress__pct {
        font-weight: 700;
        color: #116087;
        font-family: var(--para-family);
    }

    /* Step 2 option list styles */
  

    .mmj-movesize-card {
        display: block;
        width: 100%;
        text-align: center;
        background: #fff;
        border: 2px solid #e0e5ea !important;
        border-radius: 12px;
        padding: 16px 20px !important;
        font-weight: 600;
        font-size: 16px;
        color: #1a1a1a;
        transition: all .3s ease;
        cursor: pointer;
    }

    .mmj-movesize-card.active,
    .mmj-movesize-card:hover {
        background: linear-gradient(135deg, #116087 0%, #1a7fa0 100%);
        color: #fff;
        border-color: #116087 !important;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(17, 96, 135, 0.25);
    }



    .header-section h2 {

        color: #116087;

        font-size: 32px;

        font-weight: 800;

        margin-bottom: 10px;

    }

    .mmj-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #0b3d56;
        font-weight: 700;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .mmj-back:hover {
        opacity: .8;
    }

    .mmj-back__icon {
        font-size: 18px;
        line-height: 1;
    }



    .header-section p {

        color: #6c757d;

        font-size: 1.1rem;

        margin-bottom: 30px;

        text-align: center;

    }

    div#mmj-date-panel {
        position: relative;
    }

    #mmj-date-inline-ce {
        width: 100%;
        display: block;
        background-color: #fff;
        padding: 12px;
        border-radius: 10px;
        position: absolute;
        z-index: 11;
    }


    /* Align estimator inline calendar with modal styles */

    #mmj-date-inline-ce {

        width: 100%;

        display: block;

    }



    .form-label {

        font-weight: 600;

        color: #2c3e50;

        margin-top: 2px;

        font-size: 1rem;

        font-family: var(--para-family) !important;



    }

    .mmj-cal__cell {
        min-height: 30px !important;
    }

    .step {

        min-height: 315px !important;

    }
    .map-section-below #map-ce {
    width: 100%;
    height: auto !important;}
</style>

<div class="form_section">
    <div class="estimator_main">
        <!-- Reference Design Banner Section -->
        <div class="reference-banner-wrapper">
            <div class="container-fluid map-section-below">

                

                <div class="row align-items-center">

                    <!-- Left Side: Hero Content -->
                    <div class="col-lg-6 hero-left-section">
                        <!-- Map Section Below Banner -->
                        <div class="">
                            <div id="map-ce"></div>

                        </div>
                    </div>

                    <!-- Right Side: Calculator Form Card -->
                    <div class="col-lg-6 form-right-section">
                        <div class="form-card-container">
                            <div class="col-lg-11 mx-auto">
                                @include('backend.layouts.partials.messages')
                            </div>

                            <div class="calculator-form-card">
                                
                                <form class="main_banner_form" style="display: block;">
                                    <h1 class="text-center">Moving Cost Calculator</h1>
                                    <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center" style="display: block !important;">
                                        <h2 class="mb-2 form_heading" style="font-size: 24px !important; font-weight: 400 !important; color: #222; margin-bottom: 20px !important;">
                                            Where You want to Move?
                                        </h2>
                                    </div>
                                    <div class="form_bg" style="background: transparent; padding: 0; border: none;">
                                        <div class="row" style="display: block;">
                                            <div class="col-xl-4 mt-lg-0 mt-2" style="width: 100%; ">
                                                <div class="input_outer" style="margin-bottom: 16px;">
                                                    <label for="external_zipfrom" style="font-weight: 600; color: #333; display: block; margin-bottom: 8px; font-size: 14px;">Moving From*</label>
                                                    <input type="text" id="external_zipfrom" name="moving-from"
                                                        class="zipfromsearch pac-target-input mmj-zip-from"
                                                        placeholder="City or Zip Code" autocomplete="off"
                                                        style="width: 100%; padding: 14px 16px; border-radius: 10px; border: 1.5px solid #ddd; font-size: 15px; box-sizing: border-box;">
                                                    <span id="external_zipfrom_error" class="error-message hidden"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 mt-lg-0 mt-2" style="width: 100%; ">
                                                <div class="input_outer" style="margin-bottom: 16px;">
                                                    <label for="external_ziptosearch" style="font-weight: 600; color: #333; display: block; margin-bottom: 8px; font-size: 14px;">Moving To*</label>
                                                    <input type="text" id="external_ziptosearch" name="moving-to"
                                                        class="ziptosearch pac-target-input mmj-zip-to"
                                                        placeholder="City or Zip Code" autocomplete="off"
                                                        style="width: 100%; padding: 14px 16px; border-radius: 10px; border: 1.5px solid #ddd; font-size: 15px; box-sizing: border-box;">
                                                    <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                                </div>
                                            </div>
                                            <p style="font-weight: 700; margin: 12px 0 20px 0; color: #222; font-size: 15px;">Distance: <span id="roadDistance-ce" class="miles_upp">0</span></p>
                                            <div class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3" style="width: 100%;  display: block !important;">
                                                <a href="#ModalForm" class="quote-btn" data-bs-toggle="modal"
                                                    style="background: #116087; color: #fff; border: none; border-radius: 10px; font-weight: 600; font-size: 16px; display: block; text-align: center; text-decoration: none; padding: 14px; width: 100%;">
                                                    Get Your Free estimate
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="mmj-distance-hidden" name="distance_miles" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- <button type="button" id="btn-canvas-Form" data-bs-toggle="modal" href="#ModalForm"
                class="btn default-btn d-none py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center">Get
                Quote</button> --}}
    </div>
</div>
<section class="container_main">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 justif-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                            class="fas fa-home me-1 home_icon"></i>
                                        Home</a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    Moving Cost Calculator
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="quotation_main mb-4">
                    <div class="author-box mb-3">
                        <div class="author-info">
                            <img src="https://mymovingjourney.com/assets/img/author_img.png" loading="lazy"
                                alt="Author">
                            <span class="author-label">Author <br>
                                <span class="author_name"><a href="https://www.linkedin.com/in/honey-jay/"
                                        target="_blank">Honey Jay
                                        <i class="fa-brands fa-linkedin"
                                            style="color: var(--bg);"></i></a></span></span>
                        </div>
                        <div class="update-info">
                            <span style="color:#116087;"><i class="fa-regular fa-clock"></i>
                                Updated :</span> {{ date('M') }} {{ date('Y') }}
                        </div>
                    </div>
                    <p class="mt-3">Use our <b>free moving cost calculator</b> to quickly find out what
                        your
                        move might cost. You’ll get an instant <b>moving estimate</b> by just entering your
                        basic
                        moving details. Plus, discover simple ways to save money on your upcoming move.</p>
                    <p>We value your trust and protect your information, read more in our <a
                            href="https://mymovingjourney.com/privacy-policy"><strong>privacy policy</strong></a>.</p>
                    <h2 class="mt-5">How Much Do Movers Cost?</h2>
                    <p>
                        The cost of <a
                            href="https://mymovingjourney.com/blogs/what-is-the-average-cost-of-hiring-a-moving-company"><b>hiring
                                movers</b></a> can range anywhere from <b>$320 to over $12,500,</b> depending on
                        your
                        situation. That may sound like a big gap, but your price really depends on the type of move
                        you’re planning and the services you choose.</p>
                    <p>Here’s a quick look at common options:</p>
                    <ul class="criteria-list">
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span> <b>Professional moving companies:</b> For local moves, the price usually falls
                                between
                                <b>$435 and $2,550. A long distance move cost </b> can be much higher, anywhere from
                                <b>$1,000 to $11,600+.</b>
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span> <b>Moving containers:</b> A flexible option where you pack, and the company drives.
                                Expect about <b> $422 to $766</b> for local moves, and <b>$856 to $3,950 </b> for
                                long-distance moves.</span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span><b>Rental trucks:</b> The most DIY-friendly choice. Prices start around <b>$29 and can
                                    go up to $489</b> for local moves. Rates vary by company, mileage, and truck
                                size.</span>
                        </li>
                    </ul>
                    <p>Below, you’ll see sample rates for both local and long-distance moves based on home size and
                        distance, so you can <b>calculate relocation costs</b> more accurately for your own situation.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Banner -->
    <section class="container">
        <div class="cost-banner">
            <div class="row">
                <div class="col-lg-6">
                    <h2>How to Calculate Your Moving Costs?</h2>
                    <ul class="ps-4">
                        <li>
                            Use our <b>Moving Cost Calculator</b> at the top of the page.</li>
                        <li>Enter
                            your <b>current
                                location</b> and <b>destination</b>.</li>
                        <li>Select your <b>home size</b> and <b>move-out date</b>.</li>
                        <li>Get an <b>instant moving estimate</b>.</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/steps.png') }}" alt="step-to-use-calculator" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Average Cost Section -->
    <section class="average-cost-section">
        <div class="container">
            <h3>Average Local Moving Cost</h3>
            <p>
                If you're moving a short distance, then you are looking at a local move, which usually comes with a much
                smaller bill than long-distance or international moves.
            </p>
            <p>
                On average, a local move costs around <strong>$1,400</strong>, though most fall within the <strong>$882
                    to $2,566</strong> range.
            </p>
            <p>
                Here’s a breakdown based on typical hourly rates and expected timeframes:
            </p>

            <!-- Table -->
            <div class="table-responsive cost-table">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Home Size</th>
                            <th>Movers</th>
                            <th>Hours</th>
                            <th>Avg. Cost Estimate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Studio / 1 BR</td>
                            <td>2</td>
                            <td>3</td>
                            <td>$480</td>
                        </tr>
                        <tr>
                            <td>1 BR Apartment</td>
                            <td>2</td>
                            <td>4</td>
                            <td>$640</td>
                        </tr>
                        <tr>
                            <td>2 BR Home</td>
                            <td>3</td>
                            <td>6</td>
                            <td>$1,440</td>
                        </tr>
                        <tr>
                            <td>3 BR Home</td>
                            <td>4</td>
                            <td>7</td>
                            <td>$2,240</td>
                        </tr>
                        <tr>
                            <td>4 BR Home</td>
                            <td>4</td>
                            <td>9</td>
                            <td>$2,880</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="mt-3">
                This table is based on an average labor rate of <b>$80 per hour per mover</b>.
            </p>
        </div>
    </section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="quotation_main my-4">
                    <h2>Average Cost of Movers By State</h2>
                    <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff;color: #001f21; width:30%;" scope="col">
                                        State</th>
                                    <th style="background-color: #ebfaff;color: #001f21;" scope="col">Local move*
                                        ~50
                                        miles</th>
                                    <th style="background-color: #ebfaff;color: #001f21;" scope="col">Interstate
                                        move ~500 miles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/alabama"><strong>Alabama</strong></a>
                                    </td>
                                    <td>$1,190</td>
                                    <td>$4,250</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/arizona"><strong>Arizona</strong></a>
                                    </td>
                                    <td>$720</td>
                                    <td>$4,050</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/arkansas"><strong>Arkansas</strong></a>
                                    </td>
                                    <td>$690</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/california"><strong>California</strong></a>
                                    </td>
                                    <td>$1,050</td>
                                    <td>$4,020</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/colorado"><strong>Colorado</strong></a>
                                    </td>
                                    <td>$1,020</td>
                                    <td>$4,190</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/connecticut"><strong>Connecticut</strong></a>
                                    </td>
                                    <td>$1,130</td>
                                    <td>$3,780</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/delaware"><strong>Delaware</strong></a>
                                    </td>
                                    <td>$1,260</td>
                                    <td>$3,950</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/florida"><strong>Florida</strong></a>
                                    </td>
                                    <td>$1,010</td>
                                    <td>$3,620</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/georgia"><strong>Georgia</strong></a>
                                    </td>
                                    <td>$910</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/idaho"><strong>Idaho</strong></a>
                                    </td>
                                    <td>$910</td>
                                    <td>$4,750</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/illinois"><strong>Illinois</strong></a>
                                    </td>
                                    <td>$1,420</td>
                                    <td>$3,920</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/indiana"><strong>Indiana</strong></a>
                                    </td>
                                    <td>$1,160</td>
                                    <td>$4,100</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/iowa"><strong>Iowa</strong></a>
                                    </td>
                                    <td>$1,750</td>
                                    <td>$4,120</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/kansas"><strong>Kansas</strong></a>
                                    </td>
                                    <td>$940</td>
                                    <td>$4,210</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/kentucky"><strong>Kentucky</strong></a>
                                    </td>
                                    <td>$790</td>
                                    <td>$4,160</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/louisiana"><strong>Louisiana</strong></a>
                                    </td>
                                    <td>$1,260</td>
                                    <td>$4,100</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/maine"><strong>Maine</strong></a>
                                    </td>
                                    <td>$1,220</td>
                                    <td>$4,750</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/maryland"><strong>Maryland</strong></a>
                                    </td>
                                    <td>$960</td>
                                    <td>$3,810</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/massachusetts"><strong>Massachusetts</strong></a>
                                    </td>
                                    <td>$1,060</td>
                                    <td>$3,990</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/michigan"><strong>Michigan</strong></a>
                                    </td>
                                    <td>$1,200</td>
                                    <td>$4,100</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/minnesota"><strong>Minnesota</strong></a>
                                    </td>
                                    <td>$910</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/mississippi"><strong>Mississippi</strong></a>
                                    </td>
                                    <td>$960</td>
                                    <td>$4,320</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/missouri"><strong>Missouri</strong></a>
                                    </td>
                                    <td>$1,040</td>
                                    <td>$4,050</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/montana"><strong>Montana</strong></a>
                                    </td>
                                    <td>$1,100</td>
                                    <td>$4,750</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/nebraska"><strong>Nebraska</strong></a>
                                    </td>
                                    <td>$960</td>
                                    <td>$4,120</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/nevada"><strong>Nevada</strong></a>
                                    </td>
                                    <td>$900</td>
                                    <td>$3,950</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/new-hampshire"><strong>New
                                                Hampshire</strong></a></td>
                                    <td>$1,620</td>
                                    <td>$4,560</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/new-jersey"><strong>New
                                                Jersey</strong></a></td>
                                    <td>$1,130</td>
                                    <td>$3,820</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/new-mexico"><strong>New
                                                Mexico</strong></a></td>
                                    <td>$710</td>
                                    <td>$4,400</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/new-york"><strong>New
                                                York</strong></a></td>
                                    <td>$1,120</td>
                                    <td>$3,620</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/north-carolina"><strong>North
                                                Carolina</strong></a></td>
                                    <td>$950</td>
                                    <td>$3,860</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/north-dakota"><strong>North
                                                Dakota</strong></a></td>
                                    <td>$900</td>
                                    <td>$4,850</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/ohio"><strong>Ohio</strong></a>
                                    </td>
                                    <td>$1,000</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/oklahoma"><strong>Oklahoma</strong></a>
                                    </td>
                                    <td>$890</td>
                                    <td>$4,160</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/oregon"><strong>Oregon</strong></a>
                                    </td>
                                    <td>$1,070</td>
                                    <td>$4,560</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/pennsylvania"><strong>Pennsylvania</strong></a>
                                    </td>
                                    <td>$1,090</td>
                                    <td>$3,950</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/rhode-island"><strong>Rhode
                                                Island</strong></a></td>
                                    <td>$920</td>
                                    <td>$3,820</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/south-carolina"><strong>South
                                                Carolina</strong></a></td>
                                    <td>$1,150</td>
                                    <td>$3,860</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/south-dakota"><strong>South
                                                Dakota</strong></a></td>
                                    <td>$1,550</td>
                                    <td>$4,750</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/tennessee"><strong>Tennessee</strong></a>
                                    </td>
                                    <td>$1,040</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/texas"><strong>Texas</strong></a>
                                    </td>
                                    <td>$930</td>
                                    <td>$4,100</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/utah"><strong>Utah</strong></a>
                                    </td>
                                    <td>$1,360</td>
                                    <td>$4,120</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/vermont"><strong>Vermont</strong></a>
                                    </td>
                                    <td>$1,830</td>
                                    <td>$4,560</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/virginia"><strong>Virginia</strong></a>
                                    </td>
                                    <td>$940</td>
                                    <td>$3,860</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/washington"><strong>Washington</strong></a>
                                    </td>
                                    <td>$1,520</td>
                                    <td>$4,560</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/move-cost/west-virginia"><strong>West
                                                Virginia</strong></a></td>
                                    <td>$1,360</td>
                                    <td>$4,180</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/wisconsin"><strong>Wisconsin</strong></a>
                                    </td>
                                    <td>$1,210</td>
                                    <td>$4,160</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/move-cost/wyoming"><strong>Wyoming</strong></a>
                                    </td>
                                    <td>$930</td>
                                    <td>$4,750</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2>Average Long Distance Moving Cost</h2>
                    <p>While local moves are charged by the hour, long-distance moves are priced based on miles,
                        shipment weight, and extras like packing or vehicle transport.</p>
                    <p class="according_to">According to 2026 data:</p>
                    <ul class="bg_list">
                        <li>A long-distance move (typically over 1,000 miles) costs an average of <b>$4,300</b> for a
                            2–3 bedroom home (around 7,400 lbs).</li>
                        <li>The overall <b>average long-distance move</b> falls between <b>$3,500 and $7,780,</b>
                            depending on distance and complexity.</li>
                    </ul>
                    <p>So, here’s a clear breakdown by distance and home size:</p>
                    <div class="mb-4">
                        <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="align-middle">
                                        <th style="background-color: #ebfaff;color: #001f21; width:25%;">Mileage</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">Studio / 1 Bedroom</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">2–3 Bedrooms</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">4+ Bedrooms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>250–500 miles</td>
                                        <td>$1,500 – $3,000</td>
                                        <td>$2,800 – $5,000</td>
                                        <td>$3,500 – $7,000</td>
                                    </tr>
                                    <tr>
                                        <td>500–1,000 miles</td>
                                        <td>$1,800 – $3,500</td>
                                        <td>$3,200 – $6,000</td>
                                        <td>$4,000 – $8,000</td>
                                    </tr>
                                    <tr>
                                        <td>1,000 miles</td>
                                        <td>$2,500 – $4,500</td>
                                        <td>$3,500 – $7,000</td>
                                        <td>$5,000 – $9,000</td>
                                    </tr>
                                    <tr>
                                        <td>1,500 miles</td>
                                        <td>$3,000 – $5,000</td>
                                        <td>$4,000 – $8,000</td>
                                        <td>$5,500 – $10,000</td>
                                    </tr>
                                    <tr>
                                        <td>2,000 miles</td>
                                        <td>$3,500 – $5,500</td>
                                        <td>$4,500 – $8,500</td>
                                        <td>$6,000 – $11,000</td>
                                    </tr>
                                    <tr>
                                        <td>2,500+ miles</td>
                                        <td>$4,000 – $6,000</td>
                                        <td>$5,500 – $9,500</td>
                                        <td>$7,000 – $13,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>These figures show current market pricing for full-service moves, including labor, mileage, and
                        basic packing needs. If you want a personalized <b>moving estimate</b> based on your exact <a
                            href="https://mymovingjourney.com/blogs/how-to-estimate-your-move-size"><b>move
                                size</b></a> and route, you can use our <b>moving cost calculator.</b></p>
                    <h2>Average International Moving Cost</h2>
                    <p>Moving abroad is a whole different aspect, as distance, destination country, services, and
                        shipment method all play a role in your final cost.</p>
                    <p class="according_to">This 2026 data shows just how wide the range can be:</p>
                    <ul class="criteria-list list_fill">
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>From the U.S. to Europe,</b> a typical <a
                                    href="https://mymovingjourney.com/blogs/how-much-does-an-international-move-cost"><strong>international
                                        move costs</strong></a> anywhere between
                                <b>$3,500 and $17,000,</b> depending on home size and whether you're packing a 1–2
                                bedroom
                                place or a larger household.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                For <b>Asia,</b> the average runs around <b>$3,900 to $17,500,</b> while
                                <b>Australia</b>
                                can cost between $4,000 to $18,000, varying by move size, services, and shipping method.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                Looking at global averages, an international move often falls somewhere between
                                <b>$3,000
                                    and $15,000,</b> depending on destination, services, and volume.
                            </span>
                        </li>
                    </ul>
                    <p>Here’s a breakdown by region and home size, updated for clarity:</p>
                    <div class="mb-4">
                        <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="align-middle">
                                        <th style="background-color: #ebfaff;color: #001f21; width:30%;">Region /
                                            Distance
                                        </th>
                                        <th style="background-color: #ebfaff;color: #001f21;">Studio / 1 Bedroom</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">2–3 Bedrooms</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">4+ Bedrooms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Canada (~500–1,000 miles)</td>
                                        <td>$3,000 – $5,000</td>
                                        <td>$5,500 – $8,000</td>
                                        <td>$8,000 – $12,000</td>
                                    </tr>
                                    <tr>
                                        <td>Europe</td>
                                        <td>$3,500 – $7,000</td>
                                        <td>$8,000 – $12,000</td>
                                        <td>$11,000 – $17,000</td>
                                    </tr>
                                    <tr>
                                        <td>Asia</td>
                                        <td>$3,900 – $8,200</td>
                                        <td>$8,500 – $13,000</td>
                                        <td>$12,000 – $17,500</td>
                                    </tr>
                                    <tr>
                                        <td>Australia</td>
                                        <td>$4,000 – $9,000</td>
                                        <td>$8,700 – $12,500</td>
                                        <td>$13,000 – $18,000</td>
                                    </tr>
                                    <tr>
                                        <td>South America</td>
                                        <td>$3,800 – $8,800</td>
                                        <td>$8,500 – $13,600</td>
                                        <td>$11,800 – $16,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>These ranges account for everything from container shipping and customs fees to insurance, but
                        extras like air freight, rush services, or custom packing will add to your total.</p>
                    <h2>Average Cost of Moving Containers</h2>
                    <p>If you're handling your move with more flexibility, moving containers might be the perfect fit.
                        They’re popular because you can pack at your own pace, often at a lower cost than hiring
                        full-service movers.</p>
                    <p>How much you pay depends on how big the container is, how far you're moving, and how long you’ll
                        need it. </p>
                    <p><b>Here’s a breakdown of updated pricing:</b></p>
                    <div class="mb-4">
                        <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="align-middle">
                                        <th style="background-color: #ebfaff;color: #001f21; width:30%;">Container
                                            Option
                                        </th>
                                        <th style="background-color: #ebfaff;color: #001f21;">Typical Cost Range</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">What’s Included / Notes
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Basic Local Rental</td>
                                        <td>$80 – $200 per month</td>
                                        <td>Monthly rental only</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery & Pickup</td>
                                        <td>$70 – $120 per container</td>
                                        <td>Separate or combined fee</td>
                                    </tr>
                                    <tr>
                                        <td>Short-Distance Shipping</td>
                                        <td>$90 – $250 (≤30 miles)</td>
                                        <td>Domestic truck delivery</td>
                                    </tr>
                                    <tr>
                                        <td>Regional Move (375–1,000 mi)</td>
                                        <td>$1,000 – $2,300 approx.</td>
                                        <td>Includes delivery and transport</td>
                                    </tr>
                                    <tr>
                                        <td>Long-Distance Move (~1,000 miles)</td>
                                        <td>$3 per mile ($3,000 total)</td>
                                        <td>Based on the average across providers</td>
                                    </tr>
                                    <tr>
                                        <td>Typical 1-BR Home (container)</td>
                                        <td>~$2,700</td>
                                        <td>Includes container use and transport</td>
                                    </tr>
                                    <tr>
                                        <td>Extra Containers for Bigger Homes (Cross-Country)</td>
                                        <td>$4,128 – $5,709</td>
                                        <td>For 3-bedroom moves via PODS</td>
                                    </tr>
                                    <tr>
                                        <td>Economical Two-Bedroom (500–800 mi)</td>
                                        <td>~$2,547</td>
                                        <td>One of the most budget-friendly options</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h2>Average Cost of DIY Moves</h2>
                    <p>When you're handling a move on your own, it’s all about flexibility, control, and stretching your
                        budget. Whether you're going the truck rental route or using a moving container, costs depend on
                        how much stuff you have, how far you’re going, and how long you need the gear.</p>
                    <p>Here’s a fresh breakdown using current data:</p>
                    <div class="mb-4">
                        <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="align-middle">
                                        <th style="background-color: #ebfaff;color: #001f21; width:30%;">DIY Option
                                        </th>
                                        <th style="background-color: #ebfaff;color: #001f21;">Local Move Estimate</th>
                                        <th style="background-color: #ebfaff;color: #001f21;">Long-Distance Estimate
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Moving Container</td>
                                        <td>$400–$700 for a local container (around 50 miles) </td>
                                        <td>$900–$4,500+ for interstate moves </td>
                                    </tr>
                                    <tr>
                                        <td>Moving Truck Rental</td>
                                        <td>$150 (truck only) for local moves (plus gas, supplies, mileage) </td>
                                        <td>$800–$3,100 + fuel & extras for long-distance </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p><b>How These Costs Shape Up</b></p>
                    <ul>
                        <li><a
                                href="https://mymovingjourney.com/blogs/moving-truck-rental-everything-you-need-to-know"><b>Truck
                                    rental</b></a> is generally the <b>cheapest up front</b> or short, local moves,
                            sometimes
                            under <b>$150</b> if you're good at packing light. But don’t forget gas, supplies, taxes,
                            and mileage can quickly add up.</li>
                        <li><b>Moving containers</b> cost a bit more, but they can offer added convenience, especially
                            if
                            you want to pack at your own pace and avoid driving a big truck.</li>
                        <li>For long-distance (interstate) moves, both options can span <b>hundreds to thousands of
                                dollars,</b> depending on how much you're moving, how far you're going, and whether you
                            factor in mileage or fuel costs.</li>
                    </ul>
                    <h2>Average City-to-City Moving Cost Estimates</h2>
                    <p>Different moves come with different challenges and prices. Based on our data, here’s what users
                        are paying in 2026 for moves using rental trucks, containers, and full-service movers:</p>
                    <h3 class="mt-4"><b>Short-Distance Moves</b></h3>
                    <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff;color: #001f21; width:25%;">Route</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Rental Truck</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Moving Container</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Full-Service Movers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/moving-routes/ny/ma/new-york-city-to-boston"><b>New
                                                York City → Boston</b></a></td>
                                    <td>$420 – $950</td>
                                    <td>$780 – $2,900</td>
                                    <td>$1,100 – $6,400</td>
                                </tr>
                                <tr>
                                    <td>Los Angeles → San Diego</td>
                                    <td>$210 – $420</td>
                                    <td>$650 – $2,600</td>
                                    <td>$800 – $5,600</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/moving-routes/ga/nc/atlanta-to-charlotte"><b>Atlanta
                                                → Charlotte</b></a></td>
                                    <td>$400 – $970</td>
                                    <td>$820 – $3,400</td>
                                    <td>$1,200 – $7,600</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="mt-4"><b>Medium-Distance Moves</b></h3>
                    <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff;color: #001f21; width:25%;">Route</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Rental Truck</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Moving Container</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Full-Service Movers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/moving-routes/tx/co/dallas-to-denver"><b>Dallas
                                                → Denver</b></a></td>
                                    <td>$780 – $2,100</td>
                                    <td>$1,050 – $4,500</td>
                                    <td>$1,600 – $9,800</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/moving-routes/il/nc/chicago-to-charlotte"><b>Chicago
                                                → Charlotte</b></a></td>
                                    <td>$720 – $2,000</td>
                                    <td>$1,000 – $4,200</td>
                                    <td>$1,500 – $9,400</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/moving-routes/ny/tn/new-york-city-to-nashville"><b>New
                                                York City → Nashville</b></a></td>
                                    <td>$820 – $2,200</td>
                                    <td>$1,050 – $4,500</td>
                                    <td>$1,450 – $9,100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4 class="mt-4"><b>Long-Distance Moves</b></h4>
                    <div class="table-responsive w-100 cost-table" style="font-family: var(--para-family);">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr class="align-middle">
                                    <th style="background-color: #ebfaff;color: #001f21; width:25%;">Route</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Rental Truck</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Moving Container</th>
                                    <th style="background-color: #ebfaff;color: #001f21;">Full-Service Movers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/moving-routes/ca/tx/los-angeles-to-dallas"><b>Los
                                                Angeles → Dallas</b></a></td>
                                    <td>$1,200 – $3,200</td>
                                    <td>$1,400 – $5,900</td>
                                    <td>$1,800 – $11,800</td>
                                </tr>
                                <tr>
                                    <td><a
                                            href="https://mymovingjourney.com/moving-routes/pa/tx/philadelphia-to-austin"><b>Philadelphia
                                                → Austin</b></a></td>
                                    <td>$1,350 – $3,700</td>
                                    <td>$1,400 – $6,800</td>
                                    <td>$1,900 – $12,000</td>
                                </tr>
                                <tr>
                                    <td><a href="https://mymovingjourney.com/moving-routes/wa/az/seattle-to-phoenix"><b>Seattle
                                                → Phoenix</b></a></td>
                                    <td>$1,250 – $3,300</td>
                                    <td>$1,400 – $6,000</td>
                                    <td>$1,900 – $12,700</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2>How Movers Calculate Your Moving Cost?</h2>
                    <p>Every move is unique, and movers use a few key details to figure out your total price. Here’s
                        what they usually look at:</p>
                    <ul>
                        <li><b>Distance of the move:</b> Local moves are charged by the hour, while long-distance or
                            cross-country moves are priced by the total miles and the weight of your shipment. The
                            farther you go, the more you’ll pay.</li>
                        <li><b>Size of your home:</b> A studio apartment takes less time, space, and labor to move than
                            a 4-bedroom house. The number of rooms and belongings has a direct impact on cost.</li>
                        <li><b>Type of service you choose:</b> Renting a truck or container will be cheaper, but if you
                            go with <a href="https://mymovingjourney.com/movers"><strong>professional moving
                                    companies</strong></a> that pack, load, and transport everything, expect to
                            pay more for the convenience.</li>
                        <li><b>Timing of your move:</b> Moving in summer or on weekends comes with higher rates because
                            it’s <a href="https://mymovingjourney.com/blogs/moving-in-peak-season-vs-off-season"><b>peak
                                    season</b></a>. Weekdays or off-season dates can save you money.</li>
                        <li><b>Special items and extra services:</b> Bulky furniture, fragile antiques, or items like
                            pianos need extra care, which can raise your moving estimate. Add-ons like packing supplies
                            or storage will also increase the total.</li>
                    </ul>
                    <div class="col-12 my-5">
                        <div class="content_div">
                            <h3>Average Moving Cost by Home Size</h3>
                            <p>Check out what it usually costs to move based on your home size with our detailed
                                guides:</p>
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a studio or
                                    apartment</li>
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a 1-bedroom
                                    apartment</li>
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a 2-bedroom
                                    apartment</li>
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a 3-bedroom
                                    house
                                </li>
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a 4-bedroom
                                    house</li>
                                <li><i class="fa-solid fa-dollar-sign list-icon me-2"></i>Moving cost for a 5-bedroom
                                    house
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2>Smart Ways to Cut Down on Moving Expenses</h2>
                    <p>Moving can get expensive, but the good news is that there are plenty of ways to keep costs under
                        control. Here are some of the ways to save money on your move:</p>
                    <h3 class="step-subtitle">Declutter before you pack</h3>
                    <p class="step-content">The fewer items you take with you, the less your move will
                        cost. Go through each room and decide what you truly need. Sell unwanted items
                        online,
                        donate to local charities, or recycle things you don’t use.</p>
                    <h3 class="step-subtitle">Compare multiple quotes</h3>
                    <p class="step-content">Every moving company sets prices differently. By requesting a
                        few <b>moving estimates,</b> you’ll see which option fits your budget best.</p>
                    <h3 class="step-subtitle">Move during off-peak times:</h3>
                    <p class="step-content">Summer and weekends are the busiest (and most expensive)
                        times to move. If possible, schedule your move for a weekday or during the
                        off-season.</p>
                    <h3 class="step-subtitle">Do some tasks yourself</h3>
                    <p class="step-content">Full-service movers can handle everything, but that
                        convenience comes at a price. By packing your own boxes or even renting a truck for
                        part of
                        the job, you can cut down on labor costs.</p>
                    <h3 class="step-subtitle">Use a Moving Box Calculator</h3>
                    <p class="step-content">Buying too many supplies is an easy way to waste money.
                        Our <a href="https://mymovingjourney.com/packing-calculator"><strong>Moving Box
                                Calculator</strong></a> helps you figure out exactly <a
                            href="https://mymovingjourney.com/blogs/how-many-boxes-do-you-need-for-moving"><b>how many
                                boxes</b></a> and
                        packing
                        materials you need, so you only spend on what’s necessary.</p>
                    <h3 class="step-subtitle">Ask about discounts</h3>
                    <p class="step-content"> Many <b>professional moving companies</b> offer discounts for
                        students, seniors, and military families. Some even run seasonal promotions. Always
                        ask,
                        it’s a simple question that could save you a good amount of money.</p>

                    <p>Each of these steps might seem small on its own, but when combined, they can make a big
                        difference in your overall moving budget. </p>
                    <h2>Hiring Movers or Doing It Yourself – Which One Really Saves You More?</h2>
                    <p>When it comes to planning a move, one of the biggest decisions is whether to hire <a
                            href="https://mymovingjourney.com/blogs/diy-move-vs-hiring-movers"><b>professional
                                moving companies</b></a> or handle everything on your own. Both options can save you
                        money; it
                        just
                        depends on your situation.</p>
                    <ul class="criteria-list list_fill">
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>Professional movers:</b> If you’re short on time or moving a lot of heavy furniture,
                                hiring movers can actually save money in the long run. They work faster, bring the
                                right
                                equipment, and reduce the risk of damage. While the upfront cost is higher, you may
                                <a
                                    href="https://mymovingjourney.com/blogs/how-to-avoid-hidden-fees-from-moving-companies"><strong>avoid
                                        hidden expenses</strong></a> like truck rental issues, broken items, or extra
                                days off work.
                            </span>
                        </li>
                        <li class="criteria-item">
                            <div class="check-icon">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <span>
                                <b>DIY moves:</b> Renting a truck or container and handling the move yourself is
                                usually the
                                cheapest upfront option. It gives you full control over the process, and for small
                                local
                                moves, it can be very cost-effective. But keep in mind that you’ll be responsible
                                for
                                packing, heavy lifting, driving, fuel, and mileage costs.
                            </span>
                        </li>
                    </ul>
                    <p>The real savings come down to your priorities. If you want convenience and peace of mind,
                        <b>professional movers</b> may be worth the price. If you’d rather keep expenses low and don’t
                        mind putting in the effort, a DIY move can be the smarter choice.
                    </p>
                    <h2>Why Use Our Moving Cost Calculator?</h2>
                    <p>Our <b>Moving Cost Calculator</b> takes away the guesswork and gives you a clear starting point.
                        Here’s how it helps:</p>
                    <ul>
                        <li><b>Instant results:</b> Instead of waiting days for phone calls or emails, you can enter
                            your
                            move details and see a clear <b>moving estimate</b> in seconds.</li>
                        <li><b>Personalized to your move:</b> Every move is different, and our calculator reflects that.
                            Your estimate is based on your home size, distance, and the type of services you want, so
                            the numbers are actually relevant to your situation.</li>
                        <li><b>Compare options easily:</b> Not sure whether to hire <b>professional moving
                                companies,</b>
                            use a container, or go fully DIY? The calculator shows how the costs differ, so you can see
                            which option fits your budget and needs best.</li>
                        <li><b>Plan your budget with confidence:</b> Knowing your potential costs upfront helps you
                            avoid surprises later. You’ll be able to set a realistic budget and make better decisions
                            about your move.</li>
                        <li><b>Completely free to use:</b> There are no hidden fees and no sign-ups required. You get
                            reliable numbers in just a few clicks, completely free.</li>
                    </ul>

                    {{-- <div class="cost-img">
                            <img src="{{ asset('assets/img/cost_estimator_img.png') }}" class="w-100"
                    alt="benefit-of-our-moving-cost-calculator">
                </div> --}}
                <h2>FAQs</h2>
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse578" aria-expanded="false"
                                    aria-controls="collapse578">
                                    How accurate is the My Moving Journey moving cost calculator?
                                </button>
                            </h3>
                            <div id="collapse578" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Our <b>Moving Cost Calculator</b> uses real mover data and customer insights
                                        to give you a reliable price range. While the final cost may vary, it
                                        provides one of the closest estimates you can get without an in-home survey.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse579" aria-expanded="false"
                                    aria-controls="collapse579">
                                    Do I have to pay to use your moving cost calculator?
                                </button>
                            </h3>
                            <div id="collapse579" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        No, it’s completely free. You can enter your move details and get an instant
                                        moving estimate without sharing your credit card or personal information.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse580" aria-expanded="false"
                                    aria-controls="collapse580">
                                    What details should I enter into the calculator for the best results?
                                </button>
                            </h3>
                            <div id="collapse580" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        To get the most accurate estimate, enter your move-from and move-to
                                        locations, the size of your home, your move date, and any special items
                                        you’re bringing. Our tool adjusts the cost range based on these factors.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse581" aria-expanded="false"
                                    aria-controls="collapse581">
                                    Can your calculator compare professional movers with DIY options?
                                </button>
                            </h3>
                            <div id="collapse581" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Yes. Our calculator shows cost differences between hiring <b>professional
                                            moving companies, </b> renting a container, or using a truck, so you can
                                        see which choice saves you more.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse582" aria-expanded="false"
                                    aria-controls="collapse582">
                                    Why should I use your Moving Cost Calculator before booking movers?
                                </button>
                            </h3>
                            <div id="collapse582" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        It gives you clarity upfront, helping you budget, <a
                                            href="https://mymovingjourney.com/compare-movers"><b> compare
                                                companies</b></a>, and
                                        avoid hidden costs. With our calculator, you can plan with confidence and
                                        make smarter moving decisions.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>

<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Moving Cost Calculator – Get Your Free Moving Estimate",
        "url": "https://mymovingjourney.com/moving-cost-calculator",
        "description": " Plan your move using our free Moving Cost Calculator 2026. Get an instant, accurate moving estimate based on your home
        size and distance.
        ",    
        "potentialAction": {
            "@type": "ReadAction",
            "target": "{{ url()->current() }}"
        }
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "MyMovingJourney",
        "url": "https://mymovingjourney.com",
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
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "Moving Cost Calculator",
        "applicationCategory": "UtilityApplication",
        "operatingSystem": "All",
        "description": "Plan your move using our free Moving Cost Calculator 2026. Get an instant, accurate moving estimate based on your home size and distance.",
        "url": "https://mymovingjourney.com/moving-cost-calculator",
        "image": "https://mymovingjourney.com/assets/img/logo.png",
        "publisher": {
            "@type": "Organization",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://mymovingjourney.com/assets/img/logo.png"
            }
        },
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD",
            "description": "Free online moving cost estimation tool."
        },
        "potentialAction": {
            "@type": "QuoteAction",
            "name": "Moving Cost Calculator – Get Your Free Moving Estimate",
            "description": "Plan your move using our free Moving Cost Calculator 2026. Get an instant, accurate moving estimate based on your home size and distance.",
            "object": {
                "@type": "Service",
                "name": "Moving cost estimate"
            }
        }
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
                "@type": "Question",
                "name": "How accurate is the My Moving Journey moving cost calculator?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Our Moving Cost Calculator uses real mover data and customer insights to give you a reliable price range. While the final cost may vary, it provides one of the closest estimates you can get without an in-home survey."
                }
            },
            {
                "@type": "Question",
                "name": "Do I have to pay to use your moving cost calculator?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No, it’s completely free. You can enter your move details and get an instant moving estimate without sharing your credit card or personal information."
                }
            },
            {
                "@type": "Question",
                "name": "What details should I enter into the calculator for the best results?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "To get the most accurate estimate, enter your move-from and move-to locations, the size of your home, your move date, and any special items you’re bringing. Our tool adjusts the cost range based on these factors."
                }
            },
            {
                "@type": "Question",
                "name": "Can your calculator compare professional movers with DIY options?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes. Our calculator shows cost differences between hiring professional moving companies, renting a container, or using a truck, so you can see which choice saves you more."
                }
            },
            {
                "@type": "Question",
                "name": "Why should I use your Moving Cost Calculator before booking movers?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "It gives you clarity upfront, helping you budget, compare companies, and avoid hidden costs. With our calculator, you can plan with confidence and make smarter moving decisions."
                }
            }
        ]
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ url('/') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Moving Cost Calculator",
                "item": "{{ url()->current() }}"
            }
        ]
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "HowTo",
        "name": "How to Use Our Moving Cost Calculator",
        "description": "Step-by-step instructions on how to use the My Moving Journey Moving Cost Calculator to get instant and accurate moving cost estimates.",
        "image": "https://mymovingjourney.com/assets/img/logo.png",
        "totalTime": "PT1M",
        "tool": "https://mymovingjourney.com/moving-cost-calculator",
        "step": [{
                "@type": "HowToStep",
                "name": "Enter your locations",
                "text": "Type in the city or ZIP code you're moving from and where you're headed."

            },
            {
                "@type": "HowToStep",
                "name": "Choose your move size",
                "text": "Select the size of your move, whether it's a few items or a full house."

            },
            {
                "@type": "HowToStep",
                "name": "Select your moving date",
                "text": "Pick your expected moving date using the calendar tool."

            },
            {
                "@type": "HowToStep",
                "name": "See your moving estimates",
                "text": "Get instant price estimates for professional movers, moving containers, or rental trucks."

            },
            {
                "@type": "HowToStep",
                "name": "Compare your options",
                "text": "Review costs, services, and available movers to choose the best option for your needs."

            }
        ]
    }
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script> --}}

<!-- Google Maps API -->

<script
    src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyBefFHoLcWO1IV00axnWC0s34SPuCm9gKo&libraries=places&callback=googleMapsLoaded"
    async defer></script>



<script>
    let data1 = null,

        data2 = null;

    let currentStep = 0;

    let map, directionsService, directionsRenderer;

    let autocompleteFrom, autocompleteTo;

    let lastFromPlace = null;

    let lastToPlace = null;

    let calculated_distance = 0;

    let __ceInitialized = false;

    let geocoder = null;



    function initAll() {

        // Guard to avoid double init (DOMContentLoaded + Google callback)

        if (__ceInitialized) return;

        if (!(window.google && google.maps && google.maps.places)) {

            // If Google not ready yet, try again shortly

            setTimeout(initAll, 100);

            return;

        }

        __ceInitialized = true;

        initAutocomplete();

        initMap();

        geocoder = new google.maps.Geocoder();

        setupMoveSizeCards();

        setupInlineDatePicker();

        createErrorElements();

        showStep(currentStep);



        const minPrice = document.getElementById('min_price');

        const maxPrice = document.getElementById('max_price');

        if (minPrice) minPrice.value = '0';

        if (maxPrice) maxPrice.value = '0';

    }



    function initAutocomplete() {

        const zipFromInput = document.getElementById("external_zipfrom");

        const zipToInput = document.getElementById("external_ziptosearch");



        autocompleteFrom = new google.maps.places.Autocomplete(zipFromInput, {

            types: ['(regions)'],

            fields: ['geometry', 'address_components', 'formatted_address', 'name'],

            componentRestrictions: {

                country: "us"

            }

        });



        autocompleteTo = new google.maps.places.Autocomplete(zipToInput, {

            types: ['(regions)'],

            fields: ['geometry', 'address_components', 'formatted_address', 'name'],

            componentRestrictions: {

                country: "us"

            }

        });



        autocompleteFrom.addListener("place_changed", function() {

            const place = autocompleteFrom.getPlace();

            if (place.geometry) {

                const details = extractAddressDetails(place);

                zipFromInput.value = `${details.zip} - ${details.city}, ${details.state}`;

                data1 = {

                    value: zipFromInput.value,

                    latitude: place.geometry.location.lat(),

                    longitude: place.geometry.location.lng()

                };

                lastFromPlace = place;

                document.getElementById("fromError").textContent = "";

                calculateRouteIfReady();

                updateNextButtonState();

            }

        });



        autocompleteTo.addListener("place_changed", function() {

            const place = autocompleteTo.getPlace();

            if (place.geometry) {
                const details = extractAddressDetails(place);
                zipToInput.value = `${details.zip} - ${details.city}, ${details.state}`;
                data2 = {
                    value: zipToInput.value,
                    latitude: place.geometry.location.lat(),
                    longitude: place.geometry.location.lng()
                };
                lastToPlace = place;
                document.getElementById("toError").textContent = "";
                calculateRouteIfReady();
                updateNextButtonState();
            }
        });
        zipFromInput.addEventListener('input', () => {
            if (zipFromInput.value === '') {
                data1 = null;
                lastFromPlace = null;
                clearMap();
            }
            updateNextButtonState();
        });
        // Fallback: if user didn't select suggestion, geocode on blur
        zipFromInput.addEventListener('blur', () => {
            if (!zipFromInput.value.trim()) return;
            if (lastFromPlace && lastFromPlace.formatted_address === zipFromInput.value) return;
            if (!geocoder) return;
            geocoder.geocode({
                address: zipFromInput.value
            }, (results, status) => {
                if (status === 'OK' && results && results[0]) {
                    const r = results[0];
                    lastFromPlace = {
                        geometry: {
                            location: r.geometry.location
                        },
                        formatted_address: r.formatted_address
                    };
                    data1 = {
                        value: r.formatted_address,
                        latitude: r.geometry.location.lat(),
                        longitude: r.geometry.location.lng()
                    };
                    calculateRouteIfReady();
                    updateNextButtonState();
                }
            });
        });
        zipToInput.addEventListener('input', () => {
            if (zipToInput.value === '') {
                data2 = null;
                lastToPlace = null;
                clearMap();
            }
            updateNextButtonState();
        });
        // Fallback: if user didn't select suggestion, geocode on blur
        zipToInput.addEventListener('blur', () => {
            if (!zipToInput.value.trim()) return;
            if (lastToPlace && lastToPlace.formatted_address === zipToInput.value) return;
            if (!geocoder) return;
            geocoder.geocode({
                address: zipToInput.value
            }, (results, status) => {
                if (status === 'OK' && results && results[0]) {
                    const r = results[0];
                    lastToPlace = {
                        geometry: {
                            location: r.geometry.location
                        },
                        formatted_address: r.formatted_address
                    };
                    data2 = {
                        value: r.formatted_address,
                        latitude: r.geometry.location.lat(),
                        longitude: r.geometry.location.lng()
                    };
                    calculateRouteIfReady();
                    updateNextButtonState();
                }
            });
        });
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById("map-ce"), {
            center: {
                lat: 37.0902,
                lng: -95.7129
            },
            zoom: 4,
            disableDefaultUI: true,
            zoomControl: false,
            scrollwheel: false, // scroll wheel zoom disable
            gestureHandling: 'none',
            styles: [{
                    featureType: "poi",
                    stylers: [{
                        visibility: "off"
                    }]
                },
                {
                    featureType: "transit",
                    stylers: [{
                        visibility: "off"
                    }]
                }
            ]
        });
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: false
        });
    }

    function clearMap() {
        directionsRenderer.setMap(null);
        directionsRenderer = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: false
        });
        document.getElementById("roadDistance-ce").textContent = "";
        const ds = document.getElementById('distance_span_ce');
        if (ds) ds.textContent = "";
    }

    function extractAddressDetails(place) {
        const components = place.address_components;
        let city = '',
            state = '',
            zip = '';
        for (const comp of components) {
            if (comp.types.includes("postal_code")) zip = comp.long_name;
            if (comp.types.includes("locality")) city = comp.long_name;
            if (comp.types.includes("administrative_area_level_1")) state = comp.short_name;
        }
        return {
            zip,
            city,
            state
        };
    }

    function calculateRouteIfReady() {
        if (!lastFromPlace || !lastToPlace) return clearMap();
        directionsService.route({
            origin: lastFromPlace.geometry.location,
            destination: lastToPlace.geometry.location,
            travelMode: google.maps.TravelMode.DRIVING
        }, (response, status) => {
            if (status === 'OK' || (google.maps.DirectionsStatus && status === google.maps.DirectionsStatus
                    .OK)) {
                directionsRenderer.setDirections(response);
                const leg = response.routes[0].legs[0];
                document.getElementById("roadDistance-ce").textContent = leg.distance.text;
                const dist = leg.distance.value * 0.000621371;
                calculated_distance = dist;
                document.getElementById("distance_ce").value = dist + " miles";
                const ds = document.getElementById('distance_span_ce');
                if (ds) ds.textContent = leg.distance.text;
                map.setOptions({
                    draggable: false,
                    scrollwheel: false,
                    disableDoubleClickZoom: true,
                    gestureHandling: 'none'
                });
                calculateEstimatedCost();
                updateNextButtonState();
            } else {
                clearMap();
                console.error("Directions request failed:", status);

            }

        });

    }



    // ----- Stepper logic -----

    function showStep(n) {

        const steps = document.querySelectorAll('#costEstimateForm .step');

        steps.forEach((s, i) => s.style.display = (i === n) ? 'block' : 'none');

        const prevBtn = document.getElementById('customprevBtnCe');

        const nextBtn = document.getElementById('customnextBtnCe');

        const submitBtn = document.getElementById('realSubmitBtn');

        const backBtn = document.getElementById('mmjBackBtn');



        // Always hide Previous as per requirement
        prevBtn.style.display = 'none';

        // Back button should not appear on first step
        if (backBtn) backBtn.style.display = (n === 0) ? 'none' : 'inline-flex';



        if (n === steps.length - 1) {

            nextBtn.classList.add('d-none');

            submitBtn.classList.remove('d-none');

        } else {
            // Hide Next on Step 2 (index 1) because it auto-advances
            if (n === 1) {
                nextBtn.classList.add('d-none');
            } else {
                nextBtn.classList.remove('d-none');
            }
            submitBtn.classList.add('d-none');
        }
        updateNextButtonState();
        // Update progress according to current step
        setProgress(n);
    }

    function ceNextPrev(dir) {
        const steps = document.querySelectorAll('#costEstimateForm .step');
        if (dir === 1 && !validateCurrentStep()) return;
        currentStep = currentStep + dir;
        if (currentStep < 0) currentStep = 0;
        if (currentStep >= steps.length) currentStep = steps.length - 1;
        showStep(currentStep);
    }

    function updateNextButtonState() {
        const nextBtn = document.getElementById('customnextBtnCe');
        // If Next is hidden for current step (e.g., step 2) do nothing
        if (!nextBtn || nextBtn.classList.contains('d-none')) return;
        nextBtn.disabled = !validateCurrentStep(true);
    }

    function setProgress(stepIndex) {
        // Compute progress from 0% (first step) to 100% (last step)
        const steps = document.querySelectorAll('#costEstimateForm .step');
        const totalSegments = Math.max(1, steps.length - 1);
        const pct = Math.round(Math.max(0, Math.min(stepIndex, totalSegments)) / totalSegments * 100);
        const bar = document.getElementById('mmjProgressBar');
        const txt = document.getElementById('mmjProgressPct');
        if (bar) bar.style.width = pct + '%';
        if (txt) txt.textContent = pct + '%';
    }

    function validateCurrentStep(lenient = false) {
        // lenient true => just enable/disable Next, not show errors
        const n = currentStep;
        if (n === 0) {
            const from = document.getElementById('external_zipfrom').value.trim();
            const to = document.getElementById('external_ziptosearch').value.trim();
            return from !== '' && to !== '';
        }
        if (n === 1) {
            const ms = document.getElementById('move_size_ce').value;
            return ms !== '';
        }
        if (n === 2) {
            const dateVal = document.getElementById('moveDate_ce').value.trim();
            return dateVal !== '';
        }
        if (n === 3) {
            const name = document.getElementById('name_ce').value.trim();
            const email = document.getElementById('email_ce').value.trim();
            const phone = document.getElementById('phone_no_ce').value.trim();
            return name !== '' && email !== '' && phone !== '';
        }
        return true;
    }
    // ----- Move size cards -----
    function setupMoveSizeCards() {
        const grid = document.querySelector('.mmj-movesize-grid');
        if (!grid) return;
        const hiddenSelect = document.getElementById('move_size_ce');

        function setActive(card) {
            grid.querySelectorAll('.mmj-movesize-card').forEach(c => c.classList.remove('active'));
            card.classList.add('active');
        }
        grid.querySelectorAll('.mmj-movesize-card').forEach(card => {
            card.addEventListener('click', () => {
                const val = card.getAttribute('data-value');
                if (hiddenSelect) hiddenSelect.value = val;
                setActive(card);
                // Trigger change for any listeners (cost calc)
                if (hiddenSelect) {
                    const evt = new Event('change', {
                        bubbles: true
                    });
                    hiddenSelect.dispatchEvent(evt);
                }
                // Auto-advance to next step after selecting move size (Step 2 behavior)
                try {
                    ceNextPrev(1);
                } catch (e) {}
            });
        });
        // Restore old value if any
        const oldVal = '{{ old('
        move_size ') }}';
        if (oldVal) {
            const match = Array.from(grid.querySelectorAll('.mmj-movesize-card')).find(c => c.getAttribute(
                'data-value') === oldVal);
            if (match) match.click();
        }
    }
    // ----- Inline date picker (custom calendar like layout modal) -----
    function setupInlineDatePicker() {
        const wrap = document.getElementById('mmj-date-inline-ce');
        const hidden = document.getElementById('moveDate_ce');
        const nextBtn = document.getElementById('customnextBtnCe');
        const summaryWrap = document.getElementById('mmj-date-summary-ce');
        const summaryTxt = document.getElementById('mmj-date-selected');
        const panel = document.getElementById('mmj-date-panel');
        const display = document.getElementById('moveDate_display');
        if (!wrap || !hidden) return;
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];
        let view = new Date();
        view.setDate(1);
        let selectedDate = hidden.value ? new Date(hidden.value) : null;

        function ymd(d) {
            const y = d.getFullYear();
            const m = String(d.getMonth() + 1).padStart(2, '0');
            const dd = String(d.getDate()).padStart(2, '0');
            return `${y}-${m}-${dd}`;
        }

        function human(d) {
            return d.toLocaleDateString(undefined, {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        function isSameDay(a, b) {
            return a && b && a.getFullYear() === b.getFullYear() && a.getMonth() === b.getMonth() && a.getDate() === b
                .getDate();
        }

        function buildHeader() {
            return `
                  <div class="mmj-cal__header">
                    <button type="button" class="mmj-cal__nav mmj-cal__prev" aria-label="Previous Month">&#8249;</button>
                    <div class="mmj-cal__title">${monthNames[view.getMonth()]} ${view.getFullYear()}</div>
                    <button type="button" class="mmj-cal__nav mmj-cal__next" aria-label="Next Month">&#8250;</button>
                  </div>`;
        }

        function buildWeekdays() {
            return `<div class="mmj-cal__week">${dayNames.map(d=>`<div class="mmj-cal__wd">${d}</div>`).join('')}</div>`;
        }

        function buildDays() {
            const firstDayIdx = view.getDay();
            const year = view.getFullYear();
            const month = view.getMonth();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const cells = [];
            for (let i = 0; i < firstDayIdx; i++) cells.push('<div class="mmj-cal__cell mmj-cal__cell--empty"></div>');
            for (let d = 1; d <= daysInMonth; d++) {
                const date = new Date(year, month, d);
                const isDisabled = date < today;
                const classes = ['mmj-cal__cell'];
                let label = d;
                if (isDisabled) {
                    classes.push('mmj-cal__cell--disabled');
                } else if (selectedDate && isSameDay(date, selectedDate)) {
                    classes.push('mmj-cal__cell--selected');
                }
                cells.push(
                    `<button type="button" class="${classes.join(' ')}" data-day="${d}" ${isDisabled?'disabled':''}>${label}</button>`
                );
            }
            return `<div class="mmj-cal__grid">${cells.join('')}</div>`;
        }

        function render() {
            wrap.innerHTML = `
                  <div class="mmj-cal">
                    ${buildHeader()}
                    ${buildWeekdays()}
                    ${buildDays()}
                  </div>`;
            wrap.querySelector('.mmj-cal__prev').addEventListener('click', (e) => {
                e.stopPropagation();
                view.setMonth(view.getMonth() - 1);
                render();
            });
            wrap.querySelector('.mmj-cal__next').addEventListener('click', (e) => {
                e.stopPropagation();
                view.setMonth(view.getMonth() + 1);
                render();
            });
            wrap.querySelectorAll('.mmj-cal__cell[data-day]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const d = parseInt(btn.getAttribute('data-day'), 10);
                    selectedDate = new Date(view.getFullYear(), view.getMonth(), d);
                    hidden.value = ymd(selectedDate);
                    if (display) {
                        const d = selectedDate;
                        display.value =
                            `${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}-${d.getFullYear()}`;
                    }
                    if (summaryTxt && summaryWrap) {
                        summaryTxt.textContent = human(selectedDate);
                        summaryWrap.classList.remove('d-none');
                    }
                    if (nextBtn && currentStep === 2) nextBtn.disabled = false;
                    updateNextButtonState();
                    render();
                    // auto-close panel after selection
                    if (panel && !panel.classList.contains('d-none')) panel.classList.add('d-none');
                });
            });
        }
        // Initial render
        render();
        // If a previous value exists, reflect it in summary
        if (hidden.value && summaryTxt && summaryWrap) {
            const dt = new Date(hidden.value);
            if (!isNaN(dt)) {
                summaryTxt.textContent = human(dt);
                summaryWrap.classList.remove('d-none');
                if (display) {
                    display.value =
                        `${String(dt.getMonth()+1).padStart(2,'0')}-${String(dt.getDate()).padStart(2,'0')}-${dt.getFullYear()}`;
                }
            }
        }
        // Toggle handlers
        if (display && panel) {
            display.addEventListener('click', () => {
                panel.classList.toggle('d-none');
            });
            document.addEventListener('click', (e) => {
                if (!panel.contains(e.target) && e.target !== display) {
                    panel.classList.add('d-none');
                }
            });
        }
    }

    function haversineDistance(lat1, lon1, lat2, lon2) {
        const R = 6371e3;
        const φ1 = lat1 * Math.PI / 180,
            φ2 = lat2 * Math.PI / 180;
        const Δφ = (lat2 - lat1) * Math.PI / 180;
        const Δλ = (lon2 - lon1) * Math.PI / 180;
        const a = Math.sin(Δφ / 2) ** 2 + Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) ** 2;
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return (R * c) * 0.000621371;
    }

    function calculateEstimatedCost() {
        if (!data1 || !data2) return;
        const rent_size = document.getElementById('move_size_ce').value;
        if (!rent_size) {
            console.error('Please select a move size');
            return;
        }
        const rates = {
            "Studio": {
                "0-250": {
                    base: 950,
                    per_mile: 3
                },
                "251-1000": {
                    base: 500,
                    per_mile: 1.75
                },
                "1001-2000": {
                    base: 500,
                    per_mile: 1.5
                },
                "2001+": {
                    base: 200,
                    per_mile: 1.1
                }
            },
            "1 Bedroom Home": {
                "0-250": {
                    base: 1000,
                    per_mile: 4
                },
                "251-1000": {
                    base: 800,
                    per_mile: 2.5
                },
                "1001-2000": {
                    base: 900,
                    per_mile: 2.2
                },
                "2001+": {
                    base: 1000,
                    per_mile: 1.75
                }
            },
            "2 Bedroom Home": {
                "0-250": {
                    base: 700,
                    per_mile: 3.5
                },
                "251-1000": {
                    base: 1000,
                    per_mile: 3
                },
                "1001-2000": {
                    base: 1300,
                    per_mile: 2.5
                },
                "2001+": {
                    base: 1050,
                    per_mile: 2
                }
            },
            "3 Bedroom Home": {
                "0-250": {
                    base: 3500,
                    per_mile: 4
                },
                "251-1000": {
                    base: 2500,
                    per_mile: 3.8
                },
                "1001-2000": {
                    base: 3000,
                    per_mile: 3
                },
                "2001+": {
                    base: 2000,
                    per_mile: 2.8
                }
            },
            "4 Bedroom Home": {
                "0-250": {
                    base: 5000,
                    per_mile: 5
                },
                "251-1000": {
                    base: 4000,
                    per_mile: 4.8
                },
                "1001-2000": {
                    base: 4000,
                    per_mile: 5
                },
                "2001+": {
                    base: 3000,
                    per_mile: 4
                }
            },
            "5 Bedroom Home": {
                "0-250": {
                    base: 6500,
                    per_mile: 5.6
                },
                "251-1000": {
                    base: 5200,
                    per_mile: 5.2
                },
                "1001-2000": {
                    base: 5200,
                    per_mile: 5.4
                },
                "2001+": {
                    base: 4000,
                    per_mile: 4.6
                }
            }
        };

        function getRateBracket(distance) {
            if (distance > 0 && distance <= 250) return "0-250";
            if (distance > 250 && distance <= 1000) return "251-1000";
            if (distance > 1000 && distance <= 2000) return "1001-2000";
            if (distance > 2000) return "2001+";
            return null;
        }
        const bracket = getRateBracket(calculated_distance);
        if (!bracket || !rates[rent_size]) {
            console.error("Invalid move size or distance bracket");
            return;
        }
        const rate = rates[rent_size][bracket];
        const estimated_cost = rate.base + (rate.per_mile * calculated_distance);
        let min_cost, max_cost;
        // Tiered custom adjustments
        if (rent_size === "2 Bedroom Home" && bracket === "1001-2000") {
            min_cost = Math.round(estimated_cost * 1.05);
            max_cost = Math.round(estimated_cost * 1.35);
        } else if (rent_size === "2 Bedroom Home" && bracket === "251-1000") {
            min_cost = Math.round(estimated_cost * 1.08);
            max_cost = Math.round(estimated_cost * 1.35);
        } else if (rent_size === "2 Bedroom Home" && bracket === "0-250") {
            min_cost = Math.round(estimated_cost * 2);
            max_cost = Math.round(estimated_cost * 2.5);
        } else if (rent_size === "1 Bedroom Home" && bracket === "2001+") {
            min_cost = Math.round(estimated_cost * 0.8);
            max_cost = Math.round(estimated_cost * 1.1);
        } else if (rent_size === "1 Bedroom Home" && bracket === "1001-2000") {
            min_cost = Math.round(estimated_cost * 0.95);
            max_cost = Math.round(estimated_cost * 1.35);
        } else if (rent_size === "1 Bedroom Home" && bracket === "0-250") {
            min_cost = Math.round(estimated_cost * 1.2);
            max_cost = Math.round(estimated_cost * 1.52);
        } else if (rent_size === "Studio" && bracket === "0-250") {
            min_cost = Math.round(estimated_cost * 0.91);
            max_cost = Math.round(estimated_cost * 1.4);
        } else if (rent_size === "Studio" && bracket === "251-1000") {
            min_cost = Math.round(estimated_cost * 0.88);
            max_cost = Math.round(estimated_cost * 1.43);
        } else if (rent_size === "Studio" && bracket === "1001-2000") {
            min_cost = Math.round(estimated_cost * 0.88);
            max_cost = Math.round(estimated_cost * 1.51);
        } else if (rent_size === "Studio" && bracket === "2001+") {
            min_cost = Math.round(estimated_cost * 0.9);
            max_cost = Math.round(estimated_cost * 1.5);
        } else {
            min_cost = Math.round(estimated_cost * 0.92);
            max_cost = Math.round(estimated_cost * 1.35);
        }
        // Optional Add-ons
        const packing_cost = 300;
        const storage_cost = 400;
        const isPackingChecked = document.getElementById('packing_ce') && document.getElementById('packing_ce').checked;
        const isStorageChecked = document.getElementById('storage_ce') && document.getElementById('storage_ce').checked;
        if (isPackingChecked) {
            min_cost += packing_cost;
            max_cost += packing_cost;
        }
        if (isStorageChecked) {
            min_cost += storage_cost;
            max_cost += storage_cost;
        }
        // Format and display
        document.getElementById("cost_span_min").textContent = "$" + min_cost.toLocaleString();
        document.getElementById("cost_span_max").textContent = "$" + max_cost.toLocaleString();
        document.getElementById("min_price").value = min_cost;
        document.getElementById("max_price").value = max_cost;
        const estBox = document.querySelector(".estimated_cost_deta");
        if (estBox) {
            estBox.classList.remove("d-none");
        }
    }
    // jQuery ready function
    $(document).ready(function() {
        calculateEstimatedCost();
        $('#move_size_ce, #packing_ce, #storage_ce').on('change', function() {
            calculateEstimatedCost();
        });
    });

    function createErrorElements() {
        const fields = [{
                id: 'external_zipfrom',
                errorId: 'fromError'
            },
            {
                id: 'external_ziptosearch',
                errorId: 'toError'
            },
            {
                id: 'moveDate_ce',
                errorId: 'moveDateError'
            },
            {
                id: 'move_size_ce',
                errorId: 'sizeError'
            },
            {
                id: 'name_ce',
                errorId: 'nameError'
            },
            {
                id: 'phone_no_ce',
                errorId: 'phoneError'
            }
        ];
        fields.forEach(field => {
            const input = document.getElementById(field.id);
            if (input && !document.getElementById(field.errorId)) {
                const errorElement = document.createElement('div');
                errorElement.id = field.errorId;
                errorElement.className = 'error-message';
                errorElement.style.color = 'red';
                errorElement.style.marginTop = '5px';
                errorElement.style.fontSize = '14px';
                input.parentNode.insertBefore(errorElement, input.nextSibling);
            }
        });
    }
    document.addEventListener("DOMContentLoaded", initAll);
</script>
<script>
    // Back button behavior: go to previous step if possible, otherwise browser back
    (function() {
        const backBtn = document.getElementById('mmjBackBtn');
        if (backBtn) {
            backBtn.addEventListener('click', function() {
                try {
                    if (typeof currentStep !== 'undefined' && currentStep > 0) {
                        ceNextPrev(-1);
                    } else {
                        history.back();
                    }
                } catch (e) {
                    history.back();
                }
            });
        }
    })();
    document.querySelectorAll('.form-check').forEach(container => {
        container.style.cursor = 'pointer';
        container.addEventListener('click', function(e) {
            if (e.target.tagName === 'INPUT') return;
            const chk = this.querySelector('input[type="checkbox"]');
            if (chk) {
                chk.checked = !chk.checked;
                chk.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
            }
        });
    });
</script>
@endsection