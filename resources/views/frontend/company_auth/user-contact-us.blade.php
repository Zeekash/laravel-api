@extends('layouts.app')

@section('title', 'Contact Us - Get Support & Ask Questions | My Moving Journey')
@section('meta_title', 'Contact Us - Get Support & Ask Questions | My Moving Journey')
@section('meta_description',
    'Have questions or need support with your moving? Contact My Moving Journey for support,
    technical issues, or to share feedback and ideas.')
@section('meta_keywords', 'Contact Us')
@section('content')

    <style>
        :root {
            --navy: #123269;
            --navy-dark: #0c2150;
            --navy-light: #1e4a9a;
            --accent: #e85d26;
            --accent-light: #f47344;
            --accent-pale: #fdf1eb;
            --cream: #faf8f4;
            --text: #1a1a2e;
            --text-muted: #6b7280;
            --text-light: #9ca3af;
            --border: #e5e7eb;
            --white: #ffffff;
            --success: #059669;
            --font-display: 'DM Serif Display', serif;
            --font-body: 'DM Sans', sans-serif;
            --radius: 12px;
            --radius-sm: 8px;
            --radius-lg: 20px;
            --shadow: 0 4px 24px rgba(18, 50, 105, 0.08);
            --shadow-md: 0 8px 40px rgba(18, 50, 105, 0.12);
        }

        /* ─── CONTACT STRIP ─── */
        .contact-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            max-width: 1100px;
            margin: -40px auto 0;
            position: relative;

            box-shadow: var(--shadow-md);
        }

        .strip-item {
            background: white;
            padding: 1.75rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            transition: background 0.2s;
        }

        .strip-item:hover {
            background: #f8faff;
        }

        .strip-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .strip-icon svg {
            width: 22px;
            height: 22px;
        }

        .strip-icon.phone {
            background: #eff6ff;
        }

        .strip-icon.phone svg {
            stroke: #2563eb;
        }

        .strip-icon.email {
            background: #f0fdf4;
        }

        .strip-icon.email svg {
            stroke: #16a34a;
        }

        .strip-icon.location {
            background: var(--accent-pale);
        }

        .strip-icon.location svg {
            stroke: var(--accent);
        }

        .strip-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 2px;
        }

        .strip-value {
            font-size: 0.925rem;
            font-weight: 600;
            color: var(--text);
            line-height: 1.35;
        }

        /* ─── MAIN CONTENT ─── */
        .main-section {
            max-width: 1100px;
            margin: 5rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 3rem;
            align-items: start;
        }

        /* ─── FORM CARD ─── */
        .form-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            order: 1;
        }

        .form-card h2 {
            font-family: var(--family);
            ;
            font-size: 1.9rem;
            color: var(--navy);
            margin-bottom: 0.4rem;
        }

        .form-card .subtitle {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .field {
            margin-bottom: 1.25rem;
        }

        .field label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: var(--text);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0.75rem 1rem;
            font-family: var(--para-family);
            font-size: 0.9rem;
            color: var(--text);
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--navy);
            box-shadow: 0 0 0 3px rgba(18, 50, 105, 0.08);
            background: white;
        }

        .field textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .field-select-wrap {
            position: relative;
        }

        .field-select-wrap::after {
            content: '';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid var(--text-muted);
            pointer-events: none;
        }

        .form-btn {
            width: 100%;
            background: var(--navy);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 0.875rem 2rem;
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            transition: background 0.2s, transform 0.15s;
            margin-top: 0.5rem;
            letter-spacing: 0.01em;
        }

        .form-btn:hover {
            background: var(--navy-light);
            transform: translateY(-1px);
        }

        .form-btn:active {
            transform: translateY(0);
        }

        .form-btn svg {
            width: 18px;
            height: 18px;
        }

        .form-privacy {
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-light);
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .form-privacy svg {
            width: 12px;
            height: 12px;
            stroke: var(--text-light);
        }

        .success-msg {
            display: none;
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            border-radius: var(--radius-sm);
            padding: 1rem 1.25rem;
            color: var(--success);
            font-weight: 600;
            font-size: 0.9rem;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .success-msg.show {
            display: flex;
        }

        .success-msg svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            order: 2;
        }

        .sidebar-tagline {
            font-family: var(--family);
            font-size: 1.8rem;
            color: var(--navy);
            line-height: 1.2;
            margin-bottom: 0.75rem;
        }

        .sidebar-tagline em {
            font-style: italic;
            color: var(--accent);
        }

        .sidebar-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        /* reason cards */
        .reason-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .reason-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .reason-card:hover {
            border-color: rgba(18, 50, 105, 0.25);
            box-shadow: 0 2px 12px rgba(18, 50, 105, 0.06);
        }

        .reason-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #f0f4ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .reason-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--navy);
            fill: none;
            stroke-width: 1.8;
        }

        .reason-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 2px;
        }

        .reason-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* social */
        .social-block {
            background: var(--navy);
            border-radius: var(--radius);
            padding: 1.5rem;
        }

        .social-block h3 {
            font-family: var(--family);
            font-size: 1.1rem;
            color: white;
            margin-bottom: 0.4rem;
        }

        .social-block p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 1.25rem;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .social-link svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        /* ─── HOURS ─── */
        .hours-section {
            max-width: 1100px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }

        .hours-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2rem 2.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 3rem;
            flex-wrap: wrap;
        }

        .hours-left {
            flex: 1;
            min-width: 200px;
        }

        .hours-left h3 {
            font-family: var(--family);
            font-size: 1.4rem;
            color: var(--navy);
            margin-bottom: 0.4rem;
        }

        .hours-left p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .hours-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: var(--success);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 100px;
            margin-top: 0.75rem;
        }

        .hours-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--success);
        }

        .hours-grid {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .hours-item {
            text-align: center;
        }

        .hours-day {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 4px;
        }

        .hours-time {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text);
        }

        .hours-time.closed {
            color: var(--text-light);
            font-weight: 400;
        }

        .hours-divider {
            width: 1px;
            background: var(--border);
            align-self: stretch;
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: none;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .main-section {
                grid-template-columns: 1fr;
            }

            .sidebar {
                order: 2;
            }

            .form-card {
                order: 1;
            }

            .form-card h2 {
                font-family: var(--family);
                font-size: 26px;
                color: var(--navy);
                margin-bottom: 0.4rem;
                line-height: 36px;
            }

            .contact-strip {
                grid-template-columns: 1fr;
            }

            .hours-card {
                gap: 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .contact-strip {
                margin: 1rem;
                border-radius: var(--radius);
            }

            .strip-item {
                padding: 1.25rem;
            }

            .main-section {
                margin: 3.5rem auto;
                padding: 0 1.25rem;
            }

            .form-card {
                padding: 0.75rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .hours-section {
                padding: 0 1.25rem;
            }

            .hours-card {
                padding: 1.5rem;
                flex-direction: column;
                gap: 1.5rem;
            }
        }
    </style>
    <section>
        <div>
            <div class="container mx-auto mt-5" style="max-width:800px !important; ">
                <div class="top-content text-center pt-5 pt-lg-0">
                    <h1 class="pt-5 ">Contact Us</h1>
                    <p>We’re here to support you every step of the way. Whether you have questions about planning
                        your
                        move,
                        need assistance finding trusted movers, or just want to share feedback about your
                        experience,
                        the
                        <strong><a href="https://mymovingjourney.com/" style="color: #116087; text-decoration: underline;">My
                                Moving Journey</a></strong> team is ready to help.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Contact Section (Form + Vector) -->
    <section class="main-section">

        <!-- LEFT: FORM -->
        <div class="form-card reveal visible container">
            <h2>Have a question or inquiry?</h2>
            <p class="subtitle">Please feel free to get in touch with us using the contact form</p>
            <form action="{{ route('company.user-contact-us.post') }}" method="POST">
                @csrf
                @include('backend.layouts.partials.messages')

                <div class="field">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                        value="{{ old('name') }}">
                </div>


                <div class="field">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                </div>

                <div class="field">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_no" placeholder="Phone Number"
                        value="{{ old('phone_no') }}">
                </div>

                <div class="field">
                    <label>What can we help with?</label>

                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                        value="{{ old('subject') }}">

                </div>

                <div class="field">
                    <label>Message</label>
                    <textarea name="message" placeholder="Tell us how we can help you…">{{ old('message') }}</textarea>
                </div>
                <div class="mb-3">
                    {!! NoCaptcha::display() !!}
                </div>
                <button class="form-btn" type="submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    Send Message
                </button>
            </form>
            <div class="form-privacy">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0110 0v4"></path>
                </svg>
                We never share your information with third parties.
            </div>

            <div class="success-msg" id="successMsg">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                Message sent! We'll get back to you shortly.
            </div>
        </div>

        <!-- RIGHT: SIDEBAR -->
        <div class="sidebar reveal visible">
            <h2 class="sidebar-tagline">Your move,<br>our <em>priority</em></h2>
            <p class="sidebar-desc">We're not just a directory — we're your partner from first quote to final box. Reach out
                for any reason.</p>

            <div class="reason-list">
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16v-4M12 8h.01"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="reason-title">General questions</div>
                        <div class="reason-desc">Curious how the platform works or what services are available? We'll walk
                            you through it.</div>
                    </div>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <div class="reason-title">Technical issues</div>
                        <div class="reason-desc">Running into a bug or glitch? Share the details and we'll get things back
                            on track fast.</div>
                    </div>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div>
                        <div class="reason-title">Account support</div>
                        <div class="reason-desc">Trouble logging in or managing your profile? We'll sort it out quickly.
                        </div>
                    </div>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                    </div>
                    <div>
                        <div class="reason-title">Feedback &amp; ideas</div>
                        <div class="reason-desc">We're always improving. Your suggestions shape what we build next.</div>
                    </div>
                </div>
            </div>

            <!-- Social -->
            <div class="social-block">
                <h3>Stay connected</h3>
                <p>Tips, guides &amp; moving news — follow us</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/mymovingjourney/" target="_blank" rel="noopener"
                        class="social-link" aria-label="Facebook">
                        <svg viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://x.com/mymovingjourney" target="_blank" rel="noopener" class="social-link"
                        aria-label="X / Twitter">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                    <a href="https://www.pinterest.com/mymovingjourneyus/" target="_blank" rel="noopener"
                        class="social-link" aria-label="Pinterest">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12c0 4.24 2.65 7.86 6.39 9.29-.09-.78-.17-1.98.04-2.83.18-.77 1.22-5.17 1.22-5.17s-.31-.62-.31-1.54c0-1.45.84-2.53 1.88-2.53.89 0 1.32.67 1.32 1.47 0 .9-.57 2.24-.86 3.48-.25 1.04.51 1.88 1.53 1.88 1.83 0 3.07-2.33 3.07-5.08 0-2.09-1.4-3.66-3.94-3.66-2.87 0-4.67 2.14-4.67 4.54 0 .82.24 1.4.62 1.85.17.2.19.28.13.51-.04.17-.14.57-.18.73-.06.24-.24.33-.44.24-1.24-.51-1.82-1.89-1.82-3.43 0-2.55 2.15-5.63 6.44-5.63 3.46 0 5.73 2.52 5.73 5.22 0 3.58-1.97 6.27-4.87 6.27-.97 0-1.89-.52-2.2-1.11l-.6 2.34c-.22.84-.8 1.89-1.2 2.53.91.27 1.86.41 2.85.41 5.52 0 10-4.48 10-10S17.52 2 12 2z">
                            </path>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/company/mymovingjourney/" target="_blank" rel="noopener"
                        class="social-link" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24">
                            <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                            </path>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </section>
    <div class="contact-strip my-5" style="margin-top:2.5rem;">
        <a href="tel:7869803050" class="strip-item">
            <div class="strip-icon phone">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z">
                    </path>
                </svg>
            </div>
            <div>
                <div class="strip-label">Call Anytime</div>
                <div class="strip-value">(786) 980-3050</div>
            </div>
        </a>
        <a href="mailto:info@mymovingjourney.com" class="strip-item">
            <div class="strip-icon email">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <div>
                <div class="strip-label">Email Support</div>
                <div class="strip-value">info@mymovingjourney.com</div>
            </div>
        </a>
        <a href="https://maps.google.com" target="_blank" rel="noopener" class="strip-item">
            <div class="strip-icon location">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
            </div>
            <div>
                <div class="strip-label">Our Office</div>
                <div class="strip-value">3680 Wilshire Blvd, Ste P04-1032, Los Angeles, CA 90010, USA</div>
            </div>
        </a>
    </div>
    <script type="application/ld+json">
{
     "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "Contact Us - Get Support & Ask Questions | My Moving Journey",
    "url": "https://mymovingjourney.com/contact-us",
    "description": "Have questions or need support with your moving? Contact My Moving Journey for support,
    technical issues, or to share feedback and ideas."
}
</script>
    <script type="application/ld+json">
        {
           "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "MyMovingJourney",
            "url": "https://mymovinjourney.com"

        }
    </script>

@endsection
