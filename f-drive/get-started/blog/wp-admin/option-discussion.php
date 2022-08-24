<?php

require_once __DIR__.'/../bootstrap/app.php';

require_once file_header();
require_once file_slider(); ?>

<style>
    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 400;
        line-height: 2.5rem;
    }

    th#heading {
        padding: 17px 47px 120px 27px;
        line-height: 1.5rem;
    }

    th#headings {
        padding: 7px 1px 206px 20px;
    }

    th#head {
        padding: 37px 0 78px 17px;
    }

    th#comment {
        padding: 0 0 33px 13px;
    }

    td {
        padding: 0 0 0 19px;
    }

    label#moderate {
        margin-left: 20%;
        margin-top: -3%;

    }

    input#comment_max_links {
        WIDTH: 6%;
    }

    label#comment {
        margin-left: 20%;
        margin-top: -3%;

    }


    .h4,
    h4 {
        font-size: 15px;
        margin-left: 1%;
        font-weight: 700;
    }

    textarea#moderation_keys {
        width: 77%;
        margin-left: 20%;
    }

    textarea#comment_keys {
        width: 77%;
        margin-left: 20%;
    }

    th.avtar {
        padding: 22px 96px 26px 13px;
    }

    th.rating {
        padding: 0 0 95px 14px;
    }

    th#setting {
        padding: 27px 13px 299px 16px;
    }

    p.submit {
        margin-left: 25px;
        color: white;
    }

    input#submit {
        background: #007cba;
        border-color: #007cba;
    }
</style>

