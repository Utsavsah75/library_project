<?php
session_start(); // Start the session
include 'conn.php';

if (isset($_POST['change'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

    // Check if the new password and confirm password fields match
    if ($newpassword == $confirmpassword) {
        $logged_in_user_id = $_SESSION['AdminLogin_successful'];

        // Check if the user's login password matches
        $password_query = "SELECT * FROM admin_login WHERE id = $logged_in_user_id AND `password`='$password'";
        $result = mysqli_query($conn, $password_query) or die(mysqli_error($conn));
        $password_row = mysqli_fetch_assoc($result);

        if ($password_row) {
            // Update the password
            $update_query = "UPDATE admin_login SET password = '$newpassword' WHERE id = $logged_in_user_id";
            $update_result = mysqli_query($conn, $update_query) or die(mysqli_error($conn));

            var_dump($update_result);

            if ($update_result == true) {
                session_destroy();
                echo "<script>alert(\"Password Updated Successfully\");</script>";

                echo "<script>window.location.href='admin_login.php';</script>";
            } else {
                echo "<script>alert (\"Password Update Failed. Error: \" . mysqli_error(\$conn));</script>";
            }
        } else {
            echo "<script>alert(\"Old Password are incorrect\");</script>";
        }
    } else {
        echo "<script>alert(\"New password and confirm password do not match\");</script>";
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
<!-- <script type="text/javascript">
    function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script> -->
<script type="text/javascript">
    function checkpass() {
        var password = $("#newpassword").val();
        var confirmpassword = $("#confirmpassword").val();
        if (password != confirmpassword) {
            $("#password-avability-status").html("<span style='color: red;'>*Password and Confirm Password do not match.</span>");
            $("#change").prop("disabled", true);
        } else {
            // Clear warning message
            $("#password-avability-status").html("");
            // Enable the button
            $("#change").prop("disabled", false);
        }
    }
</script>

<body>
    <!-- <div id="video-background">
        <video autoplay muted loop id="video-background">
            <source src="LB.mp4" type="video/mp4">
        </video>
    </div> -->

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
                        <form role="form" action="change_pwd.php" method="post" onSubmit="return valid();" name="chngpwd">

                            <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" required />
                            </div>

                            <div class="form-group">
    <label>Enter Password</label>
    <input class="form-control" type="password" id="newpassword" name="newpassword" autocomplete="off" required />
</div>

<div class="form-group">
    <label>Confirm Password</label>
    <span id="password-avability-status" style="font-size:12px;"></span>
    <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" onblur="checkpass()" autocomplete="off" required />
</div>

                            <button type="submit" name="change" id="change" class="btn btn-info">Chnage </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!---LOGIN PABNEL END-->


    </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php //include('includes/footer.php'); 
    ?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>

</html>