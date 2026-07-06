
@extends('backend.layouts.master')

@section('title')
Estimates - Admin Panel
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
                <h4 class="page-title pull-left">Estimate</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Estimates</span></li>
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
                    <h4 class="header-title float-left">Estimate List</h4>
                    <p class="float-right mb-2">

                        <a class="btn btn-primary text-white" href="{{route('company.get-quote')}}">Get Estimate</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table-responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <!-- <th scope="col">Sr No.</th> -->
                                    <th width="5%">Date</th>
                                    <th width="10%">Full Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone No.</th>
                                    <th width="10%">Moving From</th>
                                    <th width="10%">Moving To</th>
                                    <th width="10%">Other Info</th>
                                    <th width="10%">Total</th>
                                    <th width="10%">Weight</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($get_quotation as $get_quotations)
                               <tr>
                                    <!-- <td>{{$get_quotations->id}}</td> -->
                                    <td>{{$get_quotations->created_at}}</td>
                                    <td>{{$get_quotations->full_name}}</td>
                                    <td>{{$get_quotations->email}}</td>
                                    <td>{{$get_quotations->phone_no}}</td>
                                    <td>{{$get_quotations->moving_from}}</td>
                                    <td>{{$get_quotations->moving_to}}</td>
                                    <td>{{$get_quotations->other_info}}</td>
                                    <td>{{$get_quotations->total}}</td>
                                    <td>{{$get_quotations->weight}}</td>
                                    
                                    <td style="display:flex;justify-content: center"> 
                                    @if (Auth::guard('admin')->user()->can('estimate.show'))
                                     <a class="btn btn-primary text-white" href="{{route('admin.get-quotes.show', $get_quotations->id)}}"><i class="fa fa-eye"></i></a> 
                                    @endif
                                    <form method="POST" action="{{ route('admin.get-quotes.destroy', $get_quotations->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></a>
                                    </form>

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