@extends('layouts.app')

@section('content')
    <style>
        #float-rating-div.comp-show-stars .rating-container {
            justify-content: start;
        }
    </style>
    <section class="bg-image py-5 bg-of-aqua-shade">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class="card row py-0 px-0">
                        <div class="row p-0 m-auto d-flex flex-column-reverse flex-lg-row">
                            <div class="col-12 col-lg-8 col-xl-8 py-3 bg-of-aqua-shade ">
                                <div class="blog-title my-2">
                                    <h1>Movers In @foreach ($city as $city)
                                            {{ $city->name }}
                                        @endforeach
                                    </h1>
                                </div>
                                <div class="blog-title d-flex flex-wrap align-items-center my-2">
                                    <i class="fa fa-truck pe-1"></i>
                                    <h5 class="my-3">Movers Found In @foreach ($mover_city as $mover_city)
                                            {{ $mover_city->name }}
                                        @endforeach
                                        : {{ $total }} </h5>
                                </div>

                                @foreach ($data as $data)
                                    <div class="w-100 my-3 mx-0 article-loop" id="card-of-services">
                                        <a class="row w-100 row p-3" href="{{ route('company.show', $data->slug) }}">
                                            <div class="col-12 col-md-12 col-lg-3 d-flex align-items-center">
                                                <span hidden class="image">{{ $data->image }}</span>
                                                @if ($data->image)
                                                    <img src="{{ URL::to('/companies/image/' . $data->image) }}"
                                                        alt="{{ $data->image }}" style="width: 200px;">
                                                @else
                                                    <img src="{{ URL::to('/img/samplelogo.webp') }}"
                                                        alt="{{ $data->image }}" style="width: 200px;">
                                                @endif
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-9">
                                                <div class="row">
                                                    <div class="col-12 my-0">
                                                        <h5 id="title-of-company-name" class="m-0">
                                                            {{ $data->company_name }}</h5>
                                                        <div class="col-12 col-md-6">
                                                            @php
                                                                $rounded = round($data->average_rating);
                                                            @endphp
                                                            <p class="m-0" style="font-size:1.2rem; color:#ff9800">
                                                                @if ($rounded <= 0)
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($rounded == 1)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($rounded == 2)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($rounded == 3)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($rounded == 4)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($rounded >= 5)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                @endif
                                                                <span
                                                                    class="text-danger">({{ round($data->average_rating) }})</span>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <span id="rating-span2"> {{ $data->total_reviews }}
                                                                Reviews</span>
                                                            <p class="para2 my-0">Based in <span class="fw-bold">:
                                                                    {{ $data->n }}</span></p>
                                                            <h6 class="my-0 head2">Last reviewed on
                                                                {{ \Carbon\Carbon::parse($data->created_at)->format('M d,Y') }}
                                                                by
                                                                {{ $data->created_by }}
                                                            </h6>
                                                            <p class="para2 ">
                                                                {{ substr(strip_tags($data->your_review), 0, 100) }}
                                                                <span style="color:#123269;"
                                                                    class="fw-bold">{{ strlen(strip_tags($data->your_review)) > 100 ? '...ReadMore' : '' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                @foreach ($company as $companies)
                                    @if ($companies->average_rating == '')
                                        <div class="w-100 my-3 mx-0 article-loop" id="card-of-services">
                                            <a class="row w-100 row p-3"
                                                href="{{ route('company.show', $companies->slug) }}">
                                                <div class="col-12 col-md-12 col-lg-3 d-flex align-items-center">
                                                    <span hidden class="image">{{ $companies->image }}</span>
                                                    @if ($companies->image)
                                                        <img src="{{ URL::to('/companies/image/' . $companies->image) }}"
                                                            alt="{{ $companies->image }}" style="width: 200px;">
                                                    @else
                                                        <img src="{{ URL::to('/img/samplelogo.webp') }}"
                                                            alt="{{ $companies->image }}" style="width: 200px;">
                                                    @endif
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-9">
                                                    <div class="row">
                                                        <div class="col-12 my-0">
                                                            <h5 id="title-of-company-name" class="m-0">
                                                                {{ $companies->company_name }}</h5>

                                                            <p class="m-0" style="font-size:1.2rem; color:silver">
                                                                @if ($companies->average_rating <= 0)
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($companies->average_rating == 1)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($companies->average_rating == 2)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($companies->average_rating == 3)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($companies->average_rating == 4)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @elseif($companies->average_rating >= 5)
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                @endif
                                                            </p>
                                                            <p class="fs-14 my-0 d-flex align-items-start text-dark"><i
                                                                    class="fs-14 fa-solid fa-location-dot icons-company-show me-2"></i>
                                                                <span class="text-dark fw-bold me-2">Address: </span>
                                                                {{ $companies->company_address ?? 'Not Found' }}
                                                            </p>
                                                            <p class="my-0 d-flex align-items-start text-dark fs-14"><i
                                                                    class="fa-solid fa-globe icons-company-show fs-14 me-2"></i>
                                                                <span class="text-dark fw-bold me-2">Site: </span>
                                                                {{ $companies->company_website }}
                                                            </p>
                                                            <p class="my-0 d-flex align-items-start text-dark fs-14"><i
                                                                    class="fa-solid fa-phone-volume icons-company-show fs-14 me-2"></i>
                                                                <span class="text-dark fw-bold me-2">Phone: </span>
                                                                {{ $companies->phone_no }},
                                                                {{ $companies->additional_phone_no }}
                                                            </p>
                                                            <p class="my-0 d-flex align-items-start text-dark fs-14"><i
                                                                    class="fa fa-map-location-dot icons-company-show fs-14 me-2"></i>
                                                                <span class="fw-normal me-2">Based In: <span
                                                                        class="fw-bold">
                                                                        {{ $companies->state->name }}</span></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach


                                <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                                    data-wow-duration="0.5s">
                                    <ul class="pagination">

                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-xl-4 p-0 col-of-blog-sec-nav">
                                <nav
                                    class="navbar navbar-expand-lg bg-of-aqua-shade blog-nav  navbar-light p-0 h-100 d-flex justify-content-start align-items-baseline">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse bg-of-aqua-shade mt-5 navbar-collapse h-100"
                                        id="navbarSupportedContent">
                                        <div class="col h-100">
                                            <div class="row p-0  h-100 m-auto">
                                                <div class="single-footer-widget h-100 position-relative">
                                                    @if (auth()->guard('company')->user())
                                                        <img src="{{ URL::to('/img/01.png') }}" alt="Image">
                                                    @else
                                                        <div class="blog-form-div my-3"
                                                            style="top: 0%; margin-bottom:40% !important;">
                                                            <div id="form-of-comapny-show" style="top: 20%;"
                                                                class=" mx-2 mx-lg-1 my-5 ">
                                                                <form id="regForm"
                                                                    action="{{ route('quotation.post') }}"
                                                                    class="company-show-form py-4 px-3" method="POST">
                                                                    @csrf
                                                                    <div class="py-3">
                                                                        <h2 class="text-center m-0 fs-4">Save time and
                                                                            money
                                                                            on your move</h2>
                                                                    </div>
                                                                    @include('backend.layouts.partials.messages')
                                                                    <div class="tab">
                                                                        <div class="my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Zip
                                                                                From</label>
                                                                            <input type="text" id="zipfromsearch"
                                                                                value="{{ old('zip_from') }}"
                                                                                class="form-control  @error('zip_from') is-invalid @enderror"
                                                                                required name="zip_from"
                                                                                placeholder="Zip From">
                                                                            @error('zip_from')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Move
                                                                                Size</label>
                                                                            <select class="form-control form-select"
                                                                                name="move_size" id="move_size">
                                                                                <option selected
                                                                                    value="{{ old('move_size') }}">
                                                                                    {{ old('move_size') != '' ? old('move_size') : '-- Select Move Size --' }}
                                                                                </option>
                                                                                <option value="4 Bedroom Home">4 Bedroom
                                                                                    Home</option>
                                                                                <option value="3 Bedroom Home">3 Bedroom
                                                                                    Home</option>
                                                                                <option value="2 Bedroom Home">2 Bedroom
                                                                                    Home</option>
                                                                                <option value="1 Bedroom Home">1 Bedroom
                                                                                    Home</option>
                                                                                <option value="Studio">Studio</option>
                                                                                <option value="Office Move">Office Move
                                                                                </option>
                                                                                <option value="Commercial Move">Commercial
                                                                                    Move</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab ">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center w-100">
                                                                            <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                                                alt="Image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class="my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Zip
                                                                                To</label>
                                                                            <input type="text" id="ziptosearch"
                                                                                value="{{ old('zip_to') }}"
                                                                                class="form-control  @error('zip_to') is-invalid @enderror"
                                                                                required name="zip_to"
                                                                                placeholder="Zip To">
                                                                            @error('zip_to')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class=" my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Moving
                                                                                Date</label>
                                                                            <input type="text" id="date"
                                                                                value="{{ old('date') }}"
                                                                                class="form-control bg-transparent @error('date') is-invalid @enderror"
                                                                                required name="date"
                                                                                placeholder="Moving Date">
                                                                            @error('date')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center w-100">
                                                                            <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                                                alt="Image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div class=" my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Name</label>
                                                                            <input type="text" id="name"
                                                                                value="{{ old('name') }}"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                required name="name"
                                                                                placeholder="Your Name">
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class=" my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Email
                                                                                Address</label>
                                                                            <input type="email" id="email"
                                                                                value="{{ old('email') }}"
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                required name="email"
                                                                                placeholder="Your email address">
                                                                            @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class=" my-4">
                                                                            <label
                                                                                class="mx-1 mb-2 fs-6 label-of-dashboard">Phone
                                                                                No.</label>
                                                                            <input type="text" id="phone_no"
                                                                                value="{{ old('phone_no') }}"
                                                                                class="form-control @error('phone_no') is-invalid @enderror"
                                                                                required name="phone_no"
                                                                                placeholder="Phone number">
                                                                            @error('phone_no')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab">
                                                                        <div
                                                                            class="d-flex justify-content-center align-items-center w-100">
                                                                            <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                                                alt="Image">
                                                                        </div>
                                                                    </div>
                                                                    <div style="overflow:auto;">
                                                                        <div class="banner-btn" style="float:right;">
                                                                            <button type="button" class="sdg py-2 px-2"
                                                                                id="prevBtn"
                                                                                onclick="nextPrev(-2)">Previous</button>
                                                                            <button type="button" class="sdg py-2 px-4"
                                                                                id="nextBtn"
                                                                                onclick="nextPrev(1)">Next</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Circles which indicates the steps of the form: -->
                                                                    <div id="steps-div" style="display:none;">
                                                                        <span class="step"></span>
                                                                        <span class="step"></span>
                                                                        <span class="step"></span>
                                                                        <span class="step"></span>
                                                                        <span class="step"></span>
                                                                        <span class="step"></span>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <!-- ZIP_TO SEARCH  -->
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $("#zipfromsearch").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#zipfromsearch').val(ui.item.label);
                console.log(ui.item);
                return false;
            }
        });
    </script>

    <!-- ZIP_TO SEARCH -->
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $("#ziptosearch").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#ziptosearch').val(ui.item.label);
                console.log(ui.item);
                return false;
            }
        });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                document.getElementById("nextBtn").style.display = "inline";
            }
            if (n % 2 != 0) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("steps-div").style.display = "none";
                setTimeout(() => {
                    document.querySelector("#nextBtn").click();
                    //   document.querySelector("#prevBtn").click();
                }, 1000);
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

    <script>
        var ZipNum = document.getElementById("zipfromsearch");
        var ZipNum2 = document.getElementById("ziptosearch");
        ZipNum.addEventListener("keyup", function() {
            var MaxNum = ZipNum.value.split('');
            if (MaxNum.length > 5) {
                ZipNum.value = ZipNum.value.substring(0, 5);
            }
        });
        ZipNum2.addEventListener("keyup", function() {
            var MaxNum = ZipNum2.value.split('');
            if (MaxNum.length > 5) {
                ZipNum2.value = ZipNum2.value.substring(0, 5);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
    <script>
        $("#phone_no").mask("+1-999-999-9999");
        $("#phone_no").on("focus click", function(e) {
            setTimeout(function() {
                e.target.setSelectionRange(3, 3);
            }, 1)
        });
        $("#phone_no").on("blur", function() {
            var last = $(this).val().substr($(this).val().indexOf("-") + 1);
            if (last.length == 3) {
                var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
                var lastfour = move + last;
                var first = $(this).val().substr(0, 9);
                $(this).val(first + '-' + lastfour);
            }
        });
        $("#date").flatpickr({
            dateFormat: "d-m-Y"
        });
    </script>
@endsection
