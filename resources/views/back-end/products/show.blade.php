@extends('layouts.back-end.app')

@section('title', 'Product')

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
                    @include('layouts.back-end.partials._breadcrumb')
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
                                    <img src="{{ $product->image_url }}" class="img-fluid w-100">

                                    <p class="text-end">
                                        <small>
                                            {{ $product->user_name ?? '-' }} &dash;
                                            {{ $product->published_at ? $product->published_at->locale('id')->translatedFormat('l, d F Y | H:i') : '-' }}
                                        </small>
                                    </p>

                                    <h2 class="mb-4" style="text-align: justify">{{ $product->name ?? '-' }}</h2>

                                    <div class="form-group">
                                        <span class="badge text-bg-info">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="badge text-bg-secondary">{{ $product->category_name ?? '-' }}</span>
                                    </div>
                                    <div class="form-group">
                                        {!! nl2br(e($product->description ?? '-')) !!}
                                    </div>
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
