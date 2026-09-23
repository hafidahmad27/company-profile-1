@php
    $brandLogo = $companySetting->logo_url ?: asset('mazer/assets/compiled/svg/logo.svg');
@endphp

<nav class="navbar navbar-expand-lg site-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand site-brand" href="{{ url('/') }}" aria-label="{{ $companySetting->name ?? 'Beranda' }}">
            <span class="site-brand__logo">
                <img src="{{ $brandLogo }}" width="34" height="34" alt="">
            </span>
            <span class="site-brand__name">{{ $companySetting->name ?: 'HFD Company' }}</span>
        </a>
        <button class="navbar-toggler site-navbar__toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                @foreach ($pages as $page)
                    @php
                        $pagePath = trim($page->slug, '/');
                        $isActive = $pagePath === ''
                            ? request()->is('/')
                            : request()->is($pagePath) || request()->is($pagePath . '/*');
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link site-navbar__link {{ $isActive ? 'active' : '' }}"
                            href="{{ $pagePath === '' ? url('/') : url($page->slug) }}">
                            {{ $page->title }}
                        </a>
                    </li>
                @endforeach

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link fw-bold {{ request()->is('articles') ? 'active text-primary' : 'text-light' }} dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu bg-secondary">
                        @foreach ($pages as $page)
                            <li>
                                <a class="dropdown-item link-primary link-underline-primary {{ ($page->slug == 'index' ? request()->is('/') : request()->is($page->slug)) ? 'active text-light' : 'text-light' }}"
                                    href="{{ $page->slug == 'index' ? url('/') : url($page->slug) }}">
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> --}}
            </ul>
            {{-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}
        </div>
    </div>
</nav>
