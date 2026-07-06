<!doctype html>

<html lang="en">



<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="google-site-verification" content="oow-uT9TGuPKp7xHBcHeSrxPDPNItNwBAcD7KDCGmmk">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{!! trim(preg_replace('/\s+/', ' ', html_entity_decode($__env->yieldContent('title', 'My Moving Journey')))) !!}</title>
    <link rel="alternate" hreflang="en-us" href="{{ url()->current() }}">
    {{-- <meta name="robots" content="noindex, nofollow"> --}}
    @yield('head')

    <meta name="author" content="@yield('author', '')">

    <meta name="keywords" content="{!! trim(
        preg_replace('/\s+/', ' ', html_entity_decode(html_entity_decode($__env->yieldContent('meta_keywords', '')))),
    ) !!}">

    <meta name="title" content="{!! trim(
        preg_replace(
            '/\s+/',
            ' ',
            html_entity_decode(html_entity_decode($__env->yieldContent('meta_title', 'My Moving Journey'))),
        ),
    ) !!}">

    <meta name="description" content="{!! trim(
        preg_replace(
            '/\s+/',
            ' ',
            html_entity_decode(
                html_entity_decode(
                    $__env->yieldContent(
                        'meta_description',
                        'Pick the best moving company that will fulfill your complete needs under 1 roof - Let`s connect with  My Moving Journey Today For Fulfill Your Needs.',
                    ),
                ),
            ),
        ),
    ) !!}">


    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <link rel="apple-touch-icon" href="{{ asset('assets/img/favion.png') }}"> --}}

    <meta name="theme-color" content="#123269">

    <meta name="yandex-verification" content="98e43f3efee4bae1">


    <meta property="og:title" content="{!! trim(
        preg_replace(
            '/\s+/',
            ' ',
            html_entity_decode(html_entity_decode($__env->yieldContent('og:title', 'My Moving Journey'))),
        ),
    ) !!}">

    <meta property="og:description" content="{!! trim(
        preg_replace(
            '/\s+/',
            ' ',
            html_entity_decode(
                html_entity_decode(
                    $__env->yieldContent(
                        'og:description',
                        'Pick the best moving company that will fulfill your complete needs under 1 roof - Let`s connect with  My Moving Journey Today For Fulfill Your Needs.',
                    ),
                ),
            ),
        ),
    ) !!}">

    <meta property="og:image" content="@yield('og:image', asset('assets/img/logo.png'))">

    <meta property="og:url" content="{{ url()->current() }}">

    <meta property="og:site_name" content="MyMovingJourney">

    <meta property="twitter:account_id" content="1512957901">

    <meta name="twitter:card" content="summary_large_image">



    <meta name="twitter:image" content="@yield('og:image', asset('assets/img/logo.png'))">

    <meta name="twitter:image:alt" content="@yield('twitter:image:alt', 'My Moving Journey')">

    <meta name="twitter:site" content="@MyMovingJourney">

    <meta property="og:site_name" content="MyMovingJourney">

    <meta property="fb:page_id" content="101193886285221">



    <!-- Bootstrap CSS -->

    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> --}}

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="preload" href="{{ asset('assets/css/bootstrap.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Animate CSS -->
    {{--
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}"> --}}

    <!-- Meanmenu CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">

    <!-- Boxicons CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}"> --}}

    <!-- DATA TABLE -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"> --}}

    <!-- Flaticon CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

    <!-- Owl Carousel CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"> --}}

    <!-- Owl Theme Carousel CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Nice Select CSS -->

    {{-- <!-- <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}"> --> --}}

    <!-- Odometer CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}"> --}}

    <!-- Magnific Popup CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}"> --}}

    <!-- Imagelightbox CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/imagelightbox.min.css') }}"> --}}

    <!-- Style CSS -->

    <link rel="preload" href="{{ asset('assets/css/home-quote.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/home-quote.css') }}">

    <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Dark CSS -->



    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/mmj-favicon.png') }}">



    {{-- <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}"> --}}

    <!-- Responsive CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {

            w[l] = w[l] || [];

            w[l].push({

                'gtm.start': new Date().getTime(),

                event: 'gtm.js'

            });

            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),

                dl = l != 'dataLayer' ? '&l=' + l : '';

            j.async = true;

            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-WSVJ35K');
    </script>

    <!-- End Google Tag Manager -->



    {{-- <title>My Moving Journey</title> --}}

    {{-- <title>@yield('title', 'My Moving Journey')</title> --}}

    <link rel="icon" type="image/png" href="{{ asset('assets/img/mmj-favicon.png') }}">

    <style>
        .pac-container {

            z-index: 999999999999 !important;

            position: fixed;

        }



        .modal {
            z-index: 1055 !important;
        }

        #ModalForm .modal-content {
            max-height: calc(100vh - 3rem);
            overflow: hidden;
        }



        @media (max-width: 575.98px) {
            #ModalForm .modal-content {
                border-radius: 0.75rem;
            }
        }

        #modalRegisterForm h2 {
            font-family: var(--family);
            font-weight: 700;
            font-size: 26px !important;
            color: #1e1a1a !important;
            margin: 0px 0px;
        }

        .calculator-form-card {
            background: #f1f6f8 !important;
            border-radius: 20px !important;
            padding: 35px !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1) !important;
            border: 1px solid #e5e7eb !important;
        }

        .input_outer {
            background-color: #fff !important;
            padding: 8px 20px !important;
            border-radius: 15px !important;
            border: 2px solid #ccd9db5c !important;
        }
    </style>

</head>



