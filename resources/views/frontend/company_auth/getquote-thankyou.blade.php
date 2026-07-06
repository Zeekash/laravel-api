@extends('layouts.app')
@section('content')
    <style>
        .thankyou-section {
            padding: 100px 0;
            background-color: #f6fbfc;
            font-family: var(--popins-family);
        }

        .thankyou-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .thankyou-header h2 {
            color: #116087;
            font-size: 40px;
            font-weight: 700;
        }

        .thankyou-header h4 {
            font-size: 30px;
            font-weight: 600;
            color: #116087;
        }

        .thankyou-header h5 {
            font-size: 20px;
            font-weight: 400;
            color: #444;
            margin-top: 15px;
        }

        .thank-notice-div {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(37, 113, 128, 0.15);
        }

        .notice-attention-heading {
            background-color: #116087;
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            border-radius: 8px 8px 0 0;
        }

        .notice-attention-icons {
            font-size: 18px;
            color: #116087;
        }

        .notice-attention-list p {
            margin: 0;
            font-size: 16px;
            color: #444;
            line-height: 1.6;
        }

        .notice-attention-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .thankyou-footer {
            margin-top: 60px;
            text-align: center;
        }

        .thankyou-footer h2 {
            font-size: 22px;
            font-weight: 600;
            color: #116087;
            text-decoration: underline;
        }

        @media screen and (max-width: 576px) {
            .thankyou-header h2 {
                font-size: 32px;
            }

            .thankyou-header h4 {
                font-size: 24px;
            }

            .thankyou-footer h2 {
                font-size: 18px;
            }

            .notice-attention-heading {
                font-size: 18px;
            }
        }
    </style>

    <section class="thankyou-section">
        <div class="container">
            @include('backend.layouts.partials.messages')

            <div class="thankyou-header">
                <h2>Submission Successful</h2>
                <h4>THANK YOU</h4>
                <h5>For submitting — we'll get back to you shortly.</h5>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 thank-notice-div p-4">
                    <h2 class="notice-attention-heading d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-triangle-exclamation notice-attention-icons me-2"></i> Please Read
                    </h2>
                    <ul class="notice-attention-list list-unstyled mt-3">
                        <li class="d-flex">
                            <i class="fa-solid fa-right-long notice-attention-icons me-3 mt-1"></i>
                            <p>
                                1: Our verified moving companies will contact you shortly with budget-friendly quotations.
                            </p>
                        </li>
                        <li class="d-flex">
                            <i class="fa-solid fa-right-long notice-attention-icons me-3 mt-1"></i>
                            <p>
                                2: For any additional support or queries, email us at
                                <strong>contact@mymovingjourney.com</strong>.
                            </p>
                        </li>
                        <li class="d-flex">
                            <i class="fa-solid fa-right-long notice-attention-icons me-3 mt-1"></i>
                            <p>
                                3: Our team assists only when you choose verified moving companies.
                            </p>
                        </li>
                    </ul>
                </div>

                <div class="thankyou-footer">
                    <h2>Have a Happy and Safe Move!</h2>
                </div>
            </div>
        </div>
    </section>
@endsection
