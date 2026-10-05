@extends('layouts.back-end.app')

@section('title', 'Product Category')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <label for="disabledInput">Product Category</label>
                        <p class="form-control-static" id="staticInput">{{ $productCategory->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
