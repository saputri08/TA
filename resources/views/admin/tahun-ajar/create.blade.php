<x-app>
    <!-- Content Header (Page header) -->
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> TAMBAH DATA TAHUN AJAR</h5>
    <hr>
    <!-- Main content -->
    <x-template.button.back-button url="admin/tahun-ajar" />
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('admin/tahun-ajar') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label mt-3">Tahun Mulai</label>
                            <input type="text" name="tahun_mulai" class="form-control mb-3" placeholder="Masukan Tahun Mulai">
                            @error('tahun_mulai')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Tahun Selesai</label>
                        <input type="text" name="tahun_selesai" class="form-control mb-3" placeholder="Masukan Tahun Selesai">
                        @error('tahun_selesai')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label mt-3">Deskripsi</label>
                        <select name="deskripsi" class="form-control mb-3">
                            <option value="">Pilih Data</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                        @error('deskripsi')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex items-center justify-content-end">
                            <button class="btn btn-primary"><span class="fa fa-save"></span> SIMPAN</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</x-app>