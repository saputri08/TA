<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends ModelsModel
{
    use HasFactory;
    protected $table = 'tb__nilai';

    protected $fillable = [
        'id_anggota',
        'id_kelas',
        'id_siswa',
        'semester',
        'kkm_pengetahun',
        'nilai_pengetahuan',
        'predikat_pengetahuan',
        'nilai_keterampilan',
        'predikat_keterampilan',
        'keterangan_pengetahuan',
        'keterangan_keterampilan',
    ];

    function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }

    function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
    function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
    function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
