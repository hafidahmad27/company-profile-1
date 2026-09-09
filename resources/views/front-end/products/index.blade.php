@extends('layouts.front-end.app')

@section('title', $page->title)

@section('content')
    <p class="text-center" style="text-align: justify">
        {{ $section->subtitle ?? null }}
    </p>

    @if ($section->image)
        <div class="text-center mb-4">
            <img src="{{ $section->image_url }}" class="card-img-top rounded-4" style="height: 235px; object-fit: cover">
        </div>
    @endif

    @if ($section->content)
        <p style="text-align: justify">
            {!! nl2br(e($section->content ?? '-')) !!}
        </p>
    @endif

    <ul class="nav nav-tabs justify-content-center" id="productsTab" role="tablist">
        @foreach ($productCategories as $productCategory)
            @php
                // $count = isset($products[$productCategory->id]) ? count($products[$productCategory->id]) : 0;
                $count = $products[$productCategory->id]->total();
            @endphp
            <li class="nav-item" role="presentation">
                {{-- <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#products-{{ $productCategory->id }}" type="button" role="tab" aria-controls=""
                    aria-selected="true">
                    {{ $productCategory->name ?? '-' }} ({{ $count }})
                </button> --}}
                <a class="nav-link {{ $productCategory->id == $defaultProductCategoryId ? 'active' : '' }}"
                    href="{{ request()->fullUrlWithQuery(['tab' => $productCategory->id]) }}" role="tab"
                    aria-controls="" aria-selected="true">
                    {{ $productCategory->name ?? '-' }} ({{ $count }})
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="productsContent">
        @foreach ($productCategories as $productCategory)
            <div class="tab-pane fade {{ $productCategory->id == $defaultProductCategoryId ? 'show active' : '' }}"
                id="products-{{ $productCategory->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                    @forelse ($products[$productCategory->id] ?? [] as $product)
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ $product->image_url }}" class="card-img-top rounded-4"
                                    style="height: 235px; object-fit: cover">
                                {{-- <div class="card-body"> --}}
                                {{-- <div class="d-flex mb-3"> --}}
                                {{-- <div class="me-auto">
                                            <span class="badge text-bg-secondary">{{ $productCategory->name ?? '-' }}</span>
                                        </div> --}}
                                {{-- <small class="text-body-secondary">
                                            
                                        </small> --}}
                                {{-- </div> --}}
                                <h5 class="card-title mt-3">
                                    <a class="text-decoration-none"
                                        href="{{ url(url()->current() . '/' . $product->category_slug . '/' . $product->slug) }}">{{ $product->name ?? '-' }}</a>
                                </h5>
                                <div class="d-flex">
                                    <div class="me-auto">
                                        <span class="badge text-bg-info">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <p class="card-text mt-2" style="text-align: justify">
                                    {{ Str::limit($product->description, 150, '...') ?? '-' }}
                                    <a class="text-decoration-none"
                                        href="{{ url(url()->current() . '/' . $product->category_slug . '/' . $product->slug) }}">Selengkapnya</a>
                                </p>
                                {{-- </div> --}}
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
                <div class="d-flex justify-content-center mt-4">
                    {{ $products[$productCategory->id]->withQueryString()->links() }}
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
        @endforeach
    </div>
@endsection
