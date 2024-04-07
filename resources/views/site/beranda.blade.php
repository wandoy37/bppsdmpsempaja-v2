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

    <section class="news-section section-padding" id="section_5" style="padding-top: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 mb-5">
                    <h2>Latest News</h2>
                </div>

                <div class="col-lg-7 col-12">
                    <div class="news-block">
                        <div class="news-block-top">
                            <a href="news-detail.html">
                                <img src="{{ asset('assets') }}/images/news/medium-shot-volunteers-with-clothing-donations.jpg"
                                    class="news-image img-fluid" alt="">
                            </a>

                            <div class="news-category-block">
                                <a href="#" class="category-block-link">
                                    Lifestyle,
                                </a>

                                <a href="#" class="category-block-link">
                                    Clothing Donation
                                </a>
                            </div>
                        </div>

                        <div class="news-block-info">
                            <div class="d-flex mt-2">
                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        October 12, 2036
                                    </p>
                                </div>

                                <div class="news-block-author mx-5">
                                    <p>
                                        <i class="bi-person custom-icon me-1"></i>
                                        By Admin
                                    </p>
                                </div>

                                <div class="news-block-comment">
                                    <p>
                                        <i class="bi-chat-left custom-icon me-1"></i>
                                        32 Comments
                                    </p>
                                </div>
                            </div>

                            <div class="news-block-title mb-2">
                                <h4><a href="news-detail.html" class="news-block-title-link">Clothing donation to
                                        urban area</a></h4>
                            </div>

                            <div class="news-block-body">
                                <p>Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito
                                    Professional charity theme based on Bootstrap</p>
                            </div>
                        </div>
                    </div>

                    <div class="news-block mt-3">
                        <div class="news-block-top">
                            <a href="news-detail.html">
                                <img src="{{ asset('assets') }}/images/news/medium-shot-people-collecting-foodstuff.jpg"
                                    class="news-image img-fluid" alt="">
                            </a>

                            <div class="news-category-block">
                                <a href="#" class="category-block-link">
                                    Food,
                                </a>

                                <a href="#" class="category-block-link">
                                    Donation,
                                </a>

                                <a href="#" class="category-block-link">
                                    Caring
                                </a>
                            </div>
                        </div>

                        <div class="news-block-info">
                            <div class="d-flex mt-2">
                                <div class="news-block-date">
                                    <p>
                                        <i class="bi-calendar4 custom-icon me-1"></i>
                                        October 20, 2036
                                    </p>
                                </div>

                                <div class="news-block-author mx-5">
                                    <p>
                                        <i class="bi-person custom-icon me-1"></i>
                                        By Admin
                                    </p>
                                </div>

                                <div class="news-block-comment">
                                    <p>
                                        <i class="bi-chat-left custom-icon me-1"></i>
                                        35 Comments
                                    </p>
                                </div>
                            </div>

                            <div class="news-block-title mb-2">
                                <h4><a href="news-detail.html" class="news-block-title-link">Food donation
                                        area</a>
                                </h4>
                            </div>

                            <div class="news-block-body">
                                <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus
                                    elementum, tempor risus vel, condimentum orci</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mx-auto">
                    <form class="custom-form search-form" action="#" method="post" role="form">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">

                        <button type="submit" class="form-control">
                            <i class="bi-search"></i>
                        </button>
                    </form>

                    <h5 class="mt-5 mb-3">Recent news</h5>

                    <div class="news-block news-block-two-col d-flex mt-4">
                        <div class="news-block-two-col-image-wrap">
                            <a href="news-detail.html">
                                <img src="{{ asset('assets') }}/images/news/africa-humanitarian-aid-doctor.jpg"
                                    class="news-image img-fluid" alt="">
                            </a>
                        </div>

                        <div class="news-block-two-col-info">
                            <div class="news-block-title mb-2">
                                <h6><a href="news-detail.html" class="news-block-title-link">Food donation
                                        area</a>
                                </h6>
                            </div>

                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    October 16, 2036
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="news-block news-block-two-col d-flex mt-4">
                        <div class="news-block-two-col-image-wrap">
                            <a href="news-detail.html">
                                <img src="{{ asset('assets') }}/images/news/close-up-happy-people-working-together.jpg"
                                    class="news-image img-fluid" alt="">
                            </a>
                        </div>

                        <div class="news-block-two-col-info">
                            <div class="news-block-title mb-2">
                                <h6><a href="news-detail.html" class="news-block-title-link">Volunteering
                                        Clean</a>
                                </h6>
                            </div>

                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    October 24, 2036
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="category-block d-flex flex-column">
                        <h5 class="mb-3">Categories</h5>

                        <a href="#" class="category-block-link">
                            Drinking water
                            <span class="badge">20</span>
                        </a>

                        <a href="#" class="category-block-link">
                            Food Donation
                            <span class="badge">30</span>
                        </a>

                        <a href="#" class="category-block-link">
                            Children Education
                            <span class="badge">10</span>
                        </a>

                        <a href="#" class="category-block-link">
                            Poverty Development
                            <span class="badge">15</span>
                        </a>

                        <a href="#" class="category-block-link">
                            Clothing Donation
                            <span class="badge">20</span>
                        </a>
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
                            <img src="{{ asset('assets') }}/images/icons/hands.png" class="featured-block-image img-fluid"
                                alt="">

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
                            <img src="{{ asset('assets') }}/images/icons/heart.png" class="featured-block-image img-fluid"
                                alt="">

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
