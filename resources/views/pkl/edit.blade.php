<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #FFB75E, #ED8F03);
            color: white;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow p-4 bg-light text-dark">
        <h2 class="text-center mb-4">Edit Data PKL</h2>

           <form action="{{ route('pkl.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $data->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ $data->jurusan }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update Data</button>
    </form>
    </div>
</div>
</body>
</html>
