<x-base>
    <div class="card profile-box">
        <div class="card-body">
            <div class="col-md-6">
                <div class="row">
                    <div class="col col-3 col-sm-4" id="gambar">
                        <img src="{{ url('public') }}/admin-template/dist/img/depan.gif" alt="" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                    </div>
                    <div class="col col-9 col-sm-8">
                        <div class="item greetings">
                            <h3 style="color: white;">Hallo, {{ Auth::guard('siswa')->user()->nama }}</h3>
                            <p>
                                @if ($namaKelas)
                                Saat ini Anda berada di kelas {{ $namaKelas }}.
                                @else
                                Saat ini Anda belum ditambahkan ke kelas manapun.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-base>