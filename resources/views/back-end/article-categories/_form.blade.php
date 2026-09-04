<form action="{{ $action }}" method="POST" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">First Name</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="First Name" name="fname-column">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Last Name</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    placeholder="Last Name" name="lname-column">
                                            </div>
                                        </div> --}}
        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">City</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    placeholder="City" name="city-column">
                                            </div>
                                        </div> --}}
        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Country</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    name="country-floating" placeholder="Country">
                                            </div>
                                        </div> --}}
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label>Nama Kategori Artikel</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="" value="{{ old('name', $articleCategory->name ?? null) }}" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email-id-column" class="form-control"
                                                    name="email-id-column" placeholder="Email">
                                            </div>
                                        </div> --}}
        {{-- <div class="form-group col-12">
                                            <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                                    <label for="checkbox5">Remember Me</label>
                                                </div>
                                            </div>
                                        </div> --}}
        <div class="col-6 col-md-6 d-flex mt-4">
            <button type="submit" class="btn btn-primary me-1 mb-1">
                {!! $submitLabel !!}
            </button>
            {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
        </div>
    </div>
</form>
