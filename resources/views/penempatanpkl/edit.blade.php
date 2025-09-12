<html>
    <head>
        <title>edit data penempatan pkl</title>
    </head>
    <body>
        <h1>Edit Data</h1>

        <form action = "{{ route('penempatanpkl.store',$data->id_penempatan) }}" method = "POST">
            @csrf
            @method('DELETE')
            
            Nama siswa :
            <select name = "id_siswa">
                <option value = ""></option>
                @foreach($siswa as $s)
                <option value = "{{$s->id_siswa}}"{{$data->id_siswa == $s->id_siswa ? 'selected' : ''}}>
                    {{$s->nama_siswa}}</option>
                    @endforeach
            </select><br>

            Nama bagian : 
            <select name = "id_bagian">
                <option value = ""></option>
                @foreach($bagianpkl as $b)
                <option value = "{{$s->id_bagian}}"{{$data->id_bagian == $b->id_bagian ? 'selected' : ''}}>
                    {{$b->id_bagian}}</option>
                    @endforeach
            </select><br>

            Nama pembimbing sekolah : 
            <select name = "id_pembimbing_sekolah">
            <option value = ""></option>
            @foreach($pembimbingsekolah as $ps)
            <option value = "{{$ps->id_pembimbing_sekolah}}"{{$data->id_pembimbing_sekolah == $ps->id_pembimbing_sekolah ? 'selected' : ''}}>
                {{$ps->nama_pembimbing_sekolah}}</option>
                @endforeach
            </select><br>

            Nama pembimbing pkl :
            <select name = "id_pembimbing_pkl">
                <option value = ""></option>
                @foreach($pembimbingpkl as $pp)
                <option value = "{{$pp->id_pembimbing_pkl}}"{{$data->id_pembimbing_pkl == $pp->id_pembimbing_pkl ? 'selected' : ''}}>
                    {{$ps->nama_pembimbing_pkl}}</option>
                    @endforeach
            </select><br> 

            <input type = "date" name = "tanggal_mulai"><br>
            <input type = "date" name = "tanggal_selesai"><br>

            <button type = "submit">Simpan</button>
            <a href = "{{ route('penempatanpkl.index') }}">Kembali</a>

        </form>
    </body>
</html>