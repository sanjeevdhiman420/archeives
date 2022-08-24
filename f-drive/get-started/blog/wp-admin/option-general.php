<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
    th.site {
        padding: 26px 113px 28px 0px;
    }

    input#blogname {
        border-radius: 4px;
        border: 1px solid #7e8993;
        width: 50%;
    }

    th.tag {
        padding: 3px 83px 37px 0px;
    }

    input#blogdescription {
        border-radius: 4px;
        border: 1px solid #7e8993;
        width: 50%;
    }

    input#siteurl {
        border-radius: 4px;
        border: 1px solid #7e8993;
        width: 50%;
    }

    input#home {
        border-radius: 4px;
        border: 1px solid #7e8993;
        width: 50%;
    }

    th.address {
        padding: 33px 17px 64px 1px;
    }

    th.email {
        padding: 0px 83px 14px 0px;
    }

    input#new_admin_email {
        border-radius: 4px;
        border: 1px solid #7e8993;
        width: 50%;
    }

    th.member {
        padding: 28px 6px 31px 2px;
    }

    th.language {
        padding: 41px 0 45px 0px;
    }

    th.Time {
        padding: 1px 0 55px 0px;
    }

    code {
        padding: 2px 4px;
        font-size: 90%;
        color: #000000;
        background-color: #f1f1f1;
        border-radius: 4px;
    }

    th.format {
        padding: 24px 0px 173px 0px;
    }

    input#date_format_custom {
        margin-left: 15px;
        width: 8%;
    }

    th.time {
        padding: 0px 15px 135px 5px;
    }

    input#time_format_custom {
        margin-left: 10px;
        width: 25%;
        font-weight: 400;
    }

    input#submit {
        background: #00669b;
        border-color: #00669b;
        box-shadow: none;
        color: #fff;
        margin-top: 3%;
    }
</style>

