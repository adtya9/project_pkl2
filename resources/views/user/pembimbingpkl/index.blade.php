@extends('layouts.app')

@section('title', 'Pembimbing PKL User')

@section('content')

<div class="min-h-screen bg-[#FFFDF2] px-6 py-10 ml-6">

    <div class="max-w-6xl mx-auto"> 
        <h1 class="text-3xl mb-6 text-center text-black font-bold -translate-x-16">
            Data Pembimbing PKL
        </h1>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white">
            <table class="w-full text-center border-collapse">
                <thead class="text-[#fffdf2] bg-black">
                    <tr>
                        <th class="px-10 py-2 pl-28">No</th>
                        <th class="px-10 py-2 pl-96">Nama Pembimbing PKL</th>
                         
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $j)
                    <tr class="border-b">
                       <td class="px-4 py-2 pl-20">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 pl-96">{{ $j->nama_pembimbing_pkl }}</td>
                      
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
