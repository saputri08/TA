<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        $data['list_siswa'] = Siswa::all();
        return view('admin.siswa.index', $data);
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function edit($siswa)
    {
        $data['siswa'] = Siswa::find($siswa);
        return view('admin.siswa.edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tmp_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required',

        ], [
            'nis.required' => 'Kolom nis Harus Diisi',
            'nisn.required' => 'Kolom nisn Harus Diisi',
            'nama.required' => 'Kolom nama Harus Diisi',
            'tgl_lahir.required' => 'Kolom tgl lahir Harus Diisi',
            'tmp_lahir.required' => 'Kolom tmp lahir Harus Diisi',
            'jk.required' => 'Kolom jk Harus Diisi',
            'agama.required' => 'Kolom agama Harus Diisi',
            'alamat.required' => 'Kolom alamat Harus Diisi',
            'email.required' => 'Kolom email Harus Diisi',
            'password.required' => 'Kolom password Harus Diisi',
        ]);

        $siswa = new Siswa;
        $siswa->nis = request('nis');
        $siswa->nisn = request('nisn');
        $siswa->nama = request('nama');
        $siswa->tgl_lahir = request('tgl_lahir');
        $siswa->tmp_lahir = request('tmp_lahir');
        $siswa->jk = request('jk');
        $siswa->agama = request('agama');
        $siswa->alamat = request('alamat');
        $siswa->email = request('email');
        $siswa->password = request('password');

        $siswa->save();

        $siswa->handleUploadFoto();

        return redirect('admin/siswa')->with('success', 'data berhasil disimpan');
    }

    public function show($siswa)
    {
        $data['siswa'] = Siswa::find($siswa);
        return view('admin.siswa.show', $data);
    }

    public function update(Siswa $siswa)
    {
        if (request('nis')) $siswa->nis = request('nis');
        if (request('nisn')) $siswa->nisn = request('nisn');
        if (request('nama')) $siswa->nama = request('nama');
        if (request('tgl_lahir')) $siswa->tgl_lahir = request('tgl_lahir');
        if (request('tmp_lahir')) $siswa->tmp_lahir = request('tmp_lahir');
        if (request('jk')) $siswa->jk = request('jk');
        if (request('agama')) $siswa->agama = request('agama');
        if (request('alamat')) $siswa->alamat = request('alamat');
        if (request('email')) $siswa->email = request('email');
        if (request('password')) $siswa->password = request('password');
        $siswa->save();
        if (request('foto')) $siswa->handleUploadFoto();

        return redirect('admin/siswa')->with('success', 'data berhasil disimpan');
    }

    function destroy($siswa)
    {
        $siswa = Siswa::find($siswa);
        $siswa->handleDelete();
        $siswa->delete();
        return back()->with('danger', 'Data Berhasil Dihapus');
    }
}
