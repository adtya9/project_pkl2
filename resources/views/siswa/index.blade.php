<html>
    <head>
        <title>data siswa</title>
    </head>
    <body>
        <h1>Data Siswa</h1>

       @if(session('success'))
        <p style = "color:blue;">{{session('success')}}</p>
       @endif   

        <a href = "{{ route('siswa.create') }}">Tambah Data</a>

        <table border = "1" cellpadding = "9">
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Sekolah</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $w)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$w->nis}}</td>
                <td>{{$w->nama}}</td>
                <td>{{$w->email}}</td>
                <td>{{$w->nomor_telepon}}</td>
                <td>{{$w->jenis_kelamin}}</td>
                <td>{{$w->sekolah->nama_sekolah}}</td>
                <td>{{$w->jurusan->nama_jurusan}}</td>
                <td>
                    <a href = "{{ route('siswa.edit', $w->id_siswa) }}">Edit</a>
                    <form action = "{{ route('siswa.destroy', $w->id_siswa) }}" method = "POST" class = "d-inline"
                    onsubmit = "return confirm('apakah anda yakin hapus data ini?')">
                    @csrf 
                    @method('DELETE')
                    <button type = "submit">Hapus</button>  
                </form>
                </td>
            </tr>
@endforeach
        </table>
    </body>
</html>