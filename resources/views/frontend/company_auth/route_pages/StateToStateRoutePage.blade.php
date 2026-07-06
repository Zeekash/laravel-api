@extends('layouts.app')

@section('title')
    Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }}
    Best Movers and Costs)
@endsection

@section('meta_description')
    Planning a move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}? Find the best
    movers, compare moving costs and services to make your relocation smooth and stress-free.
@endsection
@section('meta_keywords')
{{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
@endsection
@section('og:title')
    Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }}
    Best Movers and Costs)
@endsection
@section('og:description')
    Planning a move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}? Find the best
    movers, compare moving costs and services to make your relocation smooth and stress-free.
@endsection
{{-- @section('og:image')
@php
    $from = $stateToStateRoute->stateFrom->name;
    $to   = $stateToStateRoute->stateTo->name;
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
    <link rel="stylesheet"  href="{{ asset('assets/css/routes/state-to-state-route.css') }}">
    @php
        $statesTemplate1 = [
            'alabama',
            'arkansas',
            'kentucky',
            'louisiana',
            'mississippi',
            'south-carolina',
            'tennessee',
            'west-virginia',
        ];
        $statesTemplate2 = [
            'california',
            'texas',
            'florida',
            'new-york',
            'illinois',
            'pennsylvania',
            'ohio',
            'georgia',
        ];
        $statesTemplate3 = ['colorado', 'idaho', 'montana', 'nevada', 'new-mexico', 'utah', 'wyoming', 'arizona'];
        $statesTemplate4 = [
            'massachusetts',
            'connecticut',
            'delaware',
            'maine',
            'maryland',
            'new-hampshire',
            'rhode-island',
            'vermont',
        ];
        $statesTemplate5 = ['michigan', 'indiana', 'iowa', 'kansas', 'minnesota', 'missouri', 'nebraska', 'wisconsin'];
        $statesTemplate6 = [
            'washington',
            'oregon',
            'north-carolina',
            'virginia',
            'oklahoma',
            'north-dakota',
            'south-dakota',
            'new-jersey',
        ];
    @endphp
    <section class="hero hero-image d-flex align-items-center justify-content-center">

        <div class="container container-main ">
            <div class="hero-content">
                <div class="upper_content">
                    <h1 class="hero-title">Moving from {{ $stateToStateRoute->stateFrom->name }} to
                        {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }} Best Movers and Costs)
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
                            <p class="miles_upp">Moving Distance: 0 miles</p>
                        </div>
                        <div class="form_bg">
                            <div class="row">
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from" {{-- value="{{ $stateToStateRoute->stateFrom->name }}, USA" --}}
                                            class="zipfromsearch pac-target-input mmj-zip-from"
                                            placeholder="Enter City Name" autocomplete="off">
                                        <span id="external_zipfrom_error" class="error-message hidden"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 mt-lg-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to"
                                            {{-- value="{{ $stateToStateRoute->stateTo->name }}, USA" --}} class="ziptosearch pac-target-input mmj-zip-to"
                                            placeholder="Enter City Name" autocomplete="off">
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

        @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
            <p><b>Quick answer: </b>If you're moving from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b>, hiring professional movers usually costs
                between
                @isset($move_size_cost->moving_company_2_3_bedroom)
                    <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                @endisset. Using a moving container averages around
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}</b>
                @endisset,
                while renting a truck costs about
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
            <p>
                <b>Quick answer: </b>Moving from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b> often costs between
                @isset($move_size_cost->moving_company_2_3_bedroom)
                    <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                @endisset if you use movers. A moving container is about
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}</b>
                @endisset
                on average, and a rental truck costs close to
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
            <p><b>Quick answer: </b>The cost of moving from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b> can range from
                <b>{{ str_replace(['-', '–', '—'], 'to', $move_size_cost->moving_company_2_3_bedroom) }}</b> when using
                professional movers. On average, moving containers cost around
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>
                        {{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}
                    </b>
                @endisset
                while renting a truck is the most affordable option at about
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
            <p><b>Quick answer: </b>Moving from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b> usually ranges from
                <b>{{ str_replace(['-', '–', '—'], 'to', $move_size_cost->moving_company_2_3_bedroom) }}</b> when hiring
                professional movers. On average, moving containers cost around
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}</b>
                @endisset,
                while renting a truck is the most budget-friendly option at about
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
            <p><b>Quick answer: </b> A move from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b> usually costs between
                @isset($move_size_cost->moving_company_2_3_bedroom)
                    <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                @endisset, based on how much you’re moving and the service you choose. Moving containers average about
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}</b>
                @endisset,
                while a rental truck costs roughly
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
            <p><b>Quick answer: </b>If you hire movers, moving from <b>{{ $stateToStateRoute->stateFrom->name }} to
                    {{ $stateToStateRoute->stateTo->name }}</b>, typically costs between
                @isset($move_size_cost->moving_company_2_3_bedroom)
                    <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>
                @endisset. The average cost of a moving container is
                @isset($move_size_cost->moving_container_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->moving_container_studio_bedroom)) }}</b>
                @endisset,
                while the cost of a rental truck is around
                @isset($move_size_cost->rental_truck_studio_bedroom)
                    <b>{{ trim(preg_replace('/^.*?[–—-]\s*/u', '', $move_size_cost->rental_truck_studio_bedroom)) }}</b>
                @endisset.
            </p>
        @endif

        <section class="featured-partners pb-5">
            <div class="container">
                <h2 class="featured-partners-title">Featured Moving Companies</h2>
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
                                            <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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
                                            <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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
                                            <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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
                                            <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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
            Average Moving Cost from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
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
                        <p><strong>Moving Company:</strong> {{ $move_size_cost->moving_company_studio_bedroom ?? '-' }}</p>
                        <p><strong>Moving Container:</strong> {{ $move_size_cost->moving_container_studio_bedroom ?? '-' }}
                        </p>
                        <p><strong>Rental Truck:</strong> {{ $move_size_cost->rental_truck_studio_bedroom ?? '-' }}</p>
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
                        <p><strong>Moving Company:</strong> {{ $move_size_cost->moving_company_2_3_bedroom ?? '-' }}</p>
                        <p><strong>Moving Container:</strong> {{ $move_size_cost->moving_container_2_3_bedroom ?? '-' }}
                        </p>
                        <p><strong>Rental Truck:</strong> {{ $move_size_cost->rental_truck_2_3_bedroom ?? '-' }}</p>
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
                        <p><strong>Moving Company:</strong> {{ $move_size_cost->moving_company_4_bedroom ?? '-' }}</p>
                        <p><strong>Moving Container:</strong> {{ $move_size_cost->moving_container_4_bedroom ?? '-' }}</p>
                        <p><strong>Rental Truck:</strong> {{ $move_size_cost->rental_truck_4_bedroom ?? '-' }}</p>
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
        <section class="state_Route_bottom_content">
            <h2>Top-Rated Local Moving Companies in {{ $stateToStateRoute->stateFrom->name }} </h2>
            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p>We’ve gathered some of the <a
                        href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local
                            movers</b></a>
                    in <b>{{ $stateToStateRoute->stateFrom->name }}</b>, known for
                    fair prices, good service, and customer
                    satisfaction, to help you pick with confidence.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>We found some <a
                        href="https://mymovingjourney.com/movers/{{ $stateToStateRoute->stateFrom->slug }}"><b>top local
                            movers in {{ $stateToStateRoute->stateFrom->name }}</b></a> known for good rates,
                    reliable service, and happy customers to help you choose with ease.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p>We gathered some of the <a
                        href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best
                            local movers</b></a> in <b>{{ $stateToStateRoute->stateFrom->name }}</b> who offer fair
                    prices, quality service, and great customer reviews to help you make a confident choice.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p>We gathered some of the <a
                        href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best
                            local movers</b></a> in <b>{{ $stateToStateRoute->stateFrom->name }}</b> who offer fair
                    prices, dependable service, and great customer feedback to help you make the right choice.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p>We gathered some of the <a
                        href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best
                            local movers</b></a> in <b>{{ $stateToStateRoute->stateFrom->name }}</b> who offer fair
                    prices, dependable service, and strong customer reviews to help you make the right choice.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p>To make your decision easier, we located some of the <a
                        href="https://mymovingjourney.com/resource/best-local-moving-companies"><b>best local
                            movers</b></a>
                    in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> who are renowned for their affordable prices,
                    dependable
                    service, and satisfied clients.
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
                            $avg_rating = $total_reviews
                                ? $verified->map(fn($u) => (float) $u->overall_rating)->avg()
                                : 0;
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
        </section>
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
                        <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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
                                                    href="https://mymovingjourney.com/{{ $moversPath }}/{{ $stateSlug }}"><strong>{{ $user->pickState->name }}</strong></a>
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


        {{-- Moving Container Companies --}}
        <section class="state_Route_bottom_content">
            <h2>Best {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} Moving
                Container Companies</h2>
            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p>Moving containers are a great way to save money without doing everything on your own. You take care of
                    packing and unpacking, while the company manages the driving, picking up the container in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                    delivering it to your new home.
                </p>

                <p>Here are some of the most <a
                        href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>trusted moving
                            container companies.</b></a></p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>Moving containers help you save money and still make moving easier. You handle the packing
                    and unpacking, and the company does the driving. They pick up the container in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                    bring it to your new home.
                </p>
                <p>Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>trusted
                            moving container companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p>Moving containers are a simple and affordable way to move. You take care of packing and
                    unpacking, while the company handles the transport. They collect the container in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                    deliver it to your new home
                </p>
                <p>Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>reliable
                            moving
                            container companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p>Moving containers are an easy and affordable way to move. You take care of packing and
                    unpacking, while the company handles the driving. They collect the container in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b>
                    and deliver it to your new home
                </p>
                <p>Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>reliable
                            moving
                            container companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p>Moving containers make relocating easier and more affordable. You pack and unpack your items,
                    while the company handles the pickup and delivery. They’ll collect the container in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b>
                    and drop it off at your new home.
                </p>
                <p>Here are some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>trusted
                            moving container companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p>You may move more easily and save money by using moving containers. You take care of
                    packing and unloading, while the company takes care of driving. The container is picked up in
                    {{ $stateToStateRoute->stateFrom->name }} and delivered to your new residence.</p>
                <p>Some <a href="https://mymovingjourney.com/resource/best-moving-container-companies"><b>reputable moving
                            container companies</b></a> are as follows:</p>
            @endif

            <div class="Featured_Partners py-5">
                <div class="row g-4 justify-content-center">
                    @foreach ($container_movers as $containerMover)
                        @if ($loop->iteration > 3)
                            @break
                        @endif
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
                            $min_price = $containerMover->company->users
                                ->where('user_email_verified', 1)
                                ->min(function ($user) {
                                    return (float) $user->service_cost;
                                });

                            $max_price = $containerMover->company->users
                                ->where('user_email_verified', 1)
                                ->max(function ($user) {
                                    return (float) $user->service_cost;
                                });

                            $imageUrl = str_starts_with($containerMover->company->image, 'companies/image/')
                                ? URL::to('/' . $containerMover->company->image)
                                : URL::to('/companies/image/' . $containerMover->company->image);

                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="partner-card  active ">
                                <div class="company_logo">
                                    <img src="{{ $imageUrl }}" alt="{{ $containerMover->company->slug }}-logo"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="partner-header d-flex align-items-center justify-content-center">
                                    <h5 class="company_name">{{ $containerMover->company->company_name }}</h5>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                    <span class="rating"
                                        style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
                                        out of 5</span>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                    <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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

                                <!--<hr>-->
                                <div class="partner-info">
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $containerMover->point_one }}
                                    </p>
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $containerMover->point_two }}
                                    </p>
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $containerMover->point_three }}
                                    </p>
                                </div>
                                <a target="_blank" href="{{ route('contactMover', $containerMover->company->slug) }}">
                                    <div class="phone-box mb-1 mt-3">
                                        Get Free Estimates
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        {{-- Moving Truck Rentals --}}
        <section class="state_Route_bottom_content">
            <h2>Best {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} Moving Truck
                Rentals</h2>

            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p>If you want to keep your moving costs low, renting a truck can be a good option. You’ll need to do the
                    packing, loading, and driving yourself, but it gives you more control over your move.</p>
                <p>Here are some of the <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>top moving truck
                            rental</b></a> options:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>If you want to save money on your move, renting a truck can be a smart choice. You will pack,
                    load, and drive on your own, but it lets you stay in control of your move.</p>
                <p>Here are some <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>trusted truck
                            rental companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p>If you’re looking to cut moving costs, renting a truck is a practical option. You’ll handle the
                    packing, loading, and driving yourself, but it gives you full control over your move.</p>
                <p>Here are some <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable truck
                            rental companies</b></a>:</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p>If you’re looking to cut moving costs, renting a truck is a good option. You’ll do the packing,
                    loading, and driving yourself, but it gives you full control of your move.</p>
                <p>Here are some <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable truck
                            rental companies:</b></a></p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p>If you’re trying to keep moving costs low, renting a truck is a practical option. You’ll be
                    responsible for packing, loading, and driving, but it gives you full control over your move.</p>
                <p>Here are some <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reliable truck
                            rental companies:</b></a></p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p>Renting a truck can be a wise decision if you want to reduce the cost of your move. It allows you
                    to maintain control over your move even though you will be responsible for packing, loading,
                    and driving yourself.</p>
                <p>Here are a few <a
                        href="https://mymovingjourney.com/resource/best-moving-truck-rental-companies"><b>reputable truck
                            rental businesses:</b></a></p>
            @endif

            <div class="Featured_Partners py-5">
                <div class="row g-4 justify-content-center">
                    @foreach ($truck_rental_movers as $truckRentalMover)
                        @if ($loop->iteration > 3)
                            @break
                        @endif
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
                            $min_price = $truckRentalMover->company->users
                                ->where('user_email_verified', 1)
                                ->min(function ($user) {
                                    return (float) $user->service_cost;
                                });

                            $max_price = $truckRentalMover->company->users
                                ->where('user_email_verified', 1)
                                ->max(function ($user) {
                                    return (float) $user->service_cost;
                                });

                            $imageUrl = str_starts_with($truckRentalMover->company->image, 'companies/image/')
                                ? URL::to('/' . $truckRentalMover->company->image)
                                : URL::to('/companies/image/' . $truckRentalMover->company->image);

                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <div class="partner-card  active ">
                                <div class="company_logo">
                                    <img src="{{ $imageUrl }}" alt="{{ $truckRentalMover->company->slug }}-logo"
                                        class="img-fluid" loading="lazy">
                                </div>
                                <div class="partner-header d-flex align-items-center justify-content-center">
                                    <h5 class="company_name">{{ $truckRentalMover->company->company_name }}</h5>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                    <span class="rating"
                                        style="font-size: 24px; font-weight: 600; font-family: var(--family); color: #116087;">{{ $rounded }}
                                        out of 5</span>
                                </div>
                                <div class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                    <ul class="list-unstyled stars_list m-0 d-flex align-items-center">
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

                                <!--<hr>-->
                                <div class="partner-info">
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $truckRentalMover->point_one }}
                                    </p>
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $truckRentalMover->point_two }}
                                    </p>
                                    <p><img src={{ asset('assets/img/check-mark.png') }} class="me-2" alt="check-mark"
                                            width="13" height="13"
                                            loading="lazy">{{ $truckRentalMover->point_three }}
                                    </p>
                                </div>
                                <div class="phone-box mb-1 mt-3">
                                    Get Free Estimates
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <section>
            <div class="content-wrapper">
                <div class="col-12 col-lg-8 mx-auto my-5">
                    <div class="form_wrapper">
                        <form action="" class=" main_banner_form">
                            <h2 class="mt-0 mb-2 text-center">Find movers in your area</h2>
                            <p class="text-center">Easily compare personalized moving quotes for your
                                {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
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
                {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} move</h2>
            <p class="methodology-text">
                We focus on finding moving companies that offer real value and reliable service for people relocating from
                {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}. We look at real
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
            <h2>Key Things to Know Before Moving from {{ $stateToStateRoute->stateFrom->name }} to
                {{ $stateToStateRoute->stateTo->name }}</h2>
            @php
                $cost_metric_map = [
                    'average_rent_cost' => 'Average rent',
                    'average_home_cost' => 'Average home cost',
                    'average_income_per_capita' => 'Average income (per capita)',
                    'cost_of_living_single' => 'Cost of living (Single)',
                    'cost_of_living_family_of_four' => 'Cost of living (Family of 4)',
                    'cost_of_living_index' => 'Cost of living index',
                    'unemployment_rate' => 'Unemployment rate',
                    'sales_tax' => 'Average sales tax',
                    'state_income_tax' => 'State income tax',
                ];

                $has_cost_data = false;
                foreach (array_keys($cost_metric_map) as $key) {
                    $from_data = $state_cost_of_living->{$key} ?? '-';
                    $to_data = $to_state_cost_of_living->{$key} ?? '-';

                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_cost_data = true;
                        break;
                    }
                }
            @endphp

            <h5>Cost of living </h5>

            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p>Before you move, it helps to know how the cost of living compares between
                    {{ $stateToStateRoute->stateFrom->name }} and {{ $stateToStateRoute->stateTo->name }}. This simple
                    comparison shows the main differences that could affect your budget and daily life.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>Before you move, it’s good to see how living costs differ between
                    {{ $stateToStateRoute->stateFrom->name }} and {{ $stateToStateRoute->stateTo->name }}. This
                    comparison shows the main changes that can impact your budget and daily life.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p>Before you move, it helps to compare the cost of living in {{ $stateToStateRoute->stateFrom->name }}
                    and {{ $stateToStateRoute->stateTo->name }}. This overview
                    highlights the key differences that may affect your budget and everyday life</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p>Before you move, it helps to compare the cost of living in {{ $stateToStateRoute->stateFrom->name }}
                    and {{ $stateToStateRoute->stateTo->name }}. This
                    overview highlights the key differences that could affect your budget and everyday life.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p>Before moving, take time to compare living expenses in {{ $stateToStateRoute->stateFrom->name }} and
                    {{ $stateToStateRoute->stateTo->name }}. This overview
                    shows the main differences that may influence your budget and daily routine.</p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p>It's a good idea to compare the cost of living in {{ $stateToStateRoute->stateFrom->name }} and
                    {{ $stateToStateRoute->stateTo->name }} before relocating. This
                    comparison highlights the key adjustments that may have an effect on your everyday life and budget.</p>
            @endif

            @if ($has_cost_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $stateToStateRoute->stateFrom->name ?? 'State From' }}</th>
                                <th>{{ $stateToStateRoute->stateTo->name ?? 'State To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cost_metric_map as $key => $metric_name)
                                @php
                                    $from_value = $state_cost_of_living->{$key} ?? '-';
                                    $to_value = $to_state_cost_of_living->{$key} ?? '-';
                                @endphp
                                @if ($from_value !== '-' || $to_value !== '-')
                                    <tr>
                                        <td>{{ $metric_name }}</td>
                                        <td>{{ $from_value }}</td>
                                        <td>{{ str_replace('º', '°', $to_value) }}</td>
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
                                            target="_blank"><b><u>U.S.
                                                    Census Bureau</u></b></a>,
                                        <a href="https://www.bls.gov/lau/" target="_blank"><b><u>US BLS</u></b></a>,
                                        <a href="https://taxfoundation.org/2022-sales-taxes/" target="_blank"><b><u>Tax
                                                    Foundation</u></b></a>

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
                    'summer_high' => 'Summer high',
                    'winter_low' => 'Winter low',
                    'annual_rain' => 'Annual rain',
                    'annual_snow' => 'Annual snow',
                    'crime_index' => 'Crime index',
                    'transportation_score' => 'Transportation Score',
                    'walkability_score' => 'Walkability Score',
                    'bike_friendliness_score' => 'Bike Friendliness Score',
                ];

                $has_data = false;
                foreach (array_keys($metric_map) as $key) {
                    $from_data = $state_life_style->{$key} ?? '-';
                    $to_data = $to_state_life_style->{$key} ?? '-';

                    if ($from_data !== '-' || $to_data !== '-') {
                        $has_data = true;
                        break;
                    }
                }
            @endphp

            <h5>Life in {{ $stateToStateRoute->stateFrom->name }} vs. {{ $stateToStateRoute->stateTo->name }}</h5>
            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p><a href="https://mymovingjourney.com/blogs/how-to-move-to-another-state"><b>Moving to a new
                            state</b></a> is more than packing up and leaving. Here’s how
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> and <b>{{ $stateToStateRoute->stateTo->name }}</b>
                    are different in
                    everyday life.
                </p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>Moving to a new state means more than just packing and going. Here’s how daily life in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> and <b>{{ $stateToStateRoute->stateTo->name }}</b>
                    is different.
                </p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p><a href="https://mymovingjourney.com/blogs/how-to-move-to-another-state"><b>Moving to another
                            state</b></a> is about more than packing your things. Here’s what daily life looks like
                    in <b>{{ $stateToStateRoute->stateFrom->name }}</b> compared to
                    <b>{{ $stateToStateRoute->stateTo->name }}</b>.
                </p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p>Moving to a new state involves more than just relocating your belongings. Here’s how life in
                    <b>{{ $stateToStateRoute->stateFrom->name }}</b> differs from life in
                    <b>{{ $stateToStateRoute->stateTo->name }}</b>
                </p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p>Moving to another state involves more than just relocating your things. Here’s what everyday life
                    in <b>{{ $stateToStateRoute->stateFrom->name }}</b> looks like compared to
                    <b>{{ $stateToStateRoute->stateTo->name }}</b>.
                </p>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p>There is more to moving to a new state than simply packing and leaving. Here are some
                    differences between everyday living in <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                    <b>{{ $stateToStateRoute->stateTo->name }}</b>
                </p>
            @endif

            @if ($has_data)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>{{ $stateToStateRoute->stateFrom->name ?? 'State From' }}</th>
                                <th>{{ $stateToStateRoute->stateTo->name ?? 'State To' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metric_map as $key => $metric_name)
                                @php
                                    $from_value = $state_life_style->{$key} ?? '-';
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
                                                    Places</u></b></a>,

                                    </p>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            @endif

            <h5>Pros and Cons: {{ $stateToStateRoute->stateFrom->name }} vs. {{ $stateToStateRoute->stateTo->name }}
            </h5>
            @if (count($state_pro_cons) > 0 || count($to_state_pro_cons) > 0)
                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Pros of living in {{ $stateToStateRoute->stateFrom->name }}</th>
                                <th>Pros of living in {{ $stateToStateRoute->stateTo->name }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $max_count = max(count($state_pro_cons), count($to_state_pro_cons));
                            @endphp
                            @for ($i = 0; $i < $max_count; $i++)
                                <tr>
                                    <td>
                                        @if (isset($state_pro_cons[$i]))
                                            {{ $state_pro_cons[$i]->pros ?? '-' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($to_state_pro_cons[$i]))
                                            {{ $to_state_pro_cons[$i]->pros ?? '-' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive my-5 cost-table">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Cons of living in {{ $stateToStateRoute->stateFrom->name }}</th>
                                <th>Cons of living in {{ $stateToStateRoute->stateTo->name }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $max_count = max(count($state_pro_cons), count($to_state_pro_cons));
                            @endphp
                            @for ($i = 0; $i < $max_count; $i++)
                                <tr>
                                    <td>
                                        @if (isset($state_pro_cons[$i]))
                                            {{ $state_pro_cons[$i]->cons ?? '-' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($to_state_pro_cons[$i]))
                                            {{ $to_state_pro_cons[$i]->cons ?? '-' }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        <section class="state_Route_bottom_content">
            <h2>Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}
                Checklist</h2>
            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                <p>Moving to a new state takes some planning, but a clear checklist can make things easier. Here are a few
                    steps
                    to help you stay on track:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan early:</h3>
                    <p class="step-content">Start preparing at least a month or two before your move. Get quotes from
                        moving
                        companies and decide on your moving date. </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Set a budget:</h3>
                    <p class="step-content">List all possible costs like packing supplies, truck rental, gas, and
                        temporary
                        housing if needed.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter your home:</h3>
                    <p class="step-content">Go through your things and <a
                            href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>donate or sell
                                items</b></a> you don’t need. It will save
                        space
                        and money.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Gather packing supplies:</h3>
                    <p class="step-content">Get boxes, tape, and labels. Pack room by room and keep essentials separate
                        for
                        the first few days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Change your address:</h3>
                    <p class="step-content"><a
                            href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>Update
                                your address</b></a> with the post office, banks, insurance, and any
                        subscriptions.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer utilities:</h3>
                    <p class="step-content">Schedule your water, electricity, and internet to be turned off in
                        <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                        turned on in <b>{{ $stateToStateRoute->stateTo->name }}</b> before you arrive.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Update your documents:</h3>
                    <p class="step-content">Get a new driver’s license, car registration, and voter registration once you
                        move.</p>
                </div>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                <p>Moving to another state takes planning, but a simple checklist can make it smooth. Follow these
                    steps to stay organized:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Start early:</h3>
                    <p class="step-content">Begin getting ready one to two months before moving. Get quotes from
                        movers and pick your move date.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Make a budget:</h3>
                    <p class="step-content">Write down all costs like boxes, tape, gas, <a
                            href="https://mymovingjourney.com/blogs/moving-truck-rental-everything-you-need-to-know"><b>truck
                                rental</b></a>, and short stays if needed.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Sort your stuff:</h3>
                    <p class="step-content"> <b><a
                                href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>Go through
                                    your
                                    things</b></a> and donate or sell what you don’t need. It cuts
                            down on space and cost.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Get packing supplies:</h3>
                    <p class="step-content"> <b><a
                                href="https://mymovingjourney.com/blogs/where-to-find-free-moving-boxes"></b>Buy
                        boxes</b></a>, tape, and labels. Pack by room and keep a small bag
                        with your essentials.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Update your address:</h3>
                    <p class="step-content">Tell the post office, banks, insurance, and subscriptions about
                        your <b><a href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>new
                                    address</b></a>.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer utilities:</h3>
                    <p class="step-content">Contact your utility companies to turn off services in
                        <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                        start them in <b>{{ $stateToStateRoute->stateTo->name }}</b> before you arrive.
                    </p>
                </div>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                <p> <a href="https://mymovingjourney.com/blogs/how-to-plan-for-an-out-of-state-move"><b>Moving to a new
                            state takes planning,</b></a> but a clear checklist can make it easier. Use these steps to
                    stay on track:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan early:</h3>
                    <p class="step-content">Start preparing one or two months before your move. Get quotes from
                        moving companies and set your moving date. </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Set a budget:</h3>
                    <p class="step-content">List all possible costs such as boxes, tape, gas, truck rental, and short-term
                        housing if needed.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter your home:</h3>
                    <p class="step-content"><a
                            href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>Sort through your
                                belongings</b></a> and sell or donate what you no
                        longer need. This will save money and space.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Gather packing supplies:</h3>
                    <p class="step-content">Get boxes, tape, and labels. Pack one room at a time and keep
                        essential items aside for the first few days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Change your address:</h3>
                    <p class="step-content"><a
                            href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>Update
                                your address</b></a> with the post office, banks, insurance providers, and any
                        subscriptions.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer utilities:</h3>
                    <p class="step-content">Contact your service providers to stop utilities in
                        <b>{{ $stateToStateRoute->stateFrom->name }}</b> and start
                        them in <b>{{ $stateToStateRoute->stateTo->name }}</b> before you move in.
                    </p>
                </div>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                <p><a href="https://mymovingjourney.com/blogs/how-to-move-to-another-state"><b>Moving to another
                            state</b></a> takes planning, but a clear checklist can help things go smoothly. Follow
                    these steps to stay on track:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan early:</h3>
                    <p class="step-content">Start preparing at least one or two months before your move. Get quotes from
                        moving companies and set your moving date.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Set a budget:</h3>
                    <p class="step-content">Write down all possible expenses such as packing supplies, truck rental,
                        gas, and short-term housing if needed.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter your home:</h3>
                    <p class="step-content">Go through your belongings and <a
                            href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>donate or sell
                                items</b></a> you no
                        longer need. This saves both space and money.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Gather packing supplies:</h3>
                    <p class="step-content">Get boxes, tape, and labels. Pack one room at a time and keep
                        a small bag with your essentials for the first few days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Change your address:</h3>
                    <p class="step-content"><a
                            href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>Update
                                your address</b></a> with the post office, banks, insurance providers, and any
                        subscriptions.
                    </p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer utilities:</h3>
                    <p class="step-content">Contact your utility companies to stop service in
                        <b>{{ $stateToStateRoute->stateFrom->name }}</b> and
                        start it in <b>{{ $stateToStateRoute->stateTo->name }}</b> before you arrive.
                    </p>
                </div>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                <p><a href="https://mymovingjourney.com/blogs/how-to-move-to-another-state"><b>Moving to another
                            state</b></a> takes preparation, but a simple checklist can help you stay organized.
                    Follow these steps to make your move easier:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Plan ahead:</h3>
                    <p class="step-content">Start preparing at least one or two months before moving. Request quotes
                        from movers and choose your moving date.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Set your budget:</h3>
                    <p class="step-content">List all possible expenses such as packing supplies, gas, truck rental,
                        and short-term housing if needed.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Declutter your home:</h3>
                    <p class="step-content">Sort through your belongings and <a
                            href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>sell or donate
                                things</b></a> you no
                        longer use. This helps save space and money.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Gather packing materials:</h3>
                    <p class="step-content">Get boxes, tape, and labels. Pack room by room and keep a
                        small bag with essentials for the first few days.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Change your address:</h3>
                    <p class="step-content"><a
                            href="https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move"><b>Update
                                your address</b></a> with the post office, banks, insurance
                        providers, and any subscriptions.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer utilities:</h3>
                    <p class="step-content">Contact your providers to disconnect services in
                        <b>{{ $stateToStateRoute->stateFrom->name }}</b> and start
                        them in <b>{{ $stateToStateRoute->stateTo->name }}</b> before your arrival.
                    </p>
                </div>
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                <p><a href="https://mymovingjourney.com/blogs/how-to-move-to-another-state"><b>Moving to another
                            state</b></a> requires planning, but a simple checklist can make the process easier.
                    Follow these steps to keep organized:</p>
                <div class="step-section">
                    <h3 class="step-subtitle">Start early:</h3>
                    <p class="step-content">Begin preparing one to two months before moving. Get quotations from
                        movers and choose your moving date.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Create a budget:</h3>
                    <p class="step-content">Make a list of all expenses, including boxes, tape, gas, truck rental, and
                        any short-term stays.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Sort your belongings:</h3>
                    <p class="step-content">Sort through your belongings and <a
                            href="https://mymovingjourney.com/blogs/downsize-your-home-before-moving"><b>donate or sell
                                whatever you
                                don't need</b></a>. It saves on space and money.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Gather packing supplies:</h3>
                    <p class="step-content">Buy boxes, tape, and labels. Pack by room and maintain a
                        small bag for your basics.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Update your address:</h3>
                    <p class="step-content">Inform the post office, banks, insurance, and subscriptions of your
                        new address.</p>
                </div>
                <div class="step-section">
                    <h3 class="step-subtitle">Transfer Utilities:</h3>
                    <p class="step-content">Before you arrive, make arrangements with your utility company to
                        cut off services in <b>{{ $stateToStateRoute->stateFrom->name }}</b> and start
                        them in <b>{{ $stateToStateRoute->stateTo->name }}</b>.</p>
                </div>
            @endif
        </section>


        <div class="faq-section mt-5">
            <h2>Frequently Asked Questions</h2>

            @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_alabama')
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_california')
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_colorado')
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_massachusetts')
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_michigan')
            @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
                @include('frontend.company_auth.route_pages.state_to_state_route_faqs.template_washington')
            @endif
        </div>
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

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }}
        Best Movers and Costs)",
        "url": "{{url()->current()}}",
        "description": "Planning a move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}? Find the best
        movers, compare moving costs and services to make your
        relocation smooth and stress-free."
    }
</script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "WebSite",
        "name": "My Moving Journey",
        "url": "https://mymovingjourney.com"
    }
</script>
    <script type="application/ld+json">
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
            "name": "Popular Moving Routes from {{ $stateToStateRoute->stateFrom->name }}",
            "item": "https://mymovingjourney.com/moving-routes/{{ strtolower($stateToStateRoute->stateFrom->abv) }}"
        },
        {
            "@type": "ListItem",
            "position": 4,
            "name": "Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }}
            Best Movers and Costs)",
            "item": "{{url()->current()}}"
        }
        ]
    }
