@extends('layouts.app')

@section('title','Edit Data Jurusan')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen flex items-start justify-center mt-32">

    <div class = "bg-white rounded-lg p-8 border border-gray-400">

        <h1 class = "text-2xl font-bold mb-6">Edit Data Jurusan</h1>

        <form id = "formEditJurusan" action = "{{ route('jurusan.update', $data->id_jurusan) }}" method="POST" class = "mt-6">
            @csrf
            @method('PUT')

            <table cellpadding = "8">
                <tr>
                    <td class = "pr-4">Nama Jurusan : </td>
                    <td><input type = "text" id = "nama_jurusan" name = "nama_jurusan" value = "{{ $data->nama_jurusan }}" 
                        class = "h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]"></td>
                </tr>

                <tr>
                    <td colspan="2" class = "pt-4">
                        <a href = "{{ route('jurusan.index') }}" class = "text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type = "submit" class = "bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">Simpan    
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
   
    $('#formEditJurusan').on('submit', function(e) {
        let nama = $('#nama_jurusan').val().trim();
        if (nama === '') {
            e.preventDefault();
            Swal.fire(
                'Kolom belum diisi!',
                '',
                'warning'
            );
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