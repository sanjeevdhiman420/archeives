<?php
$host = "localhost";
$username = "";
$password = "";
$database = "";

$conn = mysqli_connect($host, $password, $username, $database);<br />
<br />
if(!$conn):
die("Connection Error:" . mysqli_connect_error());
endif;
?>