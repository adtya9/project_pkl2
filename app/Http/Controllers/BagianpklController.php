<?php

namespace App\Http\Controllers;

use App\Models\Bagianpkl;
use Illuminate\Http\Request;

class BagianpklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bagianpkl::orderBy('nama_bagian')->paginate(10);
        return view('bagianpkl.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bagianpkl.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bagian'=>'required'
        ]);

        Bagianpkl::create($request->all());
        return redirect()->route('bagianpkl.index')->with('success','data berhasil disimpan');
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
        $data = Bagianpkl::findOrFail($id);
        return view('bagianpkl', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_bagian'=>'required'
        ]);

        $data = Bagianpkl::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('bagianpkl.index')->with('success','data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Bagianpkl::findOrFail($id);
        $data->delete();
        return redirect()->route('bagianpkl.index')->with('success','data berhasil dihapus');
    }
}
