<html>
    <head>
        <title>edit data bagian pkl</title>
        <body>
            <h1>Edit Data</h1>

            <form action = "{{ route('bagianpkl.update', $data->id_bagian) }}" method = "POST">
                @csrf
                @method('PUT')
                Nama Bagian : <input type = "text" name = "nama_bagian" value = "{{ $data->nama_bagian }}">
                <button type = "submit">Simpan</button>
                <a href = "{{ route('bagianpkl.index') }}">Kembali</a>
            </form>
        </body>
    </head>
</html>