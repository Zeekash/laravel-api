@extends('backend.layouts.master')

@section('title')
    Company Info - Create
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
                        <li><a href="{{ route('admin.company-faq.index') }}">Company Info</a></li>
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
                        <h4 class="header-title">Create Company Info</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.company-faq.store') }}" method="POST">
                            @csrf
                            <table width="100%">
                                <tbody>
                                    <tr id="initialRow">
                                        <td >
                                            <select name="inputs[0][company_id]" id="companySelect" class="form-control">
                                                <option value="">Select Company</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td >
                                            <input type="text" class="form-control" name="inputs[0][question]"
                                                placeholder="Enter Question">
                                        </td>
                                        <td >
                                            <textarea type="text" class="form-control" name="inputs[0][answer]" placeholder="Enter Answer"></textarea>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <input type="hidden" name="inputs[${rowCounter}][company_id]" value="${$('#companySelect').val()}">
                        <span>${$('#companySelect option:selected').text()}</span>
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

            function removeRow(button) {
                $(button).closest("tr").remove();
            }

            $("#add").click(function() {
                addRow();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#companySelect').select2({
                placeholder: 'Search for a company',
                allowClear: true, // Option to clear the selected value
                // Additional options and customization can be added here
            });
        });
    </script>
@endsection
