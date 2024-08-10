<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA KEPALA SEKOLAH</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/kepsek/create') }}" class="btn btn-success float-right"><span class="fa fa-plus"></span>
                Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <th style="color: white;" class="text-center">NIP</th>
                    <th style="color: white;" class="text-center">NAMA</th>
                    <th style="color: white;" class="text-center">TEMPAT TANGGAL LAHIR</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_kepsek as $kepsek)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $kepsek->nip }}</td>
                        <td class="text-center">{{ $kepsek->nama_kepsek }}</td>
                        <td class="text-center">{{ $kepsek->tmp_lahir .  ',' . $kepsek->tanggal_lahir_string }}</td>
                        <td class="text-center" width="90px">
                            <div class="btn-group">
                                <x-template.button.show-button url="admin/kepsek" id="{{ $kepsek->id }}" />
                                <x-template.button.edit-button url="admin/kepsek" id="{{ $kepsek->id }}" />
                                <a href="#hapus{{ $kepsek->id }}" data-toggle="modal" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <x-template.modal.modal-delete id="hapus{{ $kepsek->id }}" action="{{ url('admin/kepsek', $kepsek->id) }}" />
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</x-app>