@extends('backend.layouts.master')
@section('title', 'State Cost Top Mover Edit')
@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">State Cost Top Movers</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.state-cost.top-mover.index') }}">State Cost Top Movers</a></li>
                        <li><span>Edit</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <div class="col-12 mt-5">
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.state-cost.top-mover.update', $topMover->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-head">
                                        <h4 class="header-title">State Cost Top Mover Edit</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="heading" class="col-form-label">Heading</label>
                                                <input type="text" name="heading" id="heading" class="form-control"
                                                    value="{{ $topMover->heading }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="position" class="col-form-label">Position</label>
                                                <select name="position" id="position" class="form-control">
                                                    <option value="{{ $topMover->position }}">Current:
                                                        {{ $topMover->position }}</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $topMover->position = $i ?? '' }}">
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="company_id" class="col-form-label">Company</label>
                                                <select name="company_id" id="company_id" class="form-control">
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
                                                <label for="state_cost_page_id" class="col-form-label">State Cost Page</label>
                                                <select name="state_cost_page_id" id="state_cost_page_id" class="form-control">
                                                    <option value="{{ $topMover->stateCostPage->id }}">Current:
                                                        {{ $topMover->stateCostPage->title }}</option>
                                                    @foreach ($state_cost_pages as $stateCostPage)
                                                        <option value="{{ $stateCostPage->id }}">{{ $stateCostPage->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="point_one" class="col-form-label">Point One</label>
                                                <input type="text" name="point_one" id="point_one" class="form-control"
                                                    value="{{ $topMover->point_one }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="point_two" class="col-form-label">Point Two</label>
                                                <input type="text" name="point_two" id="point_two" class="form-control"
                                                    value="{{ $topMover->point_two }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="point_three" class="col-form-label">Point Three</label>
                                                <input type="text" name="point_three" id="point_three" class="form-control"
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
