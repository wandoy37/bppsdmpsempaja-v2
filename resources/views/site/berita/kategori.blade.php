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
