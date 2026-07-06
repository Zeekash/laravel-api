@extends('layouts.app')
@section('title', "Author | $admin->name")
@section('meta_description', "$admin->meta_description")
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/author.css') }}">
    <!-- bloger details -->
    <section class=" mt-2 py-3">
        <div class="container">
            <div class="row mt-3 mx-1" id="blog-aurthor-details">
                <div class="testimonial w-100">
                    <div class="d-flex justify-content-start flex-wrap flex-sm-nowrap align-items-center w-100">
                        <h1 class="fs-2 title mt-sm-0 mx-0 text-start w-100"><strong>Auhtor Name:</strong>
                            {{ $admin->name }}
                        </h1>
                    </div>
                    <p class="description text-start">
                        {{ $admin->description }}
                    </p>
                </div>
            </div>


        </div>
    </section>

    <hr>



    

    <!-- bloger details -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="side_categories mb-3">
                        <div class="categories_box">
                            <h4>categories</h4>
                            <ul class="list-unstyled">

                                @foreach ($categories as $category)
                                    <li><a href="{{ route('cat.show', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                        data-wow-duration="0.5s">
                        <ul class="pagination">
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-6">
                                <a href="{{ route('posts.show', $post->slug) }}" class="article-loop">
                                    <div class="blog-card">
                                        <div class="card-image">
                                            <img loading="lazy" src="{{ asset('public/posts/image/' . $post->image) }}"
                                                alt="{{ $post->image }}">
                                        </div>
                                        <div class="card-content">
                                            <div class="small_card">
                                                <div class="category">{{ $post->postCategory->name }}</div>
                                                <h2 class="title">{{ strtoupper($post->title) }}</h2>
                                                <div class="meta">
                                                    by <span
                                                        class="author">{{ $post->author->name ?? 'Penci Design' }}</span>
                                                    •
                                                    <span
                                                        class="date">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</span>
                                                </div>
                                            </div>
                                            <button class="read-more ">Read The Article</button>
                                        </div>
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{$posts->links()}}
                </div>
            </div>
    </section>
@endsection
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "{{ $admin->name }}",
    "url": "{{ url()->current() }}",
    "description": "{{ $admin->description }}"
}
</script>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Person",
    "name": "{{ $admin->name }}",
    "description": "{{ $admin->description }}"
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "MyMovingJourney",
    "url": "https://mymovingjourney.com/",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://mymovingjourney.com/?search={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
