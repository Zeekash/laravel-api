@extends('backend.layouts.master')

@section('admin-content')
    <div class="container-fluid py-4">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
            <div>
                <h2 class="mb-1">Sponsored Post Review</h2>
                <span class="text-muted" style="font-size:14px;">
                    Company: <strong>{{ $post->company->company_name ?? ($post->company->name ?? '-') }}</strong>
                    &nbsp;·&nbsp; Submitted: {{ $post->created_at->format('M d, Y') }}
                </span>
            </div>
            <a href="{{ route('admin.sponsored-posts.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="row">

            {{-- ── LEFT: SEO / Details ── --}}
            <div class="col-lg-5 mb-4">

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>SEO &amp; Submission Details</strong>
                        @if ($post->seo_complete)
                            <span class="badge bg-success">SEO Complete</span>
                        @else
                            <span class="badge bg-danger">SEO Incomplete</span>
                        @endif
                    </div>
                    <div class="card-body" style="font-size:14px;">
                        <table class="table table-borderless table-sm mb-0">
                            <tr>
                                <td class="text-muted" style="width:140px;">Post Title</td>
                                <td><strong>{{ $post->title }}</strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Meta Description</td>
                                <td>
                                    @if ($post->meta_description)
                                        <span class="text-success"><i class="fa fa-check"></i> Present</span>
                                        <br><small class="text-muted">{{ Str::limit($post->meta_description, 80) }}</small>
                                    @else
                                        <span class="text-danger"><i class="fa fa-times"></i> Missing</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Focus Keyword</td>
                                <td>
                                    @if ($post->meta_keywords)
                                        <span class="text-success"><i class="fa fa-check"></i>
                                            {{ $post->meta_keywords }}</span>
                                    @else
                                        <span class="text-danger"><i class="fa fa-times"></i> Missing</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Featured Image</td>
                                <td>
                                    @if ($post->image)
                                        <span class="text-success"><i class="fa fa-check"></i> Uploaded</span>
                                    @else
                                        <span class="text-danger"><i class="fa fa-times"></i> Missing</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Word Count</td>
                                <td>
                                    @if ($post->word_count >= 300)
                                        <span class="text-success"><i class="fa fa-check"></i> {{ $post->word_count }}
                                            words</span>
                                    @else
                                        <span class="text-danger"><i class="fa fa-times"></i> {{ $post->word_count }} / 300
                                            min</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Category</td>
                                <td>{{ $post->postCategory->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Price</td>
                                <td><strong>{{ $post->price_formatted }}</strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Status</td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'awaiting_payment' => 'info',
                                            'rejected' => 'danger',
                                            'published' => 'success',
                                            'expired' => 'secondary',
                                        ];
                                        $color = $statusColors[$post->sponsored_status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $color }}">
                                        {{ ucfirst(str_replace('_', ' ', $post->sponsored_status)) }}
                                    </span>
                                </td>
                            </tr>
                            @if ($post->admin_note)
                                <tr>
                                    <td class="text-muted">Admin Note</td>
                                    <td><em class="text-danger">{{ $post->admin_note }}</em></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                {{-- ── Action Buttons (only if pending) ── --}}
                @if ($post->sponsored_status === 'pending')
                    <div class="card">
                        <div class="card-header"><strong>Admin Actions</strong></div>
                        <div class="card-body">

                            {{-- Approve --}}
                            <form method="POST" action="{{ route('admin.sponsored-posts.approve', $post->id) }}"
                                class="mb-3">
                                @csrf
                                <button type="submit"
                                    class="btn btn-success w-100 {{ !$post->seo_complete ? 'disabled' : '' }}"
                                    {{ !$post->seo_complete ? 'disabled' : '' }}>
                                    <i class="fa fa-check"></i> Approve &amp; Send Payment Link
                                </button>
                                @if (!$post->seo_complete)
                                    <small class="text-danger mt-1 d-block">Cannot approve — SEO fields incomplete.</small>
                                @else
                                    <small class="text-muted mt-1 d-block">Company will receive payment link via
                                        email.</small>
                                @endif
                            </form>

                            <hr>

                            {{-- Reject with note --}}
                            <form method="POST" action="{{ route('admin.sponsored-posts.reject', $post->id) }}">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label fw-bold text-danger" style="font-size:13px;">
                                        <i class="fa fa-times-circle"></i> Reject with Feedback
                                    </label>
                                    <textarea name="admin_note" class="form-control" rows="4" required
                                        placeholder="Explain why this post is rejected (visible to company)..."></textarea>
                                    <small class="text-muted">This message will be shown to the company on their
                                        dashboard.</small>
                                </div>
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fa fa-times"></i> Reject Post
                                </button>
                            </form>

                        </div>
                    </div>
                @endif

            </div>

            {{-- ── RIGHT: Post Preview ── --}}
            <div class="col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Post Preview</strong>
                        <span class="text-muted" style="font-size:12px; margin-left:8px;">How it will look on the
                            blog</span>
                    </div>
                    <div class="card-body">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3"
                                style="max-height:300px; width:100%; object-fit:cover;">
                        @endif

                        <span class="badge bg-warning text-dark mb-2">Sponsored Content</span>

                        <h3 style="font-size:20px; font-weight:700; color:#0f172a; margin-bottom:8px;">
                            {{ $post->title }}
                        </h3>
                        <p class="text-muted" style="font-size:14px; margin-bottom:16px;">
                            {{ $post->description }}
                        </p>

                        <div style="font-size:14px; line-height:1.8; color:#374151;">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
