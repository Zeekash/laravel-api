@extends('backend.layouts.master')

@section('title')
User Reviews - Admin Panel
@endsection

@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('admin-content')
    @php
    $admin = Auth::guard('admin')->user();
    @endphp
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Users Review</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All Users Review</span></li>
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
            @if ($admin->can('user-review.view-trash'))
            <div class="col-md-4 mt-5 ">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <a href="{{ route('admin.users.reviewSoftDeletePage') }}">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="fa fa-trash"></i> Soft Delete</div>
                                <h2>{{ $softDeleteUserCount }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4 mt-5 ">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-star"></i>Verified Reviews</div>
                            <h2>{{ $verified_reviews }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 ">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-star"></i>Un-Verified Reviews</div>
                            <h2>{{ $unverified_reviews }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">All Users Review</h4>
                        @if ($admin->can('user-review.create'))
                          <p class="float-right ">
                                                        <a style="margin-bottom: 16px" class="btn btn-primary text-white ml-2" href="{{ route('admin.users.create') }}">Create Review</a>
                           </p>
                        @endif
                    <div class="clearfix"></div>
        
                    <form method="POST"  action="{{ route('admin.users.bulkDestroy') }}" id="bulk-delete-form">
                        @csrf
                        @method('DELETE')
                        @if ($admin->can('user-review.delete'))
                        <button type="submit"  class="btn btn-danger mb-3  show_confirm">Delete
                            Selected</button>
                        @endif
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        @if ($admin->can('user-review.delete'))
                                        <th><input type="checkbox" id="select-all"></th>
                                        @endif
                                        <th width="5%">Sr No.</th>
                                        <th width="10%">Name</th>
                                        <th width="10%">Email</th>
                                        <th width="25%">Company Name</th>
                                        <th width="5%">Service Cost</th>
                                        <th width="10%">Move Type</th>
                                        <th width="10%">Move Size</th>
                                        <!--<th width="50%">User Review</th>-->
                                        <th width="10%">Rating</th>
                                        <th width="25%">User Ip Address</th>
                                        <th width="10%">Email Verification</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`
                    , text: "If you delete this, it will be gone forever."
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>

    <script>
        $(document).on('click', '.delete_confirm', function(event) {
            event.preventDefault(); // prevent immediate navigation

            // Support href or data-url/data-href attributes
            var deleteUrl = $(this).attr('href') || $(this).data('url') || $(this).data('href');

            swal({
                    title: "Are you sure you want to delete this record?",
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning", buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // redirect to the delete URL if confirmed
                        window.location.href = deleteUrl;

                        // To delete with AJAX
                        /*
                        $.ajax({
                            url: deleteUrl,
                            type: 'GET',
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            success: function(response) {
                                // reload DataTable to reflect deletion
                                if ($.fn.DataTable.isDataTable('#dataTable')) {
                                    $('#dataTable').DataTable().ajax.reload(null, false);
                                }
                            }
                        });
                        */
                    }
                });
        });

    </script>

    <script>
        // Select all checkboxes
        document.getElementById('select-all').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });

    </script>
@endsection


@section('scripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> -->

<script>
    /*================================
                            datatable active
                            ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.users.index") }}',
            columns: [
                @if($admin->can('user-review.delete')) {
                    data: 'checkbox'
                    , name: 'checkbox'
                    , orderable: false
                    , searchable: false
                }, @endif {
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                    , orderable: false
                    , searchable: false
                }, {
                    data: 'name'
                    , name: 'name'
                }, {
                    data: 'email'
                    , name: 'email'
                }, {
                    data: 'company_name'
                    , name: 'company_name'
                }
                , {
                    data: 'service_cost'
                    , name: 'service_cost'
                }, {
                    data: 'move_type'
                    , name: 'move_type'
                }, {
                    data: 'move_size'
                    , name: 'move_size'
                }, {
                    data: 'overall_rating'
                    , name: 'overall_rating'
                }, {
                    data: 'client_ip'
                    , name: 'client_ip'
                }, {
                    data: 'email_verification'
                    , name: 'email_verification'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            responsive: true
        });
    }

</script>
@endsection
