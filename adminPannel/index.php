<?php
session_start();
   
error_reporting(0);
require '../connection/connection.php';
if(!isset($_SESSION['Admin_email'])) {
    header('location: ../adminLogin/Adminlogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/lifestyleStore.png" />
    <title>Ns Thakuri Store - Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jQuery library -->
    <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .admin-panel {
            margin-top: 50px;
        }
        .panel-heading {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .panel-body {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .panel-body h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .panel-footer {
            background-color: #f8f9fa;
            padding: 10px;
            border-top: 1px solid #dee2e6;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php require ('./header.php'); ?>
    <div class="container admin-panel">
        <div class="panel">
            <div class="panel-heading text-center">
                <h1>Admin Panel</h1>
            </div>
            <div class="panel-body">
                <h1>Welcome, Admin!</h1>
                <p>Manage your store settings, view reports, and more.</p>
            </div>
            <div class="panel-footer">
                <!-- <p>&copy; 2024 Ns Thakuri Store. All rights reserved.</p> -->
            </div>
        </div>
    </div>
    <?php require ('../footer/footer.php'); ?>
</body>
</html>
