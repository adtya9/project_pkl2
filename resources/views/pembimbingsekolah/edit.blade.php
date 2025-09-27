<html>
    <head>
        <title>edit data pembimbing sekolah</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('pembimbingsekolah.update', $data->id_pembimbing_sekolah) }}" method = "POST">
            @csrf
            @method('PUT')
            Nama pembimbing sekolah : <input type = "text" name = "nama_pembimbing_sekolah" value = "{{$data->nama_pembimbing_sekolah}}"><br>
            Email : <input type = "text" name = "email" value = "{{$data->email}}"><br>
            Nomor Telepon : <input type = "text" name = "nomor_telepon" value = "{{$data->nomor_telepon}}"><br> 

            <select name = "id_sekolah">
                @foreach($sekolah as $l)
                <option value = "{{$l->id_sekolah}}" {{$data->id_sekolah == $l->id_sekolah ? 'selected' : ''}}>
                    {{$l->nama_sekolah}}</option>
                    @endforeach
            </select><br>
            
                    <button type = "submit">Simpan</button>
                    <a href = "{{ route('pembimbingsekolah.index') }}">Kembali</a>
        </form> 
    </body>
</html>