import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.ckeditor').forEach((textarea) => {
        ClassicEditor
            .create(textarea)
            .catch(error => {
                console.error(error);
            });
    });
});
