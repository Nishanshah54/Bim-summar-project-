<?php
    session_start();
       
error_reporting(0);
    require '../Connection/connection.php';
    if(!isset($_SESSION['Admin_email']))
    {
        header('location:../index.php');
    }  
    $old_password= mysqli_real_escape_string($con,$_POST['oldPassword']);
    $new_password= mysqli_real_escape_string($con,$_POST['newPassword']);
    // $old_password= md5(md5(mysqli_real_escape_string($con,$_POST['oldPassword'])));
    // $new_password= md5(md5(mysqli_real_escape_string($con,$_POST['newPassword'])));
    $email=$_SESSION['Admin_email'];
    //echo $email;
    $password_from_database_query="select password from adminloginf where email='$email'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    //echo $row['password'];
    if($row['password']==$old_password){
        $update_password_query="update `adminloginf` set password='$new_password' where email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Your password has been updated.";
        ?>
        <meta http-equiv="refresh" content="3;url=index.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>