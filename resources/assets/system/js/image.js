$(document).ready(function () {
    $('#image').change(function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').attr('alt', file.name);
                $('#drop-image').empty();
            }
            reader.readAsDataURL(file);
        }
    });
});