<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>

    <!-- Tambah Tailwind kalau pakai Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #fffdf2 !important;
        }
        .card {
            background: #ffffff;
            color: #000;
            width: 420px;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin: 160px auto;
        }

        
        input.custom-input {
        width: 100%;
        padding: 10px;
        margin: 10px 0 5px;
        border: none;
        border-bottom: 2px solid #c7bca6; /* krem */
        background: transparent;
        color: #000;
        font-size: 14px;
    }

    input.custom-input:focus {
        outline: none;
        border-bottom: 2px solid #c7bca6; /* krem lebih tua */
    }


    </style>
</head>
<body>

    <div class="card">

        <div class="mb-4 text-sm text-gray-700">
            Lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email Anda,
            dan kami akan mengirimkan tautan pengaturan ulang kata sandi.
        </div>

        <!-- STATUS -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- EMAIL -->
            <!-- EMAIL -->
<div>
    <label for="email" class=" text-sm">Email</label>
<x-text-input id="password"
           type="email"
           name="email"
           value="{{ old('email') }}"
           required
           autofocus
           class="custom-input" />

    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
</div>

            <!-- BUTTON -->
            <div class="flex items-center justify-end mt-4">
                <button class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
                    Kirim Link Reset Password
                </button>
            </div>
        </form>

    </div>

</body>
</html>
