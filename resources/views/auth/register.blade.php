<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        {{ $globalSetting->site_name ?? '' }}
        ::
        Register
    </title>

    @include('layouts.back-end.partials._meta')

    @include('layouts.back-end.partials._styles')
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/auth.css') }}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-4 col-md-4 col-4 mx-auto my-auto">
                <div id="auth-left">
                    {{-- <div class="auth-logo"> --}}
                    <div class="text-center">
                        <a href="">
                            <img src="{{ $globalSetting->logo_url ?? asset('mazer/assets/compiled/svg/logo.svg') }}"
                                width="60%" alt="Logo">
                        </a>
                        <h5 class="mt-4">{{ $globalSetting->site_name }}</h5>
                    </div>
                    <hr class="my-4">
                    {{-- </div> --}}
                    {{-- <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}

                    <form action="{{ route('register') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror form-control-lg"
                                placeholder="Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror form-control-lg"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror form-control-lg"
                                placeholder="Password">
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
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div> --}}
        </div>
    </div>

    @include('layouts.back-end.partials._scripts')
</body>

</html>
