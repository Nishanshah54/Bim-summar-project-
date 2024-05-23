<?php
// Step 1: Establish a database connection
   
error_reporting(0);
require 'connection.php';

// Check connection

// Step 2: Create a form for users to input their search query
// echo '<form method="get" action="">';
// echo '  <input type="text" name="search" placeholder="Search items">';
// echo '  <input type="submit" value="Search">';
// echo '</form>';

// Step 3: Retrieve the search query from the form
if(isset($_POST['searchitems'])) {
    $search = $_POST['searchitems'];

    // Step 4: Construct and execute a SQL query to search for items
    $sql = "SELECT * FROM `items` WHERE `name` LIKE  '$search'";
    $result = $con->query($sql);

    // Step 5: Display the search result
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
         { 
            $n=$row['name'];
           ?>
           <tr>
            <td> <?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['price']?></td>
           </tr>
         
            <?php
            

            // echo "Item Name: " . $row["id"]. "<br>";
            // echo "Item Name: " . $row["name"]. "<br>";
            // echo "Item Name: " . $row["price"]. "<br>";
            // Add more fields as needed
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
}

// Close the database connection
$con->close();
?>
