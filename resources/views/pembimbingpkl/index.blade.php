@extends('layouts.app')

@section('title', 'Pembimbing PKL')

@section('content')

<div class="min-h-screen bg-[#FFFDF2] px-6 py-10 ml-6">

    <div class="max-w-6xl mx-auto"> 
        <h1 class="text-3xl mb-6 text-center text-black font-bold -translate-x-10">Data Pembimbing PKL</h1>

    <div class = "flex justify-between items-center mb-4">
        <a href="{{ route('pembimbingpkl.create') }}" class="px-4 py-2 rounded-lg text-[#fffdf2] bg-black  hover:scale-105 transition-all duration-200">Tambah Data</a>
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
            <table class="w-full  text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr>
                        <th class="px-6 py-2">No</th>
                        <th class="px-10 py-2">Nama Pembimbing PKL</th>
                        <th class = "px-10 py-2">Email</th>
                        <th class = "px-10 py-2">Nomor Telepon</th>
                        <th class="px-10 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $j->nama_pembimbing_pkl }}</td>
                        <td class = "px4 py-2">{{ $j->email }}</td>
                        <td class = "px-4 py-2">{{ $j->nomor_telepon }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('pembimbingpkl.edit', $j->id_pembimbing_pkl) }}" class="bg-black px-2 py-1 rounded-lg text-[#fffdf2] inline-block hover:scale-105 transition-all duration-300 text-sm">Edit</a>
                            <form action="{{ route('pembimbingpkl.destroy', $j->id_pembimbing_pkl) }}" method="POST" class="inline-block" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 rounded-lg text-[#fffdf2] bg-red-600 hover:scale-105 transition-all duration-300 text-sm">Hapus</button>
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

<script>
    setTimeout(() => {
        const alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
        }, 3000);
</script>

@endsection
