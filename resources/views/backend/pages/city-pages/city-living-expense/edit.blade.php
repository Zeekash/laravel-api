@extends('backend.layouts.master')
@section('title')
    City Living Expense - Edit
@endsection
@section('styles')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.city-living-expense.index') }}">City Living Expense</a></li>
                        <li><span>Edit</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit City Living Expense</h4>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.city-living-expense.update', $city_living_expenses->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="col-form-label">Select City Page</label>
                                    <select name="city_page_id" id="cityPageSelect" class="form-control">
                                        <option value="">Select City Page</option>
                                        @foreach ($city_pages as $city_page)
                                            <option value="{{ $city_page->id }}"
                                                {{ $city_page->id == $city_living_expenses->city_page_id ? 'selected' : '' }}>
                                                {{ $city_page->name ?? 'City #' . $city_page->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mt-1">
                                    <label>Basic Utilities</label>
                                    <input type="text" name="basic_utilities"
                                        class="form-control @error('basic_utilities') is-invalid @enderror"
                                        value="{{ $city_living_expenses->basic_utilities }}">
                                    @error('basic_utilities')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Cell Phone Plan</label>
                                    <input type="text" name="cell_phone_plan"
                                        class="form-control @error('cell_phone_plan') is-invalid @enderror"
                                        value="{{ $city_living_expenses->cell_phone_plan }}">
                                    @error('cell_phone_plan')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Dozen Eggs</label>
                                    <input type="text" name="dozen_eggs"
                                        class="form-control @error('dozen_eggs') is-invalid @enderror"
                                        value="{{ $city_living_expenses->dozen_eggs }}">
                                    @error('dozen_eggs')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Loaf Of Bread</label>
                                    <input type="text" name="loaf_of_bread"
                                        class="form-control @error('loaf_of_bread') is-invalid @enderror"
                                        value="{{ $city_living_expenses->loaf_of_bread }}">
                                    @error('loaf_of_bread')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Fast Food/Casual Eatery (One Meal)</label>
                                    <input type="text" name="fast_food"
                                        class="form-control @error('fast_food') is-invalid @enderror"
                                        value="{{ $city_living_expenses->fast_food }}">
                                    @error('fast_food')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Dinner For 2 (Mid-Range Restaurant)</label>
                                    <input type="text" name="dinner"
                                        class="form-control @error('dinner') is-invalid @enderror"
                                        value="{{ $city_living_expenses->dinner }}">
                                    @error('dinner')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Gym Membership</label>
                                    <input type="text" name="gym_membership"
                                        class="form-control @error('gym_membership') is-invalid @enderror"
                                        value="{{ $city_living_expenses->gym_membership }}">
                                    @error('gym_membership')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>
    </div>
@endsection
