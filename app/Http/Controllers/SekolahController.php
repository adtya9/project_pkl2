<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sekolah::orderBy('nama_sekolah')->paginate(10);
        return view('sekolah.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required',
        ]);

        Sekolah::create($request->all());
        return redirect()->route('sekolah.index')->with('success','data berhasil ditambahkan');
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
        $data = Sekolah::findOrFail($id);
        return view('sekolah.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sekolah'=>'required',
            'alamat_sekolah'=>'required',
        ]);

        $data = Sekolah::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('sekolah.index')->with('success','data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sekolah::findOrFail($id);
        $data->delete();
        return redirect()->route('sekolah.index')->with('success','data berhasil dihapus');
    }
}
