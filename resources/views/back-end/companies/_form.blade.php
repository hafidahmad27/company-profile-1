<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="" value="{{ old('name', $company->name ?? null) }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder=""
                            value="{{ old('email', $company->email ?? $company->user_email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror"
                            min="0" name="phone" placeholder="ex: 03xxx"
                            value="{{ old('phone', $company->phone ?? null) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="number" id="whatsapp"
                            class="form-control @error('whatsapp') is-invalid @enderror" min="0" name="whatsapp"
                            placeholder="ex: 08xxx" value="{{ old('whatsapp', $company->whatsapp ?? null) }}">
                        @error('whatsapp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-6 col-6"> --}}
                <div class="form-group">
                    <label class="form-label">Headline</label>
                    <textarea class="form-control @error('headline') is-invalid @enderror" id="headline" name="headline" maxlength="255"
                        rows="1">{{ old('headline', $company->headline ?? null) }}</textarea>
                    @error('headline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- </div>
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label class="form-label"></label>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="formFile" class="form-label">Logo</label>
                <img src="{{ $company->logo_url }}" class="img-thumbnail">
                <input type="file" name="logo" id="logo"
                    class="form-control @error('logo') is-invalid @enderror">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="form-group">
                    <label class="form-label">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" maxlength="255"
                        rows="3">{{ old('address', $company->address ?? null) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="form-label">Map Embed</label>
                    <textarea class="form-control mb-1 @error('map_embed') is-invalid @enderror" id="map_embed" name="map_embed"
                        rows="2">{{ old('map_embed', $company->map_embed ?? null) }}</textarea>
                    @error('map_embed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Map</label>
                {!! $company->map_embed !!}
            </div>
        </div>
    </div>

    <hr>

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

    <hr>

    <div class="col-12 col-md-12 d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {!! $submitLabel !!}
        </button>
    </div>
</form>
