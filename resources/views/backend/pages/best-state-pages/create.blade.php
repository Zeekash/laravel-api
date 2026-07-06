{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
@extends('backend.layouts.master')
@section('title', 'Best State Page Create')
@section('admin-content')
    <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
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
    </script>
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
                        <a href="{{ route('admin.best-state-pages.index') }}" class="btn btn-primary float-right "> Back</a>
                        <h4 class="header-title">Best State Cost - Create</h4>
                        @include('flash-message')
                        <form action="{{ route('admin.best-state-pages.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- SEO TAGS --}}
                            <div class="card mt-2">
                                <div class="card-body">
                                    <div class="card-head">
                                        <h2>SEO Tags</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Meta Description</label>
                                                <input type="text" name="meta_description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MAIN POST CONTENT --}}
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="card-head">
                                        <h2>Best State Page</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Title</label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Description</label>
                                                <input type="text" name="description" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">State</label>
                                                <select class="form-control" name="state_id" required>
                                                    <option value="">--- Select State ---</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Slug (add slug without hyphen "-")</label>
                                                <input type="text" name="slug" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- CONTENT SECTIONS --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Local Mover Content</h2>
                                                </label>
                                                <textarea name="local_mover_content" rows="8" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Compare Mover Content</h2>
                                                </label>
                                                <textarea name="compare_mover_content" rows="8" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Long Distance Mover Content</h2>
                                                </label>
                                                <textarea name="long_distance_mover_content" rows="8" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Container Mover Content</h2>
                                                </label>
                                                <textarea name="container_mover_content" rows="8" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Truck Rental Mover Content</h2>
                                                </label>
                                                <textarea name="truck_rental_mover_content" rows="8" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    <h2>Bottom Content</h2>
                                                </label>
                                                <textarea name="bottom_content" rows="8" class="form-control" id="mytextarea"></textarea>
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
@endsection
