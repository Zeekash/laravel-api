@extends('backend.layouts.master')

@section('title')
State Pros And Cons - Edit
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
                <h4 class="page-title pull-left">Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.state-pro-cons.index') }}">State Pros And Cons</a></li>
                    <li><span>Edit</span></li>
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
                    <h4 class="header-title">Edit State Pros And Cons</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.state-pro-cons.update', $stateProCon->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr id="initialRow">
                                        <td class="col-md-3">
                                            <select name="state_id" class="form-control select2">
                                                <option value="" disabled selected>Select State</option>
                                                @foreach ($states as $state)
                                                <option value="{{ $state->id }}" {{ $stateProCon->state_id == $state->id ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col-md-3">
                                            <input type="text" class="form-control" name="pros" placeholder="Enter Pros" value="{{$stateProCon->pros}}">
                                        </td>
                                        <td class="col-md-4">
                                            <input type="text" class="form-control" name="cons" placeholder="Enter Cons" value="{{$stateProCon->cons}}">
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
        <!-- data table end -->

    </div>
</div>
@endsection
<script>
    $('#hide-msg').show();
    setTimeout(function() {
        $('#hide-msg').hide();
    }, 5000);

</script>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Search for a State'
            , allowClear: true, // Option to clear the selected value
            // Additional options and customization can be added here
        });
    });

</script>
@endsection
