<div class="text-center mb-4">
    <h3 class="fw-bold">{{ $sectionProductPreview->title ?? '-' }}</h3>
    <p class="mt-4">
        {{ $sectionProductPreview->subtitle ?? null }}
    </p>
    <p class="mt-4">
        {{ $sectionProductPreview->content ?? null }}
    </p>
    @if ($sectionProductPreview->image)
        <div class="text-center">
            <img src="{{ $sectionProductPreview->image_url }}" class="card-img-top rounded-4"
                style="height: 235px; object-fit: cover">
        </div>
    @endif
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
                @foreach ($productsPreview[$productCategoryPreview->id] ?? [] as $productPreview)
                    <div class="col">
                        <div class="card h-100 border-0">
                            <img src="{{ $productPreview->image_url }}" class="card-img-top rounded-4"
                                style="height: 235px; object-fit: cover">
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
                                        href="{{ url($product->slug . '/' . $productPreview->category_slug . '/' . $productPreview->slug) }}">{{ $productPreview->name ?? '-' }}
                                    </a>
                                </h5>
                                {{-- <span class="badge text-bg-info">Rp
                                            {{ $productPreview->price_formatted }}</span> --}}
                                {{-- <p class="card-text mt-2" style="text-align: justify">
                                                {{ Str::limit($productPreview->description, 150, '...') ?? '-' }}
                                                @if ($productPreview->description && Str::length($productPreview->description) > 150)
                                                    <a class="text-decoration-none"
                                                        href="{{ url($product->slug . '/' . $productPreview->category_slug . '/' . $productPreview->slug) }}">Selengkapnya</a>
                                                @endif
                                            </p> --}}
                            </div>
                            {{-- <div class="card-footer text-end">
                                        <small class="text-body-secondary">
                                            
                                        </small>
                                    </div> --}}
                        </div>
                    </div>
                @endforeach
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
