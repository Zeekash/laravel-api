@extends('layouts.app')
@section('title')
    {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost
@endsection
@section('meta_keywords')
{{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}
@endsection
@if(request()->has('search'))
    <meta name="robots" content="noindex, nofollow">
@endif
@section('meta_description')
    @if (in_array($cityToStateRoute->cityFrom->state->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Looking for reliable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Get the best moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and tips to make your move stress-free.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Find trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving services
        from {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful expert tips for a stress-free move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'colorado',
            'idaho',
            'montana',
            'nevada',
            'new-mexico',
            'utah',
        ]))
        Need trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and helpful tips for easy, stress-free move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Find reliable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get professional moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful tips for a hassle-free relocation.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Find trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful tips for a smooth, hassle-free relocation.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Need dependable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Enjoy top-notch moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}, along with helpful tips for an easy move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Need trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and tips for a seamless, efficient moving experience.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Need dependable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }}
        to {{ $cityToStateRoute->stateTo->name }}? Find top moving services at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}, along with helpful tips to make your
        move smooth and easy.
    @endif
@endsection

@section('og:title')
    {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost
@endsection
@section('og:description')
    @if (in_array($cityToStateRoute->cityFrom->state->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Looking for reliable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Get the best moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and tips to make your move stress-free.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Find trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving
        services
        from {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful expert tips for a stress-free move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'colorado',
            'idaho',
            'montana',
            'nevada',
            'new-mexico',
            'utah',
        ]))
        Need trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and helpful tips for easy, stress-free move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Find reliable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get professional moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful tips for a hassle-free relocation.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Find trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and useful tips for a smooth, hassle-free relocation.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Need dependable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Enjoy top-notch moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}, along with helpful tips for an easy move.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Need trusted movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and tips for a seamless, efficient moving experience.
    @elseif(in_array($cityToStateRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Need dependable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }}
        to {{ $cityToStateRoute->stateTo->name }}? Find top moving services at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}, along with helpful tips to make your
        move smooth and easy.
    @endif
