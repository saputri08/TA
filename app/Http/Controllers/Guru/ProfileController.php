<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::guard('guru')->user();
        return view('guru.profile.index', $data);
    }

    public function edit($guru)
    {
        $data['user'] = Guru::find($guru);
        $data['list_kelas'] = Kelas::all();
        return view('guru.profile.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $user = Guru::find($id);
        if (request('nip')) $user->nip = request('nip');
        if (request('nama_guru')) $user->nama_guru = request('nama_guru');
        if (request('tempat_lahir')) $user->tmp_lahir = request('tempat_lahir');
        if (request('tanggal_lahir')) $user->tgl_lahir = request('tanggal_lahir');
        if (request('email')) $user->email = request('email');
        if (request('alamat')) $user->alamat = request('alamat');
        if (request('password')) $user->password = request('password');
        $user->save();

        if (request('foto')) $user->handleUploadFoto();


        return redirect('guru/profile')->with('success', 'Profile Berhasil di Edit');
    }
}
