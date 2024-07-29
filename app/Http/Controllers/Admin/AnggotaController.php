<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\AnggotaGrup;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $data['list_anggota'] = Anggota::all();
        $data['list_kelas'] = Kelas::all();
        return view('admin.anggota.index', $data);
    }

    public function show($anggota)
    {
        $data['anggota'] = Anggota::find($anggota);
        $data['siswa'] = Siswa::all();
        return view('admin.anggota.show', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',

        ], [
            'id_kelas' => 'Kolom kelas Harus Diisi',

        ]);

        $anggota = new Anggota();
        $anggota->id_kelas = request('id_kelas');
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Data Berhasil Ditambahkan');
    }

    function update($id, Request $request)
    {
        $anggota = Anggota::find($id);
        if (request('id_kelas')) $anggota->id_kelas = request('id_kelas');
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($anggota)
    {
        Anggota::destroy($anggota);
        return back()->with('danger', 'Data Berhasil Dihapus');
    }

    public function addRole()
    {
        $grup = new AnggotaGrup();
        $grup->id_anggota = request('id_anggota');
        $grup->id_siswa = request('id_siswa');
        $grup->save();

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }
}