@php
    $brandLogo = $companySetting->logo_url ?: asset('mazer/assets/compiled/svg/logo.svg');
@endphp

<footer class="site-footer mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <a class="site-brand site-brand--footer" href="{{ url('/') }}">
                    <span class="site-brand__logo"><img src="{{ $brandLogo }}" width="34" height="34" alt=""></span>
                    <span class="site-brand__name">{{ $companySetting->name ?: 'HFD Company' }}</span>
                </a>
                <p class="site-footer__text mt-3">
                    {!! nl2br(e($companySetting->footer_about ?: 'Solusi terpercaya untuk kebutuhan bisnis dan informasi perusahaan Anda.')) !!}
                </p>
            </div>
            <div class="col-lg-3 col-md-3 col-6 mb-4 mb-md-0">
                <h6 class="site-footer__title">Navigasi</h6>
                <ul class="list-unstyled site-footer__links">
                    @foreach ($pages as $page)
                        <li>
                            <a href="{{ trim($page->slug, '/') === '' ? url('/') : url($page->slug) }}">
                                {{ $page->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-3 col-6">
                <h6 class="site-footer__title">Hubungi Kami</h6>
                <p class="site-footer__text mb-2">
                    {!! nl2br(e($companySetting->address ?: 'Silakan hubungi kami untuk informasi lebih lanjut.')) !!}
                </p>
                @if ($companySetting->phone)
                    <a class="site-footer__contact d-block mb-2" href="tel:{{ $companySetting->phone }}"><i class="bi bi-telephone me-2"></i>{{ $companySetting->phone }}</a>
                @endif
                @if ($companySetting->email)
                    <a class="site-footer__contact d-block" href="mailto:{{ $companySetting->email }}"><i class="bi bi-envelope me-2"></i>{{ $companySetting->email }}</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="site-footer__bottom">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col text-center small">
                Copyright &copy; {{ date('Y') }} {{ $companySetting->name ?? 'HFD Company' }}. All Rights Reserved.
            </div>
            <div class="col text-end d-none d-md-block">
                <span class="site-footer__credit">Designed &amp; Developed by HFD Dev</span>
            </div>
        </div>
    </div>
</div>
</footer>
