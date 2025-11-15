@extends('layouts.app')

@section('title','Edit Data Penempatan PKL')

@section('content')

<div class="bg-[#fffdf2] min-h-screen flex items-start justify-center">

    <div class="bg-white w-[#480px] rounded-lg p-6 border border-gray-400">

        <h1 class="text-2xl font-bold mb-6">Edit Data Penempatan PKL</h1>
        <p class="text-sm text-gray-500 italic mb-4">Data siswa sampai data bagian PKL tidak dapat diubah!</p>


        <form id = "formEditpenempatan" action="{{ route('penempatanpkl.update', $data->id_penempatan) }}" method="POST" class="mt-6">
            @csrf
            @method('PUT')



            <table cellpadding="6">
                <tr>
                    <td class="pr-4">Nama Siswa :</td>
                    <td>
                        <select disabled class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($siswa as $s)
                                <option {{ $data->id_siswa == $s->id_siswa ? 'selected' : '' }}>
                                    {{ $s->nama }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_siswa" value="{{ $data->id_siswa }}">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Sekolah :</td>
                    <td>
                        <select disabled class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($sekolah as $s)
                                <option {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : '' }}>
                                    {{ $s->nama_sekolah }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_sekolah" value="{{ $data->id_sekolah }}">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Jurusan :</td>
                    <td>
                        <select disabled class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($jurusan as $j)
                                <option {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_jurusan" value="{{ $data->id_jurusan }}">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Bagian PKL :</td>
                    <td>
                        <select disabled class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($bagianpkl as $b)
                                <option {{ $data->id_bagian == $b->id_bagian ? 'selected' : '' }}>
                                    {{ $b->nama_bagian }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_bagian" value="{{ $data->id_bagian }}">
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Pembimbing Sekolah :</td>
                    <td>
                        <select name="id_pembimbing_sekolah" class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($pembimbingsekolah as $ps)
                                <option value="{{ $ps->id_pembimbing_sekolah }}" {{ $data->id_pembimbing_sekolah == $ps->id_pembimbing_sekolah ? 'selected' : '' }}>
                                    {{ $ps->nama_pembimbing_sekolah }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Nama Pembimbing PKL :</td>
                    <td>
                        <select name="id_pembimbing_pkl" class="h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                            @foreach($pembimbingpkl as $pp)
                                <option value="{{ $pp->id_pembimbing_pkl }}" {{ $data->id_pembimbing_pkl == $pp->id_pembimbing_pkl ? 'selected' : '' }}>
                                    {{ $pp->nama_pembimbing_pkl }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="pr-4">Tanggal Mulai :</td>
                    <td>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                            value="{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('Y-m-d') }}"
                            class="h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">

                </tr>

                <tr>
                    <td class="pr-4">Tanggal Selesai :</td>
                    <td>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                            value="{{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('Y-m-d') }}"
                            class="h-[32px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">

                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="pt-4">
                        <a href="{{ route('penempatanpkl.show',$data->id_penempatan) }}" class="text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type="submit" class="bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">
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
   
    $('#formEditpenempatan').on('submit', function(e) {
    let tanggal1 = $('#tanggal_mulai').val().trim();
    let tanggal2 = $('#tanggal_selesai').val().trim();
   
    if (tanggal1 === '' || tanggal2 === '') {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Kolom belum diisi!',
            text: '',
        });
        return;
    }
});

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
