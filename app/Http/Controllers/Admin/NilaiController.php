<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.nilai.index', $data);
    }

    public function show($kelas)
    {
        $data['kelas'] = Anggota::find($kelas);
        $data['list_anggota'] = AnggotaGrup::where('id_anggota', $kelas)->get();
        return view('admin.nilai.show', $data);
    }

    public function edit($id_siswa, $id_kelas, $deskripsi)
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

        return view('admin.nilai.edit', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'list_mapel', 'semester'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'id_mapel' => 'required',
        //     'id_kelas' => 'required',
        //     'id_anggota' => 'required',
        //     'id_siswa' => 'required',
        //     'tahun_pelajaran' => 'required',
        //     'semester' => 'required',
        //     'kkm_pengetahuan' => 'required',
        //     'nilai_pengetahuan' => 'required',
        //     'predikat_pengetahuan' => 'required',
        //     'nilai_keterampilan' => 'required',
        //     'predikat_keterampilan' => 'required',
        //     'keterangan_pengetahuan' => 'required',
        //     'keterangan_keterampilan' => 'required',
        //     'ekskul_kegiatan' => 'required',
        //     'ekskul_nilai' => 'required',
        //     'ekskul_keterangan' => 'required',
        //     'prestasi' => 'required',
        //     'keterangan' => 'required',
        //     'sakit' => 'required',
        //     'izin' => 'required',
        //     'tanpaketerangan' => 'required',
        //     'catatan_wali' => 'required',
        //     'tanggapan_ortu' => 'required',
        //     'spiritual_sikap ' => 'required',
        //     'sosial_sikap' => 'required',
        //     'sosial_sikap_keterangan' => 'required',
        //     'spiritual_sikap_keterangan' => 'required',
        //     'keterangan_lulus' => 'required',

        // ], [
        //     'id_mapel' => 'Kolom mapel Harus Diisi',
        //     'id_kelas' => 'Kolom kelas Harus Diisi',
        //     'id_anggota' => 'Kolom anggota Harus Diisi',
        //     'id_siswa' => 'Kolom siswa Harus Diisi',
        //     'tahun_pelajaran' => 'Kolom tahun pelajaran Harus Diisi',
        //     'semester' => 'Kolom semester Harus Diisi',
        //     'kkm_pengetahuan' => 'Kolom kkm pengetahuan Harus Diisi',
        //     'nilai_pengetahuan' => 'Kolom nilai pengetahuan Harus Diisi',
        //     'predikat_pengetahuan' => 'Kolom predikat pengetahuan Harus Diisi',
        //     'nilai_keterampilan' => 'Kolom nilai keterampilan Harus Diisi',
        //     'predikat_keterampilan' => 'Kolom predikat keterampilan Harus Diisi',
        //     'keterangan_pengetahuan' => 'Kolom keterangan pengetahuan Harus Diisi',
        //     'keterangan_keterampilan' => 'Kolom keterangan keterampilan Harus Diisi',
        //     'ekskul_kegiatan' => 'Kolom ekskul kegiatan Harus Diisi',
        //     'ekskul_nilai' => 'Kolom ekskul nilai Harus Diisi',
        //     'ekskul_keterangan' => 'Kolom ekskul keterangan Harus Diisi',
        //     'prestasi' => 'Kolom prestasi Harus Diisi',
        //     'keterangan ' => 'Kolom keterangan  Harus Diisi',
        //     'sakit ' => 'Kolom sakit  Harus Diisi',
        //     'izin ' => 'Kolom izin  Harus Diisi',
        //     'tanpaketerangan ' => 'Kolom tanpaketerangan Harus Diisi',
        //     'catatan_wali ' => 'Kolom catatan_wali Harus Diisi',
        //     'tanggapan_ortu ' => 'Kolom tanggapan ortu Harus Diisi',
        //     'spiritual_sikap ' => 'Kolom spiritual sikap Harus Diisi',
        //     'sosial_sikap ' => 'Kolom sosial sikap Harus Diisi',
        //     'sosial_sikap_keterangan.required' => 'Kolom sosial sikap keterangan Harus Diisi',
        //     'spiritual_sikap_keterangan' => 'Kolom spiritual sikap keterangan  Harus Diisi',
        //     'keterangan_lulus ' => 'Kolom keterangan lulus Harus Diisi',
        // ]);

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
        return redirect('admin/nilai/' . $id_anggota)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_siswa, $id_kelas, $semester)
    {
        // Mengambil data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id_siswa);

        // Update nilai tambahan jika data tersedia di request
        $nilai_tambahan = NilaiTambahan::where('id_siswa', $id_siswa)
            ->where('id_kelas', $id_kelas)
            ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                $query->where('deskripsi', $semester);
            }) // Filter berdasarkan semester
            ->first();
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

        // Update nilai jika data tersedia di request
        if ($request->has('nilai_pengetahuan')) {
            foreach ($request->nilai_pengetahuan as $id => $nilai) {
                $nilaiItem = Nilai::where('id_siswa', $siswa->id)
                    ->where('id_kelas', $id_kelas)
                    ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                        $query->where('deskripsi', $semester);
                    })
                    ->find($id);

                if ($nilaiItem) {
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
            }
        }

        // Update ekskul
        if ($request->has('ekskul_kegiatan')) {
            foreach ($request->ekskul_kegiatan as $id => $ekskul_kegiatan) {
                if ($id == 'new') {
                    Ekstrakurikuler::create([
                        'id_anggota' => $request->id_anggota,
                        'id_kelas' => $id_kelas,
                        'id_siswa' => $siswa->id,
                        'ekskul_kegiatan' => $ekskul_kegiatan,
                        'ekskul_nilai' => $request->ekskul_nilai[$id],
                        'ekskul_keterangan' => $request->ekskul_keterangan[$id],
                    ]);
                } else {
                    $ekskul = Ekstrakurikuler::where('id_siswa', $siswa->id)
                        ->where('id_kelas', $id_kelas)
                        ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                            $query->where('deskripsi', $semester);
                        })
                        ->find($id);

                    if ($ekskul) {
                        $ekskul->update([
                            'ekskul_kegiatan' => $ekskul_kegiatan,
                            'ekskul_nilai' => $request->ekskul_nilai[$id],
                            'ekskul_keterangan' => $request->ekskul_keterangan[$id],
                        ]);
                    }
                }
            }
        }

        // Update prestasi
        if ($request->has('prestasi')) {
            foreach ($request->prestasi as $id => $prestasi) {
                if ($id == 'new') {
                    Prestasi::create([
                        'id_anggota' => $request->id_anggota,
                        'id_kelas' => $id_kelas,
                        'id_siswa' => $siswa->id,
                        'prestasi' => $prestasi,
                        'keterangan' => $request->keterangan_prestasi[$id],
                    ]);
                } else {
                    $prestasiItem = Prestasi::where('id_siswa', $siswa->id)
                        ->where('id_kelas', $id_kelas)
                        ->whereHas('anggota.tahunAjar', function ($query) use ($semester) {
                            $query->where('deskripsi', $semester);
                        })
                        ->find($id);

                    if ($prestasiItem) {
                        $prestasiItem->update([
                            'prestasi' => $prestasi,
                            'keterangan' => $request->keterangan_prestasi[$id],
                        ]);
                    }
                }
            }
        }

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        $id_anggota = request('id_anggota');
        return redirect('admin/nilai/' . $id_anggota)->with('success', 'Data berhasil diperbarui.');
    }

    public function nilai($anggota)
    {
        $anggota = AnggotaGrup::find($anggota);
        $list_mapel = Mapel::all();

        return view('admin.nilai.nilai', compact('anggota', 'list_mapel'));
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

        return view('admin.nilai.detail', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'semester'));
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

        return view('admin.nilai.cetak-nilai', compact('nilai', 'nilai_tambahan', 'siswa', 'ekskul', 'prestasi', 'anggota', 'kelas', 'guru', 'kepsek', 'semester'));
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
