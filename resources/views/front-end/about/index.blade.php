@extends('front-end.layouts.app')

@section('title', $page->title)

@section('content')
    {{-- @if (!empty($aboutPreview->subtitle))
        <p class="text-center" style="text-align: justify">
            {{ $aboutPreview->subtitle }}
        </p>
    @endif --}}

    <p style="text-align: justify">
        {{ $section->content ?? '-' }}
    </p>
@endsection
