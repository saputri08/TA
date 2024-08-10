<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>MAN2 || Ketapang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ url('public') }}/admin-template/dist/img/kemenag.png">
    <link href="{{ url('public') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/admin-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Main CSS File -->
    <link href="{{ url('public') }}/assets/css/main.css" rel="stylesheet">

    <style>
        /* #footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #footer .container .d-lg-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #footer .container .d-lg-flex .mb-2 {
            margin-right: 5px;
        } */

        /* @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .card {
                margin: 10px 0;
            }

            .card-body {
                padding: 10px;
            }
        } */

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        main {
            flex: 1;
        }

        .footer {
            position: relative;
            background-color: #f8f9fa;
            /* Sesuaikan dengan warna background footer Anda */
            padding: 20px 0;
            /* Sesuaikan padding jika diperlukan */
        }
    </style>
</head>

<body class="index-page">

    <x-section.navbar />

    <main class="main">

        <section class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <x-template.utils.notif-siswa />
                    </div>
                </div>
                {{ $slot }}
            </div>
        </section>

    </main>

    <x-section.footer />


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ url('public') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('public') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ url('public') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('public') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Main JS File -->
    <script src="{{ url('public') }}/assets/js/main.js"></script>

</body>

</html>