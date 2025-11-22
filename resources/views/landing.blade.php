<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #FFFDF2; /* Warna krem */
        }
    </style>
</head>
<body class="font-sans antialiased">

    <!-- Navbar -->
    <nav class="w-full bg-black text-[#FFFDF2] py-4 px-10 flex justify-between items-center shadow-lg">
        <div class="flex items-center gap-3">
            <img src="{{ asset('OIP2.png') }}" alt="Logo" class="h-10 w-auto">
            <h1 class="text-2xl font-bold">Praktik Kerja Lapangan</h1>
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" 
               class="px-5 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                Login
            </a>
        </div>
    </nav>

    <!-- Fitur Section -->
    <section class="px-10 py-48 bg-[#fffdf2] shadow-inner relative">
        <div class="max-w-6xl mx-auto">

            <!-- Judul Selamat Datang (naik lebih jauh) -->
            <h2 class="relative -top-12 text-4xl font-extrabold text-left text-black mb-14 tracking-wide -translate-x-24">
                PKL Universitas Widyatama
            </h2>

            <!-- Wrapper untuk naikin bagian fitur -->
            <div class="relative -top-20 -translate-x-24">

                <h3 class="text-3xl font-bold text-black mb-6 text-left">Fitur Website PKL</h3>

                <p class="text-gray-700 text-base leading-relaxed mb-10 max-w-2xl">
                    Website ini dibuat untuk mempermudah pendataan siswa siswi PKL Universitas Widyatama dengan terstruktur.
                </p>

                <div class="flex gap-6">
                    <div class="bg-white border border-gray-300 p-6 rounded-2xl">
                        <h4 class="text-xl font-bold mb-2 text-black">Manajemen Data</h4>
                        <p class="text-gray-700">Kelola data siswa, guru pembimbing, dan bagian PKL dengan mudah.</p>
                    </div>

                    <div class="bg-white border border-gray-300 p-6 rounded-2xl">
                        <h4 class="text-xl font-bold mb-2 text-black">Akses Admin & User</h4>
                        <p class="text-gray-700">Admin bisa mengelola data, sementara user hanya dapat melihat informasi yang tersedia.</p>
                    </div>

                    <div class="bg-white border border-gray-300 p-6 rounded-2xl">
                        <h4 class="text-xl font-bold mb-2 text-black">Catatan</h4>
                        <p class="text-gray-700">Pastikan anda selalu logout setelah selesai mengakses website untuk menjaga keamanan.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
</html>
