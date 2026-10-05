@extends('layouts.back-end.app')

@section('title', 'Profile')

@section('content')
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
            <div class="card-content">
                <div class="card-body">
                    @if (session('status_profile'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('status_profile') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @include('back-end.profile.partials._update-profile-information-form')
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
            <div class="card-content">
                <div class="card-body">
                    @if (session('status_password'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('status_password') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @include('back-end.profile.partials._update-password-form')
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-12">
                    <div class="card"> --}}
    {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
    {{-- <div class="card-content">
                            <div class="card-body">
                                @include('back-end.profile.partials._delete-user-form')
                            </div>
                        </div>
                    </div>
                </div> --}}
    <!-- // Basic multiple Column Form section end -->
@endsection
