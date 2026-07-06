@extends('backend.layouts.master')

@section('title')
    Mover Quotes - Admin Panel
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
    @php
        $user = Auth::guard('admin')->user();
    @endphp
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Mover Quotation</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Mover Quotations</span></li>
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
        <div class="row mt-3">
            <!-- Summary Card -->
            <div class="col-lg-3">
                <div class="mt-2">
                    <div class="card text-white"
                        style="height: 180px; min-width: 300px; background-color: #8152f7; font-size: 1.2rem;">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100 py-5">
                            <div class="seofct-icon" style="font-size: 2rem;">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="mt-2 fw-bold text-center">
                                Total Mover Quotations
                            </div>
                            <h2 class="mt-1" style="font-size: 2rem;">
                                @if ($totalLeads < 1000)
                                    {{ $totalLeads }}
                                @elseif ($totalLeads < 1000000)
                                    {{ round($totalLeads / 1000, 1) . 'K' }}
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <small class="text-muted">Last 30 Days</small>
                                    <h5 class="fw-bold mb-0">{{ $leadsLast30 }} leads</h5>
                                </div>
                                <div class="text-primary fw-bold fs-4">{{ $last30Pct }}%</div>
                            </div>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $last30Pct }}%;"
                                    aria-valuenow="{{ $last30Pct }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted d-block mb-2">Share of total leads</small>

                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h6 class="fw-semibold mb-0">This month vs previous</h6>
                                <div class="fw-bold {{ $momClass }}">{{ $momPrefix }}{{ $momPct }}%</div>
                            </div>
                            <small class="text-muted">Current: {{ $currentMonthCount }} | Previous:
                                {{ $prevMonthCount }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Chart Card -->
            <div class="col-lg-9">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                            <h5 class="mb-0">Yearly Mover Quotations</h5>
                            <form id="yearFilterForm" method="GET" action="{{ route('admin.mover_quotations.index') }}"
                                class="d-flex align-items-center gap-2">
                                <label for="leadYearSelect" class="mb-0">Year</label>
                                <select id="leadYearSelect" name="year" class="form-select form-select-sm"
                                    style="width: 120px;">
                                    @foreach ($availableYears as $availableYear)
                                        <option value="{{ $availableYear }}" @if ((int) $availableYear === (int) $year) selected
                                        @endif>{{ $availableYear }}</option>
                                    @endforeach
                                    @if (!$availableYears->contains($year))
                                        <option value="{{ $year }}" selected>{{ $year }}</option>
                                    @endif
                                </select>
                            </form>
                        </div>

                        <div style="height: 320px;">
                            <canvas id="leadYearChart" aria-label="Yearly mover quotations chart"></canvas>
                        </div>
                        <center><small class="text-muted d-block mt-2">Watch Yearly Mover Quotations.</small></center>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Mover Quotation List</h4>
                        <div class="clearfix"></div>
                        @if ($user->can('quotation.delete'))
                            <button style="margin-bottom: 10px" class="btn btn-danger delete_all"
                                data-url="{{ route('admin.mover_quotations..deleteall') }}">Delete Selected</button>
                        @endif
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center table-responsive">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        @if ($user->can('quotation.delete'))
                                            <th width="50px"><input type="checkbox" id="master"></th>
                                        @endif
                                        <th width="5%">Sr No</th>
                                        <th width="15%">Received Date</th>
                                        <th width="15%">Company Name</th>
                                        <th width="10%">Name</th>
                                        <th width="15%">Email</th>
                                        <th width="10%">Phone No</th>
                                        <th width="10%">Zip From</th>
                                        <th width="10%">Zip To</th>
                                        <th width="10%">Move Size</th>
                                        <th width="10%">Date</th>

                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact_mover as $get_quotes)
                                        <tr id="tr_{{ $get_quotes->id }}" @if ($get_quotes->status == false)
                                        style="background-color: lightgrey" @endif>
                                            @if ($user->can('quotation.delete'))
                                                <td><input type="checkbox" class="sub_chk" data-id="{{ $get_quotes->id }}"></td>
                                            @endif
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $get_quotes->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $get_quotes->company->company_name }}</td>
                                            <td>{{ $get_quotes->name }}</td>
                                            <td>{{ $get_quotes->email }}</td>
                                            <td>{{ $get_quotes->phone_no }}</td>
                                            <td>{{ $get_quotes->zip_from }}</td>
                                            <td>{{ $get_quotes->zip_to }}</td>
                                            <td>{{ $get_quotes->move_size }}</td>
                                            <td>{{ $get_quotes->date }}</td>
                                            @if ($user->can('quotation.edit') || $user->can('quotation.delete'))
                                                <td style="display:flex;justify-content: center">
                                                    @if ($get_quotes->status == false && $user->can('quotation.edit'))
                                                        <a href="{{ route('admin.mover_quotations..markAsRead', $get_quotes) }}"
                                                            class="btn btn-secondary"><i class="fa fa-check"></i></a>
                                                    @endif
                                                    @if ($user->can('quotation.delete'))
                                                        <form method="POST"
                                                            action="{{ route('admin.mover_quotations.destroy', $get_quotes->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <a type="submit" class="btn btn-danger text-white show_confirm"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fa fa-trash"></i>
                                                            </a>
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
        $('.show_confirm').click(function (event) {
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
        $(document).ready(function () {


            $('#master').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.delete_all').on('click', function (e) {


                var allVals = [];
                $(".sub_chk:checked").each(function () {
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
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function (index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        document.addEventListener('DOMContentLoaded', function () {
            const chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const chartData = @json(array_values($chartData ?? []));
            const canvas = document.getElementById('leadYearChart');
            const yearSelect = document.getElementById('leadYearSelect');
            const yearForm = document.getElementById('yearFilterForm');

            if (yearSelect && yearForm) {
                yearSelect.addEventListener('change', function () {
                    yearForm.submit();
                });
            }

            if (canvas) {
                const ctx = canvas.getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Mover Quotations',
                            data: chartData,
                            borderColor: '#36a2eb',
                            backgroundColor: 'rgba(54, 162, 235, 0.1)',
                            pointBackgroundColor: '#36a2eb',
                            pointBorderColor: '#36a2eb',
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            tension: 0.2,
                            fill: false
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection