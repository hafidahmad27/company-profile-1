@extends('front-end.layouts.app')

@section('title', $page->title)

@section('content')
    {{-- <p class="text-center" style="text-align: justify">
        {{ $section->subtitle }}
    </p> --}}

    <ul class="nav nav-tabs justify-content-center" id="productsTab" role="tablist">
        @foreach ($productCategories as $productCategory)
            @php
                $count = isset($products[$productCategory->id]) ? count($products[$productCategory->id]) : 0;
            @endphp
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#products-{{ $productCategory->id }}" type="button" role="tab" aria-controls=""
                    aria-selected="true">
                    {{ $productCategory->name ?? '-' }} ({{ $count }})
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="productsContent">
        @foreach ($productCategories as $productCategory)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="products-{{ $productCategory->id }}"
                role="tabpanel" aria-labelledby="" tabindex="0">
                <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                    @forelse ($products[$productCategory->id] ?? [] as $product)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}"
                                    class="card-img-top" style="height: 235px; object-fit: cover" alt="Gambar">
                                <div class="card-body">
                                    {{-- <div class="d-flex mb-3"> --}}
                                    {{-- <div class="me-auto">
                                            <span class="badge text-bg-secondary">{{ $productCategory->name ?? '-' }}</span>
                                        </div> --}}
                                    {{-- <small class="text-body-secondary">
                                            
                                        </small> --}}
                                    {{-- </div> --}}
                                    <h5 class="card-title">
                                        <a class="text-decoration-none"
                                            href="{{ url(url()->current() . '/' . $product->category_slug . '/' . $product->slug) }}">{{ $product->name ?? '-' }}</a>
                                    </h5>
                                    <span class="badge text-bg-info">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <p class="card-text mt-2" style="text-align: justify">
                                        {{ Str::limit($product->description, 150, '...') ?? '-' }}
                                        <a class="text-decoration-none"
                                            href="{{ url(url()->current() . '/' . $product->category_slug . '/' . $product->slug) }}">Selengkapnya</a>
                                    </p>
                                </div>
                                {{-- <div class="card-footer text-end">
                                    <small class="text-body-secondary">
                                        
                                    </small>
                                </div> --}}
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada {{ Str::lower($page->title) ?? '-' }}</p>
                    @endforelse
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
        @endforeach
    </div>
@endsection
