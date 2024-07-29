<div class="modal fade {{ $class ?? '' }}" id="{{ $id ?? '' }}">
    <div class="modal-dialog shadow-sm border-0 modal-dialog-centered">
        <form action="{{ $action ?? '' }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="flex items-center justify-center pt-10">
                    <i class="fas fa-info-circle text-[50px] text-red-500"></i>
                </div>
                <div class="modal-body">
                    <h2 class="text-center text-2xl font-medium text-red-500">Yakin ingin menghapus data ini ?!</h2>
                    <p class="text-center font-medium">Data yang telah dihapus tidak bisa dikembalikan lagi !.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-danger">TETAP HAPUS</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
