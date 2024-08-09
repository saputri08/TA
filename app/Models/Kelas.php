<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends ModelsModel
{

    protected $table = 'tb__kelas';

    function guru()
    {
        return $this->belongsTo(Guru::class, 'id', 'id_kelas');
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'id_kelas', 'id');
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_kelas');
    }
}
