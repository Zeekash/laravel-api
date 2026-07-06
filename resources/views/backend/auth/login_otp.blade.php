@extends('backend.auth.auth_master')

@section('auth_title')
    Verify OTP | Admin Panel
@endsection

@section('auth-content')
<div class="login-page" id="login-page">
  <div class="login-bg-dots"></div>
  <div class="login-bg-glow"></div>

  <div class="login-card otp-card">
    <div class="login-logo">
      <div class="login-logo-box">
        <svg viewBox="0 0 24 24">
          <path d="M12 1l8 4v6c0 5.55-3.84 10.74-8 12-4.16-1.26-8-6.45-8-12V5l8-4z"/>
        </svg>
      </div>
      <span class="login-logo-name">MyMovingJourney</span>
      <span class="login-logo-tag">OTP</span>
    </div>

    <div class="login-title">Verify OTP</div>
    <div class="login-sub">
      Enter the 6-digit OTP sent to <strong>{{ $receiver }}</strong>.
    </div>

    @include('backend.layouts.partials.messages')

    <form method="POST" action="{{ route('admin.login.otp.verify') }}" novalidate>
      @csrf

      <div class="field">
        <div class="field-label">OTP Code</div>

        <input
          class="field-input otp-input @error('otp') err @enderror"
          id="otp"
          type="text"
          name="otp"
          placeholder="000000"
          maxlength="6"
          inputmode="numeric"
          autocomplete="one-time-code"
          value="{{ old('otp') }}"
        />

        <div class="field-error @error('otp') show @enderror">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
          </svg>
          <span>
            @error('otp')
              {{ $message }}
            @else
              OTP is required.
            @enderror
          </span>
        </div>
      </div>

      <div class="otp-timer">
        OTP expires in <strong id="countdown" data-expires-at="{{ $expiresAt }}">--:--</strong>
      </div>

      <button class="btn-login" type="submit">Verify & Login</button>
    </form>

    <form method="POST" action="{{ route('admin.login.otp.resend') }}" class="resend-form">
      @csrf
      <button type="submit" class="btn-resend">Resend OTP</button>
    </form>

    <div class="login-footer">
      Restricted access — authorised personnel only
    </div>
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
  line-height: 1.5;
}

.login-sub strong {
  color: var(--dark);
}

.field {
  margin-bottom: 14px;
}

.field-label {
  font-size: 12px;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 6px;
  font-family: 'Sora', sans-serif;
}

.field-input {
  width: 100%;
  padding: 13px 14px;
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

.otp-input {
  text-align: center;
  font-size: 26px;
  letter-spacing: 8px;
  font-weight: 800;
  font-family: 'Sora', sans-serif;
}

.field-input:focus {
  border-color: var(--navy2);
}

.field-input.err {
  border-color: var(--red);
  background: var(--red-bg);
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

.otp-timer {
  text-align: center;
  font-size: 13px;
  color: var(--muted);
  margin: 8px 0 16px;
}

.otp-timer strong {
  color: var(--orange);
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
}

.btn-login:hover {
  background: var(--navy2);
}

.resend-form {
  margin-top: 12px;
  text-align: center;
}

.btn-resend {
  background: transparent;
  border: none;
  color: var(--orange);
  font-size: 13px;
  font-weight: 700;
  cursor: pointer;
  font-family: 'Sora', sans-serif;
}

.btn-resend:hover {
  text-decoration: underline;
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

  .otp-input {
    font-size: 22px;
    letter-spacing: 6px;
  }

  .login-logo {
    flex-wrap: wrap;
  }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const otpInput = document.getElementById('otp');
    const countdown = document.getElementById('countdown');

    if (otpInput) {
        otpInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
        });
    }

    function updateCountdown() {
        if (!countdown) return;

        const expiresAt = parseInt(countdown.dataset.expiresAt || '0', 10) * 1000;
        const now = Date.now();
        const diff = Math.max(0, expiresAt - now);

        if (diff <= 0) {
            countdown.textContent = 'Expired';
            return;
        }

        const totalSeconds = Math.floor(diff / 1000);
        const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
        const seconds = String(totalSeconds % 60).padStart(2, '0');

        countdown.textContent = `${minutes}:${seconds}`;
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>
@endsection