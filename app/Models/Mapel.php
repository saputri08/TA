<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends ModelsModel
{
    use HasFactory;

    protected $table = 'tb__mapel';
    // protected $fillable = [
    //     'id_guru',
    //     'id_kelas',
    //     'nama_mapel',
    // ];

    // static $field = [
    //     'id_guru' => ['required'], 
    //     'id_kelas' => ['required'], 
    //     'nama_mapel' => ['required'], 
    // ];
    // static $pesan = [
    //     'id_guru.required' => "Inputan tidak boleh kosong !", 
    //     'id_kelas.required' => "Inputan tidak boleh kosong !",
    //     'nama_mapel.required' => "Inputan tidak boleh kosong !", 
    // ];

    function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
    function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mapel');
    }
}
