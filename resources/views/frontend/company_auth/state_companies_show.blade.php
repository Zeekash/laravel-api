@extends('layouts.app')
@section('title')
    Moving Companies in {{ $state->name }} - Honest Reviews & Ratings
@endsection
@section('meta_description')
    Looking for movers in {{ $state->name }}? Compare licensed pros, get free quotes and read verified reviews. Book your
    stress-free
    move today.
@endsection
@include('frontend.company_auth.state_open_graph')
{{-- @include('frontend.company_auth.state_meta_descrition') --}}
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('meta_keywords')
Movers in {{ $state->name }} 
@endsection
@section('og:title')
    Moving Companies in {{ $state->name }} - Honest Reviews & Ratings
@endsection

@section('og:description')
    Looking for movers in {{ $state->name }}? Compare licensed pros, get free quotes and read verified reviews. Book your
    stress-free
    move today.
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/listing.css') }}">
    <style>
        #float-rating-div.comp-show-stars .rating-container {
            justify-content: start;
        }

        .bottom li {
            margin-left: 20px;
            padding: 10px;
        }

        .main_banner_form {
            border-radius: 20px;
            padding: 15px 32px;
            background-color: #C9ECF8;
            border: 2px solid #0000001A;
        }

        .form_bg {
            background-color: #EBFAFF;
            padding: 12px;
            border-radius: 50px;
        }

        .miles_upp {
            font-size: 21px;
            color: #1e1a1a;
            font-weight: 500;
            margin-top: 0px;
        }

        .form_heading {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
        }

        .home_page_banner {
            min-height: 650px;
            background-image: url(../assets/img/state_banner.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center bottom;
            position: relative;
            z-index: 1;
            margin-top: 0px;
            padding: 160px 20px 40px !important
        }

        .home_company_card .company-name {
            color: #0f282b;
            opacity: 1;
            font-size: 20px;
        }

        p.based_company {
            /* border: 1px solid #00000021; */
            border-radius: 5px;
            margin-top: 8px;
            background-color: #f1f6f8;
            width: max-content;
            padding: 0 20px;
        }

        .accordion-button:not(.collapsed) {
            color: #000;
            background-color: #fff;
            /* box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125); */
        }

        .accordion-item {
            border: none !important;
            box-shadow: none !important;
            margin-top: 10px;
        }

        .accordion-button:not(.collapsed) {
            color: #000;
            background-color: #fff;
            box-shadow: none !important;
            padding: 20px 15px;
        }

        button.accordion-button {
            border-bottom: 1px solid #f2f2f2;
            padding: 20px 15px;
        }

        .accordion-body {
            padding: 20px 15px;
            font-size: 16px;
            font-family: var(--para-family);
            background-color: #f9fbfc;
        }

        .accordion-button:focus {
            border-color: #f2f2f2 !important;
            box-shadow: none !important;
        }

        .new_card {
            background-color: #f0f3f6d9;
            /* width: 88%; */
            /* box-shadow: 4px 4px 12px #363e3947; */
            border-radius: 20px;
        }

        .accordion-button {
            background-color: #fff !important;
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='black'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
            transform: rotate(-180deg);
        }

        ::marker {
            font-size: 17px;
            font-weight: 700;
        }

        .list_st li {
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        button.get_quote {
            padding: 8px 30px !important;
        }

        .card_wrapper {
            border: 1px solid #0000001c;
            padding: 20px;
            border-radius: 10px;
        }

        .log_wrapper {
            max-width: 120px;
            margin: auto;
        }

        h3.company-name {
            font-size: 22px;
        }

        span#review {
            font-size: 18px;
        }

        .avg_rat {
            font-size: 26px;
            color: #000 !important;
            font-weight: 600;
            font-family: var(--family);
        }

        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            padding: 0 0;
            margin-bottom: 1rem;
            list-style: none;
            justify-content: center;
        }

        @media screen and (max-width: 575px) {
            .home_page_banner {
                padding: 20px 10px !important;
            }

            .form_wrapper {
                padding: 40px 0px 20px;
            }

            .state_company_img {
                width: 150px;
            }

            main.pb-0 {
                margin-top: 65px !important;
            }

            .form_bg {
                background-color: #EBFAFF;
                padding: 12px;
                border-radius: 10px;
            }

            .form_wrap .form_wrapper {
                padding: 10px
            }

            .quote-btn {
                padding: 10px 35px;
            }
        }
    </style>
    <div class="main-banner">
        <div class="home_page_banner mb-5">
            <div class="container">

                <div class="col-xl-9 col-12 mt-3 mx-auto">
                    <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 justif-content-center">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="py-2"><i
                                                class="fas fa-home me-1 home_icon"></i>
                                            Home</a></li>
                                    <li class="breadcrumb-item"><a href="/movers-list" class="py-2">Movers List</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $state->name }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="form_wrapper">
                        <div class="col-lg-10 mb-3 mx-auto text-center">
                            <h1 class="heading_cont">Are you Looking for Movers in {{ $state->name }}?</h1>
                            <p class="para_cont">Compare licensed {{ $state->name }} movers, get free quotes & read
                                verified reviews. Book your stress-free move today!</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form_wrap">
                        <div class="col-lg-9 col-12 mx-auto mt-3">
                            <div class="form_wrapper">
                                <form action="" class=" main_banner_form">
                                    <div
                                        class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
                                        <h3 class="mb-2 form_heading">
                                            Let the Experts Handle the Rest!
                                        </h3>
                                        <p class="miles_upp">Moving Distance: 0 miles</p>
                                    </div>
                                    <div class="form_bg">
                                        <div class="row">
                                            <div class="col-lg-4 mt-lg-0 mt-2">
                                                <div class="input_outer">
                                                    <label for="external_zipfrom">Moving from*</label>
                                                    <input type="text" id="external_zipfrom" name="moving-from"
                                                        class="zipfromsearch pac-target-input" placeholder="Enter City Name"
                                                        autocomplete="off">
                                                    <span id="external_zipfrom_error" class="error-message hidden"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-lg-0 mt-2">
                                                <div class="input_outer">
                                                    <label for="external_ziptosearch">Moving to*</label>
                                                    <input type="text" id="external_ziptosearch" name="moving-to"
                                                        class="ziptosearch pac-target-input" placeholder="Enter City Name"
                                                        autocomplete="off">
                                                    <span id="external_ziptosearch_error"
                                                        class="error-message hidden"></span>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-1"></div> --}}
                                            <div
                                                class="col-lg-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                                <a href="#ModalForm" data-bs-toggle="modal">
                                                    <button class="quote-btn" type="button">
                                                        Cost Calculator
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-1">
                                        <p class="mt-2 mb-0 text-center secure_info">We keep your personal information safe
                                            and
                                            secure.
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section class="search_moving_statess">
        <div class="container">
            {{-- @include('frontend.company_auth.states_uppper_content') --}}
        </div>
        <div class="container listnig-container new_latest_movers_css mt-3">
            <div class="row m-0" id="Main">
                {{-- <div id="cards-col-2" class="col-lg-3 order-lg-0 order-1 mt-lg-0 mt-3 ">
                    <div class="card px-0 rounded-2 call-now"
                        style="background: #ffffff !important; border-bottom: 1px solid #e7eff1; padding-bottom: 20px;">
                        <a href="tel:(786) 980-3050">
                            <h4>Call now for a cost estimate</h4>
                        </a><a href="tel:(786) 980-3050"><i class="fa-solid fa-phone"></i> (786) 980-3050</a>
                        <p>Available 24/7</p>
                    </div>
                </div> --}}
                <div class="col-lg-10 px-2 mx-auto">
                    <div class="mb-3">
                        <h2 class="head-top_1 text-center">{{ $total_company }} Movers Found In {{ $state->name }} </h2>
                    </div>
                    <div class="row mt-4">
                        @forelse($data as $data)
                            <div class="col-12 col-lg-6 mt-3">
                                <a href="{{ route('company.show', $data->slug) }}">
                                    <div class="card_wrapper">
                                        <div class="row">
                                            <div
                                                class="col-lg-3 d-flex align-items-center justify-content-lg-center justify-content-center">
                                                <div class="log_wrapper">
                                                    @php
                                                        $imageUrl = str_starts_with($data->image, 'companies/image/')
                                                            ? URL::to('/' . $data->image)
                                                            : URL::to('/companies/image/' . $data->image);
                                                    @endphp
                                                    <span hidden class="image">{{ $data->image }}</span>
                                                    @if ($data->image)
                                                        {{-- {{ URL::to('/companies/image/' . $data->image) }} --}}
                                                        <img loading="lazy" src="{{ $imageUrl }}"
                                                            alt="{{ $data->image }}" class="img-fluid state_company_img"
                                                            width="200px" style="border-radius: 6px; ">
                                                    @else
                                                        <img loading="lazy" src="{{ URL::to('/img/samplelogo.webp') }}"
                                                            alt="{{ $data->image }}" class="company-img" width="200px">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <h3 class=" my-2 company-name">
                                                    {{ $data->company_name }}
                                                    @if ($data->claimed == 1)
                                                        <span>
                                                            <img src="{{ asset('assets/img/MMJ_Verified_new.svg') }}"
                                                                style="width: 22px;!important" alt="verified">
                                                            </img>
                                                    @endif
                                                </h3>
                                                @php
                                                    $total_rating = $data->users->sum(function ($user) {
                                                        return intval($user->overall_rating);
                                                    });

                                                    $total_reviews = $data->users->count();

                                                    if ($total_reviews > 0) {
                                                        $avg_rating = $total_rating / $total_reviews;
                                                    } else {
                                                        $avg_rating = 0;
                                                    }

                                                    $rounded = round($avg_rating, 1);
                                                @endphp

                                                <p class="m-0">
                                                    <span class="avg_rat">{{ round($avg_rating, 1) }}/5</span>

                                                    @if ($rounded == 0)
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif ($rounded > 0 && $rounded < 1)
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 1)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 1 && $rounded < 2)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 2)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 2 && $rounded < 3)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 3)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 3 && $rounded < 4)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 4)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="far fa-star" style="font-size:1.5rem; color:#a7a7a7"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded > 4 && $rounded < 5)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fa fa-star-half-stroke"
                                                            style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                    @elseif($rounded == 5)
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                        <i class="fas fa-star" style="font-size:1.5rem; color:#E3780D"
                                                            aria-hidden="true"></i>
                                                    @endif
                                                </p>
                                                <span id="review"> {{ $data->total_reviews }} Reviews</span>

                                                <p class="based_company">US DOT:
                                                    {{ $data->dot_no ?? 'Not Provided' }}
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                </a>

                            </div>
                        @empty
                            <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to
                                create
                                account ?</a>
                        @endforelse
                    </div>
                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                        data-wow-duration="0.5s">
                        {!! $pagePaginate !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container bottom">
            @include('frontend.company_auth.state_bottom_content')
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    {{--  State Schema Start --}}

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "MyMovingJourney",
            "url": "https://www.mymovinjourney.com"

        }
    </script>
    @include('frontend.company_auth.state_schema')
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement":
        [
            {
                "@type": "ListItem",
                "position": 1,
                "item":
                {
                    "@id": "https://mymovingjourney.com",
                    "name": "Home"
                }
            },
                                {
                "@type": "ListItem",
                "position": 2,
                "item":
                {
                    "@id": "https://mymovingjourney.com/movers-list",
                    "name": "Movers in USA"
                }
            },                                        {
                "@type": "ListItem",
                "position": 3,
                "item":
                {
                    "@id": "{{url()->current()}}",
                    "name": "{{$state->name}}"
                }
            }                                   ]
    }
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
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
@endsection
