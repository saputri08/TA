<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="font-size: 25px"> SELAMAT DATANG , ADMIN</h5>
    <hr>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $siswa }}</h3>

                            <p>Data Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $mapel }}</h3>

                            <p>Data Mapel</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $guru }}</h3>

                            <p>Data Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $kelas }}</h3>

                            <p>Data Kelas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-house-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>