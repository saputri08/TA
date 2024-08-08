<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="font-size: 25px"> SELAMAT DATANG ,
        {{ Auth::guard('guru')->user()->nama_guru }}</h5>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header float-center" style="background-color: #ffff">
                    <h5 class="font-weight-bold text-center" style="font-size: 18px; color:dark;">PENGUMUMAN</h5>
                    <!-- Catatan di Bawah Pengumuman -->
                    <p class="text-center" style="font-size: 14px; color: #555;">
                        <em>*Klik pengumuman untuk melihat detail lebih lanjut.</em>
                    </p>
                </div>
                <div class="card-body" style="background-color: #f9f9f9; padding: 20px;">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($pengumuman->isEmpty())
                                <p class="text-center">
                                    <span class="badge badge-danger">Tidak ada pengumuman yang tersedia saat ini.</span>
                                </p>
                            @else
                                <ul class="list-group">
                                    @foreach ($pengumuman->sortByDesc('created_at') as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center"
                                            style="border-left: 5px solid #007bff; margin-bottom: 10px; background-color: #ffffff;">
                                            <span>
                                                <i class="fas fa-bullhorn mr-2" style="color: #007bff;"></i>
                                                <a href="#" style="color: black; text-decoration: none;"
                                                    data-toggle="modal"
                                                    data-target="#pengumumanModal{{ $item->id }}">
                                                    {{ $item->isi }}
                                                </a>
                                            </span>
                                            <span class="badge badge-primary badge-pill">
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($pengumuman as $item)
        <div class="modal fade" id="pengumumanModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="pengumumanModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengumumanModalLabel{{ $item->id }}">PENGUMUMAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tahun Ajar:</strong>
                            {{ $item->tahunAjar->tahun_mulai }}/{{ $item->tahunAjar->tahun_selesai }} -
                            {{ $item->tahunAjar->deskripsi }}</p>
                        <p><strong>Tanggal Mulai:</strong>
                            {{ $item->tanggal_mulai_string }}</p>
                        <p><strong>Tanggal Selesai:</strong>
                            {{ $item->tanggal_selesai_string }}</p>
                        <hr>
                        <p>{{ $item->isi }}</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ url('guru/pengumuman/detail') }}">
                            @csrf
                            <input type="hidden" name="id_pengumuman" value="{{ $item->id }}">
                            <input type="hidden" name="id_guru" value="{{ Auth::guard('guru')->user()->id }}">
                            <button type="submit" class="btn btn-primary">Sudah Input Nilai</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app>
