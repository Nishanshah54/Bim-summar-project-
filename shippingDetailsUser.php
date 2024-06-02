<?php
session_start();
   
error_reporting(0);
require 'connection/connection.php';
if(!isset($_SESSION['email']))
{
    header('location: products.php');
}
$user_id=$_SESSION['id'];
?>

<!DOCTYPE html>
<html>
 <?php require ('head.php');?>
<body>
    <?php require ('header.php'); ?>
    <div class="container">
        <center>
            <?php
                // Step 4: Construct and execute a SQL query to search for items
                $sql = "SELECT 
                users.name AS username,
                items.name AS item_name,
                items.price AS item_price,
                users_items.status AS order_status,
                users_items.created_at AS order_date,
                shipping.Address AS shipping_address,
                shipping.City AS shipping_city,
                shipping.Province AS shipping_province,
                shipping.Country AS shipping_country,
                shipping.PhoneNumber AS shipping_phone,
                shipping.Email AS shipping_email
            FROM 
                store.users
            JOIN 
                store.users_items ON users.id = users_items.user_id
            JOIN 
                store.items ON users_items.item_id = items.id
            JOIN 
                store.shipping ON users.id = shipping.userId
                where userId=$user_id;
            ";
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
    <?php require ('footer/footer.php')  ?>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body> 
</html>
