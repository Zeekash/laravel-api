<title>Moving Route - Create</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    label {
        font-size: 20px !important
    }

    body {
        background: rgb(250, 250, 250);
    }
</style>

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">

                    <h4 class="header-title">Moving Route - Create</h4>
                    {{-- @include('flash-message') --}}
                    @if ($errors->any())
    <div class="alert alert-danger alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-times-circle"></i>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-check-circle"></i>

        {{ Session::get('success') }}

    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-times-circle"></i>

        {{ Session::get('error') }}

    </div>
@endif

                    <form action="{{ route('admin.moving-route.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Seo Tags</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta
                                                Description</label>
                                            <input type="text" name="meta_description" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Moving Route</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Title</label>
                                            <input type="text" name="title" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Feature Image</label>
                                            <input type="file" name="image" class="form-control">

                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Upper Content</label>
                                            <textarea name="upper_content" rows="10" cols="30" class="form-control" id="upper" required></textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Lower Content</label>
                                            <textarea name="lower_content" rows="10" cols="30" class="form-control" id="lower" required></textarea>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#upper').summernote({
            toolbar: [
                // Font Styling
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['forecolor', 'backcolor']],
                ['height', ['height']],

                // Lists
                ['para', ['ul', 'ol', 'paragraph']],

                // Inserting links, images, and videos
                ['insert', ['link', 'picture', 'video']],

                // Tables
                ['table', ['table']],

                // Miscellaneous
                ['view', ['fullscreen', 'codeview', 'help']],
                ['undo', ['undo']],
                ['redo', ['redo']]
            ],
            fontSizes: ['10', '16', '20', '22', '25', '28', '30', '32', '35', '40', '45'],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather','Times New Roman','poppins'],
            height: 400,
            width: "100%"
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#lower').summernote({
            toolbar: [
                // Font Styling
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname', ['fontname']],
                ['color', ['forecolor', 'backcolor']],
                ['height', ['height']],

                // Lists
                ['para', ['ul', 'ol', 'paragraph']],

                // Inserting links, images, and videos
                ['insert', ['link', 'picture', 'video']],

                // Tables
                ['table', ['table']],

                // Miscellaneous
                ['view', ['fullscreen', 'codeview', 'help']],
                ['undo', ['undo']],
                ['redo', ['redo']]
            ],
            fontSizes: ['10', '16', '20', '22', '25', '28', '30', '32', '35', '40', '45'],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather','Times New Roman','poppins'],
            height: 400,
            width: "100%"
        });
    });
</script>
