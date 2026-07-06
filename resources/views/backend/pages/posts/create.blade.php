{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
@extends('backend.layouts.master')
@section('title', 'Create Post')

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

    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drag-drop-zone');
        const fileInput = document.getElementById('featured_image_input');
        
        dropZone.addEventListener('click', (e) => {
            if (e.target !== fileInput) {
                fileInput.click();
            }
        });
        
        // Add drag and drop functionality
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
                // trigger change event to update UI
                fileInput.dispatchEvent(new Event('change'));
            }
        });

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const content = document.getElementById('drop-zone-content');
                if (content) {
                    content.innerHTML = '<p style="color:var(--primary); font-weight:bold; margin:0;">' + this.files[0].name + ' selected</p>';
                }
                dropZone.style.borderColor = 'var(--primary)';
                dropZone.style.background = '#fff';
            }
        });

        // Title character count and dynamic updates
        const titleInput = document.getElementById('title-input');
        const titleCount = document.getElementById('title-count');
        const slugInput = document.getElementById('slug_input');
        const previewSlug = document.getElementById('preview_slug');
        
        if (titleInput) {
            titleInput.addEventListener('input', function() {
                const val = this.value;
                if(titleCount) titleCount.innerText = val.length + ' / 100';
                
                // Auto-slugify
                if(slugInput) {
                    const slugVal = val.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
                    slugInput.value = slugVal;
                    if(previewSlug) previewSlug.innerText = slugVal ? 'mymovingjourney.com/blog/' + slugVal : 'mymovingjourney.com/blog/post-title';
                }

                // Update right sidebar Preview titles
                const sidebarTitles = document.querySelectorAll('.sidebar_preview_title');
                sidebarTitles.forEach(el => {
                    el.innerText = val || 'Post title...';
                });
            });
        }

        // Schedule Toggle
        const btnSchedule = document.getElementById('btn-schedule');
        const scheduleContainer = document.getElementById('schedule-container');
        const scheduleMsg = document.getElementById('schedule-msg');
        if(btnSchedule && scheduleContainer) {
            btnSchedule.addEventListener('click', function() {
                if(scheduleContainer.style.display === 'none') {
                    scheduleContainer.style.display = 'block';
                    if(scheduleMsg) {
                        scheduleMsg.style.display = 'block';
                        setTimeout(() => {
                            scheduleMsg.style.display = 'none';
                        }, 3000);
                    }
                } else {
                    scheduleContainer.style.display = 'none';
                    if(scheduleMsg) scheduleMsg.style.display = 'none';
                    scheduleContainer.querySelector('input').value = '';
                }
            });
        }

        // Sponsored Post Toggle
        const sponsoredToggle = document.getElementById('is_sponsored_toggle');
        const moveGlanceSection = document.getElementById('move-glance-section');
        const companyProfileSection = document.getElementById('company-profile-section');
        const previewSponsoredBanner = document.getElementById('preview_sponsored_banner');
        
        if(sponsoredToggle) {
            sponsoredToggle.addEventListener('change', function() {
                const isChecked = this.checked;
                if(moveGlanceSection) moveGlanceSection.style.display = isChecked ? 'block' : 'none';
                if(companyProfileSection) companyProfileSection.style.display = isChecked ? 'block' : 'none';
                if(previewSponsoredBanner) previewSponsoredBanner.style.display = isChecked ? 'flex' : 'none';
            });
        }

        // Company Profile Link sync
        const companyProfileInput = document.getElementById('company_profile_input');
        const previewSponsoredText = document.getElementById('preview_sponsored_text');
        if(companyProfileInput && previewSponsoredText) {
            companyProfileInput.addEventListener('input', function() {
                const val = this.value.trim();
                let companyName = "NXT Level Moving LLC";
                if(val) {
                    const parts = val.split('/');
                    const slug = parts[parts.length - 1] || parts[parts.length - 2];
                    if(slug) {
                        companyName = slug.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
                    }
                }
                previewSponsoredText.innerText = "Published on behalf of " + companyName;
            });
        }

        // Move at a glance inputs sync
        const inputFinalCost = document.querySelector('input[name="final_cost"]');
        const inputDistance = document.querySelector('input[name="distance"]');
        const inputItemsDamaged = document.querySelector('input[name="items_damaged"]');

        const prevFinalCost = document.getElementById('preview_final_cost');
        const prevDistance = document.getElementById('preview_distance');
        const prevDamaged = document.getElementById('preview_damaged');

        if(inputFinalCost && prevFinalCost) inputFinalCost.addEventListener('input', function() { prevFinalCost.innerText = this.value || '$4,200'; });
        if(inputDistance && prevDistance) inputDistance.addEventListener('input', function() { prevDistance.innerText = this.value || '1,278 mi'; });
        if(inputItemsDamaged && prevDamaged) inputItemsDamaged.addEventListener('input', function() { prevDamaged.innerText = this.value || 'Zero'; });

        // Full Preview click
        const btnFullPreview = document.getElementById('btn-full-preview');
        const fullPreviewMsg = document.getElementById('full-preview-msg');
        if(btnFullPreview && fullPreviewMsg) {
            btnFullPreview.addEventListener('click', function() {
                fullPreviewMsg.style.display = 'block';
                setTimeout(() => {
                    fullPreviewMsg.style.display = 'none';
                }, 3000);
            });
        }

        // SEO Preview Sync
        const metaTitleInput = document.getElementById('meta_title_input');
        const metaDescInput = document.getElementById('meta_desc_input');
        
        const previewTitle = document.getElementById('preview_title');
        const previewDesc = document.getElementById('preview_desc');
        
        const metaTitleCount = document.getElementById('meta_title_count');
        const metaDescCount = document.getElementById('meta_desc_count');

        if(metaTitleInput && previewTitle) {
            metaTitleInput.addEventListener('input', function() {
                previewTitle.innerText = this.value || 'Meta Title Preview';
                if(metaTitleCount) metaTitleCount.innerText = this.value.length + ' / 60';
            });
        }
        if(metaDescInput && previewDesc) {
            metaDescInput.addEventListener('input', function() {
                previewDesc.innerText = this.value || 'Meta description preview...';
                if(metaDescCount) metaDescCount.innerText = this.value.length + ' / 160';
            });
        }
        if(slugInput && previewSlug) {
            slugInput.addEventListener('input', function() {
                previewSlug.innerText = this.value ? 'mymovingjourney.com/blog/' + this.value : 'mymovingjourney.com/blog/post-title';
            });
        }

        // Fix TinyMCE body missing on submit
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
        --primary: #f05a28; /* Orange */
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
    
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="cms-container">
            
            <!-- Left Column: Main Content -->
            <div class="main-column">
                <div class="top-bar-meta">
                    <span class="badge">• Editorial Post</span>
                    <span>Written by MMJ Editorial Team</span>
                </div>

                <!-- Title & Slug -->
                <div class="card-cms">
                    <div class="card-cms-body">
                        <div class="form-group-cms">
                            <label>Post Title <span class="meta-text" id="title-count">0 / 100</span></label>
                            <input type="text" name="title" id="title-input" class="input-cms" placeholder="Enter post title.." maxlength="100" required>
                        </div>
                        <div class="form-group-cms mb-0">
                            <label>Post Slug <span class="meta-text">Used in URL</span></label>
                            <div class="slug-wrapper">
                                <span class="slug-prefix">/blog/</span>
                                <input type="text" name="slug" class="input-cms slug-input" placeholder="post-url-slug" id="slug_input">
                            </div>
                        </div>
                        <div class="form-group-cms mt-3 mb-0">
                            <label>Short Description</label>
                            <input type="text" name="description" class="input-cms" placeholder="Enter short description">
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="row">
                                        <div class="col-lg-12 col-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Body</label>
                                                {{-- <textarea name="body" rows="10" cols="30" class="form-control" id="summernote" required></textarea> --}}
                                                <textarea name="body" rows="10" cols="30" class="form-control" id="mytextarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                <div class="card-cms" id="move-glance-section" style="display:none; border:none; background:transparent; box-shadow:none;">
                    <div style="font-size:0.75rem; color:var(--text-muted); font-weight:600; text-transform:uppercase; padding: 0 0 0.5rem 0;">
                        Move at a glance — Fill in the customer's move details
                    </div>
                    <div style="background:#0f172a; border-radius:0.5rem; padding:1.5rem; color:white;">
                        <div style="font-size:0.875rem; font-weight:600; margin-bottom:1rem; color:white; text-transform:uppercase;">Move at a Glance</div>
                        <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:1rem;">
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Moving From</label>
                                <input type="text" name="moving_from" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Brooklyn, NY">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Moving To</label>
                                <input type="text" name="moving_to" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Miami, FL">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center;">Distance</label>
                                <input type="text" name="distance" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="1,278 miles">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Final Cost</label>
                                <input type="text" name="final_cost" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="$4,200">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Items Damaged</label>
                                <input type="text" name="items_damaged" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Zero">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.65rem; color:#94a3b8; margin-bottom:0.25rem; text-transform:uppercase; text-align:center; margin-top:0.5rem;">Would Recommend</label>
                                <input type="text" name="would_recommend" style="width:100%; background:#1e293b; border:1px solid #334155; border-radius:0.375rem; padding:0.5rem; color:white; font-size:0.875rem; text-align:center;" placeholder="Yes">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
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
                        <div class="drag-drop-zone" id="drag-drop-zone">
                            <div id="drop-zone-content">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" style="margin-bottom: 0.5rem;">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <p style="margin:0;font-weight:600;color:var(--text-main);font-size:0.875rem;">Click to upload <span style="color:var(--text-muted);font-weight:normal;">or drag & drop</span></p>
                                <p style="margin:0;font-size:0.75rem;color:var(--text-muted);margin-top:4px;">JPG or PNG · Min 1200x630px · Max 5MB</p>
                            </div>
                            <input type="file" name="image" accept="image/*" style="display:none;" id="featured_image_input">
                        </div>
                        <div class="form-group-cms mt-3 mb-0">
                            <label>Image Alt Tag</label>
                            <input type="text" name="img_alt" class="input-cms" placeholder="Alt text for image">
                        </div>
                    </div>
                </div>

                <!-- SEO Tags (Extra for Backend Completeness) -->
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
                            <input type="text" name="meta_title" id="meta_title_input" class="input-cms" placeholder="Enter meta title">
                            <div style="text-align:right; font-size:0.7rem; color:var(--text-muted); margin-top:4px;" id="meta_title_count">0 / 60</div>
                        </div>
                        <div class="form-group-cms">
                            <label>Meta Description <span style="color:var(--primary);float:right;">*</span></label>
                            <textarea name="meta_description" id="meta_desc_input" class="input-cms" placeholder="Enter meta description" rows="2" style="resize:vertical;"></textarea>
                            <div style="text-align:right; font-size:0.7rem; color:var(--text-muted); margin-top:4px;" id="meta_desc_count">0 / 160</div>
                        </div>
                        <div class="form-group-cms">
                            <label>Focus Keyword <span style="color:var(--primary);float:right;">*</span></label>
                            <input type="text" name="meta_keywords" class="input-cms" placeholder="Enter meta keywords">
                        </div>
                        
                        <div style="background:#f9fafb; border:1px solid var(--border-color); border-radius:0.5rem; padding:1.25rem; margin-top:1.5rem;">
                            <div style="font-size:0.75rem; color:#16a34a; margin-bottom:0.25rem;" id="preview_slug">mymovingjourney.com/blog/post-title</div>
                            <div style="color:#2563eb; margin-bottom:0.25rem; line-height:1.2; font-family:arial,sans-serif;" id="preview_title">Meta Title Preview</div>
                            <div style="font-size:0.875rem; color:#4d5156; line-height:1.4; font-family:arial,sans-serif;" id="preview_desc">Meta description preview...</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Sidebar -->
            <div class="sidebar-column">
                
                <!-- Publish -->
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

                        <!-- Schedule Message -->
                        <div id="schedule-msg" style="display:none; background: var(--navy); color: white; padding:0.5rem; border-radius:0.375rem; padding: 12px 16px;font-size: 13px;font-weight: 600;font-family: 'Sora', sans-serif; text-align:center; margin-bottom:0.75rem;">Set a date and time — post will publish automatically</div>

                        <button type="button" class="btn-cms btn-outline-cms" id="btn-schedule">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom;">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Schedule
                        </button>

                        <div class="form-group-cms mt-2 mb-3" id="schedule-container" style="display:none;">
                            <label style="font-weight:normal;font-size:0.75rem;color:var(--text-muted);margin-bottom:0.25rem;">Schedule Date</label>
                            <input type="datetime-local" name="published_at" class="input-cms">
                        </div>
                        
                        <button type="button" class="btn-cms btn-danger-light-cms" style="margin-top: 1rem;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: text-bottom;">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                            Delete Post
                        </button>
                    </div>
                </div>

                <!-- Post Settings -->
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
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group-cms">
                            <label>Author</label>
                            <input type="text" name="author" class="input-cms" value="MMJ Editorial Team">
                        </div>
                        
                        <div class="form-group-cms mb-0" style="background:#f9fafb; padding:1rem; border-radius:0.375rem; border:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:600; font-size:0.875rem; color:var(--text-main);">Sponsored Post</div>
                                <div style="font-size:0.75rem; color:var(--text-muted); margin-top:2px;">Auto-applies "Sponsored Content" label</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="is_sponsored" id="is_sponsored_toggle">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <!-- Company Profile Link (Hidden by default) -->
                        <div class="form-group-cms mt-3 mb-0" id="company-profile-section" style="display:none;">
                            <label style="display:flex; justify-content:space-between; font-weight:600; font-size:0.85rem;">
                                Company Profile Link
                                <span style="color:#9ca3af; font-weight:normal;">MMJ URL only</span>
                            </label>
                            <input type="text" name="company_profile_link" id="company_profile_input" class="input-cms" placeholder="mymovingjourney.com/company/nxt-level-moving">
                        </div>
                    </div>
                </div>

                <!-- Preview -->
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
                            <!-- Top Dark Area -->
                            <div style="background: #0f172a; padding: 1rem 1rem 0.5rem; min-height: 55px; display: flex; align-items: flex-end;">
                                <div style="color: white; font-weight: 600; font-size: 0.85rem; width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="sidebar_preview_title">Post title...</div>
                            </div>
                            
                            <!-- Sponsored Banner (Hidden by default, shown if sponsored) -->
                            <div id="preview_sponsored_banner" style="background: #fdf6e3; display: none; align-items: center; padding: 0.5rem 1rem; border-bottom: 1px solid #fde047;">
                                <div style="background: #b45309; color: white; border-radius: 1rem; padding: 0.2rem 0.6rem; font-size: 0.65rem; font-weight: bold; display: flex; align-items: center; gap: 0.25rem;">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    Sponsored
                                </div>
                                <div style="font-size: 0.7rem; color: #b45309; margin-left: 0.5rem; flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="preview_sponsored_text">Published on behalf of NXT Level Moving LLC</div>
                            </div>
                            
                            <!-- Content Area -->
                            <div style="padding: 1rem;">
                                <div style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Customer Story</div>
                                <div style="font-weight: 700; font-size: 0.80rem; color: #0f172a; margin-bottom: 1rem; line-height: 1.3;" class="sidebar_preview_title">Post title...</div>
                                
                                <!-- Move Details Block -->
                                <div style="background: #0f172a; border-radius: 0.375rem; padding: 0.75rem; display: flex; justify-content: space-between; text-align: center;">
                                    <div>
                                        <div style="color: #f97316; font-weight: 700; font-size: 0.85rem;" id="preview_final_cost">$4,200</div>
                                        <div style="color: #64748b; font-size: 0.65rem;">Final Cost</div>
                                    </div>
                                    <div>
                                        <div style="color: white; font-weight: 700; font-size: 0.85rem;" id="preview_distance">1,278 mi</div>
                                        <div style="color: #64748b; font-size: 0.65rem;">Distance</div>
                                    </div>
                                    <div>
                                        <div style="color: white; font-weight: 700; font-size: 0.85rem;" id="preview_damaged">Zero</div>
                                        <div style="color: #64748b; font-size: 0.65rem;">Damaged</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Preview Message -->
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
