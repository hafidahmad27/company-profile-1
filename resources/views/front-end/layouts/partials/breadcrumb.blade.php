<div class="d-flex justify-content-center">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            @if (request()->segment(1) && empty(request()->segment(2)))
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url('/') }}">Home
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug) }}">{{ $page->title ?? '-' }}
                    </a>
                </li>
            @elseif (!empty($articleCategory?->name))
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url('/') }}">Home
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug) }}">{{ $page->title ?? '-' }}
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug . '/' . $articleCategory->slug) }}">{{ $articleCategory->name ?? '-' }}
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug . '/' . $articleCategory->slug . '/' . $article->slug) }}">{{ $article->title ?? '-' }}
                    </a>
                </li>
            @elseif (!empty($productCategory?->name))
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url('/') }}">Home
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug) }}">{{ $page->title ?? '-' }}
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug . '/' . $productCategory->slug) }}">{{ $productCategory->name ?? '-' }}
                    </a>
                </li>
                <li class="breadcrumb-item text-light active" aria-current="page">
                    <a class="text-decoration-none text-light link-dark link-underline-dark"
                        href="{{ url($page->slug . '/' . $productCategory->slug . '/' . $product->slug) }}">{{ $product->name ?? '-' }}
                    </a>
                </li>
            @endif
        </ol>
    </nav>
</div>
