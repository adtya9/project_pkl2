<?php

use App\Http\Controllers\BagianpklController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PembimbingpklController;
use App\Http\Controllers\PembimbingsekolahController;
use App\Http\Controllers\PenempatanpklController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\User\JurusanUserController;
use App\Http\Controllers\User\SekolahUserController;
use App\Http\Controllers\User\BagianpklUserController;
use App\Http\Controllers\User\SiswaUserController;
use App\Http\Controllers\User\PembimbingsekolahUserController;
use App\Http\Controllers\User\PembimbingpklUserController;
use App\Http\Controllers\User\PenempatanpklUserController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

// ➕ Tambahkan ini
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth: Login / Logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Reset Password (Breeze)
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

// OTP (tidak pakai auth middleware karena user belum login)
Route::get('/verify-code', [RegisteredUserController::class, 'showVerifyForm'])->name('verify.otp');
Route::post('/verify-code', [RegisteredUserController::class, 'verifyCode'])->name('verify.code');
Route::post('/resend-otp', [RegisteredUserController::class, 'resendOtp'])->name('resend.otp');

// Email verification (setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('jurusan', JurusanController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::resource('bagianpkl', BagianpklController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('pembimbingsekolah', PembimbingsekolahController::class);
    Route::resource('pembimbingpkl', PembimbingpklController::class);
    Route::resource('penempatanpkl', PenempatanpklController::class);

    Route::get('/penempatanpkl/{id}', [PenempatanpklController::class, 'show'])
        ->name('penempatanpkl.show');
});

