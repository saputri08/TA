<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAuthenticate;

class Anggota extends ModelAuthenticate
{
    protected $table = 'anggota';
    protected $fillable = ['id_kelas'];

    public function grup()
    {
        return $this->hasMany(AnggotaGrup::class, 'id_anggota');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun_ajar');
    }
}
