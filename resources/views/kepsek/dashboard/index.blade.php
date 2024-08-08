<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="font-size: 25px"> SELAMAT DATANG ,
        {{ Auth::guard('kepsek')->user()->nama_kepsek }}</h5>
    <hr>
    <br>
    <div class="container-fluid">
        @if ($latestPengumuman)
            <!-- Chart -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-bold">Status Input Nilai Oleh Guru
                                @if ($latestPengumuman)
                                    Tahun Ajar
                                    {{ $latestPengumuman->tahunAjar->tahun_mulai }}/{{ $latestPengumuman->tahunAjar->tahun_selesai }}
                                    Semester
                                    {{ $latestPengumuman->tahunAjar->deskripsi }}
                                @endif
                            </h5>
                        </div>
                        <div class="card-body">
                            <canvas id="statusChart" style="width: 300px; height: 50px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-bold">DAFTAR GURU</h5>
                        </div>
                        <div class="card-body">
                            @if ($gurus->isEmpty())
                                <p class="text-center">
                                    <span class="badge badge-danger">Tidak ada guru yang terdaftar.</span>
                                </p>
                            @else
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NAMA GURU</th>
                                            <th class="text-center">STATUS INPUT NILAI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gurus as $guru)
                                            <tr>
                                                <td>{{ $guru->nama_guru }}</td>
                                                <td class="text-center">
                                                    @if ($guruInput->contains($guru->id))
                                                        <span class="badge badge-success">Sudah Input Nilai</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Input Nilai</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('statusChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sudah Input Nilai', 'Belum Input Nilai'], // Label untuk setiap bar
                datasets: [{
                    label: 'Jumlah Guru', // Label untuk dataset
                    data: [
                        @php echo $guruInput->count(); @endphp,
                        @php echo $gurus->count() - $guruInput->count(); @endphp
                    ],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderColor: ['#28a745', '#dc3545'],
                    borderWidth: 1,
                    barThickness: 170, // Mengatur ketebalan bar
                    maxBarThickness: 170 // Ketebalan maksimum bar
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Guru' // Label pada sumbu Y
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Status Input Nilai' // Label pada sumbu X
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Menampilkan legenda
                        labels: {
                            generateLabels: function(chart) {
                                return chart.data.labels.map(function(label, i) {
                                    return {
                                        text: label,
                                        fillStyle: chart.data.datasets[0].backgroundColor[i]
                                    };
                                });
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app>
