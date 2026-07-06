@extends('layouts.app')

@section('title')
    Review : Step-one | {{ $company->company_name }}
@endsection
@section('meta_description')
    Step one to review the {{ $company->company_name }} company profile and provide valuable feedback.
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
<style>
    .write_review_sec {
        max-width: 1000px;
        margin: 0 auto;

    }

    .company_img_wrapper {
        max-width: 210px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .step_one_review {
        padding: 40px 20px;
        background-color: #11608712;
        border-radius: 20px;
        /* box-shadow: 1px 1px 20px #405b611f; */
        margin-bottom: 50px;
    }

    h3.comapny_name_review {
        font-size: 36;
        margin-bottom: 20px;
        font-weight: 800;
        font-family: var(--para-family);
    }

    .locations {
        color: #000000d1;
        font-size: 16px;
        background-color: #f0f3f6;
        padding: 10px 30px;
        border-radius: 450px;
        width: max-content;
        font-weight: 600;
    }

    .form-control.js {

        padding: 1rem 1.75rem;


        border: 0px solid #116087;

    }

    .input-group.js {
        padding: 1rem 1.75rem;
        border: 0px solid #116087;
    }

    .review_company_logo {
        background-color: white;
        padding: 15px;
        border-radius: 20px;
        text-align: center;
    }

    .other_fields {
        padding: 40px !important;
        background-color: #f0f3f6;
        border-radius: 20px;
        /* box-shadow: 1px 1px 20px #405b611f; */
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

@section('content')
    <section class="bg-image write_review_sec  py-5">
        <div class="container">
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
                    <div class="col-lg-9 d-flex">
                        <div class="d-flex justify-content-center flex-column">
                            <h1 class="comapny_name_review">{{ $company->company_name }}</h1>
                            <h3 class="locations">Based in:
                                {{ $company->state->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="about-item-content container">
            <h3>Now reviewing: {{ $company->company_name }}</h3>
            </div> --}}
        {{-- <hr> --}}
        <div class="container">
            <div class="other_fields">
                <div class="col-lg-12">
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
                            <h3 class="p-0 fs-6 text-black">Located :
                                {{ $company->state->name }},{{ $company->country->name }}</h3>
                        </div>
                    </div> --}}
                    <form action="/review/step-one/{{ $company->id }}" method="POST">
                        @csrf
                        {{-- @include('backend.layouts.partials.messages') --}}
                        <div class="form-outline mb-0">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0 d-flex flex-column align-items-start">
                                    <h3 style="font-family: var(--para-family); font-size: 22px; font-weight: 500;">Give
                                        Your Rating</h3>
                                    <fieldset class="rating @error('overall_rating') is-invalid @enderror">
                                        <input type="radio" id="star5" name="overall_rating" value="5" />
                                        <label class="me-2" for="star5">5 stars</label>
                                        <input type="radio" id="star4" name="overall_rating" value="4" />
                                        <label class="me-2" for="star4">4 stars</label>
                                        <input type="radio" id="star3" name="overall_rating" value="3" />
                                        <label class="me-2" for="star3">3 stars</label>
                                        <input type="radio" id="star2" name="overall_rating" value="2" />
                                        <label class="me-2" for="star2">2 stars</label>
                                        <input type="radio" id="star1" name="overall_rating" value="1" />
                                        <label class="me-2" for="star1">1 star</label>
                                    </fieldset>
                                    @error('overall_rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Rating is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-outline mt-3">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0">
                                    <div class="input-group my-3">
                                        <input type="text" placeholder="Enter Subject" name="review_subject"
                                            value="{{ old('review_subject') }}" autocomplete="off"
                                            class="form-control js @error('overall_rating') is-invalid @enderror">
                                        @error('review_subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Review subject is required</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline">
                            <div class="row m-auto w-100">
                                <div class="col-12 mt-2 px-0">
                                    <div class="">
                                        <textarea rows="3" placeholder="Review" onkeyup="CharacterCount1(this);" id="about_your_country"
                                            name="your_review" value="{{ old('your_review') }}"
                                            class="input-group js mb-3 form-control @error('your_review') is-invalid @enderror">{{ old('your_review') }}</textarea>
                                        @error('your_review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="charCountVal1" align="right">0 characters (min:100)</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline">
                            <div class="labels_form_review">
                                <div class="row m-auto w-100">
                                    <div class="col-12 mt-2 px-0">
                                        <label class="form-label fs-5 my-0 p-0 fw-bold" for="Note">Please Read :</label>
                                        <ul class="w-100 ps-3 pe-sm-0">
                                            <li>
                                                <p class="text-black mb-0 fs-14">Do not rebuttal reviews by other visitors.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-black mb-0 fs-14">Spell-Check your review before submiting.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="text-black mb-0 fs-14">Avoid abusive language and exaggeration.
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-start banner-btn">
                            <button type="submit" class="sdg rating-btn-next">Next Step</button>
                        </div>
                    </form>

                </div>
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
        </div>
    </section>

    <script>
        function CharacterCount1(object) {
            document.getElementById("charCountVal1").innerHTML = object.value.length + ' characters (min:100)';
        }
    </script>
@endsection
