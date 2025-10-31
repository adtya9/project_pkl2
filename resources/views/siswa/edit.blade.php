@extends('layouts.app')

@section('title','Edit Data Siswa')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen flex items-start justify-center">

    <div class = "bg-white rounded-lg p-8 border border-gray-400">

        <h1 class = "text-2xl font-bold mb-6">Edit Data Siswa</h1>

        <form action = "{{ route('siswa.update', $data->id_siswa) }}" method="POST" class = "mt-6">
            @csrf
            @method('PUT')

            <table cellpadding = "8">
                <tr>
                    <td class = "pr-4">Nis : </td>
                    <td><input type = "text" name = "nis" value = "{{ $data->nis }}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td class = "pr-4">Nama Siswa: </td>
                    <td><input type = "text" name="nama" value = "{{ $data->nama }}"
                    class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td class = "pr-4">Email : </td>
                    <td><input type = "text" name = "email" value = "{{ $data->email }}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td class = "pr-4">Nomor Telepon : </td>
                    <td><input type = "text" name = "nomor_telepon" value = "{{ $data->nomor_telepon}}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td class = "pr-4">Jenis Kelamin : </td>
                    <td><input type = "text" name = "jenis_kelamin" value = "{{ $data->jenis_kelamin}}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Sekolah : </td>
                    <td>
                        <select name="id_sekolah" class="w-[230px] h-[36px] text-[15px] border border-gray-400 px-2">
                            @foreach($sekolah as $s)
                                <option value="{{ $s->id_sekolah }}" {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : '' }}>
                                    {{ $s->nama_sekolah }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Jurusan : </td>
                    <td>
                        <select name="id_jurusan" class="w-[230px] h-[36px] text-[15px] border border-gray-400 px-2">
                            @foreach($jurusan as $s)
                                <option value="{{ $s->id_jurusan }}" {{ $data->id_jurusan == $s->id_jurusan ? 'selected' : '' }}>
                                    {{ $s->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class = "pt-4">
                        <a href = "{{ route('siswa.index') }}" class = "text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type = "submit" class = "bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">Simpan    
                        </button>

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection