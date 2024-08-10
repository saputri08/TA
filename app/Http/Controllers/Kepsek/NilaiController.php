<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\AnggotaGrup;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kepsek;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\NilaiTambahan;
use App\Models\Prestasi;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

class NilaiController extends Controller
{
    public function index()
    {
        $data['list_anggota'] = Anggota::all();
        $data['list_kelas'] = Kelas::all();
        return view('kepsek.nilai.index', $data);
    }

    public function show($kelas)
    {
        $data['kelas'] = Anggota::find($kelas);
        $data['list_anggota'] = AnggotaGrup::where('id_anggota', $kelas)->get();
        return view('kepsek.nilai.show', $data);
    }

    public function edit($id_siswa, $id_kelas)
    {
        // Mengambil data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id_siswa);

        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::with('tahunAjar')->findOrFail($id_kelas);

        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id_kelas);

        $nilai = Nilai::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->with('mapel', 'kelas')
            ->get(); // Menggunakan get() untuk mendapatkan kumpulan data

        // Mengambil nilai tambahan berdasarkan ID siswa dan ID kelas
        $nilai_tambahan = NilaiTambahan::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->first();

        // Mengambil data ekskul berdasarkan ID siswa dan ID kelas
        $ekskul = Ekstrakurikuler::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->get();

        // Mengambil data prestasi berdasarkan ID siswa dan ID kelas
        $prestasi = Prestasi::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->get();

        // Mengambil data anggota kelas berdasarkan id_kelas
        $anggota = Anggota::where('id_kelas', $id_kelas)
            ->with('kelas.tahunAjar')
            ->get();

        $list_mapel = Mapel::all();

