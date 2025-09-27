<html>
<head>
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data</h1>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf 
        <table>
            <tr>
                <td>NIS :</td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Nomor Telepon :</td>
                <td><input type="text" name="nomor_telepon"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin :</td>
                <td><input type="text" name="jenis_kelamin"></td>
            </tr>
            <tr>
                <td>Nama Sekolah :</td>
                <td>
                    <select name="id_sekolah">
                        @foreach($sekolah as $s)
                            <option value="{{ $s->id_sekolah }}">{{ $s->nama_sekolah }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan :</td>
                <td>
                    <select name="id_jurusan">
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
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
