@extends('front-end.layouts.app')

@section('title', $page->title)

@section('content')
    <p style="text-align: justify">
        {{ $section->content ?? '-' }}
    </p>
@endsection
