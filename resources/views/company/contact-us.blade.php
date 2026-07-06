@extends('company.layouts.master')

@section('title', 'Contact Support')

@section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Contact Us</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        <li><span>Support</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('company.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('company.layouts.partials.messages')

                        <p class="text-muted mb-4">Share any feedback or issues you experience so our team can respond
                            promptly.</p>

                        <form action="{{ route('company.contact-us.post', $company->id) }}" method="POST"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject"
                                    class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                    value="{{ old('subject') }}" placeholder="Enter Subject">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Tell us about the issue or request">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Attachment (optional)</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-info default-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
