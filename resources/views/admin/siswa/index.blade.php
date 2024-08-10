<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA SISWA</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/siswa/create') }}" class="btn btn-success float-right"><span class="fa fa-plus"></span>
                Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <!-- <th style="color: white;" class="text-center">Guru Kelas</th>
                        <th style="color: white;" class="text-center">Kelas Siswa</th> -->
                    <th style="color: white;" class="text-center">NIS / NISN</th>
                    <th style="color: white;" class="text-center">NAMA SISWA</th>
                    <th style="color: white;" class="text-center">JENIS KELAMIN</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_siswa as $siswa)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center"> {{ $siswa->nis }}</td>
                        <td class="text-center"> {{ $siswa->nama }}</td>
                        <td class="text-center"> {{ $siswa->jk }}</td>
                        <td class="text-center" width="90px">
                            <div class="btn-group">
                                <x-template.button.show-button url="admin/siswa" id="{{ $siswa->id }}" />
                                <x-template.button.edit-button url="admin/siswa" id="{{ $siswa->id }}" />
                                <a href="#hapus{{ $siswa->id }}" data-toggle="modal" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>

                    </tr>

                    <x-template.modal.modal-delete id="hapus{{ $siswa->id }}" action="{{ url('admin/siswa', $siswa->id) }}" />

                    <x-template.modal.modaledit id="edit{{ $siswa->id }}" action="{{ url('admin/siswa', $siswa->id) }}">

                        <div class="modal-content modal-lg">
                            <div class="modal-header">
                                <h4 class="modal-title">UPDATE KELAS</h4>

                            </div>
                            <div class="modal-body">
                                <div class="form-grup mb-3">
                                    <label for="" class="control-label">Nama Kelas</label>
                                    <input type="text" class="form-control" name="nama_kelas" value="{{ $siswa->nama_kelas }}">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">BATAL</button>
                                <button type="submit" class="btn btn-outline-primary">UPDATE</button>
                            </div>
                        </div>
                    </x-template.modal.modaledit>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- {{-- <div class="card-body">
            <x-table.table>
                <thead>
                    <tr>
                        <x-table.th title="No." />
                        <x-table.th title="Guru Kelas" />
                        <x-table.th title="Kelas Siswa" />
                        <x-table.th title="NIS Siswa" />
                        <x-table.th title="Nama Siswa" />
                        <x-table.th title="Jenis Kelamin" />
                        <x-table.th title="Aksi" />
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $siswa)
                        <tr>
                            <x-table.td title="{{ $loop->iteration }}" />
        <x-table.td title="{{ $siswa->nis }}" />
        <x-table.td title="{{ $siswa->nama }}" />
        <x-table.td title="{{ $siswa->jk }}" />
        <x-table.td-action>
            <div class="btn-group">
                <a href="{{ url('admin/siswa/show', $siswa->id) }}" class="btn btn-secondary">
                    <i class="fas fa-eye"></i></a>
                <a href="{{ url('admin/siswa/edit', $siswa->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#hapus{{ $siswa->id }}" data-toggle="modal" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </x-table.td-action>
        </tr>

        <x-modal.modal-delete id="hapus{{ $siswa->id }}" action="{{ url('admin/kelas/delete', $siswa->id) }}" />
        @endforeach
        </tbody>
        </x-table.table>
    </div> --}} -->
    <!-- /.card-body -->
    </div>
    <!-- /.content -->
</x-app>