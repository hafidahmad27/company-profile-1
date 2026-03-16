@extends('layouts.front-end.app')

@section('title', $page->title)

@section('content')
    {{-- @if (!empty($aboutPreview->subtitle))
        <p class="text-center" style="text-align: justify">
            {{ $aboutPreview->subtitle }}
        </p>
    @endif --}}

    <p style="text-align: justify">
        {!! nl2br(e($section->content ?? '-')) !!}
    </p>
@endsection
