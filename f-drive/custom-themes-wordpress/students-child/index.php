<?php

get_header();
require_once __DIR__.'./bootstrap/app.php';
?>
<h2 class="text-center">login here </h2>
<div class = 'jumbotron'>
<div class = 'container'>
<form method ='POST'>
<input type = 'hidden' value = 'login' name ='action'>
<div class = 'row justify-content-center'>
<div class="col text-center"><label class = 'labels'>Email:</label>
<input type = 'email' name ='email'></div><br>
<div class="col text-center"><label class = 'labels'>password:</label>
<input type ='password' name ='password'></div><br>
<div class="text-center">
<a class ='forget text-center' href ='#'>Forget password?</a>
<input class="text-center" type ='submit' value ='login' name ='login'><br>
<span class="text-center">don,t have account?<a href ='http://localhost/wordpress/wordpress/register/'>Register</a></span></div>
</div>
</form>
</div>
</div>
<?php
get_footer();
?>