<html>
    <head>
        <title>edit data jurusan</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('jurusan.update', $data->id_jurusan) }}" method = "POST">
            @csrf
            @method('PUT')
            Nama Jurusan : <input type = "text" name = "nama_jurusan" value = "{{ $data->nama_jurusan }}"><br>
            <button type = "submit">Simpan</button>
            <a href = "{{ route('jurusan.index') }}">Kembali</a>
        </form> 
    </body>
</html>