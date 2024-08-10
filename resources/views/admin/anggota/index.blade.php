<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA PESERTA KELAS</h5>
    <hr>
    <!-- Main content -->
    <div class="card mt-4">
        <div class="card-header">
            <a href="#tambah" data-toggle="modal" class="btn btn-success float-right"><span class="fa fa-plus"></span>
                Tambah Data</a>
        </div>
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
                    @foreach ($list_anggota as $anggota)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $anggota->Kelas->nama_kelas }}</td>
                            <td class="text-center">
                                {{ $anggota->tahunAjar->tahun_mulai }}/{{ $anggota->tahunAjar->tahun_selesai }}
                            </td>
                            <td class="text-center">{{ $anggota->tahunAjar->deskripsi }}</td>
                            <td class="text-center" width="90px">
                                <div class="btn-group">
                                    <x-template.button.show-button url="admin/anggota" id="{{ $anggota->id }}" />
                                    <a href="#edit{{ $anggota->id }}" data-toggle="modal" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#hapus{{ $anggota->id }}" data-toggle="modal" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <x-template.modal.modal-delete id="hapus{{ $anggota->id }}"
                            action="{{ url('admin/anggota', $anggota->id) }}" />

                        <x-template.modal.modaledit id="edit{{ $anggota->id }}"
                            action="{{ url('admin/anggota', $anggota->id) }}">

                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <h4 class="modal-title">EDIT KELAS</h4>

                                </div>
                                <div class="modal-body">
                                    <div class="form-grup mb-3">
                                        <label for="" class="control-label">KELAS</label>
                                        <select name="id_kelas" class="form-control">
                                            <option value=""> Silahkan Pilih Kelas</option>
                                            @foreach ($list_kelas as $kelas)
                                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kelas')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                        <br>
                                        <label for="" class="control-label">TAHUN AJAR</label>
                                        <select name="id_tahun_ajar" class="form-control">
                                            <option value=""> Silahkan Pilih Tahun Ajar</option>
                                            @foreach ($list_tahun_ajar as $tahun)
                                                <option value="{{ $tahun->id }}">
                                                    {{ $tahun->tahun_mulai }}/{{ $tahun->tahun_selesai }}
                                                    - {{ $tahun->deskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_tahun_ajar')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                        <br>
                                        <label for="" class="control-label">PILIH WALI KELAS</label>
                                        <select name="id_guru" class="form-control">
                                            <option value=""> Silahkan Pilih Wali Kelas</option>
                                            @foreach ($list_guru as $guru)
                                                <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_guru')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
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
        <!-- /.card-body -->
    </div>
    <x-template.modal.modal id="tambah" action="{{ url('admin/anggota') }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TAMBAH DATA</h4>
            </div>
            <div class="modal-body">
                <div class="form-grup">
                    <label for="" class="control-label">PILIH KELAS</label>
                    <select name="id_kelas" class="form-control">
                        <option value=""> Silahkan Pilih Kelas</option>
                        @foreach ($list_kelas as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('id_kelas')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                    @enderror
                    <br>
                    <label for="" class="control-label">TAHUN AJAR</label>
                    <select name="id_tahun_ajar" class="form-control">
                        <option value=""> Silahkan Pilih Tahun Ajar</option>
                        @foreach ($list_tahun_ajar as $tahun)
                            <option value="{{ $tahun->id }}">
                                {{ $tahun->tahun_mulai }}/{{ $tahun->tahun_selesai }}
                                - {{ $tahun->deskripsi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_tahun_ajar')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                    @enderror
                    <br>
                    <label for="" class="control-label">PILIH WALI KELAS</label>
                    <select name="id_guru" class="form-control">
                        <option value=""> Silahkan Pilih Wali Kelas</option>
                        @foreach ($list_guru as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                        @endforeach
                    </select>
                    @error('id_guru')
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
