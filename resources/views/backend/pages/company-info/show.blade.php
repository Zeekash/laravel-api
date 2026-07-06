
@extends('backend.layouts.master')

@section('title')
{{ $companyInfo->company->company_name }} - Show
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
                <h4 class="page-title pull-left">{{ $companyInfo->company->company_name }} Show</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>{{ $companyInfo->company->company_name }} Show</span></li>
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
                    <h4 class="header-title float-left">{{ $companyInfo->company->company_name }} - Show</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{route('admin.company-info.index')}}">Back</a>
                    </p>        
                </div>
                <div style="min-height:70vh;" class="d-flex justify-content-start flex-column flex-wrap py-3 px-3  bg-light">
          
                
                    <div class="card-body">
                        {!! $companyInfo->description!!}
                    </div>
             
              
                </div>
            </div>
        </div>
        <!-- data table end -->  
    </div>
</div>
@endsection
