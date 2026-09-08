@extends('layouts.back-end.app')

@section('title', 'Pages')

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
                {{-- <div class="card-header">
                    <h5 class="card-title">
                                                
                    </h5>
                </div> --}}
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('be.pages.bulkUpdate') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="20%">Order</th>
                                    <th>Title Page</th>
                                    <th class="text-center">Is Active?</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>
                                            <input type="number" name="pages[{{ $page->id }}][order]"
                                                value="{{ old('pages.' . $page->id . '.order', $page->order) }}"
                                                class="form-control @error('pages.' . $page->id . '.order') is-invalid @enderror">
                                            @error('pages.' . $page->id . '.order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" name="pages[{{ $page->id }}][title]"
                                                value="{{ old('pages.' . $page->id . '.title', $page->title) }}"
                                                class="form-control @error('pages.' . $page->id . '.title') is-invalid @enderror">
                                            @error('pages.' . $page->id . '.title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="pages[{{ $page->id }}][is_active]"
                                                value="1" {{ $page->is_active ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ Str::startsWith($page->slug, '/') ? $page->slug : '/' . $page->slug }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-arrow-repeat"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('mazer/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer/assets/static/js/pages/simple-datatables.js') }}"></script>
@endpush
