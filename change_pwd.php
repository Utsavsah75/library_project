<?php
session_start();
include 'conn.php';
// include 'admin_ckech.php';

//admin password change code start.
if (!isset($_SESSION["login_seccessful"])) {
    // header("location:change_pwd.php"); 
}

//admin password change code start.
if (isset($_POST['change'])) {
    $password = ($_POST['password']);
    $newpassword = ($_POST['newpassword']);
    $_SESSION['login_seccessful'] = $email;
    $sql = mysqli_query($conn, "SELECT password FROM admin_login where password='$password' && email='$email'");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $con = mysqli_query($conn, "update users set password='$newpassword' where email='$email'");
        $_SESSION['msg1'] = "Password Changed Successfully !!";
    } else {
        $_SESSION['msg1'] = "Old Password not match !!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">

    <link rel="stylesheet" type="text/css" href="header.css">

    <link rel="stylesheet" type="text/css" href="book_pag.css">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>
<script type="text/javascript">
    function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>

<body>
<div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div>

    <!------MENU SECTION START-->
    <?php
    include 'admin_header.php';
    ?>
    
    <!-- MENU SECTION END-->

    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">


                    <div class="header-line">
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">change</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">password</h4>
                    </div>


                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class=" panel panel-info">
                    <div class="panel-heading">
                    Change Password
                    </div>

                        <div class="panel-body">
                            <form role="form" method="post" onSubmit="return valid();" name="chngpwd">

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Enter Password</label>
                                    <input class="form-control" type="password" name="newpassword" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                </div>

                                <button type="submit" name="change" class="btn btn-info">Chnage </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!---LOGIN PABNEL END-->


        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php //include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>