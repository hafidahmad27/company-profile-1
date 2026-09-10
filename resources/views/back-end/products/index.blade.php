@extends('layouts.back-end.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('mazer/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                    <p class="text-subtitle text-muted">
                        {{-- A sortable, searchable, paginated table without
                        dependencies thanks to simple-datatables. --}}
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    @include('layouts.back-end.partials._breadcrumb')
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('be.products.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add
                        </a>
                    </h5>
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
                                <th>Published At</th>
                                <th>Author</th>
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
                                    <td>{{ Str::limit($product->description, 100) }}</td>
                                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td align="center">
                                        <img src="{{ $product->image_url }}" width="100" height="100"
                                            class="img-thumbnail">
                                    </td>
                                    <td align="center">
                                        <span class="badge text-bg-{{ $product->is_published ? 'success' : 'info' }}">
                                            {{ $product->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td>{{ $product->published_at }}</td>
                                    <td>{{ $product->user_name }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('be.product.togglePublish', $product->id) }}"
                                            class="d-inline" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i
                                                    class="bi {{ $product->is_published ? 'bi-arrow-down-square' : 'bi-arrow-up-square-fill' }}"></i>
                                            </button>
                                        </form>
                                        |
                                        <a href="{{ route('be.products.show', $product->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        |
                                        <a href="{{ route('be.products.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @if ($product->is_published == 0)
                                            |
                                            <form action="{{ route('be.products.destroy', $product->id) }}"
                                                class="d-inline" method="POST">
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
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
