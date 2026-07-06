@extends('layouts.app')
@section('title', $post->meta_title)
@section('meta_description', $post->meta_description)
@section('meta_keywords', "$post->meta_keywords")
@section('og:image')
    {{ asset('posts/image/' . $post->image) }}
@endsection
@section('og:title', $post->meta_title)
@section('og:description', $post->meta_description)
@section('twitter:image')
    {{ asset('posts/image/' . $post->image) }}
@endsection
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/post-show.css') }}">
    <style>
        #table-of-contents {
            /* position: fixed; */
            font-size: 32px;
            background-color: #11608730;
            padding: 14px 24px 34px;
            border: 1px solid #cccccc7d;
            border-radius: 12px;
            position: relative;
            margin-top: 12px;
        }

        /* Fixed TOC Styling with initial state */
        #table-of-contents.toc-fixed.active {
            position: fixed;
            top: 165px;
            right: 300px;
            width: 360px;
            z-index: 999;
            max-height: 80vh;
            overflow-y: auto;
        }

        /* Responsive adjustments for TOC starting from 1450px screen width */
        @media (max-width: 1750px) {
            #table-of-contents.toc-fixed.active {
                right: 180px;
                /* Adjust right margin */
                width: 360px;
                /* Make it a bit smaller */
            }
        }

        /* Adjustments for Tablets (max-width: 768px) */
        @media (max-width: 1520px) {
            #table-of-contents.toc-fixed.active {
                top: 155px;
                right: 80px;
                width: 360px;
                max-height: 70vh;
                /* Take most of the screen width */
            }
        }

        /* Adjustments for Mobile (max-width: 480px) */
        @media (max-width: 1280px) {
            #table-of-contents.toc-fixed.active {
                top: 70px;
                right: 10px;
                width: 330px;
                max-height: 70vh;
            }


        }

        /* Adjustments for Mobile (max-width: 480px) */
        @media (max-width: 1000px) {
            #table-of-contents.toc-fixed.active {
                display: none;
            }


        }


        /* Table of Contents Before Styling */

        #table-of-contents::before {
            content: "";
            background-color: #116087;
            width: 4px;
            height: 90%;
            position: absolute;
            left: 0%;
        }

        #table-of-contents>strong {
            color: #116087;
            font-family: var(--albersans-family);
            font-weight: 600;
        }

        #table-of-contents ul {
            padding: 0;
            margin: 0;
            padding-left: 28px;
        }

        #table-of-contents .heading-level-2 {
            /* padding-left: 0%; */
            font-size: 18px;
            font-family: var(--albersans-family);
            font-weight: 500;
            color: var(--secondary-color);
        }

        #table-of-contents .heading-level-3 {
            font-size: 16px;
            font-family: var(--albersans-family);
            font-weight: 600;
            color: var(--secondary-color);
        }

        #table-of-contents .heading-level-4 {
            font-size: 16px;
            font-family: var(--albersans-family);
            font-weight: 500;
            color: var(--secondary-color);
        }

        #table-of-contents .heading-level-5 {
            font-family: var(--albersans-family);
            font-weight: 500;
            color: var(--primary-color);
        }

        #table-of-contents .heading-level-6 {
            font-family: var(--albersans-family);
            font-weight: 500;
            color: var(--primary-color);
        }

        #table-of-contents li {
            margin-bottom: 5px;
        }

        #table-of-contents a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-left: 10px;
            transition: all 0.4s linear;
        }

        #table-of-contents a:hover {
            color: #116087;
        }

        #table-of-contents button {
            background-color: #116087;
            border: none;
            font-size: 16px;
            font-family: var(--para-family);
            font-weight: 600;
            position: absolute;
            bottom: 0;
            letter-spacing: 0.5px;
            margin-top: 20px;
            width: 100%;
            left: 0;
            text-align: start;
            padding-left: 31px;
            padding-block: 6px;
            border-radius: 0 0 12px 12px;
            color: rgb(255, 255, 255);
        }

        .single-footer-widget .social li a {
            display: inline !important;
        }
    </style>
    <section class="bg-image py-2 blog-area mx-auto">
        @include('backend.layouts.partials.messages')
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 w-100">
            <div class="container post w-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div id="company-dashboard-main" class=" row py-0 px-0">
                        <div class="row p-0 m-auto">
                            <div class="col-lg-9 mx-auto">
                                <div class="banner_bg">
                                    <nav style="--bs-breadcrumb-divider: '➜'; 0px 8px 24px;" class=" py-2 rounded-3"
                                        aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="/blogs">Blogs</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{ route('cat.show', $post->postCategory->slug) }}">{{ $post->postCategory->name }}</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}
                                            </li>
                                        </ol>
                                    </nav>
                                    <div class="blog-title ">
                                        <h1>{{ $post->title }}</h1>
                                    </div>
                                    <div class=" d-flex justify-content-start flex-wrap pb-3 mt-3 author_bg">
                                        <div class=" d-flex justify-content-start align-items-center gap-3">
                                            <div class="writer border-right pe-lg-5">
                                                <div class="img_wr">
                                                    <img src="{{ asset('assets/img/author_img.png') }}"
                                                        class="rounded-circle" alt="Circle Image"
                                                        style="width: 35px;margin-right: 10px;">
                                                </div>
                                                <p class="ps-0 mb-0 mt-0" style="line-height: 20px;"><strong>Published
                                                        By:
                                                        {{-- {{ $post->admin->name }} --}}
                                                        <a href="https://www.linkedin.com/in/honey-jay/"
                                                            class="text-decoration-none"
                                                            style="font-family: var(--para-family); font-weight: 500; font-size: 16px;">
                                                            Honey Jay</a></strong><br>
                                                    <span
                                                        style="font-size: 12px; font-family: var(--para-family); line-height: 0px !important;">Published:
                                                        {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</span>
                                                </p>
                                            </div>
                                            <div class="writer">
                                                <div class="img_wr">
                                                    <img src="{{ asset('assets/img/mmj_post_user.png') }}" class=""
                                                        alt="Circle Image" style="width: 35px;margin-right: 10px;">
                                                </div>

                                                <p class="ps-0 mb-0 mt-0" style="line-height: 20px;"><strong>Edited
                                                        By:<a href="#" class="text-decoration-none"
                                                            style="font-family: var(--para-family); font-weight: 500; font-size: 16px;">
                                                            {{ $post->admin->name ?? ($post->company->company_name ?? 'Admin') }}</a></strong><br>
                                                    <span
                                                        style="font-size: 12px; font-family: var(--para-family); line-height: 0px !important;">Updated:
                                                        {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}</span>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-12 mx-auto mt-3">
                                        <div class="form_wrapper">
                                            <form action="" class=" main_banner_form">
                                                <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
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
                                                                <input type="text" id="external_zipfrom"
                                                                    name="moving-from"
                                                                    class="zipfromsearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_zipfrom_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 mt-lg-0 mt-2">
                                                            <div class="input_outer">
                                                                <label for="external_ziptosearch">Moving to*</label>
                                                                <input type="text" id="external_ziptosearch"
                                                                    name="moving-to" class="ziptosearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_ziptosearch_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-1"></div> --}}
                                                        <div
                                                            class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                                            <a href="#ModalForm" data-bs-toggle="modal">
                                                                <button class="quote-btn" type="button">
                                                                    Calculate Now
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <p class="mt-2 mb-0 text-center secure_info">Your personal information
                                                    is always safe and
                                                    encrypted.
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 mx-auto">
                                <div class="col-12   py-2 col-of-blog-post-section border-1">
                                    <img src="{{ asset('public/posts/image/' . $post->image) }}" class="me-2 w-100"
                                        alt="{{ $post->img_alt }}">

                                    <div class="mt-1 mb-2 mx-sm-4 " id="table-of-contents">


                                    </div> 
                                    @if (url()->current() == url('blogs/the-cheapest-days-of-the-month-to-book-a-move'))
                                        <section class="featured-partners py-5">

                                            <h2 class="featured-partners-title text-center mb-4">Featured Moving Companies
                                            </h2>
                                            <div class="Featured_Partners">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-4 col-md-6 mb-xl-0 mb-2">
                                                        <div class="partner-card active  ">
                                                            <div class="partner-header d-flex align-items-center mb-3">
                                                                <div class="partner-rank">1</div>
                                                                <h5 class="company_name">Best Affordable Moves</h5>
                                                            </div>
                                                            <div class="company_logo">
                                                                <img src="https://mymovingjourney.com/companies/image/united-american-moving-and-storage.jpg"
                                                                    alt="united-american-moving-and-storage-logo"
                                                                    class="img-fluid">
                                                            </div>

                                                            <!--<hr class="mt-2">-->
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                                                <span class="rating">4.6
                                                                    out of 5</span>
                                                            </div>
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                                                <ul class="d-flex list-unstyled mb-0 ms-1">
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-half-stroke"
                                                                        aria-hidden="true"></i>
                                                                </ul>
                                                            </div>

                                                            <!--<hr>-->
                                                            <div class="partner-info">
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Punctual Crew</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Careful Handling</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Problem‑Solving
                                                                </p>
                                                            </div>
                                                            <a target="_blank"
                                                                href="https://mymovingjourney.com/contact-mover/united-american-moving-and-storage">
                                                                <div class="phone-box mb-1 mt-3">
                                                                    Get Free Estimates
                                                                </div>
                                                            </a>
                                                            <!--<a href="#" class="estimate"> <i class="fas fa-phone me-2"></i>855-972-4089</a>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 mb-xl-0 mb-2">
                                                        <div class="partner-card ">
                                                            <div class="partner-header d-flex align-items-center mb-3">
                                                                <div class="partner-rank">2</div>
                                                                <h5 class="company_name">Efficient handling</h5>
                                                            </div>
                                                            <div class="company_logo">
                                                                <img src="https://mymovingjourney.com/companies/image/united-van-lines.webp"
                                                                    alt="united-van-lines-logo" class="img-fluid">
                                                            </div>

                                                            <!--<hr class="mt-2">-->
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                                                <span class="rating">4
                                                                    out of 5</span>
                                                            </div>
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                                                <ul class="d-flex list-unstyled mb-0 ms-1">
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                </ul>
                                                            </div>

                                                            <!--<hr>-->
                                                            <div class="partner-info">
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Customizable Services</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Professional Movers</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Warehouse Storage
                                                                </p>
                                                            </div>
                                                            <a target="_blank"
                                                                href="https://mymovingjourney.com/contact-mover/united-van-lines">
                                                                <div class="phone-box mb-1 mt-3">
                                                                    Get Free Estimates
                                                                </div>
                                                            </a>
                                                            <!--<a href="#" class="estimate"> <i class="fas fa-phone me-2"></i>855-972-4089</a>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="partner-card  ">
                                                            <div class="partner-header d-flex align-items-center mb-3">
                                                                <div class="partner-rank">3</div>
                                                                <h5 class="company_name">Reputation for reliability</h5>
                                                            </div>
                                                            <div class="company_logo">
                                                                <img src="https://mymovingjourney.com/companies/image/two-men-and-a-truck.webp"
                                                                    alt="two-men-and-a-truck-logo" class="img-fluid">
                                                            </div>

                                                            <!--<hr class="mt-2">-->
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">
                                                                <span class="rating">5
                                                                    out of 5</span>
                                                            </div>
                                                            <div
                                                                class="data-cell text-center my-2 d-flex align-items-center justify-content-center">

                                                                <ul class="d-flex list-unstyled mb-0 ms-1">
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                                </ul>
                                                            </div>

                                                            <!--<hr>-->
                                                            <div class="partner-info">
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Franchised Network</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Comprehensive Packing</p>
                                                                <p><img src="https://mymovingjourney.com/assets/img/check-mark.png"
                                                                        class="me-2" alt="check-mark" width="13"
                                                                        height="13">Customer Referrals
                                                                </p>
                                                            </div>
                                                            <a target="_blank"
                                                                href="https://mymovingjourney.com/contact-mover/two-men-and-a-truck">
                                                                <div class="phone-box mb-1 mt-3">
                                                                    Get Free Estimates
                                                                </div>
                                                            </a>
                                                            <!--<a href="#" class="estimate"> <i class="fas fa-phone me-2"></i>855-972-4089</a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </section>
                                    @endif
                                    <div class="d-flex flex-wrap flex-column mt-5" id="content">
                                        {!! $post->body !!}
                                    </div>
                                    <div class="col-lg-12 col-12 mx-auto mt-3">
                                        <div class="form_wrapper">
                                            <form action="" class=" main_banner_form">
                                                <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center">
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
                                                                <input type="text" id="external_zipfrom"
                                                                    name="moving-from"
                                                                    class="zipfromsearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_zipfrom_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 mt-lg-0 mt-2">
                                                            <div class="input_outer">
                                                                <label for="external_ziptosearch">Moving to*</label>
                                                                <input type="text" id="external_ziptosearch"
                                                                    name="moving-to" class="ziptosearch pac-target-input"
                                                                    placeholder="Enter City Name" autocomplete="off">
                                                                <span id="external_ziptosearch_error"
                                                                    class="error-message hidden"></span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="col-xl-4 d-flex align-items-center justify-content-lg-end justify-content-center text-center mt-lg-0 mt-3">
                                                            <a href="#ModalForm" data-bs-toggle="modal">
                                                                <button class="quote-btn" type="button">
                                                                    Calculate Now
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
                                            </form>
                                        </div>
                                    </div>
                                    @if ($post_faqs->count() > 0)
                                        <div class="row mt-4 " id="faq">
                                            <div class="col-12">
                                                <h2 class="fs-2 mb-3" id="page">Frequently Asked Questions (FAQs)
                                                </h2>
                                            </div>
                                            <div class="col-12">
                                                <div class="accordion blog-faqs" id="accordionExample">
                                                    @foreach ($post_faqs as $postFaq)
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{ $postFaq->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{ $postFaq->id }}">
                                                                    {{ $postFaq->question }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapse{{ $postFaq->id }}"
                                                                class="accordion-collapse collapse"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <p>
                                                                        {!! $postFaq->answer !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    <div class="d-flex flex-wrap w-100 justify-content-between align-items-center">

                                        @if ($post->getPreviousAttribute())
                                            <a class="py-2 fs-3 fw-bolder"
                                                href="{{ route('posts.show', $post->getPreviousAttribute()->slug) }}">
                                                <i class="fa-solid fa-chevron-left me-2"></i><span>PREVIOUS</span>
                                            </a>
                                        @endif

                                        <div
                                            class="{{ $post->getPreviousAttribute() && $post->getNextAttribute() ? 'vr' : '' }}">
                                        </div>

                                        @if ($post->getNextAttribute())
                                            <a class="py-2 fs-3 fw-bolder"
                                                href="{{ route('posts.show', $post->getNextAttribute()->slug) }}">
                                                <span>NEXT</span><i class="fa-solid fa-chevron-right ms-2"></i>
                                            </a>
                                        @endif

                                    </div>

                                    <div class="d-flex flex-wrap w-100 justify-content-center align-items-center">
                                        <div class="single-footer-widget">
                                            <ul class="social">
                                                <li>
                                                    {!! Share::page(url('/moving-resources/' . $post->slug))->facebook()->twitter()->whatsapp()->linkedin()->reddit()->pinterest() !!}
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <div class="">
                                    <div class="newsletter-area mt-2">
                                        <form action="{{ route('company.post-search') }}" method="get">
                                            <div class="input-group">
                                                <input type="search" class="form-control" name="search"
                                                    value="{{ request('search') }}" placeholder="search for Blogs">
                                                <span class="input-group-text rounded-end">
                                                    <button type="submit" aria-label="search button"><i
                                                            class="fa-solid fa-magnifying-glass"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <div class="card p-3 rounded-2 call-now text-center mt-3">
                                            <a href="tel:(786) 980-3050">
                                                <h4>Call now for a cost estimate</h4>
                                                <a class="tel__no mt-2" href="tel:(786) 980-3050"><i
                                                        class="fa-solid fa-phone"></i> (786) 980-3050</a>
                                                <p>Available 24/7</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog_side_category ">
                                        <h3>Categories</h3>
                                        <ul class="list-unstyled p-0 m-0 mt-1">
                                            @foreach ($categories as $catgeory)
                                                <li>
                                                    <a href="{{ route('cat.show', $catgeory->slug) }}"><i
                                                            class="fa-solid fa-chevron-right "></i> {{ $catgeory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="blog-form-div mx-2">
                                        <h2 class="fs-4 text-start mt-4 mb-3">Recent Blogs</h2>

                                        <div class="d-flex flex-column">
                                            @foreach ($data as $data)
                                                <div class="mb-4">
                                                    <img src="{{ asset('public/posts/image/' . $data->image) }}"
                                                        class="img-recent-blogs me-2 w-100" alt="{{ $data->img_alt }}">
                                                    <h3 class="fs-16 fw-light">
                                                        <a href="{{ route('posts.show', $data->slug) }}"
                                                            class="">{{ $data->title }}</a>
                                                    </h3>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div> --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- BannerForm --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/home-quote.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

    {{-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const headings = document.querySelectorAll(
        "#content h1, #content h2, #content h3, #content h4, #content h5, #content h6");
    const toc = document.getElementById("table-of-contents");

    toc.innerHTML = "<strong>Table of Contents</strong><ul></ul>";

    const tocList = toc.querySelector("ul");

    headings.forEach(function(heading) {
        const anchorId = heading.id || heading.textContent.replace(/\s+/g, "-").toLowerCase();
        heading.id = anchorId;

        const listItem = document.createElement("li");
        const anchor = document.createElement("a");
        anchor.href = `#${anchorId}`;

        // Add CSS classes for indentation based on heading level
        let level = parseInt(heading.tagName.charAt(1));
        anchor.textContent = heading.textContent;
        anchor.classList.add(`heading-level-${level}`);

        listItem.appendChild(anchor);
        tocList.appendChild(listItem);
    });
});
</script> --}}

    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url()->current()}}"
    },
    "headline": "{!! html_entity_decode($post->meta_title) !!}",
    "description": "{!! html_entity_decode($post->meta_description) !!}",
    "image": "{{ asset('posts/image/'.$post->image) }}",

    "publisher": {
        "@type": "Organization",
        "name": "my moving journey",
        "logo": {
            "@type": "ImageObject",
            "url": "https://mymovingjourney.com"
        }
    },
    "datePublished": "{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}",
    "dateModified": "{{ \Carbon\Carbon::parse($post->updated_at)->format('Y-m-d') }}"
}
</script>

    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "{!! html_entity_decode($post->meta_title) !!}",
    "url": "{{url()->current()}}",
    "description": "{!! html_entity_decode($post->meta_description) !!}"
}
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https://mymovingjourney.com",
        "name": "Home"
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https://mymovingjourney.com/blogs",
        "name": "Blogs"
      }
    }
    @if($post->postCategory)
    ,{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "{{ route('cat.show', $post->postCategory->slug) }}",
        "name": "{{ $post->postCategory->name }}"
      }
    }
    @endif
    ,{
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@id": "{{ url()->current() }}",
        "name": "{!! html_entity_decode($post->meta_title) !!}"
      }
    }
  ]
}
</script>

    <script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "MyMovingJourney",
    "url": "https://mymovinjourney.com",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.mymovinjourney.com/company-search?search={search}",
        "query-input": "required name=search"
    }
}
</script>
    @if ($post_faqs->count())
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach ($post_faqs as $key => $postFaq)
    {
      "@type": "Question",
      "name": "{{ strip_tags($postFaq->question) }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ strip_tags($postFaq->answer) }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
    @endif


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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const headings = document.querySelectorAll(
                "#content h1, #content h2, #content h3, #content h4, #content h5, #content h6"
            );
            const toc = document.getElementById("table-of-contents");

            if (headings.length === 0 || !toc) return;

            toc.innerHTML =
                "<strong>Table of Contents</strong><ul class='toc-list'></ul>";

            const tocList = toc.querySelector(".toc-list");

            headings.forEach(function(heading, index) {
                // Improved ID generation: remove special chars, trim, space to dash
                const anchorId =
                    heading.id || heading.textContent.replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, "-")
                    .toLowerCase();
                heading.id = anchorId;

                const listItem = document.createElement("li");
                const anchor = document.createElement("a");
                anchor.href = `#${anchorId}`;

                let level = parseInt(heading.tagName.charAt(1));
                anchor.textContent = heading.textContent;
                anchor.classList.add(`heading-level-${level}`);

                if (level === 3) {
                    listItem.style.marginLeft = "25px"; // Add margin-left for level 3 headings
                }
                if (level === 4) {
                    listItem.style.marginLeft = "50px"; // Add margin-left for level 3 headings
                }

                listItem.appendChild(anchor);
                tocList.appendChild(listItem);
            });

            const totalItems = headings.length;
            const itemsToShowInitially = 5;
            let itemsDisplayed = itemsToShowInitially;

            Array.from(tocList.children).slice(itemsToShowInitially).forEach(function(item) {
                item.style.display = "none";
            });

            if (totalItems > itemsToShowInitially) {
                const showMoreBtn = document.createElement("button");
                showMoreBtn.textContent = "Show More";
                showMoreBtn.addEventListener("click", function() {
                    itemsDisplayed = totalItems;
                    Array.from(tocList.children).forEach(function(item) {
                        item.style.display = "list-item";
                    });
                    showMoreBtn.style.display = "none";
                    showLessBtn.style.display = "inline-block";
                });

                const showLessBtn = document.createElement("button");
                showLessBtn.textContent = "Show Less";
                showLessBtn.style.display = "none";
                showLessBtn.addEventListener("click", function() {
                    itemsDisplayed = itemsToShowInitially;
                    Array.from(tocList.children).slice(itemsToShowInitially).forEach(function(item) {
                        item.style.display = "none";
                    });
                    showMoreBtn.style.display = "inline-block";
                    showLessBtn.style.display = "none";
                });

                toc.appendChild(showMoreBtn);
                toc.appendChild(showLessBtn);
            }

            // Scroll to the exact top of the corresponding div when clicking on a heading
            const nav_links = document.querySelectorAll(".toc-list a");
            nav_links.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const targetId = link.getAttribute("href").substring(1);
                    const targetDiv = document.getElementById(targetId);

                    if (targetDiv) {
                        // Attempt to find a header, fallback to navbar or 0 height if none found
                        const headerElement = document.querySelector("header") || document
                            .querySelector(".navbar");
                        const headerHeight = headerElement ? headerElement.offsetHeight : 0;

                        // Calculate position
                        const scrollToPosition = targetDiv.getBoundingClientRect().top + window
                            .pageYOffset - (headerHeight + 20);

                        window.history.pushState(null, null, `#${targetId}`); // Update URL
                        window.scrollTo({
                            top: scrollToPosition,
                            behavior: "smooth"
                        });
                    }
                });
            });

        });
    </script>
@endsection
