<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DETAIL DATA GURU</h5>
    <hr>
    <x-template.button.back-button url="admin/guru" />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($guru->foto)
                    <img src="{{ url('public/'.$guru->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/guru', $guru->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-right"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA GURU</dt>
                            <dd>{{ $guru->nama_guru }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NIP</dt>
                            <dd>{{ $guru->nip }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">KELAS</dt>
                            <dd>{{ $guru->kelas->nama_kelas }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">TEMPAT TANGGAL LAHIR</dt>
                            <dd>{{ $guru->tmp_lahir }}, {{ $guru->tanggal_lahir_string }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">JENIS KELAMIN</dt>
                            <dd>{{ $guru->jk_guru }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $guru->email }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>