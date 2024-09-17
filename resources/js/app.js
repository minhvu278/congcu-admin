import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

import select2 from 'select2';
select2();

$(document).ready(function() {
    $('.select2').select2();
});

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
