<form action="{{ route('be.profile.update') }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @method('PATCH')
    <div class="row">
        {{-- <div class="col-md-6 col-6"> --}}
        <div class="form-group">
            <label>Nama</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="" value="{{ old('name', $user->name ?? null) }}" autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- </div> --}}
        {{-- <div class="col-md-6 col-6"> --}}
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                name="email" placeholder="" value="{{ old('email', $user->email ?? null) }}">
            @error('email')
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
