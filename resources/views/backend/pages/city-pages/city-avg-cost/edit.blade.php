@extends('backend.layouts.master')

@section('title')
City Average Cost - Edit
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .form-check-label {
        text-transform: capitalize;
    }

    /* Spacing fixes */
    .table tbody tr td {
        padding: 0.75rem;
        vertical-align: middle;
    }

    button[type="submit"] {
        margin-top: 15px;
    }
</style>
@endsection

@section('admin-content')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.city-avg-cost.index') }}">City Average Cost</a></li>
                    <li><span>Edit</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>

<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Edit City Average Cost</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.city-avg-cost.update', $cityAvgCost->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">
                                            <select name="items[0][city_page_id]" id="cityPageSelect" class="form-control">
                                                <option value="">Select City Page</option>
                                                @foreach ($cityPages as $cityPage)
                                                    <option value="{{ $cityPage->id }}" 
                                                        {{ $cityPage->id == $cityAvgCost->city_page_id ? 'selected' : '' }}>
                                                        {{ $cityPage->name ?? 'City #'.$cityPage->id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="items[0][avg_cost]" 
                                                value="{{ $cityAvgCost->avg_cost }}" placeholder="Enter Avg Cost">
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="items[0][cost_hour]" 
                                                value="{{ $cityAvgCost->cost_hour }}" placeholder="Enter Cost Per Hour">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#cityPageSelect').select2({
        placeholder: 'Search for a city page',
        allowClear: true,
    });
});
</script>
@endsection
