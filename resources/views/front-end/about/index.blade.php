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

    <p style="text-align: justify">
        {!! nl2br(e($section->content ?? '-')) !!}
    </p>
@endsection
