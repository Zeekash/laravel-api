@extends('layouts.app')
@section('content')
    <section class="guide-area">
        <div class="container">
            <div class="row py-4">
                <h4 class="head-top fs-1 mb-4">Moving Tips & Tricks</h4>
                <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Moving Tips</li>
                    </ol>
                </nav>
                <img src="https://blog-www.pods.com/wp-content/uploads/2020/10/resized_FI_karolina-grabowska_pexels_woman-making-list-moving-boxes.jpg"
                    class="w-100 guide-img" alt="Image">
                <p class="mt-3 blog-paras">Professional moving tips and tricks to help you move even smoother and
                    easier. We have created a wide range of moving tips and we are adding new ones all the time. In our
                    effort to be the most comprehensive moving source, we will be expanding our tips & tricks article
                    base and moving contributors to provide even more in-depth relocation information.</p>
                <p class="mt-3 blog-paras">
                    Browse our moving tips & tricks directory or use the search to find a particular moving tip. If you
                    can’t find something you would like to know, shoot us an email and we will create it. You can also
                    ask a moving question and one of our specialists will respond with an answer to your moving
                    question. Let us know if you want us to write for a specific moving tip. Get accurate moving tips
                    and costs fast and easy.</p>
            </div>
            <div class="my-4">
                <h3 class="mt-3 blog-title2">In depth on Moving Tips</h3>
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
@endsection
