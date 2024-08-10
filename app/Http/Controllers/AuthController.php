<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProccess(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Tentukan apakah login menggunakan email, NIS, atau NIP
        $loginField = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nis_or_nip';

        // Check login as Admin using email
        if ($loginField == 'email' && Auth::guard('admin')->attempt(['email' => $login, 'password' => $password])) {
            return redirect('admin/dashboard')->with('success', 'Login Berhasil');
        }

        // Check login as Siswa using NIS
        if ($loginField == 'nis_or_nip' && Auth::guard('siswa')->attempt(['nis' => $login, 'password' => $password])) {
            return redirect('siswa/dashboard')->with('success', 'Login Berhasil');
        }

        // Check login as Guru using NIP
        if ($loginField == 'nis_or_nip' && Auth::guard('guru')->attempt(['nip' => $login, 'password' => $password])) {
            return redirect('guru/dashboard')->with('success', 'Login Berhasil');
        }

        // Check login as Kepsek using NIP
        if ($loginField == 'nis_or_nip' && Auth::guard('kepsek')->attempt(['nip' => $login, 'password' => $password])) {
            return redirect('kepsek/dashboard')->with('success', 'Login Berhasil');
        }

        return redirect()->back()->with('danger', 'Login Gagal, email/NIS/NIP atau password salah.');
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('siswa')->logout();
        Auth::guard('kepsek')->logout();
        Auth::guard('guru')->logout();

        $request->session()->invalidate();

        return redirect('login');
    }
}
