@extends('layouts.front-end.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
@endpush

@section('content')
    @php
        $productPath = $product?->slug ?: 'products';
        $articlePath = $article?->slug ?: 'articles';
    @endphp

    <section class="hero-section" aria-label="Pesan utama">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            @if ($carouselSlides->count() > 1)
                <div class="carousel-indicators">
                    @foreach ($carouselSlides as $key => $slide)
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
            @endif

            <div class="carousel-inner">
                @forelse ($carouselSlides as $slide)
                    <div class="carousel-item hero-slide {{ $loop->first ? 'active' : '' }}">
                        <div class="hero-slide__glow"></div>
                        @if ($slide->image_url)
                            <img src="{{ $slide->image_url }}" class="hero-slide__image" alt="{{ $slide->title ?: 'Company profile' }}"
                                loading="{{ $loop->first ? 'eager' : 'lazy' }}" onerror="this.remove()">
                        @endif
                        <div class="hero-slide__content">
                            <span class="eyebrow eyebrow--light"><i class="bi bi-stars me-2"></i>Company profile</span>
                            <h1>{{ $slide->title ?: ($companySetting->name ?: 'Membangun solusi yang berdampak') }}</h1>
                            <p>{{ $slide->subtitle ?: 'Menghadirkan produk, layanan, dan informasi terbaik untuk membantu Anda tumbuh lebih jauh.' }}</p>
                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <a href="{{ url('products') }}" class="btn btn-light btn-lg px-4">Jelajahi Produk <i class="bi bi-arrow-up-right ms-2"></i></a>
                                <a href="{{ url('about') }}" class="btn btn-outline-light btn-lg px-4">Tentang Kami</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item hero-slide active">
                        <div class="hero-slide__glow"></div>
                        <div class="hero-slide__content">
                            <span class="eyebrow eyebrow--light"><i class="bi bi-stars me-2"></i>Company profile</span>
                            <h1>{{ $companySetting->name ?: 'Membangun solusi yang berdampak' }}</h1>
                            <p>Menghadirkan produk, layanan, dan informasi terbaik untuk membantu Anda tumbuh lebih jauh.</p>
                            <div class="d-flex flex-wrap gap-3 mt-4">
                                <a href="{{ url('products') }}" class="btn btn-light btn-lg px-4">Jelajahi Produk <i class="bi bi-arrow-up-right ms-2"></i></a>
                                <a href="{{ url('about') }}" class="btn btn-outline-light btn-lg px-4">Tentang Kami</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($carouselSlides->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Sebelumnya">
                    <span class="hero-control"><i class="bi bi-arrow-left"></i></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Berikutnya">
                    <span class="hero-control"><i class="bi bi-arrow-right"></i></span>
                </button>
            @endif
        </div>
    </section>

    @if ($sectionAboutPreview?->is_active == 1)
        <section id="about" class="content-section about-section">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="eyebrow">Tentang kami</span>
                    <h2 class="section-title">{{ $sectionAboutPreview->title ?: 'Lebih dekat dengan kami' }}</h2>
                    <p class="section-lead">{{ $sectionAboutPreview->subtitle ?: 'Kami hadir untuk memberikan solusi yang relevan, sederhana, dan berdampak.' }}</p>
                    <p class="section-copy">{{ $sectionAboutPreview->content ?: 'Kenali lebih jauh perjalanan, nilai, dan komitmen kami dalam menghadirkan pengalaman terbaik untuk pelanggan.' }}</p>
                    <a href="{{ url($sectionAboutPreview->button_link ?: 'about') }}" class="btn btn-primary btn-lg px-4">
                        {{ $sectionAboutPreview->button_text ?: 'Selengkapnya' }} <i class="bi bi-arrow-up-right ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="about-visual">
                        @if ($sectionAboutPreview->image_url)
                            <img src="{{ $sectionAboutPreview->image_url }}" alt="Tentang {{ $companySetting->name ?: 'kami' }}" onerror="this.remove()">
                        @endif
                        <div class="about-visual__content">
                            <span class="about-visual__icon"><i class="bi bi-lightbulb"></i></span>
                            <strong>{{ $companySetting->name ?: 'HFD Company' }}</strong>
                            <span>Bergerak bersama menuju masa depan yang lebih baik.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($sectionProductPreview?->is_active == 1)
        <section id="products" class="content-section section-muted">
            <div class="section-heading text-center">
                <span class="eyebrow">Yang kami tawarkan</span>
                <h2 class="section-title">{{ $sectionProductPreview->title ?: 'Produk pilihan kami' }}</h2>
                <p class="section-lead mx-auto">{{ $sectionProductPreview->subtitle ?: 'Temukan produk yang dirancang untuk menjawab kebutuhan Anda.' }}</p>
            </div>

            @if ($productCategoriesPreview->isNotEmpty())
                <ul class="nav nav-pills content-tabs justify-content-center mb-4" id="productsTab" role="tablist">
                    @foreach ($productCategoriesPreview as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill"
                                data-bs-target="#products-{{ $category->id }}" type="button" role="tab"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($productCategoriesPreview as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="products-{{ $category->id }}" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                                @forelse ($productsPreview[$category->id] ?? [] as $productPreview)
                                    <div class="col">
                                        <article class="content-card h-100">
                                            <div class="content-card__media">
                                                @if ($productPreview->image_url)
                                                    <img src="{{ $productPreview->image_url }}" alt="{{ $productPreview->name }}" onerror="this.remove()">
                                                @endif
                                                <span class="content-card__placeholder"><i class="bi bi-box-seam"></i></span>
                                            </div>
                                            <div class="content-card__body">
                                                <span class="card-kicker">{{ $category->name }}</span>
                                                <h3>{{ $productPreview->name }}</h3>
                                                <a href="{{ url($productPath . '/' . $productPreview->category_slug . '/' . $productPreview->slug) }}" class="stretched-link" aria-label="Lihat {{ $productPreview->name }}"></a>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="empty-state">
                                            <span class="empty-state__icon"><i class="bi bi-box2-heart"></i></span>
                                            <h3>Produk sedang disiapkan</h3>
                                            <p>Koleksi produk untuk kategori {{ $category->name }} akan segera tersedia.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5">
                <a href="{{ url($sectionProductPreview->button_link ?: 'products') }}" class="btn btn-primary px-4">
                    {{ $sectionProductPreview->button_text ?: 'Lihat semua produk' }} <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </section>
    @endif

    @if ($sectionArticlePreview?->is_active == 1)
        <section id="articles" class="content-section">
            <div class="section-heading text-center">
                <span class="eyebrow">Wawasan terbaru</span>
                <h2 class="section-title">{{ $sectionArticlePreview->title ?: 'Artikel & informasi' }}</h2>
                <p class="section-lead mx-auto">{{ $sectionArticlePreview->subtitle ?: 'Baca cerita, tips, dan informasi terbaru dari kami.' }}</p>
            </div>

            @if ($articleCategoriesPreview->isNotEmpty())
                <ul class="nav nav-pills content-tabs justify-content-center mb-4" id="articlesTab" role="tablist">
                    @foreach ($articleCategoriesPreview as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill"
                                data-bs-target="#articles-{{ $category->id }}" type="button" role="tab"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($articleCategoriesPreview as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="articles-{{ $category->id }}" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @forelse ($articlesPreview[$category->id] ?? [] as $articlePreview)
                                    <div class="col">
                                        <article class="content-card content-card--article h-100">
                                            <div class="content-card__media">
                                                @if ($articlePreview->image_url)
                                                    <img src="{{ $articlePreview->image_url }}" alt="{{ $articlePreview->title }}" onerror="this.remove()">
                                                @endif
                                                <span class="content-card__placeholder"><i class="bi bi-journal-text"></i></span>
                                            </div>
                                            <div class="content-card__body">
                                                <div class="d-flex justify-content-between gap-2 mb-2">
                                                    <span class="card-kicker">{{ $category->name }}</span>
                                                    <small class="card-meta">{{ $articlePreview->published_at?->diffForHumans() ?: 'Terbaru' }}</small>
                                                </div>
                                                <h3>{{ $articlePreview->title }}</h3>
                                                <p>{{ Str::limit($articlePreview->content, 100) }}</p>
                                                <a href="{{ url($articlePath . '/' . $articlePreview->category_slug . '/' . $articlePreview->slug) }}" class="card-link">Baca selengkapnya <i class="bi bi-arrow-up-right"></i></a>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="empty-state">
                                            <span class="empty-state__icon"><i class="bi bi-journal-richtext"></i></span>
                                            <h3>Artikel segera hadir</h3>
                                            <p>Ikuti terus informasi terbaru dari {{ $companySetting->name ?: 'kami' }}.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5">
                <a href="{{ url($sectionArticlePreview->button_link ?: 'articles') }}" class="btn btn-outline-primary px-4">
                    {{ $sectionArticlePreview->button_text ?: 'Baca semua artikel' }} <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </section>
    @endif

    <section class="cta-section content-section">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="eyebrow eyebrow--light">Mari berkolaborasi</span>
                <h2>Siap menemukan peluang berikutnya?</h2>
                <p>Hubungi kami dan mulai percakapan untuk kebutuhan Anda.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                @if ($companySetting->email)
                    <a href="mailto:{{ $companySetting->email }}" class="btn btn-light btn-lg px-4">Hubungi kami <i class="bi bi-envelope ms-2"></i></a>
                @else
                    <a href="{{ url('about') }}" class="btn btn-light btn-lg px-4">Kenali kami <i class="bi bi-arrow-right ms-2"></i></a>
                @endif
            </div>
        </div>
    </section>
@endsection
