@extends('layouts.front-end.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
@endpush

@section('content')
    <section id="carousel">
        @include('front-end.home.sections._carousel')
    </section>

    @if ($sectionAboutPreview?->is_active == 1)
        <section id="about" style="margin-top: 6%">
            @include('front-end.home.sections._about-preview')
        </section>
    @endif

    @if ($sectionProductCategoryBestSellersPreview?->is_active == 1)
        <section id="product-category-best-sellers" style="margin-top: 6%">
            @include('front-end.home.sections._product-category-best-sellers-preview')
        </section>
    @endif

    @if ($sectionProductBestSellerPreview?->is_active == 1)
        <section id="product-best-sellers" style="margin-top: 6%">
            @include('front-end.home.sections._product-best-sellers-preview')
        </section>
    @endif

    @if ($sectionProductPreview?->is_active == 1)
        <section id="products" style="margin-top: 3%">
            @include('front-end.home.sections._products-preview')
        </section>
    @endif

    @if ($sectionArticleCategoryPopularPreview?->is_active == 1)
        <section id="article-category-popular" style="margin-top: 6%">
            @include('front-end.home.sections._article-category-popular-preview')
        </section>
    @endif

    @if ($sectionArticlePopularPreview?->is_active == 1)
        <section id="article-popular" style="margin-top: 6%">
            @include('front-end.home.sections._article-popular-preview')
        </section>
    @endif

    @if ($sectionArticlePreview?->is_active == 1)
        <section id="articles" style="margin-top: 6%">
            @include('front-end.home.sections._articles-preview')
        </section>
    @endif
@endsection

@prepend('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
@endprepend
