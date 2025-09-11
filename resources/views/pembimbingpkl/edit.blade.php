<html>
    <head>
        <title>eidt data pembimbing pkl</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('pembimbingpkl.update', $data->id_pembimbing_pkl) }}" method="POST">
            @csrf
            @method('PUT')
            Nama pembimbing pkl : <input type = "text" name = "nama_pembimbing_pkl" value = "{{$data->nama_pembimbing_pkl}}">
            Email : <input type = "text" name = "email" value = "{{$data->email}}">
            Nomor telepon : <input type = "text" name = "nomor_telepon" value = "{{$data->nomor_telepon}}">
            <button type = "submit">Simpan</button>
            <a href = "{{ route('pembimbingpkl.index') }}">Kembali</a>
        </form>
    </body>
</html>