<?php

namespace App\Models;

use App\Models\Model;
use App\Models\PesertaDidik;
use App\Models\Kelas;
use App\Models\ModelAuthenticate;
use Illuminate\Support\Carbon;

class Pengumuman extends ModelAuthenticate
{

    protected $table = "tb__pengumuman";

    protected $fillable = [
        'id_tahun_ajar',
        'tanggal_mulai',
        'tanggal_selesai',
        'isi',
    ];

    public function getTanggalMulaiStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])->translatedFormat('l, d F Y');
    }

    public function getTanggalSelesaiStringAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_selesai'])->translatedFormat('l, d F Y');
    }

    function detail()
    {
        return $this->hasMany(PengumumanDetail::class, 'id_pengumuman');
    }

    function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun_ajar');
    }
}
