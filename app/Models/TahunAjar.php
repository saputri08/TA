<?php

namespace App\Models;

use App\Models\Model;

class TahunAjar extends Model
{
    protected $table = 'tb__tahun_ajar';

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id');
    }
}
