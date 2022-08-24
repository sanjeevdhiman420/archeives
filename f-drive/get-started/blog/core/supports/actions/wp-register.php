<?php

require_once __DIR__.'/../../../connection/database.php';
if (file_exists('connection.php')) {
    if ($_POST['submit']) {
        $sitename = $_POST['sitename'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        try {
            $query = "CREATE TABLE profile( id int AUTO_INCREMENT PRIMARY KEY NOT NULL, sitetitle varchar(255) , 
        username varchar(255) NULL, password varchar(255) , email varchar(255) , search_Visibility varchar(255) 
        DEFAULT 'false')";
            $sql = $link->prepare($query);
            $sql->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $my = "INSERT INTO `profile` (sitetitle,username,password,email,search_Visibility) VALUES ('$sitename','$username','$password','$email','true')";
            $insert = $link->prepare($my);
            $insert->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $mysql = 'CREATE TABLE data( id int AUTO_INCREMENT PRIMARY KEY NOT NULL, title varchar(255) , 
        writing varchar(255), submitted_at DATETIME(6) NULL)';
            $sq = $link->prepare($mysql);
            $sq->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $mysqli = 'CREATE TABLE `editprofile`( id int AUTO_INCREMENT PRIMARY KEY NOT NULL, fname varchar(255) , 
        lname varchar(255), nickname varchar(255), email varchar(255), website varchar(255), biographical varchar(255) NULL)';
            $sqli = $link->prepare($mysqli);
            $sqli->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $mysq = 'CREATE TABLE `WP-GENERAL`( id int AUTO_INCREMENT PRIMARY KEY NOT NULL, blogname varchar(255) ,
        blogdescription varchar(255), siteurl varchar(255),  home varchar(255), new_admin_email varchar(255), users_can_register varchar(255), default_role varchar(255), WPLANG varchar(2555),timezone_string varchar(255), start_of_weak varchar(255))';
            $msqli = $link->prepare($mysq);
            $msqli->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $msq = 'CREATE TABLE `WP-WRITING`( id int AUTO_INCREMENT PRIMARY KEY NOT NULL, default_category varchar(255) ,
        default_post_format varchar(255), mailserver_url varchar(255),  mailserver_port varchar(255), mailserver_login varchar(255), mailserver_pass varchar(255), default_email_category varchar(255))';
            $write = $link->prepare($msq);
            $write->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $data = 'CREATE TABLE `MEDIA`(id int AUTO_INCREMENT PRIMARY KEY NOT NULL, Name_of_file text(255) NULL)';
            $name = $link->prepare($data);
            $name->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header('location:run-install.php');
    }
}
