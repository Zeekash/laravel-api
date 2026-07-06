
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admins</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Admins</span></li>
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
                    <h4 class="header-title float-left">Admins List</h4>
                    <p class="float-right mb-2">
                        @if (Auth::guard('admin')->user()->can('admin.create'))
                            <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New Admin</a>
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sr No.</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="40%">Roles</th>
                                    @if (Auth::guard('admin')->user()->can('admin.edit') || Auth::guard('admin')->user()->can('admin.delete'))
                                    <th width="15%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($admins as $admin)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @foreach ($admin->roles as $role)
                                            <span class="badge badge-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    @if (Auth::guard('admin')->user()->can('admin.edit') || Auth::guard('admin')->user()->can('admin.delete'))
                                    <td style="display:flex;justify-content: center">
                                        @if (Auth::guard('admin')->user()->can('admin.edit'))
                                            <a class="btn btn-success text-white" href="{{ route('admin.admins.edit', $admin->id) }}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        
                                        @if (Auth::guard('admin')->user()->can('admin.delete'))
                                        <form method="POST" action="{{ route('admin.admins.destroy', $admin->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></a>
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
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
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
     <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script> -->
     
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