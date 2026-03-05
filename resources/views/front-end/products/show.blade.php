@extends('front-end.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}"
                class="img-fluid w-100" alt="Gambar">

            <p class="text-end">
                <small>
                    {{ $product->user_name ?? '-' }} &dash;
                    {{ $product->published_at->locale('id')->translatedFormat('l, d F Y | H:i') }}
                </small>
            </p>

            <h2 class="mb-4" style="text-align: justify">{{ $product->name ?? '-' }}</h2>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span class="badge text-bg-info">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </li>
                <li class="list-group-item">
                    <span class="badge text-bg-secondary">{{ $product->category_name ?? '-' }}</span>
                </li>
                <li class="list-group-item" style="text-align: justify">{{ $product->description ?? '-' }}</li>
            </ul>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
@endsection
