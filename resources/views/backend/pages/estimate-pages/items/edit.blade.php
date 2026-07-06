
@extends('backend.layouts.master')

@section('title')
Item Edit - Admin Panel
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
                <h4 class="page-title pull-left">Item Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.estimate-pages.categories.index') }}">All Items</a></li>
                    <li><span>Edit Item</span></li>
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
                    <h4 class="header-title">Edit item</h4>
                    @include('backend.layouts.partials.messages')
                    <form action="{{ route('admin.estimate-pages.items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                       @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-row">
                                    <div class="form-group w-100 ">
                                        <label for="name">item Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$item->name}}" id="name" name="name" placeholder="Enter item">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-row">
                                    <div class="form-group w-100 ">
                                        <label for="name">Cubic Feet</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$item->cubic_feet}}" id="cubic_feet" name="cubic_feet" placeholder="Enter Cubic Feet">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="form-group">
                            <label class="label">Sub Category </label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                <option value="{{$item->subcategory->id}}">{{$item->subcategory->name}}</option>
                               @foreach ($sub_categories as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                               @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Item</button>
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