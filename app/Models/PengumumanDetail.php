<?php

namespace App\Models;

use App\Models\Model;
use App\Models\PesertaDidik;
use App\Models\Kelas;
use App\Models\ModelAuthenticate;

class PengumumanDetail extends ModelAuthenticate
{

    protected $table = "tb__pengumuman_detail";

    protected $fillable = [
        'id_penggumuman',
        'id_guru',
    ];

    function pengumuman()
    {
        return $this->belongsTo(Pengumuman::class, 'id_pengumuman');
    }

    
}
