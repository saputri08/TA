<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA MAPEL</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-header">
            <a href="#addDataModal" data-toggle="modal" class="btn btn-success float-right"><span class="fa fa-plus"></span>
                Tambah Data</a>
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDataModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('admin/mapel') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama Mapel</label>
                                    <input type="text" class="form-control" id="name" name="nama_mapel" 
                                        placeholder="Masukan Nama Mapel">
                                        @error('nama_mapel')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Kelas</label>
                                    <select name="id_kelas" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($list_kelas as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kelas')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Kelompok</label>
                                    <select name="kelompok" class="form-control">
                                        <option value="">Pilih Kelompok</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                    @error('kelompok')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Guru</label>
                                    <select name="id_guru" class="form-control">
                                        <option value="">Pilih Guru</option>
                                        @foreach ($list_guru as $guru)
                                            <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_guru')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <!-- <th style="color: white;" class="text-center">Guru Kelas</th>
                        <th style="color: white;" class="text-center">Kelas Siswa</th> -->
                    <th style="color: white;" class="text-center">NAMA MAPEL</th>
                    <th style="color: white;" class="text-center">NAMA GURU</th>
                    <th style="color: white;" class="text-center">NAMA KELAS</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_mapel as $mapel)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center"> {{ $mapel->nama_mapel }}</td>
                            <td class="text-center"> {{ $mapel->guru->nama_guru }}</td>
                            <td class="text-center"> {{ $mapel->kelas->nama_kelas }}</td>

                            <td class="text-center" width="90px">
                                <div class="btn-group">
                                    <a href="#edit{{ $mapel->id }}" data-toggle="modal"
                                        class="btn btn-warning float-right"><span class="fa fa-edit"></span></a>
                                    <a href="#hapus{{ $mapel->id }}" data-toggle="modal" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>

                        <x-template.modal.modal-delete id="hapus{{ $mapel->id }}"
                            action="{{ url('admin/mapel', $mapel->id) }}" />

                        <div class="modal fade" id="edit{{ $mapel->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="addDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDataModalLabel">Edit Data Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('admin/mapel', $mapel->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nama Mapel</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{ $mapel->nama_mapel }}" name="nama_mapel" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Kelas</label>
                                                <select name="id_kelas" class="form-control">
                                                    @foreach ($list_kelas as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Kelompok</label>
                                                <select name="kelompok" class="form-control">
                                                    <option value="{{ $mapel->kelompok }}">{{ $mapel->kelompok }}</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Guru</label>
                                                <select name="id_guru" class="form-control">
                                                    @foreach ($list_guru as $guru)
                                                        <option value="{{ $guru->id }}">{{ $guru->nama_guru }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="card-body">
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
    </div> --}}
        <!-- /.card-body -->
    </div>
    <!-- /.content -->
</x-app>
