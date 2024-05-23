<?php
session_start();
require '../connection/connection.php';
if(!isset($_SESSION['Admin_email']))
{
    header('location: ../adminLogin/Adminlogin.php');
}

?>

<!DOCTYPE html>
<html>
    
<head>
        <link rel="shortcut icon" href="../img/lifestyleStore.png" />
        <title>Ns thakuri store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="../width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <style>
            .col,.row
            {
                border: 1px solid black;
            }

        </style>

      
    </head>
    <body>
    <?php require ('./header.php');   ?>           
    <div class="container">
        <div class="row "  >
           <div class="col">
            <h1> Admin Pannel</h1>
           </div>
        </div>


    </div>
        
             

          
     
    </body> 
    <?php require ('../footer/footer.php')  ?>
</html>