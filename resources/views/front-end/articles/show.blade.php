@extends('front-end.layouts.app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <h2 class="text-center mb-4">{{ $article->title ?? '-' }}</h2>
            <p class="text-center">
                <small>{{ $article->user_name ?? '-' }}</small> &dash; <span
                    class="badge text-bg-secondary">{{ $article->category_name ?? '-' }}</span>
                <br>
                <small>{{ $article->published_at->locale('id')->translatedFormat('l, d F Y | H:i') }}</small>
            </p>
            <img src="{{ Str::startsWith($article->image, ['http://', 'https://']) ? $article->image : asset('storage/' . $article->image) }}"
                class="img-fluid w-100" alt="Gambar">
            <p class="mt-3" style="text-align: justify">
                {!! nl2br(e($article->content ?? '-')) !!}
            </p>
            <br>
            <small class="text-body-secondary">
                Dilihat: <i class="bi bi-eye-fill"></i> {{ $article->views ?? '-' }}x
            </small>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
@endsection
