<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="reg.css">
</head>

<body>
    <form action="registation.php" method="post">
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
                        <a href="gall.php">
                            <li class="fa fa-image">Gallery</li>
                        </a>
                        <a href="admin_login.php">
                            <li class="fa fa-user">Admin Login</li>
                        </a>
                        <a href="index.php">
                            <li class="fa fa-user">Login</li>
                        </a>

                    </ul>
                </div>
            </div>
            <div id="slider">
                <div id="x">WELCOME TO <b style="color: #2c7ad6;">PUBLIC</b>LIBRARY
                    <p style="font-size: 15PX;">YOU CAN READ SOME TEXT</p>
                </div>
                <div id="y">
                    <div id="l">
                        <h2 style=" text-align: center; color: #2c7ad6;">New Student Registration</h2>

                        <div class="msg_holder" colspan="2" align="center" height:="200px">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                session_unset();
                            }
                            ?>
                        </div>

                        <div class="container1">
                            <div class="msg_holder1"></div>
                            <div class="form_holder1">
                                <form action="registation.php" method="post" enctype="multipart/form-data">
                                    <table align="center">
                                        <tr>
                                            <td>Name:</td>
                                            <td><input type="text" name="name" placeholder="Enter your full name" required></td>
                                        </tr>

                                        <tr>
                                            <td>Email:</td>
                                            <td><input type="email" name="email" placeholder="Enter your email" required></td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td><select id="genter" name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <td>Password:</td>
                                        <td><input type="password" name="password" required></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><input type="text" name="address" placeholder="Enter your Address" required></td>
                                        </tr>
                                        <tr>
                                            <td>Contact:</td>
                                            <td><input type="number" name="phone" placeholder="Enter contact number" required></td>
                                        </tr>
                                        <tr>
                                            <td>Faculty:</td>
                                            <td>
                                                <select name="faculty" required>
                                                    <option value="DIT">DIT</option>
                                                    <option value="DCE">DCE</option>
                                                    <option value="DEE">DEE</option>
                                                    <option value="DGE">DGE</option>
                                                    <option value="DHM">DHM</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Photo:</td>
                                            <td><input type="file" name="photo" required <img style='width:180px;' src='uploads/" . $result[' photo'] . "'></td>

                                        </tr>
                                        <tr>
                                            <td><button type="submit" value="register" id="Register" name="register" style="width: 80px; height: 30px;"></td>R
                                            <td><input type="reset" value="Reset"></td>
                                            
                                        </tr>
                                    </table>
                                </form>
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
                <h2>Contact Address</h2>

                <a href="#" class="fa fa-phone" style="text-decoration: none; padding: 10px 12px;color: white;">
                    +977-9812345678
                </a> <br>
                <a href="#" class="fa fa-envelope" style="text-decoration: none; padding: 10px 12px; color:white;">
                    public@gmail.com
                </a>
            </div>
            <div class="footer">Developed By: Utsav</div>
        </div>