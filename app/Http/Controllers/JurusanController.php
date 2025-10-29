<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jurusan::latest('id_jurusan')->paginate(10);
        return view('jurusan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan'=>'required'
        ]);

        Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success','Data berhasil disimpan');
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
        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jurusan'=>'required'
        ]);
        
        $data = Jurusan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('jurusan.index')->with('success','Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
        */
       public function destroy(string $id)
{
    $data = Jurusan::findOrFail($id);

    if ($data->siswa()->exists()) {
        return redirect()->route('jurusan.index')
            ->with('error', 'Data tidak dapat dihapus! Data ini masih digunakan di data siswa');
    }

    $data->delete();

    return redirect()->route('jurusan.index')
        ->with('success', 'Data berhasil dihapus');
}
}
