@extends('backend.layouts.master')

@section('title')
    Resource Faq - Create
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
                        <li><a href="{{ route('admin.company-faq.index') }}">Resource Faq</a></li>
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
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Resource Faq</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.resource-faq.store') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr id="initialRow">
                                            <td class="col-md-3">
                                                <select name="inputs[0][resource_page_id]" id="postSelect" class="form-control">
                                                    <option value="">Select Resource Page</option>
                                                    @foreach ($resource_pages as $resourcePapge)
                                                        <option value="{{ $resourcePapge->id }}">{{ $resourcePapge->title }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-md-3">
                                                <input type="text" class="form-control" name="inputs[0][question]" placeholder="Enter Question">
                                            </td>
                                            <td class="col-md-4">
                                                <textarea type="text" class="form-control" name="inputs[0][answer]" placeholder="Enter Answer"></textarea>
                                            </td>
                                            <td class="col-md-2 text-center">
                                                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
            var rowCounter = 0;
    
            function addRow() {
                rowCounter++;
                var newRow = `
                <tr>
                    <td>
                        <input type="hidden" name="inputs[${rowCounter}][resource_page_id]" value="${$('#postSelect').val()}">
                        <span>${$('#postSelect option:selected').text()}</span>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="inputs[${rowCounter}][question]" placeholder="Enter Question">
                    </td>
                    <td>
                        <textarea type="text" class="form-control" name="inputs[${rowCounter}][answer]" placeholder="Enter Answer"></textarea>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                    </td>
                </tr>
            `;
                $("tbody").append(newRow);
            }
    
            $("#add").click(function() {
                addRow();
            });
        });
    
        function removeRow(button) {
            $(button).closest("tr").remove();
        }
    </script>
    
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
