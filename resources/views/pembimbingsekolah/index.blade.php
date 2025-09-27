<html>
    <head>
        <title>data pembimbing sekolah</title>
    </head>
    <body>
        <h1>Data Pembimbing Sekolah</h1>

        @if(session('success'))
        <p style = "color:blue;">{{session('success')}}</p>
        @endif

        @if(session('error'))
        <p style = "color:red;">{{session('error')}}</p>
        @endif

        <a href = "{{ route('pembimbingsekolah.create') }}">Tambah Data</a>

        <table border = "1" cellpadding = "5">
            <tr>
                <th>No</th>
                <th>Nama Pembimbing Sekolah</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>

            @foreach($data as $o)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$o->nama_pembimbing_sekolah}}</td>
                <td>{{$o->email}}</td>
                <td>{{$o->nomor_telepon}}</td>
                <td>
                    <a href = "{{ route('pembimbingsekolah.edit', $o->id_pembimbing_sekolah) }}">Edit</a>
                    <form action = "{{ route('pembimbingsekolah.destroy', $o->id_pembimbing_sekolah) }}" method = "POST" class = "d-inline"
                    onsubmit="return confirm('apakah anda yakin hapus data ini')">
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