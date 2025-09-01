<div class="mb-5">
  <h3>Tabbed FAQs</h3>
  <div id="tabbed-faq-container">
    <!-- Tabbed FAQ Categories -->
    <div class="tabbed-faq-category mb-4">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="tabbed_category_0" class="form-label">Category Title *</label>
          <input type="text" name="tabbed_categories[0][title]" class="form-control" id="tabbed_category_0" required>
        </div>
        <div class="col-12">
          <label class="form-label">FAQs for this Category</label>
          <div class="faq-container" data-category-index="0">
            <!-- FAQs will be added here dynamically -->
          </div>
          <div class="d-flex gap-3">
            <button type="button" class="btn btn-outline-primary add-faq" data-category-index="0">Add FAQ to
              Category</button>
            <button type="button" class="btn btn-outline-danger remove-category">Remove Category</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-primary mt-3" id="add-tabbed-category">Add New Category</button>
</div>

<!-- Normal FAQs Section -->
<div class="mb-5">
  <h3>Normal FAQs</h3>
  <div id="normal-faq-container">
    <!-- Normal FAQs -->
  </div>
  <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-normal-faq">Add New FAQ</button>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    let tabbedCategoryIndex = 1; // Start from 1 since 0 is already in the HTML
    let faqIndices = { 0: 0 }; // Track FAQ indices per category (category index: faq count)

    // Initialize TinyMCE for any existing textareas
    function initializeTinyMCE(selector) {
      tinymce.init({
        selector: selector,
        license_key: 'gpl',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 200
      });
    }

    // Add new tabbed FAQ category
    document.getElementById('add-tabbed-category').addEventListener('click', function () {
      const tabbedFaqContainer = document.getElementById('tabbed-faq-container');
      const categoryDiv = document.createElement('div');
      categoryDiv.className = 'tabbed-faq-category mb-4';
      categoryDiv.innerHTML = `
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="tabbed_category_${tabbedCategoryIndex}" class="form-label">Category Title *</label>
                            <input type="text" name="tabbed_categories[${tabbedCategoryIndex}][title]" class="form-control" id="tabbed_category_${tabbedCategoryIndex}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">FAQs for this Category</label>
                            <div class="faq-container" data-category-index="${tabbedCategoryIndex}">
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2 add-faq" data-category-index="${tabbedCategoryIndex}">Add FAQ to Category</button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm mt-2 remove-category">Remove Category</button>
                    </div>
                `;
      tabbedFaqContainer.appendChild(categoryDiv);
      faqIndices[tabbedCategoryIndex] = 0; // Initialize FAQ index for new category
      tabbedCategoryIndex++;
    });

    // Add FAQ to a specific category
    document.addEventListener('click', function (e) {
      if (e.target.classList.contains('add-faq')) {
        const categoryIndex = e.target.getAttribute('data-category-index');
        const faqContainer = document.querySelector(`.faq-container[data-category-index="${categoryIndex}"]`);
        const faqIndex = faqIndices[categoryIndex] || 0;

        const faqItem = document.createElement('div');
        faqItem.className = 'faq-item mb-3 border p-3 rounded';
        faqItem.innerHTML = `
                        <div class="mb-3">
                            <label class="form-label">FAQ Title *</label>
                            <input name="tabbed_categories[${categoryIndex}][faqs][${faqIndex}][title]" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">FAQ Description</label>
                            <textarea name="tabbed_categories[${categoryIndex}][faqs][${faqIndex}][description]" id="faq-editor-${categoryIndex}-${faqIndex}" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
                    `;
        faqContainer.appendChild(faqItem);

        // Initialize TinyMCE for the new FAQ textarea
        initializeTinyMCE(`#faq-editor-${categoryIndex}-${faqIndex}`);
        faqIndices[categoryIndex] = faqIndex + 1;
      }
    });

    // Add normal FAQ
    let normalFaqIndex = 0;
    document.getElementById('add-normal-faq').addEventListener('click', function () {
      const faqContainer = document.getElementById('normal-faq-container');
      const faqItem = document.createElement('div');
      faqItem.className = 'faq-item mb-3 border p-3 rounded';
      faqItem.innerHTML = `
                    <div class="mb-3">
                        <label class="form-label">FAQ Title *</label>
                        <input name="normal_faqs[${normalFaqIndex}][title]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FAQ Description</label>
                        <textarea name="normal_faqs[${normalFaqIndex}][description]" id="normal-faq-editor-${normalFaqIndex}" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
                `;
      faqContainer.appendChild(faqItem);

      // Initialize TinyMCE for the new FAQ textarea
      initializeTinyMCE(`#normal-faq-editor-${normalFaqIndex}`);
      normalFaqIndex++;
    });

    // Remove FAQ
    document.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-faq')) {
        const faqItem = e.target.closest('.faq-item');
        const editorId = faqItem.querySelector('textarea').id;
        tinymce.get(editorId)?.remove(); // Remove TinyMCE instance
        faqItem.remove();
      }
    });

    // Remove Category
    document.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-category')) {
        const categoryDiv = e.target.closest('.tabbed-faq-category');
        const faqItems = categoryDiv.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
          const editorId = item.querySelector('textarea').id;
          tinymce.get(editorId)?.remove(); // Remove TinyMCE instances
        });
        categoryDiv.remove();
      }
    });

    // Save all TinyMCE editors on form submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
      document.querySelectorAll('[id^="faq-editor-"], [id^="normal-faq-editor-"]').forEach(editor => {
        tinymce.get(editor.id)?.save();
      });
    });
  });
</script>