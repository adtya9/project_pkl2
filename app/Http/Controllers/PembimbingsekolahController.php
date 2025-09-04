<?php

namespace App\Http\Controllers;

use App\Models\Pembimbingsekolah;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class PembimbingsekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembimbingsekolah::orderBy('nama_pembimbing_sekolah')->paginate(10);
        return view('pembimbingsekolah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        return view('pembimbingsekolah.index', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembimbing_sekolah'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required'
        ]);

        Pembimbingsekolah::create($request->all());
        return redirect()->route('pembimbingsekolah.index')->with('success','data berhasil ditambahkan');
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
        $data = Pembimbingsekolah::findOrFail($id);
        return view('pembimbingsekolah.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama_pembimbing_sekolah'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required'
        ]);

        $data = Pembimbingsekolah::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pembimbingsekolah.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pembimbingsekolah::findOrFail($id);
        $data->delete();
        return redirect()->route('pembimbingsekolah.index')->with('success','data berhasil dihapus');
    }
}
