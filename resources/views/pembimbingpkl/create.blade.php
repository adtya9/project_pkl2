<html>
    <head>
        <title>tambah data pembimbing pkl</title>
    </head>
    <body>
        <h1>Tambah Data</h1>

        <form action = "{{ route('pembimbingpkl.store') }}" method = "POST">
            @csrf 
            Nama pembimbing pkl : <input type = "text" name = "nama_pembimbing_pkl">
            Email : <input type = "text" name = "email">
            Nomor telepon : <input type = "text" name = "nomor_telepon">
            <button type = "submit">Simpan</button>
            <a href = "{{ route('pembimbingpkl.index') }}">Kembali</a>
        </form>
    </body>
</html>