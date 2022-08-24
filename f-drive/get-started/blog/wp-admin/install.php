

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Success</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW' crossorigin='anonymous'>
    </script>
    <link rel='stylesheet' href='../style/install.css'>
</head>

<body>
    <div class='main'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='logo'>
                        <img src='./../images/w-logo-blue.png'>
                    </div>
                    <div class='text-box'>
                        <h1>Success!</h1>

                        <p>WordPress has been installed. Thank you, and enjoy!</p>

                        <table class='table-install-sucess'>
                            <tbody>
                                <tr>
                                    <th>username<?php echo '&nbsp&nbsp&nbsp&nbsp'; ?></th>
                                    <td><?php echo $_SESSION['username']; ?></td>
                                </tr>
                                <th>password</th>
                                <td><?php echo 'your chossen password'; ?></td>

                            </tbody>
                        </table>

                        <div class='run1'>
                            <a href='../wp-login.php' class='button button-large'>login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>