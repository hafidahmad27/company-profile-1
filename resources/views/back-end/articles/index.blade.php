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
                    @include('layouts.back-end.partials._breadcrumb')
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <div class="d-flex">
                            <a href="{{ route('be.articles.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Add
                            </a>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-outline-success block ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#default">
                                    <i class="bi bi-arrow-bar-up"></i> Import
                                </button>
                                <a href="{{ route('be.articles.export') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-excel-fill"></i> Export
                                </a>
                            </div>
                        </div>
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
                                <th>Status</th>
                                <th>Published At</th>
                                {{-- <th>Views</th> --}}
                                {{-- <th>Author</th> --}}
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
                                    <td align="center">
                                        <span class="badge text-bg-{{ $article->is_published ? 'success' : 'info' }}">
                                            {{ $article->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td>{{ $article->published_at }}</td>
                                    {{-- <td align="right">{{ $article->views }}</td> --}}
                                    {{-- <td>{{ $article->user_name }}</td> --}}
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

                    <!--Basic Modal -->
                    <div class="modal fade text-left @if ($errors->has('file')) show @endif" id="default"
                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"
                        @if ($errors->has('file')) style="display:block;" @endif>
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel1">Import @yield('title')
                                    </h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="{{ route('be.articles.import') }}" method="POST"
                                    enctype="multipart/form-data" class="form">
                                    @csrf
                                    <div class="modal-body">
                                        <input class="form-control @error('file') is-invalid @enderror" type="file"
                                            id="file" name="file">
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group me-auto">
                                            <a href="{{ route('be.articles.downloadTemplate') }}">download template</a>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block"><i class="bi bi-arrow-bar-up"></i> Import</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    @if ($errors->has('file'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById('default'));
                modal.show();
            });
        </script>
    @endif

    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
