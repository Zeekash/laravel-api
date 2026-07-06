@extends('backend.layouts.master')
@section('title','City Cost Of Living Edit')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection
@section('admin-content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">

                    <h4 class="page-title pull-left">City Cost Of Livings</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.cityCostOfLiving.index') }}">City Cost Of Livings</a></li>
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
                @include('backend.layouts.partials.messages')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Edit City Cost Of Livings</h4>
                        <div class="clearfix"></div>
                        <form action="{{ route('admin.cityCostOfLiving.update', $cityCostOfLiving->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Select City Page</label>
                                        <select name="city_page_id" class="form-control select2" required>
                                            <option value="" selected disabled>-- Select City Page --</option>
                                            @foreach ($city_pages as $city)
                                                <option value="{{ $city->id }}" {{ old('city_page_id', $cityCostOfLiving->city_page_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Average 1 BR rent</label>
                                        <input type="text" name="avg_1_br_rent" value="{{ old('avg_1_br_rent', $cityCostOfLiving->avg_1_br_rent) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Average 3 BR rent</label>
                                        <input type="text" name="avg_3_br_rent" value="{{ old('avg_3_br_rent', $cityCostOfLiving->avg_3_br_rent) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Average rent cost</label>
                                        <input type="text" name="avg_rent_cost" class="form-control"
                                            value="{{ old('avg_rent_cost', $cityCostOfLiving->avg_rent_cost) }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Average home cost</label>
                                        <input type="text" name="avg_home_cost" class="form-control"
                                            value="{{ old('avg_home_cost', $cityCostOfLiving->avg_home_cost) }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Average income (per capita)</label>
                                        <input type="text" name="avg_income" class="form-control"
                                            value="{{ old('avg_income', $cityCostOfLiving->avg_income) }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Cost of living (single person)</label>
                                        <input type="text" name="cost_of_living_single" class="form-control"
                                            value="{{ old('cost_of_living_single', $cityCostOfLiving->cost_of_living_single) }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Cost of living (family of 4)</label>
                                        <input type="text" name="cost_of_living_family" class="form-control"
                                            value="{{ old('cost_of_living_family', $cityCostOfLiving->cost_of_living_family) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Cost of living index</label>
                                        <input type="text" name="cost_of_living_index" value="{{ old('cost_of_living_index', $cityCostOfLiving->cost_of_living_index) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Unemployment rate</label>
                                        <input type="text" name="unemployment_rate" class="form-control"
                                            value="{{ old('unemployment_rate', $cityCostOfLiving->unemployment_rate) }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Sales tax</label>
                                        <input type="text" name="avg_sales_tax" class="form-control"
                                            value="{{ old('avg_sales_tax', $cityCostOfLiving->avg_sales_tax) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">State Income tax</label>
                                        <input type="text" name="state_income_tax" value="{{ old('state_income_tax', $cityCostOfLiving->state_income_tax) }}" class="form-control" required>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mr-2 submitButton">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection
