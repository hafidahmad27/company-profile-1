<div class="text-center mb-4">
    <h3 class="fw-bold">{{ $sectionAboutPreview->title ?? '-' }}</h3>
    <div class="d-inline-block border-bottom border-3 border-primary" style="width: 80px;"></div>
    <p class="mt-4">
        {{ $sectionAboutPreview->subtitle ?? null }}
    </p>
</div>

<p class="mt-4" style="text-align: justify">
    {{ $sectionAboutPreview->content ?? '-' }}
</p>

@if ($sectionAboutPreview->image)
    <div class="text-center">
        <img src="{{ $sectionAboutPreview->image_url }}" class="card-img-top rounded-4"
            style="height: 235px; object-fit: cover">
    </div>
@endif

@if ($sectionAboutPreview->button_text)
    <div class="d-grid gap-2 col-2 mx-auto text-center mt-4">
        <a href="{{ route('about.index') }}" class="btn btn-primary">{{ $sectionAboutPreview->button_text ?? '-' }}
            <i class="bi bi-chevron-double-right"></i>
        </a>
    </div>
@endif