</script>

    @if (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate1))
        <script type="application/ld+json"  class="schema-cost">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The average cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b> @endisset, depending on the <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><b>size of your home</b></a> and the type of moving service. A rental truck is the cheapest option, while full-service movers cost more but handle everything for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} take 1 to 3 days, depending on your starting and ending cities. If you’re using a moving container, delivery might take up to a week."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The <a href=\"https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state\"><b>cheapest way to move</b></a> is by renting a moving truck and driving it yourself. Moving containers are another affordable choice since you load your items, and the company handles the transport."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Look for movers with good reviews, transparent pricing, and proper licenses for interstate moves. Compare quotes from a few companies before booking, and make sure they offer <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><b>insurance for your belongings</b></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before moving, make a checklist to stay organized. Book movers early, transfer utilities, change your address, and update your license and registration once you arrive in your new state."
          }
        }
      ]
    }
</script>
    @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate2))
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The average cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b> @endisset. Prices depend on your <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><b>home size</b></a> and the type of moving service. Renting a truck is the cheapest option, while full-service movers cost more but handle the whole process for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} take one to three days, depending on your starting and ending cities. If you use a moving container, delivery can take up to a week."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The <a href=\"https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state\"><b>cheapest way to move</b></a> is to rent a truck and drive it yourself. Moving containers are another budget-friendly option since you load your items, and the company takes care of transport."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Choose movers with good reviews, clear pricing, and proper licenses for long-distance moves. Compare quotes from several companies, and make sure they offer <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><b>insurance for your belongings</b></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before moving, make a checklist to stay organized. Book your movers early, transfer utilities, change your address, and update your driver’s license and vehicle registration once you arrive in {{ $stateToStateRoute->stateTo->name }}."
          }
        }
      ]
    }
