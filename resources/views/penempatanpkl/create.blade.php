@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Form Penempatan PKL</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>@foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul>
    </div>
  @endif

  <form action="{{ route('penempatan_pkl.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Pilih Siswa</label>
      <select name="id_siswa" class="form-control" required>
        <option value="">-- Pilih Siswa --</option>
        @foreach($siswa as $s) 
          <option value="{{ $s->id }}" {{ old('id_siswa') == $s->id ? 'selected':'' }}>
            {{ $s->nama }} ({{ $s->nis ?? '-' }})
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Pilih Bagian PKL</label>
      <select name="id_bagian" class="form-control" required>
        <option value="">-- Pilih Bagian --</option>
        @foreach($bagianpkl as $b)
          <option value="{{ $b->id }}" {{ old('id_bagian') == $b->id ? 'selected':'' }}>
            {{ $b->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Pembimbing Sekolah</label>
      <select name="id_pembimbing_sekolah" class="form-control" required>
        <option value="">-- Pilih Pembimbing Sekolah --</option>
        @foreach($pembimbingsekolah as $p)
          <option value="{{ $p->id }}" {{ old('id_pembimbing_sekolah') == $p->id ? 'selected':'' }}>
            {{ $p->nama }} ({{ $p->sekolah->nama ?? '' }})
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Pembimbing PKL</label>
      <select name="id_pembimbing_pkl" class="form-control" required>
        <option value="">-- Pilih Pembimbing PKL --</option>
        @foreach($pembimbingpkl as $p)
          <option value="{{ $p->id }}" {{ old('id_pembimbing_pkl') == $p->id ? 'selected':'' }}>
            {{ $p->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Tanggal Mulai</label>
      <input type="date" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai') }}" required>
    </div>

    <div class="mb-3">
      <label>Tanggal Selesai</label>
      <input type="date" name="tgl_selesai" class="form-control" value="{{ old('tgl_selesai') }}" required>
    </div>

    <button class="btn btn-primary">Simpan Penempatan</button>
  </form>
</div>
@endsection
