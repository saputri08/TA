<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DETAIL PESERTA KELAS
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
                        <dd class="col-8">: {{ $anggota->tahunAjar->deskripsi }}</dd>
                    </dl>
                </div>
                <div class="col-md-5">
                    <dl class="row">
                        <dt class="col-4">TAHUN AJAR</dt>
                        <dd class="col-8">
                            :
                            {{ $anggota->tahunAjar->tahun_mulai }}/{{ $anggota->tahunAjar->tahun_selesai }}
                        </dd>
                        <dt class="col-4">WALI KELAS</dt>
                        <dd class="col-8">: {{ $anggota->guru->nama_guru }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="padding: 6px; vertical-align: middle; text-align: center;">
            <h5 style="vertical-align: middle; font-weight:bold;">TAMBAH SISWA KE KELAS</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/anggota/add-role') }}" method="post">
                        @csrf
                        @foreach ($list_mapel as $mapel)
                        @if ($mapel->id_kelas == $anggota->kelas->id)
                        <input type="text" name="mapel[{{ $mapel->id }}]" value="{{ $mapel->id }}" hidden>
                        @endif
                        @endforeach
                        <input type="hidden" name="id_kelas" value="{{ $anggota->Kelas->id }}">
                        <input type="hidden" name="semester" value="{{ $anggota->tahunAjar->deskripsi }}">
                        <input type="hidden" name="id_anggota" value="{{ $anggota->id }}">
                        <input type="hidden" name="nama_siswa" id="nama_siswa" value="">
                        <input type="hidden" name="nisn" id="nisn" value="">
                        <input type="hidden" name="tahun_mulai" value="{{ $anggota->tahunAjar->tahun_mulai }}">
                        <input type="hidden" name="tahun_selesai" value="{{ $anggota->tahunAjar->tahun_selesai }}">
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
                            <th style="color: white; vertical-align: middle; text-align: center;" width="10px">NO.
                            </th>
                            <th style="color: white; vertical-align: middle; text-align: center;" width="100px">AKSI
                            </th>
                            <th style="color: white; vertical-align: middle; text-align: center;">NIS / NISN</th>
                            <th style="color: white; vertical-align: middle; text-align: center;">NAMA</th>
                        </thead>
                        <tbody>
                            @foreach ($anggota->grup as $grup)
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/anggota/delete-role', $grup->id) }}"
                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                                <td class="text-center">{{ $grup->siswa->nis }} / {{ $grup->siswa->nisn }}</td>
                                <td class="text-center">{{ $grup->siswa->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#id_siswa').change(function() {
                var selectedOption = $(this).find('option:selected');
                var namaSiswa = selectedOption.data('nama_siswa');
                var nisn = selectedOption.data('nisn');

                $('#nama_siswa').val(namaSiswa);
                $('#nisn').val(nisn);
            });
        });
    </script>
    @endpush
</x-app>