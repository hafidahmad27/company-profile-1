<div class="text-center mb-4">
    <h3 class="fw-bold">{{ $sectionArticlePopularPreview->title ?? '-' }}</h3>
    <p class="mt-4">
        {{ $sectionArticlePopularPreview->subtitle ?? null }}
    </p>
    <p class="mt-4">
        {{ $sectionArticlePopularPreview->content ?? null }}
    </p>
    {{-- @if ($sectionArticlePopularPreview->image)
                    <div class="text-center">
                        <img src="{{ $sectionArticlePopularPreview->image_url }}" class="card-img-top rounded-4"
                            style="height: 235px; object-fit: cover">
                    </div>
                @endif --}}
</div>

<div class="swiper popularArticleSwiper">
    <div class="swiper-wrapper">
        {{-- <div class="row row-cols-1 row-cols-md-4 justify-content-center g-4 mt-0"> --}}
        @foreach ($articlePopular as $articlePopular)
            <div class="swiper-slide">
                <div class="card h-100 border-0">
                    <img src="{{ $articlePopular->image_url }}" class="card-img-top rounded-4"
                        style="height: 235px; object-fit: cover">
                    {{-- <div class="card-body"> --}}
                    <div class="d-flex mt-3 mb-3">
                        <div class="me-auto">
                            <span class="badge text-bg-secondary">{{ $articlePopular->category_name ?? '-' }}</span>
                        </div>
                        {{-- <small class="text-body-secondary">

                                    </small> --}}
                    </div>
                    <h5 class="card-title text-center">
                        <a class="text-decoration-none"
                            href="{{ url($article->slug . '/' . $articlePopular->category_slug . '/' . $articlePopular->slug) }}">{{ $articlePopular->title ?? '-' }}
                        </a>
                    </h5>
                    <p class="card-text" style="text-align: justify">
                        {{-- {{ Str::limit($articlePopular->content, 150, '...') ?? '-' }}
                        @if ($articlePopular->content && Str::length($articlePopular->content) > 150)
                            <a class="text-decoration-none"
                                href="{{ url($article->slug . '/' . $articlePopular->category_slug . '/' . $articlePopular->slug) }}">Selengkapnya</a>
                        @endif
                        <br> --}}
                        <span class="text-body-secondary float-end" style="font-size: 8pt"><i
                                class="bi bi-eye-fill"></i>
                            {{ $articlePopular->views ?? '-' }}</span>
                    </p>
                    {{-- </div> --}}
                    {{-- <div class="card-footer text-end">
                        <small class="text-body-secondary">
                            <i class="bi bi-eye-fill"></i> {{ $articlePopular->views ?? '-' }}
                        </small>
                    </div> --}}
                </div>
            </div>
        @endforeach
        {{-- </div> --}}
    </div>

    <div class="swiper-button-prev bg-light rounded-circle p-2"></div>
    <div class="swiper-button-next bg-light rounded-circle p-2"></div>
</div>


@php
    $totalPopularArticle = $articlePopular->count();
@endphp

@push('scripts')
    <!-- Initialize Swiper -->
    <script>
        new Swiper('.popularArticleSwiper', {
            spaceBetween: 24,
            // loop: true,

            autoplay: {
                delay: 3000,
                pauseOnMouseEnter: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: Math.min(1, {{ $totalPopularArticle ?? 0 }}),
                },
                576: {
                    slidesPerView: Math.min(1, {{ $totalPopularArticle ?? 0 }}),
                },
                768: {
                    slidesPerView: Math.min(3, {{ $totalPopularArticle ?? 0 }}),
                },
                1200: {
                    slidesPerView: Math.min(3, {{ $totalPopularArticle ?? 0 }}),
                }
            }
        });
    </script>
@endpush
