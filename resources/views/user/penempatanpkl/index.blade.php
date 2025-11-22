@extends('layouts.app')

@section('title', 'Penempatan PKL User')

@section('content')

<div class="min-h-screen bg-[#FFFDF2] px-6 py-10 ml-6">

    <div class="max-w-6xl mx-auto"> 
        <h1 class="text-3xl mb-6 text-center text-black font-bold -translate-x-10">
            Data Pemenempatan PKL
        </h1>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr>
                         <th class="px-6 py-2">No</th>
                        <th class="px-10 py-2">Nama Siswa</th>
                        <th class="px-10 py-2">Nama Sekolah</th>
                        <th class="px-10 py-2">Nama Bagian PKL</th>
                        <th class = "px-10 py-2">Tanggal Mulai</th>
                        <th class = "px-10 py-2">Tanggal Selesai</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class="border-b">
                          <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $j->siswa->nama ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->sekolah->nama_sekolah ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $j->bagianpkl->nama_bagian ?? '-' }}</td>
                        <td class = "px-4 py-2">{{ $j->tanggal_mulai ?? '-' }}</td>
                        <td class = "px-4 py-2">{{ $j->tanggal_selesai ?? '-' }}</td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $data->links('pagination.tailwind') }}
        </div>
    </div>
</div>

@endsection
