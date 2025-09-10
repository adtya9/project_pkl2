<html>
    <head>
        <title>data jurusan</title>
    </head>
    <body>
        <h1>Data Jurusan</h1>

        @if(session('success'))
        <p style = "color:blue;">{{session('success')}}</p>
        @endif

        <a href = "{{ route('jurusan.create') }}">Tambah Data</a>

        <table border = "1" cellpadding = "3">
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->nama_jurusan}}</td>
                <td>
                    <a href = "{{ route('jurusan.edit', $j->id_jurusan) }}">Edit</a>
                    <form action = "{{ route('jurusan.destroy', $j->id_jurusan) }}" method = "POST" class = "d-inline"
                    onsubmit = "return confirm('apakah anda yakin ingin hapus data ini')">
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