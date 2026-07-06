@extends('backend.layouts.master')

@section('title')
    Best State Page Faq - List
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">

                    <h4 class="page-title pull-left">Best State Page Faq</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Best State Page Faqs</span></li>
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
                        <h4 class="header-title float-left">Best State Page Faqs</h4>
                        @if (Auth::guard('admin')->user()->can('best-state-faq.create'))
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.best-state-page-faqs.create') }}">Create
                            </a>
                        </p>
                        @endif
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive-lg">
                                <thead class="bg-light text-capitalize">
                                    <tr>

                                        <th>Sr No.</th>
                                        <th>Best State Page</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        @if (Auth::guard('admin')->user()->can('best-state-faq.edit') || Auth::guard('admin')->user()->can('best-state-faq.delete'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($faqs as $faq)
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $faq->bestStatePage->title }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->answer }}</td>
                                            @if (Auth::guard('admin')->user()->can('best-state-faq.edit') || Auth::guard('admin')->user()->can('best-state-faq.delete'))
                                            <td style="display:flex;justify-content: center">
                                                @if (Auth::guard('admin')->user()->can('best-state-faq.edit'))
                                                <a class="btn btn-primary text-white"
                                                    href="{{route('admin.best-state-page-faqs.edit', $faq->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif
                                                @if (Auth::guard('admin')->user()->can('best-state-faq.delete'))
                                                <button type="button" class="btn btn-danger text-white show_confirm"
                                                    onclick="deleteItem({{ $faq->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delForm_{{ $faq->id }}" method="POST"
                                                    action="{{ route('admin.best-state-page-faqs.destroy', $faq->id) }}"
                                                    style="display:none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endif
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

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        function deleteItem(id) {
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delForm_' + id).submit();
                }
            });
        }
    </script>

@endsection


@section('scripts')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection