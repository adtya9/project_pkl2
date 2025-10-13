<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- scripts -->    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#FFFDF2] text-black">
    <header class = "bg-black">
        <div class = "flex justify-between px-6 py-5 mx-auto max-w-7xl items-center">
            <div class = "flex gap-3 items-center -translate-x-28">
                <img src = "{{ asset('OIP2.png') }}" class = "h-10 w-auto">
                <h1 class = "text-xl font-bold text-[#FFFDF2]">Dashboard</h1>
            </div>

        <nav class = "flex text-base gap-6 translate-x-20 font-medium">
            @foreach ([ 
                'jurusan'=>'Jurusan',
                'sekolah'=>'Sekolah',
                'bagianpkl'=>'Bagian PKL',
                'siswa'=>'Siswa',
                'pembimbingsekolah'=>'Pembimbing Sekolah',
                'pembimbingpkl'=>'Pembimbing PKL',
                'penempatanpkl' =>'Penempatan PKL'
             ] as $route=>$label )
             <a href = "{{ route("$route.index") }}" class = "text-[#fffdf2] hover:text-[#e0d9c7] transition">{{ $label }}</a>
             @endforeach
             <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf 
                <button type = "submit" class = "text-[#fffdf2] hover:text-red-400 transiton">Logout</button>
             </form>
        </nav>
        </div>
    </header>

    <!-- Konten Halaman -->
    <main class="max-w-7xl mx-auto py-10 px-6">
        @yield('content')
    </main>
</body>
</html>
