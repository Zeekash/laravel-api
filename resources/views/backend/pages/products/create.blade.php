
@extends('backend.layouts.master')

@section('title')
Product Create - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
                <h4 class="page-title pull-left">Product Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.products.index') }}">All Products</a></li>
                    <li><span>Create Product</span></li>
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
                    <h4 class="header-title">Create Product</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.products.store') }}" method="POST" >
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter Price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Description">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                            

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection
<script >
    $('#hide-msg').show();
    setTimeout(function()
    {
        $('#hide-msg').hide();
    },5000);
</script>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection