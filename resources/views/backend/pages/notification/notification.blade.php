<?php
$notifications = App\Models\Notification::all();
$count = $notifications->count();
?>
@extends('backend.layouts.master')

@section('title')
Notification | MyMovingJourney
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection

@section('admin-content')
<style>
    table#dataTable tr.unread {
        background-color: #dbdadaff !important;
    }
</style>
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Notifications</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Notifications</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 my-4">
            <div><a href="/admin" class="btn " style="background-color: #1e75bb;color:white;">
                    <i style="font-size:20px;" class="fa fa-arrow-left"></i>
                </a>
            </div>
        </div>
        @if ($count > 0)
        <div class="col-sm-8 my-4">
            <a href="/admin/delete_all_notification" class="btn btn-danger mx-2"
                onclick="return confirm('Are you sure you want you want to delete All..?')">Delete All</i></a>
            <a href="/admin/read_all_notification" class="btn btn-info">Mark All as Read</a>
        </div>
        @endif
    </div>
</div>

<div class="container-fluid">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 ">
                <div class="data-tables">
                    <form method="POST" action="{{ route('del_selected_noti') }}" onsubmit="return formValidation()">
                        @csrf
                        @if ($count > 0)
                        <button type="submit" class="btn btn-danger mb-3">Delete Selected Notifications</button>
                        @endif
                        <table id="dataTable" class="text-center table-responsive-lg">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th></th>
                                    <th>Sr No.</th>
                                    <th>Company Name</th>
                                    <th>Status</th>
                                    <th>Date and Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications->sortByDesc('created_at') as $noti)
                                <tr class="{{ $noti->status == 0 ? 'unread' : '' }}">
                                    <td><input type="checkbox" name="notification_ids[]" value="{{ $noti->id }}"></td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $noti->name }}</td>
                                    <td><b>{{ $noti->msg }} at</b></td>
                                    <td> {{ $noti->created_at->format('d-m-Y | h:i a') }}</td>
                                    <td class="d-flex justify-content-end">
                                        @if ($noti->status == 0)
                                        <div> <a class="btn btn-success m-1"
                                                href="mark_read_notification/{{ $noti->id }}">Mark as
                                                Read</a></div>
                                        @endif
                                        <div><a class="btn btn-danger mt-1" href="delete_notification/{{ $noti->id }}"><i class="fa fa-trash"></i></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formValidation() {
        var checkBox = document.querySelectorAll('input[type="checkbox"][name="notification_ids[]"]');
        var condition = false;
        anyCheck = false;

        checkBox.forEach(function(check) {
            if (check.checked) {
                anyCheck = true;
                return;

            }
        });

        if (!anyCheck) {
            alert('Please select Notification to delete..!');
            return false;
        }

        if (confirm("Are you sure you want to delete")) {
            condition = true;
            return;
        } else {
            return false;
        }
    }
</script>
@endsection


@section('scripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
</script>

@endsection