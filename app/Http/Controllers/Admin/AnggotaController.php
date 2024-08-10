<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\AnggotaGrup;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\NilaiTambahan;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class AnggotaController extends Controller
{
    public function index()
    {
        $data['list_anggota'] = Anggota::all();
        $data['list_kelas'] = Kelas::all();
        $data['list_guru'] = Guru::all();
        $data['list_tahun_ajar'] = TahunAjar::all();
        return view('admin.anggota.index', $data);
    }

    public function show($anggota)
    {
        $data['anggota'] = Anggota::find($anggota);
        $data['siswa'] = Siswa::all();
        $data['list_mapel'] = Mapel::all();
        return view('admin.anggota.show', $data);
    }

    function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'id_guru' => 'required',
            'id_tahun_ajar' => 'required',

        ], [
            'id_kelas' => 'Kolom kelas Harus Diisi',
            'id_guru' => 'Kolom Wali Kelas Harus Diisi',
            'id_tahun_ajar' => 'Kolom Tahun Ajar Harus Diisi',

        ]);

        $anggota = new Anggota();
        $anggota->id_kelas = request('id_kelas');
        $anggota->id_guru = request('id_guru');
        $anggota->id_tahun_ajar = request('id_tahun_ajar');
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Data Berhasil Ditambahkan');
    }

    function update($id, Request $request)
    {
        $anggota = Anggota::find($id);
        if (request('id_kelas')) $anggota->id_kelas = request('id_kelas');
        if (request('id_guru')) $anggota->id_guru = request('id_guru');
        if (request('id_tahun_ajar')) $anggota->id_tahun_ajar = request('id_tahun_ajar');
        $anggota->save();

        return redirect('admin/anggota')->with('success', 'Data Berhasil di Edit');
    }

    function destroy($anggota)
    {
        Anggota::destroy($anggota);
        return back()->with('danger', 'Data Berhasil Dihapus');
    }

    public function addRole(Request $request)
    {
        $grup = new AnggotaGrup();
        $grup->id_anggota = request('id_anggota');
        $grup->id_siswa = request('id_siswa');
        $grup->save();

        // Add to Nilai
        foreach (request('mapel') as $id_mapel => $mapel) {
            $nilai = new Nilai();
            $nilai->id_mapel = $id_mapel;
            $nilai->id_kelas = request('id_kelas');
            $nilai->id_anggota = request('id_anggota');
            $nilai->id_siswa = request('id_siswa');
            $nilai->semester = request('semester');
            $nilai->save();
        }

        // Add to NilaiTambahan
        $nilaiTambahan = new NilaiTambahan();
        $nilaiTambahan->id_anggota = request('id_anggota');
        $nilaiTambahan->id_kelas = request('id_kelas');
        $nilaiTambahan->id_siswa = request('id_siswa');

        $siswa = Siswa::find($request->input('id_siswa'));

        $data = [
            'nama_siswa' => $siswa->nama,
            'nisn' => $siswa->nisn,
            'tahun_mulai' => request('tahun_mulai'),
            'tahun_selesai' => request('tahun_selesai'),
            'semester' => request('semester'),
        ];

        $randomStr = Str::random(5);
        $output_file = $randomStr . ".png";

        $qrlogo = $this->generateQrcode($output_file, $data);
        $nilaiTambahan->qr_kepsek = $qrlogo;
        $nilaiTambahan->save();

        // Simpan data prestasi ke dalam database

        $prestasi = new Prestasi();
        $prestasi->id_kelas = request('id_kelas');
        $prestasi->id_anggota = request('id_anggota');
        $prestasi->id_siswa = request('id_siswa');
        $prestasi->save();

        // Simpan data ekstrakurikuler ke dalam database

        $ekskul = new Ekstrakurikuler();
        $ekskul->id_kelas = request('id_kelas');
        $ekskul->id_anggota = request('id_anggota');
        $ekskul->id_siswa = request('id_siswa');
        $ekskul->save();

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function deleteRole($id)
    {
        $role = AnggotaGrup::find($id);
        $role->delete();

        return back()->with('danger', 'Data Berhasil Dihapus');
    }

    function generateQrcode($output_file, $data)
    {
        $logo =  public_path('admin-template/dist/img/kemenag.png');
        $isi_text = "
Rapor Digital Madrasah
MAN 2 KETAPANG
Nama : " . $data['nama_siswa'] . "
NISN : " . $data['nisn'] . "
" . $data['tahun_mulai'] . " / " . $data['tahun_selesai'] . "
" . $data['semester'];

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($isi_text)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create($logo)
            ->setResizeToWidth(50);

        $result = $writer->write($qrCode, $logo);
        $result->saveToFile("public/app/QR/" . $output_file);

        return "app/QR/$output_file";
    }
}
