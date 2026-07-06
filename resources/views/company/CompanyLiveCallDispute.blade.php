@extends('company.layouts.master')
@section('content')
    <style>
        .single-footer-widget .quick-links li {
            position: relative;
            padding: 10px 0px !important;
        }

        label {
            font-family: var(--para-family);
            margin-bottom: 5px;
        }

        .no-radius-end {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        span.input-group-text.border-start-0 {
            background-color: #313742 !important;
            border: 0 !important;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
       <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Live Calls Dispute</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        <li><span>Live Calls Dispute</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('company.layouts.partials.logout')
            </div>
        </div>
    </div>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
      
    <div class="main-content-inner mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('company.layouts.partials.messages')

                        <div class="row pb-2 my-3 m-auto">
                            <h3 class="p-0 dark-color">Dispute </h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-ml-12">
                                <div class="row">
                                    <!-- Textual inputs start -->
                                    <div class="col-12 mt-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">{{ $liveCall->user_name }} - Dispute
                                                </h4>


                                                <div class="row">
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Agent Name</label>
                                                            <span
                                                                class="form-control border-0 p-0">{{ $liveCall->agent_name }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">User Name</label>
                                                            <span
                                                                class="form-control border-0 p-0">{{ $liveCall->user_name }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">User Email</label>
                                                            <span
                                                                class="form-control border-0 p-0">{{ $liveCall->user_email }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">User Phone no.</label>
                                                            <span
                                                                class="form-control border-0 p-0">{{ $liveCall->user_phone }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Call Date & Time</label>
                                                            <span
                                                                class="form-control border-0 p-0">{{ \Carbon\Carbon::parse($liveCall->call_date_time)->format('Y-m-d | h:i A') }}</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Call Duration</label>
                                                            @php
                                                                $hours = floor(
                                                                    $liveCall->call_duration / 60,
                                                                );
                                                                $minutes = $liveCall->call_duration % 60;
                                                            @endphp
                                                            <span
                                                                class="form-control border-0 p-0">{{ $hours > 0 ? $hours . 'h ' : '' }}{{ $minutes }}m</span>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Status</label>
                                                            @if ($liveCall->status == 'confirmed')
                                                                <span
                                                                    style="color: green; font-weight:700">Confirmed</span>
                                                            @else
                                                                <span style="color: red;font-weight:700">Not
                                                                    Confirmed</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Textual inputs end -->
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('company.liveCall.dispute.store') }}" method="POST">

                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <input type="hidden" name="live_call_id" value="{{ $liveCall->id }}">
                            <div class="form-outline mb-2">
                                <div class="row m-auto w-100">
                                    <div class="col-12 col-sm-12 p-0 mt-2">
                                        <label for="">
                                            <strong style=" color: #112a2d;">Subject</strong></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control " id="email"
                                                name="subject" placeholder="Enter Subject" required>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mb-2">
                                <div class="row m-auto w-100">
                                    <div class="col-12 p-0 mt-2">
                                        <label for=""><strong
                                                style=" color: #112a2d;">Message</strong></label>
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" rows="5" name="message" id="message" placeholder="Enter Message"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            quill.on('text-change', function() {
                var content = quill.root.innerHTML;
                document.getElementById('companyInfo').value = content;
            });
        });
    </script>
@endsection
