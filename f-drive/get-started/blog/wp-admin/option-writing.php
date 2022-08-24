<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    th#category {
        padding: 29px 51px 33px 0px;
    }

    code {
        padding: 2px 4px;
        font-size: 90%;
        background-color: #00000017;
        border-radius: 4px;
        color: black;
    }

    th#mail {
        padding: 31px 119px 23px 8px;
    }

    th#login {
        padding: 9px;
    }

    th#password {
        padding: 17px 5px 16px 8px;
    }

    th#default {
        padding: 17px 5px 18px 7px;
    }

    input#submit {
        background: #007cba;
        border-color: #007cba;
        color: white;
    }
</style>

<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Writing Settings</h2>
                <form method="post" >
                    <table class="form-table" role="presentation">
                    
                        <tbody>
                            <tr>
                                <th id="category" scope="row"><label for="default_category">Default Post Category</label></th>
                                <td>
                                    <select name="default_category" id="default_category" class="postform">
                                        <option class="level-0" value="uncategorized" selected="selected">Uncategorized</option>
                                        <option class="level-0" value="unselected" selected="selected">Unselected</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="default_post_format">Default Post Format</label></th>
                                <td>
                                    <select name="default_post_format" id="default_post_format">
                                        <option value="stanbdard">Standard</option>
                                        <option value="aside">Aside</option>
                                        <option value="chat">Chat</option>
                                        <option value="gallery">Gallery</option>
                                        <option value="link">Link</option>
                                        <option value="image">Image</option>
                                        <option value="quote">Quote</option>
                                        <option value="status">Status</option>
                                        <option value="video">Video</option>
                                        <option value="audio">Audio</option>
                                    </select>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <h2 class="title">Post via email</h2>
                    <p>
                        To post to WordPress by email, you must set up a secret email account with POP3 access. Any mail received at this address will be posted, so it’s a good idea to keep this address very secret. Here are three random strings you could use: <code>CsrdgRb2</code>, <code>3BQIv8zb</code>, <code>wPZKE7qq</code>.</p>

                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th id="mail" scope="row"><label for="mailserver_url">Mail Server</label></th>
                                <td><input name="mailserver_url" type="text" id="mailserver_url" value="mail.example.com" class="regular-text code">
                                    <label for="mailserver_port">Port</label>
                                    <input name="mailserver_port" type="text" id="mailserver_port" value="110" class="small-text">
                                </td>
                            </tr>

                            <tr>
                                <th id="login" scope="row"><label for="mailserver_login">Login Name</label></th>
                                <td><input name="mailserver_login" type="text" id="mailserver_login" value="login@example.com" class="regular-text ltr"></td>
                            </tr>

                            <tr>
                                <th id="password" scope="row"><label for="mailserver_pass">Password</label></th>
                                <td>
                                    <input name="mailserver_pass" type="text" id="mailserver_pass" value="password" class="regular-text ltr">
                                </td>
                            </tr>

                            <tr>
                                <th id="default" scope="row"><label for="default_email_category">Default Mail Category</label></th>
                                <td>
                                    <select name="default_email_category" id="default_email_category" class="postform">
                                        <option class="level-0" value="uncategorized" >Uncategorized</option>
                                        <option class="level-0" value="unselected" selected="selected">Unselected</option>

                                    </select>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <h2 class="title">Update Services</h2>

                    <p>
                        WordPress is not notifying any <a href="update-core.php">Update Services</a> because of your site’s <a href="option-reading.php">visibility settings</a>. </p>

                        <p class="submit"> <input type="hidden" name="action" value="writing">
                            <input type="submit" name="writing" value="save changes">
                        </form></p>
                    <div>
                        <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                                <p style='float: right;'>Version 5.6</p>
                            </i></p>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>