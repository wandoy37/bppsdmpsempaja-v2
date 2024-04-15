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

    <section class="news-section section-padding" style="padding-bottom: 10px;">
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
                                            - {{ $recent->slug }}
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

    {{-- Postingan Terkait Kategori Postingan Saat ini --}}
    <section class="section-padding" style="padding-bottom: 50px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <hr>
                    <h2>Berita Terkait</h2>
                </div>

                @foreach ($relatedPosts as $related)
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block-wrap">
                            <a href="{{ route('site.berita.show', $related->slug) }}">
                                <img src="{{ $related->thumbnail }}" class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block">
                                <div class="custom-block-body">
                                    <ul id="menu" style="padding-left: 0rem;">
                                        <li>
                                            <i class="bi-person custom-icon me-1"></i>
                                            Admin |
                                        </li>
                                        <li>
                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                            {{ $related->created_at->format('d, F Y') }} |
                                        </li>
                                        <li>
                                            <i class="bi bi-bookmark"></i>
                                            {{ $related->kategori->title }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('site.berita.show', $related->slug) }}">
                                        <h5 class="mb-3">
                                            {{ str_word_count($related->title) > 4 ? implode(' ', array_slice(explode(' ', $related->title), 0, 4)) . '...' : $related->title }}
                                            - {{ $related->slug }}
                                        </h5>
                                    </a>

                                    {{-- <p>Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
