@extends('backend.layouts.master')

@section('title')
Posts - Admin Panel
@endsection
@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
body {
    background: var(--lgray);
}
.row  {margin-right: 0;margin-left: 0;}
.col-sm-12 {
    padding-right: 0px;
    padding-left: 0px;
}
.col-12 {
    padding-right: 31px;
    padding-left: 30px;
}
/* .footer-area {
    text-align: unset !important;
    padding: 0 !important;
    background: transparent !important;
} */
.page-hdr{display:flex;justify-content:space-between;margin-bottom:10px;flex-wrap:wrap;gap:16px}
.page-title{font-family:'Sora',sans-serif;font-size:20px;font-weight:800;color:var(--dark);letter-spacing:-.4px}
.page-sub{font-size:12px;color:var(--muted);margin-top:4px}
.page-actions{display:flex;gap:12px;align-items:center}
.page-panel{padding:28px 32px 3px;}
.btn{padding:10px 18px;border-radius:10px;font-size:10px;font-weight:700;cursor:pointer;font-family:'Sora',sans-serif;transition:.15s;display:inline-flex;align-items:center;gap:8px;border:none}
.btn svg{width:14px;height:14px;stroke:currentColor;stroke-width:2.5;fill:none}
.btn-primary{background:var(--navy);color:white}.btn-primary:hover{background:var(--navy2)}
.btn-orange{background:var(--orange);color:white}.btn-orange:hover{background:var(--orange-h)}
.btn-green{background:var(--green);color:white}
.btn-outline{background:white;color:var(--navy2);border:1.5px solid rgba(15,38,91,0.12)}.btn-outline:hover{border-color:var(--navy2)}
.btn-danger{color:var(--red);border:1.5px solid #F5C6C2}.btn-danger:hover{background:var(--red);color:white}
.badge{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:700;padding:4px 10px;border-radius:24px;font-family:'Sora',sans-serif;white-space:nowrap}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.badge-green{background:var(--green-bg);color:var(--green)}
.badge-orange{background:#FFF0EB;color:var(--orange)}
.badge-amber{background:var(--amber-bg);color:var(--amber)}
.badge-blue{background:var(--blue-bg);color:var(--blue)}
.badge-purple{background:var(--purple-bg);color:var(--purple)}
.badge-gray{background:var(--lgray);color:var(--muted)}
.badge-red{background:var(--red-bg);color:var(--red)}
.filters-bar{background:white;border:1.5px solid var(--border);border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:10px}
.f-search{padding:8px 12px;border:1.5px solid var(--border);border-radius:8px;font-size:11px;font-family:'DM Sans',sans-serif;outline:none;background:white;min-width:200px;flex:1}
.f-search:focus{border-color:var(--navy2)}
.f-select{padding:8px 28px 8px 10px;border:1.5px solid var(--border);border-radius:8px;font-size:11px;font-family:'DM Sans',sans-serif;outline:none;background:white;cursor:pointer;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='%237A8BA8' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 8px center}
.f-ml{margin-left:auto}
.table-card{background:white;border:1.5px solid rgba(15,38,91,0.08);border-radius:18px;overflow:hidden;box-shadow:0 20px 60px rgba(15,38,91,0.06)}
.dataTables_wrapper .dataTables_length{margin:20px 0 0 20px}.dataTables_wrapper .dataTables_filter{margin:12px 20px 12px auto;display:flex;align-items:center;gap:8px}
.dataTables_wrapper{margin-left:20px;}.dataTables_wrapper .dataTables_paginate .paginate_button{padding:0 !important;}.dataTables_wrapper .dataTables_paginate{padding-top:0px}
/* .dataTables_wrapper .dataTables_filter {
    display: none !important;
} */
.dataTables_wrapper .dataTables_filter {
    text-align: left !important;
}
.data-table{width:100%;border-collapse:collapse}
.data-table th{background:var(--lgray);padding:14px 18px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);font-family:'Sora',sans-serif;text-align:left;border-bottom:1px solid rgba(15,38,91,0.08);white-space:nowrap}
.data-table td{padding:14px 18px;font-size:14px;color:var(--dark);border-bottom:1px solid rgba(15,38,91,0.08);vertical-align:middle}
.data-table tr:last-child td{border-bottom:none}
.data-table tr:hover td{background:#f5f8ff;cursor:pointer}
.tbl-btn{padding:5px 11px;border-radius:6px;font-size:11px;font-weight:700;cursor:pointer;font-family:'Sora',sans-serif;border:none;transition:.15s;margin-right:3px;white-space:nowrap}
.tbl-edit{background:var(--blue-bg);color:var(--blue)}.tbl-edit:hover{background:var(--blue);color:white}
.tbl-del{background:var(--red-bg);color:var(--red)}.tbl-del:hover{background:var(--red);color:white}
.tbl-preview{background:var(--lgray);color:var(--mid)}.tbl-preview:hover{background:var(--navy);color:white}
.tbl-pub{background:var(--green-bg);color:var(--green)}.tbl-pub:hover{background:var(--green);color:white}
.tbl-unpub{background:var(--amber-bg);color:var(--amber)}.tbl-unpub:hover{background:var(--amber);color:white}
.pagination{display:flex;align-items:center;justify-content:space-between;padding:12px 16px;border-top:1px solid var(--border)}
.pg-info{font-size:12px;color:var(--muted)}
.pg-btns{display:flex;gap:4px}
.pg-btn{width:30px;height:30px;border-radius:6px;border:1.5px solid var(--border);background:white;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12px;font-weight:600;color:var(--mid);font-family:'Sora',sans-serif;transition:.15s}
.pg-btn:hover{border-color:var(--navy2)}
.pg-btn.active{background:var(--navy);color:white;border-color:var(--navy)}
.pg-btn svg{width:12px;height:12px;stroke:currentColor;stroke-width:2;fill:none}
/* Stat Cards - Separate Grid */
.stat-wrap{margin:0 32px;}
.stat-wrap-hdr{margin-bottom:16px}
.stat-wrap-title{font-family:'Sora',sans-serif;font-size:20px;font-weight:800;color:var(--dark);letter-spacing:-.4px}
.stat-wrap-sub{font-size:12px;color:var(--muted);margin-top:4px}
.stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.stat-card{background:white;border-radius:16px;padding:24px 22px 20px;position:relative;border:1.5px solid rgba(15,38,91,0.07);box-shadow:0 2px 12px rgba(15,38,91,0.06);text-decoration:none;color:inherit;display:block;transition:transform .18s,box-shadow .18s;overflow:hidden}
.stat-card:hover{transform:translateY(-3px);box-shadow:0 10px 32px rgba(15,38,91,0.11)}
.stat-card::before{content:'';position:absolute;top:0;left:0;bottom:0;width:4px}
.sc-navy::before{background:linear-gradient(180deg,#2563eb,#1e40af)}
.sc-green::before{background:linear-gradient(180deg,#16a34a,#15803d)}
.sc-amber::before{background:linear-gradient(180deg,#d97706,#b45309)}
.sc-red::before{background:linear-gradient(180deg,#dc2626,#b91c1c)}
.stat-icon-bg{position:absolute;top:16px;right:16px;width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;opacity:.08}
.stat-icon-bg svg{width:22px;height:22px;stroke-width:2;fill:none}
.si-navy-bg{background:#2563eb}
.si-green-bg{background:#16a34a}
.si-amber-bg{background:#d97706}
.si-red-bg{background:#dc2626}
.stat-label{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--muted);font-family:'Sora',sans-serif;margin-bottom:10px;padding-left:10px}
.stat-num{font-size:38px;font-weight:800;color:var(--dark);font-family:'Sora',sans-serif;line-height:1;letter-spacing:-1.5px;margin-bottom:8px;padding-left:10px}
.stat-sub{font-size:11px;color:var(--muted);display:flex;align-items:center;gap:5px;padding-left:10px}
.stat-sub-dot{width:6px;height:6px;border-radius:50%;flex-shrink:0}
.sub-navy .stat-sub-dot{background:#2563eb}
.sub-green .stat-sub-dot{background:#16a34a}
.sub-amber .stat-sub-dot{background:#d97706}
.sub-red .stat-sub-dot{background:#dc2626}
.stat-arrow{position:absolute;bottom:20px;right:18px;color:var(--muted);opacity:.4}
.stat-arrow svg{width:14px;height:14px;stroke:currentColor;stroke-width:2;fill:none}
@media(max-width:900px){.stat-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:540px){.stat-grid{grid-template-columns:1fr}}
</style>
@endsection
@section('admin-content')
@php
$user = Auth::guard('admin')->user();
@endphp
<div class="screen active" id="screen-blog" style="margin-top: 20px;">
    @php
        $totalCount     = $posts->count();
        $publishedCount = $posts->where('is_published', 1)->count();
        $draftCount     = $posts->where('is_published', 0)->whereNull('published_at')->count();
    @endphp
    <div class="stat-wrap">
        <div class="stat-wrap-hdr">
            <div class="stat-wrap-title">Posts / Blog</div>
            <div class="stat-wrap-sub">{{ $totalCount }} total posts across all statuses</div>
        </div>
        <div class="stat-grid">

            {{-- Total Posts --}}
            <div class="stat-card sc-navy">
                <div class="stat-label">Total Posts</div>
                <div class="stat-num">{{ number_format($totalCount) }}</div>
                <div class="stat-sub sub-navy">
                    <span class="stat-sub-dot"></span> All statuses combined
                </div>
            </div>

            {{-- Published --}}
            <div class="stat-card sc-green">
                <div class="stat-label">Published</div>
                <div class="stat-num">{{ number_format($publishedCount) }}</div>
                <div class="stat-sub sub-green">
                    <span class="stat-sub-dot"></span> Live on site
                </div>
            </div>

            {{-- Draft --}}
            <div class="stat-card sc-amber">
                <div class="stat-label">Draft Posts</div>
                <div class="stat-num">{{ number_format($draftCount) }}</div>
                <div class="stat-sub sub-amber">
                    <span class="stat-sub-dot"></span> Not yet published
                </div>
            </div>

            {{-- Trashed --}}
            <a href="{{ route('admin.posts.trashed') }}" class="stat-card sc-red">
                <div class="stat-label">Soft Deleted</div>
                <div class="stat-num">{{ number_format($trashedCount) }}</div>
                <div class="stat-sub sub-red">
                    <span class="stat-sub-dot"></span> Posts in trash
                </div>
            </a>

        </div>
    </div>
    <div class="page-panel">
        <div class="page-hdr">
            <div>
                <div class="page-sub" style="margin-top:0;">Filter &amp; manage posts below</div>
            </div>
            <div class="page-actions">
                @if ($user->can('post.create'))
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-outline">
                        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        New Editorial Post
                    </a>
                    <a href="{{ route('admin.posts.create') }}?type=sponsored" class="btn btn-orange">
                        <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        New Sponsored Post
                    </a>
                @endif
            </div>
        </div>
        <div class="filters-bar">
            <input id="filter-search" class="f-search" type="text" placeholder="Search post title or author..." />
            <select id="filter-status" class="f-select">
                <option value="all">All Statuses</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="scheduled">Scheduled</option>
            </select>
            <select id="filter-category" class="f-select">
                <option value="all">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ strtolower($cat->name) }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="button" id="filter-clear" class="btn btn-outline f-ml">Clear</button>
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div>
                    <div class="table-card">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="data-table">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Published</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td style="font-weight:600; max-width:260px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $post->title }}</td>
                                    <td><span>{{ optional($post->postCategory)->name ?? 'Uncategorized' }}</span></td>
                                    <td>
                                        @if ($post->is_published == 1)
                                            <span class="badge badge-green">Published</span>
                                        @elseif ($post->published_at)
                                            <span class="badge badge-blue">Scheduled</span>
                                        @else
                                            <span class="badge badge-amber">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->published_at)
                                            {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}
                                        @else
                                            {{ $post->created_at->format('M d, Y') }}
                                        @endif
                                    </td>
                                    <!-- <td style="display:flex;justify-content:flex-start; gap:8px; flex-wrap:wrap;">
                                        <a class="btn btn-outline" href="{{ route('admin.posts.edit', $post->id) }}" style="padding:8px 14px;font-size:12px;">Edit</a>
                                        <a class="btn btn-primary text-white" href="{{ route('posts.show', $post->slug) }}" target="_blank" style="padding:8px 14px;font-size:12px;">View Live</a>
                                        @if ($post->is_published == 1 && $user->can('post.edit'))
                                            <button type="button" class="btn btn-outline" style="padding:8px 14px;font-size:12px;color:var(--amber);border-color:var(--amber);">Unpublish</button>
                                        @elseif ($user->can('post.edit'))
                                            <button type="button" class="btn btn-outline" style="padding:8px 14px;font-size:12px;color:var(--green);border-color:var(--green);">Publish</button>
                                        @endif
                                        @if ($user->can('post.delete'))
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" style="display:inline;">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-outline show_confirm" style="padding:8px 14px;font-size:12px;color:var(--red);border-color:var(--red);">Delete</button>
                                        </form>
                                        @endif
                                    </td> -->
                                    <td style="display:flex; gap:6px; flex-wrap:wrap;">
                                        <a class="btn btn-info text-white" href="{{ route('posts.show', $post->slug) }}" target="_blank">
                                            <i class="bi bi-globe"></i>
                                        </a>
                                        <a class="btn btn-secondary text-white" href="{{ route('admin.posts.show', $post->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if ($user->can('post.edit'))
                                        <a class="btn btn-success text-white" href="{{ route('admin.posts.edit', $post->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif

                                        @if ($user->can('post.delete'))
                                        <form method="POST"
                                            action="{{ route('admin.posts.destroy', $post->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a type="submit" class="btn btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </form>
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

        $('#master').on('click', function() {
            $(".sub_chk").prop('checked', $(this).is(':checked'));
        });

        $('.delete_all').on('click', function() {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                swal("Please select at least one post.", {
                    icon: "info",
                });
                return;
            }

            var join_selected_values = allVals.join(",");

            swal({
                title: `Delete ${allVals.length} selected post${allVals.length > 1 ? 's' : ''}?`,
                text: "They will be moved to trash.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (!willDelete) return;

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
                            swal("Deleted!", data['success'], "success");
                        } else if (data['error']) {
                            swal("Error", data['error'], "error");
                        } else {
                            swal("Error", "Whoops something went wrong!", "error");
                        }
                    },
                    error: function(data) {
                        swal("Error", data.responseText, "error");
                    }
                });
            });
        });
    </script>
</div>
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
        const table = $('#dataTable').DataTable({
            responsive: true,
            order: [[0, 'asc']],
            columnDefs: [
                { orderable: false, targets: 4 }
            ]
        });

        $.fn.dataTable.ext.search.push(function(settings, data) {
            const searchTerm = $('#filter-search').val().toLowerCase();
            const statusFilter = $('#filter-status').val();
            const categoryFilter = $('#filter-category').val();

            const title = data[0].toString().toLowerCase();
            const category = data[1].toString().toLowerCase();
            const status = data[2].toString().toLowerCase();

            const matchesSearch = !searchTerm || title.includes(searchTerm) || category.includes(searchTerm);
            const matchesStatus = statusFilter === 'all' || status.includes(statusFilter);
            const matchesCategory = categoryFilter === 'all' || category === categoryFilter;

            return matchesSearch && matchesStatus && matchesCategory;
        });

        const redrawFilters = () => table.draw();

        $('#filter-search').on('keyup change', redrawFilters);
        $('#filter-status').on('change', redrawFilters);
        $('#filter-category').on('change', redrawFilters);
        $('#filter-clear').on('click', function() {
            $('#filter-search').val('');
            $('#filter-status').val('all');
            $('#filter-category').val('all');
            redrawFilters();
        });
    }
</script>
@endsection