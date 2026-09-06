@extends('layouts.back-end.app')

@section('title', 'Articles')

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
                    @include('layouts.back-end.partials.breadcrumb')
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <a href="{{ route('be.articles.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add @yield('title')
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Published At</th>
                                <th>Is Published?</th>
                                {{-- <th>Views</th> --}}
                                <th>Author</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $article->category_name }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ Str::limit($article->content, 100) }}</td>
                                    <td align="center">
                                        <img src="{{ $article->image_url }}" width="100" height="100"
                                            class="img-thumbnail">
                                    </td>
                                    <td>{{ $article->published_at }}</td>
                                    <td align="right">
                                        <span class="badge bg-{{ $article->is_published ? 'success' : 'danger' }}">
                                            <i
                                                class="bi {{ $article->is_published ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                        </span>
                                    </td>
                                    {{-- <td align="right">{{ $article->views }}</td> --}}
                                    <td>{{ $article->user_name }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('be.article.togglePublish', $article->id) }}"
                                            class="d-inline" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i
                                                    class="bi {{ $article->is_published ? 'bi-arrow-down-square' : 'bi-arrow-up-square-fill' }}"></i>
                                            </button>
                                        </form>
                                        |
                                        <a href="{{ route('be.articles.show', $article->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        |
                                        <a href="{{ route('be.articles.edit', $article->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @if ($article->is_published == 0)
                                            |
                                            <form action="{{ route('be.articles.destroy', $article->id) }}"
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
