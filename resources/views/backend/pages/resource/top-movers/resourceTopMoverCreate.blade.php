{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
@extends('backend.layouts.master')
@section('title', 'Resource Top Mover Create')
@section('admin-content')

    {{-- <style>
    label {
        font-size: 20px !important
    }

    body {
        background: rgb(250, 250, 250);
    }
</style> --}}
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>


@endsection

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <a href="{{ route('admin.resource.top.mover.index') }}" class="btn btn-primary float-right "> Back</a>
                    <h4 class="header-title">Resource Top Mover - Create</h4>
                    @include('flash-message')
                    <form action="{{ route('admin.resource.top.mover.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Resoruce Top Mover</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Heading</label>
                                            <input type="text" name="heading" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Position</label>
                                            <select name="position" id="" class="form-control">
                                                <option value="">---Select---</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Company</label>
                                            <select id="company_id" name="company_id" class="form-control select2">
                                                <option value="">---Select---</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Resource Page</label>
                                            <select name="resource_page_id" id="" class="form-control">
                                                <option value="">---Select---</option>
                                                @foreach ($resource_pages as $resourcePage)
                                                    <option value="{{ $resourcePage->id }}">{{ $resourcePage->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point One</label>
                                            <input type="text" name="point_one" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point Two</label>
                                            <input type="text" name="point_two" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point Three</label>
                                            <input type="text" name="point_three" class="form-control">

                                        </div>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
<script>
    $(document).ready(function() {
        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#company_country').on('change', function() {
            var idCountry = this.value;
            $("#comapny_state").html('');
            $.ajax({
                url: "{{ url('api/fetch-states') }}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#comapny_state').html(
                        '<option value="">-- Select State --</option>');
                    $.each(result.states, function(key, value) {
                        $("#comapny_state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/


    });
</script>
@endsection
