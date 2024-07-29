<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_kelas'] = Kelas::all();
        $data['list_guru'] = Guru::all();
        $data['list_mapel'] = Mapel::all();
        return view('admin.mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
            'kelompok' => 'required',

        ], [
            'nama_mapel' => 'Kolom nama mapel Harus Diisi',
            'id_guru' => 'Kolom guru Harus Diisi',
            'id_kelas' => 'Kolom kelas Harus Diisi',
            'kelompok' => 'Kolom kelompok Harus Diisi',
    
        ]);

        $mapel = new Mapel;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->id_guru = $request->id_guru;
        $mapel->id_kelas = $request->id_kelas;
        $mapel->kelompok = $request->kelompok;
        $mapel->save();
        return back()->with('success', 'Data Mapel Berhasil Ditambahkan');
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
    public function edit(Request $request, $id)
    {

        $mapel = Mapel::find($id);
        if (request('nama_mapel')) $mapel->nama_mapel = $request->nama_mapel;
        if (request('id_guru')) $mapel->id_guru = $request->id_guru;
        if (request('id_kelas')) $mapel->id_kelas = $request->id_kelas;

        $mapel->save();
        return back()->with('success', 'Data Mapel Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->id_guru = $request->id_guru;
        $mapel->id_kelas = $request->id_kelas;
        if (request('kelompok')) $mapel->kelompok = $request->kelompok;
        $mapel->save();
        return back()->with('success', 'Data Mapel Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Mapel $mapel)
    {
        $save = $mapel->delete();
        if ($save) {
            return back()->with('danger',  'Data berhasil dihapus !');
        } else {
            return back()->with('danger',  'Data gagal dihapus !');
        }
    }
}
