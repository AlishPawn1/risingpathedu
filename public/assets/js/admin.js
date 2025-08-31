document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: '#content-editor',
                license_key: 'gpl',
                height: 400,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media link | removeformat | code help',
                automatic_uploads: true,
                file_picker_types: 'image',
                images_upload_url: '/admin/tinymce/upload', // Use your route here
                images_upload_handler: function(blobInfo) {
                    return new Promise(function(resolve, reject) {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '/admin/tinymce/upload');
                        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

                        xhr.onload = function () {
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
                            reject('Network Error');
                        };

                        const formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        formData.append('folder', 'blog');
                        xhr.send(formData);
                    });
                }
            });
        }
    }, 100);
});

// Keep your submit saver
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function () {
            const ed = tinymce.get('content-editor');
            if (ed) ed.save();
        });
    }
});

// Toggle password visibility
if(document.querySelector('#togglePassword')) {
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
}