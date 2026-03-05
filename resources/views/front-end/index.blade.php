@extends('front-end.layouts.app')

@section('content')
    <section id="carousel" class="mt-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($carouselSlides as $key => $slide)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current=""
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($carouselSlides as $key => $slide)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ Str::startsWith($slide->image, ['http://', 'https://']) ? $slide->image : asset('storage/' . $slide->image) }}"
                            class="d-block w-100" alt="Gambar">
                        {{-- <div class="carousel-caption d-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{{ $slide->subtitle }}</p>
                        </div> --}}
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <section id="about" style="margin-top: 8%">
        <div class="text-center mb-4">
            <h3>{{ $about->title ?? '-' }}</h3>
            <p class="mt-4">
                {{ $aboutPreview->subtitle ?? null }}
            </p>
        </div>
        <p class="mt-4" style="text-align: justify">
            {{ $about->content ?? '-' }}
        </p>
    </section>


    <section id="products" style="margin-top: 8%">
        <div class="text-center mb-4">
            <h3>{{ $sectionProduct->title ?? '-' }}</h3>
            <p class="mt-4">
                {{ $sectionProductPreview->subtitle ?? null }}
            </p>
        </div>

        <ul class="nav nav-tabs justify-content-center" id="productsTab" role="tablist">
            @foreach ($productCategoriesPreview as $productCategoryPreview)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                        data-bs-target="#products-{{ $productCategoryPreview->id }}" type="button" role="tab"
                        aria-controls="" aria-selected="true">
                        {{ $productCategoryPreview->name ?? '-' }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="productsTabContent">
            @foreach ($productCategoriesPreview as $productCategoryPreview)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="products-{{ $productCategoryPreview->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                    <div class="row row-cols-1 row-cols-md-4 justify-content-center g-4 mt-0">
                        @forelse ($productsPreview[$productCategoryPreview->id] ?? [] as $productPreview)
                            <div class="col">
                                <div class="card h-100 border-0">
                                    <img src="{{ Str::startsWith($productPreview->image, ['http://', 'https://']) ? $productPreview->image : asset('storage/' . $productPreview->image) }}"
                                        class="card-img-top rounded-4" style="height: 235px; object-fit: cover"
                                        alt="Gambar">
                                    <div class="card-body">
                                        {{-- <div class="d-flex mb-3">
                                            <div class="me-auto">
                                                <span
                                                    class="badge text-bg-secondary">{{ $productCategoryPreview->name ?? '-' }}</span>
                                            </div>
                                            <small class="text-body-secondary">

                                            </small>
                                        </div> --}}
                                        <h5 class="card-title text-center">
                                            <a class="text-decoration-none"
                                                href="{{ url($sectionProduct->slug . '/' . $productPreview->category_slug . '/' . $productPreview->slug) }}">{{ $productPreview->name ?? '-' }}
                                            </a>
                                        </h5>
                                        {{-- <span class="badge text-bg-info">Rp
                                            {{ number_format($productPreview->price, 0, ',', '.') }}</span> --}}
                                        {{-- <p class="card-text mt-2" style="text-align: justify">
                                            {{ $productPreview->description ?? '-' }}
                                        </p> --}}
                                    </div>
                                    {{-- <div class="card-footer text-end">
                                        <small class="text-body-secondary">
                                            
                                        </small>
                                    </div> --}}
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada {{ Str::lower($sectionProduct->title) ?? '-' }}</p>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
            @endforeach
        </div>
        <div class="d-grid gap-2 col-2 mx-auto text-center mt-2">
            <a href="{{ url($sectionProductPreview->button_link ?? '/') }}"
                class="btn btn-primary">{{ $sectionProductPreview->button_text ?? '-' }}
                <i class="bi bi-chevron-double-right"></i>
            </a>
        </div>
    </section>


    <section id="articles" style="margin-top: 8%">
        <div class="text-center mb-4">
            <h3>{{ $sectionArticle->title ?? '-' }}</h3>
            <p class="mt-4">
                {{ $sectionArticlePreview->subtitle ?? null }}
            </p>
        </div>

        <ul class="nav nav-tabs justify-content-center" id="articlesTab" role="tablist">
            @foreach ($articleCategoriesPreview as $articleCategoryPreview)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                        data-bs-target="#articles-{{ $articleCategoryPreview->id }}" type="button" role="tab"
                        aria-controls="" aria-selected="true">
                        {{ $articleCategoryPreview->name ?? '-' }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="articlesTabContent">
            @foreach ($articleCategoriesPreview as $articleCategoryPreview)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="articles-{{ $articleCategoryPreview->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                    <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                        @forelse ($articlesPreview[$articleCategoryPreview->id] ?? [] as $articlePreview)
                            <div class="col">
                                <div class="card h-100 border-0">
                                    <img src="{{ Str::startsWith($articlePreview->image, ['http://', 'https://']) ? $articlePreview->image : asset('storage/' . $articlePreview->image) }}"
                                        class="card-img-top rounded-4" style="height: 235px; object-fit: cover"
                                        alt="Gambar">
                                    {{-- <div class="card-body"> --}}
                                    <div class="d-flex mt-3 mb-3">
                                        <div class="me-auto">
                                            <span
                                                class="badge text-bg-secondary">{{ $articleCategoryPreview->name ?? '-' }}</span>
                                        </div>
                                        <small class="text-body-secondary">
                                            {{ $articlePreview->published_at ? $articlePreview->published_at->diffForHumans() : '-' }}
                                        </small>
                                    </div>
                                    <h5 class="card-title">
                                        <a class="text-decoration-none"
                                            href="{{ url($sectionArticle->slug . '/' . $articlePreview->category_slug . '/' . $articlePreview->slug) }}">{{ $articlePreview->title ?? '-' }}</a>
                                    </h5>
                                    <p class="card-text" style="text-align: justify">
                                        {{ Str::limit($articlePreview->content, 150, '...') ?? '-' }}
                                        <a class="text-decoration-none"
                                            href="{{ url($sectionArticle->slug . '/' . $articlePreview->category_slug . '/' . $articlePreview->slug) }}">Selengkapnya</a>
                                        <br>
                                        <span class="text-body-secondary float-end" style="font-size: 8pt"><i
                                                class="bi bi-eye-fill"></i>
                                            {{ $articlePreview->views ?? '-' }}</span>
                                    </p>
                                    {{-- </div> --}}
                                    {{-- <div class="card-footer text-end">
                                        <small class="text-body-secondary">
                                            <i class="bi bi-eye-fill"></i> {{ $articlePreview->views ?? '-' }}
                                        </small>
                                    </div> --}}
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada {{ Str::lower($sectionArticle->title) ?? '-' }}</p>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
            @endforeach
        </div>
        <div class="d-grid gap-2 col-2 mx-auto text-center mt-3">
            <a href="{{ url($sectionArticlePreview->button_link ?? '/') }}"
                class="btn btn-primary">{{ $sectionArticlePreview->button_text ?? '-' }}
                <i class="bi bi-chevron-double-right"></i>
            </a>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
@endpush
