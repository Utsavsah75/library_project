<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="reg.css">

</head>

<body>
    <form action="Admin_loginserver.php" method="post">
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
                            <li class="fa fa-user">Login</li>
                        </a> 
                         <a href="About.html">
                            <li class="fa fa-face">About US</li>
                        </a>

                    </ul>
                </div>
            </div>
            <div id="slider">
                <div id="x">WELCOME TO LIBRARY<b style="color: blue;">ZONE</b>
                    <p style="font-size: 15PX;">YOU CAN WRITE SOME TEXT</p>
                </div>
                <div id="y">
                    <div id="l">
                        <h2 style=" text-align: center; color: #2c7ad6;">New Admin Registration</h2>

                        <div class="container1">
                            <div class="msg_holder1"></div>

                            <div class="form_holder1">
                                <form action="Admin_login.php" method="post" enctype="multipart/form-data">
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
                                            <td><select id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Contact:</td>
                                            <td><input type="tel" name="phone" placeholder="Enter contact number" required></td>
                                        </tr>
                                        <td>Address:</td>
                                        <td><input type="tel" name="address" placeholder="Enter Address number" required></td>
                                        </tr>

                                        <td>Password:</td>
                                        <td><input type="password" name="password" required></td>
                                        </tr>

                                        <td><input type="submit" value="register" name="register"></td>
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
                    +977-9801219843
                </a> <br>
                <a href="#" class="fa fa-envelope" style="text-decoration: none; padding: 10px 12px; color:white;">
                    utsavsah75@gmail.com
                </a>
            </div>
            <div class="footer">Developed By: Utsav</div>
        </div>
    </form>
</body>

</html>