// User Routes
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/lihat/jurusan', [JurusanUserController::class, 'index'])->name('user.jurusan.index');
    Route::get('/lihat/sekolah', [SekolahUserController::class, 'index'])->name('user.sekolah.index');
    Route::get('/lihat/bagianpkl', [BagianpklUserController::class, 'index'])->name('user.bagianpkl.index');
    Route::get('/lihat/siswa', [SiswaUserController::class, 'index'])->name('user.siswa.index');
    Route::get('/lihat/pembimbingsekolah', [PembimbingsekolahUserController::class, 'index'])->name('user.pembimbingsekolah.index');
    Route::get('/lihat/pembimbingpkl', [PembimbingpklUserController::class, 'index'])->name('user.pembimbingpkl.index');
    Route::get('/lihat/penempatanpkl', [PenempatanpklUserController::class, 'index'])->name('user.penempatanpkl.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen px-10 py-8">
   
        <h1 class = "text-4xl text-gray-800 font-semibold mb-8">Dashboard</h1>

        @php 
        $data = [
                'Total Jurusan'=>\App\Models\Jurusan::count(),
                'Total Sekolah'=>\App\Models\Sekolah::count(),
                'Total Bagian PKL'=>\App\Models\Bagianpkl::count(),
                'Total Siswa'=>\App\Models\Siswa::count(),
                'Total Pembimbing PKL'=>\App\Models\Pembimbingpkl::count(),
                'Total Penempatan PKL'=>App\Models\Penempatanpkl::count()
];
@endphp 

<div class = "grid grid-cols-2 sm:grid-cols-3 mb-10 gap-6">
        @foreach ( $data as $title=>$count )
        <div class = "bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition border border-gray-100">
                <p class = "text-sm text-gray-500 mb-2">{{ $title }}</p>
                <h2 class = "text-gray-800 font-semibold text-2xl">{{ $count }}</h2>
        </div>
        @endforeach
</div>

 <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">

    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
    <h3 class="text-gray-500 text-xl mb-4">Penempatan Terbaru</h3>

    @if($penempatanTerbaru->isEmpty())
        <p class="text-sm text-red-600 italic">Belum ada penempatan terbaru.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach($penempatanTerbaru as $p)
            <li class="py-3 flex justify-between">
                
                <div>
                    <p class="font-semibold">{{ $p->siswa->nama ?? '-' }}</p>
                    <p class="text-gray-500 text-xs">
                        {{ $p->sekolah->nama_sekolah ?? '-' }} — {{ $p->bagianpkl->nama_bagian ?? '-' }}
                    </p>
                </div>

                <div class="text-right text-xs text-red-600">
                    <p><span class="font-medium">Mulai:</span> {{ $p->tanggal_mulai }}</p>
                    <p class="mt-1"><span class="font-medium">Selesai:</span> {{ $p->tanggal_selesai }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</div>

    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
        <h3 class="text-gray-600 text-xl mb-4">Penempatan Akan Berakhir (30 Hari)</h3>

        @if($penempatanAkanBerakhir->isEmpty())
            <p class="text-sm text-red-600 italic">Tidak ada penempatan yang akan berakhir dalam 30 hari ke depan.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach($penempatanAkanBerakhir as $p)
                <li class="py-3 flex justify-between">
                    <div>
                        <p class="font-semibold">{{ $p->siswa->nama ?? '-' }}</p>
                        <p class="text-gray-500 text-xs">
                            {{ $p->sekolah->nama_sekolah ?? '-' }} — {{ $p->bagianpkl->nama_bagian ?? '-' }}
                        </p>
                    </div>

                    <span class="text-xs text-red-600 font-semibold">
                        Berakhir: {{ $p->tanggal_selesai }}
                    </span>
                </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>

</div>

@endsection <x-guest-layout>

    <style>
        body {
            background-color: #fffdf2 !important;
        }
        .card {
            background: #ffffff;
            color: #000;
            width: 420px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            text-align: center;
            margin: 40px auto;
        }
        .logo-img {
            width: 55px;
            height: 43px;
            transform: scale(1.8);
            transform-origin: center;
            display: block;
            margin: 0 auto 30px;
        }
        input.custom-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #c7bca6;
            background: transparent;
            color: #000;
            font-size: 15px;
        }
        input.custom-input:focus {
            outline: none;
            border-bottom: 2px solid #c7bca6;
        }
        .remember {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin: 12px 0 20px;
            color: #000;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #000;
            color: #fffdf2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: #222;
        }
        .footer a { color: #000; font-weight: bold; }

         .separator {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    color: #555;
    font-size: 13px;
    font-weight: 500;
}

.separator::before,
.separator::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #c7bca6;
    margin: 0 10px;
}

    </style>

    <div class="card">

        <!-- Logo -->
        <img src="{{ asset('OIP2.png') }}" class="logo-img" alt="Logo">

        <h2 class="text-xl font-bold mb-4">Login Akun</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-text-input id="email" 
             type="email"
                   name="email"
                   class="custom-input"
                   placeholder="Email"
                   required
                   value="{{ old('email') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />

            <!-- PASSWORD -->
            <div class="relative mt-2">
                <x-text-input id="password"
                type="password"
                       id="password"
                       name="password"
                       class="custom-input pr-10"
                       placeholder="Password"
                       required />

                <!-- Toggle Mata -->
                <button type="button"
                        onclick="togglePassword('password','eyeOpen','eyeClosed')"
                        class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-600">
                    <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-width="2"
                              d="M2.5 12C3.7 7.9 7.5 5 12 5s8.3 2.9 9.5 7c-1.2 4.1-5 7-9.5 7S3.7 16.1 2.5 12z"/>
                    </svg>

                    <svg id="eyeClosed" class="h-5 w-5" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-width="2"
                              d="M3 3l18 18M6.23 6.23A9.95 9.95 0 0112 5c4.5 0 8.27 2.94 9.54 7a9.97 9.97 0 01-4.34 5.08M13.88 18.83A10.05 10.05 0 0112 19c-4.5 0-8.27-2.94-9.54-7a9.96 9.96 0 013.31-4.57"/>
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />

            <!-- REMEMBER -->
            <div class="remember mt-1">
                <label class="flex items-center gap-1">
                    <input type="checkbox" name="remember">
                    <span class= "text-sm">Ingat aku</span>
                </label>

                <a href="{{ route('password.request') }}" class = "hover:underline ml-1 text-sm">Lupa Password?</a>
            </div>

            <button class="btn-primary">Login</button>
        </form>

        <div class="separator ">
    <span>atau</span>
</div>

        <!-- REGISTER -->
        <div class="footer mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class = "hover:underline ml-1">Registrasi</a>
        </div>

    </div>

    <script>
        function togglePassword(inputId, eyeOpenId, eyeClosedId) {
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.classList.remove("hidden");
                eyeClosed.classList.add("hidden");
            } else {
                input.type = "password";
                eyeOpen.classList.add("hidden");
                eyeClosed.classList.remove("hidden");
            }
        }
    </script>

