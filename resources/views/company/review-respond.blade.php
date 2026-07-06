@extends('company.layouts.master')

@section('title', 'Respond to Review')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Respond to Review</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        <li><span>Reviews</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                @include('company.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('company.layouts.partials.messages')

                        <div class="mb-3">
                            <h4 class="mb-1 dark-color">Responding to {{ $user->name }}</h4>
                            <p class="text-muted mb-0">Use the editor below to post a public response to this review.</p>
                        </div>

                        <form action="{{ route('company.review-respond.post', $user->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <textarea name="respond" id="summernote">{{ old('respond', $user->respond) }}</textarea>
                                @error('respond')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary default-btn">Submit Response</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>
@endsection
