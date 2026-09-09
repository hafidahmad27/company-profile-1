<form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @method('PUT')
    <div class="row">
        {{-- <div class="col-md-6 col-6"> --}}
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" id="current_password"
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                name="current_password" placeholder="" value="{{ old('current_password') }}" autofocus>
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- </div> --}}

        {{-- <div class="col-md-6 col-6"> --}}
        <div class="form-group">
            <label>New Password</label>
            <input type="password" id="password"
                class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password"
                placeholder="" value="{{ old('password') }}" autofocus>
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- </div> --}}

        {{-- <div class="col-md-6 col-6"> --}}
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" id="password_confirmation"
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                name="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}" autofocus>
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- </div> --}}
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            <i class="bi bi-arrow-repeat"></i> Update
        </button>
    </div>
</form>
