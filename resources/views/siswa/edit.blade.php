<html>
    <head>
        <title>edit data</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('siswa.update', $data->id_siswa) }}" method = "POST">
            @csrf 
            @method('PUT')
            Nis : <input type = "text" name = "nis" value = "{{$data->nis}}"><br>
            Nama : <input type = "text" name = "nama" value = "{{$data->nama}}"><br>
            Email : <input type = "text" name = "email" value = "{{$data->email}}"><br>
            Nomor Telepon : <input type = "text" name = "nomor_telepon" value = "{{$data->nomor_telepon}}"><br>
            Jenis Kelamin : <input type = "text" name = "jenis_kelamin" value = "{{$data->jenis_kelamin}}"><br>

            <select name = "id_sekolah">
                @foreach($sekolah as $s)
                    <option value = "{{$s->id_sekolah}}"{{$data->id_sekolah == $s->id_sekolah ? 'selected' : ''}}>
                        {{$s->nama_sekolah}}</option>
                        @endforeach
            </select><br>

            <select name = "id_jurusan">
                @foreach($jurusan as $j)
                <option value = "{{$j->id_jurusan}}"{{$data->id_jurusan == $j->id_jurusan ? 'selected' : ''}}>
                    {{$j->nama_jurusan}}</option>
                    @endforeach
            </select><br>
            
            <button type = "submit">Simpan</button>
            <a href = "{{ route('siswa.index') }}">Kembali</a>     
        </form>
    </body>
</html>