<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Discussion Settings</h2>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th id="heading" scope="row">Default post settings</th>
                            <td id="linespace">

                                <label>
                                    <input name="default_pingback_flag" type="checkbox" id="default_pingback_flag" value="1">
                                    Attempt to notify any blogs linked to from the post</label>
                                <br>
                                <label>
                                    <input name="default_ping_status" type="checkbox" id="default_ping_status" value="open" checked="checked">
                                    Allow link notifications from other blogs (pingbacks and trackbacks) on new posts</label>
                                <br>
                                <label>
                                    <input name="default_comment_status" type="checkbox" id="default_comment_status" value="open" checked="checked">
                                    Allow people to submit comments on new posts</label>
                                <br>
                                <p class="description">(These settings may be overridden for individual posts.)</p>

                            </td>
                        </tr>
                        <br>
                        <tr>
                            <th id="headings" scope="row">Other comment settings</th>
                            <td id="linespaces">
                                <label for="require_name_email"><input type="checkbox" name="require_name_email" id="require_name_email" value="1" checked="checked"> Comment author must fill out name and email</label>
                                <br>
                                <label for="comment_registration">
                                    <input name="comment_registration" type="checkbox" id="comment_registration" value="1">
                                    Users must be registered and logged in to comment</label>
                                <br>

                                <label for="close_comments_for_old_posts">
                                    <input name="close_comments_for_old_posts" type="checkbox" id="close_comments_for_old_posts" value="1">
                                    Automatically close comments on posts older than </label> <label for="close_comments_days_old"><input name="close_comments_days_old" type="number" min="0" step="1" id="close_comments_days_old" value="14" class="small-text"> days</label>
                                <br>

                                <label for="show_comments_cookies_opt_in">
                                    <input name="show_comments_cookies_opt_in" type="checkbox" id="show_comments_cookies_opt_in" value="1" checked="checked">
                                    Show comments cookies opt-in checkbox, allowing comment author cookies to be set</label>
                                <br>

                                <label for="thread_comments">
                                    <input name="thread_comments" type="checkbox" id="thread_comments" value="1" checked="checked">
                                    Enable threaded (nested) comments </label> <label for="thread_comments_depth"><select name="thread_comments_depth" id="thread_comments_depth">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected="selected">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select> levels deep</label>
                                <br>
                                <label for="page_comments">
                                    <input name="page_comments" type="checkbox" id="page_comments" value="1">
                                    Break comments into pages with </label> <label for="comments_per_page"><input name="comments_per_page" type="number" step="1" min="0" id="comments_per_page" value="50" class="small-text"> top level comments per page and the </label> <label for="default_comments_page"><select name="default_comments_page" id="default_comments_page">
                                        <option value="newest" selected="selected">last</option>
                                        <option value="oldest">first</option>
                                    </select> page displayed by default</label>
                                <br>
                                <label for="comment_order">
                                    Comments should be displayed with the <select name="comment_order" id="comment_order">
                                        <option value="asc" selected="selected">older</option>
                                        <option value="desc">newer</option>
                                    </select> comments at the top of each page</label>
                            </td>
                        </tr>

                        <tr>
                            <th id="head" scope="row">Email me whenever</th>
                            <td id="linespace">
                                <label for="comments_notify">
                                    <input name="comments_notify" type="checkbox" id="comments_notify" value="1" checked="checked">
                                    Anyone posts a comment </label>
                                <br>
                                <label for="moderation_notify">
                                    <input name="moderation_notify" type="checkbox" id="moderation_notify" value="1" checked="checked">
                                    A comment is held for moderation </label>
                                </fieldset>
                            </td>
                        </tr>

                        <tr>
                            <th id="comment" scope="row">Before a comment appears</th>
                            <td>
                                <label for="comment_moderation">
                                    <input name="comment_moderation" type="checkbox" id="comment_moderation" value="1">
                                    Comment must be manually approved </label>
                                <br>
                                <label for="comment_previously_approved"><input type="checkbox" name="comment_previously_approved" id="comment_previously_approved" value="1" checked="checked"> Comment author must have a previously approved comment</label>
                            </td>
                        </tr><br>
                    </tbody>
                </table>
                <div class="moderate">
                    <h4>Comment Moderation </h4>
                    <label id="moderate" for="comment_max_links">
                        Hold a comment in the queue if it contains <input name="comment_max_links" type="number" step="1" min="0" id="comment_max_links" value="2" class="small-text"> or more links. (A common characteristic of comment spam is a large number of hyperlinks.),<br>
                        When a comment contains any of these words in its content, author name, URL, email, IP address, or browser’s user agent string, it will be held in the,<a href="">moderation queue.</a> One word or IP address per line. It will match inside words, so “press” will match “WordPress”.</label>
                    <p>
                        <textarea name="moderation_keys" rows="10" cols="50" id="moderation_keys" class="large-text code"></textarea>
                    </p>
                </div>

                <div class="cmnt">
                    <h4>Disallowed Comment Keys </h4>
                    <label id="comment">When a comment contains any of these words in its content, author name, URL, email, IP address, or browser’s user agent string, it will be put in the Trash. One word or IP address per line. It will match inside words, so “press” will match “WordPress”.</label>
                    <p>
                        <textarea name="comment_keys" rows="10" cols="50" id="comment_keys" class="large-text code"></textarea>
                    </p>
                </div>
                <h2 class="title">Avatars</h2>
                <p>An avatar is an image that follows you from weblog to weblog appearing beside your name when you comment on avatar enabled sites. Here you can enable the display of avatars for people who comment on your site.</p>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th class="avtar" scope="row">Avatar Display</th>
                            <td>
                                <label for="show_avatars">
                                    <input type="checkbox" id="show_avatars" name="show_avatars" value="1" checked="checked">
                                    Show Avatars </label>
                            </td>
                        </tr>
                        <div class="rating">
                            <tr class="avatar-settings">
                                <th class="rating" scope="row">Maximum Rating</th>
                                <td id="rating"><label><input type="radio" name="avatar_rating" value="G" checked="checked"> G — Suitable for all audiences</label><br>
                                    <label><input type="radio" name="avatar_rating" value="PG"> PG — Possibly offensive, usually for audiences 13 and above</label><br>
                                    <label><input type="radio" name="avatar_rating" value="R"> R — Intended for adult audiences above 17</label><br>
                                    <label><input type="radio" name="avatar_rating" value="X"> X — Even more mature than above</label><br>
                                </td>
                            </tr>
                        </div>
                        <div class="settings">
                            <tr class="avatar-settings">
                                <th id="setting" scope="row">Default Avatar</th>
                                <td id="set" class="defaultavatarpicker">

                                    <p>
                                        For users without a custom avatar of their own, you can either display a generic logo or a generated one based on their email address.<br>
                                    </p>


                                    <label><input type="radio" name="avatar_default" id="avatar_mystery" value="mystery" checked="checked"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=mm&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=mm&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Mystery Person</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_blank" value="blank"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=blank&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=blank&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Blank</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_gravatar_default" value="gravatar_default"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Gravatar Logo</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_identicon" value="identicon"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=identicon&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=identicon&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Identicon (Generated)</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_wavatar" value="wavatar"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=wavatar&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=wavatar&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Wavatar (Generated)</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_monsterid" value="monsterid"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=monsterid&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=monsterid&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> MonsterID (Generated)</label><br>
                                    <label><input type="radio" name="avatar_default" id="avatar_retro" value="retro"> <img alt="" src="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=32&amp;d=retro&amp;f=y&amp;r=g" srcset="http://2.gravatar.com/avatar/5dad06dd3dd6ba4efb1b2ad27c3e3fbb?s=64&amp;d=retro&amp;f=y&amp;r=g 2x" class="avatar avatar-32 photo avatar-default" height="32" width="32" loading="lazy"> Retro (Generated)</label><br>
                                </td>
                            </tr>
                        </div>

                    </tbody>
                </table>

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