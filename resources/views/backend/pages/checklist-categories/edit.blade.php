@extends('backend.layouts.master')

@section('title')
    Checklist Categories - Edit
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <h4 class="page-title pull-left">Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.checklist.categories.index') }}">Checklist Categories</a></li>
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
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Checklist Category</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.checklist.categories.update',$checklistCategory->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <table width="100%">
                                <tbody>
                                    <tr id="initialRow">
                                        <td >
                                            <input type="text" class="form-control" name="heading" value="{{ $checklistCategory->heading }}"
                                                placeholder="Enter Heading">
                                        </td>
                                        <td >
                                            <textarea type="text" class="form-control" name="description" value="{{ $checklistCategory->description }}" placeholder="Enter Description">{{ $checklistCategory->description }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection
