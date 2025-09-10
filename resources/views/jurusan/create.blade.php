<html>
    <head>
        <title>tambah data jurusan</title>
    </head>
    <body>
        <h1>Tambah data</h1>
        
        <form action = "{{ route('jurusan.store') }}" method = "POST">
            @csrf
            Nama Jurusan : <input type = "text" name = "nama_jurusan"><br>
            <button type = "submit">Simpan</button>
            <a href = "{{ route('jurusan.index') }}">Kembali</a>
        </form>
    </body>
</html>