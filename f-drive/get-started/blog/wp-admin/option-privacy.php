<?php

require_once __DIR__ . '/../bootstrap/app.php';

require_once file_header();
require_once file_slider(); ?>
<style>
    hr {
        border: 0;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #fafafa;
    }

    select#page_for_privacy_policy {
        margin-left: 22px;
        margin-top: 28px;
    }
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Privacy Setting</h2>
                <h5>Privacy Policy Page</h5><BR>
                <p>As a website owner, you may need to follow national or international privacy laws. For example, you may need to create and display a Privacy Policy. If you already have a Privacy Policy page, please select it below. If not, please create one.</p><br>
                <p>The new page will include help and suggestions for your Privacy Policy. However, it is your responsibility to use those resources correctly, to provide the information that your Privacy Policy requires, and to keep that information current and accurate.</p><br>
                <p>After your Privacy Policy page is set, we suggest that you edit it. We would also suggest reviewing your Privacy Policy from time to time, especially after installing or updating any themes or plugins. There may be changes or new suggested information for you to consider adding to your policy.</p><br>
                <p><b><a href="">Edit</a> or <a href="">Preview</a>Your privacy policy page content</b></p><br>
                <p>Need help putting together your new Privacy Policy page?<a href=""> check out our guid </a>for recommendations on what content to include, along with policies suggested by your plugins and theme. </p>
                <hr>
                <table class="form-table tools-privacy-policy-page" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="page_for_privacy_policy">
                                    Change your Privacy Policy page </label>
                            </th>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="action" value="set-privacy-page">
                                    <select name="page_for_privacy_policy" id="page_for_privacy_policy">
                                        <option value="0">— Select —</option>
                                        <option class="level-0" value="3" selected="selected">Privacy Policy</option>
                                        <option class="level-0" value="2">Sample Page</option>
                                    </select>
                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="bcf9e14abc"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/options-privacy.php"><input type="submit" name="submit" id="set-page" class="button button-primary" value="Use This Page">
                                </form>

                                <form class="wp-create-privacy-page" method="post" action="">
                                    <input type="hidden" name="action" value="create-privacy-page">
                                    <span>
                                        Or </span>
                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="6698b0568a"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/options-privacy.php"><input type="submit" name="submit" id="create-page" class="button button-primary" value="Create New Page">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>