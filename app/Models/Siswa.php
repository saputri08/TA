<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Siswa extends ModelAuthenticate
{

    protected $table = 'siswa';
    protected $fillabel = [
        'nis',
        'nama',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'email',
        'password',
    ];

    public function Grup()
    {
        return $this->hasMany(AnggotaGrup::class, 'id_siswa', 'id');
    }

    public function getTanggalLahirStringAttribute()
    {
        return Carbon::parse($this->attributes['tgl_lahir'])->translatedFormat('l, d F Y');
    }

    function handleUploadFoto()
    {
        $this->handleDelete();
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/siswa";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto = $this->foto;
        if ($foto) {
            $path = public_path($foto);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
