@extends('backend.layouts.master')

@section('title')
    Company Info - Create
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
                    <h4 class="page-title pull-left">Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.company-info.index') }}">Live Call</a></li>
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
                        <h4 class="header-title">Create Live Call</h4>
                        @include('backend.layouts.partials.messages')
                        <form action="{{ route('admin.live-calls.store') }}" method="POST">
                            @csrf

                            <!-- Select Company -->
                            <div class="form-group">
                                <label for="company_id">Select Company:</label>
                                <select name="company_id" id="company_id" class="form-control companySelect" onchange="updateLimit()">
                                    <option value="">-- Select Company --</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Remaining Weekly Calls -->
                            <div class="alert alert-info mt-3" id="weekly-limit-info" style="display: none;">
                                <strong>Remaining Weekly Limit: </strong> <span id="weekly-limit">0</span> calls left this
                                week.
                            </div>

                            <!-- Agent Name -->
                            <div class="form-group mt-3">
                                <label for="agent_name">Agent Name:</label>
                                <input type="text" name="agent_name" id="agent_name" class="form-control"
                                    value="{{ old('agent_name') }}" required>
                            </div>

                            <!-- User Name -->
                            <div class="form-group mt-3">
                                <label for="user_name">User Name:</label>
                                <input type="text" name="user_name" id="user_name" class="form-control"
                                    value="{{ old('user_name') }}" required>
                            </div>

                            <!-- User Email -->
                            <div class="form-group mt-3">
                                <label for="user_email">User Email:</label>
                                <input type="email" name="user_email" id="user_email" class="form-control"
                                    value="{{ old('user_email') }}" required>
                            </div>

                            <!-- User Phone -->
                            <div class="form-group mt-3">
                                <label for="user_phone">User Phone:</label>
                                <input type="text" name="user_phone" id="user_phone" class="form-control"
                                    value="{{ old('user_phone') }}" required>
                            </div>

                            <!-- Call Date & Time -->
                            <div class="form-group mt-3">
                                <label for="call_date_time">Call Date & Time:</label>
                                <input type="datetime-local" name="call_date_time" id="call_date_time" class="form-control"
                                    value="{{ old('call_date_time') }}" required>
                            </div>

                            <!-- Call Duration -->
                            <div class="form-group mt-3">
                                <label for="call_duration">Call Duration (in minutes):</label>
                                <input type="number" name="call_duration" id="call_duration" class="form-control"
                                    value="{{ old('call_duration') }}" required>
                            </div>

                            <!-- Status -->
                            <div class="form-group mt-3">
                                <label for="status">Call Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="confirmed">Confimred</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Save Live Call</button>
                        </form>
                    </div>

                    <!-- JavaScript to dynamically show the remaining call limit -->
                    <script>
                        var weeklyLimits = @json($weeklyLimitInfo);

                        function updateLimit() {
                            var companyId = document.getElementById('company_id').value;
                            var limitText = document.getElementById('weekly-limit-info');
                            var limitSpan = document.getElementById('weekly-limit');

                            if (companyId && weeklyLimits[companyId] !== undefined) {
                                limitSpan.textContent = weeklyLimits[companyId];
                                limitText.style.display = 'block';
                            } else {
                                limitText.style.display = 'none';
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
    </div>
@endsection
<script>
    $('#hide-msg').show();
    setTimeout(function() {
        $('#hide-msg').hide();
    }, 5000);
</script>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.companySelect').select2({
                placeholder: 'Search for a company',
                allowClear: true, // Option to clear the selected value
                // Additional options and customization can be added here
            });
        });
    </script>
@endsection
