<div class="container-fluid bg-secondary text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ $companySetting->logo_url }}" width="90" class="d-inline-block align-text-top">
                </a>
                <p class="mt-3" style="text-align: justify">
                    {!! nl2br(e($companySetting->footer_about ?? '-')) !!}
                </p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <h5 class="mb-3 fw-bold">Navigasi</h5>
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
                <h5 class="mb-3 fw-bold">Hubungi Kami</h5>
                <p class="mb-2" style="text-align: justify">
                    {!! nl2br(e($companySetting->address ?? '-')) !!}
                </p>
                <a class="d-block mb-2 text-white text-decoration-none"
                    href="tel:{{ $companySetting->phone }}">{{ $companySetting->phone ?? '-' }}</a>
                <a class="d-block text-white text-decoration-none"
                    href="mailto:{{ $companySetting->email }}">{{ $companySetting->email ?? '-' }}</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white">
    <div class="row align-items-center py-3">
        <div class="col">

        </div>
        <div class="col text-center">
            Copyright &copy; {{ date('Y') }}
            {{ $companySetting->name ?? '-' }}.
            All Rights Reserved.
        </div>
        <div class="col text-end">
            <span class="text-secondary" style="font-size: 10pt">
                Designed & Developed by HFD Dev
            </span>
        </div>
    </div>
</div>
