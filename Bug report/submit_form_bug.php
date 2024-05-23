<?php
    require_once('../connection.php');
    // session_start();
   
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $submissionType=trim($_POST['submission_type']);
    $description=trim($_POST['description']);
    $file=$_POST['attachments'];
    $ad_comment=trim($_POST['additional_comments']);

    $insert_bug_query="INSERT INTO `bug`( `Name`, `Email`, `SubmissionType`, `Description`, `Attachments`,
    `AdditionalComments`) 
   VALUES ('$name', '$email','$submissionType', '$description','$file','$ad_comment');";
  //  echo $insert_bug_query;
  //  die();
  
   $result=mysqli_query($con,$insert_bug_query) or die(mysqli_error($con));
   if (!$result)
   {
    // Handle SQL errors gracefully
    echo "Something went wrong: " . mysqli_error($con);
    ?>
    <meta http-equiv="refresh" content="1;url=../bug_complain.php">
    <!-- <meta http-equiv="refresh" content="1;url=./adminlogin.php" /> -->
    <?php
} else {

    echo "Bug report sent successfully";
    ?>
     <meta http-equiv="refresh" content="1;url=../index.php">
     <!-- <meta http-equiv="refresh" content="1;url=./adminlogin.php" /> -->
    <?php
  
}
    
?>