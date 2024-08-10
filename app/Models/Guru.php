<?php

namespace App\Models;

use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Guru extends ModelAuthenticate
{

    protected $table = 'guru';


    // static $field = [
    //     'nama' => 'required|unique:tb_guru',
    // ];
    // static $pesan = [
    //     'nama.required' => 'Harus diisi, tidak boleh kosong !',
    //     'nama.unique' => 'Nama kelas sudah ada, Input nama kelas lain !',
    // ];

    function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_guru', 'id');
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
            $destination = "images/guru";
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
