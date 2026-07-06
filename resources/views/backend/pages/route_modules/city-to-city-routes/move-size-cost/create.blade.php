@extends('backend.layouts.master')
@section('title', 'City To City Route Move Size Cost Create')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection
@section('admin-content')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <a href="{{ route('admin.city-to-city-routes.move-size-cost.index') }}"
                            class="btn btn-primary float-right "> Back</a>
                        <h4 class="header-title">City To City Route Move Size Cost - Create</h4>
                        @include('flash-message')
                        <form action="{{ route('admin.city-to-city-routes.move-size-cost.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="card-head">
                                        <h2>City To City Route Move Size Cost</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">City To City
                                                    Route</label>
                                                <Select class="form-control select2" name="city_to_city_route_id">
                                                    <option value="" selected disabled>--- Select City to City Route ---</option>
                                                    @foreach ($city_to_city_routes as $cityToCityRoute)
                                                        <option value="{{ $cityToCityRoute->id }}">
                                                            {{ $cityToCityRoute->cityFrom->name }}, {{ $cityToCityRoute->cityFrom->state->abv }} to {{ $cityToCityRoute->cityTo->name }}, {{ $cityToCityRoute->cityTo->state->abv }}</option>
                                                        </option>
                                                    @endforeach
                                                </Select>
                                            </div>
                                        </div>

                                    </div>
                                    <h2>Studio / 1 bedroom</h2>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Company
                                                    Studio/1 Bedroom</label>
                                                <input type="text" name="moving_company_studio_bedroom"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Container
                                                    Studio/1 Bedroom</label>
                                                <input type="text" name="moving_container_studio_bedroom"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Rent Truck Studio/1
                                                    Bedroom</label>
                                                <input type="text" name="rental_truck_studio_bedroom"
                                                    class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <h2>2-3 bedrooms</h2>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Company 2-3
                                                    bedrooms</label>
                                                <input type="text" name="moving_company_2_3_bedroom" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Container 2-3
                                                    bedrooms</label>
                                                <input type="text" name="moving_container_2_3_bedroom" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Rent Truck 2-3
                                                    bedrooms</label>
                                                <input type="text" name="rental_truck_2_3_bedroom" class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <h2>4+ bedrooms</h2>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Company 4+
                                                    bedrooms</label>
                                                <input type="text" name="moving_company_4_bedroom" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Moving Container 4+
                                                    bedrooms</label>
                                                <input type="text" name="moving_container_4_bedroom" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Rent Truck 4+
                                                    bedrooms</label>
                                                <input type="text" name="rental_truck_4_bedroom" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Search for a City to City Route'
            , allowClear: true, // Option to clear the selected value
            // Additional options and customization can be added here
        });
    });

</script>
@endsection