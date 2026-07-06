
@extends('backend.layouts.master')
@section('title','City Page Edit')
@section('admin-content')

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <a href="{{ route('admin.citypages.index') }}" class="btn btn-primary float-right "> Back</a>
                    <h4 class="header-title">City Page - Edit</h4>
                    @include('flash-message')
                    <form action="{{ route('admin.citypages.update',$cityPage->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        {{-- <div class="card mt-2">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Seo Tags</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta Title</label>
                                            <input type="text" name="meta_title" value="{{ $cityPage->meta_title }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta
                                                Description</label>
                                            <input type="text" name="meta_description" value="{{ $cityPage->meta_description }}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>City Page</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Name</label>
                                            <input type="text" name="name" value="{{ $cityPage->name }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Slug</label>
                                            <input type="text" name="slug" value="{{ $cityPage->slug }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">States</label>
                                            <select class="form-control" name="state_id">
                                                <option value="">--- Select State ---</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state_id', $cityPage->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
