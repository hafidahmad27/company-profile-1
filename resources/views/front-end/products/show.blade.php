@extends('front-end.layouts.app')

@section('title', $product->name)

@section('content')
    <h2>{{ $product->name ?? '-' }}</h2>

    <p class="mt-3" style="text-align: justify">
        {{ $product->description ?? '-' }}
    </p>
@endsection
