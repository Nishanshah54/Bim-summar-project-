<?php
session_start();
   
error_reporting(0);
// require '../connection.php';
// if(!isset($_SESSION['Admin_email'])){
//     header('location:../adminLogin/adminlogin.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/lifestyleStore.png" />
    <title>Ns Thakuri Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
 
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <style>
        table#myTable img {
            max-width: 100px; /* Adjust the size as needed */
            height: auto;
        }
    </style>
</head>
<body>
<?php
echo '<div class="container">';

require('../header.php');

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
            <td><img src="<?php echo $image ?>" alt="<?php echo $name ?>"></td>
            <td><?php echo $category ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>

<?php
require("footer/footer.php");
?>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
