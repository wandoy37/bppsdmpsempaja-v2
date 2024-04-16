@if (count($postingans) > 0)
    @foreach ($postingans as $post)
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
                        <a href="{{ route('site.berita.show', $post->slug) }}" class="news-block-title-link">
                            {{ $post->title }}
                        </a>
                    </h4>
                </div>

                <div class="news-block-body">
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
