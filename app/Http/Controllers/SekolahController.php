<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\PembimbingSekolah;
use App\Models\Penempatanpkl;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $data = Sekolah::latest('id_sekolah')->paginate(10);
        return view('sekolah.index', compact('data'));
    }

    public function create()
    {
        return view('sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
        ]);

        Sekolah::create($request->all());
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $data = Sekolah::findOrFail($id);
        return view('sekolah.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
        ]);

        $data = Sekolah::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
{
    $data = Sekolah::findOrFail($id);

  
    $usedIn = [];

    if ($data->siswa()->exists()) {
        $usedIn[] = 'data siswa';
    }

    if ($data->pembimbingSekolah()->exists()) {
        $usedIn[] = 'data pembimbing sekolah';
    }

    if ($data->penempatanpkl()->exists()) {
        $usedIn[] = 'data penempatan PKL';
    }

    
    if (!empty($usedIn)) {
        
        $last = array_pop($usedIn);
        $list = empty($usedIn)
            ? $last
            : implode(', ', $usedIn) . ' dan ' . $last;

        return redirect()->route('sekolah.index')
            ->with('error', "Data tidak dapat dihapus! Data ini masih digunakan di {$list}.");
    }

 
    $data->delete();

    return redirect()->route('sekolah.index')
        ->with('success', 'Data berhasil dihapus.');
}
}