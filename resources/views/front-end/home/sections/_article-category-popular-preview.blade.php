<div class="text-center mb-4">
    <h3 class="fw-bold">{{ $sectionArticleCategoryPopularPreview->title ?? '-' }}</h3>
    <p class="mt-4">
        {{ $sectionArticleCategoryPopularPreview->subtitle ?? null }}
    </p>
    <p class="mt-4">
        {{ $sectionArticleCategoryPopularPreview->content ?? null }}
    </p>
    {{-- @if ($sectionArticleCategoryPopularPreview->image)
                    <div class="text-center">
                        <img src="{{ $sectionArticleCategoryPopularPreview->image_url }}" class="card-img-top rounded-4"
                            style="height: 235px; object-fit: cover">
                    </div>
                @endif --}}
</div>

<div class="swiper popularArticleCategorySwiper">
    <div class="swiper-wrapper">
        {{-- <div class="row row-cols-1 row-cols-md-4 justify-content-center g-4 mt-0"> --}}
        @foreach ($articleCategoryPopular as $articleCategoryPopuler)
            <div class="swiper-slide">
                <div class="card h-100 border-0 overflow-hidden rounded-4">
                    <img src="{{ $articleCategoryPopuler->image_url }}" class="card-img-top bg-image bg-primary"
                        style="height: 235px; object-fit: cover; filter: brightness(30%); transform: scale(1.08);">

                    <div class="card-img-overlay d-flex justify-content-center align-items-center">
                        <a href="{{ url('articles?tab=' . $articleCategoryPopuler->article_category_id) }}"
                            class="card-title fs-3 text-light text-center text-decoration-none fw-bold">
                            {{ $articleCategoryPopuler->category_name ?? '-' }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- </div> --}}
    </div>

    <div class="swiper-button-prev bg-light rounded-circle p-2"></div>
    <div class="swiper-button-next bg-light rounded-circle p-2"></div>
</div>


@php
    $totalPopularArticleCategory = $articleCategoryPopular->count();
@endphp

@push('scripts')
    <!-- Initialize Swiper -->
    <script>
        new Swiper('.popularArticleCategorySwiper', {
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
                    slidesPerView: Math.min(1, {{ $totalPopularArticleCategory ?? 0 }}),
                },
                576: {
                    slidesPerView: Math.min(1, {{ $totalPopularArticleCategory ?? 0 }}),
                },
                768: {
                    slidesPerView: Math.min(3, {{ $totalPopularArticleCategory ?? 0 }}),
                },
                1200: {
                    slidesPerView: Math.min(3, {{ $totalPopularArticleCategory ?? 0 }}),
                }
            }
        });
    </script>
@endpush
