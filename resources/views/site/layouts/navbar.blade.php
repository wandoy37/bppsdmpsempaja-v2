<header class="site-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <a href="https://g.co/kgs/4SBgUCq" class="bi-geo-alt me-2">
                        Jl. Thoyib Hadiwijaya No.36, Sempaja Selatan, Samarinda - Kalimantan Timur
                    </a>
                </p>

                <p class="d-flex mb-0">
                    <i class="bi-envelope me-2"></i>

                    <a href="mailto:uptdbppsdmp.kaltimprov@gmail.com">
                        uptdbppsdmp.kaltimprov@gmail.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                <ul class="social-icon">
                    {{-- <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li> --}}

                    <li class="social-icon-item">
                        <a href="https://www.facebook.com/bppsdmpsempaja" class="social-icon-link bi-facebook"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="https://www.instagram.com/bppsdmp_provkaltim"
                            class="social-icon-link bi-instagram"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="https://youtu.be/SZ4K6RZB6KM?si=6PcUsUXqrZEFIvpw"
                            class="social-icon-link bi-youtube"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="https://api.whatsapp.com/send/?phone=6282148722747"
                            class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('site.beranda') }}">
            <img src="{{ asset('/img/logo_kaltim.png') }}" class="img-fluid" width="50px" alt="logo_kaltim">
            <span>
                UPTD BPPSDMP
                <small>Provinsi Kalimantan Timur</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-uppercase" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->segment(1) == 'beranda' ? 'active' : '' }}"
                        href="{{ route('site.beranda') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->segment(1) == 'profil' ? 'active' : '' }}"
                        href="{{ route('site.profil') }}">Profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->segment(1) == 'berita' ? 'active' : '' }}"
                        href="{{ route('site.berita') }}">Berita</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link click-scroll dropdown-toggle" href="#" id="navbarLightDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi Publik</a>

                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-open"
                        aria-labelledby="navbarLightDropdownMenuLink">
                        @foreach ($info_publiks as $menu)
                            <li><a class="dropdown-item"
                                    href="{{ route('site.info.publik', $menu->slug) }}">{{ $menu->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link click-scroll dropdown-toggle" href="#" id="navbarLightDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>

                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-open"
                        aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="https://sipp.bppsdmsempaja.kaltimprov.go.id/">SIPP</a></li>
                        <li><a
                                class="dropdown-item"href="https://simpeltan.bppsdmsempaja.kaltimprov.go.id/">SIMPELTAN</a>
                        </li>
                        <li><a class="dropdown-item"href="https://wibeltan.bppsdmsempaja.kaltimprov.go.id/">WIBELTAN</a>
                        </li>
                        <li><a class="dropdown-item"href="https://sertifikat.bppsdmsempaja.kaltimprov.go.id/">SETKON</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->segment(1) == 'kontak' ? 'active' : '' }}"
                        href="{{ route('site.kontak') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
