<div class="container-fluid bg-secondary text-white mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 text-center text-lg-start mb-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ $companySetting->logo_url }}" style="max-height: 50px"
                        class="d-inline-block align-text-top" alt="Logo">
                </a>
                <p class="mt-3 text-center text-lg-start" style="text-align: justify">
                    {!! nl2br(e(ucwords($companySetting->headline ?? '-'))) !!}
                </p>
                <div class="d-flex justify-content-center justify-content-lg-start flex-wrap gap-3 fs-4">
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
                    @if ($companySetting->facebook)
                        <a class="text-light" target="_blank" href="{{ $companySetting->facebook }}">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif
                    @if ($companySetting->linkedin)
                        <a class="text-light" target="_blank" href="{{ $companySetting->linkedin }}">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif
                    @if ($companySetting->whatsapp)
                        <a class="text-light" target="_blank" href="{{ $companySetting->whatsapp_link }}">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mb-4">
                <h5 class="mb-3 fw-bold">Navigasi</h5>
                <ul class="list-unstyled">
                    @foreach ($pages as $page)
                        <li class="mb-1">
                            <a class="nav-link text-decoration-none {{ $page->is_active ? (($page->slug == 'index' ? request()->is('/') : request()->is($page->slug . '*')) ? 'active text-primary' : 'text-light') : 'disabled opacity-25' }}"
                                href="{{ $page->slug == 'index' ? url('/') : url($page->slug) }}">{{ $page->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <h5 class="mb-3 fw-bold">Hubungi Kami</h5>
                <p class="mb-2" style="text-align: justify">
                    {!! nl2br(e($companySetting->address ?? '-')) !!}
                </p>
                <a class="d-block mb-2 text-white text-decoration-none"
                    href="{{ $companySetting->phone_link }}">{{ $companySetting->phone ?? '-' }}</a>
                <a class="d-block text-white text-decoration-none"
                    href="{{ $companySetting->email_link }}">{{ $companySetting->email ?? '-' }}</a>
            </div>

            @if ($companySetting->map_embed)
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    {!! $companySetting->map_embed !!}
                </div>
            @endif
        </div>
    </div>

    <div class="container border-top border-3 py-4">
        <div class="row align-items-center">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6 text-center">
                Copyright &copy; {{ date('Y') }}
                {{ $companySetting->name ?? '-' }}.
                All Rights Reserved.
            </div>
            <div class="col-sm-3 text-end">
                <span class="text-dark opacity-25" style="font-size: 10pt">
                    Designed & Developed by HFD Dev
                </span>
            </div>
        </div>
    </div>
</div>
