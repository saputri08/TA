<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::guard('siswa')->user();
        return view('siswa.profile.index', $data);
    }

    public function edit($id)
    {
        return view('siswa.profile.edit', [
            'user' => Siswa::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|regex:/^[\pL\s\-]+$/u',
            'email' => 'email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'email.email' => 'Alamat email tidak valid.',
            'name.regex' => 'Kolom nama hanya boleh mengandung huruf, spasi, dan tanda hubung.',
            'name.string' => 'Kolom nama harus huruf semua',
            'avatar.image' => 'Avatar harus berupa gambar.',
            'avatar.mimes' => 'Avatar harus dalam format JPEG, PNG, JPG, atau GIF.',
            'avatar.max' => 'Avatar Maksimal 2 MB'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $user = Siswa::find($id);
        if (request('nis')) $user->nis = request('nis');
        if (request('nisn')) $user->nisn = request('nisn');
        if (request('nama')) $user->nama = request('nama');
        if (request('tgl_lahir')) $user->tgl_lahir = request('tgl_lahir');
        if (request('tmp_lahir')) $user->tmp_lahir = request('tmp_lahir');
        if (request('jk')) $user->jk = request('jk');
        if (request('agama')) $user->agama = request('agama');
        if (request('alamat')) $user->alamat = request('alamat');
        if (request('email')) $user->email = request('email');
        if (request('password')) $user->password = request('password');
        $user->save();
        if (request('foto')) $user->handleUploadFoto();

        return redirect('siswa/profile')->with('success', 'Profile Berhasil di Edit');
    }
}