<body>

    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSVJ35K" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->

    @include('layouts.partials.header')

    {{-- @include('layouts.partials.searchModal') --}}

    <div id="app">

        <main class="pb-0">

            @yield('content')

        </main>



        {{-- SCROLL ARROW BOTTOM TO TOP  --}}

        {{-- <div class="go-top">

            <i class='bx bx-up-arrow-alt'></i>

        </div> --}}



        {{-- chatbot --}}

        {{-- @include('frontend.company_auth.chat_box') --}}



        {{-- GET QUOTE MODAL FORM  --}}

        {{-- <button type="button" id="btn-canvas-Form" data-bs-toggle="modal" data-bs-target="#ModalForm"

            class="btn default-btn d-none py-2 my-0 fs-5 d-flex align-items-center text-center justify-content-center">Get

            Quote

        </button> --}}



        <div class="modal fade p-0" id="ModalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="ModalFormLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">

                <div class="modal-content border-0 rounded-0">

                    <div class="modal-header ">

                        <img src="{{ asset('assets/img/logo.png') }}" class="modal_header_logo" alt="company logo">

                        <button type="button" class="btn-close " data-bs-dismiss="modal"
                            aria-label="Close"></button>

                    </div>

                    <div class="modal-heading text-center">

                        {{-- <div class="modal_logo">

                            <img src={{ asset('assets/img/logo.png') }} style="width:150px !important;"

                                alt="logo">

                        </div> --}}

                        {{-- <h2 class="fs-4 mb-0 mt-3 multi-step-heading ">
                            Find your best price in just a few clicks.
                        </h2> --}}
                        {{-- <span class="mt-2">Save time and money!</span> --}}

                    </div>


                    <div class="modal-body py-2">


                        <form id="modalRegisterForm" action="{{ route('cost-estimator.post') }}"
                            class="login-form pt-2 px-0" method="POST">

                            <input type="hidden" name="referrer" value="{{ URL::current() }}">

                            @csrf

                            @include('backend.layouts.partials.messages')

                            <!-- Step 1: Moving From -->

                            <div class="step">
                                <p class="fs-4 mb-0 mt-0  multi-step-heading text-center">
                                    Find your best price in just a few clicks.
                                </p>

                                <p class="form_labels mb-1"><b>Where Are You Headed?</b></p>

                                <small class="mb-4">Tell us your route and we’ll help you save instantly.</small>



                                <div class="input_outer mt-2">

                                    <label for="zipfromsearch">Moving from*</label>

                                    <div>

                                        <input type="text" id="zipfromsearch"
                                            class="form-control zipfromsearch @error('zip_from') is-invalid @enderror"
                                            required name="zip_from" placeholder="City Name or Zip Code">

                                        @error('zip_from')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror

                                    </div>

                                </div>

                                <div class="input_outer mt-2">

                                    <label for="ziptosearch">Moving to*</label>

                                    <div>

                                        <input type="text" id="ziptosearch"
                                            class="form-control ziptosearch @error('zip_to') is-invalid @enderror"
                                            required name="zip_to" placeholder="City Name or Zip Code">

                                        @error('zip_to')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror

                                    </div>

                                </div>
                                <!-- Show calculated distance here -->
                                <div id="modal_distance_display" class="mb-2 text-primary" style="font-weight:500;">
                                </div>
                                <input type="hidden" id="modal_distance" name="distance">
                                <input type="hidden" id="modal_min_price" name="min_price">
                                <input type="hidden" id="modal_max_price" name="max_price">
                            </div>

                            <!-- Step 2: Additional Steps (e.g., moving date, property size, personal details) -->

                            <div class="step">

                                <!-- Step 2: Move Size only -->

                                <div class="for_height_modal">

                                    <div class="mb-3">
                                        <p class="form_labels"><b>Tell Us What You’re Moving</b></p>
                                        <small class="mb-4">Pick your space and we’ll handle the details.</small>
                                        <!-- Keep the select for backend submission; hide it and sync via cards -->
                                        <select
                                            class="form-select w-100 py-3 d-none @error('move_size') is-invalid @enderror"
                                            name="move_size" id="move_size" aria-label="Move Size">

                                            <option selected value="">-- Select Move Size --</option>

                                            <option value="Studio">Studio</option>

                                            <option value="1 Bedroom Home">1 Bedroom Home</option>

                                            <option value="2 Bedroom Home">2 Bedroom Home</option>

                                            <option value="3 Bedroom Home">3 Bedroom Home</option>

                                            <option value="4 Bedroom Home">4 Bedroom Home</option>

                                            <option value="5 Bedroom Home">5 Bedroom Home</option>

                                            <option value="Office Move">Office Move</option>

                                            <option value="Commercial Move">Commercial Move</option>

                                        </select>



                                        <!-- Card grid UI -->

                                        <div class="mmj-movesize-grid" role="listbox" aria-label="Move Size">

                                            <button type="button" class="mmj-movesize-card" data-value="Studio">

                                                <i class="fa-solid fa-house-chimney"></i>

                                                <span>Studio</span>

                                            </button>

                                            <button type="button" class="mmj-movesize-card"
                                                data-value="1 Bedroom Home">

                                                <i class="fa-solid fa-house"></i>

                                                <span>1 Bedroom</span>

                                            </button>

                                            <button type="button" class="mmj-movesize-card"
                                                data-value="2 Bedroom Home">

                                                <i class="fa-solid fa-house"></i>

                                                <span>2 Bedroom</span>

                                            </button>

                                            <button type="button" class="mmj-movesize-card"
                                                data-value="3 Bedroom Home">

                                                <i class="fa-solid fa-house"></i>

                                                <span>3 Bedroom</span>

                                            </button>

                                            <button type="button" class="mmj-movesize-card"
                                                data-value="4 Bedroom Home">

                                                <i class="fa-solid fa-house"></i>

                                                <span>4 Bedroom</span>

                                            </button>

                                            <button type="button" class="mmj-movesize-card"
                                                data-value="5 Bedroom Home">

                                                <i class="fa-solid fa-house"></i>

                                                <span>5 Bedroom</span>

                                            </button>

                                        </div>

                                        <!-- Add-on Services -->
                                        <div class="mt-4">
                                            <p class="form_labels mb-3"><b>Additional Services</b></p>
                                            <div class="d-flex gap-3 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="modal_packing" name="packing">
                                                    <label class="form-check-label" for="modal_packing">
                                                        <i class="fa-solid fa-box me-2"></i>Packing Service
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="modal_storage" name="storage">
                                                    <label class="form-check-label" for="modal_storage">
                                                        <i class="fa-solid fa-warehouse me-2"></i>Storage Service
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Step 3: Moving Date only -->

                            <div class="step">
                                <p class="fs-4 mb-0 mt-0  multi-step-heading text-center">
                                    Choose a date that works best for you
                                </p>
                                <div>
                                    <!-- Inline calendar (always visible). Selected date is stored in hidden input below. -->

                                    <div class="my-3" id="mmj-date-inline"></div>

                                    <input type="hidden" id="moveDate" name="date">

                                    @error('date')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror

                                    <!-- Date summary (hidden until a date is picked) -->

                                    <div id="mmj-date-summary" class="mmj-date-summary d-none">

                                        <div class="mmj-date-summary__box">

                                            <strong>Selected Date:</strong>

                                            <span id="mmj-date-selected"></span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Step 3: Estimate Cost & Personal Details -->

                            <div class="step">
                                <p class="fs-4 mb-0 mt-0 multi-step-heading text-center">
                                    Just One Last Step!
                                </p>

                                <p class="form_labels mb-1"><b>Tell Us How We Can Reach You</b></p>

                                <div class="mb-3 mt-2">

                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        name="name" placeholder="Your Name">

                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror

                                </div>

                                <div class="mb-3">

                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        name="email" placeholder="Your Email Address">

                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror

                                </div>

                                <div class="mb-3">

                                    <input type="tel" id="phone_no"
                                        class="form-control @error('phone_no') is-invalid @enderror" required
                                        name="phone_no" placeholder="(xxx) xxx - xxxx" inputmode="tel">

                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Phone No. format must be (xxx) xxx - xxxx</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!-- Show estimated cost here -->
                                <div id="modal_cost_display" class="mb-3 text-dark d-none" style="font-weight:600;">
                                </div>

                                <div class="mb-3">

                                    {!! NoCaptcha::display() !!}

                                </div>

                            </div>

                            <!-- Navigation Buttons -->

                            <div class="form-footer d-flex gap-3 justify-content-center">

                                <button type="button" class="sdg btn btn-secondary" id="modalPrevBtn"
                                    onclick="modalNextPrev(-1)">Back</button>

                                <button type="button" class="sdg btn btn-primary" id="modalNextBtn" disabled
                                    onclick="modalNextPrev(1)">Next</button>

                            </div>

                            <p id="modalConsentText" class="mmj-submit-consent d-none"
                                style="    color: #000;
    font-size: 11px !important;
    font-family: 'Urbanist' !important;
    line-height: 16px !important;
    margin-top: 20px;
    text-align: left;">
                                By submitting, you agree to our
                                <a href="https://mymovingjourney.com/terms-of-service" target="_blank"
                                    rel="noopener">Terms</a>
                                &
                                <a href="{{ url('/privacy-policy') }}" target="_blank" rel="noopener">Privacy
                                    Policy</a>
                                and consent to be contacted by moving companies via call, text, or email.
                            </p>

                        </form>






                    </div>


                    <style>
                        .mmj-submit-consent {
                            max-width: 520px;
                            margin: 12px auto 0;
                            padding: 10px 14px;
                            border: 1px solid #e7edf3;
                            border-radius: 10px;
                            background: #f8fafc;
                            color: #5f6b7a;
                            font-size: 12px;
                            line-height: 1.55;
                            text-align: center;
                        }

                        .mmj-submit-consent a {
                            color: #0d6efd;
                            font-weight: 600;
                            text-decoration: none;
                        }

                        .mmj-submit-consent a:hover {
                            text-decoration: underline;
                        }
                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const modalForm = document.getElementById('modalRegisterForm');
                            const modalConsentText = document.getElementById('modalConsentText');

                            if (!modalForm || !modalConsentText) return;

                            const steps = Array.from(modalForm.querySelectorAll('.step'));

                            function isStepVisible(step) {
                                const computedStyle = window.getComputedStyle(step);
                                return computedStyle.display !== 'none' && !step.classList.contains('d-none');
                            }

                            function toggleModalConsentText() {
                                const visibleStepIndex = steps.findIndex(isStepVisible);
                                const isLastStep = visibleStepIndex === steps.length - 1;

                                modalConsentText.classList.toggle('d-none', !isLastStep);
                            }

                            const stepObserver = new MutationObserver(toggleModalConsentText);

                            steps.forEach(function(step) {
                                stepObserver.observe(step, {
                                    attributes: true,
                                    attributeFilter: ['style', 'class']
                                });
                            });

                            modalForm.addEventListener('click', function() {
                                setTimeout(toggleModalConsentText, 0);
                            });

                            modalForm.addEventListener('change', function() {
                                setTimeout(toggleModalConsentText, 0);
                            });

                            toggleModalConsentText();
                        });
                    </script>


                </div>

            </div>

        </div>

    </div>

    <script>
        function validateZipFrom(input) {

            const regex = /^\d{1,5}(?:,\d{1,5})?$/;



            // Check if the input value matches the pattern

            if (!regex.test(input.value)) {

                // Show error message if not valid

                input.setCustomValidity('Zip From must be digits and may include a comma.');

            } else {

                // Reset error message if valid

                input.setCustomValidity('');

            }

        }
    </script>

    @include('layouts.partials.footer')

    {!! NoCaptcha::renderJs() !!}

</body>

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





    // Get your elements. Adjust if you prefer IDs over classes.

    const homeHeader = document.getElementById('header_sticky');

    const scrollWrapper = document.querySelector('.scroll_wrapper');

    const upperWrapper = document.querySelector('.upper_wrapper');

    const dropElement = document.getElementById('drop');

    const listItems = document.querySelector('.nav_items_list');

    const searchItems = document.querySelector('.nav_items_search');



    window.addEventListener('scroll', () => {

        if (window.pageYOffset > 300) {

            // Add sticky classes to the header and change drop element color

            if (homeHeader) {

                homeHeader.classList.add('header_sticky', 'sticky_link_color');

            }

            if (dropElement) {

                dropElement.style.color = '#123269';

            }

            // Show the scroll_wrapper and hide the upper_wrapper

            if (scrollWrapper) {

                scrollWrapper.classList.remove('d-none', 'd-flex');

                scrollWrapper.classList.add('d-block');

            }

            if (upperWrapper) {

                upperWrapper.classList.add('d-none');

                upperWrapper.classList.remove('d-flex');

            }

            // Hide the navigation list items and show the search form

            if (listItems) {

                listItems.classList.add('d-none');

                listItems.classList.remove('d-flex');

            }

            if (searchItems) {

                searchItems.classList.remove('d-none');

                searchItems.classList.add('d-block');

            }

        } else {

            // Remove sticky classes from the header and reset drop element color

            if (homeHeader) {

                homeHeader.classList.remove('header_sticky', 'sticky_link_color');

            }

            if (dropElement) {

                dropElement.style.color = '';

            }

            // Hide the scroll_wrapper and show the upper_wrapper

            if (scrollWrapper) {

                scrollWrapper.classList.add('d-none');

                scrollWrapper.classList.remove('d-block');

            }

            if (upperWrapper) {

                upperWrapper.classList.remove('d-none');

                upperWrapper.classList.add('d-flex');

            }

            // Show the navigation list items and hide the search form

            if (listItems) {

                listItems.classList.remove('d-none');

                listItems.classList.add('d-flex');

            }

            if (searchItems) {

                searchItems.classList.add('d-none');

                searchItems.classList.remove('d-block');

            }

        }

    });
</script>

<!-- Jquery Slim JS -->

