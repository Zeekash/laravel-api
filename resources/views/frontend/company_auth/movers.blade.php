@extends('layouts.app')
@section('title', 'Find the Best Moving Companies – Local and Long Distance')
@section('meta_description',
    'Not sure which moving company to choose? Explore trusted local and long-distance moving
    companies, compare your options, and choose the right team.')

@section('meta_keywords', 'Movers')

@section('head')
    <meta name="robots" content="index, follow">
@endsection

@section('og:title')
    Find the Best Moving Companies – Local and Long Distance
@endsection

@section('og:description')

    Not sure which moving company to choose? Explore trusted local and long-distance moving companies, compare your options,
    and choose the right team.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/mover_page.css') }}">
    <div class="container">
        {{-- <section id="top_states_cards">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5 text-center d-flex flex-column justify-content-center">
                        <h1>Movers by State</h1>
                    </div>
                    @foreach ($top_states as $state)
                        <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-5">
                            <a href="{{ route('best_state_show', $state->slug) }}">
                                <div class="moving_states_card">
                                    <img src="{{ asset('state-movers/' . $state->slug . '.webp') }}" class="card-img"
                                        alt="{{ $state->state }}">
                                    <div class="moving_card_img_overlay">
                                        <span class="companies_total">{{ $state->company_count }}</span>
                                        <h4 class="card-title">Movers in {{ ucfirst($state->slug) }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        {{-- <section class="states-section">
            <div class="container">
                <h2>Top 12 Moving States In USA</h2>

                <div class="row g-4">
                    @foreach ($top_states as $state)
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('state.show', $state->slug) }}">
                                <div class="state-card  ">
                                    <img src="{{ asset('state-movers/' . $state->slug . '.webp') }}" class="card-img-top"
                                        alt="{{ $state->state }}">
                                    <div class="card-body state-body">
                                        <h5 class="card-title state-movers mb-0">{{ $state->company_count }}
                                            <span>Movers</span>
                                        </h5>
                                        <p class="state-name">{{ ucfirst($state->slug) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        <div class="container">
            <div class="form_wrap">
                <div class="col-lg-9 col-12 mx-auto mt-3">
                    <div class="show_breadcrumbs mt-5 mt-md-0 mb-3 mb-md-0">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                                class="fas fa-home me-1 home_icon"></i>
                                            Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">
                                        Movers
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="for_width">
            <section>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <h1>Find the Best Moving Companies Near You</h1>
                            <div class="author-box">
                                <div class="author-info">
                                    <img src="{{ asset('assets/img/author_img.png') }}" loading="lazy" alt="Author">
                                    <span class="author-label">Author <br>
                                        <span class="author_name"><a href="https://www.linkedin.com/in/honey-jay/"
                                                target="_blank">Honey Jay <i class="fa-brands fa-linkedin"
                                                    style="color: var(--bg);"></i></a></span></span>
                                </div>
                                <div class="update-info">
                                    <span style="color:#116087;"><i class="fa-regular fa-clock"></i>
                                        Updated :</span> 11 Nov, 2025 (7 mins read)
                                </div>
                                <div>
                                    <div class="single-footer-widget">
                                        <ul class="social">
                                            <li>
                                                {!! Share::page(url()->current())->facebook()->twitter()->whatsapp()->linkedin()->reddit()->pinterest() !!}
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <p>We evaluated numerous moving companies in your area, so you don’t have to. By checking their
                                credentials, customer feedback, and overall reputation, we made it easier for you to find
                                the
                                movers that are the best.</p>
                            <p>Every company listed here has been carefully reviewed by our team to make sure it offers
                                dependable and quality service you can rely on.</p>
                                   <div class="form_wrapper">
                        <form action="" class=" main_banner_form">
                            <div
                                class="d-lg-flex justify-content-lg-between justify-content-center align-items-center px-3">
                                <span class="mb-2 form_heading">
                                    Start Your Move with a Quick Cost Estimate
                                </span>
                                <p class="miles_upp">Moving Distance: 0 miles</p>
                            </div>
                            <div class="form_bg">
                                <div class="row">
                                    <div class="col-xl-4 mt-lg-0 mt-2">
                                        <div class="input_outer">
                                            <label for="external_zipfrom">Moving from*</label>
                                            <input type="text" id="external_zipfrom" name="moving-from"
                                                class="zipfromsearch pac-target-input" placeholder="Enter City Name"
                                                autocomplete="off">
                                            <span id="external_zipfrom_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mt-lg-0 mt-2">
                                        <div class="input_outer">
                                            <label for="external_ziptosearch">Moving to*</label>
                                            <input type="text" id="external_ziptosearch" name="moving-to"
                                                class="ziptosearch pac-target-input" placeholder="Enter City Name"
                                                autocomplete="off">
                                            <span id="external_ziptosearch_error" class="error-message hidden"></span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                        <a href="#ModalForm" data-bs-toggle="modal">
                                            <button class="quote-btn" type="button">
                                                Cost Calculator
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-1">
                                <p class="mt-2 mb-0 text-center secure_info">We keep your personal information safe and
                                    secure.
                                </p>
                            </div>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 mx-auto d-flex justify-content-center flex-column">
                            {{-- <div class="newsletter-area mb-5 ">
                                <form action="{{ route('company.mover-list') }}" method="GET"
                                    style="height:70px;border: 0px solid #1232694a;border-radius: 60px;font-family: var(--para-family);background-color: #EBFAFF;padding: 28px;"
                                    class="px-2 d-flex justify-content-start align-items-center">
                                    <input type="search" value="{{ request('search') }}" class="w-100 fs-5"
                                        style="border:none;outline:none;box-shadow:none;padding: 0px 20px; background-color: transparent;"
                                        placeholder="Search Company" name="search" required autocomplete="off">
                                    <button aria-label="footer-icon-btn"
                                        class="d-flex justify-content-center align-items-center search_btn"
                                        type="submit"><i
                                            class="fas position-relative text-center fs-4 fa-search"></i></button>
                                </form>
                            </div> --}}
                            <div class="col-lg-12 d-flex justify-content-center flex-column">
                                <div id="map_container" class="w-100 mb-4 mt-5">
                                    @include('frontend.company_auth.usa_map')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <div class="for_width">
            <h2>Find the best movers near me: By state</h2>
            <div class="all_states">
                <ul class="list-unstyled">
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/alabama">
                            Alabama
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/arizona">
                            Arizona
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/arkansas">
                            Arkansas
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/california">
                            California
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/colorado">
                            Colorado
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/connecticut">
                            Connecticut
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/delaware">
                            Delaware
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/florida">
                            Florida
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/georgia">
                            Georgia
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/idaho">
                            Idaho
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/illinois">
                            Illinois
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/indiana">
                            Indiana
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/iowa">
                            Iowa
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/kansas">
                            Kansas
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/kentucky">
                            Kentucky
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/louisiana">
                            Louisiana
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/maine">
                            Maine
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/maryland">
                            Maryland
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/massachusetts">
                            Massachusetts
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/michigan">
                            Michigan
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/minnesota">
                            Minnesota
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/mississippi">
                            Mississippi
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/missouri">
                            Missouri
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/montana">
                            Montana
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/nebraska">
                            Nebraska
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/nevada">
                            Nevada
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/new-hampshire">
                            New Hampshire
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/new-jersey">
                            New Jersey
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/new-mexico">
                            New Mexico
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/new-york">
                            New York
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/north-carolina">
                            North Carolina
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/north-dakota">
                            North Dakota
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/ohio">
                            Ohio
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/oklahoma">
                            Oklahoma
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/oregon">
                            Oregon
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/pennsylvania">
                            Pennsylvania
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/rhode-island">
                            Rhode Island
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/south-carolina">
                            South Carolina
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/south-dakota">
                            South Dakota
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/tennessee">
                            Tennessee
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/texas">
                            Texas
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/utah">
                            Utah
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/vermont">
                            Vermont
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/virginia">
                            Virginia
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/washington">
                            Washington
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/west-virginia">
                            West Virginia
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/wisconsin">
                            Wisconsin
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                        <a href="https://mymovingjourney.com/movers/wyoming">
                            Wyoming
                        </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="for_width">
            <h2>Find the best movers near me: By City</h2>
            <div class="all_states">
                <ul class="list-unstyled" id="citiesList">
                    @foreach ($city_pages as $cityPage)
                        <li class="city-item">
                            <img src="{{ asset('assets/img/arrow-right.png') }}" alt="right arrow" class="arrow-icon">
                            <a
                                href="https://mymovingjourney.com/movers/{{ $cityPage->state->slug }}/{{ $cityPage->slug }}">
                                {{ $cityPage->name }}, {{ $cityPage->state->abv }}
                            </a>
                        </li>
                    @endforeach

                </ul>
                <div class="text-center mt-4">
                    <a href="javascript:void(0)" id="toggleCities" class="see-more-cities-btn"
                        style="color: #116087; font-weight: 600; text-decoration: none; cursor: pointer; font-size: 16px; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                        <span id="toggleText">See More</span>
                        <i class="fas fa-chevron-down" id="toggleChevron" style="transition: transform 0.3s ease;"></i>
                    </a>
                </div>
            </div>
        </div>
        <style>
            .hidden-city {
                display: none !important;
            }

            .city-item {
                opacity: 1;
                transition: opacity 0.2s ease-in-out;
            }

            .see-more-cities-btn {
                transition: all 0.3s ease;
            }

            .see-more-cities-btn:hover {
                color: #0d4d6b !important;
                text-decoration: underline;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleBtn = document.getElementById('toggleCities');
                const toggleText = document.getElementById('toggleText');
                const toggleChevron = document.getElementById('toggleChevron');

                if (toggleBtn && toggleText && toggleChevron) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.preventDefault();

                        const allCityItems = document.querySelectorAll('#citiesList .city-item');
                        const isShowingMore = toggleText.textContent.trim() === 'See More';

                        if (isShowingMore) {
                            // Show all cities
                            allCityItems.forEach(function(city) {
                                city.classList.remove('hidden-city');
                                city.style.display = '';
                            });
                            toggleText.textContent = 'See Less';
                            toggleChevron.style.transform = 'rotate(180deg)';
                        } else {
                            // Hide cities after 36th
                            allCityItems.forEach(function(city, index) {
                                if (index >= 36) {
                                    city.classList.add('hidden-city');
                                    city.style.display = 'none';
                                }
                            });
                            toggleText.textContent = 'See More';
                            toggleChevron.style.transform = 'rotate(0deg)';

                            // Smooth scroll to list
                            const citiesList = document.getElementById('citiesList');
                            if (citiesList) {
                                citiesList.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }
                        }
                    });
                }
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="{{ asset('assets/js/home-quote.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
        <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "Find the Best Moving Companies – Local and Long Distance",
    "description": "Not sure which moving company to choose? Explore trusted local and long-distance moving companies, compare your options, and choose the right team.",
    "url": "{{url()->current()}}"
}
</script>
        <script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "MyMovingJourney",
    "url": "https://www.mymovinjourney.com"
}
</script>
        <script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "My Moving Journey",
        "item": "https://mymovingjourney.com/"
    }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Movers",
        "item": "{{url()->current()}}"
    }]
}
</script>
        <script>
            function formatPhoneNumber(input) {
                var phoneNumber = input.value.replace(/\D/g, '');

                var formattedPhoneNumber = '';
                if (phoneNumber.length > 0) {
                    formattedPhoneNumber = '(' + phoneNumber.substring(0, 3);
                }
                if (phoneNumber.length > 3) {
                    formattedPhoneNumber += ') ' + phoneNumber.substring(3, 6);
                }
                if (phoneNumber.length > 6) {
                    formattedPhoneNumber += ' - ' + phoneNumber.substring(6);
                }

                input.value = formattedPhoneNumber;
            }
        </script>
        <script>
            var div1 = $("#row_modal")
            var btn1 = $("#btn-canvas-Form")
            if (window.screen.width > 992) {
                div1.removeClass("d-none");
                btn1.addClass("d-none");
            } else {
                div1.addClass("d-none");
                div1.removeClass("sticky-form");
                btn1.removeClass("d-none");
            }
            $(window).resize(function() {
                if (window.screen.width > 992) {
                    div1.removeClass("d-none");
                    btn1.addClass("d-none");
                } else {
                    div1.addClass(" d-none");
                    div1.removeClass("sticky-form");
                    btn1.removeClass("d-none");
                }
            });
            $("#moveDate").flatpickr({
                dateFormat: "d-m-Y",
                disableMobile: "true"
            });
            $("#Modal_Btn").click(function() {
                var first_o_zip = $(".zipfromsearch").val()
                var first_d_zip = $(".ziptosearch").val()
                $('input[name="zip_from"]').val(first_o_zip)
                $('input[name="zip_to"]').val(first_d_zip)
            })
            $("#moveDate, #moveDate2").flatpickr({
                dateFormat: "d-m-Y",
                disableMobile: "true"
            });
        </script>


    @endsection
