<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
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
        <div class="col-md-3 col-3">
            <div class="form-group">
                <label>Category</label>
                <select name="article_category_id" id="article_category_id"
                    class="form-control @error('article_category_id') is-invalid @enderror" placeholder=""
                    value="{{ old('article_category_id', $article->article_category_id ?? null) }}" required autofocus>
                    <option value="">-- Select Category --</option>
                    @foreach ($articleCategoryOptions as $articleCategoryOption)
                        <option value="{{ $articleCategoryOption->id }}"
                            {{ old('article_category_id', $article->article_category_id ?? null) == $articleCategoryOption->id ? 'selected' : '' }}>
                            {{ $articleCategoryOption->name }}
                        </option>
                    @endforeach
                </select>
                @error('article_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-9 col-9">
            <div class="form-group">
                <label>Title</label>
                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                    name="title" placeholder="" value="{{ old('title', $article->title ?? null) }}" autofocus>
                @error('title')
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
    </div>
    <div class="form-group mb-3">
        <label class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $article->content ?? null) }}</textarea>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="formFile" class="form-label">Image</label><br>
        @if ($article->image ?? null)
            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-thumbnail">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 col-md-12 d-flex mt-4">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {!! $submitLabel !!}
        </button>
        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
    </div>
</form>
