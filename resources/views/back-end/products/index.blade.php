@extends('layouts.back-end.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <div class="d-flex">
                    <a href="{{ route('be.products.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add
                    </a>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-outline-success block ms-auto" data-bs-toggle="modal"
                            data-bs-target="#default">
                            <i class="bi bi-arrow-bar-up"></i> Import
                        </button>
                        <a href="{{ route('be.products.export') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-file-earmark-excel-fill"></i> Export
                        </a>
                    </div>
                </div>
            </h5>
            @include('back-end.products._import')
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! session('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th class="text-center">Last Updated By</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->name }}</td>
                            <td align="justify">{{ Str::limit($product->description, 100) }}</td>
                            <td align="right">{{ $product->price_formatted }}</td>
                            <td align="center">
                                <img src="{{ $product->image_url }}" width="100" height="100" class="img-thumbnail">
                            </td>
                            <td align="center">
                                <span class="badge text-bg-{{ $product->is_published ? 'success' : 'info' }}">
                                    {{ $product->is_published ? 'Published' : 'Draft' }}
                                </span>
                                <br>
                                <span style="font-size: 9pt">
                                    {{ $product->published_at?->format('d-m-Y H:i:s') }}
                                </span>
                            </td>
                            <td>
                                {{ $product->user_name }} <br>
                                <span style="font-size: 9pt">
                                    {{ $product->updated_at?->format('d-m-Y H:i:s') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('be.product.togglePublish', $product->id) }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i
                                            class="bi {{ $product->is_published ? 'bi-arrow-down-square' : 'bi-arrow-up-square-fill' }}"></i>
                                    </button>
                                </form>
                                |
                                <a href="{{ route('be.products.show', $product->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                |
                                <a href="{{ route('be.products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if ($product->is_published == 0)
                                    |
                                    <form action="{{ route('be.products.destroy', $product->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@prepend('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endprepend
