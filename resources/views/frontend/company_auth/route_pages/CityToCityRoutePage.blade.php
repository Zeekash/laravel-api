@extends('layouts.app')
@section('title')
    ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
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
        Find trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} with prices between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth and stress-free
        move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Looking for a reliable mover between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}? Prices typically range from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, so you can find that fits your budget.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}. Enjoy affordable help for an easy, stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Looking for reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}? Expect costs from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get budget-friendly help to make your move easy and
        worry-free.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} with rates ranging from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get budget-friendly moving support for easy,
        stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Hire a trusted mover from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} Prices start around {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and go up to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. This affordable service takes the stress out of your
        move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Hire reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} for {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable help to make your move easy and stress-free.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        Rusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} offer rates between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth, hassle-free
        relocation.
    @endif
@endsection
@section('meta_keywords')
{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}
@endsection
@section('og:title')
    ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}-{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}
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
        Find trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} with prices between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth and
        stress-free
        move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'california',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ]))
        Looking for a reliable mover between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}? Prices typically range from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}, so you can find that fits your budget.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah']))
        Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}. Enjoy affordable help for an easy, stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'florida',
            'tennessee',
            'west-virginia',
            'vermont',
            'rhode-island',
            'new-jersey',
        ]))
        Looking for reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }}? Expect costs from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get budget-friendly help to make your move easy and
        worry-free.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
        ]))
        Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} with rates ranging from {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get budget-friendly moving support for easy,
        stress-free move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'michigan',
            'indiana',
            'iowa',
            'kansas',
            'minnesota',
            'missouri',
        ]))
        Hire a trusted mover from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} Prices start around {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and go up to {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. This affordable service takes the stress out of your
        move.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'texas',
            'arizona',
            'nebraska',
            'south-dakota',
            'wisconsin',
            'wyoming',
        ]))
        Hire reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} for {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable help to make your move easy and stress-free.
    @elseif(in_array($cityToCityRoute->cityFrom->state->slug, [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
        ]))
        rusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
        {{ $cityToCityRoute->cityTo->name }} offer rates between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth, hassle-free
        relocation.
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
                        (<span class="move_cost_studio" style="font-family: var(--family);">{{ $calculatedCosts['studio']['company']['range_formatted'] ?? '$0 - $0' }}</span>) Movers From
                        {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }},
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
            <p><b>Average cost: </b>Moving from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is about <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b>. Hiring professional movers usually costs between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and
                <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>. The total cost depends on your moving date, distance,
                and home size. You can save money by doing it yourself instead of hiring movers.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
            <p><b>Average cost: </b>The drive from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is about <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b>. Professional movers often charge between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and
                <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b> for this route. Your final price hinges on the moving
                date, the total distance, and how big your home is. You can cut costs by moving yourself instead of hiring a
                crew.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
            <p><b>Average cost: </b>Typical moving expenses for a trip from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> cover about <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b>. Professional movers usually charge between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and
                <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>. Final pricing changes based on your move date, the
                distance, and the size of your home. Handling the move on your own can help cut costs compared to hiring a
                full moving team.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
            <p><b>Average cost: </b>The trip from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> covers about <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b> Professional movers for this route usually charge between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> to
                <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>Your final cost changes based on your move date, how far
                you travel, and the size of your home. You can cut expenses by handling the move on your own instead of
                hiring a moving company.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
            <p><b>Average cost: </b>The distance from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is around <b><span class="miles_upp">
                    {{ number_format($cityToCityRoute->miles) }} miles</span></b>. Professional movers usually charge between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span
                        class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>for this move. Your moving date, total distance, and home
                size can change the final price. Choosing to handle the move yourself instead of hiring movers can help you
                cut costs.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
            <p><b>Average cost: </b>The drive from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is roughly <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b>. For a professional moving crew, you'll likely pay somewhere between <b><span
                        class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> and <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>.
                Your final price changes based on a few things such as when you move, how far it is, and how much stuff you
                have. If you handle the move yourself, you can keep more money in your pocket.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
            <p><b>Average cost: </b>The distance from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> is around <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }}
                    miles</span></b>.Hiring movers typically costs between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b>
                to
                <b><span class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>.The price varies depending on when you move, how far you
                go, and the size of your home. You can cut costs by handling the move yourself instead of paying for movers.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
            <p><b>Average cost: </b>Relocating from <b>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} </b> covers around <b><span class="miles_upp"> {{ number_format($cityToCityRoute->miles) }} miles</span></b>.
                Professional movers generally charge between <b><span class="move_cost_studio_min">{{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }}</span></b> to <b><span
                        class="move_cost_studio_max">{{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}</span></b>. Your total cost depends on the date, distance, and size
                of your home. You can cut costs by handling the move yourself instead of hiring movers.
            </p>
        @endif

        <section class="featured-partners pb-5">
            <div class="container">
                <h2 class="featured-partners-title">Featured Movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
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
            Average Moving Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
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

        <h2>Top Local Movers in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} </h2>
        @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
            <p>These local movers know the area inside and out. They’ll handle packing, transport, and everything in between
                to make your move easy and stress-free.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
            <p>The nearby movers know the area really well. They take care of packing, hauling, and all the details so your
                move feels simple and relaxed.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
            <p>Local movers understand the area really well. They take care of packing, delivery, and every step in between
                so your move feels smooth and worry-free.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
            <p>Local movers understand the area really well. They take care of packing, delivery, and all the details in
                between to keep your move simple without any hassle.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
            <p>Local movers understand this area very well. They take care of packing, hauling, and every step in between to
                keep your move simple and free of stress.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
            <p>Local movers know this area like the back of their hand. From packing to transport, the team covers every
                step and keeps your move smooth and stress-free.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
            <p>Local movers in the area know every corner well. They manage packing, transport, and everything else to keep
                your move smooth and stress-free.
            </p>
        @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
            <p>Local movers in the area know every route and neighborhood well. They take care of packing, transportation,
                and all the details to keep your move simple and worry-free.
            </p>
        @endif

        <ul class="criteria_list">
            @foreach ($local_movers as $moverlist)
                @php
                    $preAvg = $moverlist->avg_rating ?? null;
                    $preCount = $moverlist->reviews_count ?? null;

                    if (!is_null($preAvg) && !is_null($preCount)) {
                        $avg_rating = (float) $preAvg;
                        $total_reviews = (int) $preCount;
                    } else {
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
                                {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }},
                                {{ $cityToCityRoute->cityTo->state->abv }}
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

        <section class="state_Route_bottom_content">
            <h2>Things to Consider When Moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</h2>


            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <h3 class="living-cost-heading">Distance and Travel Time</h3>
                <p>The distance between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} is approximately
                    <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>, with an average travel time of about <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most movers take the main highway connecting the two cities for a direct and efficient trip.
                    Travel time can vary slightly based on traffic, weather, and moving truck size.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <h3 class="living-cost-heading">Distance and Travel Time</h3>
                <p>The drive from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} covers about
                    <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>. Most trips take around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b> on
                    average. Movers usually use the main highway for a smooth and direct route. Traffic, weather, and truck
                    size can change the timing a bit.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <h3 class="living-cost-heading">Distance and Drive Time</h3>
                <p>The trip from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} spans about
                    <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>. Most drives take close to <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b> on
                    average. Movers usually stick to the main highway for a quick and direct route. Traffic, weather, and
                    truck size can slightly change the total time.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <h3 class="living-cost-heading">Distance and Travel Time</h3>
                <p>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} sits about <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>
                    from {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. The drive
                    usually takes around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Movers often follow the main highway for a fast and direct
                    route. Traffic, weather, and truck size can slightly change the travel time.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <h3 class="living-cost-heading">Distance and Travel Time</h3>
                <p>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} sits about <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>
                    from {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. Drivers
                    usually reach DC in around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Movers follow the main highway to make the trip fast and
                    direct. Traffic, weather, and truck size can change how long the drive takes. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <h3 class="living-cost-heading">Drive Distance and Time</h3>
                <p>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} sits about <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b>
                    from {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. The usual
                    drive takes around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most movers use the main highway that links both cities for a quick,
                    direct route. Traffic, bad weather, or the size of the moving truck can slightly change the total time.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <h3 class="living-cost-heading">Travel Distance and Time</h3>
                <p>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} are about <b><span class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b> apart, and the drive usually takes around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most moving companies use the main highway for a quick and direct route. Travel time can
                    change a bit depending on traffic, weather, and the size of the moving truck.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <h3 class="living-cost-heading">Travel Distance and Time</h3>
                <p>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} are about <b><span
                            class="miles_upp">{{ number_format($cityToCityRoute->miles) }} miles</span></b> apart, and the drive usually takes around <b><span class="duration_text">{{ $duration ?? '0 hours 0 minutes' }}</span></b>. Most moving companies use the main highway that links both cities for a quick and smooth
                    trip. Travel time may change slightly depending on traffic, weather, and the size of the moving truck.
                </p>
            @endif

            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <h3 class="living-cost-heading">Cost of Living</h3>
                <p>When you compare the cost of living in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}, don’t just think
                    about home prices. Here’s how the two cities compare so you can plan your move with ease.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <h3 class="living-cost-heading">Cost of Living</h3>
                <p>Looking at living costs in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}means more than just
                    checking house prices. This quick comparison helps you understand the differences and plan your move
                    with confidence. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <h3 class="living-cost-heading">Living Costs</h3>
                <p>Comparing living expenses in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} goes beyond housing
                    alone. This breakdown shows the key differences to help you plan your move more easily. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <h3 class="living-cost-heading">Cost of Living</h3>
                <p>When comparing living costs in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}, look beyond
                    housing prices. Use this breakdown to understand how each city differs and plan your move with
                    confidence. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <h3 class="living-cost-heading">Cost of Living</h3>
                <p>Compare the cost of living in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} by looking at more
                    than just home prices. This guide shows how the two cities differ so you can plan your move easily.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <h3 class="living-cost-heading">Living Expenses</h3>
                <p>Look beyond housing prices when comparing living costs in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. Other everyday
                    expenses matter too. The breakdown below shows how both cities stack up and helps you plan your move
                    with confidence.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <h3 class="living-cost-heading">Cost of Living</h3>
                <p>When you compare the cost of living in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}, don’t just think
                    about home prices. Here’s how the two cities compare so you can plan your move with ease.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <h3 class="living-cost-heading">Cost of Living Comparison</h3>
                <p>Take some time to compare life in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and
                    {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. A clear
                    side-by-side look will help you decide which city best fits your lifestyle and needs.
                </p>
            @endif
            @php
                $cost_metric_map = [
                    'avg_rent_cost' => 'Average rent cost',
                    'avg_home_cost' => 'Average home cost',
                    'avg_income' => 'Average income (per capita)',
                    // 'cost_of_living_index' => 'Cost of living Index',
                    'cost_of_living_single' => 'Cost of living (single)',
                    'cost_of_living_family' => 'Cost of living (family of 4)',
                    'unemployment_rate' => 'Unemployment rate',
                    // 'avg_1_br_rent' => 'Average 1BR rent',
                    // 'avg_3_br_rent' => 'Average 3BR rent',
                    'avg_sales_tax' => 'Average Sales tax',
                    // 'state_income_tax' => 'State income tax',
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
            @if ($has_cost_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}</th>
                                <th>{{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</th>
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
                    'crime_index' => 'Crime Index',
                    // 'transportation_score' => 'Transportation score',
                    // 'walkability_score' => 'Walkability score',
                    // 'bike_friendliness_score' => 'Bike friendliness score',
                    // 'safety_index' => 'Safety Index',
                    // 'air_quality' => 'Air Quality',
                    'summer_high' => 'Summer High (Average)',
                    'winter_low' => 'Winter Low (Average)',
                    'annual_rainfall' => 'Annual Rainfall',
                    'annual_snowfall' => 'Annual Snowfall',
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
            <h3 class="living-cost-heading">Life in {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} vs.
                {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</h3>

            @if ($has_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}</th>
                                <th>{{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</th>
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
            <h2>Best Time of Year to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
                {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</h2>
            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <p>The best time of year to move often depends on your schedule, budget, and weather conditions. Generally,
                    spring and fall are considered ideal because temperatures are moderate and moving rates tend to be lower
                    than during the busy summer months. </p>
                <p>Summer is the most popular time to move since schools are out and the weather is predictable, but it’s
                    also the most expensive season for moving services. Winter moves can be more affordable, though weather
                    and daylight hours may affect timing. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <p>Right time to move often depends on your plans, your budget, and the weather. Many people choose spring
                    or fall because the temperatures stay mild and moving costs usually run lower than in summer. </p>
                <p>Most families move during Summer since schools close and the weather stays steady, but prices hit their
                    peak during this season. Winter moves can cost less, but bad weather and shorter daylight can slow the
                    process.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <p>The right time to move depends on your plans, your budget, and the weather. Most people find spring and
                    fall work best. The weather stays mild, and moving costs usually drop compared to summer.</p>
                <p>Many choose summer since kids are out of school and conditions stay steady. Prices rise during this
                    season because demand peaks. Winter moves cost less in many cases, but cold weather and shorter days can
                    slow things down.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <p>The right time to move depends on your plans, your budget, and the weather. Many people prefer spring or
                    fall. Mild temperatures make moving easier, and prices usually stay lower than the busy summer period.
                </p>
                <p>Summer draws the most movers because school breaks and stable weather make planning simple. Costs rise
                    during this season due to high demand. Winter moves often cost less, but cold conditions and shorter
                    days can slow the process.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <p>The right time to move usually depends on your schedule, budget, and the weather. Most people find spring
                    and fall the best seasons since the temperatures are mild and moving costs are often lower than in
                    summer.</p>
                <p>Many choose to move in summer because school is out and the weather is steady, but it’s also the priciest
                    time for moving companies. Winter moves often cost less, but cold weather and shorter days can slow
                    things down.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <p>Your schedule, budget, and the weather usually decide the best time to move. Spring and fall often work
                    well because the temperatures stay mild and moving prices stay lower than in summer. </p>
                <p>Many people choose summer since schools close and the weather stays steady. This season also brings the
                    highest costs for moving services. Winter can save you money, but shorter days and rough weather may
                    slow things down. </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <p>Ideal time to move depends on your schedule, budget, and the weather. Spring and fall are usually the top
                    choices since the weather is mild and moving costs are often lower than in summer.</p>
                <p>Summer is the busiest season for moving because school is out and the weather is steady, but prices are
                    higher. Moving in winter can save money, though shorter days and cold weather might slow things down.
                </p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <p>The ideal time to move depends on your schedule, budget, and weather. Spring and fall are usually the
                    most comfortable seasons since the temperatures are mild and moving rates are lower than in summer. </p>
                <p>Summer is the busiest time for moves because school is out and the weather is steady, but prices are
                    higher. Winter moves can cost less, though shorter days and colder conditions might affect timing. </p>
            @endif

        </section>
        <section>
            <h2>Tips for Adjusting to Life in {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityFrom->state->abv }}</h2>
            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                <p>Here are a few practical tips to help you adjust to life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}</p>
                <h3 class="living-cost-heading">Explore Your New Neighborhood</h3>
                <p>Take time to get familiar with nearby grocery stores, restaurants, parks, and essential services. This
                    will make your daily routine much smoother.</p>

                <h3 class="living-cost-heading">Get Involved in the Community</h3>
                <p>Join local clubs, attend neighborhood events, or volunteer for community activities. This helps you build
                    connections and feel part of your new surroundings more quickly.</p>

                <h3 class="living-cost-heading">Establish a Routine Early</h3>
                <p>Try to maintain a regular schedule, especially during your first few weeks. A routine helps you adapt
                    more easily and feel more in control of your new environment.</p>

                <h3 class="living-cost-heading">Connect With Locals and Neighbors</h3>
                <p>Introduce yourself to neighbors or coworkers, and do not hesitate to ask for recommendations on local
                    spots. Locals can offer valuable insights and help you feel welcome.</p>

                <h3 class="living-cost-heading">Take Advantage of Local Resources</h3>
                <p>Explore libraries, community centers, and online city resources for information about local events,
                    services, and utilities. This will help you feel confident and independent in your new city.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                <p>Below are the few tips that can help you adjust to life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}.</p>

                <h3 class="living-cost-heading">Get to Know Your Area</h3>
                <p>Look for the closest grocery stores, parks, and other important spots. Knowing where things are will make
                    your days easier.</p>

                <h3 class="living-cost-heading">Meet People in Town</h3>
                <p>Join a local group or go to a community event. Meeting new people helps you feel at home much faster.</p>

                <h3 class="living-cost-heading">Set a Daily Schedule</h3>
                <p>Try to keep a regular routine in your first few weeks. A simple schedule helps you adjust and feel more
                    settled.</p>

                <h3 class="living-cost-heading">Talk to People Nearby</h3>
                <p>Say hello to your neighbors. Ask them about their favorite places in town. They can offer great tips and
                    make you feel welcome.</p>

                <h3 class="living-cost-heading">Use What Your City Offers</h3>
                <p>Check out the library or a community center. These local resources can help you learn about events and
                    services, so you feel more confident.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                <p>Here are some useful tips to help you settle into life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}.</p>

                <h3 class="living-cost-heading">Get to Know the Area Around You</h3>
                <p>Spend time checking out nearby grocery stores, eateries, parks, and key services. Doing this makes daily
                    life feel simpler and more familiar.</p>

                <h3 class="living-cost-heading">Join Local Activities</h3>
                <p>Sign up for local groups, go to neighborhood gatherings, or volunteer when you can. These steps help you
                    meet people and feel connected sooner.</p>

                <h3 class="living-cost-heading">Set a Schedule Right Away</h3>
                <p>Stick to a steady routine during your first few weeks. A clear schedule makes the transition easier and
                    helps you stay grounded.</p>

                <h3 class="living-cost-heading">Talk to People Nearby</h3>
                <p>Say hello to neighbors or coworkers and ask them about their favorite local places. Their tips can guide
                    you and make you feel more at home.</p>

                <h3 class="living-cost-heading">Use What the City Offers</h3>
                <p>Check out libraries, community centers, and city websites for details on events, services, and utilities.
                    This helps you feel confident and ready to handle your new surroundings.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                <p>Below are some helpful tips to make settling into life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} easier.</p>

                <h3 class="living-cost-heading">Check Out Your Surroundings</h3>
                <p>Spend time visiting nearby stores, places to eat, parks, and important services. Familiar spots make
                    daily tasks feel more natural.</p>

                <h3 class="living-cost-heading">Get Active in the Community</h3>
                <p>Join groups, show up to local events, or take part in volunteer work. Meeting people early helps you feel
                    connected faster.</p>

                <h3 class="living-cost-heading">Create a Daily Rhythm</h3>
                <p>Set up a steady routine during your first weeks. A clear pattern helps you adjust and feel more at ease.
                </p>

                <h3 class="living-cost-heading">Meet People Around You</h3>
                <p>Say hello to neighbors or coworkers and ask for suggestions on places to visit. Their advice can help you
                    settle in and feel welcome.</p>

                <h3 class="living-cost-heading">Use City Services</h3>
                <p>Look into libraries, community centers, and city websites for details on events and services. These tools
                    help you feel confident and independent in your new home.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                <p>Use these simple, hands-on tips to settle into life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }} with ease.</p>
                <h3 class="living-cost-heading">Get to Know Your Neighborhood</h3>
                <p>Explore nearby grocery stores, restaurants, parks, and key services. When you learn your surroundings
                    early, daily tasks become easier and more enjoyable.</p>

                <h3 class="living-cost-heading">Join the Local Scene</h3>
                <p>Take part in community events, join local groups, or volunteer for neighborhood projects. Getting
                    involved helps you meet people and feel connected to your new city faster.</p>

                <h3 class="living-cost-heading">Build Your Routine Early</h3>
                <p>Create a regular schedule during your first few weeks. Sticking to a routine helps you adjust quickly and
                    stay organized as you settle in.</p>

                <h3 class="living-cost-heading">Meet the People Around You</h3>
                <p>Say hello to your neighbors and coworkers and ask them for local tips. Building these connections helps
                    you feel at home and learn about hidden gems in the area.</p>

                <h3 class="living-cost-heading">Use Local Support and Services</h3>
                <p>Check out nearby libraries, community centers, and city websites to find information about events,
                    services, and utilities. Taking advantage of these resources helps you feel confident and independent in
                    your new home.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                <p>These practical tips can help you adjust smoothly to life in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}.</p>
                <h3 class="living-cost-heading">Get to Know Your Area</h3>
                <p>Spend time checking out nearby grocery shops, places to eat, parks, and key services. This makes daily
                    life feel easier.</p>

                <h3 class="living-cost-heading">Join the Local Scene</h3>
                <p>Sign up for clubs, show up at neighborhood events, or help out with community projects. These steps help
                    you meet people and feel at home faster.</p>

                <h3 class="living-cost-heading">Set a Daily Rhythm</h3>
                <p>Stick to a steady schedule during your first few weeks. A routine keeps things familiar and helps you
                    adjust.</p>

                <h3 class="living-cost-heading">Meet People Around You</h3>
                <p>Say hello to neighbors and coworkers. Ask them about good local spots. Their advice can point you in the
                    right direction and help you settle in.</p>

                <h3 class="living-cost-heading">Use City Resources</h3>
                <p>Look into libraries, community hubs, and online city tools for updates on events and services. This helps
                    you stay informed and feel more confident on your own.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                <p>Below are some simple tips to help you get comfortable in {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}.</p>
                <h3 class="living-cost-heading">Discover Your New Area</h3>
                <p>Spend some time checking out nearby stores, restaurants, parks, and other essentials. Knowing where
                    things are will make daily life easier.</p>

                <h3 class="living-cost-heading">Join the Local Scene</h3>
                <p>Take part in local clubs, neighborhood gatherings, or volunteer programs. Getting involved helps you meet
                    people and feel at home faster.</p>

                <h3 class="living-cost-heading">Build a Routine Early</h3>
                <p>Keep a steady daily schedule, especially in your first few weeks. A routine helps you adjust more easily
                    and feel settled sooner.</p>

                <h3 class="living-cost-heading">Meet the People Around You</h3>
                <p>Say hello to your neighbors or coworkers and ask for tips on local places to visit. Locals often share
                    great advice and help you feel welcome.</p>
                <h3 class="living-cost-heading">Use Community Resources</h3>
                <p>Check out local libraries, community centers, and city websites to learn about events, services, and
                    utilities. These resources help you stay informed and confident as you settle in.</p>
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                <p>A few simple tips can help you settle smoothly into your new life in
                    {{ $cityToCityRoute->cityTo->name }},
                    {{ $cityToCityRoute->cityTo->state->abv }}.</p>
                <h3 class="living-cost-heading">Explore Your Neighborhood</h3>
                <p>Spend some time getting to know nearby shops, restaurants, parks, and other everyday spots. Familiarity
                    with your area will make daily routines easier and help you feel at home faster.</p>

                <h3 class="living-cost-heading">>Get Involved in the Community</h3>
                <p>Take part in local clubs, neighborhood gatherings, or volunteer events. Being active in your community
                    helps you meet people and feel connected to your new surroundings.</p>

                <h3 class="living-cost-heading">Set Up a Routine Early</h3>
                <p>Keep a steady daily schedule, especially during your first few weeks. Having structure helps you adapt
                    quickly and feel more comfortable in your new city.</p>

                <h3 class="living-cost-heading">Meet Locals and Neighbors</h3>
                <p>Introduce yourself to neighbors or coworkers and ask for advice on local places to visit. Friendly
                    conversations can help you discover hidden gems and feel welcome in Seattle.</p>

                <h3 class="living-cost-heading">Use Local Services and Resources</h3>
                <p>Visit community centers, libraries, and city websites to find information about nearby events, public
                    services, and utilities. Using these resources helps you feel confident and independent as you settle
                    in.</p>
            @endif
        </section>
        <div class="faq-section mt-5">
            <h2>Frequently Asked Questions</h2>

            @if (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate1))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template1_alabama')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template2_california')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template3_colorado')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template4_florida')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template5_massachusetts')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template6_michigan')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template7_texas')
            @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
                @include('frontend.company_auth.route_pages.city_to_city_route_faqs.template8_washington')
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
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Find trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }} with prices between ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). Get affordable moving help for a smooth and stress-free move."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate2))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Looking for a reliable mover between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}? Prices typically range from ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}), so you can find one that fits your budget."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate3))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}. Enjoy affordable help for an easy, stress-free move."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate4))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Looking for reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}? Expect costs from ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). Get budget-friendly help to make your move easy and worry-free."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate5))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Discover reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }} with rates ranging from ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). Get budget-friendly moving support for an easy, stress-free move."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate6))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Hire a trusted mover from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}. Prices start around ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). This affordable service takes the stress out of your move."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate7))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Hire reliable movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }} for ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). Get affordable help to make your move easy and stress-free."
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
        <script type="application/ld+json" class="schema-cost">
            {
                "@context": "http://schema.org",
                "@type": "WebPage",
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
                "url": "{{url()->current()}}",
                "description": "Trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }} offer rates between ({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}). Get affordable moving help for a smooth, hassle-free relocation."
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
                "name": "Popular Moving Routes from {{ $cityToCityRoute->cityFrom->state->name }}",
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
                "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Move Cost from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to
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
                    "name": "How long does the move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} take about {{ $duration ?? '0 hours 0 minutes' }}, depending on how much you’re moving, the route, and whether you hire a full-service mover or do it yourself."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What will it cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Costs vary quite a bit based on home size and services. For example, full-service moving companies on this route often charge between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} for a studio or 1-bedroom, and can go higher for larger homes."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What factors affect moving costs on the {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Key factors include how large your home or load is, what moving services you choose (full service vs DIY vs truck rental), and timing (seasonality). These all influence your final cost."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Will my cost of living change after moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "There are some differences. For example, everyday expenses like groceries and utilities may shift slightly. Some living costs may go up; it’s a good idea to compare things before you move to see how your budget might change."
                    }
                },
                {
                    "@type": "Question",
                    "name": "When is the best time to schedule a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
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
                    "name": "How much will it cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving costs from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} typically range between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. The final price can also vary based on the time of year and whether you need packing or storage services. Most moving companies offer free quotes, so it’s best to compare a few options before booking."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How long does a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually takes around {{ $duration ?? '0 hours 0 minutes' }} of driving time. Most moves can be completed early unless you have a large home or extra stops along the way."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When is the best time to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are often the best seasons to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} because the weather is mild and moving companies are less busy. Summer is the most popular time, so prices can be higher, and winter moves may take longer if the weather is bad."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What do movers include when moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most movers help with packing, loading, transportation, and unloading. Some also offer extra services like storage, furniture assembly, or packing supplies if you need them."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How can I make my move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} easier?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "You can make your move smoother by packing early, labeling boxes clearly, and keeping essentials with you for the first night. Booking your movers a few weeks in advance also helps you get better rates and avoid last-minute stress."
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
                    "name": "What does it usually cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} fall between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} – {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. The total can change based on the season and whether you add packing or storage. Many movers give free estimates, so compare a few before you choose."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How long does the drive take for this move?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The trip from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} takes about {{ $duration ?? '0 hours 0 minutes' }} by car. Movers often finish the job within a day unless you have a large home or plan extra stops."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Which season works best for moving between these cities?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall usually offer the best conditions for a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. Mild weather and lower demand keep things easier. Summer attracts more movers, so rates climb, while winter weather can cause delays."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services do movers normally provide for this route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moving companies handle packing, loading, transport, and unloading. Some also add storage, furniture setup, or supply boxes if you ask."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How can I simplify my move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing early, mark your boxes clearly, and keep important items close for your first night. Reserve your movers a few weeks ahead to lock in better pricing and reduce stress."
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
                    "name": "What is the average cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most moves between {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} and {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} fall between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} – {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Your final total can change based on the season and whether you add packing or storage. Many companies provide free estimates, so checking a few options before booking is a smart move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How much time does a move between these cities usually take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Driving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} takes about {{ $duration ?? '0 hours 0 minutes' }}. In most cases, movers finish the job the same day unless the home is large or there are extra stops planned."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Which time of year is best for this move?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall tend to offer the most comfortable conditions. Mild weather and lower demand make these seasons easier on both scheduling and cost. Summer brings higher prices, while bad winter weather can slow things down."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services are typically included with movers on this route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Moving companies often handle packing, loading, transport, and unloading. Some also provide add-ons like storage, furniture setup, or packing materials if requested."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What steps can make this move less stressful?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing ahead of time, label each box clearly, and keep important items close for your first night. Scheduling movers early also helps you secure better rates and avoid last-minute pressure."
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
                    "name": "How Much Does It Cost to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Expect to spend between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} – {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }} when moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}. The total cost changes depending on the season and whether you add services like packing or storage. Most moving companies give free quotes, so compare a few before you book."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How Long Does It Take to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Driving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually takes about {{ $duration ?? '0 hours 0 minutes' }}. Most moves finish the same day unless you have a large home or make extra stops along the way."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When Is the Best Time to Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall usually offer the best time to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} because the weather stays mild and movers have lighter schedules. Summer tends to be the busiest season, which drives prices up, while winter moves can slow down if the weather gets rough."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What Services Do Movers Provide for a {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} Move?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Movers usually handle packing, loading, transport, and unloading. Many also offer add-ons like storage, furniture setup, and packing materials if you need them."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How Can You Make Your Move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} Easier?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing early, label every box, and keep your first-night essentials with you. Book your movers a few weeks ahead to get better prices and avoid last-minute stress."
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
                    "name": "What is the average cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually falls between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. The total may change depending on the season and if you choose packing or storage services. Most moving companies provide free estimates, so comparing several options before you book is a smart move."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How much time does a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Driving time for this move sits around {{ $duration ?? '0 hours 0 minutes' }}. Most moves finish quickly unless you have a large home or plan for extra stops on the way."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "Which season works best for moving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall usually make the ideal seasons to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} since the weather stays comfortable and moving companies are not as busy. Summer remains the most in-demand period, which can raise prices, while winter moves may take more time if poor weather causes delays."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services do movers provide for {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} moves?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most movers handle packing, loading, transport, and unloading. Some companies also provide add-on options such as storage, furniture assembly, or packing materials if you need extra help."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What steps can make this move easier?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing early, mark boxes clearly, and keep your first-night items close by. Scheduling movers a few weeks ahead also helps you secure better pricing and reduces last-minute stress."
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
                    "name": "How much does it cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The average cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} ranges from about {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} – {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Prices change depending on the season and whether you add services like packing or storage. Most moving companies give free estimates, so compare a few before choosing one."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How long does it take to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually take?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Driving from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually takes around {{ $duration ?? '0 hours 0 minutes' }}. Most moves finish the same day unless your home is large or you make extra stops along the way."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services do movers provide for a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Movers usually handle packing, loading, transport, and unloading. Some companies also offer extras like storage options, furniture setup, or packing materials if needed."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services do movers provide for {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} moves?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Most movers handle packing, loading, transport, and unloading. Some companies also provide add-on options such as storage, furniture assembly, or packing materials if you need extra help."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How can I make my move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} go smoothly?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing early, label every box clearly, and keep essentials close for your first night. Booking movers a few weeks in advance helps you get better prices and avoid last-minute stress."
                    }
                }
                ]
            }
        </script>
    @elseif (in_array($cityToCityRoute->cityFrom->state->slug, $statesTemplate8))
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                    "@type": "Question",
                    "name": "How much does it cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "The average cost to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} ranges from about {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Prices change depending on the season and whether you add services like packing or storage. Most moving companies provide free estimates, so compare a few before deciding."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How long does it take to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "A move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} usually takes around {{ $duration ?? '0 hours 0 minutes' }} of driving time. Most moves finish the same day unless you have a big house or make extra stops on the way."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "When is the best time to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} route?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Spring and fall are great times to move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} because the weather is pleasant and movers are less busy. Summer is the busiest season, which can mean higher prices, while winter moves might take longer due to cold or rainy weather."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "What services do movers provide for a move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} moves?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Movers usually take care of packing, loading, transport, and unloading. Some companies also include extras like storage, furniture setup, or packing supplies if you request them."
                    }
                    },
                    {
                    "@type": "Question",
                    "name": "How can I make my move from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }} go smoothly?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Start packing early, label your boxes clearly, and keep essentials close for your first night. Booking movers a few weeks ahead of time helps you find better rates and reduces last-minute stress."
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
  "name": "({{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} - {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}) Movers From {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}",
  "description": "Find trusted movers from {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }} with prices between {{ $calculatedCosts['studio']['company']['min_formatted'] ?? '$0' }} and {{ $calculatedCosts['studio']['company']['max_formatted'] ?? '$0' }}. Get affordable moving help for a smooth and stress-free move.",
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
