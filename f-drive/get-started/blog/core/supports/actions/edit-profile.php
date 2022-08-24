<?php

    if ($_POST['edit-profile']) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nickname = $_POST['nickname'];

        $email = $_POST['email'];

        $website = $_POST['website'];

        $biographical = $_POST['biographical'];

        try {
            $mysqli = "INSERT INTO `editprofile` (fname, lname, nickname, email, website, biographical) VALUES ('$fname','$lname','$nickname','$email','$website','$biographical') ";
            $query = getConnection()->prepare($mysqli);
            $query->execute();
            // header('location:wp-admin');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
