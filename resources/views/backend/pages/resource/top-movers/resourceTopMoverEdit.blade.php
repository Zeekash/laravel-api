{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
@extends('backend.layouts.master')
@section('title', 'Resource Top Mover Edit')
@section('admin-content')

    {{-- <style>
    label {
        font-size: 20px !important
    }

    body {
        background: rgb(250, 250, 250);
    }
</style> --}}

    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <a href="{{ route('admin.resource.top.mover.index') }}" class="btn btn-primary float-right "> Back</a>
                        <h4 class="header-title">Resource Top Mover - Edit</h4>
                        @include('flash-message')
                        <form action="{{ route('admin.resource.top.mover.update', $topMover->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="card-head">
                                        <h2>Resoruce Top Mover</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Heading</label>
                                                <input type="text" name="heading" class="form-control"
                                                    value="{{ $topMover->heading }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Position</label>
                                                <select name="position" id="" class="form-control">
                                                    <option value="{{ $topMover->position }}">Current:
                                                        {{ $topMover->position }}</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $topMover->position = $i ?? '' }}">
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Company</label>
                                                <select name="company_id" id="" class="form-control">
                                                    <option value="{{ $topMover->company->id }}">Current:
                                                        {{ $topMover->company->company_name }}</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->company_name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Resource Page</label>
                                                <select name="resource_page_id" id="" class="form-control">
                                                    <option value="{{ $topMover->resourcePage->id }}">Current:
                                                        {{ $topMover->resourcePage->title }}</option>

                                                    @foreach ($resource_pages as $resourcePage)
                                                        <option value="{{ $resourcePage->id }}">{{ $resourcePage->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Point One</label>
                                                <input type="text" name="point_one" class="form-control"
                                                    value="{{ $topMover->point_one }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Point Two</label>
                                                <input type="text" name="point_two" class="form-control"
                                                    value="{{ $topMover->point_two }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Point Three</label>
                                                <input type="text" name="point_three" class="form-control"
                                                    value="{{ $topMover->point_three }}">

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
