<?php

session_start();
if (session_destroy()) {
    header('Location: wp-login.php');
}
