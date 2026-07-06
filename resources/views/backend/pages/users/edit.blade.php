@extends('backend.layouts.master')

@section('title')
    User Edit - Admin Panel
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
                    <h4 class="page-title pull-left">User Review</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.users.index') }}">All Users Review</a></li>
                        <li><span>Edit User Review - {{ $user->name }}</span></li>
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
                        <h4 class="header-title">Edit User Review - {{ $user->name }}</h4>


                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">User Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="overall_rating">User Overall Rating</label>
                                    <select name="overall_rating" id="overall_rating"
                                        class="form-control @error('overall_rating') is-invalid @enderror"
                                        value="{{ $user->overall_rating }}">
                                        <option selected value="{{ $user->overall_rating }}">{{ $user->overall_rating }}
                                        </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    @error('overall_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="review_subject">User Review Subject</label>
                                    <input type="text" class="form-control @error('review_subject') is-invalid @enderror"
                                        id="review_subject" name="review_subject" placeholder="Enter Review Subject"
                                        value="{{ $user->review_subject }}">
                                    @error('review_subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="your_review">User Review</label>
                                    <input type="text" class="form-control @error('your_review') is-invalid @enderror"
                                        id="your_review" name="your_review" placeholder="Enter Review"
                                        value="{{ $user->your_review }}">
                                    @error('your_review')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="service_cost">Service Cost</label>
                                    <input type="number" class="form-control @error('service_cost') is-invalid @enderror"
                                        id="service_cost" name="service_cost" placeholder="Enter Service Cost"
                                        value="{{ $user->service_cost }}">
                                    @error('service_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="currency">Currency</label>
                                    <select name="currency" id="currency"
                                        class="form-control @error('currency') is-invalid @enderror"
                                        value="{{ $user->currency }}">
                                        <option selected value="{{ $user->currency }}">{{ $user->currency }}</option>
                                        <option value="USD">AED</option>
                                        <option value="AUD">AUD</option>
                                        <option value="USD">USD</option>

                                    </select>
                                    @error('currency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Move Size</label>
                                    <select name="move_size" id="move_size"
                                        class="form-control @error('move_size') is-invalid @enderror"
                                        value="{{ $user->move_size }}">
                                        <option selected value="{{ $user->move_size }}">{{ $user->move_size }}</option>
                                        <option value="4 Bedroom Home">4 Bedroom Home</option>
                                        <option value="3 Bedroom Home">3 Bedroom Home</option>
                                        <option value="2 Bedroom Home">2 Bedroom Home</option>
                                        <option value="1 Bedroom Home">1 Bedroom Home</option>
                                        <option value="Studio">Studio</option>
                                        <option value="Office Move">Office Move</option>
                                        <option value="Commercial Move">Commercial Move</option>
                                    </select>
                                    @error('move_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Email Verification</label>
                                    <select class="form-control" name="user_email_verified" id="user_email_verified">

                                        <option value="1" {{ $user->user_email_verified == 1 ? 'selected' : '' }}>
                                            Verified</option>

                                        <option value="0" {{ $user->user_email_verified == 0 ? 'selected' : '' }}>Not
                                            Verified</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Date</label>
                                    <input type="date" name="created_at"
                                        value="{{ Carbon\Carbon::parse($user->created_at)->format('Y-m-d') ?? '' }}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Pickup State</label>
                                    <select id="pick_up_state_id" name="pick_up_state_id" aria-label="state field"
                                        class="pickstate form-control bg-transparent form-select">
                                        <option value="">Select Pickup State</option>
                                        @foreach ($pick_state as $pickState)
                                            <option value="{{ $pickState->id }}"
                                                {{ $pickState->id == $user->pickState->id ? 'selected' : '' }}>
                                                {{ $pickState->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Pickup City</label>
                                    <select id="pick_up_city_id" name="pick_up_city_id"
                                        class="pickcity form-control bg-transparent form-select" aria-label="city field">
                                        @foreach ($pick_city as $pickUpCity)
                                            <option value="{{ $pickUpCity->id }}"
                                                {{ $user->pickCity && $pickUpCity->id == $user->pickCity->id ? 'selected' : '' }}>
                                                {{ $pickUpCity->name }} , {{ $pickUpCity->zip_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Delivery State</label>
                                    <select name="delivery_state_id" class="deliverystate form-select form-control"
                                        id="delivery_state_id" aria-label="delivery state field">
                                        <option value="">Select Delivery State</option>
                                        @foreach ($delivery_state as $deliveryState)
                                            <option value="{{ $deliveryState->id }}"
                                                {{ $deliveryState->id == $user->deliveryState->id ? 'selected' : '' }}>
                                                {{ $deliveryState->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="move_size">Delivery City</label>
                                    <select name="delivery_city_id" class="deliverycity form-select form-control"
                                        id="delivery_city_id" aria-label="delivery city field">
                                        @foreach ($delivery_city as $deliveryCity)
                                            <option value="{{ $deliveryCity->id }}"
                                                {{ $user->deliveryCity && $deliveryCity->id == $user->deliveryCity->id ? 'selected' : '' }}>
                                                {{ $deliveryCity->name }} , {{ $deliveryCity->zip_code }}
                                            </option>
                                        @endforeach
                                    </select>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#pick_up_state_id').on('change', function () {
                var idState = this.value;
                $("#pick_up_city_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#pick_up_city_id').html('<option value="">Select Pick-Up City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#pick_up_city_id").append('<option value="' + value
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
    <script type="application/javascript">
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#delivery_state_id').on('change', function () {
                var idState = this.value;
                $("#delivery_city_id").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#delivery_city_id').html('<option value="">Select Delivery City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#delivery_city_id").append('<option value="' + value
                                .id + '">' + value.name + " , " + value.zip_code +'</option>');
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
