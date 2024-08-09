<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA NILAI
        {{ $kelas->kelas->nama_kelas }}
    </h5>
    <hr>
    <x-template.button.back-button url="admin/nilai" />
    <div class="card">
        <div class="mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <th style="color: white;" class="text-center">NO.</th>
                            <th style="color: white;" class="text-center">AKSI</th>
                            <th style="color: white;" class="text-center">NIS/NISN</th>
                            <th style="color: white;" class="text-center">NAMA SISWA</th>
                        </thead>
                        <tbody>
                            @foreach ($list_anggota as $anggota)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ url('admin/nilai/' . $anggota->siswa->id . '/' . $anggota->anggota->id_kelas . '/' . $anggota->anggota->tahunAjar->deskripsi . '/edit') }}"
                                            class="btn btn-primary"><span class="fa fa-plus"></span> Tambah
                                            Nilai</a>
                                        <!-- {{-- <a href="{{ url("admin/nilai/$anggota->id") }}/nilai" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Nilai</a> --}} -->
                                        <a href="{{ url('admin/nilai/' . $anggota->siswa->id . '/' . $anggota->anggota->id_kelas . '/' . $anggota->anggota->tahunAjar->deskripsi) }}/detail"
                                            class="btn btn-dark"><span class="fa fa-info"></span> Detail Nilai</a>
                                        <a href="{{ url('admin/nilai/' . $anggota->siswa->id . '/' . $anggota->anggota->id_kelas . '/' . $anggota->anggota->tahunAjar->deskripsi . '/edit') }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{ url('admin/nilai/' . $anggota->siswa->id . '/' . $anggota->anggota->id_kelas . '/' . $anggota->anggota->tahunAjar->deskripsi) }}"
                                            class="btn btn-success" target="_blank"><i class="fa fa-print"></i>
                                            Cetak Data</a>
                                    </div>
                                </td>
                                <td class="text-center">{{ $anggota->siswa->nis }}</td>
                                <td class="text-center">{{ $anggota->siswa->nama }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>