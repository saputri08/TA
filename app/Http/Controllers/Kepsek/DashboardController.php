<?php

namespace App\Http\Controllers\Kepsek;

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
        return view('Kepsek.dashboard.index');
    }
}
