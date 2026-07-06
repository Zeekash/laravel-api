{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
@extends('backend.layouts.master')
@section('title','Resource Other Mover Edit')
@section('admin-content')
<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 500,
        extended_valid_elements: 'i[class],b',
        protect: [
            /\<i class=".*?"\>\<\/i\>/g
        ],
        content_css: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
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
                    <a href="{{ route('admin.resource.other.mover.index') }}" class="btn btn-primary float-right "> Back</a>
                    <h4 class="header-title">Resource Other Mover - Edit</h4>
                    @include('flash-message')
                    <form action="{{ route('admin.resource.other.mover.update',$otherMover->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="card-head">
                                    <h2>Resoruce Other Mover</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Heading</label>
                                            <input type="text" name="heading" class="form-control" value="{{ $otherMover->heading }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point 1</label>
                                            <input type="text" name="point_one" class="form-control"  value="{{ $otherMover->point_one }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point 2</label>
                                            <input type="text" name="point_two" class="form-control"  value="{{ $otherMover->point_two }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Point 3</label>
                                            <input type="text" name="point_three" class="form-control"  value="{{ $otherMover->point_three }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Position</label>
                                            <select name="position" id="" class="form-control">
                                                <option value="{{ $otherMover->position }}">Current: {{ $otherMover->position }}</option>
                                                @for ($i=1 ; $i <=10 ; $i ++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Company</label>
                                            <select name="company_id" id="" class="form-control">
                                                <option value="{{ $otherMover->company->id }}">Current: {{ $otherMover->company->company_name }}</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Resource Page</label>
                                            <select name="resource_page_id" id="" class="form-control">
                                                <option value="{{ $otherMover->resourcePage->id }}">Current: {{ $otherMover->resourcePage->title }}</option>
                                                @foreach ($resource_pages as $resourcePage)
                                                    <option value="{{ $resourcePage->id }}">{{ $resourcePage->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Content</label>
                                            {{-- <textarea name="body" rows="10" cols="30" class="form-control" id="summernote" required></textarea> --}}
                                            <textarea name="content"  rows="10" cols="30" class="form-control" id="mytextarea">{{ $otherMover->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
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
