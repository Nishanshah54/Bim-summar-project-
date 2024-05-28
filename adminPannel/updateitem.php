<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
<?php
require('head.php');
require('header.php');
require_once('../connection/connection.php');

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch item details from the database
    $query = "SELECT * FROM `items` WHERE id=$id";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $image = $row['image'];
        $name = $row['name'];
        $price = $row['price'];
    } else {
        echo "Item not found.";
        exit; // Stop execution if item not found
    }
} else {
    echo "Item ID not provided.";
    exit; // Stop execution if ID not provided
}
?>
<center>
    
<h2>Update Item</h2>
<form action="update_item.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <table>
        <tr>
            <th>Item ID</th>
            <th>New Name</th>
            <th>New Price</th>
            <th>New Image</th>
            <th>category</th>
          
        </tr>
        <tr>  
            <td><input type="text" name="new_id" value="<?php echo $id; ?>" disabled></td>            
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            <td><input type="number" name="price"  min="0" value="<?php echo $price; ?>"></td>
            <td><input type="file" name="new_image" ></td>
            <td>
                        <select id="category" name="category" required>
                            <option value="<?php echo $category; ?>" >Select a category</option>
                            <option value="Camera">Camera</option>
                            <option value="watches">Watches</option>
                            <option value="t-shirt">T-Shirt</option>
                            <option value="bags">Bags</option>
                            <option value="others">Others</option>
                        </select><br><br>
                    </td>
            
        </tr>

    </table>
    <br>
    <input type="submit" value="Update" onclick="confirmUpdate()">
</form>
<script>
     function confirmUpdate() {
        if (confirm("Are you sure you want to Update this item?")) 
        {
            window.location.href = 'update_item.php';
        }
    }
</script>

</center>

<?php require ("../footer/footer.php"); ?>
