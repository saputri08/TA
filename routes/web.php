<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KepsekController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TahunAjarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\AnggotaController as GuruAnggotaController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\ProfileController as GuruProfileController;
use App\Http\Controllers\Kepsek\AnggotaController as KepsekAnggotaController;
use App\Http\Controllers\Kepsek\DashboardController as KepsekDashboardController;
use App\Http\Controllers\Kepsek\NilaiController as KepsekNilaiController;
use App\Http\Controllers\Kepsek\PengumumanController;
use App\Http\Controllers\Kepsek\ProfileController as KepsekProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;
use App\Http\Controllers\Siswa\ProfileController;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'admin/kelas');

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProccess']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kepsek', KepsekController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('nilai', NilaiController::class);
    Route::resource('profile', AdminProfileController::class);
    Route::resource('tahun-ajar', TahunAjarController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::post('anggota/add-role', [AnggotaController::class, 'addRole']);
    Route::get('anggota/delete-role/{id}', [AnggotaController::class, 'deleteRole']);

    Route::get('nilai/{anggota}/nilai', [NilaiController::class, 'nilai']);
    Route::put('nilai/{id_siswa}/{id_kelas}/{semester}', [NilaiController::class, 'update']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/detail', [NilaiController::class, 'nilaiDetail']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/edit', [NilaiController::class, 'edit']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}', [NilaiController::class, 'cetakData']);
});

Route::prefix('guru')->middleware('auth:guru')->group(function () {
    Route::resource('dashboard', GuruDashboardController::class);
    Route::resource('nilai', GuruNilaiController::class);
    Route::resource('anggota', GuruAnggotaController::class);
    Route::resource('profile', GuruProfileController::class);
    Route::post('anggota/add-role', [GuruAnggotaController::class, 'addRole']);
    Route::get('anggota/delete-role/{role}', [GuruAnggotaController::class, 'deleteRole']);
    Route::get('nilai/{anggota}/nilai', [GuruNilaiController::class, 'nilai']);
    Route::put('nilai/{id_siswa}/{id_kelas}/{semester}', [GuruNilaiController::class, 'update']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/detail', [GuruNilaiController::class, 'nilaiDetail']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/edit', [GuruNilaiController::class, 'edit']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}', [GuruNilaiController::class, 'cetakData']);
    Route::post('pengumuman/detail', [PengumumanController::class, 'pengumumanDetail']);
});

Route::prefix('kepsek')->middleware('auth:kepsek')->group(function () {
    Route::resource('dashboard', KepsekDashboardController::class);
    Route::resource('nilai', KepsekNilaiController::class);
    Route::resource('profile', KepsekProfileController::class);
    Route::resource('anggota', KepsekAnggotaController::class);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/detail', [KepsekNilaiController::class, 'nilaiDetail']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}', [KepsekNilaiController::class, 'cetakData']);
    Route::resource('pengumuman', PengumumanController::class);
});

Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    Route::resource('dashboard', SiswaDashboardController::class);
    Route::resource('nilai', SiswaNilaiController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}/detail', [SiswaNilaiController::class, 'nilaiDetail']);
    Route::get('nilai/{id_siswa}/{id_kelas}/{deskripsi}', [SiswaNilaiController::class, 'cetakData']);
});
