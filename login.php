<?php
error_reporting(0);
session_start();
require 'connection.php';
require 'head.php';
?>

<!DOCTYPE html>
<html>
<body>
    <div>
        <?php require 'header.php'; ?>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3>LOGIN</h3>
                        </div>
                        <div class="panel-body">
                            <p>Login to make a purchase or manage the system.</p>
                            <form method="post" action="login_submit.php">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password (min. 6 characters)" required pattern=".{6,}">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="user_type" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            Don't have an account yet? <a href="signup.php">Register</a> | <a href="admin/admin_signup.php">Admin Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <?php require 'footer.php'; ?>
    </div>
</body>
</html>
