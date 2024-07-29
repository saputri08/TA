<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="font-size: 25px"> SELAMAT DATANG , {{ Auth::guard('guru')->user()->nama_guru }}</h5>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header float-center" style="background-color: #ffff">
                    <h5 class="font-weight-bold text-center" style="color:dark;" style="font-size: 18px"> DESKRIPSI</h5>
                </div>
                <div class="card-body" style="background-color: #ffff">
                    <div class="row">
                        <div class="col-md-12">
                            <dl class="row" style="color:dark;">
                                <dt class="col-2">NAMA</dt>
                                <dd class="col-10">: {{ Auth::guard('guru')->user()->nama_guru }}</dd>
                                <dt class="col-2">NIP</dt>
                                <dd class="col-10">: {{ Auth::guard('guru')->user()->nip }}</dd>
                                <dt class="col-2">JABATAN</dt>
                                <dd class="col-10">: GURU</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>