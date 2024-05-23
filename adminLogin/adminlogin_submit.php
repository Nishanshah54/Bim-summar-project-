<?php
    require '../connection.php';
    //1.session setup
    session_start();
       
error_reporting(0);
    
    //2.form Data Handling
    $email=mysqli_real_escape_string($con,$_POST['adminemail']);
    // echo $email;
     //mysqli_real_escape_string() to prevent SQL injection attacks.
     
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    //it defines a regular expression ($regex_email) to validate the email format.

    //3.Email Formate Validation
    if(!preg_match($regex_email,$email))
    { 
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=./adminlogin.php" />  
        <!-- If the email format is incorrect,
         it displays an error message and redirects the user back to the login page after 2 seconds using HTML meta refresh. -->
        <?php
    }
    //p.password Handling
    // $password=md5(md5(mysqli_real_escape_string($con,$_POST['adminpassword'])));
    $password=mysqli_real_escape_string($con,$_POST['adminpassword']);
    // echo $password;
    //sanitizes it and then hashes it twice using MD5 
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
         // Redirect user to login page after 2 seconds
        ?>
        <meta http-equiv="refresh" content="2;url=./adminlogin.php" />
        <?php
    }
    $admin_authentication_query="select id,email from `adminloginf` where email='$email' and password='$password'";
    // echo var_dump(  $admin_authentication_query);
    $admin_authentication_result=mysqli_query($con,$admin_authentication_query) or die(mysqli_error($con));

    $rows_fetched=mysqli_num_rows($admin_authentication_result);
    // echo var_dump($rows_fetched);
   
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=./adminlogin.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($admin_authentication_result);
        $_SESSION['Admin_email']=$email;
        $_SESSION['Admin_id']=$row['id'];  //user id
        // header('location: ../adminPannel/index.php');
        ?>
         <meta http-equiv="refresh" content="0.5;url=../adminPannel/index.php" />
        <?php
    }
  
 ?>