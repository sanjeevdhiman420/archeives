<?php

require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();

?>

<style>
div#message {
    border: solid 1px #ccd0d4;
    border-left: solid 4px #00a0d2;
    padding: 1px 12px;
    box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
    background: #fff;
}

h2, h3 {
    color: #23282d;
    font-size: 1.3em;
    margin: 1em 0;
}

form {
    text-align: right;
    margin-top: -5%;
    width: 162%;
}
form {
    text-align: right;
    margin-top: -5%;
    width: 155%;
}
input#Submit {
    background: #f3f5f6;
    border: solid 1px #7e8993;
    color: #0071a1;
}

h1{
    font-size: 23px;
}

</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h1>Edit Themes</h1>
                <div id="message" class="notice-info notice">
		<p><strong>Did you know?</strong></p>
		<p>
			There’s no need to change your CSS here — you can edit and live preview CSS changes in the <a href="#">built-in CSS editor</a>.		</p>
	</div>
    <div class="fileedit-sub">
<div class="alignleft">
<h2>
	Twenty Twenty-One: Stylesheet <span>(style.css)</span></h2>
</div>
<div class="alignright">
	<form action="theme-editor.php" method="get">
		<strong><label for="theme">Select theme to edit: </label></strong>
		<select name="theme" id="theme">
		
	<option value="twentynineteen">Twenty Nineteen</option>
	<option value="twentytwenty">Twenty Twenty</option>
	<option value="twentytwentyone" selected="selected">Twenty Twenty-One</option>		</select>
		<input type="submit" name="Submit" id="Submit" class="button" value="Select">	</form>
</div>
<br class="clear">
</div>
<div class="nextform">
<label for="newcontent" id="theme-plugin-editor-label">Selected file content:</label>


</div>