<?php
    require 'connection.php';
    
error_reporting(0);
    //1.session setup
    session_start();
    //2.form Data Handling
    $email=mysqli_real_escape_string($con,$_POST['email']);
     //mysqli_real_escape_string() to prevent SQL injection attacks.
     
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    //it defines a regular expression ($regex_email) to validate the email format.

    //3.Email Formate Validation
    if(!preg_match($regex_email,$email))
    { 
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />  
        <!-- If the email format is incorrect,
         it displays an error message and redirects the user back to the login page after 2 seconds using HTML meta refresh. -->
        <?php
    }
    //p.password Handling
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    //sanitizes it and then hashes it twice using MD5 
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
         // Redirect user to login page after 2 seconds
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $user_authentication_query="select id,email from users where email='$email' and password='$password'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];  //user id
        header('location: products.php');
        
        // <meta http-equiv="refresh" content="6;url=products.php" />
        
    }
    
 ?>