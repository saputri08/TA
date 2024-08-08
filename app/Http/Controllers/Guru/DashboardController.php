<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        $id_guru = Auth::guard('guru')->user()->id;

        $pengumuman = Pengumuman::whereDoesntHave('detail', function ($query) use ($id_guru) {
            $query->where('id_guru', $id_guru);
        })->get();

        return view('guru.dashboard.index', compact('pengumuman'));
    }
}
