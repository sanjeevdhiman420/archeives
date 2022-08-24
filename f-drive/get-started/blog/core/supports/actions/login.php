<?php
/**
* Get the users from users.json file
* and decode this.
*
* @var $get_user
*
* @return array all users store in users.json
*/
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $sql = "SELECT * FROM profile  WHERE email='$email' AND password='$password'";
        $query = getConnection()->prepare($sql);
        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['email'] = $results['email'];
        $_SESSION['username'] = $results['username'];
        $_SESSION['id'] = $results['id'];
        $_SESSION['password'] = $results['password'];
    } catch (PDOException $e) {
        echo 'There are error: '.$e->getMessage();
    }
    if ($query->rowCount() > 0) {
        header('Location:wp-admin');
    } else {
        echo '<script>alert("Invalid details")</script>';
    }
} else {
    echo 'error';
}