<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>General Settings</h2>
                <form method="post" >
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th class="site" scope="row"><label for="blogname">Site Title</label></th>
                                <td><input name="blogname" type="text" id="blogname" value="Blog" class="regular-text"></td>
                            </tr>
                            <tr>
                                <th class="tag" scope="row"><label for="blogdescription">Tagline</label></th>
                                <td><input name="blogdescription" type="text" id="blogdescription" aria-describedby="tagline-description" value="Just another WordPress site" class="regular-text">
                                    <p class="description" id="tagline-description">In a few words, explain what this site is about.</p>
                                </td>
                            </tr>

                            <tr>
                                <th class="url" scope="row"><label for="siteurl">WordPress Address (URL)</label></th>
                                <td><input name="siteurl" type="url" id="siteurl" value="http://localhost/wordpress" class="regular-text code"></td>
                            </tr>
                            <tr>
                                <th class="address" scope="row"><label for="home">Site Address (URL)</label></th>
                                <td><input name="home" type="url" id="home" aria-describedby="home-description" value="http://localhost/wordpress" class="regular-text code">
                                    <p class="description" id="home-description">
                                        Enter the address here if you <a href="https://wordpress.org/support/article/giving-wordpress-its-own-directory/">want your site home page to be different from your WordPress installation directory</a>.</p>
                                </td>
                            </tr>
                            <tr>
                                <th class="email" scope="row"><label for="new_admin_email">Administration Email Address</label></th>
                                <td><input name="new_admin_email" type="email" id="new_admin_email" aria-describedby="new-admin-email-description" value="ewb.mohit@gmail.com" class="regular-text ltr">
                                    <p class="description" id="new-admin-email-description">This address is used for admin purposes. If you change this, we will send you an email at your new address to confirm it. <strong>The new address will not become active until confirmed.</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="member" scope="row">Membership</th>
                                <td> <label for="users_can_register">
                                        <input name="users_can_register" type="checkbox" id="users_can_register" value="1">
                                        Anyone can register</label>
                                </td>
                            </tr>
                            <tr>
                                <th class="Role" scope="row"><label for="default_role">New User Default Role</label></th>
                                <td>
                                    <select name="default_role" id="default_role">
                                        <option selected="selected" value="subscriber">Subscriber</option>
                                        <option value="contributor">Contributor</option>
                                        <option value="author">Author</option>
                                        <option value="editor">Editor</option>
                                        <option value="administrator">Administrator</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="language" scope="row"><label for="WPLANG">Site Language<span class="dashicons dashicons-translation" aria-hidden="true"></span></label></th>
                                <td>
                                    <select name="WPLANG" id="WPLANG">
                                        <optgroup label="Installed">
                                            <option value="" lang="en" data-installed="1" selected="selected">English (United States)</option>
                                        </optgroup>
                                        <optgroup label="Available">
                                            <option value="af" lang="af">Afrikaans</option>
                                            <option value="ar" lang="ar">العربية</option>
                                            <option value="bel" lang="be">Беларуская мова</option>
                                            <option value="bg_BG" lang="bg">Български</option>
                                            <option value="bn_BD" lang="bn">বাংলা</option>
                                            <option value="bo" lang="bo">བོད་ཡིག</option>
                                            <option value="bs_BA" lang="bs">Bosanski</option>
                                            <option value="ca" lang="ca">Català</option>
                                            <option value="de_DE_formal" lang="de">Deutsch (Sie)</option>
                                            <option value="dzo" lang="dz">རྫོང་ཁ</option>
                                            <option value="el" lang="el">Ελληνικά</option>
                                            <option value="en_GB" lang="en">English (UK)</option>
                                            <option value="eo" lang="eo">Esperanto</option>
                                            <option value="es_CO" lang="es">Español de Colombia</option>
                                            <option value="et" lang="et">Eesti</option>
                                            <option value="eu" lang="eu">Euskara</option>
                                            <option value="fa_IR" lang="fa">فارسی</option>
                                            <option value="fa_AF" lang="fa">(فارسی (افغانستان</option>
                                            <option value="fi" lang="fi">Suomi</option>
                                            <option value="fr_FR" lang="fr">Français</option>
                                            <option value="fur" lang="fur">Friulian</option>
                                            <option value="gd" lang="gd">Gàidhlig</option>
                                            <option value="gl_ES" lang="gl">Galego</option>
                                            <option value="gu" lang="gu">ગુજરાતી</option>
                                            <option value="haz" lang="haz">هزاره گی</option>
                                            <option value="he_IL" lang="he">עִבְרִית</option>
                                            <option value="hi_IN" lang="hi">हिन्दी</option>
                                            <option value="ur" lang="ur">اردو</option>
                                            <option value="vi" lang="vi">Tiếng Việt</option>
                                            <option value="zh_TW" lang="zh">繁體中文</option>
                                            <option value="zh_HK" lang="zh">香港中文版 </option>
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="Time" scope="row"><label for="timezone_string">Timezone</label></th>
                                <td>

                                    <select id="timezone_string" name="timezone_string" aria-describedby="timezone-description">

                                        <optgroup label="Indian">
                                            <option value="Indian/Antananarivo">Antananarivo</option>
                                            <option value="Indian/Chagos">Chagos</option>
                                            <option value="Indian/Christmas">Christmas</option>
                                            <option value="Indian/Cocos">Cocos</option>
                                            <option value="Indian/Comoro">Comoro</option>
                                            <option value="Indian/Kerguelen">Kerguelen</option>
                                            <option value="Indian/Mahe">Mahe</option>
                                            <option value="Indian/Maldives">Maldives</option>
                                            <option value="Indian/Mauritius">Mauritius</option>
                                            <option value="Indian/Mayotte">Mayotte</option>
                                            <option value="Indian/Reunion">Reunion</option>
                                        </optgroup>

                                        <optgroup label="UTC">
                                            <option value="UTC">UTC</option>
                                        </optgroup>
                                        <optgroup label="Manual Offsets">
                                            <option value="UTC-12">UTC-12</option>
                                            <option value="UTC-11.5">UTC-11:30</option>
                                            <option value="UTC-11">UTC-11</option>
                                            <option value="UTC-10.5">UTC-10:30</option>
                                            <option value="UTC-10">UTC-10</option>
                                            <option value="UTC-9.5">UTC-9:30</option>
                                            <option value="UTC-9">UTC-9</option>
                                            <option value="UTC-8.5">UTC-8:30</option>
                                            <option value="UTC-8">UTC-8</option>
                                            <option value="UTC-7.5">UTC-7:30</option>
                                            <option value="UTC-7">UTC-7</option>
                                            <option value="UTC-6.5">UTC-6:30</option>
                                            <option value="UTC-6">UTC-6</option>
                                            <option value="UTC-5.5">UTC-5:30</option>
                                            <option value="UTC-5">UTC-5</option>
                                            <option value="UTC-4.5">UTC-4:30</option>
                                            <option value="UTC-4">UTC-4</option>
                                            <option value="UTC-3.5">UTC-3:30</option>
                                            <option value="UTC-3">UTC-3</option>
                                            <option value="UTC-2.5">UTC-2:30</option>
                                            <option value="UTC-2">UTC-2</option>
                                            <option value="UTC-1.5">UTC-1:30</option>
                                            <option value="UTC-1">UTC-1</option>
                                            <option value="UTC-0.5">UTC-0:30</option>
                                            <option selected="selected" value="UTC+0">UTC+0</option>
                                            <option value="UTC+0.5">UTC+0:30</option>
                                            <option value="UTC+1">UTC+1</option>
                                            <option value="UTC+1.5">UTC+1:30</option>
                                            <option value="UTC+2">UTC+2</option>
                                            <option value="UTC+2.5">UTC+2:30</option>
                                            <option value="UTC+3">UTC+3</option>
                                            <option value="UTC+3.5">UTC+3:30</option>
                                            <option value="UTC+4">UTC+4</option>
                                            <option value="UTC+4.5">UTC+4:30</option>
                                            <option value="UTC+5">UTC+5</option>
                                            <option value="UTC+5.5">UTC+5:30</option>
                                            <option value="UTC+5.75">UTC+5:45</option>
                                            <option value="UTC+6">UTC+6</option>
                                            <option value="UTC+6.5">UTC+6:30</option>
                                            <option value="UTC+7">UTC+7</option>
                                            <option value="UTC+7.5">UTC+7:30</option>
                                            <option value="UTC+8">UTC+8</option>
                                            <option value="UTC+8.5">UTC+8:30</option>
                                            <option value="UTC+8.75">UTC+8:45</option>
                                            <option value="UTC+9">UTC+9</option>
                                            <option value="UTC+9.5">UTC+9:30</option>
                                            <option value="UTC+10">UTC+10</option>
                                            <option value="UTC+10.5">UTC+10:30</option>
                                            <option value="UTC+11">UTC+11</option>
                                            <option value="UTC+11.5">UTC+11:30</option>
                                            <option value="UTC+12">UTC+12</option>
                                            <option value="UTC+12.75">UTC+12:45</option>
                                            <option value="UTC+13">UTC+13</option>
                                            <option value="UTC+13.75">UTC+13:45</option>
                                            <option value="UTC+14">UTC+14</option>
                                        </optgroup>
                                    </select>

                                    <p class="description" id="timezone-description">
                                        Choose either a city in the same timezone as you or a <abbr>UTC</abbr> (Coordinated Universal Time) time offset.</p>

                                    <p class="timezone-info">
                                        <span id="utc-time">
                                            Universal time is <code>2021-02-08 04:11:44</code>. </span>
                                    </p>

                                </td>

                            </tr>

                            <tr>
                                <th class="format" scope="row">Date Format</th>
                                <td> <label><input type="radio" name="date_format1" value="F j, Y" checked="checked"> <span class="date-time-text format-i18n">February 8, 2021</span><code>F j, Y</code></label><br>
                                    <label><input type="radio" name="date_format2" value="Y-m-d"> <span class="date-time-text format-i18n">2021-02-08</span><code>Y-m-d</code></label><br>
                                    <label><input type="radio" name="date_format3" value="m/d/Y"> <span class="date-time-text format-i18n">02/08/2021</span><code>m/d/Y</code></label><br>
                                    <label><input type="radio" name="date_format4" value="d/m/Y"> <span class="date-time-text format-i18n">08/02/2021</span><code>d/m/Y</code></label><br>
                                    <label><input type="radio" name="date_format5" id="date_format_custom_radio" value="\c\u\s\t\o\m"> <span class="date-time-text date-time-custom-text">Custom:</span></label><input type="text" name="date_format_custom" id="date_format_custom" value="F j, Y" class="small-text"><br>
                                    <p><strong>Preview:</strong> <span class="example">February 8, 2021</span><span class="spinner"></span>
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <th class="time" scope="row">Time Format</th>
                                <td>
                                    <label><input type="radio" name="time_format1" value="g:i a" checked="checked"> <span class="date-time-text format-i18n">4:11 am</span><code>g:i a</code></label><br>
                                    <label><input type="radio" name="time_format2" value="g:i A"> <span class="date-time-text format-i18n">4:11 AM</span><code>g:i A</code></label><br>
                                    <label><input type="radio" name="time_format3" value="H:i"> <span class="date-time-text format-i18n">04:11</span><code>H:i</code></label><br>
                                    <label><input type="radio" name="time_format4" id="time_format_custom_radio" value="\c\u\s\t\o\m"> <span class="date-time-text date-time-custom-text">Custom:<input type="text" name="time_format_custom" id="time_format_custom" value="g:i a" class="small-text"><br>
                                            <p><strong>Preview:</strong> <span class="example">4:11 am</span><span class="spinner"></span>
                                            </p>
                                            <p class="date-time-doc"><a href="#">Documentation on date and time formatting</a>.</p>
                                </td>
                            </tr>


                            <tr>
                                <th class="week" scope="row"><label for="start_of_weak">Week Starts On</label></th>
                                <td><select name="start_of_weak" id="start_of_week">

                                        <option value="0">Sunday</option>
                                        <option value="1" selected="selected">Monday</option>
                                        <option value="2">Tuesday</option>
                                        <option value="3">Wednesday</option>
                                        <option value="4">Thursday</option>
                                        <option value="5">Friday</option>
                                        <option value="6">Saturday</option>
                                    </select></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="submit"> <input type="hidden" name="action" value="general">
                            <input type="submit" name="general" value="update profile">
                        </form></p>
                </form>

                <div>
                    <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                            <p style='float: right;'>Version 5.6</p>
                        </i></p>

                </div>
            </div>
        </div>
    </div>
</div>