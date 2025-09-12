<html>
  <head>
    <title>data penempatan pkl</title>
  </head>
  <body>
    <h1>Tambah Data</h1>

    <form action = "{{ route('penempatanpkl.store') }}" method = "POST">
      @csrf

      Nama siswa : 
      <select name = "id_siswa">
        <option value = ""></option>
        @foreach($siswa as $s)
        <option value = "{{$s->id_siswa}}">{{$s->nama}}</option>
        @endforeach
      </select><br>

      Nama bagian : 
      <select name = "id_bagian">
        <option value = ""></option>
        @foreach($bagianpkl as $b)
        <option value = "{{$b->id_bagian}}">{{$b->nama_bagian}}</option>
        @endforeach
      </select><br>
      

      Nama pembimbing sekolah : 
      <select name = "id_pembimbing_sekolah">
        <option value = ""></option>
        @foreach($pembimbingsekolah as $ps)
        <option value = "{{$ps->id_pembimbing_sekolah}}">{{$ps->nama_pembimbing_sekolah}}</option>
        @endforeach
      </select><br>
      
      Nama pembimbing pkl : 
      <select name = "id_pembimbing_pkl">
        <option value = ""></option>
        @foreach($pembimbingpkl as $pp)
        <option value = "{{$pp->id_pembimbing_pkl}}">{{$pp->nama_pembimbing_pkl}}</option>
        @endforeach
      </select><br>

      Tanggal mulai : <input type = "date" name = "tanggal_mulai"><br>
      Tanggal selesai : <input type = "date" name = "tanggal_selesai"><br>  

      <button type = "submit">Simpan</button>
      <a href = "{{ route('penempatanpkl.index') }}">Kembali</a>
    </form>
  </body>
</html>