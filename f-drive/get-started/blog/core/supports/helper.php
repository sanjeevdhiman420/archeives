<?php

function file_header()
{
    return realpath(__DIR__.'/layout/header.php');
}

function file_slider()
{
    return realpath(__DIR__.'/layout/slider.php');
}

function action($action)
{
    $path = __DIR__.'/actions/'.$action.'.php';

    if (hasAction($path)) {
        return realpath($path);
    } else {
    }
}

function hasAction($path)
{
    return file_exists($path);
}

function getConnection()
{
    require_once __DIR__.'/../../connection/database.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        echo 'CONNECTION ERROR'.$e->getMessage();
    }
}
