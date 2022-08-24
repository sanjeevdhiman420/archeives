<?php

if ($_POST['submit']) {
    $dbname = $_POST['dbname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbhost = $_POST['dbhost'];
    $prefix = $_POST['prefix'];

    $mysql = @mysqli_connect($dbhost, $username, $password, $dbname);
    if ($mysql) {
        copy('demo.php', 'connection.php');
        $file = 'connection.php';
        file_put_contents($file, str_replace('wordpress', $dbname, file_get_contents($file)));
        file_put_contents($file, str_replace('username', $username, file_get_contents($file)));
        file_put_contents($file, str_replace('password', $password, file_get_contents($file)));
        file_put_contents($file, str_replace('localhost', $dbhost, file_get_contents($file)));

        return header('Location: run-install.php');
    } else {
        return header('Location: setup-config.php');
    }
}
