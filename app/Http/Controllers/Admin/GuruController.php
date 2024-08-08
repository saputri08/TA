<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use DateTime;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    function index()
    {
        $data['list_guru'] = Guru::with('kelas')->get();
        return view('admin.guru.index', $data);
    }

    function create()
    {
        $data['list_kelas'] = Kelas::get();
        return view('admin.guru.create', $data);
    }

    public function show($guru)
    {
        $data['guru'] = Guru::find($guru);
        return view('admin.guru.show', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk_guru' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',

        ], [
            'nip.required' => 'Kolom Nip Harus Diisi',
            'nama_guru.required' => 'Kolom nama guru Harus Diisi',
            'tmp_lahir.required' => 'Kolom tmp lahir Harus Diisi',
            'tgl_lahir.required' => 'Kolom tanggal lahir Harus Diisi',
            'jk_guru.required' => 'Kolom jk guru Harus Diisi',
            'email.required' => 'Kolom email Harus Diisi',
            'password.required' => 'Kolom password Harus Diisi',
            'alamat.required' => 'Kolom alamat Harus Diisi',
        ]);

        $guru = new Guru;
        $guru->nip = request('nip');
        $guru->nama_guru = request('nama_guru');
        $guru->tmp_lahir = request('tmp_lahir');
        $guru->tgl_lahir = request('tgl_lahir');
        $guru->jk_guru = request('jk_guru');
        $guru->email = request('email');
        $guru->password = request('password');
        $guru->alamat = request('alamat');
        $guru->handleUploadFoto();
        $guru->save();
        return redirect('admin/guru')->with('success',  'Data berhasil ditambahkan !');
    }

    public function edit($guru)
    {
        $data['guru'] = Guru::find($guru);
        $data['list_kelas'] = Kelas::all();
        return view('admin.guru.edit', $data);
    }

    function update($id, Request $request)
    {
        $guru = Guru::find($id);
        if (request('nip')) $guru->nip = request('nip');
        if (request('nama_guru')) $guru->nama_guru = request('nama_guru');
        if (request('tempat_lahir')) $guru->tmp_lahir = request('tempat_lahir');
        if (request('tanggal_lahir')) $guru->tgl_lahir = request('tanggal_lahir');
        if (request('email')) $guru->email = request('email');
        if (request('alamat')) $guru->alamat = request('alamat');
        if (request('password')) $guru->password = request('password');
        $guru->save();

        if (request('foto')) $guru->handleUploadFoto();

        return redirect('admin/guru')->with('success', 'Data Berhasil di Edit');
    }

    function destroy(Guru $guru)
    {
        $guru->handleDelete();
        $save = $guru->delete();
        if ($save) {
            return back()->with('danger',  'Data berhasil dihapus !');
        } else {
            return back()->with('danger',  'Data gagal dihapus !');
        }
    }
}
