@extends('layouts.app')

@section('title', 'Detail Data Siswa')

@section('content')
<div class="min-h-screen bg-[#FFFDF2] flex justify-center items-start py-10 px-4">
   <div class="w-[480px] bg-white rounded-xl shadow-md p-6 border border-gray-200">
        
       
        <div class="text-center mb-6 border-b pb-3">
            <h1 class="text-2xl font-semibold text-gray-800">Detail Data Siswa</h1>
        </div>

        <div class="space-y-2 text-[15px]">
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nis:</span>
                <span class="text-gray-800 font-medium">{{ $data->nis ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Siswa:</span>
                <span class="text-gray-800 font-medium">{{ $data->nama ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Sekolah:</span>
                <span class="text-gray-800 font-medium">{{ $data->sekolah->nama_sekolah ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nama Jurusan:</span>
                <span class="text-gray-800 font-medium">{{ $data->jurusan->nama_jurusan ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Email:</span>
                <span class="text-gray-800 font-medium">{{ $data->email ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Nomor Telepon:</span>
                <span class="text-gray-800 font-medium">{{ $data->nomor_telepon ?? '-' }}</span>
            </div>
            <div class="flex items-center gap-x-6">
                <span class="text-gray-600 w-36">Jenis Kelamin:</span>
                <span class="text-gray-800 font-medium">{{ $data->jenis_kelamin ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-start gap-4 border-t pt-5">
    <a href="{{ route('siswa.index') }}" 
       class="text-red-500 hover:text-red-600 text-sm font-medium hover:underline">
       Kembali
    </a>
    <a href="{{ route('siswa.edit', $data->id_siswa) }}" 
       class="px-4 py-2 bg-gray-800 hover:bg-black text-white text-sm rounded transition-all duration-200">
       Edit
    </a>
</div>

    </div>
</div>
@endsection
