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

<body>
    @include('front-end.layouts.partials.navbar')

    <div class="container">
        @hasSection('title')
            <h2 class="text-center mt-4">{{ $page->title }}</h2>
            <hr>
            @yield('content')
        @else
            @yield('content')
        @endif
    </div>

    @include('front-end.layouts.partials.footer')

    @include('front-end.layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
