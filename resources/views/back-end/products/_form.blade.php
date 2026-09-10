<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-3 col-3">
            <div class="form-group">
                <label>Category</label>
                <select name="product_category_id" id="product_category_id"
                    class="form-control @error('product_category_id') is-invalid @enderror" placeholder=""
                    value="{{ old('product_category_id', $product->product_category_id ?? null) }}" required autofocus>
                    <option value="">-- Select Category --</option>
                    @foreach ($productCategoryOptions as $productCategoryOption)
                        <option value="{{ $productCategoryOption->id }}"
                            {{ old('product_category_id', $product->product_category_id ?? null) == $productCategoryOption->id ? 'selected' : '' }}>
                            {{ $productCategoryOption->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-9 col-9">
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                    name="name" placeholder="" value="{{ old('name', $product->name ?? null) }}" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            rows="5">{{ old('description', $product->description ?? null) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-6 col-6">
            <div class="form-group">
                <label>Price</label>
                <input type="number" min="0" id="price"
                    class="form-control @error('price') is-invalid @enderror" name="price" placeholder=""
                    value="{{ old('price', $product->price ?? null) }}" autofocus>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-6">
            <div class="form-group">
                <label for="formFile" class="form-label">Image</label><br>
                @if ($product->image ?? null)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-thumbnail">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 d-flex mt-4">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {!! $submitLabel !!}
        </button>
        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
    </div>
</form>
