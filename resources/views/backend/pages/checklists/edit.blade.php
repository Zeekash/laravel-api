@extends('backend.layouts.master')

@section('title')
    Checklists - Edit
@endsection

@section('styles')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection


@section('admin-content')
    <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/6/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector: '#myheading',
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
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.checklists.index') }}">Checklists</a></li>
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
                        <h4 class="header-title">Edit Checklist Category</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.checklists.update', $checklist->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <table width="100%">
                                <tbody>
                                    <tr id="initialRow">
                                        <td>
                                            <select name="checklist_category_id" id="companySelect" class="form-control">
                                                <option value="{{ $checklist->category->id }}">Selected:
                                                    {{ $checklist->category->heading }}</option>
                                                @foreach ($checklist_categories as $checklistCategory)
                                                    <option value="{{ $checklistCategory->id }}">
                                                        {{ $checklistCategory->heading }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>

                                            <textarea name="heading" rows="10" cols="30" class="form-control" id="myheading"
                                                value="{{ $checklist->heading }}">{{ $checklist->heading }}</textarea>
                                        </td>
                                        <td>

                                            <textarea name="description" rows="10" cols="30" class="form-control" id="mytextarea"
                                                value="{{ $checklist->description }}">{{ $checklist->description }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection
