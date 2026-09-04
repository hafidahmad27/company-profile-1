<div class="container-fluid bg-secondary text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ $globalSetting->logo_url }}" width="90" class="d-inline-block align-text-top">
                </a>
                <p class="mt-3" style="text-align: justify">
                    {{ $globalSetting->footer_about ?? '-' }}
                </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <h5 class="mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    @foreach ($pages as $page)
                        <li>
                            <a class="text-white text-decoration-none {{ $page->slug == 'index' ? request()->is('/') : request()->is($page->slug) }}"
                                href="{{ $page->slug == 'index' ? url('/') : url($page->slug) }}">{{ $page->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-sm-4">
                <h5 class="mb-3">Hubungi kami</h5>
                <p class="mb-2" style="text-align: justify">
                    {!! nl2br(e($globalSetting->address ?? '-')) !!}
                </p>
                <a class="d-block mb-2 text-white text-decoration-none"
                    href="tel:{{ $globalSetting->phone }}">{{ $globalSetting->phone ?? '-' }}</a>
                <a class="d-block text-white text-decoration-none"
                    href="mailto:{{ $globalSetting->email }}">{{ $globalSetting->email ?? '-' }}</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white">
    <div class="row py-3">
        <div class="text-center">
            Copyright &copy; {{ date('Y') }} {{ $globalSetting->site_name ?? '-' }}. All Rights Reserved.
        </div>
    </div>
</div>
