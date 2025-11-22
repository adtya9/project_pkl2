@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class = "bg-[#fffdf2] min-h-screen px-10 py-8">
   
        <h1 class = "text-4xl text-gray-800 font-semibold mb-8">Dashboard</h1>

        @php 
        $data = [
                'Total Jurusan'=>\App\Models\Jurusan::count(),
                'Total Sekolah'=>\App\Models\Sekolah::count(),
                'Total Bagian PKL'=>\App\Models\Bagianpkl::count(),
                'Total Siswa'=>\App\Models\Siswa::count(),
                'Total Pembimbing PKL'=>\App\Models\Pembimbingpkl::count(),
                'Total Penempatan PKL'=>App\Models\Penempatanpkl::count()
];
@endphp 

<div class = "grid grid-cols-2 sm:grid-cols-3 mb-10 gap-6">
        @foreach ( $data as $title=>$count )
        <div class = "bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition border border-gray-100">
                <p class = "text-sm text-gray-500 mb-2">{{ $title }}</p>
                <h2 class = "text-gray-800 font-semibold text-2xl">{{ $count }}</h2>
        </div>
        @endforeach
</div>

 <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">

    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
    <h3 class="text-gray-500 text-xl mb-4">Penempatan Terbaru</h3>

    @if($penempatanTerbaru->isEmpty())
        <p class="text-sm text-red-600 italic">Belum ada penempatan terbaru.</p>
    @else
        <ul class="divide-y divide-gray-200">
            @foreach($penempatanTerbaru as $p)
            <li class="py-3 flex justify-between">
                
                <div>
                    <p class="font-semibold">{{ $p->siswa->nama ?? '-' }}</p>
                    <p class="text-gray-500 text-xs">
                        {{ $p->sekolah->nama_sekolah ?? '-' }} — {{ $p->bagianpkl->nama_bagian ?? '-' }}
                    </p>
                </div>

                <div class="text-right text-xs text-red-600">
                    <p><span class="font-medium">Mulai:</span> {{ $p->tanggal_mulai }}</p>
                    <p class="mt-1"><span class="font-medium">Selesai:</span> {{ $p->tanggal_selesai }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</div>

    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
        <h3 class="text-gray-600 text-xl mb-4">Penempatan Akan Berakhir (30 Hari)</h3>

        @if($penempatanAkanBerakhir->isEmpty())
            <p class="text-sm text-red-600 italic">Tidak ada penempatan yang akan berakhir dalam 30 hari ke depan.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach($penempatanAkanBerakhir as $p)
                <li class="py-3 flex justify-between">
                    <div>
                        <p class="font-semibold">{{ $p->siswa->nama ?? '-' }}</p>
                        <p class="text-gray-500 text-xs">
                            {{ $p->sekolah->nama_sekolah ?? '-' }} — {{ $p->bagianpkl->nama_bagian ?? '-' }}
                        </p>
                    </div>

                    <span class="text-xs text-red-600 font-semibold">
                        Berakhir: {{ $p->tanggal_selesai }}
                    </span>
                </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>

</div>

@endsection