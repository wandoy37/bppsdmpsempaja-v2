@extends('site.layouts.app')

@section('title')
    Berita
@endsection

@section('content')
    {{-- Modal --}}
    <div class="modal fade modal-lg" id="modalSKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-6 text-center" id="exampleModalLabel">Survei Kepuasan Masyarakat UPTD BPPSDMP
                        Kalimantan Timur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('img/heading_skm.png') }}" class="img-fluid" alt="">
                    <a href="https://forms.gle/mwFu2TbKG2ihxDkW6" class="btn btn-success btn-lg">
                        <i class="fas fa-pen"></i>
                        Isi Survey Disini
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/carousel/carousel-theme-1.png') }}" class="carousel-image img-fluid"
                                    alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('img/carousel/carousel-theme-2.png') }}" class="carousel-image img-fluid"
                                    alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('img/carousel/carousel-theme-3.png') }}" class="carousel-image img-fluid"
                                    alt="...">
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
                    @if (count($lastPosts) > 0)
                        @foreach ($lastPosts as $post)
                            <div class="news-block mb-4">
                                <div class="news-block-top">
                                    <a href="{{ route('site.berita.show', $post->slug) }}">
                                        <img src="{{ $post->thumbnail }}" class="news-image img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="news-block-info">
                                    <div class="d-flex mt-2">
                                        <ul id="menu" style="padding-left: 0rem;">
                                            <li>
                                                <i class="bi-person custom-icon me-1"></i>
                                                Admin |
                                            </li>
                                            <li>
                                                <i class="bi-calendar4 custom-icon me-1"></i>
                                                {{ $post->created_at->format('d, F Y') }} |
                                            </li>
                                            <li>
                                                <i class="bi bi-bookmark"></i>
                                                {{ $post->kategori->title }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="news-block-title mb-2">
                                        <h4>
                                            <a href="{{ route('site.berita.show', $post->slug) }}"
                                                class="news-block-title-link">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                    </div>

                                    <div class="news-block-body">
                                        <p>
                                            <a href="{{ route('site.berita.show', $post->slug) }}">Baca Selengkapnya</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h4>
                            No results found.
                        </h4>
                    @endif
                </div>

                <div class="col-lg-4 mx-auto">
                    <form class="custom-form search-form" action="{{ route('site.berita') }}" method="GET">
                        <input class="form-control" type="text" placeholder="Search" name="search"
                            value="{{ old('search') }}">

                        <button type="submit" class="form-control">
                            <i class="bi-search"></i>
                        </button>
                    </form>

                    <h5 class="mt-5 mb-3">Berita Lainnya</h5>

                    @if (count($recentPostingans) > 0)
                        @foreach ($recentPostingans as $recent)
                            <div class="news-block news-block-two-col d-flex mt-4">
                                <div class="news-block-two-col-image-wrap">
                                    <a href="{{ route('site.berita.show', $recent->slug) }}">
                                        <img src="{{ $recent->thumbnail }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="news-block-two-col-info">
                                    <div class="news-block-title mb-2">
                                        <a href="{{ route('site.berita.show', $recent->slug) }}"
                                            class="news-block-title-link">
                                            {{ str_word_count($recent->title) > 4 ? implode(' ', array_slice(explode(' ', $recent->title), 0, 4)) . '...' : $recent->title }}
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
                    @else
                        <p>No results found.</p>
                    @endif


                    <div class="category-block d-flex flex-column">
                        <h5 class="mb-3">Kategori Berita</h5>
                        @foreach ($kategories as $kategori)
                            <a href="{{ route('site.kategori.berita.index', $kategori->slug) }}"
                                class="category-block-link">
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
                    <h2 class="mb-5 text-uppercase">APLIKASI TERKAIT</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('img/aplikasi/sipp.png') }}" class="featured-block-image img-fluid"
                                style="border-radius: 15px;" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('img/aplikasi/simpeltan.png') }}" class="featured-block-image img-fluid"
                                style="border-radius: 15px;" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="donate.html" class="d-block">
                            <img src="{{ asset('img/aplikasi/setkon.png') }}" class="featured-block-image img-fluid"
                                style="border-radius: 15px;" alt="">
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
                    <img src="{{ asset('img/kepala-balai.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Tri Ida Kartini, SP., MP.</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala UPTD BPPSDMP</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <img src="{{ asset('img/kasi-penyuluhan.png') }}" class="about-image bg-light shadow-lg img-fluid"
                        alt="">
                    <div class="text-center">
                        <h6 class="mb-0 pt-4">Abdul Rokhim, SE.</h6>
                        <p class="text-muted mb-lg-4 mb-md-4">Kepala Seksi Penyuluhan</p>
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
@push('scripts')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modalSKM').modal('show');
        });
    </script>
@endpush
