<nav class="navbar navbar-expand-lg navbar-expand-sm bg-secondary sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ Str::startsWith($setting->logo, ['http://', 'https://']) ? $setting->logo : asset('storage/' . $setting->logo) }}"
                width="90" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @foreach ($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link fw-bold {{ ($page->slug == 'index' ? request()->is('/') : request()->is($page->slug)) ? 'active text-primary' : 'text-light' }}"
                            href="{{ $page->slug == 'index' ? url('/') : url($page->slug) }}">{{ $page->title }}
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
