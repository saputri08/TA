<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kepsek;
use DateTime;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    function index()
    {
        $data['list_kepsek'] = Kepsek::all();
        return view('admin.kepsek.index', $data);
    }

    function create()
    {
        return view('admin.kepsek.create');
    }

    public function show($kepsek)
    {
        $data['kepsek'] = Kepsek::find($kepsek);
        return view('admin.kepsek.show', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_kepsek' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk_kepsek' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',

        ], [
            'nip' => 'Kolom Nip Harus Diisi',
            'nama_kepsek' => 'Kolom nama kepsek Harus Diisi',
            'tmp_lahir' => 'Kolom tmp lahir Harus Diisi',
            'tgl_lahir' => 'Kolom tanggal lahir Harus Diisi',
            'jk_kepsek' => 'Kolom jk kepsek Harus Diisi',
            'email' => 'Kolom email Harus Diisi',
            'password' => 'Kolom password Harus Diisi',
            'alamat' => 'Kolom alamat Harus Diisi',
        ]);

        $kepsek = new Kepsek();
        $kepsek->nip = request('nip');
        $kepsek->nama_kepsek = request('nama_kepsek');
        $kepsek->tmp_lahir = request('tempat_lahir');
        $kepsek->tgl_lahir = request('tanggal_lahir');
        $kepsek->jk_kepsek = request('jk_kepsek');
        $kepsek->email = request('email');
        $kepsek->password = request('password');
        $kepsek->alamat = request('alamat');
        $kepsek->save();

        $kepsek->handleUploadFoto();

        return redirect('admin/kepsek')->with('success',  'Data berhasil ditambahkan !');
    }

    public function edit($kepsek)
    {
        $data['kepsek'] = Kepsek::find($kepsek);
        return view('admin.kepsek.edit', $data);
    }

    function update($id, Request $request)
    {
        $kepsek = Kepsek::find($id);
        if (request('nip')) $kepsek->nip = request('nip');
        if (request('nama_kepsek')) $kepsek->nama_kepsek = request('nama_kepsek');
        if (request('tmp_lahir')) $kepsek->tmp_lahir = request('tmp_lahir');
        if (request('tgl_lahir')) $kepsek->tgl_lahir = request('tgl_lahir');
        if (request('jk_kepsek')) $kepsek->jk_kepsek = request('jk_kepsek');
        if (request('email')) $kepsek->email = request('email');
        if (request('alamat')) $kepsek->alamat = request('alamat');
        if (request('password')) $kepsek->password = request('password');
        $kepsek->save();

        if (request('foto')) $kepsek->handleUploadFoto();

        return redirect('admin/kepsek')->with('success', 'Data Berhasil di Edit');
    }

    function destroy(Kepsek $kepsek)
    {
        $kepsek->handleDelete();
        $save = $kepsek->delete();
        if ($save) {
            return back()->with('success',  'Data berhasil dihapus !');
        } else {
            return back()->with('danger',  'Data gagal dihapus !');
        }
    }
}
