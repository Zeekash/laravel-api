@extends('layouts.app')
@section('content')
    <section class="bg-of-aqua-shade  mt-5 py-3">
        <div class="container">
            <h2 class="text-center">Authors</h2>
            <hr>
            @foreach ($admin as $admins)
                <div class="row mt-2 mb-3 mx-1" id="blog-aurthor-details">
                    <div class="testimonial w-100 py-3 px-3">
                        <div class="d-flex justify-content-start flex-wrap flex-sm-nowrap align-items-center mb-3 w-100">
                            <div class="pic d-flex justify-content-center justify-content-sm-start align-items-center">
                                @if ($admins->image)
                                    <img src="{{ URL::to('/users/image/' . $admins->image) }}" alt="{{ $admins->image }}">
                                @else
                                    <img src="https://grandimageinc.com/wp-content/uploads/2015/09/icon-user-default.png"
                                        alt="Image">
                                @endif

                            </div>

                            <a href="{{ route('company.author-show', $admins->id) }}">
                                <h3 class="title mt-3 mt-sm-0 mx-0 text-start mx-sm-2 w-100">{{ $admins->name }}</h3>
                            </a>

                        </div>
                        <p class="description text-start p-2">
                            {{ $admins->description }}
                        </p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </section>
@endsection
