<div class="container-fluid bg-secondary text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ Str::startsWith($setting->logo, ['http://', 'https://']) ? $setting->logo : asset('storage/' . $setting->logo) }}"
                        width="90" class="d-inline-block align-text-top">
                </a>
                <p class="mt-3" style="text-align: justify">
                    {{ $setting->footer_about ?? '-' }}
                </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <h5 class="mb-3">Informasi Umum</h5>
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
                    {{ $setting->address ?? '-' }}
                </p>
                <a class="d-block mb-2 text-white text-decoration-none"
                    href="tel:{{ $setting->phone }}">{{ $setting->phone ?? '-' }}</a>
                <a class="d-block text-white text-decoration-none"
                    href="mailto:{{ $setting->email }}">{{ $setting->email ?? '-' }}</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white">
    <div class="row py-3">
        <center>
            {{ $setting->footer_text ?? '-' }}
        </center>
    </div>
</div>
