@extends('backend.layouts.master')

@section('title')
    Company Create - Admin Panel
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
    <!-- page title area st   art -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Create Company</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <!-- <li><a href="{{ route('admin.users.index') }}">All Users</a></li> -->
                        <li><span>Create Company</span></li>
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
                        <h4 class="header-title">Create New Company</h4>
                        <!-- @include('backend.layouts.partials.messages') -->

                        <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name"> <strong>Name</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" id="name" name="name" placeholder="Enter Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" id="email" name="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_name">Company Name</label>
                                    <input type="company_name"
                                        class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                                        value="{{ old('company_name') }}" name="company_name"
                                        placeholder="Enter Company Name">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_email">Compnay Email</label>
                                    <input type="company_email"
                                        class="form-control @error('company_email') is-invalid @enderror" id="company_email"
                                        value="{{ old('company_email') }}" name="company_email"
                                        placeholder="Enter Company Email">
                                    @error('company_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Passowrd</label>
                                    <div class="input-group mb-3 p-0 form-control">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror border-0"
                                            id="password" placeholder="Enter Password" aria-label="password"
                                            aria-describedby="basic-addon1" />
                                        <span class="input-group-text bg-transparent border-0"
                                            onclick="password_show_hide();">
                                            <i class="fa fa-eye" id="show_eye"></i>
                                            <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_country">Company Country</label>
                                    <select id="company_country" name="country_id"
                                        class="form-control @error('country_id') is-invalid @enderror">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}">
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="comapny_state">Company State</label>
                                    <select id="comapny_state" name="state_id"
                                        class="select2 form-control @error('state_id') is-invalid @enderror">
                                    </select>
                                    @error('state_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="comapny_city">Company City</label>
                                    <select id="comapny_city" name="city_id"
                                        class="select2 form-control @error('city_id') is-invalid @enderror">
                                    </select>
                                    @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="street">Company Street</label>
                                    <input type="text"
                                        class="form-control @error('street') is-invalid @enderror"
                                        value="{{ old('street') }}" id="street" name="street"
                                        placeholder="Enter Company Street">
                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_address">Company Address</label>
                                    <input type="text"
                                        class="form-control @error('company_address') is-invalid @enderror"
                                        value="{{ old('company_address') }}" id="company_address" name="company_address"
                                        placeholder="Enter Company Address">
                                    @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                     <!-- Trucks -->
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="trucks">Number of Trucks</label>
                                    <input type="text" class="form-control @error('trucks') is-invalid @enderror"
                                        id="trucks" name="trucks" placeholder="Enter number of trucks"
                                        value="{{ old('trucks', $company->trucks ?? '') }}">
                                    @error('trucks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Founding Year -->
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="founding_year">Founding Year</label>
                                    <input type="text" class="form-control @error('founding_year') is-invalid @enderror"
                                        id="founding_year" name="founding_year" placeholder="Enter founding year"
                                        value="{{ old('founding_year', $company->founding_year ?? '') }}">
                                    @error('founding_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="phone_no">Company Phone No</label>
                                    <input type="phone_no" class="form-control @error('phone_no') is-invalid @enderror"
                                        value="{{ old('phone_no') }}" id="phone_no" name="phone_no"
                                        placeholder="Enter Phone No">
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--<div class="form-group col-md-6 col-sm-12">-->
                                <!--    <label for="additional_phone_no">Additional Phone No</label>-->
                                <!--    <input type="additional_phone_no" class="form-control @error('additional_phone_no') is-invalid @enderror" id="additional_phone_no" name="additional_phone_no" placeholder="Enter Additional Phone No">-->
                                <!--    @error('additional_phone_no')-->
                                    <!--        <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $message }}</strong>-->
                                    <!--        </span>-->
                                    <!--@enderror-->
                                <!--</div>-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_website">Company Website</label>
                                    <input type="url"
                                        class="form-control @error('company_website') is-invalid @enderror"
                                        value="{{ old('company_website') }}" id="company_website" name="company_website"
                                        placeholder="Enter Company Website">
                                    @error('company_website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="us_dot_no">D.O.T No.</label>
                                    <input type="text" class="form-control @error('us_dot_no') is-invalid @enderror"
                                        value="{{ old('us_dot_no') }}" id="us_dot_no" name="us_dot_no"
                                        placeholder="Enter D.O.T No.">
                                    @error('us_dot_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="icc_mc_license_no">Icc Mc License No.</label>
                                    <input type="text"
                                        class="form-control @error('icc_mc_license_no') is-invalid @enderror"
                                        value="{{ old('icc_mc_license_no') }}" id="icc_mc_license_no"
                                        name="icc_mc_license_no" placeholder="Enter IIC MC NO.">
                                    @error('icc_mc_license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--<div class="form-group col-md-6 col-sm-12">-->
                                    <!--    <label for="company_reg_no">Company Registeration No</label>-->
                                    <!--    <input type="company_reg_no" class="form-control @error('company_reg_no') is-invalid @enderror" id="company_reg_no" name="company_reg_no" placeholder="Enter Company Reg No">-->
                                    <!--     @error('company_reg_no')-->
                                    <!--        <span class="invalid-feedback" role="alert">-->
                                    <!--            <strong>{{ $message }}</strong>-->
                                    <!--        </span>-->
                                    <!--
                                @enderror-->
                                <!--</div>-->

                                <div class="col-12">
                                    <label for="example-text-input" class="col-form-label">Service Type</label><br>

                                    <input type="checkbox" id="residential_moving" name="residential_moving" value="1" 
                                        {{ old('residential_moving', $company->residential_moving ?? 0) ? 'checked' : '' }}>
                                    <span>Residential Moving</span>

                                    <input type="checkbox" id="commercial_office_moving" name="commercial_office_moving" value="1" 
                                        {{ old('commercial_office_moving', $company->commercial_office_moving ?? 0) ? 'checked' : '' }}>
                                    <span>Commercial/Office Moving</span>

                                    <input type="checkbox" id="packing_unpacking_services" name="packing_unpacking_services" value="1" 
                                        {{ old('packing_unpacking_services', $company->packing_unpacking_services ?? 0) ? 'checked' : '' }}>
                                    <span>Packing & Unpacking Services</span>

                                    <input type="checkbox" id="storage_services" name="storage_services" value="1" 
                                        {{ old('storage_services', $company->storage_services ?? 0) ? 'checked' : '' }}>
                                    <span>Storage Services</span>

                                    <input type="checkbox" id="international_moving" name="international_moving" value="1" 
                                        {{ old('international_moving', $company->international_moving ?? 0) ? 'checked' : '' }}>
                                    <span>International Moving</span>

                                    <input type="checkbox" id="specialty_moving" name="specialty_moving" value="1" 
                                        {{ old('specialty_moving', $company->specialty_moving ?? 0) ? 'checked' : '' }}>
                                    <span>Specialty Moving</span>

                                    <input type="checkbox" id="labor_only_moving" name="labor_only_moving" value="1" 
                                        {{ old('labor_only_moving', $company->labor_only_moving ?? 0) ? 'checked' : '' }}>
                                    <span>Labor Only Moving</span>

                                    <input type="checkbox" id="truck_rental" name="truck_rental" value="1" 
                                        {{ old('truck_rental', $company->truck_rental ?? 0) ? 'checked' : '' }}>
                                    <span>Truck Rental</span>

                                    <input type="checkbox" id="containers_moving" name="containers_moving" value="1" 
                                        {{ old('containers_moving', $company->containers_moving ?? 0) ? 'checked' : '' }}>
                                    <span>Containers Moving</span>
                                </div>

                                <div class="form-group col-md-6 col-sm-12 mt-3">
                                    <label for="image">Company Image <span class="text-danger">(Only png, webp, svg allowed)</span></label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept=".png,.webp,.svg">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="about_company">About Company</label>
                                    <textarea class="form-control" rows="8" id="about_company" name="about_company" placeholder="Enter About Company">{{ old('about_company', $company->about_company ?? '') }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Company</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

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
    <script>
        $(document).ready(function() {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#company_country').on('change', function() {
                var idCountry = this.value;
                $("#comapny_state").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#comapny_state').html(
                            '<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $("#comapny_state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/


        });
    </script>
    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#comapny_state').on('change', function () {
                var idState = this.value;
                $("#comapny_city").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#comapny_city').html('<option value="">-- Select City --</option>');
                        $.each(result.cities, function (key, value) {
                            $("#comapny_city").append('<option value="' + value
                                .id + '">' + value.name + " , " + value.zip_code + '</option>');
                        });
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            City Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/


        });
    </script>
    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
    <script>
        $('#hide-msg').show();
        setTimeout(function() {
            $('#hide-msg').hide();
        }, 5000);
    </script>
@endsection
