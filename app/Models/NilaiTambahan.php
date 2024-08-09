<?php

namespace App\Models;

use App\Models\Model;
use App\Models\PesertaDidik;
use App\Models\Kelas;
use App\Models\ModelAuthenticate;
use Carbon\Carbon;

class NilaiTambahan extends ModelAuthenticate
{

    protected $table = "tb__nilai_tambahan";

    protected $fillable = [
        'id_anggota',
        'id_kelas',
        'id_siswa',
        'spiritual_sikap',
        'sosial_sikap',
        'spiritual_sikap_keterangan',
        'sosial_sikap_keterangan',
        'izin',
        'sakit',
        'tanpaketerangan',
        'catatan_wali',
        'tanggapan_ortu',
        'keterangan_lulus',
    ];

    function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }

    function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // Metode untuk memformat tanggal ke format Indonesia
    public function getFormattedCreatedAtAttribute()
    {
        $bulanIndonesia = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $date = Carbon::parse($this->attributes['created_at']);
        $hari = $date->format('d');
        $bulan = $bulanIndonesia[(int)$date->format('m')];
        $tahun = $date->format('Y');

        return "$hari $bulan $tahun";
    }
}
