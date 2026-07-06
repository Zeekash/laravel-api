
@extends('backend.layouts.master')
@section('title','City To State Route Edit')
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
{{-- admin@mymovingjourney.com TinyMCE Token --}}
{{-- <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 500,
        plugins: 'codesample code image table lists advlist numlist link charmap emoticons fullscreen preview searchreplace visualblocks',
        codesample_languages: [{
                text: 'HTML/XML',
                value: 'markup'
            },
            {
                text: 'JavaScript',
                value: 'javascript'
            },
            {
                text: 'CSS',
                value: 'css'
            },
            {
                text: 'PHP',
                value: 'php'
            },
            {
                text: 'Ruby',
                value: 'ruby'
            },
            {
                text: 'Python',
                value: 'python'
            },
            {
                text: 'Java',
                value: 'java'
            },
            {
                text: 'C',
                value: 'c'
            },
            {
                text: 'C#',
                value: 'csharp'
            },
            {
                text: 'C++',
                value: 'cpp'
            }
        ],
        toolbar: 'undo redo|blocks|fontsize|forecolor|bold italic |bullist numlist | alignleft aligncenter alignright | indent outdent  | table | image | code codesample | link | fullscreen | preview | searchreplace | visualblocks | removeformat ',
        convert_urls: true, // normalize what users paste/type
        relative_urls: false, // no ../ or relative paths
        remove_script_host: false, // keep https://mymovingjourney.com
        document_base_url: 'https://mymovingjourney.com/', // your canonical root

        // Optional: help users who paste bare domains
        link_default_protocol: 'https',
        font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 36pt 48pt 50pt',
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                });
                reader.readAsDataURL(file);
            });

            input.click();
        },
    });
</script> --}}
{{-- <style>
    label {
        font-size: 20px !important
    }

    body {
        background: rgb(250, 250, 250);
    }
</style> --}}

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <a href="{{ route('admin.city-to-state-routes.index') }}" class="btn btn-primary float-right "> Back</a>
                    <h4 class="header-title">City To State Route - Edit</h4>
                    <div class="clearfix"></div>
                    @include('flash-message')
                    <form action="{{ route('admin.city-to-state-routes.update', $cityToStateRoute->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="card mt-2">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Seo Tags</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta Title</label>
                                            <input type="text" name="meta_title" value="{{ $stateToStateRoute->meta_title }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Meta
                                                Description</label>
                                            <input type="text" name="meta_description" value="{{ $stateToStateRoute->meta_description }}" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>City To State Route</h2>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Title</label>
                                            <input type="text" name="title" value="{{ $stateToStateRoute->title }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Slug (add slug
                                                without hiphen ``-``)</label>
                                            <input type="text" name="slug" value="{{ $stateToStateRoute->slug }}" class="form-control">

                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Miles</label>
                                            <input type="text" name="miles" value="{{ $cityToStateRoute->miles }}" class="form-control">

                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Min Cost</label>
                                            <input type="text" name="min_cost" value="{{ $stateToStateRoute->min_cost }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Max Cost</label>
                                            <input type="text" name="max_cost" value="{{ $stateToStateRoute->max_cost }}" class="form-control">

                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">City From</label>
                                            <Select class="form-control citySelect2" name="city_from_id">
                                                <option value="" selected disabled>--- Select City From ---</option>
                                                @foreach ($cities as $cityFrom)
                                                    <option value="{{ $cityFrom->id }}" {{ $cityToStateRoute->city_from_id == $cityFrom->id ? 'selected' : '' }}> {{ $cityFrom->name }}, {{ $cityFrom->state->abv }}</option>
                                                @endforeach
                                            </Select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">State To</label>
                                            <Select class="form-control stateSelect2" name="state_to_id">
                                                <option value="" selected disabled>--- Select State To ---</option>
                                                @foreach ($states as $stateTo)
                                                    <option value="{{ $stateTo->id }}" {{ $cityToStateRoute->state_to_id == $stateTo->id ? 'selected' : '' }}> {{ $stateTo->name }}</option>
                                                @endforeach
                                            </Select>
                                        </div>
                                    </div>
                                    
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Upper Content</label>
                                            <textarea name="upper_content" rows="10" cols="30" class="form-control" id="mytextarea">{{ $stateToStateRoute->upper_content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Middle Content</label>
                                            <textarea name="middle_content" rows="10" cols="30" class="form-control" id="mytextarea">{{ $stateToStateRoute->middle_content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Bottom Content</label>
                                            <textarea name="bottom_content" rows="10" cols="30" class="form-control" id="mytextarea">{{ $stateToStateRoute->bottom_content }}</textarea>
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.citySelect2').select2({
            placeholder: 'Search for a City',
            allowClear: true,
        });

        $('.stateSelect2').select2({
            placeholder: 'Search for a State',
            allowClear: true,
        });
    });

</script>
@endsection