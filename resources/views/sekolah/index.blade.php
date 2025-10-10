<html>
    <head>
        <title>data sekolah</title>
    </head>
    <body>
        <h1>Data Sekolah</h1>
    
    @if (session('success'))
    <p style = "color:#e67e22;">{{session('success')}}</p>
    @endif 

    @if (session('error'))
    <p style = "color:red;">{{session('error')}}</p>
    @endif
    
    <a href = "{{ route('sekolah.create') }}">Tambah Data</a>

    <table border = "1" cellpadding = "4">
        <tr>
            <th>No</th>
            <th>Nama Sekolah</th>
            <th>Alamat Sekolah</th>
            <th>Aksi</th>
        </tr>
    @foreach ($data as $s)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $s->nama_sekolah }}</td>
        <td>{{ $s->alamat_sekolah }}</td>
        <td>
            <a href="{{ route('sekolah.edit', $s->id_sekolah) }}">Edit</a>
            <form action="{{ route('sekolah.destroy', $s->id_sekolah) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('apakah anda yakin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
        </body>
</html>