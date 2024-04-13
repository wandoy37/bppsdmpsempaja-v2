@extends('site.layouts.app')

@section('title')
    Kategori {{ $kategori->title }}
@endsection

@section('content')
    <section class="breadcrumb-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pt-2 breadcrumb-title">Kategori Berita</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('site.beranda') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kategori->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="data-wrapper">
                        @include('site.berita.data')
                    </div>

                    <div class="text-center">
                        <button class="custom-btn custom-border-btn btn inactive load-more-data"><i
                                class="fa fa-refresh"></i> Tampilkan Lebih Banyak Berita...</button>
                    </div>
                    <div class="auto-load text-center" style="display: none;">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                            enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                    dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
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
@endsection

@push('scripts')
    <script>
        var ENDPOINT = "{{ route('site.kategori.berita.index', $kategori->slug) }}";
        var page = 1;

        $(".load-more-data").click(function() {
            page++;
            infinteLoadMore(page);
        });

        /*------------------------------------------
        --------------------------------------------
        call infinteLoadMore()
        --------------------------------------------
        --------------------------------------------*/
        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    if (response.html == '') {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>
@endpush
