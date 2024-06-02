<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
<!DOCTYPE html>
<html>
<?php require('head.php'); ?>
<body>
    <?php require_once('header.php'); ?>
    <div class="container">
        <h2>Insert Item</h2>
        <form action="insert_item.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <th><label for="name">Name:</label></th>
                    <td><input type="text" id="name" name="name" placeholder="Name of Product" required><br><br></td>
                </tr>
                <tr>
                    <th><label for="price">Price:</label></th>
                    <td><input type="number" id="price" name="price" min="0" step="4" required placeholder="Rs 2000"><br><br></td>
                </tr>
                <tr>
                    <th><label for="category">Category:</label></th>
                    <td>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="Camera">Camera</option>
                            <option value="watches">Watches</option>
                            <option value="t-shirt">T-Shirt</option>
                            <option value="bags">Bags</option>
                            <option value="others">Others</option>
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                    <th><label for="image">Image:</label></th>
                    <td><input type="file" id="image" name="image" required><br><br></td>
                </tr>
                <tr>
                    <th><label for="Quantity">Quantity</label></th>
                    <th><input type="number" id="Quantity" min="0" required name="Quantity" step="5"  max="1000" placeholder="50"> </th>
                </tr>
                <tr>
                    <th><input type="submit" value="Insert"></th>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
