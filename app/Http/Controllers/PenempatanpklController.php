<?php

namespace App\Http\Controllers;

use App\Models\Bagianpkl;
use App\Models\Pembimbingpkl;
use App\Models\Pembimbingsekolah;
use App\Models\Penempatanpkl;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PenempatanpklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penempatan = Penempatanpkl::with(['id_siswa','id_bagian','id_pembimbing_sekolah','id_pembimbing_pkl'])
                      ->latest('tanggal_mulai')->paginate(10);
        return view('penempatanpkl.index', compact('penempatan'));              
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $bagianpkl = Bagianpkl::orderBy('nama_bagian')->get();
        $pembimbingsekolah = Pembimbingsekolah::orderBy('nama_pembimbing_sekolah')->get();
        $pembimbingpkl = Pembimbingpkl::orderBy('nama_pembimbing_pkl')->get();
        return view('penempatanpkl.index', compact('siswa','bagianpkl','pembimbingsekolah','pembimbingpkl'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa'=>'required|exists:siswa,id_siswa',
            'id_bagian'=>'required|exists:bagian,id_bagian',
            'id_pembimbing_sekolah'=>'required|exists:pembimbing_sekolah,id_pembimbing_sekolah',
            'id_pembimbing_pkl'=>'required|exists:pembimbing_pkl,id_pembimbing_pkl',
            'tanggal_mulai'=>'required',
            'tanggal_selesai'=>'required|after_or_equal:tanggal_mulai'
        ]);

        $nabrak = Penempatanpkl::where(['id_siswa',$request->id_siswa])
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
        $bagianpkl = Bagianpkl::all();
        $pembimbingsekolah = Pembimbingsekolah::all();
        $pembimbingpkl = Pembimbingpkl::all();

        return view('penempatanpkl.edit', compact('data','siswa','bagianpkl','pembimbingsekolah','pembimbingpkl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_siswa'=>'required|exists:siswa,id_siswa',
            'id_bagian'=>'required|exists:bagian,id_bagian',
            'id_pembimbing_sekolah'=>'required|exists:pembimbing_sekolah,id_pembimbing_sekolah',
            'id_pembimbing_pkl'=>'required|exists:pembimbing_pkl,id_pembimbing_pkl',
            'tanggal_mulai'=>'required',
            'tanggal_selesai'=>'required|after_or_equal:tanggal_mulai'
        ]);

        $data = Penempatanpkl::findOrFail($id);

        $nabrak = Penempatanpkl::where(['id_siswa',$request->id_siswa])
        ->where(function($q) use($request) {
            $q->whereBetween('tanggal_mulai', [$request->tanggal_mulai,$request->tanggal_selesai])
              ->whereBetween('tanggal_selesai', [$request->tanggal_mulai,$request->tanggal_selesai]);
        })->exists();

        if($nabrak) {
            return back()->withInput()->withErrors(['id_siswa'=>'tanggal pkl siswa ini bentrok dengan jadwal yang sudah ada']);
        }

        $data->update($request->all());
        return redirect()->route('penempatanpkl.index')->with('Data berhasil diubah');


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
