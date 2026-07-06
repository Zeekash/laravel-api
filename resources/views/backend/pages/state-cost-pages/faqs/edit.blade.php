@extends('backend.layouts.master')

@section('title')
    State Cost Page Faq - Create
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
                        <li><a href="{{ route('admin.state-cost-page-faqs.index') }}">State Cost Page Faq</a></li>
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
                        <h4 class="header-title">Edit Resource Faq</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.state-cost-page-faqs.update', $faq->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr id="initialRow">
                                            <td class="col-md-3">
                                                <select name="state_cost_page_id" id="postSelect"
                                                    class="form-control">
                                                    <option value="">Select Resource Page</option>
                                                    @foreach ($state_cost_pages as $stateCostPage)
                                                        <option value="{{ $stateCostPage->id }}"
                                                            {{ $faq->state_cost_page_id == $stateCostPage->id ? 'selected' : '' }}>
                                                            {{ $stateCostPage->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-md-3">
                                                <input type="text" class="form-control" name="question"
                                                    value="{{ $faq->question }}" placeholder="Enter Question">
                                            </td>
                                            <td class="col-md-4">
                                                <textarea type="text" class="form-control" name="answer" value="{{ $faq->answer }}"
                                                    placeholder="Enter Answer">{{ $faq->answer }}</textarea>
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
            $('#postSelect').select2({
                placeholder: 'Search for a resource page',
                allowClear: true, // Option to clear the selected value
                // Additional options and customization can be added here
            });
        });
    </script>
@endsection
