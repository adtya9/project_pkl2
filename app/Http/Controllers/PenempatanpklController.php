<?php

namespace App\Http\Controllers;

use App\Models\Bagianpkl;
use App\Models\Pembimbingpkl;
use App\Models\Pembimbingsekolah;
use App\Models\Penempatanpkl;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PenempatanpklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penempatan = Penempatanpkl::with(['siswa','sekolah','bagianpkl','pembimbing_sekolah','pembimbing_pkl'])
                      ->latest('tanggal_mulai')->paginate(10);
        return view('penempatanpkl.index', compact('penempatan'));              
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::latest('id_siswa')->get();
        $sekolah = Sekolah::latest('id_sekolah')->get();
        $bagianpkl = Bagianpkl::latest('id_bagian')->get();
        $pembimbingsekolah = Pembimbingsekolah::latest('id_pembimbing_sekolah')->get();
        $pembimbingpkl = Pembimbingpkl::latest('id_pembimbing_pkl')->get();
        return view('penempatanpkl.create', compact('siswa','sekolah','bagianpkl','pembimbingsekolah','pembimbingpkl'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa'=>'required|exists:siswa,id_siswa',
            'id_sekolah'=>'required|exists:sekolah,id_sekolah',
            'id_bagian'=>'required|exists:bagian,id_bagian',
            'id_pembimbing_sekolah'=>'required|exists:pembimbing_sekolah,id_pembimbing_sekolah',
            'id_pembimbing_pkl'=>'required|exists:pembimbing_pkl,id_pembimbing_pkl',
            'tanggal_mulai'=>'required',
            'tanggal_selesai'=>'required|after_or_equal:tanggal_mulai'
        ]);

        $nabrak = Penempatanpkl::where('id_siswa',$request->id_siswa)
        ->where(function($q) use($request) {
            $q->whereBetween('tanggal_mulai', [$request->tanggal_mulai,$request->tanggal_selesai])
              ->whereBetween('tanggal_selesai', [$request->tanggal_mulai,$request->tanggal_selesai]);
        })->exists();

        if($nabrak) {
            return back()->withInput()->withErrors(['id_siswa'=>'tanggal pkl siswa ini bentrok dengan jadwal yang sudah ada']);
        }
        
        Penempatanpkl::create($request->all());
        return redirect()->route('penempatanpkl.index')->with('success','Data berhasil disimpan');
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Penempatanpkl::findOrFail($id);
        $siswa = Siswa::all();
        $sekolah = Sekolah::all();
        $bagianpkl = Bagianpkl::all();
        $pembimbingsekolah = Pembimbingsekolah::all();
        $pembimbingpkl = Pembimbingpkl::all();

        return view('penempatanpkl.edit', compact('data','siswa','sekolah','bagianpkl','pembimbingsekolah','pembimbingpkl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = Penempatanpkl::findOrFail($id);

    
    $request->validate([
        'id_siswa' => 'required|exists:siswa,id_siswa',
        'id_sekolah'=>'required|exists:sekolah,id_sekolah',
        'id_bagian' => 'required|exists:bagian,id_bagian',
        'id_pembimbing_sekolah' => 'required|exists:pembimbing_sekolah,id_pembimbing_sekolah',
        'id_pembimbing_pkl' => 'required|exists:pembimbing_pkl,id_pembimbing_pkl',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
    ]);

    
    if ($request->id_siswa != $data->id_siswa || $request->id_bagian != $data->id_bagian || $request->id_sekolah != $data->id_sekolah) {
        return back()->withErrors(['error' => 'Nama siswa dan bagian PKL tidak boleh diubah.']);
    }
    
    if ($request->tanggal_mulai != $data->tanggal_mulai || $request->tanggal_selesai != $data->tanggal_selesai) {
        $nabrak = Penempatanpkl::where('id_siswa', $request->id_siswa)
            ->where('id_penempatan', '!=', $id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('tanggal_mulai', [$request->tanggal_mulai, $request->tanggal_selesai])
                  ->orWhereBetween('tanggal_selesai', [$request->tanggal_mulai, $request->tanggal_selesai]);
            })->exists();

        if ($nabrak) {
            return back()->withErrors(['tanggal_mulai' => 'Tanggal PKL siswa ini bentrok dengan jadwal yang sudah ada']);
        }
    }

    
    $data->update([
        'id_pembimbing_sekolah' => $request->id_pembimbing_sekolah,
        'id_pembimbing_pkl' => $request->id_pembimbing_pkl,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
    ]);

    return redirect()->route('penempatanpkl.index')->with('success', 'Data berhasil diubah');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Penempatanpkl::findOrFail($id);
        $data->delete();
        return redirect()->route('penempatanpkl.index')->with('success','Data berhasil dihapus');
    }
}
