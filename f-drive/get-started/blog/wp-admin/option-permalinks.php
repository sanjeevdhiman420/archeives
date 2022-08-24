<?php

require_once __DIR__.'/../bootstrap/app.php';

require_once file_header();
require_once file_slider(); ?>
<style>
    h2 {
        color: #23282d;
        font-size: 1.3em;
        margin: 1em 0;
    }

    h1 {
        font-size: 24px;
    }

    code {
        padding: 3px 5px 2px 5px;
        margin: 0 1px;
        color: #444;
        background: rgba(0, 0, 0, .07);
        font-size: 13px;
    }

    th.space {
        padding: 21px;
    }

    .btnss {
        margin-top: -1%;
        margin-left: 15%;
    }

    li {
        list-style: none;
        float: left;
        padding: 0 4px;
        color: #016087;
    }

    ol,
    ul {
        margin-top: 0;
        margin-bottom: 10px;
        margin-left: 128px;
    }


    .option {
        margin-top: 4%;
    }

    input#submit {
        background-color: #007cba;
        border: #007cba;
        color: white;
        font-family: inherit;
        margin-left: 1%;
    }
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h1>Permalink Settings</h1>
                <p>WordPress offers you the ability to create a custom URL structure for your permalinks and archives. Custom URL structures can improve the aesthetics, usability, and forward-compatibility of your links. A <a href=""> number of tags are available, </a> and here are some examples to get you started.</p>
                <h2 class="title">Common Settings</h2>
                <table class="form-table permalink-structure">
                    <tbody>

                        <tr>
                            <th scope="row" class="space"><label><input name="selection" type="radio" value=""> Plain</label></th>
                            <td><code>http://localhost/wordpress/?p=123</code><br></td>
                        </tr>
                        <tr>
                            <th scope="row" class="space"><label><input name="selection" type="radio" value="/%year%/%monthnum%/%day%/%postname%/" checked="checked"> Day and name</label></th>
                            <td><code>http://localhost/wordpress/2021/02/04/sample-post/</code></td>
                        </tr>
                        <tr>
                            <th scope="row" class="space"><label><input name="selection" type="radio" value="/%year%/%monthnum%/%postname%/"> Month and name</label></th>
                            <td><code>http://localhost/wordpress/2021/02/sample-post/</code></td>
                        </tr>
                        <tr>
                            <th scope="row" class="space"><label><input name="selection" type="radio" value="/archives/%post_id%"> Numeric</label></th>
                            <td><code>http://localhost/wordpress/archives/123</code></td>
                        </tr>
                        <tr>
                            <th scope="row" class="space"><label><input name="selection" type="radio" value="/%postname%/"> Post name</label></th>
                            <td><code>http://localhost/wordpress/sample-post/</code></td>
                        </tr>
                        <tr>
                            <th scope="row" class="space">
                                <label><input name="selection" id="custom_selection" type="radio" value="custom">
                                    Custom Structure </label>
                            </th>
                            <td>
                                <code>http://localhost/wordpress</code>
                                <input name="permalink_structure" id="permalink_structure" type="text" value="/%year%/%monthnum%/%day%/%postname%/" class="regular-text code">



                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="btnss">
                    <p>Available tags:</p>


                </div>
                <div class="lists">
                    <ul role="list">
                        <li>
                            <button class="button" id="year" name="year" value="%Year%">%year%</button>
                        </li>
                        <li>
                            <button class="button button-primary" id="monthnum" name="monthnum" value="%monthnum%">%monthnum%</button>
                        </li>
                        <li>
                            <button class="button" id="day" name="day" value="%day%">%day%</button>
                        </li>
                        <li>
                            <button class="button" id="hour" name="hour" value="%hour%">%hour%</button>
                        </li>
                        <li>
                            <button class="button" id="minute" name="minute" value="%minute%">%minute%</button>
                        </li>
                        <li>
                            <button class="button" id="second" name="second" value="%second%">%second%</button>
                        </li>
                        <li>
                            <button class="button" id="post_id" name="post_id" value="%post_id%">%post_id%</button>
                        </li>
                        <li>
                            <button class="button" id="postname" name="postname" value="%postname%">%postname%</button>
                        </li>
                        <li>
                            <button class="button" id="category" name="category" value="%category%">%category%</button>
                        </li>
                        <li>
                            <button class="button" id="author" name="author" value="%author%">%author%</button>
                        </li>
                    </ul>
                </div>
                <div class="option">
                    <h2 class="title">Optional</h2>
                </div>
                <p>
                    If you like, you may enter custom structures for your category and tag URLs here. For example, using <code>topics</code> as your category base would make your category links like <code>http://localhost/wordpress/topics/uncategorized/</code>. If you leave these blank the defaults will be used.</p>
                <div class="changes">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th class="space"><label for="category_base">Category base</label></th>
                                <td> <input name="category_base" id="category_base" type="text" value="" class="regular-text code"></td>
                            </tr>
                            <tr>
                                <th class="space"><label for="tag_base">Tag base</label></th>
                                <td> <input name="tag_base" id="tag_base" type="text" value="" class="regular-text code"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
                <div>
                    <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                            <p style='float: right;'>Version 5.6</p>
                        </i></p>

                </div>

            </div>
        </div>
    </div>
</div>