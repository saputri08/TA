<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA SISWA</h5>
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
                            {{ $anggota->Kelas->TahunAjar->tahun_mulai }}/{{ $anggota->Kelas->TahunAjar->tahun_selesai }}
                        </td>
                        <td class="text-center">{{ $anggota->Kelas->TahunAjar->deskripsi }}</td>
                        <td class="text-center" width="90px">
                            <div class="btn-group">
                                <x-template.button.show-button url="kepsek/anggota" id="{{ $anggota->id }}" />
                            </div>
                        </td>
                    </tr>
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
                        @foreach ($list_kelas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama_kelas }} -
                            {{ $anggota->TahunAjar->tahun_mulai }}/{{ $anggota->TahunAjar->tahun_selesai }}
                            - {{ $anggota->TahunAjar->deskripsi }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-outline-primary">SIMPAN</button>
            </div>
        </div>
    </x-template.modal.modal>
</x-app>