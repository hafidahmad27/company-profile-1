@extends('layouts.front-end.app')

@section('title', $page->title)

@section('content')
    <p class="text-center" style="text-align: justify">
        {{ $section->subtitle ?? null }}
    </p>

    @if ($section->image)
        <div class="text-center mb-4">
            <img src="{{ $section->image_url }}" class="card-img-top rounded-4">
        </div>
    @endif

    <p style="text-align: justify">
        {!! nl2br(e($section->content ?? '-')) !!}
    </p>
@endsection
