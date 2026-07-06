@extends('company.layouts.master')

@section('styles')
<script src="https://cdn.tiny.cloud/1/bla3in5mekps8j8jx4wl64e2tqqdmz9cxn49sfiv0girkq2y/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<style>
    .sp-container {
        /* max-width: 1200px; */
        margin: 0 auto;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    .sp-header {
        margin-bottom: 24px;
    }
    .sp-header h2 {
        font-weight: 700;
        color: #1e293b;
        font-size: 28px;
        margin-bottom: 8px;
    }
    .sp-header p {
        color: #64748b;
        font-size: 15px;
        margin-bottom: 0;
    }
    .sp-alert {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        padding: 14px 20px;
        border-radius: 8px;
        font-size: 14px;
        display: flex;
        align-items: center;
        margin-bottom: 24px;
    }
    .sp-alert i {
        margin-right: 12px;
        font-size: 18px;
    }
    .sp-price-box {
        background-color: #1e293b;
        color: #ffffff;
        padding: 10px 30px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    .title {
        color: rgba(255, 255, 255, .6) !important;
    }
    .sp-price-box .title {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 4px;
    }
    .sp-price-box .subtitle {
        color: #94a3b8;
        font-size: 11px;
    }
    .sp-price-box .price {
        font-weight: 700;
        font-size: 32px;
    }
    .sp-form-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 30px;
    }
    .sp-form-group {
        margin-bottom: 20px;
    }
    .sp-label-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    .sp-label {
        font-weight: 700;
        font-size: 13px;
        color: #1e293b;
    }
    .sp-label .req {
        color: #ef4444;
        margin-left: 2px;
    }
    .sp-counter {
        font-size: 12px;
        color: #94a3b8;
        font-weight: 500;
    }
    .sp-input, .sp-select {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 12px 16px;
        font-size: 14px;
        color: #334155;
        transition: all 0.2s;
    }
    .sp-input::placeholder, .sp-textarea::placeholder, .sp-select::placeholder {
        color: #94a3b8;
    }
    .sp-input:focus, .sp-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }
    .sp-textarea {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 12px 16px;
        font-size: 14px;
        color: #334155;
        resize: vertical;
        transition: all 0.2s;
    }
    .sp-textarea:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }
    .sp-upload-box {
        border: 2px dashed #cbd5e1;
        background-color: #f8fafc;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        position: relative;
        transition: all 0.2s;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 160px;
        overflow: hidden;
    }
    .sp-upload-box:hover {
        background-color: #f1f5f9;
        border-color: #94a3b8;
    }
    .sp-upload-box.has-preview {
        border-color: #16a34a;
        background: #000;
        padding: 0;
    }
    .sp-upload-box input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 10;
    }
    .sp-upload-placeholder i {
        font-size: 28px;
        color: #94a3b8;
        margin-bottom: 8px;
        display: block;
    }
    .sp-upload-placeholder .upload-text {
        font-weight: 600;
        font-size: 14px;
        color: #475569;
        margin-bottom: 4px;
    }
    .sp-upload-placeholder .upload-sub {
        font-size: 12px;
        color: #94a3b8;
    }
    #image-preview-img {
        display: none;
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 8px;
    }
    .preview-overlay {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.55);
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 10px;
        text-align: center;
        z-index: 5;
    }
    .sp-upload-box.has-preview .preview-overlay { display: block; }
    .sp-upload-box.has-preview .sp-upload-placeholder { display: none; }
    .sp-editor-textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .sp-editor-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 8px;
    }
    .sp-word-count {
        font-size: 12px;
        color: #ef4444;
        font-weight: 500;
    }
    .sp-submit-btn {
        background-color: #ea580c;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 14px 24px;
        font-size: 16px;
        font-weight: 600;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-top: 24px;
    }
    .sp-submit-btn:hover {
        background-color: #c2410c;
    }
</style>
@endsection

