@extends('layouts.app')

@section('title', 'Moving Request Received - My Moving Journey')
@section('meta_description',
    'Your moving request has been received successfully. Review your rough moving estimate and next steps from My Moving Journey.')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8fb;
        }

        .mmj-thankyou-wrap {
            position: relative;
            overflow: hidden;
            padding: 54px 0;
          
        }

      

        .mmj-success-shell {
            position: relative;
            z-index: 1;
            max-width: 1050px;
            margin: 0 auto;
        }

        .mmj-success-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(17, 96, 135, 0.12);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(14, 48, 68, 0.12);
        }

        .mmj-success-hero {
            position: relative;
            padding: 42px;
            color: #ffffff;
            background:
                linear-gradient(135deg, rgba(17, 96, 135, 0.96) 0%, rgba(13, 70, 101, 0.98) 100%);
        }

        .mmj-success-hero::after {
            content: '';
            position: absolute;
            inset: auto -80px -120px auto;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.09);
        }

        .mmj-hero-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(280px, 0.7fr);
            gap: 28px;
            align-items: center;
        }

        .mmj-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            margin-bottom: 18px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        .mmj-status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #7af0b0;
            box-shadow: 0 0 0 5px rgba(122, 240, 176, 0.14);
        }

        .mmj-main-title {
            margin: 0 0 12px;
            color: #ffffff;
            font-size: clamp(30px, 5vw, 48px);
            line-height: 1.08;
            font-weight: 600;
        }

        .mmj-subtitle {
            max-width: 620px;
            margin: 0;
            color: rgba(255, 255, 255, 0.86);
            font-size: 16px;
            line-height: 1.75;
            font-weight: 400;
        }

        .mmj-estimate-box {
            position: relative;
            overflow: hidden;
            padding: 26px;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(4, 31, 46, 0.18);
        }

        .mmj-estimate-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #116087, #38a6c7);
        }

        .mmj-estimate-label {
            margin-bottom: 10px;
            color: #5d7180;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .mmj-estimate-amount {
            color: #0f4f70;
            font-size: clamp(28px, 4vw, 40px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .mmj-estimate-small {
            margin: 12px 0 0;
            color: #6a7c88;
            font-size: 13px;
            line-height: 1.6;
        }

        .mmj-content-area {
            padding: 36px 42px 42px;
        }

        .mmj-section-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(300px, 0.72fr);
            gap: 24px;
            align-items: start;
        }

        .mmj-panel {
            background: #ffffff;
            border: 1px solid #e3edf3;
            border-radius: 22px;
            padding: 24px;
        }

        .mmj-panel-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 18px;
            color: #18394c;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.35px;
        }

        .mmj-panel-title i {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(17, 96, 135, 0.10);
            color: #116087;
            font-size: 15px;
        }

        .mmj-detail-list {
            display: grid;
            gap: 12px;
        }

        .mmj-detail-row {
            display: grid;
            grid-template-columns: 150px minmax(0, 1fr);
            gap: 14px;
            align-items: center;
            padding: 14px 16px;
            border: 1px solid #edf3f7;
            border-radius: 16px;
            background: #f9fcfd;
        }

        .mmj-detail-label {
            color: #667985;
            font-size: 13px;
            font-weight: 700;
        }

        .mmj-detail-value {
            color: #1d3340;
            font-size: 15px;
            font-weight: 700;
            text-align: right;
            word-break: break-word;
        }

        .mmj-important-note {
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
            padding: 24px;
            border: 1px solid rgba(230, 157, 60, 0.35);
            border-radius: 22px;
            background: linear-gradient(135deg, #fff9ed 0%, #ffffff 70%);
        }

        .mmj-important-note::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: #e69d3c;
        }

        .mmj-note-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            color: #9b6216;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .mmj-note-badge i {
            color: #e69d3c;
        }

        .mmj-important-note h2 {
            margin: 0 0 10px;
            color: #203848;
            font-size: 22px;
            line-height: 1.3;
            font-weight: 800;
            letter-spacing: -0.35px;
        }

        .mmj-important-note p {
            margin: 0;
            color: #5f6f7a;
            font-size: 15px;
            line-height: 1.75;
        }

        .mmj-step-list {
            display: grid;
            gap: 14px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .mmj-step-item {
            display: grid;
            grid-template-columns: 38px minmax(0, 1fr);
            gap: 13px;
            align-items: start;
            padding: 16px;
            border-radius: 16px;
            background: #f7fbfd;
            border: 1px solid #e6f0f5;
        }

       .mmj-step-number {
    width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #116087;
    color: #ffffff !important;
    font-weight: 300;
    font-size: 16px !important;
    font-family: 'Merriweather' !important;
}

        .mmj-step-item strong {
            display: block;
            margin-bottom: 4px;
            color: #18394c;
            font-size: 15px;
            font-weight: 800;
        }

        .mmj-step-item span {
            color: #697b86;
            font-size: 14px;
            line-height: 1.55;
        }

        .mmj-action-row {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .mmj-btn-primary,
        .mmj-btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 48px;
            padding: 12px 24px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.22s ease;
        }

        .mmj-btn-primary {
            border: 1px solid #116087;
            background: #116087;
            color: #ffffff;
            box-shadow: 0 12px 24px rgba(17, 96, 135, 0.18);
        }

        .mmj-btn-primary:hover {
            transform: translateY(-2px);
            background: #0d4e6d;
            color: #ffffff;
            text-decoration: none;
        }

        .mmj-btn-outline {
            border: 1px solid #c8dce7;
            background: #ffffff;
            color: #116087;
        }

        .mmj-btn-outline:hover {
            transform: translateY(-2px);
            border-color: #116087;
            background: rgba(17, 96, 135, 0.06);
            color: #116087;
            text-decoration: none;
        }

        @media (max-width: 991px) {
            .mmj-thankyou-wrap {
                padding: 34px 0;
            }

            .mmj-hero-grid,
            .mmj-section-grid {
                grid-template-columns: 1fr;
            }

            .mmj-success-hero,
            .mmj-content-area {
                padding: 50px;
            }
        }

        @media (max-width: 575px) {
            .mmj-thankyou-wrap {
                padding: 70px 0;
            }

            .mmj-success-card {
                border-radius: 22px;
            }

            .mmj-success-hero,
            .mmj-content-area {
                padding: 22px 18px;
            }

            .mmj-status-pill {
                font-size: 12px;
            }

            .mmj-subtitle,
            .mmj-important-note p {
                font-size: 14px;
            }

            .mmj-estimate-box,
            .mmj-panel,
            .mmj-important-note {
                padding: 20px;
                border-radius: 18px;
            }

            .mmj-detail-row {
                grid-template-columns: 1fr;
                gap: 6px;
            }

            .mmj-detail-value {
                text-align: left;
            }

            .mmj-action-row {
                display: grid;
                grid-template-columns: 1fr;
            }

            .mmj-btn-primary,
            .mmj-btn-outline {
                width: 100%;
            }
        }
    </style>

    <section class="mmj-thankyou-wrap">
        <div class="container">
            <div class="mmj-success-shell">
                <div class="mmj-success-card">
                    <div class="mmj-success-hero">
                        <div class="mmj-hero-grid">
                            <div>
                                <div class="mmj-status-pill">
                                    <span class="mmj-status-dot"></span>
                                    Request received successfully
                                </div>
                                <h1 class="mmj-main-title">Thank you! Your moving request is confirmed.</h1>
                                <p class="mmj-subtitle">
                                    We have received your move information. My Moving Journey may share these details with up to three trusted moving companies so they can review your request and contact you with a more personalized quote.
                                </p>
                            </div>

                            <div class="mmj-estimate-box">
                                <div class="mmj-estimate-label">Rough moving estimate</div>
                                <div class="mmj-estimate-amount">${{ number_format((float) $min_price) }} - ${{ number_format((float) $max_price) }}</div>
                                <p class="mmj-estimate-small">
                                    This range is only an early estimate. Final pricing can change after movers review your exact move details.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mmj-content-area">
                        <div class="mmj-important-note">
                            <div class="mmj-note-badge">
                                <i class="fas fa-info-circle"></i>
                                Important estimate notice
                            </div>
                            <h2>This is not a final moving quote.</h2>
                            <p>
                                Your final quote may be higher or lower than the estimate shown here. Pricing can vary based on your actual inventory, packing needs, moving date, access conditions, distance, and any extra services requested from the mover.
                            </p>
                        </div>

                        <div class="mmj-section-grid">
                            <div class="mmj-panel">
                                <h3 class="mmj-panel-title">
                                    <i class="fas fa-route"></i>
                                    Your move details
                                </h3>

                                <div class="mmj-detail-list">
                                    <div class="mmj-detail-row">
                                        <span class="mmj-detail-label">Moving From</span>
                                        <span class="mmj-detail-value">{{ $zip_from }}</span>
                                    </div>

                                    <div class="mmj-detail-row">
                                        <span class="mmj-detail-label">Moving To</span>
                                        <span class="mmj-detail-value">{{ $zip_to }}</span>
                                    </div>

                                    <div class="mmj-detail-row">
                                        <span class="mmj-detail-label">Distance</span>
                                        <span class="mmj-detail-value">{{ round((float) $distance, 2) }} mi</span>
                                    </div>

                                    <div class="mmj-detail-row">
                                        <span class="mmj-detail-label">Move Size</span>
                                        <span class="mmj-detail-value">{{ $move_size }}</span>
                                    </div>

                                    <div class="mmj-detail-row">
                                        <span class="mmj-detail-label">Moving Date</span>
                                        <span class="mmj-detail-value">{{ $date }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mmj-panel">
                                <h3 class="mmj-panel-title">
                                    <i class="fas fa-clipboard-check"></i>
                                    What happens next?
                                </h3>

                                <ul class="mmj-step-list">
                                    <li class="mmj-step-item">
                                        <span class="mmj-step-number">1</span>
                                        <div>
                                            <strong>Your request is reviewed</strong>
                                            <span>Movers check your route, move size, timing, and service needs.</span>
                                        </div>
                                    </li>
                                    <li class="mmj-step-item">
                                        <span class="mmj-step-number">2</span>
                                        <div>
                                            <strong>Matched movers may contact you</strong>
                                            <span>Up to three trusted companies may reach out with custom pricing.</span>
                                        </div>
                                    </li>
                                    <li class="mmj-step-item">
                                        <span class="mmj-step-number">3</span>
                                        <div>
                                            <strong>Compare before booking</strong>
                                            <span>Review final quotes, included services, and availability before choosing a mover.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mmj-action-row">
                            <a href="{{ url('/') }}" class="mmj-btn-primary">
                                <i class="fas fa-home"></i>
                                Back to Home
                            </a>
                            {{-- <a href="{{ url('/quote') }}" class="mmj-btn-outline">
                                <i class="fas fa-plus"></i>
                                Start Another Estimate
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
