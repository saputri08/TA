<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{

    public function index()
    {
        $data['list_tahun_ajar'] = TahunAjar::all();

        return view('admin.tahun-ajar.index', $data);
    }


    public function create()
    {
        return view('admin.tahun-ajar.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'deskripsi' => 'required',

        ], [
            'tahun_mulai' => 'Kolom tahun mulai Harus Diisi',
            'tahun_selesai' => 'Kolom tahun selesai Harus Diisi',
            'deskripsi' => 'Kolom deskripsi Harus Diisi',

        ]);

        $tahun_ajar = new TahunAjar();
        $tahun_ajar->tahun_mulai = request('tahun_mulai');
        $tahun_ajar->tahun_selesai = request('tahun_selesai');
        $tahun_ajar->deskripsi = request('deskripsi');
        $tahun_ajar->save();

        return redirect('admin/tahun-ajar')->with('success', 'Data Berhasil Disimpan');
    }



    public function edit($tahun_ajar)
    {
        $data['tahun_ajar'] = TahunAjar::find($tahun_ajar);

        return view('admin.tahun-ajar.edit', $data);
    }


    public function update($tahun_ajar)
    {
        $tahun_ajar = TahunAjar::find($tahun_ajar);
        $tahun_ajar->tahun_mulai = request('tahun_mulai');
        $tahun_ajar->tahun_selesai = request('tahun_selesai');
        $tahun_ajar->deskripsi = request('deskripsi');
        $tahun_ajar->save();

        return redirect('admin/tahun-ajar')->with('success', 'Data Tahun Ajar Berhasil Diedit');
    }


    public function destroy(TahunAjar $TahunAjar)
    {
        $TahunAjar->delete();
        $save = $TahunAjar->delete();
        if ($save) {
            return back()->with('danger', 'Data berhasil dihapus !');
        } else {
            return back()->with('danger', 'Data Berhasil Dihapus !');
        }
    }
}
