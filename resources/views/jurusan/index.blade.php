@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')

<div class="min-h-screen bg-[#FFFDF2] px-6 py-10 ml-6">

    <div class="max-w-6xl mx-auto"> 
        <h1 class="text-4xl mb-6 text-center text-black font-bold -translate-x-20">Data Jurusan</h1>

        @if(session('success'))
            <p style="color:blue;">{{ session('success') }}</p>
        @endif
     
        @if(session('error'))
            <p style="color:red;">{{ session('error') }}</p>
        @endif

        <div class="flex justify-between mb-4">
          <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-[#fffdf2] bg-black hover:scale-105 transition-all duration-200">Kembali</a>
          <a href="{{ route('jurusan.create') }}" class="px-4 py-2 rounded-lg text-[#fffdf2] bg-black  hover:scale-105 transition-all duration-200">Tambah Data</a>
        </div>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-sm text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr>
                        <th class="px-6 py-2">No</th>
                        <th class="px-10 py-2">Nama Jurusan</th>
                        <th class="px-10 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $j->nama_jurusan }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('jurusan.edit', $j->id_jurusan) }}" class="bg-black px-2 py-1 rounded-lg text-[#fffdf2] inline-block hover:scale-105 transition-all duration-200">Edit</a>
                            <form action="{{ route('jurusan.destroy', $j->id_jurusan) }}" method="POST" class="inline-block" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 rounded-lg text-[#fffdf2] bg-red-600 hover:scale-105 transition-all duration-200">Hapus</button>
                            </form>
                        </td>
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
