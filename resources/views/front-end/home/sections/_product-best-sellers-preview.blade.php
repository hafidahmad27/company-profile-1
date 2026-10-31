<div class="text-center mb-4">
    <h3 class="fw-bold">
        {{ $sectionProductBestSellerPreview->title ?? '-' }}
        {{-- ({{ count($productBestSellers) }}) --}}
    </h3>
    <div class="d-inline-block border-bottom border-3 border-primary" style="width: 80px;"></div>
    <p class="mt-4">
        {{ $sectionProductBestSellerPreview->subtitle ?? null }}
    </p>
    <p class="mt-4">
        {{ $sectionProductBestSellerPreview->content ?? null }}
    </p>
    {{-- @if ($sectionProductBestSellerPreview->image)
                    <div class="text-center">
                        <img src="{{ $sectionProductBestSellerPreview->image_url }}" class="card-img-top rounded-4"
                            style="height: 235px; object-fit: cover">
                    </div>
                @endif --}}
</div>

<div class="swiper bestSellerProductSwiper">
    <div class="swiper-wrapper">
        {{-- <div class="row row-cols-1 row-cols-md-4 justify-content-center g-4 mt-0"> --}}
        @foreach ($productBestSellers as $productBestSeller)
            <div class="swiper-slide">
                <div class="card h-100 border-0">
                    <img src="{{ $productBestSeller->image_url }}" class="card-img-top rounded-4"
                        style="height: 235px; object-fit: cover">
                    {{-- <div class="card-body"> --}}
                    <div class="d-flex mt-3 mb-3">
                        <div class="me-auto">
                            <span class="badge text-bg-secondary">{{ $productBestSeller->category_name ?? '-' }}</span>
                        </div>
                        {{-- <small class="text-body-secondary">

                                    </small> --}}
                    </div>
                    <h5 class="card-title text-center">
                        <a class="text-decoration-none"
                            href="{{ route('products.show', ['category_slug' => $productBestSeller->category_slug, 'slug' => $productBestSeller->slug]) }}">{{ $productBestSeller->name ?? '-' }}
                        </a>
                    </h5>
                    {{-- <div class="text-end">
                            <span class="badge text-bg-info">Rp
                                {{ $productBestSeller->price_formatted }}</span>
                        </div> --}}
                    {{-- <p class="card-text mt-2" style="text-align: justify">
                                            {{ $productBestSeller->description ?? '-' }}
                                        </p> --}}
                    {{-- </div> --}}
                    {{-- <div class="card-footer text-end">
                                        <small class="text-body-secondary">
                                            
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
    $totalBestSellerProduct = count($productBestSellers);
@endphp

@push('scripts')
    <!-- Initialize Swiper -->
    <script>
        new Swiper('.bestSellerProductSwiper', {
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
                    slidesPerView: Math.min(1, {{ $totalBestSellerProduct ?? 0 }}),
                },
                576: {
                    slidesPerView: Math.min(2, {{ $totalBestSellerProduct ?? 0 }}),
                },
                768: {
                    slidesPerView: Math.min(3, {{ $totalBestSellerProduct ?? 0 }}),
                },
                1200: {
                    slidesPerView: Math.min(4, {{ $totalBestSellerProduct ?? 0 }}),
                }
            }
        });
    </script>
@endpush
