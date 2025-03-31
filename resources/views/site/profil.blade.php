@extends('site.layouts.app')

@section('title')
    Profil
@endsection

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">PROFIL</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('site.beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <img src="{{ asset('img/team_uptd_bppsdmp.jpg') }}" class="custom-text-box-image img-fluid pb-4"
                        alt="">
                </div>

                <div class="col-lg-12">
                    <div class="custom-text-box">
                        <h2 class="mb-1">UPTD</h2>

                        <h5 class="mb-3">Balai Penyuluhan dan Pengembangan Sumber Daya Manusia Pertanian</h5>

                        <p class="mb-0">
                            UPTD BPPSDMP Sempaja Samarinda Provinsi Kalimantan Timur kami merupakan organisasi pemerintahan
                            yang
                            bergerak pada bidang kegiatan teknis operasional dan pelatihan pertanian.
                            <br>
                            <br>
                            Dibawah naungan Dinas Pangan Tanaman Pangan dan Hortikultura, Demi menunjang sektor pertanian
                            hortikultura UPTD BPPSDMP bergerak sebagai unit kerja yang menjalankan kegiatan-kegiatan teknis
                            seputar pertanian, dan pelatihan non-teknis (akademi pertanian) maupun teknis.
                        </p>
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Visi</h5>

                                <p>Sed leo nisl, posuere at molestie ac, suscipit auctor quis metus</p>

                                <ul class="custom-list mt-2">
                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Charity Theme
                                    </li>

                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Semantic HTML
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Misi</h5>

                                <p>Sed leo nisl, posuere at molestie ac, suscipit auctor quis metus</p>

                                <ul class="custom-list mt-2">
                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Charity Theme
                                    </li>

                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Semantic HTML
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>

    {{-- PEMANGKU JABATAN --}}
    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5 text-uppercase">PEMANGKU JABATAN</h2>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('img/kepala-balai.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Tri Ida Kartini, SP., MP.</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala UPTD BPPSDMP</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('img/kabag-tata-usaha.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Nanang Hidayat, S.Kom</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Plt. Kepala Seksi Penyuluhan</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('img/kabag-tata-usaha.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Nanang Hidayat, S.Kom</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Sub. Bagian Tata Usaha</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('img/kasi-pengembangan.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Anggia Chandra Wardani, SP</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Seksi SDM Pertanian</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
