<html>
    <head>
        <title>Data Penempatan PKL</title>
    </head>
    <body>
        <h1>Data Penempatan PKL</h1>

        @if(session('success'))
            <p style="color:blue;">{{session('success')}}</p>
        @endif   

        <a href="{{ route('penempatanpkl.create') }}">Tambah Data</a>

        <table border="1" cellpadding="8">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Bagian Pkl</th>
                <th>Nama Pembimbing Sekolah</th>
                <th>Nama Pembimbing PKL</th>
                <th>Tanggal Mulai</th>  
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
            </tr>

            @foreach($penempatan as $w)
            <tr>        
                <td>{{ $loop->iteration }}</td>
                <td>{{ $w->siswa->nama}}</td>
                <td>{{ $w->bagianpkl->nama_bagian}}</td>
                <td>{{ optional($w->pembimbing_sekolah)->nama_pembimbing_sekolah }}</td>
                <td>{{ $w->pembimbing_pkl->nama_pembimbing_pkl}}</td>
                <td>{{ $w->tanggal_mulai }}</td>
                <td>{{ $w->tanggal_selesai }}</td>
                <td>
                    <a href="{{ route('penempatanpkl.edit', $w->id_penempatan) }}">Edit</a>
                    <form action="{{ route('penempatanpkl.destroy', $w->id_penempatan) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Apakah anda yakin hapus data ini?')">
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
