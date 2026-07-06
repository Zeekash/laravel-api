@extends('layouts.app')
@section('title', 'Register Your Moving Company')
@section('meta_description',
    'Get Listed your Moving Company in our huge database to get millions of people exposure.
    Register now your company account!.')
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    @php
        $opts = [
            'local_mover' => 'Local Moving',
            'long_distance_mover' => 'Long Distance Moving',
            'residential_moving' => 'Residential Moving',
            'commercial_office_moving' => 'Commercial / Office Moving',
            'packing_unpacking_services' => 'Packing and Unpacking Services',
            'storage_services' => 'Storage Services',
            'international_moving' => 'International Moving',
            'specialty_moving' => 'Specialty Moving (e.g., piano, antiques, etc.)',
            'labor_only_moving' => 'Labor-Only Moving',
            'truck_rental' => 'Truck Rental',
            'containers_moving' => 'Moving Containers',
        ];
    @endphp
    <style>
        .h2-div-login-form1 {
            box-shadow: none;
            background-color: ghostwhite;
            box-shadow: 0px 0px 5px #11112e;
        }

        h1.text-center.w-100.h1-div-login-form.rounded-0.p-4.m-0 {
            color: #116087 !important;
        }

        .rounded-0 {
            border-radius: 10px 10px 0px 0px !important;
        }

        #float-rating-div .clear-rating,
        .select2-search--dropdown {
            display: block !important;
        }

        .default-btn {
            background-color: #116087 !important;
        }

        span.input-group-text {
            background-color: #eef4f5;
            border-radius: 0 10px 10px 0;
            border: 1px solid #116087;
            border-left: 0;
        }

        span {
            color: #0f282b;
        }

        select#company_country {
            /* border: 1px solid #116087 !important; */
            border-radius: 10px;
            font-family: var(--para-family);
            padding: 0 10px;
            background-color: #11608712;
        }


        .no-right-radius {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .input-group.my-0.select_two {
            border: 0px solid #257186;
            border-radius: 10px;
            background-color: #f0f3f6;
        }

        input.border-end-0.no-right-radius.form-control:focus {
            border-radius: 10px 0 0 10px !important;
            border-right: 0 !important;
        }

        .select2-container {
            border: 0px solid #000
        }



        .register_form {

            border-radius: 20px;
            /* background-color: #11608712; */
            box-shadow: 1px 1px 20px #0000001c;
        }

        .heading_section {
            background-color: #116087;
            padding: 40px 20px;
            border-radius: 20px 20px 0 0;
        }

        h1.h1-div-login-form.text-center {
            color: #fff;
            font-size: 34px;
        }

        .heading_para {
            color: #fff;
            font-size: 16px;
        }

        .form-title {
            font-size: 18px;
            color: #116087;
            margin-top: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            padding-bottom: 8px;
            border-bottom: 1px solid #e0e0e0;
            font-family: var(--para-family);
        }

        input.form-control.di {
            background-color: #11608712;
            border: 0;
            border-radius: 5px !important;
        }

        input.form-control.di:focus {
            background-color: #11608712 !important;
            border: 0 !important;
            border-radius: 5px !important;
        }

        span.input-group-text.di {
            background-color: #f0f3f6;
            border: 0 !important;
        }

        .form-control.di {
            font-family: var(--para-family);
            color: black;
            background-color: #11608712;
            border: 0;
            border-radius: 5px !important;
        }
    </style>
    <section>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible alert-alt fade show">

                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}

                </div>
            @endif
            <div class="register_form col-lg-8 pb-5 my-5 m-auto">
                <div class="heading_section">
                    <div class="container">
                        <h1 class="h1-div-login-form text-center">COMPANY REGISTER</h1>
                        <div class="col-lg-8 mx-auto">
                            <p class="text-center heading_para">Join our business network and unlock premium services for
                                your
                                company</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <form action="{{ route('signup.submit') }}" method="POST" enctype="multipart/form-data"
                                class=" w-100 mx-auto">
                                @csrf
                                <div class="form-outline mb-2">
                                    <div class="row m-auto w-100">
                                        <div class="form-title mt-3 ps-0">
                                            Personal Information <span style="color:red"> *</span>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group  my-2">
                                                <input required type="text"
                                                    class="@error('name') is-invalid @enderror form-control di"
                                                    name="name" value="{{ old('name') }}" placeholder="Your Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>your name is required.</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 px-0 pe-md-2 mt-2">
                                            <div class="input-group my-2">
                                                <input required type="text" id="phone_no" maxlength="15"
                                                    class="form-control di @error('phone_no') is-invalid @enderror"
                                                    name="phone_no" value="{{ old('phone_no') }}"
                                                    placeholder="Phone No">
                                                @error('phone_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Phone no. format must be xxx-xxx-xxxx.</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                      
                                    </div>
                                </div>

                                <div class="form-outline mb-2">
                                    <div class="row m-auto w-100">
                                        <div class="form-title mt-3 ps-0">
                                            Company Details <span style="color:red"> *</span>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input required type="text"
                                                    class="@error('company_name') is-invalid @enderror form-control di"
                                                    name="company_name" value="{{ old('company_name') }}"
                                                    placeholder="Company Name">
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input required type="email"
                                                    class="form-control di @error('company_email') is-invalid @enderror"
                                                    name="company_email" value="{{ old('company_email') }}"
                                                    placeholder="Company Email">
                                                @error('company_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input required type="url"
                                                    class="form-control di  @error('company_website') is-invalid @enderror"
                                                    name="company_website" value="{{ old('company_website') }}"
                                                    placeholder="Company Website">
                                                @error('company_website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>The company website is required.</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                        <div class="col-12 col-sm-12 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input type="number" required
                                                    class="form-control di @error('us_dot_no') is-invalid @enderror"
                                                    name="us_dot_no" value="{{ old('us_dot_no') }}"
                                                    placeholder="D.O.T No.">
                                                @error('us_dot_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input type="number" required
                                                    class="form-control di @error('icc_mc_license_no') is-invalid @enderror"
                                                    name="icc_mc_license_no" value="{{ old('icc_mc_license_no') }}"
                                                    placeholder="MC No.">
                                                @error('icc_mc_license_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 p-0 pe-sm-3 mt-2">
                                            <div class="input-group my-2">
                                                <input type="text" required
                                                    class="form-control di @error('company_address') is-invalid @enderror"
                                                    name="company_address" value="{{ old('company_address') }}"
                                                    placeholder="Address">
                                                @error('company_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           
                       
                              
                                <div class="d-flex  align-items-center mt-4">
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-4">
                                    <button type="submit" class="default-btn"> Register Company</button>
                                </div>
                                <div class="col-12 text-center lost-your-password pt-3">
                                    <a href="/login" class="lost-your-password anchor-of-reg-form">Already
                                        have an
                                        account?
                                        Login here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

    <script type="application/javascript">
        $(document).ready(function () {
    
            // Initialize Select2 on state and city dropdowns
            $('.state').select2();
            $('.city').select2();
    
            // State Dropdown Change Event
            $('#state_id').on('change', function () {
                var idState = this.value;
                $("#city_id").html('');
    
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city_id').html('<option value="">-- Select City --</option>');
                        $.each(result.cities, function (key, value) {
                            // Pad ZIP code to 5 digits
                            let zip = value.zip_code.toString().padStart(5, '0');
                            $("#city_id").append(
                                '<option class="text-dark" value="' + value.id + '">' +
                                value.name + " , " + zip +
                                '</option>'
                            );
                        });
    
                        // Refresh the Select2 plugin for city dropdown
                        $('#city_id').trigger('change.select2');
                    }
                });
            });
    
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
    <script>
        $("#phone_no").mask("999-999-9999");
        $("#phone_no").on("focus click", function(e) {
            setTimeout(function() {
                e.target.setSelectionRange(0, 13);
            }, 1)
        });
    </script>

    <script>
        $("#additional_phone_no").mask("999-999-9999");
        $("#additional_phone_no").on("focus click", function(e) {
            setTimeout(function() {
                e.target.setSelectionRange(0, 13);
            }, 1)
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

        function password_confirmation_show_hide() {
            var x = document.getElementById("password_confirmation");
            var show_eye = document.getElementById("password_confirmation_show_eye");
            var hide_eye = document.getElementById("password_confirmation_hide_eye");
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
        $('#buttonFile').click(function() {
            $(".custom-file-input").trigger('click');
        })

        $(".custom-file-input").change(function() {
            $('#logoPath').text(this.value.replace(/C:\\fakepath\\/i, ''))
        })
    </script>
    <script>
        function CharacterCount1(object) {
            document.getElementById("charCountVal1").innerHTML = object.value.length + ' characters (min:600)';
        }
    </script>
@endsection
