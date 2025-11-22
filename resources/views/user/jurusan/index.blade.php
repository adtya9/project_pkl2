@extends('layouts.app')

@section('title', 'Jurusan User')

@section('content')

<div class="min-h-screen bg-[#FFFDF2] px-6 py-10 ml-6">

    <div class="max-w-5xl mx-auto"> 
        <h1 class="text-3xl mb-6 text-center text-black font-bold -translate-x-16">
            Data Jurusan 
        </h1>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr>
                        <th class="px-6 py-2 pl-32">No</th>
                        <th class="px-2 py-2 pl-96">Nama Jurusan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class="border-b">
                        <td class="px-4 py-2 pl-32">{{ $loop->iteration }}</td>
                        <td class="px-2 py-2 pl-96">{{ $j->nama_jurusan }}</td>
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
