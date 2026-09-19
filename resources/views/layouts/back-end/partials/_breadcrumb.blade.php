@php
    $segments = request()->segments();
    $url = '';

    $labels = [
        'create' => 'Tambah',
        'edit' => 'Edit',
    ];
@endphp

<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/be') }}">Dashboard</a>
        </li>

        @foreach ($segments as $segment)
            @if ($segment === 'be' || is_numeric($segment))
                @continue
            @endif

            @php
                $url .= '/be/' . $segment;
                $label = $labels[$segment] ?? Str::headline($segment);
            @endphp

            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (!$loop->last)
                    <a href="{{ $url }}">
                        {{ $label }}
                    </a>
                @else
                    {{ $label }}
                @endif
            </li>
        @endforeach

        @if (request()->route()?->getActionMethod() === 'show')
            <li class="breadcrumb-item active">
                Detail
            </li>
        @endif
    </ol>
</nav>
