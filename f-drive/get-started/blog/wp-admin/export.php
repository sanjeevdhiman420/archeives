<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 400;
        padding: 2px 0px 0px 6px;
    }

    input#submit {
        background: #00669b;
        border-color: #00669b;
        box-shadow: none;
        color: #fff;
        margin-top: 3%;
    }

    .footertext {
        margin-top: 6%;
    }
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Export</h2>
                <p>When you click the button below WordPress will create an XML file for you to save to your computer.

                </p><br>
                <p>This format, which we call WordPress eXtended RSS or WXR, will contain your posts, pages, comments, custom fields, categories, and tags.

                </p><br>

                <p>Once you’ve saved the download file, you can use the Import function in another WordPress installation to import the content from this site.

                </p>
                <h2>Choose what to export</h2>
                <form method="get" id="export-filters">
                    <input type="hidden" name="download" value="true">
                    <p><label><input type="radio" name="content" value="all" checked="checked" aria-describedby="all-content-desc"> All content</label></p>
                    <p class="description" id="all-content-desc">This will contain all of your posts, pages, comments, custom fields, terms, navigation menus, and custom posts.</p>
                    <p><label><input type="radio" name="content" value="posts"> Posts</label></p>
                    <p><label><input type="radio" name="content" value="pages"> Pages</label></p>
                    <p><label><input type="radio" name="content" value="attachment"> Media</label></p>
                    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Download Export File"></p>

                    <div class="footertext">
                        <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                                <p style='float: right;'>Version 5.6</p>
                            </i></p>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>