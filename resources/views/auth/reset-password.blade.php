<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        {{ $globalSetting->site_name ?? '' }}
        :: Forgot Password
        @hasSection('title')
            @yield('title')
        @endif
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

                    @if (session('password_confirmation'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('password_confirmation') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('password.store') }}" method="POST" class="form">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email"
                                value="{{ old('email', $request->email) }}"
                                class="form-control @error('email') is-invalid @enderror form-control-lg"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror form-control-lg"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
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
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Reset Password</button>
                    </form>
                    <div class="text-center mt-4 text-lg fs-6">
                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}"
                                class="font-bold">Log
                                in</a>.
                        </p>
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