</x-guest-layout>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .toggle-btn {
            background: none;
            color: #fffdf2;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        #sidebar {
            transition: all 0.3s ease;
        }

        .sidebar-collapsed {
            width: 80px !important;
            overflow: hidden;
        }

        .sidebar-collapsed .sidebar-content {
            display: none;
        }

        .sidebar-collapsed .toggle-btn {
            display: block !important;
            margin-left: 6px;
        }

        #mainContent {
            transition: margin-left 0.3s ease;
            margin-left: 256px;
        }

        .sidebar-collapsed ~ #mainContent {
            margin-left: 80px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#FFFDF2] flex">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 fixed left-0 top-0 bg-black min-h-screen flex flex-col">
       <div class="flex items-center justify-start gap-5 px-10 py-6 border-b border-[#2a2a2a]">
    <!-- Tombol Toggle -->
    <button id="toggleSidebar" class="toggle-btn">☰</button>

    <!-- PROFILE USER -->
    @auth
        <div class="sidebar-content flex items-center gap-3">

            <!-- Foto profil bulat (inisial) -->
            <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center text-sm font-bold text-white">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <!-- Nama + Role -->
            <div class="flex items-center gap-2 text-sm">
                <span class="text-[#fffdf2] font-semibold">
                    {{ auth()->user()->name }}
                </span>

                <span class="text-gray-400">|</span>

                <span class="text-gray-300 capitalize">
                    {{ auth()->user()->role }}
                </span>
            </div>

        </div>
    @endauth
</div>


            <!-- Menu navigasi -->
            <nav class="sidebar-content flex flex-col gap-2 px-6 mt-">
                @php
                    $isAdmin = auth()->check() && auth()->user()->role === 'admin';
                @endphp

                <a href="{{ route('dashboard') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Dashboard</a>
                <a href="{{ route($isAdmin ? 'jurusan.index' : 'user.jurusan.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Jurusan</a>
                <a href="{{ route($isAdmin ? 'sekolah.index' : 'user.sekolah.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Sekolah</a>
                <a href="{{ route($isAdmin ? 'bagianpkl.index' : 'user.bagianpkl.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Bagian PKL</a>
                <a href="{{ route($isAdmin ? 'siswa.index' : 'user.siswa.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Siswa</a>
                <a href="{{ route($isAdmin ? 'pembimbingsekolah.index' : 'user.pembimbingsekolah.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Pembimbing Sekolah</a>
                <a href="{{ route($isAdmin ? 'pembimbingpkl.index' : 'user.pembimbingpkl.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Pembimbing PKL</a>
                <a href="{{ route($isAdmin ? 'penempatanpkl.index' : 'user.penempatanpkl.index') }}" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Penempatan PKL</a>
            </nav>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" class="px-6 mb-10 mt-auto">
            @csrf
            <button type="submit" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">Logout</button>
        </form>
    </aside>

    <!-- Konten utama -->
    <main id="mainContent" class="w-full px-10 py-12">
        @yield('content')
    </main>

    <script>
        // Sidebar buka/tutup
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('sidebar-collapsed');
        });

        // SweetAlert notifications
       
        @if(session('success'))
            Swal.fire('Berhasil', '{{ session('success') }}', 'success');
        @endif

        @if(session('error'))
            Swal.fire('Gagal', '{{ session('error') }}', 'error');
        @endif

        // Konfirmasi hapus pakai SweetAlert
        $(document).on('submit', 'form.delete-form', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Apakah anda yakin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    </script>

</body>
</html> <?php

use App\Http\Controllers\BagianpklController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PembimbingpklController;
use App\Http\Controllers\PembimbingsekolahController;
use App\Http\Controllers\PenempatanpklController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\User\JurusanUserController;
use App\Http\Controllers\User\SekolahUserController;
use App\Http\Controllers\User\BagianpklUserController;
use App\Http\Controllers\User\SiswaUserController;
use App\Http\Controllers\User\PembimbingsekolahUserController;
use App\Http\Controllers\User\PembimbingpklUserController;
use App\Http\Controllers\User\PenempatanpklUserController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

// ➕ Tambahkan ini
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth: Login / Logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Reset Password (Breeze)
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

// OTP (tidak pakai auth middleware karena user belum login)
Route::get('/verify-code', [RegisteredUserController::class, 'showVerifyForm'])->name('verify.otp');
Route::post('/verify-code', [RegisteredUserController::class, 'verifyCode'])->name('verify.code');
Route::post('/resend-otp', [RegisteredUserController::class, 'resendOtp'])->name('resend.otp');

// Email verification (setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::resource('jurusan', JurusanController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::resource('bagianpkl', BagianpklController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('pembimbingsekolah', PembimbingsekolahController::class);
    Route::resource('pembimbingpkl', PembimbingpklController::class);
    Route::resource('penempatanpkl', PenempatanpklController::class);

    Route::get('/penempatanpkl/{id}', [PenempatanpklController::class, 'show'])
        ->name('penempatanpkl.show');
});

