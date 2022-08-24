<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    th#display {
        padding: 25px 57px 147px 0px;
    }

    th#feeds {
        padding: 54px 15px 56px 0px;
    }

    th#theme {
        padding: 0px 4px 81px 5px;
    }

    th#scope {
        padding: 36px 0px 69px 18px;
    }

    input#submit {
        background: #007cba;
        border-color: #007cba;
        color: white;
    }
</style>

<div class='dashborad'>
    <div class='row dash-row'>
        <div class='col-lg-12'>
            <div class='heading'>
                <h2><b>Reading settings</b></h2>
                <table class="form-table" role="presentation">
                <form method="post">

                    <tbody>
                        <tr>
                            <th id="display" scope="row">Your homepage displays</th>
                            <td id="front-static-pages">
                                <p><label>
                                        <input name="latest-post" type="radio" value="posts" class="tog" checked="checked">
                                        Your latest posts </label>
                                </p>
                                <p><label>
                                        <input name="show_on_front" type="radio" value="page" class="tog">
                                        A <a href="">static page</a> (select below) </label>
                                </p>
                                <ul>
                                    <li><label for="page_on_front">
                                            Homepage: <select name="page_on_front" id="page_on_front">
                                                <option value="0">— Select —</option>
                                                <option class="level-0" value="2">Sample Page</option>
                                            </select>
                                        </label></li>
                                    <li><label for="page_for_posts">
                                            Posts page: <select name="page_for_posts" id="page_for_posts">
                                                <option value="0">— Select —</option>
                                                <option class="level-0" value="2">Sample Page</option>
                                            </select>
                                        </label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th id="blog" scope="row"><label for="posts_per_page">Blog pages show at most</label></th>
                            <td>
                                <input name="posts_per_page" type="number" step="1" min="1" id="posts_per_page" value="10" class="small-text"> posts
                            </td>
                        </tr>

                        <tr>
                            <th id="feeds" scope="row"><label for="posts_per_rss">Syndication feeds show the most recent</label></th>
                            <td><input name="posts_per_rss" type="number" step="1" min="1" id="posts_per_rss" value="10" class="small-text"> items</td>
                        </tr>

                        <tr>
                            <th id="theme" scope="row">For each post in a feed, include </th>
                            <td>
                                <p>
                                    <label><input name="rss_use_excerpt" type="radio" value="0" checked="checked"> Full text</label><br>
                                    <label><input name="rss_use_excerpt" type="radio" value="1"> Summary</label>
                                </p>
                                <p class="description">
                                    Your theme determines how content is displayed in browsers. <a href="#">Learn more about feeds</a>. </p>
                            </td>
                        </tr>

                        <tr>
                            <th id="scope" scope="row">Search engine visibility </th>
                            <td>
                                <label for="blog_public"><input name="blog_public" type="checkbox" id="blog_public" value="0" checked="checked">
                                    Discourage search engines from indexing this site</label>
                                <p class="description">It is up to search engines to honor this request.</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <p class="submit"> <input type="hidden" name="action" value="reading">
                            <input type="submit" name="reading" value="save changes">
                        </form></p>                <div>
                    <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                            <p style='float: right;'>Version 5.6</p>
                        </i></p>
                </div>
            </div>
        </div>
    </div>
</div>