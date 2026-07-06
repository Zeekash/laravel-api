@extends('layouts.app')
@section('title', 'write-review')
@section('meta_description', 'search company to write review')
@section('meta_keywords', 'Write Review')
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection

@section('content')
    <style>
        .search-container {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding: 40px 0;
            text-align: center;
            background: linear-gradient(45deg, #116087, #4c94a25e);
            color: #fff;
            border-radius: 20px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            position: relative;
        }

        div#card-of-services {
            border: 1px solid #1160872b;
            border-radius: 15px;
        }

        div#card-of-services p {}

        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: 0px solid #e1e5eb;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            color: #333;
            font-family: var(--para-family);
        }

        .search-input:focus {
            outline: none;
            /* box-shadow: 0 0 0 3px rgba(44, 139, 172, 0.2); */
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-button {
            background-color: #116087;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: var(--para-family);
        }

        .search-button:hover {
            background-color: #1e6581;
        }

        h2.search-title {
            color: #fff;
        }

        @media (max-width: 600px) {
            .search-container {
                padding: 30px 20px;
                border-radius: 8px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-button {
                padding: 12px 0;
            }

            h2.search-title {
                color: #FFF;
                font-size: 32px;
                4 margin-bottom: 15px;
            }



        }

        .img_review_wrapper {
            max-width: 150px;
        }

        .img_review_wrapper img {
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        .default-btn {
            margin-top: 15px !important;
            display: block;
        }
    </style>
    <section class="search-area py-5 bg-of-aqua-shade">
        <div class="row w-100 justify-content-center align-items-center mx-auto px-0 ">
            <div class="newsletter-area pb-50">
                <div class="container px-2">
                    {{-- <div class="row align-items-center py-3 m-0">
                        <div class="col-lg-4">
                            <div class="">
                                <h1>Search Company</h1>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form action="{{ route('company.write-review') }}" method="GET"
                                style="border-radius:10px; height:70px; border:2px solid #116087;    font-family: var(--para-family);"
                                class="px-2 d-flex justify-content-start align-items-center">
                                <input type="search" value="{{ request('search') }}" class="w-100 fs-5"
                                    style="border:none; outline:none; box-shadow:none;" placeholder="Search..."
                                    name="search" required autocomplete="off">
                                <button class="default-btn" type="submit">Search</button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="search-container">
                        <h1 class="search-title">Search Company</h1>
                        <div class="col-sm-8 mx-auto">
                            <form action="{{ route('company.write-review') }}" method="GET" class="search-form mt-4">
                                <input type="search" class="search-input" value="{{ request('search') }}"
                                    placeholder="Search..." name="search" required autocomplete="off">
                                <button type="submit" class="search-button">Search</button>
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
                            <h3 class="my-3 fs-5">Result Found: {{ $count }}</h3>
                        </div>
                    @else
                        <div class="blog-title d-flex flex-wrap align-items-center my-2">
                            <i class="fa fa-truck pe-1"></i>
                            <h3 class="my-3 fs-5">total Companies: {{ $total_companies }}</h3>
                        </div>
                    @endif
                    <div class="row article-loop">
                        @foreach ($companies as $company)
                            {{-- @if ($search) --}}
                            <div class="col-lg-6">
                                <div class="row p-3 my-3 mx-0 " id="card-of-services">
                                    <div class="col-lg-3 d-flex align-items-center">
                                        <a href="{{ route('company.show', $company->slug) }}" aria-label="Company">

                                            <span hidden class="image">{{ $company->image }}</span>
                                            @if ($company->image)
                                                @php
                                                    $imageUrl = str_starts_with($company->image, 'companies/image/')
                                                        ? URL::to('/' . $company->image)
                                                        : URL::to('/companies/image/' . $company->image);
                                                @endphp
                                                <div class="img_review_wrapper">
                                                    <img src="{{ $imageUrl }}" alt="{{ $company->image }}"
                                                        class="img-fluid">
                                                </div>
                                            @else
                                                <div class="img_review_wrapper">
                                                    <img src="{{ URL::to('/img/samplelogo.webp') }}"
                                                        alt="{{ $company->image }}" class="img-fluid">
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-9 mt-lg-0 mt-3">
                                        <h3 id="title-of-company-name" class="m-0 fs-5">
                                            {{ $company->company_name }}
                                        </h3>
                                        {{-- <p class="fs-14 my-0 d-flex align-items-center"><i
                                                              class="fs-14 fa-solid fa-location-dot icons-company-show me-2"></i>
                                                                      <span class="fw-bold me-2">Address: </span>
                                                      {{ $company->company_address ?? 'Not Found' }}
                                                                </p> --}}
                                        <div class="for_height">
                                            <div class=" my-2">
                                                <p class="my-0  fs-16  text-dark">
                                                    <span class="fw-bold me-2 text-dark"><i
                                                            class="fs-16 fa-solid fa-location-dot icons-company-show mt-0 text-center me-1"></i>Address:
                                                    </span>
                                                    {{ $company->company_address ?? 'Not Found' }}
                                                </p>
                                            </div>
                                            <div class="row my-2">
                                                <p class="my-0 d-flex align-items-center fs-16 flex-wrap">
                                                    <span class="fw-bold me-2 text-dark"><i
                                                            class="fa-solid fa-globe icons-company-show mt-0 text-center fs-16 me-1"></i>Site:
                                                    </span>
                                                    <a href="{{ $company->company_website }}" target="_blank"
                                                        rel="nofollow noopener">{{ $company->company_website }}</a>
                                                </p>
                                            </div>
                                            {{-- <p class="my-0 d-flex align-items-center fs-14"><i
                                                                 class="fa-solid fa-globe icons-company-show fs-14 me-2"></i>
                                                                <span class="fw-bold me-2">Site: </span><a href="{{ $company->company_website }}"
                                                                target="_blank" aria-label="CompanySite"
                                                                    rel="nofollow noopener">{{ $company->company_website }}</a>
                                                                </p> --}}
                                            <div class="row my-2">
                                                <p class="my-0 d-flex align-items-center fs-16 flex-wrap">
                                                    <span class="fw-bold me-2 text-dark"><i
                                                            class="fa-solid fa-phone-volume icons-company-show mt-0 text-center fs-16 me-1"></i>Phone:
                                                    </span>
                                                    <a aria-label="Phone Number"
                                                        href="tel:{{ $company->phone_no }}">{{ $company->phone_no }}</a>
                                                    @if ($company->additional_phone_no)
                                                        ,
                                                    @endif
                                                    <a class="ms-1" aria-label="Additional Phone Number"
                                                        href="tel:{{ $company->additional_phone_no }}">{{ $company->additional_phone_no }}</a>

                                                </p>
                                            </div>
                                        </div>
                                        <a href="{{ route('user.review.create', $company->slug) }}"
                                            aria-label="CompanyReview"><button type="button"
                                                class="default-btn mt-2 py-2 px-3"></i>Write
                                                Review</button></a>
                                        {{-- <p class="my-0 d-flex align-items-center fs-14"><i
                                                                class="fa-solid fa-phone-volume icons-company-show fs-14 me-2"></i>
                                                             <span class="fw-bold me-2">Phone: </span> <a href="tel:{{ $company->phone_no }}"
                                                                  aria-label="CompanyNum">{{ $company->phone_no }}</a> ,<a
                                                             href="tel:{{ $company->additional_phone_no }}"
                                                                             aria-label="CompanyNum">{{ $company->additional_phone_no }}</a>
                                                                </p>
                                                                <p class="my-0 d-flex align-items-center fs-14"><i
                                                                             class="fa fa-map-location-dot icons-company-show fs-14 me-2"></i>
                                                                     <span class="fw-normal me-2">Based In: <span class="fw-bold">
                                                                        {{ $company->state->name }}</span></span>
                                                                </p> --}}


                                    </div>

                                </div>
                            </div>


                            {{-- @endif --}}
                            {{-- @empty
                                         <div class="card text-center comp-not-fount-txt py-4 my-3">
                                             <a style="font-size:1.4em;" href="{{ route('company.register') }}">You want to create account
                                        ?</a>
                                                 </div> --}}
                        @endforeach
                    </div>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/home-quote.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
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
        var path = "{{ route('autocomplete') }}";
        $(".zipfromsearch").autocomplete({
            source: function(request, response) {
                if (request.term.length >= 2) {
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
                }
            },
            select: function(event, ui) {
                $('.zipfromsearch').val(ui.item.label);
                return false;
            }
        });
        $(".ziptosearch").autocomplete({
            source: function(request, response) {
                if (request.term.length >= 2) {
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
                }
            },
            select: function(event, ui) {
                $('.ziptosearch').val(ui.item.label);
                return false;
            }
        });
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
        $("#moveDate, #moveDate2").flatpickr({
            dateFormat: "d-m-Y",
            disableMobile: "true"
        });
    </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
   "name": "write-review",
  "url": "https://mymovingjourney.com/company/write-review",
 
  "description": "search company to write review"
}

</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "MyMovingJourney",
  "url": "https://mymovingjourney.com",
   "potentialAction": {
            "@type": "SearchAction",
            "target": "https://mymovingjourney.com/company/write-review?search={search_term_string}",
            "query-input": "required name=search_term_string"
        }
}
</script>




    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ReviewAction",
  "name": "Write a Review for a Moving Company",
  "target": {
    "@type": "EntryPoint",
    "urlTemplate": "https://mymovingjourney.com/company/write-review",
    "actionPlatform": [
      "http://schema.org/DesktopWebPlatform",
      "http://schema.org/MobileWebPlatform"
    ]
  }
}
</script>


   
@endsection
