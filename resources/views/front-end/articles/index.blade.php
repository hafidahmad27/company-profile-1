@extends('layouts.front-end.app')

@section('title', $page->title)

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
@endpush

@section('content')
    @if (!empty($section->subtitle))
        <p class="text-center" style="text-align: justify">
            {{ $section->subtitle }}
        </p>
    @endif

    <ul class="nav nav-tabs justify-content-center" id="articlesTab" role="tablist">
        @foreach ($articleCategories as $articleCategory)
            @php
                // $count = isset($articles[$articleCategory->id]) ? count($articles[$articleCategory->id]) : 0;
                $count = $articles[$articleCategory->id]->total();
            @endphp
            <li class="nav-item" role="presentation">
                {{-- <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#articles-{{ $articleCategory->id }}" type="button" role="tab" aria-controls=""
                    aria-selected="true">
                    {{ $articleCategory->name ?? '-' }} ({{ $count }})
                </button> --}}
                <a class="nav-link {{ $articleCategory->id == $defaultArticleCategoryId ? 'active' : '' }}"
                    href="{{ request()->fullUrlWithQuery(['tab' => $articleCategory->id]) }}" role="tab"
                    aria-controls="" aria-selected="true">
                    {{ $articleCategory->name ?? '-' }} ({{ $count }})
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="articlesTabContent">
        @foreach ($articleCategories as $articleCategory)
            <div class="tab-pane fade {{ $articleCategory->id == $defaultArticleCategoryId ? 'show active' : '' }}"
                id="articles-{{ $articleCategory->id }}" role="tabpanel" aria-labelledby="" tabindex="0">
                <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                    @forelse ($articles[$articleCategory->id] ?? [] as $article)
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ Str::startsWith($article->image, ['http://', 'https://']) ? $article->image : asset('storage/' . $article->image) }}"
                                    class="card-img-top rounded-4" style="height: 235px; object-fit: cover" alt="Gambar">
                                {{-- <div class="card-body"> --}}
                                <div class="d-flex mt-3 mb-3">
                                    <div class="me-auto">
                                        <span class="badge text-bg-secondary">{{ $articleCategory->name ?? '-' }}</span>
                                    </div>
                                    <small class="text-body-secondary">
                                        {{ $article->published_at ? $article->published_at->diffForHumans() : '-' }}
                                    </small>
                                </div>
                                <h5 class="card-title">
                                    <a class="text-decoration-none"
                                        href="{{ url(url()->current() . '/' . $article->category_slug . '/' . $article->slug) }}">
                                        {{ $article->title ?? '-' }}
                                    </a>
                                </h5>
                                <p class="card-text" style="text-align: justify">
                                    {{ Str::limit($article->content, 150, '...') ?? '-' }}
                                    <a class="text-decoration-none"
                                        href="{{ url(url()->current() . '/' . $article->category_slug . '/' . $article->slug) }}">Selengkapnya</a>
                                    <br>
                                    <span class="text-body-secondary float-end" style="font-size: 8pt"><i
                                            class="bi bi-eye-fill"></i>
                                        {{ $article->views ?? '-' }}</span>
                                </p>
                                {{-- </div> --}}
                                {{-- <div class="card-footer text-end">
                                    <small class="text-body-secondary">
                                        <i class="bi bi-eye-fill"></i> {{ $article->views ?? '-' }}
                                    </small>
                                </div> --}}
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada {{ Str::lower($page->title) ?? '-' }}</p>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles[$articleCategory->id]->withQueryString()->links() }}
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                ...
            </div> --}}
        @endforeach
    </div>
@endsection
