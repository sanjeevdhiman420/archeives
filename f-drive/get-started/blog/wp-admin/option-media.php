<?php

require_once __DIR__.'/../bootstrap/app.php';

require_once file_header();
require_once file_slider(); ?>
<style>
    label {
        margin-left: 30%;
    }

    input#thumbnail_size_w {
        margin-left: 3%;
        width: 11%;
        margin-top: 15px;
    }

    input#thumbnail_size_h {
        margin-left: 2%;
        width: 11%;
        margin-top: 15px;
    }

    input#Medium_size_w {
        width: 11%;
        margin-left: 3%;
    }

    input#Medium_size_h {
        width: 11%;
        margin-left: 2%;
    }

    input#large_size_w {
        width: 11%;
        margin-left: 3%;
    }

    input#large_size_h {
        width: 11%;
        margin-left: 2%;
    }

    .input {
        margin-top: -8%;
    }

    .lable {
        margin-top: 7%;
    }

    .checkboxs {
        margin-left: 26%;
    }

    .labletext {
        margin-left: -37%;
        margin-top: -4%;
    }

    .uploadingtext {
        margin-left: -39%;
        margin-top: -3%;
    }

    input[type="button"] {
        color: white;
        background: #007cba;
        border-color: #007cba;
        margin-top: 1%;
    }
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Media Settings</h2>
                <h5><b>Images Size</b></h5>
                <p>The sizes listed below determine the maximum dimensions in pixels to use when adding an image to the Media Library.</p>
                <div>

                    <div class="lable"><b>Thumbnail Size</b></div>

                    <div class="input">
                        <table class="form-table">
                            <tbody>
                                <form action="">

                                    <label for="width">width</label>
                                    <input name="thumbnail_size_w" type="number" step="1" min="0" id="thumbnail_size_w" value="150" class="small-text"><br>
                                    <label for="hieght">Height</label>
                                    <input name="thumbnail_size_h" type="number" step="1" min="0" id="thumbnail_size_h" value="150" class="small-text"><br><br>

                    </div>
                    <div class="checkboxs">
                        <input name="thumbnail_crop" type="checkbox" id="thumbnail_crop" value="1" checked="checked">
                        <div class="labletext"> <label for="thumbnail_crop">Crop thumbnail to exact dimensions (normally thumbnails are proportional)</label>
                        </div>
                        </tbody>
                        </table>
                        </form>
                    </div>
                    <div class="m-size">
                        <div class="lable"><b>Medium size</b></div>

                        <div class="input">
                            <table class="form-table">
                                <tbody>
                                    <form action="">

                                        <label for="M-width">Max width</label>
                                        <input name="Medium_size_w" type="number" step="1" min="0" id="Medium_size_w" value="300" class="small-text"><br><br>
                                        <label for="M-hieght">Max Height</label>
                                        <input name="Medium_size_h" type="number" step="1" min="0" id="Medium_size_h" value="300" class="small-text"><br><br>

                        </div>
                    </div>
                    <div class="large-size">
                        <div class="lable"><b>Large Size</b></div>

                        <div class="input">
                            <table class="form-table">
                                <tbody>
                                    <form action="">

                                        <label for="large-width">Max width</label>
                                        <input name="large_size_w" type="number" step="1" min="0" id="large_size_w" value="1024" class="small-text"><br><br>
                                        <label for="hieght">Max Height</label>
                                        <input name="largel_size_h" type="number" step="1" min="0" id="large_size_h" value="1024" class="small-text"><br><br>

                        </div>
                    </div>
                </div>
                <h3>Uploading Files</h3>
                <div class="checkboxes">
                    <input name="uploading-files" type="checkbox" id="uploading-files value=" 1" checked="checked">
                    <div class="uploadingtext"> <label for="uploading-files"> Organize my uploads into month- and year-based folders
                        </label>
                    </div>
                    <input type="button" name="save" value="save changes">
                </div>
            </div>
            <footer>
                <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                        <p style='float: right;'>Version 5.6</p>
                    </i></p>
            </footer>
        </div>
    </div>
</div>
</div>