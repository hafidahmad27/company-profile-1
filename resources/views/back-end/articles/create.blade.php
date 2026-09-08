@extends('layouts.back-end.app')

@section('title', 'Article')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah @yield('title')</h3>
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
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {!! session('success') !!}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @include('back-end.articles._form', [
                                    'action' => route('be.articles.store'),
                                    'method' => 'POST',
                                    'submitLabel' => '<i class="bi bi-plus-lg"></i> Add',
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
