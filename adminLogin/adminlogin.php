<!doctype html>
<html lang="en">
<head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Ns thakuri store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
<body>
    <!-- header start -->
    <?php require ('../adminPannel/header.php') ;
       
error_reporting(0);?>
    
    <!-- header end -->
    <!-- login body start -->
    <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>  STAFF LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <p>Login to Manage system products.</p>
                                <form method="post" action="adminlogin_submit.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="adminemail" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="adminpassword" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="panel-footer"> <a href="Adminsignup.php" style="color:green;font-size:Small;">Register</a>  <a  href="#" style="color:#FF5050;font-size:Small;">forgot password ?</a></div> -->
                            <div class="panel-footer"> <a href="Adminsignup.php" style="color:green;font-size:Small;">Register</a>  <a  href="#" style="color:#FF5050;font-size:Small;">forgot password ?</a></div>
                           
                        </div>
                    </div>
                </div>
           </div>

    <!-- login body end-->

    <!-- footer  start-->
<?php require ('../footer/footer.php');?>
    <!--  footer end-->
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>