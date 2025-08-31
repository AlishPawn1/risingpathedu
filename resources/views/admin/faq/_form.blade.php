<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Category *</label>
        <select name="faq_category_id" class="form-select" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('faq_category_id', $faq->faq_category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('faq_category_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Question *</label>
        <input name="question" class="form-control" value="{{ old('question', $faq->question ?? '') }}" required>
        @error('question')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Answer *</label>
        <textarea name="answer" id="answer-editor" class="form-control" rows="4" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        @error('answer')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Order</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order ?? 0) }}" min="0">
        @error('order')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>
        <div class="d-flex align-items-center gap-3 mt-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="status_active" value="1" {{ old('is_active', $faq->is_active ?? 1) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="status_active">Active</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_active" id="status_inactive" value="0" {{ old('is_active', $faq->is_active ?? 1) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="status_inactive">Inactive</label>
            </div>
        </div>
        @error('is_active')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Meta Title</label>
        <input name="meta_title" class="form-control" value="{{ old('meta_title', $faq->meta_title ?? '') }}">
        @error('meta_title')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Meta Description</label>
        <input name="meta_description" class="form-control" value="{{ old('meta_description', $faq->meta_description ?? '') }}">
        @error('meta_description')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  tinymce.init({
    selector: '#answer-editor',
    license_key: 'gpl',
    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    height: 400
  });

  // Save TinyMCE on form submit
  const form = document.querySelector('form');
  if (form) {
    form.addEventListener('submit', function (e) {
      tinymce.get('answer-editor')?.save();
    });
  }
});
</script>