@extends('layouts.app')
@section('title', 'Thank You')
@section('content')
    <style>
        .thank-page {
            padding: 100px 0;
            background: #f6fbfc;
            font-family: var(--popins-family);
            margin-bottom: -120px;
        }

        .thank-box {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(37, 113, 128, 0.2);
            padding: 40px;
            max-width: 800px;
            margin: auto;
            text-align: center;
        }

        .thank-title {
            font-family: var(--albersans-family);
            font-weight: 700;
            font-size: 48px;
            color: #fff;
            background-color: #116087;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .thank-box p {
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            margin-bottom: 20px;
        }

        .thank-box a {
            color: #116087;
            font-weight: 600;
            text-decoration: underline;
        }

        .thank-box a:hover {
            text-decoration: none;
        }

        .thank-btn {
            margin-top: 30px;
        }

        .thank-btn a {
            background-color: #116087;
            color: white;
            font-weight: 500;
            text-transform: capitalize;
            font-size: 18px;
            letter-spacing: 0.5px;
            border-radius: 40px;
            padding: 12px 30px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .thank-btn a:hover {
            background-color: #6c9da4;
        }

        @media screen and (max-width: 576px) {
            .thank-title {
                font-size: 36px;
            }

            .thank-box {
                padding: 25px;
            }
        }
    </style>

    <section class="thank-page">
        <div class="thank-box">
            <h1 class="thank-title">Thank You!</h1>
            <p>
                Thank you for submitting your form! We greatly appreciate your interest and will be in touch shortly.
                Your request is important to us, and we look forward to assisting you with your needs.
            </p>
            <p>
                If you have any immediate questions or concerns, please feel free to contact us at
                <a href="mailto:contact@mymovingjourney.com">contact@mymovingjourney.com</a>.
            </p>
            <p class="fst-italic fw-bold">
                Thank you for choosing <a href="https://mymovingjourney.com/">My Moving Journey</a> — we’re excited to serve
                you!
            </p>
            <div class="thank-btn">
                <a href="{{ url('/') }}" class="thank-btn">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
