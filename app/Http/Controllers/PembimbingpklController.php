<?php

namespace App\Http\Controllers;

use App\Models\Pembimbingpkl;
use Illuminate\Http\Request;

class PembimbingpklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembimbingpkl::latest('id_pembimbing_pkl')->paginate(10);
        return view('pembimbingpkl.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembimbingpkl.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembimbing_pkl'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required'
        ]);

        Pembimbingpkl::create($request->all());
        return redirect()->route('pembimbingpkl.index')->with('success','Data berhasil disimpan');
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
        $data = Pembimbingpkl::findOrFail($id);
        return view('pembimbingpkl.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pembimbing_pkl'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required'
        ]);

        $data = Pembimbingpkl::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pembimbingpkl.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pembimbingpkl::findOrFail($id);
        $data->delete();
        return redirect()->route('pembimbingpkl.index')->with('success','Data berhasil dihapus');
    }
}
