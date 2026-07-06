@extends('backend.layouts.master')
@section('title', 'State Cost Top Mover Create')
@section('admin-content')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">State Cost Top Movers</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.state-cost.top-mover.index') }}">State Cost Top Movers</a></li>
                    <li><span>Create</span></li>
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
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <div class="col-12 mt-5">
                    @include('backend.layouts.partials.messages')
                    <form action="{{ route('admin.state-cost.top-mover.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="card-head">
                                    <h4 class="header-title">State Cost Top Mover Create</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="heading" class="col-form-label">Heading</label>
                                            <input type="text" name="heading" id="heading" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="position" class="col-form-label">Position</label>
                                            <select name="position" id="position" class="form-control">
                                                <option value="">---Select---</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="company_id" class="col-form-label">Company</label>
                                            <select id="company_id" name="company_id" id="company_id" class="form-control select2">
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
                                            <label for="state_cost_page_id" class="col-form-label">State Cost Page</label>
                                            <select name="state_cost_page_id" id="state_cost_page_id" class="form-control">
                                                <option value="">---Select---</option>
                                                @foreach ($state_cost_pages as $stateCostPage)
                                                    <option value="{{ $stateCostPage->id }}">{{ $stateCostPage->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="point_one" class="col-form-label">Point One</label>
                                            <input type="text" name="point_one" id="point_one" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="point_two" class="col-form-label">Point Two</label>
                                            <input type="text" name="point_two" id="point_two" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="point_three" class="col-form-label">Point Three</label>
                                            <input type="text" name="point_three" id="point_three" class="form-control">
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
    });
</script>
@endsection
