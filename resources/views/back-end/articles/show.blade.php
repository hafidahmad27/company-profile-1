@extends('layouts.back-end.app1')

@section('title', 'Articles')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail @yield('title')</h3>
                    <p class="text-subtitle text-muted">
                        {{--  --}}
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    @include('layouts.back-end.partials.breadcrumb')
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <h2 class="text-center mb-4">{{ $article->title ?? '-' }}</h2>
                                    <p class="text-center">
                                        <small>{{ $article->user_name ?? '-' }}</small> &dash; <span
                                            class="badge text-bg-secondary">{{ $article->category_name ?? '-' }}</span>
                                        <br>
                                        <small>{{ $article->published_at?->locale('id')->translatedFormat('l, d F Y | H:i') }}</small>
                                    </p>
                                    <img src="{{ $article->image_url }}" class="img-fluid w-100 text-center" alt="Gambar">
                                    <p class="mt-3" style="text-align: justify">
                                        {!! nl2br(e($article->content ?? '-')) !!}
                                    </p>
                                    <br>
                                    <small class="text-body-secondary">
                                        Dilihat: <i class="bi bi-eye-fill"></i> {{ $article->views ?? '-' }}x
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