{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Bootstrap JS -->

{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Meanmenu JS -->

<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>

<!-- Owl Carousel JS -->

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<!-- Odometer JS -->

<script src="{{ asset('assets/js/odometer.min.js') }}"></script>

<!-- Jquery Appear JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>

<!-- Datepicker JS -->

<script src="{{ asset('assets/js/datepicker.min.js') }}"></script>

<!-- Imagelightbox JS -->

<script src="{{ asset('assets/js/imagelightbox.min.js') }}"></script>

<!-- Popup JS -->

<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<!-- Nice Select JS -->

{{-- <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script> --}}

<!-- Ajaxchimp JS -->

<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Form Validator JS -->

<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>

<!-- Contact JS -->

<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>

<!-- Wow JS -->

<script src="{{ asset('assets/js/wow.min.js') }}"></script>

<!-- Custom JS -->

<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    // MMJ Custom Calendar (no flatpickr) — range capable like the screenshot

    document.addEventListener('DOMContentLoaded', function() {

        const wrap = document.getElementById('mmj-date-inline');

        const hiddenInput = document.getElementById('moveDate');

        const nextBtn = document.getElementById('modalNextBtn');

        const summaryWrap = document.getElementById('mmj-date-summary');

        const summaryTxt = document.getElementById('mmj-date-selected');



        if (!wrap || !hiddenInput) return;



        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',

            'September', 'October', 'November', 'December'

        ];



        let view = new Date();

        view.setDate(1);

        let selectedDate = null; // single selected date



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

            return a && b && a.getFullYear() === b.getFullYear() && a.getMonth() === b.getMonth() && a

                .getDate() === b.getDate();

        }



        // no range needed



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

            for (let i = 0; i < firstDayIdx; i++) cells.push(

                '<div class="mmj-cal__cell mmj-cal__cell--empty"></div>');

            for (let d = 1; d <= daysInMonth; d++) {

                const date = new Date(year, month, d);

                const isDisabled = date < today;

                const classes = ['mmj-cal__cell'];

                let label = d;



                if (isDisabled) {

                    classes.push('mmj-cal__cell--disabled');

                } else {

                    if (selectedDate && isSameDay(date, selectedDate)) {

                        classes.push('mmj-cal__cell--selected');

                    }

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



            wrap.querySelector('.mmj-cal__prev').addEventListener('click', () => {

                view.setMonth(view.getMonth() - 1);

                render();

            });

            wrap.querySelector('.mmj-cal__next').addEventListener('click', () => {

                view.setMonth(view.getMonth() + 1);

                render();

            });

            wrap.querySelectorAll('.mmj-cal__cell[data-day]').forEach(btn => {

                btn.addEventListener('click', () => {

                    const d = parseInt(btn.getAttribute('data-day'), 10);

                    const picked = new Date(view.getFullYear(), view.getMonth(), d);

                    // single selection logic

                    selectedDate = picked;

                    hiddenInput.value = ymd(selectedDate);

                    summaryTxt.textContent = human(selectedDate);

                    summaryWrap.classList.remove('d-none');

                    if (nextBtn) nextBtn.disabled = false;



                    render();

                });

            });

        }



        // Expose for outside calls (e.g., on step change)

        window.mmjRenderCalendar = render;



        const modal = document.getElementById('ModalForm');

        if (modal) {

            modal.addEventListener('shown.bs.modal', render, {

                once: true

            });

        } else {

            render();

        }

    });
</script>

<!-- TABLE JS -->

<script type="module" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="module" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>





<script>
    $(document).ready(function() {

        $('#table-of-review').DataTable({

            searching: false,

            responsive: true,

            "bLengthChange": false,

            "bInfo": false,

            fixedColumns: true,

            fixedColumnsleft: 2,

            "language": {

                "paginate": {

                    "previous": "<",

                    "next": ">"

                }

            }

        });



    });
</script>



<script src="{{ asset('assets/js/star.js') }}"></script>

<script>
    (function($) {

        var paginate = {

            startPos: function(pageNumber, perPage) {

                // determine what array position to start from

                // based on current page and # per page

                return pageNumber * perPage;

            },

            getPage: function(items, startPos, perPage) {

                // declare an empty array to hold our page items

                var page = [];

                // only get items after the starting position

                items = items.slice(startPos, items.length);

                // loop remaining items until max per page

                for (var i = 0; i < perPage; i++) {

                    page.push(items[i]);

                }

                return page;

            },



            totalPages: function(items, perPage) {

                // determine total number of pages

                return Math.ceil(items.length / perPage);

            },



            createBtns: function(totalPages, currentPage) {

                // create buttons to manipulate current page

                var pagination = $('<div class="pagination mt-5" />');



                pagination.append(

                    '<span class="pagination-button">&lt;&lt;</span>'

                );

                // add a "first" button

                pagination.append(

                    '<span class="pagination-button d-md-flex d-none">&lt;</span>');

                // add a "first" button



                // add pages inbetween

                for (var i = 1; i <= totalPages; i++) {

                    // truncate list when too large

                    if (totalPages > 3 && currentPage !== i) {

                        // if on first two pages

                        if (currentPage === 1) {

                            // show first 5 pages

                            if (i > 3) continue;

                            // if on last two pages

                        } else {

                            if (i < currentPage - 1 || i > currentPage + 1) {

                                continue;

                            }

                        }

                    }

                    // markup for page button

                    var pageBtn = $('<span class="pagination-button page-num" />');

                    // add active class for current page

                    if (i == currentPage) {

                        pageBtn.addClass('active');

                    }



                    // set text to the page number

                    pageBtn.text(i);



                    // add button to the container

                    pagination.append(pageBtn);

                }

                // add a "last" button

                pagination.append($(

                    '<span class="pagination-button d-md-flex d-none">&gt;</span>'

                ));

                pagination.append($(

                    '<span class="pagination-button">&gt;&gt;</span>'

                ));

                return pagination;

            },



            createPage: function(items, currentPage, perPage) {

                // remove pagination from the page

                $('.pagination').remove();

                // set context for the items

                var container = items.parent(),

                    // detach items from the page and cast as array

                    items = items.detach().toArray(),

                    // get start position and select items for page

                    startPos = this.startPos(currentPage - 1, perPage),

                    page = this.getPage(items, startPos, perPage);

                // loop items and readd to page

                $.each(page, function() {

                    // prevent empty items that return as Window

                    if (this.window === undefined) {

                        container.append($(this));

                    }

                });

                // prep pagination buttons and add to page

                var totalPages = this.totalPages(items, perPage),

                    pageButtons = this.createBtns(totalPages, currentPage);

                container.after(pageButtons);

            }

        };



        // stuff it all into a jQuery method!

        $.fn.paginate = function(perPage) {

            var items = $(this);



            // default perPage to 5

            if (isNaN(perPage) || perPage === undefined) {

                perPage = 3;

            }



            // don't fire if fewer items than perPage

            if (items.length <= perPage) {

                return true;

            }



            // ensure items stay in the same DOM position

            if (items.length !== items.parent()[0].children.length) {

                items.wrapAll(

                    '<div class="pagination-items  flex-wrap d-flex justify-content-lg-between justify-content-center" />'

                );

            }



            // paginate the items starting at page 1

            paginate.createPage(items, 1, perPage);



            // handle click events on the buttons

            $(document).on('click', '.pagination-button', function(e) {

                // get current page from active button

                var currentPage = parseInt($('.pagination-button.active').text(), 10),

                    newPage = currentPage,

                    totalPages = paginate.totalPages(items, perPage),

                    target = $(e.target);



                // get numbered page

                newPage = parseInt(target.text(), 10);

                if (target.text() == '<') newPage = currentPage - 1;

                if (target.text() == '>') newPage = currentPage + 1;

                if (target.text() == '<<') newPage = 1;

                if (target.text() == '>>') newPage = totalPages;



                // ensure newPage is in available range

                if (newPage > 0 && newPage <= totalPages) {

                    paginate.createPage(items, newPage, perPage);

                }

            });

        };



    })(jQuery);



    /* This part is just for the demo,

    not actually part of the plugin */

    $('.article-loop').paginate(10);
</script>

<script>
    // Keep external datepicker only (avoid re-initializing the inline Step 3 calendar)

    $("#moveDate2").flatpickr({

        dateFormat: "d-m-Y",

        disableMobile: "true",

        minDate: "today",

    });
</script>

<script type="text/javascript">
    // Global Variables

    var modalCurrentStep = 0;

    // Global flatpickr instance for step 3 calendar

    var modalDatePicker = null;

    var zipFromData = null,

        zipToData = null;

    var validZipFrom = false,

        validZipTo = false;

    var extZipFromData = null,

        extZipToData = null;

    var extValidZipFrom = false,

        extValidZipTo = false;

    // var path = "{{ route('autocomplete') }}"; // Autocomplete suggestions URL



    // Setup external form autocomplete

    $("#external_zipfrom, #external_ziptosearch").autocomplete({

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

                        const limitedData = data.slice(0, 5);

                        response($.map(limitedData, function(item) {

                            let zipFormatted = item.value.toString().padStart(5,

                                '0');

                            return {

                                label: zipFormatted + ', ' + item.name,

                                value: zipFormatted,

                                city: item.name,

                                id: item.id,

                                latitude: item.latitude,

                                longitude: item.longitude

                            };

                        }));

                    }

                });

            }

        },

        select: function(event, ui) {

            $(this).val(ui.item.label).attr('data-valid', ui.item.label);

            if ($(this).attr('id') === 'external_zipfrom') {

                extZipFromData = ui.item;

                extValidZipFrom = true;

                $("#external_zipfrom_error").text("");

            } else {

                extZipToData = ui.item;

                extValidZipTo = true;

                $("#external_ziptosearch_error").text("");

            }

            // Also copy validated external field values to modal fields if needed.

            // (If external field is primary, modal values get updated.)

            if ($("#zipfromsearch").length && $("#ziptosearch").length) {

                var zipFromVal = $("#external_zipfrom").val();

                var zipToVal = $("#external_ziptosearch").val();

                if (zipFromVal && zipToVal) {

                    $("#zipfromsearch").val(zipFromVal).attr('data-valid', zipFromVal);

                    $("#ziptosearch").val(zipToVal).attr('data-valid', zipToVal);

                    zipFromData = extZipFromData;

                    zipToData = extZipToData;

                    validZipFrom = true;

                    validZipTo = true;

                    modalCheckNextButton();

                }

            }

            return false;
        }
    }).on('blur', function() {
        if (!$(this).attr('data-valid')) {
            $(this).val('');
            if ($(this).attr('id') === 'external_zipfrom') {
                extValidZipFrom = false;
            } else {
                extValidZipTo = false;
            }
        }
    }).on('input', function() {
        if ($(this).val() !== $(this).attr('data-valid')) {
            $(this).removeAttr('data-valid');
            if ($(this).attr('id') === 'external_zipfrom') {
                extValidZipFrom = false;
            } else {
                extValidZipTo = false;
            }
        }
    });
    // Setup header form autocomplete
    $("#header_zipfrom, #header_ziptosearch").autocomplete({
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
                        const limitedData = data.slice(0, 5);
                        response($.map(limitedData, function(item) {
                            let zipFormatted = item.value.toString().padStart(5,
                                '0');
                            return {
                                label: zipFormatted + ', ' + item.name,
                                value: zipFormatted,
                                city: item.name,
                                id: item.id,
                                latitude: item.latitude,
                                longitude: item.longitude
                            };
                        }));
                    }
                });
            }
        },
        select: function(event, ui) {
            $(this).val(ui.item.label).attr('data-valid', ui.item.label);
            // Agar header_zipfrom select hota hai
            if ($(this).attr('id') === 'header_zipfrom') {
                zipFromData = ui.item;
                validZipFrom = true;
                // Auto-populate modal field with header value
                $("#zipfromsearch").val(ui.item.label).attr('data-valid', ui.item.label);
            } else { // For header_ziptosearch
                zipToData = ui.item;
                validZipTo = true;
                $("#ziptosearch").val(ui.item.label).attr('data-valid', ui.item.label);
            }
            modalCheckNextButton();
            return false;
        }
    }).on('blur', function() {
        if (!$(this).attr('data-valid')) {
            $(this).val('');
        }
    }).on('input', function() {
        if ($(this).val() !== $(this).attr('data-valid')) {
            $(this).removeAttr('data-valid');
        }
    });
    // Setup modal form autocomplete (if needed for direct manual input)
    $("#zipfromsearch, #ziptosearch").autocomplete({
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
                        const limitedData = data.slice(0, 5);
                        response($.map(limitedData, function(item) {
                            let zipFormatted = item.value.toString().padStart(5,
                                '0');
                            return {
                                label: zipFormatted + ', ' + item.name,
                                value: zipFormatted + ', ' + item.name,
                                city: item.name,
                                id: item.id,
                                latitude: item.latitude,
                                longitude: item.longitude
                            };
                        }));
                    }
                });
            }
        },
        select: function(event, ui) {
            $(this).val(ui.item.value).attr('data-valid', ui.item.value);
            if ($(this).attr('id') === 'zipfromsearch') {
                zipFromData = ui.item;
                validZipFrom = true;
            } else {
                zipToData = ui.item;
                validZipTo = true;
            }
            modalCheckNextButton();
            return false;
        }
    }).on('blur', function() {
        if (!$(this).attr('data-valid')) {
            $(this).val('');
            if ($(this).attr('id') === 'zipfromsearch') {
                validZipFrom = false;
            } else {
                validZipTo = false;
            }
            modalCheckNextButton();
        }
    }).on('input', function() {
        if ($(this).val() !== $(this).attr('data-valid')) {
            $(this).removeAttr('data-valid');
            if ($(this).attr('id') === 'zipfromsearch') {
                validZipFrom = false;
            } else {
                validZipTo = false;
            }
            modalCheckNextButton();
        }
    });
    // Removed keyup validation that was limiting input to 5 chars
    // When "Get Quote" (external form) or "Free Moving Quote" (header form) is clicked,
    // check fields and copy values into the modal form.
    $('.get_quote, .free_estimate_btn').on('click', function() {
        var hasError = false;
        // Check external fields if available
        if ($("#external_zipfrom").length) {
            if (!extValidZipFrom) {
                $("#external_zipfrom_error").text("Please select a ZIP code from suggestions");
                hasError = true;
            } else {
                $("#external_zipfrom_error").text("");
            }
            if (!extValidZipTo) {
                $("#external_ziptosearch_error").text("Please select a ZIP code from suggestions");
                hasError = true;
            } else {
                $("#external_ziptosearch_error").text("");
            }
        }
        if (hasError) {
            return;
        }
        // Prefer external field values; if not, fallback to header values.
        var zipFromVal = $("#external_zipfrom").val() || $("#header_zipfrom").val();
        var zipToVal = $("#external_ziptosearch").val() || $("#header_ziptosearch").val();
        if (!zipFromVal || !zipToVal) {
            if (!zipFromVal && $("#external_zipfrom_error").length) {
                $("#external_zipfrom_error").text("Please select a ZIP code from suggestions");
            }
            if (!zipToVal && $("#external_ziptosearch_error").length) {
                $("#external_ziptosearch_error").text("Please select a ZIP code from suggestions");
            }
            return;
        }
        // Copy the validated values to the modal fields.
        $("#zipfromsearch").val(zipFromVal).attr('data-valid', zipFromVal);
        $("#ziptosearch").val(zipToVal).attr('data-valid', zipToVal);
        // Set global variables for modal step.
        zipFromData = extZipFromData || null;
        zipToData = extZipToData || null;
        validZipFrom = true;
        validZipTo = true;
        modalCheckNextButton();
    });
    // Modal multi-step form functions
    document.addEventListener("DOMContentLoaded", function() {
        modalShowStep(modalCurrentStep);
        setupAdditionalValidations();
        setupZipKeyupValidation();
    });

    function modalShowStep(n) {
        const steps = document.querySelectorAll("#modalRegisterForm .step");
        for (let i = 0; i < steps.length; i++) {
            steps[i].style.display = "none";
        }
        steps[n].style.display = "block";
        // Get the buttons
        var prevBtn = document.getElementById("modalPrevBtn");
        var nextBtn = document.getElementById("modalNextBtn");
        // Adjust buttons and progress bar
        prevBtn.style.display = n === 0 ? "none" : "inline-block";
        // Change button text based on current step but keep type as button
        if (n === (steps.length - 1)) {
            nextBtn.innerHTML = "Submit";
            // Keep type as button to avoid HTML5 validation on hidden required fields
            nextBtn.setAttribute("type", "button");
            // Ensure onclick is set for manual submission
            if (!nextBtn.getAttribute('onclick')) {
                nextBtn.setAttribute('onclick', 'modalNextPrev(1)');
            }
        } else {
            nextBtn.innerHTML = "Next";
            nextBtn.setAttribute("type", "button");
            if (!nextBtn.getAttribute('onclick')) {
                nextBtn.setAttribute('onclick', 'modalNextPrev(1)');
            }
        }
        modalUpdateProgressBar(n);
        modalCheckNextButton();
        // If we are on Step 3 (index 2) ensure the inline calendar renders now
        if (n === 2) {
            if (typeof window.mmjRenderCalendar === 'function') {
                window.mmjRenderCalendar();
            } else {
                setTimeout(function() {
                    if (typeof window.mmjRenderCalendar === 'function') window.mmjRenderCalendar();
                }, 50);
            }
        }
    }

    function modalNextPrev(n) {
        // For forward navigation, validate current step
        if (n === 1 && !modalValidateForm()) return false;
        // Proceed according to direction (back or next)
        proceedStep(n);
    }

    function proceedStep(n) {
        var steps = document.getElementsByClassName("step");
        var nextIndex = modalCurrentStep + n;
        if (nextIndex < 0) {
            nextIndex = 0;
        }
        // If moving past the last step, validate first then submit
        if (nextIndex >= steps.length) {
            // Validate current step before submitting
            if (!modalValidateForm()) {
                return false;
            }
            document.getElementById("modalRegisterForm").submit();
            return false;
        }
        // Otherwise transition to the next step
        steps[modalCurrentStep].style.display = "none";
        modalCurrentStep = nextIndex;
        modalShowStep(modalCurrentStep);
    }

    function modalValidateForm() {
        var valid = true;
        var currentFields = document.querySelectorAll("#modalRegisterForm .step")[modalCurrentStep].querySelectorAll(
            "input, select");
        currentFields.forEach(function(field) {
            field.classList.remove("invalid");
            if (field.hasAttribute("required") && field.value.trim() === "") {
                field.classList.add("invalid");
                valid = false;
            }
        });
        // No blocking on distance at this stage; allow submit to handle it
        return valid;
    }
    // ...existing code...
    // --- MMJ Modal Distance & Cost Calculation ---
    // Haversine formula: straight-line distance in miles between two lat/lng points
    function haversineDistanceMiles(lat1, lng1, lat2, lng2) {
        var R = 3958.8;
        var dLat = (lat2 - lat1) * Math.PI / 180;
        var dLng = (lng2 - lng1) * Math.PI / 180;
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLng / 2) * Math.sin(dLng / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }

    function updateModalDistanceAndCost() {
        console.log("updateModalDistanceAndCost triggered", {
            zipFromData,
            zipToData
        });

        // Support both lat/lng (Google Places) and latitude/longitude (jQuery autocomplete from DB)
        var lat1 = (zipFromData && (zipFromData.lat || zipFromData.latitude)) ? parseFloat(zipFromData.lat ||
            zipFromData.latitude) : null;
        var lng1 = (zipFromData && (zipFromData.lng || zipFromData.longitude)) ? parseFloat(zipFromData.lng ||
            zipFromData.longitude) : null;
        var lat2 = (zipToData && (zipToData.lat || zipToData.latitude)) ? parseFloat(zipToData.lat || zipToData
            .latitude) : null;
        var lng2 = (zipToData && (zipToData.lng || zipToData.longitude)) ? parseFloat(zipToData.lng || zipToData
            .longitude) : null;

        console.log("Coordinates:", lat1, lng1, "->", lat2, lng2);

        if (!lat1 || !lng1 || !lat2 || !lng2) {
            // Try geocoding to resolve coordinates from address text
            var fromAddress = zipFromData && (zipFromData.value || zipFromData.city || '');
            var toAddress = zipToData && (zipToData.value || zipToData.city || '');

            if (fromAddress && toAddress && window.google && window.google.maps && google.maps.Geocoder) {
                console.log("Geocoding addresses for coordinates:", fromAddress, "->", toAddress);
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: fromAddress
                }, function(results, status) {
                    if (status === 'OK' && results[0]) {
                        zipFromData.lat = results[0].geometry.location.lat();
                        zipFromData.lng = results[0].geometry.location.lng();
                    }
                    geocoder.geocode({
                        address: toAddress
                    }, function(results2, status2) {
                        if (status2 === 'OK' && results2[0]) {
                            zipToData.lat = results2[0].geometry.location.lat();
                            zipToData.lng = results2[0].geometry.location.lng();
                        }
                        // Retry with (now hopefully populated) coordinates
                        updateModalDistanceAndCost();
                    });
                });
                return; // Wait for geocoding to finish
            }

            console.log("No lat/lng available, cannot calculate distance.");
            $('#modal_distance_display').html('');
            $('#modal_distance').val('');
            calculateModalCost();
            return;
        }

        // Try DistanceMatrixService first (same approach as working cost estimator)
        if (window.google && window.google.maps && google.maps.DistanceMatrixService) {
            var matrixService = new google.maps.DistanceMatrixService();
            matrixService.getDistanceMatrix({
                origins: [new google.maps.LatLng(lat1, lng1)],
                destinations: [new google.maps.LatLng(lat2, lng2)],
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.IMPERIAL
            }, function(response, status) {
                console.log("DistanceMatrixService status:", status, response);
                if (status === 'OK' &&
                    response.rows && response.rows[0] &&
                    response.rows[0].elements && response.rows[0].elements[0] &&
                    response.rows[0].elements[0].status === 'OK') {

                    var distText = response.rows[0].elements[0].distance.text;
                    var distMiles = parseFloat(distText.replace(/[^0-9\.]/g, ''));
                    console.log("DistanceMatrix result:", distMiles, "miles");

                    $('#modal_distance_display').html('Distance: <b>' + distMiles.toFixed(0) + ' mi</b>');
                    $('#modal_distance').val(distMiles.toFixed(2));
                    calculateModalCost();
                } else {
                    // Fallback to Haversine
                    console.log("DistanceMatrix failed:", status, "- using Haversine fallback");
                    useHaversineFallback(lat1, lng1, lat2, lng2);
                }
            });
        } else {
            // Google not loaded yet — use Haversine
            useHaversineFallback(lat1, lng1, lat2, lng2);
        }

        function useHaversineFallback(lat1, lng1, lat2, lng2) {
            var straight = haversineDistanceMiles(lat1, lng1, lat2, lng2);
            var driving = straight * 1.25;
            console.log("Haversine fallback:", driving.toFixed(2), "miles");
            $('#modal_distance_display').html('Distance: <b>' + driving.toFixed(0) + ' mi</b>');
            $('#modal_distance').val(driving.toFixed(2));
            calculateModalCost();
        }
    }

    // --- External Form Distance Calculation ---
    // --- External Form Distance Calculation ---
    function updateExternalDistance() {
        // Get values directly from inputs
        const fromVal = $('#external_zipfrom').val();
        const toVal = $('#external_ziptosearch').val();

        // Run if both values are present (relaxed check)
        if (fromVal && toVal) {
            const service = new google.maps.DirectionsService();
            service.route({
                origin: fromVal,
                destination: toVal,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status === 'OK') {
                    const leg = response.routes[0].legs[0];
                    const miles = leg.distance.value * 0.000621371; // meters to miles

                    // Update all elements with class .miles_upp
                    $('.miles_upp').each(function() {
                        if ($(this).is('p')) {
                            $(this).html(`Moving Distance: <b>${leg.distance.text}</b>`);
                        } else {
                            // For spans inside text (e.g. "about <span class='miles_upp'>0</span> miles")
                            // We just want the number.
                            $(this).html(` ${Math.round(miles).toLocaleString()} `);
                        }
                    });

                    // Update hidden inputs if any
                    $('.mmj-distance-hidden').val(miles.toFixed(2));
                } else {
                    $('.miles_upp').each(function() {
                        if ($(this).is('p')) {
                            $(this).html('Moving Distance: 0 miles');
                        } else {
                            $(this).html(' 0 ');
                        }
                    });
                    $('.mmj-distance-hidden').val('');
                }
            });
        } else {
            $('.miles_upp').each(function() {
                if ($(this).is('p')) {
                    $(this).html('Moving Distance: 0 miles');
                } else {
                    $(this).html(' 0 ');
                }
            });
            $('.mmj-distance-hidden').val('');
        }
    }

    function calculateModalCost() {
        let moveSize = $('#move_size').val();
        let distance = parseFloat($('#modal_distance').val()) || 0;
        let base = 200,
            perMile = 2,
            sizeFactor = 1;
        switch (moveSize) {
            case 'Studio':
                sizeFactor = 1;
                break;
            case '1 Bedroom Home':
                sizeFactor = 1.2;
                break;
            case '2 Bedroom Home':
                sizeFactor = 1.4;
                break;
            case '3 Bedroom Home':
                sizeFactor = 1.6;
                break;
            case '4 Bedroom Home':
                sizeFactor = 1.8;
                break;
            case '5 Bedroom Home':
                sizeFactor = 2;
                break;
            default:
                sizeFactor = 1;
        }
        let min = Math.round(base * sizeFactor + distance * perMile * sizeFactor);
        let max = Math.round(min * 1.2);
        // Add packing service cost
        if ($('#modal_packing').is(':checked')) {
            min += 300;
            max += 300;
        }
        // Add storage service cost
        if ($('#modal_storage').is(':checked')) {
            min += 400;
            max += 400;
        }
        $('#modal_cost_display').html(`Estimated Cost: <b>$${min} - $${max}</b>`);
        $('#modal_min_price').val(min);
        $('#modal_max_price').val(max);
    }
    // Trigger distance calculation whenever both ZIP fields have values
    $('#zipfromsearch, #ziptosearch').on('change', function() {
        if ($('#zipfromsearch').val().trim() && $('#ziptosearch').val().trim()) {
            updateModalDistanceAndCost();
        }
    });
    $('#move_size').on('change', calculateModalCost);
    $('.mmj-movesize-card').on('click', calculateModalCost);
    $('#modal_packing, #modal_storage').on('change', calculateModalCost);
    // On modal open, trigger calculation
    $('#ModalForm').on('shown.bs.modal', function() {
        setTimeout(function() {
            // Check if both ZIP fields already have values and calculate distance
            if ($('#zipfromsearch').val() && $('#ziptosearch').val()) {
                updateModalDistanceAndCost();
            }
        }, 500);
    });
    // On submit, ensure all fields are filled
    $('#modalRegisterForm').on('submit', function(e) {
        const phoneValid = validatePhoneNumber($('#phone_no').val());
        if (!validZipFrom || !validZipTo) {
            e.preventDefault();
            alert("Please ensure both origin and destination addresses are selected from the suggestions.");
            return false;
        }
        if (!phoneValid) {
            e.preventDefault();
            alert("Please enter a valid phone number.");
            return false;
        }
        // Do not block submit for distance/cost calculation
    });

    function modalUpdateProgressBar(n) {
        var steps = document.querySelectorAll("#modalRegisterForm .step").length;
        var percent = steps > 1 ? (n / (steps - 1)) * 100 : 100;
        var progressBar = document.querySelector(".progress-bar_modal");
        if (progressBar) {
            progressBar.style.width = percent + "%";
        }
        var progressText = document.getElementById("modalProgressText");
        if (progressText) {
            var containerWidth = document.querySelector(".progress-container").offsetWidth;
            var textWidth = progressText.offsetWidth;
            var newLeft = (percent / 100) * containerWidth - (textWidth / 2);
            if (newLeft < 0) newLeft = 0;
            if (newLeft > containerWidth - textWidth) newLeft = containerWidth - textWidth;
            progressText.style.left = newLeft + "px";
            progressText.innerText = Math.round(percent) + "%";
        }
    }
    // Utility: Validate and format phone number
    function validatePhoneNumber(phone) {
        const regex = /^\(\d{3}\) \d{3} - \d{4}$/;
        return regex.test(phone);
    }

    function formatPhoneNumber(input) {
        let numbers = input.value.replace(/\D/g, '');
        let char = {
            0: '(',
            3: ') ',
            6: ' - '
        };
        let formatted = '';
        for (let i = 0; i < numbers.length && i < 10; i++) {
            formatted += (char[i] || '') + numbers[i];
        }
        input.value = formatted;
    }
    $("#phone_no").on('input', function(e) {
        formatPhoneNumber(e.target);
        $(this).toggleClass('is-invalid', !validatePhoneNumber(this.value));
    });
    // ...existing code...
    $('#modalRegisterForm').off('submit').on('submit', function(e) {
        const phoneValid = validatePhoneNumber($('#phone_no').val());
        if (!validZipFrom || !validZipTo) {
            e.preventDefault();
            alert("Please ensure both origin and destination addresses are selected from the suggestions.");
            return false;
        }
        if (!phoneValid) {
            e.preventDefault();
            alert("Please enter a valid phone number.");
            return false;
        }
        // Do not block submit for distance/cost calculation
    });

    function setupAdditionalValidations() {
        var nameField = document.getElementById("name");
        if (nameField) {
            nameField.addEventListener("input", function() {
                this.value = this.value.replace(/[^A-Za-z\s]/g, "");
            });
        }
    }

    function setupZipKeyupValidation() {
        // Removed 5-char limit here too
    }



    function modalCheckNextButton() {

        // Step-wise gating: 0=locations, 1=move size, 2=date, 3=personal

        if (modalCurrentStep === 0) {

            $("#modalNextBtn").prop("disabled", !(validZipFrom && validZipTo));

            // If both ZIPs are valid, trigger distance calculation
            if (validZipFrom && validZipTo) {
                updateModalDistanceAndCost();
            }
            return;

        }

        if (modalCurrentStep === 1) {

            var hasMoveSize = $("#move_size").val() && $("#move_size").val() !== '';

            $("#modalNextBtn").prop("disabled", !hasMoveSize);

            return;

        }

        if (modalCurrentStep === 2) {

            var hasDate = $("#moveDate").val() && $("#moveDate").val() !== '';

            $("#modalNextBtn").prop("disabled", !hasDate);

            return;

        }

        $("#modalNextBtn").prop("disabled", false);

    }
