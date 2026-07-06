@extends('layouts.app')
@section('title', 'Seach Blog')
@section('meta_description', 'Seach blog your are looking for')
@section('head')
    @if (request()->has('page') || request()->has('search'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')
    <style>
        .form-select {
            border: 1px solid #116087 !important;
        }
    </style>
    <section class="search-area py-5 bg-of-aqua-shade">
        <div class="row w-100 justify-content-center align-items-center mx-auto px-0 ">
            <div class="newsletter-area pb-50">
                <div class="container p-0">
                    <div class="row align-items-center py-3 m-0">
                        <div class="col-lg-4">
                            <div class="">
                                <h1>Search Blog</h1>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <form action="{{ route('company.post-search') }}" method="GET"
                                style="border-radius:10px; height:75px; "
                                class="px-sm-2 px-0 d-sm-flex d-block  justify-content-start align-items-center">
                                <input type="search" class="w-100 fs-5" value="{{ request('search') }}"
                                    style="border-top-left-radius: 5px;border: 1px solid #e4ece7;outline:none;box-shadow:none;padding: 6px 15px;border-bottom-left-radius: 5px;"
                                    placeholder="Search..." name="search" required autocomplete="off">
                                <button class="default-btn mt-sm-0 mt-1" style="padding:10px 30px !important;"
                                    type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row w-100 justify-content-center align-items-center mx-auto px-0">
                <div id="cards-col-1" class="col-12 px-0 py-3">

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            @forelse($posts as $post)
                                <a href="{{ route('posts.show', $post->slug) }}" class="article-loop">
                                    <div class="row w-100 py-4 px-1 my-3 mx-0" id="card-of-blogs">
                                        <div class="col-12 col-md-12 col-lg-4 d-flex align-items-center">
                                            <span hidden class="image">{{ $post->image }}</span>
                                            <img loading="lazy" src="{{ asset('posts/image/' . $post->image) }}"
                                                alt="{{ $post->image }}" class="img-fluid rounded">
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-8">
                                            <h3 class="mb-0 fs-4">{{ $post->title }}</h3>
                                            <div class="row">
                                                <h4 class="fs-16 my-2">
                                                    <i
                                                        class="fa fa-calendar me-1 text-danger"></i>{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}

                                                </h4>
                                                <p class="lh-base">
                                                    {{ substr(strip_tags($post->description), 0, 200) }}
                                                    <span style="color:#123269; letter-spacing: 1px;"
                                                        class="fw-bold">{{ strlen(strip_tags($post->description)) > 200 ? '...ReadMore' : '' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="card text-center comp-not-fount-txt py-4 my-3">
                                    <h3>Post Not Found</h3>
                                </div>
                            @endforelse
                            <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x"
                                data-wow-duration="0.5s">
                                <ul class="pagination">

                                </ul>
                            </div>

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
        $("#date").flatpickr({
            dateFormat: "d-m-Y"
        });
    </script>
@endsection
