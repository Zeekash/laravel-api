@extends('layouts.app')
@section('title', 'company-search')
@section('meta_description', 'company search')
@section('content')


    <section class="search-area py-5 bg-of-aqua-shade">
        <div class="row w-100 justify-content-center align-items-center mx-auto px-0 ">
            <div class="newsletter-area pb-50">
                <div class="container px-2">
                    <div class="row align-items-center py-3 m-0">
                        <div class="col-lg-4">
                            <div>
                                <h2>Search Company</h2>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('company.search') }}" method="GET"
                                style="border-radius:10px; height:70px; border:2px solid #116087;"
                                class="px-2 d-flex justify-content-start align-items-center">
                                <input type="search" class="w-100 fs-5" value="{{ request('search') }}"
                                    style="border:none; outline:none; box-shadow:none;" placeholder="Search..."
                                    name="search" required autocomplete="off">
                                <button class="default-btn " type="submit">Search</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0">
            <div class="row w-100 justify-content-center align-items-center mx-auto px-3">
                <div id="cards-col-1" class="col-12 px-0 py-3">
                    @if ($search)
                        <div class="blog-title d-flex flex-wrap align-items-center my-2">
                            <i class="fa fa-truck pe-1"></i>
                            <h3 class="fs-5 my-3">Result Found: {{ $count }}</h3>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            @forelse($companies as $company)
                                @if ($search)
                                    <div class="w-100 my-3 mx-0 article-loop" id="card-of-services">
                                        <a class="w-100 row p-3" href="{{ route('company.show', $company->slug) }}">
                                            <div class="col-12 col-md-12 col-lg-3 d-flex align-items-center">
                                                <span hidden class="image">{{ $company->image }}</span>
                                                @if ($company->image)
                                                    <img src="{{ URL::to('/companies/image/' . $company->image) }}"
                                                        alt="{{ $company->image }}" style="width: 200px;">
                                                @else
                                                    <img src="{{ URL::to('/img/samplelogo.webp') }}"
                                                        alt="{{ $company->image }}" style="width: 200px;">
                                                @endif
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-9">
                                                <div class="row">
                                                    <div class="col-12 my-0">
                                                        <h3 id="title-of-company-name" class="fs-5 m-0">
                                                            {{ $company->company_name }}</h3>
                                                        {{ $total_reviews }}

                                                        <p class="fs-14 my-0 d-flex align-items-start"><i
                                                                class="fs-14 fa-solid fa-location-dot icons-company-show me-2"></i>
                                                            <span class="fw-bold me-2">Address: </span>
                                                            {{ $company->street ?? 'Not Found' }},
                                                            {{ $company->city->name }} {{ $company->state->abv }},
                                                            {{ $company->city->zip_code }}
                                                        </p>
                                                        <p class="my-0 d-flex align-items-start fs-14"><i
                                                                class="fa-solid fa-globe icons-company-show fs-14 me-2"></i>
                                                            <span class="fw-bold me-2">Site: </span>
                                                            {{ $company->company_website }}
                                                        </p>
                                                        <p class="my-0 d-flex align-items-start fs-14"><i
                                                                class="fa-solid fa-phone-volume icons-company-show fs-14 me-2"></i>
                                                            <span class="fw-bold me-2">Phone: </span>
                                                            {{ $company->phone_no }},
                                                            {{ $company->additional_phone_no }}
                                                        </p>
                                                        <p class="my-0 d-flex align-items-start fs-14"><i
                                                                class="fa fa-map-location-dot icons-company-show fs-14 me-2"></i>
                                                            <span class="fw-normal me-2">Based In: <span class="fw-bold">
                                                                    {{ $company->state->name }}</span></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                                <div class="card text-center comp-not-fount-txt py-4 my-3">
                                    <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to create
                                        account ?</a>
                                </div>
                            @endforelse


                            <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                                data-wow-duration="0.5s">
                                <ul class="pagination">

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            @if (auth()->guard('company')->user())
                                <img src="{{ URL::to('/img/01.png') }}" alt="Image">
                            @else
                                <div id="form-of-comapny-show" class=" mx-2 mx-lg-1">
                                    <form id="regForm" action="{{ route('quotation.post') }}"
                                        class="company-show-form py-4 px-3" method="POST">
                                        @csrf
                                        <div class="py-0">
                                            <h3 class="text-center m-0 fs-4">Save time and money on your move</h3>
                                        </div @include('backend.layouts.partials.messages')>
                                        <div class="tab">
                                            <div class="my-4">
                                                <input type="text" id="zipfromsearch" value="{{ old('zip_from') }}"
                                                    class="form-control  @error('zip_from') is-invalid @enderror" required
                                                    name="zip_from" placeholder="Zip From">
                                                @error('zip_from')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="my-4">
                                                <select
                                                    class="form-control form-select @error('move_size') is-invalid @enderror"
                                                    name="move_size" id="move_size">
                                                    <option selected value="{{ old('move_size') }}">
                                                        {{ old('move_size') != '' ? old('move_size') : '-- Select Move Size --' }}
                                                    </option>
                                                    <option value="4 Bedroom Home">4 Bedroom Home</option>
                                                    <option value="3 Bedroom Home">3 Bedroom Home</option>
                                                    <option value="2 Bedroom Home">2 Bedroom Home</option>
                                                    <option value="1 Bedroom Home">1 Bedroom Home</option>
                                                    <option value="Studio">Studio</option>
                                                    <option value="Office Move">Office Move</option>
                                                    <option value="Commercial Move">Commercial Move</option>
                                                    @error('move_size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tab ">
                                            <div class="d-flex justify-content-center align-items-center w-100">
                                                <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                    alt="Image">
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="my-4">
                                                <input type="text" id="ziptosearch" value="{{ old('zip_to') }}"
                                                    class="form-control  @error('zip_to') is-invalid @enderror" required
                                                    name="zip_to" placeholder="Zip To">
                                                @error('zip_to')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="my-4">
                                                <input type="text" id="date" value="{{ old('date') }}"
                                                    class="form-control bg-transparent @error('date') is-invalid @enderror"
                                                    required name="date" placeholder="Moving Date">
                                                @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="d-flex justify-content-center align-items-center w-100">
                                                <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                    alt="Image">
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="my-4">
                                                <input type="text" id="name" value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror" required
                                                    name="name" placeholder="Your Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="my-4">
                                                <input type="email" id="email" value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror" required
                                                    name="email" placeholder="Your email address">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="my-4">
                                                <input type="text" id="phone_no" value="{{ old('phone_no') }}"
                                                    class="form-control @error('phone_no') is-invalid @enderror" required
                                                    name="phone_no" placeholder="+123456789">
                                                @error('phone_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Phone No. must be +123456789</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="tab">
                                            <div class="d-flex justify-content-center align-items-center w-100">
                                                <img src="https://i.pinimg.com/originals/6c/9e/19/6c9e197129299c5af04d8ad1173ad9b9.gif"
                                                    alt="Image">
                                            </div>
                                        </div>
                                        <div style="overflow:auto;">
                                            <div class="banner-btn" style="float:right;">
                                                <button type="button" class="sdg py-2 px-2" id="prevBtn"
                                                    onclick="nextPrev(-2)">Previous</button>
                                                <button type="button" class="sdg py-2 px-4" id="nextBtn"
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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

    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });

        // Changes contributed by @diego-rzg
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
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
