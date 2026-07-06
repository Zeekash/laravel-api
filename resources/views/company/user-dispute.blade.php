@extends('company.layouts.master')

@section('title', 'Review Dispute')

@section('styles')
    <style>
        .user-dispute-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
        }

        .rating-stars i {
            color: #f4c150;
            margin-right: 0.1rem;
        }

        .rating-stars .text-muted {
            color: #d5d5d5 !important;
        }

        .review-text-wrapper {
            background: #f3f4f6;
            border-radius: 12px;
            padding: 1rem;
        }

        .review-text-wrapper p {
            margin-bottom: 0.35rem;
        }

        .route-summary {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            background: #f8fafc;
            font-size: 0.95rem;
        }

        .route-summary span {
            display: inline-block;
            margin-right: 0.35rem;
        }

        .section-heading {
            font-weight: 700;
            letter-spacing: 0.01em;
        }

        .card.user-dispute-card {
            padding: 2rem;
            width: 100%;
            box-shadow: 0 40px 60px rgba(36, 59, 84, 0.1);
        }

        .user-dispute-wrapper {
            max-width: 960px;
            margin: 0 auto;
            padding: 40px 0;
        }

        .main-content-inner {
            background: linear-gradient(180deg, #eef4fb 0%, #ffffff 40%);
            padding-bottom: 60px;
        }

        .dispute-summary {
            margin-top: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Review Dispute</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        <li><span>Disputes</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 text-sm-end">
                @include('company.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner mt-4">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="card user-dispute-card">
                    <div class="card-body">
                        @include('company.layouts.partials.messages')

                        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-4">
                            <div>
                                <h4 class="mb-1 section-heading">{{ $user->name }}</h4>
                                <div class="rating-stars mb-2" style="font-size:1.2rem; color:#ffca00">
                                    @if ($user->overall_rating <= 0)
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                    @elseif($user->overall_rating == 1)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                    @elseif($user->overall_rating == 2)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                    @elseif($user->overall_rating == 3)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                    @elseif($user->overall_rating == 4)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star empty-stars" aria-hidden="true"></i>
                                    @elseif($user->overall_rating >= 5)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                    @endif
                                </div>
                                <p class="text-muted mb-1"><strong>Subject:</strong> {{ $user->review_subject }}</p>
                            </div>
                            <div class="text-md-end">
                                <p class="text-muted mb-1 section-heading"><strong>Move Size:</strong>
                                    {{ $user->move_size }}</p>
                                <span class="badge {{ $user->respond ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $user->respond ? 'Responded' : 'Awaiting Response' }}
                                </span>
                            </div>
                        </div>

                        <h5 class="section-heading mb-3">Review</h5>
                        <div class="dispute-summary">
                            <p class="mb-1 section-heading"></p>
                            <div class="review-text-wrapper">
                                <p class="mb-0 text-muted">
                                    {!! nl2br(e(\Illuminate\Support\Str::limit(strip_tags($user->your_review), 450))) !!}
                                    @if (strlen(strip_tags($user->your_review)) > 450)
                                        <span class="read-more-toggle">... <a href="#"
                                                class="text-decoration-none read-more-link">Read more</a></span>
                                    @endif
                                </p>
                                <p class="mb-0 text-muted full-review-text d-none">
                                    {!! nl2br(e(strip_tags($user->your_review))) !!}
                                </p>
                            </div>
                            <div class="d-flex flex-wrap gap-3 mt-3 route-summary">
                                <div>
                                    <span class="fw-semibold section-heading">Route:</span>
                                    <span>{{ $user->pickCity->name }}, {{ $user->pickState->abv }} →
                                        {{ $user->deliveryCity->name }}, {{ $user->DeliveryState->abv }}</span>
                                </div>
                                <div>
                                    <span class="fw-semibold section-heading">Move Date:</span>
                                    <span>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</span>
                                </div>
                                <div>
                                    <span class="fw-semibold section-heading">Cost:</span>
                                    <span>${{ number_format($user->service_cost, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        @if ($user->respond)
                            <h5 class="section-heading mt-4">Our Response</h5>
                            <div class="card mt-2 mb-4">
                                <div class="card-body bg-light">
                                    {!! $user->respond !!}
                                </div>
                            </div>
                        @endif

                        @if ($dispute)
                            <h5 class="section-heading mt-4">Submitted Dispute</h5>
                            <div class="card mb-0">
                                <div class="card-body bg-light">
                                    <p class="mb-1"><strong>Subject:</strong> {{ $dispute->subject }}</p>
                                    <p class="mb-1"><strong>Description:</strong> {{ $dispute->description }}</p>
                                    <p class="mb-0"><strong>Status:</strong>
                                        {{ $dispute->is_resolved ? 'Resolved' : 'Pending' }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <h5 class="section-heading mt-4">Submit Dispute</h5>
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <form action="{{ route('company.dispute.post', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Subject</label>
                                                <input type="text" name="subject"
                                                    class="form-control @error('subject') is-invalid @enderror"
                                                    value="{{ old('subject') }}" required>
                                                @error('subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Move ID</label>
                                                <input type="text" class="form-control" value="{{ $user->id }}" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" rows="4"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    required>{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 text-end mt-2">
                                                <button type="submit" class="btn btn-primary default-btn">Submit
                                                    Dispute</button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <div id="forms-heading-div" class="row w-100 py-3 px-0 m-auto">
                                        <h4 class="p-0 fs-4">Add Images</h4>
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label for="file-upload" class="custom-file-upload">
                                            <i class="fa fa-camera fa-2xl" style="content-size:20px"></i> Add Image
                                        </label>
                                        <input id="file-upload" name="image" type="file" style="display:none;">
                                    </div> --}}
                                    {{-- <div class="col-12 p-0 mt-2">
                                        <div class="input-group my-2">
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.read-more-link').forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault();
                        const wrapper = this.closest('.review-text-wrapper');
                        const fullReview = wrapper.querySelector('.full-review-text');
                        const toggle = wrapper.querySelector('.read-more-toggle');
                        if (fullReview) {
                            fullReview.classList.remove('d-none');
                        }
                        if (toggle) {
                            toggle.classList.add('d-none');
                        }
                    });
                });
            });
        </script>
    @endsection
