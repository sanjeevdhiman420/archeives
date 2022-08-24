<?php

    if ($_POST['writing']) {
        $default_category = $_POST['default_category'];
        $default_post_format = $_POST['default_post_format'];
        $mailserver_url = $_POST['mailserver_url'];

        $mailserver_port = $_POST['mailserver_port'];

        $mailserver_login = $_POST['mailserver_login'];

        $mailserver_pass = $_POST['mailserver_pass'];
        $default_email_category = $_POST['default_email_category'];

        try {
            $msq = "INSERT INTO `WP-WRITING`(default_category, default_post_format, mailserver_url, mailserver_port, mailserver_login, mailserver_pass, default_email_category) VALUES ('$default_category', '$default_post_format', '$mailserver_url', '$mailserver_port', '$mailserver_login', '$mailserver_pass', '$default_email_category') ";
            $query = getConnection()->prepare($msq);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
