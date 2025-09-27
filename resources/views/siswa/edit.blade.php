<html>
<head>
    <title>Edit Data Siswa</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="{{ route('siswa.update', $data->id_siswa) }}" method="POST">
        @csrf 
        @method('PUT')
        <table>
            <tr>
                <td>NIS :</td>
                <td><input type="text" name="nis" value="{{ $data->nis }}"></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama" value="{{ $data->nama }}"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="text" name="email" value="{{ $data->email }}"></td>
            </tr>
            <tr>
                <td>Nomor Telepon :</td>
                <td><input type="text" name="nomor_telepon" value="{{ $data->nomor_telepon }}"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin :</td>
                <td><input type="text" name="jenis_kelamin" value="{{ $data->jenis_kelamin }}"></td>
            </tr>
            <tr>
                <td>Nama Sekolah :</td>
                <td>
                    <select name="id_sekolah">
                        @foreach($sekolah as $s)
                            <option value="{{ $s->id_sekolah }}" {{ $data->id_sekolah == $s->id_sekolah ? 'selected' : '' }}>
                                {{ $s->nama_sekolah }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan :</td>
                <td>
                    <select name="id_jurusan">
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}" {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
               <td colspan="2">
                    <a href="{{ route('siswa.index') }}">Kembali</a>
                    <button type="submit">Simpan</button>
               </td>
            </tr>
        </table>
    </form>
</body>
</html>
