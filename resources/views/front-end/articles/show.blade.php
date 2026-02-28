@extends('front-end.layouts.app')

@section('title', $article->title)

@section('content')
    <h2>{{ $article->title ?? '-' }}</h2>

    <p class="mt-3" style="text-align: justify">
        {{ $article->content ?? '-' }}
    </p>
@endsection
