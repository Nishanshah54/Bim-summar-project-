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
          <!-- dataTables Start  -->
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- dataTables Start  -->

        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        </head>
              
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
    <body>
        <?php require ('./header.php'); ?>
        <div class="container">
            
            <center>
                <?php
                     
                        // Step 4: Construct and execute a SQL query to search for items
                        $sql = "SELECT * FROM `bug`";
                           $result = $con->query($sql);
                        // var_dump($result);
                        // print_r($result);
                        ?>
                    <?php
                    // Assuming $result is your mysqli_result object

                    echo "<table  id='myTable' class='display' border='1'>";
                    // Print table headers
                    echo " <thead><tr>";
                    while ($field = $result->fetch_field()) 
                    {
                        echo "<th>{$field->name}</th>";
                    }
                    echo "</tr> </thead> <tbody>";

                    // Print table rows
                    while ($row = $result->fetch_assoc())
                     {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }

                    echo "</tbody>
                          </table>";
                    ?>
                </center>
              

              
            </div>

    </body> 
    <?php require ('../footer/footer.php')  ?>
    <script>
        $(document).ready
        (
           function () 
            {
                $('#myTable').DataTable();
            }
         );
    </script>
</html>