// User Routes
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/lihat/jurusan', [JurusanUserController::class, 'index'])->name('user.jurusan.index');
    Route::get('/lihat/sekolah', [SekolahUserController::class, 'index'])->name('user.sekolah.index');
    Route::get('/lihat/bagianpkl', [BagianpklUserController::class, 'index'])->name('user.bagianpkl.index');
    Route::get('/lihat/siswa', [SiswaUserController::class, 'index'])->name('user.siswa.index');
    Route::get('/lihat/pembimbingsekolah', [PembimbingsekolahUserController::class, 'index'])->name('user.pembimbingsekolah.index');
    Route::get('/lihat/pembimbingpkl', [PembimbingpklUserController::class, 'index'])->name('user.pembimbingpkl.index');
    Route::get('/lihat/penempatanpkl', [PenempatanpklUserController::class, 'index'])->name('user.penempatanpkl.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

 2025_07_27_000000_create_siswa_table ..................................................................................................... [1] Ran  
  2025_07_28_000000_create_sekolah_table ................................................................................................... [1] Ran  
  2025_07_29_000000_create_jurusan_table ................................................................................................... [1] Ran  
  2025_07_30_000000_create_bagian_table .................................................................................................... [1] Ran  
  2025_07_31_000000_create_pembimbing_pkl_table ............................................................................................ [1] Ran  
  2025_07_32_000000_create_pembimbing_sekolah_table ........................................................................................ [1] Ran  
  2025_08_01_000000_create_penempatan_pkl_table ............................................................................................ [1] Ran  
  2025_08_15_022003_create_sessions_table_fix .............................................................................................. [1] Ran  
  2025_11_07_023511_create_cache_table ..................................................................................................... [1] Ran  
  2025_11_07_024313_create_users_table ..................................................................................................... [1] Ran  
  2025_11_11_015909_add_id_sekolah_to_penempatan_pkl_table ................................................................................. [2] Ran  
  2025_11_17_014818_add_role_to_user_table ................................................................................................. [3] Ran  
  2025_11_19_011854_add_email_verified_code_to_users_table ................................................................................. [4] Ran  
  2025_11_21_022745_create_password_reset_tokens_table ..................................................................................... [5] Ran  
  _OLD_drop_id_sekolah_from_penempatan_pkl_table ........................................................................................... [1] Ran  