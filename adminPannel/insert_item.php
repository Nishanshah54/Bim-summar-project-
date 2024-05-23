<?php
    session_start();
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
<?php
require ('../connection/connection.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image'];

    // Handle the image upload
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="3;url=AddProduct.php">
        <?php
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     ?>
        <!-- <meta http-equiv="refresh" content="3;url=AddProduct.php"> -->
    //     <?php
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($image["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="3;url=AddProduct.php">
        <?php
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        ?>
        <meta http-equiv="refresh" content="1;url=AddProduct.php">
        <?php
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        ?>
        <meta http-equiv="refresh" content="1;url=AddProduct.php">
        <?php
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Prepare and bind
            $stmt = $con->prepare("INSERT INTO items (name, price, category, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $name, $price, $category, $target_file);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
                ?>
                <meta http-equiv="refresh" content="1;url=viewProduct.php">
                <?php
            } else {
                echo "Error: " . $stmt->error;
                ?>
                <meta http-equiv="refresh" content="1;url=AddProduct.php">
                <?php
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
            ?>
            <meta http-equiv="refresh" content="1;url=AddProduct.php">
            <?php
        }
    }
}

$con->close();
?>
