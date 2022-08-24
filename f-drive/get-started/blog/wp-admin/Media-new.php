<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    .drag-drop #drag-drop-area {
        border: 4px dashed #b4b9be;
        height: 200px;
    }

    .drag-drop-inside {
        width: 50%;
        margin-left: 31em;
        margin-top: 2%;
    }

    div#drag-drop-area {
        border: dashed 4Px #b4b9be;
        width: 79em;
        padding: 11px 9px 32px 12px;
    }

    input#plupload-browse-button {
        color: #0071a1;
    }

    .footertext {
    margin-top: 27%;
}
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <span>
                    <h2>Upload New Media</h2>
                </span>
            </div>

            <div id="drag-drop-area" style="position: relative;">
                <div class="drag-drop-inside">
                <Form method="POST">
                    <p class="drag-drop-info">Drop files to upload</p>
                    <p>or</p>
                    <p class="drag-drop-buttons"><input id="plupload-browse-button" name="Name_of_file" type="file" value="" class="button" style="position: relative; z-index: 1;"></p>
                </div>
            </div>
            <p>You are using the multi-file uploader. Problems? Try the <a>browser uploader</a> instead.</p>

           

            </p>
            <p class="submit"> <input type="hidden" name="action" value="media">
                            <input type="submit" name="media" value="save data">
                        </form></p>
</Form>
            <div class="footertext">
                <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                        <p style='float: right;'>Version 5.6</p>
                    </i></p>

            </div>
        </div>
    </div>
</div>