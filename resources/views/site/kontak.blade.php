@extends('site.layouts.app')

@section('title')
    Kontak
@endsection

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">KONTAK</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('site.beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                    <div class="contact-info-wrap">
                        <h2>Koordinator PPID</h2>

                        <div class="contact-image-wrap d-flex flex-wrap">
                            <img src="{{ asset('img/kabag-tata-usaha.png') }}" class="img-fluid avatar-image"
                                alt="">

                            <div class="d-flex flex-column justify-content-center ms-3">
                                <p class="mb-0">Nanang Hidayat</p>
                                <p class="mb-0"><strong>Kasubbag Umum</strong></p>
                            </div>
                        </div>

                        <div class="contact-info">
                            <h5 class="mb-3">Informasi Kontak</h5>

                            <p class="d-flex mb-2">
                                <i class="bi-geo-alt me-2"></i>
                                Jl. Thoyib Hadiwijaya No.36, Sempaja Selatan, Samarinda - Kalimantan Timur
                            </p>

                            <p class="d-flex mb-2">
                                <i class="bi-telephone me-2"></i>

                                <a href="tel: 08125485983">
                                    0812-5485-983
                                </a>
                            </p>

                            <p class="d-flex">
                                <i class="bi-envelope me-2"></i>

                                <a href="mailto:uptdbppsdmp.kaltimprov@gmail.com">
                                    uptdbppsdmp.kaltimprov@gmail.com
                                </a>
                            </p>

                            <a href="https://api.whatsapp.com/send/?phone=6282148722747" target="_blank"
                                class="custom-btn btn mt-3">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp Chat
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mx-auto">
                    <form class="custom-form contact-form" action="#" method="post" role="form">
                        <h2>Kontak Kami</h2>

                        <p class="mb-4">Hubungi kami melalu kanal website, atau melalui email:
                            <a href="mailto:uptdbppsdmp.kaltimprov@gmail.com">uptdbppsdmp.kaltimprov@gmail.com</a>
                        </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama"
                                    required>
                            </div>
                        </div>

                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                            placeholder="Jackdoe@gmail.com" required>

                        <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you?"></textarea>

                        <button type="submit" class="form-control">Send Message</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
