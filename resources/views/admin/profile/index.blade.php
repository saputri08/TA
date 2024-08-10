<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> PROFILE ADMIN</h5>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body position-relative">
                    @if ($user->foto)
                    <img src="{{ url('public')}}/{{ $user->foto }}" class="img-fluid" alt="">
                    @else
                    <img src="{{ url('public') }}/admin-template/dist/img/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/profile', $user->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-right mt-3 mb-3"><i class="fas fa-edit"></i> Edit Data</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA</dt>
                            <dd>{{ $user->nama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $user->email }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">PASSWORD</dt>
                            <dd>{{ $user->password }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>