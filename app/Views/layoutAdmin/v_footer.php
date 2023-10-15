<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- font awesome icon picker -->
<script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/adminLTE/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/adminLTE/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- adminLTELTE App -->
<script src="<?= base_url() ?>/adminLTE/template/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>/IconPicker-main/dist/iconpicker-1.5.0.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
<script src="https://kit.fontawesome.com/2f5b6520f9.js" crossorigin="anonymous"></script>

<script>
    /*!
     * IconPicker DEMO ('https://github.com/furcan/IconPicker')
     * Version: 1.5.0
     * Author: Furkan MT ('https://github.com/furcan')
     * Dependencies: FontAwesome v5.11.2 (https://fontawesome.com/license/free)
     * Copyright 2019 IconPicker, MIT Licence ('https://opensource.org/licenses/MIT')*
     */

    // DEMO: IconPicker on
    IconPicker.Init({
        jsonUrl: '<?= base_url(); ?>/IconPicker-main/dist/iconpicker-1.5.0.json',
    });
    IconPicker.Run('#GetIconPicker', function() {
        console.log('Icon Picker');
    });
    // IconPicker.Run('#GetIconPicker');
    // DEMO: IconPicker off


    // DEMO: Notiflix Notification Library on
    Notiflix.Notify.Init({
        width: '340px',
        plainText: false,
        messageMaxLength: 4000,
        googleFont: false,
        fontFamily: 'Muli',
        fontSize: '14px',
        timeout: 4500,
        position: 'right-bottom',
        cssAnimationStyle: 'from-bottom',
    });
    // DEMO: Notiflix Notification Library off

    // DEMO: Tooltip on
    function furcanTooltip(tooltip) {
        $('body > .tooltip').remove();
        $(tooltip).tooltip({
            trigger: 'hover',
            container: 'body',
        });
    }
    furcanTooltip('[data-toggle="tooltip"]');

    $(document).on('click', function() {
        if ($('body > .tooltip').length > 0) {
            $('body > .tooltip').remove();
        }
    });
    // DEMO: Tooltip off

    // DEMO: Check localstarege and get data on
    if (localStorage) {

        // if icon data exist
        var nameData = localStorage.getItem('name');
        var descriptionData = localStorage.getItem('description');
        var iconData = localStorage.getItem('icon');
        if (iconData && nameData && descriptionData) {
            document.getElementById('Name').value = nameData; // dom name value
            document.getElementById('Description').value = descriptionData; // dom description value
            document.getElementById('IconInput').value = iconData; // dom input value
            document.getElementById('IconPreview').className = iconData; // dom preview icon classname
        }
    }
    // DEMO: Check localstarege and get data off


    // DEMO: Form submit listener on
    var demoForm = document.getElementById('DemoForm');
    demoForm.addEventListener('submit', function(e) {
        e.preventDefault();
        submitFormLocalStorage();
    }, false);
    // DEMO: Form submit listener off

    // DEMO: Form save local storage on
    function submitFormLocalStorage() {
        var nameData = document.getElementById('Name').value;
        var descriptionData = document.getElementById('Description').value;
        var iconData = document.getElementById('IconInput').value;

        if (nameData.length > 0 && descriptionData.length > 0 && iconData.length > 0) {

            // local storage
            localStorage.setItem('name', nameData);
            localStorage.setItem('description', descriptionData);
            localStorage.setItem('icon', iconData);

            // code element
            var code = '<span class="l1">?Name=<span class="name">' + nameData + '</span>&Description=<span class="name">' + descriptionData + '</span>&Icon=<span class="name">' + iconData + '</span></span>';
            var codeElement = document.getElementById('DemoCode');
            codeElement.innerHTML = code;

            // success notification
            Notiflix.Notify.Success('Your form successfully saved to LocalStorage.');

        }
        if (nameData.length <= 0) {
            Notiflix.Notify.Failure('Module name is required.');
        }
        if (descriptionData.length <= 0) {
            Notiflix.Notify.Failure('Module description is required.');
        }
        if (iconData.length <= 0) {
            Notiflix.Notify.Failure('Module icon is required.');
        }
    }
    // DEMO: Form save local storage off


    // DEMO: Check Browser on
    $(document).on('click', 'button#GetIconPicker', function() {
        // if chrome browser
        if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
            // if protocol not http
            if (window.location.protocol.indexOf('http') <= -1) {
                var theMessage = 'Your protocol is: <b style="transform:scale(1.1);">' + window.location.protocol + '</b> <br />Chrome Browser blocked this request by CORS policy. You can try on Firefox Browser.';
                Notiflix.Notify.Failure(theMessage);
                return false;
            }
        }
    });
    // DEMO: Check Browser off

    // DEMO: Button Highlighted on
    $(document).on('mouseenter', 'code span.the-button', function() {
        $('.form-input button#GetIconPicker').addClass('highlighted');
    });
    $(document).on('mouseleave', 'code span.the-button', function() {
        $('.form-input button#GetIconPicker').removeClass('highlighted');
    });
    // DEMO: Button Highlighted off

    // DEMO: Input Highlighted on
    $(document).on('mouseenter', 'code span.the-input', function() {
        $('.form-input div.export').addClass('highlighted');
    });
    $(document).on('mouseleave', 'code span.the-input', function() {
        $('.form-input div.export').removeClass('highlighted');
    });
    // DEMO: Input Highlighted off

    // DEMO: Icon Highlighted on
    $(document).on('mouseenter', 'code span.the-preview', function() {
        $('.form-input div.icon-preview').addClass('highlighted');
    });
    $(document).on('mouseleave', 'code span.the-preview', function() {
        $('.form-input div.icon-preview').removeClass('highlighted');
    });
    // DEMO: Icon Highlighted off
</script>
<script>
    (async () => {
        const response = await fetch('https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/fontawesome4.json')
        const result = await response.json()

        new Iconpicker(document.querySelector(".iconpicker"), {
            icons: result,
            showSelectedIn: document.querySelector(".selected-icon"),
            searchable: true,
            selectedClass: "selected",
            containerClass: "my-picker",
            hideOnSelect: true,
            fade: true,
            defaultValue: 'bi-alarm',
            valueFormat: val => `fa ${val}`
        })
    })()
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "searching": true,
            "lengthChange": true,
            "autoWidth": false,
            "ordering": true,
            "lengthChange": true,
        })
    });
</script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Detail Paket',
        // // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("editor1"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [{
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        // // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Detail Paket',
        // // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [{
                name: /.*/,
                attributes: true,
                classes: true,
                styles: true
            }]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [{
                marker: '@',
                feed: [
                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                    '@sugar', '@sweet', '@topping', '@wafer'
                ],
                minimumCharacters: 1
            }]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#sosmed").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .admin/template)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .admin/template)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- untuk preview gambar -->
<script>
    function previewImg() {

        const gambar = document.querySelector('#gambar_layanan');
        const gambarlabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarlabel.textContent = gambar.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<script>
    function previewImglogo() {

        const gambar = document.querySelector('#logo');
        const gambarlabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview-logo');

        gambarlabel.textContent = gambar.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<script>
    function previewImglogoheader() {

        const gambar = document.querySelector('#logo_header');
        const gambarlabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview-logo-header');

        gambarlabel.textContent = gambar.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<script>
    function previewLgKlien() {

        const gambar = document.querySelector('#logo_klien');
        const gambarlabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarlabel.textContent = gambar.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
</body>

</html>