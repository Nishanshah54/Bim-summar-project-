<?php
    session_start();
       
error_reporting(0);
    require '../connection.php';
    if(!isset($_SESSION['Admin_email'])){
        header('location:../adminLogin/adminlogin.php');
    }
?>
 <style>
        table#myTable img {
            max-width: 100px; /* Adjust the size as needed */
            height: auto;
        }
    </style>
<?php
require('head.php');




require('header.php');
echo '<div class="container">';

require_once('../connection/connection.php');
$query = "SELECT * FROM `items`";
$result = mysqli_query($con, $query);
?>
<table id="myTable" class="display">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>category</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
while ($row = mysqli_fetch_array($result)) 
{
    $image = $row['image'];
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $category  = $row['category'];
  
   
?>

    <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $price ?></td>
        <td><?php echo "<img src='$image' alt='$name'>" ?></td>
        <td><?php echo  $category ?></td>
        <td><a href='updateitem.php?id=<?php echo $row['id'] ?>'>Update</a></td>
        <td>
        <button onclick="confirmDelete()">
        <a href='Deleteitem.php?id=<?php echo $row['id'] ?>'>Delete</a>
    </button>
           
        </td>

  

    </tr>
    <script>
function deleteItem() {
  // Show the confirmation dialog
  document.getElementById("confirmationDialog").style.display = "block";
}

function confirmDelete() {
  // Perform delete action here
  alert("Item deleted!");
  
  // Hide the confirmation dialog
  document.getElementById("confirmationDialog").style.display = "none";
}

function cancelDelete() {
  // Hide the confirmation dialog
  document.getElementById("confirmationDialog").style.display = "none";
}
</script>
<?php
}
echo "</tbody> </table>

 </div> </div>
 <br><br>
<br><br>
<br><br>
";
?>
<?Php
 require ("../footer/footer.php");
 echo "</body>";
 
?>
<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>


