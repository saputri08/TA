<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\PengumumanDetail;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    function index()
    {
        $data['list_tahun_ajar'] = TahunAjar::all();
        $data['list_pengumuman'] = Pengumuman::all();
        return view('Kepsek.pengumuman.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tahun_ajar' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'isi' => 'required'
        ], [
            'id_tahun_ajar.required' => 'Tahun Ajar Harus Dipilih',
            'tanggal_mulai.required' => 'Tanggal Mulai Harus Diisi',
            'tanggal_selesai.required' => 'Tanggal Selesai Harus Diisi',
            'isi.required' => 'Berat Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $pengumuman = new Pengumuman();
        $pengumuman->id_tahun_ajar = request('id_tahun_ajar');
        $pengumuman->tanggal_mulai = request('tanggal_mulai');
        $pengumuman->tanggal_selesai = request('tanggal_selesai');
        $pengumuman->isi = request('isi');
        $pengumuman->save();

        return redirect('kepsek/pengumuman')->with('success', 'Data Pengumuman Berhasil Ditambahkan');
    }

    public function update($id)
    {
        $pengumuman = Pengumuman::find($id);
        if (request('id_tahun_ajar')) $pengumuman->id_tahun_ajar = request('id_tahun_ajar');
        if (request('tanggal_mulai')) $pengumuman->tanggal_mulai = request('tanggal_mulai');
        if (request('tanggal_selesai')) $pengumuman->tanggal_selesai = request('tanggal_selesai');
        if (request('isi')) $pengumuman->isi = request('isi');
        $pengumuman->save();

        return redirect('kepsek/pengumuman')->with('success', 'Data Pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect('kepsek/pengumuman')->with('danger', 'Data Pengumuman Berhasil Dihapus');
    }

    public function pengumumanDetail()
    {
        $detail = new PengumumanDetail();
        $detail->id_pengumuman = request('id_pengumuman');
        $detail->id_guru = request('id_guru');
        $detail->save();

        return redirect()->back()->with('success', 'Pengumuman berhasil ditandai sebagai sudah input nilai.');
    }
}