</script>

<script>
    // Map of state abbreviations to sample ZIP codes

    const stateZipMap = {

        'FL': ['33101', '32801', '32202', '34101'],

        'CA': ['90001', '94101', '95814', '92101'],

        'NY': ['10001', '11201', '14604', '12207'],

        'TX': ['73301', '75201', '77001', '78701'],

        'AL': ['35801', '36101'],

        'AK': ['99501', '99701'],

        'AZ': ['85001', '85701'],

        'AR': ['72201', '72701'],

        'CO': ['80201', '80301'],

        'CT': ['06101', '06401'],

        'DE': ['19901', '19801'],

        'GA': ['30301', '31401'],

        'HI': ['96801', '96701'],

        'ID': ['83701', '83201'],

        'IL': ['60601', '62701'],

        'IN': ['46201', '47401'],

        'IA': ['50301', '52401'],

        'KS': ['66601', '67201'],

        'KY': ['40201', '41101'],

        'LA': ['70112', '71201'],

        'ME': ['04101', '04401'],

        'MD': ['21201', '20901'],

        'MA': ['02101', '02201'],

        'MI': ['48201', '49501'],

        'MN': ['55401', '55801'],

        'MS': ['39201', '39501'],

        'MO': ['63101', '64101'],

        'MT': ['59401', '59801'],

        'NE': ['68501', '69101'],

        'NV': ['89501', '89101'],

        'NH': ['03101', '03801'],

        'NJ': ['07101', '08901'],

        'NM': ['87501', '88101'],

        'NC': ['27601', '28201'],

        'ND': ['58501', '58201'],

        'OH': ['43201', '44101'],

        'OK': ['73101', '74101'],

        'OR': ['97201', '97401'],

        'PA': ['19101', '15201'],

        'RI': ['02901', '02801'],

        'SC': ['29201', '29401'],

        'SD': ['57101', '57701'],

        'TN': ['37201', '38101'],

        'UT': ['84101', '84701'],

        'VT': ['05401', '05701'],

        'VA': ['23201', '22201'],

        'WA': ['98101', '99201'],

        'WV': ['25301', '26101'],

        'WI': ['53201', '54501'],

        'WY': ['82001', '83001']

    };



    // Get random ZIP code for a state

    function getRandomZip(stateAbbr) {

        const zips = stateZipMap[stateAbbr];

        if (zips && zips.length > 0) {

            return zips[Math.floor(Math.random() * zips.length)];

        }

        return '00000'; // fallback

    }



    // Initialize autocomplete for all location fields

    function initAllAutocompletes() {

        // All autocomplete fields in the application

        const autocompleteFields = [

            'zipfromsearch', 'ziptosearch', // Modal form

            'external_zipfrom', 'external_ziptosearch', // External form

            'header_zipfrom', 'header_ziptosearch' // Header form

        ];



        console.log("Initializing autocomplete fields...");



        // Direct initialization of the problem fields first

        const zipFromField = document.getElementById('zipfromsearch');

        const zipToField = document.getElementById('ziptosearch');



        if (zipFromField) {

            console.log("Directly initializing zipfromsearch field");

            initGoogleAutocomplete(zipFromField);

        } else {

            console.error("zipfromsearch field not found");

        }



        if (zipToField) {

            console.log("Directly initializing ziptosearch field");

            initGoogleAutocomplete(zipToField);

        } else {

            console.error("ziptosearch field not found");

        }



        // Initialize the rest of the fields by ID (legacy support)

        autocompleteFields.forEach(fieldId => {

            if (fieldId === 'zipfromsearch' || fieldId === 'ziptosearch') return;

            const input = document.getElementById(fieldId);

            if (input) {

                console.log(`Initializing ${fieldId} field`);

                initGoogleAutocomplete(input);

            }

        });

        // Also initialize ALL inputs by class to cover multiple forms on the page

        const classFields = document.querySelectorAll('.zipfromsearch, .ziptosearch');

        classFields.forEach(el => {

            if (window.google && window.google.maps) {

                initGoogleAutocomplete(el);

            }

        });

    }



    // Initialize a single Google autocomplete field

    function initGoogleAutocomplete(input) {

        const autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['(regions)'],
            componentRestrictions: {
                country: "us"
            },
            fields: ['address_components', 'geometry', 'formatted_address']
        });



        autocomplete.addListener('place_changed', function() {

            const place = autocomplete.getPlace();

            let zip = '',

                city = '',

                state = '';



            console.log("Google Place data:", place);



            if (!place.address_components) {

                console.error("No address components found");

                return;

            }



            // First pass - get all available components

            for (const component of place.address_components) {

                const types = component.types;



                // Detailed logging to debug component extraction

                console.log("Component:", component.long_name, "Types:", types.join(", "));



                if (types.includes('postal_code')) {

                    zip = component.long_name;

                    console.log("Found ZIP:", zip);

                }

                if (types.includes('locality') || types.includes('sublocality')) {

                    city = component.long_name;

                    console.log("Found City:", city);

                }

                if (types.includes('administrative_area_level_1')) {

                    state = component.short_name;

                    console.log("Found State:", state);

                }

            }



            // Second pass - try to get city from alternative fields if missing

            if (!city) {

                for (const component of place.address_components) {

                    const types = component.types;

                    if (!city && types.includes('neighborhood')) {

                        city = component.long_name;

                        console.log("Using neighborhood as city:", city);

                    } else if (!city && types.includes('political')) {

                        city = component.long_name;

                        console.log("Using political as city:", city);

                    }

                }

            }



            // If ZIP is missing, use random ZIP for that state

            if (!zip && state) {

                zip = getRandomZip(state);

                console.log("Generated random ZIP for state", state, ":", zip);

            }



            // Ensure we have something for city and state

            if (!city) city = "Unknown City";

            if (!state) state = "US";



            // Format the input value and save the data

            const formattedValue = `${zip}, ${city}, ${state}`;

            input.value = formattedValue;



            // Explicitly set the data-valid attribute to "true" string value

            input.setAttribute('data-valid', 'true');

            console.log(`Set ${input.id} data-valid to: ${input.getAttribute('data-valid')}`);



            // Set the appropriate validation variables based on input ID

            // Save lat/lng from Google Place geometry
            var lat = null,
                lng = null;
            if (place.geometry && place.geometry.location) {
                lat = place.geometry.location.lat();
                lng = place.geometry.location.lng();
                console.log("Got lat/lng:", lat, lng);
            }

            if (input.id === 'zipfromsearch') {
                validZipFrom = true;
                zipFromData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                console.log("ZIP From set:", zipFromData);
            } else if (input.id === 'ziptosearch') {
                validZipTo = true;
                zipToData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                console.log("ZIP To set:", zipToData);
            } else if (input.id === 'external_zipfrom') {
                extValidZipFrom = true;
                extZipFromData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                $("#external_zipfrom_error").text("");
                // Copy to modal form field with lat/lng
                if ($("#zipfromsearch").length) {
                    $("#zipfromsearch").val(formattedValue).attr('data-valid', 'true');
                    validZipFrom = true;
                    zipFromData = extZipFromData; // now includes lat/lng
                }
            } else if (input.id === 'external_ziptosearch') {
                extValidZipTo = true;
                extZipToData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                $("#external_ziptosearch_error").text("");
                // Copy to modal form field with lat/lng
                if ($("#ziptosearch").length) {
                    $("#ziptosearch").val(formattedValue).attr('data-valid', 'true');
                    validZipTo = true;
                    zipToData = extZipToData; // now includes lat/lng
                }
            } else if (input.id === 'header_zipfrom') {
                validZipFrom = true;
                zipFromData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                if ($("#zipfromsearch").length) {
                    $("#zipfromsearch").val(formattedValue).attr('data-valid', 'true');
                }
            } else if (input.id === 'header_ziptosearch') {
                validZipTo = true;
                zipToData = {
                    value: zip,
                    city: city,
                    state: state,
                    label: formattedValue,
                    lat: lat,
                    lng: lng
                };
                if ($("#ziptosearch").length) {
                    $("#ziptosearch").val(formattedValue).attr('data-valid', 'true');
                }
            }



            // Check buttons state after setting all values

            modalCheckNextButton();

            // Immediately trigger distance calculation for the relevant container
            if (window.mmjTriggerDistanceCalc) {
                window.mmjTriggerDistanceCalc(input);
            }

        });

    }



    // Remove old autocomplete handlers and bindings

    function removeOldAutocompletes() {

        try {

            $("#external_zipfrom, #external_ziptosearch, #header_zipfrom, #header_ziptosearch, #zipfromsearch, #ziptosearch")

                .autocomplete("destroy")

                .off("blur")

                .off("input");

        } catch (e) {

            // Ignore errors if autocomplete wasn't initialized

        }

    }



    // Load Google Maps API and initialize autocompletes

    function loadGoogleMapsScript() {

        console.log("Starting to load Google Maps API...");



        // Check if API is already loaded

        if (window.google && window.google.maps) {

            console.log("Google Maps API already loaded, initializing autocomplete...");

            googleMapsLoaded();

            return;

        }



        // Create window callback function before loading script

        window.googleMapsLoaded = function() {

            console.log("Google Maps API loaded successfully!");

            removeOldAutocompletes();

            initAllAutocompletes();

        };



        // Handle API loading errors

        window.gm_authFailure = function() {

            console.error("Google Maps API authentication failed - check your API key");

            alert("Google Maps API failed to load. Please check your API key or contact support.");

        };



        const script = document.createElement('script');

        script.src =
            'https://maps.googleapis.com/maps/api/js?key=AIzaSyBefFHoLcWO1IV00axnWC0s34SPuCm9gKo&libraries=places&callback=googleMapsLoaded';

        script.async = true;

        script.defer = true;

        script.onerror = function() {

            console.error("Failed to load Google Maps API script");

            alert("Failed to load address search functionality. Please refresh the page or try again later.");

        };

        document.head.appendChild(script);

    }

    // Callback when Google Maps API is loaded
    function googleMapsLoaded() {
        console.log("Google Maps API ready, initializing autocompletes...");
        removeOldAutocompletes();
        initAllAutocompletes();
    }

    // Expose as window property so the script URL callback works
    window.googleMapsLoaded = googleMapsLoaded;


    // Run when document is ready

    $(document).ready(function() {

        loadGoogleMapsScript();





        // Add CSS fix for Google Places Autocomplete in modals

        const styleFixForAutocomplete = document.createElement('style');

        styleFixForAutocomplete.type = 'text/css';

        styleFixForAutocomplete.innerHTML = `

      .pac-container {

        z-index: 10000 !important;

        position: fixed;

      }

    `;

        document.head.appendChild(styleFixForAutocomplete);



        // Initialize modal fields when the modal is shown

        $('#ModalForm').on('shown.bs.modal', function() {

            console.log("Modal shown, reinitializing autocomplete fields...");



            // Reinitialize the modal fields directly

            const zipFromField = document.getElementById('zipfromsearch');

            const zipToField = document.getElementById('ziptosearch');



            if (zipFromField && window.google && window.google.maps) {

                console.log("Reinitializing zipfromsearch in modal");

                initGoogleAutocomplete(zipFromField);

            }



            if (zipToField && window.google && window.google.maps) {

                console.log("Reinitializing ziptosearch in modal");

                initGoogleAutocomplete(zipToField);

            }

        });



        // Debug: Add event listeners to monitor the ZIP field values

        $('#modalRegisterForm').on('submit', function(e) {

            console.log("Form submission: ZIP From =", validZipFrom ? "Valid" : "Invalid",

                "ZIP To =", validZipTo ? "Valid" : "Invalid",

                "ZIP From Value =", $("#zipfromsearch").val(),

                "ZIP To Value =", $("#ziptosearch").val());



            if (!validZipFrom || !validZipTo) {

                console.warn("Form submission blocked: Invalid ZIP codes");

                e.preventDefault();

                alert(

                    "Please ensure both origin and destination addresses are selected from the suggestions."

                );

                return false;

            }

        });



        // Check ZIP fields on direct input

        $("#zipfromsearch, #ziptosearch").on('input', function() {

            const fieldId = $(this).attr('id');

            const currentValue = $(this).val();

            const validValue = $(this).attr('data-valid');



            if (currentValue !== validValue) {

                console.log(`${fieldId} modified: No longer valid`);

                if (fieldId === 'zipfromsearch') {

                    validZipFrom = false;

                } else {

                    validZipTo = false;

                }

                modalCheckNextButton();

            }

        });



        // Add input event listeners to modal fields to detect manual edits

        $("#zipfromsearch").on("input", function() {

            console.log("zipfromsearch manual edit detected");

            if ($(this).attr('data-valid') === 'true') {

                $(this).attr('data-valid', 'false');

                validZipFrom = false;

                modalCheckNextButton();

            }

        });



        $("#ziptosearch").on("input", function() {

            console.log("ziptosearch manual edit detected");

            if ($(this).attr('data-valid') === 'true') {

                $(this).attr('data-valid', 'false');

                validZipTo = false;

                modalCheckNextButton();

            }

        });



        // Inline calendar (custom) handles summary & next button enabling. No flatpickr here.



        // Move Size card selection -> sync hidden select and active state

        $(document).on('click', '.mmj-movesize-card', function() {

            const val = $(this).data('value');

            $('#move_size').val(val).trigger('change');

            $('.mmj-movesize-card').removeClass('active');

            $(this).addClass('active');

            modalCheckNextButton();

        });



        // If select changes (e.g., server-side validation returns), reflect on cards

        $('#move_size').on('change', function() {

            const current = $(this).val();

            $('.mmj-movesize-card').each(function() {

                $(this).toggleClass('active', $(this).data('value') === current);

            });

        });

    });
