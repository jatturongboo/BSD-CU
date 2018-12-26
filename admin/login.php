<?php

if (isset($_SESSION['UserID']) && $_SESSION['UserID'] != "") {
    header("location:index.php");
    exit();
}

?>
<html>
    <head>
        <link href="assets/css/login.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

    </head>
    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <!--<img src="../images/logo.png" style="width: 200px;" alt="">-->
                <div class="main-div">
                    <div class="panel">
                        <h2>Admin Login</h2>
                        <p>Please enter your username and password</p>
                    </div>
                    <form id="Login" method="post" action="check_login.php">
                        <div class="form-group">
                            <input type="text" name="Username" class="form-control" id="inputUsername" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" class="form-control" id="inputPassword" placeholder="Password">

                        </div>
                        <div class="forgot">
                            <!-- <a href="reset.html">Forgot password?</a> -->
                        </div>
                        <!-- Google reCAPTCHA widget -->
                        
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include('../element/Message.php'); ?>
    </body>
    
</html>
