@extends('layouts.back-end.app')

@section('title', 'Company')

@section('content')
    <div class="card">
        {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
        <div class="card-content">
            <div class="card-body">
                @if (empty($company->name) || empty($company->address) || empty($company->phone) || empty($company->email))
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
                @include('back-end.companies._form', [
                    'action' => route('be.companies.update', $company->id),
                    'method' => 'PUT',
                    'submitLabel' => '<i class="bi bi-arrow-repeat"></i> Update',
                ])
            </div>
        </div>
    </div>
@endsection
