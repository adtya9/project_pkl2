@extends('layouts.app')

@section('title', 'Penempatan PKL')

@section('content')

<div class="min-h-screen bg-[rgb(255,253,242)] px-6 py-10 ml-6">

    <div class="max-w-6xl mx-auto"> 
        <h1 class="text-3xl mb-6 text-center text-black font-bold -translate-x-10">Data Penempatan PKL</h1>

    <div class = "flex justify-between items-center mb-4">
        <a href="{{ route('penempatanpkl.create') }}" class="px-4 py-2 rounded-lg text-[#fffdf2] bg-black  hover:scale-105 transition-all duration-200">Tambah Data</a>
        <div class = "mr-20">
        @if(session('success'))
            <p id="alert-message" class = "text-blue-500 text-xl">{{ session('success') }}</p>
        @endif
     
        @if(session('error'))   
            <p id="alert-message" class = "text-red-500">{{ session('error') }}</p>
        @endif
    </div>
    </div>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr class = "whitespace-nowrap">
                        <th class="px-6 py-2">No</th>
                        <th class="px-10 py-2">Nama Siswa</th>
                        <th class="px-10 py-2">Nama Sekolah</th>
                        <th class="px-10 py-2">Nama Jurusan</th>
                        <th class="px-10 py-2">Nama Bagian PKL</th>
                        <th class = "px-10 py-2">Nama Pembimbing Sekolah</th>
                        <th class = "px-10 py-2">Nama Pembimbing PKL</th>
                        <th class = "px-10 py-2">Tanggal Mulai</th>
                        <th class = "px-10 py-2">Tanggal Selesai</th>
                        <th class="px-10 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($penempatan as $j)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $j->siswa->nama ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->sekolah->nama_sekolah ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->jurusan->nama_jurusan ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->bagianpkl->nama_bagian ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->pembimbing_sekolah->nama_pembimbing_sekolah ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->pembimbing_pkl->nama_pembimbing_pkl ?? '-' }}</td>
                        <td class = "px-4 py-2">{{ $j->tanggal_mulai ?? '-' }}</td>
                        <td class = "px-4 py-2">{{ $j->tanggal_selesai ?? '-' }}</td>

                        <td class="px-4 py-2">
                            <div class="flex justify-center">
                            <a href="{{ route('penempatanpkl.edit', $j->id_penempatan) }}" class="bg-black px-2 py-1 rounded-lg text-[#fffdf2] inline-block hover:scale-105 transition-all duration-300 text-sm">Edit</a>
                            <form action="{{ route('penempatanpkl.destroy', $j->id_penempatan) }}" method="POST" class="inline-block" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 rounded-lg text-[#fffdf2] bg-red-600 hover:scale-105 transition-all duration-300 text-sm">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $penempatan->links('pagination.tailwind') }}
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        const alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
        }
        }, 3000);
</script>

@endsection