        return view('kepsek.nilai.edit', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'list_mapel'));
    }


    public function store(Request $request)
    {

        foreach (request('mapel') as $id_mapel => $mapel) {
            $nilai = new Nilai();
            $nilai->id_mapel = $id_mapel;
            $nilai->id_kelas = request('id_kelas');
            $nilai->id_anggota = request('id_anggota');
            $nilai->id_siswa = request('id_siswa');
            $nilai->tahun_pelajaran = request('tahun_pelajaran');
            $nilai->semester = request('semester');
            $nilai->kkm_pengetahuan = request('kkm_pengetahuan')[$id_mapel];
            $nilai->nilai_pengetahuan = request('nilai_pengetahuan')[$id_mapel];
            $nilai->predikat_pengetahuan = request('predikat_pengetahuan')[$id_mapel];
            $nilai->nilai_keterampilan = request('nilai_keterampilan')[$id_mapel];
            $nilai->predikat_keterampilan = request('predikat_keterampilan')[$id_mapel];
            $nilai->keterangan_pengetahuan = request('keterangan_pengetahuan')[$id_mapel];
            $nilai->keterangan_keterampilan = request('keterangan_keterampilan')[$id_mapel];
            $nilai->save();
        }

        // Simpan data ekstrakurikuler ke dalam database
        $ekskulData = $request->only('ekskul_kegiatan', 'ekskul_nilai', 'ekskul_keterangan');
        foreach ($ekskulData['ekskul_kegiatan'] as $key => $kegiatan) {
            $ekskul = new Ekstrakurikuler();
            $ekskul->id_kelas = request('id_kelas');
            $ekskul->id_anggota = request('id_anggota');
            $ekskul->id_siswa = request('id_siswa');
            $ekskul->ekskul_kegiatan = $kegiatan;
            $ekskul->ekskul_nilai = $ekskulData['ekskul_nilai'][$key];
            $ekskul->ekskul_keterangan = $ekskulData['ekskul_keterangan'][$key];
            $ekskul->save();
        }

        // Simpan data prestasi ke dalam database
        $prestasiData = $request->only('prestasi', 'keterangan');
        foreach ($prestasiData['prestasi'] as $key => $prestasi) {
            $prestasi = new Prestasi();
            $prestasi->id_kelas = request('id_kelas');
            $prestasi->id_anggota = request('id_anggota');
            $prestasi->id_siswa = request('id_siswa');
            $prestasi->prestasi = $prestasiData['prestasi'][$key];
            $prestasi->keterangan = $prestasiData['keterangan'][$key];
            $prestasi->save();
        }

        $nilai_tambahan = new NilaiTambahan();
        $nilai_tambahan->id_anggota = request('id_anggota');
        $nilai_tambahan->id_kelas = request('id_kelas');
        $nilai_tambahan->id_siswa = request('id_siswa');
        $nilai_tambahan->sakit = request('sakit');
        $nilai_tambahan->izin = request('izin');
        $nilai_tambahan->tanpaketerangan = request('tanpaketerangan');
        $nilai_tambahan->catatan_wali = request('catatan_wali');
        $nilai_tambahan->tanggapan_ortu = request('tanggapan_ortu');
        $nilai_tambahan->spiritual_sikap = request('spiritual_sikap');
        $nilai_tambahan->sosial_sikap = request('sosial_sikap');
        $nilai_tambahan->sosial_sikap_keterangan = request('sosial_sikap_keterangan');
        $nilai_tambahan->spiritual_sikap_keterangan = request('spiritual_sikap_keterangan');
        $nilai_tambahan->keterangan_lulus = request('keterangan_lulus');

        $data = [
            'nama_siswa' =>  request('nama_siswa'),
            'nisn' => request('nisn'),
            'tahun_mulai' => request('tahun_mulai'),
            'tahun_selesai' => request('tahun_selesai'),
            'semester' => request('semester'),
        ];

        $randomStr = Str::random(5);
        $output_file = $randomStr . ".png";

        $qrlogo = $this->generateQrcode($output_file, $data);
        $nilai_tambahan->qr_kepsek = $qrlogo;
        $nilai_tambahan->save();


        $id_anggota = request('id_anggota');
        return redirect('kepsek/nilai/' . $id_anggota)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        // Update nilai tambahan
        $nilai_tambahan = NilaiTambahan::where('id_siswa', $siswa->id)->first();
        $nilai_tambahan->update([
            'spiritual_sikap' => $request->spiritual_sikap,
            'spiritual_sikap_keterangan' => $request->spiritual_sikap_keterangan,
            'sosial_sikap' => $request->sosial_sikap,
            'sosial_sikap_keterangan' => $request->sosial_sikap_keterangan,
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'tanpaketerangan' => $request->tanpaketerangan,
            'catatan_wali' => $request->catatan_wali,
            'tanggapan_ortu' => $request->tanggapan_ortu,
            'keterangan_lulus' => $request->keterangan_lulus,
        ]);

        // Update nilai
        foreach ($request->nilai_pengetahuan as $id => $nilai) {
            $nilaiItem = Nilai::find($id);
            $nilaiItem->update([
                'nilai_pengetahuan' => $request->nilai_pengetahuan[$id],
                'kkm_pengetahuan' => $request->kkm_pengetahuan[$id],
                'predikat_pengetahuan' => $request->predikat_pengetahuan[$id],
                'nilai_keterampilan' => $request->nilai_keterampilan[$id],
                'predikat_keterampilan' => $request->predikat_keterampilan[$id],
                'keterangan_pengetahuan' => $request->keterangan_pengetahuan[$id],
                'keterangan_keterampilan' => $request->keterangan_keterampilan[$id],
            ]);
        }

        // Update ekskul
        foreach ($request->ekskul_kegiatan as $id => $ekskul_kegiatan) {
            if ($id == 'new') {
                Ekstrakurikuler::create([
                    'id_anggota' => $request->id_anggota,
                    'id_kelas' => $request->id_kelas,
                    'id_siswa' => $siswa->id,
                    'ekskul_kegiatan' => $ekskul_kegiatan,
                    'ekskul_nilai' => $request->ekskul_nilai[$id],
                    'ekskul_keterangan' => $request->ekskul_keterangan[$id],
                ]);
            } else {
                $ekskul = Ekstrakurikuler::find($id);
                $ekskul->update([
                    'ekskul_kegiatan' => $ekskul_kegiatan,
                    'ekskul_nilai' => $request->ekskul_nilai[$id],
                    'ekskul_keterangan' => $request->ekskul_keterangan[$id],
                ]);
            }
        }

        // Update prestasi
        foreach ($request->prestasi as $id => $prestasi) {
            if ($id == 'new') {
                Prestasi::create([
                    'id_anggota' => $request->id_anggota,
                    'id_kelas' => $request->id_kelas,
                    'id_siswa' => $siswa->id,
                    'prestasi' => $prestasi,
                    'keterangan' => $request->keterangan_prestasi[$id],
                ]);
            } else {
                $prestasiItem = Prestasi::find($id);
                $prestasiItem->update([
                    'prestasi' => $prestasi,
                    'keterangan' => $request->keterangan_prestasi[$id],
                ]);
            }
        }

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        $id_anggota = request('id_anggota');
        return redirect('kepsek/nilai/' . $id_anggota)->with('success', 'Data berhasil diperbarui.');
    }

    public function nilai($anggota)
    {
        $anggota = AnggotaGrup::find($anggota);
        $list_mapel = Mapel::all();

        return view('kepsek.nilai.nilai', compact('anggota', 'list_mapel'));
    }

    public function nilaiDetail($id_siswa, $id_kelas, $deskripsi)
    {
        // Mengambil data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id_siswa);

        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id_kelas);

        $semester = $deskripsi;

        // Mengambil nilai berdasarkan ID siswa, ID kelas, dan semester
        $nilai = Nilai::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->with('mapel', 'kelas')
            ->get();

        // Mengambil nilai tambahan berdasarkan ID siswa, ID kelas, dan semester
        $nilai_tambahan = NilaiTambahan::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->first();

        // Mengambil data ekskul berdasarkan ID siswa, ID kelas, dan semester
        $ekskul = Ekstrakurikuler::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->get();

        // Mengambil data prestasi berdasarkan ID siswa, ID kelas, dan semester
        $prestasi = Prestasi::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->get();


        // Mengambil data anggota kelas berdasarkan id_kelas dan semester
        $anggota = Anggota::where('id_kelas', $id_kelas)
            ->whereHas('tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            })
            ->with('kelas', 'tahunAjar') // Memastikan tahunAjar juga diambil
            ->get();

        $list_mapel = Mapel::all();

        return view('kepsek.nilai.detail', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'semester'));
    }

    public function cetakData($id_siswa, $id_kelas, $deskripsi)
    {
        // Mengambil data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id_siswa);

        // Mengambil data guru berdasarkan ID
        $guru = Guru::where('id_kelas', $id_kelas)->first();

        // Mengambil data kepala sekolah
        $kepsek = Kepsek::first();

        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id_kelas);

        $semester = $deskripsi;

        // Mengambil nilai berdasarkan ID siswa, ID kelas, dan semester
        $nilai = Nilai::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->with('mapel', 'kelas')
            ->get();

        // Mengambil nilai tambahan berdasarkan ID siswa, ID kelas, dan semester
        $nilai_tambahan = NilaiTambahan::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->first();

        // Mengambil data ekskul berdasarkan ID siswa, ID kelas, dan semester
        $ekskul = Ekstrakurikuler::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->get();

        // Mengambil data prestasi berdasarkan ID siswa, ID kelas, dan semester
        $prestasi = Prestasi::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->get();


        // Mengambil data anggota kelas berdasarkan id_kelas dan semester
        $anggota = Anggota::where('id_kelas', $id_kelas)
            ->whereHas('tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            })
            ->with('kelas', 'tahunAjar') // Memastikan tahunAjar juga diambil
            ->get();

        $list_mapel = Mapel::all();

        return view('kepsek.nilai.cetak-nilai', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'guru', 'kepsek', 'semester'));
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
