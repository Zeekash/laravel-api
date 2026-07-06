
@extends('backend.layouts.master')

@section('title')
Company Show - Admin Panel
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
                <h4 class="page-title pull-left">Company Show</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Company Show</span></li>
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
                    <h4 class="header-title float-left">Company Show</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{route('admin.companies.index')}}">Back</a>
                    </p>        
                </div>
                <div style="min-height:70vh;" class="d-flex justify-content-start flex-column flex-wrap py-3 px-3">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Name : </strong>{{$company->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Email : </strong>{{$company->email ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Name : </strong>{{$company->company_name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Email : </strong>{{$company->company_email ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Phone No : </strong>{{$company->phone_no ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Additional Phone No :</strong>{{$company->additional_phone_no ?? 'Not Available'}} </h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Country : </strong>{{$company->country->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company State : </strong>{{$company->state->name ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Registration No : </strong>{{$company->company_reg_no ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Wesite: </strong>{{$company->company_website ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>US DOT No : </strong>{{$company->us_dot_no ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>ICC MC LICENSE No : </strong>{{$company->icc_mc_license_no ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>LOCAL LICENSE No : </strong>{{$company->local_license_no ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>About Company : </strong>{{$company->about_company ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company Address : </strong>{{$company->company_address ?? 'Not Available'}}</h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Email Verification: </strong>
                                @if ($company->is_email_verified == 1)
                                    Verified
                                @else
                                    Not Verified
                                @endif
                            </h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Status : </strong>
                            @if ($company->is_claimed == 1)
                                Claimed
                            @else
                                Not Claimed
                            @endif    
                            </h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Moving Type : </strong>
                            @if ($company->local_mover == 1)
                                Local Mover ,
                            @endif 
                            @if ($company->long_distance_mover == 1)
                                Long Distanace Mover
                            @endif    
                            </h5>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="my-3"><strong>Company IP : </strong>{{$company->company_ip ?? 'Not Available'}}</h5>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- data table end -->  
    </div>
</div>
@endsection
