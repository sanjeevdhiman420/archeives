<?php

    if ($_POST['general']) {
        $blogname = $_POST['blogname'];
        $blogdescription = $_POST['blogdescription'];
        $siteurl = $_POST['siteurl'];

        $home = $_POST['home'];

        $new_admin_email = $_POST['new_admin_email'];

        $users_can_register = $_POST['users_can_register'];
        $default_role = $_POST['default_role'];
        $WPLANG = $_POST['WPLANG'];
        $timezone_string = $_POST['timezone_string'];
        $start_of_weak = $_POST['start_of_weak'];

        try {
            $mysq = "INSERT INTO `WP-GENERAL` (blogname, blogdescription, siteurl, home, new_admin_email, users_can_register, default_role,  WPLANG, timezone_string, start_of_weak) VALUES ('$blogname', '$blogdescription', '$siteurl', '$home', '$new_admin_email', '$users_can_register', '$default_role',  '$WPLANG', '$timezone_string', '$start_of_weak') ";
            $query = getConnection()->prepare($mysq);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
