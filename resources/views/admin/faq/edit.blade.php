@extends('layouts.admin.app')
@section('title', 'Edit FAQ')

@section('content')
    <section class="py-4">
        <div class="container-fluid">
            <div class="content-wrap">
                <div class="title-wrap">
                    <h2 class="h5 mb-1">Edit FAQ</h2>
                    <p class="small m-0">Update FAQ information</p>
                </div>

                @if($editingCategory)
                    <!-- Edit Category with all its FAQs -->
                    <div class="form-wrap">
                        <form method="POST" action="{{ route('admin.faq.update', $faq) }}" class="row g-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="category_update" value="1">
                            
                            <div class="col-12">
                                <h4>Edit Category: {{ $editingCategory->title }}</h4>
                            </div>

                            <!-- Category Title -->
                            <div class="col-md-6">
                                <label for="category_title" class="form-label">Category Title *</label>
                                <input type="text" name="category_title" class="form-control" id="category_title" 
                                       value="{{ old('category_title', $editingCategory->title) }}" required>
                                @error('category_title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- FAQs in Category -->
                            <div class="col-12">
                                <label class="form-label">FAQs in this Category</label>
                                <div id="category-faqs-container">
                                    @foreach($categoryFaqs as $index => $categoryFaq)
                                        <div class="faq-item mb-3 border p-3 rounded">
                                            <input type="hidden" name="category_faqs[{{ $index }}][id]" value="{{ $categoryFaq->id }}">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Title *</label>
                                                <input name="category_faqs[{{ $index }}][title]" class="form-control" 
                                                       value="{{ old('category_faqs.'.$index.'.title', $categoryFaq->title) }}" required>
                                                @error('category_faqs.'.$index.'.title')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Description</label>
                                                <textarea name="category_faqs[{{ $index }}][description]" 
                                                          id="faq-editor-{{ $index }}" 
                                                          class="form-control" rows="3">{{ old('category_faqs.'.$index.'.description', $categoryFaq->description) }}</textarea>
                                                @error('category_faqs.'.$index.'.description')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <button type="button" class="btn btn-outline-primary" id="add-category-faq">Add New FAQ to Category</button>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Category & FAQs
                                </button>
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                @else
                    <!-- Edit Single FAQ -->
                    <div class="form-wrap">
                        <form method="POST" action="{{ route('admin.faq.update', $faq) }}" class="row g-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="single_faq_update" value="1">

                            <div class="col-12">
                                <h4>Edit Single FAQ</h4>
                            </div>

                            <!-- FAQ Title -->
                            <div class="col-md-8">
                                <label for="title" class="form-label">FAQ Title *</label>
                                <input type="text" name="title" class="form-control" id="title" 
                                       value="{{ old('title', $faq->title) }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category Selection -->
                            <div class="col-md-4">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" class="form-select" id="category_id">
                                    <option value="">No Category (Normal FAQ)</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $faq->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- FAQ Description -->
                            <div class="col-12">
                                <label for="description" class="form-label">FAQ Description</label>
                                <textarea name="description" id="description" class="form-control" 
                                          rows="5">{{ old('description', $faq->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update FAQ
                                </button>
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let faqIndex = {{ $categoryFaqs->count() ?? 0 }};

            // Initialize TinyMCE for existing textareas
            function initializeTinyMCE(selector) {
                tinymce.init({
                    selector: selector,
                    license_key: 'gpl',
                    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                    height: 200
                });
            }

            // Initialize TinyMCE for existing editors
            @if($editingCategory)
                @foreach($categoryFaqs as $index => $categoryFaq)
                    initializeTinyMCE('#faq-editor-{{ $index }}');
                @endforeach
            @else
                initializeTinyMCE('#description');
            @endif

            // Add new FAQ to category
            document.getElementById('add-category-faq')?.addEventListener('click', function () {
                const container = document.getElementById('category-faqs-container');
                const faqItem = document.createElement('div');
                faqItem.className = 'faq-item mb-3 border p-3 rounded';
                faqItem.innerHTML = `
                    <input type="hidden" name="category_faqs[${faqIndex}][id]" value="">
                    
                    <div class="mb-3">
                        <label class="form-label">FAQ Title *</label>
                        <input name="category_faqs[${faqIndex}][title]" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">FAQ Description</label>
                        <textarea name="category_faqs[${faqIndex}][description]" 
                                  id="faq-editor-${faqIndex}" 
                                  class="form-control" rows="3"></textarea>
                    </div>
                    
                    <button type="button" class="btn btn-outline-danger btn-sm remove-faq">Remove FAQ</button>
                `;
                container.appendChild(faqItem);

                // Initialize TinyMCE for the new textarea
                initializeTinyMCE(`#faq-editor-${faqIndex}`);
                faqIndex++;
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

            // Save all TinyMCE editors on form submit
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    document.querySelectorAll('[id^="faq-editor-"], #description').forEach(editor => {
                        tinymce.get(editor.id)?.save();
                    });
                });
            });
        });
    </script>
@endsection