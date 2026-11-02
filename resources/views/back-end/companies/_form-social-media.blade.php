<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-4 col-4">
            <div class="form-group">
                <label>Instagram</label>
                <input type="url" id="instagram" class="form-control @error('instagram') is-invalid @enderror"
                    name="instagram" placeholder="" value="{{ old('instagram', $company->instagram ?? null) }}">
                @error('instagram')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4 col-4">
            <div class="form-group">
                <label>TikTok</label>
                <input type="url" id="tiktok" class="form-control @error('tiktok') is-invalid @enderror"
                    name="tiktok" placeholder="" value="{{ old('tiktok', $company->tiktok ?? null) }}">
                @error('tiktok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4 col-4">
            <div class="form-group">
                <label>YouTube</label>
                <input type="url" id="youtube" class="form-control @error('youtube') is-invalid @enderror"
                    name="youtube" placeholder="" value="{{ old('youtube', $company->youtube ?? null) }}">
                @error('youtube')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4 col-4">
            <div class="form-group">
                <label>Facebook</label>
                <input type="url" id="facebook" class="form-control @error('facebook') is-invalid @enderror"
                    name="facebook" placeholder="" value="{{ old('facebook', $company->facebook ?? null) }}">
                @error('facebook')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4 col-4">
            <div class="form-group">
                <label>LinkedIn</label>
                <input type="url" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror"
                    name="linkedin" placeholder="" value="{{ old('linkedin', $company->linkedin ?? null) }}">
                @error('linkedin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {!! $submitLabel !!}
        </button>
    </div>
</form>
