<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px">KELOLA NILAI MAN 2 KETAPANG
    </h5>
    <hr>
    <button onclick="history.go(-1);" class="btn btn-primary btn-xs"><span class="fa fa-arrow-left"></span>
        Kembali</button>
    <form action="{{ url('guru/nilai', [$siswa->id, $kelas->id, $semester]) }}" method="post">
        @csrf
        @method('PUT')
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
                                style="font-size: 15px; display: block; margin-left: auto; margin-right: auto;">Data
                                Nilai Belum di Input</h6>
                            @else
                            @foreach ($anggota as $member)
                            <input type="hidden" name="id_anggota" value="{{ $nilai_tambahan->id_anggota }}"
                                id="">
                            <input type="hidden" name="id_kelas" value="{{ $kelas->id }}" id="">
                            <!-- SIKAP -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">A. SIKAP</h5>
                            <hr>
                            <h5 class="m-2 font-weight-bold text-dark" style="font-size: 17px">1. SIKAP
                                SPIRITUAL
                            </h5>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center">PREDIKAT</th>
                                        <th class="text-center">KETERANGAN</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <select name="spiritual_sikap" class="form-control" id="">
                                                <option value="{{ $nilai_tambahan->spiritual_sikap }}">
                                                    {{ $nilai_tambahan->spiritual_sikap }}
                                                </option>
                                                <option value="SANGAT BAIK">SANGAT BAIK</option>
                                                <option value="BAIK">BAIK</option>
                                                <option value="CUKUP">CUKUP</option>
                                                <option value="BURUK">BURUK</option>
                                                <option value="SANGAT BURUK">SANGAT BURUK</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="spiritual_sikap_keterangan"
                                                value="{{ $nilai_tambahan->spiritual_sikap_keterangan }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h5 class="m-2 font-weight-bold text-dark" style="font-size: 17px">2. SIKAP SOSIAL
                            </h5>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center">PREDIKAT</th>
                                        <th class="text-center">KETERANGAN</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <select name="sosial_sikap" class="form-control" id="">
                                                <option value="{{ $nilai_tambahan->sosial_sikap }}">
                                                    {{ $nilai_tambahan->sosial_sikap }}
                                                </option>
                                                <option value="SANGAT BAIK">SANGAT BAIK</option>
                                                <option value="BAIK">BAIK</option>
                                                <option value="CUKUP">CUKUP</option>
                                                <option value="BURUK">BURUK</option>
                                                <option value="SANGAT BURUK">SANGAT BURUK</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="sosial_sikap_keterangan"
                                                value="{{ $nilai_tambahan->sosial_sikap_keterangan }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
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
                                        <th class="text-center">PREDIKAT</th>
                                        <th class="text-center">NILAI</th>
                                        <th class="text-center">PREDIKAT</th>
                                    </tr>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($nilai as $item)
                                    @if ($item->mapel->id_guru == Auth::guard('guru')->user()->id)
                                    <tr>
                                        <th class="text-center">{{ $no++ }}</th>
                                        <td>{{ $item->mapel->nama_mapel }}</td>
                                        <td>
                                            <input type="text"
                                                class="form-control text-center nilai-pengetahuan"
                                                name="nilai_pengetahuan[{{ $item->id }}]"
                                                value="{{ $item->nilai_pengetahuan }}">
                                        </td>
                                        <td>
                                            <input type="text"
                                                class="form-control text-center kkm-pengetahuan"
                                                name="kkm_pengetahuan[{{ $item->id }}]" value="78"
                                                readonly>
                                        </td>
                                        <td>
                                            <input type="text"
                                                class="form-control text-center predikat-pengetahuan"
                                                name="predikat_pengetahuan[{{ $item->id }}]"
                                                value="{{ $item->predikat_pengetahuan }}" readonly>
                                        </td>
                                        <td>
                                            <input type="text"
                                                class="form-control text-center nilai-keterampilan"
                                                name="nilai_keterampilan[{{ $item->id }}]"
                                                value="{{ $item->nilai_keterampilan }}">
                                        </td>
                                        <td>
                                            <input type="text"
                                                class="form-control text-center predikat-keterampilan"
                                                name="predikat_keterampilan[{{ $item->id }}]"
                                                value="{{ $item->predikat_keterampilan }}" readonly>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="col-md-6 mt-4 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle; text-align: center;">KKM
                                        </th>
                                        <th colspan="4" style="vertical-align: middle; text-align: center;">
                                            Predikat</th>
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
                                        <td style="vertical-align: middle; text-align: center;">78</td>
                                        <!-- KKM -->
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
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">DESKRIPSI
                                PENGETAHUAN
                                DAN KETERAMPILAN</h5>
                            <hr>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">MATA PELAJARAN</th>
                                        <th class="text-center">PENGETAHUAN (KI 3)</th>
                                        <th class="text-center">KETERAMPILAN (KI 4)</th>
                                    </tr>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($nilai as $item)
                                    @if ($item->mapel->id_guru == Auth::guard('guru')->user()->id)
                                    <tr>
                                        <th class="text-center">{{ $no++ }}</th>
                                        <td>{{ $item->mapel->nama_mapel }}</td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="keterangan_pengetahuan[{{ $item->id }}]"
                                                value="{{ $item->keterangan_pengetahuan }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="keterangan_keterampilan[{{ $item->id }}]"
                                                value="{{ $item->keterangan_keterampilan }}">
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- END DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                            <!-- EKSTRAKURIKULER -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <hr>
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">C.
                                EKSTRAKURIKULER
                            </h5>
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
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($ekskul as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="ekskul_kegiatan[{{ $item->id }}]"
                                                value="{{ $item->ekskul_kegiatan }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control text-center"
                                                name="ekskul_nilai[{{ $item->id }}]"
                                                value="{{ $item->ekskul_nilai }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="ekskul_keterangan[{{ $item->id }}]"
                                                value="{{ $item->ekskul_keterangan }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="button" class="btn btn-primary mt-2" id="addRow"
                                value="Tambah Row">
                            @endif
                            <!-- END EKSTRAKURIKULER -->
                            <!-- PRESTASI -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <hr>
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">D. PRESTASI
                            </h5>
                            <hr>
                            <table class="table table-bordered table-striped" id="prestasiTable">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">JENIS PRESTASI</th>
                                        <th class="text-center">KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($prestasi as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="prestasi[{{ $item->id }}]"
                                                value="{{ $item->prestasi }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                name="keterangan_prestasi[{{ $item->id }}]"
                                                value="{{ $item->keterangan }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <input type="button" class="btn btn-primary mt-2" id="addPrestasiRow"
                                value="Tambah Row">
                            @endif
                            <!-- END PRESTASI -->
                            <!-- KETIDAKHADIRAN -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <hr>
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">E.
                                KETIDAKHADIRAN
                            </h5>
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
                                            <input type="text" class="form-control text-center"
                                                name="sakit" value="{{ $nilai_tambahan->sakit }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="40 px">2</td>
                                        <td>Izin</td>
                                        <td>
                                            <input type="text" class="form-control text-center"
                                                name="izin" value="{{ $nilai_tambahan->izin }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="40 px">3</td>
                                        <td>Tanpa Keterangan</td>
                                        <td>
                                            <input type="text" class="form-control text-center"
                                                name="tanpaketerangan"
                                                value="{{ $nilai_tambahan->tanpaketerangan }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            <!-- END KETIDAKHADIRAN -->
                            <!-- CATATAN WALI KELAS -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <hr>
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">F. CATATAN WALI
                                KELAS
                            </h5>
                            <hr>
                            <div class="col-md-12">
                                <textarea class="form-control" name="catatan_wali" id="" cols="30">{{ $nilai_tambahan->catatan_wali }}</textarea>
                            </div>
                            @endif
                            <!-- END CATATAN WALI KELAS -->
                            <!-- TANGGAPAN ORANG TUA -->
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            <hr>
                            <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">G. TANGGAPAN
                                ORANG
                                TUA/WALI</h5>
                            <hr>
                            <div class="col-md-12">
                                <textarea class="form-control" name="tanggapan_ortu" id="" cols="30">{{ $nilai_tambahan->tanggapan_ortu }}</textarea>
                            </div>
                            @endif
                            <!-- END TANGGAPAN ORANG TUA -->
                            <!-- KETERANGAN LULUS -->
                            <hr>
                            @if (Auth::guard('guru')->user()->id == $member->id_guru)
                            @if ($semester == 'Genap')
                            <div class="col-md-12">
                                <label for="">KETERANGAN LULUS:
                                </label>
                                <select name="keterangan_lulus" class="form-control" id="">
                                    <option value="{{ $nilai_tambahan->keterangan_lulus }}">
                                        {{ $nilai_tambahan->keterangan_lulus }}
                                    </option>
                                    <option value="LULUS">LULUS</option>
                                    <option value="TIDAK LULUS">TIDAK LULUS</option>
                                </select>
                            </div>
                            <!-- END KETERANGAN LULUS -->
                            <hr>
                            @endif
                            @endif
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary float-right"><i
                                        class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                            @endforeach

                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#addRow').click(function() {
                var rowCount = $('#ekskulTable tbody tr').length; // Hitung jumlah baris saat ini
                var newRowNumber = rowCount + 1; // Nomor baris berikutnya
                var newRow = `
            <tr>
                <td width="40px">` + newRowNumber + `</td>
                <td>
                    <input type="text" class="form-control" name="ekskul_kegiatan[new]">
                </td>
                <td>
                    <input type="text" class="form-control text-center" name="ekskul_nilai[new]">
                </td>
                <td>
                    <input type="text" class="form-control" name="ekskul_keterangan[new]">
                </td>
            </tr>`;
                $('#ekskulTable tbody').append(newRow);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#addPrestasiRow').click(function() {
                var rowCount = $('#prestasiTable tbody tr').length; // Hitung jumlah baris saat ini
                var newRowNumber = rowCount + 1; // Nomor baris berikutnya
                var newRow = `
            <tr>
                <td width="40px">` + newRowNumber + `</td>
                <td>
                    <input type="text" class="form-control" name="prestasi[new]">
                </td>
                <td>
                    <input type="text" class="form-control" name="keterangan_prestasi[new]">
                </td>
            </tr>`;
                $('#prestasiTable tbody').append(newRow);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung predikat
            function hitungPredikat(nilai, kkm) {
                if (nilai === '') {
                    return ''; // Jika nilai kosong, kembalikan string kosong
                } else if (nilai < kkm) {
                    return 'D';
                } else if (nilai >= kkm && nilai <= 77) {
                    return 'D';
                } else if (nilai >= 78 && nilai <= 84) {
                    return 'C';
                } else if (nilai >= 85 && nilai <= 92) {
                    return 'B';
                } else if (nilai >= 93 && nilai <= 100) {
                    return 'A';
                } else {
                    return '';
                }
            }

            // Ketika nilai pengetahuan berubah
            $('.nilai-pengetahuan').on('input', function() {
                var nilai = $(this).val();
                var kkm = parseFloat($(this).closest('tr').find('.kkm-pengetahuan').val());
                var predikat = hitungPredikat(nilai, kkm);
                $(this).closest('tr').find('.predikat-pengetahuan').val(predikat);
            });

            // Ketika nilai keterampilan berubah
            $('.nilai-keterampilan').on('input', function() {
                var nilai = $(this).val();
                var kkm = parseFloat($(this).closest('tr').find('.kkm-pengetahuan').val());
                var predikat = hitungPredikat(nilai, kkm);
                $(this).closest('tr').find('.predikat-keterampilan').val(predikat);
            });

            // Memastikan bahwa nilai predikat diisi ketika halaman dimuat
            $('.nilai-pengetahuan').each(function() {
                $(this).trigger('input');
            });

            $('.nilai-keterampilan').each(function() {
                $(this).trigger('input');
            });
        });
    </script>
    @endpush

</x-app>