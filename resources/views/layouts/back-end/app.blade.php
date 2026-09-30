<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        {{ $companySetting->name ?? '-' }}
        ::
        @hasSection('title')
            @yield('title')
        @endif
    </title>

    @include('layouts.back-end.partials._meta')

    @include('layouts.back-end.partials._styles')
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        @include('layouts.back-end.partials._sidebar')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="flex-grow-1">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>@yield('title')</h3>
                                <p class="text-subtitle text-muted">
                                    {{-- A sortable, searchable, paginated table without
                                    dependencies thanks to simple-datatables. --}}
                                </p>
                            </div>
                            @hasSection('hideBreadcrumb')
                            @else
                                <div class="col-12 col-md-6 order-md-2 order-first">
                                    @include('layouts.back-end.partials._breadcrumb')
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>

            @include('layouts.back-end.partials._footer')
        </div>
    </div>

    @include('layouts.back-end.partials._scripts')
    @stack('scripts')
</body>

</html>
