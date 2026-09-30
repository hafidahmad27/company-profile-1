@extends('layouts.back-end.app')

@section('title', 'Detail Page - ' . ($page ?? '-'))

@section('content')
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
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {!! session('success') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

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
                                                {{ Str::headline($key) }}
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
                                                    {{ Str::headline($key) }}
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
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = localStorage.getItem('activeSectionTab');

            if (activeTab) {
                const trigger = document.querySelector(
                    `button[data-bs-target="${activeTab}"]`
                );

                if (trigger) {
                    bootstrap.Tab.getOrCreateInstance(trigger).show();
                }
            }

            document.querySelectorAll('#sectionTabs button[data-bs-toggle="tab"]')
                .forEach(tab => {
                    tab.addEventListener('shown.bs.tab', function(e) {
                        localStorage.setItem(
                            'activeSectionTab',
                            e.target.dataset.bsTarget
                        );
                    });
                });
        });
    </script>
@endpush
