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
                <div class="d-flex gap-4 fs-4">
                    @if ($companySetting->linkedin)
                        <a class="text-light" target="_blank" href="{{ $companySetting->linkedin }}">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif
                    @if ($companySetting->facebook)
                        <a class="text-light" target="_blank" href="{{ $companySetting->facebook }}">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif
                    @if ($companySetting->instagram)
                        <a class="text-light" target="_blank" href="{{ $companySetting->instagram }}">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif
                    @if ($companySetting->tiktok)
                        <a class="text-light" target="_blank" href="{{ $companySetting->tiktok }}">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    @endif
                    @if ($companySetting->youtube)
                        <a class="text-light" target="_blank" href="{{ $companySetting->youtube }}">
                            <i class="bi bi-youtube"></i>
                        </a>
                    @endif
                    @if ($companySetting->phone)
                        <a class="text-light" target="_blank" href="{{ $companySetting->wa_link }}">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <h5 class="mb-3 fw-bold">Navigasi</h5>
                <ul class="list-unstyled">
                    @foreach ($pages as $page)
                        <li>
                            <a class="text-decoration-none {{ ($page->slug == 'index' ? request()->is('/') : request()->is($page->slug . '*')) ? 'active fw-bold text-primary' : 'text-light' }}"
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
