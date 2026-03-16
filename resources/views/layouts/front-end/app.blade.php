<!doctype html>
<html lang="en">

<head>
    <title>
        @hasSection('title')
            @yield('title') &ndash;
        @endif
        HFD Corp
    </title>

    @include('layouts.front-end.partials.meta')

    @include('layouts.front-end.partials.styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.front-end.partials.navbar')

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

                @include('layouts.front-end.partials.breadcrumb')
            </div>
        </div>
    @endif

    <div class="container mt-3 flex-grow-1">
        @yield('content')
    </div>

    @include('layouts.front-end.partials.footer')

    @include('layouts.front-end.partials.scripts')
    @stack('scripts')
</body>

</html>
