@extends('layouts.app')

@section('title','Tambah Data Penempatan PKL')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen flex items-start justify-center">

    <div class = "bg-white rounded-lg p-8 border border-gray-400">

        <h1 class = "text-2xl font-bold mb-6">Tambah Data Penempatan PKL</h1>

        <form action = "{{ route('penempatanpkl.store') }}" method="POST" class = "mt-6">
            @csrf

            <table cellpadding = "8">
                <tr>
                  <td class = "pr-4">Nama Siswa : </td>
                  <td>
                    <select name = "id_siswa" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                      @foreach ($siswa as $s )
                      <option value = "{{ $s->id_siswa }}">{{ $s->nama }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                
                <tr>
                <td class = "pr-4">Nama Sekolah : </td>
                <td>
                    <select name="id_sekolah" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                        @foreach($sekolah as $s)
                            <option value="{{ $s->id_sekolah }}">{{ $s->nama_sekolah }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
              <td class = "pr-4">Nama Jurusan : </td>
              <td>
                <select name = "id_jurusan" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                  @foreach ($jurusan as $j)
                  <option value = "{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class = "pr-4">Nama Bagian PKL : </td>
              <td>
                <select name = "id_bagian" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                  @foreach ($bagianpkl as $j)
                  <option value = "{{ $j->id_bagian }}">{{ $j->nama_bagian }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class = "pr-4">Nama Pembimbing Sekolah : </td>
              <td>
                <select name = "id_pembimbing_sekolah" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                  @foreach ($pembimbingsekolah as $j)
                  <option value = "{{ $j->id_pembimbing_sekolah }}">{{ $j->nama_pembimbing_sekolah }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
              <td class = "pr-4">Nama Pembimbing PKL : </td>
              <td>
                <select name = "id_pembimbing_pkl" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2 text-[15px]">
                  @foreach ($pembimbingpkl as $j)
                  <option value = "{{ $j->id_pembimbing_pkl }}">{{ $j->nama_pembimbing_pkl }}</option>
                  @endforeach
                </select>
              </td>
            </tr>

            <tr>
                    <td class = "pr-4">Tanggal Mulai: </td>
                    <td><input type = "date" name = "tanggal_mulai" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2
                        text-[15px]"></td>
            </tr>

            <tr>
                    <td class = "pr-4">Tanggal Selesai : </td>
                    <td><input type = "date" name = "tanggal_selesai" class = "h-[38px] rounded w-[230px] border border-gray-400 px-2
                        text-[15px]"></td>
                </tr>

                <tr>
                    <td colspan="2" class = "pt-4">
                        <a href = "{{ route('penempatanpkl.index') }}" class = "text-red-500 mr-3 hover:underline">Kembali</a>
                        <button type = "submit" class = "bg-black rounded px-4 py-2 text-[#fffdf2] hover:bg-gray-800">Simpan
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection