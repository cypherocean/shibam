
class FormSubmitClass {
    formSubmit() {
        $('.kt-form__help').html('');
        $('.help-block').html('');
        $('.m-form__help').html('');
        $('#submit').html('Please Wait...');
        $("#submit").attr("disabled", true);
        var form = $('#form');
        $.ajax({
            url : form.attr('action'),
            type : form.attr('method'),
            data : new FormData($('#form')[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            async:false,
            success: function (response) {
                console.log(response);
                if (response.code == 200) {
                    window.location.href = APP_URL+'/admin/product/';
                } else {
                    toastr.error(response.message, 'Error');
                }
                $('#submit').html('Submit');
                $("#submit").attr("disabled", false);
                document.getElementById("form").reset();
            },
            error: function (response) {
                if (response.status === 422) {
                    var errors_ = response.responseJSON;
                    $('.kt-form__help').html('');
                    $.each(errors_.errors, function (key, value) {
                        $('.' + key).html(value);
                    });
                    $('#submit').html('Submit');
                    $("#submit").attr("disabled", false);
                }
            }
        });
    }
}

class InitJsClass {
    onLoad() {
        $('.category_dd').select2({
            placeholder: 'Select category',
            allowClear: true,
            theme: "bootstrap",
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop profile image here or click',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
        CKEDITOR.ClassicEditor.create(document.getElementById("product_description"), {
            toolbar: {
                items: [
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|'
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
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Add Product Description Here!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
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

        $('.dropify').dropify();

        var dropifyElements = {};
        $('.dropify').each(function () {
            dropifyElements[this.id] = false;
        });
    }
}

class EventsJsClass {
    clonAdd() {
        let id = $('[id^=variant-template-]').last().attr('id');
        id = id.replace('variant-template-', '');
        let counter = parseInt(id) + 1;
        var clone_input = `<div class="form-group col-sm-12" id="variant-template-${counter}">
                                <div class="row">
                                    <div class="form-group col-sm-10">
                                        <label for="variant">Variant</label>
                                        <input type="text" class="form-control" id="variant" name="variant[]" placeholder="Please enter variant" value="">
                                        <span class="kt-form__help error variant"></span>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="variant"></label>
                                        <span class="btn waves-effect waves-light btn-rounded btn-outline-primary clone-minus" data-id="${counter}"><i class="fa fa-minus"></i></span>
                                    </div>
                                </div>
                        </div>`;
        $(clone_input).insertAfter($('#variant-template-' + parseInt(id)));
    }

    clonRemove(id) {
        $(`#variant-template-${id}`).remove();
    }
}

const FormSubmitConst = new FormSubmitClass();
const InitJsConst = new InitJsClass();
const EventJsConst = new EventsJsClass();

$(function () {
    InitJsConst.onLoad();
}).on('click', '.clone-add', function () {
    EventJsConst.clonAdd();
}).on('click', '.clone-minus', function () {
    let id = $(this).data('id');
    EventJsConst.clonRemove(id);
}).on("submit", "#form", function (e) {
    e.preventDefault();
    FormSubmitConst.formSubmit();
});