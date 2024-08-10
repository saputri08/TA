<?php

namespace App\Models;

use App\Models\Model;
use App\Models\PesertaDidik;
use App\Models\Kelas;
use App\Models\ModelAuthenticate;

class Prestasi extends ModelAuthenticate
{

    protected $table = "tb__prestasi";

    protected $fillable = [
        'id_anggota',
        'id_kelas',
        'id_siswa',
        'prestasi',
        'keterangan',
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
}
