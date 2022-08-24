<?php
if (file_exists('connection.php')) {
    header('location: register.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/setup.css">
</head>

<body>
    <h1>Error establishing a database connection</h1>
    <p>This either means that the username and password information in your wp-config.php file is incorrect or we can’t contact the database server at localhost. This could mean your host’s database server is down.</p>
    <ul>

        <li>Are you sure you have the correct username and password?</li>
        <li>Are you sure you have typed the correct hostname?</li>
        <li>Are you sure the database server is running?</li>
    </ul>
    <p>
        If you’re unsure what these terms mean you should probably contact your host. If you still need help you can always visit the WordPress Support Forums.
    </p>
    <a href="setup.php" class="btn">try again</a>

</body>

</html>