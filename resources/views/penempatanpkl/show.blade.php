@extends('layouts.app')

@section('title', 'Detail Data Penempatan PKL')

@section('content')
<div class="min-h-screen bg-[#FFFDF2] flex justify-center items-start py-10 px-4">
   <div class="w-[480px] bg-white rounded-lg shadow-md p-6 border border-gray-200">
        
        <div class="text-center mb-6 border-b pb-3">
            <h1 class="text-2xl font-semibold text-gray-800">Detail Data Penempatan PKL</h1>
        </div>

        <div class="space-y-2 text-[15px]">
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Siswa:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->siswa->nama ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Sekolah:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->sekolah->nama_sekolah ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Jurusan:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->jurusan->nama_jurusan ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Bagian PKL:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->bagianpkl->nama_bagian ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Pembimbing Sekolah:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->pembimbingsekolah->nama_pembimbing_sekolah ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Pembimbing PKL:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->pembimbingpkl->nama_pembimbing_pkl ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Tanggal Mulai:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->tanggal_mulai ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Tanggal Selesai:</span>
                <span class="text-gray-800 font-medium">{{ $penempatan->tanggal_selesai ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-start gap-4 border-t pt-5">
    <a href="{{ route('penempatanpkl.index') }}" 
       class="text-red-500 hover:text-red-600 text-sm font-medium hover:underline">
       Kembali
    </a>
    <a href="{{ route('penempatanpkl.edit', $penempatan->id_penempatan) }}" 
       class="px-4 py-2 bg-gray-800 hover:bg-black text-white text-sm rounded transition-all duration-200">
       Edit
    </a>
</div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
@if (session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}'
});
@endif
</script>

@endsection
