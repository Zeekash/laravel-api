@extends('backend.layouts.master')

@section('title')
    Post Faq - Create
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <h4 class="page-title pull-left">Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.company-faq.index') }}">Post Faq</a></li>
                        <li><span>Edit</span></li>
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
                        <h4 class="header-title">Edit Post Faq</h4>
                        @include('backend.layouts.partials.messages')

                            <form action="{{ route('admin.post-faq.update', $postFaq->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr id="initialRow">
                                            <td class="col-md-3">
                                                <select name="post_id" id="postSelect" class="form-control"> 
                                                    <option value="">Select Post</option>
                                                    @foreach ($posts as $post)
                                                    <option value="{{ $post->id }}"
                                                        {{ $postFaq->post_id == $post->id ? 'selected' : '' }}>
                                                        {{ $post->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-md-3">
                                                <input type="text" class="form-control" name="question" placeholder="Enter Question" value="{{$postFaq->question}}">
                                            </td>
                                            <td class="col-md-4">
                                                <textarea type="text" class="form-control" name="answer" placeholder="Enter Answer" value="{{$postFaq->answer}}">{{$postFaq->answer}}</textarea>
                                            </td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection
<script>
    $('#hide-msg').show();
    setTimeout(function() {
        $('#hide-msg').hide();
    }, 5000);
</script>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  
    
    <script>
        $(document).ready(function() {
            $('#postSelect').select2({
                placeholder: 'Search for a post',
                allowClear: true, // Option to clear the selected value
                // Additional options and customization can be added here
            });
        });
    </script>
@endsection
