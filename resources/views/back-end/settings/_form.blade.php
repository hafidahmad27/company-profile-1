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
                        <label>Nama</label>
                        <input type="text" id="site_name"
                            class="form-control @error('site_name') is-invalid @enderror" name="site_name"
                            placeholder="" value="{{ old('site_name', $setting->site_name ?? null) }}" autofocus>
                        @error('site_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $setting->address ?? null) }}</textarea>
                        @error('address')
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
                            name="phone" placeholder="" value="{{ old('phone', $setting->phone ?? null) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="" value="{{ old('email', $setting->email ?? null) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- <div class="col-md-6 col-6"> --}}
                <div class="form-group">
                    <label class="form-label">Footer About</label>
                    <textarea class="form-control @error('footer_about') is-invalid @enderror" id="footer_about" name="footer_about"
                        rows="3">{{ old('footer_about', $setting->footer_about ?? null) }}</textarea>
                    @error('footer_about')
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
                <img src="{{ $setting->logo_url }}" class="img-thumbnail">
                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo"
                    name="logo">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {!! $submitLabel !!}
        </button>
    </div>
</form>
