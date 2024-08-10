<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA PENGUMUMAN</h5>
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
                    <th style="color: white;" class="text-center">TAHUN AJAR</th>
                    <th style="color: white;" class="text-center">TANGGAL MULAI</th>
                    <th style="color: white;" class="text-center">TANGGAL SELESAI</th>
                    <th style="color: white;" class="text-center">ISI</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($list_pengumuman as $pengumuman)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">
                                {{ $pengumuman->tahunAjar->tahun_mulai }}/{{ $pengumuman->tahunAjar->tahun_selesai }} -
                                {{ $pengumuman->tahunAjar->deskripsi }}</td>
                            <td class="text-center">{{ $pengumuman->tanggal_mulai_string }}</td>
                            <td class="text-center">{{ $pengumuman->tanggal_selesai_string }}</td>
                            <td class="text-center">{{ $pengumuman->isi }}</td>
                            <td class="text-center" width="90px">
                                <div class="btn-group">
                                    <a href="#edit{{ $pengumuman->id }}" data-toggle="modal"
                                        class="btn btn-warning float-right"><span class="fa fa-edit"></span></a>
                                    <a href="#hapus{{ $pengumuman->id }}" data-toggle="modal" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <x-template.modal.modal-delete id="hapus{{ $pengumuman->id }}"
                            action="{{ url('kepsek/pengumuman', $pengumuman->id) }}" />
                        <div class="modal fade" id="edit{{ $pengumuman->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="addDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addDataModalLabel">EDIT DATA PENGUMUMAN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('kepsek/pengumuman', $pengumuman->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-grup">
                                                <label for="" class="control-label">PILIH TAHUN AJAR</label>
                                                <select name="id_tahun_ajar" class="form-control mb-3">
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
                                            </div>
                                            <div class="form-grup">
                                                <label for="" class="control-label">TANGGAL MULAI</label>
                                                <input class="form-control mb-3" type="date" name="tanggal_mulai"
                                                    value="{{ $pengumuman->tanggal_mulai }}" required>
                                                @error('tanggal_mulai')
                                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                        style="font-size: 12px">
                                                @enderror
                                            </div>
                                            <div class="form-grup">
                                                <label for="" class="control-label">TANGGAL SELESAI</label>
                                                <input class="form-control mb-3" type="date" name="tanggal_selesai"
                                                    value="{{ $pengumuman->tanggal_selesai }}" required>
                                                @error('tanggal_selesai')
                                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                        style="font-size: 12px">
                                                @enderror
                                            </div>
                                            <div class="form-grup">
                                                <label for="" class="control-label">ISI</label>
                                                <textarea class="form-control mb-3" name="isi" id="" cols="30" rows="10" required>{{ $pengumuman->isi }}</textarea>
                                                @error('isi')
                                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}
                                                    </p style="font-size: 12px">
                                                @enderror
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
        <!-- /.card-body -->
    </div>
    <x-template.modal.modal id="tambah" action="{{ url('kepsek/pengumuman') }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TAMBAH DATA</h4>
            </div>
            <div class="modal-body">
                <div class="form-grup">
                    <label for="" class="control-label">PILIH TAHUN AJAR</label>
                    <select name="id_tahun_ajar" class="form-control mb-3">
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
                </div>
                <div class="form-grup">
                    <label for="" class="control-label">TANGGAL MULAI</label>
                    <input class="form-control mb-3" type="date" name="tanggal_mulai" required>
                    @error('tanggal_mulai')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                    @enderror
                </div>
                <div class="form-grup">
                    <label for="" class="control-label">TANGGAL SELESAI</label>
                    <input class="form-control mb-3" type="date" name="tanggal_selesai" required>
                    @error('tanggal_selesai')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                    @enderror
                </div>
                <div class="form-grup">
                    <label for="" class="control-label">ISI</label>
                    <textarea class="form-control mb-3" name="isi" id="" cols="30" rows="10" required>Tulis Isi Pengumuman Disini</textarea>
                    @error('isi')
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
