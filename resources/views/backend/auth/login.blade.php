@extends('backend.auth.auth_master')

@section('auth_title')
    Login | Admin Panel
@endsection

@section('auth-content')
<div class="login-page" id="login-page">
  <div class="login-bg-dots"></div>
  <div class="login-bg-glow"></div>

  <div class="login-card">
    <div class="login-logo">
      <div class="login-logo-box">
        <svg viewBox="0 0 24 24">
          <path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8zM5.5 19a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm13 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
        </svg>
      </div>
      <span class="login-logo-name">MyMovingJourney</span>
      <span class="login-logo-tag">ADMIN</span>
    </div>

    <div class="login-title">Welcome back</div>
    <div class="login-sub">Sign in to the MMJ Admin Panel</div>

    @include('backend.layouts.partials.messages')

    <form method="POST" action="{{ route('admin.login.submit') }}" novalidate>
      @csrf

      <div class="field">
        <div class="field-label">Email Address / Username</div>
        <input
          class="field-input @error('email') err @enderror"
          id="login-email"
          type="text"
          name="email"
          placeholder="admin@mymovingjourney.com"
          autocomplete="username"
          value="{{ old('email') }}"
        />

        <div class="field-error @error('email') show @enderror" id="email-err">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
          </svg>
          <span id="email-err-msg">
            @error('email')
              {{ $message }}
            @else
              Email or username is required.
            @enderror
          </span>
        </div>
      </div>

      <div class="field">
        <div class="field-label">
          Password
          {{-- <a href="{{ route('admin.password.request') }}">Forgot password?</a> --}}
        </div>

        <div class="field-wrap">
          <input
            class="field-input @error('password') err @enderror"
            id="login-pw"
            type="password"
            name="password"
            placeholder="••••••••"
            autocomplete="current-password"
            style="padding-right:40px"
          />

          <button class="eye-btn" onclick="togglePw(event)" type="button" id="eye-btn" aria-label="Show password">
            <svg id="eye-icon" viewBox="0 0 24 24">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>

        <div class="field-error @error('password') show @enderror" id="pw-err">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
          </svg>
          <span id="pw-err-msg">
            @error('password')
              {{ $message }}
            @else
              Password is required.
            @enderror
          </span>
        </div>
      </div>

      <label class="remember-row">
        <input type="checkbox" name="remember" value="1">
        <span>Remember me</span>
      </label>

      <button class="btn-login" type="submit">Send OTP</button>

      <div class="login-footer">Restricted access — authorised personnel only</div>
    </form>
  </div>
</div>
@endsection

@section('styles')
<style>
:root {
  --navy: #0D1B38;
  --navy2: #122350;
  --orange: #E8521A;
  --red: #C0392B;
  --red-bg: #FDECEA;
  --dark: #0D1B38;
  --muted: #7A8BA8;
  --border: #DDE3EE;
}

body {
  margin: 0;
  min-height: 100vh;
  background: var(--navy);
  font-family: 'DM Sans', sans-serif;
}

.login-page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--navy);
  position: relative;
  overflow: hidden;
  padding: 20px;
}

.login-bg-dots {
  position: absolute;
  inset: 0;
  background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
  background-size: 32px 32px;
}

.login-bg-glow {
  position: absolute;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(232,82,26,.12) 0%, transparent 70%);
  top: -100px;
  right: -100px;
}

.login-card {
  background: white;
  border-radius: 20px;
  padding: 38px 42px;
  width: min(440px, 100%);
  position: relative;
  z-index: 1;
  box-shadow: 0 32px 80px rgba(0,0,0,.35);
}

.login-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 28px;
}

.login-logo-box {
  width: 38px;
  height: 38px;
  background: var(--orange);
  border-radius: 9px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-logo-box svg {
  width: 22px;
  height: 22px;
  fill: white;
}

.login-logo-name {
  font-family: 'Sora', sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: var(--dark);
}

.login-logo-tag {
  font-size: 11px;
  font-weight: 700;
  color: var(--red);
  background: rgba(192, 57, 43, .1);
  padding: 2px 8px;
  border-radius: 4px;
  margin-left: 4px;
  font-family: 'Sora', sans-serif;
}

.login-title {
  font-family: 'Sora', sans-serif;
  font-size: 26px;
  font-weight: 800;
  color: var(--dark);
  margin-bottom: 6px;
  letter-spacing: -0.5px;
}

.login-sub {
  font-size: 14px;
  color: var(--muted);
  margin-bottom: 26px;
}

.field {
  margin-bottom: 16px;
}

.field-label {
  font-size: 12px;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 6px;
  font-family: 'Sora', sans-serif;
  display: flex;
  justify-content: space-between;
}

.field-label a {
  color: var(--orange);
  font-weight: 600;
  cursor: pointer;
  font-size: 11px;
  text-decoration: none;
}

.field-wrap {
  position: relative;
}

.field-input {
  width: 100%;
  padding: 12px 14px;
  border: 1.5px solid var(--border);
  border-radius: 10px;
  font-size: 14px;
  font-family: 'DM Sans', sans-serif;
  color: var(--dark);
  outline: none;
  transition: .15s;
  background: white;
  box-sizing: border-box;
}

.field-input:focus {
  border-color: var(--navy2);
}

.field-input.err {
  border-color: var(--red);
  background: var(--red-bg);
}

.eye-btn {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  padding: 4px;
  color: var(--muted);
}

.eye-btn svg {
  width: 16px;
  height: 16px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
}

.field-error {
  display: none;
  font-size: 11px;
  color: var(--red);
  font-weight: 600;
  margin-top: 5px;
  align-items: center;
  gap: 4px;
}

.field-error.show {
  display: flex;
}

.field-error svg {
  width: 12px;
  height: 12px;
  stroke: var(--red);
  stroke-width: 2;
  fill: none;
  flex-shrink: 0;
}

.remember-row {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: var(--muted);
  margin: 2px 0 16px;
  cursor: pointer;
  user-select: none;
}

.remember-row input {
  accent-color: var(--orange);
}

.btn-login {
  width: 100%;
  padding: 13px;
  background: var(--navy);
  color: white;
  border: none;
  border-radius: 10px;
  font-size: 15px;
  font-weight: 700;
  cursor: pointer;
  font-family: 'Sora', sans-serif;
  transition: .15s;
  margin-top: 4px;
}

.btn-login:hover {
  background: var(--navy2);
}

.login-footer {
  text-align: center;
  margin-top: 18px;
  font-size: 12px;
  color: var(--muted);
}

@media (max-width: 480px) {
  .login-card {
    padding: 30px 24px;
  }

  .login-logo {
    flex-wrap: wrap;
  }
}
</style>
@endsection

@section('scripts')
<script>
function togglePw(event) {
    event.preventDefault();

    const pwInput = document.getElementById('login-pw');
    const eyeIcon = document.getElementById('eye-icon');

    const type = pwInput.type === 'password' ? 'text' : 'password';
    pwInput.type = type;

    if (type === 'password') {
        eyeIcon.innerHTML = `
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        `;
    } else {
        eyeIcon.innerHTML = `
            <path d="M1 1l22 22"/>
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
        `;
    }
}
</script>
@endsection