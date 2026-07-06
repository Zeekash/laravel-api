@extends('layouts.app')
@section('title')
    403 Error
@endsection
@section('head')
<meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/error_page.css')}}">
    <section class="error_page">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center ">
                    {{-- <h1>403</h1> --}}
                    <div class="error_img position-relative">
                        <img src="{{asset('assets/img/error/403.webp')}}"  alt="403-error">
                        <div class="back_btn text-center">
                            <a href="/" class="btn btn-primary text-uppercase border-0 mt-2">back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection