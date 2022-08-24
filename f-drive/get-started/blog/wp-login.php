<?php

require_once __DIR__.'/bootstrap/app.php';

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>My Login Page</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>

<body class='my-login-page'>
    <section class='h-100'>
        <div class='container h-100'>
            <div class='row justify-content-md-center h-100'>
                <div class='card-wrapper'>
                    <div class='brand' style='margin-left: 122px;'>
                        <img src='images/w-logo-blue.png' alt='logo' height='80px' width='80px'>
                    </div>

                    <div class='card fat' style='margin-top: 37px;'>
                        <div class='card-body'>
                            <h4 class='card-title'>Login</h4>
                            <form method='POST' class='my-login-validation' novalidate=''>
                                <div class='form-group'>
                                    <label for='email'>E-Mail Address</label>
                                    <input type='email' name='email' class='form-control' value='' placeholder='username and email'>
                                    <div class='invalid-feedback'>
                                        Email is invalid
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label for='password'>Password
                                        <a href='forgot.html' class='float-right'>
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input type='password' name='password' class='form-control' value=''>
                                    <div class='invalid-feedback'>
                                        Password is required
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='custom-checkbox custom-control'>
                                        <input type='checkbox' name='remember' id='remember' class='custom-control-input'>
                                        <label for='remember' class='custom-control-label'>Remember Me</label>
                                    </div>
                                </div>

                                <div class='form-group m-0'>

                                    <input type='submit' class='btn btn-primary' name='login' value='login'>
                                    <input type='hidden' name='action' value='login'>
                                </div>
                            </form>
                                <div class='mt-4 text-center'>
                                    New here <a href='wp-blog.php'>Go to blog</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class='footer' style='margin-top: 24px;'>
                        Copyright &copy;
                        2020-21 &mdash;
                        Mohit@wordpress blog
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>