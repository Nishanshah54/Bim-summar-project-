
<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
<?php
require ('../connection/connection.php');
require('head.php');
require('header.php');
// Check if id is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind
    if ($stmt = $con->prepare("DELETE FROM items WHERE id = ?")) {
        $stmt->bind_param("i", $id); // 'i' denotes the type is integer

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully";
            ?>
            <meta http-equiv="refresh" content="3;url=viewProduct.php">
            <?php
        } else {
            echo "Error deleting record: " . $stmt->error;
            ?>
            <meta http-equiv="refresh" content="3;url=viewProduct.php">
            <?php
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
        ?>
        <meta http-equiv="refresh" content="1;url=viewProduct.php">
        <?php
    }
} else {
    echo "No ID specified";
    ?>
    <meta http-equiv="refresh" content="1;url=viewProduct.php">
    <?php
}

$con->close();
?>
