<html>
    <head>
        <title>edit data sekolah</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('sekolah.update', $data->id_sekolah) }}" method = "POST">
            @csrf 
            @method('PUT')
            Nama Sekolah : <input type = "text" name = "nama_sekolah" value = "{{ $data->nama_sekolah }}"><br>
            Alamat Sekolah : <input type = "text" name = "alamat_sekolah" value = "{{ $data->alamat_sekolah }}"><br>
            <button type = "submit">Simpan</button>
            <a href = "{{ route('sekolah.index') }}">Kembali</a>  
             </form>
    </body>

</html>