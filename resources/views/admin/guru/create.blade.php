<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> TAMBAH DATA GURU</h5>
    <hr>
    <x-template.button.back-button url="admin/guru" />
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ url('admin/guru') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">NIP</label>
                        <input type="text" name="nip" class="form-control mb-3" placeholder="Masukan NIP">
                        @if ($errors->has('nip'))
                            <label for="nip" class="label text-danger">{{ $errors->first('nip') }}</label>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">Nama Lengkap</label>
                        <input type="text" name="nama_guru" class="form-control mb-3" placeholder="Masukan Nama">
                        @error('nama_guru')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label mt-3">Kelas</label>
                            <select name="id_kelas" id="" class="form-control mb-3">
                                <option value="">--- Pilih kelas ---</option>
                                @foreach ($list_kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control mb-3"
                            placeholder="Masukan Tanggal Lahir">
                        @error('tgl_lahir')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label mt-3">Jenis Kelamin</label>
                            @if ($errors->has('jk_guru'))
                                <label for="jk_guru" class="label text-danger">{{ $errors->first('jk_guru') }}</label>
                            @endif
                            <select name="jk_guru" id="jk_guru" class="form-control">
                                <option value="">--- Pilih jenis kelamin ---</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
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
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="control-label mt-3">Password</label>
                        <input type="text" name="password" class="form-control mb-3" placeholder="Masukan Password">
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
