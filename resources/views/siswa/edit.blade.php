@extends('layouts.app')

@section('title','Edit Data Siswa')

@section('content')

<div class="bg-[#fffdf2] min-h-screen flex items-start justify-center">

    <div class="bg-white w-[480px] rounded-lg p-6 border border-gray-400 shadow-md">

        <h1 class="text-2xl font-bold mb-6 text-center">Edit Data Siswa</h1>

        <form id = "formEditsiswa" action="{{ route('siswa.update', $data->id_siswa) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <table cellpadding="6">
                <tr>
                    <td class="pr-4">NIS :</td>
                    <td>
                        <input type="text" id = "nis" name="nis" value="{{ $data->nis }}"
                            class="h-[34px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Siswa :</td>
                    <td>
                        <input type="text" id = "nama" name="nama" value="{{ $data->nama }}"
                            class="h-[34px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Email :</td>
                    <td>
                        <input type="email" id = "email" name="email" value="{{ $data->email }}"
                            class="h-[34px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nomor Telepon :</td>
                    <td>
                        <input type="text" id = "nomor_telepon" name="nomor_telepon" value="{{ $data->nomor_telepon }}"
                            class="h-[34px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Jenis Kelamin :</td>
                    <td>
                        <select name="jenis_kelamin"
                            class="h-[36px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Sekolah :</td>
                    <td>
                        <select name="id_sekolah"
                            class="h-[36px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($sekolah as $s)
                                <option value="{{ $s->id_sekolah }}" {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : '' }}>
                                    {{ $s->nama_sekolah }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Jurusan :</td>
                    <td>
                        <select name="id_jurusan"
                            class="h-[36px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id_jurusan }}" {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="pt-5">
                        <a href="{{ route('siswa.show', $data->id_siswa) }}" 
                           class="text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type="submit" 
                                class="bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800 transition-all duration-200">
                            Simpan
                        </button>
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
   
    $('#formEditsiswa').on('submit', function(e) {
    let nis = $('#nis').val().trim();
    let nama = $('#nama').val().trim();
    let email = $('#email').val().trim();
    let nomor = $('#nomor_telepon').val().trim();
   
    if (nis === '' || nama === '' || email === '' || nomor === '') {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Kolom belum diisi!',
            text: '',
        });
        return;
    }
});


  
    @if (session('success'))
    Swal.fire(
        'Berhasil',
        '{{ session('success') }}',
        'success'
    );
    @endif

   
    @if (session('error'))
    Swal.fire(
        'Gagal',
        '{{ session('error') }}',
        'error'
    );
    @endif
});
</script>

@endsection
