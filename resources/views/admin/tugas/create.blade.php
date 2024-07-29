<x-admin-layout.app>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-5">
                        <div class="card-header">
                           <h2 class="card-title">FORM TAMBAH DATA TUGAS</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/tugas/store') }}">
                                @csrf
                                <div class="row">
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="Kode_kelas" type="number" name="kode_kelas" placeholder="Masukan NIS ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="siswa" type="text" name="siswa" placeholder="Masukan nama lengkap ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="guru" type="text" name="guru" placeholder="Masukan tempat lahir ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="mapel" type="date" name="mapel" placeholder="Masukan tanggal lahir ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="tgl_mulai" type="date" name="tgl_mulai" placeholder="Masukan tanggal lahir ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="tgl_akhir" type="date" name="tgl_akhir" placeholder="Masukan tanggal lahir ..." />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex items-center justify-content-end top-3">
                                            <button class="btn btn-primary">SIMPAN</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>




</x-admin-layout.app>