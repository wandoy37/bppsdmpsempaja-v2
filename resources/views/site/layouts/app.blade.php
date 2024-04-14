<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="UPTD Balai Penyuluhan dan Pengembangan SDM Pertanian Provinsi Kalimantan Timur">
    <meta name="keywords" content="UPTD BPPSDMP, BPPSDMP Kaltim, BPPSDMP SEMPAJA">
    <meta name="author" content="bppsdmp kaltim">
    <meta name="webcrawlers" content="all">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-kaltim.svg') }}">

    <title>UPTD BPPSDMP KALTIM - @yield('title')</title>

    <!-- CSS FILES -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('assets') }}/css/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('assets') }}/css/templatemo-kind-heart-charity.css" rel="stylesheet">

    {{-- CSS FILES CUSTOM --}}
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
    <style>
        :root {
            --breadcrumb-background: url('{{ asset('img/landscape-green-color.png') }}');
        }
    </style>
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">

    @include('site.layouts.navbar')

    <main>

        @yield('content')


    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-4 mx-auto">
                    <img src="{{ asset('img/logo-kaltim.svg') }}" class="logo img-fluid" alt=""
                        style="height: auto; float: left; margin-right: 10px;">
                    <div>
                        <h5 class="site-footer-title mb-3">UPTD BPPSDMP</h5>
                        <p class="text-white d-flex mb-2">
                            Dinas Pangan, Tanaman Pangan dan Hortikultura Provinsi Kalimantan Timur
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 mx-auto">
                    <h5 class="site-footer-title mb-3">Informasi Kontak</h5>

                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone me-2"></i>

                        <a href="tel: 0821-4872-2747" class="site-footer-link">
                            0821-4872-2747
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:uptdbppsdmp.kaltimprov@gmail.com" class="site-footer-link">
                            uptdbppsdmp.kaltimprov@gmail.com
                        </a>
                    </p>

                    <p class="text-white d-flex mt-3">
                        <i class="bi-geo-alt me-2"></i>
                        Jl. Thoyib Hadiwijaya No.36, Sempaja Selatan, Samarinda - Kalimantan Timur
                    </p>

                    <a href="https://api.whatsapp.com/send/?phone=6282148722747" class="custom-btn btn mt-3">
                        <i class="bi bi-whatsapp"></i>
                        WhatsApp Chat
                    </a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-7 col-12">
                        <p class="copyright-text mb-0">Copyright © 2023 - {{ date('Y') }} UPTD BPPSDMP Provinsi
                            Kalimantan TImur.
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                        <ul class="social-icon">
                            {{-- <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li> --}}

                            <li class="social-icon-item">
                                <a href="https://www.facebook.com/bppsdmpsempaja"
                                    class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.instagram.com/bppsdmp_provkaltim"
                                    class="social-icon-link bi-instagram"></a>
                            </li>

                            {{-- <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-linkedin"></a>
                            </li> --}}

                            <li class="social-icon-item">
                                <a href="https://youtu.be/SZ4K6RZB6KM?si=6PcUsUXqrZEFIvpw"
                                    class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.sticky.js"></script>
    {{-- <script src="{{ asset('assets') }}/js/click-scroll.js"></script> --}}
    <script src="{{ asset('assets') }}/js/counter.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menghapus kelas dropdown-menu-open secara default pada semua elemen dropdown-menu
            var dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(function(menu) {
                menu.classList.remove('dropdown-menu-open');
            });

            // Ambil semua elemen dropdown-toggle
            var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            // Tambahkan event listener untuk setiap dropdown-toggle
            dropdownToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    // Toggle kelas dropdown-menu-open pada dropdown-menu terdekat
                    var dropdownMenu = this.nextElementSibling;
                    dropdownMenu.classList.toggle('dropdown-menu-open');
                });
            });
        });
    </script>

</body>

</html>
