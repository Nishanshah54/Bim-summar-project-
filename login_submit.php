<?php
error_reporting(0);
session_start();
require 'connection.php';

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$user_type = mysqli_real_escape_string($con, $_POST['user_type']);

// Validate email
$regex_email = "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
if (!preg_match($regex_email, $email)) {
    echo "Incorrect email. Redirecting you back to login page...";
    echo '<meta http-equiv="refresh" content="2;url=login.php" />';
    exit();
}

// Validate password length
if (strlen($password) < 6) {
    echo "Password should have at least 6 characters. Redirecting you back to login page...";
    echo '<meta http-equiv="refresh" content="2;url=login.php" />';
    exit();
}

// Hash password for user login
if ($user_type == 'user') {
    $password = md5(md5($password));
    $login_query = "SELECT id, email FROM users WHERE email='$email' AND password='$password'";
} else {
    // For admin login
    $login_query = "SELECT id, email FROM adminloginf WHERE email='$email' AND password='$password'";
}

$result = mysqli_query($con, $login_query) or die(mysqli_error($con));
$rows_fetched = mysqli_num_rows($result);

if ($rows_fetched == 0) {
    echo "<script>window.alert('Wrong username or password');</script>";
    echo '<meta http-equiv="refresh" content="1;url=login.php" />';
} else {
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $row['id'];

    if ($user_type == 'user')
     {
        header('location: products.php');
    } else {
        $row=mysqli_fetch_array($result);
        $_SESSION['Admin_email']=$email;
        $_SESSION['Admin_id']=$row['id'];  //user id
        header('location: adminPannel/index.php');
        ?>
         <meta http-equiv="refresh" content="0.5;url=adminPannel/index.php" />
        <?php
    }
}
?>
