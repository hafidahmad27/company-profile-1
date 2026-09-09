@extends('layouts.back-end.app')

@section('title', 'Detail Page - ' . ($page ?? '-'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>@yield('title')</h3>
                    <p class="text-subtitle text-muted">
                        {{--  --}}
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    @include('layouts.back-end.partials._breadcrumb')
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
                                @php
                                    $grouped = $sections->groupBy('section_key');
                                @endphp

                                @if ($grouped->count() > 1)
                                    {{-- tampilkan nav-tabs --}}
                                    <ul class="nav nav-tabs" id="sectionTabs" role="tablist">
                                        @foreach ($grouped as $key => $groupedSections)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                    id="{{ $key }}-tab" data-bs-toggle="tab"
                                                    data-bs-target="#{{ $key }}" type="button" role="tab"
                                                    aria-controls="{{ $key }}"
                                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                    {{ ucwords(str_replace('-', ' ', $key)) }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="tab-content" id="sectionTabsContent">
                                    @foreach ($grouped as $key => $groupedSections)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="{{ $key }}" role="tabpanel">
                                            <form action="{{ route('be.pages.sections.bulkUpdate') }}" method="POST"
                                                class="mb-4" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <table class="table table-striped">
                                                    @includeIf("back-end.pages.sections._$key", [
                                                        'sections' => $groupedSections,
                                                    ])
                                                </table>

                                                <div class="text-center mt-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi bi-arrow-repeat"></i> Update
                                                        {{ ucwords(str_replace('-', ' ', $key)) }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
@endsection
