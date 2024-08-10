<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DETAIL NILAI MAN 2 KETAPANG
    </h5>
    <hr>
    <button onclick="history.go(-1);" class="btn btn-primary btn-xs"><span class="fa fa-arrow-left"></span>
        Kembali</button>
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold;">NAMA PESERTA DIDIK</td>
                                    <td>{{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">NIS/NISN</td>
                                    <td>{{ $siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">KELAS</td>
                                    <td>{{ $kelas->nama_kelas }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">SEMESTER</td>
                                    <td>{{ $semester }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <h4 class="text-center" style="font-weight: bold;">CAPAIAN HASIL BELAJAR</h4>
                        <br>
                        @empty($nilai && $nilai_tambahan)
                        <h6 class="text-center badge badge-danger"
                            style="font-size: 15px; display: block; margin-left: auto; margin-right: auto;">Data Nilai
                            Belum di Input</h6>
                        @else
                        <!-- SIKAP -->
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">A. SIKAP</h5>
                        <hr>
                        <h5 class="m-2 font-weight-bold text-dark" style="font-size: 17px">1. SIKAP SPIRITUAL</h5>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th class="text-center">PREDIKAT
                                    </th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        {{ $nilai_tambahan->spiritual_sikap }}
                                    </td>
                                    <td>
                                        {{ $nilai_tambahan->spiritual_sikap_keterangan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <h5 class="m-2 font-weight-bold text-dark" style="font-size: 17px">2. SIKAP SOSIAL</h5>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th class="text-center">PREDIKAT
                                    </th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        {{ $nilai_tambahan->sosial_sikap }}
                                    </td>
                                    <td>
                                        {{ $nilai_tambahan->sosial_sikap_keterangan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- END SIKAP -->
                        <!-- PENGETAHUAN DAN KETERAMPILAN -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">B. PENGETAHUAN DAN
                            KETERAMPILAN</h5>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">ASPEK PENILAIAN</th>
                                    <th colspan="3" class="text-center">PENGETAHUAN (KI 3)</th>
                                    <th colspan="2" class="text-center">KETERAMPILAN (KI 4)</th>
                                </tr>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">MATA PELAJARAN</th>
                                    <th class="text-center">NILAI</th>
                                    <th class="text-center">KKM</th>
                                    <th class="text-center">PREDIK</th>
                                    <th class="text-center">NILAI</th>
                                    <th class="text-center">PREDIK</th>
                                </tr>
                                <tr>
                                    <th colspan="7">Kelompok A</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'A')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->kkm_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_keterampilan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <th colspan="7">Kelompok B</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'B')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->kkm_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_keterampilan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <th colspan="7">Kelompok C</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'C')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->kkm_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->nilai_keterampilan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->predikat_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <table class="col-md-6 mt-4 table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle; text-align: center;">KKM</th>
                                    <th colspan="4" style="vertical-align: middle; text-align: center;">Predikat</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;">D</th>
                                    <th style="vertical-align: middle; text-align: center;">C</th>
                                    <th style="vertical-align: middle; text-align: center;">B</th>
                                    <th style="vertical-align: middle; text-align: center;">A</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">78</td> <!-- KKM -->
                                    <td style="vertical-align: middle; text-align: center;">0 - 77</td>
                                    <!-- Predikat D -->
                                    <td style="vertical-align: middle; text-align: center;">78 - 84</td>
                                    <!-- Predikat C -->
                                    <td style="vertical-align: middle; text-align: center;">85 - 92</td>
                                    <!-- Predikat B -->
                                    <td style="vertical-align: middle; text-align: center;">93 - 100</td>
                                    <!-- Predikat A -->
                                </tr>
                            </tbody>
                        </table>
                        <!-- END PENGETAHUAN DAN KETERAMPILAN -->
                        <!-- DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">DESKRIPSI PENGETAHUAN DAN
                            KETERAMPILAN</h5>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">MATA PELAJARAN</th>
                                    <th class="text-center">PENGETAHUAN (KI 3)</th>
                                    <th class="text-center">KETERAMPILAN (KI 4)</th>
                                </tr>
                                <tr>
                                    <th colspan="4">Kelompok A</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'A')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <th colspan="4">Kelompok B</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'B')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                <tr>
                                    <th colspan="4">Kelompok C</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($nilai as $item)
                                @if ($item->mapel->kelompok == 'C')
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $item->mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_pengetahuan }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan_keterampilan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                        <!-- EKSTRAKURIKULER -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">C. EKSTRAKURIKULER</h5>
                        <hr>
                        <table class="table table-bordered table-striped" id="ekskulTable">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">KEGIATAN EKSTRAKURIKULER</th>
                                    <th class="text-center">NILAI</th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ekskul as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->ekskul_kegiatan }}</td>
                                    <td class="text-center">{{ $item->ekskul_nilai }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $item->ekskul_keterangan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END EKSTRAKURIKULER -->
                        <!-- PRESTASI -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">D. PRESTASI</h5>
                        <hr>
                        <table class="table table-bordered table-striped" id="prestasiTable">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">JENIS PRESTASI</th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                                @foreach ($prestasi as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->prestasi }}</td>
                                    <td>
                                        <div class="form-group">
                                            <p>{{ $item->keterangan }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- END PRESTASI -->
                        <!-- KETIDAKHADIRAN -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">E. KETIDAKHADIRAN</h5>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">KETIDAKHADIRAN</th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                                <tr>
                                    <td class="text-center" width="40 px">1</td>
                                    <td>Sakit</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $nilai_tambahan->sakit }}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Izin</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $nilai_tambahan->izin }}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tanpa Keterangan</td>
                                    <td>
                                        <div class="form-group">
                                            <p class="text-center">{{ $nilai_tambahan->tanpaketerangan }}</p>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <!-- END KETIDAKHADIRAN -->
                        <!-- CATATAN WALI KELAS -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">F. CATATAN WALI KELAS</h5>
                        <hr>
                        <div class="col-md-12">
                            <textarea class="form-control" name="catatan_wali" id="" cols="30" disabled>{{ $nilai_tambahan->catatan_wali }}</textarea>
                        </div>
                        <!-- END CATATAN WALI KELAS -->
                        <!-- TANGGAPAN ORANG TUA -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">G. TANGGAPAN ORANG TUA/WALI
                        </h5>
                        <hr>
                        <div class="col-md-12">
                            <textarea class="form-control" name="tanggapan_ortu" id="" cols="30" disabled>{{ $nilai_tambahan->tanggapan_ortu }}</textarea>
                        </div>
                        <!-- END TANGGAPAN ORANG TUA -->
                        <!-- KETERANGAN LULUS -->
                        @if ($semester == 'Genap')
                        <hr>
                        <div class="col-md-12">
                            <label for="">KETERANGAN LULUS:
                                <span>{{ $nilai_tambahan->keterangan_lulus }}</span></label>
                        </div>
                        @endif
                        <!-- END KETERANGAN LULUS -->
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>