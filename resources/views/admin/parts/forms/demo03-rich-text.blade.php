@extends('layouts.admin-base')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="dashboard-box margin-top-0 margin-bottom-30">
            <!-- Headline -->
            <div class="headline">
                <h3><i class="fa fa-align-left"></i>Generated Result</h3>
                <div class="margin-left-auto line-height-1">
                    <a href="#" class="button ripple-effect btn-sm" id="export_to_word"
                       data-tippy-placement="top"
                       title="Export as Word Document"><i class="fa fa-file-word-o"></i></a>
                    <a href="#" class="button ripple-effect btn-sm" id="export_to_txt"
                       title="Export as Text File"
                       data-tippy-placement="top"><i class="fa fa-file-text-o"></i></a>
                    <a href="#" class="button ripple-effect btn-sm" id="copy_text"
                       title="Copy Text"
                       data-tippy-placement="top"><i class="fa fa-copy"></i></a>
                </div>
            </div>
            <div class="content with-padding">
                <div id="content-focus"></div>
                <textarea name="content" class="tiny-editor"></textarea>
            </div>
        </div>
    </div>

    <!-- Dashboard Box -->
    <div class="col-md-4">
        <form id="speech_to_text" name="speech_to_text" method="post" action="#">
            <div class="dashboard-box margin-top-0 margin-bottom-30">
                <!-- Headline -->
                <div class="headline">
                    <h3>
                        <i class="icon-feather-headphones"></i>Speech to Text                                    </h3>
                </div>
                <div class="content with-padding">
                    <div class="notification small-notification notice">Create audio transcription from a file.</div>
                    <div>
                        <div class="submit-field margin-bottom-20">
                            <h6>Title</h6>
                            <input name="title" type="text" class="with-border small-input quick-text-counter"
                                   data-maxlength="100">
                        </div>
                        <div class="submit-field margin-bottom-20">
                            <h6>Upload Media<span class="form-required">*</span></h6>
                            <div class="uploadButton margin-top-0">
                                <input class="uploadButton-input" name="file" type="file" id="upload">
                                <label class="uploadButton-button ripple-effect" for="upload">Upload Media</label>
                            </div>
                            <small>.mp3, .mp4, .mpeg, .mpga, .m4a, .wav, .webm allowed.&nbsp;Max file size: 5 MB</small>
                        </div>
                        <div class="submit-field margin-bottom-20">
                            <h6>Audio Description</h6>
                            <textarea name="description" class="with-border small-input quick-text-counter" data-maxlength="200"></textarea>
                            <small>Describe the speech from the file to help the AI. (Optional)</small>
                        </div>
                        <small class="form-error"></small>
                        <button type="submit" name="submit"
                                    class="button ripple-effect full-width">Generate                                                <i class="icon-feather-arrow-right"></i></button>
                        <div class="notification small-notification notice margin-top-5">Audio transcription may takes time due to the file size.</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('before_body_close')
<script src="{{ url('/') }}/dashboard-assets/js/jquery-simple-txt-counter.min.js"></script>
<script src="{{ url('/') }}/dashboard-assets/js/tinymce/tinymce.min.js"></script>

<script>
    // text counter
    $('.quick-text-counter').each(function () {
        var $this = $(this);

        $this.simpleTxtCounter({
            maxLength: $this.data('maxlength'),
            countElem: '<div class="form-text"></div>',
            lineBreak: false,
        });
    });

    // https://www.tiny.cloud/docs/tinymce/6/template/#template-plugin-examples
    let templateOptions = {
        template_cdate_classes: 'cdate creationdate',
        template_mdate_classes: 'mdate modifieddate',
        template_selected_content_classes: 'selcontent',
        template_cdate_format: '%m/%d/%Y : %H:%M:%S',
        template_mdate_format: '%m/%d/%Y : %H:%M:%S',
        template_tsdate_format: '%m/%d/%Y : %H:%M:%S',
        template_replace_values: {
            username: 'Jack Black',
            staffid: '991234'
        },
        templates: [
            {
                title: 'Editor Details',
                url: "{{ route('try.view', ['view' => 'admin/parts/forms/tinymce-template-content-02']) }}",
                description: 'Adds Editor Name and Staff ID'
            },
            // {
            //     title: 'Timestamp',
            //     url: 'time.html',
            //     description: 'Adds an editing timestamp.'
            // }
            {
                title: 'Date timestamp',
                description: 'Cdate example',
                content: '<p class="cdate">This will be replaced with the creation date</p>'
            },
            {
                title: 'Date timestamp STR',
                description: 'Timestamp STR',
                content: '<p class="cdate">Format: %m/%d/%Y : %H:%M:%S</p>'
            },
        ]
    };

    // tinymce
    tinymce.init({
        // selector: 'textarea', // change this according to your HTML
        selector: '.tiny-editor',
        // width: 600,
        // height: 300,
        min_height: 500,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
            'table', 'emoticons', 'template', 'help', 'autoresize',
        ],
        resize: true,
        toolbar: [
            'undo redo | template | forecolor backcolor emoticons | image | print preview media fullscreen' +
            '| link blockquote | searchreplace | help',
            'styles | bold italic underline strikethrough | removeformat| alignleft aligncenter alignright alignjustify' +
            'table | bullist numlist | outdent indent',
        ],
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview | showcomments' },
            insert: { title: 'Insert', items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | tableprops deletetable' },
            help: { title: 'Help', items: 'help' },
            happy: { title: 'Happy', items: 'code' },
            // Favorite items
            favs: { title: 'Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        // https://www.tiny.cloud/docs/tinymce/6/basic-setup/#break-down-of-the-basic-configuration-example
        menubar: 'file edit view insert format tools table favs help',
        relative_urls: false,
        link_assume_external_targets: true,
        // content_style: 'body { font-size:14px }',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        ...templateOptions,
    });
</script>
@endsection
