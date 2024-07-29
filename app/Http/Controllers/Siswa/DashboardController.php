<?php

namespace App\Http\Controllers\Siswa;

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
        try {
            // Ambil ID siswa dari auth()->guard('siswa')->id()
            $siswaId = auth()->guard('siswa')->id();

            // Ambil siswa berdasarkan ID dengan memuat relasi yang dibutuhkan
            $siswa = Siswa::with(['Grup' => function ($query) {
                // Ambil grup terbaru
                $query->latest();
            }])
                ->find($siswaId);

            // Pastikan siswa ditemukan
            if (!$siswa) {
                abort(404, 'Siswa tidak ditemukan');
            }

            $namaKelas = null;

            // Pastikan Grup tidak kosong
            if ($siswa->Grup->isNotEmpty()) {
                // Ambil grup terbaru
                $latestGrup = $siswa->Grup->first();

                // Pastikan grup memiliki anggota
                if ($latestGrup->anggota) {
                    // Memuat kelas dari anggota grup
                    $latestGrup->anggota->load('kelas');

                    // Pastikan relasi anggota memiliki kelas
                    if ($latestGrup->anggota->kelas) {
                        $namaKelas = $latestGrup->anggota->kelas->nama_kelas;
                    }
                }
            }

            return view('siswa.dashboard.index', compact('namaKelas'));
        } catch (\Exception $e) {
            // Tangani pengecualian di sini jika diperlukan
            abort(500, 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
