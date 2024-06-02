<?php
session_start();
   
error_reporting(0);
    require ('connection.php');

// Create connection
// $con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Sanitize and validate input data
// $userId = $con->real_escape_string($_POST['userId']);
// $userId = $con->real_escape_string($_POST['userId']);
$userId =$_SESSION['id'];

$name = $con->real_escape_string($_POST['name']);
$address = $con->real_escape_string($_POST['address']);
$city = $con->real_escape_string($_POST['city']);
$province = $con->real_escape_string($_POST['province']);
$country = $con->real_escape_string($_POST['country']);
$phoneNumber = $con->real_escape_string($_POST['phoneNumber']);
$email = $con->real_escape_string($_POST['email']);
// $createdAt = date('Y-m-d H:i:s'); // Current timestamp
// $updatedAt = date('Y-m-d H:i:s'); // Current timestamp

// Insert data into the database
$sql = "INSERT INTO `shipping`(`UserID`, `Name`, `Address`, `City`, `Province`, `Country`, `PhoneNumber`, `Email` )
        VALUES ('$userId', '$name', '$address', '$city', '$province', '$country', '$phoneNumber', '$email' )";
        // echo $sql;
        // die();

if ($con->query($sql) === TRUE) {
    echo "Shipping address added   successfully";
    ?>
    <meta http-equiv="refresh" content="2;url=paymentMethordSelection.php">
    <?php

} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    ?>
    <meta http-equiv="refresh" content="5; url=proceedtopay.php">
    <?php
}

// Close the connection
$con->close();
?>
