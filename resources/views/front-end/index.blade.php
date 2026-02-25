@extends('front-end.layouts.app')

@section('content')
    <section id="carousel" class="mt-3">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($carouselSlides as $key => $slide)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ Str::startsWith($slide->image, ['http://', 'https://']) ? $slide->image : asset('storage/' . $slide->image) }}"
                            class="d-block w-100" style="height: 510px; object-fit: cover" alt="Gambar">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>


    <section id="about" style="padding-top: 8%">
        <h3 class="text-center">{{ $about->title ?? '-' }}</h3>
        <p style="text-align: justify">
            {{ $about->content ?? '-' }}
        </p>
    </section>


    <section id="products" style="padding-top: 8%">
        <div class="text-center">
            <h3>{{ $product->title ?? '-' }}</h3>
            <p>
                {{ $product->subtitle ?? '-' }}
            </p>
        </div>

        <ul class="nav nav-tabs justify-content-center" id="productsTab" role="tablist">
            @foreach ($productCategoriesPreview as $productCategoryPreview)
                @php
                    $count = isset($productsPreview[$productCategoryPreview->id])
                        ? count($productsPreview[$productCategoryPreview->id])
                        : 0;
                @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                        data-bs-target="#products-{{ $productCategoryPreview->id }}" type="button" role="tab"
                        aria-controls="category-1-tab-pane" aria-selected="true">
                        {{ $productCategoryPreview->name ?? '-' }} ({{ $count }})
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="productsTabContent">
            @foreach ($productCategoriesPreview as $productCategoryPreview)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="products-{{ $productCategoryPreview->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                    <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                        @forelse ($productsPreview[$productCategoryPreview->id] ?? [] as $product)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}"
                                        class="card-img-top" style="height: 235px; object-fit: cover" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name ?? '-' }}</h5>
                                        <span class="badge text-bg-info">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                        <p class="card-text mt-2" style="text-align: justify">
                                            {{ $product->description ?? '-' }}
                                        </p>
                                    </div>
                                    {{-- <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div> --}}
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada products</p>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
            @endforeach
        </div>
    </section>


    <section id="articles" style="padding-top: 8%">
        <div class="text-center">
            <h3>{{ $article->title ?? '-' }}</h3>
            <p>
                {{ $article->subtitle ?? '-' }}
            </p>
        </div>

        <ul class="nav nav-tabs justify-content-center" id="articlesTab" role="tablist">
            @foreach ($articleCategoriesPreview as $articleCategoryPreview)
                @php
                    $count = isset($articlesPreview[$articleCategoryPreview->id])
                        ? count($articlesPreview[$articleCategoryPreview->id])
                        : 0;
                @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                        data-bs-target="#articles-{{ $articleCategoryPreview->id }}" type="button" role="tab"
                        aria-controls="category-1-tab-pane" aria-selected="true">
                        {{ $articleCategoryPreview->name ?? '-' }} ({{ $count }})
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="articlesTabContent">
            @foreach ($articleCategoriesPreview as $articleCategoryPreview)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="articles-{{ $articleCategoryPreview->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                    <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                        @forelse ($articlesPreview[$articleCategoryPreview->id] ?? [] as $article)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ Str::startsWith($article->image, ['http://', 'https://']) ? $article->image : asset('storage/' . $article->image) }}"
                                        class="card-img-top" style="height: 235px; object-fit: cover" alt="...">
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="me-auto">
                                                <span
                                                    class="badge text-bg-secondary">{{ $articleCategoryPreview->name ?? '-' }}</span>
                                            </div>
                                            <small><i class="bi bi-eye-fill"></i> {{ $article->views ?? '-' }}</small>
                                        </div>
                                        <h5 class="card-title">{{ $article->title ?? '-' }}</h5>
                                        <p class="card-text" style="text-align: justify">
                                            {{ $article->content ?? '-' }}
                                        </p>
                                    </div>
                                    {{-- <div class="card-footer">
                                <small class="text-body-secondary">Last updated 3 mins ago</small>
                            </div> --}}
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada articles</p>
                        @endforelse
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
            @endforeach
        </div>
    </section>
@endsection
