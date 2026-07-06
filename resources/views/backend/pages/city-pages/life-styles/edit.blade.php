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
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">

                    <h4 class="page-title pull-left">City Life Styles</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.cityLifeStyle.index') }}">City Life Styles</a></li>
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
                        <h4 class="header-title float-left">Edit City Life Styles</h4>                 
                        <div class="clearfix"></div>
                            <form action="{{ route('admin.cityLifeStyle.update', $cityLifeStyle->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Select City Page</label>
                                            <select name="city_page_id" class="form-control" required>
                                                <option value="" selected disabled>-- Select City Page --</option>
                                                @foreach ($city_pages as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_page_id', $cityLifeStyle->city_page_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Population</label>
                                            <input type="text" name="population" class="form-control"
                                                value="{{ old('population', $cityLifeStyle->population) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Crime Index</label>
                                            <input type="text" name="crime_index" class="form-control"
                                                value="{{ old('crime_index', $cityLifeStyle->crime_index) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Summer High (Average)</label>
                                            <input type="text" name="summer_high" class="form-control"
                                                value="{{ old('summer_high', $cityLifeStyle->summer_high) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Winter Low (Average)</label>
                                            <input type="text" name="winter_low" class="form-control"
                                                value="{{ old('winter_low', $cityLifeStyle->winter_low) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Annual Rainfall</label>
                                            <input type="text" name="annual_rainfall" class="form-control"
                                                value="{{ old('annual_rainfall', $cityLifeStyle->annual_rainfall) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Annual Snowfall</label>
                                            <input type="text" name="annual_snowfall" class="form-control"
                                                value="{{ old('annual_snowfall', $cityLifeStyle->annual_snowfall) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Political Leaning</label>
                                        <input type="text" name="political_leaning" value="{{ old('political_leaning', $cityLifeStyle->political_leaning) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Transportation Score</label>
                                        <input type="text" name="transportation_score" value="{{ old('transportation_score', $cityLifeStyle->transportation_score) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Walkability Score</label>
                                        <input type="text" name="walkability_score" value="{{ old('walkability_score', $cityLifeStyle->walkability_score) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Bike Friendliness Score</label>
                                        <input type="text" name="bike_friendliness_score" value="{{ old('bike_friendliness_score', $cityLifeStyle->bike_friendliness_score) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Safety Index</label>
                                        <input type="text" name="safety_index" value="{{ old('safety_index', $cityLifeStyle->safety_index) }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Air Quality</label>
                                        <input type="text" name="air_quality" value="{{ old('air_quality', $cityLifeStyle->annual_snowfall) }}" class="form-control" required>
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
