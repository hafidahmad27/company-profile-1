<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        {{ $globalSetting->site_name ?? '' }}
        ::
        @hasSection('title')
            @yield('title')
        @endif
    </title>

    @include('layouts.back-end.partials.meta')

    @include('layouts.back-end.partials.styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        @include('layouts.back-end.partials.sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="flex-grow-1">
                @yield('content')
            </div>

            @include('layouts.back-end.partials.footer')
        </div>
    </div>

    @include('layouts.back-end.partials.scripts')
    @stack('scripts')
</body>

</html>
