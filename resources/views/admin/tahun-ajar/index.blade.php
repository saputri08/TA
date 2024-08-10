<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> DATA TAHUN AJAR</h5>
    <hr>
    <div class="card mt-4">
        <div class="card-header">
            <a href="{{ url('admin/tahun-ajar/create') }}" class="btn btn-success float-right"><span class="fa fa-plus"></span> Tambah Data</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: white;" width="10px" class="text-center">NO.</th>
                    <th style="color: white;" class="text-center">TAHUN MULAI</th>
                    <th style="color: white;" class="text-center">TAHUN SELESAI</th>
                    <th style="color: white;" class="text-center">SEMESTER</th>
                    <th style="color: white;" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_tahun_ajar as $tahun_ajar)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $tahun_ajar->tahun_mulai }}</td>
                        <td class="text-center">{{ $tahun_ajar->tahun_selesai }}</td>
                        <td class="text-center">{{ $tahun_ajar->deskripsi }}</td>
                        <td class="text-center" width="90px">
                            <div class="btn-group">

                                <x-template.button.edit-button url="admin/tahun-ajar" id="{{ $tahun_ajar->id }}" />
                                    <a href="#hapus{{ $tahun_ajar->id }}" data-toggle="modal" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
    
                        </tr>
    
                        <x-template.modal.modal-delete id="hapus{{ $tahun_ajar->id }}" action="{{ url('admin/tahun-ajar', $tahun_ajar->id) }}" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app>