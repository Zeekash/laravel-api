
@extends('backend.layouts.master')

@section('title')
User Review Show - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">User Review Show</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>User Review Show</span></li>
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
            <div class="card" style="min-height:70vh;">
                <div class="d-flex justify-content-between align-items-center flex-wrap py-3 px-3">
                    <h4 class="header-title float-left">User Review Show</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{route('admin.users.index')}}">Back</a>
                    </p>        
                </div>
                <div style="min-height:70vh;" class="d-flex justify-content-start flex-column flex-wrap py-3 px-3">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Name : </strong>{{$user->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Email : </strong>{{$user->email ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Name : </strong>{{$user->company->company_name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Service : </strong>${{$user->service_cost ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Move Type : </strong>{{$user->move_type ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Move Size : </strong>{{$user->move_size ?? 'Not Available'}} </h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Pick Up State : </strong>{{$user->pickState->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Delivery State : </strong>{{$user->deliveryState->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Pick Up City : </strong>{{$user->pickCity->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Delivery City: </strong>{{$user->deliveryCity->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>User IP </strong>{{$user->client_ip ?? 'Not Available'}}</h5>
                        </div>
                        @if ($user->user_email_verified == 1)
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3 d-flex "><strong>Verification : </strong><div class="px-2" style="color:white;background-color:#11b311;border-radius:12px"> Verified</div></h5>
                        </div>
                        @else
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3 d-flex "><strong>Verification : </strong><div class="px-2" style="color:white;background-color:#ff1515;border-radius:12px"> Not Verified</div></h5>
                        </div>
                        @endif
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Rating: </strong>{{$user->overall_rating ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>User Review </strong>{{$user->your_review ?? 'Not Available'}}</h5>
                        </div>
                        
                    </div>  
                </div>
            </div>
        </div>
        <!-- data table end -->  
    </div>
</div>
@endsection
