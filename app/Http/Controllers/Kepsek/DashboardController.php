<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\PengumumanDetail;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index()
    {
        // Ambil pengumuman terbaru
        $latestPengumuman = Pengumuman::latest('created_at')->first();

        if ($latestPengumuman) {
            $id_tahun_ajar = $latestPengumuman->id_tahun_ajar;
            $semester = $latestPengumuman->semester;
        } else {
            $id_tahun_ajar = null;
        }

        // Ambil semua guru
        $gurus = Guru::all();

        // Ambil detail pengumuman berdasarkan pengumuman terbaru
        if ($latestPengumuman) {
            // Jika ada pengumuman terbaru, ambil detail pengumuman terkait
            $pengumumanDetails = PengumumanDetail::whereHas('pengumuman', function ($query) use ($latestPengumuman) {
                $query->where('id_pengumuman', $latestPengumuman->id);
            })->get();
        } else {
            // Jika tidak ada pengumuman terbaru, set pengumumanDetails sebagai koleksi kosong
            $pengumumanDetails = collect();
        }

        // Mengelompokkan detail pengumuman berdasarkan id_guru
        $guruInput = $pengumumanDetails->groupBy('id_guru')->keys();

        return view('Kepsek.dashboard.index', compact('gurus', 'guruInput', 'id_tahun_ajar', 'latestPengumuman'));
    }
}
