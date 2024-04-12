@extends('site.layouts.app')

@section('content')
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets') }}/images/slide/volunteer-helping-with-donation-box.jpg"
                                    class="carousel-image img-fluid" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets') }}/images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg"
                                    class="carousel-image img-fluid" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('assets') }}/images/slide/medium-shot-people-collecting-donations.jpg"
                                    class="carousel-image img-fluid" alt="...">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="news-section section-padding" style="padding-top: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-5">
                    <h2>Berita Terbaru</h2>
                </div>

                <div class="col-lg-8">
                    @foreach ($lastPosts as $post)
                        <div class="news-block">
                            <div class="news-block-top">
                                <a href="news-detail.html">
                                    <img src="{{ asset('postingan/thumbnail/' . $post->thumbnail) }}"
                                        class="news-image img-fluid" alt="">
                                </a>

                                <div class="news-category-block">
                                    <a href="#" class="category-block-link">
                                        {{ $post->kategori->title }}
                                    </a>
                                </div>
                            </div>

                            <div class="news-block-info">
                                <div class="d-flex mt-2">
                                    <div class="news-block-date">
                                        <p>
                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                            {{ $post->created_at->format('d, F Y') }}
                                        </p>
                                    </div>

                                    <div class="news-block-author mx-5">
                                        <p>
                                            <i class="bi-person custom-icon me-1"></i>
                                            By Admin
                                        </p>
                                    </div>

                                    {{-- <div class="news-block-comment">
                                        <p>
                                            <i class="bi-chat-left custom-icon me-1"></i>
                                            32 Comments
                                        </p>
                                    </div> --}}
                                </div>

                                <div class="news-block-title mb-2">
                                    <h4>
                                        <a href="{{ route('site.berita.show', $post->slug) }}"
                                            class="news-block-title-link">
                                            {{ $post->title }} - {{ $post->slug }}
                                        </a>
                                    </h4>
                                </div>

                                <div class="news-block-body">
                                    <p>
                                        {{ str_word_count($post->konten) > 20 ? implode(' ', array_slice(explode(' ', $post->konten), 0, 20)) . '...' : $post->konten }}
                                        <a href="{{ route('site.berita.show', $post->slug) }}">Baca Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4 mx-auto">
                    <form class="custom-form search-form" action="#" method="post" role="form">
                        <h5 class="mt-5 mb-3">Cari Berita</h5>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                        <button type="submit" class="form-control">
                            <i class="bi-search"></i>
                        </button>
                    </form>

                    <h5 class="mt-5 mb-3">Berita Lainnya</h5>

                    @foreach ($recentPostingans as $recent)
                        <div class="news-block news-block-two-col d-flex mt-4">
                            <div class="news-block-two-col-image-wrap">
                                <a href="{{ route('site.berita.show', $recent->slug) }}">
                                    <img src="{{ asset('postingan/thumbnail/' . $recent->thumbnail) }}" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                            <div class="news-block-two-col-info">
                                <div class="news-block-title mb-2">
                                    <a href="{{ route('site.berita.show', $recent->slug) }}" class="news-block-title-link">
                                        {{ str_word_count($recent->title) > 4 ? implode(' ', array_slice(explode(' ', $recent->title), 0, 4)) . '...' : $recent->title }}
                                        - {{ $recent->id }}
                                    </a>
                                </div>

                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        {{ $recent->created_at->format('d, F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="category-block d-flex flex-column">
                        <h5 class="mb-3">Kategori Berita</h5>
                        @foreach ($kategories as $kategori)
                            <a href="#" class="category-block-link">
                                {{ $kategori->title }}
                                <span class="badge">{{ $kategori->postingans->count() }}</span>
                            </a>
                        @endforeach
                    </div>

                    <div class="tags-block">
                        <h5 class="mb-3">Facebook</h5>
                        <div class="fb-page" data-href="https://www.facebook.com/uptdbppsdmpprovkaltim" data-width="380"
                            data-hide-cover="false" data-show-facepile="false"></div>
                    </div>

                    <form class="custom-form subscribe-form" action="#" method="post" role="form">
                        <h5 class="mb-4">Newsletter Form</h5>

                        <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                            class="form-control" placeholder="Email Address" required>

                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control">Subscribe</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    {{-- LINK APLIKASI --}}
    <section class="testimonial-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5 text-uppercase">APLIKASI LAYANAN</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('assets') }}/images/icons/hands.png"
                                class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>SIPP</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('assets') }}/images/icons/scholarship.png"
                                class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>SIMPELTAN</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('assets') }}/images/icons/heart.png"
                                class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>SETKON</strong></p>
                        </a>
                    </div>
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
                    <img src="{{ asset('assets') }}/images/portrait-volunteer-who-organized-donations-charity.jpg"
                        class="about-image bg-light shadow-lg img-fluid" alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Tri Ida Kartini, SP., MP.</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala UPTD BPPSDMP</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('assets') }}/images/portrait-volunteer-who-organized-donations-charity.jpg"
                        class="about-image bg-light shadow-lg img-fluid" alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Abdul Rokhim, SE.</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Seksi Penyuluhan</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('assets') }}/images/portrait-volunteer-who-organized-donations-charity.jpg"
                        class="about-image bg-light shadow-lg img-fluid" alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Nanang Hidayat, S.Kom</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Sub. Bagian Tata Usaha</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('assets') }}/images/portrait-volunteer-who-organized-donations-charity.jpg"
                        class="about-image bg-light shadow-lg img-fluid" alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Anggia Chandra Wardani, SP</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Seksi SDM Pertanian</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