</script>
    @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate3))
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The average cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ranges from @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b> @endisset. The price depends on your <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><strong>home size</strong></a> and the type of moving service you choose. Renting a truck is the cheapest choice, while <a href=\"https://mymovingjourney.com/blogs/full-service-vs-self-service-moving\"><strong>full-service movers cost</strong></a> more but handle everything for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} take between one and three days, depending on your starting and ending cities. If you’re using a moving container, delivery may take up to a week."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The most affordable way to move is by renting a truck and driving it yourself. Moving containers are another good option because you pack your items, and the company handles the transport."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Look for movers with strong customer reviews, clear pricing, and the right licenses for interstate moves. Get quotes from a few companies and check that they offer <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><strong>moving insurance</strong></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before moving, make a plan to stay organized. Book your movers early, transfer utilities, update your address, and get your new driver’s license and vehicle registration after you arrive in {{ $stateToStateRoute->stateTo->name }}."
          }
        }
      ]
    }
</script>
    @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate4))
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<a href=\"https://mymovingjourney.com/blogs/what-is-the-average-cost-of-hiring-a-moving-company\"><b>The average cost of moving</b></a> from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>@endisset. The total cost depends on your <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><b>home size</b></a> and the type of moving service you choose. Renting a truck is the most affordable option, while full-service movers cost more but handle every part of the move for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} take one to three days, depending on your starting and ending locations. If you use a moving container, delivery may take up to a week."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<a href=\"https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state\"><b>The cheapest way to move</b></a> is by renting a truck and driving it yourself. Moving containers are another affordable choice since you pack your belongings, and the company manages the transport."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Look for movers with strong reviews, clear pricing, and the right licenses for long-distance moves. Compare a few quotes before booking and confirm they provide <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><b>insurance for your belongings</b></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before you move, make a checklist to stay organized. Schedule your movers early, transfer utilities, change your address, and update your driver’s license and vehicle registration once you arrive in {{ $stateToStateRoute->stateTo->name }}."
          }
        }
      ]
    }
