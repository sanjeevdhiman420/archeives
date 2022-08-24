<?php
require_once __DIR__.'/../bootstrap/app.php';
require_once file_header();
require_once file_slider();
?>
<style>
 th#username {
    padding: 16px 97px 17px 0px;
}

input#user_login {
    width: 25em;
}

input#email {
    width: 25em;
}
input#first_name {
    width: 25em;
}
input#last_name {
    width: 25em;
}
input#website {
    width: 25em;
}

th#email {
    padding: 19px 4px 23px 0px;
}
th#fname {
    padding: 13px 0px 15px 0px;
}

th#lname {
    padding: 13px 0px 15px 0px;
}

th#website {
    padding: 13px 0px 15px 0px;
}

th#pass {
    padding: 44px 13px 10px 0px;
}

input#pass1 {
    width: 25em;
}

button.button {
    border-color: #007cba;
    color: #007cba;
}

th#notification {
    padding: 41px 0 47px 1px;
}

input.button.button-primary {
    background-color: #007cba;
    color: white;
}
</style>
<div class="dashborad">
    <div class="row dash-row">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Add New User</h2>
            </div>
            <p>Create a brand new user and add them to this site.

</p>
<form action="">
<table class="form-table" role="presentation">
	<tbody><tr>
		<th id="username" scope="row"><label for="user_login">Username <span class="description">(required)</span></label></th>
		<td><input name="user_login" type="text" id="user_login" value="" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
	</tr>

    <tr>
		<th id="email" scope="row"><label for="email">Email <span class="description">(required)</span></label></th>
		<td><input name="email" type="email" id="email" value=""></td>
	</tr>

    <tr >
		<th id="fname" scope="row"><label for="first_name">First Name </label></th>
		<td><input name="first_name" type="text" id="first_name" value=""></td>
	</tr>

    <tr >
		<th id="lname" scope="row"><label for="last_name">last Name </label></th>
		<td><input name="last_name" type="text" id="last_name" value=""></td>
	</tr>
	
    <tr >
		<th id="website" scope="row"><label for="website">website </label></th>
		<td><input name="website" type="text" id="website" value=""></td>
	</tr>

    <tr >
		<th id="pass" scope="row">
			<label for="pass1">
				Password				<span class="description hide-if-js">(required)</span>
			</label>
		</th>
		<td>
			<input class="hidden" value=" ">
			<button type="button" class="button">Generate password</button>
			<div class="wp-pwd">
								<span class="password-input">
					<input type="text" name="pass1" id="pass1" >
				</span>
				<button type="button" class="button" data-toggle="0" aria-label="Hide password">
					<span class="dashicons" aria-hidden="true"></span>
					<span class="text">Hide</span>
				</button>
			</div>
		</td>
	</tr>
	<tr>
		<th id="notification" scope="row">Send User Notification</th>
		<td>
			<input type="checkbox" name="send_user_notification" id="send_user_notification" value="1" checked="checked">
			<label for="send_user_notification">Send the new user an email about their account.</label>
		</td>
	</tr>

    <tr >
		<th id="role" scope="row"><label for="role">Role</label></th>
		<td><select name="role" id="role">
			
	<option selected="selected" value="subscriber">Subscriber</option>
	<option value="contributor">Contributor</option>
	<option value="author">Author</option>
	<option value="editor">Editor</option>
	<option value="administrator">Administrator</option>			</select>
		</td>
	</tr>
		</tbody></table>

        <p class="submit"><input type="submit" name="createuser" class="button button-primary" value="Add New User"></p>
</form>

<div class="footertext">
                        <p style='float: left;'><i>Thank you for creating with <a>WordPress.</a>
                                <p style='float: right;'>Version 5.6</p>
                            </i></p>

                    </div>