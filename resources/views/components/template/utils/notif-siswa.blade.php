@foreach (['success', 'warning', 'danger'] as $status)
@if (session($status))
<div class="alert alert-{{ $status }} alert-dismissible fade show">
    <strong>{{ session($status) }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach

<script>
    // Menunggu sampai DOM selesai dimuat
    document.addEventListener('DOMContentLoaded', (event) => {
        // Mengambil semua alert yang ada di halaman
        const alerts = document.querySelectorAll('.alert');

        // Mengatur timer untuk setiap alert
        alerts.forEach(alert => {
            setTimeout(() => {
                // Menyembunyikan alert setelah 2000ms
                alert.classList.remove('show');
                alert.classList.add('fade');
                // Menghapus elemen alert dari DOM setelah transisi selesai
                setTimeout(() => alert.remove(), 150); // 150ms untuk menyelesaikan transisi fade out
            }, 2000); // 2000ms adalah 2 detik
        });
    });
</script>