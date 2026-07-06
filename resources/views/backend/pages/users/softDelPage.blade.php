@extends('backend.layouts.master')

@section('title')
    User Reviews Soft Delete - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                    <h4 class="page-title pull-left">Users Review | Soft Delete</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.users.index') }}">Users Reviews</a></li>
                        <li><span>Soft Deleted</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->


   
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Soft Deleted Users Reviews</h4>
                    <div class="clearfix"></div>
                    @if ($admin->can('user-review.force-delete'))
                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all"
                        data-url="{{ route('admin.users.deleteall') }}">Delete Selected</button>
                    @endif
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    @if ($admin->can('user-review.force-delete'))
                                    <th width="50px"><input type="checkbox" id="master"></th>
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
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="tr_{{ $user->id }}">
                                        @if ($admin->can('user-review.force-delete'))
                                        <td><input type="checkbox" class="sub_chk" data-id="{{ $user->id }}"></td>
                                        @endif
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->company->company_name }}</td>
                                        <td>${{ $user->service_cost }}</td>
                                        <td>{{ $user->move_type ?? 'Not Avaiable' }}</td>
                                        <td>{{ $user->move_size }}</td>
                                        <!--<td>{{ $user->your_review }}</td>-->
                                        <td>{{ $user->overall_rating }}</td>
                                        <td>{{ $user->client_ip }}</td>
                                        @if ($user->user_email_verified === 1)
                                            <td>
                                                <div class="py-2 mx-3"
                                                    style="color:white;background-color:#11b311;border-radius:12px;">
                                                    Verified</div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="py-2 mx-3"
                                                    style="color:white;background-color:#ff1515;border-radius:12px;">
                                                    Not Verified</div>
                                            </td>
                                        @endif
                                        <td style="display:flex; justify-content: center">
                                            @if ($admin->can('user-review.restore'))
                                               
                                                <a class="btn btn-success text-white mx-2"
                                                 onclick="return confirm('ARE YOU SURE? You want to recover this data?')"
                                                    href="{{ route('admin.users.reviewRestoreSoftDeleted', $user->id) }}"><i
                                                        class="fa fa-undo"></i></a>
                                            @endif

                                            @if ($admin->can('user-review.force-delete'))
                                                <a href="{{ route('admin.users.reviewSoftDelete', $user->id) }}"
                                                    class="btn btn-danger text-white"
                                                    onclick="return confirm('ARE YOU SURE? Data will not recover after deleting!')"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {


            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });


            $('.delete_all').on('click', function(e) {


                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {


                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {


                        var join_selected_values = allVals.join(",");


                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });


                return false;
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
                responsive: true
            });
        }
    </script>
@endsection
