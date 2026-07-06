@extends('layouts.app')
@section('content')
    <!-- Start guide Area -->
    <section class="guide-area">
        <div class="container">
            <div class="row py-4">
                <h4 class="head-top fs-1 mb-2">Moving Checklist</h4>
                <h4 class="head-top text-black fs-2 mb-2">The Greatest Moving Checklist of All Time</h4>
                <nav style="--bs-breadcrumb-divider: '➜';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Moving Checklist</li>
                    </ol>
                </nav>
                <img src="https://iauditoria.com/wp-content/uploads/2021/02/portada-1024x538.jpg" class="w-100 guide-img" alt="Image">
                <p class="mt-3 blog-paras">To say that a successful household move hinges on impeccable planning and
                    flawless time management may sound a bit like stating the obvious.</p>
                <p class="mt-3 blog-paras">
                    What may not be too obvious, though, is that the best way to organize the time you are given to
                    prepare for the home moving challenge ahead of you is to follow a superior time management tool –
                    the so-called <strong>MOVING CHECKLIST</strong>.</p>
            </div>
            <div class="banner-btn  my-4 d-flex justify-content-between flex-wrap">
                <button type="button" class="sdg">Movers or DIY?</button>
                <button type="button" class="sdg">Packing</button>
                <button type="button" class="sdg">Move Furniture</button>
                <button type="button" class="sdg">Rent a Truck</button>
                <button type="button" class="sdg">Load a Truck</button>
            </div>
            <div class="my-4">
                <h3 class="mt-3 blog-title2">In depth on Moving Checklist</h3>
                <p class="mt-3 blog-paras">Of course, you don’t just need any moving checklist you come across, you need
                    an exceptional one so that you’ll be able to crown your moving efforts with success.</p>
                <p class="mt-3 blog-paras">Many online moving checklists pledge that they are the best ones out there,
                    but once packing and moving preparations get underway, only few of those moving timelines will
                    actually turn out to be both practical and useful.</p>
                <p class="mt-3 blog-paras">We’ll refrain from stating that this is the only moving checklist you’ll ever
                    need – instead, we’ll wait for you to say it in the comments below.
                    Yes, yes, and yes – we are confident that you won’t be able to find a more detailed and easy-to-use
                    free printable moving checklist to guide you before, during and after your Moving day.
                    Oh, our moving checklist and planner also happens to be highly interactive.
                    So, is there a single reason why you wouldn’t take advantage of THE <br> <strong>GREATEST MOVING
                        CHECKLIST OF ALL TIME?</strong></p>
                <h4 class="head-top fs-2 mb-2">Before The Move: Organizational Tasks</h4>
                <p class="mt-3 blog-paras">Naturally, our interactive moving checklist starts with the things you just
                    have to do prior to Moving day to stay organized throughout the move. Keep in mind that the pre-move
                    period, starting as soon as your house move is confirmed and ending on Moving day itself, is the
                    most fundamental stage in the entire residential move.</p>
                <div class="d-flex justify-content-between flex-wrap">
                    <button type="button" class="default-btn my-2 py-2"><i
                            class="fa-solid fa-file-arrow-down me-2"></i>Save
                        List</button>
                    <button type="button" class="default-btn my-2 py-2"><i class="fa-regular fa-file-pdf me-2"></i>Download
                        PDF</button>
                    <button type="button" class="default-btn my-2 py-2"><i class="fa-solid fa-print me-2"></i>Print
                        List</button>
                    <button type="button" class="default-btn my-2 py-2"><i class="fa-solid fa-envelope me-2"></i>Email
                        List</button>
                </div>
                <div class="w-100 position-relative">
                    <ul class="ks-cboxtags py-5 px-0 position-relative">
                        <li>
                            <input type="checkbox" id="checkboxFour" value="Order one">
                            <label for="checkboxFour">
                                <h6>Remember to smile</h6>
                                <p>Remember to smile once in a while. Yes, the home moving process
                                    can be both stressful
                                    and expensive, but you’ve got little to worry about with this ultimate moving
                                    checklist in your hands. Exciting new adventures await you, so just smile.</p>

                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkboxFive" value="Order Two">
                            <label for="checkboxFive">
                                <h6>Fill out a moving quote</h6>
                                <p>You must know in advance how much your home move will cost. Complete a FREE (100%
                                    free) and QUICK (60 seconds) moving quote online to get contacted by professional
                                    moving companies for an accurate price estimation.</p>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkboxSix" value="Order Two">
                            <label for="checkboxSix">
                                <h6>Return borrowed items</h6>
                                <p>Return books, films, or any other borrowed items from friends, libraries, or
                                    organizations.</p>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkboxOne" value="Order one">
                            <label for="checkboxOne">
                                <h6>Remember to smile</h6>
                                <p>Remember to smile once in a while. Yes, the home moving process
                                    can be both stressful
                                    and expensive, but you’ve got little to worry about with this ultimate moving
                                    checklist in your hands. Exciting new adventures await you, so just smile.</p>

                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkboxTwo" value="Order Two">
                            <label for="checkboxTwo">
                                <h6>Fill out a moving quote</h6>
                                <p>You must know in advance how much your home move will cost. Complete a FREE (100%
                                    free) and QUICK (60 seconds) moving quote online to get contacted by professional
                                    moving companies for an accurate price estimation.</p>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="checkboxThree" value="Order Two">
                            <label for="checkboxThree">
                                <h6>Return borrowed items</h6>
                                <p>Return books, films, or any other borrowed items from friends, libraries, or
                                    organizations.</p>
                            </label>
                        </li>
                    </ul>
                </div>
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
