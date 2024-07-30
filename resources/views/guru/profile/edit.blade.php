<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> EDIT PROFILE GURU</h5>
    <hr>
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
                    <img src="{{ url('public')}}/{{ ($user->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('guru/profile', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">NIP</label>
                                <input type="text" value="{{ $user->nip }}" name="nip" class="form-control mb-3" placeholder="Masukan NIP">
                                @error('nip')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label mt-3">Nama Lengkap</label>
                                <input type="text" value="{{ $user->nama_guru }}" name="nama_guru" class="form-control mb-3" placeholder="Masukan Nama">
                                @error('nama_guru')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label mt-3">Kelas</label>
                                    <select name="id_kelas" id="" class="form-control mb-3">
                                        <option value="{{ $user->kelas->nama_kelas }}">
                                            {{ $user->kelas->nama_kelas }}
                                        </option>
                                        @foreach ($list_kelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Tanggal Lahir</label>
                                <input type="date" value="{{ $user->tgl_lahir }}" name="tanggal_lahir" class="form-control mb-3" placeholder="Masukan Tanggal Lahir">
                                @error('tanggal_lahir')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label mt-3">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        @if ($user->jk_guru == 'perempuan')
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
                                <input type="text" value="{{ $user->tmp_lahir }}" name="tempat_lahir" class="form-control mb-3" placeholder="Masukan Tempat Lahir">
                                @error('tempat_lahir')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label mt-3">Email</label>
                                <input type="text" value="{{ $user->email }}" name="email" class="form-control mb-3" placeholder="Masukan Email">
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
                                <input type="text" value="{{ $user->alamat }}" name="alamat" class="form-control mb-3" placeholder="Masukan Alamat">
                                @error('alamat')
                                <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-dark btn-tone float-right"><i class="far fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>