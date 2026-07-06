@extends('layouts.app')
@section('title')
    Company Claim
@endsection
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    <style>
        label {
            font-family: var(--para-family);
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        button.btn.btn-primary.submit_btn_claim {
            background-color: #313742;
            border: 0;
            border-radius: 40px;
            padding: 10px 30px;
            font-family: var(--para-family);
            font-size: 16px;
            font-weight: 500;
        }

        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgb(37 113 128 / 7%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .terms ul li {
            font-family: var(--para-family);
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .card {
            border-radius: 15px !important;
        }
    </style>
    <section class="company_form_page my-4">
        <div class="container ">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-12 ">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible alert-alt fade show">

                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}

                        </div>
                    @endif
                    <div class="loading-container" style="display: none;">
                        <div class="loading-icon"></div>
                    </div>

                    <form id="claim-form" action="{{ route('claim.form.post', $company->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h1 class="m-0 flex-wrap" style="font-size: 1.5rem;"><img
                                        src={{ asset('assets/img/MMJ_Verified_new.svg') }} loading="lazy" alt="correct"
                                        style="width: 24px"> | Claim Business
                                    <small>({{ $company->company_name }})</small>
                                </h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3">
                                        <label for="name">Owner Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" id="name" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3">
                                        <label for="phone">Owner Phone Number</label>
                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                            class="form-control" id="phone" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="email">Owner Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Email is not valid.</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="information">Additional Information</label>
                                        <textarea name="information" id="information" cols="30" rows="4" class="form-control" required>{{ old('information') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-end mt-4">
                                        <button class="btn btn-primary submit_btn_claim">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                    <div class="terms">
                        <h2>Terms & Condition For Business Claim</h2>
                        <ul>
                            <li>
                                You need to have an official website that correctly displays the company name to claim
                                business.
                            </li>
                            <li>
                                Accounts must be verified through the designated domain email and no verification will be
                                valid without it .
                            </li>
                            <li>
                                If your domain email is valid then you will receive email.
                            </li>
                            <li>
                                Email must be like "example@businessdomain.com".
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
