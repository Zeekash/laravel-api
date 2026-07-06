
@extends('backend.layouts.master')

@section('title')
Quotation Show - Admin Panel
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
                <h4 class="page-title pull-left">Quotation Show</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Quotations Show</span></li>
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
                    <h4 class="header-title float-left">Quotation Show</h4>
                    <p class="float-right mb-2">

                        <a class="btn btn-primary text-white" href="{{route('admin.get-quotes.index')}}">Back</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Category</td>
                                <th scope="col">Item Name</td>
                                <th scope="col">Quantity</th>
                                <th scope="col">Cubic Feet</th>
                                <th scope="col">Result</th>
                                </tr>
                                
                            </thead>
                            <tbody>   
                      
                            @foreach($item_calculate as $item_calculates)
                            <tr>
                                 <td>{{$item_calculates->item->subcategory->name}}</td>
                                 <td>{{$item_calculates->item->name}}</td>
                                 <td>{{$item_calculates->quantity}}</td>
                                 <td>{{$item_calculates->cubic_feet}}</td>
                                 <td>{{$item_calculates->result}}</td>
                            </tr>  
                            @endforeach    
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->  
    </div>
</div>
@endsection
