@extends('front-end.layouts.app')

@section('title', $page->title)

@section('content')
    <p class="text-center" style="text-align: justify">
        {{ $section->subtitle ?? '-' }}
    </p>

    <ul class="nav nav-tabs justify-content-center" id="articlesTab" role="tablist">
        @foreach ($articleCategories as $articleCategory)
            @php
                $count = isset($articles[$articleCategory->id]) ? count($articles[$articleCategory->id]) : 0;
            @endphp
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#articles-{{ $articleCategory->id }}" type="button" role="tab"
                    aria-controls="category-1-tab-pane" aria-selected="true">
                    {{ $articleCategory->name ?? '-' }} ({{ $count }})
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="articlesTabContent">
        @foreach ($articleCategories as $articleCategory)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="articles-{{ $articleCategory->id }}"
                role="tabpanel" aria-labelledby="" tabindex="0">
                <div class="row row-cols-1 row-cols-md-3 justify-content-center g-4 mt-0">
                    @forelse ($articles[$articleCategory->id] ?? [] as $article)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ Str::startsWith($article->image, ['http://', 'https://']) ? $article->image : asset('storage/' . $article->image) }}"
                                    class="card-img-top" style="height: 235px; object-fit: cover" alt="...">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="me-auto">
                                            <span class="badge text-bg-secondary">{{ $articleCategory->name ?? '-' }}</span>
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
