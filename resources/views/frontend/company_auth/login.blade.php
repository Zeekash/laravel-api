<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login - MyMovingJourney</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0D1B38;
            --navy2: #122350;
            --orange: #E8521A;
            --dark: #0D1B38;
            --muted: #7A8BA8;
            --border: #DDE3EE;
            --font-main: 'DM Sans', sans-serif;
            --font-head: 'Sora', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-main);
            background: white;
            color: var(--dark);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Top Bar */
        .top-bar {
            background: var(--navy);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .top-bar-title {
            color: rgba(255, 255, 255, 0.5);
            font-family: var(--font-head);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .top-bar-nav {
            display: flex;
            gap: 10px;
        }

        .nav-pill {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.2s;
        }

        .nav-pill.active {
            background: var(--orange);
            border-color: var(--orange);
        }

        .nav-pill:not(.active):hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Main Content */
        .main-container {
            display: flex;
            flex: 1;
            height: calc(100vh - 60px);
        }

        /* Left Side */
        .left-side {
            flex: 1.2;
            background: var(--navy);
            position: relative;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .bg-glow {
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(232,82,26,0.08) 0%, transparent 60%);
            top: -100px;
            right: -200px;
            pointer-events: none;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 1;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--orange);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        .logo-text {
            color: white;
            font-family: var(--font-head);
            font-size: 20px;
            font-weight: 700;
        }

        .hero-content {
            z-index: 1;
            max-width: 500px;
        }

        .hero-title {
            color: white;
            font-family: var(--font-head);
            font-size: 38px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-title span {
            color: var(--orange);
            font-weight: 600;
            font-size: 34px;
        }

        .hero-desc {
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 50px;
        }

        .stats-row {
            display: flex;
            gap: 40px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .stat-value {
            color: white;
            font-family: var(--font-head);
            font-size: 28px;
            font-weight: 800;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.5);
            font-size: 13px;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.3);
            font-size: 12px;
            z-index: 1;
        }

        /* Right Side */
        .right-side {
            /* flex: 1; */
            background: white;
            display: flex;
            /* align-items: center; */
            justify-content: center;
            padding: 7% 40px 0px 40px;
            overflow-y: auto;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
        }

        .login-heading {
            font-family: var(--font-head);
            font-size: 24px;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .login-subheading {
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 30px;
        }

        .login-subheading a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 8px;
            font-family: var(--font-head);
        }

        .form-label a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: var(--font-main);
            color: var(--dark);
            outline: none;
            transition: 0.2s;
        }

        .form-input:focus {
            border-color: var(--navy2);
        }

        .form-input.is-invalid {
            border-color: var(--red);
        }

        .eye-btn {
            position: absolute;
            right: 14px;
            bottom: 14px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--muted);
        }

        .eye-btn svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: var(--orange);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            font-family: var(--font-head);
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #d44510;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--muted);
        }

        .register-link a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert-danger {
            background: #FDECEA;
            color: #C0392B;
            border: 1px solid #FADBD8;
        }
        .alert-success {
            background: #E8F7EF;
            color: #1A7A4A;
            border: 1px solid #D4EFDF;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
                height: auto;
            }
            body {
                overflow: auto;
            }
            .left-side {
                padding: 40px 20px;
            }
            .stats-row {
                flex-wrap: wrap;
                gap: 20px;
            }
            .hero-title {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>

    <!-- Top Navigation Bar -->
    <div class="top-bar">
        <div class="top-bar-title">COMPANY PORTAL</div>
        <div class="top-bar-nav">
            <a href="/login" class="nav-pill active">C6 — Login</a>
            <a href="http://localhost:3000/company/dashboard" class="nav-pill">C7 — Dashboard</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-container">
        
        <!-- Left Side -->
        <div class="left-side">
            <div class="bg-glow"></div>
            
            <div class="logo-area">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                    </svg>
                </div>
                <div class="logo-text">MyMovingJourney</div>
            </div>

            <div class="hero-content">
                <h1 class="hero-title">Welcome back to your <span>company portal</span></h1>
                <p class="hero-desc">Manage your leads, profile, and add-ons from one place. New leads are waiting in your inbox.</p>
                
                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-value">1,000+</div>
                        <div class="stat-label">Verified companies</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">24,610</div>
                        <div class="stat-label">Leads delivered</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">96.8%</div>
                        <div class="stat-label">Delivery rate</div>
                    </div>
                </div>
            </div>

            <div class="footer-text">
                © 2026 MyMovingJourney.com - All rights reserved
            </div>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="login-box">
                <h2 class="login-heading">Sign in to your account</h2>
                <p class="login-subheading">Company portal access for approved moving companies. <a href="{{ route('company.register') }}">Register your company</a></p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <div class="form-label">Email Address</div>
                        <input type="email" name="email" class="form-input @error('email') is-invalid @enderror" placeholder="you@company.com" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <div class="form-label">
                            Password
                            <a href="{{ route('forget.password.get') }}">Forgot password?</a>
                        </div>
                        <input type="password" name="password" id="password" class="form-input @error('password') is-invalid @enderror" placeholder="Your password" required>
                        <button type="button" class="eye-btn" onclick="togglePassword()">
                            <svg id="eye-icon" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    <button type="submit" class="btn-submit">
                        Sign In 
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                    </button>

                    <div class="register-link">
                        Don't have an account? <a href="{{ route('company.register') }}">Register your company &rarr;</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (pwInput.type === 'password') {
                pwInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M1 1l22 22"/><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>';
            } else {
                pwInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            }
        }
    </script>
</body>
</html>
