@extends('layouts.app')
@section('title')
    {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost
@endsection

@section('meta_description')
    @if (in_array($stateToCityRoute->stateFrom->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Don’t overpay for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Check authentic moving prices, top movers, and easy ways to make
        your move cheaper.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Skip the high costs on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Find real prices, trusted movers, and easy ways to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Avoid paying extra when moving from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Check real prices and compare
        reliable movers so you can keep your moving costs down.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Don’t spend more than you need to move from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. See real moving prices, find
        trusted movers, and learn simple ways to cut costs.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Stop spending too much to move from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Get real moving quotes and
        find the best companies to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, ['michigan', 'indiana', 'iowa', 'kansas', 'minnesota', 'missouri']))
        Plan your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move on a budget. See real prices, find the best moving companies, and
        learn simple tips to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Avoid paying too much for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. See real moving costs, trusted movers, and simple tips to cut
        your expenses.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Save on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Compare real prices, find top movers, and learn easy ways to cut
        your moving costs.
    @endif
@endsection

@section('og:title')
    {{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost
@endsection
@section('og:description')
    @if (in_array($stateToCityRoute->stateFrom->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Don’t overpay for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Check authentic moving prices, top movers, and easy ways to make
        your move cheaper.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Skip the high costs on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Find real prices, trusted movers, and easy ways to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Avoid paying extra when moving from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Check real prices and compare
        reliable movers so you can keep your moving costs down.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Don’t spend more than you need to move from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. See real moving prices, find
        trusted movers, and learn simple ways to cut costs.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Stop spending too much to move from {{ $stateToCityRoute->stateFrom->name }} to
        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Get real moving quotes and
        find the best companies to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, ['michigan', 'indiana', 'iowa', 'kansas', 'minnesota', 'missouri']))
        Plan your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move on a budget. See real prices, find the best moving companies, and
        learn simple tips to save money.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Avoid paying too much for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. See real moving costs, trusted movers, and simple tips to cut
        your expenses.
    @elseif(in_array($stateToCityRoute->stateFrom->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Save on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Compare real prices, find top movers, and learn easy ways to cut
        your moving costs.
    @endif
@endsection
@section('meta_keywords')
{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
@endsection

{{-- @section('og:image')
@php
    $from = $stateToCityRoute->stateFrom->name;
    $to   = $stateToCityRoute->cityTo->name;
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
    <link rel="stylesheet" href="{{ asset('assets/css/routes/state-to-city-route.css') }}">
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
                        {{-- @isset($move_size_cost->moving_company_2_3_bedroom)
                            {{ trim(preg_replace('/\s*[–—-].*$/u', '', $move_size_cost->moving_company_2_3_bedroom)) }}
                        @endisset --}}
                        <span class="move_cost_2_3_bedroom_min" style="font-family: var(--family);">{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }}</span>
                        {{ $stateToCityRoute->stateFrom->name }} to
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} -
                        Best Movers and Cost
                    </h1>
                    {{-- <p class="hero-subtitle">
                        Easily compare and book your next move with my moving journey
                    </p> --}}
                </div>
                <div class="form_wrapper mb-lg-0 mb-4">
                    <form action="" class=" main_banner_form">
                        <div class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                            <span class="mb-2 form_heading">

                                Let’s Calculate Your Moving Cost!
                            </span>
                            <p class="miles_upp">Moving Distance: {{ number_format($stateToCityRoute->miles) }} miles</p>
                        </div>
                        <div class="form_bg">
                            <div class="row">
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from"
                                            {{-- value="{{ $stateToCityRoute->stateFrom->name }}, USA" --}}
                                            class="zipfromsearch pac-target-input mmj-zip-from"
                                            placeholder="Enter City Name" autocomplete="off" >
                                        <span id="external_zipfrom_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            {{-- value="{{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}, USA" --}}
                                            class="ziptosearch pac-target-input mmj-zip-to" placeholder="Enter City Name"
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

        @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
            <p><b>Move Cost and Duration: </b>If you’re moving from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> the cost
                usually falls between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The distance is around
                <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, and the exact price depends on
                when
                you move, how much stuff
                you have, and the services you choose.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
            <p><b>Move Cost and Duration: </b>Making the trip from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> usually costs
                around <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The route is roughly <span
                    class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, and what you pay changes
                based on
                your moving day, how much
                you’re bringing, and the type of help you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
            <p><b>Move Cost and Duration: </b>Relocating from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> usually costs
                about <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The trip is roughly <span
                    class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, and your final price changes
                based on
                your moving date, how much
                you bring, and the services you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
            <p><b>Move Cost and Duration: </b>A move from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> usually costs
                between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The distance is about <span
                    class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, and the price changes based
                on your
                moving date, how much you’re
                bringing, and the services you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
            <p><b>Move Cost and Duration: </b>Your move from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> will likely
                cost between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The trip covers about <span
                    class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>. Your final price depends on
                how much
                you own, the time of
                year, and which services you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
            <p><b>Move Cost and Duration: </b>Your move from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> will likely
                cost between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The journey is about <span
                    class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>. Your final price depends on
                during
                which season you move, the
                stuff you take with, and which services you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
            <p><b>Move Cost and Duration: </b>If you’re heading from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b>, your move will
                typically cost between <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The trip covers about
                <span class="miles_upp">{{ number_format($stateToCityRoute->miles) }} miles</span>, and the final price depends
                on your
                moving date, the amount you
                bring, and the services you pick.
            </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
            <p><b>Move Cost and Duration: </b>Moving from <b>{{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</b> typically
                costs between
                <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The trip covers about <span
                    class="miles_upp"> {{ number_format($stateToCityRoute->miles) }} miles</span>. Your final price depends on
                the
                amount of belongings you have,
                the time of year you move, and which services you select.
            </p>
        @endif

        <section class="featured-partners pb-5">
            <div class="container">
                <h2 class="featured-partners-title">Featured Movers from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</h2>
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
            Average Moving Cost from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }}
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

        <h2>Best Local Moving Companies in {{ $stateToCityRoute->stateFrom->name }} </h2>
        @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
            <p>Moving from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b> is easier when you have skilled and reliable movers by
                your side.
            </p>
            <p>Here are some trusted moving companies that can help you with your move:</p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
            <p>Moving from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b> gets a lot simpler when you’ve got good, dependable
                movers helping you out.
            </p>
            <p>These are a few reliable moving companies you can rely on for the move: </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
            <p>A relocation from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b> feels much easier when skilled, reliable movers can
                help you out.
            </p>
            <p>Here are several dependable moving companies ready to guide you through your relocation: </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
            <p>A move from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b> feels much easier when dependable and experienced
                movers support you.
            </p>
            <p>You’ll find several reliable moving companies ready to help with your move:</p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
            <p>Moving from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b>, is easier when you have skilled and reliable movers
                by your side.
            </p>
            <p>Here are some trusted moving companies that can help you with your move: </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
            <p>The move from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b>, gets much simpler when you have capable and
                dependable movers helping you.
            </p>
            <p>Here is a list of reliable moving companies that can assist with your relocation: </p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
            <p>Your move from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b>, goes much smoother with capable and trustworthy
                movers helping you.
            </p>
            <p>Here are the reliable moving companies that can handle your relocation:</p>
        @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
            <p>Your move from <b>{{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}</b>, becomes much simpler with experienced and dependable
                movers assisting you. </p>
            <p>Below are several reliable moving companies that can manage your relocation:</p>
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
            <div class="content-wrapper">
                <div class="col-12 col-lg-8 mx-auto my-5">
                    <div class="form_wrapper">
                        <form action="" class=" main_banner_form">
                            <h2 class="mt-0 mb-2 text-center">Find movers in your area</h2>
                            <p class="text-center">Easily compare personalized moving quotes for your
                                {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}
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
            </div>
        </section>
        <section class="methodology-section py-5">
            <h2 class="methodology-title">How we picked the best movers for your
                {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} move</h2>
            <p class="methodology-text">
                We focus on finding moving companies that offer real value and reliable service for people relocating from
                {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}. We look at real
                customer experiences and a few key factors that help separate the best
                movers from the rest:
            </p>

            <div class="bar-wrapper">
                <div class="bar">
                    <div class="bar-segment yellow"></div>
                    <div class="bar-segment green"></div>
                    <div class="bar-segment blue"></div>
                    <div class="bar-segment orange"></div>
                    <div class="bar-segment pink"></div>
                    <div class="bar-segment teal"></div>
                    <div class="bar-segment lightgreen"></div>

                </div>

                <!-- Alternating top/bottom labels -->
                <div class="label top l1">Customer reviews (25%) </div>
                <div class="label bottom l2">Transparent pricing (20%)</div>
                <div class="label top l3">Service coverage (15%)</div>
                <div class="label bottom l4">Professionalism (15%)</div>
                <div class="label top l5">License and insurance (10%)</div>
                <div class="label bottom l6">Flexibility (10%)</div>
                <div class="label top l7">Extra services (5%)</div>

            </div>
        </section>
        <section class="state_Route_bottom_content">
            <h2>Key Things to Know Before Moving from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}</h2>
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
                    $from_data = $state_cost_of_living->{$key} ?? '-';
                    $city_key = $city_key_override[$key] ?? $key;
                    $to_data = $to_city_cost_of_living->{$city_key} ?? '-';
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
                                <th>{{ $stateToCityRoute->stateFrom->name ?? 'State From' }}</th>
                                <th>{{ $stateToCityRoute->cityTo->name ?? 'City To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost_metric_map as $key => $metric_name)
                                @php
                                    $from_value = $state_cost_of_living->{$key} ?? '-';
                                    $city_key = $city_key_override[$key] ?? $key;
                                    $to_value = $to_city_cost_of_living->{$city_key} ?? '-';
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
                    $from_data = $state_life_style->{$key} ?? '-';
                    $city_key = $city_key_override[$key] ?? $key;
                    $to_data = $to_city_life_style->{$city_key} ?? '-';
                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_data = true;
                        break;
                    }
                }
            @endphp
            <h5>Life in {{ $stateToCityRoute->stateFrom->name }} vs. {{ $stateToCityRoute->cityTo->name }}</h5>
            @if ($has_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $stateToCityRoute->stateFrom->name ?? 'State From' }}</th>
                                <th>{{ $stateToCityRoute->cityTo->name ?? 'City To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metric_map as $key => $metric_name)
                                @php
                                    $from_value = $state_life_style->{$key} ?? '-';
                                    $city_key = $city_key_override[$key] ?? $key;
                                    $to_value = $to_city_life_style->{$city_key} ?? '-';
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

        <section class="state_Route_bottom_content">
            <h2>How to Move Affordably from {{ $stateToCityRoute->stateFrom->name }} to
                {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}</h2>
            @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
                <p>Moving doesn’t have to drain your savings. With a bit of planning, you can cut costs and still move
                    smoothly from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Compare multiple moving quotes</h3>
                    <p class="step-content">Don’t book the first company you find. Get estimates from at least three
                        movers. Ask for a detailed breakdown of costs so you can see what’s included and avoid surprise fees
                        later. </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Move during the off-season</h3>
                    <p class="step-content">Moving companies usually charge less between October and April. Weekdays and
                        mid-month dates are also cheaper than weekends or month-ends.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter before you pack</h3>
                    <p class="step-content">The less you take, the less you pay. Donate, sell, or give away items you
                        don’t use. You’ll save money on packing supplies and moving weight.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack your own boxes</h3>
                    <p class="step-content">Professional packing services can be convenient but expensive. Use your own
                        boxes or get free ones from grocery or hardware stores. Label everything clearly so unpacking is
                        easier.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Use a moving container or rental truck</h3>
                    <p class="step-content">If you’re comfortable loading your items yourself, consider a portable moving
                        container or truck rental. It’s often cheaper than hiring a full-service mover.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your route and fuel stops</h3>
                    <p class="step-content">If you’re driving, map your route ahead of time and look for affordable gas
                        stops or overnight stays. Apps like <a href="https://www.gasbuddy.com/"
                            target="_blank"><b>GasBuddy</b></a> can help you save on fuel.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
                <p>Moving doesn’t have to wipe out your wallet. With a little planning, you can spend less and still make
                    the trip from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} without stress.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Look at a few different moving quotes</h3>
                    <p class="step-content">Don’t hire the first mover you see. Check prices from at least three
                        companies. Ask them to break down all the charges so you know what you’re really paying for and
                        don’t get hit with random extra fees.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pick a cheaper time to move</h3>
                    <p class="step-content">Movers usually drop their prices between October and April. Weekdays and
                        middle-of-the-month dates also cost less than weekends or the end of the month.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Clear out stuff you don’t need</h3>
                    <p class="step-content"> Bringing fewer things means paying less. Donate, sell, or hand off anything
                        you never use. You’ll cut down on packing supplies and weight for the move.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Put your own boxes together</h3>
                    <p class="step-content">Professional packing services can be convenient but expensive. Use your own
                        boxes or get free ones from grocery or hardware stores. Label everything clearly so unpacking is
                        easier.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Try a moving container or a rental truck</h3>
                    <p class="step-content">If you’re fine loading your own things, a portable container or truck rental
                        can save a lot of money compared to a full-service mover.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your drive and fuel stops ahead</h3>
                    <p class="step-content">When you’re hitting the road, plan your route ahead and check where the
                        cheaper gas stops and overnight spots are. Apps like GasBuddy make it easier to cut down on what you
                        spend at the pump.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
                <p>A move doesn’t have to wipe out your savings. A little planning helps you lower costs and still handle
                    the trip from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} without stress.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Get quotes from movers</h3>
                    <p class="step-content">Don’t hire the first team you come across. Ask at least three movers for
                        prices. Tell them you want a clear list of every cost, so you know what you’re paying for and don’t
                        face surprise costs later. </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pick an off-season date</h3>
                    <p class="step-content">Most movers charge less between October and April. Weekdays and mid-month
                        dates also cost less than weekends or month-end days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Clear out what you don’t need</h3>
                    <p class="step-content">You pay less when you move less. Donate, sell, or give away items you no
                        longer use. This cuts down packing supply costs and reduces the weight of your shipment.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack your things yourself</h3>
                    <p class="step-content">Professional packing saves time but raises your bill. Use boxes you already
                        have or pick up free ones from stores. Write clear labels to make unpacking simpler.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Consider a container or rental truck</h3>
                    <p class="step-content">Portable containers or rental trucks usually cost less than a full-service
                        mover if you can load your belongings on your own.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your drive and fuel stops</h3>
                    <p class="step-content">Map out your route before you leave. Look for cheaper gas stations and
                        budget-friendly places to stay overnight. Apps like GasBuddy help you save on fuel.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
                <p>A move doesn’t have to empty your wallet. A little planning helps you cut costs and still handle the trip
                    from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} without stress.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Compare multiple moving quotes</h3>
                    <p class="step-content">Don’t choose the first mover you find. Ask at least three companies for
                        prices. Tell them you want a clear list of what you’re paying for, so you don’t run into surprise
                        fees later.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Move during the off-season</h3>
                    <p class="step-content">Most movers charge less between October and April. Weekdays and mid-month
                        dates also tend to cost less than weekends or at the end of the month.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter before you pack</h3>
                    <p class="step-content">You spend less when you bring fewer things. Donate, sell, or give away what
                        you don’t use anymore. This cuts your packing supply costs and lowers the total weight.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Do your own packing</h3>
                    <p class="step-content">Packing services save time but raise the price. Use boxes you already have or
                        pick up free ones from stores. Write clear labels so unpacking stays simple.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Choose a container or rent a moving truck</h3>
                    <p class="step-content">When you feel okay loading your own things, you can go with a moving container
                        or a rented truck. This option usually costs less than paying a full moving crew to do everything.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Map out your trip and gas stops</h3>
                    <p class="step-content">For a drive, plan your trip before you hit the road. Look up spots with
                        cheaper gas and simple places to stay the night. Apps like GasBuddy show fuel prices and help you
                        spend less on gas.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
                <p>Relocating doesn’t have to wipe out your budget. With a little planning, you can lower your costs and
                    still get from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} without stress.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Compare several moving quotes</h3>
                    <p class="step-content">Skip booking the first mover you see. Ask at least three companies for
                        estimates. Get a clear list of every charge so you know what you’re paying for and avoid surprise
                        add-ons.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Move when demand is low</h3>
                    <p class="step-content">Prices usually drop from October through April. Weekdays and mid-month dates
                        also tend to cost less than weekends or the end of the month.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter before you pack</h3>
                    <p class="step-content">Bringing fewer things cuts your bill. Donate, sell, or hand off anything you
                        don’t use. You’ll spend less on packing materials and reduce your load.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack your own boxes</h3>
                    <p class="step-content">Hiring packers is handy but pricey. Use boxes you already have or pick up free
                        ones at grocery or hardware stores. Mark each box so unpacking goes faster.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Try a moving container or rental truck</h3>
                    <p class="step-content">If you don’t mind doing the lifting, a portable container or rental truck can
                        be cheaper than a full-service move.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your drive and fuel stops</h3>
                    <p class="step-content">If you’re on the road, map your trip ahead of time and look for cheaper gas
                        stations or overnight spots. Apps like GasBuddy can help you cut fuel costs.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
                <p>You can move without blowing your entire savings. A little planning lets you spend less and still have an
                    easy move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}.
                </p>
                <div class="step-section">
                    <h3 class="step-subtitle">Get quotes from several companies</h3>
                    <p class="step-content">Do not choose the very first mover you see. Collect quotes from at least three
                        different companies. Request a full list of every cost so you know what you're paying for and can
                        steer clear of extra fees.</p>
                </div>

                <div class="step-section">
                    <h3 class="step-subtitle">Schedule your move for the off-season</h3>
                    <p class="step-content">Movers often have lower rates from October through April. Dates on weekdays or
                        in the middle of the month also cost less than weekends or the final days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Sort through your things before packing</h3>
                    <p class="step-content">You pay more when you bring more stuff. Sell, donate, or throw out items you
                        no longer need. This will save you cash on both packing materials and the total weight.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack up your own boxes</h3>
                    <p class="step-content">Paying for professional packing is helpful but adds to your bill. Find free
                        boxes from stores or use ones you already have. Write clearly on every box so that unpacking is
                        straightforward.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Try using a moving container or rental truck</h3>
                    <p class="step-content">If you can load your belongings yourself, think about a portable container or
                        renting a truck. This option frequently costs less than a full-service moving company.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your travel route and gas stops</h3>
                    <p class="step-content">If you are driving, plan your journey before you leave. Search for low-cost
                        gas stations and places to stay. Apps like GasBuddy can help you spend less on fuel.</p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
                <p>Relocation from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} does not have to use all your money. A good plan helps you
                    save cash and still have a smooth move.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Check prices with different movers</h3>
                    <p class="step-content">Don't hire the first moving company you call. Get quotes from at least three
                        different services. Ask for a full list of prices so you know what you're paying for and won't get
                        surprise charges.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pick a cheaper time to move</h3>
                    <p class="step-content">Most moving companies lower their prices from October to April. It also costs
                        less to move on a weekday or in the middle of the month.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Get rid of stuff you don't need</h3>
                    <p class="step-content">You pay more when you move more things. Sell or give away items you no longer
                        use. This saves you money on boxes and on the total weight of your shipment.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack everything yourself</h3>
                    <p class="step-content">Paying for packing help is easy but costs extra. Find free boxes from local
                        stores or use your own. Write clearly on each box so you know what's inside when you unpack.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Try a container or truck rental</h3>
                    <p class="step-content">If you can load your own belongings, look into a moving container or renting a
                        truck. This usually costs less than hiring a full-service moving company.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your drive before you go</h3>
                    <p class="step-content">If you're driving, map out your trip ahead of time. Look for cheaper gas
                        stations and places to stay. Use the GasBuddy app to find the best fuel prices along your route.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your route and fuel stops</h3>
                    <p class="step-content">If you’re driving, map your route ahead of time and look for affordable gas
                        stops or overnight stays. Apps like GasBuddy can help you save on fuel.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
                <p>You can move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} without breaking your bank. Smart planning helps you save
                    money while still having smooth relocation.</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Get quotes from several companies</h3>
                    <p class="step-content">Don't choose the first mover you contact. Collect estimates from at least
                        three different companies. Request a complete cost breakdown to understand all charges and avoid
                        unexpected fees.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Schedule your move for slower months</h3>
                    <p class="step-content">Moving companies typically offer better rates from October through April.
                        Weekday moves in the middle of the month usually cost less than weekends or month-ends.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Sort through your belongings first</h3>
                    <p class="step-content">Fewer items mean lower costs. Sell or donate things you no longer need. This
                        reduces your spending on both packing materials and total moving weight.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Pack your items yourself</h3>
                    <p class="step-content">Professional packing adds significant expense. Source free boxes from local
                        stores or use your own. Clearly mark each box's contents to simplify unpacking</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Consider container or truck options</h3>
                    <p class="step-content">If you can handle loading, look into portable containers or rental trucks.
                        These alternatives often cost less than full-service movers.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan your driving route carefully</h3>
                    <p class="step-content">If driving, map your journey in advance. Research affordable gas stations and
                        lodging options along the way. Apps like GasBuddy help you find the best fuel prices.
                    </p>
                </div>
            @endif
        </section>
        <section class="state_Route_bottom_content">
            <h2>What to Do in Your First Week in {{ $stateToCityRoute->cityTo->name }},
                {{ $stateToCityRoute->cityTo->state->abv }}</h2>
            @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
                <p> {{ $stateToCityRoute->cityTo->name }} is friendly and easy to get around, but taking care of a few
                    essentials early will make the transition even better.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up your home basics</h3>
                    <p class="step-content2">Start by setting up utilities like power, water, internet, and trash service.
                        You can usually do this online. If you’re renting, ask your landlord which services are already
                        active. </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Update your address and IDs</h3>
                    <p class="step-content2">Change your address with the USPS, your bank, and any subscriptions you use.
                        Visit the local DMV to update your driver’s license and vehicle registration for
                        {{ $stateToCityRoute->cityTo->state->name }} .</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Explore nearby grocery stores and essentials</h3>
                    <p class="step-content2">Find your nearest grocery stores, pharmacies, and gas stations. Take note of
                        store hours and traffic patterns; it helps a lot during busy days.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Meet your neighbors</h3>
                    <p class="step-content2">A quick introduction goes a long way. {{ $stateToCityRoute->cityTo->name }}
                        has a community-driven vibe, and people are generally open to newcomers. You might even get tips on
                        local restaurants or events.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Get familiar with your commute</h3>
                    <p class="step-content2">If you’re working or studying, try your route during regular traffic hours.
                        Learn alternate routes in case of construction or delays.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Register for local services</h3>
                    <p class="step-content2">Sign up for trash pickup, recycling, and mail delivery if needed. Also, check
                        out the city website for community resources, permits, or recycling schedules.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
                <p> {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} is easy to settle
                    into, and doing a few things early makes the change even smoother.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Get your home basics ready</h3>
                    <p class="step-content2">Turn on things like electricity, water, internet, and trash service. Most of
                        this can be done online. If you rent, check with your landlord to see what’s already set up. </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Fix your address and IDs</h3>
                    <p class="step-content2">Update your address with USPS, your bank, and any services you use. Go to the
                        DMV to switch your license and car registration to {{ $stateToCityRoute->cityTo->state->name }}.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find your go-to stores</h3>
                    <p class="step-content2">Look for the closest grocery stores, pharmacies, and gas stations. Pay
                        attention to their hours and how busy the area gets.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Say Hi to the neighbors</h3>
                    <p class="step-content2">A quick hello can help a lot. People in
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} are pretty
                        welcoming, and they might share good tips about places to eat or things to do.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your daily route</h3>
                    <p class="step-content2">If you’re going to work or school, try the drive during busy hours. Check out
                        a backup route in case of road work or traffic.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Sign up for local services</h3>
                    <p class="step-content2">Make sure trash pickup, recycling, and mail delivery are set. The city
                        website is also helpful for things like community info, permits, or pickup schedules.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
                <p>{{ $stateToCityRoute->cityTo->name }} feels friendly and easy to move around, and handling a few basic
                    tasks early makes the move-in period smoother.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up your place</h3>
                    <p class="step-content2">Turn on your main utilities, like electricity, water, internet, and trash
                        pickup. Most companies let you do this online. If you rent, ask your landlord what’s already
                        running.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Update your info</h3>
                    <p class="step-content2">Change your address with USPS, your bank, and any services you use. Go to the
                        local DMV to switch your driver’s license and vehicle registration to
                        {{ $stateToCityRoute->cityTo->state->name }}.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find your everyday grocery spots</h3>
                    <p class="step-content2">Look for nearby grocery stores, pharmacies, and gas stations. Check their
                        hours and get used to the traffic in the area. It helps once your schedule gets busy.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Say hello to neighbors</h3>
                    <p class="step-content2">A quick chat can make you feel welcome. People in
                        {{ $stateToCityRoute->cityTo->name }} often enjoy helping newcomers. You may even get good
                        suggestions for places to visit or eat.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Get familiar with your commute</h3>
                    <p class="step-content2">If you work or study, test your driving during normal traffic times. Keep a
                        few backup routes ready in case you run into construction or slowdowns.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up your local services</h3>
                    <p class="step-content2">Make sure your home has trash pickup, recycling, and mail service set up.
                        Visit the city’s website to see local resources, permits, and the recycling schedule.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
                <p> {{ $stateToCityRoute->cityTo->name }} feels warm and easy to move around, and handling a few basics
                    early makes your move-in experience smoother.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up the essentials in your home</h3>
                    <p class="step-content2">Turn on your main utilities, including electricity, water, internet, and
                        trash pickup. Most companies let you handle this online. If you rent, ask your landlord what’s
                        already active.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Update your personal information</h3>
                    <p class="step-content2">Send your new address to USPS, your bank, and any services you use. Go to the
                        local DMV to switch your driver’s license and vehicle registration to
                        {{ $stateToCityRoute->cityTo->state->name }}.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find your everyday stores</h3>
                    <p class="step-content2">Check which grocery stores, pharmacies, and gas stations are closest to you.
                        Pay attention to their hours and the usual traffic in those areas. It makes busy days easier.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Introduce yourself to the people living around you</h3>
                    <p class="step-content2">A short introduction can help you feel at home.
                        {{ $stateToCityRoute->cityTo->name }} has a welcoming, community-focused feel, and most people are
                        friendly to new residents. They may even share good suggestions for food spots or local events.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your regular routes</h3>
                    <p class="step-content2">For work or school, test your driving during normal traffic times. Keep a
                        couple of backup routes ready in case you run into roadwork or delays.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up local services</h3>
                    <p class="step-content2">Make sure you have trash, recycling, and mail delivery arranged. The city’s
                        website also lists useful info about community services, permits, and recycling schedules.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
                <p> {{ $stateToCityRoute->cityTo->name }} is welcoming and simple to navigate but handling a few basics
                    early will make settling in even smoother.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up your home essentials</h3>
                    <p class="step-content2">Start by getting your power, water, internet, and trash service ready. Most
                        of this can be done online. If you rent, check with your landlord to see what’s already turned on.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Update your address and IDs</h3>
                    <p class="step-content2">Change your address with USPS, your bank, and any subscriptions. Head to the
                        local DMV to update your driver’s license and vehicle registration for
                        {{ $stateToCityRoute->cityTo->state->name }}.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find your nearby stores</h3>
                    <p class="step-content2">Locate the closest grocery stores, pharmacies, and gas stations. Pay
                        attention to their hours and usual traffic so you’re prepared on busy days.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Introducing yourself to neighbors</h3>
                    <p class="step-content2">Simple hello makes a big difference. {{ $stateToCityRoute->cityTo->name }}
                        has a friendly, community-focused feel, and people are usually happy to welcome newcomers. You might
                        even pick up tips on local spots or events.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your daily route</h3>
                    <p class="step-content2">If you work or study, test your route during normal traffic times. Keep a few
                        backup paths in mind in case you run into construction or slowdowns.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up your local services</h3>
                    <p class="step-content2">Arrange trash pickup, recycling, and mail delivery if you still need them.
                        Also, visit the city’s website to find community resources, permits, or recycling info.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
                <p> {{ $stateToCityRoute->cityTo->name }} is a friendly and convenient city but handling a few key tasks
                    early will help you settle in faster.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Arrange your home utilities</h3>
                    <p class="step-content2">First, get your electricity, water, internet, and garbage service ready. You
                        can often arrange this online. If you rent, check with your landlord to see which services are
                        already on. </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Switch your address and licenses</h3>
                    <p class="step-content2">Notify the post office, your bank, and any subscription services of your new
                        address. Go to the Alabama DMV to get a new driver's license and register your car.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find local shops and services</h3>
                    <p class="step-content2">Locate the closest supermarkets, drugstores, and gas stations. Pay attention
                        to their operating hours and the local traffic; this makes busy days much simpler.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Introduce yourself nearby</h3>
                    <p class="step-content2">Say hello to your new neighbors. {{ $stateToCityRoute->cityTo->name }} has
                        a strong community feel, and people are usually welcoming. They can often recommend good local spots
                        and activities.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your daily travel route</h3>
                    <p class="step-content2">If you have a job or classes, practice your commute during normal traffic
                        times. Find a few different paths to use in case of roadwork or other delays.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Sign up for city services</h3>
                    <p class="step-content2">Set up your trash and recycling collection. Make sure your mail delivery is
                        scheduled. Look at the official city website for local news, permit details, and recycling
                        information.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
                <p> {{ $stateToCityRoute->cityTo->name }} is a welcoming city which is not so difficult to navigate.
                    Handling a few important tasks right away will make settling in much easier.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Get your utilities running</h3>
                    <p class="step-content2">First, arrange for electricity, water, internet, and garbage collection. Most
                        companies let you do this online. Ask your landlord which services they already handle if you rent.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Switch over your paperwork</h3>
                    <p class="step-content2">Tell the post office, your bank, and all your subscriptions about your new
                        address. Go to the Alabama DMV to get a local driver's license and register your car.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find important local spots</h3>
                    <p class="step-content2">Locate the closest supermarket, pharmacy, and gas station. Notice when these
                        places get busy and learn the traffic patterns, it really helps when you're in a rush.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Say hello to people nearby</h3>
                    <p class="step-content2">Just a simple introduction makes a big difference. People in
                        {{ $stateToCityRoute->cityTo->name }} take pride in their communities and usually welcome new
                        faces. You may learn about great local eateries or events this way.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your daily travel route</h3>
                    <p class="step-content2">Practice driving to work or school during normal commute times. Find a couple
                        of different paths you can take when there's road work or heavy traffic.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Set up city services</h3>
                    <p class="step-content2">Schedule your trash and recycling collection. Make sure your mail delivery is
                        working. Browse the city's website to learn about neighborhood programs, needed permits, and
                        recycling days.
                    </p>
                </div>
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
                <p> {{ $stateToCityRoute->cityTo->name }} welcomes you with its friendly atmosphere and easy navigation.
                    Handling a few key tasks early will help you settle in quickly.</p>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Get your utilities running</h3>
                    <p class="step-content2">First, arrange for electricity, water, internet, and trash service. Most
                        providers let you set these up online. If you rent, check with your property manager about which
                        services they already provide. </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Update your important documents</h3>
                    <p class="step-content2">Notify the post office, your financial institutions, and subscription
                        services about your new address. Visit the Alabama DMV to exchange your driver's license and
                        register your vehicle.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Find your local essentials</h3>
                    <p class="step-content2">Locate the closest supermarkets, pharmacies, and fuel stations. Pay attention
                        to their operating hours and typical traffic flow - this knowledge helps during busy periods.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Connect with your neighbors</h3>
                    <p class="step-content2">A simple hello makes a big difference.
                        {{ $stateToCityRoute->cityTo->name }} residents take pride in their communities and typically
                        welcome new people. You might discover great local spots through these conversations.</p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Learn your daily travel routes</h3>
                    <p class="step-content2">If you work or attend school, test your commute during normal traffic
                        conditions. Identify backup routes you can use during road work or heavy congestion.
                    </p>
                </div>
                <div class="step-section2">
                    <h3 class="step-subtitle2">Arrange city services</h3>
                    <p class="step-content2">Set up regular trash and recycling collection. Verify your mail delivery
                        service. Explore the city's official website for information about community programs, required
                        permits, and recycling schedules.
                    </p>
                </div>
            @endif
        </section>

        <div class="faq-section mt-5">
            <h2>Frequently Asked Questions</h2>

            @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template1_alabama')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template2_california')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template3_colorado')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template4_florida')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template5_massachusetts')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template6_michigan')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template7_texas')
            @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
                @include('frontend.company_auth.route_pages.state_to_city_route_faqs.template8_washington')
            @endif
        </div>
    </div>

    <div id="moveData" data-state-from="{{ $stateToCityRoute->stateFrom->name ?? '' }}"
        data-city-to="{{ $stateToCityRoute->cityTo->name ?? '' }}"
        data-state-abv="{{ $stateToCityRoute->cityTo->state->abv ?? '' }}">
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

    @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Don’t overpay for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} move. Check authentic moving prices, top movers, and easy ways to make your move cheaper."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Skip the high costs on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},{{ $stateToCityRoute->cityTo->state->abv }} move. Find real prices, trusted movers, and easy ways to save money."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Avoid paying extra when moving from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}. Check real prices and compare reliable movers so you can keep your moving costs down."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Don’t spend more than you need to move from {{ $stateToCityRoute->stateFrom->name }} to
            {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }}. See real moving prices, find trusted movers, and learn simple ways to
            cut costs."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Stop spending too much to move from {{ $stateToCityRoute->stateFrom->name }} to
            {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }}. Get real moving quotes and find the best companies to save money."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Plan your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }} move on a budget. See real prices, find the best moving companies, and
            learn simple tips to save money."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Avoid paying too much for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }} move. See real moving costs, trusted movers, and simple tips to cut
            your expenses."
        }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
        <script type="application/ld+json" class="schema-cost">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
            "url": "{{url()->current()}}",
            "description": "Save on your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
            {{ $stateToCityRoute->cityTo->state->abv }} move. Compare real prices, find top movers, and learn easy ways to cut
            your moving costs."
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
                "name": "Popular Moving Routes from {{ $stateToCityRoute->stateFrom->name }}",
                "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($stateToCityRoute->stateFrom->abv) }}"
            },
            {
                "@type": "ListItem",
                "position": 4,
                "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '$0' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
                "item": "{{url()->current()}}"
            }
            ]
        }
    </script>

    @if (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate1))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The average cost to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} is between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}, depending on your home size and moving service. Packing yourself or moving during off-season months can lower your total cost."
                }
                },
                {
                "@type": "Question",
                "name": "How far is {{ $stateToCityRoute->cityTo->name }} from {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The distance between {{ $stateToCityRoute->stateFrom->name }} and {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} is about {{ number_format($stateToCityRoute->miles) }} miles, depending on your starting point."
                }
                },
                {
                "@type": "Question",
                "name": "Is it worth moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, moving to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} can be a great choice if you’re looking for new opportunities and a better quality of life. The city offers a mix of <b>affordable living, steady job options, and a welcoming community</b>. Before moving, check out details like the <b>cost of living, local job market, and lifestyle</b> to make sure it fits what you’re looking for."
                }
                },
                {
                "@type": "Question",
                "name": "What is the best time of year to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The best time to move is during spring or fall when the weather is mild and moving rates are lower. Summer is the busiest and most expensive season, while winter offers cheaper prices but cooler travel conditions."
                }
                },
                {
                "@type": "Question",
                "name": "What should I do after moving to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "After you move, set up your utilities, update your address and driver’s license, and explore local stores and services. Take time to visit popular places to get familiar with the area."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": " How much does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "A move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} usually runs somewhere around  {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. The price changes based on how big your place is and what kind of moving help you use. Packing on your own or moving in slower months can bring the cost down."
                }
                },
                {
                "@type": "Question",
                "name": " How long is the distance between {{ $stateToCityRoute->cityTo->name }} and
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The trip from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} is roughly {{ number_format($stateToCityRoute->miles) }} miles, give or take, depending on where you start."
                }
                },
                {
                "@type": "Question",
                "name": " Is moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} a good choice?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, many people find {{ $stateToCityRoute->cityTo->name }}
                        a good place to move if they want new chances and a better day-to-day life. It has affordable
                        living, steady job options, and friendly communities. Before you decide, look into things like the
                        cost of living, jobs, and the kind of lifestyle you want."
                }
                },
                {
                "@type": "Question",
                "name": "When is the easiest and cheapest time to move from
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Spring and fall are usually the best times to move because the weather is nicer and moving rates
                        aren’t as high. Summer costs more and is busier, while winter is cheaper but colder."
                }
                },
                {
                "@type": "Question",
                "name": "What should I take care of after settling in {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} ?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Once you get there, switch on your utilities, update your address and license, and find nearby stores
                        and services. Take a little time to check out local spots so you can get comfortable with the area."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "How much does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most moves from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} cost between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. The price changes based on your home size and the type of help you choose. Packing your own things or moving during slower months can bring the cost down."
                }
                },
                {
                "@type": "Question",
                "name": "How far is {{ $stateToCityRoute->cityTo->name }} from
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The trip from {{ $stateToCityRoute->stateFrom->name }} and
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        is roughly {{ number_format($stateToCityRoute->miles) }} miles, though the exact distance depends on where you start."
                }
                },
                {
                "@type": "Question",
                "name": " Is it worth moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes,{{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} can be a solid choice if you want fresh opportunities and a better quality of life. The city offers affordable living, steady job options, and a friendly community. Make sure you check things like cost of living, job openings, and lifestyle to see if it matches what you want."
                }
                },
                {
                "@type": "Question",
                "name": " What is the best time of year to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Spring and fall usually offer the best mix of mild weather and lower moving rates. Summer costs more and gets busy, while winter is cheaper but colder for travel."
                }
                },
                {
                "@type": "Question",
                "name": "What should I do after moving to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Once you arrive, set up your utilities, update your address and driver’s license, and learn where the nearby stores and services are. Spend some time visiting local spots so you can get comfortable with the area."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": " What does a move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} usually cost?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most moves from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} fall between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. The price depends on your home size and the type of moving help you choose. Packing your own items or moving during slower months can bring the cost down."
                }
                },
                {
                "@type": "Question",
                "name": " How far is {{ $stateToCityRoute->cityTo->name }} from
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The trip from {{ $stateToCityRoute->stateFrom->name }} and
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        covers roughly {{ number_format($stateToCityRoute->miles) }} miles, though the distance changes based on where you start."
                }
                },
                {
                "@type": "Question",
                "name": "Is moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} a good idea?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        can be a strong choice if you want new opportunities and a better quality of life. The city offers affordable living, solid job options, and a friendly community. Make sure you look into the cost of living, local jobs, and lifestyle to see if it fits what you want.
                    "
                }
                },
                {
                "@type": "Question",
                "name": "When is the best season to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Spring and fall usually offer mild weather and lower moving rates. Summer tends to cost more and stays busy, while winter brings cheaper prices but colder travel conditions."
                }
                },
                {
                "@type": "Question",
                "name": " What should I take care of after moving to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Once you settle in, turn on your utilities, update your address and driver’s license, and find nearby stores and services. Spend some time checking out popular spots so you can get used to the area."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": " What does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} usually runs between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}, depending on your home size and the service you choose. Packing on your own or moving during slower months can help you spend less."
                }
                },
                {
                "@type": "Question",
                "name": "What is the distance from {{ $stateToCityRoute->cityTo->name }} from
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} is around {{ number_format($stateToCityRoute->miles) }} miles from {{ $stateToCityRoute->stateFrom->name }}, though the exact distance depends on where you start."
                }
                },
                {
                "@type": "Question",
                "name": " Is moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }} a  good idea?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        can be a solid choice if you want fresh opportunities and a better quality of life. The city offers affordable living, steady work options, and a friendly community. Before you move, look into things like living costs, the job market, and the local lifestyle to make sure it matches what you want."
                }
                },
                {
                "@type": "Question",
                "name": " When is the ideal time to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Spring and fall are the best seasons to move because the weather is mild and prices tend to be lower. Summer costs more and stays busy, while winter is cheaper but comes with cooler travel conditions."
                }
                },

                {
                "@type": "Question",
                "name": "What should I take care of after moving to  {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Once you arrive, set up your utilities, update your address and driver’s license, and find nearby stores and services. Spend a little time exploring the city so you can get comfortable with your new area."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": " What should I budget for a move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most moves from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }} cost between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}. Your final price depends on how much you own and the services you pick. You can spend less by packing yourself or moving between October and April."
                }
                },
                {
                "@type": "Question",
                "name": "How many miles is it from {{ $stateToCityRoute->cityTo->name }} to
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "The drive from {{ $stateToCityRoute->stateFrom->name }} and
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        is roughly {{ number_format($stateToCityRoute->miles) }} miles. The exact distance depends on which city you start from."
                }
                },
                {
                "@type": "Question",
                "name": " Should I consider moving to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving to{{ $stateToCityRoute->cityTo->name }}
                    is a good idea for many people. The city provides affordable living, job options, and a friendly community. Look into the cost of living and local job scene first to see if it matches your needs. "
                }
                },
                {
                "@type": "Question",
                "name": " When is the cheapest time to move to {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Aim to move in the spring or fall for the best rates and nice weather. Summer is the most expensive and busy time. You can find the lowest prices in the winter, but you will have colder travel days."
                }
                },
                {
                "@type": "Question",
                "name": " What are my first tasks after arriving in {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "After you arrive, get your power and water turned on. Change your address and switch your driver's license to an Alabama one. Find your nearest grocery store and pharmacy and take some time to explore your new neighborhood."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "What will my move from {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} cost?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most people pay between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }} to move from  {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}. Your final price depends on how much furniture you have and the moving service you choose. Packing your own boxes or moving between October and April can reduce your bill. "
                }
                },
                {
                "@type": "Question",
                "name": "How long is the trip from {{ $stateToCityRoute->cityTo->name }} to
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You'll travel about {{ number_format($stateToCityRoute->miles) }} miles from {{ $stateToCityRoute->stateFrom->name }} and
                        {{ $stateToCityRoute->cityTo->name }}. Your exact mileage will change based on your starting city."
                }
                },
                {
                "@type": "Question",
                "name": "Why should I move to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{ $stateToCityRoute->cityTo->name }} offers good value for your money, reliable jobs, and friendly neighbors. It's a solid option if you want a fresh start or a better lifestyle. We recommend checking the local cost of living and employment scene first to see if it works for you."
                }
                },
                {
                "@type": "Question",
                "name": "When should I schedule my move from  {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Plan your move for spring or fall. You'll get pleasant weather and better moving rates. Summer costs the most and keeps movers busiest. Winter brings lower prices but colder travel days."
                }
                },
                {
                "@type": "Question",
                "name": "  What are the first things I should do after moving to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "After you arrive, turn on your electricity and water. Change your address and get an Alabama driver's license. Find your closest grocery store and pharmacy, then take a drive to learn your way around town."
                }
                }
            ]
            }
        </script>
    @elseif (in_array($stateToCityRoute->stateFrom->slug, $statesTemplate8))
        <script type="application/ld+json" class="schema-cost">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                "@type": "Question",
                "name": "What does it cost to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Most people pay between {{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }} to move from {{ $stateToCityRoute->stateFrom->name }} to
                        {{ $stateToCityRoute->cityTo->name }}. Your final price depends on how much furniture you have and
                        the moving service you choose. Packing your own boxes or moving between October and April can reduce
                        your bill."
                }
                },
                {
                "@type": "Question",
                "name": " How long is the trip from {{ $stateToCityRoute->cityTo->name }} from
                    {{ $stateToCityRoute->stateFrom->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "You'll travel about {{ number_format($stateToCityRoute->miles) }} miles from {{ $stateToCityRoute->stateFrom->name }} to
                        {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        covers roughly {{ number_format($stateToCityRoute->miles) }} miles. Your exact mileage will change based on where
                        you begin your trip."
                }
                },
                {
                "@type": "Question",
                "name": "  Should I move to {{ $stateToCityRoute->cityTo->name }},
                    {{ $stateToCityRoute->cityTo->state->abv }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Moving to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}
                        can be a great decision for people seeking new opportunities and improved daily life. The city
                        provides affordable housing, consistent employment options, and friendly neighborhoods. Before you
                        commit, research the local living costs, job availability, and community atmosphere to ensure it
                        matches your preferences."
                }
                },
                {
                "@type": "Question",
                "name": "When is the ideal time to move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Spring and fall offer the best conditions for your move, with comfortable weather and lower moving
                        company rates. Summer brings the highest prices and greatest demand, while winter offers lower costs
                        but colder traveling weather."
                }
                },
                {
                "@type": "Question",
                "name": "What should I do right after moving to {{ $stateToCityRoute->cityTo->name }}?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "After arriving in {{ $stateToCityRoute->cityTo->name }}, activate your essential utilities, change
                        your official address, and get your Alabama driver's license. Discover nearby stores and important
                        services, then visit well-known local spots to become familiar with your new surroundings."
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
  "name": "{{ $calculatedCosts['bedrooms2_3']['company']['min_formatted'] ?? '' }} {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} - {{ date('Y') }} Movers and Cost",
  "description": "Don’t overpay for your {{ $stateToCityRoute->stateFrom->name }} to {{ $stateToCityRoute->cityTo->name }},
        {{ $stateToCityRoute->cityTo->state->abv }} move. Check authentic moving prices, top movers, and easy ways to make
        your move cheaper." ,
  "agent": {
    "@type": "Organization",
    "name": "My Moving Journey",
    "url": "https://mymovingjourney.com"
  },
  "fromLocation": {
    "@type": "Place",
    "name": "{{ $stateToCityRoute->stateFrom->name }}"
  },
  "toLocation": {
    "@type": "Place",
    "name": "{{ $stateToCityRoute->cityTo->name }}"
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
  "name": "How to Move from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}",
  "description": "Moving from {{ $stateToCityRoute->stateFrom->name }} to
                    {{ $stateToCityRoute->cityTo->name }}? Professional movers usually cost between, moving containers average around, and renting a truck costs about. Learn which movers people actually use and what to expect before booking.",
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
          "text": "Rated 4.5 out of 5 stars. A licensed moving company based in Brookside, {{ $stateToCityRoute->stateFrom->name }} operating under DOT #Ea consequuntur nisi and MC #Tempora sunt volupta. The company has 100% positive reviews and 0% negative feedback."
        },
        {
          "@type": "HowToTip",
          "name": "Moving Container Companies",
          "text": "Moving containers are a great way to save money without doing everything on your own. You take care of packing and unpacking, while the company manages the driving, picking up the container in {{ $stateToCityRoute->stateFrom->name }} and delivering it to your new home."
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
      "text": "Schedule your water, electricity, and internet to be turned off in {{ $stateToCityRoute->stateFrom->name }} and turned on in {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }} before you arrive.",
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
      "name": "Travel to {{ $stateToCityRoute->cityTo->name }}, {{ $stateToCityRoute->cityTo->state->abv }}",
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
