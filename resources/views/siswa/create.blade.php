<html>
    <head>
        <title>tambah data siswa</title>
    </head>
    <body>
        <h1>Tambah Data</h1>

        <form action = "{{ route('siswa.store') }}" method = "POST">
            @csrf 
            Nis : <input type = "text" name = "nis"><br>
            Nama : <input type = "text" name = "nama"><br>
            Email : <input type = "text" name = "email"><br>
            Nomor Telepon : <input type = "text" name = "nomor_telepon"><br>
            Jenis Kelamin : <input type = "text" name = "jenis_kelamin"><br>
             
            Nama sekolah : 
            <select name = "id_sekolah">
                @foreach($sekolah as $s)
                <option value = "{{$s->id_sekolah}}">{{$s->nama_sekolah}}</option>
                @endforeach
            </select><br>
            
            Jurusan apa :
            <select name = "id_jurusan">
                @foreach($jurusan as $j)
                <option value = "{{$j->id_jurusan}}">{{$j->nama_jurusan}}</option>
                @endforeach
            </select><br>

            <button type = "submit">Simpan</button>
            <a href = "{{ route('siswa.index') }}">Kembali</a>
        </form>
    </body>
</html>