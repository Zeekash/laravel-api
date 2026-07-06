@extends('backend.layouts.master')

@section('title')
    State Life Style - Edit
@endsection

@section('styles')
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
                <h4 class="page-title pull-left">Edit State Life Style</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.state-life-style.index') }}">State Life Style Pages</a></li>
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
        <!-- form start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit State Life Style</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.state-life-style.update', $stateLifeStyle->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <!-- State Dropdown -->
                            <div class="col-md-12 mb-3">
                                <label for="state_id">State</label>
                                <select name="state_id" id="state_id" class="form-control" required>
                                    <option value="">--- Select State ---</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id', $stateLifeStyle->state_id) == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @php
                                $fields = [
                                    'population',
                                    'political_leaning',
                                    'summer_high',
                                    'winter_low',
                                    'annual_rain',
                                    'annual_snow',
                                    'crime_index',
                                    'transportation_score',
                                    'walkability_score',
                                    'bike_friendliness_score'
                                ];
                            @endphp

                            @foreach($fields as $field)
                                <div class="col-md-6 mb-3">
                                    <label>{{ ucwords(str_replace('_',' ',$field)) }}</label>
                                    <input type="text" name="{{ $field }}" class="form-control" value="{{ old($field, $stateLifeStyle->$field) }}">
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- form end -->
    </div>
</div>
@endsection
