<x-admin-layout.app>
    <form method="POST" action="{{ url('admin/tugas/store') }}">
        @csrf
        <input label="Kode Tugas" type="hidden" name="kode_tugas" value="{{ $kode_tugas }}" />
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h2 class="card-title">FORM BUAT TUGAS ESAI</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <x-input.select label="Guru" name="id_guru">
                                            <option value="">-- Pilih guru ---</option>
                                            @foreach ($guru as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_guru }}</option>
                                            @endforeach
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.select label="Mapel" name="id_mapel">
                                            <option value="">-- Pilih mapel ---</option>
                                            @foreach ($mapel as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                            @endforeach
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Tanggal Mulai" type="text" name="tgl_mulai"
                                            placeholder="Masukan tanggal ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Tanggal Berakhir" type="text" name="tgl_akhir"
                                            placeholder="Masukan tanggal ..." />
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="col-md-12">
                        <div class="card mt-5">
                            <div class="card-body" id="box-soalesai">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-input.input label="Judul Tugas" type="text" name="judul_tugas[]"
                                            placeholder="Masukan judul ..." class="clone" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.textarea label="Deskripsi" name="deskripsi_tugas[]"
                                            placeholder="Masukan deskripsi tugas ..." id="summernote" class="clone" />
                                    </div>
                                    <div class="col-md-12">
                                        <span class="btn btn-danger remove">
                                            <i class="fas fa-trash"></i> Hapus Tugas
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="btn btn-success float-right add">
                                        <i class="fas fa-plus"></i> Tambah Tugas
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </form>

    @push('js')
        <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/summernote/summernote-bs4.min.css">
        <script src="{{ url('public') }}/admin-template/plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(function() {
                // Summernote
                $('#summernote').summernote({
                    height: 250,
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    }
                })
            })
        </script>
        <script>
            $(document).ready(function() {
                        var i = 1;
                        $('.add').click(function() {
                            i++;
                            var html = `
                            <div class = "row" id = "${i}"> 
                                <div class="col-md-12"> 
                                    <x-input.input label="Judul Tugas type = "text"
                        name = "judul_tugas[]"
                        placeholder = "Masukan judul ..." class = "clone" / > <
                        /div> <div class="col-md-12"> <x-input.textarea label="Deskripsi" name="deskripsi_tugas[]" placeholder="Masukan deskripsi tugas ..." id="summernote" class="clone" / >
                        <
                        /div> <div class="col-md-12"> <span class="btn btn-danger remove" data-id="${i}"> <i class="fas fa-trash"></i >
                        Hapus Tugas < /span> </div > <
                            /div>`;
                            $('#box-soalesai').append(html);
                        });

                        function hapusTugas(id) {
                            console.log(id)
                        };
                        $('.remove').click(function() {
                            var id = $(this).data('id');
                            $('#' + id).remove();
                        });
        </script>
    @endpush

</x-admin-layout.app>
