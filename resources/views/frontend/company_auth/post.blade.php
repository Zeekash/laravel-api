@extends('layouts.app')
@section('title', 'Moving Blogs - Tips, Stories & Advice from My Moving Journey')
@section('meta_title', 'Expert Moving Tips | Insights & Advice for Smooth Relocations')
@section('meta_description',
    'Browse through our moving blogs for practical tips, moving stories, and expert advice to
    help you handle your moving journey with ease.')
@section('meta_keywords', 'Moving Blogs')
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')
    <style>
        main.pb-0 {
            margin-top: 0px;
        }

        .for_padding {
            padding-top: 190px;
        }

        .breadcrumb-item+.breadcrumb-item::before,
        .breadcrumb-item.active {
            color: #ffffff !important;
            font-weight: 600;
        }

        .title {
            font-size: 22px;
            font-weight: 600;
            line-height: 1.3;
            color: #313742;
            margin-top: 0;
            margin-bottom: 12px;
            text-transform: capitalize;
        }

        #blog {
            background: url(../img/blog_banner.webp);
            background-size: cover;
            background-position: center;
            position: relative;
            background-color: rgba(112, 157, 216, 0.15);
            background-repeat: no-repeat;
            min-height: 400px;
        }

        .side_categories .categories_box ul li a {
            text-transform: inherit !important;
            font-family: var(--family);
            font-size: 18px;
            font-weight: bolder;
            /* background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); */
            color: rgb(5, 31, 0);
        }

        @media (min-width: 320px) and (max-width: 576px) {
            main.pb-0 {
                margin-top: 0px !important;
            }
        }

        @media (max-width: 600px) {
            .for_padding {
                padding-top: 140px !important;
                padding: 10px;
            }
        }

        @media screen and (max-width: 410px) {}
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/post_category_show.css') }}">

    <section class="mx-auto blog-area mx-auto">
        <div id="blog">
            <div class="container for_padding">
                <div class="row mx-auto" style="max-width: 1220px">
                    <div class=" col-12 d-flex flex-column align-items-start justify-content-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav style="--bs-breadcrumb-divider: '➜';" class=" pt-2 pb-3 rounded-3"
                                    aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                    class="fas fa-home me-1"></i>
                                                Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Blogs</a>
                                        </li>
                                    </ol>
                                </nav>
                                <h1 style="color: white">
                                    Moving Blogs
                                </h1>
                                {{-- <p class="fs-16 " style="color: white">
                                    Moving? Let’s make it fun! Get moving guides, resources, real-life examples, tips, and
                                    hacks that turn your move into something smooth and exciting. Who says relocating can’t
                                    be easy and enjoyable?
                                </p> --}}
                                {{-- <div class="col-12 mt-3">
                                    <div class="form_wrap">
                                        <div class="form_wrapper">
                                            <form action="" class=" main_banner_form">
                                                <div
                                                    class="d-lg-flex justify-content-lg-between justify-content-center align-items-center px-3">
                                                    <h3 class="mb-2 form_heading">
                                                        Let’s Calculate Your Moving Cost!
                                                    </h3>
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
                                                                    Calculate Cost Now
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mt-1">
                                                    <p class="mt-2 mb-0 text-center secure_info">We keep your personal
                                                        information safe and
                                                        secure.
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row search d-flex justify-content-center d-md-block d-none my-3">


                </div>
            </div>

        </div>
        <section>
            <div class="container mt-5">
                @include('backend.layouts.partials.messages')
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="row article-loop">
                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <div class="blog-card">
                                            <div class="card-image">
                                                <img loading="lazy" src="{{ asset('public/posts/image/' . $post->image) }}"
                                                    alt="{{ $post->image }}">
                                            </div>
                                            <div class="card-content">
                                                <div class="small_card">
                                                    <div class="category">{{ $post->postCategory->name }}</div>
                                                    <h2 class="title">{{ $post->title }}</h2>
                                                    <div class="meta">
                                                        by <span class="author">{{ $post->admin->name }}</span>
                                                        •
                                                        <span class="date">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                                <button class="read-more ">Read The Article</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{ $posts->links() }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 side_bar">
                        <div class="aside_search mb-4">
                            <div class="side_searchbar">
                                <form action="{{ route('company.post-search') }}" method="get">
                                    <div class="search-wrapper mb-4">
                                        <input type="search" class="form-control" name="search"
                                            placeholder="Search for blogs...">
                                        <button type="submit" class="search-icon" aria-label="search button">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </form>

                                <div class="card p-4 rounded-4 call-now text-center border-0 shadow-sm"
                                    style="background: linear-gradient(135deg, #116087 0%, #0e4e66 100%);">
                                    <h4 class="text-white mb-2 fs-5">Get a Quick Moving Quote</h4>
                                    <a class="only_num text-white d-block my-2" href="tel:(786) 980-3050" style="font-size: 24px;">
                                        <i class="fa-solid fa-phone-volume me-2"></i>(786) 980-3050
                                    </a>
                                    <p class="text-white-50 small mb-0">Speak with an expert 24/7</p>
                                </div>
                            </div>
                        </div>

                        <div class="side_categories my-4">
                            <div class="categories_box">
                                <h4>Categories</h4>
                                <ul class="list-unstyled mt-2 mb-0">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('cat.show', $category->slug) }}">
                                                <span>{{ $category->name }}</span>
                                                <span class="cat-count">{{ $category->posts_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="popular_articles mt-5">
                            <h2>Popular Articles</h2>
                        </div>
                        @foreach ($data as $popularPost)
                            <a href="{{ route('posts.show', $popularPost->slug) }}" class="d-block mb-2">
                                <div class="popular_blogs_card row align-items-center g-3">
                                    <div class="col-4 popular_blog_img">
                                        <img loading="lazy" src="{{ asset('public/posts/image/' . $popularPost->image) }}"
                                            alt="{{ $popularPost->image }}" class="img-fluid">
                                    </div>
                                    <div class="col-8 card_tile">
                                        <h4 class="mb-1">{{ $popularPost->title }}</h4>
                                        <div class="meta mb-0" style="font-size: 12px; opacity: 0.6;">
                                            by <span class="author">{{ $popularPost->admin->name }}</span>
                                            • <span
                                                class="date">{{ \Carbon\Carbon::parse($popularPost->published_at ?? $popularPost->created_at)->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        {{-- <div class="d-flex flex-column">
                            @foreach ($data as $data)
                                <a href="{{ route('posts.show', $data->slug) }}">
                                    <div class="card mb-3" style="border-radius:none;">
                                        <div class="row g-0">
                                            <div class="col-4">
                                                <img src="{{ asset('posts/image/' . $data->image) }}" class="img-fluid "
                                                    alt="{{ $data->image }}">
                                            </div>
                                            <div class=" col-8">
                                                <div class="card-body">
                                                    <span
                                                        class="card_date fw-bold">{{ \Carbon\Carbon::parse($data->published_at ?? $data->created_at)->format('M d, Y') }}</span>
                                                    <p class="card-text fw-bold text-capitalize text-dark">
                                                        {{ $data->title }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div> --}}

                    </div>

                </div>

            </div>
        </section>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/home-quote.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "Moving Blogs - Tips, Stories & Advice from My Moving Journey",
    "description": "Browse through our moving blogs for practical tips, moving stories, and expert advice to help you handle your moving journey with ease.",
    "url": "https://www.mymovinjourney.com/blogs"

}
</script>

    <script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "MyMovingJourney",
    "url": "https://www.mymovinjourney.com",
    "description": "You can trust My Moving Journey to help you find a reputable and reliable moving company, so you can experience a stress-free move. We have made it easy for you"

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
        "name": "Blog",
        "item": "https://mymovingjourney.com/blogs"
    }]
}
</script>
    <script>
        var maxLength = 5;
        $('.ziptosearch').keyup(function() {
            var textlen = maxLength - $(this).val().length;
        });
        $('.zipfromsearch').keyup(function() {
            var textlen = maxLength - $(this).val().length;
        });
    </script>
    <script>
        var div1 = $("#blog_form")
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

    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>


    <script>
        const page1 = document.getElementById('page_one');
        const page2 = document.getElementById('page_two');
        const page3 = document.getElementById('page_three');
        const nextBtn1 = document.getElementById('nextBtn1');
        const nextBtn2 = document.getElementById('nextBtn2');
        const prevBtn2 = document.getElementById('prevBtn2');
        const prevBtn3 = document.getElementById('prevBtn3');
        let currentPage = 1;

        nextBtn1.addEventListener('click', () => {
            let zip_form_value = document.getElementById('zip_from').value;
            let zip_to_value = document.getElementById('zip_to').value;

            if (zip_form_value === '' || zip_to_value === '') {
                return false;
            } else {

                page1.classList.add('d-none');
                page2.classList.remove('d-none');
            }
        });

        nextBtn2.addEventListener('click', () => {
            let move_date_value = document.querySelector('.blog_date').value;
            let select_value = document.querySelector('.blog_select').value;

            if (move_date_value === '' || select_value === '') {

                return false;

            } else {

                page2.classList.add('d-none');
                page3.classList.remove('d-none');

            }
        });

        prevBtn2.addEventListener('click', () => {

            page2.classList.add('d-none');
            page1.classList.remove('d-none');
        });

        prevBtn3.addEventListener('click', () => {
            page3.classList.add('d-none');
            page2.classList.remove('d-none');

            currentPage = 2;
        });

        $("#Modal_Btn").click(function() {
            var first_o_zip = $(".zipfromsearch").val()
            var first_d_zip = $(".ziptosearch").val()
            $('input[name="zip_from"]').val(first_o_zip)
            $('input[name="zip_to"]').val(first_d_zip)
        })
    </script>



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
        $('#hide-msg').show();
        setTimeout(function() {
            $('#hide-msg').hide();
        }, 5000);
    </script>
@endsection
