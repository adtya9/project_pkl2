<html>
    <head>
        <title>data bagian pkl</title>
    </head>
    <body>
        <h1>Data Bagian PKL</h1>

        @if(session('success'))
        <p style = "color:blue;">{{session('success')}}</p>
        @endif

        <a href = "{{ route('bagianpkl.create') }}">Tambah Data</a>

        <table border = "1" cellpadding = "3">
            <tr>
                <th>No</th>
                <th>Bagian PKL</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $b)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $b->nama_bagian}}</td>
                <td>
                    <a href = "{{ route('bagianpkl.edit', $b->id_bagian) }}">Edit</a>
                    <form action = "{{ route('bagianpkl.destroy', $b->id_bagian) }}" method = "POST" class = "d-inline"
                    onsubmit = "return confirm ('apakah anda yakin hapus data ini?')">
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