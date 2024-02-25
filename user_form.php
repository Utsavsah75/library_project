<?php
include 'conn.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendemail_verify($std_name, $email, $verification_code) {

    if (isset($_POST["add"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "publiclibrary48@gmail.com";
        $mail->Password = "gjkx qtup hmph fozg";
        // $mail->Password = "enbirdmgshjmlkly";
        $mail->SMTPSecure = 'tls'; // Updated to TLS
        $mail->Port = 587; // Updated to TLS port

        // Sender and recipient settings
        $mail->setFrom('publiclibrary48@gmail.com');
        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification from Public Library Management";

        $email_template = " <h2>You have registered with Public library Management </h2>
    <p>Dear $std_name,</p>
    <p>Thanks for registration. Your verification code is <b>$verification_code</b>.</p>
    <p>Regards,</p>
    <p>Public Library Management</p>
    <a href='http://localhost/library_project/verify_email.php?code=$verification_code' 
    style='text-decoration: none; color: #007bff; font-weight: bold; background-color: #f8f9fa; padding: 8px 12px; 
    border-radius: 4px; border: 1px solid #007bff; display: inline-block;'>Click here to verify your email</a>
 
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
    } to {
        opacity: 50;
    }
}
.fade-in {
    color: #00f1ff;  font-family:Algerian;  animation:fadeIn 4s ease-in-out infinite;
    }
    @keyframes fadeIn {
    from {
        opacity: 0;
    } to {
        opacity: 50;
        
    }
}
</style>

<table style='border: 1px solid black; position: relative;'>
<tr>
    <td style='width: 20rem; position: relative;'>
        <img src='logo.png' style='width: 100%; height: auto; opacity: 20%;'>
        <div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-18deg);'>
            <p class='fade-in'>Have A Good Day</p>
            <p class='fade-in' style='  margin-top: -13px; text-align: center;'>$std_name</p>
        </div>
    </td>
</tr>
</table>";

        $mail->Body = $email_template;
        $mail->send();
        //msg check your login email and verify your account.
        $_SESSION['msg'] = "Check your login email and verify your account.";
        header("location: user_form.php");
        exit();
    }
}

//incerement the student code by 1.
$hits = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students"));
$hits++;

// Generate the student code with 'SID' prefix
$studentcode = "SID" . str_pad($hits, 3, '0', STR_PAD_LEFT);

// Register the use to the database.
if (isset($_POST['add'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Hash the password
    $photo = mysqli_real_escape_string($conn, $_POST['photo']);

    $alreadyExist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE email = '{$email}'"));

    if ($alreadyExist) {
        $_SESSION['msg'] = "Account is already exist form this email: <b>$email</b>";
        header("location: user_form.php");
        exit(); // Stop further execution
    }
    $verification_code = bin2hex(random_bytes(4));
    $sql = "INSERT INTO `students`( `studentcode`,`std_name`, `address`, `phone`, `gender`, `photo`, `email`, `password`,`verification_code`, `verified`) 
    VALUES ('$studentcode','$fullname','$address','$phone','$gender','$photo','$email','$password','$verification_code', 0)";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        sendemail_verify("$fullname", "$email", "$verification_code");
        $_SESSION['msg'] = "Account created successfully for email: <b>$email</b>";
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
    <!-- <link rel="stylesheet" type="text/css" href="book_pag1.css"> -->
    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <script type="text/javascript">
        function checkemail() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#email-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
    <script type="text/javascript">
        function mobilenumber() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_avability.php",
                data: 'mobile=' + $("#mobile").val(),
                type: "POST",
                success: function(data) {
                    $("#mobile-avability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

</head>

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
    <div class="content-wra
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">


                    <div class="header-line">
                        <h4 style="   font-weight: bold;color: #000000; display: inline;">User</h4>
                        <h4 style="   font-weight: bold;color: #2c7ad6; display: inline;">Form</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                    <?php 
                    // Display success message for blocking or activating student
                    if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                    ?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    // Display error message if any
                    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
                    ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Error :</strong>
                            <?php echo htmlentities($_SESSION['error']); ?>
                            <?php echo htmlentities($_SESSION['error'] = ""); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-head">
                            SINGUP FORM
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel-body">

                                        <form name="signup" method="post" onSubmit="return valid();" style="border-color: aqua;">
                                            <div class="form-group">
                                                <label>Enter Full Name</label>
                                                <input class="form-control" type="text" name="fullname" required="required" autocomplete="off" />
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Address</label>
                                                <input class="form-control" type="text" name="address" required="required" autocomplete="off" />
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <span id="mobile-avability-status" style="font-size:12px;"></span>
                                                <input class="form-control" type="text" name="phone" id="mobile" maxlength="10" autocomplete="off" onblur="mobilenumber()" required="required" />
                                            </div>

                                            <div class="form-group">
                                                <label>Gender </label>
                                                <div>
                                                    <input type="radio" id="male" name="gender" value="male" required>
                                                    <label for="male">Male</label>
                                                    <input type="radio" id="female" name="gender" value="Female" required>
                                                    <label for="female">Female</label>
                                                </div>
                                            </div>

                                            <!-- </form> -->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="panel-body">
                                        <form name="signup" method="post" onSubmit="return valid();" style="border-color: aqua;">

                                            <div class="form-group">
                                                <label>Enter Email</label>
                                                <span id="email-avability-status" style="font-size:12px;"></span>
                                                <input class="form-control" type="email" name="email" id="email" onBlur="checkemail()" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Password</label>
                                                <input class="form-control" type="password" name="password" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password </label>
                                                <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>User Picture</label>
                                                <input class="form-control" type="file" name="photo" autocomplete="off" required="required" />
                                            </div>
                                            <button type="submit" name="add" id="add" class="btn btn-info" style="margin-left: -16rem; margin-top:-54px;">Submit </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php 
    // include 'footer.html';?>
                        
                        <script src="assets/js/jquery-1.10.2.js"></script>
                        <!-- BOOTSTRAP SCRIPTS  -->
                        <script src="assets/js/bootstrap.js"></script>
                        <!-- CUSTOM SCRIPTS  -->
                        <script src="assets/js/custom.js"></script>
            </body>

</html>