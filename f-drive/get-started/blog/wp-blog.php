<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='style/wp-blog.css'>
    <link rel='stylesheet' type='text/css' href='../style/wp-blog.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body class='myblog'>
    <div class='container'>
        <h1>BLOG</h1>
        <p>Just Another Wordpress Site</p>
    </div>
    <div class='blog'>
        <a href='#'>Hello World!</a>
    </div>
    <div class='text'>
        <p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>
    </div>
    <div class='info'>
        <P>Published December 18, 2020 <br>
            Categorized a<a href='#'> Uncategorized</a></P>
    </div>
    <div class='row'>
        <div class='column'>
            <h2>Search...</h2>
            <form class='example'>
                <input type='text' placeholder='Search..' name='search'>
                <button type='submit'><i class='fa fa-search'></i></button>
            </form>
        </div>
        <div class='column'>
            <h2>Recent Post</h2>
            <p><a href='#'>Hello World!</a></p>
        </div>
        <div class='column'>
            <h2>Recent Comments</h2>
            <p><a href='#'>A Wordpress commentor</a> on <a href='#'>Hello World!</a></p>
        </div>
    </div>

    </div>
    <div class='row'>
        <div class='column'>
            <h2>Archives</h2>
            <?php
            date('DD-MM-YYYY');
            echo date('D-M-Y');

            ?>
        </div>
        <div class='column'>
            <h2>categories</h2>
            <p><a href='#'>Uncategorized</a></p>
        </div>
        <div class='column'>
            <h2>Meta</h2>
            <p><a href='wp-login.php'>Log in</a></p>
            <p><a href='#'>entery Feed</a></p>
            <p><a href='#'>comments Feed</a></p>
            <p><a href='#'>Wordpress.org</a></p>

        </div>
    </div>
</body>
<Footer class='footer'>
    <div class='row2'>
        <div class='column2'>BLOG</div>
        <div class='column2'></div>

        <div class='column2'>Proudly Powered by <a href='#'><?php echo $_SESSION['username']; ?></a></div>
    </div>
</Footer>

</html>