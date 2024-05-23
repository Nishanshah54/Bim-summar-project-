<?php
session_start();
error_reporting(0);
require '../connection/connection.php';
if(!isset($_SESSION['Admin_email']))
{
    header('location: ../adminLogin/Adminlogin.php');
}
   


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/lifestyleStore.png" />
    <title>Ns thakuri store-admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="../width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
    <meta charset="utf-8">
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
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #D6EEEE;
        }
    </style>
</head>
<body>
    <?php require ('./header.php'); ?>
    <div class="container">
        <center>
            <?php
                // Step 4: Construct and execute a SQL query to search for items
                $sql = "SELECT User_orders.user_id,User_orders.item_id,User_orders.status,Productdetails.* FROM users_items User_orders JOIN items Productdetails ON User_orders.item_id=Productdetails.id;";
                $result = $con->query($sql);
            ?>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <?php
                        // Print table headers
                        while ($field = $result->fetch_field()) {
                            echo "<th>{$field->name}</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Print table rows
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>
    <?php require ('../footer/footer.php')  ?>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body> 
</html>
