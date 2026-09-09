<!doctype html>
<html lang="en">

<head>
    <title>
        @hasSection('title')
            @yield('title') &ndash;
        @endif
        {{ $globalSetting->site_name ?? '-' }}
    </title>

    @include('layouts.front-end.partials._meta')

    @include('layouts.front-end.partials._styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.front-end.partials._navbar')

    @hasSection('title')
        <div class="container-fluid bg-primary">
            <div class="row py-3">
                <h2 class="text-center text-light mt-3 pb-2">
                    @if (request()->segment(1) && empty(request()->segment(2)))
                        {{ $page->title }}
                    @elseif ($page->slug === 'products')
                        {{ $productCategory->name ?? '-' }}
                    @elseif ($page->slug === 'articles')
                        {{ $articleCategory->name ?? '-' }}
                    @else
                        {{ $page->title }}
                    @endif
                </h2>

                @include('layouts.front-end.partials._breadcrumb')
            </div>
        </div>
    @endif

    <div class="container mt-3 flex-grow-1">
        @yield('content')
    </div>

    @include('layouts.front-end.partials._footer')

    @include('layouts.front-end.partials._scripts')
    @stack('scripts')
</body>

</html>
