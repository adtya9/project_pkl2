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
</html>