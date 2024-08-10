<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data['user'] = Auth::guard('admin')->user();
        return view('admin.profile.index', $data);
    }

    public function edit($admin)
    {
        $data['user'] = Admin::find($admin);
        return view('admin.profile.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $admin = Admin::find($id);
        if (request('nama')) $admin->nama = request('nama');
        if (request('email')) $admin->email = request('email');
        if (request('password')) $admin->password = request('password');
        $admin->save();

        if (request('foto')) $admin->handleUploadFoto();


        return redirect('admin/profile')->with('success', 'Profile Berhasil di Edit');
    }
}
