
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
            <div class="form-group">
         
                <input type="text" name="search" class="form-control" placeholder="Search for products...i.e Name or price or image category">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
<div class="row">
    <?php
    // require_once("connection.php");
    $query="SELECT * FROM `items` where category= '$category'"; 
    if (isset($_GET['search'])) 
    {
        $search = mysqli_real_escape_string($con, $_GET['search']);
        // $query = "SELECT * FROM `items` WHERE `name` LIKE '%$search%'";
        $query = " SELECT * FROM `items` 
                        WHERE `name` LIKE '%$search%' 
                        OR `price` LIKE '%$search%' 
                        OR `image` LIKE '%$search%' 
                        OR `category` LIKE '%$search%'";

    }
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
                <?php if(!isset($_SESSION['email'])) { ?>
                    <p><a href='login.php' role='button' class='btn btn-primary btn-block'>Buy Now</a></p>
                <?php } else {
                    if(check_if_added_to_cart($id)){
                        echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                    } else { ?>
                        <a href="cart_add.php?id=<?php echo $id; ?>" class="btn btn-block btn-primary">Add to cart</a>
                    <?php }
                }?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</div>
