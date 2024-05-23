<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email']))
    {
        header('location:../adminLogin/adminlogin.php');
    }
    else
    {
        echo '
        <meta http-equiv="refresh" content="1; url:../index.php">';
    }
?>
