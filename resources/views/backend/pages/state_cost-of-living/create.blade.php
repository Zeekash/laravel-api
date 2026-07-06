@extends('backend.layouts.master')

@section('title')
    State Cost Of Living - Admin Panel
@endsection

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
                    <h4 class="page-title pull-left">State Cost Of Living Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.products.index') }}">All State Cost Of Living</a></li>
                        <li><span>Create Product</span></li>
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
                        <h4 class="header-title">Create State Cost Of Living</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.stateCostOfLiving.store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="state_name">State Name</label>
                                    <Select class="form-control" name="state_id">
                                        <option value="">--- Select State ---</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"> {{ $state->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="average_rent_cost">Average Rent Cost </label>
                                    <input type="text" class="form-control " id="average_rent_cost"
                                        name="average_rent_cost" placeholder="Enter Average Rent Cost">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="average_home_cost">Average Home Cost </label>
                                    <input type="text" class="form-control " id="average_home_cost"
                                        name="average_home_cost" placeholder="Enter Average Home Cost">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="cost_of_living_index">Cost Of Living Index </label>
                                    <input type="text" class="form-control " id="cost_of_living_index"
                                        name="cost_of_living_index" placeholder="Enter Cost Of Living Index">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="average_income_per_capita">Average Income (per capita)</label>
                                    <input type="text" class="form-control " id="average_income_per_capita"
                                        name="average_income_per_capita" placeholder="Enter Average Income">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="cost_of_living_single">Cost of Living (Single)</label>
                                    <input type="text" class="form-control" id="cost_of_living_single"
                                        name="cost_of_living_single" placeholder="Enter Cost of Living">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="cost_of_living_family_of_four">Cost of Living (Family of Four)</label>
                                    <input type="text" class="form-control " id="cost_of_living_family_of_four"
                                        name="cost_of_living_family_of_four" placeholder="Enter Cost of Living ">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="unemployment_rate">Unemployment Rate </label>
                                    <input type="text" class="form-control " id="unemployment_rate"
                                        name="unemployment_rate" placeholder="Enter Unemployment Rate">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="sales_tax">Sales Tax </label>
                                    <input type="text" class="form-control " id="sales_tax" name="sales_tax" placeholder="Enter Sales Tax">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="state_income_tax">State Income Tax </label>
                                    <input type="text" class="form-control " id="state_income_tax"
                                        name="state_income_tax" placeholder="Enter State Income Tax">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
{{-- @endsection --}}
 <script>
    $('#hide-msg').show();
    setTimeout(function() {
        $('#hide-msg').hide();
    }, 5000);
</script>

{{-- @section('scripts') --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
{{-- @endsection --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function() {
            var content = quill.root.innerHTML;
            document.getElementById('description').value = content;
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#companySelect').select2({
            placeholder: 'Search for a company',
            allowClear: true, // Option to clear the selected value
            // Additional options and customization can be added here
        });
    });
</script>
@endsection 
