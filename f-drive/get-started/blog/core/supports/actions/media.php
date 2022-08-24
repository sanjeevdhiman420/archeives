<?php

    if ($_POST['media']) {
        $Name_of_file = $_POST['Name_of_file'];
        $date = date('y/m/d');

        try {
            $data = "INSERT INTO `MEDIA` (Name_of_file, submitted_at) VALUES ('$Name_of_file' ,'$date')";
            $query = getConnection()->prepare($data);
            $query->execute();
            // header('location:wp-admin');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
