@extends('site.layouts.app')

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Berita</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('site.beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('site.berita') }}">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $postingan->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section section-padding">
        <div class="container">
            <div class="row">

                {{-- <div class="col-lg-12">
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
                                        October 18, 2036
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
                                <p>This is a Bootstrap 5.2.2 CSS template for charity organization websites. You can
                                    feel free to use it. Please tell your friends about TemplateMo website. Thank
                                    you.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-8">
                    <h3 class="pb-2">
                        <a href="{{ route('site.berita.show', $postingan->slug) }}">
                            {{ $postingan->title }}
                        </a>
                    </h3>

                    <ul id="menu" style="padding-left: 0rem;">
                        <li>
                            <i class="bi-person custom-icon me-1"></i>
                            Admin |
                        </li>
                        <li>
                            <i class="bi-calendar4 custom-icon me-1"></i>
                            {{ $postingan->created_at->format('d, F Y') }} |
                        </li>
                        <li>
                            <i class="bi bi-bookmark"></i>
                            {{ $postingan->kategori->title }}
                        </li>
                    </ul>

                    <img src="{{ $postingan->thumbnail }}" class="img-fluid rounded" alt="">

                    <div class="pt-4" align="justify">
                        {!! $postingan->konten !!}
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
