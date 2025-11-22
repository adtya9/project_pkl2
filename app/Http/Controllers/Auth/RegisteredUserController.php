<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    // Tampilkan form registrasi
    public function create()
    {
        return view('auth.register');
    }

    // Simpan registrasi & kirim OTP
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Simpan data sementara di session
        session([
            'register_name' => $request->name,
            'register_email' => $request->email,
            'register_password' => Hash::make($request->password),
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);
        session(['register_otp' => $otp]);

        // Kirim OTP
        Mail::raw("Kode verifikasi: $otp", function($message) use ($request) {
            $message->to($request->email)->subject('Kode Verifikasi Akun');
        });

        return redirect()->route('verify.otp');
    }

    // Tampilkan halaman OTP
    public function showVerifyForm()
    {
        return view('auth.verify-code');
    }

    // Verifikasi OTP
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        if ($request->code != session('register_otp')) {
            return back()->with('error', 'Kode OTP salah!');
        }

        // Buat user baru
        $user = User::create([
            'name' => session('register_name'),
            'email' => session('register_email'),
            'password' => session('register_password'),
            'email_verified_at' => now(),
        ]);

        // Hapus session OTP
        session()->forget([
            'register_name',
            'register_email',
            'register_password',
            'register_otp'
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // ================
    // 👉 RESEND OTP FIX
    // ================
    public function resendOtp(Request $request)
    {
        $email = session('register_email');

        if (!$email) {
            return back()->with('error', 'Email tidak ditemukan, ulangi registrasi.');
        }

        // Generate OTP baru
        $otp = rand(100000, 999999);
        session(['register_otp' => $otp]);

        // Kirim OTP baru
        Mail::raw("Kode verifikasi baru: $otp", function($message) use ($email) {
            $message->to($email)->subject('Kode OTP Baru');
        });

        return back()->with('info', 'Kode OTP baru telah dikirim.');
    }
}
