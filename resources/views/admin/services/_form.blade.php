<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title *</label>
    <input name="title" class="form-control" value="{{ old('title', $service->title ?? '') }}" required>
    @error('title')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Short Description *</label>
    <input name="short_description" class="form-control"
      value="{{ old('short_description', $service->short_description ?? '') }}">
    @error('short_description')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-12">
    <label class="form-label">Description *</label>
    <textarea name="description" id="description-editor" class="form-control"
      rows="4">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($service?->image))
      <img src="{{ asset('storage/' . $service->image) }}" class="img-thumbnail mt-2" style="max-height:120px">
    @endif
    @error('image')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Icon *</label>
    <input type="file" name="icon" class="form-control">
    @if(!empty($service?->icon))
      <img src="{{ asset('storage/' . $service->icon) }}" class="img-thumbnail mt-2" style="max-height:120px">
    @endif
    @error('icon')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Status</label>
    <div class="d-flex align-items-center gap-3 mt-1">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="is_active" id="status_active" value="1" {{ old('is_active', $service->is_active ?? 1) == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="status_active">Active</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="is_active" id="status_inactive" value="0" {{ old('is_active', $service->is_active ?? 1) == 0 ? 'checked' : '' }}>
        <label class="form-check-label" for="status_inactive">Inactive</label>
      </div>
    </div>
    @error('is_active')
      <div class="text-danger small">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-12">
    <label class="form-label">FAQs</label>
    <div id="faq-container">
      @if(old('faqs', $service->faqs ?? []))
        @foreach(old('faqs', $service->faqs ?? []) as $index => $faq)
          <div class="faq-item mb-3 border p-3 rounded">
            <div class="mb-3">
              <label class="form-label">FAQ Title *</label>
              <input name="faqs[{{$index}}][title]" class="form-control"
                value="{{ old('faqs.' . $index . '.title', $faq['title'] ?? '') }}" required>
              @error('faqs.' . $index . '.title')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">FAQ Description</label>
              <textarea name="faqs[{{$index}}][description]" id="faq-editor-{{$index}}" class="form-control"
                rows="3">{{ old('faqs.' . $index . '.description', $faq['description'] ?? '') }}</textarea>
              @error('faqs.' . $index . '.description')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
          </div>
        @endforeach
      @endif
    </div>
    <div>
      <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-faq">Add New FAQ</button>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  let faqIndex = {{ count(old('faqs', $service->faqs ?? [])) ?: 0 }};

  // Initialize TinyMCE for existing description
  tinymce.init({
    selector: '#description-editor',
    license_key: 'gpl',
    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    height: 400
  });

  // Initialize TinyMCE for existing FAQ editors
  @if(old('faqs', $service->faqs ?? []))
    @foreach(old('faqs', $service->faqs ?? []) as $index => $faq)
      tinymce.init({
        selector: '#faq-editor-{{$index}}',
        license_key: 'gpl',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 200
      });
    @endforeach
  @endif

  // Initially hide FAQ container if no FAQs exist
  const faqContainer = document.getElementById('faq-container');
  if (faqIndex === 0) {
    faqContainer.style.display = 'none';
  }

  document.getElementById('add-faq').addEventListener('click', function () {
    // Show FAQ container when adding first FAQ
    faqContainer.style.display = 'block';

    const faqItem = document.createElement('div');
    faqItem.className = 'faq-item mb-3 border p-3 rounded';
    faqItem.innerHTML = `
      <div class="mb-3">
        <label class="form-label">FAQ Title *</label>
        <input name="faqs[${faqIndex}][title]" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">FAQ Description</label>
        <textarea name="faqs[${faqIndex}][description]" id="faq-editor-${faqIndex}" class="form-control" rows="3"></textarea>
      </div>
      <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
    `;
    faqContainer.appendChild(faqItem);

    // Initialize TinyMCE for the new FAQ textarea
    tinymce.init({
      selector: `#faq-editor-${faqIndex}`,
      license_key: 'gpl',
      plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      height: 200
    });

    faqIndex++;
  });

  document.getElementById('faq-container').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-faq')) {
      const faqItem = e.target.closest('.faq-item');
      const editorId = faqItem.querySelector('textarea').id;
      tinymce.get(editorId)?.remove(); // Remove TinyMCE instance
      faqItem.remove();
      // Hide FAQ container if no FAQ items remain
      if (faqContainer.children.length === 0) {
        faqContainer.style.display = 'none';
      }
    }
  });

  // Save all TinyMCE editors on form submit
  const form = document.querySelector('form');
  if (form) {
    form.addEventListener('submit', function (e) {
      tinymce.get('description-editor')?.save();
      document.querySelectorAll('[id^="faq-editor-"]').forEach(editor => {
        tinymce.get(editor.id)?.save();
      });
    });
  }
});
</script>