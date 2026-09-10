@extends('layouts.back-end.app')

@section('title', 'Product Categories')

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
                        <a href="{{ route('be.product-categories.create') }}" class="btn btn-primary">
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
                                <th class="text-center">Is Active?</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($productCategories as $productCategory)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $productCategory->name }}</td>
                                    <td class="text-center">
                                        <form
                                            action="{{ route('be.product-categories.updateActiveStatus', $productCategory->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="checkbox" {{ $productCategory->is_active ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        {{-- <a href="{{ route('be.product-categories.show', $productCategory->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        | --}}
                                        <a href="{{ route('be.product-categories.edit', $productCategory->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        |
                                        <form action="{{ route('be.product-categories.destroy', $productCategory->id) }}"
                                            class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
