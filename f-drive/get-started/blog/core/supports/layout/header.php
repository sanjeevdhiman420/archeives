<?php
session_start();
?> 

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- font owsm and onther fonts links and bootstrap link here -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css' integrity='sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp' crossorigin='anonymous'>

    <link href='../style/sliders.css' rel='stylesheet'>
    <link href='../style/admin.css' rel='stylesheet'>
    <link href='../style/profiles.css' rel='stylesheet'>
    <link rel='stylesheet' href='style/setup.css'>
    <link href='../style/update.css' rel='stylesheet'>

    <lo </head>

<body>

    <nav class='navbar navbar-inverse' id='header'>
        <div class='container-fluid'>
            <div class='dropdown'>
                <i class=' dropbtn fab fa-wordpress'></i>
                <div class='dropdown-content'>
                    <a href='#'>About Wordpress</a>
                    <a href='https://wordpress.org'>Wordpress.org</a>
                    <a href='#'>Documentation</a>
                    <a href='#'>Support</a>
                    <a href='#'>Feedback</a>

                </div>
            </div>
            <div class='dropdown'>
                <i class='dropbtn fa fa-home'><a href="./wp-blog.php"></a><?php echo $_SESSION['username']; ?></i>

                <div class='dropdown-content'>
                    <a href='../wp-blog.php'>Visit Site</a>

                </div>
            </div>
            <div class='dropdown'>
                <a href="./update-core.php"><i class='dropbtn fa fa-refresh mms'></a></i>

            </div>
            <div class='dropdown'>
                <i class='dropbtn fas fa-comment-alt'> <a href="./edit-comment.php" class='menu_Ancr'>0</a></i>

            </div>
            <div class='dropdown'>
                <i class='dropbtn glyphicon glyphicon-plus plas'><a href="./add-new.php" class='menu_Ancr'><b>New</b></a></i>

                <div class='dropdown-content'>
                    <a href='./add-new.php'>Posts</a>
                    <a href='./media-new.php'>Media</a>
                    <a href='./add-new.php'>Page</a>
                    <a href='./user-new.php'>User</a>

                </div>
            </div>
            <div class='profile'>
                <div class='dropdown'>
                    <i class='dropbtn '><a class='menu_Ancr'>Howdy, <?php echo $_SESSION['username']; ?></a><img alt='' src='http://2.gravatar.com/avatar/e6ba6a53cc8b725189f7c4427d22ae89?s=26&amp;d=mm&amp;r=g' srcset='http://2.gravatar.com/avatar/e6ba6a53cc8b725189f7c4427d22ae89?s=52&amp;d=mm&amp;r=g 2x' class='avatar avatar-26 photo' height='26' width='26' loading='lazy'></i>

                    <div class='dropdown-profile'>
                        <div>
                            <img alt='' src='http://2.gravatar.com/avatar/e6ba6a53cc8b725189f7c4427d22ae89?s=26&amp;d=mm&amp;r=g' srcset='http://2.gravatar.com/avatar/e6ba6a53cc8b725189f7c4427d22ae89?s=52&amp;d=mm&amp;r=g 2x' class='avatar avatar-26 photo' height='26' width='26' loading='lazy'>
                        </div>

                        <a href=''><?php echo $_SESSION['username']; ?></a><br>
                        <a href='edit-profile.php'>Edit profile</a><br>
                        <a href='../logout.php'>Logout</a>
                    </div>
                    

                </div>
            </div>

        </div>
        </div>
    </nav>
    <!-- <script>
  function refresh(){
        window.location.reload("Refresh")
      }
</script> -->