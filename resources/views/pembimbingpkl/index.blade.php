<html>
    <head>
        <title>data pembimbing pkl</title> 
    </head>
    <body>
        <h1>Data Pembimbing Pkl</h1>

        @if(session('success'))
        <p style = "color:blue;">{{session('success')}}</p>
        @endif

        <a href = "{{ route('pembimbingpkl.create') }}">Tambah Data</a>

        <table border = "1" cellpadding = "5">
            <tr>
                <th>No</th>
                <th>Nama Pembimbing Pkl</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->nama_pembimbing_pkl}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->nomor_telepon}}</td>
                <td>
                    <a href = "{{ route('pembimbingpkl.edit', $d->id_pembimbing_pkl) }}">Edit</a>
                    <form action = "{{ route('pembimbingpkl.destroy', $d->id_pembimbing_pkl) }}" method = "POST" class = "d-inline"
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