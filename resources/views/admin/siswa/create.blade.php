<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> TAMBAH DATA SISWA</h5>
    <hr>
    <x-template.button.back-button url="admin/siswa" />
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/siswa') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">NIS</label>
                        <input type="text" name="nis" class="form-control mb-3" placeholder="Masukan NIS">
                        @error('nis')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">NISN</label>
                        <input type="text" name="nisn" class="form-control mb-3" placeholder="Masukan NISN">
                        @error('nisn')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control mb-3"
                            placeholder="Masukan Nama Lengkap">
                        @error('nama')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control mb-3"
                            placeholder="Masukan Tempat Lahir">
                        @error('tmp_lahir')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control mb-3"
                            placeholder="Masukan Tanggal Lahir">
                        @error('tgl_lahir')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Jenis Kelamin</label>
                        @error('jk')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                        <select name="jk" id="jk" class="form-control">
                            <option value="">--- Pilih jenis kelamin ---</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-laki">Laki-laki</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Agama</label>
                        @error('agama')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                        <select name="agama" id="agama" class="form-control">
                            <option value="">--- Pilih jenis agama ---</option>
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
                        <input type="text" name="email" class="form-control mb-3" placeholder="Masukan Email">
                        @error('email')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Foto</label>
                        <input type="file" name="foto" class="form-control mb-3" placeholder="Masukan Foto">
                        @error('foto')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                style="font-size: 12px">
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">Password</label>
                        <input type="text" name="password" class="form-control mb-3"
                            placeholder="Masukan Password">
                        @error('password')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">Alamat</label>
                        <input type="text" name="alamat" class="form-control mb-3" placeholder="Masukan Alamat">
                        @error('alamat')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                style="font-size: 12px">
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex items-center justify-content-end">
                            <button class="btn btn-primary"><i class="far fa-save"></i> SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</x-app>
