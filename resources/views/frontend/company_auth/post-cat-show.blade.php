@extends('layouts.app')
@section('title')
    {{ $category->name }} - My Moving Journey
@endsection
@section('meta_description')
    Browse through our {{ $category->name }} blogs for practical tips, moving stories, and expert advice to help you handle your moving journey with ease.
@endsection
@section('meta_keywords')
{{ $category->name }}
@endsection
@section('head')
    @if (request()->has('page'))
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/post_category_show.css') }}">
    <section class="py-sm-3 py-0 mx-auto blog-area mx-auto">
        <div class="container">
            <div class="">
                <div class="upper_ban">
                    <nav style="--bs-breadcrumb-divider: '➜';" class=" pt-2 pb-3 rounded-3" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Blogs</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ $category->name }}</a>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="post_heading py-2">
                        {{ $category->name }}
                    </h1>
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center w-100 my-3 gap-3">
                        <div class="total-blogs d-flex align-items-center justify-content-center">
                            <i class="fas fa-book-open me-2" style="color: #116087;"></i>
                            <span>Total Blogs: <strong>{{ $posts->total() }}</strong></span>
                        </div>

                        <div class="search-wrapper w-100 w-md-auto">
                            <input type="text" id="blog-search" class="form-control" placeholder="Search blogs..." autocomplete="off">
                            <div class="search-loader">
                                <div class="spinner-border spinner-border-sm" role="status"></div>
                            </div>
                            <span class="search-icon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container px-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="post-container">
                        @include('frontend.company_auth.partials.post-cards', ['posts' => $posts])
                    </div>
                    <div class="text-center mt-5 mb-4">
                        <button id="show-more-btn" class="btn btn-primary px-5 py-2" 
                                style="display: {{ $posts->hasMorePages() ? 'inline-block' : 'none' }}; border-radius: 30px; background-color: #116087; border: none;">
                            Show More
                        </button>
                        <div id="loading-spinner" style="display: none;">
                            <div class="spinner-border" style="color: #116087" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let page = 1;
            let search = '';
            let hasMore = {{ $posts->hasMorePages() ? 'true' : 'false' }};

            function loadPosts(reset = false) {
                if (reset) {
                    page = 1;
                } else {
                    page++;
                }

                $('#show-more-btn').hide();
                if (reset) {
                    $('.search-loader').show();
                } else {
                    $('#loading-spinner').show();
                }

                $.ajax({
                    url: window.location.origin + window.location.pathname,
                    type: "GET",
                    data: {
                        page: page,
                        search: search
                    },
                    success: function(response) {
                        $('.search-loader').hide();
                        $('#loading-spinner').hide();
                        
                        if (reset) {
                            $('#post-container').html('');
                        }

                        if (!response.html || response.html.trim() === '') {
                            if (reset) {
                                $('#post-container').html('<div class="col-12 text-center my-5"><h3>No blogs found.</h3></div>');
                            }
                            $('#show-more-btn').hide();
                        } else {
                            $('#post-container').append(response.html);
                            if (response.hasMore) {
                                $('#show-more-btn').show();
                            } else {
                                $('#show-more-btn').hide();
                            }
                        }
                    },
                    error: function() {
                        $('.search-loader').hide();
                        $('#loading-spinner').hide();
                    }
                });
            }

            // Show More click
            $('#show-more-btn').on('click', function() {
                loadPosts();
            });

            // Search input
            let searchTimer;
            $('#blog-search').on('keyup', function() {
                clearTimeout(searchTimer);
                search = $(this).val();
                searchTimer = setTimeout(function() {
                    loadPosts(true);
                }, 800);
            });

            $('.search-icon').on('click', function() {
                search = $('#blog-search').val();
                loadPosts(true);
            });

        });
    </script>
    <script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "{{ $category->name }} - My Moving Journey",
    "url": "{{ url()->current() }}",
    "description": " Browse through our {{ $category->name }} blogs for practical tips, moving stories, and expert advice to help you handle your moving journey with ease."
}
</script>
<script type="application/ld+json">
    {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "MyMovingJourney",
    "url": "https://mymovingjourney.com",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://mymovingjourney.com/?search={search_term_string}",
        "query-input": "required name=search_term_string"
    }
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
    }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $category->name }}",
        "item": "{{ url()->current() }}"
    }]
}
</script>



@endsection