@section('content')
<div class="container-fluid" style="padding: 30px;">
    <div class="sp-container">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="sp-header">
            <h2>Sponsored Blog Post</h2>
            <p>Publish a sponsored article on the MMJ blog. Appears both on the blog and on your company profile page. Flat fee of $199 per post.</p>
        </div>

        <div class="sp-alert">
            <i class="fa fa-check"></i>
            <span>No payment now. Admin reviews all SEO fields and content before approval. Payment link sent on approval.</span>
        </div>

        <div class="sp-price-box">
            <div>
                <div class="title">Fixed Price</div>
                <div class="subtitle">Per sponsored post - Published on blog + company profile</div>
            </div>
            <div class="price">$199</div>
        </div>

        <div class="sp-form-card">
            <form method="POST" action="{{ route('company.sponsored-posts.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="sp-form-group">
                    <div class="sp-label-row">
                        <div class="sp-label">Post Title <span class="req">*</span></div>
                        <div class="sp-counter" id="title-counter">0 / 100</div>
                    </div>
                    <input type="text" name="title" id="title-input" class="sp-input" placeholder="e.g. How Sarah Moved Her Family from New York to Miami — Stress-Free" maxlength="100" value="{{ old('title') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="sp-form-group">
                            <div class="sp-label-row">
                                <div class="sp-label">Meta Description <span class="req">*</span></div>
                                <div class="sp-counter" id="meta-counter">0 / 160</div>
                            </div>
                            <textarea name="meta_description" id="meta-input" class="sp-textarea" rows="3" placeholder="Google search snippet — describe the post..." maxlength="160" required>{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sp-form-group">
                            <div class="sp-label-row">
                                <div class="sp-label">Focus Keyword <span class="req">*</span></div>
                            </div>
                            <input type="text" name="focus_keyword" class="sp-input" placeholder="e.g. New York to Miami movers" value="{{ old('focus_keyword') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="sp-form-group h-100 mb-0 pb-4">
                            <div class="sp-label-row">
                                <div class="sp-label">Featured Image <span class="req">*</span></div>
                                <div class="sp-counter">Min 1200×630px</div>
                            </div>
                            <div class="sp-upload-box" id="upload-box">
                                <input type="file" name="image" id="image-file-input" accept="image/*" required>
                                <img id="image-preview-img" src="" alt="Preview">
                                <div class="preview-overlay"><i class="fa fa-edit me-1"></i> Click to change image</div>
                                <div class="sp-upload-placeholder" id="upload-placeholder">
                                    <i class="fa fa-cloud-upload-alt"></i>
                                    <div class="upload-text">Click or drag to upload image</div>
                                    <div class="upload-sub">Min 1200×630px &bull; Max 5MB &bull; JPG/PNG/WEBP</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sp-form-group mb-0 pb-4">
                            <div class="sp-label-row">
                                <div class="sp-label">Post Category <span class="req">*</span></div>
                            </div>
                            <select name="post_category_id" class="sp-select" required>
                                <option value="">Select category..</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('post_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name ?? $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="sp-form-group mb-0">
                    <div class="sp-label-row mt-4" style="margin-bottom: 8px;">
                        <div class="sp-label">Post Body <span class="req">*</span></div>
                        <div class="sp-counter" id="body-word-count" style="color:#ea580c;">0 words — minimum 300 required</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <textarea name="body" rows="10" cols="30" class="form-control" id="mytextarea">{{ old('body') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="sp-submit-btn">
                    <i class="fa fa-paper-plane"></i> Submit Request — No Payment Now
                </button>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const titleInput   = document.getElementById('title-input');
        const titleCounter = document.getElementById('title-counter');
        const metaInput    = document.getElementById('meta-input');
        const metaCounter  = document.getElementById('meta-counter');

        function updateTitleCount() {
            titleCounter.textContent = titleInput.value.length + " / 100";
        }
        function updateMetaCount() {
            metaCounter.textContent = metaInput.value.length + " / 160";
        }

        titleInput.addEventListener('input', updateTitleCount);
        metaInput.addEventListener('input', updateMetaCount);
        updateTitleCount();
        updateMetaCount();

        // ── Featured Image Live Preview ─────────────────────────────────
        const fileInput   = document.getElementById('image-file-input');
        const previewImg  = document.getElementById('image-preview-img');
        const uploadBox   = document.getElementById('upload-box');
        const placeholder = document.getElementById('upload-placeholder');

        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Please select a valid image file.');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('Image must be smaller than 5MB.');
                fileInput.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (ev) {
                previewImg.src        = ev.target.result;
                previewImg.style.display = 'block';
                uploadBox.classList.add('has-preview');
            };
            reader.readAsDataURL(file);
        });
    });
</script>
<script>
    tinymce.init({
            selector: '#mytextarea',
            height: 500,
            extended_valid_elements: 'i[class],b',
            protect: [
                /\<i class=".*?"\>\<\/i\>/g
            ],
            content_css: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
            plugins: 'wordcount codesample code image table lists advlist numlist link charmap emoticons fullscreen preview searchreplace visualblocks',
            setup: function(editor) {
                var updateCount = function() {
                    var count = editor.plugins.wordcount ? editor.plugins.wordcount.body.getWordCount() : 0;
                    var el = document.getElementById('body-word-count');
                    if (el) {
                        el.textContent = count + ' words \u2014 minimum 300 required';
                        el.style.color = count >= 300 ? '#16a34a' : '#ea580c';
                    }
                };
                editor.on('keyup change input NodeChange', updateCount);
                editor.on('init', updateCount);
            },
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
            ]
        });
</script>
@endsection