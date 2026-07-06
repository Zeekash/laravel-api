
@extends('backend.layouts.master')

@section('title')
User Edit - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Edit Comment</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <!-- <li><a href="{{ route('admin.users.index') }}">All Users</a></li> -->
                    <li><span>Edit Comment </span></li>
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
                    <h4 class="header-title">Edit Comment</h4>
                    <!-- @include('backend.layouts.partials.messages') -->

                    <form method="post" action="{{ route('admin.comments.update', $comment->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="label">Status: </label>
                            <select class="form-control" name="status" id="">
                                @if ($comment->status === 1)
                                    <option value="1">Verified</option>
                                    <option value="0">Not Verified</option>
                                @else
                                <option value="0">Not Verified</option>
                                <option value="1">Verified</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label">Name : </label>
                            <input type="text" value="{{ $comment->name }}" name="name" class="form-control" readonly/>
                        </div>
                        <div class="form-group">
                            <label class="label">Email : </label>
                            <input type="email" value="{{ $comment->email }}" name="email" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="label">Post Title </label>
                            <input type="text" value="{{ $comment->post->title }}" name="body"
                                class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="label">Comment</label>
                            <textarea type="text" value="{{ $comment->body }}" name="body" class="form-control">{{$comment->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection