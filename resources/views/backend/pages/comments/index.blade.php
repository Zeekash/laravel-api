@extends('backend.layouts.master')

@section('title')
Comments - Admin Panel
@endsection

@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                <h4 class="page-title pull-left">Comments</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Comments</span></li>
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
                    <h4 class="header-title float-left">All Comments</h4>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <form method="POST" action="{{ route('admin.comments.deleteSelected') }}">
                            @csrf
                            @method('DELETE')
                            @if ($user->can('comment.delete'))
                            <button type="submit" class="btn btn-danger mb-3  show_confirm">Delete
                                Selected</button>
                            @endif
                            <table id="dataTable" class="text-center table-responsive">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        @if ($user->can('comment.delete'))
                                        <th><input type="checkbox" id="select-all"></th>
                                        @endif
                                        <th width="5%">Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Post Title</th>
                                        <th>Body</th>
                                        <th>Status</th>
                                        @if ($user->can('comment.edit') || $user->can('comment.delete'))
                                        <th width="150px">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($comments as $comment)
                                    {{-- @if (Auth::guard('admin')->user()->id == $post->admin_id || Auth::guard('admin')->user()->id == 1)   --}}
                                    <tr>
                                        @if ($user->can('comment.delete'))
                                        <td><input type="checkbox" name="ids[]" value="{{ $comment->id }}"></td>
                                        @endif
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ $comment->body }}</td>
                                        @if ($comment->status === 1)
                                        <td>
                                            <div class="py-2 mx-3"
                                                style="color:white;background-color:#11b311;border-radius:12px;">
                                                Approved</div>
                                        </td>
                                        @else
                                        <td>
                                            <div class="py-2 mx-3"
                                                style="color:white;background-color:#ff1515;border-radius:12px;">
                                                Not Approved</div>
                                        </td>
                                        @endif

                                        @if ($user->can('comment.edit') || $user->can('comment.delete'))
                                        <td style="display:flex;justify-content: center">
                                            @if ($user->can('comment.edit'))
                                            <a class="btn btn-success text-white"
                                                href="{{ route('admin.comments.edit', $comment->id) }}"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if ($user->can('comment.delete'))
                                            <form method="POST"
                                                action="{{ route('admin.comments.destroy', $comment->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></a>
                                            </form>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </form>
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