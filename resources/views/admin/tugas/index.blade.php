<x-admin-layout.app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DATA TUGAS</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header flex items-center justify-end gap-1">
                            <a href="{{ url('admin/tugas/create_esai') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Tugas Esai</a>
                            <a href="{{ url('admin/tugas/create_pilihan') }}" class="btn btn-info"><i class="fa fa-plus"></i> Buat Tugas Pilihan</a>
                            <a href="#addTugasesai" class="btn btn-success" data-toggle="modal">
                                <i class="fa fa-file-excel"></i> Import Excell
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-table.table>
                                <thead>
                                    <tr>
                                        <x-table.th title="No." />
                                        <x-table.th title="kode tugas" />
                                        <x-table.th title="siswa" />
                                        <x-table.th title="guru" />
                                        <x-table.th title="kelas" />
                                        <x-table.th title="mapel" />
                                        <x-table.th title="tgl_mulai" />
                                        <x-table.th title="tgl_akhir" />
                                        <x-table.th title="Aksi" />
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($list as $siswa)
                                        <tr>
                                            <x-table.td title="{{ $loop->iteration }}" />
                                                
                                                @if ($siswa->kelas->guru != null)
                                                    <x-table.td title="  {{ $siswa->kelas->guru->nama_guru }}" />
                                                    @else
                                                    <x-table.td title="-" />
                                                @endif
                                                <x-table.td title="{{ $siswa->kelas->nama_kelas }}" />
                                            <x-table.td title="{{ $siswa->nis }}" />
                                            <x-table.td title="{{ $siswa->nama }}" />
                                            <x-table.td title="{{ $siswa->jk }}" />
                                            <x-table.td title="{{ $siswa->jk }}" />
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

                                    @endforeach --}}
                                </tbody>
                            </x-table.table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <x-modal.modal id="addTugasesai" action="{{ url('admin/tugas/storeTugasesai') }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPLOAD SOAL ESAI EXCELL</h4>

            </div>
            <div class="modal-body">
                
                <x-input.input label="File Soal Excell" type="file" name="file_soal"
                    placeholder="Masukan file ..." />
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-outline-primary">SIMPAN</button>
            </div>
        </div>
    </x-modal.modal>

</x-admin-layout.app>
