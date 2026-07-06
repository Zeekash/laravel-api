
@extends('backend.layouts.master')

@section('title')
Contact Us Show - Admin Panel
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
                <h4 class="page-title pull-left">Contact Us Show</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Contact Us Show</span></li>
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
                    <h4 class="header-title float-left">Contact Us Show</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{route('admin.contact-us.index')}}">Back</a>
                    </p>        
                </div>
                <div style="min-height:70vh;" class="d-flex justify-content-start flex-column flex-wrap py-3 px-3  bg-light">
                   <h3 class="my-3"><strong>Company : </strong>{{$contact_us->company->company_name}}</h3>
                   <h3 class="my-3"><strong>Subject : </strong>{{$contact_us->subject}}</h3>
                   <h5 class="my-3"><strong>Description : </strong>{{$contact_us->description}}</h5>
                   <img class="mt-5" style="max-width:65em;min-width:65em;" src="{{ URL::to('/contact-us/image/'. $contact_us->image) }}" alt="{{ $contact_us->image }}"  >
                </div>
            </div>
        </div>
        <!-- data table end -->  
    </div>
</div>
@endsection
