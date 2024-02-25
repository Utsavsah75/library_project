<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="LMS1.css" type="text/css">
</head>
<style>
        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .form_holder {
                width: 80%;
                margin: auto;
            }
            table {
                width: 100%;
            }
            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
            }
        }
    </style>
<body>
    <div id="background">
        <div id="top">
            <a href="#" class="fa fa-envelope" style="text-decoration:none;  color: white;">
                public@gmail.com
            </a>
            <a href="#" class="fa fa-phone" style="text-decoration:none; color: white;">
                +977-9812345678
            </a>
            <a href="#" class="fa fa-facebook" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
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
                    <a href="About.php">
                        <li class="fa fa-image">Gallery</li>
                    </a>
                    <a href="admin_reg.php">
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
                    <h1 style=" text-align: center; color: #2c7ad6;"> LOGIN</h1>
                    <h3 style=" text-align: center; color:red;"> ADMIN</h3>
                    <div class="container">

                        <div class="msg_holder" colspan="2" align="center" height:="200px">
                            <?php
                            if (isset($_SESSION['AdminLoginError'])) {
                                echo $_SESSION['AdminLoginError'];
                                session_unset();
                            }
                            ?>
                        </div>
                        <div class="container">
    <div class="msg_holder" colspan="2" align="center">
        <?php
        if (isset($_SESSION['AdminLoginError'])) {
            echo $_SESSION['AdminLoginError'];
            session_unset();
        }
        ?>
    </div>
    <div class="form_holder">
        <form action="admin_page.php" method="post">
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($_COOKIE['rem_email'])) { echo $_COOKIE['rem_email']; } ?>" required autocomplete="off">
                </div><br><br>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="pwd" value="<?php if (isset($_COOKIE['rem_user'])) { echo $_COOKIE['rem_pass']; } ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="rem" <?php if (isset($_COOKIE['rem_user'])) { echo "checked"; } ?>>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    New Member? <a href="admin_reg.php">Register Here</a>
                </div>
            </div>
        </form>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <?php 
    include 'footer.html';?>
</body>

</html>