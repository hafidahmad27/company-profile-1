@php
    $currentUrl = url()->current();
    // kalau URL berakhir dengan /create, hapus segmen terakhir
    $backUrl = Str::endsWith($currentUrl, '/create') ? Str::beforeLast($currentUrl, '/') : url()->previous();
@endphp

<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('be.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ $backUrl }}">@yield('title')</a>
        </li>
    </ol>
</nav>
