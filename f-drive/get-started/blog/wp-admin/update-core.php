<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<div class='dashborad'>
    <div class='row dash-row'>
        <div class='col-lg-12'>
            <div class='heading'>
                <h2><b>Wordpress Updates</b></h2>
                <p>Here you can find information about updates, set auto-updates and see what plugins or themes need updating.</p><br><br>
                <div>
                    <h4><b>Current version: 5.6</b></h4>
                </div>
                <p>The Last update on <?php echo date('l jS \of F Y h:i:s A'); ?> .<a href='/'>Check again</a></p>
                <div>
                    <p>This site is automatically kept up to date with each new version of WordPress.<Br>
                        <a href='/'>Switch to automatic updates for maintenance and security releases only.</a>
                    </p><br><br>
                </div>
                <P><b>You have the latest version of WordPress.</b></p>
                <p>If you need to re-install version 5.6, you can do so here:</p>
                <input type='submit' name='upgrade' class='upgrade' id='button' value='Re-install Now'><br><br>

                <div>
                    <h4><b>Plugins</b></h4>
                </div>
                <p>The following plugins have new versions available. Check the ones you want to update and then click “Update Plugins”.

                </p>
                <input type='submit' name='update' class='update' id='button' value='Update-Plugin'><br><br>

                <div>
                    <h4><b>Themes</b></h4>
                </div>
                <p>The following themes have new versions available. Check the ones you want to update and then click “Update Themes”.<br>
                    <b>Please Note:</b> Any customizations you have made to theme files will be lost. Please consider using child themes for modifications.

                </p>
                <input type='submit' name='Themes' class='Themes' id='button' value='Update'><br><br>

                <div>
                    <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                            <p style='float: right;'>Version 5.6</p>
                        </i></p>
                        
                </div>
            </div>
        </div>
    </div>