</script>
    @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate5))
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<a href=\"https://mymovingjourney.com/blogs/what-is-the-average-cost-of-hiring-a-moving-company\"><b>The average cost of moving</b></a> from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} is between @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b>@endisset. The total cost depends on your <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><b>home size</b></a> and the type of moving service you choose. Renting a truck is the most affordable option, while full-service movers cost more but handle every part of the move for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Most moves from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} take one to three days, depending on your starting and ending locations. If you use a moving container, delivery may take up to a week."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<a href=\"https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state\"><b>The cheapest way to move</b></a> is by renting a truck and driving it yourself. Moving containers are another affordable choice since you pack your belongings, and the company manages the transport."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Look for movers with strong reviews, clear pricing, and the right licenses for long-distance moves. Compare a few quotes before booking and confirm they provide <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><b>insurance for your belongings</b></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before you move, make a checklist to stay organized. Schedule your movers early, transfer utilities, change your address, and update your driver’s license and vehicle registration once you arrive in {{ $stateToStateRoute->stateTo->name }}."
          }
        }
      ]
    }
</script>
    @elseif (in_array($stateToStateRoute->stateFrom->slug, $statesTemplate6))
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "How much does it cost to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} typically costs between @isset($move_size_cost->moving_company_2_3_bedroom) <b>{{ str_replace(['-', '–', '—'], 'and', $move_size_cost->moving_company_2_3_bedroom) }}</b> @endisset. The total depends on the <a href=\"https://mymovingjourney.com/blogs/how-to-estimate-your-move-size\"><b>size of your home</b></a> and the service you choose. Renting a truck is the most affordable choice, while full-service movers charge more but handle everything for you."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The trip from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} usually takes about one to three days, depending on where you start and end. If you use a moving container, it may take up to a week for delivery."
          }
        },
        {
          "@type": "Question",
          "name": "What is the cheapest way to move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Renting a moving truck and driving it yourself is the least <a href=\"https://mymovingjourney.com/blogs/cheapest-way-to-move-out-of-state\"><b>expensive way to move</b></a>. Moving containers are another low-cost choice since you do the packing, and the company handles transportation."
          }
        },
        {
          "@type": "Question",
          "name": "How do I choose the right moving company?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Look for movers with positive reviews, honest pricing, and the right licenses for interstate moves. Compare several estimates before booking, and make sure the company provides <a href=\"https://mymovingjourney.com/blogs/how-does-moving-insurance-work\"><b>insurance for your belongings</b></a>."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do before moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Before your move, make a detailed checklist to stay on schedule. Reserve your movers early, arrange for utility transfers, <a href=\"https://mymovingjourney.com/blogs/how-to-change-your-address-when-you-move\"><b>update your address</b></a>, and get your new driver’s license and vehicle registration once you settle in {{ $stateToStateRoute->stateTo->name }}."
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
  "name": " Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }} ({{ date('Y') }}
    Best Movers and Costs)",
  "description": "Planning a move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}? Find the best
        movers, compare moving costs and services to make your
        relocation smooth and stress-free." ,
  "agent": {
    "@type": "Organization",
    "name": "My Moving Journey",
    "url": "https://mymovingjourney.com"
  },
  "fromLocation": {
    "@type": "Place",
    "name": "{{ $stateToStateRoute->stateFrom->name }}"
  },
  "toLocation": {
    "@type": "Place",
    "name": "{{ $stateToStateRoute->stateTo->name }}"
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
  "name": "How to Move from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}",
  "description": "Moving from {{ $stateToStateRoute->stateFrom->name }} to {{ $stateToStateRoute->stateTo->name }}? Professional movers usually cost between, moving containers average around, and renting a truck costs about. Learn which movers people actually use and what to expect before booking.",
  "estimatedCost": {
    "@type": "MonetaryAmount",
    "currency": "USD",
    "value": "{{ str_replace(['-', '–', '—'], ' to ', $move_size_cost?->moving_company_2_3_bedroom ?? '') ?: '' }}"
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
          "text": "Rated 4.5 out of 5 stars. A licensed moving company based in Brookside, {{ $stateToStateRoute->stateFrom->name }} operating under DOT #Ea consequuntur nisi and MC #Tempora sunt volupta. The company has 100% positive reviews and 0% negative feedback."
        },
        {
          "@type": "HowToTip",
          "name": "Moving Container Companies",
          "text": "Moving containers are a great way to save money without doing everything on your own. You take care of packing and unpacking, while the company manages the driving, picking up the container in {{ $stateToStateRoute->stateFrom->name }} and delivering it to your new home."
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
      "text": "Schedule your water, electricity, and internet to be turned off in {{ $stateToStateRoute->stateFrom->name }} and turned on in {{ $stateToStateRoute->stateTo->name }} before you arrive.",
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
      "name": "Travel to {{ $stateToStateRoute->stateTo->name }}",
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
