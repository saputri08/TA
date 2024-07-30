<x-base>
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px">Profile Siswa
        </h5>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('siswa/dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body position-relative">
                    @if ($user->foto)
                    <img src="{{ url('public') }}/{{ $user->foto }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('siswa/profile', $user->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-end mt-3 mb-3"><i class="fas fa-edit"></i> Edit Data</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA</dt>
                            <dd>{{ $user->nama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NIS</dt>
                            <dd>{{ $user->nis }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NISN</dt>
                            <dd>{{ $user->nisn }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">TEMPAT LAHIR</dt>
                            <dd>{{ $user->tmp_lahir }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">TANGGAL LAHIR</dt>
                            <dd>{{ $user->tanggal_lahir_string }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">JENIS KELAMIN</dt>
                            <dd>{{ $user->jk }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">AGAMA</dt>
                            <dd>{{ $user->agama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">ALAMAT</dt>
                            <dd>{{ $user->alamat }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $user->email }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">PASSWORD</dt>
                            <dd>{{ $user->password }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>