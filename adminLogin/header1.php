<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand">Ns Thakuri Store</a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                    
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['Admin_email'])){
                           ?>
                           <!-- <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li> -->
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                           <!-- <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->
                           <!-- <li> <span class="glyphicon glyphicon-search">< ?php  require '../SearchItems/Searchitems.php'; ?> </span> </li> -->
                            <li><a href="Addcategory.php"><span class="glyphicon glyphicon-plus"></span> Add Category</a></li>
                            <li><a href="Modifycategory.php"><span class="glyphicon glyphicon-wrench"></span> modify category</a></li>
                            <li><a href="AddProduct.php"><span class="glyphicon glyphicon-plus-sign"></span> Add  Product</a></li>
                            <li><a href="modifyProduct.php"><span class="glyphicon glyphicon-wrench"></span>modifyProduct </a></li>
                            <li><a href="modifyProduct.php"> <i class="fa-regular fa-bug"></i>  view bug & report</a></li>

                            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>AdminLogout</a></li>

                          
                           <?php
                           }
                           else
                           {
                            ?>
                            <li><a href="../signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <!-- <li><a href="Search.php"><span class="glyphicon glyphicon-search"> <input type="text" placeholder="search items he"></span> search</a></li> -->
                            <!-- <li> <span class="glyphicon glyphicon-search"></span>< ?php  require '../SearchItems/Searchitems.php'; ?>  </li> -->
                            <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="./adminlogin/adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> AdminLogin</a></li>
                            <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>