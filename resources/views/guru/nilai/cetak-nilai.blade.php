<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapor_{{ $kelas->nama_kelas }}_{{ $siswa->nama }}_{{ $siswa->nis }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ url('public') }}/admin-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('public') }}/admin-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ url('resources/css/output.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ url('public') }}/admin-template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 Bootstrap 4 Theme CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap4-theme/1.1.0/select2-bootstrap4.min.css"
        rel="stylesheet" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            margin-right: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 5px;
            /* Adjust the padding value to make the header shorter */
            border: 2px solid black !important;
            /* Ensure borders are visible in PDF */

            border: 2px solid black;
            padding: 5px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div align="center">
        <div style="width: 900px;">
            <div align="center">
                <table style="width: 800px;">
                    <tbody>
                        <tr>
                            <td style="width: 156px;" align="center"><img
                                    src="{{ url('public') }}/admin-template/dist/img/kemenag.png" width="115"
                                    height="117"></td>
                            <td style="width: 642px;" align="center">
                                <p class="m-0"
                                    style="font-size: 13pt;font-weight: bold;font-family: Arial, sans-serif;">
                                    KEMENTERIAN AGAMA REPUBLIK INDONESIA</p>
                                <p class="m-0"
                                    style="font-size: 16pt; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                    MAN 2 KETAPANG</p>
                                <p class="m-0"
                                    style="font-style: italic;font-size: 13pt; font-family: 'Times New Roman', Times, serif;">
                                    JL. RAHADI USMAN NO. 167</p>
                                <p class="m-0"
                                    style="font-style: italic;font-size: 13pt; font-family: 'Times New Roman', Times, serif;">
                                    Kecamatan Matan Hilir Selatan, Kabupaten Ketapang - Kalimantan Barat</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 156px;" align="center">&nbsp;</td>
                            <td style="width: 642px;" align="center">&nbsp;</td>
                        </tr>
                </table>
                <hr style="border: 0; border-top: 5px double #8c8c8c; margin-top: 0;">
                <table class="tb_title" width="100%" style="margin-bottom: 10px;">
                    <tbody>
                        <tr>
                            <td width="13%">NAMA</td>
                            <td width="2%">:</td>
                            <td width="30%"><b>{{ $siswa->nama }}</b></td>
                            <td width="10%"></td>
                            <td width="18%">Madrasah</td>
                            <td width="2%">:</td>
                            <td width="30%"><b>MAN 2 KETAPANG</b></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{ $siswa->nis }}</td>
                            <td></td>
                            <td>Kelas/Semester</td>
                            <td>:</td>
                            <td>{{ $kelas->nama_kelas }} / {{ $semester }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td></td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            @foreach($anggota as $item)
                            <td>{{ $item->tahunAjar->tahun_mulai }}/{{ $item->tahunAjar->tahun_selesai }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <!-- SIKAP -->
                <hr style="border: 0; border-top: 5px double #8c8c8c; margin-top: 0;">
                @empty($nilai && $nilai_tambahan)
                <br>
                <h6 class="text-center badge badge-danger"
                    style="font-size: 15px; display: block; margin-left: auto; margin-right: auto;">Data Nilai Belum di
                    Input</h6>
                @else
                <p style="font-size:20pt;font-weight:bold;">CAPAIAN HASIL BELAJAR</p>

                <h5 class="mb-4 font-weight-bold" style="font-size: 20px; text-align: left;">A. SIKAP</h5>
                <h5 class="m-2 font-weight-bold" style="font-size: 17px ; text-align: left;">1. SIKAP SPIRITUAL</h5>
                <table class="table table-bordered" style="border: 2px solid black; padding: 5px;">
                    <tbody style="border: 2px solid black; padding: 5px;">
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th class="text-center"
                                style="border: 2px solid black; width:200px; font-size:13pt; padding: 5px;">Predikat
                            </th>
                            <th class="text-center" style="border: 2px solid black; font-size:13pt; padding: 5px;">
                                Deskripsi</th>
                        </tr>
                        <tr style="border: 2px solid black; padding: 5px;">
                            <td class="text-center" style="border: 2px solid black; padding: 5px;">
                                {{ $nilai_tambahan->spiritual_sikap }}
                            </td>

                            <td style="border: 2px solid black; padding: 5px;">
                                {{ $nilai_tambahan->spiritual_sikap_keterangan }}
                            </td>
                            @error('spiritual_sikap_keterangan')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
                            @enderror
                        </tr>
                    </tbody>
                </table>
                <h5 class="m-2 font-weight-bold" style="font-size: 17px; text-align: left;">2. SIKAP SOSIAL</h5>
                <table class="table table-bordered" style="border: 2px solid black; padding: 5px;">
                    <tbody style="border: 2px solid black; padding: 5px;">
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th class="text-center"
                                style="border: 2px solid black; width:200px; font-size:13pt;padding: 5px;">Predikat</th>
                            <th class="text-center" style="border: 2px solid black; font-size:13pt; padding: 5px;">
                                Deskripsi</th>
                        </tr>
                        <tr style="border: 2px solid black; padding: 5px;">
                            <td class="text-center" style="border: 2px solid black; padding: 5px;">
                                {{ $nilai_tambahan->sosial_sikap }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px;">
                                {{ $nilai_tambahan->sosial_sikap_keterangan }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END SIKAP -->
                <br>
                <!-- PENGETAHUAN DAN KETERAMPILAN -->
                <h5 class="mb-2 font-weight-bold" style="font-size: 20px; text-align: left;">B. PENGETAHUAN DAN
                    KETERAMPILAN</h5>
                <h5 class="m-2 font-weight-bold" style="font-size: 17px ; text-align: left;">Kriteria Ketuntasan Minimal
                    = 78 (x)</h5>
                <table class="table table-bordered" style="border: 2px solid black; padding: 5px;">
                    <tbody style="border: 2px solid black; padding: 5px;">
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th style="border: 2px solid black; padding: 5px;" colspan="2" class="text-center">
                                Aspek Penilaian</th>
                            <th style="border: 2px solid black; padding: 5px;" colspan="2" class="text-center">
                                Pengetahuan (KI 3)</th>
                            <th style="border: 2px solid black; padding: 5px;" colspan="2" class="text-center">
                                Keterampilan (KI 4)</th>
                        </tr>
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th style="border: 2px solid black; padding: 5px; width: 50px;" class="text-center">No.
                            </th>
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">Mata Pelajaran</th>
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">Nilai</th>
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">Predikat</th>
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">Nilai</th>
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">Predikat</th>
                        </tr>
                        <tr>
                            <th colspan="7">Kelompok A</th>
                        </tr>
                        @php
                        $no = 1;
                        $total_pengetahuan_all = 0;
                        $total_keterampilan_all = 0;
                        @endphp
                        @foreach ($nilai as $item)
                        @if ($item->mapel->kelompok == 'A')
                        @php
                        $total_pengetahuan_all += $item->nilai_pengetahuan;
                        $total_keterampilan_all += $item->nilai_keterampilan;
                        @endphp
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">
                                {{ $no++ }}.
                            </th>
                            <td style="border: 2px solid black; padding: 5px;">{{ $item->mapel->nama_mapel }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_keterampilan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_keterampilan }}
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
                        @php
                        $total_pengetahuan_all += $item->nilai_pengetahuan;
                        $total_keterampilan_all += $item->nilai_keterampilan;
                        @endphp
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">
                                {{ $no++ }}.
                            </th>
                            <td style="border: 2px solid black; padding: 5px;">{{ $item->mapel->nama_mapel }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_keterampilan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_keterampilan }}
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
                        @php
                        $total_pengetahuan_all += $item->nilai_pengetahuan;
                        $total_keterampilan_all += $item->nilai_keterampilan;
                        @endphp
                        <tr style="border: 2px solid black; padding: 5px;">
                            <th style="border: 2px solid black; padding: 5px;" class="text-center">
                                {{ $no++ }}.
                            </th>
                            <td style="border: 2px solid black; padding: 5px;">{{ $item->mapel->nama_mapel }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_pengetahuan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->nilai_keterampilan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->predikat_keterampilan }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <th colspan="2">Jumlah</th>
                            <th style="border: 2px solid black; padding: 5px; text-align: center;">
                                {{ $total_pengetahuan_all }}
                            </th>
                            <th></th>
                            <th style="border: 2px solid black; padding: 5px; text-align: center;">
                                {{ $total_keterampilan_all }}
                            </th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-6">
                        <table class=" mt-2 table table-bordered">
                            <thead>
                                <tr>
                                    <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                        rowspan="2">KKM</th>
                                    <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                        colspan="4">Predikat</th>
                                </tr>
                                <tr>
                                    <th
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        D</th>
                                    <th
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        C</th>
                                    <th
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        B</th>
                                    <th
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        A</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        78</td> <!-- KKM -->
                                    <td
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        0 - 77</td> <!-- Predikat D -->
                                    <td
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        78 - 84</td> <!-- Predikat C -->
                                    <td
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        85 - 92</td> <!-- Predikat B -->
                                    <td
                                        style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                        93 - 100</td> <!-- Predikat A -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END PENGETAHUAN DAN KETERAMPILAN -->
                <br>
                <!-- DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                <h5 class="mb-2 font-weight-bold" style="font-size: 20px; text-align: left;">DESKRIPSI PENGETAHUAN DAN
                    KETERAMPILAN</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center; width: 50px;"
                                class="text-center">No.</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Mata Pelajaran</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Pengetahuan (Kl 3)</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Keterampilan (Kl 4)</th>
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
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">{{ $no++ }}.</th>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->mapel->nama_mapel }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_pengetahuan }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_keterampilan }}
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
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">{{ $no++ }}.</th>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->mapel->nama_mapel }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_pengetahuan }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_keterampilan }}
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
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">{{ $no++ }}.</th>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->mapel->nama_mapel }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_pengetahuan }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->keterangan_keterampilan }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- END DESKRIPSI PENGETAHUAN DAN KETERAMPILAN -->
                <br>
                <!-- EKSTRAKURIKULER -->
                <h5 class="mb-2 font-weight-bold" style="font-size: 20px; text-align: left;">C. EKSTRAKURIKULER</h5>
                <table class="table table-bordered" id="ekskulTable">
                    <thead>
                        <tr>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center; width: 50px;"
                                class="text-center">No.</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center; width: 250px;"
                                class="text-center">Kegiatan Ekstrakurikuler</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Nilai</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ekskul as $index => $item)
                        <tr>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center font-weight-bold">{{ $index + 1 }}.</td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->ekskul_kegiatan }}
                            </td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">{{ $item->ekskul_nilai }}</td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->ekskul_keterangan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- END EKSTRAKURIKULER -->
                <br>
                <!-- PRESTASI -->
                <h5 class="mb-2 font-weight-bold text-dark" style="font-size: 20px; text-align: left;">D. PRESTASI
                </h5>
                <table class="table table-bordered" id="prestasiTable">
                    <tbody>
                        <tr>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center; width: 50px;"
                                class="text-center">No.</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center; width: 250px;"
                                class="text-center">Jenis Prestasi</th>
                            <th style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center">Keterangan</th>
                        </tr>
                        @foreach ($prestasi as $index => $item)
                        <tr>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;"
                                class="text-center font-weight-bold">{{ $index + 1 }}.</td>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle;">
                                {{ $item->prestasi }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $item->keterangan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- END PRESTASI -->
                <br>
                <!-- KETIDAKHADIRAN -->
                <h5 class="mb-2 font-weight-bold " style="font-size: 20px; text-align: left;">E. KETIDAKHADIRAN</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; width: 300px;">
                                Sakit</td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $nilai_tambahan->sakit }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                Hari
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; width: 300px;">
                                Izin</td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $nilai_tambahan->izin }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                Hari
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid black; padding: 5px; vertical-align: middle; width: 300px;">
                                Tanpa Keterangan</td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                {{ $nilai_tambahan->tanpaketerangan }}
                            </td>
                            <td
                                style="border: 2px solid black; padding: 5px; vertical-align: middle; text-align: center;">
                                Hari
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END KETIDAKHADIRAN -->
                <br>
                <!-- CATATAN WALI KELAS -->
                <h5 class="mb-2 font-weight-bold" style="font-size: 20px; text-align: left;">F. CATATAN WALI KELAS
                </h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="border: 2px solid black; vertical-align: middle;">
                                {{ $nilai_tambahan->catatan_wali }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END CATATAN WALI KELAS -->
                <br>
                <!-- TANGGAPAN ORANG TUA -->
                <h5 class="mb-2 font-weight-bold" style="font-size: 20px; text-align: left;">G. TANGGAPAN ORANG TUA /
                    WALI</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="border: 2px solid black; vertical-align: middle;">
                                {{ $nilai_tambahan->tanggapan_ortu }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END TANGGAPAN ORANG TUA -->
                <br>
                <!-- KETERANGAN LULUS -->
                @if ($semester == 'Genap')
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="border: 2px solid black; vertical-align: middle;">KETERANGAN LULUS:
                                <strong>{{ $nilai_tambahan->keterangan_lulus }}</strong></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
                <!-- END KETERANGAN LULUS -->
                <br>
                <table width="100%" class="footer-table">
                    <tbody>
                        <tr>
                            <td align="center" width="40%">
                                Orang Tua/ Wali
                                <br>
                                <br>
                                <br>
                                <div style="width:3cm; height:1.5cm;">

                                </div>
                                _____________________
                                <br>
                            </td>
                            <td align="left" width="20%">
                            </td>
                            <td align="center" width="40%">
                                Ketapang, {{ $nilai_tambahan->formatted_created_at }}
                                <br>
                                Wali Kelas
                                <br>
                                <div style="width:3cm; height:1.5cm;">

                                </div>
                                <br>
                                @foreach ($anggota as $member)
                                <b>{{ $member->guru->nama_guru }}</b>
                                <br>
                                NIP. {{ $member->guru->nip }}
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table width="100%" class="footer-table">
                    <tbody>
                        <tr>
                            <td align="center" width="30%">

                            </td>
                            <td align="center" width="40%">
                                Mengetahui
                                <br>
                                Kepala Madrasah
                                <br>
                                <img src="{{ url('public') }}/{{ $nilai_tambahan->qr_kepsek }}" alt="QR Code"
                                    style="width:50%; height:50%;" />
                                <br>
                                <b>{{ $kepsek->nama_kepsek }}</b>
                                <br>
                                NIP. {{ $kepsek->nip }}
                            </td>
                            <td align="center" width="40%">

                            </td>
                        </tr>
                    </tbody>
                </table>
                @endempty
            </div>
        </div>
    </div>
</body>

</html>
<script>
    window.print();
</script>
<!-- jQuery -->
<script src="{{ url('public') }}/admin-template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public') }}/admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('public') }}/admin-template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('public') }}/admin-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('public') }}/admin-template/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="{{ url('public') }}/admin-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<!-- Select2 -->
<script src="{{ url('public') }}/admin-template/plugins/select2/js/select2.full.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



<!-- AdminLTE App -->
<script src="{{ url('public') }}/admin-template/dist/js/adminlte.min.js"></script>