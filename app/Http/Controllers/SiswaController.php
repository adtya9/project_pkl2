<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Siswa;
use Exception;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::latest('id_siswa')->paginate(10);
        return view('siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $sekolah = Sekolah::all();
        return view('siswa.create', compact('jurusan','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required',
            'jenis_kelamin'=>'required',
            'id_jurusan'=>'required|exists:jurusan,id_jurusan',
            'id_sekolah'=>'required|exists:sekolah,id_sekolah'
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success','Data berhasil disimpan');
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
        $data = Siswa::findOrFail($id);
        $jurusan = Jurusan::all();
        $sekolah = Sekolah::all();
        if (!$jurusan) {
        return redirect()->route('jurusan.index')->with('error', 'Data tidak ditemukan.');
    }
        return view('siswa.edit', compact('data','jurusan','sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'email'=>'required',
            'nomor_telepon'=>'required',
            'jenis_kelamin'=>'required',
            'id_jurusan'=>'required|exists:jurusan,id_jurusan',
            'id_sekolah'=>'required|exists:sekolah,id_sekolah'
        ]);

        $data = Siswa::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('siswa.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        $data = Siswa::findOrFail($id);
        $data->delete();
        return redirect()->route('siswa.index')->with('success','Data berhasil dihapus');

        } catch (QueryException $e) {
            if($e->getCode() == "23000") {
                return redirect()->route('siswa.index')->with('error','Data tidak dapat dihapus! data ini masih digunakan di data penempatan PKL');  
            }
        }
            }
        }

