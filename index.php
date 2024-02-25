<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="LMS1.css" type="text/css">
</head>

<body>
    <div id="background">
        <div id="top">
        <a href="#" class="fa fa-envelope" style="text-decoration:none;  color: white;">
                public@gmail.com
            </a>
            <a href="#" class="fa fa-phone" style="text-decoration:none; color: white;">
                +977-98012345678
            </a>
            <a href="#" class="fa fa-facebook" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a class="fa-brands fa-instagram"></a>
            <a href="#" class="fa fa-instagram" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-twitter" style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo"><b style="color:#2c7ad6 ;">PUBLIC</b>LIBRARY
            </div>
            <div id="menu1">
                <ul>
                    <a href="index.php">
                        <li class="fa fa-home">Home</li>
                    </a>
                    <a href="gall.php">
                        <li class="fa fa-image">Gallery</li>
                    </a>
                    <a href="admin_login.php">
                        <li class="fa fa-user">Admin Login</li>
                    </a>
                    <a href="user_form.php">
                        <li class="fa fa-registered">Register</li>
                    </a>
                    <a href="About.html">
                        <li class="">About Us</li>
                    </a>
                </ul>
            </div>
        </div>
        <div id="slider">
            <div id="x">WELCOME TO <b style="color: #2c7ad6;">PUBLIC</b>LIBRARY
                <p style="font-size: 15PX;">YOU CAN READ SOME&nbsp</p>
            </div>
            <div id="y">
                <div id="l">
                    <!-- Login form -->
                    <?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php unset($_SESSION['status']);
                        } ?>
                    <h1 style=" text-align: center; color: #2c7ad6;"> LOGIN</h1>
                    <h3 style=" text-align: center; color: red;"> STUDENT</h3>
                    <div class="container">
                        <div class="msg_holder" colspan="2" align="center" height:="200px">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                session_unset();
                            }
                            ?>
                        </div>
                        <!-- Login form holder -->

                        
                        <div class="form_holder">
                            <form action="user_login.php" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php if (isset($_COOKIE['rem_email'])) { echo $_COOKIE['rem_email']; } ?>" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pwd" value="<?php if (isset($_COOKIE['rem_user'])) { echo $_COOKIE['rem_pass']; } ?>" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Login" name="login">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <p class="text-center">New Member? <a href="user_form.php">Register Here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








        <?php include 'footer.html'; ?>
    </div>
</body>

</html>
