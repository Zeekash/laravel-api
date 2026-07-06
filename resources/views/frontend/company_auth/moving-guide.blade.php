@extends('layouts.app')
@section('content')
    <!-- Start guide Area -->
    <section class="guide-area ">
        <div class="container">
            <div class="row py-4">
                <h4 class="head-top fs-1 mb-4">Moving Guides</h4>
                <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Moving Guides</li>
                    </ol>
                </nav>
                <img src="https://i2.wp.com/movingtips.wpengine.com/wp-content/uploads/2017/07/items-movers-wont-move.jpg?fit=1200%2C800&ssl=1"
                    class="w-100 guide-img" alt="Image">
                <p class="mt-3 blog-paras">Complete How-Tos for moving are step by step guides to help you move smoother
                    and faster at the most
                    affordable moving cost. See our easy to do tips, tricks and guides that will save you time and money
                    on your moving day. We regularly add new moving related guides made by professionals. If you have an
                    idea about a moving guide, please contact us. We will publish the best written and informative
                    moving guides.</p>
                <h4 class="mt-3 blog-title2">Select one from our Moving Guides:</h4>
            </div>
            <div class="my-4">
                <h3 class="mt-3 blog-title2">In depth on Moving Guides</h3>

                @foreach ($post as $posts)
                    <div class="d-flex flex-column flex-wrap my-5  article-loop">
                        <div class="w-100 flex-wrap position-relative" style="z-index: 2;">
                            <a href="{{ route('company.post-show', $posts->id) }}">
                                <img src="{{ URL::to('/posts/image/' . $posts->image) }}"
                                    class="mx-0 me-lg-5 py-4 img2-of-blogs" alt="Image">

                                <div class="blog-2-inner-content px-5">
                                    <h4 class="heading-check-list py-4">{{ $posts->title }}</h4>
                            </a>
                            <p class="para-check-list my-0 fw-normal ">By : {{ $posts->admin->name }} </p>
                            <p class="para-check-list my-0 fw-normal">
                                {{ \Carbon\Carbon::parse($posts->created_at)->format('M d, Y') }} </p>
                        </div>

                    </div>
            </div>
            @endforeach
            <div class="pagination-container d-flex justify-content-center wow zoomIn mar-b-1x my-3"
                data-wow-duration="0.5s">
                <ul class="pagination">

                </ul>
            </div>
        </div>
        </div>
        </div>

    </section>
    <!-- End guide Area -->
@endsection
