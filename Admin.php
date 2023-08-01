<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="LMS1.css" type="text/css">
</head>

<body>
    <form action="book_page.php" method="post">
    <div id="background">
        <div id="top">
            <a href="#" class="fa fa-envelope" style="text-decoration:none;  color: white;">
                utsavsah75@gmail.com
            </a>
            <a href="#" class="fa fa-phone" style="text-decoration:none; color: white;">
                +977-9801219843
            </a>
            <a href="#" class="fa fa-facebook" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-instagram" style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#" class="fa fa-twitter" style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo">LIBRARY<b style="color:#2c7ad6 ;">ZONE</b>
            </div>
            <div id="menu1">
                <ul>
                    <a href="index.php">
                        <li class="fa fa-home">Home</li>
                    </a>
                    <a href="gall.php">
                        <li class="fa fa-image">Gallery</li>
                    </a>
                    <a href="admin.html">
                        <li class="fa fa-user">Admin Login</li>
                    </a>
                    <a href="reg_form.php">
                        <li class="fa fa-registered">Register</li>
                    </a>

                    
                </ul>
            </div>
        </div>
        <div id="slider">
            <div id="x">WELCOME TO LIBRARY<b style="color: #2c7ad6;">ZONE</b>
                <p style="font-size: 15PX;">YOU CAN WRITE SOME TEXT</p>
            </div>
            <div id="y">
                <div id="l">
                    <h1 style=" text-align: center; color: #2c7ad6;"> LOGIN</h1>
                    <h3 style=" text-align: center; color:red;"> ADMIN</h3>
                    <div class="container">

                        <div class="msg_holder" colspan="2" align="center" height:="200px">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                session_unset();
                            }
                            ?>
                        </div>
                        <div class="form_holder">
                            <form action="admin_page.php" method="post">

                                <table align="center">
                                    <tr>
                                        <td>Admin Name</td>
                                        <td><input type="text" name="name" value="<?php if (isset($_COOKIE['rem_user'])) {
                                                                                        echo $_COOKIE['rem_user'];
                                                                                    } ?>" required autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type="password" name="pwd" value="<?php if (isset($_COOKIE['rem_user'])) {
                                                                                            echo $_COOKIE['rem_pass'];
                                                                                        } ?>" required autocomplete="off"></td>
                                    </tr>

                                    <td></td>
                                    <td>
                                        <input type="radio" name="choose" value="Student" id="studentRadio">
                                        <label for="stdRadio"><a href="index.php">Students</a></label>

                                        <input type="radio" name="choose" value="Admin" id="adminRadio">
                                        <label for="adminRadio">Admin</label>
                                    </td>

                                    </tr>

                                    <tr>
                                        <td align="right"><input type="checkbox" name="rem" <?php if (isset($_COOKIE['rem_user'])) {
                                                                                                echo "checked";
                                                                                            } ?>></td>
                                        <td>Remember Me</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" value="login" name="login">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            New Member ? <a href="admin_reg.php">Register Here</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="down">
        <h3>Stay Connected</h3>
        <a href="#" class="fa fa-facebook" style="text-decoration: none; padding: 10px 12px;color: white; "></a>
        <a href="#" class="fa fa-instagram" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
        <a href="#" class="fa fa-twitter" style="text-decoration: none; padding: 10px 12px;color: white;"></a>
        <h2>Contant Address</h2>
        <a href="#" class="fa fa-phone" style="text-decoration: none; padding: 10px 12px;color: white;">
            +977-9801219843
        </a> <br>
        <a href="#" class="fa fa-envelope" style="text-decoration: none; padding: 10px 12px; color:white;">
            utsavsah75@gmail.com
        </a>
    </div>
    <div class="footer">Developed By : utsav </div>
    </div>
</body>

</html>