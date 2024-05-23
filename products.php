<?php
    session_start();
    require 'check_if_added.php';
    require_once("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Ns Thakuri Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="css/style1.css" type="text/css"> -->
    <style>
        form {
            max-width: 600px;
            margin: auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }
        div + div {
            margin-top: 1em;
        }
        label {
            display: inline-block;
            width: 90px;
            text-align: right;
        }
        input, select {
            font: 1em sans-serif;
            width: 300px;
            box-sizing: border-box;
            border: 1px solid #999;
        }
        input:focus {
            border-color: #000;
        }
        .button {
            padding-left: 90px;
        }
        button {
            margin-left: .5em;
        }
    </style>
</head>
<body>
<div>
    <?php
        require 'header.php';
    ?>
    <div class="container">
      
        <div class="jumbotron">
            <h1>Welcome to our Ns Thakuri Store!</h1>
            <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
        </div>
    </div>
    <div class="container">
        <form method="GET" action="">
            <div class="form-group">
         
                <input type="text" name="search" class="form-control" placeholder="Search for products...i.e Name or price or image category">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <?php
            // require ('Category/categoryDropdown.php');
        ?>
        <div class="row">
            <?php
            $query = "SELECT * FROM `items`";
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
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                $image = $row['image'];
                $id = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
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
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <?php require ('footer/footer.php') ?>
</div>
</body>
</html>
