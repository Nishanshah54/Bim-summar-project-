<?php
require('head.php');
require('Header.php');
require('connection.php');

// Check if category is set
if (isset($_GET['category'])) {
    $category = mysqli_real_escape_string($con, $_GET['category']);
} else {
    // Handle the case where category is not set
    die('Category not specified.');
}
?>

<div class="container">
    <center>
        <h1><?php echo htmlspecialchars($category); ?> categories</h1>
    </center>
    <form method="GET" action="">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search for products...i.e Name or price or image category">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
    </form>
    <div class="row">
        <?php
        $query = "SELECT * FROM `items` WHERE `category` = ?";
        if (isset($_GET['search'])) {
            $search = '%' . mysqli_real_escape_string($con, $_GET['search']) . '%';
            $query = "SELECT * FROM `items` 
                      WHERE (`name` LIKE ? OR `price` LIKE ? OR `image` LIKE ? OR `category` LIKE ?)";
        }

        if ($stmt = $con->prepare($query)) {
            if (isset($search)) {
                $stmt->bind_param('ssss', $search, $search, $search, $search);
            } else {
                $stmt->bind_param('s', $category);
            }

            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $image = $row['image'];
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
        ?>
                    <div class='col-md-3 col-sm-8'>
                        <div class='thumbnail'>
                            <img src='uploads/<?php echo htmlspecialchars($image); ?>' alt='<?php echo htmlspecialchars($name); ?>'>
                            <div class='caption'>
                                <h3><?php echo htmlspecialchars($name); ?></h3>
                                <p>Price: Rs. <?php echo htmlspecialchars($price); ?>.00</p>
                                <?php if (!isset($_SESSION['email'])) { ?>
                                    <p><a href='login.php' role='button' class='btn btn-primary btn-block'>Buy Now</a></p>
                                <?php } else {
                                    if (check_if_added_to_cart($id)) {
                                        echo '<a href="#" class="btn btn-block btn-success disabled">Added to cart</a>';
                                    } else { ?>
                                        <a href="cart_add.php?id=<?php echo $id; ?>" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "<p>No items found.</p>";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $con->error;
        }
        ?>
    </div>
</div>
