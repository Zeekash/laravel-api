@extends('layouts.app')
@section('title')
    Contact Mover | {{ $company->company_name }} | My Moving Journey
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <style>
        button.sdg {
            width: 100% !important;
        }

        h1 {
            font-family: var(--family);
            font-weight: 700;
            color: #1e1a1a;
            font-size: 32px;
        }

        .for_height_modal {
            height: 250px !important;
            overflow-y: auto !important;
            padding: 0px !important;
            margin: 0px !important;
        }

        select#move_size {
            padding: 15px 20px;
            border: 0px solid #116087 !important;
            border-radius: 50px;
            font-family: var(--para-family);
            background-color: #fff;
        }

        .progress-bar {
            height: 100%;
            background: #116087;
            width: 0%;
            border-radius: 5px;
            transition: width 0.4s ease-in-out;
        }

        /* Ensure autocomplete dropdown visibility */
        .pac-container {
            z-index: 99999 !important;
            border-radius: 8px;
            margin-top: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .pac-item {
            padding: 8px 12px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .pac-item:hover {
            background-color: #f8f9fa;
        }

        .pac-item-query {
            font-size: 15px;
            color: #116087;
            font-weight: 500;
        }

        .form_wrapper {
            border: 1px solid #0000001A;
            padding: 15px 30px 0;
            background-color: #C9ECF8;
            border-radius: 15px;
        }

        .progress-container {
            width: 100%;
            height: 10px;
            background: #fff;
            border-radius: 5px;
            position: relative;
            margin-bottom: 20px;
        }

        .login-form {
            /* background-color: #fff; */
            -webkit-box-shadow: 0 2px 28px 0 rgb(0 0 0 / 9%);
            box-shadow: none;
            backdrop-filter: blur(0px);
            border: none;
        }

        #registerForm .form-control {
            padding: 15px 20px !important;
            width: 100%;
            font-size: 1em;
            border: 0px solid #116087 !important;
            border-radius: 5px;
            background-color: #fff !important;
        }

        .listing {
            background-color: #c9ecf8;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/contact_mover_page.css') }}"> --}}
    <section class="company_form_page py-5">
        <div class="container contact_mover">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible alert-alt fade show">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="col-lg-6 mx-auto col-12 p-2 mb-4">
                <div class="form_wrapper">
                    <h1>Let's Get You Moved</h1>
                    <p>Fields marked with an * are required</p>
                    <div class="progress_modal_form px-0">
                        <div class="progress-container mt-4 mb-2" style="position: relative;">
                            <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            <span id="contactprogressText" class="progress-text"
                                style="position: absolute; top: -22px;">0%</span>
                        </div>
                    </div>
                    <form id="registerForm" action="{{ route('contactMoverPost', $company->id) }}"
                        class="login-form pt-2 px-0" method="POST">
                        @csrf
                        <input type="hidden" name="referrer" value="{{ URL::previous() }}">
                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                        {{-- @php
                            $imageUrl = str_starts_with($company->image, 'companies/image/')
                                ? URL::to('/' . $company->image)
                                : URL::to('/companies/image/' . $company->image);
                        @endphp
                        <img src="{{ $imageUrl }}" alt="company logo" width="20%"> --}}

                        <!-- Step 1: Moving From -->
                        <div class="contact_step">
                            <h2 class="form_labels">Moving From</h2>
                            <div class="mb-3">
                                <input type="text" id="contact_zipfrom"
                                    class="form-control @error('zip_from') is-invalid @enderror" required name="zip_from"
                                    placeholder="Zip From" autocomplete="off">
                                @error('zip_from')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <h2 class="form_labels">Moving To</h2>
                            <div class="mb-3">
                                <input type="text" id="contact_ziptosearch"
                                    class="form-control @error('zip_to') is-invalid @enderror" required name="zip_to"
                                    placeholder="Zip To" autocomplete="off">
                                @error('zip_to')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <!-- Step 2: Additional Steps -->
                        <div class="contact_step">
                            <div class="for_height_modal">
                                <h2 class="form_labels">When are you moving?</h2>
                                <div class="mb-3">
                                    <input type="text" id="moveDate"
                                        class="form-control bg-transparent @error('date') is-invalid @enderror" required
                                        name="date" placeholder="Moving Date">
                                    @error('date')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <h2 class="form_labels">What size is your current property?</h2>
                                    <select class="form-select w-100 py-3 @error('move_size') is-invalid @enderror"
                                        name="move_size" id="move_size" aria-label="Move Size">
                                        <option selected value="">-- Select Move Size --</option>
                                        <option value="4 Bedroom Home">4 Bedroom Home</option>
                                        <option value="3 Bedroom Home">3 Bedroom Home</option>
                                        <option value="2 Bedroom Home">2 Bedroom Home</option>
                                        <option value="1 Bedroom Home">1 Bedroom Home</option>
                                        <option value="Studio">Studio</option>
                                        <option value="Office Move">Office Move</option>
                                        <option value="Commercial Move">Commercial Move</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Step 3: Personal Details -->
                        <div class="contact_step">
                            <h2 class="form_labels">Enter Your Personal Details</h2>
                            <div class="mb-3">
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" required name="name"
                                    placeholder="Your Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" required name="email"
                                    placeholder="Your Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" id="phone_no"
                                    class="form-control @error('phone_no') is-invalid @enderror" required name="phone_no"
                                    placeholder="(xxx) xxx - xxxx">
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert"><strong>Phone No. format must be (xxx) xxx -
                                            xxxx</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {!! NoCaptcha::display() !!}
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        <div class="form-footer d-flex gap-3 justify-content-end">
                            <button type="button" class="sdg btn btn-secondary mt-3" id="prevBtn"
                                onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="sdg btn btn-primary mt-3" id="nextBtn"
                                onclick="nextPrev(1)">Next</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 mx-auto col-12">
                <div class="contact_mover_content ps-lg-3 ps-0 mt-lg-0 mt-4">
                    <h2 class="fs-1" style="font-family:var(--para-family);">Connecting You with Reliable
                        Movers</h2>
                    <p>
                        Are you having trouble contacting your desired movers? My Moving Journey is here to simplify the
                        process for you. Whether you have specific questions, need a customized quote, or are ready to book
                        their services, use the Contact Movers form to start the conversation.
                    </p>
                    <h2 class="fs-3">How you can get a moving quote?</h2>
                    <ol class="mb-0 mt-4 list-unstyled">
                        <li>
                            <div class="listing">
                                <span class="list_description">
                                    Start by filling out the simple and user-friendly form. Provide essential details about
                                    your move and click submit.
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="listing">
                                <span class="list_description">
                                    Once you have filled out the form, your inquiry will be sent directly to the company,
                                    and they will get back to you as soon as possible.
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="listing">
                                <span class="list_description">
                                    Sit back and relax as you receive a response directly from the movers. If you have more
                                    queries, you can contact the movers again.
                                </span>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="text1 d-flex justify-content-center text-center mt-4">
                    <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    <p style="margin-bottom:0px; margin-top: -4px; margin-left: 4px;">This moving quote information is
                        Secured by <strong>My Moving Journey</strong></p>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        var currentStep = 0;
        var totalSteps = 0;

        document.addEventListener("DOMContentLoaded", function() {
            totalSteps = document.querySelectorAll("#registerForm > .contact_step").length;
            showStep(currentStep);

            // Initialize date picker if needed
            if (document.getElementById('moveDate')) {
                flatpickr("#moveDate", {
                    dateFormat: "Y-m-d",
                    minDate: "today"
                });
            }

            // Phone number formatting
            if (document.getElementById('phone_no')) {
                document.getElementById('phone_no').addEventListener('input', function(e) {
                    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? ' - ' + x[3] : '');
                });
            }

            // Load Google Maps API
            loadGoogleMaps();
        });

        function showStep(n) {
            var steps = document.querySelectorAll("#registerForm > .contact_step");
            steps.forEach(function(step) {
                step.style.display = "none";
            });
            steps[n].style.display = "block";

            document.getElementById("prevBtn").style.display = (n === 0) ? "none" : "inline-block";
            document.getElementById("nextBtn").innerHTML = (n === steps.length - 1) ? "Submit" : "Next";

            updateProgressBar(n);
            checkNextButton();
        }

        function nextPrev(n) {
            if (n === 1 && !validateForm()) return false;

            var steps = document.querySelectorAll("#registerForm > .contact_step");
            steps[currentStep].style.display = "none";
            currentStep = currentStep + n;

            if (currentStep >= steps.length) {
                document.getElementById("registerForm").submit();
                return false;
            }

            if (currentStep < 0) {
                currentStep = 0;
            }

            showStep(currentStep);
        }

        function validateForm() {
            var valid = true;
            var steps = document.querySelectorAll("#registerForm > .contact_step");
            var inputs = steps[currentStep].querySelectorAll("input, select, textarea");

            inputs.forEach(function(input) {
                input.classList.remove("invalid");

                // Required field validation
                if (input.hasAttribute("required") && input.value.trim() === "") {
                    input.classList.add("invalid");
                    valid = false;
                }

                // Email validation
                if (input.type === "email" && input.value.trim() !== "") {
                    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(input.value)) {
                        input.classList.add("invalid");
                        valid = false;
                    }
                }

                // Phone number validation
                if (input.id === "phone_no" && input.value.trim() !== "") {
                    var phonePattern = /^\(\d{3}\) \d{3} - \d{4}$/;
                    if (!phonePattern.test(input.value)) {
                        input.classList.add("invalid");
                        valid = false;
                    }
                }

                // Move size validation
                if (input.id === "move_size" && input.value === "") {
                    input.classList.add("invalid");
                    valid = false;
                }
            });

            return valid;
        }

        function updateProgressBar(n) {
            var percent = (totalSteps > 1) ? (n / (totalSteps - 1)) * 100 : 100;

            var progressBar = document.querySelector(".progress-bar");
            if (progressBar) {
                progressBar.style.width = percent + "%";
            }

            var contactprogressText = document.getElementById("contactprogressText");
            if (contactprogressText) {
                var containerWidth = document.querySelector(".progress-container").offsetWidth;
                var textWidth = contactprogressText.offsetWidth;
                var newLeft = (percent / 100) * containerWidth - (textWidth / 2);
                newLeft = Math.max(0, Math.min(newLeft, containerWidth - textWidth));
                contactprogressText.style.left = newLeft + "px";
                contactprogressText.style.top = "-22px";
                contactprogressText.innerText = Math.round(percent) + "%";
            }
        }

        // ✅ Google Places Autocomplete
        function initContactAutocomplete() {
            const zipFromInput = document.getElementById('contact_zipfrom');
            const zipToInput = document.getElementById('contact_ziptosearch');

            const initAutocompleteField = (input) => {
                const autocomplete = new google.maps.places.Autocomplete(input, {
                    types: ['(regions)'],
                    componentRestrictions: {
                        country: "us"
                    },
                    fields: ['address_components', 'formatted_address']
                });

                autocomplete.addListener('place_changed', () => {
                    const place = autocomplete.getPlace();
                    let zipCode = '';
                    let city = '';
                    let state = '';

                    place.address_components.forEach(component => {
                        if (component.types.includes('postal_code')) {
                            zipCode = component.long_name;
                        }
                        if (component.types.includes('locality')) {
                            city = component.long_name;
                        }
                        if (component.types.includes('administrative_area_level_1')) {
                            state = component.short_name;
                        }
                    });

                    // Custom format
                    let formatted = '';
                    if (zipCode) {
                        formatted = `${zipCode}, ${city}, ${state}`;
                    } else {
                        formatted = `${city}, ${state}`;
                    }

                    if (formatted) {
                        input.value = formatted;
                        input.setAttribute('data-zip', zipCode || '');
                        input.setAttribute('data-valid',
                            'true'); // ✅ Always valid if selected from autocomplete
                        input.setAttribute('data-last-valid', formatted);
                    } else {
                        input.removeAttribute('data-valid');
                    }

                    checkNextButton();
                });
            };

            if (zipFromInput) initAutocompleteField(zipFromInput);
            if (zipToInput) initAutocompleteField(zipToInput);
        }

        // ✅ Load Google Maps
        function loadGoogleMaps() {
            if (!window.google) {
                const script = document.createElement('script');
                script.src =
                    `https://maps.googleapis.com/maps/api/js?key=AIzaSyBefFHoLcWO1IV00axnWC0s34SPuCm9gKo&libraries=places&callback=googleMapsLoaded`;
                script.async = true;
                script.defer = true;
                document.head.appendChild(script);
            } else {
                initContactAutocomplete();
            }
        }

        // ✅ Next button state
        function checkNextButton() {
            const nextBtn = document.getElementById('nextBtn');
            if (!nextBtn) return;

            const zipFromValid = document.getElementById('contact_zipfrom')?.getAttribute('data-valid') === 'true';
            const zipToValid = document.getElementById('contact_ziptosearch')?.getAttribute('data-valid') === 'true';

            nextBtn.disabled = !(zipFromValid && zipToValid);
        }

        // ✅ Handle manual typing
        document.addEventListener("input", function(e) {
            if (e.target.matches('#contact_zipfrom, #contact_ziptosearch')) {
                if (e.target.value !== e.target.getAttribute('data-last-valid')) {
                    e.target.removeAttribute('data-valid');
                }
                checkNextButton();
            }
        });

        // ✅ On submit replace values with ZIP codes
        document.addEventListener("submit", function(e) {
            if (e.target.id === "registerForm") {
                document.getElementById('contact_zipfrom').value =
                    document.getElementById('contact_zipfrom').getAttribute('data-zip') || '';
                document.getElementById('contact_ziptosearch').value =
                    document.getElementById('contact_ziptosearch').getAttribute('data-zip') || '';
            }
        });
    </script>
@endsection
