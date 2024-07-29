<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $siswa = Siswa::all()->count();
        $mapel = Mapel::all()->count();
        $guru = Guru::all()->count();
        $kelas = Kelas::all()->count();
        return view('admin.dashboard.index', compact('siswa', 'mapel', 'guru', 'kelas'));
    }
}
