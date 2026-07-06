@extends('backend.layouts.master')
@section('title', 'Edit Post')
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
            convert_urls: true,
            relative_urls: false,
            remove_script_host: false,
            document_base_url: 'https://mymovingjourney.com/',
            link_default_protocol: 'https',
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 36pt 48pt 50pt',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });
                input.click();
            },
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('drag-drop-zone');
            const fileInput = document.getElementById('featured_image_input');
            const titleInput = document.getElementById('title-input');
            const titleCount = document.getElementById('title-count');
            const slugInput = document.getElementById('slug_input');
            const previewSlug = document.getElementById('preview_slug');
            const metaTitleInput = document.getElementById('meta_title_input');
            const metaDescInput = document.getElementById('meta_desc_input');
            const previewTitle = document.getElementById('preview_title');
            const previewDesc = document.getElementById('preview_desc');
            const metaTitleCount = document.getElementById('meta_title_count');
            const metaDescCount = document.getElementById('meta_desc_count');
            const previewFinalCost = document.getElementById('preview_final_cost');
            const previewDistance = document.getElementById('preview_distance');
            const previewDamaged = document.getElementById('preview_damaged');
            const inputFinalCost = document.querySelector('input[name="final_cost"]');
            const inputDistance = document.querySelector('input[name="distance"]');
            const inputItemsDamaged = document.querySelector('input[name="items_damaged"]');
            const btnSchedule = document.getElementById('btn-schedule');
            const scheduleContainer = document.getElementById('schedule-container');
            const scheduleMsg = document.getElementById('schedule-msg');
            const scheduleSubmit = document.getElementById('btn-schedule-submit');
            const statusIndicator = document.getElementById('status-indicator');
            const publishButton = document.querySelector('button[name="status"][value="published"]');
            const draftButton = document.querySelector('button[name="status"][value="draft"]');
            const sponsoredToggle = document.getElementById('is_sponsored_toggle');
            const moveGlanceSection = document.getElementById('move-glance-section');
            const companyProfileSection = document.getElementById('company-profile-section');
            const previewSponsoredBanner = document.getElementById('preview_sponsored_banner');
            const companyProfileInput = document.getElementById('company_profile_input');
            const previewSponsoredText = document.getElementById('preview_sponsored_text');
            const btnFullPreview = document.getElementById('btn-full-preview');
            const fullPreviewMsg = document.getElementById('full-preview-msg');

            if (dropZone && fileInput) {
                dropZone.addEventListener('click', (e) => {
                    if (e.target !== fileInput) {
                        fileInput.click();
                    }
                });
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.style.borderColor = 'var(--primary)';
                    dropZone.style.background = '#fff';
                });
                dropZone.addEventListener('dragleave', function(e) {
                    e.preventDefault();
                    dropZone.style.borderColor = '#d1d5db';
                    dropZone.style.background = '#f9fafb';
                });
                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.style.borderColor = 'var(--primary)';
                    if (e.dataTransfer.files && e.dataTransfer.files.length) {
                        fileInput.files = e.dataTransfer.files;
                        fileInput.dispatchEvent(new Event('change'));
                    }
                });
                fileInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const fileNameEl = document.getElementById('drop-zone-file-name');
                        if (fileNameEl) {
                            fileNameEl.innerText = 'Selected image: ' + this.files[0].name;
                            fileNameEl.style.color = 'var(--primary)';
                        }
                        dropZone.style.borderColor = 'var(--primary)';
                        dropZone.style.background = '#fff';
                    }
                });
            }

            const updateCounts = () => {
                if (titleInput && titleCount) titleCount.innerText = titleInput.value.length + ' / 100';
                if (slugInput && previewSlug) previewSlug.innerText = slugInput.value ? 'mymovingjourney.com/blog/' + slugInput.value : 'mymovingjourney.com/blog/post-title';
                if (metaTitleInput && previewTitle) previewTitle.innerText = metaTitleInput.value || 'Meta Title Preview';
                if (metaDescInput && previewDesc) previewDesc.innerText = metaDescInput.value || 'Meta description preview...';
                if (metaTitleInput && metaTitleCount) metaTitleCount.innerText = metaTitleInput.value.length + ' / 60';
                if (metaDescInput && metaDescCount) metaDescCount.innerText = metaDescInput.value.length + ' / 160';
                if (titleInput) {
                    const titleText = titleInput.value.trim() || 'Post title...';
                    document.querySelectorAll('.sidebar_preview_title').forEach(el => el.innerText = titleText);
                }
            };

            if (titleInput) {
                titleInput.addEventListener('input', () => {
                    updateCounts();
                    if (slugInput) {
                        slugInput.value = titleInput.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
                    }
                });
            }
            if (slugInput) slugInput.addEventListener('input', updateCounts);
            if (metaTitleInput) metaTitleInput.addEventListener('input', updateCounts);
            if (metaDescInput) metaDescInput.addEventListener('input', updateCounts);
            if (inputFinalCost && previewFinalCost) inputFinalCost.addEventListener('input', function() { previewFinalCost.innerText = this.value || '$4,200'; });
            if (inputDistance && previewDistance) inputDistance.addEventListener('input', function() { previewDistance.innerText = this.value || '1,278 mi'; });
            if (inputItemsDamaged && previewDamaged) inputItemsDamaged.addEventListener('input', function() { previewDamaged.innerText = this.value || 'Zero'; });

            const setStatusIndicator = (status) => {
                if (!statusIndicator) return;
                const label = status.charAt(0).toUpperCase() + status.slice(1);
                statusIndicator.innerHTML = 'Status: <strong>' + label + '</strong>';
                statusIndicator.dataset.status = status;
            };

            if (publishButton) {
                publishButton.addEventListener('click', () => setStatusIndicator('published'));
            }
            if (draftButton) {
                draftButton.addEventListener('click', () => setStatusIndicator('draft'));
            }
            if (scheduleSubmit) {
                scheduleSubmit.addEventListener('click', () => setStatusIndicator('scheduled'));
            }
            if (btnSchedule && scheduleContainer) {
                btnSchedule.addEventListener('click', function() {
                    const isHidden = scheduleContainer.style.display === 'none' || scheduleContainer.style.display === '';
                    if (isHidden) {
                        scheduleContainer.style.display = 'block';
                        if (scheduleSubmit) scheduleSubmit.style.display = 'block';
                        if (scheduleMsg) {
                            scheduleMsg.style.display = 'block';
                            setTimeout(() => { scheduleMsg.style.display = 'none'; }, 3000);
                        }
                        setStatusIndicator('scheduled');
                    } else {
                        scheduleContainer.style.display = 'none';
                        if (scheduleSubmit) scheduleSubmit.style.display = 'none';
                        if (scheduleMsg) scheduleMsg.style.display = 'none';
                    }
                });
            }

            if (sponsoredToggle) {
                const updateSponsoredState = () => {
                    const isChecked = sponsoredToggle.checked;
                    if (moveGlanceSection) moveGlanceSection.style.display = isChecked ? 'block' : 'none';
                    if (companyProfileSection) companyProfileSection.style.display = isChecked ? 'block' : 'none';
                    if (previewSponsoredBanner) previewSponsoredBanner.style.display = isChecked ? 'flex' : 'none';
                };
                sponsoredToggle.addEventListener('change', updateSponsoredState);
                updateSponsoredState();
            }

            if (companyProfileInput && previewSponsoredText) {
                companyProfileInput.addEventListener('input', function() {
                    const val = this.value.trim();
                    previewSponsoredText.innerText = val ? 'Published on behalf of ' + val : 'Published on behalf of NXT Level Moving LLC';
                });
            }

            if (btnFullPreview && fullPreviewMsg) {
                btnFullPreview.addEventListener('click', function() {
                    fullPreviewMsg.style.display = 'block';
                    setTimeout(() => { fullPreviewMsg.style.display = 'none'; }, 3000);
                });
            }

            updateCounts();

            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function() {
                    if (typeof tinymce !== 'undefined') {
                        tinymce.triggerSave();
                    }
                });
            }
        });
    </script>

    <style>
        :root {
            --bg-body: #f4f6f8;
            --bg-card: #ffffff;
            --border-color: #e5e7eb;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --primary: #f05a28;
            --primary-hover: #d94e22;
            --btn-outline: #f3f4f6;
            --btn-outline-border: #d1d5db;
            --btn-outline-text: #1f2937;
            --header-dark: #1e293b;
            --input-border: #d1d5db;
            --input-focus: #f05a28;
        }
        .main-content-inner {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            padding: 2rem 0;
        }
        .cms-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.5rem;
            align-items: start;
        }
        .card-cms {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .card-cms-body {
            padding: 1.5rem;
        }
        .card-cms-header {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-main);
        }
        .card-cms-header.dark {
            background: var(--header-dark);
            color: white;
            border-bottom: none;
        }
        .form-group-cms {
            margin-bottom: 1.25rem;
        }
        .form-group-cms label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-main);
        }
        .input-cms {
            width: 100%;
            padding: 0.625rem 0.875rem;
            border: 1px solid var(--input-border);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            color: var(--text-main);
            transition: border-color 0.2s;
        }
        .input-cms:focus {
            outline: none;
            border-color: var(--input-focus);
            box-shadow: 0 0 0 1px rgba(240, 90, 40, 0.1);
        }
        .slug-wrapper {
            display: flex;
            align-items: stretch;
        }
        .slug-prefix {
            background: #f9fafb;
            border: 1px solid var(--input-border);
            border-right: none;
            padding: 0.625rem 0.875rem;
            border-radius: 0.375rem 0 0 0.375rem;
            color: var(--text-muted);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }
        .slug-input {
            border-radius: 0 0.375rem 0.375rem 0;
            flex: 1;
        }
        .btn-cms {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            border: none;
            transition: all 0.2s;
        }
        .btn-primary-cms {
            background: var(--primary);
            color: white;
        }
        .btn-primary-cms:hover {
            background: var(--primary-hover);
        }
        .btn-outline-cms {
            background: white;
            border: 1px solid var(--btn-outline-border);
            color: var(--btn-outline-text);
        }
        .btn-outline-cms:hover {
            background: var(--btn-outline);
        }
        .btn-danger-light-cms {
            background: #fef2f2;
            color: #ef4444;
            border: 1px solid #fee2e2;
        }
        .btn-danger-light-cms:hover {
            background: #fee2e2;
        }
        .seo-complete {
            background: #ecfdf5;
            color: #059669;
            padding: 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 1px solid #d1fae5;
        }
        .drag-drop-zone {
            border: 2px dashed #d1d5db;
            border-radius: 0.5rem;
            padding: 3rem 1rem;
            text-align: center;
            background: #f9fafb;
            color: var(--text-muted);
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
        }
        .drag-drop-zone:hover {
            border-color: var(--primary);
            background: #fff;
        }
        .meta-text {
            font-size: 0.75rem;
            color: var(--text-muted);
            float: right;
            font-weight: normal;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 36px;
            height: 20px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 20px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        input:checked + .slider {
            background-color: var(--primary);
        }
        input:checked + .slider:before {
            transform: translateX(16px);
        }
        .top-bar-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            color: var(--text-muted);
            font-size: 0.875rem;
        }
        .top-bar-meta .badge {
            color: #3b82f6;
            background: #eff6ff;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-weight: 600;
            font-size: 0.75rem;
        }
        @media (max-width: 1024px) {
            .cms-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="main-content-inner">
        @include('flash-message')
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @php
                $postPublishedAt = $post->published_at ? \Carbon\Carbon::parse($post->published_at) : null;
                $currentStatus = $post->is_published ? 'Published' : ($postPublishedAt && $postPublishedAt->gt(now()) ? 'Scheduled' : 'Draft');
                $scheduleOpen = old('published_at') || (!$post->is_published && $postPublishedAt && $postPublishedAt->gt(now()));
            @endphp
            <div class="cms-container">
                <div class="main-column">
                    <div class="top-bar-meta">
                        <span class="badge">• Editorial Post</span>
                        <span>Written by MMJ Editorial Team</span>
                    </div>

                    <div class="card-cms">
                        <div class="card-cms-body">
                            <div class="form-group-cms">
                                <label>Post Title <span class="meta-text" id="title-count">0 / 100</span></label>
                                <input type="text" name="title" id="title-input" class="input-cms" placeholder="Enter post title.." maxlength="100" required value="{{ old('title', $post->title) }}">
                            </div>
                            <div class="form-group-cms mb-0">
                                <label>Post Slug <span class="meta-text">Used in URL</span></label>
                                <div class="slug-wrapper">
                                    <span class="slug-prefix">/blog/</span>
                                    <input type="text" name="slug" class="input-cms slug-input" placeholder="post-url-slug" id="slug_input" value="{{ old('slug', $post->slug) }}">
                                </div>
                            </div>
                            <div class="form-group-cms mt-3 mb-0">
                                <label>Short Description</label>
                                <input type="text" name="description" class="input-cms" placeholder="Enter short description" value="{{ old('description', $post->description) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Body</label>
                                <textarea name="body" rows="10" cols="30" class="form-control" id="mytextarea">{{ old('body', $post->body) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-cms" id="move-glance-section" style="display: {{ old('is_sponsored', $post->is_sponsored) ? 'block' : 'none' }}; border:none; background:transparent; box-shadow:none;">
                        <div style="font-size:0.75rem; color:var(--text-muted); font-weight:600; text-transform:uppercase; padding: 0 0 0.5rem 0;">
                            Move at a glance — Fill in the customer's move details
                        </div>
                        <div style="background:#0f172a; border-radius:0.5rem; padding:1.5rem; color:white;">
                            <div style="font-size:0.875rem; font-weight:600; margin-bottom:1rem; color:white; text-transform:uppercase;">Move at a Glance</div>
                            <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:1rem;">
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Moving From</label>
                                    <input type="text" name="moving_from" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Brooklyn, NY" value="{{ old('moving_from', $post->moving_from) }}">
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Moving To</label>
                                    <input type="text" name="moving_to" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Miami, FL" value="{{ old('moving_to', $post->moving_to) }}">
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Distance</label>
                                    <input type="text" name="distance" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="1,278 miles" value="{{ old('distance', $post->distance) }}">
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Final Cost</label>
                                    <input type="text" name="final_cost" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="$4,200" value="{{ old('final_cost', $post->final_cost) }}">
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Items Damaged</label>
                                    <input type="text" name="items_damaged" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Zero" value="{{ old('items_damaged', $post->items_damaged) }}">
                                </div>
                                <div>
                                    <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Would Recommend</label>
                                    <input type="text" name="would_recommend" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Yes" value="{{ old('would_recommend', $post->would_recommend) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-cms">
                        <div class="card-cms-header">
                            <div>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                Featured Image 
                                <span style="font-size:0.75rem;color:var(--text-muted);font-weight:normal;margin-left:8px;">min 1200x630px · JPG/PNG · max 5MB</span>
                            </div>
                        </div>
                        <div class="card-cms-body">
                            <div class="drag-drop-zone" id="drag-drop-zone" style="background: {{ $post->image ? 'var(--header-dark)' : '#f9fafb' }}; color: {{ $post->image ? '#ffffff' : 'var(--text-muted)' }};">
                                <div id="drop-zone-content">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="{{ $post->image ? '#ffffff' : '#9ca3af' }}" stroke-width="1.5" style="margin-bottom: 0.5rem;">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                    <p style="margin:0;font-weight:600;color:var(--text-main);font-size:0.875rem;">Click to upload <span style="color:var(--text-muted);font-weight:normal;">or drag & drop</span></p>
                                    <p style="margin:0;font-size:0.75rem;color:var(--text-muted);margin-top:4px;">JPG or PNG · Min 1200x630px · Max 5MB</p>
                                    <p id="drop-zone-file-name" style="margin-top:0.75rem;font-size:0.8rem;color:var(--text-muted);">
                                        @if($post->image)
                                            Current file: {{ basename($post->image) }}
                                        @else
                                            No featured image uploaded yet.
                                        @endif
                                    </p>
                                </div>
                                <input type="file" name="image" accept="image/*" style="display:none;" id="featured_image_input">
                            </div>
                            <div class="form-group-cms mt-3 mb-0">
                                <label>Image Alt Tag</label>
                                <input type="text" name="img_alt" class="input-cms" placeholder="Alt text for image" value="{{ old('img_alt', $post->img_alt) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-cms">
                        <div class="card-cms-header" style="justify-content: space-between;">
                            <div>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                SEO Fields
                            </div>
                            <div style="font-size:0.75rem; color:#ef4444; font-weight:normal;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 2px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                Required before publishing
                            </div>
                        </div>
                        <div class="card-cms-body">
                            <div class="form-group-cms">
                                <label>Meta Title <span style="color:var(--primary);float:right;">*</span></label>
                                <input type="text" name="meta_title" id="meta_title_input" class="input-cms" placeholder="Enter meta title" value="{{ old('meta_title', $post->meta_title) }}">
                                <div style="text-align:right; font-size:0.7rem; color:var(--text-muted); margin-top:4px;" id="meta_title_count">0 / 60</div>
                            </div>
                            <div class="form-group-cms">
                                <label>Meta Description <span style="color:var(--primary);float:right;">*</span></label>
                                <textarea name="meta_description" id="meta_desc_input" class="input-cms" placeholder="Enter meta description" rows="2" style="resize:vertical;">{{ old('meta_description', $post->meta_description) }}</textarea>
                                <div style="text-align:right; font-size:0.7rem; color:var(--text-muted); margin-top:4px;" id="meta_desc_count">0 / 160</div>
                            </div>
                            <div class="form-group-cms">
                                <label>Focus Keyword <span style="color:var(--primary);float:right;">*</span></label>
                                <input type="text" name="meta_keywords" class="input-cms" placeholder="Enter meta keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}">
                            </div>
                            <div style="background:#f9fafb; border:1px solid var(--border-color); border-radius:0.5rem; padding:1.25rem; margin-top:1.5rem;">
                                <div style="font-size:0.75rem; color:#16a34a; margin-bottom:0.25rem;" id="preview_slug">mymovingjourney.com/blog/post-title</div>
                                <div style="color:#2563eb; margin-bottom:0.25rem; line-height:1.2; font-family:arial,sans-serif;" id="preview_title">Meta Title Preview</div>
                                <div style="font-size:0.875rem; color:#4d5156; line-height:1.4; font-family:arial,sans-serif;" id="preview_desc">Meta description preview...</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-column">
                    <div class="card-cms">
                        <div class="card-cms-header dark">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 6px;">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                            Publish
                        </div>
                        <div class="card-cms-body">
                            <div class="seo-complete">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="vertical-align: text-bottom;">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                All SEO fields complete ✓
                            </div>
                            <div id="status-indicator" data-status="{{ old('status', strtolower($currentStatus)) }}" style="margin-bottom:1rem; font-size:0.9rem; color:var(--text-main);">
                                Status: <strong>{{ old('status') ? ucfirst(old('status')) : $currentStatus }}</strong>
                            </div>
                            <button type="submit" class="btn-cms btn-primary-cms" name="status" value="published">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom;">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                                Publish Now
                            </button>
                            <button type="submit" class="btn-cms btn-outline-cms" name="status" value="draft">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom;">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                                Save as Draft
                            </button>
                            <div id="schedule-msg" style="display:none; background: var(--navy); color: white; padding:0.5rem; border-radius:0.375rem; padding: 12px 16px;font-size: 13px;font-weight: 600;font-family: 'Sora', sans-serif; text-align:center; margin-bottom:0.75rem;">Set a date and time — post will publish automatically</div>
                            <button type="button" class="btn-cms btn-outline-cms" id="btn-schedule">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                Schedule
                            </button>
                            <div class="form-group-cms mt-2 mb-3" id="schedule-container" style="display: {{ $scheduleOpen ? 'block' : 'none' }};">
                                <label style="font-weight:normal;font-size:0.75rem;color:var(--text-muted);margin-bottom:0.25rem;">Schedule Date</label>
                                <input type="datetime-local" name="published_at" class="input-cms" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
                                <button type="submit" id="btn-schedule-submit" class="btn-cms btn-primary-cms" name="status" value="scheduled" style="margin-top:0.75rem; display: {{ $scheduleOpen ? 'block' : 'none' }};">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    </svg>
                                    Schedule Post
                                </button>
                            </div>
                            <button type="button" class="btn-cms btn-danger-light-cms" style="margin-top: 1rem;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                Delete Post
                            </button>
                        </div>
                    </div>

                    <div class="card-cms">
                        <div class="card-cms-header">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 6px;">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                            Post Settings
                        </div>
                        <div class="card-cms-body">
                            <div class="form-group-cms">
                                <label>Category <span style="color:var(--primary);float:right;">*</span></label>
                                <select name="post_category_id" class="input-cms" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $selectedCategoryId ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group-cms">
                                <label>Author</label>
                                <input type="text" name="author" class="input-cms" value="{{ old('author', $post->author ?: 'MMJ Editorial Team') }}">
                            </div>
                            <div class="form-group-cms mb-0" style="background:#f9fafb; padding:1rem; border-radius:0.375rem; border:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                                <div>
                                    <div style="font-weight:600; font-size:0.875rem; color:var(--text-main);">Sponsored Post</div>
                                    <div style="font-size:0.75rem; color:var(--text-muted); margin-top:2px;">Auto-applies "Sponsored Content" label</div>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" name="is_sponsored" id="is_sponsored_toggle" value="1" {{ old('is_sponsored', $post->is_sponsored) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group-cms mt-3 mb-0" id="company-profile-section" style="display: {{ old('is_sponsored', $post->is_sponsored) ? 'block' : 'none' }};">
                                <label style="display:flex; justify-content:space-between; font-weight:600; font-size:0.85rem;">
                                    Company Profile Link
                                    <span style="color:#9ca3af; font-weight:normal;">MMJ URL only</span>
                                </label>
                                <input type="text" name="company_profile_link" id="company_profile_input" class="input-cms" placeholder="mymovingjourney.com/company/nxt-level-moving" value="{{ old('company_profile_link', $post->company_profile_link) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-cms">
                        <div class="card-cms-header">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 6px;">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            Preview
                        </div>
                        <div class="card-cms-body" style="padding: 1rem; background: #f8fafc;">
                            <div style="background: white; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 1rem;">
                                <div style="background: #0f172a; padding: 1rem 1rem 0.5rem; min-height: 55px; display: flex; align-items: flex-end;">
                                    <div style="color: white; font-weight: 600; font-size: 0.85rem; width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="sidebar_preview_title">Post title...</div>
                                </div>
                                <div id="preview_sponsored_banner" style="background: #fdf6e3; display: {{ old('is_sponsored', $post->is_sponsored) ? 'flex' : 'none' }}; align-items: center; padding: 0.5rem 1rem; border-bottom: 1px solid #fde047;">
                                    <div style="background: #b45309; color: white; border-radius: 1rem; padding: 0.2rem 0.6rem; font-size: 0.65rem; font-weight: bold; display: flex; align-items: center; gap: 0.25rem;">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                        Sponsored
                                    </div>
                                    <div style="font-size: 0.7rem; color: #b45309; margin-left: 0.5rem; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="preview_sponsored_text">Published on behalf of {{ old('company_profile_link', $post->company_profile_link) ? old('company_profile_link', $post->company_profile_link) : 'NXT Level Moving LLC' }}</div>
                                </div>
                                <div style="padding: 1rem;">
                                    <div style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Customer Story</div>
                                    <div style="font-weight: 700; font-size: 0.80rem; color: #0f172a; margin-bottom: 1rem; line-height: 1.3;" class="sidebar_preview_title">Post title...</div>
                                    <div style="background: #0f172a; border-radius: 0.375rem; padding: 0.75rem; display: flex; justify-content: space-between; text-align: center;">
                                        <div>
                                            <div style="color: #f97316; font-weight: 700; font-size: 0.85rem;" id="preview_final_cost">{{ old('final_cost', $post->final_cost ?: '$4,200') }}</div>
                                            <div style="color: #64748b; font-size: 0.65rem;">Final Cost</div>
                                        </div>
                                        <div>
                                            <div style="color: white; font-weight: 700; font-size: 0.85rem;" id="preview_distance">{{ old('distance', $post->distance ?: '1,278 mi') }}</div>
                                            <div style="color: #64748b; font-size: 0.65rem;">Distance</div>
                                        </div>
                                        <div>
                                            <div style="color: white; font-weight: 700; font-size: 0.85rem;" id="preview_damaged">{{ old('items_damaged', $post->items_damaged ?: 'Zero') }}</div>
                                            <div style="color: #64748b; font-size: 0.65rem;">Damaged</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="full-preview-msg" style="display:none; background:var(--navy);; color:white; padding:0.5rem; border-radius:0.375rem;font-size: 13px;font-weight: 600;font-family: 'Sora', sans-serif; text-align:center; margin-bottom:0.75rem;">Opening full preview in new tab...</div>
                            <button type="button" class="btn-cms" style="background: white; border: 1px solid var(--border-color); color: var(--text-main); font-weight: 600; width: 100%;" id="btn-full-preview">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom; margin-right: 4px;">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                Full Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
