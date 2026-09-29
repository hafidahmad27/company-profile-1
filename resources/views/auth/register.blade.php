@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    {{-- <h1 class="auth-title">Log in.</h1>
    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}

    <form action="{{ route('register') }}" method="POST" class="form">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror form-control-lg" placeholder="Name">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" id="email" name="email" value="{{ old('email') }}"
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
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror form-control-lg"
                placeholder="Confirm Password">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Register</button>
    </form>

    <div class="text-center mt-4 text-lg fs-6">
        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
                in</a>.</p>
    </div>
@endsection
