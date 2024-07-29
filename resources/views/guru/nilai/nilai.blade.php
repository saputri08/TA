<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> TAMBAH NILAI MAN 2 KETAPANG</h5>
    <hr>
    <button onclick="history.go(-1);" class="btn btn-primary btn-xs"><span class="fa fa-arrow-left"></span> Kembali</button>
    <div class="card">
        <div class="col-md-12">
            <div class="content">
                <div class="card-body">
                    <form action="{{ url('guru/nilai') }}" method="post">
                        @csrf
                        <table class="table table-bordered table-striped table-sm">
                            <tbody>
                                <input type="text" name="id_anggota" value="{{ $anggota->anggota->id }}" hidden>
                                <tr>
                                    <td>NAMA PESERTA DIDIK</td>
                                    <td>{{ $anggota->siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td>NIS/NISN</td>
                                    <td>{{ $anggota->siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <td>KELAS</td>
                                    <td>{{ $anggota->anggota->kelas->nama_kelas }}</td>
                                </tr>
                                <tr>
                                    <td>SEMESTER</td>
                                    <td>{{ $anggota->anggota->kelas->TahunAjar->deskripsi }}</td>
                                </tr>
                                <input type="text" name="id_kelas" value="{{ $anggota->anggota->kelas->id }}" class="form-control" hidden>
                                <input type="text" name="semester" value="{{ $anggota->anggota->kelas->TahunAjar->deskripsi }}" hidden>
                                <input type="text" name="id_siswa" value="{{ $anggota->siswa->id }}" hidden>
                                <input type="text" name="nama_siswa" value="{{ $anggota->siswa->nama }}" hidden>
                                <input type="text" name="nisn" value="{{ $anggota->siswa->nisn }}" hidden>
                                <input type="text" name="tahun_mulai" value="{{ $anggota->anggota->kelas->TahunAjar->tahun_mulai }}" hidden>
                                <input type="text" name="tahun_selesai" value="{{ $anggota->anggota->kelas->TahunAjar->tahun_selesai }}" hidden>
                            </tbody>
                        </table>
                        <!-- SIKAP -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">A. SIKAP</h5>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">PREDIKAT
                                    </th>
                                    <th class="text-center">KETERANGAN</th>
                                </tr>
                                <tr>
                                    <td width="200px">1. SIKAP SPIRITUAL</td>
                                    <td>
                                        <select name="spiritual_sikap" class="form-control" id=""required>
                                            <option value="">Pilih Data</option>
                                            <option value="SANGAT BAIK">SANGAT BAIK</option>
                                            <option value="BAIK">BAIK</option>
                                            <option value="CUKUP">CUKUP</option>
                                            <option value="BURUK">BURUK</option>
                                            <option value="SANGAT BURUK">SANGAT BURUK</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" cols="20" required name="spiritual_sikap_keterangan" id=""></textarea>
                                            <!-- <input type="text" class="form-control" name="spiritual_sikap_keterangan"> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2. SIKAP SOSIAL</td>
                                    <td>
                                        <select name="sosial_sikap" class="form-control" id=""required>
                                            <option value="">Pilih Data</option>
                                            <option value="SANGAT BAIK">SANGAT BAIK</option>
                                            <option value="BAIK">BAIK</option>
                                            <option value="CUKUP">CUKUP</option>
                                            <option value="BURUK">BURUK</option>
                                            <option value="SANGAT BURUK">SANGAT BURUK</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" cols="20" required name="sosial_sikap_keterangan" id=""></textarea>
                                            <!-- <input type="text" class="form-control" name="sosial_sikap_keterangan"> -->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- END SIKAP -->
                        <!-- PENGETAHUAN DAN KETERAMPILAN -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">B. PENGETAHUAN DAN KETERAMPILAN</h5>
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
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($list_mapel as $mapel)
                                @if ($mapel->id_kelas == $anggota->anggota->kelas->id)
                                <tr>
                                    <input type="text" name="mapel[{{ $mapel->id }}]" value="{{ $mapel->id }}" hidden>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control nilai-pengetahuan" name="nilai_pengetahuan[{{ $mapel->id }}]"required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control kkm-pengetahuan" value="78" name="kkm_pengetahuan[{{ $mapel->id }}]" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control predikat-pengetahuan" name="predikat_pengetahuan[{{ $mapel->id }}]" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control nilai-keterampilan" name="nilai_keterampilan[{{ $mapel->id }}]"required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control predikat-keterampilan" name="predikat_keterampilan[{{ $mapel->id }}]" readonly>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <table class="col-md-6 table table-bordered table-striped">
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
                                    <td style="vertical-align: middle; text-align: center;">0 - 77</td> <!-- Predikat D -->
                                    <td style="vertical-align: middle; text-align: center;">78 - 84</td> <!-- Predikat C -->
                                    <td style="vertical-align: middle; text-align: center;">85 - 92</td> <!-- Predikat B -->
                                    <td style="vertical-align: middle; text-align: center;">93 - 100</td> <!-- Predikat A -->
                                </tr>
                            </tbody>
                        </table>
                        <!-- END PENGETAHAUN DAN KETERAMPILAN -->
                        <!-- DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                        <hr>
                        <h5 class=" m-0 font-weight-bold text-dark" style="font-size: 20px">DESKRIPSI PENGETAHUAN DAN KETERAMPILAN</h5>
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
                                @foreach ($list_mapel as $mapel)
                                @if ($mapel->id_kelas == $anggota->anggota->kelas->id)
                                <tr>
                                    <input type="text" name="mapel[{{ $mapel->id }}]" value="{{ $mapel->id }}" hidden>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $mapel->nama_mapel }}</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" cols="20" required name="keterangan_pengetahuan[{{ $mapel->id }}]" id=""></textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" cols="20" required name="keterangan_keterampilan[{{ $mapel->id }}]" id=""></textarea>
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
                                <tr>
                                    <td width="40px">1</td>
                                    <td><input type="text" class="form-control" name="ekskul_kegiatan[]" required></td>
                                    <td><input type="text" class="form-control" name="ekskul_nilai[]" required></td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control" cols="20" name="ekskul_keterangan[]" required></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="button" class="btn btn-primary" id="addRow" value="Tambah Row">
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
                                <tr>
                                    <td width="40px">1</td>
                                    <td><input type="text" class="form-control" name="prestasi[]"></td>
                                    <td>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="keterangan[]"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="button" class="btn btn-primary" id="addPrestasiRow" value="Tambah Row">

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
                                    <td width="40 px">1</td>
                                    <td>Sakit</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="sakit" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Izin</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="izin" required
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Tanpa Keterangan</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="tanpaketerangan" required>
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
                            <textarea class="form-control" name="catatan_wali" required id="" cols="30"></textarea>
                        </div>
                        <!-- END CATATAN WALI KELAS -->
                        <!-- TANGGAPAN ORANG TUA -->
                        <hr>
                        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 20px">G. TANGGAPAN ORANG TUA/WALI</h5>
                        <hr>
                        <div class="col-md-12">
                            <textarea class="form-control" name="tanggapan_ortu" id="" cols="30"></textarea>
                        </div>
                        <!-- END TANGGAPAN ORANG TUA -->
                        <!-- KETERANGAN LULUS -->
                        <hr>
                        @if($anggota->anggota->kelas->TahunAjar->deskripsi == 'Genap')
                        <div class="col-md-12">
                            <label for="">KETERANGAN LULUS</label>
                            <select name="keterangan_lulus" class="form-control" id="" required>
                                <option value="">Pilih Data</option>
                                <option value="LULUS">LULUS</option>
                                <option value="TIDAK LULUS">TIDAK LULUS</option>
                            </select>
                        </div>
                        <!-- END KETERANGAN LULUS -->
                        <hr>
                        @endif
                        <button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
            var rowNumber = 1; // Mulai nomor baris dari 1

            $('#addRow').click(function() {
                rowNumber++;
                var newRow = `
            <tr>
                <td width="40px">` + rowNumber + `</td>
                <td><input type="text" class="form-control" name="ekskul_kegiatan[]"></td>
                <td><input type="text" class="form-control" name="ekskul_nilai[]"></td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" cols="20" name="ekskul_keterangan[]"></textarea>
                    </div>
                </td>
            </tr>`;
                $('#ekskulTable tbody').append(newRow);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var rowNumber = 1; // Mulai nomor baris dari 1

            $('#addPrestasiRow').click(function() {
                rowNumber++;
                var newRow = `
            <tr>
                <td width="40px">` + rowNumber + `</td>
                <td><input type="text" class="form-control" name="prestasi[]"></td>
                <td>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="keterangan[]"></textarea>
                    </div>
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