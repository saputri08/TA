<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    function index()
    {
        $data['list_kelas'] = Kelas::all();
        $data['list_tahun_ajar'] = TahunAjar::all();
        $data['list'] = Guru::all();
        return view('admin.kelas.index', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'id_tahun_ajar' => 'required'

        ], [
            'nama_kelas.required' => 'Kolom nama_kelas Harus Diisi',
            'id_tahun_ajar.required' => 'Harus dipilih'

        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = request('nama_kelas');
        $kelas->id_tahun_ajar = request('id_tahun_ajar');
        $kelas->save();

        return redirect('admin/kelas')->with('success', 'Data Berhasil Ditambahkan');
    }

    function update($kelas)
    {
        $kelas = Kelas::find($kelas);
        $kelas->nama_kelas = request('nama_kelas');
        $kelas->id_tahun_ajar = request('id_tahun_ajar');

        $kelas->save();

        return redirect('admin/kelas')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($kelas)
    {
        Kelas::destroy($kelas);
        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
