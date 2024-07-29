<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> EDIT DATA KEPALA SEKOLAH</h5>
    <hr>
    <x-template.button.back-button url="admin/kepsek" />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($kepsek->foto)
                    <img src="{{ url($kepsek->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('/') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/kepsek', $kepsek->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">NIP</label>
                                    <input type="text" name="nip" value="{{ $kepsek->nip }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Lengkap</label>
                                    <input type="text" name="nama_kepsek" value="{{ $kepsek->nama_kepsek }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Jenis Kelamin</label>
                                    <select name="jk_kepsek" class="form-control" required>
                                        <option selected>{{ $kepsek->jk_kepsek }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $kepsek->tgl_lahir }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Tempat Lahir</label>
                                    <input type="text" name="tmp_lahir" class="form-control" value="{{ $kepsek->tmp_lahir }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Foto</label>
                                    <input type="file" name="foto" accept=".jpg, .png, .jpeg" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $kepsek->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $kepsek->alamat }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right"><i class="far fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>