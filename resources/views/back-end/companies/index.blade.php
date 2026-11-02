@extends('layouts.back-end.app')

@section('title', 'Company')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
        <div class="card-content">
            <div class="card-body">
                @if (empty($company->name) || empty($company->address) || empty($company->email))
                    <div class="alert alert-info" role="alert">
                        Harap mengisi kolom-kolom berikut terlebih dahulu
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button> --}}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! session('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <ul class="nav nav-tabs" id="companyTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Company</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="social-media-tab" data-bs-toggle="tab"
                            data-bs-target="#social-media-tab-pane" type="button" role="tab"
                            aria-controls="social-media-tab-pane" aria-selected="false">Social Media</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="companyTabsContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        @include('back-end.companies._form', [
                            'action' => route('be.companies.update', $company->id),
                            'method' => 'PUT',
                            'submitLabel' => '<i class="bi bi-arrow-repeat"></i> Update',
                        ])
                    </div>
                    <div class="tab-pane fade" id="social-media-tab-pane" role="tabpanel" aria-labelledby="social-media-tab"
                        tabindex="0">
                        @include('back-end.companies._form-social-media', [
                            'action' => route('be.companies.social-media.update', $company->id),
                            'method' => 'PUT',
                            'submitLabel' => '<i class="bi bi-arrow-repeat"></i> Update',
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activeTab = localStorage.getItem('activeCompanyTab');

            if (activeTab) {
                const trigger = document.querySelector(
                    `button[data-bs-target="${activeTab}"]`
                );

                if (trigger) {
                    bootstrap.Tab.getOrCreateInstance(trigger).show();
                }
            }

            document.querySelectorAll('#companyTabs button[data-bs-toggle="tab"]')
                .forEach(tab => {
                    tab.addEventListener('shown.bs.tab', function(e) {
                        localStorage.setItem(
                            'activeCompanyTab',
                            e.target.dataset.bsTarget
                        );
                    });
                });
        });
    </script>
@endpush
