@extends('layouts.app')

@section('title')
    ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}) Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}
@endsection

@section('meta_description')
    @if (in_array($cityToCityRoute->cityFrom->state->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Planning a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?
        Learn what impacts moving costs and find trusted movers for a smooth relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Thinking about relocating from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}
        to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Find what affects the cost of
        moving and find reliable movers to make
        the process smooth.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Find out what affects moving costs and get reliable movers for a
        stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and find reliable movers to ensure
        an easy relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Plan your move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}. Discover what affects your moving costs and find trusted movers for a
        smooth, stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable
        movers for a stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable
        movers for an easy, stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Thinking about moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and connect with reliable movers for
        an easy, stress-free relocation.
    @endif
@endsection 
@section('meta_keywords')
{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}
@endsection
@section('og:title')
    {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '' }} Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
    {{ $cityToCityRoute->cityTo->name }},
    {{ $cityToCityRoute->cityTo->state->abv }}
@endsection
@section('og:description')
    @if (in_array($cityToCityRoute->cityFrom->state->slug, [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
        ]))
        Planning a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Learn what impacts moving costs and find trusted movers for a smooth
        relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Thinking about relocating from {{ $cityToCityRoute->cityFrom->name }},
        {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Find what affects the cost of moving and find reliable movers to make
        the process smooth.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Find out what affects moving costs and get reliable movers for a
        stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and find reliable movers to ensure
        an easy relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Plan your move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}. Discover what affects your moving costs and find trusted movers for a
        smooth, stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable
        movers for a stress-free relocation.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable
        movers for an easy, stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Thinking about moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }},
        {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and connect with reliable movers for
        an easy, stress-free relocation.
    @endif
@endsection
{{-- @section('og:image')
@php
    $from = $cityToCityRoute->cityFrom->name;
    $to   = $cityToCityRoute->cityTo->name;
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
    <link rel="stylesheet" href="{{ asset('assets/css/routes/city-to-city-diff-route.css') }}">
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
                        <span class="move_cost_studio_min" style="font-family: var(--family);">({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '' }}) </span>
                        Move Cost from {{ $cityToCityRoute->cityFrom->name }},
                        {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }},
                        {{ $cityToCityRoute->cityTo->state->abv }}
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
                            <p class="miles_upp">Moving Distance: {{ number_format($cityToCityRoute->miles) }} miles</p>
                        </div>
                        <div class="form_bg">
                            <div class="row">
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from"
                                            {{-- value="{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}, USA" --}}
                                            class="zipfromsearch pac-target-input mmj-zip-from"
                                            placeholder="Enter City Name" autocomplete="off" >
                                        <span id="external_zipfrom_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            {{-- value="{{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}, USA" --}}
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

        @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
            <p><b>Costs and Miles: </b>A move from <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> covers about <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span>.You can expect to spend between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>,
                depending on your home size and how you plan the move. The final price changes based on when you move, how
                much you take, and if you hire professionals or rent a truck for a DIY move.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
            <p><b>Costs and Miles: </b>The distance from <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is about <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }} miles</span>.
                Depending on your home size and moving approach, costs may range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>. The total amount varies with the time of year, the
                volume of your belongings, and whether you choose a professional service or rent a truck for a
                do-it-yourself move.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
            <p><b>Costs and Miles: </b>The distance between <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is around <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span>.Moving costs usually range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>,
                depending on your home’s size and how you organize the move. Your total expenses change based on the season,
                the amount of belongings you have, and whether you use professional movers or rent a truck for a DIY
                relocation.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
            <p><b>Costs and Miles: </b>The distance between <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is roughly <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span>.Moving costs typically range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, depending on your home’s size and your moving plan.
                Your total price varies based on
                the time of year, the amount you’re moving, and whether you hire professional movers or rent a truck for a
                DIY move.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
            <p><b>Costs and Miles: </b>Planning a move from <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b>? You'll be traveling roughly <span class="miles_upp">
                    {{ number_format($cityToCityRoute->miles) }} miles</span>.Your final cost will generally fall between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, shaped by what you move and how you handle it. The
                total you pay depends on your
                home's size, the moving date, and whether you hire pros or do it yourself.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
            <p><b>Costs and Miles: </b>The distance between <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is roughly <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span>.Your moving costs will likely fall between <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, based on the size of your home and how you organize
                the move. The total amount can
                depend on moving date, the volume of your belongings, and whether you choose professional movers or go with
                a DIY truck rental.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
            <p><b>Costs and Miles: </b>The distance from <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is roughly <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span>.Moving costs typically range from <b><span
                        class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to <b><span
                        class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, depending on your home size and how you organize
                the move. Your total can vary based
                on your moving date, the amount of belongings, and whether you hire professional movers or rent a truck for
                a DIY move.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
            <p><b>Costs and Miles: </b>Traveling from <b>{{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> spans roughly <span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }} miles</span>.
                Moving costs typically range from <b><span class="move_cost_rental_truck_2_3_bedroom_min">{{ $calculatedCosts['bedrooms2_3']['truck']['min_formatted'] ?? '$0' }}</span></b> to
                <b><span class="move_cost_2_3_bedroom_max">{{ $calculatedCosts['bedrooms2_3']['company']['max_formatted'] ?? '$0' }}</span></b>, depending on
                your home size and moving approach. The final cost varies based on your moving date, the amount of
                belongings, and whether you hire professional movers or opt for a DIY truck rental.
            </p>
        @endif

        <section class="featured-partners pb-5">
            <div class="container">
                <h2 class="featured-partners-title">Featured Movers from {{ $cityToCityRoute->cityFrom->name }},
                    {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}</h2>
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

                                    <div class="company_name" style=" font-size: 22px !important; font-weight : 600 !important; ">International Van Lines</div>
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

                                    <div class="company_name" style=" font-size: 22px !important; font-weight : 600 !important; ">American Van Lines</div>
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

                                    <div class="company_name" style=" font-size: 22px !important; font-weight : 600 !important; ">Safeway Moving Inc</div>
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
                            <div class="company-name" id="title-of-company-name">
                                {{ $localMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </div>
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
                            <div class="company-name" id="title-of-company-name">
                                {{ $interstateMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </div>
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
                            <div class="company-name" id="title-of-company-name">
                                {{ $containerMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </div>
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
                            <div class="company-name" id="title-of-company-name">
                                {{ $truckRentalMover->company->company_name }}
                                <span>
                                    <img src="https://mymovingjourney.com/assets/img/MMJ_Verified_new.svg"
                                        style="width: 25px;" alt="verified">
                                </span>

                            </div>
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
            Average Moving Cost from {{ $cityToCityRoute->cityFrom->name }},
            {{ $cityToCityRoute->cityFrom->state->abv }} to
            {{ $cityToCityRoute->cityTo->name }},
            {{ $cityToCityRoute->cityTo->state->abv }}
        </h2>
        <div class="scroll-container mt-5">
            <!-- Card 1 -->
            <div class="cost-card">
                <div class="d-flex align-items-start">
                    <div class="img_wrrap">
                        <img src="{{ asset('assets/img/studio.webp') }}" alt="icon">
                    </div>
                    <div class="content_wrap">
                        <div style=" font-size: 22px !important; font-weight : 600 !important; ">Studio / 1 bedroom</div>
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
                        <div style=" font-size: 22px !important; font-weight : 600 !important; ">2 – 3 bedrooms</div>
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
                        <div style=" font-size: 22px !important; font-weight : 600 !important; ">4+ bedrooms</div>
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

        <h2>Best Local Moving Companies for Your {{ $cityToCityRoute->cityFrom->name }} to
            {{ $cityToCityRoute->cityTo->name }} Move</h2>
        @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
            <p>It’s not easy to find a moving company in {{ $cityToCityRoute->cityFrom->name }} that you can trust for
                your move to {{ $cityToCityRoute->cityTo->name }}. But we’ve done the research and found the best movers
                for the job.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
            <p>Finding a reliable moving company in {{ $cityToCityRoute->cityFrom->name }} for your move to
                {{ $cityToCityRoute->cityTo->name }} can be challenging. Fortunately, we’ve already done the homework and
                identified the top movers to handle your relocation with care.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
            <p>Finding a reliable moving company in {{ $cityToCityRoute->cityFrom->name }} for your move to
                {{ $cityToCityRoute->cityTo->name }} can be challenging. Fortunately, we’ve already researched and picked
                the most dependable movers to handle your move smoothly.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
            <p>Finding a trustworthy moving company in {{ $cityToCityRoute->cityFrom->name }} for your move to
                {{ $cityToCityRoute->cityTo->name }} can be challenging. Luckily, we’ve done the research and selected the
                best movers to handle your relocation smoothly.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
            <p>Struggling to find a trustworthy moving company in {{ $cityToCityRoute->cityFrom->name }} for your
                {{ $cityToCityRoute->cityTo->name }} move? Let us help. Our research has already uncovered the most
                reliable movers for the job.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
            <p>Finding a trustworthy moving company in {{ $cityToCityRoute->cityFrom->name }} for your move to
                {{ $cityToCityRoute->cityTo->name }} can feel challenging. That’s why we took the time to research and
                find reliable movers for your relocation.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
            <p>Finding a reliable moving company in {{ $cityToCityRoute->cityFrom->name }} for your
                {{ $cityToCityRoute->cityTo->name }} relocation can be challenging. That’s why we’ve researched and
                identified the top movers to make your move easier.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
            <p>Finding a reliable moving company in {{ $cityToCityRoute->cityFrom->name }} for your
                {{ $cityToCityRoute->cityTo->name }} move can be challenging. Luckily, we’ve done the research and
                identified the top movers you can count on.
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
                        <h3 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseInfo{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseInfo{{ $localMover->id }}"> Company
                                Info</button></h3>
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
                        <h3 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseService{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseService{{ $localMover->id }}">Services
                                Offered</button></h3>
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
                        <h3 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseCost{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseCost{{ $localMover->id }}"> Average
                                Cost</button></h3>
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
                        <h3 class="accordion-header"><button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOperation{{ $localMover->id }}"
                                aria-expanded="false" aria-controls="collapseOperation{{ $localMover->id }}"> States
                                Of Opertation </button></h3>
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
                                {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}
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
                                <div class="results-heading">Your Top Movers</div>
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

        <section class="state_Route_bottom_content">
            <h2>Things to Keep in Mind Before Moving from {{ $cityToCityRoute->cityFrom->name }} to
                {{ $cityToCityRoute->cityTo->name }}</h2>
            @php
                $cost_metric_map = [
                    'avg_rent_cost' => 'Average rent cost',
                    'avg_home_cost' => 'Average home value',
                    'avg_income' => 'Average income (per capita)',
                    // 'cost_of_living_index' => 'Cost of living Index',
                    'cost_of_living_single' => 'Cost of living (single)',
                    'cost_of_living_family' => 'Cost of living (family of four)',
                    'unemployment_rate' => 'Unemployment rate',
                    // 'avg_1_br_rent' => 'Average 1BR rent',
                    // 'avg_3_br_rent' => 'Average 3BR rent',
                    'sales_tax' => 'Sales tax',
                    'state_income_tax' => 'State income tax',
                ];
                $has_cost_data = false;
                foreach (array_keys($cost_metric_map) as $key) {
                    $from_data = $city_cost_of_living->{$key} ?? '-';
                    $to_data = $to_city_cost_of_living->{$key} ?? '-';
                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_cost_data = true;
                        break;
                    }
                }
            @endphp
            <h3>Cost of living </h3>
            @if ($has_cost_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToCityRoute->cityFrom->name ?? 'City From' }}</th>
                                <th>{{ $cityToCityRoute->cityTo->name ?? 'City To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost_metric_map as $key => $metric_name)
                                @php
                                    $from_value = $city_cost_of_living->{$key} ?? '-';
                                    $to_value = $to_city_cost_of_living->{$key} ?? '-';
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
                    'transportation_score' => 'Transportation score',
                    'walkability_score' => 'Walkability score',
                    'bike_friendliness_score' => 'Bike friendliness score',
                    'crime_index' => 'Crime Index',
                    'safety_index' => 'Safety Index',
                    'air_quality' => 'Air Quality',
                    // 'summer_high' => 'Summer High',
                    // 'winter_low' => 'Winter Low',
                    // 'annual_rainfall' => 'Annual Rainfall',
                    // 'annual_snowfall' => 'Annual Snowfall',
                ];
                $has_data = false;
                foreach (array_keys($metric_map) as $key) {
                    $from_data = $city_life_style->{$key} ?? '-';
                    $to_data = $to_city_life_style->{$key} ?? '-';
                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_data = true;
                        break;
                    }
                }
            @endphp
            <h3>Life in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} vs.
                {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</h3>
            @if ($has_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToCityRoute->cityFrom->name ?? 'City From' }}</th>
                                <th>{{ $cityToCityRoute->cityTo->name ?? 'City To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metric_map as $key => $metric_name)
                                @php
                                    $from_value = $city_life_style->{$key} ?? '-';
                                    $to_value = $to_city_life_style->{$key} ?? '-';
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
            <h2>Nearby Neighborhoods in {{ $cityToCityRoute->cityTo->name }} for Singles</h2>
            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <p>If you’re moving to {{ $cityToCityRoute->cityTo->name }} and want a place with good energy and plenty
                    to
                    do, here are some neighborhoods that are great for singles:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3 ">Hillcrest</li>
                    <li class="mt-3">Riverdale</li>
                    <li class="mt-3">Downtown / River Market District</li>
                    <li class="mt-3">Midtown</li>
                    <li class="mt-3 ">Capitol View–Stifft Station</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <p>
                    Planning a move to {{ $cityToCityRoute->cityTo->name }}? Check out these lively neighborhoods that
                    offer plenty of activities and a vibrant atmosphere for singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Five Points South</li>
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Highland Park</li>
                    <li class="mt-3">Southside</li>
                    <li class="mt-3">Forest Park</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <p>
                    Planning to settle in {{ $cityToCityRoute->cityTo->name }}? Check out these vibrant neighborhoods that
                    offer plenty of activities and a lively atmosphere for singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Five Points South</li>
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Highland Park</li>
                    <li class="mt-3">Southside</li>
                    <li class="mt-3">Forest Park</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <p>
                    Planning to move to {{ $cityToCityRoute->cityTo->name }}? Check out these lively neighborhoods that
                    offer plenty of activities and a vibrant atmosphere for singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Lakeview District</li>
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Highland Park</li>
                    <li class="mt-3">Five Points South</li>
                    <li class="mt-3">Downtown {{ $cityToCityRoute->cityTo->name }}</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <p>
                    Looking for a vibrant neighborhood in {{ $cityToCityRoute->cityTo->name }} with an active social
                    scene? Consider these excellent areas that cater particularly well to singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Downtown {{ $cityToCityRoute->cityTo->name }}</li>
                    <li class="mt-3">Lakeview</li>
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Southside</li>
                    <li class="mt-3">Five Points South</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <p>
                    Planning a move to {{ $cityToCityRoute->cityTo->name }} and searching for a place with a fun,
                    energetic vibe and plenty to do? These neighborhoods are a great fit for singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Mountain Brook Village</li>
                    <li class="mt-3">Downtown {{ $cityToCityRoute->cityTo->name }} / Railroad Park District</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Southside / Five Points South</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <p>
                    Looking to move to {{ $cityToCityRoute->cityTo->name }} and find a lively area with lots to enjoy?
                    These neighborhoods are perfect for singles:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Downtown {{ $cityToCityRoute->cityTo->name }} / Uptown District</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Five Points South</li>
                    <li class="mt-3">Southside / Railroad Park area</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <p>While moving to {{ $cityToCityRoute->cityTo->name }}, if you’re looking for neighborhoods with great
                    energy and plenty of activities, these areas are ideal for singles:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">Lakeview</li>
                    <li class="mt-3">Avondale</li>
                    <li class="mt-3">Southside / Five Points South</li>
                    <li class="mt-3">Downtown {{ $cityToCityRoute->cityTo->name }}</li>
                    <li class="mt-3">Crestwood</li>
                </ul>
            @endif

        </section>
        <section>
            <h2>Nearby Neighborhoods in {{ $cityToCityRoute->cityTo->name }} for Families</h2>
            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <p>
                    If you’re moving with your family, these areas of {{ $cityToCityRoute->cityTo->name }} offer space,
                    good schools, and safe streets:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">West {{ $cityToCityRoute->cityTo->name }}</li>
                    <li class="mt-3">The Heights</li>
                    <li class="mt-3">Pulaski Heights</li>
                    <li class="mt-3">Chenal Valley</li>
                    <li class="mt-3">Midtown {{ $cityToCityRoute->cityTo->name }}</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <p>
                    For families relocating to {{ $cityToCityRoute->cityTo->name }}, these neighborhoods provide spacious
                    living, quality schools, and safe surroundings:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Trussville</li>
                    <li class="mt-3">Hoover</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <p>
                    For families relocating to {{ $cityToCityRoute->cityTo->name }}, these neighborhoods provide spacious
                    homes, quality schools, and safe communities:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Trussville</li>
                    <li class="mt-3">Hoover</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <p>
                    For families relocating to {{ $cityToCityRoute->cityTo->name }}, these neighborhoods provide plenty of
                    space, excellent schools, and safe communities:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Crestline Heights</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Hoover</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Mountain Brook</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <p>
                    For families moving to {{ $cityToCityRoute->cityTo->name }}, these neighborhoods offer excellent
                    schools, safe streets, and plenty of space:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Hoover</li>
                    <li class="mt-3">Crestwood</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <p>
                    For those relocating with kids, these parts of {{ $cityToCityRoute->cityTo->name }} provide room to
                    grow, quality schools, and secure surroundings:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Hoover</li>
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Briarwood / Crestline</li>
                    <li class="mt-3">Shelby County suburbs</li>
                    <li class="mt-3">Vestavia Hills</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <p>
                    Relocating with your family? These {{ $cityToCityRoute->cityTo->name }} neighborhoods provide room to
                    grow, quality schools, and safe streets:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Shoal Creek</li>
                    <li class="mt-3">Crestline / Highland Park</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Briarwood / Cahaba Heights</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <p>
                    For families relocating to {{ $cityToCityRoute->cityTo->name }}, these neighborhoods offer plenty of
                    space, excellent schools, and safe streets:
                </p>

                <ul class="neighborhoods-ul">
                    <li class="mt-3">Mountain Brook</li>
                    <li class="mt-3">Homewood</li>
                    <li class="mt-3">Vestavia Hills</li>
                    <li class="mt-3">Hoover</li>
                    <li class="mt-3">Briarwood</li>
                </ul>
            @endif

        </section>
        <section>
            <h2>Explore {{ $cityToCityRoute->cityTo->name }} Attractions</h2>
            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <p>Here are some must-see spots in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">William J. Clinton Presidential Library and Museum</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Central High School National Historic Site
                    </li>
                    <li class="mt-3">Big Dam Bridge</li>
                    <li class="mt-3">Museum of Discovery</li>
                    <li class="mt-3">Arkansas Museum of Fine Arts</li>
                    <li class="mt-3">River Market District</li>
                    <li class="mt-3">Pinnacle Mountain State Park</li>
                    <li class="mt-3">Old State House Museum</li>
                    <li class="mt-3">Arkansas State Capitol</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Zoo</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <p>Don’t miss these popular attractions when exploring {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Botanical Gardens</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Zoo</li>
                    <li class="mt-3">Regions Field</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <p>Be sure to check out these popular attractions in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Botanical Gardens</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Zoo</li>
                    <li class="mt-3">Regions Field</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <p>Be sure to explore these popular attractions in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Botanical Gardens</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">Barber Vintage Motorsports Museum</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">Ruffner Mountain Nature Preserve</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <p>Below are the must visit places you will find in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Zoo</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Legion Field</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">The Markets at Pepper Place</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <p>Below are a few top places to check out in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Barber Vintage Motorsports Museum</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">Regions Field (home of the {{ $cityToCityRoute->cityTo->name }} Barons)</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Zoo</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <p>Check out these must-visit attractions in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">Barber Vintage Motorsports Museum</li>
                    <li class="mt-3">Regions Field (home of the {{ $cityToCityRoute->cityTo->name }} Barons)</li>
                    <li class="mt-3">Red Mountain Park</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Botanical Gardens</li>
                </ul>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <p>These are some must-see spots in {{ $cityToCityRoute->cityTo->name }}:</p>
                <ul class="neighborhoods-ul">
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Civil Rights Institute</li>
                    <li class="mt-3">Vulcan Park and Museum</li>
                    <li class="mt-3">McWane Science Center</li>
                    <li class="mt-3">Railroad Park</li>
                    <li class="mt-3">Sloss Furnaces National Historic Landmark</li>
                    <li class="mt-3">Barber Vintage Motorsports Museum</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Botanical Gardens</li>
                    <li class="mt-3">Regions Field</li>
                    <li class="mt-3">{{ $cityToCityRoute->cityTo->name }} Museum of Art</li>
                    <li class="mt-3">Red Mountain Park</li>
                </ul>
            @endif

        </section>
        <div class="faq-section mt-5">
            <h2>Frequently Asked Questions</h2>

            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template1_alabama')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template2_california')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template3_colorado')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template4_florida')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template5_massachusetts')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template6_michigan')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template7_texas')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                @include('frontend.company_auth.route_pages.city_to_city_diff_state_route_faqs.template8_washington')
            @endif
        </div>
    </div>

    <div id="moveData" data-state-from="{{ $cityToCityRoute->cityFrom->name ?? '' }}"
        data-state-abv-from="{{ $cityToCityRoute->cityFrom->state->abv ?? '' }}"
        data-city-to="{{ $cityToCityRoute->cityTo->name ?? '' }}"
        data-state-abv-to="{{ $cityToCityRoute->cityTo->state->abv ?? '' }}">
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

    @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}) Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Planning a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, ,{{ $cityToCityRoute->cityTo->state->abv }}? Learn what impacts moving costs and find trusted movers for a smooth relocation."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}) Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Thinking about relocating from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Find what affects the cost of moving and find reliable movers to make the process smooth."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Find out what affects moving costs and get reliable movers for a stress-free relocation."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Getting ready to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and find reliable movers to ensure an easy relocation."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Plan your move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. Discover what affects your moving costs and find trusted movers for a smooth, stress-free relocation."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable movers for a stress-free relocation."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects your moving costs and connect with reliable movers for an easy, stress-free move."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }})  Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Thinking about moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Discover what affects moving costs and connect with reliable movers for an easy, stress-free relocation."
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
                "name": "Popular Moving Routes from {{ $cityToCityRoute->cityFrom->name }}",
                "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($cityToCityRoute->cityFrom->state->abv) }}"
            },
            {
                "@type": "ListItem",
                "position": 4,
                "name": "Popular Moving Routes from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}",
                "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($cityToCityRoute->cityFrom->state->abv) }}/{{ $cityToCityRoute->cityFrom->slug }}"
            },
            {
                "@type": "ListItem",
                "position": 5,
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}) Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "item": "{{url()->current()}}"
            }
            ]
        }
    </script>

    @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
        <script type="application/ld+json"  class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                {
                    "@type": "Question",
                    "name": "How long does the move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }} take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves between {{ $cityToCityRoute->cityFrom->name }} and {{ $cityToCityRoute->cityTo->name }} take about one to four days, depending on how much you’re moving, the route, and whether you hire a full-service mover or do it yourself."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What will it cost to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Costs vary quite a bit based on home size and services. For example, full-service moving companies on this route often charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or 1-bedroom, and can go higher for larger homes."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What factors affect moving costs on the {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Key factors include how large your home or load is, what moving services you choose (full service vs DIY vs truck rental), and timing (seasonality). These all influence your final cost."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Will my cost of living change after moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "There are some differences. For example, everyday expenses like groceries and utilities may shift slightly. Some living costs may go up; it’s a good idea to compare things before you move to see how your budget might change."
                    }
                },
                {
                    "@type": "Question",
                    "name": "When is the best time to schedule a move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are generally ideal because they tend to avoid peak pricing and extreme weather. Moving during slower seasons (like winter) may offer lower rates."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How much time does it take to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "A typical move between {{ $cityToCityRoute->cityFrom->name }} and {{ $cityToCityRoute->cityTo->name }} usually takes around three to five days, depending on how much you’re moving, the route you take, and whether you hire professionals or handle the move yourself."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What’s the average price to relocate from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The cost depends on your home’s size and the moving services you choose. On average, full-service movers charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom move, with prices increasing for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "  Which factors influence the moving cost from  {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Your total cost depends on a few main things, such as the size of your move, the type of service you pick (full-service movers, DIY, or truck rental), and the time of year you relocate."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will living expenses change after moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "You might notice some cost differences. Everyday items like groceries and utilities can vary, so it’s smart to compare expenses ahead of time to see how your budget might adjust."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What’s the best season to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are often the best times since the weather is mild and moving costs are lower. You can also find better rates if you move during the off-season, such as winter."
                    }
                }
            ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How long does it take to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "A move from {{ $cityToCityRoute->cityFrom->name }} and {{ $cityToCityRoute->cityTo->name }} usually takes three to five days, depending on the amount you’re moving, the route you take, and whether you hire professionals or move on your own."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How much does it cost to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The cost depends on your home’s size and the type of service you choose. Full-service movers usually charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom move, with higher prices for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What factors affect the moving cost from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Several things affect the price such as the size of your home, the moving service you pick (full-service, DIY, or truck rental), and the time of year you move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How will my cost of living change after moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Your living costs may change after the move. Prices for groceries, utilities, and other daily needs can differ, so compare costs ahead of time to see how your budget might shift."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When should I plan my move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Plan your move in spring or fall to enjoy mild weather and lower prices. If you move during winter, you might find even better deals since it’s a slower season."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How much time does it take to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most movers complete the trip from {{ $cityToCityRoute->cityFrom->name }} and {{ $cityToCityRoute->cityTo->name }} in one to seven days, depending on how much you’re moving, the route, and whether you hire professionals or move on your own."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How much does it cost to relocate from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving costs depend on your home’s size and the services you choose. On average, full-service movers charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom move, with higher prices for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What factors influence the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Your total cost depends on several things like the size of your home or shipment, the type of moving service you select (full-service, DIY, or truck rental), and the time of year you move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will my living costs change after moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "You might notice some changes in everyday expenses like groceries and utilities. It’s smart to compare costs ahead of time so you know how your budget might shift after the move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When should I plan my move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall usually offer the best balance of mild weather and reasonable prices. If you move during the winter, you might find even lower rates since it’s the off-season."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "What is the average driving time for a move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Your move from {{ $cityToCityRoute->cityFrom->name }} and {{ $cityToCityRoute->cityTo->name }} will typically take between four and six days. The exact time depends on the size of your shipment, the specific route, and whether you hire a full-service moving company or manage the move yourself."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How much does it cost to relocate from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The price can vary greatly depending on the size of your home and the services you choose. For example, full-service moving companies usually charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or 1-bedroom apartment, with prices rising for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What factors impact the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Several things influence your moving costs, such as the size of your home or load, the type of services you select (full-service, DIY, or truck rental), and the timing of your move (seasonal fluctuations). All of these will affect your final price."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will my cost of living change after moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Yes, you can expect some changes in your cost of living. Everyday items like groceries and utilities will likely have different price points. We recommend comparing specific expenses beforehand to understand how your budget will be affected."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When is the best time to schedule a move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "For the best balance of price and weather, we suggest planning your move for the spring or fall. If you want to secure the lowest possible rates, consider scheduling during the off-peak winter season."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How long does it usually take to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most relocations between {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }} take around one to two days. The exact timing depends on how much you’re moving, the route taken, and whether you choose full-service movers or handle the move yourself."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What does it cost to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving prices can vary widely based on your home size and the services you select. On this route, full-service movers often charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom, with higher rates for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What influences the cost of a move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Several things affect your final price, including how big your home or shipment is, the type of moving service you choose (full service, DIY, or truck rental), and the time of year you move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will the cost of living change after relocating from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Yes, there can be some adjustments. Daily expenses like groceries and utilities may change slightly. Some costs could increase, so comparing expenses ahead of time can help you plan your budget."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What is the best time of year to move from {{ $cityToCityRoute->cityFrom->name }} (or {{ $cityToCityRoute->cityFrom->state->name }}) to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are often the best choices since they usually avoid peak prices and harsh weather. Moving during off-peak times, such as winter, may also come with lower rates."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How long does it take to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }} take around two to three days. The timing depends on how much you’re moving, the route, and whether you hire full-service movers or handle it yourself."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What is the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving costs can vary widely depending on home size and services. Full-service movers on this route usually charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom, with higher prices for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What affects the cost of a move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Several factors influence your final cost, including the size of your home or shipment, the type of moving service you choose (full-service, DIY, or truck rental), and the time of year you move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will my cost of living change after relocating from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Yes, there may be some differences. Everyday expenses like groceries and utilities can shift slightly. Some costs might increase, so it’s wise to compare expenses before moving to plan your budget."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When is the best time to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are generally the best times to move, as weather is mild and moving costs are lower. Off-peak times like winter may also offer reduced rates."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How long does it take to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves along {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }} take about five to seven days. The exact time depends on how much you’re moving, the route you take, and whether you hire professional movers or handle it yourself."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What is the cost of moving from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving expenses can vary widely based on your home size and chosen services. For example, full-service movers often charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or one-bedroom, with prices increasing for larger homes."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What influences moving costs from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The main factors include the size of your home or load, the type of moving services you pick (full-service, DIY, or truck rental), and the timing of your move. Each of these can affect your final cost."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Will my living expenses change after relocating from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Some costs may shift. Everyday expenses like groceries and utilities can be slightly higher or lower. It’s smart to compare costs beforehand so you know how your budget might adjust."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When is the best time to move from {{ $cityToCityRoute->cityFrom->name }} to {{ $cityToCityRoute->cityTo->name }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are often the best times to move because you avoid peak rates and harsh weather. Moving during slower seasons, like winter, can sometimes save money."
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
                        "worstRating": "{{$min_rating ?? '0'}}",
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
  "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
  "description": "Find trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} with prices between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth and stress-free move.",
  "agent": {
    "@type": "Organization",
    "name": "My Moving Journey",
    "url": "https://mymovingjourney.com"
  },
  "fromLocation": {
    "@type": "Place",
    "name": "{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}"
  },
  "toLocation": {
    "@type": "Place",
    "name": "{{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}"
  },
  "object": {
    "@type": "Thing",
    "name": "{{ request()->input('move_size') ?? '4 Bedroom Home, 3 Bedroom Home, 2 Bedroom Home, 1 Bedroom Home, Studio' }}"
  },
  "target": {
    "@type": "EntryPoint",
    "urlTemplate": "{{ url()->current() }}",
    "actionPlatform": [
      "https://schema.org/DesktopWebPlatform",
      "https://schema.org/MobileWebPlatform"
    ]
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HowTo",
  "name": "How to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
  "description": "Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}? Professional movers usually cost between, moving containers average around, and renting a truck costs about. Learn which movers people actually use and what to expect before booking.",
  "estimatedCost": {
    "@type": "MonetaryAmount",
    "currency": "USD",
    "value": "{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}"
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
      "text": "Start preparing at least a month or two before your move. Get quotes from moving companies and decide on your moving date."
      
    },
    {
      "@type": "HowToStep",
      "name": "Set a Budget",
      "text": "List all possible costs like packing supplies, truck rental, gas, and temporary housing if needed."
     
    },
    {
      "@type": "HowToStep",
      "name": "Declutter Your Home",
      "text": "Go through your things and donate or sell items you don't need. It will save space and money."
    
    },
    {
      "@type": "HowToStep",
      "name": "Gather Packing Supplies",
      "text": "Get boxes, tape, and labels. Pack room by room and keep essentials separate for the first few days."
     
    },
    {
      "@type": "HowToStep",
      "name": "Select a Trusted Mover",
      "text": "Choose a reliable moving company based on customer feedback and ratings.",
      "itemListElement": [
        {
          "@type": "HowToTip",
          "name": "Joyner and Meyer Associates",
          "text": "Rated 4.5 out of 5 stars. A licensed moving company based in Brookside, {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} operating under DOT #Ea consequuntur nisi and MC #Tempora sunt volupta. The company has 100% positive reviews and 0% negative feedback."
        },
        {
          "@type": "HowToTip",
          "name": "Moving Container Companies",
          "text": "Moving containers are a great way to save money without doing everything on your own. You take care of packing and unpacking, while the company manages the driving, picking up the container in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and delivering it to your new home."
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
      "text": "Schedule your water, electricity, and internet to be turned off in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and turned on in {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} before you arrive.",
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
      "name": "Travel to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
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
