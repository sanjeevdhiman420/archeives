<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<div class='dashborad'>
    <div class='row dash-row'>
        <div class='col-lg-6'>
            <h2>Profile</h2>
        </div>
        <div class='col-lg-3'>

            <div class='opption_button_div'>
                <button class='btn_option2 help'>help</button>
            </div>

        </div>

    </div>
    <div>
        <h4>Personal Options</h4>
    </div>
    <div class='div'>
        <table>
            <tbody>
                <tr>
                    <th>Visual Editor</th>
                    <td class='table-td'><label class='label-profile'><input type='checkbox' class='checkbo'>&nbsp;
                            Disable the visual editor when writing</label></td>
                </tr>

                <tr>
                    <th>Syntax Highlighting</th>
                    <td class='table-td'><label class='label-profile'><input type='checkbox' class='checkbo'>&nbsp;
                            Disable syntax highlighting when editing code</label></td>

                </tr>
                <tr>
                    <th class='colour-th'>Admin Color Scheme</th>
                    <td class='table-td'>

                        <div class='row'>

                            <div class='col-lg-3 colour-div '>
                                <label class='lab'>
                                    <input type='radio' name='optradio' class='defalut' value='#23282d' onclick="colorChange('#23282d','#23282d' ,'#337ab7')" checked><label> Default</label>
                                    <div class='colours'>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class='colour1'></td>
                                                    <td class='colour2'></td>
                                                    <td class='colour3'></td>
                                                    <td class='colour4'></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                </label>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div '>
                            <input type='radio' name='optradio' class='Light' value='#999' onclick="colorChange('#999','#999', '#d64e07')"> <label>Light</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour5'></td>
                                            <td class='colour6'></td>
                                            <td class='colour7'></td>
                                            <td class='colour8'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div '>
                            <label><input type='radio' name='optradio' class='Modern' value='#3858e9' onclick="colorChange('#3858e9','#3858e9','#1e1e1e')">Modern</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour9'></td>
                                            <td class='colour10'></td>
                                            <td class='colour11'></td>
                                            <td class='colour12'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div '>
                            <label><input type='radio' name='optradio' class='Blue' value='#52accc' onclick="colorChange('#52accc','#52accc','#096484')"> Blue</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour13'></td>
                                            <td class='colour14'></td>
                                            <td class='colour15'></td>
                                            <td class='colour16'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div><br>
                        <div class='col-lg-3 colour-div'>
                            <label><input type='radio' name='optradio' class='defalut' value='#c7a589' onclick="colorChange(' #59524c','#59524c' ,'#9ea476')">Coffee</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour17'></td>
                                            <td class='colour18'></td>
                                            <td class='colour19'></td>
                                            <td class='colour20'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div'>
                            <label><input type='radio' name='optradio' class='defalut' value=' #523f6d' onclick="colorChange('#523f6d','#523f6d' , '#a3b745')">Ectoplasm</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour21'></td>
                                            <td class='colour22'></td>
                                            <td class='colour23'></td>
                                            <td class='colour24'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div'>
                            <label><input type='radio' name='optradio' class='defalut' value='#e14d43' onclick="colorChange('black','black' ,'#e14d43')">Midnight</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour25'></td>
                                            <td class='colour26'></td>
                                            <td class='colour27'></td>
                                            <td class='colour28'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <br>
                        <div class='col-lg-3 colour-div'>
                            <label><input type='radio' name='optradio' class='defalut' value='#738e96' onclick="colorChange('#738e96','#738e96', '#9ebaa0')">Ocean</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour29'></td>
                                            <td class='colour30'></td>
                                            <td class='colour31'></td>
                                            <td class='colour32'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class='col-lg-3 colour-div'>
                            <label><input type='radio' name='optradio' class='defalut' value='#89ff00' onclick="colorChange('#e00700','#e00700', '#ccaf0b')">Sunrise</label>

                            <div class='colours'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='colour33'></td>
                                            <td class='colour34'></td>
                                            <td class='colour35'></td>
                                            <td class='colour36'></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

    </div>

    </td>

    </tr>
    <tr>
        <th>Keyboard Shortcuts</th>
        <td class='table-td'><label class='label-profile'><input type='checkbox' class='checkbo'>&nbsp;
                Enable keyboard shortcuts for comment moderation. <a>More information</a> </label></td>

    </tr>
    <tr>
        <th>Toolbar</th>
        <td class='table-td'><label class='label-profile'><input type='checkbox' class='checkbo'>&nbsp;
                Show Toolbar when viewing site</label></td>

    </tr>


    </td>

    </tr>
    
</tbody>
</table>
<form method="POST">
<h2 class="wp-heading">Name</h2>
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th><label for="username">username</th>
                                        <td><input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>username can't be changed</td>
                                    </tr>
                                    <tr>
                                        <th><label for="firstname">Firstname</th>
                                        <td><input type="text" name="fname" value=""></td>
                                    </tr>
                                    <tr>
                                        <th><label for="lastname">Lastname</th>
                                        <td><input type="text" name="lname" value=""></td>
                                    </tr>
                                    <tr>
                                        <th><label for="nickname">Nickname(required)</th>
                                        <td><input type="text" name="nickname" value="" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h2 class="wp-heading">Contact info</h2>
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th><label for="email">Email(Required)</th>
                                        <td><input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                                            <p class="mail-text">If you change this, we will send you an email at your new address to confirm it. The new address will not become active until confirmed.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="website">Website</th>
                                        <td><input type="text" name="website" value=""></td>
                                    </tr>


                                </tbody>
                            </table>
                            <h2 class="wp-heading">About Yourself</h2>
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                        <th><label for="Biographical Info">Biographical Info</th>
                                        <td><textarea name="biographical" rows="4" cols="50" > </textarea>
                                            <p class="discription">Share a little biographical information to fill out your profile. This may be shown publicly.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <td><img src="avatar.png" alt="images" height="" width="">
                                            <p class="discription"><a href="#">
                                                    You can change your profile picture on Gravatar.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h2>Account Managmanet</h2>
                <table class="form-table">
                    <tbody>
                    <tr>
                    <tr>
        <th class="edit-label-text">New Password</th>
        <td class="table-td"><button>Genrate password</button></td>

    </tr>
    <tr>
        <th class="edit-label-text">Session</th>
        <td class="table-td"><input type="text" name="site" value="Logout Everywhere Else" class="form-control" disabled></td>

                    
                        </tr>
                    </tbody>
                </table>
                            <input type="hidden" name="action" value="edit-profile">
                            <input type="submit" name="edit-profile" value="update profile">
                        </form>
                    </div>
                </div>
            </div>
            </div>

</div>
<script>
    function colorChange(col1, col2, col3) {

        document.getElementById('header').style.background = col1;
        document.getElementById('sideNavs').style.background = col2;
        document.getElementById('dashboard').style.background = col3;

    }
</script>
</div>
