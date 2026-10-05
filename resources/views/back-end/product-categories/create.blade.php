@extends('layouts.back-end.app')

@section('title', 'Product Category')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
        <div class="card-content">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! session('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @include('back-end.product-categories._form', [
                    'action' => route('be.product-categories.store'),
                    'method' => 'POST',
                    'submitLabel' => '<i class="bi bi-plus-lg"></i> Add',
                ])
            </div>
        </div>
    </div>
@endsection