</script>

<script>
    (function() {
        var dirSvc = null;

        function getDirSvc() {
            if (!dirSvc && window.google && google.maps && google.maps.DirectionsService) {
                dirSvc = new google.maps.DirectionsService();
            }
            return dirSvc;
        }

        function parseVal(val) {
            if (!val) return '';
            return val.trim();
        }

        function findContainer(el) {
            var $el = $(el);
            var $form = $el.closest('form');
            if ($form.length) return $form;
            var $wrap = $el.closest('.form_wrapper');
            if ($wrap.length) return $wrap;
            return $(document);
        }

        function updateDisplay($container, textMiles, rawMiles, durationText) {
            var $disp = $container.find('.mmj-distance-display').first();
            if ($disp.length) {
                $disp.text(textMiles);
            }

            // Update ALL .miles_upp elements globally
            $('.miles_upp').each(function() {
                if ($(this).is('p')) {
                    $(this).html('Moving Distance: ' + textMiles);
                } else {
                    // For spans inside text, just show the number
                    // Remove " mi" or " miles" if present in textMiles to get just the number
                    var justNumber = textMiles.replace(/[^0-9.,]/g, '').trim();
                    $(this).html(' ' + justNumber + ' ' + 'miles');
                }
                updateMoveCost(rawMiles);
            });

            $('.duration_text').html(durationText);

            var $hidden = $container.find('.mmj-distance-hidden').first();
            if ($hidden.length) {
                $hidden.val((rawMiles || '').toString());
            }
        }

        // Haversine distance between two lat/lng points (in miles)
        function haversineMiles(lat1, lng1, lat2, lng2) {
            var R = 3958.8;
            var dLat = (lat2 - lat1) * Math.PI / 180;
            var dLng = (lng2 - lng1) * Math.PI / 180;
            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        // Compute distance using lat/lng (no Directions API needed)
        function computeDistanceGeneric(fromStr, toStr, callback, fromLat, fromLng, toLat, toLng) {
            // If we have lat/lng, use Haversine
            if (fromLat && fromLng && toLat && toLng) {
                var straight = haversineMiles(fromLat, fromLng, toLat, toLng);
                var driving = straight * 1.25;
                var durationSecs = (driving / 55) * 3600; // rough estimate: 55mph average
                callback({
                    text: driving.toFixed(0) + ' mi',
                    miles: driving,
                    durationText: calculateMoveTravelTime(durationSecs)
                });
                return;
            }
            // No lat/lng and no Directions API — skip
            if (callback) callback(null);
        }

        function triggerDistanceCalc($container) {
            // Check if values are already set (server-side)
            var milesText = $('.miles_upp').first().text().replace(/[^0-9.]/g, '');
            var milesVal = parseFloat(milesText);

            // If we have miles > 0, assume established
            if (milesVal > 0) {
                return;
            }

            var $from = $container.find('.zipfromsearch').first();
            var $to = $container.find('.ziptosearch').first();
            if (!$from.length || !$to.length) return;
            var fromVal = parseVal($from.val());
            var toVal = parseVal($to.val());

            // Get lat/lng from global zipFromData / zipToData
            var fLat = (zipFromData && zipFromData.lat) ? zipFromData.lat : null;
            var fLng = (zipFromData && zipFromData.lng) ? zipFromData.lng : null;
            var tLat = (zipToData && zipToData.lat) ? zipToData.lat : null;
            var tLng = (zipToData && zipToData.lng) ? zipToData.lng : null;

            if (fromVal && toVal) {
                computeDistanceGeneric(fromVal, toVal, function(res) {
                    if (res && res.text) {
                        updateDisplay($container, res.text, res.miles.toFixed(2), res.durationText);
                    }
                }, fLat, fLng, tLat, tLng);
            }
        }

        function calculateMoveTravelTime(googleDurationSeconds) {
            const moveDurationSeconds = googleDurationSeconds;
            const days = Math.floor(moveDurationSeconds / 86400);
            const hours = Math.floor((moveDurationSeconds % 86400) / 3600);
            const minutes = Math.round((moveDurationSeconds % 3600) / 60);
            if (days >= 1) {
                let dayStr = days + (days === 1 ? " day " : " days ");
                let hourStr = hours + (hours === 1 ? " hour" : " hours");
                return dayStr + hourStr;
            }
            if (hours < 1) {
                return minutes + (minutes === 1 ? " minute" : " minutes");
            }
            let hLabel = hours === 1 ? " hour " : " hours ";
            return hours + hLabel + minutes + " minutes";
        }

        const costData = {
            studio: {
                company: [{
                        max: 150,
                        min: 6.80747074707471,
                        maxCost: 31.3535980264693
                    },
                    {
                        max: 300,
                        min: 3.96210754807246,
                        maxCost: 14.6920477832759
                    },
                    {
                        max: 500,
                        min: 3.37472320234548,
                        maxCost: 12.0322276711863
                    },
                    {
                        max: 1000,
                        min: 2.18657972296657,
                        maxCost: 5.71738673710121
                    },
                    {
                        max: 1500,
                        min: 1.82809970907103,
                        maxCost: 4.27869409154946
                    },
                    {
                        max: 2000,
                        min: 1.33148409999026,
                        maxCost: 2.93361034495965
                    },
                    {
                        max: 2500,
                        min: 1.07378599347977,
                        maxCost: 2.46326813992129
                    },
                    {
                        max: 3000,
                        min: 0.880660312897151,
                        maxCost: 2.17662398918873
                    },
                    {
                        max: Infinity,
                        min: 0.741728261992829,
                        maxCost: 1.78902843501555
                    }
                ],
                container: [{
                        max: 150,
                        min: 6.57268060139347,
                        maxCost: 12.0076841017435
                    },
                    {
                        max: 300,
                        min: 3.37803911488122,
                        maxCost: 5.88604845446951
                    },
                    {
                        max: 500,
                        min: 2.83415765115276,
                        maxCost: 5.15189441660091
                    },
                    {
                        max: 1000,
                        min: 1.44573497726049,
                        maxCost: 2.50013189430046
                    },
                    {
                        max: 1500,
                        min: 1.104000434574847,
                        maxCost: 2.01265064658301
                    },
                    {
                        max: 2000,
                        min: 0.856423697327844,
                        maxCost: 1.57766245987641
                    },
                    {
                        max: 2500,
                        min: 0.736086850587751,
                        maxCost: 1.39930803480807
                    },
                    {
                        max: 3000,
                        min: 0.682888033851367,
                        maxCost: 1.29922576105542
                    },
                    {
                        max: Infinity,
                        min: 0.62919978579129,
                        maxCost: 1.2053547888492
                    }
                ],
                truck: [{
                        max: 150,
                        min: 0.983505017168384,
                        maxCost: 1.49127912791279
                    },
                    {
                        max: 300,
                        min: 1.31415290362659,
                        maxCost: 1.2563459931881
                    },
                    {
                        max: 500,
                        min: 1.03506826771544,
                        maxCost: 1.79328143998032
                    },
                    {
                        max: 1000,
                        min: 0.716023261125998,
                        maxCost: 1.3144839544937
                    },
                    {
                        max: 1500,
                        min: 0.636429825740122,
                        maxCost: 1.20463004861187
                    },
                    {
                        max: 2000,
                        min: 0.577825999521823,
                        maxCost: 1.11424687779868
                    },
                    {
                        max: 2500,
                        min: 0.551116219212486,
                        maxCost: 1.08728321264994
                    },
                    {
                        max: 3000,
                        min: 0.543295478954459,
                        maxCost: 1.05714653038682
                    },
                    {
                        max: Infinity,
                        min: 0.518681657928632,
                        maxCost: 0.987666006957568
                    }
                ]
            },

            bedrooms2_3: {
                company: [{
                        max: 150,
                        min: 12.7049838317165,
                        maxCost: 36.5963796379638
                    },
                    {
                        max: 300,
                        min: 6.40125099072468,
                        maxCost: 17.6076744567973
                    },
                    {
                        max: 500,
                        min: 5.29699030667609,
                        maxCost: 15.2363311722021
                    },
                    {
                        max: 1000,
                        min: 3.20477325260294,
                        maxCost: 7.87249528674972
                    },
                    {
                        max: 1500,
                        min: 2.27640706337687,
                        maxCost: 5.33408442305373
                    },
                    {
                        max: 2000,
                        min: 1.8282399439576,
                        maxCost: 3.9605731541311
                    },
                    {
                        max: 2500,
                        min: 1.54532473414903,
                        maxCost: 3.20845236741449
                    },
                    {
                        max: 3000,
                        min: 1.38732788545859,
                        maxCost: 2.92575502988767
                    },
                    {
                        max: Infinity,
                        min: 1.13148870990214,
                        maxCost: 2.36365458112765
                    }
                ],
                container: [{
                        max: 150,
                        min: 8.94744807814115,
                        maxCost: 16.3581558155816
                    },
                    {
                        max: 300,
                        min: 4.21190868910167,
                        maxCost: 8.33917557426329
                    },
                    {
                        max: 500,
                        min: 3.63106132099061,
                        maxCost: 6.94397674639087
                    },
                    {
                        max: 1000,
                        min: 1.87908595332092,
                        maxCost: 3.56891828775203
                    },
                    {
                        max: 1500,
                        min: 1.37719444019156,
                        maxCost: 2.74227135027485
                    },
                    {
                        max: 2000,
                        min: 1.12129686044963,
                        maxCost: 2.26543570241052
                    },
                    {
                        max: 2500,
                        min: 0.950257036162666,
                        maxCost: 2.01717978240079
                    },
                    {
                        max: 3000,
                        min: 0.885706034869988,
                        maxCost: 1.8336850028106
                    },
                    {
                        max: Infinity,
                        min: 0.811399992864923,
                        maxCost: 1.68971123297088
                    }
                ],
                truck: [{
                        max: 150,
                        min: 1.08323499016568,
                        maxCost: 1.75150181684835
                    },
                    {
                        max: 300,
                        min: 1.53074709565938,
                        maxCost: 1.510289261615577
                    },
                    {
                        max: 500,
                        min: 1.05354061513846,
                        maxCost: 2.13763321822608
                    },
                    {
                        max: 1000,
                        min: 0.769840184166206,
                        maxCost: 1.61088752292702
                    },
                    {
                        max: 1500,
                        min: 0.677627305212317,
                        maxCost: 1.37053458539575
                    },
                    {
                        max: 2000,
                        min: 0.610261946648086,
                        maxCost: 1.28561318624269
                    },
                    {
                        max: 2500,
                        min: 0.59660378636782,
                        maxCost: 1.28990905370901
                    },
                    {
                        max: 3000,
                        min: 0.602180069521982,
                        maxCost: 1.25434362316116
                    },
                    {
                        max: Infinity,
                        min: 0.537623853147441,
                        maxCost: 1.18719427929501
                    }
                ]
            },

            bedrooms4: {
                company: [{
                        max: 150,
                        min: 17.9776044271094,
                        maxCost: 46.1771777177718
                    },
                    {
                        max: 300,
                        min: 8.67764710922606,
                        maxCost: 23.460117530293
                    },
                    {
                        max: 500,
                        min: 7.68998641562551,
                        maxCost: 17.7706379514149
                    },
                    {
                        max: 1000,
                        min: 5.52817829041122,
                        maxCost: 11.2470337632363
                    },
                    {
                        max: 1500,
                        min: 3.70253249658598,
                        maxCost: 7.03779404690164
                    },
                    {
                        max: 2000,
                        min: 3.41232638946091,
                        maxCost: 5.82240534749108
                    },
                    {
                        max: 2500,
                        min: 2.83654972993362,
                        maxCost: 5.07219647981727
                    },
                    {
                        max: 3000,
                        min: 2.6279249111876,
                        maxCost: 4.24270962796341
                    },
                    {
                        max: Infinity,
                        min: 2.16683393012312,
                        maxCost: 3.57388151508615
                    }
                ],
                container: [{
                        max: 150,
                        min: 11.4709837650432,
                        maxCost: 20.6441944194419
                    },
                    {
                        max: 300,
                        min: 5.79678255467729,
                        maxCost: 10.2981142314476
                    },
                    {
                        max: 500,
                        min: 4.75508987902821,
                        maxCost: 8.62924272218862
                    },
                    {
                        max: 1000,
                        min: 2.46546883629595,
                        maxCost: 4.75744574222186
                    },
                    {
                        max: 1500,
                        min: 1.86202360556206,
                        maxCost: 3.64484374201106
                    },
                    {
                        max: 2000,
                        min: 1.48038953802437,
                        maxCost: 3.06764793892842
                    },
                    {
                        max: 2500,
                        min: 1.29344511681345,
                        maxCost: 2.64893605157982
                    },
                    {
                        max: 3000,
                        min: 1.15387189087546,
                        maxCost: 2.52793412721353
                    },
                    {
                        max: Infinity,
                        min: 1.09108583295796,
                        maxCost: 2.34928257523149
                    }
                ],
                truck: [{
                        max: 150,
                        min: 1.25685235190186,
                        maxCost: 1.93743707704104
                    },
                    {
                        max: 300,
                        min: 1.82290912466351,
                        maxCost: 4.72012367100086
                    },
                    {
                        max: 500,
                        min: 1.3050890549217,
                        maxCost: 2.5220459761274
                    },
                    {
                        max: 1000,
                        min: 0.933879405567942,
                        maxCost: 1.90836286572436
                    },
                    {
                        max: 1500,
                        min: 0.881893860123058,
                        maxCost: 1.72621371982305
                    },
                    {
                        max: 2000,
                        min: 0.787643291835776,
                        maxCost: 1.65383855678487
                    },
                    {
                        max: 2500,
                        min: 0.771009528183318,
                        maxCost: 1.5450444420049
                    },
                    {
                        max: 3000,
                        min: 0.724038627009329,
                        maxCost: 1.50896985621554
                    },
                    {
                        max: Infinity,
                        min: 0.686748409312611,
                        maxCost: 1.39629099749444
                    }
                ]
            }
        };

        function findCost(costArray, miles) {
            return costArray.find(r => miles <= r.max);
        }

        function updateMoveCost(miles) {
            function calc(min, max) {
                if (miles == 0) return "$0 - $0";

                const format = n => n.toLocaleString('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });

                return "$" + format(miles * min) + " - $" + format(miles * max);
            }

            function calcMin(min) {
                if (miles == 0) return "$0";
                const format = n => n.toLocaleString('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
                return "$" + format(miles * min);
            }

            function calcMax(max) {
                if (miles == 0) return "$0";
                const format = n => n.toLocaleString('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
                return "$" + format(miles * max);
            }

            // === STUDIO ===
            const stCompany = findCost(costData.studio.company, miles);
            const stContainer = findCost(costData.studio.container, miles);
            const stTruck = findCost(costData.studio.truck, miles);

            $(".move_cost_studio").text(calc(stCompany.min, stCompany.maxCost));
            $(".move_cost_container_studio").text(calc(stContainer.min, stContainer.maxCost));
            $(".move_cost_rental_truck_studio").text(calc(stTruck.min, stTruck.maxCost));
            $(".move_cost_studio_min").text(calcMin(stCompany.min));
            $(".move_cost_studio_max").text(calcMax(stCompany.maxCost));
            $(".move_cost_container_studio_min").text(calcMin(stContainer.min));
            $(".move_cost_container_studio_max").text(calcMax(stContainer.maxCost));
            $(".move_cost_rental_truck_studio_min").text(calcMin(stTruck.min));
            $(".move_cost_rental_truck_studio_max").text(calcMax(stTruck.maxCost));

            // === 2–3 BEDROOMS ===
            const b23Company = findCost(costData.bedrooms2_3.company, miles);
            const b23Container = findCost(costData.bedrooms2_3.container, miles);
            const b23Truck = findCost(costData.bedrooms2_3.truck, miles);

            $(".move_cost_2_3_bedroom").text(calc(b23Company.min, b23Company.maxCost));
            $(".move_cost_container_2_3_bedroom").text(calc(b23Container.min, b23Container.maxCost));
            $(".move_cost_rental_truck_2_3_bedroom").text(calc(b23Truck.min, b23Truck.maxCost));
            $(".move_cost_2_3_bedroom_min").text(calcMin(b23Company.min));
            $(".move_cost_2_3_bedroom_max").text(calcMax(b23Company.maxCost));
            $(".move_cost_container_2_3_bedroom_min").text(calcMin(b23Container.min));
            $(".move_cost_container_2_3_bedroom_max").text(calcMax(b23Container.maxCost));
            $(".move_cost_rental_truck_2_3_bedroom_min").text(calcMin(b23Truck.min));
            $(".move_cost_rental_truck_2_3_bedroom_max").text(calcMax(b23Truck.maxCost));

            // === 4+ BEDROOMS ===
            const b4Company = findCost(costData.bedrooms4.company, miles);
            const b4Container = findCost(costData.bedrooms4.container, miles);
            const b4Truck = findCost(costData.bedrooms4.truck, miles);

            $(".move_cost_4_bedroom").text(calc(b4Company.min, b4Company.maxCost));
            $(".move_cost_container_4_bedroom").text(calc(b4Container.min, b4Container.maxCost));
            $(".move_cost_rental_truck_4_bedroom").text(calc(b4Truck.min, b4Truck.maxCost));
            $(".move_cost_4_bedroom_min").text(calcMin(b4Company.min));
            $(".move_cost_4_bedroom_max").text(calcMax(b4Company.maxCost));
            $(".move_cost_container_4_bedroom_min").text(calcMin(b4Container.min));
            $(".move_cost_container_4_bedroom_max").text(calcMax(b4Container.maxCost));
            $(".move_cost_rental_truck_4_bedroom_min").text(calcMin(b4Truck.min));
            $(".move_cost_rental_truck_4_bedroom_max").text(calcMax(b4Truck.maxCost));
        }


        // Expose a global hook to trigger from Google place_changed
        window.mmjTriggerDistanceCalc = function(inputEl) {
            var $container = findContainer(inputEl);
            triggerDistanceCalc($container);
        };

        $(document).on('change blur', '.zipfromsearch, .ziptosearch', function() {
            var $container = findContainer(this);
            triggerDistanceCalc($container);
        });

        $('#ModalForm').on('shown.bs.modal', function() {
            var $container = $(this);
            setTimeout(function() {
                triggerDistanceCalc($container);
            }, 400);
        });

        $(window).on('load', function() {
            $('.zipfromsearch, .ziptosearch').each(function() {
                var $container = findContainer(this);
                triggerDistanceCalc($container);
            });
        });
    })();
</script>



</html>
