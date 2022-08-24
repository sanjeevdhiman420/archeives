<?php

    if ($_POST['add-new']) {
        $title = $_POST['title'];
        $writing = $_POST['writing'];
        $date = date('y/m/h');
        try {
            $sql = "INSERT INTO `data` (title, writing, submitted_at) VALUES ('$title','$writing','$date')";
            $query = getConnection()->prepare($sql);
            $query->execute();
            // header('location:wp-admin');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
