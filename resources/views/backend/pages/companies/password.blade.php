@extends('backend.layouts.master')

@section('title')
    Company Password Edit - Admin Panel
@endsection



@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Compnay Password Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <!-- <li><a href="{{ route('admin.users.index') }}">All Users</a></li> -->
                        <li><span>Company Password Edit </span></li>
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
                        <h4 class="header-title">Company Password Edit </h4>
                         @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.comp.pass.update', $company->id) }}"method="post">
                        
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="meta_title">Password</label>
                                    <input type="password" class="form-control "  name="password"
                                        placeholder="Enter Password" value="{{ $company->password }}">

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
