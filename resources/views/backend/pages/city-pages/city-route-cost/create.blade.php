@extends('backend.layouts.master')

@section('title')
City Route Cost - Create
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
                <h4 class="page-title pull-left">Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.city-route-cost.index') }}">City Route Cost</a></li>
                    <li><span>Create</span></li>
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
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create City Route Cost</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.city-route-cost.store') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr id="initialRow">
                                        <td class="col-md-3">
                                            <select name="city_page_id" id="cityPageSelect" class="form-control">
                                                <option value="">Select City Page</option>
                                                @foreach ($cityPages as $cityPage)
                                                    <option value="{{ $cityPage->id }}">{{ $cityPage->name ?? 'City #'.$cityPage->id }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="route_name[]" placeholder="Route Name">
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="route_link[]" placeholder="Route Link">
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="route_value[]" placeholder="Route Value">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
    var rowCounter = 0;

    function addRow() {
        rowCounter++;
        var newRow = `
        <tr>
            <td>
                <input type="hidden" name="city_page_id" value="${$('#cityPageSelect').val()}">
                <span>${$('#cityPageSelect option:selected').text()}</span>
            </td>
            <td>
                <input type="text" class="form-control" name="route_name[]" placeholder="Route Name">
            </td>
            <td>
                <input type="text" class="form-control" name="route_link[]" placeholder="Route Link">
            </td>
            <td>
                <input type="text" class="form-control" name="route_value[]" placeholder="Route Value">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
            </td>
        </tr>
        `;
        $("tbody").append(newRow);
    }

    $("#add").click(function() {
        if($('#cityPageSelect').val() === ""){
            alert('Please select a City Page first');
            return;
        }
        addRow();
    });
});

function removeRow(button) {
    $(button).closest("tr").remove();
}

$(document).ready(function() {
    $('#cityPageSelect').select2({
        placeholder: 'Search for a city page',
        allowClear: true,
    });
});
</script>
@endsection
