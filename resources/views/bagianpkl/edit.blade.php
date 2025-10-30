@extends('layouts.app')

@section('title','Edit Data Bagian PKL')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen flex items-start justify-center mt-32">

    <div class = "bg-white rounded-lg p-8 border border-gray-400">

        <h1 class = "text-2xl font-bold mb-6">Edit Data Bagian PKL</h1>

        <form action = "{{ route('bagianpkl.update', $data->id_bagian) }}" method="POST" class = "mt-4">
            @csrf 
            @method('PUT')

            <table cellpadding = "8">
                <tr>
                    <td class = "pr-4">Nama Bagian PKL : </td>
                    <td><input type = "text" name = "nama_bagian" value = "{{ $data->nama_bagian }}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td colspan="2" class = "pt-4">
                        <a href = "{{ route('bagianpkl.index') }}" class = "text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type = "submit" class = "bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">Simpan
                        </button>
                    </td>
                </tr>
            </form>
        </table>
    </div>
</div>
@endsection