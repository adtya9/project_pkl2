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

<div class = "grid grid-cols-1:lg grid-cols-2 gap-8">
        <div class = "bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition border border-gray-100">
                <h3 class = "text-red-500 font-semibold text-xl mb-4">Informasi Website</h3>
                <ul class = "list-disc list-inside space-y-1 text-gray-500 text-sm">
                        <li>Gunakan menu di samping untuk : </li>
                        <li>Menambah data PKL</li>
                        <li>Mengedit data PKL</li>
                        <li>Menghapus data PKL</li>
                </ul>
        </div>

        <div class = "bg-white rounded-2xl p-6 border border-gray-100 shadow-md hover:shadow-lg transition">
                <h3 class = "text-red-500 font-semibold text-xl mb-4">Tujuan Website</h3>
                <p class = "text-sm text-gray-500">Website ini dibuat untuk mempermudah pendataan siswa siswi PKL Universitas
                        Widyatama
                </p>
        </div>
</div>
</div>
@endsection