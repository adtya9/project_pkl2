<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- jQuery & SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Tombol toggle di sidebar */
        .toggle-btn {
            background: none;
            color: #fffdf2;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        /* Sidebar animasi */
        #sidebar {
            transition: all 0.3s ease;
        }

        /* Saat sidebar ditutup */
        .sidebar-collapsed {
            width: 80px !important;
            overflow: hidden;
        }

        /* Sembunyikan semua elemen kecuali tombol toggle */
        .sidebar-collapsed .sidebar-content {
            display: none;
        }

        /* Biar tombol toggle tetap kelihatan dan posisinya sejajar logo */
        .sidebar-collapsed .toggle-btn {
            display: block !important;
            margin-left: 6px;
        }

        /* Transisi konten */
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
    <aside id="sidebar" class="w-64 fixed left-0 top-0 bg-black min-h-screen flex flex-col justify-between">
        <div>
            <!-- Header Sidebar -->
            <div class="flex items-center justify-start gap-3 px-10 py-6 border-b border-[#2a2a2a]">
                <!-- Tombol toggle di kiri -->
                <button id="toggleSidebar" class="toggle-btn">☰</button>

                <!-- Logo + teks PKL -->
                <div class="sidebar-content flex items-center gap-3">
                    <img src="{{ asset('OIP2.png') }}" alt="Logo" class="h-10 w-auto">
                    <h1 class="text-xl font-bold text-[#FFFDF2]">PKL</h1>
                </div>
            </div>

            <!-- Menu navigasi -->
            <nav class="sidebar-content flex flex-col gap-2 px-6 mt-6">
                @foreach ([
                    'dashboard'=>'Dashboard',
                    'jurusan'=>'Jurusan',
                    'sekolah'=>'Sekolah',
                    'bagianpkl'=>'Bagian PKL',
                    'siswa'=>'Siswa', 
                    'pembimbingsekolah'=>'Pembimbing Sekolah',
                    'pembimbingpkl'=>'Pembimbing PKL',
                    'penempatanpkl'=>'Penempatan PKL'
                ] as $route => $label)
                    <a href="{{ route($route == 'dashboard' ? 'dashboard' : "$route.index") }}" 
                       class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">
                        <span>{{ $label }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Tombol logout -->
        <form action="{{ route('logout') }}" method="POST" class="sidebar-content px-6 mb-10">
            @csrf
            <button type="submit" class="text-[#FFFDF2] py-2 px-3 rounded-lg hover:text-[#e0d9c7] transition">
                Logout
            </button>
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

        // Notifikasi SweetAlert dari session
        @if (session('success'))
            Swal.fire('Berhasil', '{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            Swal.fire('Gagal', '{{ session('error') }}', 'error');
        @endif

        // Konfirmasi hapus pakai SweetAlert
        $(document).on('submit', 'form.delete-form', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Apakah anda yakin menghapus data ini ?',
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
