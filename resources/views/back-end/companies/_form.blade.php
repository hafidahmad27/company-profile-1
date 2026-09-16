<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-7 col-7">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="" value="{{ old('name', $company->name ?? null) }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-5 col-5">
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
                <div class="col-md-7 col-7">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" maxlength="255"
                            rows="3">{{ old('address', $company->address ?? null) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-5 col-5">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" placeholder="" value="{{ old('phone', $company->phone ?? null) }}">
                        @error('phone')
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
                        maxlength="255" rows="2">{{ old('footer_about', $company->footer_about ?? null) }}</textarea>
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
                <img src="{{ $company->logo_url }}" class="img-thumbnail">
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
