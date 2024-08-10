<x-base>
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px">Data Nilai
            </h5>
        </div>
        <div class="content-header">
            <div class="container-fluid">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ url('siswa/dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Data Nilai</li>
                </ol>
            </div>
        </div>
        <!-- Main content -->
        <div class="card mt-4">
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <th style="color: black;" width="10px" class="text-center">NO.</th>
                        <th style="color: black;" class="text-center">KELAS</th>
                        <th style="color: black;" class="text-center">TAHUN AJAR</th>
                        <th style="color: black;" class="text-center">SEMESTER</th>
                        <th width="100px" style="color: black;" class="text-center">AKSI</th>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($list_nilai as $nilai)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $nilai->anggota->Kelas->nama_kelas }}</td>
                            <td class="text-center">
                                {{ $nilai->anggota->tahunAjar->tahun_mulai }}/{{ $nilai->anggota->tahunAjar->tahun_selesai }}
                            </td>
                            <td class="text-center">{{ $nilai->anggota->tahunAjar->deskripsi }}</td>
                            <td class="text-center" width="90px">
                                <div class="btn-group">
                                    <a href="{{ url('siswa/nilai/' . $nilai->siswa->id . '/' . $nilai->anggota->id_kelas . '/' . $nilai->anggota->tahunAjar->deskripsi) }}" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak Data</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</x-base>