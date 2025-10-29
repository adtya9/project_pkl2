<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Penempatan PKL</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="{{ route('penempatanpkl.update', $data->id_penempatan) }}" method="POST">
        @csrf 
        @method('PUT')

        <table>
            <tr>
                <td>Nama Siswa :</td>
                <td>
                    <select disabled>
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
                <td>Nama Sekolah :</td>
                <td>
                    <select disabled>
                        @foreach($sekolah as $s)
                        <option {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : ''}}>
                            {{$s->nama_sekolah}}</option>
                            @endforeach
                    </select>
                    <input type="hidden" name = "id_sekolah" value = "{{ $data->id_sekolah }}">
                </td>
            </tr>

            <tr>
                <td>Nama Jurusan :</td>
                <td>
                    <select disabled>
                        @foreach($jurusan as $j)
                        <option {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : ''}}>
                            {{$j->nama_jurusan}}</option>
                            @endforeach
                    </select>
                    <input type="hidden" name = "id_jurusan" value = "{{ $data->id_jurusan }}">
                </td>
            </tr>





            <tr>
                <td>Nama Bagian PKL :</td>
                <td>
                    <select disabled>
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
                <td>Pembimbing Sekolah :</td>
                <td>
                    <select name="id_pembimbing_sekolah">
                        <option value=""></option>
                        @foreach($pembimbingsekolah as $ps)
                            <option value="{{ $ps->id_pembimbing_sekolah }}" {{ $data->id_pembimbing_sekolah == $ps->id_pembimbing_sekolah ? 'selected' : '' }}>
                                {{ $ps->nama_pembimbing_sekolah }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Pembimbing PKL :</td>
                <td>
                    <select name="id_pembimbing_pkl">
                        <option value=""></option>
                        @foreach($pembimbingpkl as $pp)
                            <option value="{{ $pp->id_pembimbing_pkl }}" {{ $data->id_pembimbing_pkl == $pp->id_pembimbing_pkl ? 'selected' : '' }}>
                                {{ $pp->nama_pembimbing_pkl }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggal Mulai :</td>
                <td><input type="date" name="tanggal_mulai" value="{{ $data->tanggal_mulai }}"></td>
            </tr>

            <tr>
                <td>Tanggal Selesai :</td>
                <td><input type="date" name="tanggal_selesai" value="{{ $data->tanggal_selesai }}"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <a href="{{ route('penempatanpkl.index') }}">Kembali</a>
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
