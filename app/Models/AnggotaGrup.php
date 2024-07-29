<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ModelAuthenticate;

class AnggotaGrup extends ModelAuthenticate
{
    protected $table = 'anggota_grup';
    protected $fillable = [
        'id_anggota',
        'id_kelas',
        'id_siswa',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
