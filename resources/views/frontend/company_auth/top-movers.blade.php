@extends('layouts.app')
@section('title', 'Top Moves')
@section('content')
    <style>
        #moving_comp {
            background: #fff;
            box-shadow: 0 20px 50px rgb(0 75 133 / 15%);
            border-radius: 15px;
            padding: 20px 10px;
            height: auto
        }

        #float-rating-div .rating-xs,
        #float-rating-div.cards-rating .rating-xs {
            font-size: 1.2em;
        }

        .rating-container.rating-xs.rating-animate.rating-disabled {
            width: auto;
            padding: 0%;
        }

        .pagination-items {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        @media (min-width: 320px) and (max-width: 575px) {
            .top_mover_card {
                /* margin-left: .3em !important; */
                padding: .5em !important;
            }
        }

        /* @media screen and (min-width: 600px) and (max-width:992px) {
            #company_review{
                display:flex !important;
            }
        } */
    </style>
    <div class="mx-auto" id="page">
        <h2 class="text-center w-100 h2-div-login-form text-white rounded-0 p-4 m-0">TOP MOVERS IN USA</h2>
    </div>
    <section class="py-5 bg-of-aqua-shade">

        <div class="container">
            <div class="row w-100 justify-content-center align-items-center mx-auto px-0">
                <div id="cards-col-1" class="col-12 px-0 py-3">

                    <div class="row d-flex justify-content-lg-between justify-content-center top_mover_card">
                        @forelse($data as $data)
                            <!-- <div class="col-12 col-lg-6"> -->
                            <div class="w-100 my-3 mx-0 article-loop" id="top_mover_card">
                                <!-- <div class="col-lg-6"></div> -->
                                <a class="w-100 row p-md-3 p-1" href="{{ route('company.show', $data->slug) }}"
                                    id="company_review">
                                    <div class="col-12 col-sm-8 col-lg-9 mb-2">
                                        <div class="row ">
                                            <div class="col-12 my-0">
                                                <h3 id="title-of-company-name" class=" mb-2" style="font-size: 1.6rem;">
                                                    {{ $data->company_name }}</h3>
                                                @php
                                                    
                                                    $rounded = round($data->average_rating, 1);
                                                @endphp

                                                <p class="m-0">
                                                    @if ($rounded == 0)
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif ($rounded > 0 && $rounded < 1)
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 1)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 1 && $rounded < 2)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#ff9800" aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 2)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 2 && $rounded < 3)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true">
                                                        </i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 3)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 3 && $rounded < 4)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 4)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.2rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 4 && $rounded < 5)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 5)
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.2rem; color:#ff9800"
                                                            aria-hidden="true"></i>
                                                    @endif
                                                    <span
                                                        class="text-danger">({{ round($data->average_rating, 1) }})</span>
                                                </p>
                                                <span id="rating-span2" class="mt-2"
                                                    style="font-size: 14px;">{{ $data->total_reviews }}
                                                    Reviews</span>

                                                <p class="fs-14 my-0 d-flex align-items-start"><i
                                                        class="fs-14 fa-solid fa-location-dot icons-company-show me-2"></i>
                                                    <span class="fw-bold me-2">Address: </span>
                                                    {{ $data->street ?? 'Not Found' }},
                                                    {{ $data->city }} {{ $data->state }},
                                                    {{ $data->zip }}
                                                </p>
                                                <p class="my-0 d-flex align-items-start fs-14"><i
                                                        class="fa-solid fa-globe icons-company-show fs-14 me-2"></i>
                                                    <span class="fw-bold me-2">Site: </span>
                                                    <span id="top_site">{{ $data->company_website }}</span>
                                                </p>
                                                <p class="my-0 d-flex align-items-start fs-14"><i
                                                        class="fa-solid fa-phone-volume icons-company-show fs-14 me-2"></i>
                                                    <span class="fw-bold me-2">Phone: </span>
                                                    {{ $data->phone_no }},
                                                    {{ $data->additional_phone_no }}
                                                </p>
                                                <p class="my-0 d-flex align-items-start fs-14"><i
                                                        class="fa fa-map-location-dot icons-company-show fs-14 me-2"></i>
                                                    <span class="fw-normal me-2">Based In: <span class="fw-bold">
                                                            {{ $data->statename }}</span></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3 d-flex justify-content-center align-items-center">
                                        <span hidden class="image">{{ $data->image }}</span>
                                        @if ($data->image)
                                            <img src="{{ URL::to('/companies/image/' . $data->image) }}"
                                                alt="{{ $data->image }}" style="width: 200px;border-radius:6px;">
                                        @else
                                            <img src="{{ URL::to('/img/samplelogo.webp') }}" alt="{{ $data->image }}"
                                                style="width: 200px;">
                                        @endif
                                    </div>
                                </a>
                            </div>


                            <!-- </div> -->

                            <!-- <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                            data-wow-duration="0.5s">
                            <ul class="pagination">

                            </ul>
                        </div> -->

                        @empty
                            <div class="card text-center comp-not-fount-txt py-4 my-3">
                                <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to create
                                    account ?</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    {{-- <!-- ZIP_TO SEARCH  -->
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $("#zipfromsearch").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
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
        source: function (request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#ziptosearch').val(ui.item.label);
            console.log(ui.item);
            return false;
        }
    });
</script> --}}

    <script>
        var date = new Date();
        var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
        $('.date_span').text(current_date)
    </script>

    {{--
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
    ZipNum.addEventListener("keyup", function () {
        var MaxNum = ZipNum.value.split('');
        if (MaxNum.length > 5) {
            ZipNum.value = ZipNum.value.substring(0, 5);
        }
    });
    ZipNum2.addEventListener("keyup", function () {
        var MaxNum = ZipNum2.value.split('');
        if (MaxNum.length > 5) {
            ZipNum2.value = ZipNum2.value.substring(0, 5);
        }
    });
</script> --}}

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
    {{--
<script>
    $("#phone_no").mask("+1-999-999-9999");
    $("#phone_no").on("focus click", function (e) {
        setTimeout(function () {
            e.target.setSelectionRange(3, 3);
        }, 1)
    });
    $("#phone_no").on("blur", function () {
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
</script> --}}
@endsection
