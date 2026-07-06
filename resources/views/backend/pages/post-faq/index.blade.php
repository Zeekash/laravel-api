@extends('backend.layouts.master')

@section('title')
Post Faq - List
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
$user = Auth::guard('admin')->user();
@endphp
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">

                <h4 class="page-title pull-left">Post Faq</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Post Faqs</span></li>
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
                    <h4 class="header-title float-left">Post Faqs</h4>

                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <form method="POST" action="{{ route('admin.post-faq.deleteSelected') }}">
                            @csrf
                            @method('DELETE')
                            @if ($user->can('post-faq.delete'))
                            <button type="submit" class="btn btn-danger mb-3  show_confirm">Delete
                                Selected</button>
                            @endif

                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        @if ($user->can('post-faq.delete'))
                                        <th><input type="checkbox" id="select-all"></th>
                                        @endif
                                        <th width="30%">Sr No.</th>
                                        <th width="30%">Post Name</th>
                                        <th width="30%">Question</th>
                                        <th width="30%">Answer</th>
                                        @if ($user->can('post-faq.edit') || $user->can('post-faq.delete'))
                                        <th width="30%">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($post_faqs as $postFaq)
                                    <tr>
                                        @if ($user->can('post-faq.delete'))
                                        <td><input type="checkbox" name="ids[]" value="{{ $postFaq->id }}"></td>
                                        @endif
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $postFaq->post->title }}</td>
                                        <td>{{ $postFaq->question }}</td>
                                        <td>{{ $postFaq->answer }}</td>
                                        @if ($user->can('post-faq.edit') || $user->can('post-faq.delete'))
                                        <td style="display:flex;justify-content: center">
                                            @if ($user->can('post-faq.edit'))
                                            <a class="btn btn-primary text-white" href="{{ route('admin.post-faq.edit', $postFaq->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif
                                            @if ($user->can('post-faq.delete'))
                                            <form method="POST" action="{{ route('admin.post-faq.destroy', $postFaq->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger text-white show_confirm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
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

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
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
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
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