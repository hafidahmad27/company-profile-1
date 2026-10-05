@extends('layouts.back-end.app')

@section('title', 'Product Category')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
        <div class="card-content">
            <div class="card-body">
                @include('back-end.product-categories._form', [
                    'action' => route('be.product-categories.update', $productCategory->id),
                    'method' => 'PUT',
                    'submitLabel' => '<i class="bi bi-arrow-repeat"></i> Update',
                ])
            </div>
        </div>
    </div>
@endsection
