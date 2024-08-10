<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA KELAS</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-header">
            <a href="#tambah" data-toggle="modal" class="btn btn-success float-right"><span class="fa fa-plus"></span>
                Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <th style="color: white;" class="text-center">NAMA KELAS</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_kelas as $kelas)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $kelas->nama_kelas }}</td>
                            <td class="text-center" width="90px">
                                <div class="btn-group">
                                    <a href="#edit{{ $kelas->id }}" data-toggle="modal" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#hapus{{ $kelas->id }}" data-toggle="modal" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>

                        <x-template.modal.modal-delete id="hapus{{ $kelas->id }}"
                            action="{{ url('admin/kelas', $kelas->id) }}" />

                        <x-template.modal.modaledit id="edit{{ $kelas->id }}"
                            action="{{ url('admin/kelas', $kelas->id) }}">

                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <h4 class="modal-title">UPDATE KELAS</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-grup mb-3">
                                        <label for="" class="control-label">Nama Kelas</label>
                                        <input type="text" class="form-control" name="nama_kelas"
                                            required="nama_kelas" value="{{ $kelas->nama_kelas }}">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-outline-dark"
                                        data-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-outline-primary">UPDATE</button>
                                </div>
                            </div>
                        </x-template.modal.modaledit>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /.content -->
    <x-template.modal.modal id="tambah" action="{{ url('admin/kelas') }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TAMBAH KELAS</h4>

            </div>
            <div class="modal-body">
                <div class="form-grup">
                    <label for="" class="control-label">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas...">
                    @error('nama_kelas')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                    @enderror
                </div>
            </div>


            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-outline-primary">SIMPAN</button>
            </div>
        </div>
    </x-template.modal.modal>
</x-app>
