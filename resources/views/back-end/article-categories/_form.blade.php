<form action="{{ $action }}" method="POST" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="" value="{{ old('name', $articleCategory->name ?? null) }}" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6 col-md-6 d-flex mt-4">
            <button type="submit" class="btn btn-primary me-1 mb-1">
                {!! $submitLabel !!}
            </button>
            {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
        </div>
    </div>
</form>
