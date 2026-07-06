@extends('layouts.app')
@section('title', $tag->slug)
@section('content')

    <!-- bloger details -->
    <section class="py-3 blog-area bg-of-aqua-shade mx-auto">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '➜';" class="bg-white pt-2 pb-3 rounded-3" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1 text-danger"></i>
                            Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Blogs</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Tag</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">{{ $tag->name }}</a>
                    </li>
                </ol>
            </nav>
            <h2 class=" py-2">
                {{ $tag->name }}
            </h2>
            <hr>
            <div class="row">
                @foreach ($tag->posts as $post)
                    @if ($post->post_status == 'publish')
                        <a href="{{ route('posts.show', $post->slug) }}" class="article-loop">
                            <div class="row w-100 py-4 px-1 my-3 mx-0" id="card-of-blogs">
                                <div class="col-12 col-md-12 col-lg-3 d-flex align-items-center">
                                    <span hidden class="image">{{ $post->image }}</span>
                                    <img loading="lazy" src="{{ $post->image }}" alt="{{ $post->image }}"
                                        class="company-img black-logo">
                                </div>
                                <div class="col-12 col-md-12 col-lg-9">
                                    <h3 class="mb-0 fs-4">{{ $post->title }}</h3>
                                    <div class="row">
                                        <h4 class="fs-16 my-2">
                                            <i
                                                class="fa fa-clock me-1 text-danger"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}
                                            <div class="vr mx-2"></div>
                                            <i class="fa fa-user me-1 text-danger"></i> {{ $post->author->display_name }}
                                        </h4>
                                        <p class="lh-base">
                                            {{ substr(strip_tags($post->content), 0, 200) }}
                                            <span style="color:#1e1a1a; letter-spacing: 1px;"
                                                class="fw-bold">{{ strlen(strip_tags($post->content)) > 200 ? '...ReadMore' : '' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                    data-wow-duration="0.5s">
                    <ul class="pagination">
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
