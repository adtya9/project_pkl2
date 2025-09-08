<html>
    <head>
        <title>tambah data sekolah</title>
    </head>
    <body>
        <h1>Tambah Data Sekolah</h1>

        <form action="{{ route('sekolah.store') }}" method="POST">
        @csrf
        Nama Sekolah : <input type="text" name="nama_sekolah"><br>
        Alamat Sekolah : <input type="text" name="alamat_sekolah"><br>
        <button type="submit">Simpan</button>
        <a href="{{ route('sekolah.index') }}">Kembali</a>
     </form>
    </body>
</html>