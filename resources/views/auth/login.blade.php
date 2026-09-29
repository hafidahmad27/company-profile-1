@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    {{-- <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('status') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="form">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? null) }}"
                class="form-control @error('email') is-invalid @enderror form-control-lg" placeholder="Email">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="form-control @error('password') is-invalid @enderror form-control-lg" placeholder="Password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Log in</button>
    </form>

    {{-- <div class="text-center mt-4 text-lg fs-6">
                        <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                                class="font-bold">Sign
                                up</a>.</p>
                        @if (Route::has('password.request'))
                            <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                        @endif
                    </div> --}}
@endsection
