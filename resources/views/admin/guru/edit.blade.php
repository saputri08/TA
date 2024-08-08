<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> EDIT DATA GURU</h5>
    <hr>
    <x-template.button.back-button url="admin/guru" />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if ($guru->foto)
                        <img src="{{ url('public') }}/{{ $guru->foto }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid"
                            alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/guru', $guru->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">NIP</label>
                                <input type="text" value="{{ $guru->nip }}" name="nip"
                                    class="form-control mb-3" placeholder="Masukan NIP">
                                @error('nip')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                        style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">Nama Lengkap</label>
                                <input type="text" value="{{ $guru->nama_guru }}" name="nama_guru"
                                    class="form-control mb-3" placeholder="Masukan Nama">
                                @error('nama_guru')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                        style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">Tanggal Lahir</label>
                                <input type="date" value="{{ $guru->tgl_lahir }}" name="tanggal_lahir"
                                    class="form-control mb-3" placeholder="Masukan Tanggal Lahir">
                                @error('tanggal_lahir')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                        style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label mt-3">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        @if ($guru->jk_guru == 'perempuan')
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                        @else
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Tempat Lahir</label>
                                <input type="text" value="{{ $guru->tmp_lahir }}" name="tempat_lahir"
                                    class="form-control mb-3" placeholder="Masukan Tempat Lahir">
                                @error('tempat_lahir')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                        style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Email</label>
                                <input type="text" value="{{ $guru->email }}" name="email"
                                    class="form-control mb-3" placeholder="Masukan Email">
                                @error('email')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                        style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Foto</label>
                                <input type="file" name="foto" class="form-control mb-3"
                                    placeholder="Masukan Foto">
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
                                <input type="text" value="{{ $guru->alamat }}" name="alamat"
                                    class="form-control mb-3" placeholder="Masukan Alamat">
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
        </div>
    </div>
</x-app>
