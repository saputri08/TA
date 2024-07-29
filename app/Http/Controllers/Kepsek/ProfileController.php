<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::guard('kepsek')->user();
        return view('kepsek.profile.index', $data);
    }

    public function edit($kepsek)
    {
        $data['user'] = Kepsek::find($kepsek);
        return view('kepsek.profile.edit', $data);
    }

    public function update(Request $request, $id)
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


        return redirect('kepsek/profile')->with('success', 'Profile Berhasil di Edit');
    }
}
