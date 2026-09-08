<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="row">
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
