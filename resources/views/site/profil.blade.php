@extends('site.layouts.app')

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

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <img src="{{ asset('assets') }}/images/group-people-volunteering-foodbank-poor-people.jpg"
                        class="custom-text-box-image img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12">
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

                    <div class="row">
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
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
