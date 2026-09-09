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
                    {{-- <h1 class="auth-title">Log in.</h1> --}}
                    <p>Forgot your password? No problem. Just let us know your email address
                        and we will
                        email you a password reset link that will allow you to choose a new one.</p>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('status') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email"
                                value="{{ old('email', $user->email ?? null) }}"
                                class="form-control @error('email') is-invalid @enderror form-control-lg"
                                placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button> --}}
                        </div>
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Send</button>
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
