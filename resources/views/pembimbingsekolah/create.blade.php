<html>
    <head>
        <title>edit data pembimbing sekolah</title>
    </head>
    <body>
        <h1>Tambah Data</h1>

        <form action = "{{ route('pembimbingsekolah.store') }}" method = "POST">
            @csrf
            Nama pembimbing sekolah : <input type = "text" name = "nama_pembimbing_sekolah"><br>
            Email : <input type = "text" name = "email"><br>
            Nomor Telepon : <input type = "text" name = "nomor_telepon"><br>

            <select name = "id_sekolah">
                @foreach($sekolah as $l)
                <option value = "{{$l->id_sekolah}}">{{$l->nama_sekolah}}</option>
                @endforeach
            </select><br>

            <button type = "submit">Simpan</button>
            <a href = "{{ route('pembimbingsekolah.index') }}">Kembali</a>
        </form>
    </body>
</html>