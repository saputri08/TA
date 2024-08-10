<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DETAIL DATA SISWA</h5>
    <hr>
    <x-template.button.back-button url="admin/siswa" />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($siswa->foto)
                    <img src="{{ url('public/'.$siswa->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/siswa', $siswa->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-right"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA SISWA</dt>
                            <dd>{{ $siswa->nama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NIP</dt>
                            <dd>{{ $siswa->nis }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NISN</dt>
                            <dd>{{ $siswa->nisn }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">TEMPAT TANGGAL LAHIR</dt>
                            <dd>{{ $siswa->tmp_lahir }}, {{ $siswa->tanggal_lahir_string }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">JENIS KELAMIN</dt>
                            <dd>{{ $siswa->jk }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">AGAMA</dt>
                            <dd>{{ $siswa->agama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">ALAMAT</dt>
                            <dd>{{ $siswa->alamat }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $siswa->email }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>