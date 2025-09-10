<html>
    <head>
        <title>tambah data bagian pkl</title>
    </head>
    <body>
        <h1>Tambah Data</h1>

        <form action = "{{ route('bagianpkl.store') }}" method = "POST">
            @csrf
            Nama Bagian : <input type = "text" name = "nama_bagian"><br>
            <button type = "submit">Simpan</button>
            <a href = "{{ route('bagianpkl.index') }}">Kembali</a>
        </form>
    </body>
</html>