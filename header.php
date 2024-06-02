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
                           if(isset($_SESSION['email'])){
                           ?>
                             <li> <a href=""><label for="category">Choose a category:</label></a> </li>
                            <li> <span><?php require ('Category/categoryDropdown.php');?> </span></li>
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                           <li><a href="chekbill.php"><span class="glyphicon glyphicon-checkout"></span> checkout bills</a></li>
                           <li><a href="shippingDetailsUser.php"><span class="glyphicon glyphicon-eye-open">view shipping details</span> </a></li>
                           <!-- <li> <span class="glyphicon glyphicon-search">< ?php  require '../SearchItems/Searchitems.php'; ?> </span> </li> -->
                            <!-- <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> AdminLogout</a></li> -->
                            
                          
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <!-- <li><a href="allProduct/viewAllProduct.php"><span class="glyphicon glyphicon-view"></span> view all Product</a></li> -->
                            <!-- <li><a href="Search.php"><span class="glyphicon glyphicon-search"> <input type="text" placeholder="search items he"></span> search</a></li> -->
                            <!-- <li> <span class="glyphicon glyphicon-search"></span>< ?php  require '../SearchItems/Searchitems.php'; ?>  </li> -->
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <!-- <li><a href="adminlogin/adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> AdminLogin</a></li> -->
                            <!-- <li><a href="bug_complain.php"><span class="glyphicon glyphicon-comment"></span> bug reports and complains</a></li> -->
                            <li> <a href=""><label for="category">Choose a category:</label></a> </li>
                            <li> <span><?php require ('Category/categoryDropdown.php');?> </span></li>
                            <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>