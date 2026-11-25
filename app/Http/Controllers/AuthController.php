<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect('/');
        }

        return view('guest.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $request->session()->put('last_login', now());

            if ($user->role === 'admin') {
                return redirect()
                    ->intended(route('admin.dashboard'))
                    ->with('success', 'Login berhasil! Selamat datang, Admin.');
            }

            return redirect('/')
                ->with('success', 'Login berhasil! Selamat datang di Navelle.');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('guest.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'customer',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/')
            ->with('success', 'Registrasi berhasil! Selamat datang di Navelle.');
    }

    public function showForgotPassword()
    {
        return view('guest.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Link reset password berhasil dikirim. Silakan periksa log aplikasi.')
            : back()->withErrors(['email' => __($status)]);
    }

public function showResetPassword(Request $request, string $token)
{
    return view('guest.reset-password', [
        'token' => $token,
        'email' => $request->query('email'),
    ]);
}

public function resetPassword(Request $request)
{
    $validated = $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $status = Password::reset(
        $validated,
        function (User $user, string $password) {
            $user->forceFill([
                'password' => $password,
                'remember_token' => Str::random(60),
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')
            ->with('success', 'Password berhasil diubah. Silakan login kembali.')
        : back()->withErrors([
            'email' => __($status),
        ]);
}

    // Login menggunakan Google
public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback(Request $request)
{
    $googleUser = Socialite::driver('google')->user();

    $email = $googleUser->getEmail();

    if (!$email) {
        return redirect()->route('login')
            ->withErrors(['email' => 'Email Google tidak ditemukan.']);
    }

    $user = User::firstOrCreate(
        ['email' => $email],
        [
            'name' => $googleUser->getName() ?? 'Customer Navelle',
            'password' => Str::random(32),
            'role' => 'customer',
        ]
    );

    Auth::login($user);

    $request->session()->regenerate();

    $request->session()->put('last_login', now());

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')
            ->with('success', 'Login Google berhasil! Selamat datang, Admin.');
    }

    return redirect('/')
        ->with('success', 'Login Google berhasil! Selamat datang di Navelle.');
}

// Logout
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/auth')
        ->with('success', 'Kamu berhasil logout.');
}
}
