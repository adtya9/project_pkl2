<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Tailwind & App -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#FFFDF2] flex">

    <!-- Sidebar -->
    <aside class = "w-64 fixed left-0 top-0 bg-black min-h-screen flex flex-col justify-between">
        
        <div>
            <div class="flex items-center gap-3 px-6 py-6 border-b border-[#2a2a2a]">
                <img src="{{ asset('OIP2.png') }}" alt="Logo" class="h-10 w-auto">
                <h1 class="text-xl font-bold text-[#FFFDF2]">PKL</h1>
            </div>

            <!-- Navigasi -->
            <nav class="flex flex-col gap-2 px-6 mt-6">
                @foreach ([
                    'dashboard'=>'Dashboard',
                    'jurusan' => 'Jurusan',
                    'sekolah' => 'Sekolah',
                    'bagianpkl' => 'Bagian PKL',
                    'siswa' => 'Siswa', 
                    'pembimbingsekolah' => 'Pembimbing Sekolah',
                    'pembimbingpkl' => 'Pembimbing PKL',
                    'penempatanpkl' => 'Penempatan PKL'
                ] as $route => $label)
                     <a href="{{ route($route == 'dashboard' ? 'dashboard' : "$route.index") }}"
                        class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>

        
        <form action="{{ route('logout') }}" method="POST" class="px-6 mb-10">
            @csrf
            <button type="submit"
                class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">
                Logout
            </button>
        </form>
    </aside>

    <!-- Konten utama -->
    <main class="ml-64 w-full px-10 py-12">
        @yield('content')
    </main>

</body>
</html>
