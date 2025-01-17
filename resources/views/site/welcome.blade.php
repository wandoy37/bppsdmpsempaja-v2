<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="UPTD Balai Penyuluhan dan Pengembangan SDM Pertanian Provinsi Kalimantan Timur">
    <meta name="keywords" content="UPTD BPPSDMP, BPPSDMP Kaltim, BPPSDMP SEMPAJA">
    <meta name="author" content="">
    <meta name="webcrawlers" content="all">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_kaltim.png') }}">
    <title>UPTD BPPSDMP KALTIM</title>


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- Fontawesome --}}
    <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Background image -->
    <div class="bg-image d-flex justify-content-center align-items-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/landscape-green-color.png') }}'); height: 100vh; background-repeat: no-repeat;background-position: center; background-repeat: no-repeat; background-size: cover;">
        <!-- Background image -->
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-lg-12">

                    <div class="pb-4" style="padding-top: 5rem;">
                        <img src="{{ asset('img/logo-kaltim.svg') }}" class="logo img-fluid" alt=""
                            style="width: 75px; height: auto; float: left; margin-right: 10px;">
                        <div class="mb-4">
                            <h3 class="text-white font-weight-bold">UPTD BPPSDMP</h3>
                            <p class="text-white d-flex mb-2">
                                Dinas Pangan, Tanaman Pangan dan Hortikultura Provinsi Kalimantan Timur
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('site.beranda') }}" class="btn btn-light btn-lg btn-user btn-block rounded-pill"
                        style="background-color: rgba(239, 243, 240, 0.5);">
                        WEBSITE
                    </a>

                    <div class="card o-hidden border-0 shadow-lg my-5"
                        style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.1); backdrop-filter: blur(15px);">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="row">
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <a href="https://sipp.bppsdmsempaja.kaltimprov.go.id/"
                                            class="text-decoration-none text-dark" target="_blank">
                                            <img src="{{ asset('img/aplikasi/sipp.png') }}" class="img-fluid"
                                                style="border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <a href="https://simpeltan.bppsdmsempaja.kaltimprov.go.id/"
                                            class="text-decoration-none text-dark" target="_blank">
                                            <img src="{{ asset('img/aplikasi/simpeltan.png') }}" class="img-fluid"
                                                style="border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <a href="https://sertifikat.bppsdmsempaja.kaltimprov.go.id/"
                                            class="text-decoration-none text-dark" target="_blank">
                                            <img src="{{ asset('img/aplikasi/setkon.png') }}" class="img-fluid"
                                                style="border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-3" style="margin-bottom: 10px;">
                                        <a href="https://sertifikat.bppsdmsempaja.kaltimprov.go.id/"
                                            class="text-decoration-none text-dark" target="_blank">
                                            <img src="{{ asset('img/aplikasi/wibeltan.png') }}" class="img-fluid"
                                                style="border-radius: 15px;" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
