document.addEventListener("DOMContentLoaded", () => {

    tinymce.init({
        selector: 'textarea#other-pages',
        plugins: 'link code lists',
        toolbar: 'undo redo | styleselect bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link bullist numlist outdent indent code ', // undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code,
        menubar: false,
        branding: false,
        height: 300,
        skin: 'oxide-dark',
        content_css: 'dark',
        valid_elements: '*[*]',
        entity_encoding: 'raw',
        extended_valid_elements: 'a[href|target]',
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });
})
