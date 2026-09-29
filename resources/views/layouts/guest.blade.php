<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        {{ $companySetting->name ?? '-' }}
        @hasSection('title')
            :: @yield('title')
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
                            <img src="{{ $companySetting->logo_url ?? asset('mazer/assets/compiled/svg/logo.svg') }}"
                                width="60%" alt="Logo">
                        </a>
                        <h5 class="mt-4">{{ $companySetting->name }}</h5>
                    </div>
                    <hr class="my-4">
                    {{-- </div> --}}
                    @yield('content')
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
