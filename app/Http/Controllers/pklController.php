<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PKL;
use Illuminate\Routing\Controller;

class pklController extends Controller      
{
    public function index()
    {
        $data = PKL::all();
        return view('pkl.index' , compact('data'));
    }
       

    public function create()
    {
        return view('pkl.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jurusan' => 'required|string|max:100',
        ]);

        // Simpan ke database
        PKL::create($request->only(['nama', 'alamat', 'jurusan']));
      
        

        // Kembali ke halaman index
        return redirect()->route('pkl.index')->with('success', 'Data berhasil ditambahkan!');
        
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $data = PKL::findOrFail($id); 
    return view('pkl.edit', compact('data'));
    }   

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'jurusan' => 'required|string|max:100',
    ]);

    $data = Pkl::findOrFail($id);
    $data->update($request->only(['nama', 'alamat', 'jurusan']));

    return redirect()->route('pkl.index')->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
    $data = PKL::findOrFail($id);
    $data->delete();

    return redirect()->route('pkl.index')->with('success', 'Data berhasil dihapus!');
    }

}
