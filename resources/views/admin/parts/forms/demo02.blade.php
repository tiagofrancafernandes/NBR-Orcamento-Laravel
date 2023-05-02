@extends('layouts.admin-base')
@section('content')
<div class="row">
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
</div>
@endsection

@section('before_body_close')
<script src="https://quickai.bylancer.com/templates/classic-theme/js/jquery-simple-txt-counter.min.js"></script>
<script src="https://quickai.bylancer.com/admin/assets/plugins/tinymce/tinymce.min.js"></script>
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

    // tinymce
    tinymce.init({
        selector: '.tiny-editor',
        min_height: 500,
        resize: true,
        plugins: 'advlist lists table autolink link wordcount fullscreen autoresize',
        toolbar: [
            "blocks | bold italic underline strikethrough | alignleft aligncenter alignright  | link blockquote",
            "undo redo | removeformat | table | bullist numlist | outdent indent"
        ],
        menubar: "",
        // link
        relative_urls: false,
        link_assume_external_targets: true,
        content_style: 'body { font-size:14px }'
    });
</script>
@endsection
