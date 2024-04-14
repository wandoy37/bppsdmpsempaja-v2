@if (count($postingans) > 0)
    @foreach ($postingans as $post)
        <div class="news-block mb-4">
            <div class="news-block-top">
                <a href="{{ route('site.berita.show', $post->slug) }}">
                    <img src="{{ $post->thumbnail }}" class="news-image img-fluid" alt="">
                </a>
                <div class="news-category-block">
                    <a href="{{ route('site.kategori.berita.index', $post->kategori->slug) }}"
                        class="category-block-link">
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
                </div>

                <div class="news-block-title mb-2">
                    <h4>
                        <a href="{{ route('site.berita.show', $post->slug) }}" class="news-block-title-link">
                            {{ $post->title }} - {{ $post->slug }}
                        </a>
                    </h4>
                </div>

                <div class="news-block-body">
                    {{-- <p>
                        {!! str_word_count($post->konten) > 20
                            ? implode(' ', array_slice(explode(' ', $post->konten), 0, 20)) . '...'
                            : $post->konten !!}

                    </p> --}}
                    <a href="{{ route('site.berita.show', $post->slug) }}">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h4>
        No results found.
    </h4>
@endif