@endsection
{{-- @section('og:image')
@php
    $from = $cityToStateRoute->stateFrom->name;
    $to   = $cityToStateRoute->cityTo->name;
@endphp
{{ route('thumbnail.moving-from-to.png', [
          'text' => $from,
          'secondary-text' => $to,
      ]) }} --}}
{{-- @endsection --}}
@section('head')
    <meta name="robots" content="index, follow">
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/routes/city-to-state-route.css') }}">
    @php
        $statesTemplate1 = ['alabama', 'arkansas', 'kentucky', 'louisiana', 'mississippi', 'south-carolina'];
        $statesTemplate2 = ['california', 'new-york', 'illinois', 'pennsylvania', 'ohio', 'georgia'];
        $statesTemplate3 = ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah'];
        $statesTemplate4 = ['florida', 'tennessee', 'west-virginia', 'vermont', 'rhode-island', 'new-jersey'];
        $statesTemplate5 = ['massachusetts', 'connecticut', 'delaware', 'maine', 'maryland', 'new-hampshire'];
        $statesTemplate6 = ['michigan', 'indiana', 'iowa', 'kansas', 'minnesota', 'missouri'];
        $statesTemplate7 = ['texas', 'arizona', 'nebraska', 'south-dakota', 'wisconsin', 'wyoming'];
        $statesTemplate8 = ['washington', 'oregon', 'north-carolina', 'virginia', 'oklahoma', 'north-dakota'];
    @endphp
    <section class="hero hero-image d-flex align-items-center justify-content-center">

        <div class="container container-main ">
            <div class="hero-content">
                <div class="upper_content">
                    <h1 class="hero-title">
                        <span class="move_cost_2_3_bedroom_min" style="font-family: var(--family);">{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}</span>
                        {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to
                        {{ $cityToStateRoute->stateTo->name }} -
                        Best Movers and Cost
                    </h1>
                    {{-- <p class="hero-subtitle">
                        Easily compare and book your next move with my moving journey
                    </p> --}}
                </div>
                <div class="form_wrapper mb-lg-0 mb-4">
                    <form action="" class="main_banner_form">
                        <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                            <span class="mb-2 form_heading">
                                Let’s Calculate Your Moving Cost!
                            </span>
                            <p class="miles_upp">Moving Distance: {{ number_format($cityToStateRoute->miles) }} miles</p>
                        </div>
                        <div class="form_bg">
                            <div class="row">
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from"
                                            {{-- value="{{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }}, USA" --}}
                                            class="zipfromsearch pac-target-input mmj-zip-from"
                                            placeholder="Enter City Name" autocomplete="off" >
                                        <span id="external_zipfrom_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            {{-- value="{{ $cityToStateRoute->stateTo->name }}, USA" --}}
                                            class="ziptosearch pac-target-input mmj-zip-to" placeholder="Enter State Name"
                                            autocomplete="off" >
                                        <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                    <a href="#ModalForm" data-bs-toggle="modal">
                                        <button class="quote-btn" type="button">
                                            Start Calculation
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
                        <input type="hidden" class="mmj-distance-hidden" name="distance_miles" value="">
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="contianer container_main my-5">
        {{-- <div class="row movers-info  my-4">
            <div class="col-md-4">
                <div class="info-box d-flex align-items-center">
                    <div class="img_bg me-3">
                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info_icon">
                    </div>
                    <p class="mb-0"><strong>2,000</strong> Movers Helped Every Month</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box d-flex align-items-center">
                    <div class="img_bg me-3">
                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info_icon">
                    </div>
                    <p class="mb-0"><strong>96%</strong> customer satisfaction</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box d-flex align-items-center">
                    <div class="img_bg me-3">
                        <img src="{{ asset('assets/img/help.png') }}" alt="Movers Icon" class="info_icon">
                    </div>
                    <p class="mb-0"><strong>100%</strong> Free &amp; No-Obligation Quotes</p>
                </div>
            </div>
        </div> --}}
        <div class="author-box mb-3">
            <div class="author-info">
                <img src="https://mymovingjourney.com/assets/img/author_img.png" loading="lazy" alt="Author">
                <span class="author-label">Author <br>
                    <span class="author_name"><a href="https://www.linkedin.com/in/honey-jay/" target="_blank">Honey
                            Jay
                            <i class="fa-brands fa-linkedin" style="color: var(--bg);"></i></a></span></span>
            </div>
            <div class="update-info">
                <span style="color:#116087;"><i class="fa-regular fa-clock"></i>
                    Updated :</span> {{ date('M') }} {{ date('Y') }}
            </div>
        </div>

        @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
            <p><b>Cost and Miles: </b>If you’re moving from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> covers
                about <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. On average, the trip costs between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Your total cost depends on how much you’re moving,
                the time of year, and whether you hire movers or do it yourself.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
            <p><b>Cost and Miles: </b>The distance from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> is roughly
                <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. Moving costs typically range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The final price varies based on your shipment
                size, season, and whether you move on your own or hire professionals.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
            <p><b>Cost and Miles: </b>Moving from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> covers
                about <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. On average, the trip costs between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>.Your total cost depends on how much you’re moving,
                the time of year, and whether you hire movers or do it yourself.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
            <p><b>Cost and Miles: </b>The distance from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> is roughly
                <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. Moving costs typically range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, depending on your shipment size, the season, and
                whether you hire movers or handle the move yourself.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
            <p><b>Cost and Miles: </b>The move from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> spans
                roughly <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. On average, you can expect to spend between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The final price varies based on the amount of
                belongings you’re relocating, the season, and whether you choose professional movers or handle the move on
                your own.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
            <p><b>Cost and Miles: </b>The move from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> covers
                about <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. The cost usually falls between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. Your final price depends on how much you’re
                moving, the season, and whether you hire movers or do it yourself.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
            <p><b>Cost and Miles: </b>The distance from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> is about
                <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>, and the move typically costs between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The total cost will vary based on the amount
                you're moving, the time of year, and whether you choose to hire professional movers or handle the move
                yourself.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
            <p><b>Cost and Miles: </b>The distance from <b>{{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</b> is around
                <span class="miles_upp"> {{ number_format($cityToStateRoute->miles) }} miles</span>. Typically, the cost ranges from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The total expense depends on how much you're
                moving, the time of year, and whether you hire movers or go the DIY route.
            </p>
        @endif

        <section class="featured-partners pb-5">
            <div class="container">
                <h2 class="featured-partners-title">Featured Movers from {{ $cityToStateRoute->cityFrom->name }},
                    {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}</h2>
                <div class="Featured_Partners mt-4">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="partner-card
                                    active  ">

                                <div class="company_logo">
                                    <img src="https://mymovingjourney.com/companies/image/international-van-lines.webp"
                                        alt="international-van-lines-logo" class="img-fluid" loading="lazy">
                                </div>
                                <div class="partner-header d-flex align-items-center justify-content-center">

                                    <h5 class="company_name">International Van Lines</h5>
                                </div>

                                <!--<hr class="mt-2">-->
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                    <span class="rating"
                                        style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.5
                                        out of 5</span>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                    <ul class="d-flex list-unstyled mb-0 ms-1">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                    </ul>
                                </div>

                                <!--<hr>-->
                                <div class="partner-info">
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">International
                                        Coverage</p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Storage
                                        Included</p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Awarded
                                        Excellence
                                    </p>
                                </div>
                                <a href="https://mymovingjourney.com/mover/international-van-lines">
                                    <div class="phone-box mb-1 mt-3">
                                        Get Free Estimates
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="partner-card
                                    ">

                                <div class="company_logo">
                                    <img src="https://mymovingjourney.com/companies/image/american-van-lines.webp"
                                        alt="american-van-lines-logo" class="img-fluid" loading="lazy">
                                </div>
                                <div class="partner-header d-flex align-items-center justify-content-center">

                                    <h5 class="company_name">American Van Lines</h5>
                                </div>

                                <!--<hr class="mt-2">-->
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                    <span class="rating"
                                        style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.2
                                        out of 5</span>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                    <ul class="d-flex list-unstyled mb-0 ms-1">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                    </ul>
                                </div>

                                <!--<hr>-->
                                <div class="partner-info">
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Cross-Country
                                        Moves</p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Flat-Rate
                                        Pricing</p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Specialty
                                        Item
                                        Care
                                    </p>
                                </div>
                                <a href="https://mymovingjourney.com/mover/american-van-lines">
                                    <div class="phone-box mb-1 mt-3">
                                        Get Free Estimates
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="partner-card
                                    ">

                                <div class="company_logo">
                                    <img src="https://mymovingjourney.com/companies/image/safeway-moving-inc.webp"
                                        alt="safeway-moving-inc-logo" class="img-fluid" loading="lazy">
                                </div>
                                <div class="partner-header d-flex align-items-center justify-content-center">

                                    <h5 class="company_name">Safeway Moving Inc</h5>
                                </div>

                                <!--<hr class="mt-2">-->
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                    <span class="rating"
                                        style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.7
                                        out of 5</span>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                    <ul class="d-flex list-unstyled mb-0 ms-1">
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                        {{-- <i class="far fa-star" aria-hidden="true"></i> --}}
                                    </ul>
                                </div>

                                <!--<hr>-->
                                <div class="partner-info">
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">24/7
                                        Support
                                    </p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">GPS
                                        Tracking
                                    </p>
                                    <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                            alt="check-mark" loading="lazy" width="13" height="13">Trained
                                        Packing Staff
                                    </p>
                                </div>
                                <a href="https://mymovingjourney.com/mover/safeway-moving-inc">
                                    <div class="phone-box mb-1 mt-3">
                                        Get Free Estimates
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h2 class=" mb-4">Best Movers by Move Type </h2>
        <!-- Movers Type Icons -->
        <div class="mover-types">
            <div class="mover-item active" data-target="local">
                <div class="mover-icon">
                    <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                    </svg>
                    <img src="{{ asset('assets/img/local.webp') }}" width="60" alt="Local" />
                </div>
                <p>Local</p>
            </div>

            <div class="mover-item" data-target="interstate">
                <div class="mover-icon">
                    <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                    </svg>
                    <img src="{{ asset('assets/img/interstate.webp') }}" width="60" alt="Interstate" />
                </div>
                <p>Interstate</p>
            </div>

            <div class="mover-item" data-target="container">
                <div class="mover-icon">
                    <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                    </svg>
                    <img src="{{ asset('assets/img/container.webp') }}" width="60" alt="Container" />
                </div>
                <p>Container</p>
            </div>

            <div class="mover-item" data-target="rental">
                <div class="mover-icon">
                    <svg viewBox="0 0 140 120" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M72.6619 0.00299794C100.328 0.190834 131.381 9.70631 138.265 36.5026C144.498 60.763 115.794 74.5711 95.6387 89.4434C74.68 104.909 52.6693 129.446 30.229 116.222C3.33433 100.373 -6.44823 64.9167 4.25822 35.5928C14.004 8.90002 44.2462 -0.189929 72.6619 0.00299794Z" />
                    </svg>
                    <img src="{{ asset('assets/img/truck-rental.webp') }}" width="60" alt="Rental Truck" />
                </div>
                <p>Rental Truck</p>
            </div>
        </div>
        <!-- Movers Content -->
        <div id="local" class="mover-content active">
            <div class="row">
                @foreach ($local_resource_bottom_movers as $localMover)
                    @if ($loop->iteration > 4)
                        @break
                    @endif
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
                        $imageUrl = str_starts_with($localMover->company->image, 'companies/image/')
                            ? URL::to('/' . $localMover->company->image)
                            : URL::to('/companies/image/' . $localMover->company->image);
                    @endphp
                    <div class="col-lg-6">
                        <div class="new_card">
                            <h3 class="company-name" id="title-of-company-name">
                                {{ $localMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </h3>
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="">
                                        <img class="img-fluid" src="{{ $imageUrl }}"
                                            alt="{{ $localMover->company->slug }}-logo">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="content ps-lg-3 ps-0">
                                        <div class="rating-section mb-1">
                                            <ul class="list-unstyled stars_list m-0  d-flex align-items-center ">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($rounded >= $i)
                                                        <li><i class="fas fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @elseif ($rounded > $i - 1)
                                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @else
                                                        <li><i class="far fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @endif
                                                @endfor
                                                <span class="rating-point">({{ $rounded }})</span>
                                            </ul>
                                        </div>
                                        <p class="review-text mb-0">Company Based in :
                                            <b>{{ $localMover->company->state->name }}</b>
                                        </p>
                                        <div class="double_btn mt-3">
                                            <a href="{{ route('contactMover', $localMover->company->slug) }}"
                                                target="_blank" class="get">Get Estimate</a>
                                            <a href="{{ route('company.show', $localMover->company->slug) }}"
                                                target="_blank" class="more">Learn More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="interstate" class="mover-content">
            <div class="row">
                @foreach ($long_distance_movers as $interstateMover)
                    @php
                        $total_rating = $interstateMover->company->users->sum(function ($user) {
                            return (float) $user->overall_rating;
                        });

                        $total_reviews = $interstateMover->company->users->count();

                        if ($total_reviews > 0) {
                            $avg_rating = $total_rating / $total_reviews;
                        } else {
                            $avg_rating = 0;
                        }

                        $rounded = round($avg_rating, 1);
                        $imageUrl = str_starts_with($interstateMover->company->image, 'companies/image/')
                            ? URL::to('/' . $interstateMover->company->image)
                            : URL::to('/companies/image/' . $interstateMover->company->image);
                    @endphp
                    <div class="col-lg-6">
                        <div class="new_card">
                            <h3 class="company-name" id="title-of-company-name">
                                {{ $interstateMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </h3>
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="">
                                        <img class="img-fluid" src="{{ $imageUrl }}"
                                            alt="{{ $interstateMover->company->slug }}-logo">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="content ps-lg-3 ps-0">
                                        <div class="rating-section mb-1">
                                            <ul class="list-unstyled stars_list m-0  d-flex align-items-center ">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($rounded >= $i)
                                                        <li><i class="fas fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @elseif ($rounded > $i - 1)
                                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @else
                                                        <li><i class="far fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @endif
                                                @endfor
                                                <span class="rating-point">({{ $rounded }})</span>
                                            </ul>
                                        </div>
                                        <p class="review-text mb-0">Company Based in :
                                            <b>{{ $interstateMover->company->state->name }}</b>
                                        </p>
                                        <div class="double_btn mt-3">
                                            <a href="{{ route('contactMover', $interstateMover->company->slug) }}"
                                                target="_blank" class="get">Get Estimate</a>
                                            <a href="{{ route('company.show', $interstateMover->company->slug) }}"
                                                target="_blank" class="more">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="container" class="mover-content">
            <div class="row">
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
                        $imageUrl = str_starts_with($containerMover->company->image, 'companies/image/')
                            ? URL::to('/' . $containerMover->company->image)
                            : URL::to('/companies/image/' . $containerMover->company->image);
                    @endphp
                    <div class="col-lg-6">
                        <div class="new_card">
                            <h3 class="company-name" id="title-of-company-name">
                                {{ $containerMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </h3>
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="">
                                        <img class="img-fluid" src="{{ $imageUrl }}"
                                            alt="{{ $containerMover->company->slug }}-logo">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="content ps-lg-3 ps-0">
                                        <div class="rating-section mb-1">
                                            <ul class="list-unstyled stars_list m-0  d-flex align-items-center ">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($rounded >= $i)
                                                        <li><i class="fas fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @elseif ($rounded > $i - 1)
                                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @else
                                                        <li><i class="far fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @endif
                                                @endfor
                                                <span class="rating-point">({{ $rounded }})</span>
                                            </ul>
                                        </div>
                                        <p class="review-text mb-0">Company Based in :
                                            <b>{{ $containerMover->company->state->name }}</b>
                                        </p>
                                        <div class="double_btn mt-3">
                                            <a href="{{ route('contactMover', $containerMover->company->slug) }}"
                                                target="_blank" class="get">Get Estimate</a>
                                            <a href="{{ route('company.show', $containerMover->company->slug) }}"
                                                target="_blank" class="more">Learn More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="rental" class="mover-content">
            <div class="row">
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
                        $imageUrl = str_starts_with($truckRentalMover->company->image, 'companies/image/')
                            ? URL::to('/' . $truckRentalMover->company->image)
                            : URL::to('/companies/image/' . $truckRentalMover->company->image);
                    @endphp
                    <div class="col-lg-6">
                        <div class="new_card">
                            <h3 class="company-name" id="title-of-company-name">
                                {{ $truckRentalMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </h3>
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="">
                                        <img class="img-fluid" src="{{ $imageUrl }}"
                                            alt="{{ $truckRentalMover->company->slug }}-logo">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="content ps-lg-3 ps-0">
                                        <div class="rating-section mb-1">
                                            <ul class="list-unstyled stars_list m-0  d-flex align-items-center ">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($rounded >= $i)
                                                        <li><i class="fas fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @elseif ($rounded > $i - 1)
                                                        <li><i class="fa fa-star-half-stroke" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @else
                                                        <li><i class="far fa-star" aria-hidden="true"
                                                                style="font-size:28px; color:#E3780D"></i></li>
                                                    @endif
                                                @endfor
                                                <span class="rating-point">({{ $rounded }})</span>
                                            </ul>
                                        </div>
                                        <p class="review-text mb-0">Company Based in :
                                            <b>{{ $truckRentalMover->company->state->name }}</b>
                                        </p>
                                        <div class="double_btn mt-3">
                                            <a href="{{ route('contactMover', $truckRentalMover->company->slug) }}"
                                                target="_blank" class="get">Get Estimate</a>
                                            <a href="{{ route('company.show', $truckRentalMover->company->slug) }}"
                                                target="_blank" class="more">Learn More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <h2 class=" mb-4">
            Average Moving Cost from {{ $cityToStateRoute->cityFrom->name }},
            {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}
        </h2>
        <div class="scroll-container mt-5">
            <!-- Card 1 -->
            <div class="cost-card">
                <div class="d-flex align-items-start">
                    <div class="img_wrrap">
                        <img src="{{ asset('assets/img/studio.webp') }}" alt="icon">
                    </div>
                    <div class="content_wrap">
                        <h5>Studio / 1 bedroom</h5>
                        <p><strong>Moving Company: </strong><span class="move_cost_studio">{{ $calculatedCosts['studio']['company']['range_formatted'] ?? '$0 - $0' }}</span></p>
                        <p><strong>Moving Container: </strong><span class="move_cost_container_studio">{{ $calculatedCosts['studio']['container']['range_formatted'] ?? '$0 - $0' }}</span></p>
                        <p><strong>Rental Truck: </strong><span class="move_cost_rental_truck_studio">{{ $calculatedCosts['studio']['truck']['range_formatted'] ?? '$0 - $0' }}</span></p>
                    </div>
                </div>
            </div>
            <div class="cost-card">
                <div class="d-flex align-items-start">
                    <div class="img_wrrap">
                        <img src="{{ asset('assets/img/two_bedroom.webp') }}" alt="icon">
                    </div>
                    <div class="content_wrap">
                        <h5>2 – 3 bedrooms</h5>
                        <p><strong>Moving Company: </strong><span class="move_cost_2_3_bedroom">{{ $calculatedCosts['bedrooms2_3']['company']['range_formatted'] ?? '$0 - $0' }}</span></p>
                        <p><strong>Moving Container: </strong><span class="move_cost_container_2_3_bedroom">{{ $calculatedCosts['bedrooms2_3']['container']['range_formatted'] ?? '$0 - $0' }}</span></p>
                        <p><strong>Rental Truck: </strong><span class="move_cost_rental_truck_2_3_bedroom">{{ $calculatedCosts['bedrooms2_3']['truck']['range_formatted'] ?? '$0 - $0' }}</span></p>
                    </div>
                </div>
            </div>
            <div class="cost-card">
                <div class="d-flex align-items-start">
                    <div class="img_wrrap">
                        <img src="{{ asset('assets/img/four_bedroom.webp') }}" alt="icon">
                    </div>
                    <div class="content_wrap">
                        <h5>4+ bedrooms</h5>
                        <p><strong>Moving Company: </strong><span class="move_cost_4_bedroom">{{ $calculatedCosts['bedrooms4']['company']['range_formatted'] ?? '$0 - $0' }}</p>
                        <p><strong>Moving Container: </strong><span class="move_cost_container_4_bedroom">{{ $calculatedCosts['bedrooms4']['container']['range_formatted'] ?? '$0 - $0' }}</p>
                        <p><strong>Rental Truck: </strong><span class="move_cost_rental_truck_4_bedroom">{{ $calculatedCosts['bedrooms4']['truck']['range_formatted'] ?? '$0 - $0' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="estimates-container my-5">
                <div class="section-title">
                    <span class="green-dot"></span>
                    Recent Moving Price Estimates
                    <div class="info-tooltip">
                        <i class="bi bi-info-circle info-icon"></i>
                        <div class="tooltip-content">
                            The quotes shown below are actual requests submitted by My Moving Journey users within the last
                            two days. Moving costs can shift depending on timing and availability, so consider these figures
                            as general estimates rather than exact prices.
                        </div>
                    </div>
                </div>

                <!-- shadow layers -->
                <div class="scroll-shadow-top"></div>
                <div class="scroll-shadow-bottom"></div>

                <!-- scrollable area -->
                <div class="estimates-scroll" id="scrollArea">

                    <!-- Example cards -->
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/safeway-moving-inc.webp"
                                    alt="Safeway Moving" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">Safeway Moving</div>
                            {{-- <div class="route">Pell City, AL → Astatula, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 3 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$4,288</div>
                            <a href="https://mymovingjourney.com/contact-mover/safeway-moving-inc"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/american-van-lines.webp"
                                    alt="American Van Lines" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">American Van Lines</div>
                            {{-- <div class="route">Demopolis, AL → Kendall West, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 2 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$3,077</div>
                            <a href="https://mymovingjourney.com/contact-mover/american-van-lines"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>

                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Container
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/1-800-pack-rat.webp"
                                    alt="1-800 Pack Rat" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">1-800 Pack Rat</div>
                            {{-- <div class="route">Brantley, AL → Sarasota Springs, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 2 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$1,642</div>
                            <a href="https://mymovingjourney.com/contact-mover/1-800-pack-rat" class="btn btn-quote ">Get
                                a Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/roadway-relocation.png"
                                    alt="Roadway Relocation" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">Roadway Relocation</div>
                            {{-- <div class="route">Clayton, AL → Meadow Woods, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 2 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$2,542</div>
                            <a href="https://mymovingjourney.com/contact-mover/roadway-relocation"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/blvd-moving-best-moving-company.webp"
                                    alt="Blvd Moving" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">Blvd Moving</div>
                            {{-- <div class="route">Union Springs, AL → Golden Beach, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 3 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$5,340</div>
                            <a href="https://mymovingjourney.com/contact-mover/blvd-moving" class="btn btn-quote ">Get a
                                Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/mayzlin-relocation-llc.svg"
                                    alt="Mayzlin Relocation" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">Mayzlin Relocation</div>
                            {{-- <div class="route">Pell City, AL → Astatula, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 2 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 12, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$3,077</div>
                            <a href="https://mymovingjourney.com/contact-mover/american-van-lines"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/allied-van-lines.jpg"
                                    alt="Allied Van Lines" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">Allied Van Lines</div>
                            {{-- <div class="route">Cardiff, AL, AL → The Villages, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 3 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 15, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$3,977</div>
                            <a href="https://mymovingjourney.com/contact-mover/allied-van-lines"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>
                    <div class="estimate-card">
                        <div class="company-logo-section">
                            <span class="badge-professional">
                                <i class="bi bi-people"></i> Professional
                            </span>
                            <div class="ps-lg-4">
                                <img src="https://mymovingjourney.com/companies/image/united-van-lines.webp"
                                    alt="United Van Lines" class="company-logo">
                            </div>
                        </div>

                        <div class="move-details">
                            <div class="company-name">United Van Lines</div>
                            {{-- <div class="route">Sylvan Springs, AL → Patrick AFB, FL</div> --}}
                            <div class="move-info">
                                <span><i class="bi bi-house-door"></i> 3 Bedrooms</span>
                                {{-- <span><i class="bi bi-calendar"></i> Oct 15, 2025</span> --}}
                            </div>
                        </div>

                        <div class="price-section">
                            <div class="price">$3,577</div>
                            <a href="https://mymovingjourney.com/contact-mover/united-van-lines"
                                class="btn btn-quote ">Get a Quote</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <h2>Best Local Moving Companies in {{ $cityToStateRoute->cityFrom->name }},
            {{ $cityToStateRoute->cityFrom->state->abv }}</h2>
        @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
            <p>Here are the best local moving companies that can handle your move to
                {{ $cityToStateRoute->stateTo->name }}.</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
            <p>Explore the best local moving companies equipped to handle your relocation to
                {{ $cityToStateRoute->stateTo->name }}.</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
            <p>Here are the leading nearby movers equipped to manage your move to {{ $cityToStateRoute->stateTo->name }}.
            </p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
            <p>Find the leading local movers ready to handle your move to {{ $cityToStateRoute->cityFrom->name }} that can
                help make your relocation to {{ $cityToStateRoute->stateTo->name }} smooth and stress-free..</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
            <p>Check out these trusted local moving companies in <b>{{ $cityToStateRoute->stateTo->name }}</b>.</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
            <p>Check out the top local movers who can assist with your move to {{ $cityToStateRoute->stateTo->name }}.</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
            <p>Check out the top local moving companies that can assist with your relocation to
                {{ $cityToStateRoute->stateTo->name }}.</p>
        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
            <p>Check out the top local moving companies that can help with your move to
                <b>{{ $cityToStateRoute->stateTo->name }}</b>.
            </p>
        @endif

        <ul class="criteria_list">
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
                <li class="criteria_item">
                    <div class="check-icon">
                        <svg viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span> <b>{{ $moverlist->company_name }} :</b> {{ $rounded }} out of 5 stars
                    </span>
                </li>
            @endforeach
        </ul>
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

                $total_rating = $localMover->users->where('user_email_verified', 1)->sum(function ($user) {
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
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <a href="{{ route('company.show', $localMover->slug) }}" class="order-sm-0 order-1">
                        <h2 class="my-0">{{ $localMover->company_name }}</h2>
                        <ul class="d-flex align-items-center rating_stars list-unstyled mb-0 me-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($rounded >= $i)
                                    <li><i class="fas fa-star" aria-hidden="true"
                                            style="font-size:28px; color:#E3780D"></i></li>
                                @elseif ($rounded > $i - 1)
                                    <li><i class="fa fa-star-half-stroke" aria-hidden="true"
                                            style="font-size:28px; color:#E3780D"></i></li>
                                @else
                                    <li><i class="far fa-star" aria-hidden="true"
                                            style="font-size:28px; color:#E3780D"></i></li>
                                @endif
                            @endfor
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
                {{-- <p>{{ $localMover->about_company ?? 'Not Provided' }}</p> --}}
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
                                data-bs-toggle="collapse" data-bs-target="#collapseInfo{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseInfo{{ $localMover->id }}"> Company
                                Info</button></h2>
                        <div id="collapseInfo{{ $localMover->id }}" class="accordion-collapse collapse"
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
                                            <div class="info-item">
                                                <div class="info-icon">➜</div>
                                                <p><strong>Dot # :</strong>{{ $localMover->us_dot_no ?? 'Not Provided' }}
                                                </p>
                                            </div>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseService{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseService{{ $localMover->id }}">Services
                                Offered</button></h2>
                        <div id="collapseService{{ $localMover->id }}" class="accordion-collapse collapse"
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
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseCost{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseCost{{ $localMover->id }}"> Average
                                Cost</button></h2>
                        <div id="collapseCost{{ $localMover->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <p>We found out that United American Moving & Storage determines its prices on various
                                    parameters, including the total weight of all your items and how far you are moving. The
                                    average cost of moving with United American Moving and Storage is usually
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
                                data-bs-toggle="collapse" data-bs-target="#collapseOperation{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseOperation{{ $localMover->id }}"> States
                                Of Opertation </button></h2>
                        <div id="collapseOperation{{ $localMover->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <div class="info-card">
                                    @foreach ($usersUnique as $user)
                                        @php
                                            $stateSlug = $user->pickState->slug;
                                            $moversPath = in_array($stateSlug, [
                                                'district-of-columbia',
                                                'hawaii',
                                                'alaska',
                                            ])
                                                ? 'movers-list'
                                                : 'movers';
                                        @endphp
                                        <div class="info-item">
                                            <div class="info-icon">➜</div>
                                            <p><a
                                                    href="https://mymovingjourney.com/{{ $moversPath }}/{{ $user->pickState->slug }}"><strong>{{ $user->pickState->name }}</strong></a>
                                            </p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <section>
            <section class="featured-partners pb-5">
                <div class="container">
                    <h2>Specialty Movers in {{ $cityToStateRoute->cityFrom->name }},
                        {{ $cityToStateRoute->cityFrom->state->abv }}</h2>
                    @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
                        <p>Here’s a quick view of the moving companies in {{ $cityToStateRoute->cityFrom->name }} that
                            offer specialty services.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
                        <p>Take a quick look at {{ $cityToStateRoute->cityFrom->name }} moving companies providing
                            specialized services for your relocation needs.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
                        <p>Take a quick look at {{ $cityToStateRoute->cityFrom->name }} moving companies that provide
                            specialized moving services.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
                        <p>Below’s a quick look at {{ $cityToStateRoute->cityFrom->name }} moving companies that provide
                            special moving services.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
                        <p>Take a look at these moving companies in {{ $cityToStateRoute->cityFrom->name }} that provide
                            specialized services for your unique needs.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
                        <p>Here’s an overview of moving companies in {{ $cityToStateRoute->cityFrom->name }} that provide
                            specialized services.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
                        <p>Take a look at the moving companies in {{ $cityToStateRoute->cityFrom->name }} that offer
                            specialty services.</p>
                    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
                        <p>Take a look at the moving companies in {{ $cityToStateRoute->cityFrom->name }} that provide
                            specialized services.</p>
                    @endif



                    <div class="Featured_Partners mt-4">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="partner-card
                                    active  ">

                                    <div class="company_logo">
                                        <img src="https://mymovingjourney.com/companies/image/international-van-lines.webp"
                                            alt="international-van-lines-logo" class="img-fluid" loading="lazy">
                                    </div>
                                    <div class="partner-header d-flex align-items-center justify-content-center">

                                        <h5 class="company_name">International Van Lines</h5>
                                    </div>

                                    <!--<hr class="mt-2">-->
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                        <span class="rating"
                                            style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.5
                                            out of 5</span>
                                    </div>
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                        <ul class="d-flex list-unstyled mb-0 ms-1">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                        </ul>
                                    </div>

                                    <!--<hr>-->
                                    <div class="partner-info">
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13"
                                                height="13">International
                                            Coverage</p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">Storage
                                            Included</p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">Awarded
                                            Excellence
                                        </p>
                                    </div>
                                    <a href="https://mymovingjourney.com/mover/international-van-lines">
                                        <div class="phone-box mb-1 mt-3">
                                            Get Free Estimates
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="partner-card
                                    ">

                                    <div class="company_logo">
                                        <img src="https://mymovingjourney.com/companies/image/american-van-lines.webp"
                                            alt="american-van-lines-logo" class="img-fluid" loading="lazy">
                                    </div>
                                    <div class="partner-header d-flex align-items-center justify-content-center">

                                        <h5 class="company_name">American Van Lines</h5>
                                    </div>

                                    <!--<hr class="mt-2">-->
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                        <span class="rating"
                                            style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.2
                                            out of 5</span>
                                    </div>
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                        <ul class="d-flex list-unstyled mb-0 ms-1">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                        </ul>
                                    </div>

                                    <!--<hr>-->
                                    <div class="partner-info">
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13"
                                                height="13">Cross-Country
                                            Moves</p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">Flat-Rate
                                            Pricing</p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">Specialty
                                            Item
                                            Care
                                        </p>
                                    </div>
                                    <a href="https://mymovingjourney.com/mover/american-van-lines">
                                        <div class="phone-box mb-1 mt-3">
                                            Get Free Estimates
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="partner-card
                                    ">

                                    <div class="company_logo">
                                        <img src="https://mymovingjourney.com/companies/image/safeway-moving-inc.webp"
                                            alt="safeway-moving-inc-logo" class="img-fluid" loading="lazy">
                                    </div>
                                    <div class="partner-header d-flex align-items-center justify-content-center">

                                        <h5 class="company_name">Safeway Moving Inc</h5>
                                    </div>

                                    <!--<hr class="mt-2">-->
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                        <span class="rating"
                                            style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">4.7
                                            out of 5</span>
                                    </div>
                                    <div
                                        class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                        <ul class="d-flex list-unstyled mb-0 ms-1">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-stroke" aria-hidden="true"></i>
                                            {{-- <i class="far fa-star" aria-hidden="true"></i> --}}
                                        </ul>
                                    </div>

                                    <!--<hr>-->
                                    <div class="partner-info">
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">24/7
                                            Support
                                        </p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">GPS
                                            Tracking
                                        </p>
                                        <p><img src="https://mymovingjourney.com/assets/img/check-mark.png" class="me-2"
                                                alt="check-mark" loading="lazy" width="13" height="13">Trained
                                            Packing Staff
                                        </p>
                                    </div>
                                    <a href="https://mymovingjourney.com/mover/safeway-moving-inc">
                                        <div class="phone-box mb-1 mt-3">
                                            Get Free Estimates
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="services-container" style="max-width: 720px !important; margin: 0 auto !important;">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-blue">
                                        <i class="fas fa-truck-moving"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">Interstate</div>
                                        <div class="service-number">8 <span class="service-percentage">100.0%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-green">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">Small moves</div>
                                        <div class="service-number">1 <span class="service-percentage">12.5%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-purple">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">Antiques</div>
                                        <div class="service-number">3 <span class="service-percentage">37.5%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-orange">
                                        <i class="fas fa-palette"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">Art</div>
                                        <div class="service-number">2 <span class="service-percentage">25.0%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-pink">
                                        <i class="fas fa-music"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">pianos</div>
                                        <div class="service-number">1 <span class="service-percentage">12.5%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="service-card">
                                <div class="d-flex align-items-center">
                                    <div class="icon-wrapper icon-teal">
                                        <i class="fas fa-wine-glass"></i>
                                    </div>
                                    <div class="ms-3">
                                        <div class="service-title">Fragile-only packing</div>
                                        <div class="service-number">1 <span class="service-percentage">12.5%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            {{-- <div class="content-wrapper">
                <div class="col-12 col-lg-8 mx-auto my-5">
                    <div class="form_wrapper">
                        <form action="" class=" main_banner_form">
                            <h2 class="mt-0 mb-2 text-center">Find movers in your area</h2>
                            <p class="text-center">Easily compare personalized moving quotes for your
                                {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }}
                                to {{ $cityToStateRoute->stateTo->name }}
                                move.
                                For that, use our free and instant moving cost
                                calculator.
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
                                    <a id="movingCostCalculatorLink"
                                        href="https://mymovingjourney.com/moving-cost-calculator" class="quote-btn">Open
                                        Moving Cost
                                        Calculator</a>
                                </div>
                                <div class="movers-list mt-5" id="moversList">
                                    <!-- Movers will be dynamically loaded here -->
                                </div>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <p class="footer-text">Expert moving advice provided by <strong>MyMovingjourney</strong>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </section>

        <section class="state_Route_bottom_content">
            <h2>Key Details to Know Before Your Move from {{ $cityToStateRoute->cityFrom->name }},
                {{ $cityToStateRoute->cityFrom->state->abv }} to
                {{ $cityToStateRoute->stateTo->name }}</h2>

            @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
                <p>Moving to {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }} is a
                    big step. Keeping in mind a few key things before you go can help make the move easier.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
                <p>Moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} is a
                    major transition. Focusing on key details beforehand can make the entire relocation process smoother and
                    more manageable.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
                <p>Moving to {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }} is a
                    big step. Keeping in mind a few key things before you go can help make the move easier.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
                <p>Relocating from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} is
                    a major change. Remembering a few key details beforehand can make your move smoother.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
                <p>Relocating from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} is
                    a significant change. Keeping a few essential points in mind beforehand can help make your move
                    smoother.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
                <p>Relocating to {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }} is
                    a significant change. Keeping a few essential details in mind can help simplify the process.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
                <p>Relocating from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} is
                    a significant transition. Keeping a few important details in mind ahead of time can help make the
                    process smoother.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
                <p>Relocating to {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }} is
                    a big change. Keeping a few important details in mind beforehand can make the process smoother.</p>
            @endif
            @php
                $cost_metric_map = [
                    'average_rent_cost' => 'Average rent',
                    'average_home_cost' => 'Average home cost',
                    'average_income_per_capita' => 'Average income (per capita)',
                    'cost_of_living_index' => 'Cost of living index',
                    'unemployment_rate' => 'Unemployment rate',
                    'state_income_tax' => 'State income tax',
                ];
                $city_key_override = [
                    'average_rent_cost' => 'avg_rent_cost',
                    'average_home_cost' => 'avg_home_cost',
                    'average_income_per_capita' => 'avg_income',
                ];
                $has_cost_data = false;
                foreach (array_keys($cost_metric_map) as $key) {
                    $from_data = $city_cost_of_living->{$key} ?? '-';
                    $city_key = $city_key_override[$key] ?? $key;
                    $to_data = $to_state_cost_of_living->{$city_key} ?? '-';
                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_cost_data = true;
                        break;
                    }
                }
            @endphp
            <h5>Cost of living </h5>
            @if ($has_cost_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToStateRoute->cityFrom->name ?? 'City From' }}</th>
                                <th>{{ $cityToStateRoute->stateTo->name ?? 'State To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost_metric_map as $key => $metric_name)
                                @php
                                    $city_key = $city_key_override[$key] ?? $key;
                                    $from_value = $city_cost_of_living->{$city_key} ?? '-';
                                    $to_value = $to_state_cost_of_living->{$key} ?? '-';
                                @endphp
                                @if ($from_value !== '-' || $to_value !== '-')
                                    <tr>
                                        <td>{{ $metric_name }}</td>
                                        <td>{{ str_replace('º', '°', $from_value) }}</td>
                                        <td>{{ $to_value }}</td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <td>Sources</td>
                                <td colspan="2">
                                    <p>

                                        <a href="https://worldpopulationreview.com/state-rankings/average-rent-by-state"
                                            target="_blank"><b><u>World
                                                    Population Review</u></b></a>,
                                        <a href="https://www.zillow.com/home-values/102001/united-states/"
                                            target="_blank"><b><u>Zillow</u></b></a>,
                                        <a href="https://www.census.gov/quickfacts/fact/table/US/PST045221"
                                            target="_blank"><b><u>US
                                                    Census Bureau</u></b></a>,
                                        <a href="https://www.bls.gov/lau/" target="_blank"><b><u>US BLS</u></b></a>,
                                        <a href="https://taxfoundation.org/2022-sales-taxes/" target="_blank"><b><u>Tax
                                                    Foundation</u></b></a>,
                                        <a href="https://www.zumper.com/rent-research"
                                            target="_blank"><b><u>Zumper</u></b></a>,
                                        <a href="https://www.numbeo.com/cost-of-living/"
                                            target="_blank"><b><u>Numbeo</u></b></a>

                                    </p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif

            @php
                $metric_map = [
                    'population' => 'Population',
                    'political_leaning' => 'Political leaning',
                    'summer_high' => 'Summer high (avg.)',
                    'winter_low' => 'Winter low (avg.)',
                    'annual_rain' => 'Annual rain',
                    'annual_snow' => 'Annual snow',
                    'crime_index' => 'Crime index',
                ];
                $city_key_override = [
                    'annual_rain' => 'annual_rainfall',
                    'annual_snow' => 'annual_snowfall',
                ];
                $has_data = false;
                foreach (array_keys($metric_map) as $key) {
                    $city_key = $city_key_override[$key] ?? $key;
                    $from_data = $city_life_style->{$city_key} ?? '-';
                    $to_data = $to_state_life_style->{$key} ?? '-';
                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_data = true;
                        break;
                    }
                }
            @endphp
            <h5>Life in {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} vs.
                {{ $cityToStateRoute->stateTo->name }}</h5>
            @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
                <p>If you’re planning to move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}, there are a few lifestyle changes you’ll want to know about.
                </p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
                <p>If you’re preparing to relocate from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}, it’s important to understand a few lifestyle differences.
                    Knowing them beforehand will help you adjust smoothly.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
                <p>If you’re getting ready to relocate from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}, it’s helpful to learn about a few lifestyle differences
                    beforehand.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
                <p>If you’re preparing to relocate from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}, it’s helpful to learn about a few lifestyle differences in
                    advance.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
                <p>When moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }},
                    you’ll encounter several lifestyle differences to keep in mind.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
                <p>When moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?
                    Here are some lifestyle changes you’ll want to be aware of.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
                <p>While considering a move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}, there are a few lifestyle differences you'll want to be aware
                    of.</p>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
                <p>Planning your move from {{ $cityToStateRoute->cityFrom->name }} to
                    {{ $cityToStateRoute->stateTo->name }}? There are a few lifestyle changes you’ll want to keep in mind.
                </p>
            @endif
            @if ($has_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToStateRoute->cityFrom->name ?? 'City From' }}</th>
                                <th>{{ $cityToStateRoute->stateTo->name ?? 'State To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metric_map as $key => $metric_name)
                                @php
                                    $city_key = $city_key_override[$key] ?? $key;
                                    $from_value = $city_life_style->{$city_key} ?? '-';
                                    $to_value = $to_state_life_style->{$key} ?? '-';
                                @endphp
                                @if ($from_value !== '-' || $to_value !== '-')
                                    <tr>
                                        <td>{{ $metric_name }}</td>
                                        <td>{{ str_replace('º', '°', $from_value) }}</td>
                                        <td>{{ str_replace('º', '°', $to_value) }}</td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr>
                                <td>Sources</td>
                                <td colspan="2">
                                    <p>

                                        <a href="https://www.census.gov/quickfacts/fact/table/US/PST045221"
                                            target="_blank"><b><u>U.S.
                                                    Census Bureau</u></b></a>,
                                        <a href="https://www.270towin.com/2020-election-results-live/"
                                            target="_blank"><b><u>270TOWIN</u></b></a>,
                                        <a href="https://www.neighborhoodscout.com/" target="_blank"><b><u>Neighborhood
                                                    Scout</u></b></a>,
                                        <a href="https://www.bestplaces.net/climate/" target="_blank"><b><u>Best
                                                    Places Wikipedia</u></b></a>,
                                        <a href="https://alltransit.cnt.org/rankings/"
                                            target="_blank"><b><u>AllTransit</u></b></a>,
                                        <a href="https://www.walkscore.com/cities-and-neighborhoods/"
                                            target="_blank"><b><u>Walk Score</u></b></a>,
                                        <a href="https://www.neighborhoodscout.com/"
                                            target="_blank"><b><u>NeighborhoodScout</u></b></a>,
                                        <a href="https://www.airnow.gov/aqi/aqi-basics/"
                                            target="_blank"><b><u>AirNow</u></b></a>,

                                    </p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        <section>
            <h2>What You’ll Find in {{ $cityToStateRoute->stateTo->name }}</h2>

            @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Crystal Bridges Museum of American Art</li>
                    <li class="mt-2">Mid-America Science Museum</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Fine Arts</li>
                    <li class="mt-2">The Walmart Museum</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Hot Springs National Park</li>
                    <li class="mt-2">Pinnacle Mountain State Park</li>
                    <li class="mt-2">Petit Jean State Park</li>
                    <li class="mt-2">Mount Magazine State Park</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Razorbacks – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Travelers – Minor League Baseball (Little
                        Rock)</li>
                    <li class="mt-2">Northwest {{ $cityToStateRoute->stateTo->name }} Naturals – Minor League Baseball
                        (Springdale)
                    </li>
                    <li class="mt-2">Little Rock Rangers – Soccer team (NPSL)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} State University</li>
                    <li class="mt-2">University of Central {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Hendrix College</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Natural History</li>
                    <li class="mt-2">Paul W. Bryant Museum</li>
                    <li class="mt-2">Rosa Parks Museum</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Sports Hall of Fame</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Oak Mountain State Park</li>
                    <li class="mt-2">Joe Wheeler State Park</li>
                    <li class="mt-2">Rickwood Caverns State Park</li>
                    <li class="mt-2">Cheaha State Park</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>

                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Auburn Tigers – Auburn University (NCAA)</li>
                    <li class="mt-2">Birmingham Barons – Minor League Baseball (Birmingham)</li>
                    <li class="mt-2">Birmingham Legion FC – Soccer team (USL Championship)</li>
                </ul>
                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }} at Birmingham</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} State University</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">U.S. Space & Rocket Center</li>
                    <li class="mt-2">Montgomery Museum of Fine Arts</li>
                    <li class="mt-2">Rosa Parks Museum</li>
                    <li class="mt-2">Moundville Archaeological Park Museum</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Little River Canyon National Preserve</li>
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Lake Guntersville State Park</li>
                    <li class="mt-2">DeSoto State Park</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Troy Trojans – Troy University (NCAA)</li>
                    <li class="mt-2">Huntsville Havoc – Professional Ice Hockey (SPHL)</li>
                    <li class="mt-2">Rocket City Trash Pandas – Minor League Baseball (Madison)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Troy University</li>
                    <li class="mt-2">University of South {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Samford University</li>
                    <li class="mt-2">Jacksonville State University</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Mobile Museum of Art</li>
                    <li class="mt-2">Vulcan Park and Museum</li>
                    <li class="mt-2">Museum of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Berman Museum</li>
                </ul>
                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Cathedral Caverns State Park</li>
                    <li class="mt-2">Tannehill Ironworks Historical State Park</li>
                    <li class="mt-2">Wind Creek State Park</li>
                    <li class="mt-2">Frank Jackson State Park</li>
                </ul>
                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Samford Bulldogs – Samford University (NCAA)</li>
                    <li class="mt-2">Jacksonville State Gamecocks – Jacksonville State University (NCAA)</li>
                    <li class="mt-2">Huntsville Havoc – Ice Hockey (SPHL)</li>
                    <li class="mt-2">Montgomery Biscuits – Minor League Baseball (Montgomery)</li>
                </ul>
                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of North {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Huntingdon College</li>
                    <li class="mt-2">Miles College</li>
                    <li class="mt-2">Spring Hill College</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Natural History</li>
                    <li class="mt-2">Birmingham Museum of Art</li>
                    <li class="mt-2">Montgomery Museum of Fine Arts</li>
                    <li class="mt-2">The Civil Rights Memorial Center</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Gulf State Park</li>
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Oak Mountain State Park</li>
                    <li class="mt-2">Little River Canyon National Preserve</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Auburn Tigers – Auburn University (NCAA)</li>
                    <li class="mt-2">Birmingham Legion FC – Soccer (USL Championship)</li>
                    <li class="mt-2">Mobile BayBears – Minor League Baseball (Mobile)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }} at Birmingham (UAB)</li>
                    <li class="mt-2">Samford University</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">USS {{ $cityToStateRoute->stateTo->name }} Battleship Memorial Park</li>
                    <li class="mt-2">U.S. Space & Rocket Center</li>
                    <li class="mt-2">Birmingham Museum of Art</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Natural History</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Wind Creek State Park</li>
                    <li class="mt-2">Joe Wheeler State Park</li>
                    <li class="mt-2">Little River Canyon National Preserve</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Birmingham Barons – Minor League Baseball (Birmingham)</li>
                    <li class="mt-2">Rocket City Trash Pandas – Minor League Baseball (Madison/Huntsville)</li>
                    <li class="mt-2">South {{ $cityToStateRoute->stateTo->name }} Jaguars – University of South
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of South {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">University of North {{ $cityToStateRoute->stateTo->name }}</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Birmingham Museum of Art</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Natural History</li>
                    <li class="mt-2">Montgomery Museum of Fine Arts</li>
                    <li class="mt-2">The Civil Rights Memorial Center</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Gulf State Park</li>
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Monte Sano State Park</li>
                    <li class="mt-2">Wind Creek State Park</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Auburn Tigers – Auburn University (NCAA)</li>
                    <li class="mt-2">Birmingham Barons – Minor League Baseball (Birmingham)</li>
                    <li class="mt-2">Birmingham Legion FC – Soccer Team (USL)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }} at Birmingham</li>
                    <li class="mt-2">University of South {{ $cityToStateRoute->stateTo->name }}</li>
                </ul>
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Birmingham Museum of Art</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Museum of Natural History</li>
                    <li class="mt-2">Montgomery Museum of Fine Arts</li>
                    <li class="mt-2">The Civil Rights Memorial Center</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Gulf State Park</li>
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Monte Sano State Park</li>
                    <li class="mt-2">Wind Creek State Park</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Auburn Tigers – Auburn University (NCAA)</li>
                    <li class="mt-2">Birmingham Barons – Minor League Baseball (Birmingham)</li>
                    <li class="mt-2">Birmingham Legion FC – Soccer Team (USL)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }} at Birmingham</li>
                    <li class="mt-2">University of South {{ $cityToStateRoute->stateTo->name }}</li>
                </ul>
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
                <h5>Museums in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Birmingham Museum of Art</li>
                    <li class="mt-2">Montgomery Museum of Fine Arts</li>
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} State Capitol Museum</li>
                    <li class="mt-2">The Civil Rights Memorial Center</li>
                </ul>

                <h5>Parks in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">Gulf Shores National Park</li>
                    <li class="mt-2">Cheaha State Park</li>
                    <li class="mt-2">Monte Sano State Park</li>
                    <li class="mt-2">Tuskegee National Forest</li>
                </ul>

                <h5>Sports Teams in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">{{ $cityToStateRoute->stateTo->name }} Crimson Tide – University of
                        {{ $cityToStateRoute->stateTo->name }} (NCAA)</li>
                    <li class="mt-2">Auburn Tigers – Auburn University (NCAA)</li>
                    <li class="mt-2">Birmingham Barons – Minor League Baseball (Birmingham)</li>
                    <li class="mt-2">Birmingham Legion FC – Soccer team (USL)</li>
                </ul>

                <h5>Universities in {{ $cityToStateRoute->stateTo->name }}</h5>
                <ul class="find-ul">
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }}</li>
                    <li class="mt-2">Auburn University</li>
                    <li class="mt-2">University of {{ $cityToStateRoute->stateTo->name }} at Birmingham</li>
                    <li class="mt-2">Troy University</li>
                </ul>
            @endif
        </section>

        <div class="faq-section mt-5">
            <h2>Frequently Asked Questions</h2>

            @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template1_alabama')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template2_california')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template3_colorado')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template4_florida')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template5_massachusetts')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template6_michigan')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template7_texas')
            @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
                @include('frontend.company_auth.route_pages.city_to_state_route_faqs.template8_washington')
            @endif
        </div>
    </div>

    <div id="moveData" data-city-from="{{ $cityToStateRoute->cityFrom->name ?? '' }}"
        data-state-to="{{ $cityToStateRoute->stateTo->name ?? '' }}"
        data-state-abv="{{ $cityToStateRoute->cityFrom->state->abv ?? '' }}">
    </div>


    <script>
        // Initialize global validation variables to prevent modal form validation errors
        window.validZipFrom = false;
        window.validZipTo = false;
        window.zipFromData = null;
        window.zipToData = null;

        // Override modal form validation to accept manual input
        document.addEventListener('DOMContentLoaded', function() {
            // Wait for modal form to be available
            setTimeout(function() {
                const modalForm = document.getElementById('modalRegisterForm');
                if (modalForm) {
                    // Remove existing submit event listeners and add our own
                    modalForm.addEventListener('submit', function(e) {
                        // Get current values from modal form
                        const zipFrom = document.getElementById('zipfromsearch');
                        const zipTo = document.getElementById('ziptosearch');

                        // If fields have values but validation flags are false, set them to true
                        if (zipFrom && zipFrom.value.trim() && !window.validZipFrom) {
                            window.validZipFrom = true;
                            window.zipFromData = {
                                value: zipFrom.value.trim(),
                                city: zipFrom.value.trim(),
                                state: 'US',
                                label: zipFrom.value.trim()
                            };
                        }

                        if (zipTo && zipTo.value.trim() && !window.validZipTo) {
                            window.validZipTo = true;
                            window.zipToData = {
                                value: zipTo.value.trim(),
                                city: zipTo.value.trim(),
                                state: 'US',
                                label: zipTo.value.trim()
                            };
                        }
                    }, true); // Use capture phase to run before other handlers
                }
            }, 1000);
        });

        // Script to populate modal form fields when Start Calculation button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            // Get the Start Calculation button
            const startCalculationBtn = document.querySelector('a[href="#ModalForm"]');

            if (startCalculationBtn) {
                startCalculationBtn.addEventListener('click', function() {
                    // Get values from both external and bottom forms
                    let movingFromValue = '';
                    let movingToValue = '';

                    // Try to get values from external form first
                    const externalFrom = document.getElementById('external_zipfrom');
                    const externalTo = document.getElementById('external_ziptosearch');

                    if (externalFrom && externalFrom.value.trim()) {
                        movingFromValue = externalFrom.value.trim();
                    }
                    if (externalTo && externalTo.value.trim()) {
                        movingToValue = externalTo.value.trim();
                    }

                    // If external form is empty, try bottom form
                    if (!movingFromValue || !movingToValue) {
                        const bottomFrom = document.getElementById('bottom_zipfrom');
                        const bottomTo = document.getElementById('bottom_ziptosearch');

                        if (bottomFrom && bottomFrom.value.trim() && !movingFromValue) {
                            movingFromValue = bottomFrom.value.trim();
                        }
                        if (bottomTo && bottomTo.value.trim() && !movingToValue) {
                            movingToValue = bottomTo.value.trim();
                        }
                    }

                    // Set a small delay to ensure modal is fully opened
                    setTimeout(function() {
                        // Populate modal form fields
                        const modalZipFrom = document.getElementById('zipfromsearch');
                        const modalZipTo = document.getElementById('ziptosearch');

                        if (modalZipFrom && movingFromValue) {
                            modalZipFrom.value = movingFromValue;
                            // Set data-valid attribute to bypass Google Places validation
                            modalZipFrom.setAttribute('data-valid', 'true');

                            // Set global validation flags that the modal form checks
                            window.validZipFrom = true;
                            window.zipFromData = {
                                value: movingFromValue,
                                city: movingFromValue,
                                state: 'US',
                                label: movingFromValue
                            };

                            // Trigger change event to update any validation or calculations
                            modalZipFrom.dispatchEvent(new Event('change'));
                            modalZipFrom.dispatchEvent(new Event('blur'));
                        }

                        if (modalZipTo && movingToValue) {
                            modalZipTo.value = movingToValue;
                            // Set data-valid attribute to bypass Google Places validation
                            modalZipTo.setAttribute('data-valid', 'true');

                            // Set global validation flags that the modal form checks
                            window.validZipTo = true;
                            window.zipToData = {
                                value: movingToValue,
                                city: movingToValue,
                                state: 'US',
                                label: movingToValue
                            };

                            // Trigger change event to update any validation or calculations
                            modalZipTo.dispatchEvent(new Event('change'));
                            modalZipTo.dispatchEvent(new Event('blur'));
                        }

                        // Enable the next button if both fields are populated
                        if (movingFromValue && movingToValue) {
                            const nextBtn = document.getElementById('modalNextBtn');
                            if (nextBtn) {
                                nextBtn.disabled = false;
                            }
                        }

                        // Trigger distance calculation if both values are present
                        if (movingFromValue && movingToValue &&
                            typeof updateModalDistanceAndCost === 'function') {
                            updateModalDistanceAndCost();
                        }
                    }, 300);
                });
            }
        });
    </script>

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
        }, {
            name: 'Safeway Moving',
            logo: '{{ asset('assets/img/mover-logo-2.png') }}',
            rating: 4.0,
            featured: false,
            link: 'https://mymovingjourney.com/moving-cost-calculator'
        }, {
            name: 'BLVD Moving',
            logo: '{{ asset('assets/img/mover-logo-3.png') }}',
            rating: 4.0,
            featured: false,
            link: 'https://mymovingjourney.com/moving-cost-calculator'
        }, {
            name: 'Allied Van Lines',
            logo: '{{ asset('assets/img/mover-logo-4.png') }}',
            rating: 4.0,
            featured: false,
            link: 'https://mymovingjourney.com/moving-cost-calculator'
        }];
        findMoversBtn.addEventListener('click', function() {
            const fromValue = movingFromInput.value.trim();
            const toValue = movingToInput.value.trim();

            // Simple validation - just check if fields have any text
            if (!fromValue) {
                alert('Please enter a starting location');
                movingFromInput.focus();
                return;
            }

            if (!toValue) {
                alert('Please enter a destination');
                movingToInput.focus();
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
            }, 1500);
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
                    <a href="${mover.link}" class="quote-btn specific_c">Get Quote</a>
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
        const moverItems = document.querySelectorAll('.mover-item');
        const contents = document.querySelectorAll('.mover-content');

        moverItems.forEach(item => {
            item.addEventListener('click', () => {
                moverItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');

                const target = item.getAttribute('data-target');
                contents.forEach(c => {
                    c.classList.remove('active');
                    if (c.id === target) c.classList.add('active');
                });
            });
        });
    </script>

    <script>
        const scrollArea = document.getElementById('scrollArea');
        const shadowTop = document.querySelector('.scroll-shadow-top');
        const shadowBottom = document.querySelector('.scroll-shadow-bottom');

        function updateShadows() {
            const scrollTop = scrollArea.scrollTop;
            const scrollHeight = scrollArea.scrollHeight;
            const clientHeight = scrollArea.clientHeight;

            // show top shadow only if scrolled down
            shadowTop.style.opacity = scrollTop > 0 ? 1 : 0;

            // show bottom shadow only if not at end
            shadowBottom.style.opacity = scrollTop + clientHeight < scrollHeight - 1 ? 1 : 0;
        }

        scrollArea.addEventListener('scroll', updateShadows);
        window.addEventListener('load', updateShadows);
    </script>

    @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Looking for reliable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Get the best moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and tips to make your move stress-free."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Find trusted movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving services from {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and useful expert tips for a stress-free move."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Need trusted movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and helpful tips for an easy, stress-free move."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
       <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Find reliable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get professional moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and useful tips for a hassle-free relocation."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Find trusted movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}. Get quality moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and useful tips for a smooth, hassle-free relocation."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Need dependable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Enjoy top-notch moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }}, along with helpful tips for an easy move."
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Need trusted movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find quality moving services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} and tips for a seamless, efficient moving experience."
            }
            </script>

        @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
            <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}{{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
                "url": "{{url()->current()}}",
                "description": "Need dependable movers from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Find top moving services at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }}, along with helpful tips to make your move smooth and easy."
            }
        </script>
    @endif

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com"
        }
    </script>

    <script type="application/ld+json" class="schema-cost">
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
                "name": "Popular Moving Routes",
                "item": "https://mymovingjourney.com/moving-routes"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "Popular Moving Routes from {{ $cityToStateRoute->cityFrom->name }}",
                "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($cityToStateRoute->cityFrom->state->abv) }}"
            },
            
            {
                "@type": "ListItem",
                "position": 4,
                "name": "Popular Moving Routes from {{ $cityToStateRoute->cityFrom->name }}",
                "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($cityToStateRoute->cityFrom->state->abv) }}/{{ $cityToStateRoute->cityFrom->slug }}"
            },
            {
                "@type": "ListItem",
                "position": 5,
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - {{ date('Y') }} Movers and Cost",
                "item": "{{url()->current()}}"
            }
            ]
        }
    </script>

    @if (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate1))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How much time does it usually take to relocate from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} take?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most moves from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} take about one to four days, depending on how much you’re moving, what kind of service you use (full-service vs DIY), and where exactly you’re going."
                }
                },
                {
                "@type": "Question",
                "name": "What does it cost to move from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The average cost to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} ranges from {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, like a studio or one-bedroom apartment, may cost around {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes can reach up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will the cost of living change much if I move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Not drastically, many living-cost elements remain similar. Still, some things like housing or taxes may shift a bit, so it’s smart to compare the specific cost items you care about."
                }
                },
                {
                "@type": "Question",
                "name": "What important steps do I need to take when moving to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "When you move to {{ $cityToStateRoute->stateTo->name }}, start by updating your address and setting up your new utilities. Next, get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter registration. It’s also a good idea to check local rules for taxes, schools, and healthcare options before you settle in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people choosing to move from {{ $cityToStateRoute->cityFrom->name }}, (or {{ $cityToStateRoute->cityFrom->state->name }}) to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many are moving because {{ $cityToStateRoute->stateTo->name }} offers more affordable housing, strong outdoor and lifestyle options, and job opportunities."
                }
                }
            ]
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long will the move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most relocations from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} take about three to five days. The timing varies based on how much you’re moving, the service type you select, and your exact destination."
                }
                },
                {
                "@type": "Question",
                "name": "How much does it usually cost to relocate from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "On average, moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} costs between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, such as studios or one-bedroom apartments, typically range from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes can cost as much as {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change much after moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Not significantly. Most living expenses stay fairly comparable, though housing and taxes may differ slightly. It’s wise to review specific costs that matter most to you."
                }
                },
                {
                "@type": "Question",
                "name": "What key steps should I follow when relocating to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "After arriving in {{ $cityToStateRoute->stateTo->name }}, update your address and set up utilities. Then obtain an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter information. Also, review local tax, school, and healthcare details to get settled smoothly."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people deciding to move from {{ $cityToStateRoute->cityFrom->name }}, (or {{ $cityToStateRoute->cityFrom->state->name }}) to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many choose to relocate because {{ $cityToStateRoute->stateTo->name }} provides affordable housing, great outdoor recreation, and solid employment opportunities."
                }
                }
            ]
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long does it usually take to relocate from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} typically takes between three and eight days. The duration depends on your shipment size, the moving service you select, and your final destination."
                }
                },
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The average cost of moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} ranges from {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, like studios or one-bedroom apartments, usually fall between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes can cost up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will the cost of living change much after moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Not significantly. Many everyday expenses remain comparable, though housing and taxes may vary slightly. It’s wise to check specific costs that are most relevant to your lifestyle."
                }
                },
                {
                "@type": "Question",
                "name": "What steps should you take when moving to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by updating your address and setting up utilities. Then get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update voter information. It’s also helpful to review local tax policies, schools, and healthcare options before settling in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many are relocating for {{ $cityToStateRoute->stateTo->name }}’s affordable housing, outdoor lifestyle, and growing job opportunities."
                }
                }
            ]
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long does it take to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} usually takes between one and two days. The exact timing depends on how much you’re moving, the type of service you choose, and your final destination."
                }
                },
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The average cost of moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} ranges from {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }} for. Smaller moves, such as studios or one-bedroom apartments, typically cost between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes can reach up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change much after moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Not significantly. Many everyday expenses remain similar, though housing and taxes may vary slightly. It’s a good idea to compare the specific costs that matter most to you before moving."
                }
                },
                {
                "@type": "Question",
                "name": "What key steps should I take when relocating to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "When you settle in {{ $cityToStateRoute->stateTo->name }}, start by updating your address and setting up utilities. Then get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter information. You should also review local rules for taxes, schools, and healthcare options to make your transition easier."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many people relocate because {{ $cityToStateRoute->stateTo->name }} offers affordable housing, great outdoor activities, and strong job opportunities."
                }
                }
            ]
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long does it take to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} typically takes anywhere from two to four days, depending on the amount of items being moved, the type of service chosen (full-service moving vs. DIY), and your exact destination within {{ $cityToStateRoute->stateTo->name }}."
                }
                },
                {
                "@type": "Question",
                "name": "What’s the cost of relocating from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cost of moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} generally falls between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, such as relocating a studio or one-bedroom apartment, can range from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes might cost up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change significantly when moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "While some aspects of the cost of living will remain fairly consistent, certain factors like housing and taxes may differ. It’s helpful to compare specific costs that matter most to you."
                }
                },
                {
                "@type": "Question",
                "name": "What are the key steps to take when relocating to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "When moving to {{ $cityToStateRoute->stateTo->name }}, make sure to update your address and set up utilities at your new home. You’ll also need to get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter registration. It’s a good idea to review local rules regarding taxes, education, and healthcare before settling in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people moving from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many individuals are choosing to relocate to {{ $cityToStateRoute->stateTo->name }} for its affordable housing, abundant outdoor activities, lifestyle options, and growing job opportunities."
                }
                }
            ]
            }
        </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long will the move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} take?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} usually takes between one to two days. The duration depends on the amount of belongings you're moving, the type of service you choose (full-service or DIY), and your specific destination."
                }
                },
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cost of moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} typically ranges from {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, such as a studio or one-bedroom apartment, usually cost between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes can go up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change significantly if I move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cost of living won’t vary drastically, as many factors remain similar. However, areas like housing and taxes may differ slightly, so it’s best to compare the specific costs that are most important to you."
                }
                },
                {
                "@type": "Question",
                "name": "What are the key steps I should take when moving to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "When moving to {{ $cityToStateRoute->stateTo->name }}, make sure to update your address and set up utilities in your new home. Then, get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your vehicle, and update your voter registration. It’s also advisable to review local taxes, schools, and healthcare options before settling in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people choosing to move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many people are drawn to {{ $cityToStateRoute->stateTo->name }} for its affordable housing, abundant outdoor activities, and job opportunities."
                }
                }
            ]
            }
                </script>

    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long does it take to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Typically, a move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }} takes anywhere from two to five days. The duration depends on the amount you're moving, the type of service you choose (full-service or DIY), and your exact destination."
                }
                },
                {
                "@type": "Question",
                "name": "What is the cost of relocating from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cost to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} usually falls between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, like a studio or one-bedroom apartment, tend to range from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while larger homes could go up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change if I relocate from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The change in living costs will not be significant. Most aspects of living expenses are quite similar. However, certain factors such as housing or taxes may vary, so it's advisable to compare the specific costs that matter most to you."
                }
                },
                {
                "@type": "Question",
                "name": "What essential tasks should I complete when moving to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by changing your address and setting up utilities for your new home. Then, update your driver's license, register your car, and update your voter registration. It's also a good idea to familiarize yourself with local tax regulations, school options, and healthcare services before settling in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people choosing to move to {{ $cityToStateRoute->cityFrom->name }}, (or {{ $cityToStateRoute->cityFrom->state->name }}) to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Many people are drawn to {{ $cityToStateRoute->stateTo->name }} for its affordable housing, ample outdoor activities, lifestyle opportunities, and job market."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($cityToStateRoute->cityFrom->state->slug, $statesTemplate8))
      <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How long will it take to move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "It usually takes about three to four days to move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}. The time depends on how much stuff you’re moving, whether you choose a full-service move or do it yourself, and where exactly you’re headed in {{ $cityToStateRoute->stateTo->name }}."
                }
                },
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $cityToStateRoute->stateTo->name }} from {{ $cityToStateRoute->cityFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The cost of moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} can range from {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} to {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Smaller moves, like for a studio or one-bedroom apartment, might cost between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, while moving larger homes can go up to {{ $calculatedCosts['bedrooms4']['company']['max_formatted'] ?? '$0' }}."
                }
                },
                {
                "@type": "Question",
                "name": "Will my cost of living change if I move from {{ $cityToStateRoute->cityFrom->name }} to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Not by much. Most of the living expenses stay about the same, but you might see some changes in housing costs or taxes. It’s a good idea to compare the specific things that matter most to you."
                }
                },
                {
                "@type": "Question",
                "name": "What should I do when moving to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Start by updating your address and setting up utilities. Then, get an {{ $cityToStateRoute->stateTo->name }} driver’s license, register your car, and update your voter registration. It’s also a good idea to look into local tax rules, schools, and healthcare options before you fully settle in."
                }
                },
                {
                "@type": "Question",
                "name": "Why are people moving from {{ $cityToStateRoute->cityFrom->name }}, (or {{ $cityToStateRoute->cityFrom->state->name }}) to {{ $cityToStateRoute->stateTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A lot of people are making the move because {{ $cityToStateRoute->stateTo->name }} offers affordable housing, lots of outdoor activities, and good job opportunities."
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
        "urlTemplate": "{{ url()->current() }}",
        "actionPlatform": [
            "https://schema.org/DesktopWebPlatform",
            "https://schema.org/MobileWebPlatform"
        ]
    },
    "object": {
        "@type": "ItemList",
        "name": "Best Moving Companies in USA",
        "itemListElement": [
        
           @foreach ($local_movers as $moverlist)
           @php
                        // If your query used withAvg/withCount aliases:
                        $preAvg = $moverlist->avg_rating ?? null; // may be null if not selected
                        $preCount = $moverlist->reviews_count ?? null; // may be null if not selected

                        $verified = collect(); // Initialize empty collection

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
                            $avg_rating = $total_reviews
                                ? $verified->map(fn($u) => (float) $u->overall_rating)->avg()
                                : 0;
                        }

                        $rounded = round((float) $avg_rating, 1);
                        
                        // Calculate min and max ratings
                        if ($total_reviews > 0) {
                            $max_rating = $moverlist->users->max('overall_rating') ?? 5;
                            $min_rating = $moverlist->users->min('overall_rating') ?? 1;
                        } else {
                            $max_rating = 5;
                            $min_rating = 1;
                        }
                    @endphp
            {
                "@type": "ListItem",
                "position": {{ $loop->iteration }},
                "item": {
                    "@type": "MovingCompany",
                    "name": "{{ $moverlist->company_name }}",
                    "url": "{{ route('company.show', $moverlist->slug) }}",
                    "logo": "{{ URL::to($moverlist->logo) }}",
                    "telephone": "{{ $moverlist->phone_no ?? '' }}",
                    "description": "See what people say about {{ $moverlist->company_name }}. Get honest reviews and ratings from real clients. Compare movers and claim your free moving quote.",
                    "email": "{{ $moverlist->company_email ?? '' }}",
                    "priceRange" : "Contact for Quote",
                    "contactPoint": {
                        "@type": "ContactPoint",
                        "telephone": "{{ $moverlist->phone_no ?? '' }}",
                        "contactType": "Customer service",
                        "email": "{{ $moverlist->company_email ?? '' }}",
                        "url": "{{ route('company.show', $moverlist->slug) }}"
                    },
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "US",
                        "addressLocality": "{{ $moverlist->city->name ?? $moverlist->city ?? '' }}",
                        "addressRegion": "{{ $moverlist->state->abv ?? $moverlist->state ?? '' }}",
                        "postalCode": "{{ $moverlist->city->zip_code ?? $moverlist->zip_code ?? '' }}",
                        "streetAddress": "{{ $moverlist->street ?? '' }}"
                    },
                    "areaServed": "USA"@if ($total_reviews > 0),
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "bestRating": "{{$max_rating}}",
                        "worstRating": "{{$min_rating ?? '1'}}",
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
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MoveAction",
  "name": " {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }} - Best Movers and Cost",
  "description": "Looking for reliable movers from {{ $cityToStateRoute->cityFrom->name }},
        {{ $cityToStateRoute->cityFrom->state->abv }} to {{ $cityToStateRoute->stateTo->name }}? Get the best moving
        services starting at {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} and tips to make your move stress-free." ,
  "agent": {
    "@type": "Organization",
    "name": "My Moving Journey",
    "url": "https://mymovingjourney.com"
  },
  "fromLocation": {
    "@type": "Place",
    "name": "{{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }}"
  },
  "toLocation": {
    "@type": "Place",
    "name": "{{ $cityToStateRoute->stateTo->name }}"
  },
  "object": {
    "@type": "Thing",
    "name": "{{ request()->input('move_size') ?? '4 Bedroom Home, 3 Bedroom Home ,2 Bedroom Home,1 Bedroom Home,Studio' }}"
  },
  "target": {
    "@type": "EntryPoint",
    "urlTemplate": "{{ url()->current() }}",
    "actionPlatform": [
      "http://schema.org/DesktopWebPlatform",
      "http://schema.org/MobileWebPlatform"
    ]
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Move from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to
                    {{ $cityToStateRoute->stateTo->name }}",
  "description": "Moving from {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} to
                    {{ $cityToStateRoute->stateTo->name }}? Professional movers usually cost between, moving containers average around, and renting a truck costs about. Learn which movers people actually use and what to expect before booking.",
  "estimatedCost": {
    "@type": "MonetaryAmount",
    "currency": "USD",
    "value": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }}"
  },
  
  "supply": [
    {
      "@type": "HowToSupply",
      "name": "Boxes and packing materials"
    },
    {
      "@type": "HowToSupply",
      "name": "Moving truck, container, or professional movers"
    },
    {
      "@type": "HowToSupply",
      "name": "Protective padding for furniture"
    },
    {
      "@type": "HowToSupply",
      "name": "Packing tape and labels"
    }
  ],
  "tool": [
    {
      "@type": "HowToTool",
      "name": "Moving cost calculator"
    },
    {
      "@type": "HowToTool",
      "name": "GPS navigation or route map"
    }
  ],
  "step": [
    {
      "@type": "HowToStep",
      "name": "Plan Early",
      "text": "Start preparing at least a month or two before your move. Get quotes from moving companies and decide on your moving date.",
      "image": "https://example.com/plan-early.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Set a Budget",
      "text": "List all possible costs like packing supplies, truck rental, gas, and temporary housing if needed.",
      "image": "https://example.com/set-budget.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Declutter Your Home",
      "text": "Go through your things and donate or sell items you don't need. It will save space and money.",
      "image": "https://example.com/declutter.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Gather Packing Supplies",
      "text": "Get boxes, tape, and labels. Pack room by room and keep essentials separate for the first few days.",
      "image": "https://example.com/packing-supplies.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Select a Trusted Mover",
      "text": "Choose a reliable moving company based on customer feedback and ratings.",
      "itemListElement": [
        {
          "@type": "HowToTip",
          "name": "Joyner and Meyer Associates",
          "text": "Rated 4.5 out of 5 stars. A licensed moving company based in Brookside, {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} operating under DOT #Ea consequuntur nisi and MC #Tempora sunt volupta. The company has 100% positive reviews and 0% negative feedback."
        },
        {
          "@type": "HowToTip",
          "name": "Moving Container Companies",
          "text": "Moving containers are a great way to save money without doing everything on your own. You take care of packing and unpacking, while the company manages the driving, picking up the container in {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} and delivering it to your new home."
        },
        {
          "@type": "HowToTip",
          "name": "Moving Truck Rentals",
          "text": "If you want to keep your moving costs low, renting a truck can be a good option. You'll need to do the packing, loading, and driving yourself, but it gives you more control over your move."
        }
      ]
    },
    {
      "@type": "HowToStep",
      "name": "Change Your Address",
      "text": "Update your address with the post office, banks, insurance, and any subscriptions.",
      "image": "https://example.com/change-address.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Transfer Utilities",
      "text": "Schedule your water, electricity, and internet to be turned off in {{ $cityToStateRoute->cityFrom->name }}, {{ $cityToStateRoute->cityFrom->state->abv }} and turned on in {{ $cityToStateRoute->stateTo->name }} before you arrive.",
      "image": "https://example.com/transfer-utilities.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Update Your Documents",
      "text": "Get a new driver's license, car registration, and voter registration once you move.",
      "image": "https://example.com/update-documents.jpg"
    },
    {
      "@type": "HowToStep",
      "name": "Travel to {{ $cityToStateRoute->stateTo->name }}",
      "text": "Follow the planned route, ensuring safety stops along the way and keeping track of travel time."
    },
    {
      "@type": "HowToStep",
      "name": "Unpack and Settle In",
      "text": "Unpack your belongings, arrange furniture, and dispose of packing materials."
    }
  ]
}
</script>
@endsection
