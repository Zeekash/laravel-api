@extends('layouts.app')
@section('title')
    Review : Step-three | {{ $company->company_name }}
@endsection
@section('meta_description')
    Step three to review the {{ $company->company_name }} company profile and provide valuable feedback.
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #116087;
            border-radius: 10px !important;
        }

        .write_review_sec {
            max-width: 1000px;
            margin: 0 auto;

        }

        .company_img_wrapper {
            max-width: 160px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .step_one_review {
            padding: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
            margin-bottom: 50px
        }

        h3.comapny_name_review {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .locations {
            color: #313742d1;
            font-size: 15px;
            background-color: #f0f3f6;
            padding: 10px;
            border-radius: 7px;
            width: max-content;
            font-weight: 500;
        }

        .review_company_logo {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .other_fields {
            padding: 40px !important;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
            margin-bottom: 50px;
        }

        .labels_form_review {
            background-color: #f8f8f8;
            border-left: 4px solid #116087;
            padding: 15px;
            margin: 5px 0;
            border-radius: 0 6px 6px 0;
        }

        .review-date {
            color: #777;
            font-size: 14px;
        }

        .move-info {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 6px;
            gap: 15px;
            margin-top: 20px;
        }

        .move_detail {
            flex: 1;
            min-width: 180px;
        }

        .move_label {
            font-size: 13px;
            color: #777;
            margin-bottom: 3px;
        }

        .move_value {
            font-weight: 600;
        }

        .review_card {
            padding: 40px !important;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 1px 1px 20px #405b611f;
        }

        @media (max-width: 400px) {
            .step_one_review {
                padding: 20px;
            }

            .other_fields {
                padding: 20px !important;
            }

            .review_card {
                padding: 20px !important;
            }
        }
    </style>
    <section class="bg-image write_review_sec  py-5">
        <div class="step_one_review">
            <div class="row">
                <div class="col-lg-3">
                    <div class="review_company_logo">
                        <div class="company_img_wrapper">
                            @if ($company->image)
                                @php
                                    $imageUrl = str_starts_with($company->image, 'companies/image/')
                                        ? URL::to('/' . $company->image)
                                        : URL::to('/companies/image/' . $company->image);
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $company->image }}" class="img-fluid">
                            @else
                                <img src="{{ URL::to('/img/samplelogo.webp') }}" alt="{{ $company->image }}"
                                    class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 d-flex mt-lg-0 mt-3">
                    <div class="d-flex justify-content-center flex-column">
                        <h3 class="comapny_name_review">{{ $company->company_name }}</h3>
                        <h3 class="locations">Based in:
                            {{ $company->state->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="about-item-content container">
            <h3>Now reviewing: {{ $company->company_name }}</h3>
        </div>
        <hr> --}}
        <div class="container">
            <div class="row">
                <div class="other_fields">
                    {{-- <div class="comp-info-div d-flex my-3 flex-wrap">
                        <span hidden class="image">{{ $company->image }}</span>
                        @if ($company->image)
                            <img src="{{ URL::to('/companies/image/' . $company->image) }}" alt="{{ $company->image }}"
                                class="img-comp-logo me-3">
                        @else
                            <img src="{{ URL::to('/img/samplelogo.webp') }}" alt="{{ $company->image }}"
                                class="img-comp-logo me-3">
                        @endif
                        <div class="d-flex justify-content-center flex-column">
                            <h3 class="p-0 fs-5">{{ $company->company_name }}</h3>
                            <h3 class="p-0 fs-6 text-black">Located:
                                {{ $company->state->name }},{{ $company->country->name }}</h3>
                        </div>
                    </div> --}}
                    <form action="/review/step-three/{{ $company->id }}" method="POST">
                        @csrf
                        @include('backend.layouts.partials.messages')
                        <div class="input-group my-4">
                            <input type="text" class="form-control bg-transparent @error('name') is-invalid @enderror"
                                name="name" aria-label="Sizing example input" placeholder="Name"
                                value="{{ old('name') }}" aria-describedby="inputGroup-sizing-default">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Name is required</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group my-4">
                            <input type="email" class="form-control bg-transparent @error('email') is-invalid @enderror"
                                name="email" aria-label="Sizing example input" placeholder="Email"
                                alue="{{ old('email') }}" aria-describedby="inputGroup-sizing-default">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Email is required</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-start banner-btn">
                            <button type="submit" class="sdg rating-btn-next my-3">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <h3 class="p-0 fs-3">Recent Reviews</h3>
                {{-- <hr> --}}
                @foreach ($data as $data)
                    <div class="px-0 my-3">
                        <div class="review_card">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <h3 class="p-0 fs-4">{{ $data->name }}</h3>
                                <div style="font-size:1.2rem; color:#ff9800">
                                    @if ($data->overall_rating <= 0)
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 1)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 2)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 3)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating == 4)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="far fa-star" aria-hidden="true"></i>
                                    @elseif($data->overall_rating >= 5)
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                        <i class="fas fa-star" aria-hidden="true"></i>
                                    @endif
                                </div>

                            </div>
                            <p class="fs-14 review-date">
                                {{ \Carbon\Carbon::parse($data->created_at)->format('M d,Y') }}</p>
                            <h3 class="p-0 fs-5 mb-1 text-black">{{ $data->review_subject }}</h3>
                            <p class="fs-14 mb-0 text-black">{{ $data->your_review }}</p>
                            <div class="move-info d-flex flex-wrap justify-content-between align-items-center">
                                <div class="move_detail">
                                    <p class="move_label">Move from :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->pickCity->name }},{{ $data->pickCity->state->abv }} </p>
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">To :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->deliveryCity->name }},{{ $data->deliveryCity->state->abv }}
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">Move Size : </p>
                                    <p class="move_value mb-0">
                                        {{ $data->move_size }}
                                </div>
                                <div class="move_detail">
                                    <p class="move_label">Service Cost :</p>
                                    <p class="move_value mb-0">
                                        {{ $data->service_cost }}
                                        {{ $data->currency }}
                                </div>
                                {{-- <p class="fs-14 text-black mb-0">Move from :
                                        <strong>{{ $data->pickCity->name }},{{ $data->pickCity->state->abv }} </strong> To
                                        :
                                        <strong>{{ $data->deliveryCity->name }},{{ $data->deliveryCity->state->abv }}
                                    </p> --}}

                                {{-- <p class="fs-6 my-0 text-black"><strong>Move Size : </strong>{{ $data->move_size }}
                                    </p> --}}
                                {{-- <p class="fs-6 my-0 text-black"> <strong>Service Cost :
                                        </strong>{{ $data->service_cost }}
                                        {{ $data->currency }}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-12">
                    <div class="row w-100 py-3 px-0 m-auto">
                        <h3 class="p-0 fs-3">Recent Reviews</h3>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($data as $data)
                            <div class="col-lg-12 col-md-6 col-sm-12 my-3">
                                <h3 class="p-0 fs-4">{{ $data->name }}</h3>
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div style="font-size:1.2rem; color:#ff9800">
                                        @if ($data->overall_rating <= 0)
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($data->overall_rating == 1)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($data->overall_rating == 2)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($data->overall_rating == 3)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($data->overall_rating == 4)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="far fa-star" aria-hidden="true"></i>
                                        @elseif($data->overall_rating >= 5)
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <p class="fs-14 mx-3 text-black fw-bold">
                                        {{ \Carbon\Carbon::parse($data->created_at)->format('M d,Y') }}</p>
                                </div>
                                <p class="fs-14 text-black mb-0">Move from :
                                    <strong>{{ $data->pickCity->name }},{{ $data->pickCity->state->abv }} </strong> To :
                                    <strong>{{ $data->deliveryCity->name }},{{ $data->deliveryCity->state->abv }}
                                </p>
                                <h3 class="p-0 fs-5 mb-1 text-black">{{ $data->review_subject }}</h3>
                                <p class="fs-14 mb-0 text-black">{{ $data->your_review }}</p>
                                <p class="fs-6 my-0 text-black"><strong>Move Size : </strong>{{ $data->move_size }}</p>
                                <p class="fs-6 my-0 text-black"> <strong>Service Cost : </strong>{{ $data->service_cost }}
                                    {{ $data->currency }}</p>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </section>

    <script>
        $('#hide-msg').show();
        setTimeout(function() {
            $('#hide-msg').hide();
        }, 10000);
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
