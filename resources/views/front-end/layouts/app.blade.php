<!doctype html>
<html lang="en">

<head>
    <title>
        @hasSection('title')
            @yield('title') &ndash; HFD Corp
        @else
            HFD Corp
        @endif
    </title>

    @include('front-end.layouts.partials.meta')

    @include('front-end.layouts.partials.styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('front-end.layouts.partials.navbar')

    @hasSection('title')
        @include('front-end.layouts.partials.breadcrumb')
        <div class="container mt-4 flex-grow-1">
            @yield('content')
        </div>
    @else
        <div class="container flex-grow-1">
            @yield('content')
        </div>
    @endif

    @include('front-end.layouts.partials.footer')

    @include('front-end.layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
