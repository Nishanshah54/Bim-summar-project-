
<?php
        require ('head.php');
        require ('Header.php');
        require ('connection.php');
        // $category;
            $category=$_GET['category'];
?>
<div class="container">
   <center>
            <h1> <?php echo $category ?> categories</h1>
   </center>
   <form method="GET" action="">
   <table class="table">
                <tr>
                    <td><input type="text" name="search" class="form-control"  placeholder="Search for products... i.e. Name or category"></td>
                    <td><input type="number" id="min_price" name="min_price" min="0" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : '0'; ?>" class="form-control" placeholder="Min Price"></td>
                    <td><input type="number" id="max_price" name="max_price" min="0" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '10000'; ?>" class="form-control" placeholder="Max Price"></td>
                    <td><button type="submit" class="btn btn-primary">Search</button></td>
                </tr>
            </table>

          
           </form>
<div class="row">
    <?php
    // require_once("connection.php");
    $query="SELECT * FROM `items` where category= '$category'"; 
    if (isset($_GET['search']) || isset($_GET['min_price']) || isset($_GET['max_price']))
    {
       $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
       $min_price = isset($_GET['min_price']) ? intval($_GET['min_price']) : 0;
       $max_price = isset($_GET['max_price']) ? intval($_GET['max_price']) : 10000;

       $query = "SELECT * FROM `items` WHERE (`name` LIKE '%$search%' 
                OR `category` LIKE '%$search%')
                AND `price` BETWEEN $min_price AND $max_price";
   }
  
    // if (isset($_GET['search'])) 
    // {
    //     $search = mysqli_real_escape_string($con, $_GET['search']);
    //     // $query = "SELECT * FROM `items` WHERE `name` LIKE '%$search%'";
    //     $query = " SELECT * FROM `items` 
    //                     WHERE `name` LIKE '%$search%' 
    //                     OR `price` LIKE '%$search%' 
    //                     OR `image` LIKE '%$search%' 
    //                     OR `category` LIKE '%$search%'";

    // }
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)) 
    {
        $image=$row['image']; 
        $id	=$row['id'];
        $name=$row['name']	;
        $price=	$row['price'];
    ?>
    <div class='col-md-3 col-sm-8'>
        <div class='thumbnail'>
       
            <img src='uploads/<?php echo $image; ?>' alt='<?php echo $name; ?>'>
            <div class='caption'>
                <h3><?php echo $name; ?></h3>
                <p>Price: Rs. <?php echo $price; ?>.00</p>
                <form method="POST" action="cart_add.php">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1"  class="form-control" required>
                </div>
        <?php if (!isset($_SESSION['email']))
         { ?>
            <p><a href='login.php' role='button' class='btn btn-primary btn-block'>Buy Now</a></p>
        <?php } else {
            if (check_if_added_to_cart($id)) {
                echo '<button class="btn btn-block btn-success disabled" type="button">Added to cart</button>';
            } else { ?>
                <button type="submit" class="btn btn-block btn-primary">Add to cart</button>
            <?php }
        } ?>
    </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div>
