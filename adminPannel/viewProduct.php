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
        <th>Category</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php
while ($row = mysqli_fetch_array($result)) {
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
        <td><?php echo $category ?></td>
        <td>
            <!-- <a href='updateitem.php?id=< ?php echo $row['id'] ?>'>Update</a></td> -->
            <button onclick="confirmUpdate(<?php echo $row['id'] ?>)">Update</button>
        <td>
            <button onclick="confirmDelete(<?php echo $row['id'] ?>)">Delete</button>
        </td>
    </tr>
<?php
}
echo "</tbody></table></div></div><br><br><br><br><br><br>";

require("../footer/footer.php");
echo "</body>";
?>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });

    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            window.location.href = 'Deleteitem.php?id=' + id;
        }
    }
    function confirmUpdate(id) {
        if (confirm("Are you sure you want to Update this item?")) {
            window.location.href = 'updateitem.php?id=' + id;
        }
    }
</script>
