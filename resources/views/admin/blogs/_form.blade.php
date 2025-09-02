<div class="col-md-6">
    <label class="form-label">Title <span class="required">*</span></label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $blog->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Author <span class="required">*</span></label>
    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
        value="{{ old('author', $blog->author ?? '') }}" required>
    @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-12">
    <label class="form-label">Description <span class="required">*</span></label>
    <textarea name="description" id="content-editor" class="form-control @error('description') is-invalid @enderror"
        rows="4">{{ old('description', $blog->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Categories</label>
    <div class="d-flex flex-wrap gap-3">
        @foreach($allCategories as $c)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $c->id }}"
                    id="cat-{{ $c->id }}" @checked(in_array($c->id, $selectedCategoryIds))>
                <label class="form-check-label" for="cat-{{ $c->id }}">{{ $c->name }}</label>
            </div>
        @endforeach
    </div>
    <div class="mt-2">
        <input type="text" name="new_categories" class="form-control @error('new_categories') is-invalid @enderror"
            placeholder="Add new categories (comma separated)">
        @error('new_categories')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @error('categories')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Tags</label>
    <div class="d-flex flex-wrap gap-3">
        @foreach($allTags as $t)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $t->id }}" id="tag-{{ $t->id }}"
                    @checked(in_array($t->id, $selectedTagIds))>
                <label class="form-check-label" for="tag-{{ $t->id }}">{{ $t->name }}</label>
            </div>
        @endforeach
    </div>
    <div class="mt-2">
        <input type="text" name="new_tags" class="form-control @error('new_tags') is-invalid @enderror"
            placeholder="Add new tags (comma separated)">
        @error('new_tags')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @error('tags')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Image <span class="required">*</span></label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @if(!empty($blog->image))
        <div class="mt-2"><img src="{{ asset('storage/' . $blog->image) }}" alt="" style="max-height:120px"></div>
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Status</label>
    <div class="d-flex gap-3">
        <div class="form-check">
            <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status"
                value="draft" id="st-draft" @checked(old('status', $blog->status ?? 'draft') == 'draft')>
            <label for="st-draft" class="form-check-label">Draft</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status"
                value="published" id="st-published" @checked(old('status', $blog->status ?? 'draft') == 'published')>
            <label for="st-published" class="form-check-label">Published</label>
        </div>
    </div>
    @error('status')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

