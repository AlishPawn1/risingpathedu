@extends('layouts.admin.app')
@section('title','Add Blog')

@section('content')
<section class="py-4">
  <div class="container-fluid">
    <div class="content-wrap">
      <div class="title-wrap">
        <h2 class="h5 mb-1">Add New Blog</h2>
        <p class="small m-0">Create a new blog</p>
      </div>
      <div class="">

        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="row g-4">
          @csrf

          @include('admin.blogs._form', ['blog' => null])

          <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Create Blog</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')

<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded');
    console.log('TinyMCE available:', typeof tinymce);
    
    // Wait a bit for TinyMCE to load if needed
    setTimeout(() => {
        if (typeof tinymce !== 'undefined') {
            console.log('Initializing TinyMCE...');
            tinymce.init({
                selector: '#content-editor',
                license_key: 'gpl',
                height: 400,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media link | removeformat | code help',
                automatic_uploads: true,
                file_picker_types: 'image',
                images_upload_url: "{{ route('admin.tinymce.upload') }}",
                setup: function(editor) {
                    editor.on('init', function() {
                        console.log('TinyMCE initialized successfully');
                    });
                },
                images_upload_handler: (blobInfo) => {
                    console.log('Image upload handler called');
                    return new Promise((resolve, reject) => {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', "{{ route('admin.tinymce.upload') }}");
                        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                        
                        xhr.onload = function () {
                            console.log('Upload response:', xhr.status, xhr.responseText);
                            if (xhr.status < 200 || xhr.status >= 300) {
                                reject('HTTP Error: ' + xhr.status);
                                return;
                            }
                            
                            let json;
                            try {
                                json = JSON.parse(xhr.responseText);
                            } catch (e) {
                                reject('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            
                            if (!json || typeof json.location !== 'string') {
                                reject('Invalid response: ' + xhr.responseText);
                                return;
                            }
                            
                            resolve(json.location);
                        };
                        
                        xhr.onerror = function () {
                            console.error('Network error during upload');
                            reject('Network Error');
                        };
                        
                        const formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        formData.append('folder', 'blog');
                        
                        console.log('Sending upload request...');
                        xhr.send(formData);
                    });
                }
            });
        } else {
            console.error('TinyMCE not available');
        }
    }, 100);
});
</script> -->
@endpush