<x-base>
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> Edit Profile
        </h5>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('siswa/dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('siswa/profile') }}">Profile</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <br>
    <button onclick="goBack()" class="btn btn-sm btn-primary btn-tone"><i class="fas fa-arrow-left"></i>
        Kembali</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($user->foto)
                    <img src="{{ url($user->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('siswa/profile', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">NIS</label>
                                <input type="text" name="nis" class="form-control mb-3" placeholder="Masukan NIS" value="{{ $user->nis }}">
                                @error('nis')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">NISN</label>
                                <input type="text" name="nisn" class="form-control mb-3" placeholder="Masukan NISN" value="{{ $user->nisn }}">
                                @error('nisn')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control mb-3" placeholder="Masukan Nama Lengkap" value="{{ $user->nama }}">
                                @error('nama')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" class="form-control mb-3" placeholder="Masukan Tempat Lahir" value="{{ $user->tmp_lahir }}">
                                @error('tmp_lahir')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control mb-3" placeholder="Masukan Tanggal Lahir">
                                @error('tanggal_lahir')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option value="">{{ $user->jk }}</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Agama</label>
                                <select name="agama" id="" class="form-control">
                                    <option value="">{{ $user->agama }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Email</label>
                                <input type="text" name="email" class="form-control mb-3" placeholder="Masukan Email" value="{{ $user->email }}">
                                @error('email')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Foto</label>
                                <input type="file" name="foto" class="form-control mb-3" placeholder="Masukan Foto">
                                @error('foto')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">Password</label>
                                <input type="text" name="password" class="form-control mb-3" placeholder="Masukan Password">
                                @error('password')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">Alamat</label>
                                <input type="text" name="alamat" class="form-control mb-3" placeholder="Masukan Alamat" value="{{ $user->alamat }}">
                                @error('alamat')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-dark btn-tone float-end"><i class="far fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-base>