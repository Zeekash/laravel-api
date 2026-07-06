@extends('backend.layouts.master')
@section('title')
    City Living Expense - Create
@endsection
@section('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection

@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.city-living-expense.index') }}">City Living Expense</a></li>
                        <li><span>Create</span></li>
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
                        <h4 class="header-title">Create City Living Expense</h4>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.city-living-expense.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="col-form-label">Select City Page</label>
                                    <select name="city_page_id" class="form-control select2" id="postSelect" required>
                                        <option value="" selected disabled>-- Select City Page --</option>
                                        @foreach ($city_pages as $city)
                                            <option value="{{ $city->id }}"
                                                {{ old('city_page_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12 mt-1">
                                    <label>Basic Utilities</label>
                                    <input type="text" name="basic_utilities"
                                        class="form-control @error('basic_utilities') is-invalid @enderror"
                                        placeholder="Enter Basic Utilities">
                                    @error('basic_utilities')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Cell Phone Plan</label>
                                    <input type="text" name="cell_phone_plan"
                                        class="form-control @error('cell_phone_plan') is-invalid @enderror"
                                        placeholder="Enter Cell Phone Plan">
                                    @error('cell_phone_plan')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Dozen Eggs</label>
                                    <input type="text" name="dozen_eggs"
                                        class="form-control @error('dozen_eggs') is-invalid @enderror"
                                        placeholder="Enter Dozen Eggs Price">
                                    @error('dozen_eggs')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Loaf Of Bread</label>
                                    <input type="text" name="loaf_of_bread"
                                        class="form-control @error('loaf_of_bread') is-invalid @enderror"
                                        placeholder="Enter Loaf Of Bread Price">
                                    @error('loaf_of_bread')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Fast Food/Casual Eatery (One Meal)</label>
                                    <input type="text" name="fast_food"
                                        class="form-control @error('fast_food') is-invalid @enderror"
                                        placeholder="Enter Fast Food Price">
                                    @error('fast_food')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Dinner For 2 (Mid-Range Restaurant)</label>
                                    <input type="text" name="dinner"
                                        class="form-control @error('dinner') is-invalid @enderror"
                                        placeholder="Enter Dinner Price">
                                    @error('dinner')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label>Gym Membership</label>
                                    <input type="text" name="gym_membership"
                                        class="form-control @error('gym_membership') is-invalid @enderror"
                                        placeholder="Enter Gym Membership Cost">
                                    @error('gym_membership')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>
    </div>
@endsection
