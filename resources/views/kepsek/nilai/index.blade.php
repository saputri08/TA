<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA NILAI</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <th style="color: white;" class="text-center">KELAS</th>
                    <th style="color: white;" class="text-center">TAHUN AJAR</th>
                    <th style="color: white;" class="text-center">SEMESTER</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($list_anggota as $anggota)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $anggota->Kelas->nama_kelas }}</td>
                        <td class="text-center">
                            {{ $anggota->tahunAjar->tahun_mulai }}/{{ $anggota->tahunAjar->tahun_selesai }}
                        </td>
                        <td class="text-center">{{ $anggota->tahunAjar->deskripsi }}</td>
                        <td class="text-center" width="90px">
                            <div class="btn-group">
                                <a href="{{ url('kepsek/nilai', $anggota->id) }}" class="btn btn-dark" style="font-weight: bold;">Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</x-app>