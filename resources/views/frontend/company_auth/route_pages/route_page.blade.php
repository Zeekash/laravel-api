@extends('layouts.app')
@section('title')
    Explore Top-rated Movers Across Various Routes in the USA
@endsection
@section('meta_description')
    Explore diverse routes for a seamless relocation.Trust us to make your move
    effortless and worry-free by connecting you with top movers in that vicinity.
@endsection
@section('meta_keywords', "Top-rated Movers Across Various Routes")
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/routes/main_route_page.css') }}">

    <section id="route_banner">
        {{-- <img src="https://img.freepik.com/free-photo/location-symbols-road-with-mountains_23-2149764141.jpg?size=626&ext=jpg&ga=GA1.1.1555633032.1686148399&semt=ais" alt="route"> --}}
        {{-- <div class="route_heading py-1"> --}}
        {{-- <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class=" text-center">
                            <h1><span>best moving </span> <br>routes in USA </h1>
                        </div>
                    </div>

                </div>
            </div> --}}

        {{-- </div> --}}
        <div class="container">
            <div class="row">
             
                <div class="col-xl-8 col-12 mx-auto mt-3">
                       <div class="show_breadcrumbs my-1 mt-5 mt-md-0">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '➜';" class="pb-1 mb-0 rounded-3" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 justif-content-center">
                                    <li class="breadcrumb-item"><a href="https://mymovingjourney.com" class="py-2"><i class="fas fa-home me-1 home_icon"></i>
                                            Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">
                                        Moving Routes
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <h1 class="mb-3 text_col">Popular Moving Routes</h1>
                    <div class="author-box">
                        <div class="author-info">
                            <img src="https://mymovingjourney.com/assets/img/author_img.png" alt="Author">
                            <div>
                                <span class="author-label">Author</span>
                                <h6 class="author_name"><a href="https://www.linkedin.com/in/honey-jay/"
                                        target="_blank">Honey Jay <i class="fa-brands fa-linkedin"
                                            style="color: var(--bg);"></i></a></h6>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="author-label">Updated:</span><br>
                            <strong>Nov 2025</strong>
                        </div>
                    </div>
                    {{-- <div class="form_wrapper">
                        <div class="col-lg-10 mb-3">
                            <h1 class="heading_cont">Best Moving Routes in USA</h1>
                        </div>
                        <hr style="width: 50%;color: #0000007a;">
                        <form action="" class="mt-2 main_banner_form" style="">
                            <h3 class="mb-4" style="font-family: var(--para-family); font-size: 18px; font-weight: 700;">
                                <span style="font-family: var(--para-family); font-weight: 900; color:#116087;">Save Up to
                                    30% on Moving Costs,</span> Let the Experts Handle the Rest!
                            </h3>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input_outer">
                                        <label for="external_zipfrom">Moving from*</label>
                                        <input type="text" id="external_zipfrom" name="moving-from" class="zipfromsearch"
                                            placeholder="City Name or Zip Code">
                                        <span id="external_zipfrom_error" class="error-message hidden"
                                            style="color:red; font-size:12px; hidden"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-md-0 mt-2">
                                    <div class="input_outer">
                                        <label for="external_ziptosearch">Moving to*</label>
                                        <input type="text" id="external_ziptosearch" name="moving-to" class="ziptosearch"
                                            placeholder="City Name or Zip Code">
                                        <span id="external_ziptosearch_error" class="error-message hidden"
                                            style="color:red; font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-2 px-lg-1 px-md-0 mt-md-0 mt-2">
                                    <a href="#ModalForm" data-bs-toggle="modal">
                                        <button class="get_quote" type="button">
                                            Get Free Quote
                                        </button>
                                    </a>
                                </div>
                                <!--<span-->
                                <!--    style="font-family: var(--para-family); font-size: 14px; font-weight: 700; margin-top: 10px; text-align:right;">Save-->
                                <!--    up to 30% on moving costs</span>-->
                            </div>
                        </form>

                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="routes_listing">
        <div class=" py-5 ">
            <div class="row mb-4">
                <div class="col-12 px-5">
                    <p>
                        If you’re looking to get from one place to another, you'll probably notice some routes are more
                        popular
                        than others. Whether you're heading to a big city or moving across states, finding the best route
                        can
                        make all the difference.
                    </p>
                    <p>
                        That’s exactly why we created this page: to help you discover the best moving routes in the USA and
                        connect you with the perfect moving companies that know these routes inside and out.
                    </p>
                    <p>
                        We've made it easy for you to find reliable movers in the USA who specialize in specific routes. The
                        movers we recommend are ranked based on real customer experiences who’ve traveled these routes and
                        left
                        feedback you can trust.
                    </p>
                    <p>
                        So, if you’re ready to hit the road, we’ve got your back. Let’s make your move smoother, easier, and
                        less stressful.
                    </p>
                    <p>
                        Check out the top moving routes in the USA and find the right company for your move!
                    </p>
                </div>
            </div>
            <div class="row px-5">
                <div class="col-12 mb-4 ">
                    <h2>Choose the state you’re moving from</h2>
                    <div class="state_box mt-4">
                        <ul class="state_route_list list-unstyled">
                            @foreach ($states as $state)
                                <li>
                                    <a
                                        href="{{ route('stateRouteList.page', strtolower($state->abv)) }}">{{ $state->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <ul class="list-unstyled p-0 m-0 row">
                    <div class="row"></div>
                    {{-- @foreach ($moving_routes as $movingRoute)
                        <div class="col-md-6 col-sm-8 col-12 mt-3">
                            <li>
                                <a href="{{ route('moving.route.show', $movingRoute->slug) }}">{{ $movingRoute->title }}</a>
                            </li>
                        </div>
                    @endforeach --}}
            </div>
            </ul>
        </div>

    </div>
    </div>
    </div>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "Explore Top-rated Movers Across Various Routes in the USA",
            "url": "{{url()->current()}}",
            "description": "Explore diverse routes for a seamless relocation.Trust us to make your move effortless and worry-free by connecting you with top movers in that vicinity."
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "My Moving Journey",
            "url": "https://mymovingjourney.com/"
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
        "name": "Moving Routes",
        "item": "{{url()->current()}}"
        }]
    }
</script>
@endsection
