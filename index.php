<?php
session_start();
error_reporting(0);
?>


<?php  require 'head.php'; ?>
    <body>
       
        <div>
            <?php
                require 'header.php';?>
           
           <div id="bannerImage">
               <div class="container">
               <div class="search">
            <?php
            

            
            ?>

        </div>
                   <center>
                   <div id="bannerContent">
                       <h1>We sell lifestyle.</h1>
                       <p>Flat 40% OFF on all premium brands.</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   <!-- <div class="row">
                    <div class="col-sm"> <?php
                    //   require ("SearchItems/Searchitems.php");
                      ?> </div>
                    <div class="col-sm"><?php 
                    //  require ('displaySearchItems.php');
                     ?> </div>
                   </div> -->
                   <div class="row">
                    <div class="col-sm"> <h1>List Of Category</h1> </div>
                    <!-- <div class="col-sm">< ?php require ('addCatogory/displayCategory.php');?></div> -->
                   </div>

                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
            <?php 
            //  require '../SearchItems/Searchitems.php';
            // require ("SearchItems/Searchitems.php");
            
         
            
            ?>
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="SelectCategory.php?category=cameras">
                                <img src="img/camera.jpg" alt="Camera">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Cameras</p>
                                        <p>Choose among the best available in the world.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="SelectCategory.php?category=watches">
                               <img src="img/watch.jpg" alt="Watch">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Watches</p>
                                    <p>Original watches from the best brands.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="SelectCategory.php?category=T-shirt">
                               <img src="img/shirt.jpg" alt="Shirt">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Shirts</p>
                                   <p>Our exquisite collection of shirts.</p>
                               </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="SelectCategory.php?category=bags">
                               <img src="img/indexBag.jpg" alt="Bag">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Bag</p>
                                   <p>Discover our exquisite Bag collection.</p>
                               </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="SelectCategory.php?category=others">
                               <img src="img/indexOthers.jpg" alt="others">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Others</p>
                                   <p>Discover our others collection.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>
        <?php require ('footer/footer.php') ; ?>
    </body>

</html>