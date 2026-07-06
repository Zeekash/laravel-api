@extends('backend.layouts.master')

@section('title')
    User Edit - Admin Panel
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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
                    <h4 class="page-title pull-left">Create Compnay</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <!-- <li><a href="{{ route('admin.users.index') }}">All Users</a></li> -->
                        <li><span>Edit Company </span></li>
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
                        <h4 class="header-title">Edit Company </h4>
                        <!-- @include('backend.layouts.partials.messages') -->

                        <form action="{{ route('admin.companies.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control " id="meta_title" name="meta_title"
                                        placeholder="Enter Meta Title" value="{{ $company->meta_title }}">

                                </div>
                                <div class="form-group col-md-8 col-sm-12">
                                    <label for="meta_description">Meta Description</label>
                                    <input type="text" class="form-control" id="meta_description" name="meta_description"
                                        placeholder="Enter meta_description" value="{{ $company->meta_description }}">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="meta_keywords"> Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        placeholder="Enter Meta Keywords" value="{{ $company->meta_keywords }}">
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" placeholder="Enter Name" value="{{ $company->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Enter Email" value="{{ $company->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="company_name"> Company Name</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        id="company_name" name="company_name" placeholder="Enter Company Name"
                                        value="{{ $company->company_name }}">
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="Slug"> Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" name="slug" placeholder="Enter Slug"
                                        value="{{ $company->slug }}">
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="company_email"> Company Email</label>
                                    <input type="email" class="form-control @error('company_email') is-invalid @enderror"
                                        id="company_email" name="company_email" placeholder="Enter Company Email"
                                        value="{{ $company->company_email }}">
                                    @error('company_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_email">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                        name="slug" placeholder="Enter Company Email" value="{{$company->slug }}">
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                <!-- <div class="form-group col-md-6 col-sm-12">
                                                <label for="password"> Password</label>
                                                <input type="password" class="form-control @error('name') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
                                            </div> -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="company_country">Company Country</label>
                                    <select id="company_country" name="country_id"
                                        class="form-control @error('country_id') is-invalid @enderror"
                                        >
                                        <option value="{{ $company->country->id ?? 1  }}"> {{ $company->country->name ?? 'null' }}
                                        </option>
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

                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="comapny_state">Company State</label>
                                    <select id="comapny_state" name="state_id"
                                        class="form-control @error('state_id') is-invalid @enderror">
                                        <option value="{{ $company->state->id }}">{{ $company->state->name }}</option>
                                    </select>
                                    @error('state_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="comapny_city">Company City</label>
                                    <select id="comapny_city" name="city_id"
                                        class="form-control @error('city_id') is-invalid @enderror">
                                        <option value="{{ $company->city->id ?? '' }}">{{ $company->city->name ?? '' }}
                                        </option>
                                    </select>
                                    @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="phone_no"> Company Phone No</label>
                                    <input type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                        id="phone_no" name="phone_no" placeholder="Enter Company Phone"
                                        value="{{ $company->phone_no }}">
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="additional_phone_no"> Company Additional Phone No</label>
                                    <input type="text"
                                        class="form-control @error('additional_phone_no') is-invalid @enderror"
                                        id="additional_phone_no" name="additional_phone_no"
                                        placeholder="Enter Company Additional Phone No"
                                        value="{{ $company->additional_phone_no }}">
                                    @error('additional_phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_website">Company Email Domain</label>
                                    <input type="text"
                                        class="form-control @error('company_email_domain') is-invalid @enderror"
                                        id="company_email_domain" name="company_email_domain"
                                        placeholder="Enter Company Email Domain"
                                        value="{{ $company->company_email_domain }}">
                                    @error('company_email_domain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_website"> Company Website</label>
                                    <input type="url" class="form-control @error('company_website') is-invalid @enderror"
                                        id="company_website" name="company_website" placeholder="Enter Company Website"
                                        value="{{ $company->company_website }}">
                                    @error('company_website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="street">Company Street</label>
                                    <input type="text" class="form-control @error('street') is-invalid @enderror"
                                        id="street" name="street" placeholder="Enter Company Address"
                                        value="{{ $company->street }}">
                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control @error('company_address') is-invalid @enderror"
                                        id="company_address" name="company_address" placeholder="Enter Company Address"
                                        value="{{ $company->company_address }}">
                                    @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="company_reg_no"> Company Registeration No</label>
                                    <input type="text" class="form-control @error('company_reg_no') is-invalid @enderror"
                                        id="company_reg_no" name="company_reg_no"
                                        placeholder="Enter Company Registeration No" value="{{ $company->company_reg_no }}">
                                    @error('company_reg_no')
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
                                    <label for="us_dot_no">D.O.T No.</label>
                                    <input type="text" class="form-control @error('us_dot_no') is-invalid @enderror"
                                        id="us_dot_no" name="us_dot_no" placeholder="Enter D.O.T No."
                                        value="{{ $company->us_dot_no }}">
                                    @error('us_dot_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="icc_mc_license_no">Icc Mc License No.</label>
                                    <input type="text" class="form-control @error('icc_mc_license_no') is-invalid @enderror"
                                        id="icc_mc_license_no" name="icc_mc_license_no" placeholder="Enter IIC MC NO."
                                        value="{{ $company->icc_mc_license_no }}">
                                    @error('icc_mc_license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="local_license_no">Local License No</label>
                                    <input type="text" class="form-control @error('local_license_no') is-invalid @enderror"
                                        id="local_license_no" name="local_license_no" placeholder="Local Lincense No."
                                        value="{{ $company->local_license_no }}">
                                    @error('local_license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="about_company">Company Image <span class="text-danger">(Only png, webp, svg allowed)</span></label>
                                    <input type="file" class="form-control " id="image" name="image" accept=".png,.webp,.svg">
                                </div>
                                
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Email Verification</label>
                                    <select class="form-control" name="is_email_verified" id="is_email_verified">
                                        <option value="0" {{ $company->is_email_verified == 0 ? 'selected' : '' }}>
                                            Not Verified</option>
                                        <option value="1" {{ $company->is_email_verified == 1 ? 'selected' : '' }}>
                                            Verified</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Company Claim</label>
                                    <select class="form-control" name="is_claimed" id="is_claimed">
                                        <option value="0" {{ $company->is_claimed == 0 ? 'selected' : '' }}>Not
                                            Claimed</option>
                                        <option value="1" {{ $company->is_claimed == 1 ? 'selected' : '' }}>Claimed
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Company Feature</label>
                                    <select class="form-control" name="is_featured" id="is_featured">
                                        <option value="0" {{ $company->is_featured == 0 ? 'selected' : '' }}>Not
                                            Featured</option>
                                        <option value="1" {{ $company->is_featured == 1 ? 'selected' : '' }}>Featured
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Call per week</label>
                                    <input type="number" name="call_per_week" value="{{ $company->call_per_week }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Calls per month</label>
                                    <input type="number" name="call_per_month" value="{{ $company->call_per_month }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="about_company">Call Activation</label>
                                    <select class="form-control" name="is_call_active" id="is_call_active">
                                        <option value="0" {{ $company->is_call_active == 0 ? 'selected' : '' }}>Not Active
                                        </option>
                                        <option value="1" {{ $company->is_call_active == 1 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12">
                             <label for="example-text-input" class="col-form-label">Service Type</label><br>

                                        <input type="checkbox" id="residential_moving" name="residential_moving" value="1" 
                                        {{ $company->residential_moving ? 'checked' : '' }}>
                                    <span>Residential Moving</span>

                                    <input type="checkbox" id="commercial_office_moving" name="commercial_office_moving" value="1" 
                                        {{ $company->commercial_office_moving ? 'checked' : '' }}>
                                    <span>Commercial/Office Moving</span>

                                    <input type="checkbox" id="packing_unpacking_services" name="packing_unpacking_services" value="1" 
                                        {{ $company->packing_unpacking_services ? 'checked' : '' }}>
                                    <span>Packing & Unpacking Services</span>

                                    <input type="checkbox" id="storage_services" name="storage_services" value="1" 
                                        {{ $company->storage_services ? 'checked' : '' }}>
                                    <span>Storage Services</span>

                                    <input type="checkbox" id="international_moving" name="international_moving" value="1" 
                                        {{ $company->international_moving ? 'checked' : '' }}>
                                    <span>International Moving</span>

                                    <input type="checkbox" id="specialty_moving" name="specialty_moving" value="1" 
                                        {{ $company->specialty_moving ? 'checked' : '' }}>
                                    <span>Specialty Moving</span>

                                    <input type="checkbox" id="labor_only_moving" name="labor_only_moving" value="1" 
                                        {{ $company->labor_only_moving ? 'checked' : '' }}>
                                    <span>Labor Only Moving</span>

                                    <input type="checkbox" id="truck_rental" name="truck_rental" value="1" 
                                        {{ $company->truck_rental ? 'checked' : '' }}>
                                    <span>Truck Rental</span>

                                    <input type="checkbox" id="containers_moving" name="containers_moving" value="1" 
                                        {{ $company->containers_moving ? 'checked' : '' }}>
                                    <span>Containers Moving</span>
                                </div>


                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="about_company">About Company</label>
                                    <textarea type="text" class="form-control " rows="8px" id="about_company"
                                        name="about_company" placeholder="Enter About Company"
                                        value="{{ $company->about_company }}">{{ $company->about_company }}</textarea>

                                </div>
                                <div class="form-group col-md-12 col-sm-12 py-5">
                                    <label for="about_company">Company Info</label>

                                    <div id="editor">{!! $company->company_info !!}</div>
                                    <input type="hidden" name="company_info" id="company_info"
                                        value="{{ old('company_info') }}">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                [{
                    'size': ['small', false, 'large', 'huge']
                }], // custom dropdown
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['clean'], // remove formatting button
            ];

            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });

            quill.on('text-change', function () {
                var content = quill.root.innerHTML;
                document.getElementById('company_info').value = content;
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#company_country').on('change', function () {
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
                    success: function (result) {
                        $('#comapny_state').html(
                            '<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
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
@endsection