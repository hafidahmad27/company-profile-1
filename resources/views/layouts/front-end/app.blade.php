<!doctype html>
<html lang="id">

<head>
    <title>
        @hasSection('title')
            @yield('title') &ndash;
        @endif
        {{ $companySetting->name ?? '-' }}
    </title>

    @include('layouts.front-end.partials._meta')

    @include('layouts.front-end.partials._styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100 site-body">
    @include('layouts.front-end.partials._navbar')

    @hasSection('title')
        <div class="page-heading">
            <div class="container">
                <div class="row py-4">
                <p class="page-heading__eyebrow mb-2">{{ $companySetting->name ?? 'Company profile' }}</p>
                <h2 class="text-center text-white fw-bold mb-2">
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
        </div>
    @endif

    <main class="container site-main flex-grow-1">
        @yield('content')
    </main>

    @include('layouts.front-end.partials._footer')

    @include('layouts.front-end.partials._scripts')
    @stack('scripts')
</body>

</html>
