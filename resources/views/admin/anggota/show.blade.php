<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DETAIL SISWA
    </h5>
    <hr>
    <x-template.button.back-button url="admin/anggota" />
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <dl class="row">
                        <dt class="col-4">NAMA KELAS</dt>
                        <dd class="col-8">: {{ $anggota->Kelas->nama_kelas }}</dd>
                        <dt class="col-4">SEMESTER</dt>
                        <dd class="col-8">: {{ $anggota->Kelas->TahunAjar->deskripsi }}</dd>
                    </dl>
                </div>
                <div class="col-md-5">
                    <dl class="row">
                        <dt class="col-4">TAHUN AJAR</dt>
                        <dd class="col-8">
                            : {{ $anggota->Kelas->TahunAjar->tahun_mulai }}/{{ $anggota->Kelas->TahunAjar->tahun_selesai }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="padding: 6px; vertical-align: middle; text-align: center;">
            <h5 style="vertical-align: middle; font-weight:bold;">TAMBAH SISWA KE ANGGOTA</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/anggota/add-role') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_anggota" value="{{ $anggota->id }}">
                        <div class="form-group">
                            <select class="select2bs4 form-control" name="id_siswa" style="width: 100%;">
                                <option value="">Pilih Nama Siswa</option>
                                @foreach ($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark float-right"><i class="far fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <br>
                    <table id="example1" class="table table-datatable table-bordered">
                        <thead class="bg-dark">
                            <th style="color: white; vertical-align: middle; text-align: center;" width="10px">NO.</th>
                            <th style="color: white; vertical-align: middle; text-align: center;" width="100px">AKSI</th>
                            <th style="color: white; vertical-align: middle; text-align: center;">NIS / NISN</th>
                            <th style="color: white; vertical-align: middle; text-align: center;">NAMA</th>
                        </thead>
                        <tbody>
                            @foreach ($anggota->grup as $grup)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ url('admin/anggota/delete-role', $grup->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                                <td>{{ $grup->siswa->nis }} / {{ $grup->siswa->nisn }}</td>
                                <td>{{ $grup->siswa->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>