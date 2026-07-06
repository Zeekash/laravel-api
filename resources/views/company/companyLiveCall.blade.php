@extends('company.layouts.master')

@section('title', 'Live Call Leads')

@section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Live Calls</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        <li><span>Live Calls</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('company.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @include('company.layouts.partials.messages')

                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
                            <div>
                                <h4 class="mb-1 dark-color">Live Calls For {{ $company->company_name }}</h4>
                                <p class="text-muted mb-0">Track transferable calls and dispute when required.</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Agent Name</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Transfer Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($live_calls as $liveCall)
                                        @php
                                            $hours = floor($liveCall->call_duration / 60);
                                            $minutes = $liveCall->call_duration % 60;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if (Auth::guard('company')->check() &&
                                                    optional($liveCall->liveCallDispute)->company_id == Auth::guard('company')->id())
                                                    <span class="text-danger fw-bold">Disputed</span>
                                                @elseif ($liveCall->disputable)
                                                    <a href="{{ route('company.liveCall.dispute', $liveCall->id) }}"
                                                        class="btn btn-info">Dispute</a>
                                                @else
                                                    <span class="badge bg-warning text-dark">Disabled</span>
                                                @endif
                                            </td>
                                            <td>{{ $liveCall->agent_name ?? '—' }}</td>
                                            <td>{{ $liveCall->user_name ?? '—' }}</td>
                                            <td>{{ $liveCall->user_email ?? '—' }}</td>
                                            <td>{{ $liveCall->user_phone ?? '—' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($liveCall->call_date_time)->format('Y-m-d | h:i A') }}</td>
                                            <td>{{ $hours > 0 ? $hours . 'h ' : '' }}{{ $minutes }}m</td>
                                            <td>
                                                @if ($liveCall->status === 'confirmed')
                                                    <span class="badge bg-success">Confirmed</span>
                                                @else
                                                    <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                        </tr> 
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted">No live calls recorded yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
