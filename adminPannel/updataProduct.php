
<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
<?php
require_once('../connection/connection.php');
$query="SELECT * FROM `items`";
$result=mysqli_query($con,$query);
echo "
        <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>category</th>

            <th>Update</th>
            <th>Delete</th>
        </tr>
    ";
while($row=mysqli_fetch_array($result)) 
{
    $image=$row['image']; 
    $id	=$row['id'];
    $name=$row['name']	;
    $category=$row['category'];
    $price=	$row['price'];
   ?>
   
        <tr>
         
            <td><?php $id ?></td>
            <td><?php $name ?></td>
            <td><?php $price ?></td>
            <td><?php $image ?></td>
            <td>
                        <select id="category" name="category" required>
                            <option value="<?php  $category ?>">Select a category</option>
                            <option value="Camera">Camera</option>
                            <option value="watches">Watches</option>
                            <option value="t-shirt">T-Shirt</option>
                            <option value="bags">Bags</option>
                            <option value="others">Others</option>
                        </select><br><br>
                    </td>
            <td><a href='updateitem.php?id=<?php  echo $row['id']?> '>Update</a></td>
            <td><a href='Deleteitem.php?id=<?php echo $row['id']?>'>Delete</a></td>
        </tr>
    <?php
   
 
}
echo "</table>";
   ?>