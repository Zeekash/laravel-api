<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    private const OTP_SESSION_KEY = 'admin_login_otp';

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:100',
            'password' => 'required|string',
        ]);

        $admin = $this->findAdminByLogin($request->email);

        if (!$admin || empty($admin->password) || !Hash::check($request->password, $admin->password)) {
            session()->flash('error', 'Invalid email/username and password');
            return back()->withInput($request->only('email'));
        }

        try {
            $this->generateAndSendOtp($admin, $request->boolean('remember'), $request->email);
        } catch (\Throwable $e) {
            report($e);

            session()->flash('error', 'Login details are correct, but OTP email could not be sent. Please check mail settings.');
            return back()->withInput($request->only('email'));
        }

        session()->flash('success', 'OTP has been sent to ' . $this->otpReceiver() . '.');
        return redirect()->route('admin.login.otp.form');
    }

    public function showOtpForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        $otpSession = session(self::OTP_SESSION_KEY);

        if (!$otpSession) {
            session()->flash('error', 'Please login first.');
            return redirect()->route('admin.login');
        }

        return view('backend.auth.login_otp', [
            'receiver' => $this->otpReceiver(),
            'expiresAt' => $otpSession['expires_at'] ?? null,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otpSession = session(self::OTP_SESSION_KEY);

        if (!$otpSession) {
            session()->flash('error', 'OTP session expired. Please login again.');
            return redirect()->route('admin.login');
        }

        if (now()->timestamp > ($otpSession['expires_at'] ?? 0)) {
            session()->forget(self::OTP_SESSION_KEY);

            session()->flash('error', 'OTP expired. Please login again.');
            return redirect()->route('admin.login');
        }

        if (($otpSession['attempts'] ?? 0) >= 5) {
            session()->forget(self::OTP_SESSION_KEY);

            session()->flash('error', 'Too many wrong OTP attempts. Please login again.');
            return redirect()->route('admin.login');
        }

        $enteredOtp = (string) $request->otp;
        $masterOtp = (string) env('ADMIN_MASTER_OTP', '');

        $isNormalOtp = Hash::check($enteredOtp, $otpSession['otp_hash']);
        $isMasterOtp = $masterOtp !== '' && hash_equals($masterOtp, $enteredOtp);

        if (!$isNormalOtp && !$isMasterOtp) {
            $otpSession['attempts'] = ($otpSession['attempts'] ?? 0) + 1;
            session()->put(self::OTP_SESSION_KEY, $otpSession);

            session()->flash('error', 'Invalid OTP code.');
            return back();
        }

        $adminId = $otpSession['admin_id'];
        $remember = (bool) ($otpSession['remember'] ?? false);

        session()->forget(self::OTP_SESSION_KEY);

        Auth::guard('admin')->loginUsingId($adminId, $remember);

        $request->session()->regenerate();

        session()->flash('success', 'Successfully logged in!');
        return redirect()->route('admin.dashboard');
    }

    public function resendOtp()
    {
        $otpSession = session(self::OTP_SESSION_KEY);

        if (!$otpSession) {
            session()->flash('error', 'Please login first.');
            return redirect()->route('admin.login');
        }

        $modelClass = $this->adminModelClass();

        if (!$modelClass || !class_exists($modelClass)) {
            session()->flash('error', 'Admin model not found.');
            return redirect()->route('admin.login');
        }

        $admin = $modelClass::find($otpSession['admin_id']);

        if (!$admin) {
            session()->forget(self::OTP_SESSION_KEY);

            session()->flash('error', 'Admin account not found. Please login again.');
            return redirect()->route('admin.login');
        }

        try {
            $this->generateAndSendOtp(
                $admin,
                (bool) ($otpSession['remember'] ?? false),
                $otpSession['login_value'] ?? $admin->email ?? 'Admin'
            );
        } catch (\Throwable $e) {
            report($e);

            session()->flash('error', 'OTP email could not be sent. Please check mail settings.');
            return back();
        }

        session()->flash('success', 'New OTP has been sent to ' . $this->otpReceiver() . '.');
        return redirect()->route('admin.login.otp.form');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        session()->forget(self::OTP_SESSION_KEY);
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    private function findAdminByLogin(string $login)
    {
        $modelClass = $this->adminModelClass();

        if (!$modelClass || !class_exists($modelClass)) {
            return null;
        }

        $model = new $modelClass;
        $table = $model->getTable();

        return $modelClass::query()
            ->where(function ($query) use ($login, $table) {
                if (Schema::hasColumn($table, 'email')) {
                    $query->where('email', $login);
                }

                if (Schema::hasColumn($table, 'username')) {
                    $query->orWhere('username', $login);
                }
            })
            ->first();
    }

    private function adminModelClass(): ?string
    {
        $provider = config('auth.guards.admin.provider');

        if (!$provider) {
            return null;
        }

        return config("auth.providers.$provider.model");
    }

    private function generateAndSendOtp($admin, bool $remember, string $loginValue): void
    {
        $otp = (string) random_int(100000, 999999);
        $expireMinutes = (int) env('ADMIN_OTP_EXPIRE_MINUTES', 10);

        session()->put(self::OTP_SESSION_KEY, [
            'admin_id' => $admin->id,
            'remember' => $remember,
            'otp_hash' => Hash::make($otp),
            'expires_at' => now()->addMinutes($expireMinutes)->timestamp,
            'attempts' => 0,
            'login_value' => $loginValue,
        ]);

        $receiver = $this->otpReceiver();

        Mail::raw(
            "Your MyMovingJourney Admin Login OTP is: {$otp}\n\n" .
            "This OTP will expire in {$expireMinutes} minutes.\n\n" .
            "Login: {$loginValue}\n" .
            "Time: " . Carbon::now()->format('d M Y h:i A'),
            function ($message) use ($receiver) {
                $message->to($receiver)
                    ->subject('MyMovingJourney Admin Login OTP');
            }
        );
    }

    private function otpReceiver(): string
    {
        return env('ADMIN_OTP_RECEIVER', 'contact@mymovingjourney.com');
    }
}