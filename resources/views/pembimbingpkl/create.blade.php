@extends('layouts.app')

@section('title','Tambah Data Pembimbing PKL')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen flex items-start justify-center mt-32">

    <div class = "bg-white rounded-lg p-8 border border-gray-400">

        <h1 class = "text-2xl font-bold mb-6">Tambah Data Pembimbing PKL</h1>

        <form action = "{{ route('pembimbingpkl.store') }}" method="POST" class = "mt-6">
            @csrf

            <table cellpadding = "8">
                <tr>
                    <td class = "pr-4">Nama Pembimbing PKL : </td>
                    <td><input type = "text" name = "nama_pembimbing_pkl" class = "h-[32px] rounded w-[230px] border border-gray-400 px-2
                        text-[15px]"></td>
                </tr>

                <tr>
                    <td class = "pr-4">Email :</td>
                    <td><input type = "text" name = "email" class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                    </td>
                </tr>

                <tr>
                    <td class = "pr-4">Nomor Telepon : </td>
                    <td><input type = "text" name = "nomor_telepon" class = "h-[32px] rounded w-[230px] border border-gray-400 px-2
                        text-[15px]"></td>
                </tr>

                <tr>
                    <td colspan="2" class = "pt-4">
                        <a href = "{{ route('pembimbingpkl.index') }}" class = "text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type = "submit" class = "bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">Simpan
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection