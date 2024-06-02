<?php
session_start();
   
error_reporting(0);
require '../connection.php';
if (!isset($_SESSION['Admin_email'])) {
    header('location:../adminLogin/adminlogin.php');
}

require_once('../connection/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category']; // Added line to retrieve category from form

    // Handle file upload
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["new_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["new_image"]["tmp_name"]);
    if ($check !== false) 
    {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
      
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="1;url=viewProduct.php">
        <?php
       
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["new_image"]["size"] > 500000) { // 500KB max file size
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="1;url=viewProduct.php">
        <?php
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="1;url=viewProduct.php">
        <?php
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "Sorry, your file was not uploaded.";
        ?>
        <meta http-equiv="refresh" content="1;url=viewProduct.php">
        <?php
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
            $new_image = $target_file;

            // Update item details in the database
            $sql = "UPDATE items SET name='$name', price='$price', image='$new_image', category='$category' WHERE id='$id'";

            if ($con->query($sql) === TRUE) {
                echo "Item updated successfully";
                ?>
                <meta http-equiv="refresh" content="1;url=../products.php">
                <?php
            } else {
                echo "Error updating item: " . $con->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
