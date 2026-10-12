<div class="text-center mb-4">
    <h3 class="fw-bold">{{ $sectionArticlePreview->title ?? '-' }}</h3>
    <p class="mt-4">
        {{ $sectionArticlePreview->subtitle ?? null }}
    </p>
    <p class="mt-4">
        {{ $sectionArticlePreview->content ?? null }}
    </p>
    @if ($sectionArticlePreview->image)
        <div class="text-center">
            <img src="{{ $sectionArticlePreview->image_url }}" class="card-img-top rounded-4"
                style="height: 235px; object-fit: cover">
        </div>
    @endif
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
                            <img src="{{ $articlePreview->image_url }}" class="card-img-top rounded-4"
                                style="height: 235px; object-fit: cover" alt="{{ $articlePreview->image }}">
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
                                    href="{{ url($article->slug . '/' . $articlePreview->category_slug . '/' . $articlePreview->slug) }}">{{ $articlePreview->title ?? '-' }}</a>
                            </h5>
                            <p class="card-text" style="text-align: justify">
                                {{ Str::limit($articlePreview->content, 150, '...') ?? '-' }}
                                @if ($articlePreview->content && Str::length($articlePreview->content) > 150)
                                    <a class="text-decoration-none"
                                        href="{{ url($article->slug . '/' . $articlePreview->category_slug . '/' . $articlePreview->slug) }}">Selengkapnya</a>
                                @endif
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
                    <p class="text-center">Belum ada {{ Str::lower($article->title) ?? '-' }}</p>
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
