<!DOCTYPE html>
<html>
<head>
    <title>Data PKL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8fafc; /* abu soft */
            font-family: 'Inter', sans-serif;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }
        h2 {
            font-weight: 700;
            color: #350061; /* ungu gelap */
        }
        /* Tombol Tambah Data → oren */
        .btn-primary {
            background: #f77f00; /* oren */
            border: none;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: #d26900;
        }
        /* Tombol Edit → ungu gelap */
        .btn-warning {
            background:#350061; /* ungu gelap */
            border: none;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
        }
        .btn-warning:hover {
            background: #4b0082;
        }
        /* Tombol Hapus → oren */
        .btn-danger {
            background: #f77f00; /* oren */
            border: none;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
        }
        .btn-danger:hover {
            background: #d26900; /* oren gelap */
        }
        /* Tabel */
        .table {
            border-radius: 0.75rem;
            overflow: hidden;
        }
        thead {
            background: linear-gradient(90deg, #4b0082 0%, #f77f00 100%);
            color: white;
        }
        /* Alert sukses → gradasi ungu gelap + oren */
        .alert-success {
            background: linear-gradient(90deg, #4b0082 0%, #f77f00 100%);
            border: none;
            color: white;
            font-weight: 500;
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Data PKL</h2>

    {{-- pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- tombol tambah data --}}
    <div class="mb-3 text-end">
        <a href="{{ route('pkl.create') }}" class="btn btn-primary shadow-sm">+ Tambah Data</a>
    </div>

    {{-- tabel data --}}
    <div class="table-responsive">
        <table class="table table-striped align-middle text-center shadow-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>
                            {{-- tombol edit --}}
                            <a href="{{ route('pkl.edit', $item->id)}}" class="btn btn-warning btn-sm shadow-sm">Edit</a>

                            {{-- tombol hapus --}}
                            <form action="{{ route('pkl.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin mau hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
