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
<?php require_once __DIR__.'/bootstrap/app.php'; ?>

<body>
  <img class="logo" src="images/w-logo-blue.png">

  <form method="post">
    <p>Below you should enter your database connection details. If you’re not sure about these, contact your host.</p>
    <table class="form-table" role="presentation">
      <tbody>
        <tr>
          <th><label>Database Name</label></th>
          <td><input name="dbname" type="text" class="form-control" value="wordpress"></td>
          <td id="dbname-desc">The name of the database you want to use with WordPress.</td>
        </tr>
        <tr>
          <th scope="row"><label for="uname">Username</label></th>
          <td><input name="username" id="username" type="text" class="form-control" aria-describedby="uname-desc" size="25" value="username"></td>
          <td id="uname-desc">Your database username.</td>
        </tr>
        <tr>
          <th scope="row"><label for="pwd">Password</label></th>
          <td><input name="password" id="pwd" type="text" class="form-control" aria-describedby="pwd-desc" size="25" value="password" autocomplete="off"></td>
          <td id="pwd-desc">Your database password.</td>
        </tr>
        <tr>
          <th scope="row"><label for="dbhost">Database Host</label></th>
          <td><input name="dbhost" id="dbhost" type="text" class="form-control" aria-describedby="dbhost-desc" size="25" value="localhost"></td>
          <td id="dbhost-desc">
            You should be able to get this info from your web host, if <code>localhost</code> doesn’t work. </td>
        </tr>
        <tr>
          <th scope="row"><label for="prefix">Table Prefix</label></th>
          <td><input name="prefix" id="prefix" type="text" class="form-control" aria-describedby="prefix-desc" value="wp_" size="25"></td>
          <td id="prefix-desc">If you want to run multiple WordPress installations in a single database, change this.</td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="action" value="dbsetup">
    <input type="submit" name="submit" class="btn ">
  </form>

  </div>

  </div>
</body>

</html>