@extends('layouts.app') 

@section('title','dashboard')

@section('content')

<div class = "flex flex-col items-center mt-6">

<img src = "{{ asset('OIP2.png') }}" class = "h-28 w-auto mt-8 mb-6">

<h1 class = "text-4xl font-bold text-[#e67e22] mb-8">Data PKL Universitas Widyatama</h1>

<div class = "flex gap-4 justify-center flex-wrap">
    <a href = "{{ route('jurusan.index') }}" class = "rounded-lg text-center bg-[#1f3a93] text-white py-4 w-40 font-semibold">Jurusan</a>
    <a href="{{ route('sekolah.index') }}" class = "text-center bg-[#e67e22] py-4 w-40 font-semibold text-white rounded-lg">Sekolah</a>
    <a href = "{{ route('bagianpkl.index') }}" class = "bg-[#1f3a93] rounded-lg text-center font-semibold py-4 w-40 text-white">Bagian PKL</a>
    <a href = "{{ route('siswa.index') }}" class = "bg-[#e67e22] rounded-lg text-white w-40 py-4 font-semibold text-center">Siswa</a>
    <a href = "{{ route('pembimbingsekolah.index') }}" class = "bg-[#1f3a93] text-white text-center font-semibold py-4 w-40 rounded-lg">Pembimbing Sekolah</a>
    <a href = "{{ route('pembimbingpkl.index') }}" class = "bg-[#e67e22] text-white text-center font-semibold rounded-lg py-4 w-40">Pembimbing PKL</a>
    <a href = "{{ route('penempatanpkl.index') }}" class = "bg-[#1f3a93] text-center text-white rounded-lg font-semibold py-4 w-40">Penempatan PKL</a>
    <form action = "{{ route('logout') }}" method="POST">
        @csrf 
        <button type = "submit" class = "bg-[#1f3a93] text-center rounded-lg text-white w-40 py-4">Logout</button>
    </form>
</div>
@endsection 