<?php

namespace App\Http\Controllers;

use App\Models\Penempatanpkl;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Bagianpkl;
use App\Models\Siswa;
use App\Models\Pembimbingpkl;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $data = [
            'Total Jurusan' => Jurusan::count(),
            'Total Sekolah' => Sekolah::count(),
            'Total Bagian PKL' => Bagianpkl::count(),
            'Total Siswa' => Siswa::count(),
            'Total Pembimbing PKL' => Pembimbingpkl::count(),
            'Total Penempatan PKL' => Penempatanpkl::count()
        ];

        // Penempatan terbaru (5 data)
        $penempatanTerbaru = Penempatanpkl::with(['siswa','sekolah','bagianpkl'])
                            ->orderBy('tanggal_mulai','DESC')
                            ->limit(5)
                            ->get();

        // Penempatan akan berakhir (7 hari lagi)
       // Penempatan akan berakhir dalam 30 hari ke depan
$today = Carbon::today();
$limit = Carbon::today()->addDays(30);

$penempatanAkanBerakhir = Penempatanpkl::with(['siswa','sekolah','bagianpkl'])
    ->where('tanggal_selesai', '>=', $today)
    ->where('tanggal_selesai', '<=', $limit)
    ->orderBy('tanggal_selesai')
    ->get();

        return view('dashboard', compact('data','penempatanTerbaru','penempatanAkanBerakhir'));
    }
}
