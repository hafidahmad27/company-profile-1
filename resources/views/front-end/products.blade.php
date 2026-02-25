@extends('front-end.layouts.app')

@section('title', $page->title)

@section('content')
    <p class="text-center" style="text-align: justify">
        {{ $section->subtitle ?? '-' }}
    </p>

    <ul class="nav nav-tabs justify-content-center" id="productsTab" role="tablist">
        @foreach ($productCategories as $productCategory)
            @php
                $count = isset($products[$productCategory->id]) ? count($products[$productCategory->id]) : 0;
            @endphp
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#products-{{ $productCategory->id }}" type="button" role="tab"
                    aria-controls="category-1-tab-pane" aria-selected="true">
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
                        <p class="text-center">Belum ada {{ Str::slug($page->title) ?? '-' }}</p>
                    @endforelse
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
        @endforeach
    </div>
@endsection
