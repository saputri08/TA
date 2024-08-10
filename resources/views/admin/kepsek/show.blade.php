<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DETAIL DATA KEPALA SEKOLAH</h5>
    <hr>
    <x-template.button.back-button url="admin/kepsek" />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($kepsek->foto)
                    <img src="{{ url('public/'.$kepsek->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/kepsek', $kepsek->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-right"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA LENGKAP</dt>
                            <dd>{{ $kepsek->nama_kepsek }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NIP</dt>
                            <dd>{{ $kepsek->nip }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">ALAMAT</dt>
                            <dd>{{ $kepsek->alamat }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">TEMPAT TANGGAL LAHIR</dt>
                            <dd>{{ $kepsek->tmp_lahir }}, {{ $kepsek->tanggal_lahir_string }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">JENIS KELAMIN</dt>
                            <dd>{{ $kepsek->jk_kepsek }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $kepsek->email }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>