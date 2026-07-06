@extends('backend.layouts.master')

@section('title')
    Checklists - Create
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
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
                        <li><a href="{{ route('admin.checklists.index') }}">Checklists</a></li>
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
                        <h4 class="header-title">Create Checklist</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.checklists.store') }}" method="POST">
                            @csrf
                            <table width="100%">
                                <tbody>
                                    <tr id="initialRow">
                                        <td>
                                            <select name="inputs[0][checklist_category_id]" id="companySelect" class="form-control">
                                                <option value="">Select checklist categeory</option>
                                                @foreach ($checklist_categories as $checklistCategory)
                                                    <option value="{{ $checklistCategory->id }}">
                                                        {{ $checklistCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="inputs[0][heading]"
                                                placeholder="Enter Heading">
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control" name="inputs[0][description]" placeholder="Enter Description"></textarea>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success">Add
                                                More</button>
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


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function () {
            var rowCounter = 0;

            // Initialize Summernote on the initial description field
            $('textarea[name="inputs[0][description]"]').summernote({
                placeholder: 'Enter Description',
                tabsize: 2,
                height: 100
            });

            // Add new row
            $('#add').click(function () {
                rowCounter++;

                var newRow = `
                <tr>
                    <td>
                        <select name="inputs[${rowCounter}][checklist_category_id]" class="form-control">
                            <option value="">Select checklist category</option>
                            @foreach ($checklist_categories as $checklistCategory)
                                <option value="{{ $checklistCategory->id }}">{{ $checklistCategory->heading }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="inputs[${rowCounter}][heading]" placeholder="Enter Question">
                    </td>
                    <td>
                        <textarea class="form-control summernote" name="inputs[${rowCounter}][description]" placeholder="Enter Description"></textarea>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                    </td>
                </tr>`;

                $('tbody').append(newRow);

                // Initialize Summernote for the new textarea
                $(`textarea[name="inputs[${rowCounter}][description]"]`).summernote({
                    placeholder: 'Enter Description',
                    tabsize: 2,
                    height: 100
                });
            });

            // Remove row
            window.removeRow = function (button) {
                $(button).closest('tr').remove();
            };
        });
    </script>
@endsection

