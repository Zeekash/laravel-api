@extends('backend.layouts.master')

@section('title')
Get Quotes - Admin Panel
@endsection

@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('admin-content')
@php
$user = Auth::guard('admin')->user();
@endphp
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Quotation</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Quotations</span></li>
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
                    <h4 class="header-title float-left">Quotation List</h4>

                    <div class="clearfix"></div>
                    @if ($user->can('quotation.delete'))
                    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ route('admin.quotations.deleteall') }}">Delete Selected</button>
                    @endif
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="50px"><input type="checkbox" id="master"></th>
                                    <th width="5%">Sr No</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Phone No</th>
                                    <th width="20%">Zip From</th>
                                    <th width="20%">Zip To</th>
                                    <th width="20%">Move Size</th>
                                    <th width="20%">Date</th>
                                    @if ($user->can('quotation.delete'))
                                    <th width="25%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_quote as $get_quotes)
                                <tr id="tr_{{$get_quotes->id}}">
                                    <td><input type="checkbox" class="sub_chk" data-id="{{$get_quotes->id}}"></td>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$get_quotes->name}}</td>
                                    <td>{{$get_quotes->email}}</td>
                                    <td>{{$get_quotes->phone_no}}</td>
                                    <td>{{$get_quotes->zip_from}}</td>
                                    <td>{{$get_quotes->zip_to}}</td>
                                    <td>{{$get_quotes->move_size}}</td>
                                    <td>{{$get_quotes->date}}</td>
                                    @if ($user->can('quotation.delete'))
                                    <td style="display:flex;justify-content: center">
                                        <form method="POST" action="{{ route('admin.quotations.destroy', $get_quotes->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></a>
                                        </form>
                                    </td>
                                    @endif
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