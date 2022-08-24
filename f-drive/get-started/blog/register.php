<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/setup.css">
</head>

<body>
    <?php
    require_once __DIR__.'/bootstrap/app.php';
    ?>
    <img class="logo" src="images/w-logo-blue.png">
    <h1>Welcome</h1>
    <p class="ptag">Welcome to the famous five-minute WordPress installation process! Just fill in the information below and you’ll be on your way to using the most extendable and powerful personal publishing platform in the world</p>
    <h1>Information needed</h1>
    <p class="ptag">Please provide the following information. Don’t worry, you can always change these settings later.</p>

    <form method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th>Site Title </th>
                    <td><input type="text" name="sitename" class="form-control" required></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="username" class="form-control" required>
                        <p>
                            Usernames can have only alphanumeric characters, spaces, underscores, hyphens,<br> periods, and the @ symbol.
                        </p>
                    </td>

                </tr>
                <tr>
                    <th>Password</th>
                    <?php
                    function rand_string($length)
                    {
                        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@!#$%&*';

                        return substr(str_shuffle($chars), 0, $length);
                    }

                    ?>
                    <td><input type="text" name="password" class="form-control" value="<?php echo rand_string(11); ?>" required>




                        <span class="description important">
                            <strong>Important:</strong>
                            You will need this password to log&nbsp;in. Please store it in a secure location.</span>
                    </td>

                </tr>
                <tr>
                    <th>Your Email</th>
                    <td><input type="text" name="email" class="form-control" required>
                        <p>Double-check your email address before continuing.</p>
                    </td>
                </tr>
                <tr>
                    <th>Search engine visibility</th>
                    <td><input type="checkbox" id="checks">
                        <p id="form_p"> Discourage search engines from indexing this site<br>

                            It is up to search engines to honor this request.</p>
                    </td>

                </tr>
            </tbody>
        </table>
        <input type="hidden" name="action" value="wp-register">
        <input type="submit" name="submit" class="btn" value="Install Wordpress">
    </form>
</body>

</html>